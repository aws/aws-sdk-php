<?php

namespace Aws\Test\Integ;

use Aws\Exception\MultipartUploadException;
use Aws\Glacier\MultipartUploader as GlacierMultipartUploader;
use Aws\ResultInterface;
use Aws\S3\MultipartUploader as S3MultipartUploader;
use Behat\Behat\Tester\Exception\PendingException;
use Aws\S3\BatchDelete;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\NoSeekStream;
use PHPUnit_Framework_Assert as Assert;
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

    /**
     * @Given I have a seekable read stream
     */
    public function iHaveASeekableReadStream()
    {
        $this->stream = Psr7\stream_for(Psr7\try_fopen(self::$tempFile, 'r'));
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
     * @Then /^the result should contain a\(n\) "([^"]+)"$/
     */
    public function theResultShouldContainA($key)
    {
        Assert::assertArrayHasKey($key, $this->result);
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
}
