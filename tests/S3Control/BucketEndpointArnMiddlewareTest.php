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
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers \Aws\S3Control\BucketEndpointMiddleware
 */
class BucketEndpointArnMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider providedArnCases
     *
     * @param $arn
     * @param $options
     * @param $endpoint
     * @param $key
     * @param $signingRegion
     * @param $signingService
     * @throws \Exception
     */
    public function testCorrectlyModifiesUriForAccessPointArns(
        $arn,
        $options,
        $endpoint,
        $key,
        $signingRegion,
        $signingService
    ) {
        $s3control = $this->getTestClient('s3control', $options);
        $this->addMockResults($s3control, [[]]);
        $command = $s3control->getCommand(
            'GetAccessPoint',
            [
                'AccountId' => 123,
                'Name' => $arn
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
                $this->assertEquals("/{$key}", $req->getRequestTarget());
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
            })
        );
        $s3control->execute($command);
    }

    public function providedArnCases()
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
        ];
    }

}
