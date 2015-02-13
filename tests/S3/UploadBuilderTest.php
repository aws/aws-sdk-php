<?php
namespace Aws\Test\S3;

use Aws\Multipart\UploadState;
use Aws\S3\UploadBuilder;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Stream\Stream;

/**
 * @covers Aws\S3\UploadBuilder
 */
class UploadBuilderTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    const MB = 1048576;

    public function testCanCreateBuilder()
    {
        $builder = (new UploadBuilder)
            ->setClient($this->getMock('Aws\AwsClientInterface'))
            ->setSource(__FILE__)
            ->setBucket('foo')
            ->setKey('bar');
        $builder2 = clone $builder;

        $uploader = $builder->build();
        $config = $this->readAttribute($uploader, 'config');
        $params = $config['initiate']['params'];
        $this->assertArrayHasKey('ContentType', $params);
        $this->assertInstanceOf('Aws\Multipart\Uploader', $uploader);

        $builder2->setUploadId('baz');
        $this->assertEquals(
            ['Bucket' => 'foo', 'Key' => 'bar', 'UploadId' => 'baz'],
            $this->readAttribute($builder2, 'uploadId')
        );
    }

    public function testThrowsExceptionOnBadPartSize()
    {
        $uploader = (new UploadBuilder)
            ->setClient($this->getMock('Aws\AwsClientInterface'))
            ->setSource(__FILE__)
            ->setBucket('foo')
            ->setKey('bar')
            ->setPartSize(1024);

        $this->setExpectedException('InvalidArgumentException');
        $uploader->build();
    }

    public function testCanLoadStateFromUploadId()
    {
        $client = $this->getTestClient('S3');
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
            ->getMethod('loadStateByUploadId');
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

        $method = (new \ReflectionClass('Aws\S3\UploadBuilder'))
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
                $this->getTestClient('S3'),
                ['md5', $hasher('md5', 'foo')]
            ],
            [
                $this->getTestClient('S3', ['calculate_md5' => false]),
                null
            ],
            [
                $this->getTestClient('S3', ['signature_version' => 'v4']),
                ['sha256', $hasher('sha256', 'foo')]
            ]
        ];
    }

    public function testCanCreatePartGeneratorCallback()
    {
        $source = Stream::factory('foo');
        $state = new UploadState([]);
        $state->setPartSize(5);
        $builder = (new UploadBuilder)
            ->setClient($this->getTestClient('S3'))
            ->setState($state)
            ->setSource($source);

        $method = (new \ReflectionObject($builder))
            ->getMethod('getCreatePartFn');
        $method->setAccessible(true);
        /** @var callable $createPart */
        $createPart = $method->invoke($builder);

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

    public function testCallbackCreatesCorrectCompleteCommandParams()
    {
        // Prepare state.
        $state = new UploadState([]);
        $parts = [
            1 => ['ETag' => 'foo'],
            2 => ['ETag' => 'bar'],
            3 => ['ETag' => 'baz'],
        ];
        foreach ($parts as $number => $data) {
            $state->markPartAsUploaded($number, $data);
        }

        // Prepare builder.
        $builder = (new UploadBuilder)
            ->setClient($this->getTestClient('S3'))
            ->setState($state)
            ->setSource(Stream::factory('foo'));

        // Get function.
        $method = (new \ReflectionObject($builder))
            ->getMethod('getCompleteParamsFn');
        $method->setAccessible(true);
        /** @var callable $getCommandParams */
        $getCommandParams = $method->invoke($builder);

        // Validate function results.
        $params = $getCommandParams();
        $this->assertTrue(isset($params['MultipartUpload']['Parts']));
        $this->assertEquals($parts, $params['MultipartUpload']['Parts']);
    }

    public function testCallbackHandlesResultsOfUploadPart()
    {
        $state = new UploadState([]);

        $builder = (new UploadBuilder)
            ->setClient($this->getTestClient('S3'))
            ->setState($state)
            ->setSource(Stream::factory('foo'));

        $method = (new \ReflectionObject($builder))
            ->getMethod('getResultHandlerFn');
        $method->setAccessible(true);
        /** @var callable $handleResult */
        $handleResult = $method->invoke($builder);

        // Mock arguments.
        $command = $this->getMockBuilder('GuzzleHttp\Command\Command')
            ->disableOriginalConstructor()
            ->getMock();
        $command->method('offsetGet')->willReturn(2);
        $result = $this->getMockBuilder('Aws\Result')
            ->disableOriginalConstructor()
            ->getMock();
        $result->method('offsetGet')->willReturn('foo');

        $handleResult($command, $result);

        $uploadedParts = $state->getUploadedParts();
        $this->assertTrue(isset($uploadedParts[2]['ETag']));
        $this->assertEquals('foo', $uploadedParts[2]['ETag']);
    }
}
