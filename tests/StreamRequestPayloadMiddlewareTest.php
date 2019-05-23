<?php
namespace Aws\Test;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\ClientResolver;
use Aws\CommandInterface;
use Aws\HandlerList;
use Aws\Middleware;
use Aws\Result;
use Aws\StreamRequestPayloadMiddleware;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers \Aws\StreamRequestPayloadMiddleware
 */
class StreamRequestPayloadMiddlewareTest extends TestCase
{

    /**
     * @dataProvider generateTestCases
     *
     * @param CommandInterface $command
     * @param array $expectedHeaders
     * @param array $expectedNonHeaders
     */
    public function testAddsProperHeaders(
        CommandInterface $command,
        array $expectedHeaders,
        array $expectedNonHeaders
    ) {
        $list = $this->generateTestHandlerList();

        $list->setHandler(function (
            CommandInterface $command,
            RequestInterface $request
        ) use (
            $expectedHeaders,
            $expectedNonHeaders
        ) {
            $this->assertArraySubset($expectedHeaders, $request->getHeaders());
            foreach ($expectedNonHeaders as $header) {
                $this->assertArrayNotHasKey($header, $request->getHeaders());
            }
            return new Result([]);
        });

        $handler = $list->resolve();
        $handler($command, new Request('POST', 'https://foo.com'));
    }

    public function generateTestCases()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $inputStream = Psr7\stream_for('test');

        return [
            [
                $client->getCommand(
                    'NonStreamingOp',
                    [
                        'InputString' => 'teststring',
                    ]
                ),
                [],
                [ 'transfer-encoding', 'content-length' ],
            ],
            [
                $client->getCommand(
                    'StreamingOp',
                    [
                        'InputStream' => $inputStream,
                    ]
                ),
                [ 'content-length' => [26] ],
                [ 'transfer-encoding' ],
            ],
            [
                $client->getCommand(
                    'StreamingLengthOp',
                    [
                        'InputStream' => $inputStream,
                    ]
                ),
                [ 'content-length' => [26] ],
                [ 'transfer-encoding' ],
            ],
            [
                $client->getCommand(
                    'StreamingUnsignedOp',
                    [
                        'InputStream' => $inputStream,
                    ]
                ),
                [ 'transfer-encoding' => ['chunked'] ],
                [ 'content-length' ],
            ],
            [
                $client->getCommand(
                    'StreamingLengthUnsignedOp',
                    [
                        'InputStream' => $inputStream,
                    ]
                ),
                [ 'content-length' => [26] ],
                [ 'transfer-encoding' ],
            ],
        ];
    }

    /**
     * @expectedException \Aws\Exception\IncalculablePayloadException
     * @expectedExceptionMessage Payload content length is required and can not be calculated.
     */
    public function testThrowsExceptionOnIncalculableSize()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand(
            'StreamingOp',
            [
                'InputStream' => Psr7\stream_for('test'),
            ]
        );
        $middleware = StreamRequestPayloadMiddleware::wrap($service);
        $invokable = $middleware(function($cmd, $req) {});

        // Mock a request with a body whose size returns null
        $streamMock = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['getSize'])
            ->getMock();
        $streamMock->expects($this->any())
            ->method('getSize')
            ->willReturn(null);
        $requestMock = $this->getMockBuilder(Request::class)
            ->setConstructorArgs(['POST', 'https://foo.com'])
            ->setMethods(['getBody'])
            ->getMock();
        $requestMock->expects($this->any())
            ->method('getBody')
            ->willReturn($streamMock);

        $invokable($command, $requestMock);
    }

    private function generateTestHandlerList()
    {
        $service = $this->generateTestService();
        $serializer = ClientResolver::_default_serializer([
            'api' => $service,
            'endpoint' => ''
        ]);

        $list = new HandlerList();
        $list->prependBuild(Middleware::requestBuilder($serializer), 'builder');
        $list->prependSign(
            StreamRequestPayloadMiddleware::wrap($service),
            'StreamRequestPayloadMiddleware'
        );

        return $list;
    }

    private function generateTestClient(Service $service, $args = [])
    {
        return new AwsClient(
            array_merge(
                [
                    'service'      => 'foo',
                    'api_provider' => function () use ($service) {
                        return $service->toArray();
                    },
                    'region'       => 'us-east-1',
                    'version'      => 'latest',
                ],
                $args
            )
        );
    }

    private function generateTestService()
    {
        return new Service(
            [
                'metadata' => [
                    "protocol" => "rest-json",
                    "apiVersion" => "2014-01-01"
                ],
                'shapes' => [
                    "BlobLengthStream" => [
                        "type" => "blob",
                        "streaming" => true,
                        "requiresLength" => true,
                    ],
                    "BlobStream" => [
                        "type" => "blob",
                        "streaming" => true,
                    ],
                    "NonStreamingInputShape" => [
                        "type" => "structure",
                        "required" => [
                            "InputString",
                        ],
                        "members" => [
                            "InputString" => [
                                "shape" => "StringType",
                            ],
                        ],
                    ],
                    "StreamingInputShape" => [
                        "type" => "structure",
                        "required" => [
                            "InputStream",
                        ],
                        "members" => [
                            "InputStream" => [
                                "shape" => "BlobStream",
                            ],
                            "InputString" => [
                                "shape" => "StringType",
                            ],
                        ],
                    ],
                    "StreamingLengthInputShape" => [
                        "type" => "structure",
                        "members" => [
                            "InputStream" => [
                                "shape" => "BlobLengthStream",
                            ],
                        ],
                    ],
                    "StringType"=> [
                        "type" => "string",
                    ],
                ],
                'operations' => [
                    "NonStreamingOp" => [
                        "name"=> "NonStreamingOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "NonStreamingInputShape"],
                    ],
                    "StreamingOp" => [
                        "name"=> "StreamingOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "StreamingInputShape"],
                    ],
                    "StreamingLengthOp" => [
                        "name"=> "StreamingLengthOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "StreamingLengthInputShape"],
                    ],
                    "StreamingUnsignedOp" => [
                        "name"=> "StreamingUnsignedOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "StreamingInputShape"],
                        "authtype" => "v4-unsigned-body",
                    ],
                    "StreamingLengthUnsignedOp" => [
                        "name"=> "StreamingLengthUnsignedOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "StreamingLengthInputShape"],
                        "authtype" => "v4-unsigned-body",
                    ],
                ],
            ],
            function () { return []; }
        );
    }

}
