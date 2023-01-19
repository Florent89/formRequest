<?php

namespace App\Tests\Entity;

use App\Entity\Information;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class InformationTest extends KernelTestCase
{
    public function testValidEntity()
    {
        $info = (new Information())
            ->setName('Bono')
            ->setFirstName('Jean')
            ->setCity('Tiercé')
            ->setPhoneNumber('02020202')
            ->setFilm('La cité de la peur')
            ->setCitation('Bonjour à tous les tests !');
        self::bootKernel();
        $error = self::$container->get('validator')->validate($info);
        $this->assertCount(0, $error);
    }
}