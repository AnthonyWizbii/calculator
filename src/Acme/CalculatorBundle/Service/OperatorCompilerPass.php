<?php
/**
 * Created by PhpStorm.
 * User: Tonio
 * Date: 29/07/2014
 * Time: 17:21
 */

namespace Acme\CalculatorBundle\Service;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class OperatorCompilerPass implements CompilerPassInterface {
    public function process(ContainerBuilder $container) {
        if (!$container->hasDefinition('acme_calculator.operator_factory')) {
            return;
        }

        $definition = $container->getDefinition('acme_calculator.operator_factory');

        $operators = $container->findTaggedServiceIds('acme_calculator.operator');

        foreach ($operators as $id => $attributes) {
            $definition->addMethodCall('addOperator', array(new Reference($id)));
        }
    }
} 