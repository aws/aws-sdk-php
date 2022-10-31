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
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers \Aws\S3\BucketEndpointMiddleware
 */
class BucketEndpointArnMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider accessPointArnCases
     *
     * @param $arn
     * @param $options
     * @param $endpoint
     * @param $key
     * @param $signingRegion
     * @param $signingService
     * @throws \Exception
     */
    public function testCorrectlyModifiesUri(
        $arn,
        $options,
        $endpoint,
        $key,
        $signingRegion,
        $signingService
    ) {
        $s3 = $this->getTestClient('s3', $options);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand(
            'GetObject',
            [
                'Bucket' => $arn,
                'Key' => $key
            ]
        );

        $command->getHandlerList()->appendSign(
            Middleware::tap(function (
                CommandInterface $cmd,
                RequestInterface $req
            ) use ($endpoint, $key, $signingRegion, $signingService) {
                $this->assertEquals(
                    $endpoint,
                    $req->getUri()->getHost()
                );
                $this->assertSame("/{$key}", $req->getRequestTarget());
                if (isset($cmd['@context']['signing_region'])) {
                    $this->assertEquals(
                        $signingRegion,
                        $cmd['@context']['signing_region']
                    );
                }
                if (!empty($signingService) && isset($cmd['@context']['signing_service'])) {
                    $this->assertEquals(
                        $signingService,
                        $cmd['@context']['signing_service']
                    );
                }

                $this->assertStringContainsString(
                    "/{$signingRegion}/s3",
                    $req->getHeader('Authorization')[0]
                );
            })
        );
        $s3->execute($command);
    }

    public function accessPointArnCases()
    {
        return [
            // Standard case
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-west-2',
                ],
                'myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                'Bar/Baz',
                'us-west-2',
                null,
            ],
            // Different regions, use_arn_region true
            [
                'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-west-2',
                    'use_arn_region' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint.us-east-1.amazonaws.com',
                'Bar/Baz',
                'us-east-1',
                null,
            ],
            // s3-external, use_arn_region true
            [
                'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 's3-external-1',
                    'use_arn_region' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint.us-east-1.amazonaws.com',
                'Bar/Baz',
                'us-east-1',
                null,
            ],
            // With dual-stack endpoint
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-west-2',
                    'use_dual_stack_endpoint' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint.dualstack.us-west-2.amazonaws.com',
                'Bar/Baz',
                'us-west-2',
                null,
            ],
            // With dual-stack fips endpoint, use_arn_region true
            [
                'arn:aws-us-gov:s3:us-gov-east-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_dual_stack_endpoint' => true,
                    'use_arn_region' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint-fips.dualstack.us-gov-east-1.amazonaws.com',
                'Bar/Baz',
                'us-gov-east-1',
                null,
            ],
            // Non-aws partition, use_arn_region true
            [
                'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'cn-north-1',
                    'use_arn_region' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint.cn-north-1.amazonaws.com.cn',
                'Bar/Baz',
                'cn-north-1',
                null,
            ],
            // Non-aws partition, use_arn_region false
            [
                'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'cn-north-1',
                    'use_arn_region' => false,
                ],
                'myendpoint-123456789012.s3-accesspoint.cn-north-1.amazonaws.com.cn',
                'Bar/Baz',
                'cn-north-1',
                null,
            ],
            // Non-aws partition, differing regions
            [
                'arn:aws-cn:s3:cn-northwest-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'cn-north-1',
                    'use_arn_region' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint.cn-northwest-1.amazonaws.com.cn',
                'Bar/Baz',
                'cn-northwest-1',
                null,
            ],
            // Gov region, use_arn_region true
            [
                'arn:aws-us-gov:s3:us-gov-east-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-gov-east-1',
                    'use_arn_region' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint.us-gov-east-1.amazonaws.com',
                'Bar/Baz',
                'us-gov-east-1',
                null,
            ],
            // Fips region, use_arn_region true
            [
                'arn:aws-us-gov:s3:us-gov-east-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_arn_region' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint-fips.us-gov-east-1.amazonaws.com',
                'Bar/Baz',
                'us-gov-east-1',
                null,
            ],
            // Fips region with dualstack
            [
                'arn:aws-us-gov:s3:us-gov-east-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_arn_region' => true,
                    'use_dual_stack_endpoint' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint-fips.dualstack.us-gov-east-1.amazonaws.com',
                'Bar/Baz',
                'us-gov-east-1',
                null,
            ],
            // Fips region, use arn region
            [
                'arn:aws-us-gov:s3:us-gov-west-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'fips-us-gov-east-1',
                    'use_arn_region' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint-fips.us-gov-west-1.amazonaws.com',
                'Bar/Baz',
                'us-gov-west-1',
                null,
            ],
            // Fips region with dualstack and use fips region
            [
                'arn:aws-us-gov:s3:us-gov-east-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-gov-east-1',
                    'use_fips_endpoint' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint-fips.us-gov-east-1.amazonaws.com',
                'Bar/Baz',
                'us-gov-east-1',
                null,
            ],
            // Fips region with dualstack and use fips region and use arn region
            [
                'arn:aws-us-gov:s3:us-gov-west-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-gov-east-1',
                    'use_arn_region' => true,
                    'use_fips_endpoint' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint-fips.us-gov-west-1.amazonaws.com',
                'Bar/Baz',
                'us-gov-west-1',
                null,
            ],
            // S3 outposts, standard case
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                [
                    'region' => 'us-west-2',
                ],
                'myaccesspoint-123456789012.op-01234567890123456.s3-outposts.us-west-2.amazonaws.com',
                'Bar/Baz',
                'us-west-2',
                's3-outposts',
            ],
            // S3 outposts, differing regions, use_arn_region true
            [
                'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                [
                    'region' => 'us-west-2',
                    'use_arn_region' => true,
                ],
                'myaccesspoint-123456789012.op-01234567890123456.s3-outposts.us-east-1.amazonaws.com',
                'Bar/Baz',
                'us-east-1',
                's3-outposts',
            ],
            // S3 outposts, arn with slashes
            [
                'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/accesspoint/myaccesspoint',
                [
                    'region' => 'us-west-2',
                ],
                'myaccesspoint-123456789012.op-01234567890123456.s3-outposts.us-west-2.amazonaws.com',
                'Bar/Baz',
                'us-west-2',
                's3-outposts',
            ],
            // S3 outposts, us-gov region, use_arn_region true
            [
                'arn:aws-us-gov:s3-outposts:us-gov-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                [
                    'region' => 'us-gov-east-1',
                    'use_arn_region' => true,
                ],
                'myaccesspoint-123456789012.op-01234567890123456.s3-outposts.us-gov-east-1.amazonaws.com',
                'Bar/Baz',
                'us-gov-east-1',
                's3-outposts',
            ],
            // S3 Outposts, non-aws partition
            [
                'arn:aws-cn:s3-outposts:cn-north-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                [
                    'region' => 'cn-north-1',
                ],
                'myaccesspoint-123456789012.op-01234567890123456.s3-outposts.cn-north-1.amazonaws.com.cn',
                'Bar/Baz',
                'cn-north-1',
                's3-outposts',
            ],
            // S3 Outposts, non-aws partition, differing regions, use_arn_region true
            [
                'arn:aws-cn:s3-outposts:cn-northwest-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                [
                    'region' => 'cn-north-1',
                    'use_arn_region' => true,
                ],
                'myaccesspoint-123456789012.op-01234567890123456.s3-outposts.cn-northwest-1.amazonaws.com.cn',
                'Bar/Baz',
                'cn-northwest-1',
                's3-outposts',
            ],
        ];
    }

    /**
     * @dataProvider incorrectUsageProvider
     *
     * @param CommandInterface $command
     * @param array $config
     * @param \Exception $expected
     */
    public function testThrowsForIncorrectArnUsage($command, $config, \Exception $expected)
    {
        try {
            $s3 = $this->getTestClient('s3', $config);
            $this->addMockResults($s3, [[]]);
            $command = $s3->getCommand(
                $command->getName(),
                $command->toArray()
            );
            $s3->execute($command);
            $this->fail('This was expected to fail with: ' . $expected->getMessage());
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof $expected);
            $this->assertSame(
                $expected->getMessage(),
                $e->getMessage()
            );
        }
    }

    public function incorrectUsageProvider()
    {
        return [
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                [
                    'region' => 'us-west-2',
                    'use_accelerate_endpoint' => true,
                ],
                new UnresolvedEndpointException(
            'Access Points do not support S3 Accelerate'
                )
            ],
            // Path-style with access point ARN
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                [
                    'region' => 'us-west-2',
                    'use_path_style_endpoint' => true,
                ],
                new UnresolvedEndpointException(
                    'Path-style addressing cannot be used with ARN buckets'
                )
            ],
            // Wrong ARN type
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:aws:s3:us-east-1:123456789012:some_type:myendpoint',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                ['region' => 'us-west-2'],
                new UnresolvedEndpointException(
                    'Invalid ARN: Unrecognized format: arn:aws:s3:us-east-1:123456789012:some_type:myendpoint (type: some_type)'
                )
            ],
            // Invalid ARN
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:not:valid',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                ['region' => 'us-west-2'],
                new UnresolvedEndpointException('Invalid ARN: `arn:not:valid` was not a valid ARN')
            ],
            // Non-matching partition
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                [
                    'region' => 'us-west-2',
                    's3_use_arn_region' => true,
                ],
                new UnresolvedEndpointException(
                    'Client was configured for partition `aws` but ARN (`arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint`) has `aws-cn`'
                )
            ],
            // Non-matching calculated partition
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:aws:s3:cn-north-1:123456789012:accesspoint:myendpoint',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                [
                    'region' => 'us-east-1',
                    's3_use_arn_region' => true,
                ],
                new UnresolvedEndpointException(
                    'Client was configured for partition `aws` but ARN (`arn:aws:s3:cn-north-1:123456789012:accesspoint:myendpoint`) has `aws-cn`'
                )
            ],
            // S3 Outposts, non-matching partition
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:aws-cn:s3-outposts:cn-north-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                [
                    'region' => 'us-west-2',
                    's3_use_arn_region' => true,
                ],
                new UnresolvedEndpointException(
                    'Client was configured for partition `aws` but ARN (`arn:aws-cn:s3-outposts:cn-north-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint`) has `aws-cn`'
                )
            ],
            // S3 Outposts, dualstack
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                [
                    'region' => 'us-west-2',
                    'use_dual_stack_endpoint' => true,
                ],
                new UnresolvedEndpointException(
                    'S3 Outposts does not support Dual-stack'
                )
            ],
            // S3 Outposts, accelerate
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                [
                    'region' => 'us-west-2',
                    'use_accelerate_endpoint' => true,
                ],
                new UnresolvedEndpointException(
        'S3 Outposts does not support S3 Accelerate'                )
            ],
            // s3-external, use_arn_region false
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                [
                    'region' => 's3-external-1',
                    'use_arn_region' => false,
                ],
                new UnresolvedEndpointException(
                    'Invalid configuration: region from ARN `us-east-1` does not match client region `s3-external-1` and UseArnRegion is `false`'
                )
            ],
            // aws-global, use_arn_region false
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                [
                    'region' => 'aws-global',
                    'use_arn_region' => false,
                ],
                new UnresolvedEndpointException(
                    'Invalid configuration: region from ARN `us-east-1` does not match client region `aws-global` and UseArnRegion is `false`'
                )
            ],
            // S3 Outposts, invalid ARN
            [
                new Command(
                    'GetObject',
                    [
                        'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost',
                        'Key' => 'Bar/Baz',
                    ]
                ),
                ['region' => 'us-west-2'],
                new UnresolvedEndpointException(
                    'Invalid ARN: The Outpost Id was not set'
                )
            ],
        ];
    }

    public function testCorrectlyHandlesCopyObject()
    {
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => 'us-west-2',
            's3_use_arn_region' => true,
            'handler' => function(CommandInterface $cmd, RequestInterface $req) {
                $this->assertSame(
                    'myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                    $req->getUri()->getHost()
                );
                $this->assertSame(
                    'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint/myobject',
                    $req->getHeader('x-amz-copy-source')[0]
                );
                return Promise\Create::promiseFor(new Result([]));
            }
        ]);
        $command = $s3->getCommand(
            'CopyObject',
            [
                'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                'CopySource' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint/myobject',
                'Key' => 'mykey'
            ]
        );
        $s3->execute($command);
    }
}
