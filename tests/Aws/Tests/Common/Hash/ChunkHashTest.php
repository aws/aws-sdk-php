<?php

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
