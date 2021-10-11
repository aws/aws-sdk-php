<?php
namespace Aws\Test\Endpoint;

use Aws\Endpoint\EndpointProvider;
use Aws\Endpoint\PartitionEndpointProvider;
use Aws\Test\Polyfill\PHPUnit\PHPUnitCompatTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Endpoint\EndpointProvider
 */
class EndpointProviderTest extends TestCase
{
    use PHPUnitCompatTrait;

    public function testThrowsWhenUnresolved()
    {
        $this->expectException(\Aws\Exception\UnresolvedEndpointException::class);
        EndpointProvider::resolve(function() {}, []);
    }

    public function testThrowsWhenNotArray()
    {
        $this->expectException(\Aws\Exception\UnresolvedEndpointException::class);
        EndpointProvider::resolve(function() { return 'foo'; }, []);
    }

    public function testCreatesDefaultProvider()
    {
        $p = EndpointProvider::defaultProvider();
        $this->assertInstanceOf(PartitionEndpointProvider::class, $p);
    }

    public function testCreatesProviderFromPatterns()
    {
        $p = EndpointProvider::patterns([
            '*/*' => ['endpoint' => 'foo.com']
        ]);
        $this->assertInstanceOf('Aws\Endpoint\PatternEndpointProvider', $p);
        $result = EndpointProvider::resolve($p, []);
        $this->assertSame('https://foo.com', $result['endpoint']);
    }
}
