<?php
namespace Aws\Test\Identity\S3Express;

use Aws\Api\DateTimeResult;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\Identity\S3\S3ExpressIdentityProvider;
use Aws\MockHandler;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(S3ExpressIdentityProvider::class)]
class S3ExpressIdentityProviderTest extends TestCase
{
    use UsesServiceTrait;

    const S3_TIMESTAMP_FORMAT = 'Y-m-d\TG:i:s\Z';

    private function getCredentialResultFromTimestamp($timestamp): Result
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

    public function testProvidesIdentity(): void
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

    public function testCachesIdentity(): void
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

    public function testRefreshesCache(): void
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

    private function getSessionResult($sessionToken): Result
    {
        return new Result([
            'Credentials' => [
                'AccessKeyId' => 'session-key',
                'SecretAccessKey' => 'session-secret',
                'SessionToken' => $sessionToken,
                'Expiration' => new DateTimeResult(
                    date(self::S3_TIMESTAMP_FORMAT, time() + 5000)
                ),
            ]
        ]);
    }

    public function testCachesIdentityPerCredentials(): void
    {
        $client = $this->getTestClient('S3', []);
        $this->addMockResults($client, [
            $this->getSessionResult('alice-session'),
            $this->getSessionResult('bob-session'),
            new \Exception("should only call createSession once per identity")
        ]);
        $cmd = $client->getCommand('getObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $provider = new S3ExpressIdentityProvider(
            'region',
            ['client' => $client]
        );
        $alice = new Credentials('ALICE', 'alice-secret');
        $bob = new Credentials('BOB', 'bob-secret');

        self::assertSame(
            'alice-session',
            $provider($cmd, $alice)->wait()->getSecurityToken()
        );
        self::assertSame(
            'bob-session',
            $provider($cmd, $bob)->wait()->getSecurityToken()
        );
        self::assertSame(
            'alice-session',
            $provider($cmd, new Credentials('ALICE', 'alice-secret'))
                ->wait()->getSecurityToken()
        );
        self::assertSame(
            'bob-session',
            $provider($cmd, $bob)->wait()->getSecurityToken()
        );
    }

    public function testDifferentSessionTokenMissesCache(): void
    {
        $client = $this->getTestClient('S3', []);
        $this->addMockResults($client, [
            $this->getSessionResult('first'),
            $this->getSessionResult('second'),
        ]);
        $cmd = $client->getCommand('getObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $provider = new S3ExpressIdentityProvider(
            'region',
            ['client' => $client]
        );

        $first = $provider($cmd, new Credentials('KEY', 'secret', 'token-1'))
            ->wait();
        $second = $provider($cmd, new Credentials('KEY', 'secret', 'token-2'))
            ->wait();
        self::assertSame('first', $first->getSecurityToken());
        self::assertSame('second', $second->getSecurityToken());
    }

    public function testInvalidUtf8SecretsDoNotShareCacheEntry(): void
    {
        $client = $this->getTestClient('S3', []);
        $this->addMockResults($client, [
            $this->getSessionResult('first'),
            $this->getSessionResult('second'),
        ]);
        $cmd = $client->getCommand('getObject', ['Bucket' => 'foo', 'Key' => 'bar']);
        $provider = new S3ExpressIdentityProvider(
            'region',
            ['client' => $client]
        );

        $first = $provider($cmd, new Credentials('KEY', "\xff"))->wait();
        $second = $provider($cmd, new Credentials('KEY', "\xfe"))->wait();
        self::assertSame('first', $first->getSecurityToken());
        self::assertSame('second', $second->getSecurityToken());
    }

    public function testCreatesSessionWithGivenCredentials(): void
    {
        $provider = new class('us-east-1') extends S3ExpressIdentityProvider {
            public $clients = [];

            protected function createSessionClient(
                CredentialsInterface $credentials
            ): S3Client {
                $client = parent::createSessionClient($credentials);
                $token = $credentials->getAccessKeyId() . '-session';
                $client->getHandlerList()->setHandler(new MockHandler([
                    new Result([
                        'Credentials' => [
                            'AccessKeyId' => 'session-key',
                            'SecretAccessKey' => 'session-secret',
                            'SessionToken' => $token,
                            'Expiration' => new DateTimeResult(
                                gmdate('Y-m-d\TH:i:s\Z', time() + 5000)
                            ),
                        ]
                    ])
                ]));
                $this->clients[] = $client;
                return $client;
            }
        };
        $client = $this->getTestClient('S3', []);
        $cmd = $client->getCommand('getObject', ['Bucket' => 'foo', 'Key' => 'bar']);

        $alice = $provider($cmd, new Credentials('ALICE', 'alice-secret'))
            ->wait();
        $bob = $provider($cmd, new Credentials('BOB', 'bob-secret'))->wait();
        $provider($cmd, new Credentials('ALICE', 'alice-secret'))->wait();

        self::assertSame('ALICE-session', $alice->getSecurityToken());
        self::assertSame('BOB-session', $bob->getSecurityToken());
        self::assertCount(2, $provider->clients);
        $first = $provider->clients[0]->getCredentials()->wait();
        self::assertSame('ALICE', $first->getAccessKeyId());
        self::assertSame('alice-secret', $first->getSecretKey());
        $second = $provider->clients[1]->getCredentials()->wait();
        self::assertSame('BOB', $second->getAccessKeyId());
        self::assertSame('bob-secret', $second->getSecretKey());
    }
}
