<?php
namespace Aws\S3;

use Aws\Api\Service;
use Aws\Arn\ArnInterface;
use Aws\Arn\ArnParser;
use Aws\Arn\Exception\InvalidArnException;
use Aws\Arn\S3\AccessPointArn;
use Aws\CommandInterface;
use Aws\Endpoint\PartitionEndpointProvider;
use Aws\Exception\InvalidRegionException;
use Aws\Exception\UnresolvedEndpointException;
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

    /** @var string */
    private $region;

    /** @var $config */
    private $config;

    /** @var PartitionEndpointProvider */
    private $partitionEndpointProvider;

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
        $this->partitionEndpointProvider = PartitionEndpointProvider::defaultProvider();
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

                    try {
                        $arn = ArnParser::parse($cmd[$arnableKey]);
                        if ($arn instanceof AccessPointArn) {
                            // Accelerate is not supported with access points
                            if (!empty($this->config['accelerate'])) {
                                throw new UnresolvedEndpointException(
                                    'Accelerate is currently not supported with'
                                        . ' access points. Please disable accelerate'
                                        . ' or do not supply an access point ARN.'
                                );
                            }

                            // Path-style is not supported with access points
                            if (!empty($this->config['path_style'])) {
                                throw new UnresolvedEndpointException(
                                    'Path-style addressing is currently not'
                                    . ' supported with access points. Please'
                                    . ' disable path-style or do not supply an'
                                    . ' access point ARN.'
                                );
                            }

                            // Ensure ARN region matches client region unless
                            // configured for using ARN region over client region
                            if (strtolower($this->region) !== strtolower($arn->getRegion())
                                && !(!empty($this->config['use_arn_region'])
                                    && $this->config['use_arn_region']->isUseArnRegion()
                                )
                            ) {
                                throw new InvalidRegionException('The region'
                                . " specified in the ARN (" . $arn->getRegion()
                                . ") does not match the client region ("
                                . "{$this->region}).");
                            }

                            $host = $this->generateAccessPointHost($arn, $req);

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
                        } else {
                            throw new InvalidArnException('Provided ARN was not'
                                . ' a valid S3 access point ARN');
                        }
                    } catch (InvalidArnException $e) {
                        // Add context to ARN exception
                        throw new S3Exception(
                            'Bucket parameter parsed as ARN and failed with: '
                                . $e->getMessage(),
                            $cmd,
                            [],
                            $e
                        );
                    }
                }
            }
        }

        return $nextHandler($cmd, $req);
    }

    private function generateAccessPointHost(
        AccessPointArn $arn,
        RequestInterface $req
    ) {
        $host = $arn->getResourceId() . '-' . $arn->getAccountId()
            . '.s3-accesspoint';
        if ($this->hasFips($req->getUri()->getHost())) {
            $host .= '-fips';
        }
        if (!empty($this->config['dual_stack'])) {
            $host .= '.dualstack';
        }
        $host .= '.' . $arn->getRegion() . '.' . $this->getPartitionSuffix($arn);

        return $host;
    }

    private function getPartitionSuffix(ArnInterface $arn)
    {
        $partition = $this->partitionEndpointProvider
            ->getPartition($arn->getRegion(), $arn->getService());
        return $partition->getDnsSuffix();
    }

    private function hasFips($host)
    {
        if (strpos($host, 'fips-') !== false
            || strpos($host, '-fips') !== false
        ) {
            return true;
        }
        return false;
    }
}
