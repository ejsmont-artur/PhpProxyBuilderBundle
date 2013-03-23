<?php

namespace Ejsmont\PhpProxyBuilderBundle\Tests\Unit;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Ejsmont\PhpProxyBuilderBundle\DependencyInjection\EjsmontPhpProxyBuilderExtension;
use Ejsmont\PhpProxyBuilderBundle\EjsmontPhpProxyBuilderBundle;

class JunkTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ContainerBuilder
     */
    private $container;

    public function setup() {
        parent::setUp();
        $this->container = new ContainerBuilder();
        $this->container->setParameter("kernel.cache_dir", dirname(__FILE__) . "/../../build/cache");
    }

    public function testBundle() {
        $inst = new EjsmontPhpProxyBuilderBundle();
        $this->assertTrue(!empty($inst));
    }

    public function testServiceXml() {
        $inst = new EjsmontPhpProxyBuilderExtension();
        $this->assertEquals('ejsmont_php_proxy_builder', $inst->getAlias());
    }

    public function testLoadApcExtension() {
        $this->markTestIncomplete();
        
        $inst = new EjsmontPhpProxyBuilderExtension();
        $inst->load(array(), $this->container);
        $cb = $this->container->get('apcCircuitBreaker');

        $this->assertTrue($cb instanceof CircuitBreaker);
    }

}

