<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Retry;

use Aws\Core\Retry\AwsRetryRequestFlagResolver;
use Aws\Tests\Core\Retry\Utils\RetryTestClient;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Client\ClientConfig;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Client\Retry\RetryRequestFlags;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Http\Client\HttpClientTransport;
use Smithy\Protocol\Aws\RestJsonProtocol;
use Smithy\Tests\Utils\Http\MockHttpClient;

final class AwsRetryRequestFlagResolverTest extends TestCase
{
    /**
     * @return array<string, array{string, string}>
     */
    public static function longPollingProvider(): array
    {
        return [
            'sqs ReceiveMessage' => ['sqs', 'ReceiveMessage'],
            'states GetActivityTask' => ['states', 'GetActivityTask'],
            'swf PollForActivityTask' => ['swf', 'PollForActivityTask'],
            'swf PollForDecisionTask' => ['swf', 'PollForDecisionTask'],
        ];
    }

    #[DataProvider('longPollingProvider')]
    public function testResolvesLongPollingAllowlist(
        string $signingName,
        string $operationName
    ): void
    {
        $client = RetryTestClient::forModel($signingName);

        $this->assertSame(
            RetryRequestFlags::LONG_POLLING,
            AwsRetryRequestFlagResolver::instance()->resolve(
                $client->operation($operationName),
                $client->getConfig()
            )
        );
    }

    public function testReturnsZeroForOperationOutsideAllowlist(): void
    {
        $client = RetryTestClient::forModel('sqs');

        $this->assertSame(
            0,
            AwsRetryRequestFlagResolver::instance()->resolve(
                $client->operation('Ping'),
                $client->getConfig()
            )
        );
    }

    public function testReturnsZeroForAllowlistedNameOnOtherService(): void
    {
        $client = RetryTestClient::forModel('s3');

        $this->assertSame(
            0,
            AwsRetryRequestFlagResolver::instance()->resolve(
                $client->operation('ReceiveMessage'),
                $client->getConfig()
            )
        );
    }

    public function testReturnsZeroForNonAwsConfig(): void
    {
        $config = new ClientConfig(
            protocol: new RestJsonProtocol(),
            transport: new HttpClientTransport(new MockHttpClient()),
            endpointResolver: new StaticEndpointResolver(
                new Endpoint('https://example.test')
            )
        );

        $this->assertSame(
            0,
            AwsRetryRequestFlagResolver::instance()->resolve(
                RetryTestClient::forModel('sqs')->operation('ReceiveMessage'),
                $config
            )
        );
    }
}
