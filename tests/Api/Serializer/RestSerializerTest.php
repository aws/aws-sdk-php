<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Serializer\RestXmlSerializer;
use Aws\Api\Service;
use Aws\AwsCommand;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\PrepareEvent;

/**
 * @covers Aws\Api\Serializer\RestSerializer
 */
class RestSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage foo must be an array
     */
    public function testPreparesRequests()
    {
        $service = new Service([
            'metadata'=> [],
            'operations' => [
                'foo' => [
                    'http' => ['httpMethod' => 'POST'],
                    'input' => [
                        'type' => 'structure',
                        'members' => [
                            'foo' => [
                                'type' => 'map',
                                'location' => 'header',
                                'locationName' => 'foo',
                                'value' => ['type' => 'string']
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

        $j = new RestXmlSerializer($service, 'http://foo.com');
        $event = new PrepareEvent(
            new AwsCommand('foo', ['foo' => 'bam'], $service),
            $aws
        );
        $j->onPrepare($event);
    }
}
