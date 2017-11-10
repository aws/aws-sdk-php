<?php
namespace Aws\Test\Api;

use Aws\Api\ApiProvider;
use Aws\Exception\UnresolvedApiException;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\ApiProvider
 */
class ApiProviderTest extends TestCase
{
    /**
     * @return ApiProvider;
     */
    private function getTestApiProvider($useManifest = true)
    {
        $dir = __DIR__ . '/api_provider_fixtures';
        $manifest = json_decode(file_get_contents($dir . '/manifest.json'), true);

        return $useManifest
            ? ApiProvider::manifest($dir, $manifest)
            : ApiProvider::filesystem($dir);
    }

    public function testCanResolveProvider()
    {
        $p = function ($a, $b, $c) {return [];};
        $result = ['metadata'=> ['serviceIdentifier' => 's']];
        $this->assertEquals($result, ApiProvider::resolve($p, 't', 's', 'v'));

        $p = function ($a, $b, $c) {return null;};
        $this->setExpectedException(UnresolvedApiException::class);
        ApiProvider::resolve($p, 't', 's', 'v');
    }

    public function testCanGetServiceVersions()
    {
        $mp = $this->getTestApiProvider();
        $this->assertEquals(
            ['2012-08-10', '2010-02-04'],
            $mp->getVersions('dynamodb')
        );
        $this->assertEquals([], $mp->getVersions('foo'));

        $fp = $this->getTestApiProvider(false);
        $this->assertEquals(
            ['2012-08-10', '2010-02-04'],
            $fp->getVersions('dynamodb')
        );
    }

    public function testCanGetDefaultProvider()
    {
        $p = ApiProvider::defaultProvider();
        $this->assertArrayHasKey('s3', $this->readAttribute($p, 'manifest'));
    }

    public function testManifestProviderReturnsNullForMissingService()
    {
        $p = $this->getTestApiProvider();
        $this->assertNull($p('api', 'foo', '2015-02-02'));
    }

    public function testManifestProviderCanLoadData()
    {
        $p = $this->getTestApiProvider();
        $data = $p('api', 'dynamodb', 'latest');
        $this->assertInternalType('array', $data);
        $this->assertArrayHasKey('foo', $data);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFilesystemProviderEnsuresDirectoryIsValid()
    {
        ApiProvider::filesystem('/path/to/invalid/dir');
    }

    public function testNullOnMissingFile()
    {
        $p = $this->getTestApiProvider();
        $this->assertNull($p('api', 'nofile', 'latest'));
    }

    public function testReturnsLatestServiceData()
    {
        $p = ApiProvider::filesystem(__DIR__ . '/api_provider_fixtures');
        $this->assertEquals(['foo' => 'bar'], $p('api', 'dynamodb', 'latest'));
    }

    public function testReturnsNullWhenNoLatestVersionIsAvailable()
    {
        $p = ApiProvider::filesystem(__DIR__ . '/api_provider_fixtures');
        $this->assertnull($p('api', 'dodo', 'latest'));
    }

    public function testReturnsPaginatorConfigsForLatestCompatibleVersion()
    {
        $p = $this->getTestApiProvider();
        $result = $p('paginator', 'dynamodb', 'latest');
        $this->assertEquals(['abc' => '123'], $result);
        $result = $p('paginator', 'dynamodb', '2011-12-05');
        $this->assertEquals(['abc' => '123'], $result);
    }

    public function testReturnsWaiterConfigsForLatestCompatibleVersion()
    {
        $p = $this->getTestApiProvider();
        $result = $p('waiter', 'dynamodb', 'latest');
        $this->assertEquals(['abc' => '456'], $result);
        $result = $p('waiter', 'dynamodb', '2011-12-05');
        $this->assertEquals(['abc' => '456'], $result);
    }

    public function testThrowsOnBadType()
    {
        $this->setExpectedException(UnresolvedApiException::class);
        $p = $this->getTestApiProvider();
        ApiProvider::resolve($p, 'foo', 's3', 'latest');
    }

    public function testThrowsOnBadService()
    {
        $this->setExpectedException(UnresolvedApiException::class);
        $p = $this->getTestApiProvider();
        ApiProvider::resolve($p, 'api', '', 'latest');
    }

    public function testThrowsOnBadVersion()
    {
        $this->setExpectedException(UnresolvedApiException::class);
        $p = $this->getTestApiProvider();
        ApiProvider::resolve($p, 'api', 'dynamodb', 'derp');
    }
}
