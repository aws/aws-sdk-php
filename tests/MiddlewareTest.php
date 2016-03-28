<?php
namespace Aws\Test;

use Aws;
use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\Command;
use Aws\CommandInterface;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialProvider;
use Aws\Exception\AwsException;
use Aws\HandlerList;
use Aws\Middleware;
use Aws\MockHandler;
use Aws\Result;
use Aws\ResultInterface;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise;
use Psr\Http\Message\RequestInterface;

/**
 * @covers Aws\Middleware
 */
class MiddlewareTest extends \PHPUnit_Framework_TestCase
{
    public function setup()
    {
        \GuzzleHttp\Promise\queue()->run();
    }

    public function testCanTapIntoHandlerList()
    {
        $list = new HandlerList();
        $list->setHandler(new MockHandler([new Result()]));
        $list->appendSign(Middleware::tap(function () use (&$called) {
            $called = func_get_args();
        }));
        $handler = $list->resolve();
        $handler(new Command('foo'), new Request('GET', 'http://exmaple.com'));
        Promise\queue()->run();
        $this->assertCount(2, $called);
        $this->assertInstanceOf('Aws\CommandInterface', $called[0]);
        $this->assertInstanceOf('Psr\Http\Message\RequestInterface', $called[1]);
    }

    public function testWrapsWithRetryMiddleware()
    {
        $list = new HandlerList();
        $list->setHandler(new MockHandler([new Result()]));
        $list->appendSign(Middleware::retry(function () use (&$called) {
            $called = true;
        }));
        $handler = $list->resolve();
        $handler(new Command('foo'), new Request('GET', 'http://exmaple.com'));
        Promise\queue()->run();
        $this->assertTrue($called);
    }

    public function testAddsRetrySubscriber()
    {
        $list = new HandlerList();
        $mock = new MockHandler([
            new Result(['@metadata' => ['statusCode' => 500]]),
            new Result(['@metadata' => ['statusCode' => 200]]),
        ]);
        $this->assertCount(2, $mock);
        $list->setHandler($mock);
        $list->appendSign(Middleware::retry());
        $handler = $list->resolve();
        $handler(new Command('foo'), new Request('GET', 'http://127.0.0.1'))->wait();
        $this->assertCount(0, $mock);
    }

    public function testAddInvocationId()
    {
        $list = new HandlerList();
        $mock = function ($command, $request) {
            $this->assertTrue($request->hasHeader('aws-sdk-invocation-id'));
            return \GuzzleHttp\Promise\promise_for(
                new Result(['@metadata' => ['statusCode' => 200]])
            );
        };
        $list->setHandler($mock);
        $list->prependSign(Middleware::invocationId());
        $handler = $list->resolve();
        $handler(new Command('foo'), new Request('GET', 'http://exmaple.com'));
    }

    public function testAddsSigner()
    {
        $list = new HandlerList();
        $mock = function ($command, $request) use (&$req) {
            $req = $request;
            return \GuzzleHttp\Promise\promise_for(
                new Result(['@metadata' => ['statusCode' => 200]])
            );
        };
        $list->setHandler($mock);
        $creds = CredentialProvider::fromCredentials(new Credentials('foo', 'bar'));
        $signature = new SignatureV4('a', 'b');
        $list->appendSign(Middleware::signer($creds, Aws\constantly($signature)));
        $handler = $list->resolve();
        $handler(new Command('foo'), new Request('GET', 'http://exmaple.com'));
        Promise\queue()->run();
        $this->assertTrue($req->hasHeader('Authorization'));
    }

    public function testBuildsRequests()
    {
        $r = new Request('GET', 'http://www.foo.com');
        $serializer = function (CommandInterface $command) use ($r, &$called) {
            $called = true;
            return $r;
        };
        $list = new HandlerList();
        $list->setHandler(new MockHandler([new Result()]));
        $list->appendSign(Middleware::requestBuilder($serializer));
        $handler = $list->resolve();
        $handler(new Command('foo'));
        $this->assertTrue($called);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage [a] is missing and is a required parameter
     */
    public function testValidatesCommands()
    {
        $list = new HandlerList();
        $list->setHandler(new MockHandler([new Result()]));
        $api = new Service(
            [
                'metadata' => [
                    'endpointPrefix' => 'a',
                    'apiVersion'     => 'b'
                ],
                'operations' => [
                    'foo' => [
                        'input' => ['shape'=> 'foo']
                    ]
                ],
                'shapes' => [
                    'foo' => [
                        'type' => 'structure',
                        'required' => ['a'],
                        'members' => [
                            'a' => ['shape' => 'a']
                        ]
                    ],
                    'a' => ['type' => 'string']
                ]
            ],
            function () { return []; }
        );
        $list->appendValidate(Middleware::validation($api));
        $handler = $list->resolve();

        try {
            $handler(new Command('foo', ['a' => 'b']), new Request('GET', 'http://foo.com'));
        } catch (\InvalidArgumentException $e) {
            $this->fail();
        }

        $handler(new Command('foo'));
    }

    public function testExtractsSourceFileIntoBody()
    {
        $list = new HandlerList();
        $list->setHandler(function ($command, $request) use (&$called) {
            $called = true;
            $this->assertNotNull($command['Body']);
            $this->assertNull($command['SourceFile']);
        });
        $provider = ApiProvider::defaultProvider();
        $data = $provider('api', 's3', 'latest');
        $service = new Service($data, $provider);
        $list->appendInit(Middleware::sourceFile($service));
        $handler = $list->resolve();
        $handler(new Command('PutObject', [
            'Bucket'     => 'test',
            'Key'        => 'key',
            'SourceFile' => __FILE__
        ]), new Request('PUT', 'http://foo.com'));
        Promise\queue()->run();
        $this->assertTrue($called);
    }

    public function testAppliesHistory()
    {
        $h = new Aws\History();
        $mock = new MockHandler([new Result()]);
        $list = new HandlerList($mock);
        $list->appendSign(Middleware::history($h));
        $handler = $list->resolve();
        $req = new Request('GET', 'http://www.foo.com');
        $cmd = new Command('foo');
        $handler($cmd, $req);
        Promise\queue()->run();
        $this->assertCount(1, $h);
    }

    public function testCanSetContentTypeOfCommandsWithPayloads()
    {
        $h = new Aws\History();
        $list = new HandlerList();
        $list->setHandler(new MockHandler([new Result()]));
        $list->appendBuild(Middleware::contentType(['Foo']));
        $list->appendSign(Middleware::history($h));
        $handler = $list->resolve();
        $payload = Psr7\stream_for(fopen(__DIR__ . '/../docs/_static/logo.png', 'r'));
        $request = new Request('PUT', 'http://exmaple.com', [], $payload);
        $handler(new Command('Foo'), $request);

        $this->assertEquals(
            'image/png',
            $h->getLastRequest()->getHeaderLine('Content-Type')
        );
    }

    public function testCanMapCommands()
    {
        $list = new HandlerList();
        $mock = new MockHandler([new Result()]);
        $list->setHandler($mock);
        $list->appendInit(Middleware::mapCommand(function (CommandInterface $c) {
            $c['Hi'] = 'test';
            return $c;
        }));
        $handler = $list->resolve();
        $request = new Request('GET', 'http://exmaple.com');
        $handler(new Command('Foo'), $request);
        $this->assertEquals('test', $mock->getLastCommand()->offsetGet('Hi'));
    }

    public function testCanMapRequests()
    {
        $list = new HandlerList();
        $mock = new MockHandler([new Result()]);
        $list->setHandler($mock);
        $list->appendInit(Middleware::mapRequest(function (RequestInterface $r) {
            return $r->withHeader('X-Foo', 'Bar');
        }));
        $handler = $list->resolve();
        $request = new Request('GET', 'http://exmaple.com');
        $handler(new Command('Foo'), $request);
        $this->assertEquals(['Bar'], $mock->getLastRequest()->getHeader('X-Foo'));
    }

    public function testCanMapResults()
    {
        $list = new HandlerList();
        $mock = new MockHandler([new Result()]);
        $list->setHandler($mock);
        $list->appendSign(Middleware::mapResult(function (ResultInterface $r) {
            $r['Test'] = 'hi';
            return $r;
        }));
        $handler = $list->resolve();
        $request = new Request('GET', 'http://exmaple.com');
        $result = $handler(new Command('Foo'), $request)->wait();
        $this->assertEquals('hi', $result['Test']);
    }

    public function testCanTimeSuccessfulHandlers()
    {
        $list = new HandlerList();
        $list->setHandler(function () {
            usleep(1000); // wait for a millisecond
            return Promise\promise_for(new Result);
        });
        $list->prependInit(Middleware::timer());
        $handler = $list->resolve();
        $request = new Request('GET', 'http://exmaple.com');
        $result = $handler(new Command('Foo'), $request)->wait();
        $this->assertTrue(isset($result['@metadata']['transferStats']['total_time']));
        $this->assertGreaterThanOrEqual(
            0.001,
            $result['@metadata']['transferStats']['total_time']
        );
    }

    public function testCanTimeUnsuccessfulHandlers()
    {
        $command = new Command('Foo');
        $list = new HandlerList();
        $list->setHandler(function () use ($command) {
            usleep(1000); // wait for a millisecond
            return Promise\rejection_for(new AwsException('foo', $command));
        });
        $list->prependInit(Middleware::timer());
        $handler = $list->resolve();
        $request = new Request('GET', 'http://exmaple.com');
        $promise = $handler($command, $request)->then(
            function () {
                $this->fail('Success handler should not have been invoked');
            },
            function (AwsException $e) {
                $this->assertNotNull($e->getTransferInfo('total_time'));
                $this->assertGreaterThanOrEqual(0.001, $e->getTransferInfo('total_time'));

                return true;
            }
        );

        $promise->wait();
    }
}
