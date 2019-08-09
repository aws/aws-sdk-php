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

    /** @var RequestInterface */
    private $presignedRequest;

    /** @var S3Client */
    private $s3Client;
    /** @var StreamInterface */
    private $stream;
    private static $tempFile;
    private $inputs;
    private $attributes;
    // for post object
    private $formInputs = [];
    private $jsonPolicy;
    private $options;
    private $expires;

    private static function getResourceName()
    {
        static $bucketName;

        if (empty($bucketName)) {
            $bucketName =
                self::getResourcePrefix() . 'aws-test-integ-s3-context';
        }

        return $bucketName;
    }

    /**
     * @BeforeSuite
     */
    public static function createTempFile()
    {
        self::$tempFile = tempnam(sys_get_temp_dir(), self::getResourceName());
        file_put_contents(self::$tempFile, str_repeat('x', 128 * 1024));
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
        $result = $client->listObjectsV2([
            'Bucket' => self::getResourceName()
        ]);

        // Delete objects & wait until no longer available before deleting bucket
        $client->deleteMatchingObjects(self::getResourceName(), '', '//');
        if (!empty($result['Contents']) && is_array($result['Contents'])) {
            foreach ($result['Contents'] as $object) {
                $client->waitUntil('ObjectNotExists', [
                    'Bucket' => self::getResourceName(),
                    'Key' => $object['Key']
                ]);
            }
        }

        // Delete bucket and wait until bucket is no longer available
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
        // Not using assertStringFileEquals here due to issues with remote files
        Assert::assertEquals(
            $body,
            file_get_contents($this->presignedRequest->getUri())
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

    /**
     * @Given I have an s3 client and I have a file
     */
    public function iHaveAnClientAndIHaveAFile()
    {
        $this->s3Client = self::getSdk()->createS3();
        $this->stream = Psr7\stream_for(Psr7\try_fopen(self::$tempFile, 'r'));
    }

    /**
     * @Given I have an array of form inputs as following:
     */
    public function iHaveAnArrayOfFormInputsAsFollowing(TableNode $table)
    {
        foreach ($table as $row) {
            $this->formInputs += [$row['key'] => $row['value']];
        }
    }

    /**
     * @Given I provide a json string policy as following:
     */
    public function iProvideAJsonStringPolicyAsFollowing(PyStringNode $string)
    {
        $policy = json_decode($string->getRaw(),true);
        $policy['conditions'][] = ["bucket" => self::getResourceName()];
        $policy['conditions'][] = ["starts-with", '$key', ""];

        $this->jsonPolicy = json_encode($policy);
    }

    /**
     * @When I create a POST object SigV2 with inputs and policy
     */
    public function iCreateAPostObjectSigvWithInputsAndPolicy()
    {
        $postObject = new PostObject(
            $this->s3Client,
            self::getResourceName(),
            $this->formInputs,
            $this->jsonPolicy
        );
        $this->preparePostData($postObject);
    }

    /**
     * @Given I provide an array of policy conditions as following:
     */
    public function iProvideAnArrayOfPolicyConditionsAsFollowing(TableNode $table)
    {
        $this->options = [
            ["bucket" => self::getResourceName()],
            ["starts-with", '$key', ""],
        ];
        foreach ($table as $row) {
            $this->options[] = [$row['key'] => $row['value']];
        }
    }

    /**
     * @Given I want the policy expires after :expires
     */
    public function iWantThePolicyExpiresAfter($expires)
    {
        $this->expires = $expires;
    }

    /**
     * @When I create a POST object SigV4 with inputs and policy
     */
    public function iCreateAPostObjectSigvWithInputsAndPolicy2()
    {
        $postObject = new PostObjectV4(
            $this->s3Client,
            self::getResourceName(),
            $this->formInputs,
            $this->options,
            $this->expires
        );

        $this->preparePostData($postObject);
    }

    /**
     * @When I make a HTTP POST request
     */
    public function iMakeAHttpPostRequest()
    {
        try {
            (new Client)->request(
                $this->attributes['method'],
                $this->attributes['action'],
                [
                    'multipart' => $this->inputs,
                ]
            );
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getBody();
        }
    }

    /**
     * @Then the file called :filename is uploaded
     */
    public function theFileCalledIsUploaded($filename)
    {
        Assert::assertTrue($this->s3Client->doesObjectExist(
            self::getResourceName(),
            $filename
        ));

        $fileContents = str_repeat('x', 128 * 1024);
        Assert::assertEquals(
            $fileContents,
            $this->s3Client->getObject([
                'Bucket' => self::getResourceName(),
                'Key' => $filename,
            ])['Body']->getContents()
        );
    }

    /**
     * Prepare form inputs and attribute for POST
     */
    private function preparePostData($postObject)
    {
        $this->attributes = $postObject->getFormAttributes();
        foreach ($postObject->getFormInputs() as $name => $contents) {
            $this->inputs[] = [
                'name' => $name,
                'contents' => $contents,
            ];
        }
        $this->inputs[] = [
            'name' => 'file',
            'contents' => $this->stream,
            'filename' => 'file.ext',
        ];
    }
}
