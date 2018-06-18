<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\EcsCredentialProvider;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Ring\Future\CompletedFutureArray;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Credentials\EcsCredentialProvider
 */
class EcsCredentialProviderTest extends TestCase
{
    private $uripath;

    private function clearEnv()
    {
        putenv(EcsCredentialProvider::ENV_URI . '=');
    }

    public function setUp()
    {
        $this->uripath = getenv(EcsCredentialProvider::ENV_URI);
    }

    public function tearDown()
    {
        $this->uripath = getenv(EcsCredentialProvider::ENV_URI);
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Error retrieving credential from ECS
     */
    public function testRejectsIfUriPathIsNotAvailable()
    {
        $client = function () use (&$responses) {
            return Promise\rejection_for([
                'exception' => new \Exception('error')
            ]);
        };
        $p = new EcsCredentialProvider(['client' => $client]);
        $p()->wait();
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Unexpected ECS credential value
     */
    public function testThrowsExceptionOnInvalidEcsCredential()
    {
        $this->getTestCreds(
            $this->getCredentialArray(null, null, null, null, false)
        )->wait();
    }

    public function testLoadsCredentialsAndProfile()
    {
        $t = time() + 1000;
        $c = $this->getTestCreds(
            $this->getCredentialArray('foo', 'baz', null, "@{$t}")
        )->wait();
        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('baz', $c->getSecretKey());
        $this->assertNull($c->getSecurityToken());
        $this->assertEquals($t, $c->getExpiration());
    }

    public function testDoesNotRequireConfig()
    {
        new EcsCredentialProvider();
    }

    private function getCredentialArray(
        $key, $secret, $token = null, $time = null, $success = true
    ){
        return [
            'Code'            => $success ? 'Success' : 'Failed',
            'AccessKeyId'     => $key,
            'SecretAccessKey' => $secret,
            'Token'           => $token,
            'Expiration'      => $time
        ];
    }

    private function getTestCreds($result, Response $more = null)
    {
        $responses = [];
        $responses[] = new Response(200, [], Psr7\stream_for(json_encode($result)));
        if ($more) {
            $responses[] = $more;
        }
        $this->clearEnv();
        putenv(EcsCredentialProvider::ENV_URI
            . '=/latest/credentials?id=7e9114eb-6b2f-426e-908a-7f0a318e1786');
        $client = function () use (&$responses) {
            if (empty($responses)) {
                throw new \Exception('No responses');
            }
            return Promise\promise_for(array_shift($responses));
        };
        $args['client'] = $client;

        $provider = new EcsCredentialProvider($args);
        return $provider();
    }

    private function getProxyCheckGuzzleClient()
    {
        $t = (time() + 1000);
        $credentials = $this->getCredentialArray('foo', 'baz', null, "@{$t}");
        $version = (string) ClientInterface::VERSION;

        if ($version[0] === '5') {
            return new \Aws\Handler\GuzzleV5\GuzzleHandler(
                new Client([
                    'handler' => function (
                        array $request
                    ) use ($credentials) {
                        $this->assertEquals('', $request['client']['proxy']);
                        return new CompletedFutureArray([
                            'status'  => 200,
                            'headers' => [],
                            'body'    => Psr7\stream_for(
                                json_encode($credentials)
                            ),
                        ]);
                    }
                ])
            );
        }

        if ($version[0] === '6') {
            return new \Aws\Handler\GuzzleV6\GuzzleHandler(
                new Client([
                    'handler' => function (
                        Psr7\Request $request,
                        array $options
                    ) use ($credentials) {
                        $this->assertEquals('', $options['proxy']);
                        return Promise\promise_for(
                            new Response(
                                200,
                                [],
                                Psr7\stream_for(json_encode($credentials))
                            )
                        );
                    }
                ])
            );
        }

        throw new \RuntimeException('Unknown Guzzle version: ' . $version);
    }

    public function testNoProxying()
    {
        $http = getenv('HTTP_PROXY');
        $https = getenv('HTTPS_PROXY');
        $no = getenv('NO_PROXY');

        putenv('HTTP_PROXY=127.0.0.1');
        putenv('HTTPS_PROXY=127.0.0.2');
        putenv('NO_PROXY=127.0.0.3, 127.0.0.4');

        $guzzle = $this->getProxyCheckGuzzleClient();
        $args['client'] = $guzzle;

        $provider = new EcsCredentialProvider($args);
        $provider()->otherwise(function(\Exception $e) {
            $this->fail('Did not override ECS request proxy settings.');
        })->wait();

        putenv("HTTP_PROXY=$http");
        putenv("HTTPS_PROXY=$https");
        putenv("NO_PROXY=$no");
    }
}
