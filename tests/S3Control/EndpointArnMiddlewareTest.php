<?php
namespace Aws\Test\S3Control;

use Aws\Arn\Exception\InvalidArnException;
use Aws\CommandInterface;
use Aws\Exception\InvalidRegionException;
use Aws\Exception\UnresolvedEndpointException;
use Aws\Middleware;
use Aws\Test\S3Control\S3ControlTestingTrait;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers \Aws\S3Control\EndpointArnMiddleware
 */
class EndpointArnMiddlewareTest extends TestCase
{
    use S3ControlTestingTrait;

    /**
     * @dataProvider providedSuccessCases
     *
     * @param $cmdName
     * @param $cmdParams
     * @param $options
     * @param $endpoint
     * @param $target
     * @param $headers
     * @param $signingRegion
     * @param $signingService
     * @throws \Exception
     */
    public function testCorrectlyModifiesRequestAndCommand(
        $cmdName,
        $cmdParams,
        $options,
        $endpoint,
        $target,
        $headers,
        $signingRegion,
        $signingService
    ) {
        $options['http_handler'] = function($req) {
            return Promise\promise_for(new Response());
        };
        $s3control = $this->getTestClient($options);
        $command = $s3control->getCommand($cmdName, $cmdParams);

        $command->getHandlerList()->appendSign(
            Middleware::tap(function (
                CommandInterface $cmd,
                RequestInterface $req
            ) use ($endpoint, $target, $headers, $signingRegion, $signingService) {
                $this->assertEquals(
                    $endpoint,
                    $req->getUri()->getHost()
                );
                $this->assertSame("/{$target}", $req->getRequestTarget());
                $this->assertContains(
                    "/{$signingRegion}/{$signingService}",
                    $req->getHeader('Authorization')[0]
                );
                foreach ($headers as $key => $value) {
                    $this->assertEquals($value, $req->getHeaderLine($key));
                }
            })
        );
        $s3control->execute($command);
    }

    public function providedSuccessCases()
    {
        return [
            // Outposts accesspoint ARN
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint'
                ],
                [
                    'region' => 'us-west-2',
                ],
                's3-outposts.us-west-2.amazonaws.com',
                'v20180820/accesspoint/myaccesspoint',
                [
                    'x-amz-account-id' => '123456789012',
                    'x-amz-outpost-id' => 'op-01234567890123456',
                ],
                'us-west-2',
                's3-outposts',
            ],
            // Outposts accesspoint ARN, different region, use_arn_region true
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint'
                ],
                [
                    'region' => 'us-west-2',
                    'use_arn_region' => true,
                ],
                's3-outposts.us-east-1.amazonaws.com',
                'v20180820/accesspoint/myaccesspoint',
                [
                    'x-amz-account-id' => '123456789012',
                    'x-amz-outpost-id' => 'op-01234567890123456',
                ],
                'us-east-1',
                's3-outposts',
            ],
            // Outposts accesspoint ARN, aws-us-gov
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws-us-gov:s3-outposts:us-gov-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint'
                ],
                [
                    'region' => 'us-gov-east-1',
                    'use_arn_region' => true,
                ],
                's3-outposts.us-gov-east-1.amazonaws.com',
                'v20180820/accesspoint/myaccesspoint',
                [
                    'x-amz-account-id' => '123456789012',
                    'x-amz-outpost-id' => 'op-01234567890123456',
                ],
                'us-gov-east-1',
                's3-outposts',
            ],
            // Outposts accesspoint ARN, aws-us-gov, fips
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws-us-gov:s3-outposts:us-gov-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint'
                ],
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_arn_region' => true,
                ],
                's3-outposts.us-gov-east-1.amazonaws.com',
                'v20180820/accesspoint/myaccesspoint',
                [
                    'x-amz-account-id' => '123456789012',
                    'x-amz-outpost-id' => 'op-01234567890123456',
                ],
                'us-gov-east-1',
                's3-outposts',
            ],
            // Outposts accesspoint name
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'myaccesspoint'
                ],
                [
                    'region' => 'us-west-2',
                    'use_arn_region' => true,
                ],
                '123456789012.s3-control.us-west-2.amazonaws.com',
                'v20180820/accesspoint/myaccesspoint',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'us-west-2',
                's3',
            ],
            // Outposts bucket ARN
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:bucket:mybucket'
                ],
                [
                    'region' => 'us-west-2',
                ],
                's3-outposts.us-west-2.amazonaws.com',
                'v20180820/bucket/mybucket',
                [
                    'x-amz-account-id' => '123456789012',
                    'x-amz-outpost-id' => 'op-01234567890123456',
                ],
                'us-west-2',
                's3-outposts',
            ],
            // Outposts bucket ARN, different region
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:bucket:mybucket'
                ],
                [
                    'region' => 'us-west-2',
                    'use_arn_region' => true,
                ],
                's3-outposts.us-east-1.amazonaws.com',
                'v20180820/bucket/mybucket',
                [
                    'x-amz-account-id' => '123456789012',
                    'x-amz-outpost-id' => 'op-01234567890123456',
                ],
                'us-east-1',
                's3-outposts',
            ],
            // Outposts bucket ARN, aws-us-gov
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws-us-gov:s3-outposts:us-gov-east-1:123456789012:outpost:op-01234567890123456:bucket:mybucket'
                ],
                [
                    'region' => 'us-gov-east-1',
                    'use_arn_region' => true,
                ],
                's3-outposts.us-gov-east-1.amazonaws.com',
                'v20180820/bucket/mybucket',
                [
                    'x-amz-account-id' => '123456789012',
                    'x-amz-outpost-id' => 'op-01234567890123456',
                ],
                'us-gov-east-1',
                's3-outposts',
            ],
            // Outposts bucket ARN, aws-us-gov, fips
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws-us-gov:s3-outposts:us-gov-east-1:123456789012:outpost:op-01234567890123456:bucket:mybucket'
                ],
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_arn_region' => true,
                ],
                's3-outposts.us-gov-east-1.amazonaws.com',
                'v20180820/bucket/mybucket',
                [
                    'x-amz-account-id' => '123456789012',
                    'x-amz-outpost-id' => 'op-01234567890123456',
                ],
                'us-gov-east-1',
                's3-outposts',
            ],
            // Special case: CreateBucket, normal parameter
            [
                'CreateBucket',
                [
                    'Bucket' => 'mybucket'
                ],
                [
                    'region' => 'us-west-2',
                ],
                's3-control.us-west-2.amazonaws.com',
                'v20180820/bucket/mybucket',
                [],
                'us-west-2',
                's3',
            ],
            // Special case: CreateBucket, with Outpost ID
            [
                'CreateBucket',
                [
                    'Bucket' => 'mybucket',
                    'OutpostId' => 'op-01234567890123456'
                ],
                [
                    'region' => 'us-west-2',
                ],
                's3-outposts.us-west-2.amazonaws.com',
                'v20180820/bucket/mybucket',
                [
                    'x-amz-outpost-id' => 'op-01234567890123456',
                ],
                'us-west-2',
                's3-outposts',
            ],
            // Special case: ListRegionalBuckets, normal parameter
            [
                'ListRegionalBuckets',
                [
                    'AccountId' => '123456789012'
                ],
                [
                    'region' => 'us-west-2',
                ],
                '123456789012.s3-control.us-west-2.amazonaws.com',
                'v20180820/bucket',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'us-west-2',
                's3',
            ],
            // Special case: ListRegionalBuckets, Outpost ID
            [
                'ListRegionalBuckets',
                [
                    'AccountId' => '123456789012',
                    'OutpostId' => 'op-01234567890123456'
                ],
                [
                    'region' => 'us-west-2',
                ],
                's3-outposts.us-west-2.amazonaws.com',
                'v20180820/bucket',
                [
                    'x-amz-account-id' => '123456789012',
                    'x-amz-outpost-id' => 'op-01234567890123456',
                ],
                'us-west-2',
                's3',
            ],
            // Special case: CreateAccessPoint, normal parameters
            [
                'CreateAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'myaccesspoint',
                    'Bucket' => 'mybucket'
                ],
                [
                    'region' => 'us-west-2',
                ],
                '123456789012.s3-control.us-west-2.amazonaws.com',
                'v20180820/accesspoint/myaccesspoint',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'us-west-2',
                's3',
            ],
            // Special case: CreateAccessPoint, ARN in Name (should not trigger ARN expansion)
            [
                'CreateAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Bucket' => 'mybucket'
                ],
                [
                    'region' => 'us-west-2',
                ],
                '123456789012.s3-control.us-west-2.amazonaws.com',
                'v20180820/accesspoint/arn%3Aaws%3As3%3Aus-west-2%3A123456789012%3Aaccesspoint%3Amyendpoint',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'us-west-2',
                's3',
            ],
            // Special case: CreateAccessPoint, Outposts bucket ARN
            [
                'CreateAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'myaccesspoint',
                    'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:bucket:mybucket'
                ],
                [
                    'region' => 'us-west-2',
                ],
                's3-outposts.us-west-2.amazonaws.com',
                'v20180820/accesspoint/myaccesspoint',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'us-west-2',
                's3',
            ],
        ];
    }

    /**
     * @dataProvider providedFailureCases
     *
     * @param $cmdName
     * @param $cmdParams
     * @param $options
     * @param $expectedException
     * @throws \Exception
     */
    public function testCorrectlyThrowsForBadInputsOrConfig(
        $cmdName,
        $cmdParams,
        $options,
        \Exception $expectedException
    ) {
        $options['http_handler'] = function($req) {
            return Promise\promise_for(new Response());
        };
        $s3control = $this->getTestClient($options);
        $command = $s3control->getCommand($cmdName, $cmdParams);

        try {
            $s3control->execute($command);
            $this->fail('This test case should have failed with: '
                . $expectedException->getMessage());
        } catch (\Exception $e) {
            $this->assertInstanceOf(get_class($expectedException), $e);
            $this->assertSame($expectedException->getMessage(), $e->getMessage());
        }
    }

    public function providedFailureCases()
    {
        return [
            // Outposts accesspoint ARN, different region
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint'
                ],
                [
                    'region' => 'us-west-2',
                ],
                new InvalidRegionException("The region specified in the ARN"
                    . " (us-east-1) does not match the client region (us-west-2)."),
            ],
            // Outposts accesspoint ARN, different partition
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws-cn:s3-outposts:cn-north-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint'
                ],
                [
                    'region' => 'us-west-2',
                    'use_arn_region' => true,
                ],
                new InvalidRegionException("The supplied ARN partition does not"
                    . " match the client's partition."),
            ],
            // Outposts accesspoint ARN, fips
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws-us-gov:s3-outposts:us-gov-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint'
                ],
                [
                    'region' => 'fips-us-gov-east-1',
                ],
                new InvalidRegionException('Fips is currently not supported with S3 Outposts access'
                    . ' points. Please provide a non-fips region or do not supply an'
                    . ' access point ARN.')
            ],
            // Outposts accesspoint ARN, fips, use_arn_region true
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws-us-gov:s3-outposts:fips-us-gov-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint'
                ],
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_arn_region' => true,
                ],
                new InvalidRegionException("Fips is currently not supported with"
                    . " S3 Outposts access points. Please provide a non-fips"
                    . " region or do not supply an access point ARN."),
            ],
            // Outposts accesspoint ARN, dualstack
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint'
                ],
                [
                    'region' => 'us-west-2',
                    'use_dual_stack_endpoint' => true,
                ],
                new UnresolvedEndpointException("Dualstack is currently not"
                    . " supported with S3 Outposts ARNs. Please disable"
                    . " dualstack or do not supply an Outposts ARN."),
            ],
            // Outposts accesspoint ARN, invalid ARN
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost'
                ],
                [
                    'region' => 'us-west-2',
                ],
                new InvalidArnException("Provided ARN was not a valid S3 access"
                    . " point ARN."),
            ],
            // Outposts bucket ARN, different region
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:bucket:mybucket'
                ],
                [
                    'region' => 'us-west-2',
                ],
                new InvalidRegionException("The region specified in the ARN"
                    . " (us-east-1) does not match the client region (us-west-2)."),
            ],
            // Outposts bucket ARN, different partition
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws-cn:s3-outposts:cn-north-1:123456789012:outpost:op-01234567890123456:bucket:mybucket'
                ],
                [
                    'region' => 'us-west-2',
                ],
                new InvalidRegionException("The supplied ARN partition does not"
                    . " match the client's partition."),
            ],
            // Outposts bucket ARN, fips
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws-us-gov:s3-outposts:us-gov-east-1:123456789012:outpost:op-01234567890123456:bucket:mybucket'
                ],
                [
                    'region' => 'fips-us-gov-east-1',
                ],
                new InvalidRegionException('Fips is currently not supported with S3 Outposts access'
                    . ' points. Please provide a non-fips region or do not supply an'
                    . ' access point ARN.')
            ],
            // Outposts bucket ARN, fips, use_arn_region true
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws-us-gov:s3-outposts:fips-us-gov-east-1:123456789012:outpost:op-01234567890123456:bucket:mybucket'
                ],
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_arn_region' => true
                ],
                new InvalidRegionException("Fips is currently not supported with"
                    . " S3 Outposts access points. Please provide a non-fips"
                    . " region or do not supply an access point ARN."),
            ],
            // Outposts bucket ARN, fips, use_arn_region false
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws-us-gov:s3-outposts:fips-us-gov-west-1:123456789012:outpost:op-01234567890123456:bucket:mybucket'
                ],
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_arn_region' => false
                ],
                new InvalidRegionException("The region specified in the"
                    . " ARN (fips-us-gov-west-1) does not match the client region"
                    . " (fips-us-gov-east-1).")
            ],
            // Outposts bucket ARN, dualstack
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:bucket:mybucket'
                ],
                [
                    'region' => 'us-west-2',
                    'use_dual_stack_endpoint' => true,
                ],
                new UnresolvedEndpointException("Dualstack is currently not"
                    . " supported with S3 Outposts ARNs. Please disable dualstack"
                    . " or do not supply an Outposts ARN."),
            ],
            // Outposts bucket ARN, invalid ARN
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost'
                ],
                [
                    'region' => 'us-west-2',
                ],
                new InvalidArnException("Provided ARN was not a valid S3 bucket"
                    . " ARN."),
            ],
        ];
    }
}
