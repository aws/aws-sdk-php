<?php
namespace Aws\S3;

use Aws\AwsClientInterface;
use Aws\ClientFactory;
use Aws\Retry\S3TimeoutFilter;
use Aws\Signature\SignatureV4;
use Aws\Subscriber\SaveAs;
use Aws\Subscriber\SourceFile;
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * In addition to the default client factory configuration options, the Amazon
 * S3 factory supports the following additional key value pairs:
 *
 * - calculate_md5: Set to false to disable calculating an MD5 for all Amazon
 *   S3 signed uploads.
 * - force_path_style: Set to false to disable calculating an MD5 for all
 *   Amazon S3 signed uploads.
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
                'type'    => 'post',
                'valid'   => 'bool'
            ],
            'calculate_md5' => [
                'doc'     => 'Set to false to disable calculating an MD5 for all Amazon S3 signed uploads.',
                'type'    => 'value',
                'valid'   => 'bool'
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
        $this->enableErrorParserToHandleHeadRequests($args);
        $client = parent::createClient($args);
        $emitter = $client->getEmitter();
        $emitter->attach(new BucketStyleSubscriber());
        $emitter->attach(new PermanentRedirectSubscriber());
        $emitter->attach(new SSECSubscriber());
        $emitter->attach(new PutObjectUrlSubscriber());
        $emitter->attach(new SourceFile($client->getApi()));
        $emitter->attach(new ApplyMd5Subscriber());
        $emitter->attach(new SaveAs());

        // S3Client should calculate MD5 checksums for uploads unless explicitly
        // disabled or using SignatureV4.
        $value = !isset($args['calculate_md5'])
            ? !($client->getSignature() instanceof SignatureV4)
            : $args['calculate_md5'];
        $client->setConfig('calculate_md5', $value);

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

    protected function handle_force_path_style(
        $value,
        array $args,
        AwsClientInterface $client
    ) {
        // Force path style on all requests if instructed.
        $client->setConfig('defaults/PathStyle', $value === true);
    }
}
