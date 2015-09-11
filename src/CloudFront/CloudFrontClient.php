<?php
namespace Aws\CloudFront;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudFront** service.
 *
 * @method \Aws\Result createCloudFrontOriginAccessIdentity(array $args = [])
 * @method \Aws\Result createDistribution(array $args = [])
 * @method \Aws\Result createInvalidation(array $args = [])
 * @method \Aws\Result createStreamingDistribution(array $args = [])
 * @method \Aws\Result deleteCloudFrontOriginAccessIdentity(array $args = [])
 * @method \Aws\Result deleteDistribution(array $args = [])
 * @method \Aws\Result deleteStreamingDistribution(array $args = [])
 * @method \Aws\Result getCloudFrontOriginAccessIdentity(array $args = [])
 * @method \Aws\Result getCloudFrontOriginAccessIdentityConfig(array $args = [])
 * @method \Aws\Result getDistribution(array $args = [])
 * @method \Aws\Result getDistributionConfig(array $args = [])
 * @method \Aws\Result getInvalidation(array $args = [])
 * @method \Aws\Result getStreamingDistribution(array $args = [])
 * @method \Aws\Result getStreamingDistributionConfig(array $args = [])
 * @method \Aws\Result listCloudFrontOriginAccessIdentities(array $args = [])
 * @method \Aws\Result listDistributions(array $args = [])
 * @method \Aws\Result listInvalidations(array $args = [])
 * @method \Aws\Result listStreamingDistributions(array $args = [])
 * @method \Aws\Result updateCloudFrontOriginAccessIdentity(array $args = [])
 * @method \Aws\Result updateDistribution(array $args = [])
 * @method \Aws\Result updateStreamingDistribution(array $args = [])
 */
class CloudFrontClient extends AwsClient
{
    /**
     * Create a signed Amazon CloudFront URL.
     *
     * This method accepts an array of configuration options:
     *
     * - url: (string)  URL of the resource being signed (can include query
     *   string and wildcards). For example: rtmp://s5c39gqb8ow64r.cloudfront.net/videos/mp3_name.mp3
     *   http://d111111abcdef8.cloudfront.net/images/horizon.jpg?size=large&license=yes
     * - policy: (string) JSON policy. Use this option when creating a signed
     *   URL for a custom policy.
     * - expires: (int) UTC Unix timestamp used when signing with a canned
     *   policy. Not required when passing a custom 'policy' option.
     * - key_pair_id: (string) The ID of the key pair used to sign CloudFront
     *   URLs for private distributions.
     * - private_key: (string) The filepath ot the private key used to sign
     *   CloudFront URLs for private distributions.
     *
     * @param array $options Array of configuration options used when signing
     *
     * @return string Signed URL with authentication parameters
     * @throws \InvalidArgumentException if url, key_pair_id, or private_key
     *     were not specified.
     * @link http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/WorkingWithStreamingDistributions.html
     */
    public function getSignedUrl(array $options)
    {
        foreach (['url', 'key_pair_id', 'private_key'] as $required) {
            if (!isset($options[$required])) {
                throw new \InvalidArgumentException("$required is required");
            }
        }

        $UrlSigner = new UrlSigner(
            $options['key_pair_id'],
            $options['private_key']
        );

        return $UrlSigner->getSignedUrl(
            $options['url'],
            isset($options['expires']) ? $options['expires'] : null,
            isset($options['policy']) ? $options['policy'] : null
        );
    }
}
