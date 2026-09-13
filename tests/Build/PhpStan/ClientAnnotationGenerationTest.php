<?php

namespace Aws\Test\Build\PhpStan;

use PHPUnit\Framework\TestCase;

class ClientAnnotationGenerationTest extends TestCase
{
    public function testEc2OmitsPhpstanMethodAnnotations(): void
    {
        $contents = file_get_contents(
            __DIR__ . '/../../../src/Ec2/Ec2Client.php'
        );

        $this->assertStringContainsString(' * @method \\Aws\\Result', $contents);
        $this->assertStringNotContainsString('@phpstan-method', $contents);
    }

    public function testOtherClientsRetainPhpstanMethodAnnotations(): void
    {
        $contents = file_get_contents(
            __DIR__ . '/../../../src/Sqs/SqsClient.php'
        );

        $this->assertStringContainsString('@phpstan-method', $contents);
    }
}
