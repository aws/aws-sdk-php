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
}
