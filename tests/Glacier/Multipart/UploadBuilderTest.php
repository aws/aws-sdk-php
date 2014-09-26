<?php

namespace Aws\Test\Glacier\Multipart;

use Aws\Common\Multipart\UploadState;
use Aws\Glacier\Multipart\UploadBuilder;
use Aws\Glacier\Multipart\Uploader;
use Aws\Common\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Stream\Stream;

/**
 * @covers Aws\Glacier\Multipart\UploadBuilder
 */
class UploadBuilderTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testCanCreateBuilder()
    {
        $uploader = (new UploadBuilder)
            ->setClient($this->getMock('Aws\Common\AwsClientInterface'))
            ->setSource(__FILE__)
            ->setAccountId('foo')
            ->setVaultName('bar')
            ->setArchiveDescription('baz')
            ->build();

        $params = $this->readAttribute($uploader, 'params')[Uploader::INITIATE];
        $this->assertInstanceOf('Aws\Glacier\Multipart\Uploader', $uploader);
        $this->assertArrayHasKey('archiveDescription', $params);
        $this->assertArrayHasKey('partSize', $params);
    }

    public function testThrowsExceptionOnBadPartSize()
    {
        $uploader = (new UploadBuilder)
            ->setClient($this->getMock('Aws\Common\AwsClientInterface'))
            ->setSource(__FILE__)
            ->setVaultName('foo')
            ->setPartSize(1024);

        $this->setExpectedException('InvalidArgumentException');
        $uploader->build();
    }

    public function testCanLoadStateFromUploadId()
    {
        $client = $this->getTestClient('glacier');
        $this->addMockResults($client, [
            new Result([
                'PartSizeInBytes' => 1048576,
                'Parts' => [
                    ['RangeInBytes' => '0-1048575', 'SHA256TreeHash' => 'foo'],
                    ['RangeInBytes' => '1048576-2097151', 'SHA256TreeHash' => 'bar'],
                ]
            ])
        ]);

        $builder = (new UploadBuilder)->setClient($client);
        $method = (new \ReflectionObject($builder))
            ->getMethod('loadStateFromParams');
        $method->setAccessible(true);
        /** @var UploadState $state */
        $state = $method->invoke($builder, [
            'accountId' => '-',
            'vaultName' => 'foo',
            'uploadId'  => 'bar'
        ]);

        $part = $state->getUploadedParts()[2];
        $this->assertEquals(1048576, $part['size']);
        $this->assertEquals('bar', $part['checksum']);
    }

//    /**
//     * @dataProvider checksumTestProvider
//     */
//    public function testKnowsWhenToCalculateChecksums($client, $expected)
//    {
//        $uploader = (new UploadBuilder)->setClient($client);
//        $stream = Stream::factory('foo');
//
//        $method = (new \ReflectionClass('Aws\S3\Multipart\UploadBuilder'))
//            ->getMethod('decorateWithHashes');
//        $method->setAccessible(true);
//
//        $actual = null;
//        $stream = $method->invoke($uploader, $stream, function ($result, $type) use (&$actual) {
//                $actual = [$type, $result];
//            });
//        $stream->getContents();
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function checksumTestProvider()
//    {
//        $hasher = function ($type, $value) {
//            return base64_encode(hash($type, $value, true));
//        };
//
//        return [
//            [
//                $this->getTestClient('s3'),
//                ['md5', $hasher('md5', 'foo')]
//            ],
//            [
//                $this->getTestClient('s3', ['calculate_md5' => false]),
//                null
//            ],
//            [
//                $this->getTestClient('s3', ['signature' => 'v4']),
//                ['sha256', $hasher('sha256', 'foo')]
//            ]
//        ];
//    }

    public function testCanCreatePartGeneratorCallback()
    {
        $source = Stream::factory('foo');
        $uploader = (new UploadBuilder)
            ->setClient($this->getTestClient('glacier'))
            ->setPartSize(5)
            ->setSource($source);

        $method = (new \ReflectionClass('Aws\Glacier\Multipart\UploadBuilder'))
            ->getMethod('getCreatePartFn');
        $method->setAccessible(true);
        /** @var callable $createPart */
        $createPart = $method->invoke($uploader);

        $data = $createPart(true);
        // Range is an odd value here, because we are using a non-file stream
        $this->assertEquals('bytes 0--1/*', $data['range']);
        $this->assertInstanceOf('GuzzleHttp\Stream\LimitStream', $data['body']);

        $source->seek(0);
        $data = $createPart(false);
        $this->assertEquals('bytes 0-2/*', $data['range']);
        $this->assertInstanceOf('GuzzleHttp\Stream\Stream', $data['body']);
        $this->assertArrayHasKey('checksum', $data);
        $this->assertArrayHasKey('ContentSHA256', $data);
    }
}

//const MB = 1048576;
//
//public function getStreamTestCases()
//{
//    return [
//        [$this->createStream(true), 'GuzzleHttp\Stream\LimitStream'],
//        [$this->createStream(false), 'GuzzleHttp\Stream\Stream'],
//    ];
//}
//
///**
// * @dataProvider getStreamTestCases
// */
//public function testCanGeneratePartsForStream($source, $bodyClass)
//{
//    $generator = new PartGenerator($source, self::MB);
//    $parts = iterator_to_array($generator);
//    $this->assertCount(4, $parts);
//
//    $part = reset($parts);
//    // Has all the part data.
//    $this->assertEquals(
//        ['checksum', 'ContentSHA256', 'body', 'range'],
//        array_keys($part)
//    );
//    // For 1 MB parts, the checksums should be the same.
//    $this->assertEquals($part['checksum'], $part['ContentSHA256']);
//    // Verify the body is of the expected stream class.
//    $this->assertInstanceOf($bodyClass, $part['body']);
//}
//
//private function createStream($seekable)
//{
//    $stream = Stream::factory(str_repeat('.', 3 * self::MB + 1024));
//
//    return FnStream::decorate($stream, [
//                                         'seek' => function ($pos) use ($seekable, $stream) {
//                                                 return $seekable ? $stream->seek($pos) : false;
//                                             },
//                                         'isSeekable' => function () use ($seekable) {return $seekable;},
//                                         'getMetadata' => function ($key = null) use ($seekable, $stream) {
//                                                 return ($seekable && $key === 'wrapper_type')
//                                                     ? 'plainfile'
//                                                     : $stream->getMetadata($key);
//                                             }
//                                     ]);
//}