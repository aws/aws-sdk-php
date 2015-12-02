<?php
namespace Aws\Test\CognitoSync;

use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

class CognitoSyncClientTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testRequestSucceedsWithColon()
    {
        $identityId = 'aaa:bbb';
        $identityPoolId = 'ccc:ddd';
        $client = $this->getTestClient('CognitoSync', [
            'http_handler' => function (RequestInterface $request) use (
                $identityId,
                $identityPoolId
            ) {
                foreach ([$identityId, $identityPoolId] as $unencodedString) {
                    $this->assertContains(
                        urlencode($unencodedString),
                        (string) $request->getUri()
                    );
                }

                return new FulfilledPromise(new Response);
            },
        ]);

        $client->describeIdentityUsage([
            'IdentityId'     => $identityId,
            'IdentityPoolId' => $identityPoolId,
        ]);
    }
}
