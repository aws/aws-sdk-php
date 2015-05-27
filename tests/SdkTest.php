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
            ->setMethods(['createClient'])
            ->getMock();
        $sdk->expects($this->once())
            ->method('createClient')
            ->with('Foo', ['bar' => 'baz']);
        $sdk->createFoo(['bar' => 'baz']);
    }

    public function testCreatesClients()
    {
        $this->assertInstanceOf(
            'Aws\AwsClientInterface',
            (new Sdk())->createDynamoDb([
                'region'  => 'us-east-1',
                'version' => 'latest'
            ])
        );
    }

    public function testCreatesClientsWithAlias()
    {
        $this->assertInstanceOf(
            'Aws\AwsClientInterface',
            (new Sdk())->createCloudWatch([
                'region'  => 'us-east-1',
                'version' => 'latest'
            ])
        );
    }

    /**
     * @expectedException \Aws\Exception\UnresolvedApiException
     */
    public function testCreatesGenericClient()
    {
        // Use a config that contains a service-specific config.
        $sdk = new Sdk([
            'version' => 'latest',
            'foo' => ['region' => 'us-east-1']
        ]);

        // Create a client with an unknown name.
        $client = $sdk->createClient('foo');
    }
}
