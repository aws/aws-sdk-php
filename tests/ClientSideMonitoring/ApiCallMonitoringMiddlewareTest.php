<?php

namespace Aws\ClientSideMonitoring;

use Aws\Result;
use GuzzleHttp\Promise;
use Aws\HandlerList;
use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\Command;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers ApiCallMonitoringMiddleware
 * @covers AbstractMonitoringMiddleware
 */
class ApiCallMonitoringMiddlewareTest extends TestCase
{
    public function testPopulatesMonitoringData()
    {
        $list = new HandlerList();
        $list->setHandler(function ($command, $request) use (&$called) {
            $called = true;
            return Promise\promise_for(new Result([]));
        });

        $provider = ApiProvider::defaultProvider();
        $data = $provider('api', 'ec2', 'latest');
        $service = new Service($data, $provider);
        $list->appendBuild(ApiCallMonitoringMiddleware::wrap(
            [
                'enabled' => true,
                'port' => 31000
            ],
            'us-east-1',
            'ec2'
        ));
        $handler = $list->resolve();

        $response = $handler(new Command('RunScheduledInstances', [
            'LaunchSpecification' => [
                'ImageId' => 'test-image',
            ],
            'ScheduledInstanceId' => 'test-instance-id',
            'InstanceCount' => 1,
        ]), new Request('POST', 'http://foo.com'))->wait();
        $this->assertTrue($called);
        $this->assertEquals(
            'RunScheduledInstances',
            $response['@monitoringEvents'][0]['Api']
        );
    }
}
