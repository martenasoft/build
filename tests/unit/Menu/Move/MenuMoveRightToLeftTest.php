<?php

namespace App\Tests;

use App\Tests\unit\AbstractMenuUnit;
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

class MenuMoveRightToLeftTest extends AbstractMenuUnit
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
        $items = $this->getAllNodes();

        $this->assetItem(1, 22, 1, 0, $items[0]);
        $this->assetItem(2, 19, 2, 1, $items[1]);
        $this->assetItem(3, 14, 3, 2, $items[2]);
        $this->assetItem(4, 7, 4, 6, $items[3]);
        $this->assetItem(5, 6, 5, 7, $items[4]);
        $this->assetItem(8, 13, 4, 6, $items[5]);
        $this->assetItem(9, 10, 5, 8, $items[6]);
        $this->assetItem(11, 12, 5, 8, $items[7]);
        $this->assetItem(15, 16, 3, 2, $items[8]);
        $this->assetItem(17, 18, 3, 2, $items[9]);
        $this->assetItem(20, 21, 2, 1, $items[10]);
    }
}