<?php

namespace Acme\CalculatorAPIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeCalculatorAPIBundle:Default:index.html.twig', array('name' => $name));
    }
}
