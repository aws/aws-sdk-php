<?php
namespace Aws\Test\S3;

use Aws\Exception\MultipartUploadException;
use Aws\Result;
use Aws\ResultInterface;
use Aws\S3\MultipartCopy;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(MultipartCopy::class)]
class MultipartCopyTest extends TestCase
{
    use UsesServiceTrait;

    const MB = 1048576;

    #[DataProvider('getTestCases')]
    public function testS3MultipartCopyWorkflow(
        array $uploadOptions = [],
        $error = false
    ) {
        $client = $this->getTestClient('s3');
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

        $uploader = new MultipartCopy($client, '/bucket/key', $uploadOptions);
        $result = $uploader->upload();

        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertSame($url, $result['ObjectURL']);
    }

    public static function getTestCases(): array
    {
        $defaults = [
            'bucket' => 'foo',
            'key'    => 'bar',
            'source_metadata' => new Result(['ContentLength' => 11 * self::MB]),
        ];

        return [
            [
                ['acl' => 'private'] + $defaults
            ],
            [ // Error: bad part_size
                ['part_size' => 1] + $defaults,
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
                ['PartNumber' => 1, 'ETag' => 'A', 'Size' => 5 * self::MB],
                ['PartNumber' => 2, 'ETag' => 'B', 'Size' => 5 * self::MB],
            ]]),
            new Result(['ContentLength' => 11 * self::MB]),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $state = MultipartCopy::getStateFromService($client, 'foo', 'bar', 'baz');
        $uploader = new MultipartCopy($client, '/bucket/key', ['state' => $state]);
        $result = $uploader->upload();

        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertSame(5 * self::MB, $uploader->getState()->getPartSize());
        $this->assertSame($url, $result['ObjectURL']);
    }

    public function testCanUseCaseInsensitiveConfigKeys()
    {
        $client = $this->getTestClient('s3');
        $sourceMetadata = $this->getMockBuilder(ResultInterface::class)->getMock();
        $putObjectMup = new MultipartCopy($client, '/bucket/key', [
            'Bucket' => 'newBucket',
            'Key' => 'newKey',
            'source_metadata' => $sourceMetadata,
        ]);
        $classicMup = new MultipartCopy($client, '/bucket/key', [
            'bucket' => 'newBucket',
            'key' => 'newKey',
            'source_metadata' => $sourceMetadata,
        ]);
        $configProp = (new \ReflectionClass(MultipartCopy::class))
            ->getProperty('config');
        $this->assertSame($configProp->getValue($classicMup), $configProp->getValue($putObjectMup));
    }

    public function testS3MultipartCopyParams()
    {
        /** @var \Aws\S3\S3Client $client */
        $client = $this->getTestClient('s3');
        $copyOptions = [
            'bucket' => 'foo',
            'key' => 'bar',
            'source_metadata' => new Result(['ContentLength' => 11 * self::MB]),
            'params'          => ['RequestPayer' => 'test'],
            'before_initiate' => function($command) {
                $this->assertSame('test', $command['RequestPayer']);
            },
            'before_upload'   => function($command) {
                $this->assertSame('test', $command['RequestPayer']);
            },
            'before_complete' => function($command) {
                $this->assertSame('test', $command['RequestPayer']);
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

        $uploader = new MultipartCopy($client, '/bucket/key', $copyOptions);
        $result = $uploader->upload();

        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertSame($url, $result['ObjectURL']);
    }

    public function testCopyPrintsProgress()
    {
        $progressBar = [
            "Transfer initiated...\n|                    | 0.0%\n",
            "|==                  | 12.5%\n",
            "|=====               | 25.0%\n",
            "|=======             | 37.5%\n",
            "|==========          | 50.0%\n",
            "|============        | 62.5%\n",
            "|===============     | 75.0%\n",
            "|=================   | 87.5%\n",
            "|====================| 100.0%\nTransfer complete!\n"
        ];
        $client = $this->getTestClient('s3');
        $copyOptions = [
            'bucket' => 'foo',
            'key' => 'bar',
            'display_progress' => true,
            'source_metadata' => new Result(['ContentLength' => 11 * self::MB])
        ];
        $url = 'http://foo.s3.amazonaws.com/bar';

        $this->expectOutputString(implode("", $progressBar));
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $uploader = new MultipartCopy($client, '/bucket/key', $copyOptions);
        $result = $uploader->upload();

        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertSame($url, $result['ObjectURL']);
    }

    public function testFailedCopyPrintsPartialProgress()
    {
        $partialBar = [
            "Transfer initiated...\n|                    | 0.0%\n",
            "|==                  | 12.5%\n",
            "|=====               | 25.0%\n"
        ];
        $this->expectOutputString(implode("", $partialBar));

        $this->expectExceptionMessage(
            "An exception occurred while uploading parts to a multipart upload"
        );
        $this->expectException(MultipartUploadException::class);
        $counter = 0;

        $httpHandler = function ($request, array $options) use (&$counter) {
            if ($counter < 4) {
                $body = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><OperationNameResponse>" .
                    "<UploadId>baz</UploadId></OperationNameResponse>";
            } else {
                $body = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n\n\n";
            }
            $counter++;

            return Promise\Create::promiseFor(
                new Psr7\Response(200, [], $body)
            );
        };

        $client = $this->getTestClient('s3', ['http_handler' => $httpHandler]);
        $copyOptions = [
            'bucket' => 'foo',
            'key' => 'bar',
            'display_progress' => true,
            'source_metadata' => new Result(['ContentLength' => 50 * self::MB])
        ];

        $uploader = new MultipartCopy($client, '/bucket/key', $copyOptions);
        $uploader->upload();
    }

    public function testDefaultMetadataDirectiveCopiesSourceMetadata()
    {
        $client = $this->getTestClient('s3');
        $url = 'http://foo.s3.amazonaws.com/bar';
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $initiateParams = null;
        $sourceMetadata = new Result([
            'ContentLength' => 11 * self::MB,
            'ContentType' => 'application/pdf',
            'CacheControl' => 'max-age=3600',
            'ContentDisposition' => 'attachment; filename="doc.pdf"',
            'ContentEncoding' => 'gzip',
            'ContentLanguage' => 'en-US',
            'Expires' => 'Thu, 01 Dec 2025 16:00:00 GMT',
            'Metadata' => ['custom-key' => 'custom-value', 'another' => 'meta'],
            'WebsiteRedirectLocation' => '/redirect-target',
        ]);

        $uploader = new MultipartCopy($client, '/bucket/key', [
            'bucket' => 'foo',
            'key' => 'bar',
            'source_metadata' => $sourceMetadata,
            'before_initiate' => function ($command) use (&$initiateParams) {
                $initiateParams = $command->toArray();
            },
        ]);
        $uploader->upload();

        $this->assertSame('application/pdf', $initiateParams['ContentType']);
        $this->assertSame('max-age=3600', $initiateParams['CacheControl']);
        $this->assertSame('attachment; filename="doc.pdf"', $initiateParams['ContentDisposition']);
        $this->assertSame('gzip', $initiateParams['ContentEncoding']);
        $this->assertSame('en-US', $initiateParams['ContentLanguage']);
        $this->assertSame('Thu, 01 Dec 2025 16:00:00 GMT', $initiateParams['Expires']);
        $this->assertSame(['custom-key' => 'custom-value', 'another' => 'meta'], $initiateParams['Metadata']);
        // WebsiteRedirectLocation is NOT copied — matches CopyObject behavior
        $this->assertArrayNotHasKey('WebsiteRedirectLocation', $initiateParams);
    }

    public function testMetadataDirectiveReplaceSuppressesSourceMetadata()
    {
        $client = $this->getTestClient('s3');
        $url = 'http://foo.s3.amazonaws.com/bar';
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $initiateParams = null;
        $sourceMetadata = new Result([
            'ContentLength' => 11 * self::MB,
            'ContentType' => 'application/pdf',
            'CacheControl' => 'max-age=3600',
            'Metadata' => ['custom-key' => 'custom-value'],
        ]);

        $uploader = new MultipartCopy($client, '/bucket/key', [
            'bucket' => 'foo',
            'key' => 'bar',
            'source_metadata' => $sourceMetadata,
            'metadata_directive' => 'REPLACE',
            'before_initiate' => function ($command) use (&$initiateParams) {
                $initiateParams = $command->toArray();
            },
        ]);
        $uploader->upload();

        // ContentType is still set by the trait's getInitiateParams (from getSourceMimeType)
        $this->assertSame('application/pdf', $initiateParams['ContentType']);
        // But other metadata fields should NOT be forwarded
        $this->assertArrayNotHasKey('CacheControl', $initiateParams);
        $this->assertArrayNotHasKey('Metadata', $initiateParams);
        $this->assertArrayNotHasKey('ContentDisposition', $initiateParams);
    }

    public function testSourceMetadataOverridesUserParamsWhenCopy()
    {
        $client = $this->getTestClient('s3');
        $url = 'http://foo.s3.amazonaws.com/bar';
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $initiateParams = null;
        $sourceMetadata = new Result([
            'ContentLength' => 11 * self::MB,
            'ContentType' => 'application/pdf',
            'CacheControl' => 'max-age=3600',
            'Metadata' => ['source-key' => 'source-value'],
        ]);

        $uploader = new MultipartCopy($client, '/bucket/key', [
            'bucket' => 'foo',
            'key' => 'bar',
            'source_metadata' => $sourceMetadata,
            'params' => [
                'ContentType' => 'text/plain',
                'Metadata' => ['user-key' => 'user-value'],
            ],
            'before_initiate' => function ($command) use (&$initiateParams) {
                $initiateParams = $command->toArray();
            },
        ]);
        $uploader->upload();

        // Source metadata takes precedence over user-provided params when directive is COPY
        $this->assertSame('application/pdf', $initiateParams['ContentType']);
        $this->assertSame(['source-key' => 'source-value'], $initiateParams['Metadata']);
        $this->assertSame('max-age=3600', $initiateParams['CacheControl']);
    }

    public function testNonCopyableFieldsAreNotForwarded()
    {
        $client = $this->getTestClient('s3');
        $url = 'http://foo.s3.amazonaws.com/bar';
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $initiateParams = null;
        $sourceMetadata = new Result([
            'ContentLength' => 11 * self::MB,
            'ContentType' => 'application/pdf',
            'ETag' => '"abc123"',
            'LastModified' => '2025-01-01T00:00:00Z',
            'ServerSideEncryption' => 'aws:kms',
            'SSEKMSKeyId' => 'arn:aws:kms:us-east-1:123456789:key/abcd',
            'StorageClass' => 'STANDARD',
            'VersionId' => 'v1',
        ]);

        $uploader = new MultipartCopy($client, '/bucket/key', [
            'bucket' => 'foo',
            'key' => 'bar',
            'source_metadata' => $sourceMetadata,
            'before_initiate' => function ($command) use (&$initiateParams) {
                $initiateParams = $command->toArray();
            },
        ]);
        $uploader->upload();

        // These fields should NOT be forwarded to CreateMultipartUpload
        $this->assertArrayNotHasKey('ETag', $initiateParams);
        $this->assertArrayNotHasKey('LastModified', $initiateParams);
        $this->assertArrayNotHasKey('ServerSideEncryption', $initiateParams);
        $this->assertArrayNotHasKey('SSEKMSKeyId', $initiateParams);
        $this->assertArrayNotHasKey('StorageClass', $initiateParams);
        $this->assertArrayNotHasKey('VersionId', $initiateParams);
        $this->assertArrayNotHasKey('ContentLength', $initiateParams);
    }

    public function testMetadataDirectiveCaseInsensitive()
    {
        $client = $this->getTestClient('s3');
        $url = 'http://foo.s3.amazonaws.com/bar';
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $initiateParams = null;
        $sourceMetadata = new Result([
            'ContentLength' => 11 * self::MB,
            'ContentType' => 'text/html',
            'CacheControl' => 'no-cache',
        ]);

        // Test lowercase 'copy'
        $uploader = new MultipartCopy($client, '/bucket/key', [
            'bucket' => 'foo',
            'key' => 'bar',
            'source_metadata' => $sourceMetadata,
            'metadata_directive' => 'copy',
            'before_initiate' => function ($command) use (&$initiateParams) {
                $initiateParams = $command->toArray();
            },
        ]);
        $uploader->upload();

        $this->assertSame('no-cache', $initiateParams['CacheControl']);
        $this->assertSame('text/html', $initiateParams['ContentType']);
    }

    public function testEmptyMetadataFieldsAreNotCopied()
    {
        $client = $this->getTestClient('s3');
        $url = 'http://foo.s3.amazonaws.com/bar';
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $initiateParams = null;
        $sourceMetadata = new Result([
            'ContentLength' => 11 * self::MB,
            'ContentType' => 'text/plain',
            'CacheControl' => '',
            'ContentDisposition' => null,
            'Metadata' => [],
        ]);

        $uploader = new MultipartCopy($client, '/bucket/key', [
            'bucket' => 'foo',
            'key' => 'bar',
            'source_metadata' => $sourceMetadata,
            'before_initiate' => function ($command) use (&$initiateParams) {
                $initiateParams = $command->toArray();
            },
        ]);
        $uploader->upload();

        // Empty/null/falsy values should not be forwarded
        $this->assertArrayNotHasKey('CacheControl', $initiateParams);
        $this->assertArrayNotHasKey('ContentDisposition', $initiateParams);
        $this->assertArrayNotHasKey('Metadata', $initiateParams);
        // ContentType is set because it's non-empty
        $this->assertSame('text/plain', $initiateParams['ContentType']);
    }

    public function testInvalidMetadataDirectiveThrowsException()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
        ]);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid metadata_directive value 'INVALID'");

        $uploader = new MultipartCopy($client, '/bucket/key', [
            'bucket' => 'foo',
            'key' => 'bar',
            'source_metadata' => new Result(['ContentLength' => 11 * self::MB, 'ContentType' => 'text/plain']),
            'metadata_directive' => 'INVALID',
        ]);
        $uploader->upload();
    }

    public function testMetadataDirectiveReplaceLowercaseWorks()
    {
        $client = $this->getTestClient('s3');
        $url = 'http://foo.s3.amazonaws.com/bar';
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url])
        ]);

        $initiateParams = null;
        $sourceMetadata = new Result([
            'ContentLength' => 11 * self::MB,
            'ContentType' => 'application/pdf',
            'CacheControl' => 'max-age=3600',
            'Metadata' => ['key' => 'value'],
        ]);

        $uploader = new MultipartCopy($client, '/bucket/key', [
            'bucket' => 'foo',
            'key' => 'bar',
            'source_metadata' => $sourceMetadata,
            'metadata_directive' => 'replace',
            'before_initiate' => function ($command) use (&$initiateParams) {
                $initiateParams = $command->toArray();
            },
        ]);
        $uploader->upload();

        // ContentType still set by trait (from getSourceMimeType), but others suppressed
        $this->assertSame('application/pdf', $initiateParams['ContentType']);
        $this->assertArrayNotHasKey('CacheControl', $initiateParams);
        $this->assertArrayNotHasKey('Metadata', $initiateParams);
    }
}
