<?php
namespace Aws\Test;

use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\MockHandler;
use Aws\Result;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\MockHandler
 */
class MockHandlerTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Expected an Aws\ResultInterface or Aws\Exception\AwsException
     */
    public function testValidatesEachResult()
    {
        new MockHandler(['foo']);
    }

    public function testCanCount()
    {
        $h = new Mockhandler([new Result([]), new Result([])]);
        $h->append(new Result([]));
        $this->assertCount(3, $h);
    }

    public function testReturnsMockResultsFromQueue()
    {
        $h = new MockHandler();
        $r1 = new Result([]);
        $r2 = new Result([]);
        $h->append($r1, $r2);
        $cmd = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $this->assertSame($r1, $h($cmd, $request)->wait());
        $this->assertSame($r2, $h($cmd, $request)->wait());
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Mock queue is empty
     */
    public function testThrowsWhenNoResultsInQueue()
    {
        $h = new MockHandler();
        $cmd = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $h($cmd, $request);
    }

    /**
     * @expectedException \Aws\Exception\AwsException
     * @expectedExceptionMessage Error
     */
    public function testThrowsExceptionsFromQueue()
    {
        $cmd = new Command('foo');
        $e = new AwsException('Error', $cmd);
        $request = new Request('GET', 'http://www.example.com');
        $h = new MockHandler();
        $h->append($e);
        $result = $h($cmd, $request);
        $this->assertInstanceOf('GuzzleHttp\Promise\RejectedPromise', $result);
        $result->wait();
    }

    public function testCanThenOffOfEachResult()
    {
        $thens = [];
        $h = new MockHandler(
            [],
            function ($value) use (&$thens) {
                $thens[] = $value;
            },
            function ($reason) use (&$thens) {
                $thens[] = $reason;
            });
        $r1 = new Result([]);
        $cmd = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $e = new AwsException('Error', $cmd);
        $h->append($r1, $e);
        $cmd = new Command('foo');
        $h($cmd, $request);
        $h($cmd, $request);
        Promise\queue()->run();
        $this->assertEquals([$r1, $e], $thens);
    }

    public function testCanGetLastRequestAndCommand()
    {
        $h = new MockHandler([new Result([])]);
        $cmd = new Command('foo');
        $request = new Request('GET', 'http://www.example.com');
        $h($cmd, $request);
        $this->assertSame($request, $h->getLastRequest());
        $this->assertSame($cmd, $h->getLastCommand());
    }

    public function testCanEnqueueCallables()
    {
        $h = new MockHandler();
        $r1 = new Result([]);
        $cmd = new Command('foo');
        $req = new Request('GET', 'http://www.example.com');
        $h->append(function (CommandInterface $command, RequestInterface $request) use ($cmd, $req, $r1) {
            $this->assertSame($cmd, $command);
            $this->assertSame($req, $request);
            return $r1;
        });
        $this->assertSame($r1, $h($cmd, $req)->wait());
    }
}
