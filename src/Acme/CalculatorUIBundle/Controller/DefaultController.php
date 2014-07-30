<?php

namespace Acme\CalculatorUIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package Acme\CalculatorUIBundle\Controller
 * @DI\Service("acme_calculatorui.controller.default")
 */
class DefaultController extends Controller
{
    /**
     * @var \Symfony\Bundle\TwigBundle\TwigEngine
     * @DI\Inject("templating")
     */
    public $templating;

    public function indexAction()
    {
        $ch = curl_init('http://localhost:8887/calculator/v1/operators.json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        if($output === false) {
            return new Response('', 500);
        }
        curl_close($ch);

        return $this->render('AcmeCalculatorUIBundle:Default:index.html.twig', json_decode($output, true));
    }

    public function computeAction(Request $req) {
        $left = $req->query->get('left');
        $right = $req->query->get('right');
        $operator = $req->query->get('operator');

        $ch = curl_init('http://localhost:8887/calculator/v1/'.$left.'/'.$right.'/'.$operator.'.json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);

        if ($output === false) {
            return new Response('', 500);
        }
        curl_close($ch);

        return $this->render('AcmeCalculatorUIBundle:Default:compute.html.twig', json_decode($output, true));
    }

    public function render($view, array $parameters = array(), Response $response = null)
    {
        return $this->templating->renderResponse($view, $parameters, $response);
    }
}
