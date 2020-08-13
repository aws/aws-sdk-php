<?php
namespace Aws\S3Control;

use Aws\Api\Service;
use Aws\Arn\AccessPointArnInterface;
use Aws\Arn\ArnInterface;
use Aws\Arn\ArnParser;
use Aws\Arn\Exception\InvalidArnException;
use Aws\Arn\S3\AccessPointArn;
use Aws\Arn\S3\BucketArnInterface;
use Aws\Arn\S3\OutpostsAccessPointArn;
use Aws\Arn\S3\OutpostsArnInterface;
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
class EndpointArnMiddleware
{
    use EndpointRegionHelperTrait;

    /**
     * Commands which do not do ARN expansion for relevant members
     * @var array
     */
    private static $nonArnableCommands = [
        'CreateBucket',
        'ListRegionalBuckets',
    ];

    /**
     * Commands which trigger endpoint and signer redirection based on presence
     * of OutpostId
     * @var array
     */
    private static $outpostIdRedirectCommands = [
        'CreateBucket',
        'ListRegionalBuckets',
    ];

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
        if (!empty($op['input']['shape'])
            && !in_array($cmd->getName(), self::$nonArnableCommands)
        ) {
            $service = $this->service->toArray();
            if (!empty($input = $service['shapes'][$op['input']['shape']])) {

                // Stores member name that targets 'BucketName' shape
                $bucketNameMember = null;

                // Stores member name that targets 'AccessPointName' shape
                $accesspointNameMember = null;

                foreach ($input['members'] as $key => $member) {
                    if ($member['shape'] === 'BucketName') {
                        $bucketNameMember = $key;
                    }
                    if ($member['shape'] === 'AccessPointName') {
                        $accesspointNameMember = $key;
                    }
                }

                // Determine if appropriate member contains ARN value
                if (!is_null($bucketNameMember)
                    && !empty($cmd[$bucketNameMember])
                    && ArnParser::isArn($cmd[$bucketNameMember])
                ) {
                    $arn = ArnParser::parse($cmd[$bucketNameMember]);
                    $partition = $this->validateBucketArn($arn);
                } elseif (!is_null($accesspointNameMember)
                    && !empty($cmd[$accesspointNameMember])
                    && ArnParser::isArn($cmd[$accesspointNameMember])
                ) {
                    $arn = ArnParser::parse($cmd[$accesspointNameMember]);
                    $partition = $this->validateAccessPointArn($arn);
                }

                // Process only if an appropriate member contains an ARN value
                if (!empty($arn)) {
                    // Generate host based on ARN
                    if ($arn instanceof OutpostsArnInterface) {
                        $host = $this->generateOutpostsArnHost($arn, $req);
                        $req = $req->withHeader('x-amz-outpost-id', $arn->getOutpostId());
                    } else {
                        $host = $this->generateNonOutpostsArnHost($arn, $req);
                    }

                    // Modify path based on ARN
                    $path = $req->getUri()->getPath();
                    if ($arn instanceof AccessPointArnInterface) {

                        // Replace ARN with access point name
                        $path = str_replace(
                            urlencode($cmd[$accesspointNameMember]),
                            $arn->getAccesspointName(),
                            $path
                        );
                    } elseif ($arn instanceof BucketArnInterface) {

                        // Remove encoded bucket string from path
                        $encoded = rawurlencode($cmd[$bucketNameMember]);
                        $len = strlen($encoded) + 1;
                        if (substr($path, 0, $len) === "/{$encoded}") {
                            $path = substr($path, $len);
                        }
                        if (empty($path)) {
                            $path = '';
                        }
                    }

                    // Validate or set account ID in command
                    if (isset($cmd['AccountId'])) {
                        if ($cmd['AccountId'] !== $arn->getAccountId()) {
                            throw new \InvalidArgumentException("The account ID"
                                . " supplied in the command ({$cmd['AccountId']})"
                                . " does not match the account ID supplied in the"
                                . " ARN (" . $arn->getAccountId() . ").");
                        }
                    } else {
                        $cmd['AccountId'] = $arn->getAccountId();
                    }

                    // Set modified request
                    $req = $req
                        ->withUri($req->getUri()->withHost($host)->withPath($path))
                        ->withHeader('x-amz-account-id', $arn->getAccountId());

                    // Update signing region based on ARN data if configured to do so
                    if ($this->config['use_arn_region']->isUseArnRegion()) {
                        $region = $arn->getRegion();
                    } else {
                        $region = $this->region;
                    }
                    $endpointData = $partition([
                        'region' => $region,
                        'service' => $arn->getService()
                    ]);
                    $cmd['@context']['signing_region'] = $endpointData['signingRegion'];

                    // Update signing service for Outposts ARNs
                    if ($arn instanceof OutpostsAccessPointArn) {
                        $cmd['@context']['signing_service'] = $arn->getService();
                    }
                }
            }
        }

        // For operations that redirect endpoint & signing service based on
        // presence of OutpostId member. These operations will likely not
        // overlap with operations that perform ARN expansion.
        if (in_array($cmd->getName(), self::$outpostIdRedirectCommands)
            && !empty($cmd['OutpostId'])
        ) {
            $req = $req->withUri(
                $req->getUri()->withHost($this->generateOutpostIdHost())
            );
            $cmd['@context']['signing_service'] = 's3-outposts';
        }

        return $nextHandler($cmd, $req);
    }

    private function generateOutpostsArnHost(
        OutpostsArnInterface $arn,
        RequestInterface $req
    ) {
        if (!empty($this->config['use_arn_region']->isUseArnRegion())) {
            $region = $arn->getRegion();
        } else {
            $region = $this->region;
        }
        $suffix = $this->getPartitionSuffix($arn, $this->partitionProvider);
        return "s3-outposts.{$region}.{$suffix}";
    }

    private function generateNonOutpostsArnHost(
        ArnInterface $arn,
        RequestInterface $req
    ) {
        $host = $arn->getAccountId() . '.s3-control';
        if (!empty($this->config['dual_stack'])) {
            $host .= '.dualstack';
        }
        if (!empty($this->config['use_arn_region']->isUseArnRegion())) {
            $region = $arn->getRegion();
        } else {
            $region = $this->region;
        }
        $suffix = $this->getPartitionSuffix($arn, $this->partitionProvider);
        return "{$host}.{$region}.{$suffix}";
    }

    private function generateOutpostIdHost()
    {
        $region = $this->region;
        $suffix = $this->partitionProvider->getPartition(
            $region,
            $this->service->getEndpointPrefix()
        );
        return "s3-outposts.{$region}.{$suffix}";
    }

    private function validateBucketArn(ArnInterface $arn)
    {
        if ($arn instanceof BucketArnInterface) {
            return $this->validateArn($arn);
        }

        throw new InvalidArnException('Provided ARN was not a valid S3 bucket'
            . ' ARN.');
    }

    private function validateAccessPointArn(ArnInterface $arn)
    {
        if ($arn instanceof AccessPointArnInterface) {
            return $this->validateArn($arn);
        }

        throw new InvalidArnException('Provided ARN was not a valid S3 access'
            . ' point ARN.');
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
        // Dualstack is not supported with Outposts ARNs
        if ($arn instanceof OutpostsArnInterface
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
        if (!($this->isMatchingSigningRegion(
            $arn->getRegion(),
            $this->region,
            $this->service->getEndpointPrefix(),
            $this->partitionProvider
        ))) {
            if (empty($this->config['use_arn_region'])
                || !($this->config['use_arn_region']->isUseArnRegion())
            ) {
                throw new InvalidRegionException('The region'
                    . " specified in the ARN (" . $arn->getRegion()
                    . ") does not match the client region ("
                    . "{$this->region}).");
            }
        }

        // Ensure it is not resolved to fips pseudo-region for S3 Outposts
        if ($arn instanceof OutpostsArnInterface) {
            if (empty($this->config['use_arn_region'])
                || !($this->config['use_arn_region']->isUseArnRegion())
            ) {
                $region = $this->region;
            } else {
                $region = $arn->getRegion();
            }

            if ($this->isFipsPseudoRegion($region)) {
                throw new InvalidRegionException(
                    'Fips is currently not supported with S3 Outposts access'
                    . ' points. Please provide a non-fips region or do not supply an'
                    . ' access point ARN.');
            }
        }

        return $arnPart;
    }
}
