<?php

namespace Acme\CalculatorAPIBundle\Model\Operator;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\Discriminator(field = "_type", map = {
 *      "add": "Acme\CalculatorAPIBundle\Model\Operator\Add",
 *      "substract": "Acme\CalculatorAPIBundle\Model\Operator\Substract",
 *      "multiply": "Acme\CalculatorAPIBundle\Model\Operator\Multiply",
 *      "divide": "Acme\CalculatorAPIBundle\Model\Operator\Divide"
 * })
 */
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
     * @JMS\VirtualProperty
     * @JMS\SerializedName("_type")
     */
    public function getType()
    {
        return $this->id;
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