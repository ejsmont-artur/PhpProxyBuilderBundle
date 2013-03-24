<?php

namespace Ejsmont\PhpProxyBuilderBundle\Tests\Unit;

use Ejsmont\PhpProxyBuilderBundle\Adapter\CircuitBreaker\EjsmontCircuitBreaker;

class EjsmontCircuitBreakerTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Ejsmont\CircuitBreaker\CircuitBreakerInterface
     */
    private $cb;

    /**
     * @var Ejsmont\PhpProxyBuilderBundle\Adapter\CircuitBreaker\EjsmontCircuitBreaker
     */
    private $inst;

    public function setup() {
        parent::setUp();
        $this->cb = $this->getMock("Ejsmont\CircuitBreaker\CircuitBreakerInterface");
        $this->inst = new EjsmontCircuitBreaker($this->cb);
    }

    // ================================================= TESTS ========================================================

    public function testDelegateIsAvailable() {
        $this->cb->expects($this->once())
                ->method('isAvailable')
                ->with("CC1")
                ->will($this->returnValue(444));
        $this->assertEquals(444, $this->inst->isAvailable("CC1"));
    }

    public function testDelegateReportFailure() {
        $this->cb->expects($this->once())
                ->method('reportFailure')
                ->with("DD1")
                ->will($this->returnValue(555));
        $this->assertEquals(555, $this->inst->reportFailure("DD1"));
    }

    public function testDelegateReportSuccess() {
        $this->cb->expects($this->once())
                ->method('reportSuccess')
                ->with("EE1")
                ->will($this->returnValue(666));
        $this->assertEquals(666, $this->inst->reportSuccess("EE1"));
    }

}

