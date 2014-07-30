<?php

namespace Acme\CalculatorAPIBundle\Controller;

use Acme\CalculatorAPIBundle\Model\Operand;
use Acme\CalculatorAPIBundle\Model\Operation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package Acme\CalculatorBundle\Controller
 * @DI\Service("acme_calculatorapi.controller.default")
 */
class DefaultController extends Controller
{
    /**
     * @var \Symfony\Bundle\TwigBundle\TwigEngine
     * @DI\Inject("templating")
     */
    public $templating;

    /**
     * @var \Acme\CalculatorAPIBundle\Service\OperatorFactory
     * @DI\Inject("acme_calculatorapi.operator_factory")
     */
    public $operatorFactory;

    /**
     * @var \Acme\CalculatorAPIBundle\Service\Calculator
     * @DI\Inject("acme_calculatorapi.calculator")
     */
    public $calculator;


    public function jsonAction($left, $right, $operator) {
        $operation = $this->compute($left, $right, $operator);

        $aOperation = array(
            'left'     => $operation->getOperandLeft()->getValue(),
            'right'    => $operation->getOperandRight()->getValue(),
            'operator' => array(
                'id'       => $operation->getOperator()->getId(),
                'label'    => $operation->getOperator()->getLabel(),
            ),
            'result'   => $operation->getResult()->getValue(),
        );

        return new JsonResponse(array('operation' => $aOperation));
    }

    public function xmlAction($left, $right, $operator) {
        $operation = $this->compute($left, $right, $operator);

        $response = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8" ?><operation/>');
        $response->addChild('left', $operation->getOperandLeft()->getValue());
        $response->addChild('right', $operation->getOperandRight()->getValue());
        $operatorNode = $response->addChild('operator');
        $operatorNode->addAttribute('id', $operation->getOperator()->getId());
        $operatorNode->addAttribute('label', $operation->getOperator()->getLabel());
        $response->addChild('result', $operation->getResult()->getValue());

        return new Response($response->asXML());
    }

    protected function compute($left, $right, $operator) {
        $left = new Operand($left);
        $right = new Operand($right);
        $operator = $this->operatorFactory->getOperator($operator);

        $result = $this->calculator->compute($left, $right, $operator);

        return new Operation($left, $right, $operator, $result);
    }

    public function getOperatorsAction(){
        $aOperator = array();
        foreach($this->operatorFactory->getOperators() as $operator) {
            $aOperator[$operator->getId()] = $operator->getLabel();
        }
        return new JsonResponse(array('operators' => $aOperator));
    }
}
