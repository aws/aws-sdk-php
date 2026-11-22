<?php

declare(strict_types=1);

namespace Aws\Tests\Core\UserAgent;

use Aws\Core\UserAgent\UserAgentInterceptor;
use Aws\Tests\Core\UserAgent\Utils\{FixedMetadataChain, UserAgentTestClient};
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\ResolvedIdentityMetadata;
use Smithy\Client\AbstractClientConfig;
use Smithy\Client\Interceptor\RequestContext;
use Smithy\Http\Message\{HttpTransportRequest, Request};

final class UserAgentInterceptorTest extends TestCase
{
    private UserAgentTestClient $client;

    protected function setUp(): void
    {
        $this->client = UserAgentTestClient::forModel();
    }

    public function testWritesPrefixMetricsAndSuffix(): void
    {
        $interceptor = new UserAgentInterceptor(
            'aws-sdk-php/4 ua/2.1',
            ' app/demo',
            ['E', 'e'],
            null,
            false
        );

        $this->assertSame(
            'aws-sdk-php/4 ua/2.1 m/E,e app/demo',
            $this->header($interceptor, new Request('POST', '/ping'))
        );
    }

    public function testOmitsMetricsSectionWhenNoIdsApply(): void
    {
        $interceptor = new UserAgentInterceptor('p', ' app/x', [], null, false);

        $this->assertSame(
            'p app/x',
            $this->header($interceptor, new Request('POST', '/ping'))
        );
    }

    public function testReplacesExistingUserAgentWithOneValue(): void
    {
        $interceptor = new UserAgentInterceptor('p', '', ['E'], null, false);
        $request = (new Request('POST', '/ping'))
            ->withHeader('User-Agent', 'custom/1');

        $updated = $this->intercept($interceptor, $request);

        $this->assertSame(['p m/E'], $updated->getHeader('User-Agent'));
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public static function checksumProvider(): iterable
    {
        yield 'crc32' => ['crc32', 'U'];
        yield 'crc32c' => ['crc32c', 'V'];
        yield 'sha1' => ['sha1', 'X'];
        yield 'sha256' => ['sha256', 'Y'];
        yield 'sha512' => ['sha512', 'AF'];
        yield 'xxhash3' => ['xxhash3', 'AG'];
        yield 'xxhash64' => ['xxhash64', 'AH'];
        yield 'xxhash128' => ['xxhash128', 'AI'];
    }

    #[DataProvider('checksumProvider')]
    public function testChecksumHeaderAddsAlgorithmId(
        string $algorithm,
        string $id
    ): void
    {
        $interceptor = new UserAgentInterceptor('p', '', ['E'], null, true);
        $request = (new Request('PUT', '/ping'))
            ->withHeader('x-amz-checksum-' . $algorithm, 'AA==');

        $this->assertSame("p m/E,{$id}", $this->header($interceptor, $request));
    }

    #[DataProvider('checksumProvider')]
    public function testChecksumTrailerAddsAlgorithmId(
        string $algorithm,
        string $id
    ): void
    {
        $interceptor = new UserAgentInterceptor('p', '', ['E'], null, true);
        $request = (new Request('PUT', '/ping'))
            ->withHeader('x-amz-trailer', 'X-Amz-Checksum-' . $algorithm);

        $this->assertSame("p m/E,{$id}", $this->header($interceptor, $request));
    }

    public function testUnknownTrailerAddsNoAlgorithmId(): void
    {
        $interceptor = new UserAgentInterceptor('p', '', ['E'], null, true);
        $request = (new Request('PUT', '/ping'))
            ->withHeader('x-amz-trailer', 'x-amz-meta-other');

        $this->assertSame('p m/E', $this->header($interceptor, $request));
    }

    public function testChecksumHeadersAreIgnoredWhenScanningIsOff(): void
    {
        $interceptor = new UserAgentInterceptor('p', '', ['E'], null, false);
        $request = (new Request('PUT', '/ping'))
            ->withHeader('x-amz-checksum-crc32', 'AA==');

        $this->assertSame('p m/E', $this->header($interceptor, $request));
    }

    public function testWaiterContextAddsWaiterId(): void
    {
        $interceptor = new UserAgentInterceptor('p', '', ['E'], null, false);
        $config = $this->client->getConfig()
            ->withContext(UserAgentInterceptor::WAITER_KEY, true);

        $this->assertSame(
            'p m/E,B',
            $this->header($interceptor, new Request('POST', '/ping'), $config)
        );
    }

    public function testChainMetadataAddsValidProviderIdsOnce(): void
    {
        $chain = new FixedMetadataChain();
        $interceptor = new UserAgentInterceptor('p', '', ['E'], $chain, false);
        $request = new Request('POST', '/ping');

        $this->assertSame('p m/E', $this->header($interceptor, $request));

        $chain->metadata = new ResolvedIdentityMetadata(
            'profile',
            ['n', 'bad id', 'E', 'v']
        );
        $this->assertSame('p m/E,n,v', $this->header($interceptor, $request));

        $chain->metadata = new ResolvedIdentityMetadata('env', ['g']);
        $this->assertSame('p m/E,g', $this->header($interceptor, $request));
    }

    public function testMemoReturnsStableHeadersForEveryKey(): void
    {
        $interceptor = new UserAgentInterceptor('p', '', ['E'], null, true);
        $plain = $this->client->getConfig();
        $waiter = $plain->withContext(UserAgentInterceptor::WAITER_KEY, true);

        foreach ([$plain, $waiter] as $config) {
            foreach (self::checksumProvider() as [$algorithm, $id]) {
                $request = (new Request('PUT', '/ping'))
                    ->withHeader('x-amz-checksum-' . $algorithm, 'AA==');
                $first = $this->header($interceptor, $request, $config);

                $this->assertSame(
                    $first,
                    $this->header($interceptor, $request, $config)
                );
                $this->assertStringContainsString(",{$id}", $first);
            }
        }
    }

    public function testEncodeMetricsJoinsIdsWithCommas(): void
    {
        $this->assertSame(
            'A,B',
            UserAgentInterceptor::encodeMetrics(['A', 'B'])
        );
        $this->assertSame('', UserAgentInterceptor::encodeMetrics([]));
    }

    public function testEncodeMetricsTruncatesAtLastWholeIdUnderOneKiB(): void
    {
        $ids = [];
        for ($i = 0; $i < 400; $i++) {
            $ids[] = 'Ab' . \str_pad((string) $i, 2, 'x');
        }

        $encoded = UserAgentInterceptor::encodeMetrics($ids);

        $this->assertLessThanOrEqual(
            UserAgentInterceptor::MAX_METRICS_BYTES,
            \strlen($encoded)
        );
        $this->assertStringEndsNotWith(',', $encoded);
        foreach (\explode(',', $encoded) as $id) {
            $this->assertContains($id, $ids);
        }
    }

    private function header(
        UserAgentInterceptor $interceptor,
        Request $request,
        ?AbstractClientConfig $config = null
    ): string
    {
        return $this->intercept($interceptor, $request, $config)
            ->getHeaderLine('User-Agent');
    }

    private function intercept(
        UserAgentInterceptor $interceptor,
        Request $request,
        ?AbstractClientConfig $config = null
    ): Request
    {
        $operation = $this->client->operation('Ping');
        $updated = $interceptor->modifyBeforeTransmit(new RequestContext(
            $operation,
            $operation->createInputFromValue(),
            $config ?? $this->client->getConfig(),
            new HttpTransportRequest($request)
        ));
        $result = HttpTransportRequest::expect($updated)->request;
        $this->assertInstanceOf(Request::class, $result);

        return $result;
    }
}
