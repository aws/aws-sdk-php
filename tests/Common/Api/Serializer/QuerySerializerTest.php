<?php
namespace Aws\Test\Common\Api\Serializer;

use Aws\Common\Api\Serializer\QuerySerializer;
use Aws\Common\Api\Service;
use Aws\AwsCommand;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\PrepareEvent;

/**
 * @covers Aws\Common\Api\Serializer\QuerySerializer
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
        $trans = new CommandTransaction(
            $aws,
            new AwsCommand('foo', ['baz' => []], $service)
        );
        $event = new PrepareEvent($trans);
        $q->onPrepare($event);
        $request = $event->getRequest();
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com', $request->getUrl());
        $this->assertEquals('Action=foo&Version=1&baz=', (string) $request->getBody());
    }
}
