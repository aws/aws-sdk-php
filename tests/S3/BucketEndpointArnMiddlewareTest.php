<?php
namespace Aws\Test\S3;

use Aws\Arn\ArnParser;
use Aws\CommandInterface;
use Aws\Middleware;
use Aws\S3\BucketEndpointArnMiddleware;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;
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
     * @throws \Exception
     */
    public function testCorrectlyModifiesUri($arn, $options, $endpoint, $key)
    {
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
            ) use ($endpoint, $key) {
                $this->assertEquals(
                    $endpoint,
                    $req->getUri()->getHost()
                );
                $this->assertEquals("/{$key}", $req->getRequestTarget());
            })
        );
        $s3->execute($command);
    }

    public function accessPointArnCases()
    {
        return [
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-east-2',
                    'use_arn_region' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                'Bar/Baz',
            ],
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-west-2',
                ],
                'myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                'Bar/Baz',
            ],
            [
                'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-east-1',
                ],
                'myendpoint-123456789012.s3-accesspoint.us-east-1.amazonaws.com',
                'Bar/Baz',
            ],
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-west-2',
                    'use_dual_stack_endpoint' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint.dualstack.us-west-2.amazonaws.com',
                'Bar/Baz',
            ],
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-east-2',
                    'use_arn_region' => true,
                ],
                'myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                'Bar/Baz',
            ],
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-west-2',
                    'use_arn_region' => false,
                ],
                'myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com',
                'Bar/Baz',
            ],
        ];
    }

    /**
     * @expectedException \Aws\Exception\InvalidRegionException
     * @expectedExceptionMessage The region specified in the ARN (us-east-1) does not match the client region (us-west-2)
     */
    public function testThrowsInvalidRegionException()
    {
        $s3 = $this->getTestClient('s3', ['region' => 'us-west-2']);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand(
            'GetObject',
            [
                'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                'Key' => 'Bar/Baz',
            ]
        );
        $s3->execute($command);
    }

    /**
     * @expectedException \Aws\Exception\UnresolvedEndpointException
     * @expectedExceptionMessage Accelerate is currently not supported with access points.
     */
    public function testThrowsForAccelerate()
    {
        $s3 = $this->getTestClient(
            's3',
            [
                'region' => 'us-west-2',
                'use_accelerate_endpoint' => true,
            ]
        );
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand(
            'GetObject',
            [
                'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                'Key' => 'Bar/Baz',
            ]
        );
        $s3->execute($command);
    }

    /**
     * @expectedException \Aws\Exception\UnresolvedEndpointException
     * @expectedExceptionMessage Path-style addressing is currently not supported with access points.
     */
    public function testThrowsForPathStyle()
    {
        $s3 = $this->getTestClient(
            's3',
            [
                'region' => 'us-west-2',
                'use_path_style_endpoint' => true,
            ]
        );
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand(
            'GetObject',
            [
                'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                'Key' => 'Bar/Baz',
            ]
        );
        $s3->execute($command);
    }

    /**
     * @expectedException \Aws\S3\Exception\S3Exception
     * @expectedExceptionMessage Bucket parameter parsed as ARN and failed with: Provided ARN was not a valid S3 access point ARN
     */
    public function testThrowsForWrongArnType()
    {
        $s3 = $this->getTestClient('s3', ['region' => 'us-west-2']);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand(
            'GetObject',
            [
                'Bucket' => 'arn:aws:s3:us-east-1:123456789012:some_type:myendpoint',
                'Key' => 'Bar/Baz',
            ]
        );
        $s3->execute($command);
    }

    /**
     * @expectedException \Aws\S3\Exception\S3Exception
     * @expectedExceptionMessage Bucket parameter parsed as ARN and failed with: The 6th component of an ARN
     */
    public function testThrowsForInvalidArn()
    {
        $s3 = $this->getTestClient('s3', ['region' => 'us-west-2']);
        $this->addMockResults($s3, [[]]);
        $command = $s3->getCommand(
            'GetObject',
            [
                'Bucket' => 'arn:not:valid',
                'Key' => 'Bar/Baz',
            ]
        );
        $s3->execute($command);
    }
}
