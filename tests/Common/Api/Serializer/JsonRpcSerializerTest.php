<?php
namespace Aws\Test\Common\Api\Serializer;

use Aws\Common\Api\Serializer\JsonRpcSerializer;
use Aws\Common\Api\Service;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\PrepareEvent;

/**
 * @covers Aws\Common\Api\Serializer\JsonRpcSerializer
 */
class JsonRpcSerializerTest extends \PHPUnit_Framework_TestCase
{
    public function testPreparesRequests()
    {
        $service = new Service([
            'metadata'=> [
                'targetPrefix' => 'test',
                'jsonVersion' => '1.1'
            ],
            'operations' => [
                'foo' => [
                    'http' => ['httpMethod' => 'POST'],
                    'input' => [
                        'type' => 'structure',
                        'members' => [
                            'baz' => ['type' => 'string']
                        ]
                    ]
                ]
            ]
        ]);

        $http = new Client();

        $aws = $this->getMockBuilder('Aws\AwsClient')
            ->setMethods(['getHttpClient'])
            ->disableOriginalConstructor()
            ->getMock();

        $aws->expects($this->once())
            ->method('getHttpClient')
            ->will($this->returnValue($http));

        $j = new JsonRpcSerializer($service, 'http://foo.com');
        $this->assertArrayHasKey('prepare', $j->getEvents());
        $trans = new CommandTransaction(
            $aws,
            new Command('foo', ['baz' => 'bam'])
        );
        $event = new PrepareEvent($trans);
        $j->onPrepare($event);
        $request = $event->getRequest();
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com', $request->getUrl());
        $this->assertTrue($request->hasHeader('User-Agent'));
        $this->assertEquals(
            'application/x-amz-json-1.1',
            $request->getHeader('Content-Type')
        );
        $this->assertEquals('test.foo', $request->getHeader('X-Amz-Target'));
        $this->assertEquals('{"baz":"bam"}', $request->getBody());
    }
}
