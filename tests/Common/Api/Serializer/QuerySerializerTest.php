<?php
namespace Aws\Test\Common\Api\Serializer;

use Aws\Common\Api\Serializer\QuerySerializer;
use Aws\AwsCommand;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandTransaction;

/**
 * @covers Aws\Common\Api\Serializer\QuerySerializer
 */
class QuerySerializerTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testSerializesEmptyLists()
    {
        $service = $this->createServiceApi([
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
            new AwsCommand('foo', $service, ['baz' => []])
        );
        $request = $q($trans);
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com', $request->getUrl());
        $this->assertEquals('Action=foo&Version=1&baz=', (string) $request->getBody());
    }
}
