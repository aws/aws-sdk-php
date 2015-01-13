<?php
namespace Aws\Test\S3\Subscriber;

use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Message\Response;

/**
 * @covers Aws\S3\Subscriber\PermanentRedirect
 */
class PermanentRedirectTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \Aws\S3\Exception\PermanentRedirectException
     * @expectedExceptionMessage Encountered a permanent redirect while requesting https://test.s3.amazonaws.com/key
     */
    public function testThrowsSpecificException()
    {
        $http = new Client();
        $http->getEmitter()->on('before', function (BeforeEvent $e) {
            $e->intercept(new Response(301));
        });

        $client = $this->getTestClient('s3', ['client' => $http]);
        $client->getObject(['Bucket' => 'test', 'Key' => 'key']);
    }

    public function testPassesThroughUntouched()
    {
        $http = new Client();
        $http->getEmitter()->on('before', function (BeforeEvent $e) {
            $e->intercept(new Response(200));
        });
        $client = $this->getTestClient('s3', ['client' => $http]);
        $client->getObject(['Bucket' => 'test', 'Key' => 'key']);
    }
}
