<?php
namespace Aws\Test;

use GuzzleHttp\Collection;
use Aws\AwsException;
use GuzzleHttp\Message\Response;

/**
 * @covers Aws\AwsException
 */
class AwsExceptionTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testReturnsClient()
    {
        $client = $this->getTestClient('s3');
        $trans = $this->getMockBuilder('GuzzleHttp\Command\CommandTransaction')
            ->setMethods(['getClient'])
            ->disableOriginalConstructor()
            ->getMock();
        $trans->expects($this->once())
            ->method('getClient')
            ->will($this->returnValue($client));
        $e = new AwsException('Foo', $trans);
        $this->assertSame($client, $e->getClient());
    }

    public function testProvidesContextShortcuts()
    {
        $coll = new Collection([
            'aws_error' => [
                'request_id' => '10',
                'type'       => 'mytype',
                'code'       => 'mycode'
            ]
        ]);

        $trans = $this->getMockBuilder('GuzzleHttp\Command\CommandTransaction')
            ->setMethods(['getContext'])
            ->disableOriginalConstructor()
            ->getMock();

        $trans->expects($this->any())
            ->method('getContext')
            ->will($this->returnValue($coll));

        $e = new AwsException('Foo', $trans);
        $this->assertEquals('10', $e->getAwsRequestId());
        $this->assertEquals('10', $e->getRequestId());

        $this->assertEquals('mytype', $e->getAwsErrorType());
        $this->assertEquals('mytype', $e->getExceptionType());

        $this->assertEquals('mycode', $e->getAwsErrorCode());
        $this->assertEquals('mycode', $e->getExceptionCode());
    }

    public function testReturnsServiceName()
    {
        $client = $this->getTestClient('s3');
        $trans = $this->getMockBuilder('GuzzleHttp\Command\CommandTransaction')
            ->setMethods(['getClient'])
            ->disableOriginalConstructor()
            ->getMock();
        $trans->expects($this->once())
            ->method('getClient')
            ->will($this->returnValue($client));
        $e = new AwsException('Foo', $trans);
        $this->assertSame('s3', $e->getServiceName());
    }

    public function testReturnsStatusCode()
    {
        $client = $this->getTestClient('s3');
        $trans = $this->getMockBuilder('GuzzleHttp\Command\CommandTransaction')
            ->setMethods(['getResponse'])
            ->disableOriginalConstructor()
            ->getMock();
        $trans->expects($this->once())
            ->method('getResponse')
            ->will($this->returnValue(new Response(400)));
        $e = new AwsException('Foo', $trans);
        $this->assertSame('400', $e->getStatusCode());
    }
}
