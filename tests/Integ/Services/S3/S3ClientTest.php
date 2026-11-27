<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Integ\Services\S3;

use Aws\Services\S3\Exception\NoSuchBucketException;
use Aws\Services\S3\Exception\NoSuchKeyException;
use Aws\Services\S3\Exception\NotFoundException;
use Aws\Services\S3\Exception\S3Exception;
use Aws\Services\S3\Input\AbortMultipartUploadRequest;
use Aws\Services\S3\Input\CompleteMultipartUploadRequest;
use Aws\Services\S3\Input\CreateBucketRequest;
use Aws\Services\S3\Input\CreateMultipartUploadRequest;
use Aws\Services\S3\Input\DeleteBucketRequest;
use Aws\Services\S3\Input\DeleteObjectRequest;
use Aws\Services\S3\Input\GetObjectRequest;
use Aws\Services\S3\Input\HeadBucketRequest;
use Aws\Services\S3\Input\HeadObjectRequest;
use Aws\Services\S3\Input\ListMultipartUploadsRequest;
use Aws\Services\S3\Input\ListObjectsV2Request;
use Aws\Services\S3\Input\PutObjectRequest;
use Aws\Services\S3\Input\UploadPartRequest;
use Aws\Services\S3\S3Client;
use Aws\Services\S3\S3ClientConfig;
use Aws\Services\S3\Shape\BucketLocationConstraint;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Services\S3\Shape\ChecksumMode;
use Aws\Services\S3\Shape\CompletedMultipartUpload;
use Aws\Services\S3\Shape\CompletedPart;
use Aws\Services\S3\Shape\CreateBucketConfiguration;
use Aws\Tests\Integ\Utils\IntegEnvironment;
use Aws\Tests\Integ\Utils\RecordingHttpClient;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Smithy\Http\Message\Stream;

/**
 * Run the S3 client against real S3.
 *
 * Uses the default credential chain and `AWS_REGION` (default us-west-2).
 * Every test is skipped when no credentials are found. The run creates one
 * bucket and removes it, with everything in it, when the class finishes.
 */
final class S3ClientTest extends TestCase
{
    private const MIB = 1024 * 1024;

    private static string $region;
    private static string $bucket;
    private static bool $bucketCreated = false;

    /** @var list<string> */
    private static array $extraBuckets = [];

    public static function setUpBeforeClass(): void
    {
        $missing = IntegEnvironment::missingCredentials();
        if ($missing !== null) {
            self::markTestSkipped('No AWS credentials for S3 integration tests: ' . $missing);
        }

        self::$region = IntegEnvironment::region();
        self::$bucket = IntegEnvironment::bucketName();
        self::createBucket(self::client(), self::$bucket);
        self::$bucketCreated = true;
    }

    public static function tearDownAfterClass(): void
    {
        if (!self::$bucketCreated && self::$extraBuckets === []) {
            return;
        }

        $client = self::client();
        foreach (self::$extraBuckets as $name) {
            self::deleteBucketWithContents($client, $name);
        }
        if (self::$bucketCreated) {
            self::deleteBucketWithContents($client, self::$bucket);
        }
    }

    public function testBucketLifecycle(): void
    {
        $client = self::client();
        $name = IntegEnvironment::bucketName();
        self::$extraBuckets[] = $name;

        self::createBucket($client, $name);
        $client->headBucket(new HeadBucketRequest(bucket: $name));

        $client->deleteBucket(new DeleteBucketRequest(bucket: $name));
        self::$extraBuckets = [];

        $this->expectException(NotFoundException::class);
        $client->headBucket(new HeadBucketRequest(bucket: $name));
    }

    public function testObjectLifecycle(): void
    {
        $client = self::client();
        $key = 'lifecycle.txt';

        $put = $client->putObject(new PutObjectRequest(
            bucket: self::$bucket,
            key: $key,
            body: 'hello',
            contentType: 'text/plain'
        ));
        self::assertNotNull($put->eTag);

        $head = $client->headObject(new HeadObjectRequest(bucket: self::$bucket, key: $key));
        self::assertSame(5, $head->contentLength);
        self::assertSame('text/plain', $head->contentType);

        $get = $client->getObject(new GetObjectRequest(bucket: self::$bucket, key: $key));
        self::assertSame('hello', (string) $get->body);

        $client->deleteObject(new DeleteObjectRequest(bucket: self::$bucket, key: $key));
        $this->expectException(NotFoundException::class);
        $client->headObject(new HeadObjectRequest(bucket: self::$bucket, key: $key));
    }

    public function testListObjectsPaginates(): void
    {
        $client = self::client();
        $keys = [];
        for ($i = 1; $i <= 5; $i++) {
            $keys[] = "list/object-{$i}.txt";
            $client->putObject(new PutObjectRequest(
                bucket: self::$bucket,
                key: "list/object-{$i}.txt",
                body: (string) $i
            ));
        }

        $listed = [];
        $pages = 0;
        $token = null;
        do {
            $page = $client->listObjectsV2(new ListObjectsV2Request(
                bucket: self::$bucket,
                prefix: 'list/',
                maxKeys: 2,
                continuationToken: $token
            ));
            $pages++;
            foreach ($page->contents ?? [] as $object) {
                $listed[] = $object->key;
            }
            $token = $page->isTruncated === true ? $page->nextContinuationToken : null;
        } while ($token !== null);

        self::assertSame(3, $pages);
        self::assertSame($keys, $listed);
    }

    public function testMultipartUploadCompletes(): void
    {
        $client = self::client();
        $key = 'multipart/complete.bin';
        $part1 = \str_repeat('a', 5 * self::MIB);
        $part2 = \str_repeat('b', self::MIB);

        $create = $client->createMultipartUpload(new CreateMultipartUploadRequest(
            bucket: self::$bucket,
            key: $key
        ));
        self::assertNotNull($create->uploadId);

        $parts = [];
        foreach ([1 => $part1, 2 => $part2] as $number => $data) {
            $uploaded = $client->uploadPart(new UploadPartRequest(
                bucket: self::$bucket,
                key: $key,
                partNumber: $number,
                uploadId: $create->uploadId,
                body: $data
            ));
            $parts[] = new CompletedPart(eTag: $uploaded->eTag, partNumber: $number);
        }

        $client->completeMultipartUpload(new CompleteMultipartUploadRequest(
            bucket: self::$bucket,
            key: $key,
            uploadId: $create->uploadId,
            multipartUpload: new CompletedMultipartUpload(parts: $parts)
        ));

        $get = $client->getObject(new GetObjectRequest(bucket: self::$bucket, key: $key));
        self::assertSame(
            \hash('sha256', $part1 . $part2),
            \hash('sha256', (string) $get->body)
        );
    }

    public function testMultipartUploadCanBeAborted(): void
    {
        $client = self::client();
        $key = 'multipart/abort.bin';

        $create = $client->createMultipartUpload(new CreateMultipartUploadRequest(
            bucket: self::$bucket,
            key: $key
        ));
        self::assertNotNull($create->uploadId);

        $client->abortMultipartUpload(new AbortMultipartUploadRequest(
            bucket: self::$bucket,
            key: $key,
            uploadId: $create->uploadId
        ));

        $open = $client->listMultipartUploads(new ListMultipartUploadsRequest(
            bucket: self::$bucket,
            prefix: $key
        ));
        self::assertSame([], $open->uploads ?? []);
    }

    public function testLargeStreamedBodyRoundTrips(): void
    {
        $client = self::client();
        $key = 'large/streamed.bin';
        $resource = \fopen('php://temp', 'w+b');
        self::assertIsResource($resource);
        $context = \hash_init('sha256');
        for ($i = 0; $i < 12; $i++) {
            $chunk = \str_repeat(\chr(65 + $i), self::MIB);
            \fwrite($resource, $chunk);
            \hash_update($context, $chunk);
        }
        \rewind($resource);

        $client->putObject(new PutObjectRequest(
            bucket: self::$bucket,
            key: $key,
            body: new Stream($resource),
            contentLength: 12 * self::MIB
        ));

        $get = $client->getObject(new GetObjectRequest(bucket: self::$bucket, key: $key));
        $data = (string) $get->body;
        self::assertSame(12 * self::MIB, \strlen($data));
        self::assertSame(\hash_final($context), \hash('sha256', $data));
    }

    /**
     * @return iterable<string, array{ChecksumAlgorithm, string, string}>
     */
    public static function checksumCases(): iterable
    {
        $body = \str_repeat("flexible checksum body\n", 64);

        yield 'CRC32' => [
            ChecksumAlgorithm::crc32(),
            'crc32',
            \base64_encode(\pack('N', \crc32($body)))
        ];
        yield 'SHA256' => [
            ChecksumAlgorithm::sha256(),
            'sha256',
            \base64_encode(\hash('sha256', $body, true))
        ];
    }

    #[DataProvider('checksumCases')]
    public function testFlexibleChecksumIsSentAndValidated(
        ChecksumAlgorithm $algorithm,
        string $name,
        string $expected
    ): void
    {
        $http = new RecordingHttpClient();
        $client = self::client(http: $http);
        $key = "checksum/{$name}.txt";
        $body = \str_repeat("flexible checksum body\n", 64);

        $put = $client->putObject(new PutObjectRequest(
            bucket: self::$bucket,
            key: $key,
            body: $body,
            checksumAlgorithm: $algorithm
        ));
        self::assertContains("x-amz-checksum-{$name}", $http->lastChecksumHeaders());
        self::assertSame($expected, $name === 'crc32' ? $put->checksumCRC32 : $put->checksumSHA256);

        $get = $client->getObject(new GetObjectRequest(
            bucket: self::$bucket,
            key: $key,
            checksumMode: ChecksumMode::enabled()
        ));
        self::assertSame($body, (string) $get->body);
        self::assertSame($expected, $name === 'crc32' ? $get->checksumCRC32 : $get->checksumSHA256);
    }

    public function testDefaultPutObjectStoresCrc32(): void
    {
        $client = self::client();
        $key = 'checksum/default.txt';
        $body = 'default checksum body';
        $expected = \base64_encode(\pack('N', \crc32($body)));

        $client->putObject(new PutObjectRequest(bucket: self::$bucket, key: $key, body: $body));

        $head = $client->headObject(new HeadObjectRequest(
            bucket: self::$bucket,
            key: $key,
            checksumMode: ChecksumMode::enabled()
        ));
        self::assertSame($expected, $head->checksumCRC32);

        $get = $client->getObject(new GetObjectRequest(
            bucket: self::$bucket,
            key: $key,
            checksumMode: ChecksumMode::enabled()
        ));
        self::assertSame($body, (string) $get->body);
        self::assertSame($expected, $get->checksumCRC32);
    }

    public function testVirtualHostStyleAddressing(): void
    {
        $http = new RecordingHttpClient();
        $client = self::client(http: $http);
        $client->putObject(new PutObjectRequest(bucket: self::$bucket, key: 'addressing.txt', body: 'x'));

        $get = $client->getObject(new GetObjectRequest(bucket: self::$bucket, key: 'addressing.txt'));

        self::assertSame('x', (string) $get->body);
        self::assertStringStartsWith(self::$bucket . '.', $http->lastHost());
        self::assertSame('/addressing.txt', $http->lastPath());
    }

    public function testPathStyleAddressing(): void
    {
        $http = new RecordingHttpClient();
        $client = self::client(forcePathStyle: true, http: $http);
        $client->putObject(new PutObjectRequest(bucket: self::$bucket, key: 'addressing-path.txt', body: 'y'));

        $get = $client->getObject(new GetObjectRequest(bucket: self::$bucket, key: 'addressing-path.txt'));

        self::assertSame('y', (string) $get->body);
        self::assertStringStartsNotWith(self::$bucket . '.', $http->lastHost());
        self::assertSame('/' . self::$bucket . '/addressing-path.txt', $http->lastPath());
    }

    public function testMissingKeyMapsToNoSuchKey(): void
    {
        $this->expectException(NoSuchKeyException::class);

        self::client()->getObject(new GetObjectRequest(bucket: self::$bucket, key: 'missing-key.txt'));
    }

    public function testMissingBucketMapsToNoSuchBucket(): void
    {
        $this->expectException(NoSuchBucketException::class);

        self::client()->listObjectsV2(new ListObjectsV2Request(
            bucket: IntegEnvironment::bucketName()
        ));
    }

    public function testMissingBucketOnGetObjectHasErrorCode(): void
    {
        try {
            self::client()->getObject(new GetObjectRequest(
                bucket: IntegEnvironment::bucketName(),
                key: 'any.txt'
            ));
            self::fail('GetObject on a missing bucket should fail.');
        } catch (S3Exception $e) {
            self::assertSame('NoSuchBucket', $e->getAwsErrorCode());
            self::assertSame(404, $e->getHttpStatusCode());
        }
    }

    private static function client(
        bool $forcePathStyle = false,
        ?RecordingHttpClient $http = null
    ): S3Client
    {
        return new S3Client(new S3ClientConfig(
            forcePathStyle: $forcePathStyle,
            region: self::$region,
            httpClient: $http
        ));
    }

    private static function createBucket(S3Client $client, string $name): void
    {
        $client->createBucket(new CreateBucketRequest(
            bucket: $name,
            createBucketConfiguration: self::$region === 'us-east-1'
                ? null
                : new CreateBucketConfiguration(
                    locationConstraint: BucketLocationConstraint::fromValue(self::$region)
                )
        ));
    }

    /**
     * Abort open uploads, delete every object, then delete the bucket.
     * Never throws, so one failed delete does not hide a test failure.
     */
    private static function deleteBucketWithContents(S3Client $client, string $name): void
    {
        try {
            $uploads = $client->listMultipartUploads(new ListMultipartUploadsRequest(bucket: $name));
            foreach ($uploads->uploads ?? [] as $upload) {
                $client->abortMultipartUpload(new AbortMultipartUploadRequest(
                    bucket: $name,
                    key: (string) $upload->key,
                    uploadId: (string) $upload->uploadId
                ));
            }

            $token = null;
            do {
                $page = $client->listObjectsV2(new ListObjectsV2Request(
                    bucket: $name,
                    continuationToken: $token
                ));
                foreach ($page->contents ?? [] as $object) {
                    $client->deleteObject(new DeleteObjectRequest(bucket: $name, key: (string) $object->key));
                }
                $token = $page->isTruncated === true ? $page->nextContinuationToken : null;
            } while ($token !== null);

            $client->deleteBucket(new DeleteBucketRequest(bucket: $name));
        } catch (\Throwable $e) {
            \fwrite(\STDERR, "Could not delete test bucket {$name}: " . $e::class . "\n");
        }
    }
}
