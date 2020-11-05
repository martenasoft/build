<?php

namespace App\Tests\unit\Menu;

use App\Tests\unit\AbstractSymfonyUnit;
use MartenaSoft\Menu\Repository\MenuRepository;
use MartenaSoft\Menu\Repository\MenuUpDownRepositoryNestedSets;
use Codeception\Util\Debug;

abstract class AbstractMenuUnit extends AbstractSymfonyUnit
{
    protected const FIRST_NODE_NAME = "Node 1.0";
    protected const TABLE_NAME = "menu";
    protected $treeId = 1;
    protected array $assetItemsArray = [];

    abstract public function testRun(): void;

    /*abstract protected function moveAsset(): void;*/

    protected function truncateMenuTable(): void
    {
        $this->getEntityManager()->getConnection()->exec("TRUNCATE " . self::TABLE_NAME);
    }

    protected function getMenuRepository(): MenuRepository
    {
        return $this->getSymfony()->grabService(MenuRepository::class);
    }

    protected function assetItem(array $fields, ?array $assetArrayItem = null): void
    {
        if ($assetArrayItem === null) {

            $this->assertNotEmpty($this->assetItemsArray);
            $assetArrayItem = array_shift($this->assetItemsArray);
        }

        foreach ($fields as $key => $item) {
            if (isset($assetArrayItem[$key])) {
                $this->assertEquals($assetArrayItem[$key], $item, "{$key}: {$assetArrayItem[$key]} != $item");
            }
        }
    }
}
