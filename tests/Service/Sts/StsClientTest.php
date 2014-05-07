<?php
namespace Aws\Test\Sts;

use Aws\Result;
use Aws\Service\Sts\StsClient;

/**
 * @covers Aws\Service\Sts\StsClient
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

        $client = StsClient::factory();
        $credentials = $client->createCredentials($result);
        $this->assertInstanceOf(
            'Aws\Credentials\CredentialsInterface',
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
        $client = StsClient::factory();
        $client->createCredentials(new Result([]));
    }
}
