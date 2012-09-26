<?php

namespace Aws\Tests\Common;

use Aws\Common\ChunkHash;

class ChunkHashTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHexBinConversionsWorkCorrectly()
    {
        $hex = "5a4b";
        $bin = "ZK";

        $this->assertEquals($hex, ChunkHash::binaryToHex($bin));
        $this->assertEquals($bin, ChunkHash::hexToBinary($hex));
    }

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
        $this->assertFalse($this->readAttribute($chunkHash, 'isFinalized'));
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
}
