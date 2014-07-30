<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 15:29
 */

namespace Acme\CalculatorAPIBundle\Service;

use Acme\CalculatorAPIBundle\Model\Operator;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("acme_calculatorapi.operator_factory")
 */
class OperatorFactory {

    protected $operators;

    public function __construct() {
        $this->operators = array();
    }

    /**
     * @param \Acme\CalculatorAPIBundle\Model\Operator\Operator $operator
     */
    public function addOperator($operator) {
        $this->operators[$operator->getId()] = $operator;
    }

    /**
     * @param  string $operatorId
     * @return \Acme\CalculatorAPIBundle\Model\Operator\Operator
     */
    public function getOperator($operatorId) {
        if (array_key_exists($operatorId, $this->operators)) {
            return $this->operators[$operatorId];
        }

        throw new \Exception("This operator doesn't exist");
    }

    /**
     * @return array
     */
    public function getOperators() {
        return $this->operators;
    }
}