<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 14:07
 */

namespace Acme\CalculatorAPIBundle\Model;

use JMS\Serializer\Annotation as JMS;

class Operand {

    /**
     * @var float
     * @JMS\Type("double")
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
        return intval($this->value);
    }
} 