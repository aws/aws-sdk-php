<?php
namespace Aws\Test\ClientFactory;

use Aws\S3\S3Factory;

/**
 * @covers Aws\S3\S3Factory
 */
class S3FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatesS3Signature()
    {
        $c = (new S3Factory())->create([
            'service'   => 's3',
            'signature' => 's3',
            'version'   => 'latest'
        ]);

        $this->assertInstanceOf(
            'Aws\Signature\S3Signature',
            $c->getSignature()
        );
    }

    public function testCreatesRegularSignature()
    {
        $c = (new S3Factory())->create([
            'service'   => 's3',
            'signature' => 'v4',
            'version'   => 'latest'
        ]);

        $this->assertInstanceOf(
            'Aws\Signature\SignatureV4',
            $c->getSignature()
        );
    }

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

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Amazon S3 supports signature version "s3" or "v4"
     */
    public function testValidatesSignature()
    {
        (new S3Factory())->create([
            'service'   => 's3',
            'signature' => 'foo',
            'version'   => 'latest'
        ]);
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
}
