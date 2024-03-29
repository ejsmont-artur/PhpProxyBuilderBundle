<?php

namespace Ejsmont\PhpProxyBuilderBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

class EjsmontPhpProxyBuilderExtension extends Extension {

    public function load(array $configs, ContainerBuilder $container) {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');
    }

    public function getAlias() {
        return 'ejsmont_php_proxy_builder';
    }

}
