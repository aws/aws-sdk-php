<?php
namespace Aws\Test\Glacier;

use Aws\Glacier\TreeHash;

class TreeHashTest extends \PHPUnit_Framework_TestCase
{
    public function getTestData()
    {
        $completedChunks = function ($chunks, $useBinaryForm) {
            return array_map(function ($chunk) use ($useBinaryForm) {
                return hash('sha256', $chunk, $useBinaryForm);
            }, $chunks);
        };

        $data = new \stdClass;
        $data->chunks = array(str_repeat('x', 1048576), 'foobar');
        $data->content = join('', $data->chunks);
        $data->binHashes = $completedChunks($data->chunks, true);
        $data->hexHashes = $completedChunks($data->chunks, false);
        $data->checksum = hash('sha256', join('', $data->binHashes), true);

        return $data;
    }

    /**
     * @covers Aws\Glacier\TreeHash::fromChecksums
     */
    public function testTreeHashingChecksumsWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertEquals(
            $d->checksum,
            TreeHash::fromChecksums($d->binHashes, true)->complete()
        );
        $this->assertEquals(
            $d->checksum,
            TreeHash::fromChecksums($d->hexHashes)->complete()
        );
    }

    /**
     * @covers Aws\Glacier\TreeHash::fromContent
     */
    public function testTreeHashingContentWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertEquals(
            $d->checksum,
            TreeHash::fromContent($d->content)->complete()
        );
    }

    /**
     * @covers Aws\Glacier\TreeHash::validateChecksum
     */
    public function testValidatingChecksumWorksCorrectly()
    {
        $d = $this->getTestData();
        $this->assertTrue(
            TreeHash::validateChecksum($d->content, bin2hex($d->checksum))
        );
    }

    /**
     * @covers Aws\Glacier\TreeHash::__construct
     * @covers Aws\Glacier\TreeHash::update
     * @covers Aws\Glacier\TreeHash::addChecksum
     * @covers Aws\Glacier\TreeHash::complete
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
     * @covers Aws\Glacier\TreeHash::update
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
     * @covers Aws\Glacier\TreeHash::update
     */
    public function testCannotUpdateChunksLargerThanOneMegabyte()
    {
        $chunkHash = new TreeHash('sha256');
        $chunkHash->update(str_repeat('foo', 1000000));
    }

    /**
     * @expectedException \LogicException
     * @covers Aws\Glacier\TreeHash::addChecksum
     */
    public function testCannotAddChecksumsAfterHashCalculation()
    {
        $chunkHash = new TreeHash('sha256');
        $chunkHash->update('foo');
        $chunkHash->complete();

        $chunkHash->addChecksum('bar');
    }
}
