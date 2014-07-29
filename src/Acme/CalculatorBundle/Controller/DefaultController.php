<?php

namespace Acme\CalculatorBundle\Controller;

use Acme\CalculatorBundle\Model\Operand;
use Acme\CalculatorBundle\Model\Operator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\DiExtraBundle\Annotation as DI;

class DefaultController extends Controller
{
    public function indexAction()
    {

        return $this->render('AcmeCalculatorBundle:Default:index.html.twig');
    }

    public function computeAction(Request $req)
    {
        $left     = new Operand($req->query->get('left'));
        $right    = new Operand($req->query->get('right'));
        $operator = $this->getOperatorFactory()->getOperator($req->query->get('operator'));
        $result   = $this->getCalculator()->compute($left, $right, $operator);

        return $this->render('AcmeCalculatorBundle:Default:compute.html.twig', array(
            'left' => $left->getValue(),
            'right' => $right->getValue(),
            'operator' => $operator->getLabel(),
            'result' => $result->getValue()
        ));
    }

    /**
     * @return \Acme\CalculatorBundle\Service\OperatorFactory
     */
    public function getOperatorFactory() {
        return $this->get('acme_calculator.operator_factory');
    }

    /**
     * @return \Acme\CalculatorBundle\Service\Calculator
     */
    public function getCalculator() {
        return $this->get('acme_calculator.calculator');
    }
}
