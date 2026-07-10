<?php
namespace Aws\Test\S3;

use Aws\Command;
use Aws\CommandInterface;
use Aws\Exception\MultipartUploadException;
use Aws\Middleware;
use Aws\Result;
use Aws\ResultInterface;
use Aws\S3\Exception\MultipartCopyAnnotationException;
use Aws\S3\Exception\S3Exception;
use Aws\S3\MultipartCopy;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(MultipartCopy::class)]
class MultipartCopyTest extends TestCase
{
    use UsesServiceTrait;

    const MB = 1048576;

    /**
     * Source-metadata fixture used by every test that pre-supplies a source
     * Result instead of letting the SDK call HeadObject. Keeps each test from
     * re-declaring the same 4 fields. (Inlined where richer source metadata
     * is needed for stronger assertions.)
     */
    private function srcMeta(array $extra = []): Result
    {
        return new Result($extra + [
            'ContentLength' => 11 * self::MB,
            'ContentType'   => 'application/pdf',
            'ETag'          => '"src-etag"',
            'VersionId'     => 'src-version',
        ]);
    }

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
        $clientUpper = $this->getTestClient('s3');
        $clientLower = $this->getTestClient('s3');
        $mpuResults = [
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://newBucket.s3.amazonaws.com/newKey']),
        ];
        $this->addMockResults($clientUpper, $mpuResults);
        $this->addMockResults($clientLower, $mpuResults);

        $captured = [];
        $capture = function ($command) use (&$captured) {
            $captured[] = $command->toArray();
        };

        (new MultipartCopy($clientUpper, '/bucket/key', [
            'Bucket'          => 'newBucket',
            'Key'             => 'newKey',
            'source_metadata' => $this->srcMeta(),
            'before_initiate' => $capture,
        ]))->upload();

        (new MultipartCopy($clientLower, '/bucket/key', [
            'bucket'          => 'newBucket',
            'key'             => 'newKey',
            'source_metadata' => $this->srcMeta(),
            'before_initiate' => $capture,
        ]))->upload();

        // Both produced the same CreateMultipartUpload params.
        $this->assertCount(2, $captured);
        $this->assertSame($captured[0], $captured[1]);
        // And both resolved to the destination Bucket/Key consistently.
        $this->assertSame('newBucket', $captured[0]['Bucket']);
        $this->assertSame('newKey',    $captured[0]['Key']);
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
        // WebsiteRedirectLocation is NOT copied. Matches CopyObject behavior.
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

    public function testCallerSuppliedMetadataDoesNotTriggerReplace()
    {
        // Caller-supplied params['Metadata'] does NOT auto-flip the directive.
        // Without an explicit metadata_directive, the resolver stays at COPY,
        // and source-metadata wins for every forwarded field including Metadata.
        // Caller must set metadata_directive='REPLACE' explicitly to opt in.
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

        // Source wins. Caller's Metadata and ContentType are clobbered.
        $this->assertSame('application/pdf', $initiateParams['ContentType']);
        $this->assertSame(['source-key' => 'source-value'], $initiateParams['Metadata']);
        $this->assertSame('max-age=3600', $initiateParams['CacheControl']);
        // MetadataDirective must NOT be stamped onto CreateMultipartUpload.
        // The field doesn't exist on that operation's request shape.
        $this->assertArrayNotHasKey('MetadataDirective', $initiateParams);
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

    public function testCopyDirectiveDropsCallerParamsWhenSourceFieldIsEmpty()
    {
        // Under metadata_directive=COPY, caller params for fields source is
        // empty on must not leak through.
        $client = $this->getTestClient('s3');
        $url = 'http://foo.s3.amazonaws.com/bar';
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['ETag' => 'A']),
            new Result(['ETag' => 'B']),
            new Result(['ETag' => 'C']),
            new Result(['Location' => $url]),
        ]);

        $initiateParams = null;
        // Source has ContentType only. Every other forwarded field is empty.
        $sourceMetadata = new Result([
            'ContentLength'      => 11 * self::MB,
            'ContentType'        => 'text/plain',
            'CacheControl'       => '',
            'ContentDisposition' => null,
            'ContentEncoding'    => null,
            'ContentLanguage'    => null,
            'Expires'            => null,
            'Metadata'           => [],
        ]);

        // Caller does not supply 'Metadata' (would auto-trigger REPLACE).
        $uploader = new MultipartCopy($client, '/bucket/key', [
            'bucket'             => 'foo',
            'key'                => 'bar',
            'source_metadata'    => $sourceMetadata,
            'metadata_directive' => 'COPY',
            'params'             => [
                'CacheControl'       => 'caller-cc',
                'ContentDisposition' => 'caller-cd',
                'ContentEncoding'    => 'caller-ce',
                'ContentLanguage'    => 'caller-cl',
                'Expires'            => 'caller-exp',
            ],
            'before_initiate' => function ($command) use (&$initiateParams) {
                $initiateParams = $command->toArray();
            },
        ]);
        $uploader->upload();

        $this->assertArrayNotHasKey('CacheControl',       $initiateParams);
        $this->assertArrayNotHasKey('ContentDisposition', $initiateParams);
        $this->assertArrayNotHasKey('ContentEncoding',    $initiateParams);
        $this->assertArrayNotHasKey('ContentLanguage',    $initiateParams);
        $this->assertArrayNotHasKey('Expires',            $initiateParams);
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

    public function testCopyDirectivesIssueTagAndAnnotationCalls()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            // Phase 1: source reads
            new Result(['TagSet' => [['Key' => 'Project', 'Value' => 'X']]]),  // GetObjectTagging
            new Result(['Annotations' => [                                     // ListObjectAnnotations
                ['AnnotationName' => 'note-1'],
                ['AnnotationName' => 'note-2'],
            ]]),
            new Result(['AnnotationPayload' => 'payload']),                    // GetObjectAnnotation #1
            new Result(['AnnotationPayload' => 'payload']),                    // GetObjectAnnotation #2
            // Phase 2: MPU
            new Result(['UploadId' => 'baz']),                                 // CreateMultipartUpload
            new Result(['CopyPartResult' => ['ETag' => 'A']]),                 // UploadPartCopy #1
            new Result(['CopyPartResult' => ['ETag' => 'B']]),                 // UploadPartCopy #2
            new Result(['CopyPartResult' => ['ETag' => 'C']]),                 // UploadPartCopy #3
            new Result(['Location' => 'http://foo.s3.amazonaws.com/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),  // CompleteMultipartUpload
            // Phase 3: destination writes
            new Result(['VersionId' => 'dst-version']),                        // PutObjectTagging
            new Result([]),                                                    // PutObjectAnnotation #1
            new Result([]),                                                    // PutObjectAnnotation #2
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'COPY',
        ]);
        $uploader->upload();

        $counts = array_count_values($observed);
        $this->assertSame(1, $counts['GetObjectTagging']);
        $this->assertSame(1, $counts['ListObjectAnnotations']);
        $this->assertSame(2, $counts['GetObjectAnnotation']);
        $this->assertSame(1, $counts['PutObjectTagging']);
        $this->assertSame(2, $counts['PutObjectAnnotation']);
    }

    public function testTagsDirectiveCopyPropagatesSourceTagsToDestination()
    {
        $client = $this->getTestClient('s3');
        $tagSet = [['Key' => 'Project', 'Value' => 'X'], ['Key' => 'Env', 'Value' => 'prod']];
        $this->addMockResults($client, [
            new Result(['TagSet' => $tagSet]),                                 // GetObjectTagging
            new Result(['Annotations' => []]),                                 // ListObjectAnnotations
            new Result(['UploadId' => 'baz']),                                 // CreateMultipartUpload
            new Result(['CopyPartResult' => ['ETag' => 'A']]),                 // UploadPartCopy x3
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),  // CompleteMultipartUpload
            new Result([]),                                                    // PutObjectTagging
        ]);

        $putTaggingParams = null;
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$putTaggingParams) {
                if ($cmd->getName() === 'PutObjectTagging') {
                    $putTaggingParams = $cmd->toArray();
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'COPY',
        ]);
        $uploader->upload();

        $this->assertNotNull($putTaggingParams);
        $this->assertSame('foo', $putTaggingParams['Bucket']);
        $this->assertSame('bar', $putTaggingParams['Key']);
        $this->assertSame($tagSet, $putTaggingParams['Tagging']['TagSet']);
        $this->assertSame('dst-version', $putTaggingParams['VersionId']);
    }

    public function testTagsDirectiveCopySkipsPutTaggingWhenSourceHasNoTags()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),                                      // GetObjectTagging
            new Result(['Annotations' => []]),                                 // ListObjectAnnotations
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar']),
        ]);

        $putTaggingCount = 0;
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$putTaggingCount) {
                if ($cmd->getName() === 'PutObjectTagging') {
                    $putTaggingCount++;
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'COPY',
        ]);
        $uploader->upload();

        // Empty source TagSet → no Phase-3 PutObjectTagging.
        $this->assertSame(0, $putTaggingCount);
    }

    public function testAnnotationsDirectiveCopyPropagatesAnnotationsToDestination()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),
            new Result(['Annotations' => [['AnnotationName' => 'note-a']]]),
            new Result(['AnnotationPayload' => 'BODY-A']),
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            new Result([]),                                                    // PutObjectAnnotation
        ]);

        $putAnnot = null;
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$putAnnot) {
                if ($cmd->getName() === 'PutObjectAnnotation') {
                    $putAnnot = $cmd->toArray();
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'COPY',
        ]);
        $uploader->upload();

        $this->assertNotNull($putAnnot);
        $this->assertSame('foo',          $putAnnot['Bucket']);
        $this->assertSame('bar',          $putAnnot['Key']);
        $this->assertSame('note-a',       $putAnnot['AnnotationName']);
        $this->assertSame('BODY-A',       $putAnnot['AnnotationPayload']);
        $this->assertSame('dst-version',  $putAnnot['VersionId']);
        $this->assertSame('dst-etag',     $putAnnot['ObjectIfMatch']);
    }

    public function testDefaultDirectivesSkipTagsAndAnnotations()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar']),
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
        ]);
        $uploader->upload();

        $counts = array_count_values($observed);
        $this->assertArrayNotHasKey('GetObjectTagging', $counts);
        $this->assertArrayNotHasKey('ListObjectAnnotations', $counts);
        $this->assertArrayNotHasKey('PutObjectTagging', $counts);
        $this->assertArrayNotHasKey('PutObjectAnnotation', $counts);
    }

    public function testOmittingDirectivesPreservesLegacyDefault()
    {
        // No directives supplied. Must behave like the legacy default
        // (no Phase 1 tag/annotation reads, no Phase 3 writes).
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar']),
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
        ]);
        $uploader->upload();

        $counts = array_count_values($observed);
        $this->assertArrayNotHasKey('GetObjectTagging',      $counts);
        $this->assertArrayNotHasKey('ListObjectAnnotations', $counts);
    }

    public function testReplaceUnspecifiedExcludeSkipsAuxReadsAndForcesReplace()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar']),
        ]);

        $initiateParams = null;
        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        // Use a richer source-metadata fixture so the "REPLACE means we don't
        // fold in source-side fields" check is meaningful.
        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta([
                'CacheControl'       => 'max-age=3600',
                'ContentDisposition' => 'attachment; filename="src.pdf"',
                'ContentEncoding'    => 'gzip',
                'ContentLanguage'    => 'en-US',
                'Expires'            => 'Thu, 01 Dec 2025 16:00:00 GMT',
                'Metadata'           => ['source-key' => 'source-value'],
            ]),
            'metadata_directive'    => 'REPLACE',
            'tags_directive'        => 'UNSPECIFIED',
            'annotations_directive' => 'EXCLUDE',
            'before_initiate' => function ($cmd) use (&$initiateParams) {
                $initiateParams = $cmd->toArray();
            },
        ]);
        $uploader->upload();

        // metadata_directive=REPLACE means none of the
        // source-side fields get folded into the initiate.
        $this->assertArrayNotHasKey('MetadataDirective', $initiateParams);
        $this->assertArrayNotHasKey('CacheControl',       $initiateParams);
        $this->assertArrayNotHasKey('ContentDisposition', $initiateParams);
        $this->assertArrayNotHasKey('ContentEncoding',    $initiateParams);
        $this->assertArrayNotHasKey('ContentLanguage',    $initiateParams);
        $this->assertArrayNotHasKey('Expires',            $initiateParams);
        $this->assertArrayNotHasKey('Metadata',           $initiateParams);
        // ContentType is still set by the trait via getSourceMimeType.
        $this->assertSame('application/pdf', $initiateParams['ContentType']);

        // Phase 1 aux reads are skipped when both directives opt out.
        $counts = array_count_values($observed);
        $this->assertArrayNotHasKey('GetObjectTagging',      $counts);
        $this->assertArrayNotHasKey('ListObjectAnnotations', $counts);
    }

    public function testHeadObjectDerivedVersionIdIsNotPinnedOnUploadPartCopy()
    {
        // When the user does NOT specify a sourceVersionId, the SDK must NOT
        // attach the HeadObject-derived versionId to UploadPartCopy requests.
        // Only the ETag conditional (CopySourceIfMatch) is used for consistency.
        // Regression test for: https://github.com/aws/aws-sdk-java-v2/issues/7117
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result([
                'ContentLength' => 11 * self::MB,
                'ContentType'   => 'text/plain',
                'ETag'          => '"src-etag"',
                'VersionId'     => 'src-version',
            ]),                                                                // HeadObject
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar']),
        ]);

        $uploadPartCopyCmds = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$uploadPartCopyCmds) {
                if ($cmd->getName() === 'UploadPartCopy') {
                    $uploadPartCopyCmds[] = $cmd->toArray();
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket' => 'foo',
            'key'    => 'bar',
        ]);
        $uploader->upload();

        $this->assertNotEmpty($uploadPartCopyCmds);
        foreach ($uploadPartCopyCmds as $cmd) {
            $this->assertStringNotContainsString('?versionId=', $cmd['CopySource'],
                'UploadPartCopy must NOT attach HeadObject-derived versionId');
            $this->assertSame('"src-etag"', $cmd['CopySourceIfMatch']);
        }
    }

    public function testUserProvidedVersionIdIsPinnedOnUploadPartCopy()
    {
        // When the user explicitly provides a versionId via the source string,
        // it MUST be attached to UploadPartCopy requests.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result([
                'ContentLength' => 11 * self::MB,
                'ContentType'   => 'text/plain',
                'ETag'          => '"src-etag"',
                'VersionId'     => 'user-version',
            ]),
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar']),
        ]);

        $uploadPartCopyCmds = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$uploadPartCopyCmds) {
                if ($cmd->getName() === 'UploadPartCopy') {
                    $uploadPartCopyCmds[] = $cmd->toArray();
                }
            }
        ));

        // User explicitly provides versionId in the source string
        $uploader = new MultipartCopy($client, '/srcbucket/srckey?versionId=user-version', [
            'bucket' => 'foo',
            'key'    => 'bar',
        ]);
        $uploader->upload();

        $this->assertNotEmpty($uploadPartCopyCmds);
        foreach ($uploadPartCopyCmds as $cmd) {
            $this->assertStringContainsString('?versionId=user-version', $cmd['CopySource']);
            $this->assertSame('"src-etag"', $cmd['CopySourceIfMatch']);
        }
    }

    public function testCopySourceIfMatchUsesPreSuppliedSourceMetadataETag()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar']),
        ]);

        $uploadPartCopyCmds = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$uploadPartCopyCmds) {
                if ($cmd->getName() === 'UploadPartCopy') {
                    $uploadPartCopyCmds[] = $cmd->toArray();
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
        ]);
        $uploader->upload();

        $this->assertNotEmpty($uploadPartCopyCmds);
        foreach ($uploadPartCopyCmds as $cmd) {
            $this->assertSame('"src-etag"', $cmd['CopySourceIfMatch']);
        }
    }

    public function testSourceTagAndAnnotationReadsUsePinnedVersionId()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),                                      // GetObjectTagging
            new Result(['Annotations' => [['AnnotationName' => 'a']]]),        // ListObjectAnnotations
            new Result(['AnnotationPayload' => 'p']),                          // GetObjectAnnotation
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            new Result([]),                                                    // PutObjectAnnotation
        ]);

        $captured = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$captured) {
                $captured[$cmd->getName()] = $cmd->toArray();
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'COPY',
        ]);
        $uploader->upload();

        $this->assertSame('src-version', $captured['GetObjectTagging']['VersionId']);

        // ListObjectAnnotations and GetObjectAnnotation use VersionId only,
        // not ObjectIfMatch.
        $this->assertSame('src-version', $captured['ListObjectAnnotations']['VersionId']);
        $this->assertNull($captured['ListObjectAnnotations']['ObjectIfMatch'] ?? null);

        $this->assertSame('src-version', $captured['GetObjectAnnotation']['VersionId']);
        $this->assertNull($captured['GetObjectAnnotation']['ObjectIfMatch'] ?? null);
    }

    public function testCallerSuppliedTaggingDoesNotTriggerReplace()
    {
        // Caller-supplied params['Tagging'] does NOT auto-flip tags_directive.
        // Callers who need their Tagging applied must opt in via
        // tags_directive='REPLACE'.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar']),
        ]);

        $observed = [];
        $initiate = null;
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed, &$initiate) {
                $observed[] = $cmd->getName();
                if ($cmd->getName() === 'CreateMultipartUpload') {
                    $initiate = $cmd->toArray();
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'params'          => ['Tagging' => 'Project=Override&Env=prod'],
        ]);
        $uploader->upload();

        $this->assertNotContains('GetObjectTagging', $observed);
        $this->assertNotContains('PutObjectTagging', $observed);
        $this->assertNotNull($initiate);
        $this->assertNull(
            $initiate['Tagging'] ?? null,
            'UNSPECIFIED must drop caller-supplied Tagging from '
            . 'CreateMultipartUpload — MPU never carries Tagging on initiate.'
        );
    }

    public function testAnnotationPutTransientFailureIsRetried()
    {
        $client = $this->getTestClient('s3');
        $putAttempts = 0;
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),                                      // GetObjectTagging
            new Result(['Annotations' => [['AnnotationName' => 'note-1']]]),   // ListObjectAnnotations
            new Result(['AnnotationPayload' => 'P']),                          // GetObjectAnnotation
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            // 1st PutObjectAnnotation: transient 500 (callable to fabricate
            // an exception with the right Command bound)
            function (CommandInterface $cmd, $req) use (&$putAttempts) {
                $putAttempts++;
                return new S3Exception('500 boom', $cmd, [
                    'code'     => 'InternalError',
                    'response' => new Psr7\Response(500),
                ]);
            },
            // 2nd PutObjectAnnotation: success
            function (CommandInterface $cmd) use (&$putAttempts) {
                $putAttempts++;
                return new Result([]);
            },
        ]);

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'COPY',
        ]);
        $uploader->upload();

        $this->assertSame(2, $putAttempts);
    }

    public function testAnnotationPutPartialFailureSurfacesPerKeyError()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),
            new Result(['Annotations' => [
                ['AnnotationName' => 'good'],
                ['AnnotationName' => 'bad'],
            ]]),
            new Result(['AnnotationPayload' => 'P']),                          // GetObjectAnnotation #1
            new Result(['AnnotationPayload' => 'P']),                          // GetObjectAnnotation #2
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            // PutObjectAnnotation 'good' succeeds
            new Result([]),
            // PutObjectAnnotation 'bad' fails with 403 (non-retryable)
            function (CommandInterface $cmd) {
                return new S3Exception('forbidden', $cmd, [
                    'code'     => 'AccessDenied',
                    'response' => new Psr7\Response(403),
                ]);
            },
        ]);

        // Phase-3 partial failure surfaces as MultipartCopyAnnotationException
        // (a MultipartUploadException subclass), with both the failed and
        // succeeded annotation names exposed for programmatic introspection.
        try {
            $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
                'bucket'          => 'foo',
                'key'             => 'bar',
                'source_metadata' => $this->srcMeta(),
                'tags_directive'        => 'COPY',
                'annotations_directive' => 'COPY',
            ]);
            $uploader->upload();
            $this->fail('Expected MultipartCopyAnnotationException');
        } catch (MultipartCopyAnnotationException $e) {
            $this->assertSame(['bad'], array_keys($e->getFailedAnnotations()));
            $this->assertSame(['good'], $e->getSucceededAnnotations());
            $this->assertInstanceOf(
                S3Exception::class,
                $e->getFailedAnnotations()['bad']
            );
            $this->assertStringContainsString('bad', $e->getMessage());
            // Backwards-compat: callers catching the parent type also catch this.
            $this->assertInstanceOf(MultipartUploadException::class, $e);
        }
    }

    // ----- Error-table edge cases -----

    public function testHeadObject403AbortsBeforeMultipartUploadInitiates()
    {
        // The constructor eagerly resolves source size via HeadObject. A 403
        // here surfaces as an S3Exception out of the constructor. The MPU
        // never initiates.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            function (CommandInterface $cmd) {
                return new S3Exception('forbidden', $cmd, [
                    'code'     => 'AccessDenied',
                    'response' => new Psr7\Response(403),
                ]);
            },
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $this->expectException(S3Exception::class);

        try {
            new MultipartCopy($client, '/srcbucket/srckey', [
                'bucket' => 'foo',
                'key'    => 'bar',
            ]);
        } finally {
            $this->assertSame(['HeadObject'], $observed);
        }
    }

    public function testListObjectAnnotations412AbortsBeforeMultipartUploadInitiates()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),                                      // GetObjectTagging
            // ListObjectAnnotations: 412
            function (CommandInterface $cmd) {
                return new S3Exception('source mutated', $cmd, [
                    'code'     => 'PreconditionFailed',
                    'response' => new Psr7\Response(412),
                ]);
            },
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $this->expectException(MultipartUploadException::class);

        try {
            $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
                'bucket'          => 'foo',
                'key'             => 'bar',
                'source_metadata' => $this->srcMeta(),
                'tags_directive'        => 'COPY',
                'annotations_directive' => 'COPY',
            ]);
            $uploader->upload();
        } finally {
            $this->assertSame(
                ['GetObjectTagging', 'ListObjectAnnotations'],
                $observed
            );
        }
    }

    public function testUploadPartCopy412AbortsTheMultipartUpload()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),                                 // CreateMultipartUpload
            // 1st UploadPartCopy: 412
            function (CommandInterface $cmd) {
                return new S3Exception('source ETag mismatch', $cmd, [
                    'code'     => 'PreconditionFailed',
                    'response' => new Psr7\Response(412),
                ]);
            },
            // Subsequent attempted parts also fail with 412 before the pool
            // gives up. Reuse the same factory.
            function (CommandInterface $cmd) {
                return new S3Exception('source ETag mismatch', $cmd, [
                    'code'     => 'PreconditionFailed',
                    'response' => new Psr7\Response(412),
                ]);
            },
            function (CommandInterface $cmd) {
                return new S3Exception('source ETag mismatch', $cmd, [
                    'code'     => 'PreconditionFailed',
                    'response' => new Psr7\Response(412),
                ]);
            },
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $this->expectException(MultipartUploadException::class);

        try {
            $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
                'bucket'          => 'foo',
                'key'             => 'bar',
                'source_metadata' => $this->srcMeta(),
            ]);
            $uploader->upload();
        } finally {
            // Initiate ran, parts attempted, but no Complete.
            $counts = array_count_values($observed);
            $this->assertSame(1, $counts['CreateMultipartUpload']);
            $this->assertGreaterThan(0, $counts['UploadPartCopy']);
            $this->assertArrayNotHasKey('CompleteMultipartUpload', $counts);
        }
    }

    public function testGetObjectTagging403AbortsBeforeMultipartUploadInitiates()
    {
        // Under tags_directive=COPY + annotations_directive=COPY, GetObjectTagging and ListObjectAnnotations
        // run concurrently in Phase 1 (Promise\Utils::all). The 403 on
        // GetObjectTagging fails the whole Phase-1 stage, surfacing as
        // MultipartUploadException, but ListObjectAnnotations is dispatched
        // alongside it (the failure is observed when Utils::all resolves,
        // not before its peers leave the wire).
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            // GetObjectTagging: 403
            function (CommandInterface $cmd) {
                return new S3Exception('no s3:GetObjectTagging', $cmd, [
                    'code'     => 'AccessDenied',
                    'response' => new Psr7\Response(403),
                ]);
            },
            // ListObjectAnnotations: empty list. Order in the queue follows
            // the order PHP iterates the `$concurrent` array in promise().
            new Result(['Annotations' => []]),
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $this->expectException(MultipartUploadException::class);

        try {
            $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
                'bucket'          => 'foo',
                'key'             => 'bar',
                'source_metadata' => $this->srcMeta(),
                'tags_directive'        => 'COPY',
                'annotations_directive' => 'COPY',
            ]);
            $uploader->upload();
        } finally {
            // GetObjectTagging fired and failed. ListObjectAnnotations also
            // fired (concurrent) but its result is discarded. Phase 2/3 never
            // ran.
            $counts = array_count_values($observed);
            $this->assertSame(1, $counts['GetObjectTagging']);
            $this->assertSame(1, $counts['ListObjectAnnotations']);
            $this->assertArrayNotHasKey('CreateMultipartUpload', $counts);
        }
    }

    public function testPutObjectAnnotation412IsNotRetried()
    {
        $client = $this->getTestClient('s3');
        $putAttempts = 0;
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),
            new Result(['Annotations' => [['AnnotationName' => 'note-1']]]),
            new Result(['AnnotationPayload' => 'P']),
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            // PutObjectAnnotation: 412 (non-retryable)
            function (CommandInterface $cmd) use (&$putAttempts) {
                $putAttempts++;
                return new S3Exception('dest ETag mismatch', $cmd, [
                    'code'     => 'PreconditionFailed',
                    'response' => new Psr7\Response(412),
                ]);
            },
        ]);

        try {
            $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
                'bucket'          => 'foo',
                'key'             => 'bar',
                'source_metadata' => $this->srcMeta(),
                'tags_directive'        => 'COPY',
                'annotations_directive' => 'COPY',
            ]);
            $uploader->upload();
            $this->fail('Expected MultipartCopyAnnotationException for 412');
        } catch (MultipartCopyAnnotationException $e) {
            $this->assertSame(1, $putAttempts);
            $this->assertSame(['note-1'], array_keys($e->getFailedAnnotations()));
            $this->assertSame([], $e->getSucceededAnnotations());
            $this->assertSame(412, $e->getFailedAnnotations()['note-1']->getStatusCode());
        }
    }

    // ----- Directive permutations (tags_directive / annotations_directive) -----

    public function testTagsDirectiveCopyExplicitlyEnablesTagPhases()
    {
        // With no tags_directive, tags are skipped. Explicit
        // tags_directive=COPY enables the tag phases.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['TagSet' => [['Key' => 'A', 'Value' => '1']]]),        // GetObjectTagging
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            new Result([]),                                                    // PutObjectTagging
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'  => 'COPY',
        ]);
        $uploader->upload();

        $counts = array_count_values($observed);
        $this->assertSame(1, $counts['GetObjectTagging']);
        $this->assertSame(1, $counts['PutObjectTagging']);
        // Annotations stay off since annotations_directive defaults to UNSPECIFIED.
        $this->assertArrayNotHasKey('ListObjectAnnotations', $counts);
    }

    public function testTagsDirectiveReplaceWritesCallerTagsToDestination()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            new Result([]),                                                    // PutObjectTagging
        ]);

        $observed = [];
        $putTagging = null;
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed, &$putTagging) {
                $observed[] = $cmd->getName();
                if ($cmd->getName() === 'PutObjectTagging') {
                    $putTagging = $cmd->toArray();
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'  => 'REPLACE',
            'params'          => ['Tagging' => 'k=v'],
        ]);
        $uploader->upload();

        $this->assertNotContains('GetObjectTagging', $observed);
        $this->assertNotNull($putTagging);
        $this->assertSame(
            [['Key' => 'k', 'Value' => 'v']],
            $putTagging['Tagging']['TagSet']
        );
    }

    public function testAnnotationsDirectiveExcludeOverridesCopy()
    {
        // annotations_directive=COPY would enable annotations.
        // Explicit annotations_directive=EXCLUDE turns them off.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),                                      // GetObjectTagging
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'                => 'foo',
            'key'                   => 'bar',
            'source_metadata'       => $this->srcMeta(),
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'EXCLUDE',
        ]);
        $uploader->upload();

        $counts = array_count_values($observed);
        // Tags still run (tags_directive=COPY).
        $this->assertSame(1, $counts['GetObjectTagging']);
        // Annotations are excluded.
        $this->assertArrayNotHasKey('ListObjectAnnotations', $counts);
        $this->assertArrayNotHasKey('GetObjectAnnotation',   $counts);
        $this->assertArrayNotHasKey('PutObjectAnnotation',   $counts);
    }

    public function testAnnotationsDirectiveExcludeSkipsAnnotationCalls()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar']),
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'metadata_directive'    => 'REPLACE',
            'tags_directive'        => 'UNSPECIFIED',
            'annotations_directive' => 'EXCLUDE',
        ]);
        $uploader->upload();

        $counts = array_count_values($observed);
        $this->assertArrayNotHasKey('GetObjectTagging',      $counts);
        $this->assertArrayNotHasKey('ListObjectAnnotations', $counts);
        $this->assertArrayNotHasKey('PutObjectTagging',      $counts);
        $this->assertArrayNotHasKey('PutObjectAnnotation',   $counts);
    }

    public function testInvalidTagsDirectiveThrows()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [new Result(['UploadId' => 'baz'])]);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid tags_directive value 'BOGUS'");

        $uploader = new MultipartCopy($client, '/bucket/key', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'  => 'bogus',
        ]);
        $uploader->upload();
    }

    public function testInvalidAnnotationsDirectiveThrows()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [new Result(['UploadId' => 'baz'])]);

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Invalid annotations_directive value 'BOGUS'");

        $uploader = new MultipartCopy($client, '/bucket/key', [
            'bucket'                => 'foo',
            'key'                   => 'bar',
            'source_metadata'       => $this->srcMeta(),
            'annotations_directive' => 'bogus',
        ]);
        $uploader->upload();
    }

    public function testCallerSuppliedTaggingIsStrippedFromCreateMultipartUpload()
    {
        // Phase 2 strips Tagging from CreateMultipartUpload because tags are
        // written separately in Phase 3 to keep the initiate request headers
        // small. When tags_directive resolves to REPLACE (caller-supplied
        // params['Tagging']), the Tagging value MUST NOT appear on
        // CreateMultipartUpload. It is written only in Phase 3 via
        // PutObjectTagging.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            new Result([]),                                                    // PutObjectTagging
        ]);

        $initiate = null;
        $putTagging = null;
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$initiate, &$putTagging) {
                if ($cmd->getName() === 'CreateMultipartUpload') {
                    $initiate = $cmd->toArray();
                }
                if ($cmd->getName() === 'PutObjectTagging') {
                    $putTagging = $cmd->toArray();
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'  => 'REPLACE',
            'params'          => ['Tagging' => 'k=v&Project=X'],
        ]);
        $uploader->upload();

        $this->assertNotNull($initiate);
        $this->assertNull(
            $initiate['Tagging'] ?? null,
            'Tagging must not be forwarded to CreateMultipartUpload when '
            . 'Phase 3 will PUT it (REPLACE).'
        );

        // And it MUST still land on PutObjectTagging.
        $this->assertNotNull($putTagging);
        $this->assertSame(
            [
                ['Key' => 'k',       'Value' => 'v'],
                ['Key' => 'Project', 'Value' => 'X'],
            ],
            $putTagging['Tagging']['TagSet']
        );
    }

    public function testTagsDirectiveCopyDoesNotForwardTaggingToCreateMultipartUpload()
    {
        // Under tags_directive=COPY, even
        // though the source-tag set is fetched and PUT in Phase 3, no Tagging
        // value should ever ride along on CreateMultipartUpload.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['TagSet' => [['Key' => 'Project', 'Value' => 'X']]]),
            new Result(['Annotations' => []]),
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            new Result([]),                                                    // PutObjectTagging
        ]);

        $initiate = null;
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$initiate) {
                if ($cmd->getName() === 'CreateMultipartUpload') {
                    $initiate = $cmd->toArray();
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'COPY',
        ]);
        $uploader->upload();

        $this->assertNotNull($initiate);
        $this->assertNull(
            $initiate['Tagging'] ?? null,
            'Tagging must not be forwarded to CreateMultipartUpload when '
            . 'tags_directive resolves to COPY.'
        );
    }

    public function testTagsDirectiveCopyWithCallerTaggingStillStripsItFromInitiate()
    {
        // Belt-and-suspenders: an explicit tags_directive=COPY combined with
        // a caller-supplied params.Tagging (an unusual combination) must
        // still strip Tagging from CreateMultipartUpload.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['TagSet' => [['Key' => 'Source', 'Value' => 'Yes']]]),
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            new Result([]),
        ]);

        $initiate = null;
        $putTagging = null;
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$initiate, &$putTagging) {
                if ($cmd->getName() === 'CreateMultipartUpload') {
                    $initiate = $cmd->toArray();
                }
                if ($cmd->getName() === 'PutObjectTagging') {
                    $putTagging = $cmd->toArray();
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'  => 'COPY',
            'params'          => ['Tagging' => 'leak=please'],
        ]);
        $uploader->upload();

        $this->assertNotNull($initiate);
        $this->assertNull($initiate['Tagging'] ?? null);

        // Phase 3 still PUTs the source tags, not the caller's Tagging.
        $this->assertNotNull($putTagging);
        $this->assertSame(
            [['Key' => 'Source', 'Value' => 'Yes']],
            $putTagging['Tagging']['TagSet']
        );
    }

    public function testTagsDirectiveUnspecifiedDropsCallerTaggingFromInitiate()
    {
       // When tags_directive resolves to UNSPECIFIED
        // (the default), there is no Phase 3 tag write AND any caller-supplied
        // params['Tagging'] is dropped from the initiate. Callers who need
        // their Tagging applied to the destination must opt in via
        // tags_directive='REPLACE'.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar']),
        ]);

        $initiate = null;
        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$initiate, &$observed) {
                $observed[] = $cmd->getName();
                if ($cmd->getName() === 'CreateMultipartUpload') {
                    $initiate = $cmd->toArray();
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'  => 'UNSPECIFIED',
            'params'          => ['Tagging' => 'dropped=yes'],
        ]);
        $uploader->upload();

        $this->assertNotNull($initiate);
        $this->assertNull(
            $initiate['Tagging'] ?? null,
            'UNSPECIFIED must drop caller-supplied Tagging from '
            . 'CreateMultipartUpload — MPU never carries Tagging on initiate.'
        );
        // No Phase 1 read, no Phase 3 write.
        $this->assertNotContains('GetObjectTagging', $observed);
        $this->assertNotContains('PutObjectTagging', $observed);
    }

    public function testResumePathReplaysPhase3WhenStateRetainsDirectives()
    {
        // A resumed MultipartCopy honors the original
        // launch's directives without the caller having to re-specify them
        // on the resume call. The directives are stored on UploadState at
        // launch time and merged back into config on resume.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            // getStateFromService → ListParts
            new Result(['Parts' => [
                ['PartNumber' => 1, 'ETag' => 'A', 'Size' => 5 * self::MB],
                ['PartNumber' => 2, 'ETag' => 'B', 'Size' => 5 * self::MB],
            ]]),
            // Resume's coroutine: HeadObject, then Phase 1 reads
            new Result([
                'ContentLength' => 11 * self::MB,
                'ContentType'   => 'text/plain',
                'ETag'          => '"src-etag"',
                'VersionId'     => 'src-version',
            ]),
            new Result(['TagSet' => [['Key' => 'K', 'Value' => 'V']]]),
            new Result(['Annotations' => [['AnnotationName' => 'note-1']]]),
            new Result(['AnnotationPayload' => 'BODY']),
            // Phase 2: state holds parts 1+2 (5 MB each). Source is 11 MB
            // ⇒ 3 parts ⇒ part 3 still needs uploading on resume.
            new Result(['CopyPartResult' => ['ETag' => 'C']]),                 // UploadPartCopy #3
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),  // CompleteMultipartUpload
            // Phase 3
            new Result([]),                                                    // PutObjectTagging
            new Result([]),                                                    // PutObjectAnnotation
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        // Caller resumes from a state launched with COPY directives.
        // The resume call passes ONLY 'state'.
        $state = MultipartCopy::getStateFromService(
            $client,
            'foo',
            'bar',
            'baz',
            ['tags_directive' => 'COPY', 'annotations_directive' => 'COPY']
        );
        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'state' => $state,
        ]);
        $uploader->upload();

        // Phase 3 ran end-to-end as if the COPY directives were re-supplied.
        $counts = array_count_values($observed);
        $this->assertSame(1, $counts['GetObjectTagging']);
        $this->assertSame(1, $counts['PutObjectTagging']);
        $this->assertSame(1, $counts['ListObjectAnnotations']);
        $this->assertSame(1, $counts['GetObjectAnnotation']);
        $this->assertSame(1, $counts['PutObjectAnnotation']);
    }

    public function testResumeCallerCanOverrideStoredDirectives()
    {
        // The caller's resume-time directives win over what the state
        // remembers, so a resumed copy can opt out of Phase 3 even if the
        // original launch had COPY directives.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            // getStateFromService → ListParts
            new Result(['Parts' => [
                ['PartNumber' => 1, 'ETag' => 'A', 'Size' => 5 * self::MB],
                ['PartNumber' => 2, 'ETag' => 'B', 'Size' => 5 * self::MB],
            ]]),
            // Resume coroutine: HeadObject (no Phase 1 reads under metadata-directive)
            new Result([
                'ContentLength' => 11 * self::MB,
                'ContentType'   => 'text/plain',
            ]),
            // Part 3 still needs uploading (state holds 1+2 at 5 MB each).
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            // CompleteMultipartUpload (no Phase 3 under metadata-directive)
            new Result(['Location' => 'http://foo/bar']),
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $state = MultipartCopy::getStateFromService(
            $client,
            'foo',
            'bar',
            'baz',
            ['tags_directive' => 'COPY', 'annotations_directive' => 'COPY']
        );
        // Override on resume: switch to legacy default with no Phase 3 work.
        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'state'                 => $state,
            'tags_directive'        => 'UNSPECIFIED',
            'annotations_directive' => 'UNSPECIFIED',
        ]);
        $uploader->upload();

        $this->assertNotContains('GetObjectTagging',      $observed);
        $this->assertNotContains('ListObjectAnnotations', $observed);
    }

    public function testNullAnnotationPayloadIsSkippedAndDoesNotFail()
    {
        // PutObjectAnnotation requires a payload between 1
        // byte and 1 MiB. A null/empty source body has nothing meaningful
        // to copy, so skip cleanly so it doesn't appear in the per-key
        // failure list.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),
            new Result(['Annotations' => [
                ['AnnotationName' => 'good'],
                ['AnnotationName' => 'empty'],
            ]]),
            new Result(['AnnotationPayload' => 'BODY']),                       // good
            new Result([]),                                                    // empty (no AnnotationPayload key)
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            new Result([]),                                                    // PutObjectAnnotation 'good'
        ]);

        $observed = [];
        $putAnnotNames = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed, &$putAnnotNames) {
                $observed[] = $cmd->getName();
                if ($cmd->getName() === 'PutObjectAnnotation') {
                    $putAnnotNames[] = $cmd['AnnotationName'];
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'COPY',
        ]);
        $uploader->upload();

        // Both GETs ran, but only the 'good' one became a PUT.
        $this->assertSame(2, array_count_values($observed)['GetObjectAnnotation']);
        $this->assertSame(['good'], $putAnnotNames);
    }

    public function testUnversionedSourceOmitsVersionIdEverywhere()
    {
        // HeadObject on an unversioned bucket returns no VersionId. None of
        // the downstream commands should carry a VersionId or a
        // ?versionId= query string.
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result([                                                       // HeadObject
                'ContentLength' => 11 * self::MB,
                'ContentType'   => 'text/plain',
                'ETag'          => '"src-etag"',
                // no VersionId
            ]),
            new Result(['TagSet' => []]),
            new Result(['Annotations' => [['AnnotationName' => 'a']]]),
            new Result(['AnnotationPayload' => 'p']),
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar', 'ETag' => 'dst-etag']),
            new Result([]),                                                    // PutObjectAnnotation
        ]);

        $captured = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$captured) {
                $captured[$cmd->getName()][] = $cmd->toArray();
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'     => 'foo',
            'key'        => 'bar',
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'COPY',
        ]);
        $uploader->upload();

        foreach ($captured['UploadPartCopy'] ?? [] as $cmd) {
            $this->assertStringNotContainsString('?versionId=', $cmd['CopySource']);
        }
        $this->assertNull($captured['GetObjectTagging'][0]['VersionId']      ?? null);
        $this->assertNull($captured['ListObjectAnnotations'][0]['VersionId'] ?? null);
        $this->assertNull($captured['GetObjectAnnotation'][0]['VersionId']   ?? null);
    }

    public function testGetObjectAnnotation412MidLoopAbortsBeforeMpuInitiates()
    {
        // First GetObjectAnnotation succeeds. Second returns 412
        // (precondition failed: source mutated mid-loop).
        // This aborts immediately. No CreateMultipartUpload, no UploadPartCopy.
        $client = $this->getTestClient('s3');
        $getCount = 0;
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),
            new Result(['Annotations' => [
                ['AnnotationName' => 'first'],
                ['AnnotationName' => 'second'],
            ]]),
            // GetObjectAnnotation #1: succeed
            function (CommandInterface $cmd) use (&$getCount) {
                $getCount++;
                return new Result(['AnnotationPayload' => 'BODY-1']);
            },
            // GetObjectAnnotation #2: 412
            function (CommandInterface $cmd) use (&$getCount) {
                $getCount++;
                return new S3Exception('source mutated', $cmd, [
                    'code'     => 'PreconditionFailed',
                    'response' => new Psr7\Response(412),
                ]);
            },
        ]);

        $observed = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$observed) {
                $observed[] = $cmd->getName();
            }
        ));

        $this->expectException(MultipartUploadException::class);

        try {
            $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
                'bucket'          => 'foo',
                'key'             => 'bar',
                'source_metadata' => $this->srcMeta(),
                'tags_directive'        => 'COPY',
                'annotations_directive' => 'COPY',
            ]);
            $uploader->upload();
        } finally {
            $this->assertSame(2, $getCount);
            $counts = array_count_values($observed);
            $this->assertArrayNotHasKey('CreateMultipartUpload', $counts);
            $this->assertArrayNotHasKey('UploadPartCopy',        $counts);
            $this->assertArrayNotHasKey('PutObjectAnnotation',   $counts);
        }
    }

    public function testAnnotationPutRetriesSetHttpDelayOnTheCommand()
    {
        // The retry between attempts should drive the wait through the SDK's
        // @http.delay mechanism (matches RetryMiddleware et al.) rather than
        // blocking the PHP process with usleep. Full-jittered, so the exact
        // value is non-deterministic, but the key MUST be present and within
        // the configured ceiling on retries.
        $client = $this->getTestClient('s3');
        $putAttempts = 0;
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),
            new Result(['Annotations' => [['AnnotationName' => 'note-1']]]),
            new Result(['AnnotationPayload' => 'P']),
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            // PutObjectAnnotation #1: 500
            function (CommandInterface $cmd) use (&$putAttempts) {
                $putAttempts++;
                return new S3Exception('500 boom', $cmd, [
                    'code'     => 'InternalError',
                    'response' => new Psr7\Response(500),
                ]);
            },
            // PutObjectAnnotation #2: 500
            function (CommandInterface $cmd) use (&$putAttempts) {
                $putAttempts++;
                return new S3Exception('500 boom', $cmd, [
                    'code'     => 'InternalError',
                    'response' => new Psr7\Response(500),
                ]);
            },
            // PutObjectAnnotation #3: success
            function (CommandInterface $cmd) use (&$putAttempts) {
                $putAttempts++;
                return new Result([]);
            },
        ]);

        $putAnnotCmds = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$putAnnotCmds) {
                if ($cmd->getName() === 'PutObjectAnnotation') {
                    $putAnnotCmds[] = $cmd->toArray();
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'COPY',
        ]);
        $uploader->upload();

        $this->assertCount(3, $putAnnotCmds);

        // Subsequent retries: @http.delay set to a non-negative integer
        // within the 5000ms ceiling. (Full-jitter formula allows 0 as a
        // valid draw.)
        foreach ([1, 2] as $i) {
            if (isset($putAnnotCmds[$i]['@http']['delay'])) {
                $delay = $putAnnotCmds[$i]['@http']['delay'];
                $this->assertIsInt($delay);
                $this->assertGreaterThanOrEqual(0, $delay);
                $this->assertLessThanOrEqual(5000, $delay);
            }
        }
    }

    public function testListObjectAnnotationsPaginatesViaContinuationToken()
    {
        $client = $this->getTestClient('s3');
        $this->addMockResults($client, [
            new Result(['TagSet' => []]),
            // ListObjectAnnotations page 1: one annotation + a continuation token
            new Result([
                'Annotations'           => [['AnnotationName' => 'page-1']],
                'NextContinuationToken' => 'TOKEN-1',
            ]),
            // ListObjectAnnotations page 2: one annotation, no token
            new Result(['Annotations' => [['AnnotationName' => 'page-2']]]),
            new Result(['AnnotationPayload' => 'BODY-page-1']),
            new Result(['AnnotationPayload' => 'BODY-page-2']),
            new Result(['UploadId' => 'baz']),
            new Result(['CopyPartResult' => ['ETag' => 'A']]),
            new Result(['CopyPartResult' => ['ETag' => 'B']]),
            new Result(['CopyPartResult' => ['ETag' => 'C']]),
            new Result(['Location' => 'http://foo/bar',
                        'ETag' => 'dst-etag', 'VersionId' => 'dst-version']),
            new Result([]),                                                    // PutObjectAnnotation page-1
            new Result([]),                                                    // PutObjectAnnotation page-2
        ]);

        $listCalls = [];
        $putAnnotNames = [];
        $client->getHandlerList()->appendSign(Middleware::tap(
            function (CommandInterface $cmd) use (&$listCalls, &$putAnnotNames) {
                if ($cmd->getName() === 'ListObjectAnnotations') {
                    $listCalls[] = $cmd->toArray();
                }
                if ($cmd->getName() === 'PutObjectAnnotation') {
                    $putAnnotNames[] = $cmd['AnnotationName'];
                }
            }
        ));

        $uploader = new MultipartCopy($client, '/srcbucket/srckey', [
            'bucket'          => 'foo',
            'key'             => 'bar',
            'source_metadata' => $this->srcMeta(),
            'tags_directive'        => 'COPY',
            'annotations_directive' => 'COPY',
        ]);
        $uploader->upload();

        $this->assertCount(2, $listCalls);
        $this->assertNull($listCalls[0]['ContinuationToken'] ?? null);
        $this->assertSame('TOKEN-1', $listCalls[1]['ContinuationToken']);

        // Both annotations were fetched and written.
        $this->assertSame(['page-1', 'page-2'], $putAnnotNames);
    }
}
