<?php

namespace CarnetVoyage\MapBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals('CarnetVoyage\MapBundle\Controller\MapController::indexAction', $client->getRequest()->attributes->get('_controller'));
		
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());

        //$this->assertEquals(1, $crawler->filter('h1:contains("Bienvenue sur votre carnet de voyage")')->count());
        //$this->assertTrue($crawler->filter('html:contains("Bienvenue")')->count() > 0);
    }
	
	public function testAddTrip()
	{
		$client = static::createClient();
		
		$crawler = $client->request('GET', '/newTrip');
		
		$this->assertTrue($crawler->filter('html:contains("Ajouter")')->count() > 0);
	}
	
	public function testSeeCountry()
	{
		$client = static::createClient();
		
		$crawler = $client->request('GET', '/seeCountry/2');
		
		$this->assertTrue($crawler->filter('html:contains("France")')->count() > 0);
	}
	
	public function testModifyTrip()
	{
		$client = static::createClient();
		
		$crawler = $client->request('GET', '/modifyTrip/1');
		
		$this->assertTrue($crawler->filter('html:contains("Modifier")')->count() > 0);
	}
}
