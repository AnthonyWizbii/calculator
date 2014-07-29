<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 14:13
 */

namespace Acme\CalculatorBundle\Tests\Model;

use Acme\CalculatorBundle\Model\Operand;

class OperandTest extends \PHPUnit_Framework_TestCase {

    /**
     * @test
     */
    public function construct() {
        $operand = new Operand(42);

        $this->assertThat($operand->getValue(), $this->equalTo(42));
    }

    public function testSetValue() {
        $operand = new Operand(42);
        $operand->setValue(41);

        $this->assertThat($operand->getValue(), $this->equalTo(41));
    }
}