<?php

namespace Aws\Test\Integ;

use Aws\Exception\MultipartUploadException;
use Aws\Glacier\MultipartUploader as GlacierMultipartUploader;
use Aws\ResultInterface;
use Aws\S3\MultipartCopy;
use Aws\S3\MultipartUploader as S3MultipartUploader;
use Aws\S3\S3Client;
use Behat\Behat\Tester\Exception\PendingException;
use Aws\S3\BatchDelete;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
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

    private static $tempFile;
    /** @var StreamInterface */
    private $stream;
    /** @var ResultInterface */
    private $result;
    /** @var S3Client */
    private $s3Client;
    /** @var string */
    private $filename;

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
        );    }

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
}
