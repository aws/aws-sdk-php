<?php
namespace Aws\Tests;

use Aws\Command;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\Result;
use Aws\TraceMiddleware;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

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
        $list->append('init', function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                $req = $req->withHeader('foo', 'bar');
                return $handler($cmd, $req);
            };
        });
        $list->append('validate', function ($handler) {
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
        $list->append('init', function ($handler) {
            return function ($cmd, $req = null) use ($handler) {
                $req = $req->withHeader('foo', 'bar');
                return $handler($cmd, $req);
            };
        });
        $list->append('validate', function ($handler) {
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
        $this->assertContains('error was set to array', $str);
    }

    public function testScrubsAuthStrings()
    {
        $str = '';
        $logfn = function ($value) use (&$str) { $str .= $value; };
        $list = new HandlerList();

        $list->setHandler(function ($cmd, $req) {
            // ensure that http level debug information is filtered as well.
            fwrite($cmd['@http']['debug'], "Credential=AKI123/...\n");
            return \GuzzleHttp\Promise\promise_for(new Result());
        });

        $list->append('init', function ($handler) {
            return function ($cmd, $req) use ($handler) {
                return $handler($cmd, $req);
            };
        });
        $list->interpose(new TraceMiddleware(['logfn' => $logfn]));
        $handler = $list->resolve();
        $command = new Command('foo');
        $request = new Request('GET', 'http://foo.com?Signature=abc&AWSAccessKeyId=AKI123', [
            'Authorization' => 'Credential=AKI123/..., Signature=abcdef'
        ]);
        $handler($command, $request);
        $this->assertContains("'Credential=AKI[KEY]/..., Signature=[SIGNATURE]", $str);
        $this->assertNotContains('AKI123', $str);
        $this->assertNotContains('abcdef', $str);
    }
}
