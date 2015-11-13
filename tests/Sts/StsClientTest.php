<?php
namespace Aws\Test\Sts;

use Aws\Api\DateTimeResult;
use Aws\Result;
use Aws\Sts\StsClient;

/**
 * @covers Aws\Sts\StsClient
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
                'Expiration' => DateTimeResult::fromEpoch(time() + 10),
            ]
        ]);

        $client = new StsClient(['region' => 'us-east-1', 'version' => 'latest']);
        $credentials = $client->createCredentials($result);
        $this->assertInstanceOf(
            'Aws\Credentials\CredentialsInterface',
            $credentials
        );
        $this->assertEquals('foo', $credentials->getAccessKeyId());
        $this->assertEquals('bar', $credentials->getSecretKey());
        $this->assertEquals('baz', $credentials->getSecurityToken());
        $this->assertInternalType('int', $credentials->getExpiration());
        $this->assertFalse($credentials->isExpired());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Result contains no credentials
     */
    public function testThrowsExceptionWhenCreatingCredentialsFromInvalidInput()
    {
        $client = new StsClient(['region' => 'us-east-1', 'version' => 'latest']);
        $client->createCredentials(new Result());
    }
}
