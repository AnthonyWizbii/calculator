<?php

namespace Acme\CalculatorBundle\Model\Operator;

abstract class Operator {

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $label;

    function __construct($id, $label)
    {
        $this->id = $id;
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param  Operand $left
     * @param  Operand $right
     * @return Result
     */
    public abstract function compute($left, $right);
} 