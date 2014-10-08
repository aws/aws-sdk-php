<?php
namespace Aws\Test\Common\Credentials;
use Aws\Common\Credentials\InstanceProfileCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;

/**
 * @covers Aws\Common\Credentials\InstanceProfileCredentials
 */
class InstanceProfileCredentialsTest extends \PHPUnit_Framework_TestCase
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
        $client = new Client([
            'base_url' => 'http://169.254.169.254/latest/'
        ]);

        $responses = [];
        if (!$profile) {
            $responses[] = new Response(200, [], Stream::factory($profile));
        }
        $responses[] = new Response(200, [], Stream::factory(json_encode($result)));
        if ($more) {
            $responses[] = $more;
        }
        $client->getEmitter()->attach(new Mock($responses));

        $args = ['profile' => $profile];
        $args['client'] = $client;

        return new InstanceProfileCredentials($args);
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

    public function testRefreshesCredentials()
    {
        $t = time() - 1000;
        $t2 = time() + 1000;
        $c = $this->getTestCreds(
            $this->getCredentialArray('foo', 'baz', null, "@{$t}"),
            'foo',
            new Response(200, [], Stream::factory(json_encode(
                $this->getCredentialArray('abc', '123', null, '@' . $t2)
            )))
        );
        $this->assertEquals('abc', $c->getAccessKeyId());
        $this->assertEquals('123', $c->getSecretKey());
        $this->assertEquals($t2, $c->getExpiration());
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Error retrieving credentials from the instance
     */
    public function testThrowsExceptionIfCredentialsNotAvailable()
    {
        $client = new Client(['base_url' => 'http://169.254.169.254/latest/']);
        $client->getEmitter()->attach(
            new Mock([
                new RequestException('foo', new Request('GET', 'http://foo'))
            ])
        );
        $args['client'] = $client;
        new InstanceProfileCredentials($args);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Unexpected instance profile response
     */
    public function testThrowsExceptionOnInvalidMetadata()
    {
        $this->getTestCreds(
            $this->getCredentialArray(null, null, null, null, false),
            'foo'
        );
    }
}
