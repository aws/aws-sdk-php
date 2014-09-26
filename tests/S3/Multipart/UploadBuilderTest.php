<?php
namespace Aws\Test\S3\Multipart;

use Aws\Common\Multipart\UploadState;
use Aws\S3\Multipart\UploadBuilder;
use Aws\S3\Multipart\Uploader;
use Aws\Common\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Stream\Stream;

/**
 * @covers Aws\S3\Multipart\UploadBuilder
 */
class UploadBuilderTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    const MB = 1048576;

    public function testCanCreateBuilder()
    {
        $uploader = (new UploadBuilder)
            ->setClient($this->getMock('Aws\Common\AwsClientInterface'))
            ->setSource(__FILE__)
            ->setBucket('foo')
            ->setKey('bar')
            ->build();

        $params = $this->readAttribute($uploader, 'params');
        $this->assertArrayHasKey(Uploader::INITIATE, $params);
        $initParams = $params[Uploader::INITIATE];
        $this->assertArrayHasKey('ContentType', $initParams);
        $parts = $this->readAttribute($uploader, 'parts');
        $this->assertInstanceOf('Aws\Common\Multipart\PartGenerator', $parts);
        $this->assertInstanceOf('Aws\S3\Multipart\Uploader', $uploader);
    }

    public function testThrowsExceptionOnBadPartSize()
    {
        $uploader = (new UploadBuilder)
            ->setClient($this->getMock('Aws\Common\AwsClientInterface'))
            ->setSource(__FILE__)
            ->setBucket('foo')
            ->setKey('bar')
            ->setPartSize(1024);

        $this->setExpectedException('InvalidArgumentException');
        $uploader->build();
    }

    public function testCanLoadStateFromUploadId()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result([
                'Parts' => [
                    ['PartNumber' => 1, 'ETag' => 'foo', 'Size' => 1024],
                    ['PartNumber' => 2, 'ETag' => 'bar', 'Size' => 1024],
                    ['PartNumber' => 3, 'ETag' => 'baz', 'Size' => 1024],
                ]
            ])
        ]);

        $builder = (new UploadBuilder)->setClient($client);
        $method = (new \ReflectionObject($builder))
            ->getMethod('loadStateFromParams');
        $method->setAccessible(true);
        /** @var UploadState $state */
        $state = $method->invoke($builder, [
            'Bucket'   => 'foo',
            'Key'      => 'bar',
            'UploadId' => 'baz'
        ]);

        $part = $state->getUploadedParts()[3];
        $this->assertEquals(3, $part['PartNumber']);
        $this->assertEquals('baz', $part['ETag']);
    }

    /**
     * @dataProvider checksumTestProvider
     */
    public function testKnowsWhenToCalculateChecksums($client, $expected)
    {
        $uploader = (new UploadBuilder)->setClient($client);
        $stream = Stream::factory('foo');

        $method = (new \ReflectionClass('Aws\S3\Multipart\UploadBuilder'))
            ->getMethod('decorateWithHashes');
        $method->setAccessible(true);

        $actual = null;
        $stream = $method->invoke($uploader, $stream, function ($result, $type) use (&$actual) {
            $actual = [$type, $result];
        });
        $stream->getContents();
        $this->assertEquals($expected, $actual);
    }

    public function checksumTestProvider()
    {
        $hasher = function ($type, $value) {
            return base64_encode(hash($type, $value, true));
        };

        return [
            [
                $this->getTestClient('s3'),
                ['md5', $hasher('md5', 'foo')]
            ],
            [
                $this->getTestClient('s3', ['calculate_md5' => false]),
                null
            ],
            [
                $this->getTestClient('s3', ['signature' => 'v4']),
                ['sha256', $hasher('sha256', 'foo')]
            ]
        ];
    }

    public function testCanCreatePartGeneratorCallback()
    {
        $source = Stream::factory('foo');
        $uploader = (new UploadBuilder)
            ->setClient($this->getTestClient('s3'))
            ->setPartSize(5)
            ->setSource($source);

        $method = (new \ReflectionClass('Aws\S3\Multipart\UploadBuilder'))
            ->getMethod('getCreatePartFn');
        $method->setAccessible(true);
        /** @var callable $createPart */
        $createPart = $method->invoke($uploader);

        $data = $createPart(true, 2);
        $this->assertEquals(2, $data['PartNumber']);
        $this->assertInstanceOf('GuzzleHttp\Stream\LimitStream', $data['Body']);

        $source->seek(0);
        $data = $createPart(false, 2);
        $this->assertEquals(2, $data['PartNumber']);
        $this->assertInstanceOf('GuzzleHttp\Stream\Stream', $data['Body']);
        $this->assertArrayHasKey('ContentLength', $data);
        $this->assertArrayHasKey('ContentMD5', $data);
    }
}
