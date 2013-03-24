<?php

namespace Ejsmont\PhpProxyBuilderBundle\Adapter\Cache;

use Symfony\Component\HttpKernel\Log\LoggerInterface;
use PhpProxyBuilder\Adapter\LogInterface;

/**
 * Class is an adapter between PhpProxyBuilder\Adapter\LogInterface and symfony2 http kernel log.
 * 
 * You can provide any Logger interface compatible with the interface leaving you more freedom.
 */
class SymfonyKernelLog implements LogInterface {

    /**
     * Symfony kernel logger instance to be used.
     * @var Symfony\Component\HttpKernel\Log\LoggerInterface $logger
     */
    private $logger;

    /**
     * Expects symfony logger instance.
     * 
     * @param Symfony\Component\HttpKernel\Log\LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    /**
     * Log message as debug level
     * @param string $message
     * @param mixed $attachment optional array or structure of data to be attached
     * @return void
     */
    public function logDebug($message, $attachment = null) {
        $this->logger->debug($message, array("attachment " => $attachment));
    }

    /**
     * Log message as error level
     * @param string $message
     * @param mixed $attachment optional array or structure of data to be attached
     * @return void
     */
    public function logError($message, $attachment = null) {
        $this->logger->err($message, array("attachment " => $attachment));
    }

    /**
     * Log message as warning level
     * @param string $message
     * @param mixed $attachment optional array or structure of data to be attached
     * @return void
     */
    public function logWarning($message, $attachment = null) {
        $this->logger->warn($message, array("attachment " => $attachment));
    }

}