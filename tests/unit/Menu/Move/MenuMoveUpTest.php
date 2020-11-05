<?php

namespace App\Tests;

use App\Tests\unit\AbstractMenuUnit;

class MenuMoveUpTest extends AbstractMenuUnit
{
    private const NODE_NAME_1 = "Node 1.2.2";
    private const NODE_NAME_2 = "Node 1.2.0";

    public function testRun()
    {
        $moveNode = $this->getMenuRepository()->get(self::NODE_NAME_1);
        $this->getEntityManager()->refresh($moveNode);

        $this->getMenuRepository()->up($moveNode);

        $this->moveAsset();
    }

    protected function moveAsset(): void
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

        $this->assertEquals($items[1]['name'], self::NODE_NAME_1);
        $this->assertEquals($items[3]['name'], self::NODE_NAME_2);
    }
}