<?php
namespace Aws\Test\Common\Retry;

use Aws\Common\Retry\Crc32Filter;
use GuzzleHttp\Transaction;
use GuzzleHttp\Client;
use GuzzleHttp\Event\CompleteEvent;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;
use GuzzleHttp\Stream\Stream;

/**
 * @covers \Aws\Common\Retry\Crc32Filter
 */
class Crc32FilterTest extends \PHPUnit_Framework_TestCase
{
    public function testIngoresWhenNoResponseIsPresent()
    {
        $ate = $this->getTrans();
        $c = new Crc32Filter();
        $this->assertEquals(RetrySubscriber::DEFER, $c(2, $ate));
    }

    public function testIgnoresWhenNoHeaderIsPresent()
    {
        $ate = $this->getTrans();
        $ate->intercept(new Response(200));
        $c = new Crc32Filter();
        $this->assertEquals(RetrySubscriber::DEFER, $c(2, $ate));
    }

    public function testRetriesWhenCrc32Fails()
    {
        $ate = $this->getTrans();
        $ate->intercept(new Response(200, [
            'x-amz-crc32' => '123'
        ], Stream::factory('foo')));

        $c = new Crc32Filter();
        $this->assertEquals(RetrySubscriber::RETRY, $c(2, $ate));
    }

    public function testDefersWhenCrc32Matches()
    {
        $ate = $this->getTrans();
        $ate->intercept(new Response(200, [
            'x-amz-crc32' => crc32('foo')
        ], Stream::factory('foo')));

        $c = new Crc32Filter();
        $this->assertEquals(RetrySubscriber::DEFER, $c(2, $ate));
    }

    private function getTrans()
    {
        return new CompleteEvent(new Transaction(
            new Client(),
            new Request('GET', 'http://foo.com')
        ));
    }
}
