<?php

namespace App\Tests\unit\Menu\UpDown;

class MoveUpRootItemTest extends AbstractClassMoveUpDownRoot
{
    protected int $userId = 12;

    protected function moveTo(): void
    {
        $this->getMenuRepository()->upDown($this->firstNode);
    }
}
