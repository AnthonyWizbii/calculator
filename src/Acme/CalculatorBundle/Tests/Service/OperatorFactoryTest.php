<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 15:54
 */

namespace Acme\CalculatorBundle\Tests\Service;


use Acme\CalculatorBundle\Service\OperatorFactory;

class OperatorFactoryTest extends \PHPUnit_Framework_TestCase {
    /**
     * @test
     * @dataProvider getData
     */
    public function getOperator($operatorId, $expectedLabel) {
        $operatorFactory = new OperatorFactory();

        $this->assertThat($operatorFactory->getOperator($operatorId)->getLabel(), $this->equalTo($expectedLabel));
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function getNotExistingOperator() {
        $operatorFactory = new OperatorFactory();

        $operatorFactory->getOperator('');
    }

    public function getData() {
        return array(
            array('add', '+'),
            array('substract', '-'),
            array('multiply', '*'),
            array('divide', '/'),
        );
    }
} 