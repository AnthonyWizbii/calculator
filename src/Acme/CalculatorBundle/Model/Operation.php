<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 14:11
 */

namespace Acme\CalculatorBundle\Model;


class Operation {
    /**
     * @var Operand
     */
    protected $operandLeft;

    /**
     * @var Operand
     */
    protected $operandRight;

    /**
     * @var Operator
     */
    protected $operator;

    /**
     * @var Result
     */
    protected $result;

    function __construct($operandLeft, $operandRight, $operator, $result)
    {
        $this->operandLeft = $operandLeft;
        $this->operandRight = $operandRight;
        $this->operator = $operator;
        $this->result = $result;
    }

    /**
     * @param \Acme\CalculatorBundle\Model\Operand $operandRight
     */
    public function setOperandRight($operandRight)
    {
        $this->operandRight = $operandRight;
    }

    /**
     * @return \Acme\CalculatorBundle\Model\Operand
     */
    public function getOperandRight()
    {
        return $this->operandRight;
    }

    /**
     * @param \Acme\CalculatorBundle\Model\Operand $operandLeft
     */
    public function setOperandLeft($operandLeft)
    {
        $this->operandLeft = $operandLeft;
    }

    /**
     * @return \Acme\CalculatorBundle\Model\Operand
     */
    public function getOperandLeft()
    {
        return $this->operandLeft;
    }

    /**
     * @param \Acme\CalculatorBundle\Model\Operator $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
    }

    /**
     * @return \Acme\CalculatorBundle\Model\Operator
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param \Acme\CalculatorBundle\Model\Result $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @return \Acme\CalculatorBundle\Model\Result
     */
    public function getResult()
    {
        return $this->result;
    }
} 