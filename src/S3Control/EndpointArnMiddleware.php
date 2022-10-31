<?php
namespace Aws\S3Control;

use Aws\Api\Service;
use Aws\Arn\AccessPointArnInterface;
use Aws\Arn\ArnParser;
use Aws\Arn\S3\BucketArnInterface;
use Aws\Arn\S3\OutpostsArnInterface;
use Aws\CommandInterface;
use Aws\Endpoint\PartitionEndpointProvider;
use Aws\S3\EndpointRegionHelperTrait;
use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;

/**
 * Checks for access point ARN in members targeting BucketName, modifying
 * endpoint as appropriate
 *
 * @internal
 */
class EndpointArnMiddleware
{
//    use EndpointRegionHelperTrait;

    /**
     * Commands which do not do ARN expansion for a specific given shape name
     * @var array
     */
    private static $selectiveNonArnableCmds = [
        'AccessPointName' => [
            'CreateAccessPoint',
        ],
        'BucketName' => [],
    ];

    /**
     * Commands which do not do ARN expansion at all for relevant members
     * @var array
     */
    private static $nonArnableCmds = [
        'CreateBucket',
        'ListRegionalBuckets',
    ];

    /**
     * Commands which trigger endpoint and signer redirection based on presence
     * of OutpostId
     * @var array
     */
    private static $outpostIdRedirectCmds = [
        'CreateBucket',
        'ListRegionalBuckets',
    ];

    /** @var callable */
    private $nextHandler;

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
        array   $config

    )
    {
        return function (callable $handler) use ($service, $region, $config) {
            return new self($handler, $service, $region, $config);
        };
    }

    public function __construct(
        callable $nextHandler,
        Service  $service,
                 $region,
        array    $config = []
    )
    {
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
            && !in_array($cmd->getName(), self::$nonArnableCmds)
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

                // Determine if appropriate member contains ARN value and is
                // eligible for ARN expansion
                if (!is_null($bucketNameMember)
                    && !empty($cmd[$bucketNameMember])
                    && !in_array($cmd->getName(), self::$selectiveNonArnableCmds['BucketName'])
                    && ArnParser::isArn($cmd[$bucketNameMember])
                ) {
                    $arn = ArnParser::parse($cmd[$bucketNameMember]);
                } elseif (!is_null($accesspointNameMember)
                    && !empty($cmd[$accesspointNameMember])
                    && !in_array($cmd->getName(), self::$selectiveNonArnableCmds['AccessPointName'])
                    && ArnParser::isArn($cmd[$accesspointNameMember])
                ) {
                    $arn = ArnParser::parse($cmd[$accesspointNameMember]);
                }

                // Process only if an appropriate member contains an ARN value
                // and is an Outposts ARN
                if (!empty($arn) && $arn instanceof OutpostsArnInterface) {
                    // ARN replacement
                    $path = $req->getUri()->getPath();
                    if ($arn instanceof AccessPointArnInterface) {
                        // Replace ARN with access point name
                        $path = str_replace(
                            urlencode($cmd[$accesspointNameMember]),
                            $arn->getAccesspointName(),
                            $path
                        );

                        // Replace ARN in the payload
                        $req->getBody()->seek(0);
                        $body = Psr7\Utils::streamFor(str_replace(
                            $cmd[$accesspointNameMember],
                            $arn->getAccesspointName(),
                            $req->getBody()->getContents()
                        ));

                        // Replace ARN in the command
                        $cmd[$accesspointNameMember] = $arn->getAccesspointName();
                    } elseif ($arn instanceof BucketArnInterface) {

                        // Replace ARN in the path
                        $path = str_replace(
                            urlencode($cmd[$bucketNameMember]),
                            $arn->getBucketName(),
                            $path
                        );

                        // Replace ARN in the payload
                        $req->getBody()->seek(0);
                        $newBody = str_replace(
                            $cmd[$bucketNameMember],
                            $arn->getBucketName(),
                            $req->getBody()->getContents()
                        );
                        $body = Psr7\Utils::streamFor($newBody);

                        // Replace ARN in the command
                        $cmd[$bucketNameMember] = $arn->getBucketName();
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
                        ->withUri($req->getUri()->withPath($path));
                    if (isset($body)) {
                        $req = $req->withBody($body);
                    }
                }
            }
        }
        return $nextHandler($cmd, $req);
    }
}