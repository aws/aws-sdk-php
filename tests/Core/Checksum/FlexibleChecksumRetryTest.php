<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Checksum;

use Aws\Core\Checksum\FlexibleChecksumRequestInterceptor;
use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Tests\Core\Checksum\Utils\MutableChecksumBody;
use Aws\Tests\Core\Checksum\Utils\RetryChecksumProtocol;
use Aws\Tests\Core\Checksum\Utils\RetryFlexibleChecksumInput;
use Aws\Tests\Core\Checksum\Utils\RetryFlexibleChecksumOperation;
use Aws\Tests\Core\Checksum\Utils\RetryFlexibleChecksumService;
use Aws\Tests\Core\Checksum\Utils\RetryOnceStrategy;
use PHPUnit\Framework\TestCase;
use Smithy\Client\AbstractClient;
use Smithy\Client\ClientConfig;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Interceptor\InterceptorChain;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Http\Client\HttpClientTransport;
use Smithy\Http\Message\Response;
use Smithy\Tests\Utils\Http\MockHttpClient;

final class FlexibleChecksumRetryTest extends TestCase
{
    public function testChecksumIsNotRecalculatedOnRetry(): void
    {
        $body = new MutableChecksumBody('first payload');
        $expected = \base64_encode(\hash(
            'crc32b',
            'first payload',
            true
        ));
        $http = (new MockHttpClient())
            ->queueHandler(function () use ($body): Response {
                $body->content = 'changed payload';

                return new Response(500);
            })
            ->queueResponse(new Response(200));
        $config = new ClientConfig(
            protocol: new RetryChecksumProtocol($body),
            transport: new HttpClientTransport($http),
            endpointResolver: new StaticEndpointResolver(
                new Endpoint('https://example.test')
            ),
            interceptors: new InterceptorChain(
                new FlexibleChecksumRequestInterceptor(
                    RequestChecksumCalculation::WHEN_REQUIRED
                )
            ),
            retryStrategy: new RetryOnceStrategy(),
            service: RetryFlexibleChecksumService::instance()
        );
        $client = new class($config) extends AbstractClient {};

        $client->executeOperation(
            RetryFlexibleChecksumOperation::instance(),
            new RetryFlexibleChecksumInput()
        );

        $this->assertSame(2, $http->sendCallCount);
        $this->assertSame(
            $expected,
            $http->sentRequests[0]->getHeaderLine(
                'x-amz-checksum-crc32'
            )
        );
        $this->assertSame(
            $expected,
            $http->sentRequests[1]->getHeaderLine(
                'x-amz-checksum-crc32'
            )
        );
    }
}
