<?php
namespace Aws\Test\Handler;

use Aws\Handler\HttpTransportSharing;
use GuzzleHttp\TransportSharing;
use PHPUnit\Framework\Attributes\CoversClass;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(HttpTransportSharing::class)]
class HttpTransportSharingTest extends TestCase
{
    public function testResolvesNullAndNoneToNull()
    {
        $this->assertNull(HttpTransportSharing::resolve(null));
        $this->assertNull(HttpTransportSharing::resolve('none'));
        $this->assertSame([], HttpTransportSharing::toClientConfig(null));
        $this->assertSame([], HttpTransportSharing::toClientConfig('none'));
    }

    public function testRejectsInvalidMode()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The provided transport sharing mode "always" is invalid.');

        HttpTransportSharing::resolve('always');
    }

    public function testDetectsRequiredModes()
    {
        $this->assertTrue(HttpTransportSharing::isRequired('handler_require'));
        $this->assertTrue(HttpTransportSharing::isRequired('persistent_require'));
        $this->assertFalse(HttpTransportSharing::isRequired('handler_prefer'));
        $this->assertFalse(HttpTransportSharing::isRequired('persistent_prefer'));
        $this->assertFalse(HttpTransportSharing::isRequired('none'));
        $this->assertFalse(HttpTransportSharing::isRequired(null));
    }

    public function testPassesHandlerModesThroughWhenSupported()
    {
        if (!class_exists(TransportSharing::class)) {
            $this->markTestSkipped('Transport sharing requires Guzzle 7.11+.');
        }

        $this->assertSame('handler_prefer', HttpTransportSharing::resolve('handler_prefer'));
        $this->assertSame('handler_require', HttpTransportSharing::resolve('handler_require'));
        $this->assertSame(
            ['transport_sharing' => 'handler_prefer'],
            HttpTransportSharing::toClientConfig('handler_prefer')
        );
    }

    public function testPreferModesDegradeToNullWhenUnsupported()
    {
        if (class_exists(TransportSharing::class)) {
            $this->markTestSkipped('Transport sharing is supported by the installed Guzzle.');
        }

        $this->assertNull(HttpTransportSharing::resolve('handler_prefer'));
        $this->assertNull(HttpTransportSharing::resolve('persistent_prefer'));
    }

    public function testHandlerRequireThrowsWhenUnsupported()
    {
        if (class_exists(TransportSharing::class)) {
            $this->markTestSkipped('Transport sharing is supported by the installed Guzzle.');
        }

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('requires guzzlehttp/guzzle ^7.11 || ^8.0');

        HttpTransportSharing::resolve('handler_require');
    }

    public function testPersistentPreferDegradesToHandlerPreferOnGuzzle7()
    {
        if (!class_exists(TransportSharing::class)
            || defined(TransportSharing::class . '::PERSISTENT_PREFER')
        ) {
            $this->markTestSkipped('Requires Guzzle 7.11 through 7.15.');
        }

        $this->assertSame('handler_prefer', HttpTransportSharing::resolve('persistent_prefer'));
    }

    public function testPersistentModesPassThroughOnGuzzle8()
    {
        if (!defined(TransportSharing::class . '::PERSISTENT_PREFER')) {
            $this->markTestSkipped('Persistent transport sharing is only available in Guzzle 8.');
        }

        $this->assertSame('persistent_prefer', HttpTransportSharing::resolve('persistent_prefer'));
        $this->assertSame('persistent_require', HttpTransportSharing::resolve('persistent_require'));
    }

    public function testPersistentRequireThrowsWithoutGuzzle8()
    {
        if (defined(TransportSharing::class . '::PERSISTENT_PREFER')) {
            $this->markTestSkipped('Persistent transport sharing is available in the installed Guzzle.');
        }

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('requires guzzlehttp/guzzle ^8.0');

        HttpTransportSharing::resolve('persistent_require');
    }
}
