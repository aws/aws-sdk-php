<?php
namespace Aws\Test;

use Aws\Common\Aws;
use JmesPath\Env as JmesPath;

/**
 * @covers \Aws\Common\Aws
 */
class AwsTest extends \PHPUnit_Framework_TestCase
{

    public function testCanInstantiatedAndTransformConfig()
    {
        $aws = Aws::factory(['key' => 'foo']);

        $this->assertInstanceOf('Aws\Common\Aws', $aws);
        $this->assertInstanceOf('Aws\Sdk', $aws);

        $config = $this->readAttribute($aws, 'args');
        $this->assertArrayNotHasKey('key', $config);
        $this->assertEquals('foo', Jmespath::search('credentials.key', $config));
    }

    public function testThrowsErrorWithFile()
    {
        $this->setExpectedException('InvalidArgumentException');
        $aws = Aws::factory('config.php');
    }

    public function testCreatesClientsAndSavesThem()
    {
        $aws = Aws::factory(['version' => 'latest']);
        $client1 = $aws->get('s3');
        $client2 = $aws->get('s3');

        $this->assertInstanceOf('Aws\S3\S3Client', $client1);
        $this->assertSame($client1, $client2);
    }
}
