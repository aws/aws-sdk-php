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

namespace Aws\Tests\Service\Glacier;

use Aws\Service\Glacier\TreeHash;

class TreeHashTest extends \PHPUnit_Framework_TestCase
{
    public function getTestData()
    {
        $completeedChunks = function ($chunks, $useBinaryForm) {
            return array_map(function ($chunk) use ($useBinaryForm) {
                return hash('sha256', $chunk, $useBinaryForm);
            }, $chunks);
        };

        $data = new \stdClass;
        $data->chunks = array(str_repeat('x', 1048576), 'foobar');
        $data->content = join('', $data->chunks);
        $data->binHashes = $completeedChunks($data->chunks, true);
        $data->hexHashes = $completeedChunks($data->chunks, false);
        $data->checksum = hash('sha256', join('', $data->binHashes), true);

        return $data;
    }

    /**
     * @covers Aws\Service\Glacier\TreeHash::fromChecksums
     */
    public function testTreeHashingChecksumsWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertEquals($d->checksum, TreeHash::fromChecksums($d->binHashes, true)->complete());
        $this->assertEquals($d->checksum, TreeHash::fromChecksums($d->hexHashes)->complete());
    }

    /**
     * @covers Aws\Service\Glacier\TreeHash::fromContent
     */
    public function testTreeHashingContentWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertEquals($d->checksum, TreeHash::fromContent($d->content)->complete());
    }

    /**
     * @covers Aws\Service\Glacier\TreeHash::validateChecksum
     */
    public function testValidatingChecksumWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertTrue(TreeHash::validateChecksum($d->content, bin2hex($d->checksum)));
    }

    /**
     * @covers Aws\Service\Glacier\TreeHash::__construct
     * @covers Aws\Service\Glacier\TreeHash::update
     * @covers Aws\Service\Glacier\TreeHash::addChecksum
     * @covers Aws\Service\Glacier\TreeHash::complete
     */
    public function testHashingIsHappeningCorrectly()
    {
        $d = $this->getTestData();
        $treeHash = new TreeHash('sha256');
        $treeHash->update($d->chunks[0]);
        $treeHash->addChecksum($d->hexHashes[1]);

        $this->assertEquals($d->checksum, $treeHash->complete());
    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Service\Glacier\TreeHash::update
     */
    public function testCannotUpdateAfterHashCalculation()
    {
        $chunkHash = new TreeHash('sha256');
        $chunkHash->update('foo');
        $chunkHash->complete();

        $chunkHash->update('bar');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @covers Aws\Service\Glacier\TreeHash::update
     */
    public function testCannotUpdateChunksLargerThanOneMegabyte()
    {
        $chunkHash = new TreeHash('sha256');
        $chunkHash->update(str_repeat('foo', 1000000));
    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Service\Glacier\TreeHash::addChecksum
     */
    public function testCannotAddChecksumsAfterHashCalculation()
    {
        $chunkHash = new TreeHash('sha256');
        $chunkHash->update('foo');
        $chunkHash->complete();

        $chunkHash->addChecksum('bar');
    }
}
