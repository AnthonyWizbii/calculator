<?php

namespace Acme\CalculatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {

        return $this->render('AcmeCalculatorBundle:Default:index.html.twig');
    }

    public function computeAction(Request $req)
    {
        $left     = $req->query->get('left');
        $right    = $req->query->get('right');
        $operator = $req->query->get('operator');

        $result = null;

        switch ($operator) {
            case 'add':
                $result = $left + $right;
                break;

            case 'substract':
                $result = $left - $right;
                break;

            case 'multiply':
                $result = $left * $right;
                break;

            case 'divide':
                if ($right != 0) {
                    $result = $left / $right;
                }
                break;
        }

        return $this->render('AcmeCalculatorBundle:Default:compute.html.twig', array('left' => $left,
                                                                                     'right' => $right,
                                                                                     'operator' => $operator,
                                                                                     'result' => $result));
    }
}
