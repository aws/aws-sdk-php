<?php

namespace Aws\ClientSideMonitoring;

use PHPUnit\Framework\TestCase;

/**
 * @covers ApiCallAttemptMonitoringMiddleware
 * @covers AbstractMonitoringMiddleware
 */
class ApiCallAttemptMonitoringMiddlewareTest extends TestCase
{
    /**
     * Used to get non-public methods for testing
     *
     * @param $name
     * @return \ReflectionMethod
     * @throws \ReflectionException
     */
    protected static function getMethod($name)
    {
        $class = new \ReflectionClass('Aws\ClientSideMonitoring\ApiCallAttemptMonitoringMiddleware');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    public function testSerializesData()
    {
        $serializeEventData = self::getMethod('serializeEventData');
        $middleware = new ApiCallAttemptMonitoringMiddleware(function(){}, [], 'test', 'test');
        $eventData = [
            'AwsException' => 'aaaaaaaaabbbbbbbbbbccccccccccaaaaaaaaabbbbbbbbbbccccccccccaaaaaaaaabbbbbbbbbbccccccccccaaaaaaaaabbbbbbbbbbccccccccccaaaaaaaaabbbbbbbbbbcccccccccc',
            'AttemptLatency' => 314.15,
            'Fqdn' => 's3-eu-west-1.amazonaws.com',
            'HttpStatusCode' => 200,
            'UserAgent' => 'Test User Agent With Spaces'
        ];
        $expected = '{"AwsException":"aaaaaaaaabbbbbbbbbbccccccccccaaaaaaaaabbbbbbbbbbccccccccccaaaaaaaaabbbbbbbbbbccccccccccaaaaaaaaabbbbbbbbbbccccccccccaaaaaaaaabbb","AttemptLatency":314.15,"Fqdn":"s3-eu-west-1.amazonaws.com","HttpStatusCode":200,"UserAgent":"Test User Agent With Spaces"}';

        $this->assertSame($expected,
            $serializeEventData->invokeArgs($middleware, array($eventData)));
    }
}
