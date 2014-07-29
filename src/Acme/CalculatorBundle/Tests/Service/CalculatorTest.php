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
        $operator = new Operator('add', '+');

        $calculator = new Calculator();
        $result = $calculator->compute($left, $right, $operator);

        $this->assertThat($result->getValue(), $this->equalTo(5));
    }

    /**
     * @test
     */
    public function computeSubstract() {
        $left     = new Operand(3);
        $right    = new Operand(2);
        $operator = new Operator('substract', '-');

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
        $operator = new Operator('multiply', '*');

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
        $operator = new Operator('divide', '/');

        $calculator = new Calculator();
        $result = $calculator->compute($left, $right, $operator);

        $this->assertThat($result->getValue(), $this->equalTo(1.5));
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function computeNone() {
        $left     = new Operand(3);
        $right    = new Operand(2);
        $operator = new Operator('blabla', ' ');

        $calculator = new Calculator();
        $result = $calculator->compute($left, $right, $operator);
    }
} 