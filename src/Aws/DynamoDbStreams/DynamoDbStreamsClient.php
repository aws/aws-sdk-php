<?php

namespace Aws\DynamoDbStreams;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Aws\DynamoDb\DynamoDbClient;
use Guzzle\Common\Collection;
use Guzzle\Plugin\Backoff\BackoffPlugin;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon DynamoDB Streams
 *
 * @method Model describeStream(array $args = array()) {@command DynamoDbstreams DescribeStream}
 * @method Model getRecords(array $args = array()) {@command DynamoDbstreams GetRecords}
 * @method Model getShardIterator(array $args = array()) {@command DynamoDbstreams GetShardIterator}
 * @method Model listStreams(array $args = array()) {@command DynamoDbstreams ListStreams}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-dynamodbstreams.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.DynamoDbstreams.DynamoDbstreamsClient.html API docs
 */
class DynamoDbStreamsClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-08-10';

    /**
     * Factory method to create a new Amazon DynamoDB Streams client using an array of configuration options.
     *
     * See http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        // Configure the custom exponential backoff plugin for DynamoDB throttling
        $exceptionParser = new JsonQueryExceptionParser();
        if (!isset($config[Options::BACKOFF])) {
            $config[Options::BACKOFF] = new BackoffPlugin(
                DynamoDbClient::createDynamoDbBackoffStrategy($exceptionParser)
            );
        }

        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/dynamodbstreams-%s.php'
            ))
            ->setExceptionParser($exceptionParser)
            ->build();
    }
}
