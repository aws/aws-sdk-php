<?php
namespace Aws\DynamoDb;

use Aws\AwsClientInterface;
use Aws\Common\Retry\ThrottlingFilter;
use Aws\Common\Retry\Crc32Filter;
use Aws\Common\ClientFactory;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * @internal
 */
class DynamoDbFactory extends ClientFactory
{
    // Higher max due to smaller delays and faster response times.
    const DEFAULT_MAX_RETRIES = 11;

    protected function createClient(array $args)
    {
        $client = parent::createClient($args);

        // DynamoDB does not redirect, so there's no need to add the subscriber.
        $client->getHttpClient()->setDefaultOption('allow_redirects', false);

        return $client;
    }

    protected function handle_retries(
        $value,
        array &$args,
        AwsClientInterface $client
    ) {
        $value = $this->validateRetries($value);

        if ($value === false) {
            return;
        }

        $conf = [
            'max' => $value,
            'delay' => function ($retries) {
                return $retries === 0
                    ? 0
                    : (50 * (int) pow(2, $retries - 1)) / 1000;
            },
            'filter' => RetrySubscriber::createChainFilter([
                new ThrottlingFilter($args['error_parser']),
                new Crc32Filter($args['error_parser']),
                RetrySubscriber::createStatusFilter(),
                RetrySubscriber::createCurlFilter()
            ])
        ];

        $this->addRetryLogger($args, $conf);
        $retry = new RetrySubscriber($conf);
        $client->getHttpClient()->getEmitter()->attach($retry);
    }
}
