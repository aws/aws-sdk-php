<?php
namespace Aws\Test;

use Aws\Sdk;

/**
 * @covers Aws\Sdk
 */
class SdkTest extends \PHPUnit_Framework_TestCase
{
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
            (new Sdk())->getDynamoDb(['region' => 'us-east-1'])
        );
    }

    public function testCreatesClientsWithAlias()
    {
        $this->assertInstanceOf(
            'Aws\AwsClientInterface',
            (new Sdk())->getCloudWatch(['region' => 'us-east-1'])
        );
    }

    public function testMergesInstanceArgsWithStoredArgs()
    {
        $sdk = new Sdk([
            'a' => 'a1',
            'b' => 'b1',
            'c' => 'c1',
            'foo' => ['b' => 'b2']
        ]);

        $customFactories = (new \ReflectionObject($sdk))
            ->getProperty('factories');
        $customFactories->setAccessible(true);

        eval('class FooFactory {function create($args) {return $args;}}');
        $customFactories->setValue($sdk, ['foo' => 'FooFactory']);

        $args = $sdk->getFoo(['c' => 'c2', 'd' => 'd1']);

        $this->assertEquals('a1', $args['a']);
        $this->assertEquals('b2', $args['b']);
        $this->assertEquals('c2', $args['c']);
        $this->assertEquals('d1', $args['d']);
    }
}
