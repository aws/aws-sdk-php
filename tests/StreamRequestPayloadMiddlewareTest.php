<?php
namespace Aws\Test;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\HandlerList;
use Aws\Result;
use Aws\StreamRequestPayloadMiddleware;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\StreamRequestPayloadMiddleware
 */
class StreamRequestPayloadMiddlewareTest extends TestCase
{

    public function testAddsProperHeaders()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand(
            'StreamingOp',
            [
                'InputStream' => Psr7\stream_for('test'),
//                'InputString' => 'some_string'
            ]
        );

        $list = $command->getHandlerList();
//        $list = new HandlerList();
        $list->setHandler(function ($command, $request) {
//            var_dump($request);
            return new Result([]);
        });
//        $list->appendSign(StreamRequestPayloadMiddleware::wrap($service));

        $handler = $list->resolve();

        $result = $handler($command, new Request('POST', 'https://foo.com'));
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
