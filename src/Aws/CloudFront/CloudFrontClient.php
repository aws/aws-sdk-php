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

namespace Aws\CloudFront;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\DefaultXmlExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Command\AbstractCommand;
use Guzzle\Service\Command\OperationCommand as Op;
use Guzzle\Service\Resource\MapResourceIteratorFactory;

/**
 * Client to interact with Amazon CloudFront
 *
 * @method Op createCloudFrontOriginAccessIdentity (array $args = array()) {@command cloudfront CreateCloudFrontOriginAccessIdentity}
 * @method Op createDistribution (array $args = array()) {@command cloudfront CreateDistribution}
 * @method Op createInvalidation (array $args = array()) {@command cloudfront CreateInvalidation}
 * @method Op createStreamingDistribution (array $args = array()) {@command cloudfront CreateStreamingDistribution}
 * @method Op deleteCloudFrontOriginAccessIdentity (array $args = array()) {@command cloudfront DeleteCloudFrontOriginAccessIdentity}
 * @method Op deleteDistribution (array $args = array()) {@command cloudfront DeleteDistribution}
 * @method Op deleteStreamingDistribution (array $args = array()) {@command cloudfront DeleteStreamingDistribution}
 * @method Op getCloudFrontOriginAccessIdentity (array $args = array()) {@command cloudfront GetCloudFrontOriginAccessIdentity}
 * @method Op getCloudFrontOriginAccessIdentityConfig (array $args = array()) {@command cloudfront GetCloudFrontOriginAccessIdentityConfig}
 * @method Op getDistribution (array $args = array()) {@command cloudfront GetDistribution}
 * @method Op getDistributionConfig (array $args = array()) {@command cloudfront GetDistributionConfig}
 * @method Op getInvalidation (array $args = array()) {@command cloudfront GetInvalidation}
 * @method Op getStreamingDistribution (array $args = array()) {@command cloudfront GetStreamingDistribution}
 * @method Op getStreamingDistributionConfig (array $args = array()) {@command cloudfront GetStreamingDistributionConfig}
 * @method Op listCloudFrontOriginAccessIdentities (array $args = array()) {@command cloudfront ListCloudFrontOriginAccessIdentities}
 * @method Op listDistributions (array $args = array()) {@command cloudfront ListDistributions}
 * @method Op listInvalidations (array $args = array()) {@command cloudfront ListInvalidations}
 * @method Op listStreamingDistributions (array $args = array()) {@command cloudfront ListStreamingDistributions}
 * @method Op updateCloudFrontOriginAccessIdentity (array $args = array()) {@command cloudfront UpdateCloudFrontOriginAccessIdentity}
 * @method Op updateDistribution (array $args = array()) {@command cloudfront UpdateDistribution}
 * @method Op updateStreamingDistribution (array $args = array()) {@command cloudfront UpdateStreamingDistribution}
 */
class CloudFrontClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    protected $directory = __DIR__;

    /**
     * Factory method to create a new Amazon CloudFront client using an array of configuration options.
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
     *           to use the default APC cache or provide a `Guzzle\Cache\CacheAdapterInterface` object.
     *     - credentials.cache.key: Optional custom cache key to use with the credentials
     *     - credentials.client: Pass this option to specify a custom `Guzzle\Http\ClientInterface` to use if your
     *           credentials require a HTTP request (e.g. RefreshableInstanceProfileCredentials)
     * - Region and Endpoint options (a `region` and optional `scheme` OR a `base_url` is required)
     *     - region: Region name (e.g. 'us-east-1', 'us-west-1', 'us-west-2', 'eu-west-1', etc...)
     *     - base_url: Instead of using a `region` and `scheme`, you can specify a custom base URL for the client
     *     - endpoint_provider: Optional `Aws\Common\Region\EndpointProviderInterface` used to provide region endpoints
     * - Generic client options
     *     - ssl.cert: Set to true to use the bundled CA cert or pass the full path to an SSL certificate bundle. This
     *          option should be used when you encounter curl error code 60.
     *     - curl.options: Array of cURL options to apply to every request.
     *          See http://www.php.net/manual/en/function.curl-setopt.php for a list of available options
     * - Exponential backoff options
     *     - client.backoff.logger: `Guzzle\Log\LogAdapterInterface` object used to log backoff retries. Use
     *           'debug' to emit PHP warnings when a retry is issued.
     *     - client.backoff.logger.template: Optional template to use for exponential backoff log messages. See
     *           `Guzzle\Plugin\Backoff\BackoffLogger` for formatting information.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     */
    public static function factory($config = array())
    {
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::SERVICE => 'cloudfront',
                Options::SCHEME  => 'https',
                // Disable model processing when commands are executed by default, and simply return arrays
                'params.' . AbstractCommand::RESPONSE_PROCESSING => AbstractCommand::TYPE_NATIVE
            ))
            ->setSignature(new CloudFrontSignature())
            ->setExceptionParser(new DefaultXmlExceptionParser())
            ->build();

        // Most (if not all) CloudFront iterators use the same logic
        $client->setResourceIteratorFactory(new MapResourceIteratorFactory(array(
            '*' => 'Aws\CloudFront\Iterator\DefaultIterator'
        )));

        return $client;
    }
}
