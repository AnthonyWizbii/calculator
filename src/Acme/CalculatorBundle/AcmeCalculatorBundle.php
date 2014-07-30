<?php

namespace Acme\CalculatorBundle;

use Acme\CalculatorBundle\Service\OperatorCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AcmeCalculatorBundle extends Bundle
{
    public function build(ContainerBuilder $container) {
        parent::build($container);

        $container->addCompilerPass(new OperatorCompilerPass());
    }
}
