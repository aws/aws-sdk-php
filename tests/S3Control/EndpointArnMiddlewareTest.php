<?php
namespace Aws\Test\S3;

use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\InvalidRegionException;
use Aws\Exception\UnresolvedEndpointException;
use Aws\Middleware;
use Aws\Result;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Aws\Test\S3Control\S3ControlTestingTrait;
use Aws\Test\UsesServiceTrait;
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
                $this->assertEquals("/{$target}", $req->getRequestTarget());
                $this->assertEquals(
                    $signingRegion,
                    $cmd['@context']['signing_region']
                );
                if (!empty($signingService)) {
                    $this->assertEquals(
                        $signingService,
                        $cmd['@context']['signing_service']
                    );
                }
                $this->assertContains(
                    "/{$signingRegion}/s3",
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
            // Accesspoint ARN
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint'
                ],
                [
                    'region' => 'us-west-2',
                ],
                '123456789012.s3-control.us-west-2.amazonaws.com',
                'v20180820/accesspoint/myendpoint',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'us-west-2',
                null,
            ],
            // Accesspoint ARN, different region, use_arn_region true
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint'
                ],
                [
                    'region' => 'us-west-2',
                    'use_arn_region' => true
                ],
                '123456789012.s3-control.us-east-1.amazonaws.com',
                'v20180820/accesspoint/myendpoint',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'us-east-1',
                null,
            ],
            // Accesspoint ARN, aws-us-gov
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws-us-gov:s3:us-gov-east-1:123456789012:accesspoint:myendpoint'
                ],
                [
                    'region' => 'us-gov-east-1',
                    'use_arn_region' => false
                ],
                '123456789012.s3-control.us-gov-east-1.amazonaws.com',
                'v20180820/accesspoint/myendpoint',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'us-gov-east-1',
                null,
            ],
            // Accesspoint ARN, aws-us-gov, fips
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws-us-gov:s3:us-gov-east-1:123456789012:accesspoint:myendpoint'
                ],
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_arn_region' => false
                ],
                '123456789012.s3-control.fips-us-gov-east-1.amazonaws.com',
                'v20180820/accesspoint/myendpoint',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'fips-us-gov-east-1',
                null,
            ],
            // Accesspoint ARN, aws-us-gov, fips, use_arn_region true
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws-us-gov:s3:fips-us-gov-east-1:123456789012:accesspoint:myendpoint'
                ],
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_arn_region' => true
                ],
                '123456789012.s3-control.fips-us-gov-east-1.amazonaws.com',
                'v20180820/accesspoint/myendpoint',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'fips-us-gov-east-1',
                null,
            ],
            // Accesspoint ARN, aws-us-gov, fips, non-fips arn, use_arn_region true
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws-us-gov:s3:us-gov-east-1:123456789012:accesspoint:myendpoint'
                ],
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_arn_region' => true
                ],
                '123456789012.s3-control.us-gov-east-1.amazonaws.com',
                'v20180820/accesspoint/myendpoint',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'us-gov-east-1',
                null,
            ],
            // Accesspoint ARN, dualstack
            [
                'GetAccessPoint',
                [
                    'AccountId' => '123456789012',
                    'Name' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint'
                ],
                [
                    'region' => 'us-west-2',
                    'use_dual_stack_endpoint' => true
                ],
                '123456789012.s3-control.dualstack.us-west-2.amazonaws.com',
                'v20180820/accesspoint/myendpoint',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'us-west-2',
                null,
            ],
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
                null,
            ],
            // Bucket ARN
            [
                'DeleteBucket',
                [
                    'AccountId' => '123456789012',
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:bucket:mybucket'
                ],
                [
                    'region' => 'us-west-2',
                ],
                '123456789012.s3-control.us-west-2.amazonaws.com',
                'v20180820/bucket/mybucket',
                [
                    'x-amz-account-id' => '123456789012',
                ],
                'us-west-2',
                null,
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
                null,
            ],
        ];
    }
}
