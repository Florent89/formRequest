<?php

namespace App\Tests\Repository;

use App\Repository\InformationRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class InformationRepositoryTest extends KernelTestCase
{
    public function testCount()
    {
        self::bootKernel();
        $informations = self::$container->get(InformationRepository::class)->count([]);
        $this->assertEquals(6, $informations);
    }
}