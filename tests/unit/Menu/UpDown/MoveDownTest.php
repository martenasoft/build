<?php

namespace App\Tests\unit\Menu\UpDown;

class MoveDownTest extends AbstractMoveUpDownBase
{
    protected int $userId = 2;

    protected function moveTo(): void
    {
        $this->getMenuRepository()->upDown($this->firstNode, false);
    }

    protected function moveAsset(): void
    {
        $this->assetItem([
            'id' => 1,
            'config_id' => '',
            'name' => 'Node 1.0',
            'lft' => 1,
            'rgt' => 22,
            'lvl' => 1,
            'tree' => 1,
            'parent_id' => 0,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 3,
            'config_id' => '',
            'name' => 'Node 1.2.1',
            'lft' => 2,
            'rgt' => 7,
            'lvl' => 2,
            'tree' => 1,
            'parent_id' => 1,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 2,
            'config_id' => '',
            'name' => 'Node 1.2.0',
            'lft' => 3,
            'rgt' => 4,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 3,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 4,
            'config_id' => '',
            'name' => 'Node 1.2.2',
            'lft' => 5,
            'rgt' => 6,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 3,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 5,
            'config_id' => '',
            'name' => 'Node 1.3.0',
            'lft' => 8,
            'rgt' => 9,
            'lvl' => 2,
            'tree' => 1,
            'parent_id' => 1,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 6,
            'config_id' => '',
            'name' => 'Node 1.4.0',
            'lft' => 10,
            'rgt' => 21,
            'lvl' => 2,
            'tree' => 1,
            'parent_id' => 1,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 7,
            'config_id' => '',
            'name' => 'Node 1.4.1',
            'lft' => 11,
            'rgt' => 14,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 6,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 9,
            'config_id' => '',
            'name' => 'Node 1.5.1',
            'lft' => 12,
            'rgt' => 13,
            'lvl' => 4,
            'tree' => 1,
            'parent_id' => 7,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 8,
            'config_id' => '',
            'name' => 'Node 1.4.2',
            'lft' => 15,
            'rgt' => 20,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 6,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 10,
            'config_id' => '',
            'name' => 'Node 1.5.2',
            'lft' => 16,
            'rgt' => 17,
            'lvl' => 4,
            'tree' => 1,
            'parent_id' => 8,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 11,
            'config_id' => '',
            'name' => 'Node 1.5.3',
            'lft' => 18,
            'rgt' => 19,
            'lvl' => 4,
            'tree' => 1,
            'parent_id' => 8,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);;
    }
}