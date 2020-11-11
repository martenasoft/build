<?php

namespace App\Tests\unit\Menu\UpDown;

abstract class AbstractClassMoveUpDownRoot extends AbstractMoveUpDownBase
{
    protected array $allNodesTree1 = [];
    protected array $allNodesTree2 = [];

    protected function _before()
    {
        parent::_before();
        $this->initMenu(2);
    }

    protected function commonAssets(int $id1, int $id2, int $tree1, int $tree2): void
    {
        $this->allNodesTree1 = $this->getAllNodes();
        $this->allNodesTree2 = $this->getAllNodes(2);

        $this->assertEquals($this->allNodesTree1[0]['id'], $id1);
        $this->assertEquals($this->allNodesTree2[0]['id'], $id2);
        $this->assertEquals($this->allNodesTree1[0]['tree'], $tree1);
        $this->assertEquals($this->allNodesTree2[0]['tree'], $tree2);
    }

    protected function moveAsset(): void
    {
        $this->commonAssets(12, 1, 1, 2);
    }
}
