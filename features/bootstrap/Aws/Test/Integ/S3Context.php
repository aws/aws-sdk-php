<?php

namespace Aws\Test\Integ;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Aws\S3\PostObject;
use Aws\S3\BatchDelete;
use Aws\ResultInterface;
// use Aws\Credentials\Credentials;
use GuzzleHttp\Psr7;
use PHPUnit_Framework_Assert as Assert;

/**
 * Defines application features from the specific context.
 */
class S3Context implements Context, SnippetAcceptingContext
{
    use IntegUtils;

    const MB = 1048576;
    const RESOURCE_POSTFIX = 'php-integration-s3-post-object-test';

    /** @var S3Client */
    private $S3Client;
    /** @var StreamInterface */
    private $stream;
    /** @var ResultInterface */
    private $result;

    private static $tempFile;

    /**
     * @Given I have an :S3 client
     */
    public function iHaveAnClient()
    {
        $this->S3Client = self::getSdk()->createS3();
        $this->stream = Psr7\stream_for(Psr7\try_fopen(self::$tempFile, 'r'));
    }

    /**
     * @When I do a POST upload
     */
    public function iDoAPostUpload()
    {
        $policy = [
            'expiration' => '2016-12-01T12:00:00.000Z',
            'conditions' => [
                ['acl' => 'public-read'],
            ]
        ];

        $client = new \GuzzleHttp\Client();

        $postObject = new PostObject(
            $this->S3Client,
            self::getResourceName(),
            [],
            $policy
        );

        try {
                $reponse = $client->request(
                $postObject->getFormAttributes()['method'],
                $postObject->getFormAttributes()['action'], [
                'multipart' => [
                    [
                        'name'     => 'key',
                        'contents' => $postObject->getFormInputs()['key']
                    ],
                    [
                        'name'     => 'policy',
                        'contents' => $postObject->getFormInputs()['policy']
                    ],
                    [
                        'name'     => 'signature',
                        'contents' => $postObject->getFormInputs()['signature']
                    ],
                    [
                        'name'     => 'AWSAccessKeyId',
                        'contents' => $postObject->getFormInputs()['AWSAccessKeyId']
                    ],
                    [
                        'name'     => 'file',
                        'contents' => self::$tempFile
                    ],
                ]
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody();
        }
    }

    /**
     * @Then an object is uploaded
     */
    public function anObjectIsUploaded()
    {
        // $S3Client = self::getSdk()->createS3();
        // Assert::assertTrue($S3Client->doesObjectExist(
        //     self::getResourceName(),
        //     '' // key
        // ));

        // $result = $S3Client->listObjects([
        //     'Bucket' => self::getResourceName()
        // ]);
        // print_r($result);
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

    private static function getResourceName()
    {
        static $bucketName;

        if (empty($bucketName)) {
            $bucketName = self::getResourcePrefix() . self::RESOURCE_POSTFIX;
        }

        return $bucketName;
    }
}
