<?php
namespace Aws\Test\S3;

use Aws\CommandInterface;
use Aws\Middleware;
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
     * @param $path
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
                    'region' => 'us-west-2',
                ],
                'myendpoint-123456789012.s3.us-west-2.aws',
                'Bar/Baz',
            ],
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-west-2',
                    'use_dual_stack_endpoint' => true,
                ],
                'myendpoint-123456789012.s3.us-west-2.aws',
                'Bar/Baz',
            ],
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-west-2',
                    'use_accelerate_endpoint' => true,
                ],
                'myendpoint-123456789012.s3.us-west-2.aws',
                'Bar/Baz',
            ],
            [
                'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                [
                    'region' => 'us-west-2',
                    'use_accelerate_endpoint' => true,
                    'use_dual_stack_endpoint' => true,
                ],
                'myendpoint-123456789012.s3.us-west-2.aws',
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
}
