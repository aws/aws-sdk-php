<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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
use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Signature\SignatureInterface;
use Aws\Common\Signature\SignatureV4;
use Aws\Common\Client\ExponentialBackoffOptionResolver;
use Aws\Common\Exception\Parser\DefaultJsonExceptionParser;
use Aws\DynamoDb\Model\Attribute;
use Guzzle\Http\Plugin\ExponentialBackoffPlugin;
use Guzzle\Common\Collection;
use Guzzle\Service\Inspector;
use Guzzle\Service\Description\ServiceDescription;

/**
 * Client for interacting with Amazon DynamoDB
 *
 * @method array batchGetItem(array $args = array()) {@command dynamo_db batch_get_item}
 * @method array batchWriteItem(array $args = array()) {@command dynamo_db batch_write_item}
 * @method array createTable(array $args = array()) {@command dynamo_db create_table}
 * @method array deleteItem(array $args = array()) {@command dynamo_db delete_item}
 * @method array deleteTable(array $args = array()) {@command dynamo_db delete_table}
 * @method array describeTable(array $args = array()) {@command dynamo_db describe_table}
 * @method array getItem(array $args = array()) {@command dynamo_db get_item}
 * @method array listTables(array $args = array()) {@command dynamo_db list_tables}
 * @method array putItem(array $args = array()) {@command dynamo_db put_item}
 * @method array query(array $args = array()) {@command dynamo_db query}
 * @method array scan(array $args = array()) {@command dynamo_db scan}
 * @method array updateItem(array $arg = array()) {@command dynamo_db update_item}
 * @method array updateTable(array $args = array()) {@command dynamo_db update_table}
 */
class DynamoDbClient extends AbstractClient
{
    /**
     * Factory method to create a new DynamoDbClient using an array of
     * configuration data.
     *
     * The configuration array accepts the following array keys and values:
     * - base_url:           Set to override the default base URL
     * - region:             Region endpoint. Defaults to 'us-east-1'
     * - scheme:             One of 'http' or 'https'. Defaults to 'https'
     * - access_key_id:      AWS Access Key ID
     * - secret_access_key:  AWS secret access key
     * - credentials:        Service credential object (optional)
     * - service.name:       Set to explicitly override the service name
     * - service.region:     Set to explicitly override the region name
     * - disable_inflection: Set to true to disable automatic parameter inflection
     *
     * @param array|Collection $config Configuration data. You must either
     *     supply a {@see Guzzle\Common\Credentials\CredentialsInterface}
     *     object in the 'credentials' key or supply both your AWS access key
     *     ID and AWS secret access key in the 'access_key_id' and
     *     'secret_access_key' options.
     *
     * @return DynamoDbClient
     */
    public static function factory($config = array())
    {
        // Configure the exponential backoff plugin for DynamoDB throttling
        $exponentialBackoffResolver = new ExponentialBackoffOptionResolver(function ($config, $client) {
            return new ExponentialBackoffPlugin(15, new ThrottlingErrorChecker(), array($client, 'calculateRetryDelay'));
        });

        // Construct the DynamoDB client with the client builder
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                'scheme'   => 'https',
                'region'   => 'us-east-1',
                'base_url' => '{scheme}://dynamodb.{region}.amazonaws.com'
            ))
            ->setSignature(new SignatureV4())
            ->addClientResolver($exponentialBackoffResolver)
            ->setExceptionParser(new DefaultJsonExceptionParser())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function __construct(CredentialsInterface $credentials, SignatureInterface $signature, Collection $config)
    {
        parent::__construct($credentials, $signature, $config);

        // Filters used for the cache plugin
        $config->set('params.cache.key_filter', 'header=date,x-amz-date,x-amz-security-token,x-amzn-authorization');

        // Add the service description to the client
        $this->setDescription(ServiceDescription::factory(__DIR__ . '/Resources/client.json'));
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
        return $retries == 1 ? 0 : (50 * (int) pow(2, $retries - 2)) / 1000;
    }
}
