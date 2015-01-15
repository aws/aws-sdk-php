<?php
namespace Aws\ClientFactory;

use Aws\Retry\S3TimeoutFilter;
use Aws\Signature\S3Signature;
use Aws\Signature\S3SignatureV4;
use Aws\Signature\SignatureV4;
use Aws\Subscriber\SaveAs;
use Aws\Subscriber\SourceFile;
use Aws\S3\ApplyMd5Subscriber;
use Aws\S3\PutObjectUrlSubscriber;
use Aws\S3\BucketStyleSubscriber;
use Aws\S3\SSECSubscriber;
use Aws\S3\PermanentRedirectSubscriber;
use Aws\S3\S3UriParser;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * In addition to the default client factory configuration options, the Amazon
 * S3 factory supports the following additional key value pairs:
 *
 * - calculate_md5: Set to false to disable optional MD5 calculations.
 * - force_path_style: Set to true to force all Amazon S3 requests to be sent
 *   using path-style addressing rather than bucket style addressing.
 *
 * @internal
 */
class S3 extends ClientFactory
{
    /**
     * {@inheritdoc}
     *
     * Amazon S3 does not require a region for the "classic" endpoint.
     */
    protected function addDefaultArgs(&$args)
    {
        if (!isset($args['region'])) {
            $args['region'] = 'us-east-1';
        }

        parent::addDefaultArgs($args);
    }

    protected function createClient(array $args)
    {
        $this->enableErrorParserToHandleHeadRequests($args);
        $client = parent::createClient($args);

        // S3Client should calculate MD5 checksums for uploads unless explicitly
        // disabled or using SignatureV4.
        $client->setConfig(
            'calculate_md5',
            isset($args['calculate_md5'])
                ? $args['calculate_md5']
                : (!$client->getSignature() instanceof SignatureV4)
        );

        // Force path style on all requests.
        if (!empty($args['force_path_style'])) {
            $client->setConfig('defaults/PathStyle', true);
        }

        $emitter = $client->getEmitter();
        $emitter->attach(new BucketStyleSubscriber());
        $emitter->attach(new PermanentRedirectSubscriber());
        $emitter->attach(new SSECSubscriber());
        $emitter->attach(new PutObjectUrlSubscriber());
        $emitter->attach(new SourceFile($client->getApi()));
        $emitter->attach(new ApplyMd5Subscriber());
        $emitter->attach(new SaveAs());

        return $client;
    }

    protected function createSignature($version, $signingName, $region)
    {
        if ($version == 's3') {
            return new S3Signature();
        } elseif ($version == 'v4') {
            return new S3SignatureV4($signingName, $region);
        }

        throw new \InvalidArgumentException('Amazon S3 supports signature '
            . 'version "s3" or "v4"');
    }

    protected function getRetryOptions(array $args)
    {
        $options = parent::getRetryOptions($args);

        // Add the S3 socket timeout filter to the retry chain.
        $options['filter'] = RetrySubscriber::createChainFilter([
            new S3TimeoutFilter(),
            $options['filter']
        ]);

        return $options;
    }

    private function enableErrorParserToHandleHeadRequests(array &$args)
    {
        $originalErrorParser = $args['error_parser'];
        $args['error_parser'] = function (ResponseInterface $response) use (
            $originalErrorParser
        ) {
            // Call the original parser.
            $errorData = $originalErrorParser($response);

            // Handle 404 responses where the code was not parsed.
            if (!isset($errorData['code']) && $response->getStatusCode() == 404) {
                $url = (new S3UriParser)->parse($response->getEffectiveUrl());
                if (isset($url['key'])) {
                    $errorData['code'] = 'NoSuchKey';
                } elseif ($url['bucket']) {
                    $errorData['code'] = 'NoSuchBucket';
                }
            }

            return $errorData;
        };
    }
}
