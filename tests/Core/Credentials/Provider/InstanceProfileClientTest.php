<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials\Provider;

use Aws\Core\Credentials\AwsProfile;
use Aws\Core\Credentials\Provider\InstanceProfileClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Smithy\Http\Client\HttpRequestOptions;
use Smithy\Http\Message\Response;
use Smithy\Tests\Utils\Http\MockHttpClient;

final class InstanceProfileClientTest extends TestCase
{
    public function testGetFetchesTokenAndReturnsMetadata(): void
    {
        $httpClient = (new MockHttpClient())
            ->queueResponse(new Response(200, ['x-aws-ec2-metadata-token-ttl-seconds' => '60'], 'token-1'))
            ->queueResponse('payload');

        $client = new InstanceProfileClient(
            httpClient: $httpClient,
        );

        $this->assertSame('payload', $client->get('/latest/meta-data/iam/security-credentials'));
        $this->assertCount(2, $httpClient->sentRequests);
        $this->assertSame('PUT', $httpClient->sentRequests[0]->getMethod());
        $this->assertSame('GET', $httpClient->sentRequests[1]->getMethod());
        $this->assertSame('token-1', $httpClient->sentRequests[1]->getHeaderLine('X-aws-ec2-metadata-token'));
    }

    public function testGetReusesCachedTokenUntilExpiry(): void
    {
        $tokenCalls = 0;
        $httpClient = (new MockHttpClient())
            ->fallbackHandler(static function (RequestInterface $request, HttpRequestOptions $options, MockHttpClient $client) use (&$tokenCalls): Response {
                if ($request->getMethod() === 'PUT') {
                    $tokenCalls++;

                    return new Response(200, ['x-aws-ec2-metadata-token-ttl-seconds' => '60'], 'token');
                }

                return new Response(200, [], 'ok');
            });

        $client = new InstanceProfileClient(
            httpClient: $httpClient,
        );

        $client->get('/a');
        $client->get('/b');

        $this->assertSame(1, $tokenCalls);
    }

    public function testGetRetriesUnauthorizedByRefreshingToken(): void
    {
        $tokenCalls = 0;
        $getCalls = 0;
        $httpClient = (new MockHttpClient())
            ->fallbackHandler(static function (RequestInterface $request, HttpRequestOptions $options, MockHttpClient $client) use (&$tokenCalls, &$getCalls): Response {
                if ($request->getMethod() === 'PUT') {
                    $tokenCalls++;

                    return new Response(
                        200,
                        ['x-aws-ec2-metadata-token-ttl-seconds' => '1'],
                        'token-' . $tokenCalls,
                    );
                }

                $getCalls++;
                if ($getCalls === 1) {
                    return new Response(401, [], '');
                }

                return new Response(200, [], 'ok');
            });

        $client = new InstanceProfileClient(
            options: ['backoff' => static function (int $attempt): void {}],
            httpClient: $httpClient,
        );

        $this->assertSame('ok', $client->get('/path'));
        $this->assertSame(2, $tokenCalls);
    }

    public function testGetDoesNotRetryNotFound(): void
    {
        $httpClient = (new MockHttpClient())
            ->fallbackHandler(static function (RequestInterface $request, HttpRequestOptions $options, MockHttpClient $client): Response {
                if ($request->getMethod() === 'PUT') {
                    return new Response(200, ['x-aws-ec2-metadata-token-ttl-seconds' => '60'], 'token');
                }

                return new Response(404, [], '');
            });

        $client = new InstanceProfileClient(
            httpClient: $httpClient,
        );

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionCode(404);
        $client->get('/missing');
    }

    public function testRejectsEndpointWithoutScheme(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new InstanceProfileClient(options: ['endpoint' => '169.254.169.254']);
    }

    public function testResolvesEndpointModeFromProfile(): void
    {
        $httpClient = (new MockHttpClient())
            ->fallbackHandler(static function (RequestInterface $request, HttpRequestOptions $options, MockHttpClient $client): Response {
                return $request->getMethod() === 'PUT'
                    ? new Response(200, ['x-aws-ec2-metadata-token-ttl-seconds' => '60'], 'token')
                    : new Response(200, [], 'ok');
            });

        $client = new InstanceProfileClient(
            profile: new AwsProfile('default', ['ec2_metadata_service_endpoint_mode' => 'IPv6']),
            httpClient: $httpClient,
        );

        $client->get('/x');

        $this->assertStringStartsWith('http://[fd00:ec2::254]/', (string) $httpClient->sentRequests[0]->getUri());
    }

    public function testPreservesExplicitEndpointPort(): void
    {
        $httpClient = (new MockHttpClient())
            ->fallbackHandler(static function (RequestInterface $request, HttpRequestOptions $options, MockHttpClient $client): Response {
                return $request->getMethod() === 'PUT'
                    ? new Response(200, ['x-aws-ec2-metadata-token-ttl-seconds' => '60'], 'token')
                    : new Response(200, [], 'ok');
            });

        $client = new InstanceProfileClient(
            options: ['endpoint' => 'http://127.0.0.1:1338'],
            httpClient: $httpClient,
        );

        $client->get('/x');

        $this->assertStringStartsWith(
            'http://127.0.0.1:1338/',
            (string) $httpClient->sentRequests[0]->getUri(),
        );
    }
}
