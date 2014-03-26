<?php
/*
* (c) Waarneembemiddeling.nl
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Wb\Bundle\BigRegisterBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class BigRegisterCompilerPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->hasParameter('wb_big_register.cache.service_id')) {
            $definition = $container->getDefinition('wb_big_register.client');
            $definition->replaceArgument(2, new Reference(
                $container->getParameter('wb_big_register.cache.service_id')
            ));
            $definition->replaceArgument(3, $container->getParameter('wb_big_register.cache.ttl'));
        }
    }

} 
