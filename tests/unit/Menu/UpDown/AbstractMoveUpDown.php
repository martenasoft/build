<?php

namespace App\Tests\unit\Menu\UpDown;

use App\Tests\unit\Menu\AbstractMenuUnit;
use MartenaSoft\NestedSets\Entity\NodeInterface;

abstract class AbstractMoveUpDown extends AbstractMenuUnit
{
    protected ?NodeInterface $firstNode = null;
    protected int $userId = 2;

    public function testRun(): void
    {
        $this->firstNode = $this->getMenuUpDownRepository()->find($this->userId);
        $this->moveTo();
        $this->assetItemsArray = $this
            ->getMenuUpDownRepository()
            ->createQueryBuilder('m')
            ->orderBy('m.lft', 'asc')
            ->getQuery()
            ->getArrayResult();
        $this->moveAsset();
    }

    abstract protected function moveTo(): void;
}