<?php

namespace Aws\Test\Integ;

use Aws\S3\ApplyChecksumMiddleware;
use Aws\S3\S3Transfer\Exception\S3TransferException;
use Aws\S3\S3Transfer\Models\DownloadDirectoryRequest;
use Aws\S3\S3Transfer\Models\DownloadFileRequest;
use Aws\S3\S3Transfer\Models\DownloadRequest;
use Aws\S3\S3Transfer\Models\ResumeDownloadRequest;
use Aws\S3\S3Transfer\Models\ResumeUploadRequest;
use Aws\S3\S3Transfer\Models\S3TransferManagerConfig;
use Aws\S3\S3Transfer\Models\UploadDirectoryRequest;
use Aws\S3\S3Transfer\Models\UploadRequest;
use Aws\S3\S3Transfer\Progress\AbstractTransferListener;
use Aws\S3\S3Transfer\S3TransferManager;
use Aws\Test\TestsUtility;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
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
        $this->stream = null;
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
            new UploadRequest(
                $fullFilePath,
                [
                    'Bucket' => self::getResourceName(),
                    'Key' => $filename,
                ]
            )
        )->wait();
    }

    /**
     * @Then /^the file (.*) should exist in the test bucket and its content should be (.*)$/
     */
    public function theFileShouldExistInTheTestBucketAndItsContentShouldBe(
        $filename,
        $content
    ): void
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
            new UploadRequest(
                $this->stream,
                [
                    'Bucket' => self::getResourceName(),
                    'Key' => $key,
                ]
            )
        )->wait();
    }

    /**
     * @Then /^the object (.*), once downloaded from the test bucket, should match the content (.*)$/
     */
    public function theObjectOnceDownloadedFromTheTestBucketShouldMatchTheContent(
        $key,
        $content
    ): void
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
    public function iHaveAFileWithNameWhereItsContentSSizeIs(
        $filename,
        $filesize
    ): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($fullFilePath, str_repeat('a', (int)$filesize));
    }

    /**
     * @When /^I do upload this file with name (.*) with the specified part size of (.*)$/
     */
    public function iDoUploadThisFileWithNameWithTheSpecifiedPartSizeOf(
        $filename,
        $partsize
    ): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
            S3TransferManagerConfig::fromArray([
                'multipart_upload_threshold_bytes' => (int)$partsize,
            ])
        );
        $s3TransferManager->upload(
            new UploadRequest(
                $fullFilePath,
                [
                    'Bucket' => self::getResourceName(),
                    'Key' => $filename,
                ],
                [
                    'target_part_size_bytes' => (int)$partsize,
                ]
            )
        )->wait();
    }

    /**
     * @Given /^I want to upload a stream of size (.*)$/
     */
    public function iWantToUploadAStreamOfSize($filesize): void
    {
        $this->stream = Utils::streamFor(str_repeat('a', (int)$filesize));
    }

    /**
     * @When /^I do upload this stream with name (.*) and the specified part size of (.*)$/
     */
    public function iDoUploadThisStreamWithNameAndTheSpecifiedPartSizeOf(
        $filename,
        $partsize
    ): void
    {
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
            S3TransferManagerConfig::fromArray([
                'multipart_upload_threshold_bytes' => (int)$partsize,
            ])
        );
        $s3TransferManager->upload(
             new UploadRequest(
                $this->stream,
                [
                    'Bucket' => self::getResourceName(),
                    'Key' => $filename,
                ],
                [
                    'target_part_size_bytes' => (int)$partsize,
                ]
            )
        )->wait();
    }

    /**
     * @Then /^the object with name (.*) should have a total of (.*) parts and its size must be (.*)$/
     */
    public function theObjectWithNameShouldHaveATotalOfPartsAndItsSizeMustBe(
        $filename,
        $partnum,
        $filesize
    ): void
    {
        $partNo = 1;
        $s3Client = self::getSdk()->createS3();
        $response = $s3Client->headObject([
            'Bucket' => self::getResourceName(),
            'Key' => $filename,
            'PartNumber' => $partNo
        ]);
        Assert::assertEquals(206, $response['@metadata']['statusCode']);
        Assert::assertEquals((int)$partnum, $response['PartsCount']);
        $contentLength = $response['@metadata']['headers']['content-length'];
        $partNo++;
        while ($partNo <= (int)$partnum) {
            $response = $s3Client->headObject([
                'Bucket' => self::getResourceName(),
                'Key' => $filename,
                'PartNumber' => $partNo
            ]);
            $contentLength += $response['@metadata']['headers']['content-length'];
            $partNo++;
        }

        Assert::assertEquals((int)$filesize, $contentLength);
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
    public function iUploadThisFileWithNameByProvidingACustomChecksumAlgorithm(
        $filename,
        $checksumAlgorithm
    ): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );
        $s3TransferManager->upload(
            new UploadRequest(
                $fullFilePath,
                [
                    'Bucket' => self::getResourceName(),
                    'Key' => $filename,
                    'ChecksumAlgorithm' => $checksumAlgorithm,
                ],
            )
        )->wait();
    }

    /**
     * @Then /^the checksum from the object with name (.*) should be equals to the calculation of the object content with the checksum algorithm (.*)$/
     */
    public function theChecksumFromTheObjectWithNameShouldBeEqualsToTheCalculationOfTheObjectContentWithTheChecksumAlgorithm(
        $filename,
        $checksumAlgorithm
    ): void
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
                $checksumAlgorithm,
                $response['Body']
            ),
            $response['Checksum' . strtoupper($checksumAlgorithm)]
        );
    }

    /**
     * @Given /^I have an object in S3 with name (.*) and its content is (.*)$/
     */
    public function iHaveAnObjectInS3withNameAndItsContentIs(
        $filename,
        $content
    ): void
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
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );
        $s3TransferManager->downloadFile(new DownloadFileRequest(
            $fullFilePath,
            false,
            new DownloadRequest([
                'Bucket' => self::getResourceName(),
                'Key' => $filename,
            ])
        ))->wait();
    }

    /**
     * @Then /^the object with name (.*) should have been downloaded and its content should be (.*)$/
     */
    public function theObjectWithNameShouldHaveBeenDownloadedAndItsContentShouldBe(
        $filename,
        $content
    ): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        Assert::assertFileExists($fullFilePath);
        Assert::assertEquals($content, file_get_contents($fullFilePath));
    }

    /**
     * @Given /^I have an object in S3 with name (.*) and its size is (.*)$/
     */
    public function iHaveAnObjectInS3withNameAndItsSizeIs(
        $filename,
        $filesize
    ): void
    {
        $client = self::getSdk()->createS3();
        $client->putObject([
            'Bucket' => self::getResourceName(),
            'Key' => $filename,
            'Body' => str_repeat('*', (int)$filesize),
        ]);
    }

    /**
     * @When /^I download the object with name (.*) by using the (.*) multipart download type$/
     */
    public function iDownloadTheObjectWithNameByUsingTheMultipartDownloadType(
        $filename,
        $downloadType
    ): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );
        $s3TransferManager->downloadFile(
            new DownloadFileRequest(
                $fullFilePath,
                false,
                new DownloadRequest(
                    [
                        'Bucket' => self::getResourceName(),
                        'Key' => $filename
                    ],
                    [],
                    [
                        'multipart_download_type' => $downloadType,
                    ]
                )
            )
        )->wait();
    }

    /**
     * @Then /^the content size for the object with name (.*) should be (.*)$/
     */
    public function theContentSizeForTheObjectWithNameShouldBe(
        $filename,
        $filesize
    ): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $filename;
        Assert::assertFileExists($fullFilePath);
        Assert::assertEquals((int)$filesize, filesize($fullFilePath));
    }

    /**
     * @Given /^I have a directory (.*) with (.*) files that I want to upload$/
     */
    public function iHaveADirectoryWithFilesThatIWantToUpload(
        $directory,
        $numfile
    ): void
    {
        $count = (int)$numfile;
        $filesDirectory = self::$tempDir . DIRECTORY_SEPARATOR . $directory;
        if (!is_dir($filesDirectory)) {
            mkdir($filesDirectory, 0777, true);
        }

        for ($i = 0; $i < $count; $i++) {
            $fullFilePath = $filesDirectory . "file" . ($i + 1) . ".txt";
            // Half files single upload and half multipart uploads
            if ($i > $count / 2) {
                file_put_contents(
                    $fullFilePath,
                    random_bytes(
                        random_int(1024 * 5, 1024 * 20)
                    )
                );
            } else {
                file_put_contents(
                    $fullFilePath,
                    random_bytes(
                        random_int(1024, 1024 * 5)
                    )
                );
            }
        }
    }

    /**
     * @When /^I upload this directory (.*) to s3$/
    */
    public function iUploadThisDirectory($directory): void
    {
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );
        $s3TransferManager->uploadDirectory(
            new UploadDirectoryRequest(
                self::$tempDir,
                self::getResourceName(),
                [],
                [
                    'recursive' => true,
                ]
            )
        )->wait();
    }

    /**
     * @Then /^the files from this directory (.*) where its count should be (.*) should exist in the bucket$/
     */
    public function theFilesFromThisDirectoryWhereItsCountShouldBeShouldExistInTheBucket(
        $directory,
        $numfile
    ): void
    {
        $s3Client = self::getSdk()->createS3();
        $listObjectsResult = $s3Client->listObjectsV2([
            'Bucket' => self::getResourceName(),
            'Prefix' => $directory,
        ]);

        // Make sure request was successful
        Assert::assertEquals($listObjectsResult['@metadata']['statusCode'], 200);

        // Make sure objects count from list objects match expected
        Assert::assertEquals(
            $numfile,
            $listObjectsResult['KeyCount']
        );

        // Now lets validate file content
        foreach ($listObjectsResult['Contents'] as $object) {
            $s3Key = $object['Key'];
            $filePath = self::$tempDir . DIRECTORY_SEPARATOR . $s3Key;
            Assert::assertFileExists($filePath);
            $fileContent = file_get_contents($filePath);

            // Get object from s3 to validate its content
            $getObjectResult = $s3Client->getObject([
                'Bucket' => self::getResourceName(),
                'Key' => $s3Key,
            ]);

            // Validate the request was successful
            Assert::assertEquals(
                @$getObjectResult['@metadata']['statusCode'],
                200
            );

            // Validate file content against s3 object
            Assert::assertEquals(
                $fileContent,
                $getObjectResult['Body']->getContents()
            );
        }
    }

    /**
     * @Given /^I have a total of (.*) objects in a bucket prefixed with (.*)$/
     */
    public function iHaveATotalOfObjectsInABucketPrefixedWith($numfile, $directory): void
    {
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );

        $numFileInt = (int)$numfile;
        for ($i = 0; $i < $numFileInt; $i++) {
            $s3TransferManager->upload(
                new UploadRequest(
                    Utils::streamFor("This is a test file content #" . ($i + 1)),
                    [
                        'Bucket' => self::getResourceName(),
                        'Key' => $directory . DIRECTORY_SEPARATOR . "file" . ($i + 1) . ".txt",
                    ]
                )
            )->wait();
        }
    }

    /**
     * @When /^I download all of them into the directory (.*)$/
     */
    public function iDownloadAllOfThemIntoTheDirectory($directory): void
    {
        $fullDirectoryPath = self::$tempDir . DIRECTORY_SEPARATOR . $directory;
        if (!is_dir($fullDirectoryPath)) {
            mkdir($fullDirectoryPath, 0777, true);
        }

        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3(),
        );
        $s3TransferManager->downloadDirectory(
            new DownloadDirectoryRequest(
                self::getResourceName(),
                $fullDirectoryPath,
                [],
                [
                    's3_prefix' => $directory . DIRECTORY_SEPARATOR,
                ]
            )
        )->wait();
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

        // Get list of objects from S3
        $objects = $s3Client->getPaginator('ListObjectsV2', [
            'Bucket' => self::getResourceName(),
            'Prefix' => $directory . DIRECTORY_SEPARATOR,
        ]);

        $count = 0;
        foreach ($objects as $page) {
            if (isset($page['Contents'])) {
                foreach ($page['Contents'] as $object) {
                    $key = $object['Key'];
                    $fileName = basename($key);
                    $localFilePath = $fullDirectoryPath . DIRECTORY_SEPARATOR . $fileName;

                    // Verify the file was downloaded locally
                    Assert::assertFileExists($localFilePath);

                    // Verify content matches S3 object
                    $s3Response = $s3Client->getObject([
                        'Bucket' => self::getResourceName(),
                        'Key' => $key,
                    ]);
                    $s3Content = $s3Response['Body']->getContents();
                    $localContent = file_get_contents($localFilePath);
                    Assert::assertEquals($s3Content, $localContent);

                    $count++;
                }
            }
        }

        Assert::assertEquals((int)$numfile, $count);
    }

    /**
     * @Given /^I am uploading the file (.*) with size (.*)$/
     */
    public function iAmUploadingTheFileWithSize($file, $size): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        file_put_contents($fullFilePath, str_repeat('*', (int)$size));
    }

    /**
     * @When /^I upload the file (.*) using multipart upload and fails at part number (.*)$/
     */
    public function iUploadTheFileUsingMultipartUploadAndFailsAtPartNumber(
        $file,
        $partNumberFail
    ): void
    {
        // Disable warning from trigger_error
        set_error_handler(function ($errno, $errstr) {});

        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        $transferListener = new class((int)$partNumberFail) extends AbstractTransferListener {
            private int $partNumber;
            private int $partNumberFail;

            public function __construct(int $partNumberFail) {
                $this->partNumberFail = $partNumberFail;
                $this->partNumber = 0;
            }

            public function bytesTransferred(array $context): bool
            {
                $this->partNumber++;
                if ($this->partNumber === $this->partNumberFail) {
                    throw new S3TransferException(
                        "Transfer failed at part number {$this->partNumber} failed"
                    );
                }

                return true;
            }
        };

        // To make sure transferFail is called
        $testCase = new class extends TestCase {};
        $transferListener2 = $testCase->getMockBuilder(
            AbstractTransferListener::class
        )->getMock();
        $transferListener2->expects($testCase->once())->method('transferInitiated');
        $transferListener2->expects($testCase->once())->method('transferFail');

        try {
            $s3TransferManager->upload(
                new UploadRequest(
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
                )
            )->wait();

            // If we reach here, the test should fail because exception was expected
            Assert::fail("Expected `S3TransferException` was not thrown");

        } catch (S3TransferException $exception) {
            Assert::assertEquals(
                "Transfer failed at part number {$partNumberFail} failed",
                $exception->getMessage(),
            );
        } catch (\Exception $e) {
            Assert::fail("Unexpected exception type: " . get_class($e) . " - " . $e->getMessage());
        } finally {
            // Restore error logging
            restore_error_handler();
        }
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

        // Make sure that, if there are in progress multipart uploads,
        // none are for the file being uploaded in this test.
        $multipartUploadCount = 0;
        if (isset($inProgressMultipartUploads['Uploads'])) {
            foreach ($inProgressMultipartUploads['Uploads'] as $upload) {
                if ($upload['Key'] === $file) {
                    $multipartUploadCount++;
                }
            }
        }

        Assert::assertEquals(0, $multipartUploadCount,
            "Expected no in-progress multipart uploads for file: {$file}");
    }

    /**
     * @Given /^I have a file (.*) to be uploaded of size (.*)$/
     */
    public function iHaveAFileToBeUploadedOfSize($file, $size): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        file_put_contents($fullFilePath, str_repeat('*', (int)$size));
    }

    /**
     * @When /^I upload the file (.*) with custom checksum algorithm (.*)$/
     */
    public function iUploadTheFileWithCustomChecksumAlgorithm(
        $file,
        $algorithm
    ): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        $s3TransferManager->upload(
            new UploadRequest(
                $fullFilePath,
                [
                    'Bucket' => self::getResourceName(),
                    'Key' => $file,
                    'ChecksumAlgorithm' => strtoupper($algorithm),
                ],
                [
                    'multipart_upload_threshold_bytes' => 1024 * 1024 * 5,
                ]
            )
        )->wait();
    }

    /**
     * @Then /^The checksum validation with algorithm (.*) for file (.*) should succeed$/
     */
    public function theChecksumValidationWithAlgorithmForFileShouldSucceed(
        $algorithm,
        $file
    ): void
    {
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        $downloadResult = $s3TransferManager->download(
            new DownloadRequest(
                source: [
                    'Bucket' => self::getResourceName(),
                    'Key' => $file,
                ],
                config: [
                    'response_checksum_validation' => 'when_supported'
                ]
            )
        )->wait();

        Assert::assertEqualsIgnoringCase(
            $algorithm,
            $downloadResult['ChecksumValidated'],
        );
    }

    /**
     * @When /^I upload the file (.*) with custom checksum (.*) and algorithm (.*)$/
     */
    public function iUploadTheFileWithCustomChecksumAndAlgorithm(
        $file,
        $checksum,
        $algorithm
    ): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        $s3TransferManager->upload(
            new UploadRequest(
                $fullFilePath,
                [
                    'Bucket' => self::getResourceName(),
                    'Key' => $file,
                    'Checksum'.strtoupper($algorithm) => $checksum,
                ],
                [
                    'multipart_upload_threshold_bytes' => 1024 * 1024 * 5,
                ]
            )
        )->wait();
    }

    /**
     * @Then /^The checksum validation with checksum (.*) and algorithm (.*) for file (.*) should succeed$/
     */
    public function theChecksumValidationWithChecksumAndAlgorithmForFileShouldSucceed(
        $checksum,
        $algorithm,
        $file
    ): void
    {
        $s3Client = self::getSdk()->createS3();
        $getObjectAttributesResult = $s3Client->getObjectAttributes([
            'Bucket' => self::getResourceName(),
            'Key' => $file,
            'ObjectAttributes' => [
                'Checksum'
            ]
        ]);

        // Assert the request was successful
        Assert::assertEquals(
            200,
            $getObjectAttributesResult['@metadata']['statusCode']
        );

        // Assert checksum matches to provided one
        $checksumAttributes = $getObjectAttributesResult['Checksum'];
        Assert::assertArrayHasKey(
            "Checksum".strtoupper($algorithm),
            $checksumAttributes,
        );
        Assert::assertEquals(
            $checksum,
            $checksumAttributes['Checksum'.strtoupper($algorithm)],
        );
        Assert::assertEquals(
            'FULL_OBJECT',
            $checksumAttributes['ChecksumType'],
        );
    }

    /**
     * @Given /^I have a file (.*) in S3 that requires multipart download$/
     */
    public function iHaveAFileInS3thatRequiresMultipartDownload($file): void
    {
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        // File size min bound is 16 MB in order to have a
        // failure after part number 2.
        $uploadResult = $s3TransferManager->upload(
            new UploadRequest(
                Utils::streamFor(
                    random_bytes(
                        random_int(
                            (1024 * 1024 * 8) * random_int(2, 4),
                            1024 * 1024 * 45
                        ),
                    )
                ),
                [
                    'Bucket' => self::getResourceName(),
                    'Key' => $file,
                ],
                [
                    'multipart_upload_threshold_bytes' => 1024 * 1024 * 8,
                ]
            )
        )->wait();
        Assert::assertEquals(
            200,
            $uploadResult['@metadata']['statusCode']
        );
    }

    /**
     * @When /^I try the download for file (.*), with resume enabled, it fails$/
     */
    public function iTryTheDownloadForFileWithResumeEnabledItFails($file): void
    {
        $destinationFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        $failListener = new class extends AbstractTransferListener {
            /** @var int */
            private int $failAtTransferredMb = (1024 * 1024 * 8) * 2;

            public function bytesTransferred(array $context): bool
            {
                $snapshot = $context[AbstractTransferListener::PROGRESS_SNAPSHOT_KEY];
                $transferredBytes = $snapshot->getTransferredBytes();

                if ($transferredBytes >= $this->failAtTransferredMb) {
                    throw new S3TransferException(
                        "Transfer fails at ". $this->failAtTransferredMb." bytes.",
                    );
                }

                return true;
            }
        };
        try {
            $s3TransferManager->downloadFile(
                new DownloadFileRequest(
                    $destinationFilePath,
                    true,
                    new DownloadRequest(
                        source: [
                            'Bucket' => self::getResourceName(),
                            'Key' => $file,
                        ],
                        config: [
                            'resume_enabled' => true
                        ],
                        listeners: [
                            $failListener,
                        ]
                    )
                )
            )->wait();

            Assert::fail("Not expecting to succeed");
        } catch (S3TransferException $e) {
            // Exception expected
            Assert::assertTrue(true);
        }
    }

    /**
     * @Then /^A resumable file for file (.*) must exists$/
     */
    public function aResumableFileForFileMustExists($file): void
    {
        $destinationFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        $resumeFileRegex = $destinationFilePath . "*.resume";
        $matchResumeFile = glob($resumeFileRegex);

        Assert::assertFalse(
            empty($matchResumeFile),
        );
    }

    /**
     * @Then /^We resume the download for file (.*) and it should succeed$/
     */
    public function weResumeTheDownloadForFileAndItShouldSucceed($file): void
    {
        $destinationFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        $resumeFileRegex = $destinationFilePath . ".s3tmp.*.resume";
        $matchResumeFile = glob($resumeFileRegex);
        if (empty($matchResumeFile)) {
            Assert::fail(
                "Resume file must exists for file " . $destinationFilePath,
            );
        }

        $resumeFile = $matchResumeFile[0];
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        $s3TransferManager->resumeDownload(
            new ResumeDownloadRequest(
                $resumeFile,
            )
        )->wait();

        Assert::assertFileDoesNotExist($resumeFile);
        Assert::assertFileExists($destinationFilePath);
    }

    /**
     * @Given /^I have a file (.*) on disk that requires multipart upload$/
     */
    public function iHaveAFileOnDiskThatRequiresMultipartUpload($file): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        file_put_contents(
            $fullFilePath,
            random_bytes(
                random_int(
                    (1024 * 1024 * 8) * 2,
                    (1024 * 1024 * 45)
                ),
            )
        );
    }

    /**
     * @When /^I try to upload the file (.*), with resume enabled, it fails$/
     */
    public function iTryToUploadTheFileWithResumeEnabledItFails($file): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        $failListener = new class extends AbstractTransferListener {
            /** @var int */
            private int $failAtTransferredMb = (1024 * 1024 * 8) * 2;

            public function bytesTransferred(array $context): bool
            {
                $snapshot = $context[AbstractTransferListener::PROGRESS_SNAPSHOT_KEY];
                $transferredBytes = $snapshot->getTransferredBytes();

                if ($transferredBytes >= $this->failAtTransferredMb) {
                    throw new S3TransferException(
                        "Transfer fails at ". $this->failAtTransferredMb." bytes.",
                    );
                }

                return true;
            }
        };
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        try {
            $s3TransferManager->upload(
                new UploadRequest(
                    source: $fullFilePath,
                    uploadRequestArgs: [
                        'Bucket' => self::getResourceName(),
                        'Key' => $file,
                    ],
                    config: [
                        'resume_enabled' => true,
                        'multipart_upload_threshold_bytes' => 8 * 1024 * 1024,
                    ],
                    listeners: [
                        $failListener
                    ]
                )
            )->wait();

            Assert::fail("Not expecting to succeed");
        } catch (S3TransferException $e) {
            // Expects a failure
            Assert::assertTrue(true);
        }
    }

    /**
     * @Then /^We resume the upload for file (.*) and it should succeed$/
     */
    public function weResumeTheUploadForFileAndItShouldSucceed($file): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        $resumeFilePath = $fullFilePath . ".resume";
        Assert::assertFileExists($resumeFilePath);

        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        $s3TransferManager->resumeUpload(
            new ResumeUploadRequest(
                $resumeFilePath,
            )
        )->wait();

        Assert::assertFileDoesNotExist($resumeFilePath);
    }

    /**
     * @Then /^The file (.*) in s3 should match the local file$/
     */
    public function theFileInSshouldMatchTheLocalFile($file): void
    {
        $fullFilePath = self::$tempDir . DIRECTORY_SEPARATOR . $file;
        $s3TransferManager = new S3TransferManager(
            self::getSdk()->createS3()
        );
        $result = $s3TransferManager->download(
            new DownloadRequest(
                source: [
                    'Bucket' => self::getResourceName(),
                    'Key' => $file,
                ]
            )
        )->wait();

        $dataResult = $result->getDownloadDataResult();

        // Make sure sizes are equals
        Assert::assertEquals(
            filesize($fullFilePath),
            $dataResult->getSize(),
        );

        // Make sure contents are equals
        $handle = fopen($fullFilePath, "r");
        try {
            $chunkSize = 8192;
            while (!feof($handle)) {
                $fileChunk = fread($handle, $chunkSize);
                $streamChunk = $dataResult->read($chunkSize);

                Assert::assertEquals(
                    $fileChunk,
                    $streamChunk,
                );
            }
        } finally {
            fclose($handle);
        }
    }
}