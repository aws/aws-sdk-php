<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Serializer\QuerySerializer;
use Aws\Api\Service;
use GuzzleHttp\Command\Command;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandTransaction;

/**
 * @covers Aws\Api\Serializer\QuerySerializer
 */
class QuerySerializerTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testSerializesEmptyLists()
    {
        $service = new Service(function () {
            return [
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
            ];
        }, 'service', 'region');

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
            new Command('foo', ['baz' => []])
        );
        $request = $q($trans);
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com', $request->getUrl());
        $this->assertEquals('Action=foo&Version=1&baz=', (string) $request->getBody());
    }
}
