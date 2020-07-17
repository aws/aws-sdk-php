<?php
namespace Aws\S3Control;

use Aws\Api\Service;
use Aws\Arn\ArnInterface;
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
use Aws\S3\EndpointRegionHelperTrait;
use Psr\Http\Message\RequestInterface;
use function Aws\is_instance_of;

/**
 * Checks for access point ARN in members targeting BucketName, modifying
 * endpoint as appropriate
 *
 * @internal
 */
class BucketEndpointArnMiddleware
{
    use EndpointRegionHelperTrait;

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

    /** @var array */
    private static $outpostsArns = [
        OutpostsAccessPointArn::class,
        OutpostsBucketArn::class,
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
        $pathComponents = explode('/', urldecode($req->getUri()->getPath()));
        $arnComponent = null;

        foreach ($pathComponents as $component) {
            if (ArnParser::isArn($component)) {
                $arnComponent = $component;
                break;
            }
        }

        if (!is_null($arnComponent)) {
            $arn = ArnParser::parse($arnComponent);
            $partition = $this->validateArn($arn);
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
    private function validateArn(ArnInterface $arn)
    {
        if (is_instance_of($arn, self::$acceptedArns)) {

            // Dualstack is not supported with Outposts ARNs
            if (is_instance_of($arn, self::$outpostsArns)
                && !empty($this->config['dual_stack'])
            ) {
                throw new UnresolvedEndpointException(
                    'Dualstack is currently not supported with S3 Outposts ARNs.'
                    . ' Please disable dualstack or do not supply an Outposts ARN.');
            }

            // Get partitions for ARN and client region
            $arnPart = $this->partitionProvider->getPartition(
                $arn->getRegion(),
                's3'
            );
            $clientPart = $this->partitionProvider->getPartition(
                $this->region,
                's3'
            );

            // If client partition not found, try removing pseudo-region qualifiers
            if (!($clientPart->isRegionMatch($this->region, 's3'))) {
                $clientPart = $this->partitionProvider->getPartition(
                    $this->stripPseudoRegions($this->region),
                    's3'
                );
            }

            // Verify that the partition matches for supplied partition and region
            if ($arn->getPartition() !== $clientPart->getName()) {
                throw new InvalidRegionException('The supplied ARN partition'
                    . " does not match the client's partition.");
            }
            if ($clientPart->getName() !== $arnPart->getName()) {
                throw new InvalidRegionException('The corresponding partition'
                    . ' for the supplied ARN region does not match the'
                    . " client's partition.");
            }

            // Ensure ARN region matches client region unless
            // configured for using ARN region over client region
            if (!($this->isMatchingSigningRegion($arn->getRegion(), $this->region))) {
                if (empty($this->config['use_arn_region'])
                    || !($this->config['use_arn_region']->isUseArnRegion())
                ) {
                    throw new InvalidRegionException('The region'
                        . " specified in the ARN (" . $arn->getRegion()
                        . ") does not match the client region ("
                        . "{$this->region}).");
                }
            }
        }

        throw new InvalidArnException('Provided ARN was not a valid S3 access'
            . ' point ARN, S3 Outposts access point ARN, S3 bucket ARN, or S3'
            . ' Outposts bucket ARN.');
    }
}
