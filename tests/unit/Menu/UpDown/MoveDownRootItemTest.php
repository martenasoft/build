<?php

namespace App\Tests\unit\Menu\UpDown;

class MoveDownRootItemTest extends AbstractClassMoveUpDownRoot
{
    protected int $userId = 1;

    protected function moveTo(): void
    {
        $this->getMenuRepository()->upDown($this->firstNode);
    }
}