<?php

namespace Aws\Test\Integ;

use Aws\S3\S3Client;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Aws\S3\PostObject;
use Aws\S3\PostObjectV4;
use Aws\S3\BatchDelete;
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

    private static $tempFile;
    private $inputs;
    private $attributes;

    /**
     * @Given I have an :S3 client
     */
    public function iHaveAnClient()
    {
        $this->s3Client = self::getSdk()->createS3();
    }

    /**
     * @Given I have a :file
     */
    public function iHaveAFile()
    {
        $this->stream = Psr7\stream_for(Psr7\try_fopen(self::$tempFile, 'r'));
    }

    /**
     * @When I create a POST object
     */
    public function iCreateAPostObject()
    {
        date_default_timezone_set('UTC');

        // Post Object V2
        $policyV2 = [
            'expiration' => gmdate('Y-m-d\TH:i:s\Z', strtotime('+1 hours')),
            'conditions' => [
                ["bucket" => self::getResourceName()],
                ["starts-with", '$key', ""],
                ["acl" => "public-read"],
            ],
        ];
        $postObject = new PostObject(
            $this->s3Client,
            self::getResourceName(),
            [
                'acl' => 'public-read'
            ],
            $policyV2
        );

        $this->preparePostData($postObject, 'V2');

        // Post Object V4
        $ldt = gmdate(PostObject::ISO8601_BASIC);
        $sdt = substr($ldt, 0, 8);

        $scope = "$sdt/{$this->s3Client->getRegion()}/s3/aws4_request";
        $credentails = "{$this->s3Client->getCredentials()->wait()->getAccessKeyId()}/$scope";

        $policyV4 = [
            'expiration' => gmdate('Y-m-d\TH:i:s\Z', strtotime('+1 hours')),
            'conditions' => [
                ["bucket" => self::getResourceName()],
                ["starts-with", '$key', ""],
                ["acl" => "public-read"],
                ["x-amz-credential" => $credentails],
                ["x-amz-algorithm" => "AWS4-HMAC-SHA256"],
                ["x-amz-date" => $ldt],
            ],
        ];
        $postObjectV4 = new PostObjectV4(
            $this->s3Client,
            self::getResourceName(),
            $policyV4['conditions']
        );
        $this->preparePostData($postObjectV4, 'V4');
    }

    /**
     * @When I make a HTTP POST request
     */
    public function iMakeAHttpPostRequest()
    {
        //V2
        try {
            (new Client)->request(
                $this->attributes['V2']['method'],
                $this->attributes['V2']['action'],
                [
                    'multipart' => $this->inputs['V2'],
                ]
            );
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody();
        }

        // V4
        try {
            (new Client)->request(
                $this->attributes['V4']['method'],
                $this->attributes['V4']['action'],
                [
                    'multipart' => $this->inputs['V4'],
                ]
            );
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody();
        }
    }

    /**
     * @Then a file is uploaded
     */
    public function aFileIsUploaded()
    {
        Assert::assertTrue($this->s3Client->doesObjectExist(
            self::getResourceName(),
            'fileV2.ext'
        ));
        Assert::assertTrue($this->s3Client->doesObjectExist(
            self::getResourceName(),
            'fileV4.ext'
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

    /**
     * Prepare form inputs and attribute for POST
     */
    private function preparePostData($postObject, $version)
    {
        $this->attributes[$version] = $postObject->getFormAttributes();
        foreach ($postObject->getFormInputs() as $name => $contents) {
            $this->inputs[$version] []= [
                'name' => $name,
                'contents' => $contents,
            ];
        }
        $this->inputs[$version] []= [
            'name' => 'file',
            'contents' => $this->stream,
            'filename' => 'file'. $version .'.ext',
        ];
    }
}
