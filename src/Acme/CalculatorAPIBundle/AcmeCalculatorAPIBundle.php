<?php

namespace Acme\CalculatorAPIBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Acme\CalculatorAPIBundle\Service\OperatorCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AcmeCalculatorAPIBundle extends Bundle
{
    public function build(ContainerBuilder $container) {
        parent::build($container);

        $container->addCompilerPass(new OperatorCompilerPass());
    }
}
