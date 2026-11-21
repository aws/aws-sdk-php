<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Model;

use Aws\Core\Model\AwsAuthModelNormalizer;
use PHPUnit\Framework\TestCase;

final class AwsAuthModelNormalizerTest extends TestCase
{
    public function testInfersAppliedAwsAuthSchemes(): void
    {
        $shapes = [
            'example#Service' => [
                'type' => 'service',
                'traits' => [
                    'aws.auth#sigv4' => ['name' => 'example'],
                    'aws.auth#sigv4a' => ['name' => 'example']
                ]
            ]
        ];

        $normalized = AwsAuthModelNormalizer::normalizeShapes($shapes);

        self::assertSame(
            ['aws.auth#sigv4', 'aws.auth#sigv4a'],
            $normalized['example#Service']['traits']['smithy.api#auth']
        );
    }

    public function testPreservesExplicitAnonymousAuth(): void
    {
        $shapes = [
            'example#Service' => [
                'type' => 'service',
                'traits' => [
                    'aws.auth#sigv4' => ['name' => 'example'],
                    'smithy.api#auth' => []
                ]
            ]
        ];

        self::assertSame(
            $shapes,
            AwsAuthModelNormalizer::normalizeShapes($shapes)
        );
    }
}
