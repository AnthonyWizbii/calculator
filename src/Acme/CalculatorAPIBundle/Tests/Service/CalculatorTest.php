<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 30/07/2014
 * Time: 11:36
 */

namespace Acme\CalculatorAPIBundle\Tests\Service;

use Acme\CalculatorAPIBundle\Model\Operand;
use Acme\CalculatorAPIBundle\Model\Operator;
use Acme\CalculatorAPIBundle\Service\Calculator;
use Acme\CalculatorAPIBundle\Tests\BaseTestCase;

class CalculatorTest extends BaseTestCase {

    /**
     * @test
     */
    public function computeAdd(){
        $left     = new Operand(3);
        $right    = new Operand(2);

        $operatorMock = $this->getMockBuilder('Acme\CalculatorBundle\Model\Operator\Operator')
            ->setMethods(array('compute'))
            ->disableOriginalConstructor()
            ->getMock();

        $operatorMock->expects($this->once())
            ->method('compute')
            ->with($this->equalTo($left), $this->equalTo($right));

        $calculator = new Calculator();
        $calculator->compute($left, $right, $operatorMock);
    }

    /**
     * @test
     */
    public function computeSubstract() {
        $left     = new Operand(3);
        $right    = new Operand(2);
        $operator = new Operator\Substract();

        $calculator = new Calculator();
        $result = $calculator->compute($left, $right, $operator);

        $this->assertThat($result->getValue(), $this->equalTo(1));
    }

    /**
     * @test
     */
    public function computeMultiply() {
        $left     = new Operand(3);
        $right    = new Operand(2);
        $operator = new Operator\Multiply();

        $calculator = new Calculator();
        $result = $calculator->compute($left, $right, $operator);

        $this->assertThat($result->getValue(), $this->equalTo(6));
    }

    /**
     * @test
     */
    public function computeDivide() {
        $left     = new Operand(3);
        $right    = new Operand(2);
        $operator = new Operator\Divide();

        $calculator = new Calculator();
        $result = $calculator->compute($left, $right, $operator);

        $this->assertThat($result->getValue(), $this->equalTo(1.5));
    }
} 