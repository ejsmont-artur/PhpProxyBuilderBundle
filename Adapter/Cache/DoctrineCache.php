<?php

namespace Ejsmont\PhpProxyBuilderBundle\Adapter\Cache;

use PhpProxyBuilder\Adapter\CacheInterface;
use Doctrine\Common\Cache\Cache;

/**
 * Class is an adapter between Doctrine\Cache and PhpProxyBuilder\Adapter\CacheInterface
 * 
 * I use instance of cahe provided by your symfony application (doctrine cache)
 */
class DoctrineCache implements CacheInterface {

    /**
     * Instance to be used by the circuit breaker
     * @var \Doctrine\Common\Cache\Cache $doctrineCacheInstance 
     */
    private $doctrineCacheInstance;

    /**
     * Expects doctring cache implementation instance to route 
     * circuit breaker calls. Instance have to be ready to use.
     * 
     * @param \Doctrine\Common\Cache\Cache $doctrineCacheInstance
     */
    public function __construct(Cache $doctrineCacheInstance) {
        $this->doctrineCacheInstance = $doctrineCacheInstance;
    }

    /**
     * Load cache item or return null if not present.
     * Obviously there is no way to know if value was in cache if it was set to null.
     * 
     * @param string $key
     * @return mixed|null value or null if value was not found
     */
    public function get($key) {
        return $this->doctrineCacheInstance->fetch($key);
    }

    /**
     * Save value in cache for up to optionl $ttl seconds
     * @param string    $key    cache key
     * @param mixed     $value  value to cache (will be serialised)
     * @param int       $ttl    optional seconds to live or default value set by implementation
     * @return void
     */
    public function set($key, $value, $ttl = null) {
        $this->doctrineCacheInstance->save($key, $value, $ttl);
    }

}