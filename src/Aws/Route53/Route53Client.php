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

namespace Aws\Route53;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Enum\DateFormat;
use Aws\Common\Enum\Region;
use Aws\Common\Exception\ServiceResponseException;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon Route 53
 *
 * @method Model changeResourceRecordSets(array $args = array()) {@command route53 ChangeResourceRecordSets}
 * @method Model createHostedZone(array $args = array()) {@command route53 CreateHostedZone}
 * @method Model deleteHostedZone(array $args = array()) {@command route53 DeleteHostedZone}
 * @method Model getChange(array $args = array()) {@command route53 GetChange}
 * @method Model getHostedZone(array $args = array()) {@command route53 GetHostedZone}
 * @method Model listHostedZones(array $args = array()) {@command route53 ListHostedZones}
 * @method Model listResourceRecordSets(array $args = array()) {@command route53 ListResourceRecordSets}
 */
class Route53Client extends AbstractClient
{
    /**
     * Factory method to create a new Amazon Glacier client using an array of configuration options:
     *
     * Credential options (`key`, `secret`, and optional `token` OR `credentials` is required)
     *
     * - key: AWS Access Key ID
     * - secret: AWS secret access key
     * - credentials: You can optionally provide a custom `Aws\Common\Credentials\CredentialsInterface` object
     * - token: Custom AWS security token to use with request authentication
     * - token.ttd: UNIX timestamp for when the custom credentials expire
     * - credentials.cache: Used to cache credentials when using providers that require HTTP requests. Set the true
     *   to use the default APC cache or provide a `Guzzle\Common\Cache\CacheAdapterInterface` object.
     * - credentials.cache.key: Optional custom cache key to use with the credentials
     * - credentials.client: Pass this option to specify a custom `Guzzle\Http\ClientInterface` to use if your
     *   credentials require a HTTP request (e.g. RefreshableInstanceProfileCredentials)
     *
     * Region and Endpoint options
     *
     * - base_url: You can specify a custom base URL for the client
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
     * - client.backoff.logger: `Guzzle\Common\Log\LogAdapterInterface` object used to log backoff retries. Use
     *   'debug' to emit PHP warnings when a retry is issued.
     * - client.backoff.logger.template: Optional template to use for exponential backoff log messages. See
     *   `Guzzle\Http\Plugin\ExponentialBackoffLogger` for formatting information.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     */
    public static function factory($config = array())
    {
        // Setup Route53 client
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/route53-2012-02-29.php'
            ))
            ->setIteratorsConfig(array(
                'limit_param' => 'MaxItems',
                'more_key'    => 'IsTruncated',
                'operations'  => array(
                    'ListHostedZones' => array(
                        'token_param' => 'Marker',
                        'token_key'   => 'NextMarker',
                        'result_key'  => 'HostedZones',
                    ),
                    'ListResourceRecordSets' => array(
                        'token_param' => array('StartRecordName', 'StartRecordType', 'StartRecordIdentifier'),
                        'token_key'   => array('NextRecordName', 'NextRecordType', 'NextRecordIdentifier'),
                        'result_key'  => 'ResourceRecordSets'
                    )
                )
            ))
            ->build();

        return $client;
    }

    /**
     * Retrieves the server time from Route53. Can be useful for detecting and/or preventing clock skew.
     *
     * @return \DateTime The server time from Route53
     * @link http://docs.amazonwebservices.com/Route53/latest/DeveloperGuide/RESTAuthentication.html#FetchingDate
     */
    public function getServerTime()
    {
        try {
            $response = $this->get('https://route53.amazonaws.com/date')->send();
        } catch (ServiceResponseException $e) {
            $response = $e->getResponse();
        }

        $serverTime = trim($response->getHeader('Date', true));
        $serverTime = \DateTime::createFromFormat(DateFormat::RFC1123, $serverTime);

        return $serverTime;
    }

    /**
     * Filter function used to remove ID prefixes. This is used automatically by the client so that Hosted Zone and
     * Change Record IDs can be specified with or without the prefix.
     *
     * @param string $id The ID value to clean
     *
     * @return string
     */
    public static function cleanId($id)
    {
        return str_replace(array('/hostedzone/', '/change/'), '', $id);
    }
}
