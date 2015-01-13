<?php
namespace Aws\Test;

use Aws\Sdk;
use GuzzleHttp\Event\EmitterInterface;
use JmesPath\Env as JmesPath;

/**
 * @covers Aws\Sdk
 */
class SdkTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Check if the given emitter has the provided event listener
     *
     * @param EmitterInterface $emitter Emitter to search
     * @param string|object    $value   Can be a class name or listener object
     * @param null             $event   Specific event to search (optional)
     *
     * @return bool
     */
    public static function hasListener(
        EmitterInterface $emitter,
        $value,
        $event = null
    ) {
        $expression = $event
            ? '[*][0]'
            : '*[*][0]';

        $listeners = $event
            ? $emitter->listeners($event)
            : $emitter->listeners();

        $result = JmesPath::search($expression, $listeners) ?: [];

        if (!is_object($value)) {
            $result = array_map(function($o) {
                return get_class($o);
            }, $result);
        }

        return in_array($value, $result, true);
    }

    /**
     * @expectedException \BadMethodCallException
     */
    public function testEnsuresMissingMethodThrowsException()
    {
        (new Sdk())->foo();
    }

    public function testHasMagicMethods()
    {
        $sdk = $this->getMockBuilder('Aws\Sdk')
            ->setMethods(['getClient'])
            ->getMock();
        $sdk->expects($this->once())
            ->method('getClient')
            ->with('Foo', ['bar' => 'baz']);
        $sdk->getFoo(['bar' => 'baz']);
    }

    public function testCreatesClients()
    {
        $this->assertInstanceOf(
            'Aws\AwsClientInterface',
            (new Sdk())->getDynamoDb([
                'region'  => 'us-east-1',
                'version' => 'latest'
            ])
        );
    }

    public function testCreatesClientsWithAlias()
    {
        $this->assertInstanceOf(
            'Aws\AwsClientInterface',
            (new Sdk())->getCloudWatch([
                'region'  => 'us-east-1',
                'version' => 'latest'
            ])
        );
    }

    public function testUsesSharedHandler()
    {
        $sdk = new Sdk();
        $c1 = $sdk->getClient('s3', [
            'version'     => 'latest',
            'credentials' => ['key' => 'a', 'secret' => 'b']
        ]);
        $c2 = $sdk->getClient('s3', [
            'version'     => 'latest',
            'credentials' => ['key' => 'a', 'secret' => 'b']
        ]);
        $fsm1 = $this->readAttribute($c1->getHttpClient(), 'fsm');
        $fsm2 = $this->readAttribute($c2->getHttpClient(), 'fsm');
        $this->assertSame(
            $this->readAttribute($fsm1, 'handler'),
            $this->readAttribute($fsm2, 'handler')
        );
    }
}

class FooFactory
{
    function create($args) {
        return $args;
    }
}
