<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 30/07/2014
 * Time: 11:31
 */

namespace Acme\CalculatorAPIBundle\Tests\Model;

use Acme\CalculatorAPIBundle\Model\Operand;
use Acme\CalculatorAPIBundle\Tests\BaseTestCase;

class OperandTest extends BaseTestCase {

    protected $rawOperand;
    protected $serializedOperand;

    public function setup() {
        parent::setup();

        $this->rawOperand = new Operand(8);
        $this->serializedOperand = '{"value":8}';
    }

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

    /**
     * @test
     */
    public function serialize() {
        $operand = new Operand(8);

        $serializer = $this->getSerializer();
        $serializedOperand = $serializer->serialize($operand, 'json');

        $this->assertThat(
            $serializedOperand,
            $this->equalTo($this->serializedOperand)
        );
    }

    /**
     * @test
     */
    public function deserialize() {
        $serializedOperand = '{"value":8}';

        $serializer = $this->getSerializer();
        $operand = $serializer->deserialize($serializedOperand, 'Acme\\CalculatorAPIBundle\\Model\\Operand', 'json');

        $this->assertThat(
            $operand,
            $this->equalTo($this->rawOperand)
        );
    }
} 