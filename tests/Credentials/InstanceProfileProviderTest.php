<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\InstanceProfileProvider;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

/**
 * @covers Aws\Credentials\InstanceProfileProvider
 */
class InstanceProfileProviderTest extends \PHPUnit_Framework_TestCase
{
    private function getCredentialArray(
        $key, $secret, $token = null, $time = null, $success = true
    ) {
        return [
            'Code'            => $success ? 'Success' : 'Failed',
            'AccessKeyId'     => $key,
            'SecretAccessKey' => $secret,
            'Token'           => $token,
            'Expiration'      => $time
        ];
    }

    private function getTestCreds($result, $profile = null, Response $more = null)
    {
        $responses = [];
        if (!$profile) {
            $responses[] = new Response(200, [], Psr7\stream_for('test'));
        }

        $responses[] = new Response(200, [], Psr7\stream_for(json_encode($result)));
        if ($more) {
            $responses[] = $more;
        }

        $client = function () use (&$responses) {
            if (empty($responses)) {
                throw new \Exception('No responses');
            }
            return Promise\promise_for(array_shift($responses));
        };

        $args = ['profile' => $profile];
        $args['client'] = $client;
        $provider = new InstanceProfileProvider($args);

        return $provider();
    }

    public function testSeedsInitialCredentials()
    {
        $t = time() + 1000;
        $c = $this->getTestCreds(
            $this->getCredentialArray('foo', 'baz', null, "@{$t}"),
            'foo'
        )->wait();
        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('baz', $c->getSecretKey());
        $this->assertEquals(null, $c->getSecurityToken());
        $this->assertEquals($t, $c->getExpiration());
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Error retrieving credentials from the instance profile metadata server
     */
    public function testRejectsIfProfileIsNotAvailable()
    {
        $client = function () use (&$responses) {
            return Promise\rejection_for([
                'exception' => new \Exception('error')
            ]);
        };
        $p = new InstanceProfileProvider(['client' => $client]);
        $p()->wait();
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Error retrieving credentials from the instance
     */
    public function testThrowsExceptionIfCredentialsNotAvailable()
    {
        $client = function () use (&$responses) {
            return Promise\rejection_for([
                'exception' => new \Exception('error')
            ]);
        };
        $args['client'] = $client;
        $args['profile'] = 'foo';
        $p = new InstanceProfileProvider([
            'client'  => $client,
            'profile' => 'foo'
        ]);
        $p()->wait();
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Unexpected instance profile response
     */
    public function testThrowsExceptionOnInvalidMetadata()
    {
        $this->getTestCreds(
            $this->getCredentialArray(null, null, null, null, false),
            'foo'
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
        new InstanceProfileProvider();
    }
}
