<?php

namespace Acme\CalculatorBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/compute?left=3&operator=add&right=2');

        $this->assertTrue($crawler->filter('html:contains("= 5")')->count() > 0);
    }
}
