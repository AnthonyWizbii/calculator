<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 30/07/2014
 * Time: 11:31
 */

namespace Acme\CalculatorAPIBundle\Tests\Model;

use Acme\CalculatorAPIBundle\Model\Operand;
use Acme\CalculatorAPIBundle\Model\Operator\Operator;
use Acme\CalculatorAPIBundle\Model\Result;
use Acme\CalculatorAPIBundle\Tests\BaseTestCase;

class OperatorTest extends BaseTestCase {

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