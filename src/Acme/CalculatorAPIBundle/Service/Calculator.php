<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 14:37
 */

namespace Acme\CalculatorAPIBundle\Service;

use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("acme_calculatorapi.calculator")
 */
class Calculator {
    /**
     * @param  \Acme\CalculatorAPIBundle\Model\Operand  $left
     * @param  \Acme\CalculatorAPIBundle\Model\Operand  $right
     * @param  \Acme\CalculatorAPIBundle\Model\Operator\Operator $operator
     * @return \Acme\CalculatorAPIBundle\Model\Result
     */
    public function compute($left, $right, $operator){
        return $operator->compute($left, $right);
    }
}