<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 30/07/2014
 * Time: 11:31
 */

namespace Acme\CalculatorAPIBundle\Tests\Model;

use Acme\CalculatorAPIBundle\Model\Operand;
use Acme\CalculatorAPIBundle\Model\Operation;
use Acme\CalculatorAPIBundle\Model\Operator\Multiply;
use Acme\CalculatorAPIBundle\Model\Result;
use Acme\CalculatorAPIBundle\Tests\BaseTestCase;


class OperationTest extends BaseTestCase {

    public function testConstruct() {
        $left = new Operand(4);
        $right = new Operand(2);
        $operator = new Multiply();
        $result = new Result();

        $operation = new Operation($left, $right, $operator, $result);

        $this->assertThat($operation->getOperandRight(), $this->equalTo($right));
    }
} 