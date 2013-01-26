<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\DynamoDb;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Client\BackoffOptionResolver;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Aws\DynamoDb\Model\Attribute;
use Aws\DynamoDb\Session\SessionHandler;
use Guzzle\Common\Collection;
use Guzzle\Plugin\Backoff\BackoffPlugin;
use Guzzle\Plugin\Backoff\HttpBackoffStrategy;
use Guzzle\Plugin\Backoff\CurlBackoffStrategy;
use Guzzle\Plugin\Backoff\TruncatedBackoffStrategy;
use Guzzle\Plugin\Backoff\CallbackBackoffStrategy;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Command\AbstractCommand as Cmd;

/**
 * Client to interact with Amazon DynamoDB
 *
 * @method Model batchGetItem(array $args = array()) {@command dynamodb BatchGetItem}
 * @method Model batchWriteItem(array $args = array()) {@command dynamodb BatchWriteItem}
 * @method Model createTable(array $args = array()) {@command dynamodb CreateTable}
 * @method Model deleteItem(array $args = array()) {@command dynamodb DeleteItem}
 * @method Model deleteTable(array $args = array()) {@command dynamodb DeleteTable}
 * @method Model describeTable(array $args = array()) {@command dynamodb DescribeTable}
 * @method Model getItem(array $args = array()) {@command dynamodb GetItem}
 * @method Model listTables(array $args = array()) {@command dynamodb ListTables}
 * @method Model putItem(array $args = array()) {@command dynamodb PutItem}
 * @method Model query(array $args = array()) {@command dynamodb Query}
 * @method Model scan(array $args = array()) {@command dynamodb Scan}
 * @method Model updateItem(array $args = array()) {@command dynamodb UpdateItem}
 * @method Model updateTable(array $args = array()) {@command dynamodb UpdateTable}
 * @method waitUntilTableExists(array $input) Wait until a table exists and can be accessed The input array uses the parameters of the DescribeTable operation and waiter specific settings
 * @method waitUntilTableNotExists(array $input) Wait until a table is deleted The input array uses the parameters of the DescribeTable operation and waiter specific settings
 */
class DynamoDbClient extends AbstractClient
{
    /**
     * Factory method to create a new Amazon DynamoDB client using an array of configuration options:
     *
     * Credential options (`key`, `secret`, and optional `token` OR `credentials` is required)
     *
     * - key: AWS Access Key ID
     * - secret: AWS secret access key
     * - credentials: You can optionally provide a custom `Aws\Common\Credentials\CredentialsInterface` object
     * - token: Custom AWS security token to use with request authentication
     * - token.ttd: UNIX timestamp for when the custom credentials expire
     * - credentials.cache: Used to cache credentials when using providers that require HTTP requests. Set the true
     *   to use the default APC cache or provide a `Guzzle\Cache\CacheAdapterInterface` object.
     * - credentials.cache.key: Optional custom cache key to use with the credentials
     * - credentials.client: Pass this option to specify a custom `Guzzle\Http\ClientInterface` to use if your
     *   credentials require a HTTP request (e.g. RefreshableInstanceProfileCredentials)
     *
     * Region and Endpoint options (a `region` and optional `scheme` OR a `base_url` is required)
     *
     * - region: Region name (e.g. 'us-east-1', 'us-west-1', 'us-west-2', 'eu-west-1', etc...)
     * - scheme: URI Scheme of the base URL (e.g. 'https', 'http').
     * - base_url: Instead of using a `region` and `scheme`, you can specify a custom base URL for the client
     * - endpoint_provider: Optional `Aws\Common\Region\EndpointProviderInterface` used to provide region endpoints
     *
     * Generic client options
     *
     * - ssl.certificate_authority: Set to true to use the bundled CA cert (default), system to use the certificate
     *   bundled with your system, or pass the full path to an SSL certificate bundle. This option should be used when
     *   you encounter curl error code 60.
     * - curl.options: Array of cURL options to apply to every request.
     *   See http://www.php.net/manual/en/function.curl-setopt.php for a list of available options
     * - signature: You can optionally provide a custom signature implementation used to sign requests
     * - signature.service: Set to explicitly override the service name used in signatures
     * - signature.region:  Set to explicitly override the region name used in signatures
     * - client.backoff.logger: `Guzzle\Log\LogAdapterInterface` object used to log backoff retries. Use
     *   'debug' to emit PHP warnings when a retry is issued.
     * - client.backoff.logger.template: Optional template to use for exponential backoff log messages. See
     *   `Guzzle\Plugin\Backoff\BackoffLogger` for formatting information.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     */
    public static function factory($config = array())
    {
        // Configure the custom exponential backoff plugin for DynamoDB throttling
        $exponentialBackoffResolver = new BackoffOptionResolver(function ($config, $client) {
            return new BackoffPlugin(
                // Validate CRC32 headers
                new Crc32ErrorChecker(
                    // Use the custom error checking strategy
                    new ThrottlingErrorChecker(
                        // Retry HTTP 500 and 503 responses
                        new HttpBackoffStrategy(null,
                            // Truncate the number of backoffs to 11
                            new TruncatedBackoffStrategy(11,
                                // Retry transient curl errors
                                new CurlBackoffStrategy(null,
                                    // Use the custom retry delay method instead of default exponential backoff
                                    new CallbackBackoffStrategy(array($client, 'calculateRetryDelay'), false)
                                )
                            )
                        )
                    )
                )
            );
        });

        // Construct the DynamoDB client with the client builder
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/dynamodb-2011-12-05.php',
                // DynamoDB does not require response processing other than turning JSON into an array
                self::COMMAND_PARAMS => array(Cmd::RESPONSE_PROCESSING => Cmd::TYPE_NO_TRANSLATION)
            ))
            ->addClientResolver($exponentialBackoffResolver)
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->setIteratorsConfig(array(
                'result_key'  => 'Items',
                'token_param' => 'ExclusiveStartKey',
                'token_key'   => 'LastEvaluatedKey',
                'operations'  => array(
                    'BatchGetItem' => array(
                        'token_param' => 'RequestItems',
                        'token_key'   => 'UnprocessedKeys',
                    ),
                    'ListTables' => array(
                        'result_key'  => 'TableNames',
                        'token_param' => 'ExclusiveStartTableName',
                        'token_key'   => 'LastEvaluatedTableName',
                    ),
                    'Query',
                    'Scan',
                )
            ))
            ->build();
    }

    /**
     * Formats a value as a DynamoDB attribute.
     *
     * @param mixed  $value  The value to format for DynamoDB.
     * @param string $format The type of format (e.g. put, update).
     *
     * @return array The formatted value.
     */
    public function formatValue($value, $format = Attribute::FORMAT_PUT)
    {
        return Attribute::factory($value)->getFormatted($format);
    }

    /**
     * Formats an array of values as DynamoDB attributes.
     *
     * @param array  $values The values to format for DynamoDB.
     * @param string $format The type of format (e.g. put, update).
     *
     * @return array The formatted values.
     */
    public function formatAttributes(array $values, $format = Attribute::FORMAT_PUT)
    {
        $formatted = array();

        foreach ($values as $key => $value) {
            $formatted[$key] = $this->formatValue($value, $format);
        }

        return $formatted;
    }

    /**
     * Calculate the amount of time needed for an exponential backoff to wait
     * before retrying a request
     *
     * @param int $retries Number of retries
     *
     * @return float Returns the amount of time to wait in seconds
     */
    public function calculateRetryDelay($retries)
    {
        return $retries == 0 ? 0 : (50 * (int) pow(2, $retries - 1)) / 1000;
    }

    /**
     * Convenience method for instantiating and registering the DynamoDB
     * Session handler with this DynamoDB client object.
     *
     * @param array $config Array of options for the session handler factory
     *
     * @return SessionHandler
     */
    public function registerSessionHandler(array $config = array())
    {
        $config = array_replace(array('dynamodb_client' => $this), $config);

        $handler = SessionHandler::factory($config);
        $handler->register();

        return $handler;
    }
}
