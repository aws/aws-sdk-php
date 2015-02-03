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
        $fn = Provider::version();
        $result = $fn($v, $service, 'baz');
        $this->assertInstanceOf($type, $result);
    }

    public function testCanMemoizeSignatures()
    {
        $fn = Provider::version();
        $fn = Provider::memoize($fn);
        $a = $fn('v4', 'ec2', 'us-west-2');
        $this->assertSame($a, $fn('v4', 'ec2', 'us-west-2'));
        $this->assertNotSame($a, $fn('v4', 'ec2', 'us-east-1'));
    }
}
