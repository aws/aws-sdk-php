<?php
namespace Aws\Test\Sts;

use Aws\Api\DateTimeResult;
use Aws\Endpoint\Partition;
use Aws\Endpoint\PartitionEndpointProvider;
use Aws\LruArrayCache;
use Aws\Result;
use Aws\Sts\RegionalEndpoints\Configuration;
use Aws\Sts\StsClient;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Sts\StsClient
 */
class StsClientTest extends TestCase
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

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Configuration parameter must either be 'legacy' or 'regional'.
     */
    public function testAddsStsRegionalEndpointsArgument()
    {
        new StsClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'sts_regional_endpoints' => 'trigger_exception'
        ]);
    }

    public function testAddsStsRegionalEndpointsCacheArgument()
    {
        // Create cache object
        $cache = new LruArrayCache();
        $cache->set('aws_sts_regional_endpoints_config', new Configuration('regional'));

        // Create client using cached endpoints config
        $client = new StsClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'sts_regional_endpoints' => $cache
        ]);

        // Get the expected Uri from the PartitionEndpointProvider
        $provider = PartitionEndpointProvider::defaultProvider([
            'sts_regional_endpoints' => 'regional'
        ]);
        $endpoint = $provider([
            'service' => 'sts',
            'region' => 'us-east-1',
        ]);
        $uri = new Uri($endpoint['endpoint']);

        $this->assertEquals($uri->getHost(), $client->getEndpoint()->getHost());
    }
}
