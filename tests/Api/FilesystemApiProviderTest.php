<?php
namespace Aws\Test\Api;

use Aws\Api\FilesystemApiProvider;

/**
 * @covers Aws\Api\FilesystemApiProvider
 */
class FilesystemApiProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testPathAndSuffixSetCorrectly()
    {
        $path = __DIR__ . '/';
        $p1 = new FilesystemApiProvider($path);
        $p2 = new FilesystemApiProvider($path, true);

        $this->assertEquals(__DIR__, $this->readAttribute($p1, 'path'));
        $this->assertEquals('.normal.json', $this->readAttribute($p1, 'apiSuffix'));
        $this->assertEquals('.normal.min.json', $this->readAttribute($p2, 'apiSuffix'));
    }

    // @TODO MOAR TESTS!!!
}
