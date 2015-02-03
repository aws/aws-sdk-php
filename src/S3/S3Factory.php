<?php
namespace Aws\S3;

use Aws\ClientFactory;
use Aws\Retry\S3TimeoutFilter;
use Aws\Subscriber\SaveAs;
use Aws\Subscriber\SourceFile;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * In addition to the default client factory configuration options, the Amazon
 * S3 factory supports the following additional key value pairs:
 *
 * - bucket_endpoint: (bool) Set to true to send requests to a hardcoded
 *   bucket endpoint rather than create an endpoint as a
 *   result of injecting the bucket into the URL. This
 *   option is useful for interacting with CNAME endpoints.
 * - calculate_md5: (bool) Set to false to disable calculating an MD5 for
 *   all Amazon S3 signed uploads.
 * - force_path_style: (bool) Set to true to send requests using path style
 *   addressing.
 *
 * @internal
 */
class S3Factory extends ClientFactory
{
    public static function getValidArguments()
    {
        return parent::getValidArguments() + [
            'force_path_style' => [
                'doc'     => 'Set to true to send requests using path style addressing.',
                'type'    => 'value',
                'valid'   => 'bool'
            ],
            'calculate_md5' => [
                'doc'     => 'Set to false to disable calculating an MD5 for all Amazon S3 signed uploads.',
                'type'    => 'config',
                'valid'   => 'bool'
            ],
            'bucket_endpoint' => [
                'doc'   => 'Set to true to send requests to a hardcoded bucket endpoint rather than create an endpoint as a result of injecting the bucket into the URL. This option is useful for interacting with CNAME endpoints.',
                'type'  => 'value',
                'valid' => 'bool'
            ]
        ];
    }

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
        if (!empty($args['force_path_style'])) {
            $args['defaults']['PathStyle'] = true;
        }

        // S3Client should calculate MD5 checksums for uploads unless
        // explicitly disabled or using a v4 signer.
        if (!isset($args['config']['calculate_md5'])) {
            $version = $this->getSignatureVersion($args);
            $args['config']['calculate_md5'] = $version != 'v4';
        }

        $this->enableErrorParserToHandleHeadRequests($args);
        $client = parent::createClient($args);
        $emitter = $client->getEmitter();
        $emitter->attach(new BucketStyleSubscriber(!empty($args['bucket_endpoint'])));
        $emitter->attach(new PermanentRedirectSubscriber());
        $emitter->attach(new SSECSubscriber());
        $emitter->attach(new PutObjectUrlSubscriber());
        $emitter->attach(new SourceFile($client->getApi()));
        $emitter->attach(new ApplyMd5Subscriber());
        $emitter->attach(new SaveAs());

        return $client;
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
