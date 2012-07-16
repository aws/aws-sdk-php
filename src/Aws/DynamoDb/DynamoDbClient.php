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
use Guzzle\Service\Description\ServiceDescription;

/**
 * Client for interacting with Amazon DynamoDB
 *
 * @method array batchGetItem(array $args = array()) {@command dynamo_db BatchGetItem}
 * @method array batchWriteItem(array $args = array()) {@command dynamo_db BatchWriteItem}
 * @method array createTable(array $args = array()) {@command dynamo_db CreateTable}
 * @method array deleteItem(array $args = array()) {@command dynamo_db DeleteItem}
 * @method array deleteTable(array $args = array()) {@command dynamo_db DeleteTable}
 * @method array describeTable(array $args = array()) {@command dynamo_db DescribeTable}
 * @method array getItem(array $args = array()) {@command dynamo_db GetItem}
 * @method array listTables(array $args = array()) {@command dynamo_db ListTables}
 * @method array putItem(array $args = array()) {@command dynamo_db PutItem}
 * @method array query(array $args = array()) {@command dynamo_db Query}
 * @method array scan(array $args = array()) {@command dynamo_db Scan}
 * @method array updateItem(array $arg = array()) {@command dynamo_db UpdateItem}
 * @method array updateTable(array $args = array()) {@command dynamo_db UpdateTable}
 */
class DynamoDbClient extends AbstractClient
{
    /**
     * @var string Default base URL
     */
    const DEFAULT_BASE_URL = '{scheme}://dynamodb.{region}.amazonaws.com';

    /**
     * Factory method to create a new DynamoDbClient using an array of
     * configuration data.
     *
     * The configuration array accepts the following array keys and values:
     * - access_key_id:     AWS Access Key ID
     * - secret_access_key: AWS secret access key
     * - credentials:       Service credential object (optional)
     * - region:            Region name. Defaults to 'us-east-1'.
     * - scheme:            Scheme of the base URL. Default is 'https'. Use 'http' for an insecure connection.
     * - base_url:          Set to override the default base URL
     * - service.name:      Set to explicitly override the service name used in signatures.
     * - service.region:    Set to explicitly override the region name used in signatures.
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
                'base_url' => self::DEFAULT_BASE_URL
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
