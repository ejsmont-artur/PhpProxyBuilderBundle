<?php

namespace Ejsmont\PhpProxyBuilderBundle\Tests\Unit;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Ejsmont\PhpProxyBuilderBundle\Adapter\Cache\DoctrineCache;
use Doctrine\Common\Cache\ArrayCache;

class DoctrineCacheTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ContainerBuilder
     */
    private $container;

    public function setup() {
        parent::setUp();
        $this->container = new ContainerBuilder();
        $this->container->setParameter("kernel.cache_dir", dirname(__FILE__) . "/../../build/cache");
    }

    public function testLoadApcExtension() {
        $cache = new ArrayCache();

        $inst = new DoctrineCache($cache);
        $this->assertEquals(null, $inst->get("A1"));
    }

}

