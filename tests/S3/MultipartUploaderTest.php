<?php
namespace Aws\Test\S3;

use Aws\S3\MultipartUploader;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3\MultipartUploader
 */
class MultipartUploaderTest extends TestCase
{
    use UsesServiceTrait;

    const MB = 1048576;
    const FILENAME = '_aws-sdk-php-s3-mup-test-dots.txt';

    public static function tearDownAfterClass()
    {
        @unlink(sys_get_temp_dir() . '/' . self::FILENAME);
    }

    /**
     * @dataProvider getTestCases
     */
    public function testS3MultipartUploadWorkflow(
        array $clientOptions = [],
        array $uploadOptions = [],
        StreamInterface $source,
        $error = false
    ) {
        $client = $this->getTestClient('s3', $clientOptions);
        $url = 'http://foo.s3.amazonaws.com/bar';
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        if ($error) {
            if (method_exists($this, 'expectException')) {
                $this->expectException($error);
            } else {
                $this->setExpectedException($error);
            }
        }

        $uploader = new MultipartUploader($client, $source, $uploadOptions);
        $result = $uploader->upload();

        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals($url, $result['ObjectURL']);
    }

    public function getTestCases()
    {
        $defaults = [
            'bucket' => 'foo',
            'key'    => 'bar',
        ];

        $data = str_repeat('.', 12 * self::MB);
        $filename = sys_get_temp_dir() . '/' . self::FILENAME;
        file_put_contents($filename, $data);

        return [
            [ // Seekable stream, regular config
                [],
                ['acl' => 'private'] + $defaults,
                Psr7\stream_for(fopen($filename, 'r'))
            ],
            [ // Non-seekable stream
                [],
                $defaults,
                Psr7\stream_for($data)
            ],
            [ // Error: bad part_size
                [],
                ['part_size' => 1] + $defaults,
                Psr7\FnStream::decorate(
                    Psr7\stream_for($data), [
                        'getSize' => function () {return null;}
                    ]
                ),
                'InvalidArgumentException'
            ],
        ];
    }

    public function testCanLoadStateFromService()
    {
        $client = $this->getTestClient('s3');
        $url = 'http://foo.s3.amazonaws.com/bar';
        $this->addMockResults($client, [
            new Result(['Parts' => [
                ['PartNumber' => 1, 'ETag' => 'A', 'Size' => 4 * self::MB],
            ]]),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $state = MultipartUploader::getStateFromService($client, 'foo', 'bar', 'baz');
        $source = Psr7\stream_for(str_repeat('.', 9 * self::MB));
        $uploader = new MultipartUploader($client, $source, ['state' => $state]);
        $result = $uploader->upload();

        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals(4 * self::MB, $uploader->getState()->getPartSize());
        $this->assertEquals($url, $result['ObjectURL']);
    }

    public function testCanUseCaseInsensitiveConfigKeys()
    {
        $client = $this->getTestClient('s3');
        $putObjectMup = new MultipartUploader($client, Psr7\stream_for('x'), [
            'Bucket' => 'bucket',
            'Key' => 'key',
        ]);
        $classicMup = new MultipartUploader($client, Psr7\stream_for('x'), [
            'bucket' => 'bucket',
            'key' => 'key',
        ]);
        $configProp = (new \ReflectionClass(MultipartUploader::class))
            ->getProperty('config');
        $configProp->setAccessible(true);

        $this->assertSame($configProp->getValue($classicMup), $configProp->getValue($putObjectMup));
    }

    public function testMultipartSuccessStreams()
    {
        $size = 12 * self::MB;
        $data = str_repeat('.', $size);
        $filename = sys_get_temp_dir() . '/' . self::FILENAME;
        file_put_contents($filename, $data);

        return [
            [ // Seekable stream, regular config
                Psr7\stream_for(fopen($filename, 'r')),
                $size,
            ],
            [ // Non-seekable stream
                Psr7\stream_for($data),
                $size,
            ]
        ];
    }

    /**
     * @dataProvider testMultipartSuccessStreams
     */
    public function testS3MultipartUploadParams($stream, $size)
    {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('s3');
        $uploadOptions = [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'params'          => [
                'RequestPayer'  => 'test',
                'ContentLength' => $size
            ],
            'before_initiate' => function($command) {
                $this->assertEquals('test', $command['RequestPayer']);
            },
            'before_upload'   => function($command) use ($size) {
                $this->assertLessThan($size, $command['ContentLength']);
                $this->assertEquals('test', $command['RequestPayer']);
            },
            'before_complete' => function($command) {
                $this->assertEquals('test', $command['RequestPayer']);
            }
        ];
        $url = 'http://foo.s3.amazonaws.com/bar';

        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $uploader = new MultipartUploader($client, $stream, $uploadOptions);
        $result = $uploader->upload();

        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals($url, $result['ObjectURL']);
    }

    public function getContentTypeSettingTests()
    {
        $size = 12 * self::MB;
        $data = str_repeat('.', $size);
        $filename = sys_get_temp_dir() . '/' . self::FILENAME;
        file_put_contents($filename, $data);

        return [
            [ // Successful lookup from filename via stream
                Psr7\stream_for(fopen($filename, 'r')),
                [],
                'text/plain'
            ],
            [ // Unsuccessful lookup because of no file name
                Psr7\stream_for($data),
                [],
                'application/octet-stream'
            ],
            [ // Successful override of known type from filename
                Psr7\stream_for(fopen($filename, 'r')),
                ['ContentType' => 'TestType'],
                'TestType'
            ],
            [ // Successful override of unknown type
                Psr7\stream_for($data),
                ['ContentType' => 'TestType'],
                'TestType'
            ]
        ];
    }

    /**
     * @dataProvider getContentTypeSettingTests
     */
    public function testS3MultipartContentTypeSetting(
        $stream,
        $params,
        $expectedContentType
    ) {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('s3');
        $uploadOptions = [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'params'          => $params,
            'before_initiate' => function($command) use ($expectedContentType) {
                $this->assertEquals(
                    $expectedContentType,
                    $command['ContentType']
                );
            },
        ];
        $url = 'http://foo.s3.amazonaws.com/bar';

        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $uploader = new MultipartUploader($client, $stream, $uploadOptions);
        $result = $uploader->upload();

        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals($url, $result['ObjectURL']);
    }
}
