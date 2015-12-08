<?php

namespace Aws\Test\Integ;

use Aws\CommandInterface;
use Aws\CommandPool;
use Aws\Exception\AwsException;
use Aws\Result;
use Aws\S3\S3Client;
use Behat\Behat\Hook\Scope\AfterFeatureScope;
use Behat\Behat\Hook\Scope\BeforeFeatureScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;
use JmesPath;

/**
 * Defines application features from the specific context.
 */
class ConcurrencyContext extends \PHPUnit_Framework_Assert implements
    Context,
    SnippetAcceptingContext
{
    use IntegUtils;

    /** @var S3Client */
    private $client;
    /** @var Result|Result[] */
    private $result;
    /** @var PromiseInterface */
    private $promise;
    /** @var CommandInterface[] */
    private $commands;
    /** @var string */
    private static $bucket;

    /**
     * @BeforeFeature @s3
     *
     * @param BeforeFeatureScope $scope
     */
    public static function setUpS3Bucket(BeforeFeatureScope $scope)
    {
        $client = self::getSdk()
            ->createS3();

        self::$bucket = self::getResourcePrefix()
            . str_replace(' ', '-', strtolower($scope->getName()));

        $client->createBucket(['Bucket' => self::$bucket]);
        $client->waitUntil('BucketExists', ['Bucket' => self::$bucket]);
    }

    /**
     * @AfterFeature @s3
     *
     * @param AfterFeatureScope $scope
     */
    public static function tearDownS3Bucket(AfterFeatureScope $scope)
    {
        $client = self::getSdk()->createS3();

        $client->deleteMatchingObjects(self::$bucket, '', '//');
        $client->deleteBucket(['Bucket' => self::$bucket]);

        self::$bucket = null;
    }

    /**
     * @Given I have a :service client
     */
    public function iHaveAClient($service)
    {
        $this->client = self::getSdk()->createClient($service);
    }

    /**
     * @When I call the :command API
     */
    public function iCallTheApi($command)
    {
        $this->result = $this->client->{$command}();
    }

    /**
     * @Then the value at :key should be a :type
     */
    public function theValueAtShouldBeA($key, $type)
    {
        $this->assertInstanceOf(Result::class, $this->result);
        $this->assertInternalType($type, $this->result->search($key));
    }

    /**
     * @When I call the :command API asynchronously
     */
    public function iCallTheApiAsynchronously($command)
    {
        $this->promise = call_user_func([$this->client, "{$command}Async"]);
    }

    /**
     * @When I wait on the promise
     */
    public function thenWaitOnThePromise()
    {
        $this->result = $this->promise->wait();
    }

    /**
     * @Given a promise composed of the following asynchronous operations:
     */
    public function aPromiseComposedOfTheFollowingAsynchronousOperations(TableNode $table)
    {
        $this->promise = Promise\all(array_map(function (array $row) {
            return call_user_func(
                [
                    self::getSdk()->createClient($row['service']),
                    "{$row['command']}Async",
                ],
                json_decode($row['payload'], true) ?: []
            );
        }, iterator_to_array($table)));
    }

    /**
     * @Given a pool composed of the following commands:
     */
    public function aPoolComposedOfTheFollowingCommands(TableNode $table)
    {
        $this->commands = array_map(function (array $row) {
            return self::getSdk()
                ->createClient($row['service'])
                ->getCommand(
                    $row['command'],
                    json_decode($row['payload'], true) ?: []
                );
        }, iterator_to_array($table));
    }

    /**
     * @When I send the commands as a batch to :service
     */
    public function iSendTheCommandsAsABatchTo($service)
    {
        $this->result = CommandPool::batch(
            self::getSdk()->createClient($service),
            $this->commands
        );
    }

    /**
     * @Then there should be :count results
     */
    public function thereShouldBeResults($count)
    {
        $this->assertCount((int) $count, $this->result);
    }

    /**
     * @Then there should be :count value at :path
     */
    public function thereShouldBeValueAt($count, $path)
    {
        $this->assertCount((int) $count, array_unique(
                JmesPath\search($path, $this->result)
        ));
    }
}
