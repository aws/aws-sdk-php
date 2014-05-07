<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Serializer\JsonRpcSerializer;
use Aws\Api\Serializer\QuerySerializer;
use Aws\Api\Service;
use Aws\AwsCommand;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\Event\PrepareEvent;

/**
 * @covers Aws\Api\Serializer\QuerySerializer
 */
class QuerySerializerTest extends \PHPUnit_Framework_TestCase
{
    public function testSerializesEmptyLists()
    {
        $service = new Service([
            'metadata'=> ['protocol' => 'query', 'apiVersion' => '1'],
            'operations' => [
                'foo' => [
                    'http' => ['httpMethod' => 'POST'],
                    'input' => [
                        'type' => 'structure',
                        'members' => [
                            'baz' => [
                                'type' => 'list',
                                'member' => ['type' => 'string']
                            ]
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

        $q = new QuerySerializer($service, 'http://foo.com');
        $event = new PrepareEvent(new AwsCommand('foo', ['baz' => []], $service), $aws);
        $q->onPrepare($event);
        $request = $event->getRequest();
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com', $request->getUrl());
        $this->assertEquals('Action=foo&Version=1&baz=', (string) $request->getBody());
    }
}
