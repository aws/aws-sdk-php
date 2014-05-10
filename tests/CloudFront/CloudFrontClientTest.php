<?php
namespace Aws\Test\CloudFront;
use Aws\CloudFront\CloudFrontClient;

/**
 * @covers Aws\CloudFront\CloudFrontClient
 */
class CloudFrontClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresKeysArePassed()
    {
        $c = CloudFrontClient::factory(['region' => 'us-west-2']);
        $c->getSignedUrl([]);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage PK file not found: /path/to/missing/file_missing.pem
     */
    public function testCreatesSignedUrl()
    {
        $c = CloudFrontClient::factory(['region' => 'us-west-2']);

        $c->getSignedUrl([
            'private_key' => '/path/to/missing/file_missing.pem',
            'key_pair_id' => '10',
            'url'         => 'https://foo.bar.com',
            'expires'     => '+10 minutes'
        ]);
    }
}
