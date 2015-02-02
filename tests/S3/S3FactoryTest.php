<?php
namespace Aws\Test\ClientFactory;

use Aws\S3\S3Client;
use Aws\S3\S3Factory;

/**
 * @covers Aws\S3\S3Factory
 */
class S3FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCanForcePathStyleOnAllOperations()
    {
        $c = (new S3Factory())->create([
            'service'          => 's3',
            'version'          => 'latest',
            'force_path_style' => true
        ]);
        $command = $c->getCommand('GetObject');
        $this->assertTrue($command['PathStyle']);
    }

    public function testCreatesClientWithSubscribers()
    {
        $c = (new S3Factory())->create([
            'service' => 's3',
            'version' => 'latest'
        ]);
        $l = $c->getEmitter()->listeners();

        $found = [];
        foreach ($l as $value) {
            foreach ($value as $val) {
                $found[] = is_array($val)
                    ? get_class($val[0])
                    : get_class($val);
            }
        }

        $this->assertContains('Aws\Subscriber\SourceFile', $found);
        $this->assertContains('Aws\S3\BucketStyleSubscriber', $found);
        $this->assertContains('Aws\S3\ApplyMd5Subscriber', $found);
        $this->assertContains('Aws\S3\PermanentRedirectSubscriber', $found);
        $this->assertContains('Aws\S3\PutObjectUrlSubscriber', $found);
    }

    public function testCanUseBucketEndpoint()
    {
        $c = S3Client::factory([
            'service'         => 's3',
            'version'         => 'latest',
            'endpoint'        => 'http://test.domain.com',
            'bucket_endpoint' => true
        ]);
        $this->assertEquals(
            'http://test.domain.com/key',
            $c->getObjectUrl('test', 'key')
        );
    }

    public function testAddsMd5ToConfig()
    {
        $c = S3Client::factory([
            'service'         => 's3',
            'version'         => 'latest',
            'calculate_md5'   => true
        ]);
        $this->assertTrue($c->getConfig('calculate_md5'));
    }
}
