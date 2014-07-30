<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 14:14
 */

namespace Acme\CalculatorBundle\Tests\Model;

use Acme\CalculatorBundle\Model\Operand;
use Acme\CalculatorBundle\Model\Operator\Operator;
use Acme\CalculatorBundle\Model\Result;

class OperatorTest extends \PHPUnit_Framework_TestCase {

    public function testConstruct() {
        $operator = new myOperator('add', '+');

        $this->assertThat($operator->getLabel(), $this->equalTo('+'));
    }
}

class myOperator extends Operator{

    /**
     * @param  Operand $left
     * @param  Operand $right
     * @return Result
     */
    public function compute($left, $right)
    {
        // TODO: Implement compute() method.
    }
}