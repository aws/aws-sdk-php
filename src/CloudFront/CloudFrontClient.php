<?php
namespace Aws\CloudFront;

use Aws\AwsClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Exception\Parser\DefaultXmlExceptionParser;
use Aws\Common\Exception\RequiredExtensionNotLoadedException;
use Guzzle\Common\Collection;
use Guzzle\Http\Url;

/**
 * Client used to interact with the Amazon CloudFront service.
 *
 * @todo this client needs updating
 */
class CloudFrontClient extends AwsClient
{
    /**
     * Factory method to create a new Amazon CloudFront client using an array of configuration options.
     *
     * CloudFront specific options (in addition to the default client configuration options):
     * - key_pair_id: The ID of the key pair used to sign CloudFront URLs for private distributions.
     * - private_key: The filepath ot the private key used to sign CloudFront URLs for private distributions.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/guide/latest/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        // Decide which signature to use
        if (isset($config[Options::VERSION]) && $config[Options::VERSION] < self::LATEST_API_VERSION) {
            $config[Options::SIGNATURE] = new CloudFrontSignature();
        }

        // Instantiate the CloudFront client
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/cloudfront-%s.php',
            ))
            ->setExceptionParser(new DefaultXmlExceptionParser())
            ->build();
    }

    /**
     * Create a signed URL. Keep in mind that URLs meant for use in media/flash players may have different requirements
     * for URL formats (e.g. some require that the extension be removed, some require the file name to be prefixed -
     * mp4:<path>, some require you to add "/cfx/st" into your URL). See
     * http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/WorkingWithStreamingDistributions.html for
     * additional details and help.
     *
     * This method accepts an array of configuration options:
     * - url:         (string)  URL of the resource being signed (can include query string and wildcards). For example:
     *                          rtmp://s5c39gqb8ow64r.cloudfront.net/videos/mp3_name.mp3
     *                          http://d111111abcdef8.cloudfront.net/images/horizon.jpg?size=large&license=yes
     * - policy:      (string)  JSON policy. Use this option when creating a signed URL for a custom policy.
     * - expires:     (int)     UTC Unix timestamp used when signing with a canned policy. Not required when passing a
     *                          custom 'policy' option.
     * - key_pair_id: (string)  The ID of the key pair used to sign CloudFront URLs for private distributions.
     * - private_key: (string)  The filepath ot the private key used to sign CloudFront URLs for private distributions.
     *
     * @param array $options Array of configuration options used when signing
     *
     * @return string                              The file URL with authentication parameters
     * @throws InvalidArgumentException            if key_pair_id and private_key have not been configured on the client
     * @throws RequiredExtensionNotLoadedException if the openssl extension is not installed
     * @link   http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/WorkingWithStreamingDistributions.html
     */
    public function getSignedUrl(array $options)
    {
        if (!extension_loaded('openssl')) {
            //@codeCoverageIgnoreStart
            throw new RequiredExtensionNotLoadedException('The openssl extension is required to sign CloudFront urls.');
            //@codeCoverageIgnoreEnd
        }

        // Initialize the configuration data and ensure that the url was specified
        $options = Collection::fromConfig($options, array_filter(array(
            'key_pair_id' => $this->getConfig('key_pair_id'),
            'private_key' => $this->getConfig('private_key'),
        )), array('url', 'key_pair_id', 'private_key'));

        // Determine the scheme of the url
        $urlSections = explode('://', $options['url']);
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
        $signedPolicy = $this->rsaSha1Sign($policy, $options['private_key']);
        // Remove whitespace, base64 encode the policy, and replace special characters
        $signedPolicy = strtr(base64_encode($signedPolicy), '+=/', '-_~');

        $url->getQuery()
            ->set('Signature', $signedPolicy)
            ->set('Key-Pair-Id', $options['key_pair_id']);

        if ($scheme != 'rtmp') {
            // HTTP and HTTPS signed URLs include the full URL
            return (string) $url;
        } else {
            // Use a relative URL when creating Flash player URLs
            $url->getQuery()->useUrlEncoding(false);
            $url->setScheme(null)->setHost(null);
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
            $resource = ltrim($pathParts['dirname'] . '/' . $pathParts['basename'], '/')
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
