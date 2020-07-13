<?php
namespace Aws\S3Control;

use Aws\Api\Service;
use Aws\Arn\ArnParser;
use Aws\Arn\Exception\InvalidArnException;
use Aws\Arn\S3\AccessPointArn;
use Aws\Arn\S3\OutpostsAccessPointArn;
use Aws\Arn\S3\OutpostsBucketArn;
use Aws\Arn\S3\RegionalBucketArn;
use Aws\CommandInterface;
use Aws\Endpoint\PartitionEndpointProvider;
use Aws\Exception\InvalidRegionException;
use Aws\Exception\UnresolvedEndpointException;
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

    /** @var array */
    private static $acceptedArns = [
        AccessPointArn::class,
        OutpostsAccessPointArn::class,
        OutpostsBucketArn::class,
        RegionalBucketArn::class,
    ];

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

                    $arn = ArnParser::parse($cmd[$arnableKey]);
                    $partition = $this->validateArn($arn);
                }
            }
        }

        return $nextHandler($cmd, $req);
    }

    /**
     * Validates an ARN, returning a partition object corresponding to the ARN
     * if successful
     *
     * @param $arn
     * @return \Aws\Endpoint\Partition
     */
    private function validateArn($arn)
    {
        if (in_array(get_class($arn), self::$acceptedArns)) {

            // Dualstack is not supported with Outposts ARNs
            if ((
                    $arn instanceof OutpostsAccessPointArn
                    || $arn instanceof OutpostsBucketArn
                )
                && !empty($this->config['dual_stack'])
            ) {
                throw new UnresolvedEndpointException(
                    'Dualstack is currently not supported with S3 Outposts ARNs.'
                    . ' Please disable dualstack or do not supply an Outposts ARN.');
            }
        }

        throw new InvalidArnException('Provided ARN was not a valid S3 access'
            . ' point ARN or S3 Outposts access point ARN.');
    }
}
