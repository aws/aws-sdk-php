<?php
namespace Aws\Test\S3;

use Aws\S3\Exception\ClearBucketException;
use Aws\S3\S3Client;
use Aws\S3\ClearBucket;
use Aws\Test\UsesServiceTrait;

/**
 * @covers Aws\S3\ClearBucket
 */
class ClearBucketTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /** @var S3Client */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getTestClient('s3', ['region' => 'us-east-1']);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid option provided: baz
     */
    public function testValidatesInput()
    {
        new ClearBucket($this->client, 'foo', ['baz' => 'bar']);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage iterator must be an instance of Iterator
     */
    public function testValidatesIterator()
    {
        new ClearBucket($this->client, 'foo', ['iterator' => 'bar']);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage batch_size must be > 0
     */
    public function testValidatesBatchSize()
    {
        new ClearBucket($this->client, 'foo', ['batch_size' => 0]);
    }

    public function testEnsuresEachKeyIsValid()
    {
        try {
            $c = new ClearBucket($this->client, 'foo', [
                'iterator' => new \ArrayIterator(['baz!'])
            ]);
            $c->clear();
            $this->fail('Did not throw');
        } catch (ClearBucketException $e) {
            $this->assertEquals([
                [
                    'Key'     => null,
                    'Value'   => 'baz!',
                    'Message' => 'Invalid value returned from iterator'
                ]
            ], $e->getErrors());
        }
    }

    /**
     * @expectedException \Aws\S3\Exception\ClearBucketException
     */
    public function testEnsuresEachKeyHasKey()
    {
        $iter = new \ArrayIterator(['foo' => 'bar']);
        $c = new ClearBucket($this->client, 'foo', ['iterator' => $iter]);
        $c->clear();
    }

    public function testCreatesDefaultIterator()
    {
        $c = new ClearBucket($this->client, 'foo');
        $i = $this->readAttribute($c, 'iterator');
        $this->assertInstanceOf('Aws\Common\Paginator\ResourceIterator', $i);
    }

    public function testAddsMfaOptions()
    {
        $c = new ClearBucket($this->client, 'foo', ['mfa' => 'foo']);
        $o = $this->readAttribute($c, 'options');
        $this->assertEquals('foo', $o['mfa']);
    }

    public function testBatchDeletes()
    {
        $calls = [];
        $c = new ClearBucket($this->client, 'bucket', [
            'batch_size' => 3,
            'before'     => function (\Iterator $i, array $keys) use (&$calls) {
                $calls[] = $keys;
            }
        ]);

        $keys = [
            ['Key' => 'a'],
            ['Key' => 'b'],
            ['Key' => 'c'],
            ['Key' => 'd'],
            ['Key' => 'e']
        ];

        $this->addMockResults($this->client, [
            ['IsTruncated' => false, 'Contents' => $keys],
            ['Deleted' => []],
            ['Deleted' => []],
        ]);

        $c->clear();
        $this->assertCount(2, $calls);
        $this->assertEquals(
            [['Key' => 'a'], ['Key' => 'b'], ['Key' => 'c']],
            $calls[0]
        );
        $this->assertEquals(
            [['Key' => 'd'], ['Key' => 'e']],
            $calls[1]
        );
    }

    public function testThrowsClearBucketExceptionOnBatchDeleteError()
    {
        $i = new \ArrayIterator([['Key' => 'foo'], ['Key' => 'bar']]);
        $c = new ClearBucket($this->client, 'bucket', ['iterator' => $i]);
        $deleted = [['Key' => 'foo']];
        $errors = [['Key' => 'bar', 'Code' => 'code', 'Message' => 'msg']];

        $this->addMockResults($this->client, [
            ['Deleted' => $deleted, 'Errors' => $errors]
        ]);

        try {
            $c->clear();
            $this->fail('Did not throw');
        } catch (ClearBucketException $e) {
            $this->assertSame($errors, $e->getErrors());
            $this->assertSame($i, $e->getIterator());
            $this->assertEquals(
                'One or more errors occurred while clearing the bucket: <code> msg',
                $e->getMessage()
            );
        }
    }
}
