<?php

namespace Aws\Test\CloudFront;

use Aws\CloudFront\CloudFrontClient;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CloudFrontClient::class)]
class CloudFrontClientTest extends TestCase
{
    protected $key;
    protected $kp;

    public function set_up()
    {
        openssl_pkey_export(openssl_pkey_new(),$this->key);
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

    #[DoesNotPerformAssertions]
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

    #[DoesNotPerformAssertions]
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
