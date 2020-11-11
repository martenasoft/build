<?php

namespace App\Tests\unit\Menu;

use MartenaSoft\Menu\Entity\Menu;
use MartenaSoft\NestedSets\Entity\NodeInterface;

trait HelperMenuTrait
{
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
    protected function initMenu(int $tree = 1): void
    {
        $node1_0 = $this->getNode(self::FIRST_NODE_NAME, null, $tree);

        $node1_2_0 = $this->getNode("Node 1.2.0", $node1_0, $tree);
        $node1_2_1 = $this->getNode("Node 1.2.1", $node1_2_0, $tree);
        $node1_2_2 = $this->getNode("Node 1.2.2", $node1_2_0, $tree);

        $node1_3_0 = $this->getNode("Node 1.3.0", $node1_0, $tree);
        $node1_4_0 = $this->getNode("Node 1.4.0", $node1_0, $tree);

        $node1_4_1 = $this->getNode("Node 1.4.1", $node1_4_0, $tree);
        $node1_4_2 = $this->getNode("Node 1.4.2", $node1_4_0, $tree);

        $node1_5_1 = $this->getNode("Node 1.5.1", $node1_4_1, $tree);
        $node1_5_2 = $this->getNode("Node 1.5.2", $node1_4_2, $tree);
        $node1_5_3 = $this->getNode("Node 1.5.3", $node1_4_2, $tree);


        $assetItemsArray = $this->getAllNodes();

        $this->assetItem([
            'id' => 1,
            'name' => 'Node 1.0',
            'lft' => 1,
            'rgt' => 22,
            'lvl' => 1,
            'tree' => 1,
            'parent_id' => 0
        ], $assetItemsArray[0]);
        $this->assetItem([
            'id' => 2,
            'name' => 'Node 1.2.0',
            'lft' => 2,
            'rgt' => 7,
            'lvl' => 2,
            'tree' => 1,
            'parent_id' => 1
        ], $assetItemsArray[1]);
        $this->assetItem([
            'id' => 3,
            'name' => 'Node 1.2.1',
            'lft' => 3,
            'rgt' => 4,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 2
        ], $assetItemsArray[2]);
        $this->assetItem([
            'id' => 4,
            'name' => 'Node 1.2.2',
            'lft' => 5,
            'rgt' => 6,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 2
        ], $assetItemsArray[3]);
        $this->assetItem([
            'id' => 5,
            'name' => 'Node 1.3.0',
            'lft' => 8,
            'rgt' => 9,
            'lvl' => 2,
            'tree' => 1,
            'parent_id' => 1
        ], $assetItemsArray[4]);
        $this->assetItem([
            'id' => 6,
            'name' => 'Node 1.4.0',
            'lft' => 10,
            'rgt' => 21,
            'lvl' => 2,
            'tree' => 1,
            'parent_id' => 1
        ], $assetItemsArray[5]);
        $this->assetItem([
            'id' => 7,
            'name' => 'Node 1.4.1',
            'lft' => 11,
            'rgt' => 14,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 6
        ], $assetItemsArray[6]);
        $this->assetItem([
            'id' => 9,
            'name' => 'Node 1.5.1',
            'lft' => 12,
            'rgt' => 13,
            'lvl' => 4,
            'tree' => 1,
            'parent_id' => 7
        ], $assetItemsArray[7]);
        $this->assetItem([
            'id' => 8,
            'name' => 'Node 1.4.2',
            'lft' => 15,
            'rgt' => 20,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 6
        ], $assetItemsArray[8]);
        $this->assetItem([
            'id' => 10,
            'name' => 'Node 1.5.2',
            'lft' => 16,
            'rgt' => 17,
            'lvl' => 4,
            'tree' => 1,
            'parent_id' => 8
        ], $assetItemsArray[9]);
        $this->assetItem([
            'id' => 11,
            'name' => 'Node 1.5.3',
            'lft' => 18,
            'rgt' => 19,
            'lvl' => 4,
            'tree' => 1,
            'parent_id' => 8
        ], $assetItemsArray[10]);
    }

    protected function initAssets(array $items): void
    {
        $str = "\n\n\$this->assetItemsArray = \$items;\n";
        foreach ($items as $i => $item) {
            if (!isset($item['parent_id']) && isset($item['parentId'])) {
                $item['parent_id'] = $item['parentId'];
            }

            $arg = '';
            foreach ($item as $key => $value) {
                $arg .= (!empty($arg) ? ',' : '') . "'$key'=>" . (is_numeric($value) ? $value : "'$value'");
            }
            $str .= "\$this->assetItem([$arg]);\n";

        }
        print $str;
        unset($str);
    }

    protected function getAllNodes(int $tree = 0): array
    {
        if ($tree == 0) {
            $tree = $this->treeId;
        }

        $sql = "SELECT * FROM menu WHERE tree = {$tree} ORDER BY lft;";
        return $this->getEntityManager()->getConnection()->fetchAll($sql);
    }

    protected function getNode(string $name, ?NodeInterface $parent = null, int $tree = 1): NodeInterface
    {
        $menuNode = $this->getMenuRepository()->findOneBy(['name'=>$name, 'tree'=>$tree]);
        if (!empty($parent)) {
            $this->getEntityManager()->refresh($parent);
        }

        if (empty($menuNode)) {
            $menuNode = new Menu();
            $menuNode->setName($name);
            $menuNode->setTree($tree);
        }
        $node = $this->getMenuRepository()->create($menuNode, $parent);
        return $node;
    }

}