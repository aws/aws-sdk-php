<?php
namespace Aws\Test\Common\Retry;

use Aws\Common\Retry\S3TimeoutFilter;
use GuzzleHttp\Transaction;
use GuzzleHttp\Client;
use GuzzleHttp\Event\CompleteEvent;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * @covers \Aws\Common\Retry\S3TimeoutFilter
 */
class S3TimeoutFilterTest extends \PHPUnit_Framework_TestCase
{
    public function testIngoresWhenNoResponseIsPresent()
    {
        $ate = $this->getTrans();
        $f = new S3TimeoutFilter();
        $this->assertEquals(RetrySubscriber::DEFER, $f(2, $ate));
    }

    public function testIgnoresWhenNot400()
    {
        $ate = $this->getTrans();
        $ate->intercept(new Response(302));
        $f = new S3TimeoutFilter();
        $this->assertEquals(RetrySubscriber::DEFER, $f(2, $ate));
    }

    public function testRetriesWhenTimeoutIsDetected()
    {
        $ate = $this->getTrans();
        $ate->intercept(
            new Response(400, [], Stream::factory(S3TimeoutFilter::ERR))
        );
        $f = new S3TimeoutFilter();
        $this->assertEquals(RetrySubscriber::RETRY, $f(2, $ate));
    }

    public function testDefersWhenNotTimedOut()
    {
        $ate = $this->getTrans();
        $ate->intercept(new Response(400, [], Stream::factory('foo :(')));
        $f = new S3TimeoutFilter();
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
