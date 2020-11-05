<?php

namespace App\Tests;

use App\Tests\unit\AbstractMenuUnit;
use App\Tests\unit\Menu\Move\AbstractMoveMenu;
use Codeception\Util\Debug;

/*
*  it was created menu structure (see method App\Tests\unit\AbstractMenuUnit\_befor()):
*
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

class MenuMoveRightToLeftTest extends AbstractMoveMenu
{

    /*
     *  move every right nodes under the left:
     *                      1.0 (1.22 )
     *             ___________ | _________________
     *            /     <<<   <<<  <<<    <<<     \
     *       1.2.0 (2.19)      -|- 1.3.0 (20.21)
     *           |______________________________
     *                 |             /          \
     *            1.4.0 (3.14)  1.2.1 (15.16)   1.2.2 (17.18)
     *           ______|_______
     *          /              \
     *     1.4.1 (4.7)     1.4.2 (8.13)
     *       /                 /       \
     * 1.4.0 (5.6)    1.4.1 (9.10)    1.4.2 (11.12)
     *
     *
     */
    public function testRun(): void
    {
        $this->move("Node 1.4.0", "Node 1.2.0");
    }

    protected function moveAsset(): void
    {
        $this->assetItemsArray = $this->getAllNodes();
        $this->assetItem([
            'id' => 1,
            'name' => 'Node 1.0',
            'lft' => 1,
            'rgt' => 22,
            'lvl' => 1,
            'tree' => 1,
            'parent_id' => 0
        ]);
        $this->assetItem([
            'id' => 2,
            'name' => 'Node 1.2.0',
            'lft' => 2,
            'rgt' => 19,
            'lvl' => 2,
            'tree' => 1,
            'parent_id' => 1
        ]);
        $this->assetItem([
            'id' => 6,
            'name' => 'Node 1.4.0',
            'lft' => 3,
            'rgt' => 14,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 2
        ]);
        $this->assetItem([
            'id' => 7,
            'name' => 'Node 1.4.1',
            'lft' => 4,
            'rgt' => 7,
            'lvl' => 4,
            'tree' => 1,
            'parent_id' => 6
        ]);
        $this->assetItem([
            'id' => 9,
            'name' => 'Node 1.5.1',
            'lft' => 5,
            'rgt' => 6,
            'lvl' => 5,
            'tree' => 1,
            'parent_id' => 7
        ]);
        $this->assetItem([
            'id' => 8,
            'name' => 'Node 1.4.2',
            'lft' => 8,
            'rgt' => 13,
            'lvl' => 4,
            'tree' => 1,
            'parent_id' => 6
        ]);
        $this->assetItem([
            'id' => 10,
            'name' => 'Node 1.5.2',
            'lft' => 9,
            'rgt' => 10,
            'lvl' => 5,
            'tree' => 1,
            'parent_id' => 8
        ]);
        $this->assetItem([
            'id' => 11,
            'name' => 'Node 1.5.3',
            'lft' => 11,
            'rgt' => 12,
            'lvl' => 5,
            'tree' => 1,
            'parent_id' => 8
        ]);
        $this->assetItem([
            'id' => 3,
            'name' => 'Node 1.2.1',
            'lft' => 15,
            'rgt' => 16,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 2
        ]);
        $this->assetItem([
            'id' => 4,
            'name' => 'Node 1.2.2',
            'lft' => 17,
            'rgt' => 18,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 2
        ]);
        $this->assetItem([
            'id' => 5,
            'name' => 'Node 1.3.0',
            'lft' => 20,
            'rgt' => 21,
            'lvl' => 2,
            'tree' => 1,
            'parent_id' => 1
        ]);
    }
}
