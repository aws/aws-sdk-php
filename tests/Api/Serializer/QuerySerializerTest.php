<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Serializer\QuerySerializer;
use Aws\Api\Service;
use Aws\Command;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\Api\Serializer\QuerySerializer
 */
class QuerySerializerTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testSerializesEmptyLists()
    {
        $service = new Service(
            [
                'metadata'=> [
                    'protocol'   => 'query',
                    'apiVersion' => '1'
                ],
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
            ],
            function () {}
        );

        $q = new QuerySerializer($service, 'http://foo.com');
        $cmd = new Command('foo', ['baz' => []]);
        $request = $q($cmd);
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com', (string) $request->getUri());
        $this->assertEquals('Action=foo&Version=1&baz=', (string) $request->getBody());
    }

    public function testUsesLocationNameToIdentifyMembersOfFlattenedLists()
    {
        $service = new Service(
            [
                'metadata'=> [
                    'protocol'   => 'query',
                    'apiVersion' => '1'
                ],
                'operations' => [
                    'foo' => [
                        'http' => ['httpMethod' => 'POST'],
                        'input' => [
                            'type' => 'structure',
                            'members' => [
                                'bars' => [
                                    'type' => 'list',
                                    'member' => [
                                        'type' => 'string',
                                        'locationName' => 'bar',
                                    ],
                                    'flattened' => true,
                                ],
                            ]
                        ]
                    ]
                ]
            ],
            function () {}
        );

        $q = new QuerySerializer($service, 'http://foo.com');
        $cmd = new Command('foo', ['bars' => ['a', 'list', 'of', 'strings']]);
        $request = $q($cmd);
        $this->assertEquals('POST', $request->getMethod());
        $this->assertEquals('http://foo.com', (string) $request->getUri());
        $this->assertEquals(
            'Action=foo&Version=1&bar.1=a&bar.2=list&bar.3=of&bar.4=strings',
            (string) $request->getBody()
        );
    }
}
