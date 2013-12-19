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

use Aws\Common\Hash\TreeHash;
use Aws\Common\Enum\Size;

class TreeHashTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function getTestData()
    {
        $getHashedChunks = function ($chunks, $useBinaryForm) {
            return array_map(function ($chunk) use ($useBinaryForm) {
                return hash('sha256', $chunk, $useBinaryForm);
            }, $chunks);
        };

        $data = new \stdClass;
        $data->chunks = array(str_repeat('x', Size::MB), 'foobar');
        $data->content = join('', $data->chunks);
        $data->binHashes = $getHashedChunks($data->chunks, true);
        $data->hexHashes = $getHashedChunks($data->chunks, false);
        $data->checksum = hash('sha256', join('', $data->binHashes));
        $data->binChecksum = hash('sha256', join('', $data->binHashes), true);

        return $data;
    }

    /**
     * @covers Aws\Common\Hash\TreeHash::fromChecksums
     */
    public function testTreeHashingChecksumsWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertEquals($d->checksum, TreeHash::fromChecksums($d->binHashes, true)->getHash());
        $this->assertEquals($d->checksum, TreeHash::fromChecksums($d->hexHashes)->getHash());
    }

    /**
     * @covers Aws\Common\Hash\TreeHash::fromContent
     */
    public function testTreeHashingContentWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertEquals($d->checksum, TreeHash::fromContent($d->content)->getHash());
    }

    /**
     * @covers Aws\Common\Hash\TreeHash::validateChecksum
     */
    public function testValidatingChecksumWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertTrue(TreeHash::validateChecksum($d->content, $d->checksum));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @covers Aws\Common\Hash\TreeHash::__construct
     */
    public function testThrowsExceptionForInvalidAlgorithm()
    {
        $treeHash = new TreeHash('foobar');
    }

    /**
     * @covers Aws\Common\Hash\TreeHash::__construct
     * @covers Aws\Common\Hash\TreeHash::addData
     * @covers Aws\Common\Hash\TreeHash::addChecksum
     * @covers Aws\Common\Hash\TreeHash::getHash
     */
    public function testHashingIsHappeningCorrectly()
    {
        $d = $this->getTestData();
        $treeHash = new TreeHash('sha256');
        $treeHash->addData($d->chunks[0]);
        $treeHash->addChecksum($d->hexHashes[1]);

        $this->assertEquals($d->checksum, $treeHash->getHash());
        $this->assertEquals($d->binChecksum, $treeHash->getHash(true));
    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Common\Hash\TreeHash::addData
     */
    public function testCannotAddDataAfterHashCalculation()
    {
        $chunkHash = new TreeHash('sha256');
        $chunkHash->addData('foo');
        $chunkHash->getHash();

        $chunkHash->addData('bar');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @covers Aws\Common\Hash\TreeHash::addData
     */
    public function testCannotAddDataChunksLargerThanOneMegabyte()
    {
        $chunkHash = new TreeHash('sha256');
        $chunkHash->addData(str_repeat('foo', 1.2 * Size::MB));
    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Common\Hash\TreeHash::addChecksum
     */
    public function testCannotAddChecksumsAfterHashCalculation()
    {
        $chunkHash = new TreeHash('sha256');
        $chunkHash->addData('foo');
        $chunkHash->getHash();

        $chunkHash->addChecksum('bar');
    }
}
