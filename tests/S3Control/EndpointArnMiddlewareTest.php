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
 * @covers \Aws\S3Control\EndpointArnMiddleware
 */
class EndpointArnMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

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
        $s3control = $this->getTestClient('s3control', $options);
        $this->addMockResults($s3control, [[]]);
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
            // S3 accesspoint ARN
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
        ];
    }

}
