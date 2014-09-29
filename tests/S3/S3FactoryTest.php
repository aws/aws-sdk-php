<?php
namespace Aws\Test\S3;

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
            'Aws\Common\Signature\S3Signature',
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
            'Aws\Common\Signature\SignatureV4',
            $c->getSignature()
        );
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

        $this->assertContains('Aws\Common\Subscriber\SourceFile', $found);
        $this->assertContains('Aws\S3\Subscriber\BucketStyle', $found);
        $this->assertContains('Aws\S3\Subscriber\ApplyMd5', $found);
        $this->assertContains('Aws\S3\Subscriber\PermanentRedirect', $found);
        $this->assertContains('Aws\S3\Subscriber\PutObjectUrl', $found);
    }
}
