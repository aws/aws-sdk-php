<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\InstanceProfileProvider;
use Aws\Exception\CredentialsException;
use Aws\Sdk;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers Aws\Credentials\InstanceProfileProvider
 */
class InstanceProfileProviderTest extends TestCase
{
    private function getCredentialArray(
        $key,
        $secret,
        $token = null,
        $time = null,
        $success = true
    ) {
        return [
            'Code'            => $success ? 'Success' : 'Failed',
            'AccessKeyId'     => $key,
            'SecretAccessKey' => $secret,
            'Token'           => $token,
            'Expiration'      => $time
        ];
    }

    private function getTestCreds($result, $profile = null, Response $more = null, array $args = [])
    {
        $responses = [];
        if (!$profile) {
            $responses[] = new Response(200, [], Psr7\stream_for('test'));
        }

        $responses[] = new Response(200, [], Psr7\stream_for($result));
        if ($more) {
            $responses[] = $more;
        }

        $client = function () use (&$responses) {
            if (empty($responses)) {
                throw new \Exception('No responses');
            }
            return Promise\promise_for(array_shift($responses));
        };

        $args['profile'] = $profile;
        $args['client'] = $client;
        $provider = new InstanceProfileProvider($args);

        return $provider();
    }

    private function getRequestException()
    {
        $version = (string) ClientInterface::VERSION;

        if ($version[0] === '6') {
            return new RequestException(
                'test',
                new Request('GET', 'http://www.example.com')
            );
        } elseif ($version[0] === '5') {
            return new RequestException(
                'test',
                new GuzzleRequest('GET', 'http://www.example.com')
            );
        }
    }

    public function testAddsUserAgentToRequest()
    {
        $response = new Response(200, [], Psr7\stream_for('test'));

        $client = function (RequestInterface $request) use ($response) {
            $this->assertEquals(
                'aws-sdk-php/' . Sdk::VERSION . ' ' . \Aws\default_user_agent(),
                $request->getHeader('User-Agent')[0]
            );

            return Promise\promise_for($response);
        };

        $provider = new InstanceProfileProvider(['client' => $client]);
        return $provider();
    }

    public function testSeedsInitialCredentials()
    {
        $t = time() + 1000;
        $c = $this->getTestCreds(
            json_encode($this->getCredentialArray('foo', 'baz', null, "@{$t}")),
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
            json_encode($this->getCredentialArray(null, null, null, null, false)),
            'foo'
        )->wait();
    }

    public function testLoadsCredentialsAndProfile()
    {
        $t = time() + 1000;
        $c = $this->getTestCreds(
            json_encode($this->getCredentialArray('foo', 'baz', null, "@{$t}"))
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
                json_encode($this->getCredentialArray('foo', 'baz', null, "@{$t}"))
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

    public function testRetryInvalidJson()
    {
        $t = time() + 1000;
        $result = json_encode($this->getCredentialArray('foo', 'baz', null, "@{$t}"));
        $c = $this->getTestCreds(
            '{\n "Code":"Success"}', //invalid json
            'foo',
            new Response(200, [], Psr7\stream_for($result))
        )->wait();
        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('baz', $c->getSecretKey());
        $this->assertNull($c->getSecurityToken());
        $this->assertEquals($t, $c->getExpiration());
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Invalid JSON Response
     */
    public function testThrowsExceptionOnInvalidJsonRetryExhaustion()
    {
        $c = $this->getTestCreds(
            '{\n "Code":"Success"}', //invalid json
            'foo',
            null,
            ['retries' => 0]
        )->wait();
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Networking error
     */
    public function testThrowsExceptionOnNetorkRetryExhaustion()
    {
        $error = $this->getRequestException();
        $client = function () use ($error) {
            return Promise\rejection_for([
                'exception' => $error
            ]);
        };

        $args = [
            'profile' => 'foo',
            'client' => $client,
            'retries' => 0
        ];
        $provider = new InstanceProfileProvider($args);
        $c = $provider()->wait();
    }

    public function testNetworkingErrorsAreRetried()
    {
        $retries = 1;

        $t = time() + 1000;
        $result = json_encode($this->getCredentialArray('foo', 'baz', null, "@{$t}"));
        $responses = [new Response(200, [], Psr7\stream_for($result))];

        $error = $this->getRequestException();

        $client = function () use (&$retries, $responses, $error) {
            if (0 === $retries--) {
                return Promise\promise_for(array_shift($responses));
            }

            return Promise\rejection_for([
                'exception' => $error
            ]);
        };

        $args = [
            'profile' => 'foo',
            'client' => $client
        ];
        $provider = new InstanceProfileProvider($args);
        $c = $provider()->wait();
        $this->assertEquals('foo', $c->getAccessKeyId());
        $this->assertEquals('baz', $c->getSecretKey());
        $this->assertNull($c->getSecurityToken());
        $this->assertEquals($t, $c->getExpiration());
    }
}
