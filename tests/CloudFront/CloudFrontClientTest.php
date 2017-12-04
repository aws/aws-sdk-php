<?php
namespace Aws\Test\CloudFront;

use Aws\CloudFront\CloudFrontClient;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\CloudFront\CloudFrontClient
 */
class CloudFrontClientTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresKeysArePassed()
    {
        $c = new CloudFrontClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $c->getSignedUrl([]);
    }

    public function testCreatesSignedUrl()
    {
        foreach (['CF_PRIVATE_KEY', 'CF_KEY_PAIR_ID'] as $k) {
            if (!isset($_SERVER[$k]) || $_SERVER[$k] == 'change_me') {
                $this->markTestSkipped('$_SERVER[\'' . $k . '\'] not set in '
                    . 'phpunit.xml');
            }
        }

        $c = new CloudFrontClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $c->getSignedUrl([
            'private_key' => $_SERVER['CF_PRIVATE_KEY'],
            'key_pair_id' => $_SERVER['CF_KEY_PAIR_ID'],
            'url'         => 'https://foo.bar.com',
            'expires'     => strtotime('+10 minutes'),
        ]);
    }

    public function testCreatesSignedCookie()
    {
        foreach (['CF_PRIVATE_KEY', 'CF_KEY_PAIR_ID'] as $k) {
            if (!isset($_SERVER[$k]) || $_SERVER[$k] == 'change_me') {
                $this->markTestSkipped('$_SERVER[\'' . $k . '\'] not set in '
                    . 'phpunit.xml');
            }
        }

        $c = new CloudFrontClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $c->getSignedCookie([
            'private_key' => $_SERVER['CF_PRIVATE_KEY'],
            'key_pair_id' => $_SERVER['CF_KEY_PAIR_ID'],
            'url'         => 'https://foo.bar.com',
            'expires'     => strtotime('+10 minutes'),
        ]);
    }
}
