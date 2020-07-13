<?php
namespace Aws\S3Control;

use Aws\Api\Service;
use Aws\CommandInterface;
use Aws\Endpoint\PartitionEndpointProvider;
use Psr\Http\Message\RequestInterface;

/**
 * Checks for access point ARN in members targeting BucketName, modifying
 * endpoint as appropriate
 *
 * @internal
 */
class BucketEndpointArnMiddleware
{
    /** @var Service */
    private $service;

    /** @var callable */
    private $nextHandler;

    /** @var string */
    private $region;

    /** @var $config */
    private $config;

    /** @var PartitionEndpointProvider */
    private $partitionProvider;

    /** @var array */
    private $nonArnableCommands = ['CreateBucket'];

    /**
     * Create a middleware wrapper function.
     *
     * @param Service $service
     * @param $region
     * @param array $config
     * @return callable
     */
    public static function wrap(
        Service $service,
        $region,
        array $config

    ) {
        return function (callable $handler) use ($service, $region, $config) {
            return new self($handler, $service, $region, $config);
        };
    }

    public function __construct(
        callable $nextHandler,
        Service $service,
        $region,
        array $config = []
    ) {
        $this->partitionProvider = PartitionEndpointProvider::defaultProvider();
        $this->region = $region;
        $this->service = $service;
        $this->config = $config;
        $this->nextHandler = $nextHandler;
    }

    public function __invoke(CommandInterface $cmd, RequestInterface $req)
    {
        $nextHandler = $this->nextHandler;
        return $nextHandler($cmd, $req);
    }
}
