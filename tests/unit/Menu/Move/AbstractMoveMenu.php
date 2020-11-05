<?php

namespace App\Tests\unit\Menu\Move;

use App\Tests\unit\Menu\AbstractMenuUnit;
use App\Tests\unit\Menu\HelperMenuTrait;

abstract class AbstractMoveMenu extends AbstractMenuUnit
{
    use HelperMenuTrait;

    protected function _before()
    {
        parent::_before();
        $this->truncateMenuTable();
        $this->initMenu();
    }

    protected function move(string $nodeName, ?string $parentNodeName = null): void
    {
        $moveNode = $this->getMenuRepository()->findOneByName($nodeName);
        $parentNode = null;

        $this->getEntityManager()->refresh($moveNode);

        if ($parentNodeName !== null) {
            $parentNode = $this->getMenuRepository()->findOneByName($parentNodeName);
            $this->getEntityManager()->refresh($parentNode);
        }

        $this->getMenuRepository()->move($moveNode, $parentNode);
        $this->moveAsset();
    }

}