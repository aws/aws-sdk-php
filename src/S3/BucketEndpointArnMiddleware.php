<?php
namespace Aws\S3;

use Aws\Api\Service;
use Aws\Arn\AccessPointArn;
use Aws\Arn\ArnParser;
use Aws\Arn\Exception\InvalidArnException;
use Aws\CommandInterface;
use Aws\S3\Exception\S3Exception;
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

    /**
     * Create a middleware wrapper function.
     *
     * @param Service $service
     * @return callable
     */
    public static function wrap(Service $service)
    {
        return function (callable $handler) use ($service) {
            return new self($handler, $service);
        };
    }

    public function __construct(callable $nextHandler, Service $service)
    {
        $this->service = $service;
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

                    try {
                        $arn = ArnParser::parse($cmd[$arnableKey]);
                        if ($arn instanceof AccessPointArn) {

                            // Access point host pattern
                            $host = $arn->getResourceId() . '-' . $arn->getAccountId()
                                . '.s3.' . $arn->getRegion() . '.aws';

                            // Remove encoded bucket string from path
                            $path = $req->getUri()->getPath();
                            $encoded = rawurlencode($cmd[$arnableKey]);
                            $len = strlen($encoded) + 1;
                            if (substr($path, 0, $len) === "/{$encoded}") {
                                $path = substr($path, $len);
                            }

                            // Set modified request
                            $req = $req->withUri(
                                $req->getUri()->withHost($host)->withPath($path)
                            );
                        }
                    } catch (InvalidArnException $e) {
                        // Add context to ARN exception
                        throw new S3Exception(
                            'Bucket parameter parsed as access point ARN and 
                                failed with: ' . $e->getMessage(),
                            $cmd
                        );
                    }
                }
            }
        }

        return $nextHandler($cmd, $req);
    }
}
