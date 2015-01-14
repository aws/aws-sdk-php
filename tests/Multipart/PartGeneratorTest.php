<?php
namespace Aws\Test\Multipart;

use Aws\Multipart\PartGenerator;
use Aws\Multipart\UploadState;
use GuzzleHttp\Stream\LimitStream;
use GuzzleHttp\Stream\NoSeekStream;
use GuzzleHttp\Stream\Stream;

/**
 * @covers Aws\Multipart\PartGenerator
 */
class PartGeneratorTest extends \PHPUnit_Framework_TestCase
{
    const SEEKABLE = true;
    const NON_SEEKABLE = false;

    public function testConstructorDeterminesIfSourceSeekable()
    {
        $noop = function () {};
        $state = new UploadState([]);
        $state->setPartSize(2);

        $source = $this->getTestSource(self::SEEKABLE);
        $generator = new PartGenerator($source, $state, $noop);
        $this->assertTrue($this->readAttribute($generator, 'seekableSource'));

        $source = $this->getTestSource(self::NON_SEEKABLE);
        $generator = new PartGenerator($source, $state, $noop);
        $this->assertFalse($this->readAttribute($generator, 'seekableSource'));
    }

    /**
     * @dataProvider getTestCases
     */
    public function testCanGeneratePartsViaIteration(
        $seekable,
        UploadState $state,
        array $expectedParts
    ) {
        $source = $this->getTestSource($seekable);
        $generator = new PartGenerator($source, $state,
            function ($seekable) use ($source, $state) {
                $partSize = $state->getPartSize();
                if ($seekable) {
                    $body = Stream::factory(fopen($source->getMetadata('uri'), 'r'));
                    $body = new LimitStream($body, $partSize, $source->tell());
                } else {
                    $body = Stream::factory($source->read($partSize));
                }

                return ['Body' => $body->getContents()];
            }
        );

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
        $expectedSkip = $expected;
        unset($expectedSkip[1], $expectedSkip[2], $expectedSkip[4]);

        $state = new UploadState([]);
        $state->setPartSize(2);
        $stateSkip = clone $state;
        $stateSkip->markPartAsUploaded(1);
        $stateSkip->markPartAsUploaded(2);
        $stateSkip->markPartAsUploaded(4);

        return [
            [self::SEEKABLE,     $state,     $expected],
            [self::NON_SEEKABLE, $state,     $expected],
            [self::SEEKABLE,     $stateSkip, $expectedSkip],
            [self::NON_SEEKABLE, $stateSkip, $expectedSkip],
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
