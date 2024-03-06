<?php
namespace Aws\Test\Identity\S3Express;

use Aws\Api\DateTimeResult;
use Aws\Identity\S3\S3ExpressIdentityProvider;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Identity\S3\S3ExpressIdentityProvider
 */
class S3ExpressIdentityProviderTest extends TestCase
{
    use UsesServiceTrait;

    const S3_TIMESTAMP_FORMAT = 'Y-m-d\TG:i:s\Z';

    private function getCredentialResultFromTimestamp($timestamp)
    {
        $expiration = date(self::S3_TIMESTAMP_FORMAT, $timestamp);
        return new Result([
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken' => 'baz',
                'Expiration' => new DateTimeResult($expiration),
            ]
        ]);
    }
    
    public function testProvidesIdentity()
    {
        $expiration = time() + 5000;
        $client = $this->getTestClient('S3', []);
        $this->addMockResults($client, [
        $this->getCredentialResultFromTimestamp($expiration)
        ]);
        $cmd = $client->getCommand('getObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $provider = new S3ExpressIdentityProvider(
            'region',
            ['client' => $client]
        );
        $identity = $provider($cmd)->wait();
        self::assertSame('foo', $identity->getAccessKeyId());
        self::assertSame('bar', $identity->getSecretKey());
        self::assertSame('baz', $identity->getSecurityToken());
        self::assertSame($expiration, $identity->getExpiration());
    }

    public function testCachesIdentity()
    {
        $expiration = time() + 5000;
        $client = $this->getTestClient('S3', []);
        $this->addMockResults($client, [
            $this->getCredentialResultFromTimestamp($expiration),
            new \Exception("should only call createSession once")
        ]);
        $cmd = $client->getCommand('getObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $provider = new S3ExpressIdentityProvider(
            'region',
            ['client' => $client]
        );
        $provider($cmd)->wait();
        $identity = $provider($cmd)->wait();
        self::assertSame('foo', $identity->getAccessKeyId());
        self::assertSame('bar', $identity->getSecretKey());
        self::assertSame('baz', $identity->getSecurityToken());
        self::assertSame($expiration, $identity->getExpiration());
    }

    public function testRefreshesCache()
    {
        $before = time() - 5000;
        $after = time() + 5000;
        $client = $this->getTestClient('S3', []);
        $this->addMockResults($client, [
            $this->getCredentialResultFromTimestamp($before),
            $this->getCredentialResultFromTimestamp($after),

        ]);
        $cmd = $client->getCommand('getObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $provider = new S3ExpressIdentityProvider(
            'region',
            ['client' => $client]
        );
        $provider($cmd)->wait();
        $identity = $provider($cmd)->wait();
        self::assertSame($after, $identity->getExpiration());
    }
}
