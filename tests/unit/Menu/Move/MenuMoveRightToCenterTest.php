<?php

namespace App\Tests\unit\Menu\Move;

use App\Tests\unit\AbstractMenuUnit;
use App\Tests\unit\Menu\Move\AbstractMoveMenu;
use Codeception\Util\Debug;

/*------------------------------------------------------------------------------------
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
* ------------------------------------------------------------------------------------
*/

class MenuMoveRightToCenterTest extends AbstractMoveMenu
{
    /* id: lft.rgt :lvl :parent_id
     *  move every right nodes under the middle column
     *                                                1.0 (1:  1.22 :1 :0)
     *             ______________________________________________|_________________________
     *            /                                              |                         \
     *       1.2.0 (2: 2.7 :2 :1)                      1.3.0 (5: 8.21 :2 :1)
     *                 |                                         |                       <<<
     *                 |                               1.4.0 (6: 9.20 :3 :5)
     *      ___________|__________                     __________|_______________________
     *     /                      \                   /                                  \
     * 1.2.1 (3: 3.4 :3: 2)   1.2.2 (4: 5.6 :3 :2) | 1.4.1 (7: 10.13 :4 :6)   |         1.4.2 (8: 14.19 : 4: 6)
     *                                             |          /               |        /                \
     *                                             |  1.5.1 (9: 11.12 :5 :7)  |  1.5.2              |  1.5.3
     *                                                                           (10: 15.16 :5 :8)  |(11: 17.18 :5 :8)
     */
    public function testRun(): void
    {
        $this->move("Node 1.4.0", "Node 1.3.0");
    }

    protected function moveAsset(): void
    {
        $this->assetItemsArray = $this->getAllNodes();
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
            'id' => 2,
            'config_id' => '',
            'name' => 'Node 1.2.0',
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
            'id' => 3,
            'config_id' => '',
            'name' => 'Node 1.2.1',
            'lft' => 3,
            'rgt' => 4,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 2,
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
            'parent_id' => 2,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 5,
            'config_id' => '',
            'name' => 'Node 1.3.0',
            'lft' => 8,
            'rgt' => 21,
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
            'lft' => 9,
            'rgt' => 20,
            'lvl' => 3,
            'tree' => 1,
            'parent_id' => 5,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);
        $this->assetItem([
            'id' => 7,
            'config_id' => '',
            'name' => 'Node 1.4.1',
            'lft' => 10,
            'rgt' => 13,
            'lvl' => 4,
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
            'lft' => 11,
            'rgt' => 12,
            'lvl' => 5,
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
            'lft' => 14,
            'rgt' => 19,
            'lvl' => 4,
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
            'lft' => 15,
            'rgt' => 16,
            'lvl' => 5,
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
            'lft' => 17,
            'rgt' => 18,
            'lvl' => 5,
            'tree' => 1,
            'parent_id' => 8,
            'is_deleted' => 0,
            'route' => '',
            'url' => ''
        ]);


    }
}