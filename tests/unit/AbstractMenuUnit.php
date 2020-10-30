<?php

namespace App\Tests\unit;

use MartenaSoft\Menu\Repository\MenuRepository;

abstract class AbstractMenuUnit extends AbstractSymfonyUnit
{
    public function getMenuRepository(): MenuRepository
    {
        return $this->getSymfony()->grabService(MenuRepository::class);
    }
}