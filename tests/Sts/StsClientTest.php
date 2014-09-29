<?php
namespace Aws\Test\Sts;

use Aws\Common\Result;
use Aws\Sts\StsClient;

/**
 * @covers Aws\Sts\StsClient
 * @covers Aws\Sts\StsFactory
 */
class StsClientTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreateCredentialsObjectFromStsResult()
    {
        $result = new Result([
            'Credentials' => [
                'AccessKeyId' => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken' => 'baz',
                'Expiration' => 30,
            ]
        ]);

        $client = StsClient::factory(['version' => 'latest']);
        $credentials = $client->createCredentials($result);
        $this->assertInstanceOf(
            'Aws\Common\Credentials\CredentialsInterface',
            $credentials
        );
        $this->assertEquals('foo', $credentials->getAccessKeyId());
        $this->assertEquals('bar', $credentials->getSecretKey());
        $this->assertEquals('baz', $credentials->getSecurityToken());
        $this->assertEquals(30, $credentials->getExpiration());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionWhenCreatingCredentialsFromInvalidInput()
    {
        $client = StsClient::factory(['version' => 'latest']);
        $client->createCredentials(new Result([]));
    }
}
