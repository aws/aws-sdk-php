<?php

declare(strict_types=1);

namespace Aws\Tests\S3;

use Aws\Core\S3\S3AddressingPlugin;
use Aws\Tests\S3\Utils\S3TestClient;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    DataProvider
};
use PHPUnit\Framework\TestCase;

#[CoversClass(S3AddressingPlugin::class)]
final class S3AddressingPluginTest extends TestCase
{
    /**
     * @return iterable<string, array{bool, bool}>
     */
    public static function supportedOptions(): iterable
    {
        yield 'default addressing' => [false, false];
        yield 'path style' => [true, false];
        yield 'accelerate' => [false, true];
    }

    #[DataProvider('supportedOptions')]
    public function testReturnsTheConfigForSupportedOptions(
        bool $forcePathStyle,
        bool $accelerate
    ): void
    {
        $config = S3TestClient::forModel()->getConfig();

        self::assertSame(
            $config,
            (new S3AddressingPlugin($forcePathStyle, $accelerate))
                ->configure($config)
        );
    }

    public function testRejectsPathStyleWithAccelerate(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Path-style addressing cannot be used with S3 Accelerate.'
        );

        (new S3AddressingPlugin(true, true))->configure(
            S3TestClient::forModel()->getConfig()
        );
    }

    /**
     * @return iterable<string, array{string, string}>
     */
    public static function uriProvider(): iterable
    {
        yield 'bucket only' => ['/{Bucket}', ''];
        yield 'bucket subresource' => ['/{Bucket}?acl', '?acl'];
        yield 'bucket and key' => [
            '/{Bucket}/{Key+}?x-id=GetObject',
            '/{Key+}?x-id=GetObject'
        ];
        yield 'no bucket' => ['/?x-id=ListBuckets', '/?x-id=ListBuckets'];
        yield 'longer label name' => ['/{BucketName}', '/{BucketName}'];
        yield 'bucket later in path' => ['/v1/{Bucket}', '/v1/{Bucket}'];
    }

    #[DataProvider('uriProvider')]
    public function testDropsTheLeadingBucketSegmentForS3(
        string $uri,
        string $expected
    ): void
    {
        $shapes = S3AddressingPlugin::normalizeShapes(
            self::shapes('S3', $uri)
        );

        self::assertSame(
            $expected,
            $shapes['example#Operation']['traits']['smithy.api#http']['uri']
        );
    }

    public function testKeepsTheBucketHttpLabel(): void
    {
        $shapes = S3AddressingPlugin::normalizeShapes(
            self::shapes('S3', '/{Bucket}')
        );

        self::assertSame(
            ['smithy.api#httpLabel' => []],
            $shapes['example#Input']['members']['Bucket']['traits']
        );
    }

    public function testLeavesOtherServicesUnchanged(): void
    {
        $shapes = self::shapes('S3 Control', '/{Bucket}');

        self::assertSame(
            $shapes,
            S3AddressingPlugin::normalizeShapes($shapes)
        );
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private static function shapes(string $sdkId, string $uri): array
    {
        return [
            'example#Service' => [
                'type' => 'service',
                'operations' => [['target' => 'example#Operation']],
                'traits' => ['aws.api#service' => ['sdkId' => $sdkId]]
            ],
            'example#Operation' => [
                'type' => 'operation',
                'input' => ['target' => 'example#Input'],
                'traits' => [
                    'smithy.api#http' => [
                        'method' => 'GET',
                        'uri' => $uri,
                        'code' => 200
                    ]
                ]
            ],
            'example#Input' => [
                'type' => 'structure',
                'members' => [
                    'Bucket' => [
                        'target' => 'smithy.api#String',
                        'traits' => ['smithy.api#httpLabel' => []]
                    ]
                ]
            ]
        ];
    }
}
