<?php
namespace Aws\Test\S3\Subscriber;

use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Message\Response;

/**
 * @covers Aws\S3\PutObjectUrlSubscriber
 */
class PutObjectUrlTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testAddsObjectUrl()
    {
        $http = new Client();
        $http->getEmitter()->on('before', function (BeforeEvent $e) {
            $e->intercept(new Response(200));
        });

        $client = $this->getTestClient('s3', ['client' => $http]);
        $result = $client->putObject([
            'Bucket' => 'test',
            'Key'    => 'key',
            'Body'   => 'hi'
        ]);

        $this->assertEquals(
            'https://test.s3.amazonaws.com/key',
            $result['ObjectURL']
        );
    }

    public function testAddsObjectUrlToCompleteMultipart()
    {
        $http = new Client();
        $http->getEmitter()->on('before', function (BeforeEvent $e) {
            $e->intercept(new Response(200, [
                'Location' => 'https://test.s3.amazonaws.com/key'
            ]));
        });

        $client = $this->getTestClient('s3', ['client' => $http]);
        $result = $client->completeMultipartUpload([
            'Bucket'   => 'test',
            'Key'      => 'key',
            'UploadId' => '123'
        ]);

        $this->assertTrue(array_key_exists('ObjectURL', $result->toArray()));
    }
}
