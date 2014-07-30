<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 14:07
 */

namespace Acme\CalculatorBundle\Model;


class Operand {
    /**
     * @var float
     */
    protected $value;

    function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }
} 