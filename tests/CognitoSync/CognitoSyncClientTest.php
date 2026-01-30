<?php
namespace Aws\Test\CognitoSync;

use Aws\CognitoSync\CognitoSyncClient;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Attributes\CoversClass;
use Psr\Http\Message\RequestInterface;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(CognitoSyncClient::class)]
class CognitoSyncClientTest extends TestCase
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
                    $this->assertStringContainsString(
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
