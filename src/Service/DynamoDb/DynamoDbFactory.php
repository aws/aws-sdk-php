<?php
namespace Aws\Service\DynamoDb;

use Aws\AwsClientInterface;
use Aws\Retry\ThrottlingFilter;
use Aws\Retry\Crc32Filter;
use Aws\Service\ClientFactory;
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
        if ($value = $this->validateRetries($value)) {
            $client->getHttpClient()->getEmitter()->attach(new RetrySubscriber([
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
            ]));
        }
    }

    // @todo Does this option from SDKv2 need to be accounted for anywhere?
    // self::COMMAND_PARAMS => array(Cmd::RESPONSE_PROCESSING => Cmd::TYPE_NO_TRANSLATION)
}
