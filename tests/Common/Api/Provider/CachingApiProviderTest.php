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
        $this->assertSame($c('api', 'ec2', 'latest'), $c('api', 'ec2', 'latest'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresCacheDirectoryIsValid()
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

        $this->assertInternalType('array', $c('api', 'dynamodb', 'latest'));
        $this->assertTrue(file_exists($d . '/api_dynamodb_latest.php'));
        // Get from cache
        $this->assertInternalType('array', $c('api', 'dynamodb', 'latest'));
        $this->assertInternalType('array', $c('paginator', 'dynamodb', 'latest'));
        $this->assertTrue(
            file_exists($d . '/paginator_dynamodb_latest.php')
        );
        $this->assertInternalType('array', $c('waiter', 'dynamodb', 'latest'));
        $this->assertTrue(
            file_exists($d . '/waiter_dynamodb_latest.php')
        );

        $c->clearCache();
        $this->assertFalse(file_exists($d . '/api_dynamodb_latest.php'));
        $this->assertFalse(
            file_exists($d . '/paginator_dynamodb_latest.php')
        );
        $this->assertFalse(
            file_exists($d . '/api_dynamodb_latest.php')
        );

        rmdir($d);
    }
}
