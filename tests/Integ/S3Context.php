<?php
namespace Aws\Test\Integ;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Aws\S3\S3Client;
use Aws\S3\PostObject;
use Aws\S3\PostObjectV4;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use PHPUnit_Framework_Assert as Assert;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class S3Context implements Context, SnippetAcceptingContext
{
    use IntegUtils;

    const MB = 1048576;
    const RESOURCE_POSTFIX = 'aws-test-integ-s3-context';

    /** @var RequestInterface */
    private $presignedRequest;

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

    private static function getResourceName()
    {
        static $bucketName;

        if (empty($bucketName)) {
            $bucketName = self::getResourcePrefix() . self::RESOURCE_POSTFIX;
        }

        return $bucketName;
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
     * @BeforeSuite
     */
    public static function createTestBucket()
    {
        $client = self::getSdk()->createS3();
        if (!$client->doesBucketExist(self::getResourceName())) {
            $client->createBucket(['Bucket' => self::getResourceName()]);
            $client->waitUntil('BucketExists', [
                'Bucket' => self::getResourceName(),
            ]);
        }
    }

    /**
     * @AfterSuite
     */
    public static function deleteTestBucket()
    {
        $client = self::getSdk()->createS3();
        $client->deleteMatchingObjects(self::getResourceName(), '', '//');
        $client->deleteBucket(['Bucket' => self::getResourceName()]);
        $client->waitUntil('BucketNotExists', [
            'Bucket' => self::getResourceName(),
        ]);
    }

    /**
     * @Given I have uploaded an object to S3 with a key of :key and a body of :body
     */
    public function iHaveUploadedThatStringToSWithAKeyOfAndABodyOf($key, $body)
    {
        self::getSdk()
            ->createS3()
            ->putObject([
                'Bucket' => self::getResourceName(),
                'Key' => $key,
                'Body' => $body,
            ]);
    }

    /**
     * @When I create a pre-signed request for a :command command with:
     */
    public function iCreateAPreSignedUrlForACommandWith(
        $commandName,
        TableNode $table
    ) {
        $args = ['Bucket' => self::getResourceName()];
        foreach ($table as $row) {
            $args[$row['key']] = $row['value'];
        }
        $client = self::getSdk()->createS3();
        $command = $client->getCommand($commandName, $args);
        $this->presignedRequest = $client
            ->createPresignedRequest($command, '+1 hour');
    }

    /**
     * @Then the contents of the response to the presigned request should be :body
     */
    public function theContentsAtThePresignedUrlShouldBe($body)
    {
        Assert::assertSame(
            $body,
            file_get_contents((string) $this->presignedRequest->getUri())
        );
    }

    /**
     * @Given I send the pre-signed request
     */
    public function iSendThePreSignedRequest()
    {
        (new Client)->send($this->presignedRequest);
    }

    /**
     * @Given I change the body of the pre-signed request to be :body
     */
    public function iChangeTheBodyOfThePreSignedRequestToBe($body)
    {
        $this->presignedRequest = $this->presignedRequest
            ->withBody(Psr7\stream_for($body));
    }
}
