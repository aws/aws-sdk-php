<?php
namespace Aws\Test\Lambda;

use Aws\Lambda\LambdaClient;
use Aws\Result;
use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use GuzzleHttp\Promise;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class LambdaClientTest extends TestCase
{
    use ArraySubsetAsserts;

    function testsAddsDefaultCurlOptions()
    {
        if (!extension_loaded('curl')) {
            $this->markTestSkipped('Test skipped on no cURL extension');
        }

        $client = new LambdaClient([
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);

        $list = $client->getHandlerList();
        $list->setHandler(function ($command, $request) {
            $this->assertArraySubset(
                [
                    'curl' => [
                        CURLOPT_TCP_KEEPALIVE => 1,
                    ],
                ],
                $command['@http']
            );
            return Promise\Create::promiseFor(new Result([]));
        });

        $client->listFunctions();
    }
}