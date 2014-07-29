<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 14:37
 */

namespace Acme\CalculatorBundle\Service;

use Acme\CalculatorBundle\Model\Result;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("acme_calculator.calculator")
 */
class Calculator {
    /**
     * @param  \Acme\CalculatorBundle\Model\Operand  $left
     * @param  \Acme\CalculatorBundle\Model\Operand  $right
     * @param  \Acme\CalculatorBundle\Model\Operator $operator
     * @return \Acme\CalculatorBundle\Model\Result
     */
    public function compute($left, $right, $operator){
        $result = new Result();

        switch ($operator->getId()) {
            case 'add':
                $result->setValue($left->getValue() + $right->getValue());
                break;

            case 'substract':
                $result->setValue($left->getValue() - $right->getValue());
                break;

            case 'multiply':
                $result->setValue($left->getValue() * $right->getValue());
                break;

            case 'divide':
                if ($right->getValue() != 0) {
                    $result->setValue($left->getValue() / $right->getValue());
                }
                break;

            default:
                throw new \Exception("Tototata");
                break;
        }

        return $result;
    }
}