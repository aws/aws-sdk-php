<?php
namespace Aws\Test;

use Aws\Endpoint\EndpointProvider;
use Aws\Endpoint\PartitionEndpointProvider;

/**
 * @covers Aws\Endpoint\EndpointProvider
 */
class EndpointProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Aws\Exception\UnresolvedEndpointException
     */
    public function testThrowsWhenUnresolved()
    {
        EndpointProvider::resolve(function() {}, []);
    }

    /**
     * @expectedException \Aws\Exception\UnresolvedEndpointException
     */
    public function testThrowsWhenNotArray()
    {
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
        $this->assertEquals('https://foo.com', $result['endpoint']);
    }
}
