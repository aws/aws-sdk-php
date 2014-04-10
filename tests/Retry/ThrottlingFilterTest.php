<?php
namespace Aws\Test\Retry;

use Aws\Api\ErrorParser\JsonRpcErrorParser;
use Aws\Retry\ThrottlingFilter;
use GuzzleHttp\Adapter\Transaction;
use GuzzleHttp\Client;
use GuzzleHttp\Event\CompleteEvent;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;
use GuzzleHttp\Stream;

/**
 * @covers \Aws\Retry\ThrottlingFilter
 */
class ThrottlingFilterTest extends \PHPUnit_Framework_TestCase
{
    public function testIngoresWhenNoResponseIsPresent()
    {
        $ate = $this->getTrans();
        $f = new ThrottlingFilter(new JsonRpcErrorParser());
        $this->assertEquals(RetrySubscriber::DEFER, $f(2, $ate));
    }

    public function testIgnoresWhenNot400()
    {
        $ate = $this->getTrans();
        $ate->intercept(new Response(303));
        $f = new ThrottlingFilter(new JsonRpcErrorParser());
        $this->assertEquals(RetrySubscriber::DEFER, $f(2, $ate));
    }

    public function testRetriesWhenThrottled()
    {
        $ate = $this->getTrans();
        $ate->intercept(new Response(401, [], Stream\create('{"__type":"RequestLimitExceeded"}')));
        $f = new ThrottlingFilter(new JsonRpcErrorParser());
        $this->assertEquals(RetrySubscriber::RETRY, $f(2, $ate));
    }

    public function testDefersWhenNotThrottled()
    {
        $ate = $this->getTrans();
        $ate->intercept(new Response(401, [], Stream\create('{}')));
        $f = new ThrottlingFilter(new JsonRpcErrorParser());
        $this->assertEquals(RetrySubscriber::DEFER, $f(2, $ate));
    }

    private function getTrans()
    {
        return new CompleteEvent(new Transaction(
            new Client(),
            new Request('GET', 'http://foo.com')
        ));
    }
}
