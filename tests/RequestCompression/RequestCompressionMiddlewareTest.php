<?php
namespace Aws\Test\RequestCompression;

use Aws\Api\Service;
use Aws\AwsClient;
use Aws\Middleware;
use Aws\RequestCompressionMiddleware;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class RequestCompressionMiddlewareTest extends TestCase
{
    public function testCompressesRequestByDefault()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $metricData = self::getMockMetricData(40);

        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function($cmd, $req) {
            $body = $req->getBody()->getContents();
            $this->assertNotFalse(gzdecode($body));
            $this->assertEquals(
                'gzip',
                $req->getHeaderLine('content-encoding')
            );
        }));

        $client->putMetricData([
            'MetricData' => $metricData,
            'Namespace' => 'foo'
        ]);
    }

    public function testDoesNotCompressRequestWhenConfigured()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient(
            $service,
            ['disable_request_compression' => true]
        );
        $metricData = self::getMockMetricData(40);

        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function($cmd, $req) {
            $body = $req->getBody()->getContents();
            $this->assertEmpty($req->getHeader('content-encoding'));
            $this->expectWarning();
            gzdecode($body);
        }));

        $client->putMetricData([
            'MetricData' => $metricData,
            'Namespace' => 'foo'
        ]);
    }

    public function specificSizeProvider()
    {
        return [
            [60, 0, 65],
            [128, 1, 320],
            [256, 1, 320],
            [500, 2, 587]
        ];
    }

    /**
     * @dataProvider specificSizeProvider
     *
     * @param $minSize
     * @param $numMetricData
     * @param $expectedBodySize
     */
    public function testCompressesRequestAtSpecificSize($minSize, $numMetricData, $expectedBodySize)
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient(
            $service, ['request_min_compression_size_bytes' => $minSize]
        );
        $metricData = $numMetricData ? self::getMockMetricData($numMetricData)
            : [];

        $list = $client->getHandlerList();
        $list->before(
            'request-compression',
            'getBodySize',
            Middleware::tap(function($cmd, $req) use ($minSize, $expectedBodySize) {
                $bodySize = $req->getBody()->getSize();
                $this->assertEquals($expectedBodySize, $bodySize);
                $this->assertGreaterThanOrEqual($minSize, $bodySize);
            })
        );

        $list->appendSign(Middleware::tap(function($cmd, $req) {
            $body = $req->getBody()->getContents();
            $this->assertNotFalse(gzdecode($body));
            $this->assertEquals(
                'gzip',
                $req->getHeaderLine('content-encoding')
            );
        }));

        $client->putMetricData([
            'MetricData' => $metricData,
            'Namespace' => 'foo'
        ]);
    }

    public function testCompressesRequestWhenStreamingAndNoMinLength()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $metricData = self::getMockMetricData(1);

        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function($cmd, $req) {
            $body = $req->getBody()->getContents();
            $this->assertNotFalse(gzdecode($body));
            $this->assertEquals(
                'gzip',
                $req->getHeaderLine('content-encoding')
            );
        }));

        $client->PutMetricDataWithStreamingAndNoRequiresLength([
            'MetricData' => $metricData,
            'Namespace' => 'foo'
        ]);
    }

    public function testCommandLevelDisableRequestCompressionOverrides()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $metricData = self::getMockMetricData(40);

        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function($cmd, $req) {
            $body = $req->getBody()->getContents();
            $this->assertEmpty($req->getHeader('content-encoding'));
            $this->expectWarning();
            gzdecode($body);
        }));

        $client->putMetricData([
            'MetricData' => $metricData,
            'Namespace' => 'foo',
            '@disable_request_compression' => true
        ]);
    }

    public function testCommandLevelMinRequestSizeOverrides()
    {
        $service = $this->generateTestService();
        $client = $this->generateTestClient($service);
        $metricData = self::getMockMetricData(40);

        $list = $client->getHandlerList();
        $list->appendSign(Middleware::tap(function($cmd, $req) {
            $body = $req->getBody()->getContents();
            $this->assertEmpty($req->getHeader('content-encoding'));
            $this->expectWarning();
            gzdecode($body);
        }));

        $client->putMetricData([
            'MetricData' => $metricData,
            'Namespace' => 'foo',
            '@request_min_compression_size_bytes' => 10485760
        ]);
    }

    public function invalidDisableCompressionType()
    {
        return [
            ['foo'],
            [1],
        ];
    }

    /**
     * @dataProvider invalidDisableCompressionType
     *
     * @param $invalidType
     */
    public function testThrowsExceptionWhenDisableMinCompressionNotBool($invalidType)
    {
        $this->expectException(\InvalidArgumentException::class);

        $service = $this->generateTestService();
        $client = $this->generateTestClient($service, ['disable_request_compression' => $invalidType]);
    }

    public function invalidMinRequestSizeProvider()
    {
        return [
            [-1],
            [99999999],
            ['not a request size']
        ];
    }

    /**
     * @dataProvider invalidMinRequestSizeProvider
     *
     * @param $minRequestSize
     */
    public function testThrowsExceptionWhenInvalidMinCompressionSizeOnClient($minRequestSize)
    {
        if (is_int($minRequestSize)) {
            $this->expectException(\InvalidArgumentException::class);
            $this->expectExceptionMessageMatches(
                "/value must be an integer between 0 and 10485760, inclusive./"
            );
        } else {
            $this->expectException(\InvalidArgumentException::class);
        }


        $service = $this->generateTestService();
        $client = $this->generateTestClient(
            $service,
            ['request_min_compression_size_bytes' => $minRequestSize]
        );
    }

    /**
     * @dataProvider invalidMinRequestSizeProvider
     *
     * @param $minRequestSize
     */
    public function testThrowsExceptionWhenInvalidMinCompressionSize($minRequestSize)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The minimum request compression size must be a non-negative integer value between 0 and 10485760 bytes, inclusive.'
        );
        $nextHandler = function () {return 'foo';};
        $middleware = new RequestCompressionMiddleware(
            $nextHandler,
            ['request_min_compression_size_bytes' => $minRequestSize]
        );
    }

    /**
     * Creates a service for the test
     *
     * @param Service $service
     * @param $content
     *
     * @return AwsClient
     */
    private function generateTestClient(Service $service, $args = [])
    {
        return new AwsClient(
            array_merge(
                [
                    'service' => 'foo',
                    'api_provider' => function () use ($service) {
                        return $service->toArray();
                    },
                    'region' => 'us-east-1',
                    'version' => 'latest',
                    'credentials' => false,
                    'http_handler' => function () {
                        return new FulfilledPromise(new Response(200, [], self::generateXml()));
                    }
                ],
                $args
            )
        );
    }

    private function generateTestService()
    {
        $cloudwatchCompressionModel = require(__DIR__ . '/fixtures/api-2.json.php');
        return new Service(
            $cloudwatchCompressionModel,
            function () { return []; }
        );
    }

    private static function generateXml()
    {
        return <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<ParseXmlResponse xmlns="http://exmaple.com/">
    <Name>test-xmlParse</Name>
    <Prefix/>
    <Marker/>
    <Timestamp>time()</Timestamp>
</ParseXmlResponse>
XML;
    }

    private static function getMockMetricData($numElements)
    {
        //40 brings the request body size above the default minimum
        // compression threshold of 10240. 10919 to be exact.
            return array_fill(
                0,
                $numElements,
                [
                    'MetricName' => 'MyMetric',
                    'Timestamp' => time(),
                    'Dimensions' => [
                        [
                            'Name' => 'MyDimension1',
                            'Value' => 'MyValue1'

                        ],
                    ],
                    'Unit' => 'Count',
                    'Value' => 1
                ]
            );
        }
}


