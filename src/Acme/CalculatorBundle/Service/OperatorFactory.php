<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 15:29
 */

namespace Acme\CalculatorBundle\Service;

use Acme\CalculatorBundle\Model\Operator;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("acme_calculator.operator_factory")
 */
class OperatorFactory {

    protected $operators;

    public function __construct() {
        $this->operators = array(
            "add" => new Operator("add", "+"),
            "substract" => new Operator("substract", '-'),
            "multiply" => new Operator("multiply", "*"),
            "divide" => new Operator("divide", "/"),
        );
    }

    /**
     * @param  string $operatorId
     * @return \Acme\CalculatorBundle\Model\Operator
     */
    public function getOperator($operatorId) {
        if (array_key_exists($operatorId, $this->operators)) {
            return $this->operators[$operatorId];
        }

        throw new \Exception("This operator doesn't exist");
    }
}