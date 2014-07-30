<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 30/07/2014
 * Time: 12:04
 */

namespace Acme\CalculatorAPIBundle\Tests\Model;


use Acme\CalculatorAPIBundle\Model\Result;
use Acme\CalculatorAPIBundle\Tests\BaseTestCase;

class ResultTest extends BaseTestCase {

    /**
     * @test
     */
    public function serialize(){
        $result = new Result(42);

        $serializer = $this->getSerializer();
        $serializedResult = $serializer->serialize($result, 'json');

        $this->assertThat(
            $serializedResult,
            $this->equalTo('{"value":42}')
        );
    }
} 