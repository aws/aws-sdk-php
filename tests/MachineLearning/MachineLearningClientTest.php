<?php
namespace Aws\Test\MachineLearning;

use Aws\Middleware;
use Aws\MachineLearning\MachineLearningClient;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\MachineLearning\MachineLearningClient
 */
class MachineLearningClientTest extends TestCase
{
    use UsesServiceTrait;

    public function testUpdatesPredictEndpoint()
    {
        // Setup state of command/request
        $predictEndpoint = new Uri('https://realtime.machinelearning.us-east-1.amazonaws.com/foo');
        $client = new MachineLearningClient([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);
        $this->addMockResults($client, [[]]);
        $client->getHandlerList()->appendSign(Middleware::tap(function ($c, $r) use (&$command, &$request) {
            $command = $c; $request = $r;
        }));
        $client->predict([
            'MLModelId' => 'foo',
            'Record' => ['foo' => 'bar'],
            'PredictEndpoint' => (string) $predictEndpoint
        ]);

        $this->assertEquals($predictEndpoint->getHost(), $request->getUri()->getHost());
    }
}
