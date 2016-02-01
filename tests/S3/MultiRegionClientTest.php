<?php
namespace Aws\Test\S3;

use Aws\S3\MultiRegionClient;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

class MultiRegionClientTest extends \PHPUnit_Framework_TestCase
{
    public function testWillRecoverFromPermanentRedirect()
    {
        $triedDefaultRegion = false;
        $instance = new MultiRegionClient([
            'version' => 'latest',
            'region' => 'eu-east-1',
            'http_handler' => function (RequestInterface $request) use (&$triedDefaultRegion) {
                if (strpos($request->getUri()->getHost(), 'eu-east-1')) {
                    $triedDefaultRegion = true;
                    return new Response(301, ['X-Amz-Bucket-Region' => 'us-west-2']);
                } elseif (strpos($request->getUri()->getHost(), 'us-west-2')) {
                    return new Response(200, [], 'Success!');
                }

                $this->fail('Failed to determine the correct region.');
            },
        ]);

        $object = $instance->getObject(['Bucket' => 'bucket', 'Key' => 'key']);
        $this->assertSame('Success!', (string) $object['Body']);
        $this->assertTrue($triedDefaultRegion);
    }
}
