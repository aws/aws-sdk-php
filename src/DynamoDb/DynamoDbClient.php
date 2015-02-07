<?php
namespace Aws\DynamoDb;

use Aws\AwsClient;
use Aws\ClientResolver;
use Aws\Retry\ThrottlingFilter;
use Aws\Retry\Crc32Filter;
use GuzzleHttp\Subscriber\Retry\RetrySubscriber;

/**
 * This client is used to interact with the **Amazon DynamoDB** service.
 */
class DynamoDbClient extends AwsClient
{
    public static function getArguments()
    {
        $args = parent::getArguments();
        // Apply custom retry strategy for DynamoDB.
        $args['retries']['default'] = 11;
        $args['retries']['fn'] = self::applyRetryConfig();

        return $args;
    }

    public function __construct(array $args)
    {
        parent::__construct($args);
        // DynamoDB does not redirect, so there's no need to add the subscriber.
        $this->getHttpClient()->setDefaultOption('allow_redirects', false);
    }

    /**
     * Convenience method for instantiating and registering the DynamoDB
     * Session handler with this DynamoDB client object.
     *
     * @param array $config Array of options for the session handler factory
     *
     * @return SessionHandler
     */
    public function registerSessionHandler(array $config = [])
    {
        $handler = SessionHandler::fromClient($this, $config);
        $handler->register();

        return $handler;
    }

    private static function applyRetryConfig()
    {
        return function ($value, array &$args) {
            if ($value) {
                $args['client']->getEmitter()->attach(new RetrySubscriber(
                    ClientResolver::_wrapDebugLogger($args, [
                        'max'    => $value,
                        'delay'  => function ($retries) {
                            return $retries
                                ? (50 * (int)pow(2, $retries - 1)) / 1000
                                : 0;
                        },
                        'filter' => RetrySubscriber::createChainFilter([
                            new ThrottlingFilter($args['error_parser']),
                            new Crc32Filter($args['error_parser']),
                            RetrySubscriber::createStatusFilter(),
                            RetrySubscriber::createConnectFilter()
                        ])
                    ])
                ));
            }
        };
    }
}
