<?php

namespace App\Tests\unit\Menu\CreateDelete;

use App\Tests\unit\Menu\AbstractMenuUnit;
use App\Tests\unit\Menu\HelperMenuTrait;
use MartenaSoft\Menu\Entity\MenuInterface;

abstract class AbstractCreateDelete extends AbstractMenuUnit
{
    use HelperMenuTrait;
    protected function _before()
    {
        parent::_before();
        $this->truncateMenuTable();
    }

    abstract protected function create(MenuInterface $menu, ?MenuInterface $parent = null): MenuInterface;
}
