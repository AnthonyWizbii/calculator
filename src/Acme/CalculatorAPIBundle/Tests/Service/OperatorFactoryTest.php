<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 30/07/2014
 * Time: 11:37
 */

namespace Acme\CalculatorAPIBundle\Tests\Service;

use Acme\CalculatorAPIBundle\Model\Operator\Add;
use Acme\CalculatorAPIBundle\Service\OperatorFactory;
use Acme\CalculatorAPIBundle\Tests\BaseTestCase;

class OperatorFactoryTest extends BaseTestCase {
    /**
     * @test
     */
    public function getOperator() {
        $operatorFactory = new OperatorFactory();

        $operatorFactory->addOperator(new Add());

        $this->assertThat($operatorFactory->getOperator('add')->getLabel(), $this->equalTo('+'));
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function getNotExistingOperator() {
        $operatorFactory = new OperatorFactory();

        $operatorFactory->getOperator('add');
    }
} 