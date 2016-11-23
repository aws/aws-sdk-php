<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\EcsCredentialProvider;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;

/**
 * @covers Aws\Credentials\EcsCredentialProvider
 */
class EcsCredentialProviderTest extends \PHPUnit_Framework_TestCase
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
        $this->assertEquals(null, $c->getSecurityToken());
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
}
