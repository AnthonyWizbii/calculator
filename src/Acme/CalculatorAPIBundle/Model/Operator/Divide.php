<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 16:39
 */

namespace Acme\CalculatorAPIBundle\Model\Operator;

use JMS\DiExtraBundle\Annotation as DI;
use Acme\CalculatorAPIBundle\Model\Result;

/**
 * @DI\Service("acme_calculatorapi.operator.divide")
 * @DI\Tag("acme_calculatorapi.operator")
 */
class Divide extends Operator {

    public function __construct() {
        $this->id    = "divide";
        $this->label = "/";
    }

    public function compute($left, $right) {
        return new Result($left->getValue() / $right->getValue());
    }
} 