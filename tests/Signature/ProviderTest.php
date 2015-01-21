<?php
namespace Aws\Test\Signature;
use Aws\Signature\Provider;

/**
 * @covers Aws\Signature\Provider
 */
class ProviderTest extends \PHPUnit_Framework_TestCase
{
    public function versionProvider()
    {
        return [
            ['v2', 'Aws\Signature\SignatureV2', 'foo'],
            ['v4', 'Aws\Signature\SignatureV4', 'foo'],
            ['s3', 'Aws\Signature\S3Signature', 'foo'],
            ['v4', 'Aws\Signature\S3SignatureV4', 's3'],
        ];
    }

    /**
     * @dataProvider versionProvider
     */
    public function testCreatesSignatureFromVersionString($v, $type, $service)
    {
        $result = Provider::fromVersion($v, [
            'service' => $service,
            'region'  => 'baz'
        ]);

        $this->assertInstanceOf($type, $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage service is required
     */
    public function testEnsuresServiceIsProvidedForV4()
    {
        Provider::fromVersion('v4', ['region' => 'foo']);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage region is required
     */
    public function testEnsuresRegionIsProvidedForV4()
    {
        Provider::fromVersion('v4', ['service' => 'foo']);
    }
}
