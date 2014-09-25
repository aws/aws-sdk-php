<?php
namespace Aws\Test\Common\Multipart;

use Aws\Common\Multipart\AbstractUploadBuilder;
use Aws\Common\Multipart\UploadState;
use GuzzleHttp\Stream\Stream;

/**
 * Concrete UploadBuilder for the purposes of the following test.
 */
class TestUploadBuilder extends AbstractUploadBuilder
{
    protected $uploadParams = ['foo' => null, 'bar' => null, 'baz' => null];

    public function __construct(array $params = [])
    {
        $this->uploadParams = $params + $this->uploadParams;
    }

    protected function loadStateFromParams(array $params = [])
    {
        return new UploadState($params);
    }

    protected function createUploader()
    {
        $class = new \ReflectionClass('Aws\S3\Multipart\Uploader');

        return $class->newInstanceWithoutConstructor();
    }
}

/**
 * @covers Aws\Common\Multipart\AbstractUploadBuilder
 */
class AbstractUploadBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testCanSetOptionsInChainableWay()
    {
        $client = $this->getMockForAbstractClass('Aws\\Common\\AwsClientInterface');
        $state = new UploadState([]);
        $source = Stream::factory();

        $builder = (new TestUploadBuilder)
            ->setClient($client)
            ->setState($state)
            ->setPartSize(5)
            ->setParams('op1', ['foo' => 'bar', 'fizz' => 'buzz'])
            ->addParam('op1', 'fuzz', 'buzz')
            ->addParam('op2', 'fuzz', 'buzz')
            ->setUploadId(5)
            ->setSource($source);

        $this->assertSame($client, $this->readAttribute($builder, 'client'));
        $this->assertSame($state, $this->readAttribute($builder, 'state'));
        $this->assertSame($source, $this->readAttribute($builder, 'source'));
        $this->assertEquals(5, $this->readAttribute($builder, 'partSize'));
        $this->assertEquals(5, $this->readAttribute($builder, 'uploadParams')['baz']);
        $this->assertEquals([
            'op1' => [
                'foo' => 'bar',
                'fizz' => 'buzz',
                'fuzz' => 'buzz',
            ],
            'op2' => ['fuzz' => 'buzz']
        ], $this->readAttribute($builder, 'params'));
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
        // CASE 1: All upload params are provided. State is loaded.
        $params = ['foo' => 1, 'bar' => 2, 'baz' => 3];
        $this->assertInstanceOf(
            'Aws\Common\Multipart\AbstractUploader',
            (new TestUploadBuilder($params))->build()
        );

        // CASE 2: All required upload params are provided. State is created.
        $params['baz'] = null;
        $this->assertInstanceOf(
            'Aws\Common\Multipart\AbstractUploader',
            (new TestUploadBuilder($params))->build()
        );

        // CASE 3: Required upload params are not provided. Exception thrown.
        $params['bar'] = null;
        $this->setExpectedException('InvalidArgumentException');
        (new TestUploadBuilder($params))->build();
    }
}
