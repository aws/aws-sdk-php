<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\InstanceProfileProvider;
use Aws\Exception\CredentialsException;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Credentials\InstanceProfileProvider
 */
class InstanceProfileProviderTest extends TestCase
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
        $this->assertNull($c->getSecurityToken());
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
        $this->assertNull($c->getSecurityToken());
        $this->assertEquals($t, $c->getExpiration());
    }

    public function testDoesNotRequireConfig()
    {
        new InstanceProfileProvider();
    }

    public function testEnvDisableFlag()
    {
        $flag = getenv(InstanceProfileProvider::ENV_DISABLE);

        try {
            putenv(InstanceProfileProvider::ENV_DISABLE . '=true');
            $t = time() + 1000;
            $this->getTestCreds(
                $this->getCredentialArray('foo', 'baz', null, "@{$t}")
            )->wait();
            $this->fail('Did not throw expected CredentialException.');
        } catch (CredentialsException $e) {
            if (strstr($e->getMessage(), 'EC2 metadata server access disabled') === false) {
                $this->fail('Did not throw expected CredentialException when '
                    . 'provider is disabled.');
            }
        } finally {
            putenv(InstanceProfileProvider::ENV_DISABLE . '=' . $flag);
        }
    }
}
