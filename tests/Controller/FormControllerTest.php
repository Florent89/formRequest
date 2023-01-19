<?php

namespace App\Tests;

use App\Form\InformationFormType;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class FormControllerTest extends WebTestCase
{
    /**
     * Test de la route de la page home
     */
    public function testShowHome()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('html h1', 'Hello YouMonKeez!');
        
    }
    public function testForm()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/information');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('html h1',"Formulaire de recueil d'informations");

        $submitBtn = $crawler->selectButton(('Soumettre'));
        $form = $submitBtn->form();

        $form['information_form[name]'] = 'TestNom';
        $form['information_form[firstname]'] = 'Toto';
        $form['information_form[email]'] = 'Toto@te.te';
        $form['information_form[phone_number]'] = '';
        $form['information_form[city]'] = 'Angers';
        $form['information_form[film]'] = 'OSS 117';
        $form['information_form[citation]'] = 'Le mambo';

        $client->submit($form);

        $this->assertEquals(303, $client->getResponse()->getStatusCode());

        $client->followRedirect();

        $this->assertSelectorTextContains('html h1', 'Bravo vous faites parti de la bande');
        
    }

    
}