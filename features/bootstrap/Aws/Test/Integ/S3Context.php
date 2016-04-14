<?php

namespace Aws\Test\Integ;

use Aws\S3\S3Client;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Aws\S3\PostObject;
use Aws\S3\BatchDelete;
use Aws\ResultInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use PHPUnit_Framework_Assert as Assert;
use Psr\Http\Message\StreamInterface;

/**
 * Defines application features from the specific context.
 */
class S3Context implements Context, SnippetAcceptingContext
{
    use IntegUtils;

    const MB = 1048576;
    const RESOURCE_POSTFIX = 'php-integration-s3-post-object-test';

    /** @var S3Client */
    private $s3Client;
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
        $this->s3Client = self::getSdk()->createS3();
        $this->stream = Psr7\stream_for(Psr7\try_fopen(self::$tempFile, 'r'));
    }

    /**
     * @When I do a POST upload
     */
    public function iDoAPostUpload()
    {
        date_default_timezone_set('UTC');
        $ldt = gmdate(PostObject::ISO8601_BASIC);
        $sdt = substr($ldt, 0, 8);

        $scope = "$sdt/{$this->s3Client->getRegion()}/s3/aws4_request";
        $credentails = "{$this->s3Client->getCredentials()->wait()->getAccessKeyId()}/$scope";

        $policy = [
            'expiration' => gmdate('Y-m-d\TH:i:s\Z', strtotime('+1 hour')),
            'conditions' => [
                ["bucket" => self::getResourceName()],
                ["starts-with", '$key', ""],
                ["acl" => "public-read"],
                ["x-amz-credential" => $credentails],
                ["x-amz-algorithm" => "AWS4-HMAC-SHA256"],
                ["x-amz-date" => $ldt],
            ],
        ];

        $postObject = new PostObject(
            $this->s3Client,
            self::getResourceName(),
            [
                'acl' => 'public-read',
            ],
            $policy
        );

        $attributes = $postObject->getFormAttributes();
        $inputs = []; // format formInputs to multiparts
        foreach ($postObject->getFormInputs() as $name => $contents) {
            $inputs []= [
                'name' => $name,
                'contents' => $contents,
            ];
        }

        $inputs []= [
            'name' => 'file',
            'contents' => $this->stream,
            'filename' => 'file.ext',
        ];

        try {
            (new Client)->request(
                $attributes['method'],
                $attributes['action'],
                [
                    'multipart' => $inputs,
                ]
            );
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody();
        }
    }

    /**
     * @Then an object is uploaded
     */
    public function anObjectIsUploaded()
    {
        Assert::assertTrue($this->s3Client->doesObjectExist(
            self::getResourceName(),
            'file.ext'
        ));
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
