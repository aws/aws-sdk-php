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

namespace Aws\CloudFront;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Enum\Region;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Exception\Parser\DefaultXmlExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Http\Url;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon CloudFront
 *
 * @method Model createCloudFrontOriginAccessIdentity(array $args = array()) {@command cloudfront CreateCloudFrontOriginAccessIdentity}
 * @method Model createDistribution(array $args = array()) {@command cloudfront CreateDistribution}
 * @method Model createInvalidation(array $args = array()) {@command cloudfront CreateInvalidation}
 * @method Model createStreamingDistribution(array $args = array()) {@command cloudfront CreateStreamingDistribution}
 * @method Model deleteCloudFrontOriginAccessIdentity(array $args = array()) {@command cloudfront DeleteCloudFrontOriginAccessIdentity}
 * @method Model deleteDistribution(array $args = array()) {@command cloudfront DeleteDistribution}
 * @method Model deleteStreamingDistribution(array $args = array()) {@command cloudfront DeleteStreamingDistribution}
 * @method Model getCloudFrontOriginAccessIdentity(array $args = array()) {@command cloudfront GetCloudFrontOriginAccessIdentity}
 * @method Model getCloudFrontOriginAccessIdentityConfig(array $args = array()) {@command cloudfront GetCloudFrontOriginAccessIdentityConfig}
 * @method Model getDistribution(array $args = array()) {@command cloudfront GetDistribution}
 * @method Model getDistributionConfig(array $args = array()) {@command cloudfront GetDistributionConfig}
 * @method Model getInvalidation(array $args = array()) {@command cloudfront GetInvalidation}
 * @method Model getStreamingDistribution(array $args = array()) {@command cloudfront GetStreamingDistribution}
 * @method Model getStreamingDistributionConfig(array $args = array()) {@command cloudfront GetStreamingDistributionConfig}
 * @method Model listCloudFrontOriginAccessIdentities(array $args = array()) {@command cloudfront ListCloudFrontOriginAccessIdentities}
 * @method Model listDistributions(array $args = array()) {@command cloudfront ListDistributions}
 * @method Model listInvalidations(array $args = array()) {@command cloudfront ListInvalidations}
 * @method Model listStreamingDistributions(array $args = array()) {@command cloudfront ListStreamingDistributions}
 * @method Model updateCloudFrontOriginAccessIdentity(array $args = array()) {@command cloudfront UpdateCloudFrontOriginAccessIdentity}
 * @method Model updateDistribution(array $args = array()) {@command cloudfront UpdateDistribution}
 * @method Model updateStreamingDistribution(array $args = array()) {@command cloudfront UpdateStreamingDistribution}
 * @method waitUntilStreamingDistributionDeployed(array $input) Wait until a streaming distribution is deployed. The input array uses the parameters of the GetStreamingDistribution operation and waiter specific settings
 * @method waitUntilDistributionDeployed(array $input) Wait until a distribution is deployed. The input array uses the parameters of the GetDistribution operation and waiter specific settings
 * @method waitUntilInvalidationCompleted(array $input) Wait until an invalidation has completed. The input array uses the parameters of the GetInvalidation operation and waiter specific settings
 */
class CloudFrontClient extends AbstractClient
{
    /**
     * Factory method to create a new Amazon CloudFront client using an array of configuration options:
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
     * Region and Endpoint options
     *
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
        // Instantiate the CloudFront client
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/cloudfront-2012-05-05.php',
                Options::SIGNATURE => new CloudFrontSignature()
            ))
            ->setExceptionParser(new DefaultXmlExceptionParser())
            ->setIteratorsConfig(array(
                'token_param' => 'Marker',
                'token_key'   => 'NextMarker',
                'more_key'    => 'IsTruncated',
                'result_key'  => 'Items',
                'operations'  => array(
                    'ListCloudFrontOriginAccessIdentities',
                    'ListDistributions',
                    'ListInvalidations',
                    'ListStreamingDistributions'
                )
            ))
            ->build();

        return $client;
    }

    /**
     * Create a signed URL
     *
     * This method accepts an array of configuration options:
     * - url:       (string)  URL of the resource being signed (can include query string and wildcards). For example:
     *                        rtmp://s5c39gqb8ow64r.cloudfront.net/videos/mp3_name.mp3
     *                        http://d111111abcdef8.cloudfront.net/images/horizon.jpg?size=large&license=yes
     * - policy:    (string)  JSON policy. Use this option when creating a signed URL for a custom policy.
     * - expires:   (int)     UTC Unix timestamp used when signing with a canned policy. Not required when passing a
     *                        custom 'policy' option.
     *
     * @param array $options Array of configuration options used when signing
     *
     * @return string The file URL with authentication parameters.
     * @throws InvalidArgumentException if key_pair_id and private_key have not been configured on the client
     */
    public function getSignedUrl(array $options)
    {
        if (!$this->getConfig('key_pair_id') || !$this->getConfig('private_key')) {
            throw new InvalidArgumentException(
                'An Amazon CloudFront keypair ID (key_pair_id) and an RSA private key (private_key) is required'
            );
        }

        // Initialize the configuration data and ensure that the url was specified
        $options = Collection::fromConfig($options, null, array('url'));
        // Determine the scheme of the policy
        $urlSections = explode('://', $options['url']);
        // Ensure that the URL contained a scheme and parts after the scheme
        if (count($urlSections) < 2) {
            throw new InvalidArgumentException('Invalid URL: ' . $options['url']);
        }

        // Get the real scheme by removing wildcards from the scheme
        $scheme = str_replace('*', '', $urlSections[0]);
        $policy = $options['policy'] ?: $this->createCannedPolicy($scheme, $options['url'], $options['expires']);
        // Strip whitespace from the policy
        $policy = str_replace(' ', '', $policy);

        $url = Url::factory($scheme . '://' . $urlSections[1]);
        if ($options['policy']) {
            // Custom policies require that the encoded policy be specified in the URL
            $url->getQuery()->set('Policy', strtr(base64_encode($policy), '+=/', '-_~'));
        } else {
            // Canned policies require that the Expires parameter be set in the URL
            $url->getQuery()->set('Expires', $options['expires']);
        }

        // Sign the policy using the CloudFront private key
        $signedPolicy = $this->rsaSha1Sign($policy, $this->getConfig('private_key'));
        // Remove whitespace, base64 encode the policy, and replace special characters
        $signedPolicy = strtr(base64_encode($signedPolicy), '+=/', '-_~');

        $url->getQuery()
            ->useUrlEncoding(false)
            ->set('Signature', $signedPolicy)
            ->set('Key-Pair-Id', $this->getConfig('key_pair_id'));

        if ($scheme != 'rtmp') {
            // HTTP and HTTPS signed URLs include the full URL
            return (string) $url;
        } else {
            // Use a relative URL when creating Flash player URLs
            $url->setScheme(null)->setHost(null);
            // Encode query string variables for flash players
            $url = str_replace(array('?', '=', '&'), array('%3F', '%3D', '%26'), (string) $url);

            return substr($url, 1);
        }
    }

    /**
     * Sign a policy string using OpenSSL RSA SHA1
     *
     * @param string $policy             Policy to sign
     * @param string $privateKeyFilename File containing the OpenSSL private key
     *
     * @return string
     */
    protected function rsaSha1Sign($policy, $privateKeyFilename)
    {
        $signature = '';
        openssl_sign($policy, $signature, file_get_contents($privateKeyFilename));

        return $signature;
    }

    /**
     * Create a canned policy for a particular URL and expiration
     *
     * @param string $scheme  Parsed scheme without wildcards
     * @param string $url     URL that is being signed
     * @param int    $expires Time in which the signature expires
     *
     * @return string
     * @throws InvalidArgumentException if the expiration is not set
     */
    protected function createCannedPolicy($scheme, $url, $expires)
    {
        if (!$expires) {
            throw new InvalidArgumentException('An expires option is required when using a canned policy');
        }

        // Generate a canned policy
        if ($scheme == 'http' || $scheme == 'https') {
            $resource = $url;
        } elseif ($scheme == 'rtmp') {
            $parts = parse_url($url);
            $pathParts = pathinfo($parts['path']);
            // Add path leading to file, strip file extension, and add a query string if present
            $resource = ltrim($pathParts['dirname'] . '/' . $pathParts['filename'], '/')
                . (isset($parts['query']) ? "?{$parts['query']}" : '');
        } else {
            throw new InvalidArgumentException("Invalid URI scheme: {$scheme}. Must be one of http or rtmp.");
        }

        return sprintf(
            '{"Statement":[{"Resource":"%s","Condition":{"DateLessThan":{"AWS:EpochTime":%d}}}]}',
            $resource,
            $expires
        );
    }
}
