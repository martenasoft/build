<?php

namespace App\Tests\unit\Menu\CreateDelete;

use App\Repository\HolderRepository;
use App\Repository\ParseSettingRepository;
use MartenaSoft\Menu\Entity\Menu;
use Codeception\Util\Debug;
use MartenaSoft\Menu\Entity\MenuInterface;

class MenuCreateTest extends AbstractCreateDelete
{
    protected string $name1 = 'Test node 1';
    protected string $name2 = 'Test node 2';

    public function testRun(): void
    {
        $menuNode = $this->getMenuRepository()->findOneByName($this->name1);
        if (empty($menuNode)) {
            $menuNode = new Menu();
            $menuNode->setName($this->name1);
        }

        $newNode = $this->create($menuNode);

        $menuNode2 = $this->getMenuRepository()->findOneByName($this->name2);

        if (!$menuNode2) {
            $menuNode2 = new Menu();
            $menuNode2->setName($this->name2);
        }

        $this->create($menuNode, $newNode);
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

    protected function create(MenuInterface $menu, ?MenuInterface $parent = null): MenuInterface
    {
        return $this->getMenuRepository()->create($menu, $parent);
    }
}
