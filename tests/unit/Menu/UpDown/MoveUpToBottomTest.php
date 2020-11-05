<?php

namespace App\Tests\unit\Menu\UpDown;

class MoveUpToBottomTest extends AbstractMoveUpDown
{
    protected int $userId = 1;

    protected function moveTo(): void
    {
        $this->getMenuRepository()->change($this->firstNode);
    }

    protected function moveAsset(): void
    {
        $this->assetItem(
            [
                'id' => 11,
                'name' => 'Node 1.5.3',
                'lft' => 1,
                'rgt' => 22,
                'lvl' => 1,
                'tree' => 1,
                'parentId' => 0,
                'parent_id' => 0
            ]
        );
        $this->assetItem(
            [
                'id' => 2,
                'name' => 'Node 1.2.0',
                'lft' => 2,
                'rgt' => 7,
                'lvl' => 2,
                'tree' => 1,
                'parentId' => 11,
                'parent_id' => 11
            ]
        );
        $this->assetItem(
            [
                'id' => 3,
                'name' => 'Node 1.2.1',
                'lft' => 3,
                'rgt' => 4,
                'lvl' => 3,
                'tree' => 1,
                'parentId' => 2,
                'parent_id' => 2
            ]
        );
        $this->assetItem(
            [
                'id' => 4,
                'name' => 'Node 1.2.2',
                'lft' => 5,
                'rgt' => 6,
                'lvl' => 3,
                'tree' => 1,
                'parentId' => 2,
                'parent_id' => 2
            ]
        );
        $this->assetItem(
            [
                'id' => 5,
                'name' => 'Node 1.3.0',
                'lft' => 8,
                'rgt' => 9,
                'lvl' => 2,
                'tree' => 1,
                'parentId' => 11,
                'parent_id' => 11
            ]
        );
        $this->assetItem(
            [
                'id' => 6,
                'name' => 'Node 1.4.0',
                'lft' => 10,
                'rgt' => 21,
                'lvl' => 2,
                'tree' => 1,
                'parentId' => 11,
                'parent_id' => 11
            ]
        );
        $this->assetItem(
            [
                'id' => 7,
                'name' => 'Node 1.4.1',
                'lft' => 11,
                'rgt' => 14,
                'lvl' => 3,
                'tree' => 1,
                'parentId' => 6,
                'parent_id' => 6
            ]
        );
        $this->assetItem(
            [
                'id' => 9,
                'name' => 'Node 1.5.1',
                'lft' => 12,
                'rgt' => 13,
                'lvl' => 4,
                'tree' => 1,
                'parentId' => 7,
                'parent_id' => 7
            ]
        );
        $this->assetItem(
            [
                'id' => 8,
                'name' => 'Node 1.4.2',
                'lft' => 15,
                'rgt' => 20,
                'lvl' => 3,
                'tree' => 1,
                'parentId' => 6,
                'parent_id' => 6
            ]
        );
        $this->assetItem(
            [
                'id' => 10,
                'name' => 'Node 1.5.2',
                'lft' => 16,
                'rgt' => 17,
                'lvl' => 4,
                'tree' => 1,
                'parentId' => 8,
                'parent_id' => 8
            ]
        );
        $this->assetItem(
            [
                'id' => 1,
                'name' => 'Node 1.0',
                'lft' => 18,
                'rgt' => 19,
                'lvl' => 4,
                'tree' => 1,
                'parentId' => 8,
                'parent_id' => 8
            ]
        );
    }
}
