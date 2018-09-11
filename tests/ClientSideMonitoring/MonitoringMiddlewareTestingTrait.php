<?php

namespace Aws\Test\ClientSideMonitoring;

use Aws\HandlerList;
use Aws\MonitoringEventsInterface;
use Aws\Result;
use GuzzleHttp\Promise;

trait MonitoringMiddlewareTestingTrait
{
    /**
     * @dataProvider getMonitoringDataTests
     */
    public function testPopulatesMonitoringData(
        $middleware,
        $command,
        $request,
        $result,
        $expected
    ) {
        if (!extension_loaded('sockets') || !function_exists('socket_create')) {
            $this->markTestSkipped('Test skipped on no sockets extension');
        }

        $this->resetMiddlewareSocket();
        $called = false;
        $isResultException = $result instanceof \Exception
            || $result instanceof \Throwable;

        $list = new HandlerList();
        $list->setHandler(function ($command, $request) use (
            $result,
            $isResultException,
            &$called
        ) {
            $called = true;
            if ($isResultException) {
                return Promise\rejection_for($result);
            }
            return Promise\promise_for(new Result($result));
        });
        $list->appendBuild($middleware);
        $handler = $list->resolve();

        try {
            /** @var MonitoringEventsInterface $response */
            $response = $handler(
                $command,
                $request
            )->wait();

            if ($isResultException) {
                $this->fail('Should have received a rejection.');
            }

            $eventData = $response->getMonitoringEvents()[0];
        } catch (\Exception $e) {
            if (!$isResultException) {
                $this->fail('Should not have received a rejection.');
            } else if (!($e instanceof MonitoringEventsInterface)) {
                $this->fail('Unable to validate the specified behavior');
            }
            $monitoringEvents = $e->getMonitoringEvents();
            $eventData = end($monitoringEvents);
        }

        $this->assertTrue($called);
        $this->assertArraySubset($expected, $eventData);
        $this->assertInternalType('int', $eventData['Timestamp']);
    }
}