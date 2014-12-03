<?php
namespace Aws\DynamoDb;

use Aws\Common\Retry\ThrottlingFilter;
use Aws\Common\Retry\Crc32Filter;
use Aws\Common\ClientFactory;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * @internal
 */
class DynamoDbFactory extends ClientFactory
{
    protected function createClient(array $args)
    {
        $client = parent::createClient($args);

        // DynamoDB does not redirect, so there's no need to add the subscriber.
        $client->getHttpClient()->setDefaultOption('allow_redirects', false);

        return $client;
    }

    protected function getRetryOptions(array $args)
    {
        return [
            'max' => 11,
            'delay' => function ($retries) {
                return $retries ? (50 * (int) pow(2, $retries - 1)) / 1000 : 0;
            },
            'filter' => RetrySubscriber::createChainFilter([
                new ThrottlingFilter($args['error_parser']),
                new Crc32Filter($args['error_parser']),
                RetrySubscriber::createStatusFilter(),
                RetrySubscriber::createConnectFilter()
            ])
        ];
    }
}
