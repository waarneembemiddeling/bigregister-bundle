<?php

namespace Wb\Bundle\BigRegisterBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class WbBigRegisterExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (isset($config['wsdl'])) {
            $wsdl = $config['wsdl'];
        } elseif ($config['use_acceptance']) {
            $wsdl = 'http://webservices-acc.cibg.nl/Ribiz/OpenbaarV2.asmx?WSDL';
        } else {
            $wsdl = 'http://webservices.cibg.nl/Ribiz/OpenbaarV2.asmx?WSDL';
        }
        
        if (isset($config['cache'])) {
            $container->setParameter('wb_big_register.cache.service_id', $config['cache']['service_id']);
            $container->setParameter('wb_big_register.cache.ttl', $config['cache']['ttl']);
        }

        $container->setParameter('wb_big_register.wsdl', $wsdl);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
