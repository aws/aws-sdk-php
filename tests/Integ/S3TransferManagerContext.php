<?php

namespace Aws\Test\Integ;

use Aws\S3\ApplyChecksumMiddleware;
use Aws\S3\S3Transfer\Models\DownloadResponse;
use Aws\S3\S3Transfer\Progress\TransferListener;
use Aws\S3\S3Transfer\Progress\TransferProgressSnapshot;
use Aws\S3\S3Transfer\S3TransferManager;
use Aws\Test\TestsUtility;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;

class S3TransferManagerContext implements Context, SnippetAcceptingContext
{
    use IntegUtils;
    use S3ContextTrait;

    const INTEG_LOG_BUCKET_PREFIX = 'aws-php-sdk-test-integ-logs';

    /**
     * @var string
     */
    private static string $tempDir;

    /**
     * @var StreamInterface|null
     */
    private StreamInterface | null $stream;

    /**
     * @BeforeSuite
     */
    public static function beforeSuiteRuns(): void {
        // Create test bucket
        self::doCreateTestBucket();
    }

    /**
     * @AfterSuite
     */
    public static function afterSuiteRuns(): void {
        // Clean up test bucket
        self::doDeleteTestBucket();
    }

    /**
     * @BeforeScenario
     */
    public function beforeScenarioRuns(): void {
        $this->stream = Utils::streamFor('');
        // Create temporary directory
        self::$tempDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "s3-transfer-manager";
        if (is_dir(self::$tempDir)) {
            TestsUtility::cleanUpDir(self::$tempDir);
        }

        mkdir(self::$tempDir, 0777, true);
    }

    /**
     * @AfterScenario
     */
    public function afterScenarioRuns(): void {
        // Clean up temporary directory
        TestsUtility::cleanUpDir(self::$tempDir);

        // Clean up data holders
        $this->stream?->close();
    }

    /**
     * @Given /^I have a file (.*) with content (.*)$/
     */
    public function iHaveAFileWithContent($filename, $content): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($fullFilePath, $content);
    }

    /**
     * @When /^I upload the file (.*) to a test bucket using the s3 transfer manager$/
     */
    public function iUploadTheFileToATestBucketUsingTheS3TransferManager($filename): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        $s3TransferManager->upload(
            $fullFilePath,
            [
                'Bucket' => self::getResourceName(),
                'Key' => $filename,
            ]
        )->wait();
    }

    /**
     * @Then /^the file (.*) should exist in the test bucket and its content should be (.*)$/
     */
    public function theFileShouldExistInTheTestBucketAndItsContentShouldBe($filename, $content): void
    {
        $client = self::getSdk()->createS3();
        $response = $client->getObject([
            'Bucket' => self::getResourceName(),
            'Key' => $filename,
        ]);

        Assert::assertEquals(200, $response['@metadata']['statusCode']);
        Assert::assertEquals($content, $response['Body']->getContents());
    }

    /**
     * @Given /^I have a stream with content (.*)$/
     */
    public function iHaveAStreamWithContent($content): void
    {
        $this->stream = Utils::streamFor($content);
    }

    /**
     * @When /^I do the upload to a test bucket with key (.*)$/
     */
    public function iDoTheUploadToATestBucketWithKey($key): void
    {
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        $s3TransferManager->upload(
            $this->stream,
            [
                'Bucket' => self::getResourceName(),
                'Key' => $key,
            ]
        )->wait();
    }

    /**
     * @Then /^the object (.*), once downloaded from the test bucket, should match the content (.*)$/
     */
    public function theObjectOnceDownloadedFromTheTestBucketShouldMatchTheContent($key, $content): void
    {
        $client = self::getSdk()->createS3();
        $response = $client->getObject([
            'Bucket' => self::getResourceName(),
            'Key' => $key,
        ]);

        Assert::assertEquals(200, $response['@metadata']['statusCode']);
        Assert::assertEquals($content, $response['Body']->getContents());
    }

    /**
     * @Given /^I have a file with name (.*) where its content's size is (.*)$/
     */
    public function iHaveAFileWithNameWhereItsContentSSizeIs($filename, $filesize): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($fullFilePath, str_repeat('a', $filesize));
    }

    /**
     * @When /^I do upload this file with name (.*) with the specified part size of (.*)$/
     */
    public function iDoUploadThisFileWithNameWithTheSpecifiedPartSizeOf($filename, $partsize): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
            [
                'multipart_upload_threshold_bytes' => $partsize,
            ]
        );
        $s3TransferManager->upload(
            $fullFilePath,
            [
                'Bucket' => self::getResourceName(),
                'Key' => $filename,
            ],
            [
                'part_size' => intval($partsize),
            ]
        )->wait();
    }

    /**
     * @Given /^I have want to upload a stream of size (.*)$/
     */
    public function iHaveWantToUploadAStreamOfSize($filesize): void
    {
        $this->stream = Utils::streamFor(str_repeat('a', $filesize));
    }

    /**
     * @When /^I do upload this stream with name (.*) and the specified part size of (.*)$/
     */
    public function iDoUploadThisStreamWithNameAndTheSpecifiedPartSizeOf($filename, $partsize): void
    {
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
            [
                'multipart_upload_threshold_bytes' => $partsize,
            ]
        );
        $s3TransferManager->upload(
            $this->stream,
            [
                'Bucket' => self::getResourceName(),
                'Key' => $filename,
            ],
            [
                'part_size' => intval($partsize),
            ]
        )->wait();
    }

    /**
     * @Then /^the object with name (.*) should have a total of (.*) parts and its size must be (.*)$/
     */
    public function theObjectWithNameShouldHaveATotalOfPartsAndItsSizeMustBe($filename, $partnum, $filesize): void
    {
        $partNo = 1;
        $s3Client = self::getSdk()->createS3();
        $response = $s3Client->headObject([
            'Bucket' => self::getResourceName(),
            'Key' => $filename,
            'PartNumber' => $partNo
        ]);
        Assert::assertEquals(206, $response['@metadata']['statusCode']);
        Assert::assertEquals($partnum, $response['PartsCount']);
        $contentLength = $response['@metadata']['headers']['content-length'];
        $partNo++;
        while ($partNo <= $partnum) {
            $response = $s3Client->headObject([
                'Bucket' => self::getResourceName(),
                'Key' => $filename,
                'PartNumber' => $partNo
            ]);
            $contentLength += $response['@metadata']['headers']['content-length'];
            $partNo++;
        }

        Assert::assertEquals($filesize, $contentLength);
    }

    /**
     * @Given /^I have a file with name (.*) and its content is (.*)$/
     */
    public function iHaveAFileWithNameAndItsContentIs($filename, $content): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($fullFilePath, $content);
    }

    /**
     * @When /^I upload this file with name (.*) by providing a custom checksum algorithm (.*)$/
     */
    public function iUploadThisFileWithNameByProvidingACustomChecksumAlgorithm($filename, $checksum_algorithm): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );
        $s3TransferManager->upload(
            $fullFilePath,
            [
                'Bucket' => self::getResourceName(),
                'Key' => $filename,
            ],
            [
                'checksum_algorithm' => $checksum_algorithm,
            ]
        )->wait();
    }

    /**
     * @Then /^the checksum from the object with name (.*) should be equals to the calculation of the object content with the checksum algorithm (.*)$/
     */
    public function theChecksumFromTheObjectWithNameShouldBeEqualsToTheCalculationOfTheObjectContentWithTheChecksumAlgorithm($filename, $checksum_algorithm): void
    {
        $s3Client = self::getSdk()->createS3();
        $response = $s3Client->getObject([
            'Bucket' => self::getResourceName(),
            'Key' => $filename,
            'ChecksumMode' => 'ENABLED'
        ]);

        Assert::assertEquals(200, $response['@metadata']['statusCode']);
        Assert::assertEquals(
            ApplyChecksumMiddleware::getEncodedValue(
                $checksum_algorithm,
                $response['Body']
            ),
            $response['Checksum' . strtoupper($checksum_algorithm)]
        );
    }

    /**
     * @Given /^I have an object in S3 with name (.*) and its content is (.*)$/
     */
    public function iHaveAnObjectInS3withNameAndItsContentIs($filename, $content): void
    {
        $client = self::getSdk()->createS3();
        $client->putObject([
            'Bucket' => self::getResourceName(),
            'Key' => $filename,
            'Body' => $content,
        ]);
    }

    /**
     * @When /^I do a download of the object with name (.*)$/
     */
    public function iDoADownloadOfTheObjectWithName($filename): void
    {
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );
        $s3TransferManager->download([
            'Bucket' => self::getResourceName(),
            'Key' => $filename,
        ])->then(function (DownloadResponse $response) use ($filename) {
            $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
            file_put_contents($fullFilePath, $response->getData()->getContents());
        })->wait();
    }

    /**
     * @Then /^the object with name (.*) should have been downloaded and its content should be (.*)$/
     */
    public function theObjectWithNameShouldHaveBeenDownloadedAndItsContentShouldBe($filename, $content): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        Assert::assertFileExists($fullFilePath);
        Assert::assertEquals($content, file_get_contents($fullFilePath));
    }

    /**
     * @Given /^I have an object in S3 with name (.*) and its size is (.*)$/
     */
    public function iHaveAnObjectInS3withNameAndItsSizeIs($filename, $filesize): void
    {
        $client = self::getSdk()->createS3();
        $client->putObject([
            'Bucket' => self::getResourceName(),
            'Key' => $filename,
            'Body' => str_repeat('*', $filesize),
        ]);
    }

    /**
     * @When /^I download the object with name (.*) by using the (.*) multipart download type$/
     */
    public function iDownloadTheObjectWithNameByUsingTheMultipartDownloadType($filename, $download_type): void
    {
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );
        $s3TransferManager->download([
            'Bucket' => self::getResourceName(),
            'Key' => $filename,
        ],
        [],
        [
            'multipart_download_type' => $download_type,
        ])->then(function (DownloadResponse $response) use ($filename) {
            $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
            file_put_contents($fullFilePath, $response->getData()->getContents());
        })->wait();
    }

    /**
     * @Then /^the content size for the object with name (.*) should be (.*)$/
     */
    public function theContentSizeForTheObjectWithNameShouldBe($filename, $filesize): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        Assert::assertFileExists($fullFilePath);
        Assert::assertEquals($filesize, filesize($fullFilePath));
    }

    /**
     * @Given /^I have a directory (.*) with (.*) files that I want to upload$/
     */
    public function iHaveADirectoryWithFilesThatIWantToUpload($directory, $numfile): void
    {
        $fullDirectoryPath = self::$tempDir . DIRECTORY_SEPARATOR . $directory;
        if (!is_dir($fullDirectoryPath)) {
            mkdir($fullDirectoryPath, 0777, true);
        }

        for ($i = 0; $i < $numfile - 1; $i++) {
            $fullFilePath = $fullDirectoryPath . DIRECTORY_SEPARATOR . "file" . ($i + 1) . ".txt";
            file_put_contents($fullFilePath, "This is a test file content #" . ($i + 1));
        }

        // 1 extra for multipart upload
        $fullFilePath = $fullDirectoryPath . DIRECTORY_SEPARATOR . "file" . ($i + 1) . ".txt";
        file_put_contents($fullFilePath, str_repeat('*', 1024 * 1024 * 15));
    }

    /**
     * @When /^I upload this directory (.*)$/
     */
    public function iUploadThisDirectory($directory): void
    {
        $fullDirectoryPath = self::$tempDir . DIRECTORY_SEPARATOR . $directory;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );
        $s3TransferManager->uploadDirectory(
            $fullDirectoryPath,
            self::getResourceName(),
        )->wait();
    }

    /**
     * @Then /^the files from this directory (.*) where its count should be (.*) should exist in the bucket$/
     */
    public function theFilesFromThisDirectoryWhereItsCountShouldBeShouldExistInTheBucket($directory, $numfile): void
    {
        $s3Client = self::getSdk()->createS3();
        $objects = $s3Client->getPaginator('ListObjectsV2', [
            'Bucket' => self::getResourceName(),
            'Prefix' => $directory . DIRECTORY_SEPARATOR,
        ]);
        $count = 0;
        foreach ($objects as $object) {
            $fullObjectPath = self::$tempDir . DIRECTORY_SEPARATOR . $object;
            Assert::assertFileExists($fullObjectPath);
            $count++;
        }
        
        Assert::assertEquals($numfile, $count);
    }

    /**
     * @Given /^I have a total of (.*) objects in a bucket prefixed with (.*)$/
     */
    public function iHaveATotalOfObjectsInABucketPrefixedWith($numfile, $directory): void
    {
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );
        for ($i = 0; $i < $numfile - 1; $i++) {
            $s3TransferManager->upload(
                Utils::streamFor("This is a test file content #" . ($i + 1)),
                [
                    'Bucket' => self::getResourceName(),
                    'Key' => $directory . DIRECTORY_SEPARATOR . "file" . ($i + 1) . ".txt",
                ]
            )->wait();
        }
    }

    /**
     * @When /^I download all of them into the directory (.*)$/
     */
    public function iDownloadAllOfThemIntoTheDirectory($directory): void
    {
        $fullDirectoryPath = self::$tempDir . DIRECTORY_SEPARATOR . $directory;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );
        $s3TransferManager->downloadDirectory(
            self::getResourceName(),
            $fullDirectoryPath,
            [],
            [
                's3_prefix' => $directory . DIRECTORY_SEPARATOR,
            ]
        );
    }

    /**
     * @Then /^the objects (.*) should exist as files within the directory (.*)$/
     */
    public function theObjectsShouldExistsAsFilesWithinTheDirectory(
        $numfile,
        $directory
    ): void
    {
        $fullDirectoryPath = self::$tempDir . DIRECTORY_SEPARATOR . $directory;
        $s3Client = self::getSdk()->createS3();
        $objects = $s3Client->getPaginator('ListObjectsV2', [
            'Bucket' => self::getResourceName(),
            'Prefix' => $directory . DIRECTORY_SEPARATOR,
        ]);
        $count = 0;
        foreach ($objects as $object) {
            Assert::assertFileExists($fullDirectoryPath . DIRECTORY_SEPARATOR . $object);
            $count++;
        }

        Assert::assertEquals($numfile, $count);
    }

    /**
     * @Given /^I am uploading the file (.*) with size (.*)$/
     */
    public function iAmUploadingTheFileWithSize($file, $size): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        file_put_contents($fullFilePath, str_repeat('*', $size));
    }

    /**
     * @When /^I upload the file (.*) using multipart upload and fails at part number (.*)$/
     */
    public function iUploadTheFileUsingMultipartUploadAndFailsAtPartNumber(
        $file,
        $partNumberFail
    ): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        $transferListener = new class($partNumberFail) extends TransferListener {
            private int $partNumber;
            private int $partNumberFail;

            public function __construct(int $partNumberFail) {
                $this->partNumberFail = $partNumberFail;
                $this->partNumber = 0;
            }

            public function bytesTransferred(array $context): void
            {
                $this->partNumber++;
                if ($this->partNumber === $this->partNumberFail) {
                    throw new \RuntimeException(
                        "Transfer failed at part number {$this->partNumber} failed"
                    );
                }
            }
        };
        // To make sure transferFail is called
        $testCase = new class extends TestCase {};
        $transferListener2 = $testCase->getMockBuilder(
            TransferListener::class
        )->getMock();
        $transferListener2->expects($testCase->once())->method('transferInitiated');
        $transferListener2->expects($testCase->once())->method('transferFail');

        $s3TransferManager->upload(
            $fullFilePath,
            [
                'Bucket' => self::getResourceName(),
                'Key' => $file,
            ],
            [],
            [
                $transferListener,
                $transferListener2
            ]
        )->wait();
    }

    /**
     * @Then /^The multipart upload should have been aborted for file (.*)$/
     */
    public function theMultipartUploadShouldHaveBeenAbortedForFile($file): void
    {
        $client = self::getSdk()->createS3();
        $inProgressMultipartUploads = $client->listMultipartUploads([
            'Bucket' => self::getResourceName(),
        ]);
        // Make sure that, if there are in progress multipart upload
        // it is not for the file being uploaded in this test.
        $multipartUploadCount = count($inProgressMultipartUploads);
        if ($multipartUploadCount > 0) {
            $multipartUploadCount = 0;
            foreach ($inProgressMultipartUploads as $inProgressMultipartUpload) {
                if ($inProgressMultipartUpload['Key'] === $file) {
                    $multipartUploadCount++;
                }
            }

            Assert::assertEquals(0, $multipartUploadCount);
        }

        Assert::assertEquals(0, $multipartUploadCount);
    }
}