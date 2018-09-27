<?php
namespace Aws\Test\Lambda;

use Aws\Lambda\LambdaClient;
use Aws\Result;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;

class LambdaClientTest extends TestCase
{
    function testsAddsDefaultCurlOptions()
    {
        $client = new LambdaClient([
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);

        $list = $client->getHandlerList();
        $list->setHandler(function ($command, $request) {
            $this->assertArraySubset(
                [
                    'curl' => LambdaClient::$defaultCurlOptions,

                ],
                $command['@http']
            );
            return Promise\promise_for(new Result([]));
        });

        $client->listFunctions();
    }
}