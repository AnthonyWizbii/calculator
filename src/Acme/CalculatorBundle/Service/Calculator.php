<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 14:37
 */

namespace Acme\CalculatorBundle\Service;

use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("acme_calculator.calculator")
 */
class Calculator {
    /**
     * @param  \Acme\CalculatorBundle\Model\Operand  $left
     * @param  \Acme\CalculatorBundle\Model\Operand  $right
     * @param  \Acme\CalculatorBundle\Model\Operator\Operator $operator
     * @return \Acme\CalculatorBundle\Model\Result
     */
    public function compute($left, $right, $operator){
        return $operator->compute($left, $right);
    }
}