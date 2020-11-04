<?php

namespace App\Tests\unit\Menu;

use Codeception\Util\Debug;
use MartenaSoft\NestedSets\Entity\NodeInterface;

class UpTest extends AbstractMenuUnit
{
    private ?NodeInterface $firstNode = null;
    public function testRun(): void
    {
        $this->firstNode = $this->getMenuUpDownRepository()->find(1);
        $this->getMenuUpDownRepository()->up($this->firstNode );

        $this->moveAsset();
    }

    protected function moveAsset(): void
    {
        $items = $this
            ->getMenuUpDownRepository()
            ->createQueryBuilder('m')
            ->orderBy('m.lft', 'asc')
            ->getQuery()
            ->getArrayResult()
            ;
        Debug::debug($items);
        die;
    }
}