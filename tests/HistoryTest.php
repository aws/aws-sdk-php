<?php
namespace Aws\Test;

use Aws;
use Aws\Command;
use Aws\History;
use Aws\Exception\AwsException;
use GuzzleHttp\Psr7\Request;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\History
 */
class HistoryTest extends TestCase
{
    public function testIsCountable()
    {
        $h = new History();
        $this->assertCount(0, $h);
        $h->start(new Command('foo'), new Request('GET', 'http://foo.com'));
        $this->assertCount(1, $h);
        $h->clear();
        $this->assertCount(0, $h);
    }

    public function testIsIterable()
    {
        $h = new History();
        $h->start(new Command('foo'), new Request('GET', 'http://foo.com'));
        $h->start(new Command('foo'), new Request('GET', 'http://foo.com'));
        $results = iterator_to_array($h);
        $this->assertCount(2, $results);
    }

    public function testIsArrayable()
    {
        $h = new History();
        $h->start(new Command('foo'), new Request('GET', 'http://foo.com'));
        $h->start(new Command('foo'), new Request('GET', 'http://foo.com'));
        $results = $h->toArray();
        $this->assertCount(2, $results);
    }

    public function testCanAddResult()
    {
        $h = new History();
        $ticket = $h->start(new Command('foo'), new Request('GET', 'http://foo.com'));
        $this->assertNotNull($ticket);
        $res = new Aws\Result();
        $h->finish($ticket, $res);
        $this->assertCount(1, $h);
        $this->assertSame($res, $h->getLastReturn());
    }

    public function testCanAddException()
    {
        $h = new History();
        $cmd = new Command('foo');
        $ticket = $h->start($cmd, new Request('GET', 'http://foo.com'));
        $this->assertNotNull($ticket);
        $e = new AwsException('foo', $cmd);
        $h->finish($ticket, $e);
        $this->assertCount(1, $h);
        $this->assertSame($e, $h->getLastReturn());
    }

    public function testThrowsWhenNoEntriesForLastResult()
    {
        $this->expectException(\LogicException::class);
        $h = new History();
        $h->getLastReturn();
    }

    public function testThrowsWhenNoReturnForLastReturn()
    {
        $this->expectException(\LogicException::class);
        $h = new History();
        $h->start(new Command('foo'), new Request('GET', 'http://foo.com'));
        $h->getLastReturn();
    }

    public function testThrowsWhenTicketAlreadyComplete()
    {
        $this->expectException(\LogicException::class);
        $h = new History();
        $t = $h->start(new Command('foo'), new Request('GET', 'http://foo.com'));
        $h->finish($t, new Aws\Result());
        $h->finish($t, new Aws\Result());
    }

    public function testThrowsWhenTicketIsNotFound()
    {
        $this->expectException(\InvalidArgumentException::class);
        $h = new History();
        $h->finish('foo', new Aws\Result());
    }

    public function testPrunesUnderLimit()
    {
        $h = new History(5);
        $c = new Command('foo');
        $r = new Request('GET', 'http://foo.com');
        $res = new Aws\Result();
        for ($i = 0; $i < 50; $i++) {
            $t = $h->start($c, $r);
            $h->finish($t, $res);
            $this->assertLessThanOrEqual(5, count($h));
        }
        $this->assertLessThanOrEqual(5, count($h));
    }

    public function testReturnsLastCommand()
    {
        $h = new History();
        $c = new Command('foo');
        $r = new Request('GET', 'http://foo.com');
        $h->start($c, $r);
        $this->assertSame($c, $h->getLastCommand());
    }

    public function testReturnsLastRequest()
    {
        $h = new History();
        $c = new Command('foo');
        $r = new Request('GET', 'http://foo.com');
        $h->start($c, $r);
        $this->assertSame($r, $h->getLastRequest());
    }

    public function testThrowsWhenNoCommands()
    {
        $this->expectException(\LogicException::class);
        $h = new History();
        $h->getLastCommand();
    }

    public function testThrowsWhenNoRequests()
    {
        $this->expectException(\LogicException::class);
        $h = new History();
        $h->getLastRequest();
    }
}
