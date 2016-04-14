<?php
namespace Aws\Test\Integ;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use PHPUnit_Framework_Assert as Assert;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class S3Context implements Context, SnippetAcceptingContext
{
    use IntegUtils;

    /** @var RequestInterface */
    private $presignedRequest;

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

    private static function getResourceName()
    {
        static $bucketName;

        if (empty($bucketName)) {
            $bucketName = self::getResourcePrefix() . '-'
                . preg_replace('/\W/', '-', self::class);
        }

        return $bucketName;
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
