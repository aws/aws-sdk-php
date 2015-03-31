<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\InstanceProfileProvider;
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

        $client = function (RequestInterface $req, array $options) use (&$responses) {
            return \GuzzleHttp\Promise\promise_for(array_shift($responses));
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
        );
        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('baz', $c->getSecretKey());
        $this->assertEquals(null, $c->getSecurityToken());
        $this->assertEquals($t, $c->getExpiration());
    }

    public function testReturnsNullIfProfileIsNotAvailable()
    {
        $client = function (RequestInterface $req, array $options) use (&$responses) {
            return \GuzzleHttp\Promise\rejection_for('error');
        };
        $p = new InstanceProfileProvider(['client' => $client]);
        $this->assertNull($p());
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Error retrieving credentials from the instance
     */
    public function testThrowsExceptionIfCredentialsNotAvailable()
    {
        $client = function (RequestInterface $req, array $options) use (&$responses) {
            return \GuzzleHttp\Promise\rejection_for('error');
        };
        $args['client'] = $client;
        $args['profile'] = 'foo';
        $p = new InstanceProfileProvider([
            'client'  => $client,
            'profile' => 'foo'
        ]);
        $p();
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
        );
    }

    public function testLoadsCredentialsAndProfile()
    {
        $t = time() + 1000;
        $c = $this->getTestCreds(
            $this->getCredentialArray('foo', 'baz', null, "@{$t}")
        );
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
