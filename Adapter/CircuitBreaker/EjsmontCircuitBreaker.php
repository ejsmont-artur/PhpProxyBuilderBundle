<?php

namespace Ejsmont\PhpProxyBuilderBundle\Adapter\CircuitBreaker;

/**
 * Class is an adapter for  PhpProxyBuilder\Adapter\CircuitBreakerInterface using
 * Ejsmont\CircuitBreaker\CircuitBreakerInterface as an implementation
 * 
 * You can provide any Logger interface compatible with the interface leaving you more freedom.
 */
class EjsmontCircuitBreaker implements \PhpProxyBuilder\Adapter\CircuitBreakerInterface {

    /**
     * Instance to be used by the circuit breaker
     * @var \Ejsmont\CircuitBreaker\CircuitBreakerInterface $circuitBreaker 
     */
    private $circuitBreaker;

    /**
     * Expects doctring cache implementation instance to route 
     * circuit breaker calls. Instance have to be ready to use.
     * 
     * @param \Ejsmont\CircuitBreaker\CircuitBreakerInterface $circuitBreaker 
     */
    public function __construct(\Ejsmont\CircuitBreaker\CircuitBreakerInterface $circuitBreaker) {
        $this->circuitBreaker = $circuitBreaker;
    }

    /**
     * Check if service is available (according to CB knowledge)
     * 
     * @param string $serviceName - arbitrary service name 
     * @return boolean true if service is available, false if service is down
     */
    public function isAvailable($serviceName) {
        return $this->circuitBreaker->isAvailable($serviceName);
    }

    /**
     * Use this method to let CB know that you failed to connect to the 
     * service of particular name.
     * 
     * Allows CB to update its stats accordingly for future HTTP requests.
     * 
     * @param string $serviceName - arbitrary service name 
     * @return void
     */
    public function reportFailure($serviceName) {
        return $this->circuitBreaker->reportFailure($serviceName);
    }

    /**
     * Use this method to let CB know that you successfully connected to the 
     * service of particular name.
     * 
     * Allows CB to update its stats accordingly for future HTTP requests.
     * 
     * @param string $serviceName - arbitrary service name 
     * @return void
     */
    public function reportSuccess($serviceName) {
        return $this->circuitBreaker->reportSuccess($serviceName);
    }

}