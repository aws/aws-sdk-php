<?php
namespace Aws\Test;

use Aws\IdempotencyTokenMiddleware;
use Aws\Result;
use GuzzleHttp\Promise;
use Aws\HandlerList;
use Aws\Api\ApiProvider;
use Aws\Api\Service;
use Aws\Command;
use GuzzleHttp\Psr7\Request;

/**
 * @covers Aws\IdempotencyTokenMiddleware
 */
class IdempotencyTokenMiddlewareTest extends \PHPUnit_Framework_TestCase
{
    public function testAutoFillsMemberWithIdempotencyTrait()
    {
        $list = new HandlerList();
        $list->setHandler(function ($command, $request) use (&$called) {
            $called = true;
            $this->assertNotNull($command['ClientToken']);
            $regex = '/([a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12})/';
            $this->assertRegExp($regex, $command['ClientToken']);
            return \GuzzleHttp\Promise\promise_for(new Result([]));
        });

        $provider = ApiProvider::defaultProvider();
        $data = $provider('api', 'ec2', 'latest');
        $service = new Service($data, $provider);
        $list->appendInit(IdempotencyTokenMiddleware::wrap($service));
        $handler = $list->resolve();

        $handler(new Command('RunScheduledInstances', [
            'LaunchSpecification' => [
                'ImageId' => 'test-image',
            ],
            'ScheduledInstanceId' => 'test-instance-id',
            'InstanceCount' => 1,
        ]), new Request('POST', 'http://foo.com'))->wait();
        $this->assertTrue($called);
    }
}
