<?php

namespace Aws\Test\Integ;

use Aws\Exception\AwsException;
use Aws\JsonCompiler;
use Aws\Result;
use Aws\Sdk;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
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

    protected static $services = [
        'cloudwatch' => [
            'manifestName' => 'monitoring',
        ],
        'cloudwatchlogs' => [
            'manifestName' => 'logs',
        ],
        'cognitoidentity' => [
            'manifestName' => 'cognito-identity',
        ],
        'cognitosync' => [
            'manifestName' => 'cognito-sync',
        ],
        'configservice' => [
            'manifestName' => 'config',
        ],
        'directoryservice' => [
            'manifestName' => 'ds',
        ],
        'efs' => [
            'manifestName' => 'elasticfilesystem',
            'configOverrides' => [
                'region' => 'us-west-2',
            ],
        ],
        'elb' => [
            'manifestName' => 'elasticloadbalancing',
        ],
        'emr' => [
            'manifestName' => 'elasticmapreduce',
        ],
        'ses' => [
            'manifestName' => 'email',
        ],
    ];

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

    /**
     * @BeforeSuite
     */
    public static function prepare()
    {
        error_reporting(-1);
        date_default_timezone_set('UTC');

        // Clear out any previously compiled json files
        $compiler = new JsonCompiler();
        $compiler->purge();

        // Clear out any previously compiled JMESPath files.
        Env::cleanCompileDir();
    }

    /**
     * @BeforeScenario
     *
     * @param BeforeScenarioScope $scope
     */
    public function setUp(BeforeScenarioScope $scope)
    {
        $configuration = [];

        foreach ($scope->getFeature()->getTags() as $tag) {
            $manifestName = isset(self::$services[$tag]['manifestName']) ?
                self::$services[$tag]['manifestName']
                : $tag;

            if (isset($this->getServicesManifest()[$manifestName])) {
                $this->serviceName
                    = $this->getServicesManifest()[$manifestName]['namespace'];

                if (isset(self::$services[$tag]['configOverrides'])) {
                    $configuration[$this->serviceName]
                        = self::$services[$tag]['configOverrides'];
                }
            }
        }

        if (empty($this->serviceName)) {
            throw new PendingException(
                'No service found for smoke test tagged with: '
                    . implode(', ', $scope->getFeature()->getTags())
            );
        }

        $this->sdk = self::getSdk($configuration);

        $this->client = $this->sdk->createClient($this->serviceName);
    }

    /**
     * @When I call the :commandName API
     *
     * @param string $commandName
     */
    public function iCallTheApi($commandName)
    {
        $this->response = $this->client->{$commandName}();
    }

    /**
     * @When I call the :commandName API with:
     *
     * @param string $commandName
     * @param TableNode $table
     */
    public function iCallTheApiWith($commandName, TableNode $table)
    {
        $this->response = $this->callCommandWithPayload($commandName, $table);
    }

    /**
     * @Then the value at :key should be a list
     */
    public function theValueAtShouldBeAList($key)
    {
        $this->assertInstanceOf(Result::class, $this->response);
        $this->assertInternalType('array', $this->response->search($key));
    }

    /**
     * @When I attempt to call the :commandName API with:
     *
     * @param string $commandName
     * @param TableNode $table
     */
    public function iAttemptToCallTheApiWith($commandName, TableNode $table)
    {
        try {
            $this->response = $this->callCommandWithPayload($commandName, $table);
        } catch (AwsException $e) {
            $this->error= $e;
        }
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
        throw new PendingException();
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


    protected function callCommandWithPayload($command, TableNode $payload)
    {
        $payload = array_map(function ($value) {
            if (empty($value)) {
                return $value;
            }

            $jsonValue = json_decode($value, true);

            return JSON_ERROR_NONE === json_last_error() ? $jsonValue : $value;
        }, $payload->getRowsHash());

        return $this->client->{$command}($payload);
    }

    protected function getServicesManifest()
    {
        static $manifest = [];

        if (empty($manifest)) {
            $sdkRoot = dirname((new \ReflectionClass(Sdk::class))->getFileName());

            $manifest = json_decode(
                file_get_contents(implode(DIRECTORY_SEPARATOR, [
                    $sdkRoot,
                    'data',
                    'manifest.json',
                ])),
                true
            );
        }

        return $manifest;
    }
}
