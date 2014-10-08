<?php
namespace Aws\Test\Common\Api\Provider;

use Aws\Common\Api\Provider\CachingApiProvider;
use Aws\Common\Api\Provider\FilesystemApiProvider;

/**
 * @covers Aws\Common\Api\Provider\CachingApiProvider
 */
class CachingApiProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testProxiesNonCachedResults()
    {
        $p = new FilesystemApiProvider(__DIR__ . '/api_provider_fixtures');
        $c = new CachingApiProvider($p);
        $this->assertEquals($p->getServiceNames(), $c->getServiceNames());
        $this->assertEquals(
            $p->getServiceVersions('ec2'),
            $c->getServiceVersions('ec2')
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresCacheDirectoryIsValide()
    {
        $p = new FilesystemApiProvider(__DIR__ . '/api_provider_fixtures');
        new CachingApiProvider($p, false);
    }

    public function testEnsuresFilesAreCached()
    {
        $d = sys_get_temp_dir() . '/test-api';
        $p = new FilesystemApiProvider(__DIR__ . '/api_provider_fixtures');
        $c = new CachingApiProvider($p, $d);
        $this->assertTrue(is_dir($d));

        $this->assertInternalType(
            'array',
            $c->getService('dynamodb', 'latest')
        );
        $this->assertTrue(file_exists($d . '/getservice_dynamodb_latest.php'));

        // Get from cache
        $this->assertInternalType(
            'array',
            $c->getService('dynamodb', 'latest')
        );

        $this->assertInternalType(
            'array',
            $c->getServicePaginatorConfig('dynamodb', 'latest')
        );
        $this->assertTrue(
            file_exists($d . '/getservicepaginatorconfig_dynamodb_latest.php')
        );

        $this->assertInternalType(
            'array',
            $c->getServiceWaiterConfig('dynamodb', 'latest')
        );
        $this->assertTrue(
            file_exists($d . '/getservicewaiterconfig_dynamodb_latest.php')
        );

        $c->clearCache();
        $this->assertFalse(file_exists($d . '/getservice_dynamodb_latest.php'));
        $this->assertFalse(
            file_exists($d . '/getservicepaginatorconfig_dynamodb_latest.php')
        );
        $this->assertFalse(
            file_exists($d . '/getservicewaiter_dynamodb_latest.php')
        );

        rmdir($d);
    }
}
