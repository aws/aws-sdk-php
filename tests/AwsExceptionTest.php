<?php
namespace Aws\Test;

use Aws\Common\Api\Service;
use Aws\AwsClient;
use Aws\AwsException;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Exception\CommandException;

/**
 * @covers Aws\AwsException
 */
class AwsExceptionTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresWrappedExceptionIsValid()
    {
        $trans = $this->getMockBuilder('GuzzleHttp\Command\CommandTransaction')
            ->disableOriginalConstructor()
            ->getMock();
        $e = $this->getMockBuilder('GuzzleHttp\Command\Exception\CommandException')
            ->setMethods(['getClient'])
            ->setConstructorArgs(['Baz', $trans])
            ->getMock();
        $e->expects($this->once())
            ->method('getClient')
            ->will($this->returnValue('foo'));
        AwsException::wrap($e);
    }

    public function testProvidesExceptionData()
    {
        $api = $this->createServiceApi([
            'metadata' => ['endpointPrefix' => 'ec2']
        ]);

        $client = new AwsClient([
            'api'         => $api,
            'credentials' => 'foo',
            'client'      => new Client(),
            'signature'   => 'bar',
            'region'      => 'boo'
        ]);

        $cmd = new Command('foo');
        $trans = new CommandTransaction($client, $cmd, [
            'aws_error' => [
                'message'    => 'a',
                'request_id' => 'b',
                'type'       => 'c',
                'code'       => 'd'
            ]
        ]);

        $e1 = new CommandException('foo', $trans);
        $e2 = AwsException::wrap($e1);
        $this->assertSame('ec2', $e2->getServiceName());
        $this->assertSame($e1, $e2->getPrevious());
        $this->assertSame($api, $e2->getApi());
        $this->assertSame($client, $e2->getClient());
        $this->assertEquals('d', $e2->getAwsErrorCode());
        $this->assertEquals('d', $e2->getExceptionCode());
        $this->assertEquals('b', $e2->getAwsRequestId());
        $this->assertEquals('b', $e2->getRequestId());
        $this->assertEquals('c', $e2->getAwsErrorType());
        $this->assertEquals('c', $e2->getExceptionType());
        $this->assertEquals('AWS (ec2) Error: a', $e2->getMessage());
    }

    public function testUsesPreviousExceptionMessage()
    {
        $api = $this->createServiceApi([
            'metadata' => ['endpointPrefix' => 'ec2']
        ]);

        $client = new AwsClient([
            'api'         => $api,
            'credentials' => 'foo',
            'client'      => new Client(),
            'signature'   => 'bar',
            'region'      => 'boo'
        ]);

        $command = $this->getMockBuilder('Aws\AwsCommandInterface')
            ->getMockForAbstractClass();
        $trans = new CommandTransaction($client, $command);
        $e = new CommandException('Previous', $trans);
        $ex = AwsException::wrap($e);
        $this->assertContains('Previous', $ex->getMessage());
    }
}
