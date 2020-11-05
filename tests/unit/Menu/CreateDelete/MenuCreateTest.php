<?php

namespace App\Tests\unit\Menu\CreateDelete;

use App\Repository\HolderRepository;
use App\Repository\ParseSettingRepository;
use MartenaSoft\Menu\Entity\Menu;
use Codeception\Util\Debug;

class MenuCreateTest extends AbstractCreateDelete
{
    public function testRun(): void
    {
        $name1 = 'Test node 1';
        $name2 = 'Test node 2';

        $menuNode = $this->getMenuRepository()->findOneByName($name1);
        if (empty($menuNode)) {
            $menuNode = new Menu();
            $menuNode->setName($name1);
        }

        $newNode = $this->getMenuRepository()->create($menuNode);

        $menuNode2 = $this->getMenuRepository()->findOneByName($name2);

        if (!$menuNode2) {
            $menuNode2 = new Menu();
            $menuNode2->setName($name2);
        }

        $this->getMenuRepository()->create($menuNode2, $newNode);
        $this->getEntityManager()->refresh($newNode);
        $items = $this->getAllNodes();

        $this->assetItemsArray = $items;
        $this->assetItem([
            'id' => 1,
            'name' => 'Test node 1',
            'lft' => 1,
            'rgt' => 4,
            'lvl' => 1,
            'tree' => 1,
            'parent_id' => 0
        ]);
        $this->assetItem([
            'id' => 2,
            'name' => 'Test node 2',
            'lft' => 2,
            'rgt' => 3,
            'lvl' => 2,
            'tree' => 1,
            'parent_id' => 1
        ]);
    }
}