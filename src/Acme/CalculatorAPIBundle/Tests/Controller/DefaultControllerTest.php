<?php

namespace Acme\CalculatorAPIBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/calculator/v1/3/2/add.json');

        $aOperation = array(
            'left' => 3,
            'right' => 2,
            'operator' => array(
                'id' => 'add',
                'label' => '+',
            ),
            'result' => 5
        );

        $this->assertThat(
            $client->getInternalResponse()->getContent(),
            $this->equalTo(json_encode(array('operation' => $aOperation)))
        );
    }
}
