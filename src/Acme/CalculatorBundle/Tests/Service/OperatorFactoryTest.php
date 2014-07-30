<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 15:54
 */

namespace Acme\CalculatorBundle\Tests\Service;


use Acme\CalculatorBundle\Model\Operator\Add;
use Acme\CalculatorBundle\Service\OperatorFactory;

class OperatorFactoryTest extends \PHPUnit_Framework_TestCase {
    /**
     * @test
     */
    public function getOperator() {
        $operatorFactory = new OperatorFactory();

        $operatorFactory->addOperator(new Add());

        $this->assertThat($operatorFactory->getOperator('add')->getLabel(), $this->equalTo('+'));
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function getNotExistingOperator() {
        $operatorFactory = new OperatorFactory();

        $operatorFactory->getOperator('add');
    }
} 