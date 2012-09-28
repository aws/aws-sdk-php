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

namespace Aws\Glacier;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Client\ExpectHeaderListener;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonRestExceptionParser;
use Aws\Common\Signature\SignatureV4;
use Guzzle\Common\Collection;
use Guzzle\Common\Event;
use Guzzle\Service\Command\OperationCommand as Op;
use Aws\Common\Iterator\MapResourceIteratorFactory;

/**
 * Client to interact with Amazon Glacier
 *
 * @method Op abortMultipartUpload (array $args = array()) {@command glacier AbortMultipartUpload}
 * @method Op completeMultipartUpload (array $args = array()) {@command glacier CompleteMultipartUpload}
 * @method Op createVault (array $args = array()) {@command glacier CreateVault}
 * @method Op deleteArchive (array $args = array()) {@command glacier DeleteArchive}
 * @method Op deleteVault (array $args = array()) {@command glacier DeleteVault}
 * @method Op deleteVaultNotifications (array $args = array()) {@command glacier DeleteVaultNotifications}
 * @method Op describeJob (array $args = array()) {@command glacier DescribeJob}
 * @method Op describeVault (array $args = array()) {@command glacier DescribeVault}
 * @method Op getJobOutput (array $args = array()) {@command glacier GetJobOutput}
 * @method Op getVaultNotifications (array $args = array()) {@command glacier GetVaultNotifications}
 * @method Op initiateJob (array $args = array()) {@command glacier InitiateJob}
 * @method Op initiateMultipartUpload (array $args = array()) {@command glacier InitiateMultipartUpload}
 * @method Op listJobs (array $args = array()) {@command glacier ListJobs}
 * @method Op listMultipartUploads (array $args = array()) {@command glacier ListMultipartUploads}
 * @method Op listParts (array $args = array()) {@command glacier ListParts}
 * @method Op listVaults (array $args = array()) {@command glacier ListVaults}
 * @method Op setVaultNotifications (array $args = array()) {@command glacier SetVaultNotifications}
 * @method Op uploadArchive (array $args = array()) {@command glacier UploadArchive}
 * @method Op uploadMultipartPart (array $args = array()) {@command glacier UploadMultipartPart}
 */
class GlacierClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    protected $directory = __DIR__;

    /**
     * Factory method to create a new Amazon DynamoDB client using an array of configuration options.
     *
     * The following array keys and values are available options:
     *
     * - Credential options (`key`, `secret`, and optional `token` OR `credentials` is required)
     *     - key: AWS Access Key ID
     *     - secret: AWS secret access key
     *     - credentials: You can optionally provide a custom `Aws\Common\Credentials\CredentialsInterface` object
     *     - token: Custom AWS security token to use with request authentication
     *     - token.ttd: UNIX timestamp for when the custom credentials expire
     *     - credentials.cache: Used to cache credentials when using providers that require HTTP requests. Set the true
     *           to use the default APC cache or provide a `Guzzle\Common\Cache\CacheAdapterInterface` object.
     *     - credentials.cache.key: Optional custom cache key to use with the credentials
     *     - credentials.client: Pass this option to specify a custom `Guzzle\Http\ClientInterface` to use if your
     *           credentials require a HTTP request (e.g. RefreshableInstanceProfileCredentials)
     * - Region and Endpoint options (a `region` and optional `scheme` OR a `base_url` is required)
     *     - region: Region name (e.g. 'us-east-1', 'us-west-1', 'us-west-2', 'eu-west-1', etc...)
     *     - scheme: URI Scheme of the base URL (e.g. 'https', 'http').
     *     - base_url: Instead of using a `region` and `scheme`, you can specify a custom base URL for the client
     *     - endpoint_provider: Optional `Aws\Common\Region\EndpointProviderInterface` used to provide region endpoints
     * - Generic client options
     *     - ssl.cert: Set to true to use the bundled CA cert or pass the full path to an SSL certificate bundle. This
     *           option should be used when you encounter curl error code 60.
     *     - curl.CURLOPT_VERBOSE: Set to true to output curl debug information during transfers
     *     - curl.*: Prefix any available cURL option with `curl.` to add cURL options to each request.
     *           See: http://www.php.net/manual/en/function.curl-setopt.php
     *     - service.description.cache: Optional `Guzzle\Common\Cache\CacheAdapterInterface` object to use to cache
     *           service descriptions
     *     - service.description.cache.ttl: Optional TTL used for the service description cache
     * - Signature options
     *     - signature: You can optionally provide a custom signature implementation used to sign requests
     *     - signature.service: Set to explicitly override the service name used in signatures
     *     - signature.region:  Set to explicitly override the region name used in signatures
     * - Exponential backoff options
     *     - client.backoff.logger: `Guzzle\Common\Log\LogAdapterInterface` object used to log backoff retries. Use
     *           'debug' to emit PHP warnings when a retry is issued.
     *     - client.backoff.logger.template: Optional template to use for exponential backoff log messages. See
     *           `Guzzle\Http\Plugin\ExponentialBackoffLogger` for formatting information.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     */
    public static function factory($config = array())
    {
        // Setup Glacier client
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                // General service configuration
                Options::SERVICE => 'glacier',
                Options::SCHEME  => 'https',

                // Overwrite the default blacklist to allow Expect headers
                'curl.blacklist' => array(CURLOPT_ENCODING, 'header.Accept'),

                // Disable model processing when commands are executed by default, and simply return arrays
                'params.' . Op::RESPONSE_PROCESSING => Op::TYPE_NATIVE,

                // Set default value for "accountId" for all requests
                'command.params' => array(
                    'accountId' => '-'
                )
            ))
            ->setSignature(new SignatureV4())
            ->setExceptionParser(new JsonRestExceptionParser())
            ->build();

        // Add the Glacier version header required for all operations
        $client->setDefaultHeaders(array(
            'x-amz-glacier-version' => $client->getDescription()->getApiVersion()
        ));

        // Set Expect header for upload operations
        $client->addSubscriber(new ExpectHeaderListener());

        // Set x-amz-content-sha256 header for upload operations
        $client->addSubscriber(new UploadContextListener());

        // Use the same iterator class for every iterator
        $client->setResourceIteratorFactory(new MapResourceIteratorFactory(array(
             '*' => 'Aws\Glacier\Iterator\DefaultIterator'
        )));

        return $client;
    }
}
