<?php

use Aws\Command;
use Aws\CommandInterface;
use Aws\HandlerList;
use Aws\MetricsBuilder;
use Aws\Middleware;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class MetricsBuilderTest extends TestCase
{
    public function testAppendMetrics()
    {
        $metricsBuilder = new MetricsBuilder();
        $expectedMetrics = [];
        // A - Z
        for ($char = 65; $char < 91; $char++) {
            $metricsBuilder->append(chr($char));
            $expectedMetrics[] = chr($char);
        }

        $this->assertEquals(
            implode(',', $expectedMetrics),
            $metricsBuilder->build()
        );
    }

    public function testEncodeMetrics()
    {
        $metricsBuilder = new MetricsBuilder();
        $expectedMetrics = "A,B,C"; // encoding format
        $metricsBuilder->append("A");
        $metricsBuilder->append("B");
        $metricsBuilder->append("C");

        $this->assertEquals(
            $expectedMetrics,
            $metricsBuilder->build()
        );
    }

    public function testConstraintsAppendToMetricsSize()
    {
        try {
            set_error_handler(
                static function ( $errno, $errstr ) {
                   // Mute warning
                },
                E_ALL
            );
            $metricsBuilder = new MetricsBuilder();
            $firstMetric = str_repeat("*", 1024);
            $metricsBuilder->append($firstMetric);
            $metricsBuilder->append("A");
            $metricsBuilder->append("B");

            $this->assertEquals($firstMetric, $metricsBuilder->build());
        } finally {
            restore_error_handler();
        }
    }

    public function testGetMetricsBuilderFromCommand()
    {
        $command = new Command('TestCommand', [], new HandlerList());
        $metricsBuilder = MetricsBuilder::fromCommand($command);
        $this->assertInstanceOf( MetricsBuilder::class, $metricsBuilder);
    }

    public function testAppendMetricsCaptureMiddleware()
    {
        $handlerList = new HandlerList(function (){});
        $metric = "Foo";
        // It should be appended into the build step
        MetricsBuilder::appendMetricsCaptureMiddleware(
            $handlerList,
            "$metric"
        );
        // The sign step is ahead of the build step
        // which means we should catch the metric appended
        // previously.
        $handlerList->appendSign(Middleware::tap(
            function (
                CommandInterface $command
            ) use ($metric) {
                $metricsBuilder = MetricsBuilder::fromCommand($command);

                $this->assertEquals(
                    $metric,
                    $metricsBuilder->build()
                );
            }
        ));
        $handlerFn = $handlerList->resolve();
        $command = new Command('Buzz', []);
        $handlerFn($command);
    }
}
