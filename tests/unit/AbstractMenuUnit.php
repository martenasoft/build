<?php

namespace App\Tests\unit;

use MartenaSoft\Common\Entity\NestedSetEntityInterface;
use MartenaSoft\Menu\Entity\Menu;
use MartenaSoft\Menu\Repository\MenuRepository;
use Codeception\Util\Debug;

abstract class AbstractMenuUnit extends AbstractSymfonyUnit
{
    protected const FIRST_NODE_NAME = "Node 1.0";
    protected const TABLE_NAME = "menu";
    protected $treeId = 1;
    private ?MenuRepository $repository = null;

    abstract public function testRun();

    abstract protected function moveAsset(): void;

    protected function _before()
    {
        parent::_before();
        $this->truncateMenuTable();
        $this->initMenu();
    }

    protected function truncateMenuTable(): void
    {
        $this->getEntityManager()->getConnection()->exec("TRUNCATE ".self::TABLE_NAME);
    }

    protected function getMenuRepository(): MenuRepository
    {
        if ($this->repository === null) {
            $this->repository = $this->getSymfony()->grabService(MenuRepository::class);
        }
        return $this->repository;
    }

    protected function getAllNodes(int $tree = 0): array
    {
        if ($tree == 0) {
            $tree = $this->treeId;
        }

        $sql = "SELECT * FROM menu WHERE tree = {$tree} ORDER BY lft;";
        return $this->getEntityManager()->getConnection()->fetchAll($sql);
    }

    protected function assetItem(int $lft, int $rgt, int $lvl, int $parentId, array $item): void
    {
        $this->assertEquals($item['lft'], $lft, "Lft: ({$item['lft']} != $lft)");
        $this->assertEquals($item['rgt'], $rgt, "Rgt: ({$item['rgt']} != $rgt)");
        $this->assertEquals($item['lvl'], $lvl, "Lvl: ({$item['lvl']} != $lvl)");
        $this->assertEquals($item['parent_id'], $parentId, "ParentId: ({$item['parent_id']} != $parentId)");
    }

    /*
     *  init node structure:
     *                      1.0 (1.22)
     *             ___________ | _________________
     *            /            |                  \
     *       1.2.0 (2.7)      -|- 1.3.0 (8.9) -- 1.4.0 (10.21)
     *      ______|_____                      ______|_______
     *     /            \                    /              \
     * 1.2.1 (3.4)   1.2.2 (5.6)      1.4.1 (11.14)     1.4.2 (15.20)
     *                                  /                 /         \
     *                              1.5.1 (12.13)    1.5.2 (16.17)  1.5.3 (18.19)
     */
    protected function initMenu(): void
    {
        $node1_0 = $this->getNode(self::FIRST_NODE_NAME);

        $node1_2_0 = $this->getNode("Node 1.2.0", $node1_0);
        $node1_2_1 = $this->getNode("Node 1.2.1", $node1_2_0);
        $node1_2_2 = $this->getNode("Node 1.2.2", $node1_2_0);

        $node1_3_0 = $this->getNode("Node 1.3.0", $node1_0);
        $node1_4_0 = $this->getNode("Node 1.4.0", $node1_0);

        $node1_4_1 = $this->getNode("Node 1.4.1", $node1_4_0);
        $node1_4_2 = $this->getNode("Node 1.4.2", $node1_4_0);

        $node1_5_1 = $this->getNode("Node 1.5.1", $node1_4_1);
        $node1_5_2 = $this->getNode("Node 1.5.2", $node1_4_2);
        $node1_5_3 = $this->getNode("Node 1.5.3", $node1_4_2);

        $this->assetsInitedNodes();
    }

    private function assetsInitedNodes(): void
    {
        $items = $this->getAllNodes();
        $this->assetItem(1, 22, 1, 0, $items[0]);
        $this->assetItem(2, 7, 2, 1, $items[1]);
        $this->assetItem(3, 4, 3, 2, $items[2]);
        $this->assetItem(5, 6, 3, 2, $items[3]);
        $this->assetItem(8, 9, 2, 1, $items[4]);
        $this->assetItem(10, 21, 2, 1, $items[5]);
        $this->assetItem(11, 14, 3, 6, $items[6]);
        $this->assetItem(12, 13, 4, 7, $items[7]);
        $this->assetItem(15, 20, 3, 6, $items[8]);
        $this->assetItem(16, 17, 4, 8, $items[9]);
        $this->assetItem(18, 19, 4, 8, $items[10]);

    }

    protected function initAssets(array $items): void
    {
        $str = "\n";
        foreach ($items as $i => $item)
        {
            $str .= "\$this->assetItem({$item['lft']}, {$item['rgt']}, {$item['lvl']}, {$item['parent_id']}, \$items[$i]);\n";
        }
        print $str;
        unset($str);
    }

    protected function getNode(string $name, ?NestedSetEntityInterface $parent = null): NestedSetEntityInterface
    {
        $menuNode = $this->getMenuRepository()->get($name);
        if (!empty($parent)) {
            $this->getEntityManager()->refresh($parent);
        }

        if (empty($menuNode)) {
            $menuNode = new Menu();
            $menuNode->setName($name);
        }
        $node = $this->getMenuRepository()->create($menuNode, $parent);
        return $node;
    }

    protected function move(string $nodeName, ?string $parentNodeName = null): void
    {
        $moveNode = $this->getMenuRepository()->get($nodeName);
        $parentNode = null;

        $this->getEntityManager()->refresh($moveNode);

        if ($parentNodeName !== null) {
            $parentNode = $this->getMenuRepository()->get($parentNodeName);
            $this->getEntityManager()->refresh($parentNode);
        }

        $this->getMenuRepository()->move($moveNode, $parentNode);
        $this->moveAsset();
    }
}