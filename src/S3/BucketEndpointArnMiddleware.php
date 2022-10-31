<?php
namespace Aws\S3;

use Aws\Api\Service;
use Aws\Arn\AccessPointArnInterface;
use Aws\Arn\ArnParser;
use Aws\Arn\ObjectLambdaAccessPointArn;
use Aws\Arn\Exception\InvalidArnException;
use Aws\Arn\AccessPointArn as BaseAccessPointArn;
use Aws\Arn\S3\OutpostsAccessPointArn;
use Aws\Arn\S3\MultiRegionAccessPointArn;
use Aws\Arn\S3\OutpostsArnInterface;
use Aws\CommandInterface;
use Aws\Endpoint\PartitionEndpointProvider;
use Aws\Exception\InvalidRegionException;
use Aws\Exception\UnresolvedEndpointException;
use Aws\S3\Exception\S3Exception;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;

/**
 * Checks for access point ARN in members targeting BucketName, modifying
 * endpoint as appropriate
 *
 * @internal
 */
class BucketEndpointArnMiddleware
{
    /** @var callable */
    private $nextHandler;

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

        $op = $this->service->getOperation($cmd->getName())->toArray();
        if (!empty($op['input']['shape'])) {
            $service = $this->service->toArray();
            if (!empty($input = $service['shapes'][$op['input']['shape']])) {
                foreach ($input['members'] as $key => $member) {
                    if ($member['shape'] === 'BucketName') {
                        $arnableKey = $key;
                        break;
                    }
                }

                if (!empty($arnableKey) && ArnParser::isArn($cmd[$arnableKey])) {
                        // Throw for commands that do not support ARN inputs
                        if (in_array($cmd->getName(), $this->nonArnableCommands)) {
                            throw new S3Exception(
                                'ARN values cannot be used in the bucket field for'
                                    . ' the ' . $cmd->getName() . ' operation.',
                                $cmd
                            );
                        }

                        // Remove encoded bucket string from path
                        $path = $req->getUri()->getPath();
                        $encoded = rawurlencode($cmd[$arnableKey]);
                        $len = strlen($encoded) + 1;
                        if (trim(substr($path, 0, $len), '/') === "{$encoded}") {
                            $path = substr($path, $len);
                            if (substr($path, 0, 1) !== "/") {
                                $path = '/' . $path;
                            }
                        }
                        if (empty($path)) {
                            $path = '';
                        }

                        // Set modified request
                        $req = $req->withUri(
                            $req->getUri()->withPath($path)
                        );
                }
            }
        }
        return $nextHandler($cmd, $req);
    }
}
