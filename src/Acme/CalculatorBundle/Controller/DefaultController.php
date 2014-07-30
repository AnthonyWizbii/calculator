<?php

namespace Acme\CalculatorBundle\Controller;

use Acme\CalculatorBundle\Model\Operand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package Acme\CalculatorBundle\Controller
 * @DI\Service("acme_calculator.controller.default")
 */
class DefaultController extends Controller
{
    /**
     * @var \Symfony\Bundle\TwigBundle\TwigEngine
     * @DI\Inject("templating")
     */
    public $templating;

    /**
     * @var \Acme\CalculatorBundle\Service\OperatorFactory
     * @DI\Inject("acme_calculator.operator_factory")
     */
    public $operatorFactory;

    /**
     * @var \Acme\CalculatorBundle\Service\Calculator
     * @DI\Inject("acme_calculator.calculator")
     */
    public $calculator;


    public function indexAction()
    {
        return $this->render('AcmeCalculatorBundle:Default:index.html.twig', array(
            'operators' => $this->operatorFactory->getOperators()
        ));
    }

    public function computeAction(Request $req)
    {
        $left     = new Operand($req->query->get('left'));
        $right    = new Operand($req->query->get('right'));
        $operator = $this->operatorFactory->getOperator($req->query->get('operator'));
        $result   = $this->calculator->compute($left, $right, $operator);

        return $this->render('AcmeCalculatorBundle:Default:compute.html.twig', array(
            'left' => $left->getValue(),
            'right' => $right->getValue(),
            'operator' => $operator->getLabel(),
            'result' => $result->getValue()
        ));
    }

    public function render($view, array $parameters = array(), Response $response = null)
    {
        return $this->templating->renderResponse($view, $parameters, $response);
    }
}
