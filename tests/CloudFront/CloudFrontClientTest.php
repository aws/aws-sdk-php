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

    public function testCreatesSignedUrl()
    {
        foreach (['cf_private_key', 'cf_key_pair_id'] as $k) {
            if (!isset($_SERVER[$k]) || $_SERVER[$k] == 'change_me') {
                $this->markTestSkipped('$_SERVER[\'' . $k . '\'] not set in '
                    . 'phpunit.xml');
            }
        }

        $c = CloudFrontClient::factory(['region' => 'us-west-2']);

        $c->getSignedUrl([
            'private_key' => $_SERVER['cf_private_key'],
            'key_pair_id' => $_SERVER['cf_key_pair_id'],
            'url'         => 'https://foo.bar.com',
            'expires'     => '+10 minutes'
        ]);
    }
}
