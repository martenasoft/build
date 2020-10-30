<?php
namespace App\Tests\unit;

use App\Repository\HolderRepository;
use Codeception\Test\Unit;
use Codeception\Module\Symfony;
use App\Service\saver\SaverServiceInterface;
use App\Repository\ParseSettingRepository;
use Codeception\Util\Debug;
use Doctrine\ORM\EntityManagerInterface;
use MartenaSoft\Menu\Entity\Menu;
use MartenaSoft\Menu\Repository\MenuRepository;

class MenuCreateTest extends Unit
{
    protected $tester;
    private Symfony $symfony;
    private MenuRepository $menuRepository;
    private EntityManagerInterface $entityManager;

    protected function _before()
    {
        $this->symfony = $this->getModule('Symfony');
        $this->entityManager = $this->symfony->grabService(EntityManagerInterface::class);
        $this->menuRepository = $this->symfony->grabService(MenuRepository::class);
    }

    public function testRun()
    {
        $name1 = 'Test node 1';
        $name2 = 'Test node 2';

        $menuNode = $this->menuRepository->get($name1);
        if (empty($menuNode)) {
            $menuNode = new Menu();
            $menuNode->setName($name1);
        }

        $newNode = $this->menuRepository->create($menuNode);
        $menuNode2 = $this->menuRepository->get($name2);

        if (!$menuNode2) {
            $menuNode2 = new Menu();
            $menuNode2->setName($name2);
        }

        $newNode2 = $this->menuRepository->create($menuNode2, $newNode);
        $this->entityManager->refresh($newNode);
        $items = $this
            ->menuRepository
            ->getItemsQueryBuilder($newNode)
            ->getQuery()
            ->getResult()
        ;

        $this->assertNotEmpty($items);

        $this->assertEquals($newNode->getLft(), 1);
        $this->assertEquals($items[0]->getLft(), 2);
        $this->assertEquals($items[0]->getRgt(), 3);
        $this->assertEquals($newNode->getRgt(), 4);

        $this->assertEquals($newNode->getLvl(), 1);
        $this->assertEquals($items[0]->getLvl(), 2);
    }
}