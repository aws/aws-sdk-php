<?php

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
     * @covers Aws\Glacier\Model\TreeHash::fromChecksums
     */
    public function testTreeHashingChecksumsWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertEquals($d->checksum, TreeHash::fromChecksums($d->binHashes, true)->getHash());
        $this->assertEquals($d->checksum, TreeHash::fromChecksums($d->hexHashes)->getHash());
    }

    /**
     * @covers Aws\Glacier\Model\TreeHash::fromContent
     */
    public function testTreeHashingContentWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertEquals($d->checksum, TreeHash::fromContent($d->content)->getHash());
    }

    /**
     * @covers Aws\Glacier\Model\TreeHash::validateChecksum
     */
    public function testValidatingChecksumWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertTrue(TreeHash::validateChecksum($d->content, $d->checksum));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @covers Aws\Glacier\Model\TreeHash::__construct
     */
    public function testThrowsExceptionForInvalidAlgorithm()
    {
        $chunkHash = new TreeHash('foobar');
    }

    /**
     * @covers Aws\Glacier\Model\TreeHash::__construct
     * @covers Aws\Glacier\Model\TreeHash::addData
     * @covers Aws\Glacier\Model\TreeHash::addChecksum
     * @covers Aws\Glacier\Model\TreeHash::getHash
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
     * @covers Aws\Glacier\Model\TreeHash::addData
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
     * @covers Aws\Glacier\Model\TreeHash::addData
     */
    public function testCannotAddDataChunksLargerThanOneMegabyte()
    {
        $chunkHash = new TreeHash('sha256');
        $chunkHash->addData(str_repeat('foo', 1.2 * Size::MB));
    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Glacier\Model\TreeHash::addChecksum
     */
    public function testCannotAddChecksumsAfterHashCalculation()
    {
        $chunkHash = new TreeHash('sha256');
        $chunkHash->addData('foo');
        $chunkHash->getHash();

        $chunkHash->addChecksum('bar');
    }
}
