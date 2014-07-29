<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 14:14
 */

namespace Acme\CalculatorBundle\Tests\Model;


use Acme\CalculatorBundle\Model\Operator;

class OperatorTest extends \PHPUnit_Framework_TestCase {

    public function testConstruct() {
        $operator = new Operator("add", '+');

        $this->assertThat($operator->getLabel(), $this->equalTo('+'));
    }
} 