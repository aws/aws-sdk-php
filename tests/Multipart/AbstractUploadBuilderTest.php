<?php
namespace Aws\Test\Multipart;

use Aws\Multipart\UploadState;
use Aws\Multipart\Uploader;
use GuzzleHttp\Stream\NoSeekStream;
use GuzzleHttp\Stream\Stream;

/**
 * @covers Aws\Multipart\AbstractUploadBuilder
 */
class AbstractUploadBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testCanSetOptionsInChainableWay()
    {
        $client = $this->getMockForAbstractClass('Aws\\AwsClientInterface');
        $state = new UploadState([]);
        $source = Stream::factory();

        $builder = (new TestUploadBuilder)
            ->setClient($client)
            ->setState($state)
            ->setPartSize(5)
            ->addParams('initiate', ['foo' => 'bar', 'fizz' => 'buzz'])
            ->addParams('initiate', ['fuzz' => 'buzz'])
            ->addParams('complete', ['fuzz' => 'buzz'])
            ->setSource($source);

        $this->assertSame($client, $this->readAttribute($builder, 'client'));
        $this->assertSame($state, $this->readAttribute($builder, 'state'));
        $this->assertSame($source, $this->readAttribute($builder, 'source'));
        $this->assertEquals(5, $this->readAttribute($builder, 'specifiedPartSize'));
        $this->assertEquals(
            ['foo' => 'bar', 'fizz' => 'buzz', 'fuzz' => 'buzz'],
            $this->readAttribute($builder, 'config')['initiate']['params']
        );
        $this->assertEquals(
            ['fuzz' => 'buzz'],
            $this->readAttribute($builder, 'config')['complete']['params']
        );
    }

    public function testCanSetSourceFromFilenameIfExists()
    {
        // CASE 1: Filename exists.
        $builder = (new TestUploadBuilder)->setSource(__FILE__);
        $this->assertInstanceOf(
            'GuzzleHttp\Stream\StreamInterface',
            $this->readAttribute($builder, 'source')
        );

        // CASE 2: Filename does not exist.
        $exception = null;
        try {
            $builder->setSource('non-existent-file.foobar');
        } catch (\InvalidArgumentException $exception) {}
        $this->assertInstanceOf('InvalidArgumentException', $exception);

        // CASE 3: Source stream is not readable.
        $exception = null;
        try {
            $builder->setSource(STDERR);
        } catch (\InvalidArgumentException $exception) {}
        $this->assertInstanceOf('InvalidArgumentException', $exception);
    }

    public function testCanDetermineStateIfNotProvided()
    {
        $c = $this->getMockForAbstractClass('Aws\\AwsClientInterface');

        // CASE 1: All upload params are provided. State is loaded.
        $params = ['foo' => 1, 'bar' => 2, 'baz' => 3];
        $uploader = (new TestUploadBuilder($params))->setClient($c)->build();
        $this->assertInstanceOf(Uploader::class, $uploader);

        // CASE 2: All required upload params are provided. State is created.
        $params['baz'] = null;
        $uploader = (new TestUploadBuilder($params))->setClient($c)->build();
        $this->assertInstanceOf(Uploader::class, $uploader);

        // CASE 3: Required upload params are not provided. Exception thrown.
        $params['bar'] = null;
        $this->setExpectedException('InvalidArgumentException');
        $uploader = (new TestUploadBuilder($params))->setClient($c)->build();
    }

    /**
     * @param bool        $seekable
     * @param UploadState $state
     * @param array       $expectedParts
     *
     * @dataProvider getPartGeneratorTestCases
     */
    public function testCanCreatePartGenerator(
        $seekable,
        UploadState $state,
        array $expectedParts
    ) {
        // Instantiate Builder.
        $builder = (new TestUploadBuilder)
            ->setClient($this->getMockForAbstractClass('Aws\\AwsClientInterface'))
            ->setSource($this->getTestSource($seekable))
            ->setState($state);

        // Prepare a pseudo createPartFn closure.
        $createPartFn = function ($seekable, $partNumber) {
            if ($seekable) {
                $body = Stream::factory(fopen($this->source->getMetadata('uri'), 'r'));
                $body = $this->limitPartStream($body);
            } else {
                $body = Stream::factory($this->source->read($this->state->getPartSize()));
            }
            return ['Body' => $body->getContents()];
        };
        $createPartFn = $createPartFn->bindTo($builder, $builder);

        // Use reflection to call getPartGenerator.
        $getPartGenerator = (new \ReflectionObject($builder))
            ->getMethod('getPartGenerator');
        $getPartGenerator->setAccessible(true);
        $parts = $getPartGenerator->invoke($builder, $createPartFn);

        $this->assertEquals($expectedParts, iterator_to_array($parts, true));
    }

    public function getPartGeneratorTestCases()
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
            [true, $state, $expected],
            [false, $state, $expected],
            [true, $stateSkip, $expectedSkip],
            [false, $stateSkip, $expectedSkip],
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
