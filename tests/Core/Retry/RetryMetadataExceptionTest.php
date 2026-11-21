<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Retry;

use Aws\Core\Retry\RetryMetadataException;
use PHPUnit\Framework\TestCase;
use Smithy\Core\Retry\RetryInfoInterface;
use Smithy\Core\Retry\RetrySafety;

final class RetryMetadataExceptionTest extends TestCase
{
    public function testExposesRetryInfoForRetryableThrottle(): void
    {
        $error = RetryMetadataException::wrap(
            new \RuntimeException('slow down'),
            true,
            true,
            1.5
        );

        $this->assertInstanceOf(RetryInfoInterface::class, $error);
        $this->assertSame(RetrySafety::Yes, $error->getRetrySafety());
        $this->assertTrue($error->isThrottle());
        $this->assertSame(1.5, $error->getRetryAfter());
    }

    public function testExposesRetryInfoForNonRetryableError(): void
    {
        $error = RetryMetadataException::wrap(
            new \RuntimeException('bad'),
            false
        );

        $this->assertSame(RetrySafety::No, $error->getRetrySafety());
        $this->assertFalse($error->isThrottle());
        $this->assertNull($error->getRetryAfter());
    }
}
