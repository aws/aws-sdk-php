<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials\Provider;

use Aws\Core\Credentials\Provider\ContainerCredentialProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Smithy\Auth\ChainSetup;
use Smithy\Auth\IdentityResolverInterface;
use Smithy\Auth\NonRecoverableIdentityException;
use Smithy\Http\Client\HttpRequestOptions;
use Smithy\Http\Message\Response;
use Smithy\Tests\Utils\Http\MockHttpClient;

final class ContainerCredentialProviderTest extends TestCase
{
    /** @var array<string, string|false> */
    private array $priorEnv = [];

    protected function setUp(): void
    {
        parent::setUp();

        foreach ([
            'AWS_CONTAINER_CREDENTIALS_FULL_URI',
            'AWS_CONTAINER_CREDENTIALS_RELATIVE_URI',
            'AWS_CONTAINER_AUTHORIZATION_TOKEN',
            'AWS_CONTAINER_AUTHORIZATION_TOKEN_FILE',
        ] as $name) {
            $this->priorEnv[$name] = getenv($name);
            putenv($name);
            unset($_ENV[$name]);
        }
    }

    protected function tearDown(): void
    {
        foreach ($this->priorEnv as $name => $prior) {
            if ($prior === false) {
                putenv($name);
                unset($_ENV[$name]);
            } else {
                putenv("{$name}={$prior}");
                $_ENV[$name] = $prior;
            }
        }

        parent::tearDown();
    }

    public function testRelativeUriTakesPrecedenceOverFullUri(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI=/relative');
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://127.0.0.1/ignored');

        $httpClient = $this->successfulClient();
        $provider = new ContainerCredentialProvider($httpClient);

        $identity = $provider->resolveIdentity()->unwrap();

        $this->assertSame('AKID', $identity->getAccessKeyId());
        $this->assertSame('http://169.254.170.2/relative', (string) $httpClient->getLastRequest()?->getUri());
    }

    public function testAllowsHttpsHostnameUri(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=https://awscredentials.amazonaws.com/credentials');

        $httpClient = $this->successfulClient();
        $provider = new ContainerCredentialProvider($httpClient);
        $provider->resolveIdentity()->unwrap();

        $this->assertSame(
            'https://awscredentials.amazonaws.com/credentials',
            (string) $httpClient->getLastRequest()?->getUri(),
        );
    }

    public function testAllowsLoopbackAndLinkLocalHosts(): void
    {
        $uris = [
            'http://127.0.0.2/credentials',
            'http://[::1]/credentials',
            'http://169.254.170.2/credentials',
            'http://169.254.170.23/credentials',
            'http://[fd00:ec2::23]/credentials',
        ];

        foreach ($uris as $uri) {
            putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=' . $uri);

            $httpClient = $this->successfulClient();
            $provider = new ContainerCredentialProvider($httpClient);
            $identity = $provider->resolveIdentity()->unwrap();

            $this->assertSame($uri, (string) $httpClient->getLastRequest()?->getUri());
        }
    }

    public function testRejectsForbiddenHttpHost(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://192.168.1.1/endpoint');

        $provider = new ContainerCredentialProvider($this->successfulClient());

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("'192.168.1.1' is not an allowed host");
        $provider->resolveIdentity()->unwrap();
    }

    public function testAddsAuthorizationTokenFromFileBeforeEnv(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI=/credentials-relative');
        putenv('AWS_CONTAINER_AUTHORIZATION_TOKEN=Basic from-env');

        $tokenFile = tempnam(sys_get_temp_dir(), 'aws-container-token-');
        self::assertNotFalse($tokenFile);
        file_put_contents($tokenFile, 'Basic from-file');
        putenv('AWS_CONTAINER_AUTHORIZATION_TOKEN_FILE=' . $tokenFile);

        try {
            $httpClient = $this->successfulClient();
            $provider = new ContainerCredentialProvider($httpClient);
            $identity = $provider->resolveIdentity()->unwrap();

            $this->assertSame(
                'Basic from-file',
                $httpClient->getLastRequest()?->getHeaderLine('Authorization'),
            );
        } finally {
            @unlink($tokenFile);
        }
    }

    public function testRereadsAuthorizationTokenFileForEachCredentialsRequest(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://127.0.0.1/credentials');

        $tokenFile = tempnam(sys_get_temp_dir(), 'aws-container-token-');
        self::assertNotFalse($tokenFile);
        file_put_contents($tokenFile, 'Basic first');
        putenv('AWS_CONTAINER_AUTHORIZATION_TOKEN_FILE=' . $tokenFile);

        $httpClient = new MockHttpClient();
        $httpClient->queueResponse(new Response(
            200,
            ['Content-Type' => 'application/json'],
            '{"AccessKeyId":"first","SecretAccessKey":"secret-1"}',
        ));
        $httpClient->queueResponse(new Response(
            200,
            ['Content-Type' => 'application/json'],
            '{"AccessKeyId":"second","SecretAccessKey":"secret-2"}',
        ));

        try {
            $provider = new ContainerCredentialProvider($httpClient);

            $identity = $provider->resolveIdentity()->unwrap();
            $this->assertSame(
                'Basic first',
                $httpClient->sentRequests[0]->getHeaderLine('Authorization'),
            );

            file_put_contents($tokenFile, 'Basic second');
            $provider->invalidate($identity);
            $provider->resolveIdentity()->unwrap();

            $this->assertSame(
                'Basic second',
                $httpClient->sentRequests[1]->getHeaderLine('Authorization'),
            );
        } finally {
            @unlink($tokenFile);
        }
    }

    public function testRejectsUnreadableAuthorizationTokenFile(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI=/credentials-relative');
        putenv('AWS_CONTAINER_AUTHORIZATION_TOKEN_FILE=/definitely/missing/token');

        $provider = new ContainerCredentialProvider($this->successfulClient());

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("failed to read authorization token from '/definitely/missing/token'");
        $provider->resolveIdentity()->unwrap();
    }

    public function testRejectsAuthorizationTokenWithNewlines(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_RELATIVE_URI=/credentials-relative');
        putenv("AWS_CONTAINER_AUTHORIZATION_TOKEN=Basic bad\nvalue");

        $provider = new ContainerCredentialProvider($this->successfulClient());

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('authorization token must not contain CR or LF characters');
        $provider->resolveIdentity()->unwrap();
    }

    public function testParsesCredentialsResponseIncludingAccountIdAndExpiration(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://127.0.0.1/credentials');

        $httpClient = new MockHttpClient();
        $httpClient->queueResponse(new Response(
            200,
            ['Content-Type' => 'application/json'],
            '{"AccessKeyId":"foo","SecretAccessKey":"bar","Token":"baz","AccountId":"qux","Expiration":"2023-06-30T00:00:00.000Z","Foo":"Bar"}',
        ));

        $provider = new ContainerCredentialProvider($httpClient);
        $identity = $provider->resolveIdentity()->unwrap();

        $this->assertSame('foo', $identity->getAccessKeyId());
        $this->assertSame('bar', $identity->getSecretAccessKey());
        $this->assertSame('baz', $identity->getSessionToken());
        $this->assertSame('qux', $identity->getAccountId());
        $this->assertSame(1688083200.0, $identity->getExpirationTime());
    }

    public function testCachesNonExpiringCredentialsUntilInvalidated(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://127.0.0.1/credentials');

        $httpClient = new MockHttpClient();
        $httpClient->queueResponse(new Response(
            200,
            ['Content-Type' => 'application/json'],
            '{"AccessKeyId":"first","SecretAccessKey":"secret-1"}',
        ));
        $httpClient->queueResponse(new Response(
            200,
            ['Content-Type' => 'application/json'],
            '{"AccessKeyId":"second","SecretAccessKey":"secret-2"}',
        ));

        $resolver = $this->setupResolver(new ContainerCredentialProvider($httpClient));

        $first = $resolver->resolveIdentity()->unwrap();
        $second = $resolver->resolveIdentity()->unwrap();

        $this->assertSame('first', $first->getAccessKeyId());
        $this->assertSame('first', $second->getAccessKeyId());
        $this->assertSame(1, $httpClient->sendCallCount);

        $resolver->invalidate($first);

        $refreshed = $resolver->resolveIdentity()->unwrap();
        $this->assertSame('second', $refreshed->getAccessKeyId());
        $this->assertSame(2, $httpClient->sendCallCount);
    }

    public function testFailedRefreshReturnsCachedCredentials(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://127.0.0.1/credentials');

        $nearExpiry = (new \DateTimeImmutable('+60 seconds', new \DateTimeZone('UTC')))
            ->format('Y-m-d\TH:i:s.v\Z');
        $httpClient = new MockHttpClient();
        $httpClient->queueResponse(new Response(
            200,
            ['Content-Type' => 'application/json'],
            sprintf('{"AccessKeyId":"first","SecretAccessKey":"secret-1","Expiration":"%s"}', $nearExpiry),
        ));
        $httpClient->queueResponse(new Response(500, [], ''));

        $resolver = $this->setupResolver(new ContainerCredentialProvider($httpClient));

        $first = $resolver->resolveIdentity()->unwrap();
        $second = $resolver->resolveIdentity()->unwrap();
        $third = $resolver->resolveIdentity()->unwrap();

        $this->assertSame($first, $second);
        $this->assertSame($first, $third);
        $this->assertSame(2, $httpClient->sendCallCount);
    }

    public function testSetupsRefreshIndependently(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://127.0.0.1/credentials');

        $nearExpiry = (new \DateTimeImmutable('+60 seconds', new \DateTimeZone('UTC')))
            ->format('Y-m-d\TH:i:s.v\Z');
        $body = sprintf('{"AccessKeyId":"key","SecretAccessKey":"secret","Expiration":"%s"}', $nearExpiry);
        $clientA = new MockHttpClient();
        $clientB = new MockHttpClient();
        foreach ([$clientA, $clientB] as $client) {
            $client->queueResponse(new Response(200, [], $body));
            $client->queueResponse(new Response(500, [], ''));
        }

        $resolverA = $this->setupResolver(new ContainerCredentialProvider($clientA));
        $resolverB = $this->setupResolver(new ContainerCredentialProvider($clientB));

        $resolverA->resolveIdentity()->unwrap();
        $resolverB->resolveIdentity()->unwrap();
        $resolverA->resolveIdentity()->unwrap();
        $resolverA->resolveIdentity()->unwrap();

        $this->assertSame(2, $clientA->sendCallCount);
        $this->assertSame(1, $clientB->sendCallCount);

        $resolverB->resolveIdentity()->unwrap();

        $this->assertSame(2, $clientB->sendCallCount);
    }

    public function testInvalidEndpointRaisesNonRecoverableError(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://example.com/credentials');

        $resolver = $this->setupResolver(new ContainerCredentialProvider(new MockHttpClient()));

        $this->expectException(NonRecoverableIdentityException::class);
        $resolver->resolveIdentity();
    }

    private function setupResolver(ContainerCredentialProvider $provider): IdentityResolverInterface
    {
        $setup = new ChainSetup();
        $setup->setCurrentProvider($provider);
        $provider->setup($setup);

        return $setup->registrations()[0]['resolver'];
    }

    public function testRefreshesCredentialsInsideRefreshWindow(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://127.0.0.1/credentials');

        $now = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));
        $nearExpiry = $now->modify('+60 seconds')->format('Y-m-d\TH:i:s.v\Z');
        $farExpiry = $now->modify('+1 hour')->format('Y-m-d\TH:i:s.v\Z');

        $httpClient = new MockHttpClient();
        $httpClient->queueResponse(new Response(
            200,
            ['Content-Type' => 'application/json'],
            sprintf('{"AccessKeyId":"first","SecretAccessKey":"secret-1","Expiration":"%s"}', $nearExpiry),
        ));
        $httpClient->queueResponse(new Response(
            200,
            ['Content-Type' => 'application/json'],
            sprintf('{"AccessKeyId":"second","SecretAccessKey":"secret-2","Expiration":"%s"}', $farExpiry),
        ));

        $provider = $this->setupResolver(new ContainerCredentialProvider($httpClient, 300));

        $first = $provider->resolveIdentity()->unwrap();
        $second = $provider->resolveIdentity()->unwrap();

        $this->assertSame('first', $first->getAccessKeyId());
        $this->assertSame('second', $second->getAccessKeyId());
        $this->assertSame(2, $httpClient->sendCallCount);
    }

    public function testJsonErrorResponsesUseErrorResponsePrefix(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://127.0.0.1/credentials');

        $httpClient = new MockHttpClient();
        $httpClient->queueResponse(new Response(
            401,
            ['Content-Type' => 'application/json'],
            '{"Code":"TokenNotFound"}',
        ));

        $provider = new ContainerCredentialProvider($httpClient);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionCode(401);
        $this->expectExceptionMessage('received error response from credentials endpoint: 401 Unauthorized');
        $provider->resolveIdentity()->unwrap();
    }

    public function testNonJsonErrorResponsesUseNon2xxPrefix(): void
    {
        putenv('AWS_CONTAINER_CREDENTIALS_FULL_URI=http://127.0.0.1/credentials');

        $httpClient = new MockHttpClient();
        $httpClient->queueResponse(new Response(429, [], 'rate limited'));

        $provider = new ContainerCredentialProvider($httpClient);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionCode(429);
        $this->expectExceptionMessage('received non-2xx response from credentials endpoint: 429 Too Many Requests');
        $provider->resolveIdentity()->unwrap();
    }

    private function successfulClient(): MockHttpClient
    {
        $client = new MockHttpClient();
        $client->fallbackHandler(static function (RequestInterface $request, HttpRequestOptions $options, MockHttpClient $client): Response {
            return new Response(
                200,
                ['Content-Type' => 'application/json'],
                '{"AccessKeyId":"AKID","SecretAccessKey":"SECRET","Token":"TOKEN"}',
            );
        });

        return $client;
    }
}
