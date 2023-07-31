<?php
namespace Aws\Test;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Command;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\Result;
use Aws\TraceMiddleware;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\TraceMiddleware
 */
class TraceMiddlewareTest extends TestCase
{
    public function testEmitsDebugInfo()
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function ($cmd, $req) {
            return Promise\Create::promiseFor(new Result([
                'baz' => 'bar',
                'bam' => 'qux'
            ]));
        });
        $list->appendInit(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                $req = $req->withHeader('foo', 'bar');
                return $handler($cmd, $req);
            };
        });
        $list->appendValidate(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                unset($cmd['b']);
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => $logfn]));
        $handler = $list->resolve();
        $command = new Command('foo', ['a' => '1', 'b' => '2']);
        $request = new Request('GET', 'http://foo.com');
        $handler($command, $request);
        Promise\Utils::queue()->run();
        $this->assertStringContainsString("-> Entering step init, name ''", $str);
        $this->assertStringContainsString('command was set to array', $str);
        $this->assertStringContainsString('request was set to array', $str);
        $this->assertStringContainsString("<- Leaving step init, name ''", $str);
        $this->assertStringContainsString('result was set to array', $str);
        $this->assertStringContainsString('Inclusive step time: ', $str);
        $this->assertStringContainsString('command.params.b was unset', $str);
        $this->assertStringContainsString('no changes', $str);
        $this->assertStringContainsString("<- Leaving step validate, name ''", $str);
    }

    public function testTracksExceptions()
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function ($cmd, $req) {
            return Promise\Create::promiseFor(new Result());
        });
        $list->appendInit(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                $req = $req->withHeader('foo', 'bar');
                return $handler($cmd, $req);
            };
        });
        $list->appendValidate(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                return new RejectedPromise(new \Exception('Oh no!'));
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => $logfn]));
        $handler = $list->resolve();
        $command = new Command('foo');
        $request = new Request('GET', 'http://foo.com');
        $handler($command, $request);
        Promise\Utils::queue()->run();
        $this->assertStringContainsString('error was set to array', $str);
        $this->assertStringContainsString('trace', $str);
        $this->assertStringContainsString('class', $str);
        $this->assertStringContainsString('message', $str);
        $this->assertStringContainsString('string(6) "Oh no!"', $str);
    }

    public function testTracksAwsSpecificExceptions()
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function ($cmd, $req) {
            return Promise\Create::promiseFor(new Result());
        });
        $list->appendInit(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                $req = $req->withHeader('foo', 'bar');
                return $handler($cmd, $req);
            };
        });
        $list->appendValidate(function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                return new RejectedPromise(new AwsException('error', $cmd, [
                    'request'  => $req,
                    'response' => new Response(200)
                ]));
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => $logfn]));
        $handler = $list->resolve();
        $command = new Command('foo');
        $request = new Request('GET', 'http://foo.com');
        $handler($command, $request);
        Promise\Utils::queue()->run();
        $this->assertStringContainsString('error was set to array', $str);
        $this->assertStringContainsString('trace', $str);
        $this->assertStringContainsString('class', $str);
        $this->assertStringContainsString('message', $str);
        $this->assertStringContainsString('string(5) "error"', $str);
    }

    /**
     * @dataProvider authStringProvider
     *
     * @param string $key
     * @param string $signature
     * @param array $headers
     */
    public function testScrubsAuthStrings($key, $signature, array $headers)
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();

        $list->setHandler(function ($cmd, $req) use ($key) {
            // ensure that http level debug information is filtered as well.
            fwrite($cmd['@http']['debug'], "Credential=$key/...\n");
            return Promise\Create::promiseFor(new Result());
        });

        $list->appendInit(function ($handler) {
            return function ($cmd, $req) use ($handler) {
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => $logfn]));
        $handler = $list->resolve();
        $command = new Command('foo');
        $request = new Request(
            'GET',
            "http://foo.com?Signature=$signature&AWSAccessKeyId=$key",
            array_map(function (array $h) { return $h['raw']; }, $headers)
        );
        $handler($command, $request);

        $this->assertStringNotContainsString($key, $str);
        $this->assertStringNotContainsString($signature, $str);
        foreach ($headers as $header) {
            $this->assertStringNotContainsString($header['raw'], $str);
            $this->assertStringContainsString($header['scrubbed'], $str);
        }
    }

    public function testRedactsSensitiveTraits()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $command = $client->getCommand(
            'SensitiveOp',
             [
                 "InputShape" => [
                     "PublicParameter" => "PublicParameter not redacted",
                     "SensitiveParameter" => "SensitiveParameter was redacted",
                     "NestedParams" => [
                         "NestedPublicParameter" => "NestedParams also not redacted",
                         "NestedSensitiveParameter" => "NestedSensitiveParameter was also redacted",
                     ],
                     "SensitiveArray" => [
                         "PublicParameter" => "SensitiveArray contents also redacted",
                     ]
                 ]
             ]
        );

        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function () {
            return Promise\Create::promiseFor(new Result());
        });
        $list->appendInit(function ($handler) {
            return function ($cmd, $req) use ($handler) {
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => $logfn], $service));

        $handler = $list->resolve();
        $request = new Request('post', "/");
        $handler($command, $request);

        $this->assertStringContainsString("NestedParams also not redacted", $str);
        $this->assertStringContainsString("PublicParameter not redacted", $str);
        $this->assertStringContainsString("[SensitiveParameter]", $str);
        $this->assertStringNotContainsString("SensitiveParameter was redacted", $str);
        $this->assertStringContainsString("[NestedSensitiveParameter]", $str);
        $this->assertStringNotContainsString("NestedSensitiveParameter was also redacted", $str);
        $this->assertStringContainsString("[SensitiveArray]", $str);
        $this->assertStringNotContainsString("SensitiveArray contents also redacted", $str);
    }

    public function authStringProvider()
    {
        return [
            // v4 signature example from http://docs.aws.amazon.com/AmazonS3/latest/API/sigv4-auth-using-authorization-header.html
            [
                'AKIAIOSFODNN7EXAMPLE', // key
                'fe5f80f77d5fa3beca038a248ff027d0445342fe2855ddc963176630326f1024', // signature
                [ // headers
                    'Authorization' => [
                        'raw' => 'AWS4-HMAC-SHA256 Credential=AKIAIOSFODNN7EXAMPLE/20130524/us-east-1/s3/aws4_request, SignedHeaders=host;range;x-amz-date, Signature=fe5f80f77d5fa3beca038a248ff027d0445342fe2855ddc963176630326f1024',
                        'scrubbed' => 'AWS4-HMAC-SHA256 Credential=[KEY]/20130524/us-east-1/s3/aws4_request, SignedHeaders=host;range;x-amz-date, Signature=[SIGNATURE]',
                    ],
                    'X-Amz-Security-Token' => [ // STS token example from http://docs.aws.amazon.com/STS/latest/APIReference/API_GetSessionToken.html
                        'raw' => 'AQoEXAMPLEH4aoAH0gNCAPyJxz4BlCFFxWNE1OPTgk5TthT+FvwqnKwRcOIfrRh3c/LTo6UDdyJwOOvEVPvLXCrrrUtdnniCEXAMPLE/IvU1dYUg2RVAJBanLiHb4IgRmpRV3zrkuWJOgQs8IZZaIv2BXIa2R4OlgkBN9bkUDNCJiBeb/AXlzBBko7b15fjrBs2+cTQtpZ3CYWFXG8C5zqx37wnOE49mRl/+OtkIKGO7fAE',
                        'scrubbed' => '[TOKEN]',
                    ],
                    'Query-String' => [
                        'raw' => 'X-Amz-Security-Token=AQoEXAMPLEH4aoAH0gNCAPyJxz4BlCFFxWNE1OPTgk5TthT+FvwqnKwRcOIfrRh3c/LTo6UDdyJwOOvEVPvLXCrrrUtdnniCEXAMPLE/IvU1dYUg2RVAJBanLiHb4IgRmpRV3zrkuWJOgQs8IZZaIv2BXIa2R4OlgkBN9bkUDNCJiBeb/AXlzBBko7b15fjrBs2+cTQtpZ3CYWFXG8C5zqx37wnOE49mRl/+OtkIKGO7fAE&foo=bar',
                        'scrubbed' => 'X-Amz-Security-Token=[TOKEN]&foo=bar'
                    ],
                ],
            ],
        ];
    }

    public function testCanScrubOnArbitraryPatterns()
    {
        $scrubPatterns = [
            '/SuperSecret=[^&]+/i' => 'SuperSecret=[FOR_OFFICIAL_EYES_ONLY]'
        ];
        $toScrub = 'OhNoIShouldBeHidden';
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();

        $list->setHandler(function ($cmd, $req) {
            return Promise\Create::promiseFor(new Result());
        });

        $list->appendInit(function ($handler) {
            return function ($cmd, $req) use ($handler) {
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware([
            'logfn' => $logfn,
            'auth_strings' => $scrubPatterns,
        ]));

        $handler = $list->resolve();
        $command = new Command('foo');
        $request = new Request(
            'GET',
            "http://foo.com?SuperSecret=$toScrub"
        );
        $handler($command, $request);

        $this->assertStringNotContainsString($toScrub, $str);
        foreach (array_values($scrubPatterns) as $scrubbed) {
            $this->assertStringContainsString($scrubbed, $str);
        }
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
                    "protocol" => "json",
                    "apiVersion" => "2014-01-01",
                    "jsonVersion" => "1.1"
                ],
                'shapes' => [
                    "InputShape" => [
                        "type" => "structure",
                        "members" => [
                            "PublicParameter" => [
                                "shape" => "PublicParameter",
                            ],
                            "SensitiveParameter" => [
                                "shape" => "SensitiveParameter",
                            ],
                            "NestedParams" => [
                                "type" => "NestedParams",
                                ],
                            ],
                            "SensitiveArray" => [
                                "type" => "SensitiveArray",
                            ],
                        ],
                    "PublicParameter"=> [
                        "type"=> "string",
                        "sensitive" => false
                    ],
                    "SensitiveParameter"=> [
                        "type"=> "string",
                        "sensitive" => true
                    ],
                    "NestedParams"=> [
                        "type"=> "structure",
                        "sensitive" => false,
                        "members" => [
                            "NestedPublicParameter" => [
                                "shape" => "NestedPublicParameter"
                            ],
                            "NestedSensitiveParameter" => [
                                "shape" => "NestedSensitiveParameter",
                            ],
                        ],
                    ],
                    "NestedPublicParameter"=> [
                        "type"=> "string",
                    ],
                    "NestedSensitiveParameter"=> [
                        "type"=> "string",
                        "sensitive" => true
                    ],
                    "SensitiveArray"=> [
                        "type"=> "string",
                        "members" => [
                            "NestedPublicParameter" => [
                                "shape" => "string"
                            ],
                        ],
                        "sensitive" => true
                    ],
                ],
                'operations' => [
                    "SensitiveOp"=> [
                        "name"=> "SensitiveOp",
                        "http"=> [
                            "method"=> "POST",
                            "requestUri"=> "/",
                            "responseCode"=> 200
                        ],
                        "input"=> ["shape"=> "InputShape"],
                    ],
                ],
            ],
            function () { return []; }
        );
    }
}
