<?php

namespace Aws\Test\Integ;

use Aws\CommandInterface;
use Aws\Exception\MultipartUploadException;
use Aws\Glacier\MultipartUploader as GlacierMultipartUploader;
use Aws\ResultInterface;
use Aws\S3\MultipartCopy;
use Aws\S3\MultipartUploader as S3MultipartUploader;
use Aws\S3\S3Client;
use Aws\S3\BatchDelete;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\NoSeekStream;
use PHPUnit\Framework\Assert;
use Psr\Http\Message\StreamInterface;

/**
 * Defines application features from the specific context.
 */
class MultipartContext implements Context, SnippetAcceptingContext
{
    use IntegUtils;

    const MB = 1048576;
    const RESOURCE_POSTFIX = 'php-integration-multipart-test';
    const VERSIONED_RESOURCE_POSTFIX = 'php-integration-multipart-versioned';

    private static $tempFile;
    /** @var StreamInterface */
    private $stream;
    /** @var ResultInterface */
    private $result;
    /** @var S3Client */
    private $s3Client;
    /** @var string */
    private $filename;
    /** @var string|null Captured VersionId for the @versioned scenarios. */
    private $originalVersionId;

    /**
     * @Given I have a seekable read stream
     */
    public function iHaveASeekableReadStream()
    {
        $this->stream = Psr7\Utils::streamFor(Psr7\Utils::tryFopen(self::$tempFile, 'r'));
    }

    /**
     * @Given I have an s3 client and an uploaded file named :filename
     */
    public function iHaveAnS3ClientAndAnUploadedFileNamed($filename)
    {
        $this->s3Client = self::getSdk()->createS3();
        $this->filename = $filename;
        $this->s3Client->putObject([
            'Bucket' => self::getResourceName(),
            'Key' => $filename,
            'Body' => 'foo'
        ]);
        $ex = $this->s3Client->getObject( [
            'Bucket' => self::getResourceName(),
            'Key' => $filename])['Body'];
    }

    /**
     * @When /^I upload the stream to S3 with a concurrency factor of "(\d+)"$/
     */
    public function iUploadTheStreamToS3WithAConcurrencyFactorOf($concurrency)
    {
        $client = self::getSdk()->createS3();
        $uploader = new S3MultipartUploader($client, $this->stream, [
            'bucket' => self::getResourceName(),
            'key' => get_class($this->stream) . $concurrency,
            'concurrency' => $concurrency,
        ]);

        try {
            $this->result = $uploader->upload();
        } catch (MultipartUploadException $e) {
            $client->abortMultipartUpload($e->getState()->getId());
            $message = "=====\n";
            while ($e) {
                $message .= $e->getMessage() . "\n";
                $e = $e->getPrevious();
            }
            $message .= "=====\n";
            Assert::fail($message);
        }
    }

    /**
     * @When /^I upload the stream to S3 with a checksum algorithm of "(CRC32|SHA256|SHA1|crc32|sha256|sha1)"$/
     */
    public function iUploadTheStreamToS3WithAChecksumAlgorithmOf($checksumAlgorithm)
    {
        $client = self::getSdk()->createS3();
        $uploader = new S3MultipartUploader($client, $this->stream, [
            'bucket' => self::getResourceName(),
            'key' => get_class($this->stream) . $checksumAlgorithm,
            'before_initiate' => function (CommandInterface $command) use ($checksumAlgorithm) {
                $command['ChecksumAlgorithm'] = $checksumAlgorithm;
            },
            'before_upload' => function (CommandInterface $command) use ($checksumAlgorithm) {
                $command['ChecksumAlgorithm'] = $checksumAlgorithm;
            },
            'before_complete' => function (CommandInterface $command) use ($checksumAlgorithm) {
                $command['ChecksumAlgorithm'] = $checksumAlgorithm;
            },
        ]);

        try {
            $this->result = $uploader->upload();
        } catch (MultipartUploadException $e) {
            $client->abortMultipartUpload($e->getState()->getId());
            $message = "=====\n";
            while ($e) {
                $message .= $e->getMessage() . "\n";
                $e = $e->getPrevious();
            }
            $message .= "=====\n";
            Assert::fail($message);
        }
    }

    /**
     * @When /^I upload the stream to Glacier with a concurrency factor of "(\d+)"$/
     */
    public function iUploadTheStreamToGlacierWithAConcurrencyFactorOf($concurrency)
    {
        $client = self::getSdk()->createGlacier();
        $uploader = new GlacierMultipartUploader($client, $this->stream, [
            'vault_name' => self::RESOURCE_POSTFIX,
            'archive_description' => get_class($this->stream) . $concurrency,
            'concurrency' => $concurrency,
        ]);

        try {
            $this->result = $uploader->upload();
        } catch (MultipartUploadException $e) {
            $client->abortMultipartUpload($e->getState()->getId());
            $message = "=====\n";
            while ($e) {
                $message .= $e->getMessage() . "\n";
                $e = $e->getPrevious();
            }
            $message .= "=====\n";
            Assert::fail($message);
        }
    }

    /**
     * @When I call multipartCopy on :filename to a new key in the same bucket
     */
    public function iCallMultipartCopyOnToANewKeyInTheSameBucket($filename)
    {
        $bucketName = self::getResourceName();
        //if it has a question mark, use overloaded source parameter
        $source = strpos($filename, '?') !== false
            ? ['source_key' => $filename, 'source_bucket' => $bucketName]
            : '/' . $bucketName . '/' . $filename;

        $copier = new MultipartCopy(
            $this->s3Client,
            $source,
            ['bucket' => $bucketName, 'key' => $filename . "-copy"]
        );

        try {
            $this->result = $copier->copy();
        } catch (MultipartUploadException $e) {
            $this->s3Client->abortMultipartUpload($e->getState()->getId());
            $message = "=====\n";
            while ($e) {
                $message .= $e->getMessage() . "\n";
                $e = $e->getPrevious();
            }
            $message .= "=====\n";
            Assert::fail($message);
        }
    }

    /**
     * @Then /^the result should contain a\(n\) "([^"]+)"$/
     */
    public function theResultShouldContainA($key)
    {
        Assert::assertArrayHasKey($key, $this->result);
    }

    /**
     * @Then the new file should be in the bucket copied from :filename
     */
    public function theNewFileShouldBeInTheBucket($filename)
    {
        Assert::assertEquals(
            'foo',
            $this->s3Client->getObject([
                'Bucket' => self::getResourceName(),
                'Key' => $filename . '-copy',
            ])['Body']->getContents()
        );
    }

    /**
     * @Given I have an s3 client and an uploaded file named :filename with metadata
     */
    public function iHaveAnS3ClientAndAnUploadedFileNamedWithMetadata($filename)
    {
        $this->s3Client = self::getSdk()->createS3();
        $this->filename = $filename;
        $this->s3Client->putObject([
            'Bucket' => self::getResourceName(),
            'Key' => $filename,
            'Body' => 'foo',
            'Metadata' => [
                'test-key' => 'test-value',
                'another-key' => 'another-value',
            ],
            'CacheControl' => 'max-age=3600',
            'ContentDisposition' => 'attachment; filename="test.txt"',
        ]);
    }

    /**
     * @When I call multipartCopy on :filename with metadata_directive :directive and custom metadata
     */
    public function iCallMultipartCopyWithDirectiveAndCustomMetadata($filename, $directive)
    {
        $bucketName = self::getResourceName();
        $source = '/' . $bucketName . '/' . $filename;

        $copier = new MultipartCopy(
            $this->s3Client,
            $source,
            [
                'bucket' => $bucketName,
                'key' => $filename . '-copy',
                'metadata_directive' => $directive,
                'params' => [
                    'Metadata' => ['custom-key' => 'custom-value'],
                    'ContentType' => 'text/plain',
                ],
            ]
        );

        try {
            $this->result = $copier->copy();
        } catch (MultipartUploadException $e) {
            $this->s3Client->abortMultipartUpload($e->getState()->getId());
            Assert::fail($e->getMessage());
        }
    }

    /**
     * @When I call multipartCopy on :filename with metadata_directive :directive and no metadata
     */
    public function iCallMultipartCopyWithDirectiveAndNoMetadata($filename, $directive)
    {
        $bucketName = self::getResourceName();
        $source = '/' . $bucketName . '/' . $filename;

        $copier = new MultipartCopy(
            $this->s3Client,
            $source,
            [
                'bucket' => $bucketName,
                'key' => $filename . '-copy',
                'metadata_directive' => $directive,
            ]
        );

        try {
            $this->result = $copier->copy();
        } catch (MultipartUploadException $e) {
            $this->s3Client->abortMultipartUpload($e->getState()->getId());
            Assert::fail($e->getMessage());
        }
    }

    /**
     * @Then the copied file :destKey should have the same metadata as :sourceKey
     */
    public function theCopiedFileShouldHaveTheSameMetadataAs($destKey, $sourceKey)
    {
        $bucketName = self::getResourceName();

        $sourceHead = $this->s3Client->headObject([
            'Bucket' => $bucketName,
            'Key' => $sourceKey,
        ]);
        $destHead = $this->s3Client->headObject([
            'Bucket' => $bucketName,
            'Key' => $destKey,
        ]);

        Assert::assertEquals(
            $sourceHead['Metadata'],
            $destHead['Metadata'],
            'User-defined metadata should be preserved'
        );
        Assert::assertEquals(
            $sourceHead['CacheControl'],
            $destHead['CacheControl'],
            'CacheControl should be preserved'
        );
        Assert::assertEquals(
            $sourceHead['ContentDisposition'],
            $destHead['ContentDisposition'],
            'ContentDisposition should be preserved'
        );
    }

    /**
     * @Then the copied file :destKey should have the custom metadata
     */
    public function theCopiedFileShouldHaveTheCustomMetadata($destKey)
    {
        $bucketName = self::getResourceName();

        $destHead = $this->s3Client->headObject([
            'Bucket' => $bucketName,
            'Key' => $destKey,
        ]);

        Assert::assertEquals(
            ['custom-key' => 'custom-value'],
            $destHead['Metadata'],
            'Destination should have only the custom metadata'
        );
        Assert::assertEquals(
            'text/plain',
            $destHead['ContentType'],
            'ContentType should be the user-provided value'
        );
    }

    /**
     * @Then the copied file :destKey should have no user-defined metadata
     */
    public function theCopiedFileShouldHaveNoUserDefinedMetadata($destKey)
    {
        $bucketName = self::getResourceName();

        $destHead = $this->s3Client->headObject([
            'Bucket' => $bucketName,
            'Key' => $destKey,
        ]);

        Assert::assertEmpty(
            $destHead['Metadata'],
            'Destination should have no user-defined metadata'
        );
    }

    /**
     * @Given I have a non-seekable read stream
     */
    public function iHaveANonSeekableReadStream()
    {
        $this->iHaveASeekableReadStream();
        $this->stream = new NoSeekStream($this->stream);
    }

    /**
     * @BeforeSuite
     */
    public static function createTempFile()
    {
        self::$tempFile = tempnam(sys_get_temp_dir(), self::getResourceName());
        file_put_contents(self::$tempFile, str_repeat('x', 10 * self::MB + 1024));
    }

    /**
     * @AfterSuite
     */
    public static function deleteTempFile()
    {
        unlink(self::$tempFile);
    }

    /**
     * @BeforeFeature @s3
     */
    public static function createTestBucket()
    {
        $client = self::getSdk()->createS3();
        if (!$client->doesBucketExist(self::getResourceName())) {
            $client->createBucket(['Bucket' => self::getResourceName()]);
            $client->waitUntil('BucketExists', ['Bucket' => self::getResourceName()]);
        }
    }

    /**
     * @AfterFeature @s3
     */
    public static function deleteTestBucket()
    {
        $client = self::getSdk()->createS3();
        BatchDelete::fromListObjects($client, ['Bucket' => self::getResourceName()])->delete();
        $client->deleteBucket(['Bucket' => self::getResourceName()]);
        $client->waitUntil('BucketNotExists', ['Bucket' => self::getResourceName()]);
    }

    /**
     * @BeforeFeature @glacier
     */
    public static function createTestVault()
    {
        $client = self::getSdk()->createGlacier();
        $client->createVault(['vaultName' => self::RESOURCE_POSTFIX]);
        $client->waitUntil('VaultExists', ['vaultName' => self::RESOURCE_POSTFIX]);
    }

    private static function getResourceName()
    {
        static $bucketName;

        if (empty($bucketName)) {
            $bucketName = self::getResourcePrefix() . self::RESOURCE_POSTFIX;
        }

        return $bucketName;
    }

    private static function getVersionedResourceName()
    {
        static $bucketName;

        if (empty($bucketName)) {
            $bucketName = self::getResourcePrefix() . self::VERSIONED_RESOURCE_POSTFIX;
        }

        return $bucketName;
    }

    // ---------- Caller-supplied Metadata does not trigger REPLACE ----------

    /**
     * @When I call multipartCopy on :filename with caller-supplied Metadata only
     */
    public function iCallMultipartCopyWithCallerSuppliedMetadataOnly($filename)
    {
        $bucketName = self::getResourceName();
        $copier = new MultipartCopy(
            $this->s3Client,
            '/' . $bucketName . '/' . $filename,
            [
                'bucket' => $bucketName,
                'key'    => $filename . '-copy',
                'params' => [
                    'Metadata' => ['caller-key' => 'caller-value'],
                ],
            ]
        );
        $this->runCopy($copier);
    }

    /**
     * @Then the copied file :destKey should have the source's CacheControl
     */
    public function theCopiedFileShouldHaveSourceCacheControl($destKey)
    {
        $head = $this->headObject(self::getResourceName(), $destKey);
        Assert::assertSame(
            'max-age=3600',
            $head['CacheControl'] ?? '',
            "Destination must inherit source's CacheControl when no explicit "
            . "metadata_directive is set."
        );
    }

    /**
     * @When I call multipartCopy on :filename with caller-supplied Tagging :tagging only
     */
    public function iCallMultipartCopyOnWithCallerSuppliedTaggingOnly($filename, $tagging)
    {
        $bucketName = self::getResourceName();
        $copier = new MultipartCopy(
            $this->s3Client,
            '/' . $bucketName . '/' . $filename,
            [
                'bucket' => $bucketName,
                'key'    => $filename . '-copy',
                'params' => ['Tagging' => $tagging],
            ]
        );
        $this->runCopy($copier);
    }

    // ---------- Tags fixtures and assertions ----------

    /**
     * @Given I have an s3 client and an uploaded file named :filename with tags
     */
    public function iHaveAnS3ClientAndAnUploadedFileNamedWithTags($filename)
    {
        $this->s3Client = self::getSdk()->createS3();
        $this->filename = $filename;
        $bucket = self::getResourceName();
        $this->s3Client->putObject([
            'Bucket' => $bucket,
            'Key'    => $filename,
            'Body'   => 'foo',
        ]);
        $this->s3Client->waitUntil('ObjectExists', [
            'Bucket' => $bucket,
            'Key'    => $filename,
        ]);
        $this->s3Client->putObjectTagging([
            'Bucket' => $bucket,
            'Key'    => $filename,
            'Tagging' => ['TagSet' => $this->fixtureTagSet()],
        ]);
    }

    /**
     * @Given I have an s3 client and an uploaded file named :filename with metadata and tags
     */
    public function iHaveAnS3ClientAndAnUploadedFileNamedWithMetadataAndTags($filename)
    {
        $this->iHaveAnS3ClientAndAnUploadedFileNamedWithMetadata($filename);
        $this->s3Client->waitUntil('ObjectExists', [
            'Bucket' => self::getResourceName(),
            'Key'    => $filename,
        ]);
        $this->s3Client->putObjectTagging([
            'Bucket' => self::getResourceName(),
            'Key'    => $filename,
            'Tagging' => ['TagSet' => $this->fixtureTagSet()],
        ]);
    }

    /**
     * @When I call multipartCopy on :filename with tags_directive :tagsDir
     */
    public function iCallMultipartCopyOnWithTagsDirective($filename, $tagsDir)
    {
        $bucket = self::getResourceName();
        $copier = new MultipartCopy(
            $this->s3Client,
            '/' . $bucket . '/' . $filename,
            [
                'bucket'         => $bucket,
                'key'            => $filename . '-copy',
                'tags_directive' => $tagsDir,
            ]
        );
        $this->runCopy($copier);
    }

    /**
     * @When I call multipartCopy on :filename with metadata_directive :metaDir and tags_directive :tagsDir and annotations_directive :annotDir
     */
    public function iCallMultipartCopyOnWithAllThreeDirectives(
        $filename,
        $metaDir,
        $tagsDir,
        $annotDir
    ) {
        $bucket = self::getResourceName();
        $copier = new MultipartCopy(
            $this->s3Client,
            '/' . $bucket . '/' . $filename,
            [
                'bucket'                => $bucket,
                'key'                   => $filename . '-copy',
                'metadata_directive'    => $metaDir,
                'tags_directive'        => $tagsDir,
                'annotations_directive' => $annotDir,
            ]
        );
        $this->runCopy($copier);
    }

    /**
     * @When I call multipartCopy on :filename with tags_directive :tagsDir and tagging :tagging
     */
    public function iCallMultipartCopyOnWithTagsDirectiveAndTagging($filename, $tagsDir, $tagging)
    {
        $bucket = self::getResourceName();
        $copier = new MultipartCopy(
            $this->s3Client,
            '/' . $bucket . '/' . $filename,
            [
                'bucket'         => $bucket,
                'key'            => $filename . '-copy',
                'tags_directive' => $tagsDir,
                'params'         => ['Tagging' => $tagging],
            ]
        );
        $this->runCopy($copier);
    }

    /**
     * @Then the copied file :destKey should have the same tags as :sourceKey
     */
    public function theCopiedFileShouldHaveTheSameTagsAs($destKey, $sourceKey)
    {
        $bucket = self::getResourceName();
        $this->s3Client->waitUntil('ObjectExists', ['Bucket' => $bucket, 'Key' => $destKey]);

        $sourceTags = $this->normalizeTagSet(
            $this->s3Client->getObjectTagging(['Bucket' => $bucket, 'Key' => $sourceKey])['TagSet'] ?? []
        );
        $destTags = $this->normalizeTagSet(
            $this->s3Client->getObjectTagging(['Bucket' => $bucket, 'Key' => $destKey])['TagSet'] ?? []
        );
        Assert::assertEquals(
            $sourceTags,
            $destTags,
            'Destination tags should match source tags'
        );
    }

    /**
     * @Then the copied file :destKey should have tags :tagging
     */
    public function theCopiedFileShouldHaveTags($destKey, $tagging)
    {
        $bucket = self::getResourceName();
        $this->s3Client->waitUntil('ObjectExists', ['Bucket' => $bucket, 'Key' => $destKey]);

        $expected = $this->normalizeTagSet($this->parseTaggingQueryString($tagging));
        $actual = $this->normalizeTagSet(
            $this->s3Client->getObjectTagging(['Bucket' => $bucket, 'Key' => $destKey])['TagSet'] ?? []
        );
        Assert::assertEquals($expected, $actual, 'Destination tags should match expected');
    }

    /**
     * @Then the copied file :destKey should have no tags
     */
    public function theCopiedFileShouldHaveNoTags($destKey)
    {
        $bucket = self::getResourceName();
        $this->s3Client->waitUntil('ObjectExists', ['Bucket' => $bucket, 'Key' => $destKey]);
        $tagSet = $this->s3Client->getObjectTagging(['Bucket' => $bucket, 'Key' => $destKey])['TagSet'] ?? [];
        Assert::assertSame([], $tagSet, 'Destination should have no tags');
    }

    // ---------- Annotations fixtures and assertions ----------

    /**
     * @Given I have an s3 client and an uploaded file named :filename with annotations
     */
    public function iHaveAnS3ClientAndAnUploadedFileNamedWithAnnotations($filename)
    {
        $this->s3Client = self::getSdk()->createS3();
        $this->filename = $filename;
        $bucket = self::getResourceName();
        $this->s3Client->putObject([
            'Bucket' => $bucket,
            'Key'    => $filename,
            'Body'   => 'foo',
        ]);
        $this->s3Client->waitUntil('ObjectExists', ['Bucket' => $bucket, 'Key' => $filename]);

        foreach ($this->fixtureAnnotations() as $name => $payload) {
            $this->s3Client->putObjectAnnotation([
                'Bucket'            => $bucket,
                'Key'               => $filename,
                'AnnotationName'    => $name,
                'AnnotationPayload' => $payload,
            ]);
        }
    }

    /**
     * @When I call multipartCopy on :filename with annotations_directive :annotDir
     */
    public function iCallMultipartCopyOnWithAnnotationsDirective($filename, $annotDir)
    {
        $bucket = self::getResourceName();
        $copier = new MultipartCopy(
            $this->s3Client,
            '/' . $bucket . '/' . $filename,
            [
                'bucket'                => $bucket,
                'key'                   => $filename . '-copy',
                'annotations_directive' => $annotDir,
            ]
        );
        $this->runCopy($copier);
    }

    /**
     * @Then the copied file :destKey should have the same annotations as :sourceKey
     */
    public function theCopiedFileShouldHaveTheSameAnnotationsAs($destKey, $sourceKey)
    {
        $bucket = self::getResourceName();
        $this->s3Client->waitUntil('ObjectExists', ['Bucket' => $bucket, 'Key' => $destKey]);

        $sourceNames = $this->listAllAnnotationNames($bucket, $sourceKey);
        $destNames   = $this->listAllAnnotationNames($bucket, $destKey);
        sort($sourceNames);
        sort($destNames);
        Assert::assertEquals($sourceNames, $destNames, 'Annotation names should match');

        foreach ($sourceNames as $name) {
            $sourceBody = (string) $this->s3Client->getObjectAnnotation([
                'Bucket'         => $bucket,
                'Key'            => $sourceKey,
                'AnnotationName' => $name,
            ])['AnnotationPayload'];
            $destBody = (string) $this->s3Client->getObjectAnnotation([
                'Bucket'         => $bucket,
                'Key'            => $destKey,
                'AnnotationName' => $name,
            ])['AnnotationPayload'];
            Assert::assertSame(
                $sourceBody,
                $destBody,
                "Annotation '$name' body should match"
            );
        }
    }

    /**
     * @Then the copied file :destKey should have no annotations
     */
    public function theCopiedFileShouldHaveNoAnnotations($destKey)
    {
        $bucket = self::getResourceName();
        $this->s3Client->waitUntil('ObjectExists', ['Bucket' => $bucket, 'Key' => $destKey]);
        $names = $this->listAllAnnotationNames($bucket, $destKey);
        Assert::assertSame([], $names, 'Destination should have no annotations');
    }

    // ---------- Versioning scenarios ----------

    /**
     * @Given I have a versioning-enabled bucket
     */
    public function iHaveAVersioningEnabledBucket()
    {
        // The bucket itself is created by the @BeforeFeature @versioned hook.
        // This step just binds the client and ensures versioning is on.
        $this->s3Client = self::getSdk()->createS3();
        $this->s3Client->putBucketVersioning([
            'Bucket' => self::getVersionedResourceName(),
            'VersioningConfiguration' => ['Status' => 'Enabled'],
        ]);
    }

    /**
     * @Given I have an uploaded file named :filename in the versioned bucket with body :body
     */
    public function iHaveAnUploadedFileInTheVersionedBucketWithBody($filename, $body)
    {
        $bucket = self::getVersionedResourceName();
        $put = $this->s3Client->putObject([
            'Bucket' => $bucket,
            'Key'    => $filename,
            'Body'   => $body,
        ]);
        $this->originalVersionId = $put['VersionId'] ?? null;
        Assert::assertNotEmpty(
            $this->originalVersionId,
            'Versioning-enabled bucket must return a VersionId on putObject'
        );
        $this->filename = $filename;
        $this->s3Client->waitUntil('ObjectExists', ['Bucket' => $bucket, 'Key' => $filename]);
    }

    /**
     * @Given I overwrite :filename in the versioned bucket with body :body
     */
    public function iOverwriteInTheVersionedBucketWithBody($filename, $body)
    {
        $this->s3Client->putObject([
            'Bucket' => self::getVersionedResourceName(),
            'Key'    => $filename,
            'Body'   => $body,
        ]);
    }

    /**
     * @When I call multipartCopy on the original version of :filename in the versioned bucket
     */
    public function iCallMultipartCopyOnTheOriginalVersionInTheVersionedBucket($filename)
    {
        $bucket = self::getVersionedResourceName();
        $copier = new MultipartCopy(
            $this->s3Client,
            [
                'source_bucket'     => $bucket,
                'source_key'        => $filename,
                'source_version_id' => $this->originalVersionId,
            ],
            [
                'bucket' => $bucket,
                'key'    => $filename . '-copy',
            ]
        );
        $this->runCopy($copier);
    }

    /**
     * @Then the copied file :destKey should contain :body
     */
    public function theCopiedFileShouldContain($destKey, $body)
    {
        $bucket = self::getVersionedResourceName();
        $this->s3Client->waitUntil('ObjectExists', ['Bucket' => $bucket, 'Key' => $destKey]);
        $contents = $this->s3Client->getObject([
            'Bucket' => $bucket,
            'Key'    => $destKey,
        ])['Body']->getContents();
        Assert::assertSame($body, $contents);
    }

    // ---------- Lifecycle for the versioned bucket ----------

    /**
     * @BeforeScenario @versioned
     *
     * Scoped to scenarios rather than the feature because the @versioned tag
     * lives on individual scenarios, not the feature header.
     */
    public static function createVersionedTestBucket()
    {
        $client = self::getSdk()->createS3();
        $bucket = self::getResourcePrefix() . self::VERSIONED_RESOURCE_POSTFIX;

        // Probe with HeadBucket; create on 404. Avoids the deprecated
        // doesBucketExist helper.
        try {
            $client->headBucket(['Bucket' => $bucket]);
        } catch (\Aws\S3\Exception\S3Exception $e) {
            if ($e->getStatusCode() === 404) {
                $client->createBucket(['Bucket' => $bucket]);
                $client->waitUntil('BucketExists', ['Bucket' => $bucket]);
            } else {
                throw $e;
            }
        }
        $client->putBucketVersioning([
            'Bucket' => $bucket,
            'VersioningConfiguration' => ['Status' => 'Enabled'],
        ]);
    }

    /**
     * @AfterScenario @versioned
     *
     * Best-effort cleanup of a versioning-enabled bucket. S3 won't allow
     * deleteBucket while there are object versions, delete markers, or
     * in-progress multipart uploads, so we drain each in turn and tolerate
     * per-page failures rather than aborting on the first transient error.
     */
    public static function deleteVersionedTestBucket()
    {
        $client = self::getSdk()->createS3();
        $bucket = self::getResourcePrefix() . self::VERSIONED_RESOURCE_POSTFIX;

        // 1) Abort any in-progress multipart uploads left behind by failed scenarios.
        try {
            $token = null;
            $idToken = null;
            do {
                $params = ['Bucket' => $bucket];
                if ($token   !== null) $params['KeyMarker']      = $token;
                if ($idToken !== null) $params['UploadIdMarker'] = $idToken;
                $uploads = $client->listMultipartUploads($params);

                foreach ($uploads['Uploads'] ?? [] as $u) {
                    try {
                        $client->abortMultipartUpload([
                            'Bucket'   => $bucket,
                            'Key'      => $u['Key'],
                            'UploadId' => $u['UploadId'],
                        ]);
                    } catch (\Throwable $ignored) {
                        // continue draining
                    }
                }
                $token   = $uploads['NextKeyMarker']      ?? null;
                $idToken = $uploads['NextUploadIdMarker'] ?? null;
            } while (!empty($token) || !empty($idToken));
        } catch (\Throwable $ignored) {
            // listing MPUs failed; proceed to version cleanup anyway
        }

        // 2) Delete all object versions and delete markers, page by page.
        $token = null;
        $idToken = null;
        do {
            try {
                $params = ['Bucket' => $bucket];
                if ($token   !== null) $params['KeyMarker']       = $token;
                if ($idToken !== null) $params['VersionIdMarker'] = $idToken;
                $page = $client->listObjectVersions($params);

                $toDelete = [];
                foreach ($page['Versions'] ?? [] as $v) {
                    $toDelete[] = ['Key' => $v['Key'], 'VersionId' => $v['VersionId']];
                }
                foreach ($page['DeleteMarkers'] ?? [] as $m) {
                    $toDelete[] = ['Key' => $m['Key'], 'VersionId' => $m['VersionId']];
                }
                if (!empty($toDelete)) {
                    try {
                        $client->deleteObjects([
                            'Bucket' => $bucket,
                            'Delete' => ['Objects' => $toDelete],
                        ]);
                    } catch (\Throwable $ignored) {
                        // continue with the next page
                    }
                }
                $token   = $page['NextKeyMarker']       ?? null;
                $idToken = $page['NextVersionIdMarker'] ?? null;
            } catch (\Throwable $listErr) {
                // can't list further; bail to deleteBucket attempt
                $token = null;
                $idToken = null;
            }
        } while (!empty($token) || !empty($idToken));

        // 3) Delete the bucket. Retry once after a short pause for eventual
        // consistency on the version cleanup.
        try {
            $client->deleteBucket(['Bucket' => $bucket]);
            $client->waitUntil('BucketNotExists', ['Bucket' => $bucket]);
        } catch (\Throwable $first) {
            usleep(500_000);
            try {
                $client->deleteBucket(['Bucket' => $bucket]);
                $client->waitUntil('BucketNotExists', ['Bucket' => $bucket]);
            } catch (\Throwable $second) {
                // Surface the failure so CI flags the leak but don't abort
                // suite teardown.
                fwrite(
                    STDERR,
                    "WARNING: failed to delete versioned test bucket {$bucket}: "
                    . $second->getMessage() . "\n"
                );
            }
        }
    }

    // ---------- Internal helpers ----------

    /**
     * Runs a configured MultipartCopy and stores the result. On failure,
     * makes a best-effort attempt to abort any in-flight upload, then surfaces
     * the full exception chain as an Assert::fail message.
     *
     * Catches \Throwable rather than only MultipartUploadException so that
     * Phase-1/Phase-3 failures (S3Exception from constructor, RuntimeException
     * from annotation partial-failure) get the same framed message treatment.
     */
    private function runCopy(MultipartCopy $copier): void
    {
        try {
            $this->result = $copier->copy();
        } catch (\Throwable $e) {
            $this->bestEffortAbortUpload($e);

            $message = "=====\n";
            $cur = $e;
            while ($cur) {
                $message .= get_class($cur) . ': ' . $cur->getMessage() . "\n";
                $cur = $cur->getPrevious();
            }
            $message .= "=====\n";
            Assert::fail($message);
        }
    }

    /**
     * If the failure carries an MPU state with a real UploadId, attempt to
     * abort it. Swallows any secondary failure from the abort itself so the
     * original error is what gets reported.
     */
    private function bestEffortAbortUpload(\Throwable $e): void
    {
        if (!$e instanceof MultipartUploadException) {
            return;
        }
        $id = $e->getState()->getId();
        if (empty($id['UploadId'])) {
            return; // failed before initiate; nothing to abort
        }
        try {
            $this->s3Client->abortMultipartUpload($id);
        } catch (\Throwable $ignored) {
            // best-effort
        }
    }

    private function headObject(string $bucket, string $key): array
    {
        $this->s3Client->waitUntil('ObjectExists', ['Bucket' => $bucket, 'Key' => $key]);
        return $this->s3Client->headObject(['Bucket' => $bucket, 'Key' => $key])->toArray();
    }

    /**
     * Sorts a TagSet by Key for stable comparisons.
     *
     * @param array $tagSet List of ['Key' => ..., 'Value' => ...] pairs.
     * @return array
     */
    private function normalizeTagSet(array $tagSet): array
    {
        usort($tagSet, fn ($a, $b) => strcmp($a['Key'], $b['Key']));
        return $tagSet;
    }

    private function parseTaggingQueryString(string $tagging): array
    {
        $tagSet = [];
        foreach (explode('&', $tagging) as $pair) {
            if ($pair === '') continue;
            $parts = explode('=', $pair, 2);
            $tagSet[] = [
                'Key'   => urldecode($parts[0]),
                'Value' => urldecode($parts[1] ?? ''),
            ];
        }
        return $tagSet;
    }

    /**
     * Pages through ListObjectAnnotations on the source/dest object and returns
     * the flat list of annotation names.
     */
    private function listAllAnnotationNames(string $bucket, string $key): array
    {
        $names = [];
        foreach ($this->s3Client->getPaginator(
            'ListObjectAnnotations',
            ['Bucket' => $bucket, 'Key' => $key]
        ) as $page) {
            foreach ($page['Annotations'] ?? [] as $entry) {
                if (!empty($entry['AnnotationName'])) {
                    $names[] = $entry['AnnotationName'];
                }
            }
        }
        return $names;
    }

    private function fixtureTagSet(): array
    {
        return [
            ['Key' => 'Project', 'Value' => 'X'],
            ['Key' => 'Env',     'Value' => 'test'],
        ];
    }

    private function fixtureAnnotations(): array
    {
        return [
            'note-1' => 'BODY-A',
            'note-2' => 'BODY-B',
        ];
    }
}
