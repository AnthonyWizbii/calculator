<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 15:03
 */

namespace Acme\CalculatorBundle\Tests\Service;

use Acme\CalculatorBundle\Model\Operand;
use Acme\CalculatorBundle\Model\Operator;
use Acme\CalculatorBundle\Service\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase {

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