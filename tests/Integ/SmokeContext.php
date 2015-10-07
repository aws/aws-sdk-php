<?php
namespace Aws\Test\Integ;

use Aws;
use Aws\Exception\AwsException;
use Aws\JsonCompiler;
use Aws\Result;
use Aws\Sdk;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\AfterFeatureScope;
use Behat\Behat\Hook\Scope\BeforeFeatureScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use JmesPath\Env;
use PHPUnit_Framework_Assert;

class SmokeContext extends PHPUnit_Framework_Assert implements
    Context,
    SnippetAcceptingContext
{
    use IntegUtils;

    /**
     * @var Sdk
     */
    protected $sdk;

    /**
     * @var string
     */
    protected $serviceName;

    /**
     * @var \Aws\AwsClientInterface
     */
    protected $client;

    /**
     * @var Result
     */
    protected $response;

    /**
     * @var AwsException
     */
    protected $error;

    private static $cloudFrontOriginAccessId;

    private static $cloudFrontETag;

    private static $configOverrides = [
        'DeviceFarm' => [
            'region' => 'us-west-2',
        ],
        'Efs' => [
            'region' => 'us-west-2',
        ],
        'Inspector' => [
            'region' => 'us-west-2',
        ],
    ];

    /**
     * @BeforeSuite
     */
    public static function prepare()
    {
        error_reporting(-1);
        date_default_timezone_set('UTC');

        // Clear out any previously compiled JMESPath files.
        Env::cleanCompileDir();
    }

    /**
     * @BeforeFeature @cloudfront
     *
     * @param BeforeFeatureScope $scope
     */
    public static function setUpCloudFront(BeforeFeatureScope $scope)
    {
        /** @var \Aws\Result $result */
        $result = self::getSdk(self::$configOverrides)
            ->createCloudFront()
            ->createCloudFrontOriginAccessIdentity([
                'CloudFrontOriginAccessIdentityConfig' => [
                    'CallerReference' => rand(0, PHP_INT_MAX),
                    'Comment' => 'Foo Bar, Baz!',
                ],
            ]);

        self::$cloudFrontOriginAccessId = $result
            ->search('CloudFrontOriginAccessIdentity.Id');
        self::$cloudFrontETag = $result['ETag'];
    }

    /**
     * @AfterFeature @cloudfront
     *
     * @param AfterFeatureScope $scope
     */
    public static function tearDownCloudFront(AfterFeatureScope $scope)
    {
        self::getSdk(self::$configOverrides)
            ->createCloudFront()
            ->deleteCloudFrontOriginAccessIdentity([
                'Id' => self::$cloudFrontOriginAccessId,
                'IfMatch' => self::$cloudFrontETag,
            ]);
    }

    /**
     * @BeforeFeature @efs
     *
     * Ensure that the testing credentials have access to the EFS preview;
     * skip entire feature otherwise.
     *
     * @param BeforeFeatureScope $scope
     */
    public static function setUpEfs(BeforeFeatureScope $scope)
    {
        try {
            self::getSdk(self::$configOverrides)
                ->createEfs()
                ->describeFileSystems();
        } catch (\Exception $e) {
            // If the test failed because the account has no access to EFS,
            // throw the exception to cause the feature to be skipped.
            if ($e instanceof AwsException
                && 'AccessDeniedException' === $e->getAwsErrorCode()
            ) {
                throw $e;
            }
        }
    }

    /**
     * @BeforeFeature @inspector
     *
     * Ensure that the testing credentials have access to the Inspector preview;
     * skip entire feature otherwise.
     *
     * @param BeforeFeatureScope $scope
     */
    public static function setUpInspector(BeforeFeatureScope $scope)
    {
        try {
            self::getSdk(self::$configOverrides)
                ->createInspector()
                ->listApplications();
        } catch (\Exception $e) {
            // If the test failed because the account has no access to EFS,
            // throw the exception to cause the feature to be skipped.
            if ($e instanceof AwsException
                && 'AccessDeniedException' === $e->getAwsErrorCode()
            ) {
                throw $e;
            }
        }
    }

    /**
     * @BeforeFeature @marketplacecommerceanalytics
     *
     * Ensure that the testing credentials have a Marketplace Commerce Analytics
     * subscription; skip entire feature otherwise.
     *
     * @param BeforeFeatureScope $scope
     */
    public static function setUpMarketplaceCommerceAnalytics(BeforeFeatureScope $scope)
    {
        try {
            self::getSdk(self::$configOverrides)
                ->createMarketplaceCommerceAnalytics()
                ->generateDataSet([
                    'dataSetType' => 'fake-type',
                    'dataSetPublicationDate' => 'fake-date',
                    'roleNameArn' => 'fake-arn',
                    'destinationS3BucketName' => 'fake-bucket',
                    'snsTopicArn' => 'fake-arn',
                ]);
        } catch (\Exception $e) {
            // If the test failed because the account has no support subscription,
            // throw the exception to cause the feature to be skipped.
            if ($e instanceof AwsException
                && 'SubscriptionRequiredException' === $e->getAwsErrorCode()
            ) {
                throw $e;
            }
        }
    }

    /**
     * @BeforeFeature @sqs
     *
     * @param BeforeFeatureScope $scope
     */
    public static function setUpSqs(BeforeFeatureScope $scope)
    {
        $sqs = self::getSdk(self::$configOverrides)
            ->createSqs();
        $queueName = self::getResourcePrefix() . 'testing-queue';

        $sqs->createQueue(['QueueName' => $queueName]);
        $sqs->waitUntil('QueueExists', ['QueueName' => $queueName]);
    }

    /**
     * @AfterFeature @sqs
     *
     * @param AfterFeatureScope $scope
     */
    public static function tearDownSqs(AfterFeatureScope $scope)
    {
        $sqs = self::getSdk(self::$configOverrides)
            ->createSqs();

        $sqs->deleteQueue([
            'QueueUrl' => $sqs->getQueueUrl([
                'QueueName' => self::getResourcePrefix() . 'testing-queue',
            ])['QueueUrl']
        ]);
    }

    /**
     * @BeforeFeature @support
     *
     * Ensure that the testing credentials have a support subscription;
     * skip entire feature otherwise.
     *
     * @param BeforeFeatureScope $scope
     */
    public static function setUpSupport(BeforeFeatureScope $scope)
    {
        try {
            self::getSdk(self::$configOverrides)
                ->createSupport()
                ->describeServices();
        } catch (\Exception $e) {
            // If the test failed because the account has no support subscription,
            // throw the exception to cause the feature to be skipped.
            if ($e instanceof AwsException
                && 'SubscriptionRequiredException' === $e->getAwsErrorCode()
            ) {
                throw $e;
            }
        }
    }

    /**
     * @BeforeScenario
     *
     * @param BeforeScenarioScope $scope
     */
    public function setUp(BeforeScenarioScope $scope)
    {
        foreach ($scope->getFeature()->getTags() as $tag) {
            try{
                $this->serviceName = Aws\manifest($tag)['namespace'];
                break;
            } catch (\Exception $e) {
                // just in case an additional tag managed to sneak into the smoke tests
            }
        }

        if (empty($this->serviceName)) {
            throw new PendingException(
                'No service found for smoke test tagged with: '
                    . implode(', ', $scope->getFeature()->getTags())
            );
        }

        $this->sdk = self::getSdk(self::$configOverrides);

        $this->client = $this->sdk->createClient($this->serviceName);
    }

    /**
     * @When I call the :commandName API
     *
     * @param string $commandName
     * @param array $payload
     */
    public function iCallTheApi($commandName, array $payload = [])
    {
        $this->response = $this->client->{$commandName}($payload);
    }

    /**
     * @When I call the :commandName API with:
     *
     * @param string $command
     * @param TableNode $payload
     */
    public function iCallTheApiWith($command, TableNode $payload)
    {
        $this->iCallTheApi($command, $payload->getRowsHash());
    }

    /**
     * @When I call the :command API with JSON:
     *
     * @param string $command
     * @param PyStringNode $payload
     */
    public function iCallTheApiWithJson($command, PyStringNode $payload)
    {
        $this->iCallTheApi($command, json_decode($payload->getRaw(), true));
    }

    /**
     * @When I attempt to call the :commandName API with:
     *
     * @param string $command
     * @param TableNode $payload
     */
    public function iAttemptToCallTheApiWith($command, TableNode $payload)
    {
        try {
            $this->iCallTheApiWith($command, $payload);
        } catch (AwsException $e) {
            $this->error= $e;
        }
    }

    /**
     * @When I attempt to call the :command API with JSON:
     *
     * @param string $command
     * @param PyStringNode $payload
     */
    public function iAttemptToCallTheApiWithJson($command, PyStringNode $payload)
    {
        try {
            $this->iCallTheApiWithJson($command, $payload);
        } catch (AwsException $e) {
            $this->error= $e;
        }
    }

    /**
     * @Then the value at :key should be a list
     *
     * @param string $key
     */
    public function theValueAtShouldBeAList($key)
    {
        $this->assertInstanceOf(Result::class, $this->response);
        $this->assertInternalType('array', $this->response->search($key));
    }

    /**
     * @Then I expect the response error code to be :errorCode
     *
     * @param string $errorCode
     */
    public function iExpectTheResponseErrorCodeToBe($errorCode)
    {
        $this->assertSame($errorCode, $this->error->getAwsErrorCode());
    }

    /**
     * @Then I expect the response error message to include:
     *
     * @param PyStringNode $string
     */
    public function iExpectTheResponseErrorMessageToInclude(PyStringNode $string)
    {
        $this->assertContains($string->getRaw(), $this->error->getMessage());
    }

    /**
     * @Then the response should contain a :key
     *
     * @param string $key
     */
    public function theResponseShouldContainA($key)
    {
        $this->assertInstanceOf(Result::class, $this->response);
        $this->assertNotNull($this->response->search($key));
    }

    /**
     * @Then the error code should be :errorCode
     *
     * @param string $errorCode
     * @param PyStringNode $string
     */
    public function theErrorCodeShouldBe($errorCode, PyStringNode $string = null)
    {
        $this->iExpectTheResponseErrorCodeToBe($errorCode);

        if (null !== $string) {
            $this->theErrorMessageShouldContain($string);
        }
    }

    /**
     * @Then the request should be successful
     */
    public function theRequestShouldBeSuccessful()
    {
        $this->assertEmpty($this->error);
    }

    /**
     * @Then the error message should contain:
     *
     * @param PyStringNode $string
     */
    public function theErrorMessageShouldContain(PyStringNode $string)
    {
        $this->assertContains($string->getRaw(), $this->error->getMessage());
    }
}
