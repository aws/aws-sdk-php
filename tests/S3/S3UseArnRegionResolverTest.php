<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\S3;

use Aws\Core\Client\AwsClientConfigContext;
use Aws\Core\Client\AwsClientConfigResolver;
use Aws\Core\S3\S3UseArnRegionResolver;
use Aws\Tests\Utils\TemporaryAwsEnvironment;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class S3UseArnRegionResolverTest extends TestCase
{
    public function testReturnsNullWhenNothingIsConfigured(): void
    {
        self::assertNull($this->resolve());
    }

    public function testExplicitValueWinsOverEnvironmentAndProfile(): void
    {
        self::assertTrue($this->resolve(
            ['AWS_S3_USE_ARN_REGION' => 'false'],
            "[default]\ns3_use_arn_region = false\n",
            true
        ));
        self::assertFalse($this->resolve(
            ['AWS_S3_USE_ARN_REGION' => 'true'],
            "[default]\ns3_use_arn_region = true\n",
            false
        ));
    }

    public function testEnvironmentWinsOverProfile(): void
    {
        self::assertTrue($this->resolve(
            ['AWS_S3_USE_ARN_REGION' => 'true'],
            "[default]\ns3_use_arn_region = false\n"
        ));
    }

    public function testProfileApplies(): void
    {
        self::assertFalse($this->resolve(
            [],
            "[default]\ns3_use_arn_region = false\n"
        ));
        self::assertTrue($this->resolve(
            [],
            "[default]\ns3_use_arn_region = true\n"
        ));
    }

    public function testNamedProfileApplies(): void
    {
        self::assertTrue($this->resolve(
            ['AWS_PROFILE' => 'outposts'],
            "[profile outposts]\ns3_use_arn_region = true\n"
        ));
    }

    /**
     * @return iterable<string, array{string, bool}>
     */
    public static function acceptedValues(): iterable
    {
        yield 'lower case true' => ['true', true];
        yield 'lower case false' => ['false', false];
        yield 'upper case TRUE' => ['TRUE', true];
        yield 'mixed case False' => ['False', false];
    }

    #[DataProvider('acceptedValues')]
    public function testEnvironmentValueIsCaseInsensitive(
        string $value,
        bool $expected
    ): void
    {
        self::assertSame(
            $expected,
            $this->resolve(['AWS_S3_USE_ARN_REGION' => $value])
        );
    }

    /**
     * @return iterable<string, array{string}>
     */
    public static function rejectedValues(): iterable
    {
        yield 'yes' => ['yes'];
        yield 'one' => ['1'];
        yield 'word' => ['enabled'];
    }

    #[DataProvider('rejectedValues')]
    public function testRejectsInvalidEnvironmentValue(string $value): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid environment variable AWS_S3_USE_ARN_REGION value "'
            . $value . '". Use "true" or "false".'
        );

        $this->resolve(['AWS_S3_USE_ARN_REGION' => $value]);
    }

    public function testRejectsInvalidProfileValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid shared config s3_use_arn_region value "maybe". '
            . 'Use "true" or "false".'
        );

        $this->resolve([], "[default]\ns3_use_arn_region = maybe\n");
    }

    /**
     * @param array<string, string> $env
     */
    private function resolve(
        array $env = [],
        string $config = '',
        ?bool $explicit = null
    ): ?bool
    {
        $context = TemporaryAwsEnvironment::run(
            static fn(): AwsClientConfigContext
                => (new AwsClientConfigResolver())->buildContext([]),
            $env,
            $config
        );

        return (new S3UseArnRegionResolver())->resolve($context, $explicit);
    }
}
