<?php
namespace Aws\Test\Common\Multipart;

use Aws\Common\Multipart\AbstractPartGenerator;
use GuzzleHttp\Stream\LimitStream;
use GuzzleHttp\Stream\NoSeekStream;
use GuzzleHttp\Stream\Stream;

/**
 * Concrete PartGenerator used for the purpose of the following test.
 */
class TestPartGenerator extends AbstractPartGenerator
{
    protected function determinePartSize()
    {
        $this->partSize = 2;
    }

    protected function generatePartData()
    {
        if ($this->seekableSource) {
            $body = new LimitStream($this->source, $this->partSize, $this->getOffset());
            $this->advanceOffset();
        } else {
            $body = Stream::factory($this->source->read($this->partSize));
        }

        return ['Body' => $body->getContents()];
    }
}

/**
 * @covers Aws\Common\Multipart\AbstractPartGenerator
 */
class AbstractPartGeneratorTest extends \PHPUnit_Framework_TestCase
{
    const SEEKABLE = true;
    const NON_SEEKABLE = false;

    public function testConstructorDeterminesIfSourceSeekable()
    {
        $source = $this->getTestSource(self::SEEKABLE);
        $generator = new TestPartGenerator($source);
        $this->assertEquals(2, $generator->getPartSize());
        $this->assertTrue($this->readAttribute($generator, 'seekableSource'));

        $source = $this->getTestSource(self::NON_SEEKABLE);
        $generator = new TestPartGenerator($source);
        $this->assertFalse($this->readAttribute($generator, 'seekableSource'));
    }

    /**
     * @dataProvider getTestCases
     */
    public function testCanGeneratePartsViaIteration($seekable, $options, $expectedParts)
    {
        $source = $this->getTestSource($seekable);
        $generator = new TestPartGenerator($source, $options);

        $this->assertEquals($expectedParts, iterator_to_array($generator, true));
    }

    public function getTestCases()
    {
        $expected = [
            1 => ['Body' => 'AA'],
            2 => ['Body' => 'BB'],
            3 => ['Body' => 'CC'],
            4 => ['Body' => 'DD'],
            5 => ['Body' => 'EE'],
            6 => ['Body' => 'F' ],
        ];
        $skip = [1 => true, 2 => true, 4 => true];
        $expectedSkip = $expected;
        unset($expectedSkip[1], $expectedSkip[2], $expectedSkip[4]);

        return [
            [self::SEEKABLE, [], $expected],
            [self::NON_SEEKABLE, [], $expected],
            [self::SEEKABLE, ['skip' => $skip], $expectedSkip],
            [self::NON_SEEKABLE, ['skip' => $skip], $expectedSkip],
        ];
    }

    private function getTestSource($seekable)
    {
        $source = Stream::factory(fopen(__DIR__ . '/source.txt', 'r'));
        if (!$seekable) {
            $source = new NoSeekStream($source);
        }

        return $source;
    }
}
