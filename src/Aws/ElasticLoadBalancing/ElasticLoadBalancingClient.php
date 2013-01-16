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

namespace Aws\ElasticLoadBalancing;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Elastic Load Balancing
 *
 * @method Model applySecurityGroupsToLoadBalancer(array $args = array()) {@command elasticloadbalancing ApplySecurityGroupsToLoadBalancer}
 * @method Model attachLoadBalancerToSubnets(array $args = array()) {@command elasticloadbalancing AttachLoadBalancerToSubnets}
 * @method Model configureHealthCheck(array $args = array()) {@command elasticloadbalancing ConfigureHealthCheck}
 * @method Model createAppCookieStickinessPolicy(array $args = array()) {@command elasticloadbalancing CreateAppCookieStickinessPolicy}
 * @method Model createLBCookieStickinessPolicy(array $args = array()) {@command elasticloadbalancing CreateLBCookieStickinessPolicy}
 * @method Model createLoadBalancer(array $args = array()) {@command elasticloadbalancing CreateLoadBalancer}
 * @method Model createLoadBalancerListeners(array $args = array()) {@command elasticloadbalancing CreateLoadBalancerListeners}
 * @method Model createLoadBalancerPolicy(array $args = array()) {@command elasticloadbalancing CreateLoadBalancerPolicy}
 * @method Model deleteLoadBalancer(array $args = array()) {@command elasticloadbalancing DeleteLoadBalancer}
 * @method Model deleteLoadBalancerListeners(array $args = array()) {@command elasticloadbalancing DeleteLoadBalancerListeners}
 * @method Model deleteLoadBalancerPolicy(array $args = array()) {@command elasticloadbalancing DeleteLoadBalancerPolicy}
 * @method Model deregisterInstancesFromLoadBalancer(array $args = array()) {@command elasticloadbalancing DeregisterInstancesFromLoadBalancer}
 * @method Model describeInstanceHealth(array $args = array()) {@command elasticloadbalancing DescribeInstanceHealth}
 * @method Model describeLoadBalancerPolicies(array $args = array()) {@command elasticloadbalancing DescribeLoadBalancerPolicies}
 * @method Model describeLoadBalancerPolicyTypes(array $args = array()) {@command elasticloadbalancing DescribeLoadBalancerPolicyTypes}
 * @method Model describeLoadBalancers(array $args = array()) {@command elasticloadbalancing DescribeLoadBalancers}
 * @method Model detachLoadBalancerFromSubnets(array $args = array()) {@command elasticloadbalancing DetachLoadBalancerFromSubnets}
 * @method Model disableAvailabilityZonesForLoadBalancer(array $args = array()) {@command elasticloadbalancing DisableAvailabilityZonesForLoadBalancer}
 * @method Model enableAvailabilityZonesForLoadBalancer(array $args = array()) {@command elasticloadbalancing EnableAvailabilityZonesForLoadBalancer}
 * @method Model registerInstancesWithLoadBalancer(array $args = array()) {@command elasticloadbalancing RegisterInstancesWithLoadBalancer}
 * @method Model setLoadBalancerListenerSSLCertificate(array $args = array()) {@command elasticloadbalancing SetLoadBalancerListenerSSLCertificate}
 * @method Model setLoadBalancerPoliciesForBackendServer(array $args = array()) {@command elasticloadbalancing SetLoadBalancerPoliciesForBackendServer}
 * @method Model setLoadBalancerPoliciesOfListener(array $args = array()) {@command elasticloadbalancing SetLoadBalancerPoliciesOfListener}
 */
class ElasticLoadBalancingClient extends AbstractClient
{
    /**
     * Factory method to create a new Elastic Load Balancing client using an array of configuration options:
     *
     * Credential options (`key`, `secret`, and optional `token` OR `credentials` is required)
     *
     * - key: AWS Access Key ID
     * - secret: AWS secret access key
     * - credentials: You can optionally provide a custom `Aws\Common\Credentials\CredentialsInterface` object
     * - token: Custom AWS security token to use with request authentication
     * - token.ttd: UNIX timestamp for when the custom credentials expire
     * - credentials.cache.key: Optional custom cache key to use with the credentials
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
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/elasticloadbalancing-2012-06-01.php'))
            ->build();
    }
}
