<?php
namespace Aws\Test\Integ;

use Aws\EventBridge\EventBridgeClient;
use Aws\EventBridge\Exception\EventBridgeException;
use Aws\Route53\Route53Client;
use Aws\Sts\StsClient;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Aws\S3\S3Client;
use Aws\S3Control\S3ControlClient;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use PHPUnit\Framework\Assert;
use Psr\Http\Message\StreamInterface;

class CrtContext implements Context, SnippetAcceptingContext
{
    use IntegUtils;

    private static $multiRegionAccessPoint;
    private static $tempFile;
    private static $eventBuses = [];
    private static $healthCheckArn;
    private static $healthCheckId;
    private static $globalEndpoint;

    /** @var EventBridgeClient */
    private $eventBridgeClient;
    /** @var array */
    private $eventConfig;
    /** @var S3Client */
    private $s3Client;
    /** @var StreamInterface */
    private $stream;
    /** @var RequestInterface */
    private $presignedRequest;

    /**
     * @BeforeFeature @mrap
     */
    public static function setMultiRegionAccessPoint()
    {
        $sts = new StsClient([
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);
        $identity = $sts->getCallerIdentity([])['Account'];
        $s3control = new S3ControlClient([
            'region' => 'us-west-2',
            'version' => 'latest'
        ]);
        $mraps = $s3control->listMultiRegionAccessPoints([
            'AccountId' => $identity
        ]);
        $alias = $mraps['AccessPoints'][0]['Alias'];
        $mrap = "arn:aws:s3::{$identity}:accesspoint/{$alias}";
        self::$multiRegionAccessPoint = $mrap;
    }

    /**
     * @BeforeFeature @mrap
     */
    public static function createTempFile()
    {
        self::$tempFile = tempnam(sys_get_temp_dir(), 'mrap-test');
        file_put_contents(self::$tempFile, str_repeat('x', 128 * 1024));
    }

    /**
     * @AfterFeature @mrap
     */
    public static function deleteTempFile()
    {
        unlink(self::$tempFile);
    }

    /**
     * @BeforeFeature @eventbridge
     */
    public static function setEventBuses()
    {
        $usEastClient = new EventBridgeClient([
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);
        $eventBusEast = $usEastClient->describeEventBus(['Name' => 'default'])['Arn'];
        $eventBusWest = str_replace('us-east-1', 'us-west-2', $eventBusEast);
        array_push(
            self::$eventBuses,
            ['EventBusArn' => $eventBusEast],
            ['EventBusArn' => $eventBusWest]
        );
    }

    /**
     * @BeforeFeature @eventbridge
     */
    public static function createHealthCheck()
    {
        $route53Client = new Route53Client([
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);
        $response = $route53Client->createHealthCheck([
            'CallerReference' => uniqid(),
            'HealthCheckConfig' => [
                'HealthThreshold' => 0,
                'Type' => 'CALCULATED'
            ]
        ]);
        self::$healthCheckId = $response['HealthCheck']['Id'];
        self::$healthCheckArn = "arn:aws:route53:::healthcheck/{$response['HealthCheck']['Id']}";
    }

    /**
     * @BeforeFeature @eventbridge
     */
    public static function createGlobalEndpoint()
    {
        $eventBridgeClient = new EventBridgeClient([
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);
        $currentEndpoints = $eventBridgeClient->listEndpoints();
        $testEndpointExists = false;
        foreach ($currentEndpoints['Endpoints'] as $endpoint) {
            if ($endpoint['Name'] == 'test-endpoint') {
                $testEndpointExists = true;
                break;
            }
        }
        if (!$testEndpointExists) {
            $eventBridgeClient->createEndpoint([
                'Name' => 'test-endpoint',
                'EventBuses' => self::$eventBuses,
                'ReplicationConfig' => [
                    'State' => 'DISABLED'
                ],
                'RoutingConfig' => [
                    'FailoverConfig' => [
                        'Primary' => [
                            'HealthCheck' => self::$healthCheckArn
                        ],
                        'Secondary' => [
                            'Route' => 'us-west-2'
                        ]
                    ]
                ]
            ]);
        }

        $attempts = 0;
        $active = false;
        $result = null;
        while (!$active && $attempts <= 5) {
            $result = $eventBridgeClient->describeEndpoint(['Name' => 'test-endpoint']);
            $active = $result['State'] === 'ACTIVE';
            sleep((int) pow(1.2, $attempts));
            $attempts++;
        }
        self::$globalEndpoint = $result['EndpointId'];
    }

    /**
     * @AfterFeature @eventbridge
     */
    public static function deleteGlobalEndpoint()
    {
        $eventBridgeClient = new EventBridgeClient([
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);
        $eventBridgeClient->deleteEndpoint([
            'Name' => 'test-endpoint'
        ]);
    }

    /**
     * @AfterFeature @eventbridge
     */
    public static function deleteHealthCheck()
    {
        $route53Client = new Route53Client([
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);
        $route53Client->deleteHealthCheck([
            'HealthCheckId' => self::$healthCheckId
        ]);
    }

    /**
     * @Given I have a s3 client and I have a file
     */
    public function iHaveAnClientAndIHaveAFile()
    {
        $this->s3Client = self::getSdk()->createS3();
        $this->stream = Psr7\Utils::streamFor(Psr7\Utils::tryFopen(self::$tempFile, 'r'));
    }

    /**
     * @Given I upload the file to my multi-region access point
     */
    public function iUploadTheFileToMyMultiRegionAccessPoint()
    {
        $this->s3Client->putObject([
            'Bucket' => self::$multiRegionAccessPoint,
            'Key' => 'mrap-test',
            'Body' => $this->stream,
        ]);
    }

    /**
     * @Then I can confirm the object exists
     */
    public function iConfirmTheObjectHasBeenCreated()
    {
        Assert::assertTrue(
            $this->s3Client->doesObjectExistV2(self::$multiRegionAccessPoint, 'mrap-test')
        );
    }

    /**
     * @Given I have a s3 client and I have multi-region access point
     */
    public function iHaveAS3ClientAndIHaveAMultiRegionAccessPoint()
    {
        $this->s3Client = self::getSdk()->createS3();
        Assert::assertTrue(
            $this->s3Client->doesBucketExistV2(self::$multiRegionAccessPoint)
        );
    }

    /**
     * @Then I can confirm my access point has at least one object
     */
    public function iCanConfirmMyAccessPointHasAtLeastOneObject()
    {
        $result = $this->s3Client->listObjectsV2(['Bucket' => self::$multiRegionAccessPoint]);
        Assert::assertTrue(
            !empty($result['Contents'])
        );
    }

    /**
     * @When I use the PutObject operation and update the file to have a body of "test"
     */
    public function iUseThePutObjectOperationAndUpdateTheFileToHaveABodyOfTest()
    {
        $this->s3Client->putObject([
            'Bucket' => self::$multiRegionAccessPoint,
            'Key' => 'mrap-test',
            'Body' => 'test',
        ]);
    }

    /**
     * @Then I can confirm the object has been updated
     * @Given I have uploaded an object to S3 with a key of `mrap-test` and a body of `test`
     */
    public function iCanConfirmTheObjectHasBeenUpdated()
    {
        $result = $this->s3Client->getObject(['Bucket' => self::$multiRegionAccessPoint, 'Key' => 'mrap-test']);
        Assert::assertEquals(
            'test',
            (string) $result['Body']
        );
    }

    /**
     * @When I create a pre-signed request for a :command command with:
     */
    public function iCreateAPreSignedUrlForACommandWith(
        $commandName,
        TableNode $table
    ) {
        $args = ['Bucket' => self::$multiRegionAccessPoint];
        foreach ($table as $row) {
            $args[$row['key']] = $row['value'];
        }
        $client = $this->s3Client;
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
        (new Client())->send($this->presignedRequest);
    }

    /**
     * @When I delete the object
     */
    public function iDeleteTheObject()
    {
        $this->s3Client->deleteObject([
            'Bucket' => self::$multiRegionAccessPoint,
            'Key' => 'mrap-test',
        ]);
    }

    /**
     * @Then I can confirm the object has been deleted
     */
    public function iCanConfirmTheObjectHasBeenDeleted()
    {
        Assert::assertFalse(
            $this->s3Client->doesObjectExistV2(self::$multiRegionAccessPoint, 'mrap-test')
        );
    }

    /**
     * @Given I have an eventbridge client and I have an event configuration
     */
    public function iHaveAnEventbridgeClientAndIHaveAnEventConfiguration()
    {
        $this->eventBridgeClient = new EventBridgeClient([
            'region' => 'us-east-1',
            'version' => 'latest'
        ]);
        $this->eventConfig = [[]];
    }

    /**
     * @Then I can upload an event using my global endpoint
     */
    public function iCanUploadAnEventUsingMyGlobalEndpoint()
    {
        $attempts = 0;
        while ($attempts <= 5) {
            try {
                $this->eventBridgeClient->putEvents([
                    'EndpointId' => self::$globalEndpoint,
                    'Entries' => $this->eventConfig
                ]);
            } catch (EventBridgeException $e) {
                if (strpos($e->getMessage(), 'Could not resolve host') === false) {
                    throw $e;
                }
                $attempts++;
                sleep((int) pow(1.2, $attempts));
            }
        }
    }
}