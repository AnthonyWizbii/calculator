<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 14:14
 */

namespace Acme\CalculatorBundle\Tests\Model;

use Acme\CalculatorBundle\Model\Operand;
use Acme\CalculatorBundle\Model\Operation;
use Acme\CalculatorBundle\Model\Operator;
use Acme\CalculatorBundle\Model\Result;

class OperationTest extends \PHPUnit_Framework_TestCase {

    public function testConstruct() {
        $left = new Operand(4);
        $right = new Operand(2);
        $operator = new Operator("multiply", "*");
        $result = new Result();

        $operation = new Operation($left, $right, $operator, $result);

        $this->assertThat($operation->getOperandRight(), $this->equalTo($right));
    }
} 