<?php

namespace App\Tests\unit\Menu;

use App\Tests\unit\AbstractMenuUnit;
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

class MenuMoveRightToCenterTest extends AbstractMenuUnit
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
        $items = $this->getAllNodes();



        /*$this->assetItem(1, 22, 1, 0, $items[0]);
        $this->assetItem(2, 7, 2, 1, $items[1]);
        $this->assetItem(3, 4, 3, 2, $items[2]);
        $this->assetItem(5, 6, 3, 2, $items[3]);
        $this->assetItem(8, 21, 2, 1, $items[4]);
        $this->assetItem(9, 20, 3, 5, $items[5]);
        $this->assetItem(10, 13, 4, 6, $items[6]);
        $this->assetItem(11, 12, 5, 7, $items[7]);
        $this->assetItem(14, 19, 4, 6, $items[8]);
        $this->assetItem(15, 16, 5, 8, $items[9]);
        $this->assetItem(17, 18, 5, 8, $items[10]);*/
    }
}