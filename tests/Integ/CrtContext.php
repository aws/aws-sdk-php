<?php
namespace Aws\Test\Integ;

use Aws\S3\Exception\S3Exception;
use Aws\Sts\StsClient;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Aws\S3Control\S3ControlClient;
use Aws\S3\S3Client;
use Aws\S3\PostObjectV4;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\Assert;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

class CrtContext implements Context
{
    use IntegUtils;

    /** @var string */
    private $mrapArn;

    /** @var RequestInterface */
    private $presignedRequest;

    /** @var S3Client */
    private $s3Client;

    /**
     * @BeforeFeature
     */
    public static function setMultiRegionAccessPoint()
    {
        $sts = new StsClient([
            'version' => 'latest',
            'region' => 'us-east-1'
        ]);
        $identity = $sts->getCallerIdentity([])['Account'];
        $s3Control = new S3ControlClient([
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);
        $accesspoints = $s3Control->listMultiRegionAccessPoints(['AccountId' => $identity]);
        $alias = $accesspoints[0]['Alias'];

        $this->mrapArn = "arn:aws:s3::{$identity}:accesspoint/{$alias}";
    }

    /**
     * @AfterFeature
     */
    public static function deleteTestBucket()
    {

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
            ->withBody(Psr7\Utils::streamFor($body));
    }

    /**
     * @Given I have a s3 client and I have a file
     */
    public function iHaveAClientAndIHaveAFile()
    {
        $this->s3Client = self::getSdk()->createS3();
        $this->stream = Psr7\Utils::streamFor(Psr7\Utils::tryFopen(self::$tempFile, 'r'));
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
     * @Given I have uploaded an object to S3 with BucketKey enabled
     */
    public function iHaveUploadedAnObjectToS3WithBucketKeyEnabled()
    {
        self::getSdk()
            ->createS3()
            ->putObject([
                'Bucket' => self::getResourceName(),
                'Key' => 'test.dat',
                'Body' => 'foo',
                'BucketKeyEnabled' => true,
                'ServerSideEncryption' => 'aws:kms'
            ]);
    }

    /**
     * @Then I can verify Bucket Key is enabled at the object level
     */
    public function iCanVerifyBucketKeyIsEnabledAtTheObjectLevel()
    {
        $response = self::getSdk()
            ->createS3()
            ->headObject([
                'Bucket' => self::getResourceName(),
                'Key' => 'test.dat',
            ]);
        $responseHeaders = $response['@metadata']['headers'];
        Assert::assertEquals(
            'true',
            $responseHeaders['x-amz-server-side-encryption-bucket-key-enabled']
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

    /**
     * Executes S3 client method, adding retries for specified status codes.
     * A practical work-around for the testing workflow, given eventual
     * consistency constraints.
     *
     * @param S3Client $client
     * @param string $command
     * @param array $args
     * @param int $retries
     * @param array $statusCodes
     * @return mixed
     */
    private static function executeWithRetries(
        $client,
        $command,
        $args,
        $retries,
        $statusCodes
    ) {
        $attempts = 0;

        while (true) {
            try {
                return call_user_func([$client, $command], $args);
            } catch (S3Exception $e) {
                if (!in_array($e->getStatusCode(), $statusCodes)
                    || $attempts >= $retries
                ) {
                    throw $e;
                }
                $attempts++;
                sleep((int) pow(1.2, $attempts));
            }
        }
    }
}