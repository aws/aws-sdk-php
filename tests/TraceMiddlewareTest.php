<?php
namespace Aws\Test;

use Aws\Command;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\Result;
use Aws\TraceMiddleware;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Promise;

/**
 * @covers Aws\TraceMiddleware
 */
class TraceMiddlewareTest extends \PHPUnit_Framework_TestCase
{
    public function testEmitsDebugInfo()
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function ($cmd, $req) {
            return \GuzzleHttp\Promise\promise_for(new Result([
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
        Promise\queue()->run();
        $this->assertContains("-> Entering step init, name ''", $str);
        $this->assertContains('command was set to array', $str);
        $this->assertContains('request was set to array', $str);
        $this->assertContains("<- Leaving step init, name ''", $str);
        $this->assertContains('result was set to array', $str);
        $this->assertContains('Inclusive step time: ', $str);
        $this->assertContains('command.params.b was unset', $str);
        $this->assertContains('no changes', $str);
        $this->assertContains("<- Leaving step validate, name ''", $str);
    }

    public function testTracksExceptions()
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function ($cmd, $req) {
            return \GuzzleHttp\Promise\promise_for(new Result());
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
        Promise\queue()->run();
        $this->assertContains('error was set to array', $str);
        $this->assertContains('trace', $str);
        $this->assertContains('class', $str);
        $this->assertContains('message', $str);
        $this->assertContains('string(6) "Oh no!"', $str);
    }

    public function testTracksAwsSpecificExceptions()
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();
        $list->setHandler(function ($cmd, $req) {
            return \GuzzleHttp\Promise\promise_for(new Result());
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
        Promise\queue()->run();
        $this->assertContains('error was set to array', $str);
        $this->assertContains('trace', $str);
        $this->assertContains('class', $str);
        $this->assertContains('message', $str);
        $this->assertContains('string(5) "error"', $str);
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
            return \GuzzleHttp\Promise\promise_for(new Result());
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

        $this->assertNotContains($key, $str);
        $this->assertNotContains($signature, $str);
        foreach ($headers as $header) {
            $this->assertNotContains($header['raw'], $str);
            $this->assertContains($header['scrubbed'], $str);
        }
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
            return \GuzzleHttp\Promise\promise_for(new Result());
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

        $this->assertNotContains($toScrub, $str);
        foreach (array_values($scrubPatterns) as $scrubbed) {
            $this->assertContains($scrubbed, $str);
        }
    }
}
