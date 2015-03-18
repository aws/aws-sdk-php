<?php
namespace Aws\Test;

use Aws\Command;
use Aws\HandlerList;
use Aws\Middleware;
use Aws\MockHandler;
use Aws\Result;
use GuzzleHttp\Psr7\Request;

/**
 * @covers Aws\Middleware
 */
class MiddlewareTest extends \PHPUnit_Framework_TestCase
{
    public function testWrapsWithRetryMiddleware()
    {
        $list = new HandlerList();
        $list->setHandler(new MockHandler([new Result()]));
        $list->append(Middleware::retry(function () use (&$called) {
            $called = true;
        }));
        $handler = $list->resolve();
        $handler(new Command('foo'), new Request('GET', 'http://exmaple.com'));
        $this->assertTrue($called);
    }
}
