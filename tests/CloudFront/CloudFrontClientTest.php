<?php

namespace Aws\Test\CloudFront;

use Aws\CloudFront\CloudFrontClient;
use Aws\Test\Polyfill\PHPUnit\PHPUnitCompatTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\CloudFront\CloudFrontClient
 */
class CloudFrontClientTest extends TestCase
{
    use PHPUnitCompatTrait;

    protected $key;
    protected $kp;

    public function _setUp()
    {
        $this->key = realpath(__DIR__.'/fixtures/test2.pem');
        $this->kp  = 'test';
    }

    public function testEnsuresKeysArePassed()
    {
        $this->expectException(\InvalidArgumentException::class);
        $c = new CloudFrontClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);
        $c->getSignedUrl([]);
    }

    /** @doesNotPerformAssertions */
    public function testCreatesSignedUrl()
    {
        $c = new CloudFrontClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $c->getSignedUrl([
            'private_key' => $this->key,
            'key_pair_id' => $this->kp,
            'url'         => 'https://foo.bar.com',
            'expires'     => strtotime('+10 minutes'),
        ]);
    }

    /** @doesNotPerformAssertions */
    public function testCreatesSignedCookie()
    {
        $c = new CloudFrontClient([
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $c->getSignedCookie([
            'private_key' => $this->key,
            'key_pair_id' => $this->kp,
            'url'         => 'https://foo.bar.com',
            'expires'     => strtotime('+10 minutes'),
        ]);
    }
}
