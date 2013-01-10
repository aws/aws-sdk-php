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

namespace Aws\Tests\Common\Hash;

use Aws\Common\Hash\ChunkHash;

/**
 * @covers \Aws\Common\Hash\ChunkHash
 */
class ChunkHashTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsExceptionForInvalidAlgorithm()
    {
        $chunkHash = new ChunkHash('foobar');
    }

    public function testConstructorInitializesValues()
    {
        $chunkHash = new ChunkHash('md5');
        $this->assertTrue(is_resource($this->readAttribute($chunkHash, 'context')));
    }

    public function testHashingIsHappeningCorrectly()
    {
        $content = 'foo';
        $hashHex = hash('sha256', $content);
        $hashBin = hash('sha256', $content, true);

        $chunkHash = new ChunkHash('sha256');
        $chunkHash->addData($content);

        $this->assertEquals($hashHex, $chunkHash->getHash());
        $this->assertEquals($hashBin, $chunkHash->getHash(true));
    }

    /**
     * @expectedException \LogicException
     */
    public function testCannotAddDataAfterHashCalculation()
    {
        $chunkHash = new ChunkHash('sha256');
        $chunkHash->addData('foo');
        $chunkHash->getHash();

        $chunkHash->addData('bar');
    }

    public function testCloneMakesCopyOfHashContext()
    {
        $chunkHash1 = new ChunkHash('sha256');
        $chunkHash1->addData('foo');

        $chunkHash2 = clone $chunkHash1;

        $this->assertEquals(hash('sha256', 'foo'), $chunkHash1->getHash());

        $chunkHash2->addData('bar');
        $this->assertEquals(hash('sha256', 'foobar'), $chunkHash2->getHash());
    }
}
