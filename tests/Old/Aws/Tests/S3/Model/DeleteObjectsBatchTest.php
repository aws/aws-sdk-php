<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

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
