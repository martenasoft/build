<?php

namespace App\Tests;

use App\Tests\unit\AbstractMenuUnit;
use MartenaSoft\Common\Entity\NestedSetEntityInterface;
use MartenaSoft\Menu\Entity\Menu;
use MartenaSoft\Menu\Repository\MenuRepository;

class MenuMoveTest extends AbstractMenuUnit
{
    protected $tester;

    private MenuRepository $repository;

    public function testMenuMove(): void
    {
        $this->menuRepository = $this->getMenuRepository();

        $this->initMenu();
    }

    /*
     *  init node structure:
     *                      1.0 (1.18)
     *             ___________ | _________________
     *            /            |                  \
     *       1.2.0 (2.7)      -|- 1.3.0 (8.9) -- 1.4.0 (10.17)
     *      ______|_____                     ______|_______
     *     /            \                   /              \
     * 1.2.1 (3.4)   1.2.2 (5.6)      1.4.1 (11.12)     1.4.2 (11.16)
     *                                 /                 /         \
     *                              1.5.1 (11.13)    1.5.2 (11.14)  1.5.3 (11.15)
     */
    private function initMenu(): void
    {
        $node1_0 = $this->getNode("Node 1.0");
        $node1_2_0 = $this->getNode("Node 1.2.0", $node1_0);
        $node1_2_1 = $this->getNode("Node 1.2.1", $node1_2_0);
        $node1_2_2 = $this->getNode("Node 1.2.2", $node1_2_0);

        $node1_3_0 = $this->getNode("Node 1.3.0", $node1_0);
        $node1_4_0 = $this->getNode("Node 1.4.0", $node1_0);

        $node1_4_1 = $this->getNode("Node 1.4.1", $node1_4_0);
        $node1_4_2 = $this->getNode("Node 1.4.1", $node1_4_0);

        $node1_5_1 = $this->getNode("Node 1.5.1", $node1_4_1);
        $node1_5_2 = $this->getNode("Node 1.5.2", $node1_4_2);
        $node1_5_3 = $this->getNode("Node 1.5.3", $node1_4_2);


         $this->getEntityManager()->refresh($node1_0);
    }

    private function getNode(string $name, ?NestedSetEntityInterface $parent = null): Menu
    {
        $menuNode = $this->menuRepository->get($name);

        if (empty($menuNode)) {
            $menuNode = new Menu();
            $menuNode->setName($name);
        }

        return $this->menuRepository->create($menuNode, $parent);
    }
}