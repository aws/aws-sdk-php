<?php

namespace Aws\Tests\S3\Model;

use Aws\S3\Model\DeleteObjectsBatch;

/**
 * @covers Aws\S3\Model\DeleteObjectsBatch
 */
class DeleteObjectsBatchTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryBuildsBatch()
    {
        $batch = DeleteObjectsBatch::factory($this->getServiceBuilder()->get('s3'), 'foo');
        $this->assertInstanceOf('Aws\S3\Model\DeleteObjectsBatch', $batch);
    }

    public function testAddsKeys()
    {
        $batch = DeleteObjectsBatch::factory($this->getServiceBuilder()->get('s3'), 'foo');
        $batch->addKey('foo', 'bar');
        $decorated = $this->readAttribute($batch, 'decoratedBatch');
        $queue = $this->readAttribute($decorated, 'queue');
        $this->assertEquals(1, count($queue));
        $this->assertEquals(array(
            'Key'       => 'foo',
            'VersionId' => 'bar'
        ), $queue->pop());
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testValidatesInput()
    {
        $batch = DeleteObjectsBatch::factory($this->getServiceBuilder()->get('s3'), 'foo');
        $batch->add('foo');
    }

    /**
     * @expectedException \Aws\Common\Exception\InvalidArgumentException
     */
    public function testValidatesCommandName()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $batch = DeleteObjectsBatch::factory($client, 'foo');
        $batch->add($client->getCommand('CreateBucket'));
    }

    public function testConvertsDeleteObjectCommandsToArrays()
    {
        $client = $this->getServiceBuilder()->get('s3');
        $batch = DeleteObjectsBatch::factory($client, 'foo');
        $batch->add($client->getCommand('DeleteObject', array(
            'Bucket'    => 'bucket',
            'Key'       => 'foo',
            'VersionId' => 'bar'
        )));

        $decorated = $this->readAttribute($batch, 'decoratedBatch');
        $queue = $this->readAttribute($decorated, 'queue');
        $this->assertEquals(array(
            'Key'       => 'foo',
            'VersionId' => 'bar'
        ), $queue->pop());
    }
}
