<?php

namespace App\Tests\unit;

use Codeception\Module\Symfony;
use Codeception\Test\Unit;
use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractSymfonyUnit extends Unit
{
    private Symfony $symfony;
    private EntityManagerInterface $entityManager;

    protected function _before()
    {
        $this->symfony = $this->getModule('Symfony');
        $this->entityManager = $this->symfony->grabService(EntityManagerInterface::class);
    }

    public function getSymfony(): Symfony
    {
        return $this->symfony;
    }

    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }
}