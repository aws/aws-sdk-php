<?php

namespace Aws\Test\Integ;

use Aws\AwsClient;
use Aws\DynamoDb\Exception\DynamoDbException;
use Behat\Behat\Hook\Scope\AfterFeatureScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Promise;

/**
 * Defines application features from the specific context.
 */
class BlockingContext extends \PHPUnit_Framework_Assert implements Context, SnippetAcceptingContext
{
    use IntegUtils;

    /** @var AwsClient */
    private $client;
    /** @var Promise\Promise[] */
    private $promises;

    /**
     * @Given I have a :service client
     */
    public function iHaveAClient($service)
    {
        $this->client = self::getSdk()->createClient($service);
    }

    /**
     * @When I create a table named :table
     */
    public function iCreateATableNamed($table)
    {
        $this->client->createTable([
            'TableName' => self::getResourcePrefix() . "-$table",
            'AttributeDefinitions' => [
                ['AttributeName' => 'id', 'AttributeType' => 'N']
            ],
            'KeySchema' => [
                ['AttributeName' => 'id', 'KeyType' => 'HASH']
            ],
            'ProvisionedThroughput' => [
                'ReadCapacityUnits'  => 20,
                'WriteCapacityUnits' => 20
            ]
        ]);
    }

    /**
     * @When wait for the table named :table to exist
     */
    public function waitForTheTableNamedToExist($table)
    {
        $this->client->waitUntil('TableExists', [
            'TableName' => self::getResourcePrefix() . "-$table",
        ]);
    }

    /**
     * @When the table named :table exists
     */
    public function theTableNamedWillExist($table)
    {
        self::getSdk(['http' => ['synchronous' => true]])
            ->createDynamoDb()
            ->describeTable(['TableName' => self::getResourcePrefix() . "-$table"]);
    }

    /**
     * @Then I can delete the table named :table
     */
    public function iCanDeleteTheTableNamed($table)
    {
        $this->client->deleteTable([
            'TableName' => self::getResourcePrefix() . "-$table",
        ]);
    }

    /**
     * @Then wait for the table named :table to be deleted
     */
    public function waitForTheTableNamedToBeDeleted($table)
    {
        $this->client->waitUntil('TableNotExists', [
            'TableName' => self::getResourcePrefix() . "-$table",
        ]);
    }

    /**
     * @Then the table named :table does not exist
     */
    public function theTableNamedWillNotExist($table)
    {
        try {
            $this->theTableNamedWillExist($table);
            $this->fail("$table exists but should not.");
        } catch (DynamoDbException $e) {
            $this->assertSame('ResourceNotFoundException', $e->getAwsErrorCode());
        }
    }

    /**
     * @When I create a promise to create and await a table named :table
     */
    public function iCreateAPromiseToCreateAndAwaitATableNamed($table)
    {
        $this->promises []= $this->client->createTableAsync([
            'TableName' => self::getResourcePrefix() . "-$table",
            'AttributeDefinitions' => [
                ['AttributeName' => 'id', 'AttributeType' => 'N']
            ],
            'KeySchema' => [
                ['AttributeName' => 'id', 'KeyType' => 'HASH']
            ],
            'ProvisionedThroughput' => [
                'ReadCapacityUnits'  => 20,
                'WriteCapacityUnits' => 20
            ]
        ])
            ->then(function () use ($table) {
                return $this->client
                    ->getWaiter('TableExists', [
                        'TableName' => self::getResourcePrefix() . "-$table",
                    ])->promise();
            });
    }

    /**
     * @Then I can wait on all promises
     */
    public function iCanWaitOnAllPromises()
    {
        Promise\all($this->promises)
            ->wait();
    }

    /**
     * @When I create a promise to delete and await the purging of the table named :table
     */
    public function iCreateAPromiseToDeleteAndAwaitThePurgingOfTheTableNamed($table)
    {
        $this->promises []= $this->client
            ->deleteTableAsync([
                'TableName' => self::getResourcePrefix() . "-$table",
            ])->then(function () use ($table) {
                return $this->client
                    ->getWaiter('TableNotExists', [
                        'TableName' => self::getResourcePrefix() . "-$table",
                    ])->promise();
            });
    }
}
