<?php

namespace Aws\CloudSearchDomain;

use Aws\Common\Client\ClientBuilder;
use Aws\Common\Client\ThrottlingErrorChecker;
use Aws\Common\Client\UserAgentListener;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\ExceptionListener;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Exception\NamespaceExceptionFactory;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Http\Url;
use Guzzle\Plugin\Backoff\BackoffPlugin;
use Guzzle\Plugin\Backoff\CurlBackoffStrategy;
use Guzzle\Plugin\Backoff\ExponentialBackoffStrategy;
use Guzzle\Plugin\Backoff\HttpBackoffStrategy;
use Guzzle\Plugin\Backoff\TruncatedBackoffStrategy;
use Guzzle\Service\Description\ServiceDescription;

/**
 * Builder for creating CloudSearchDomain clients
 *
 * @internal
 */
class CloudSearchDomainClientBuilder extends ClientBuilder
{
    protected static $commonConfigDefaults = array(
        Options::SCHEME => 'https',
    );

    public function build()
    {
        // Resolve configuration
        $config = Collection::fromConfig(
            $this->config,
            array_merge(self::$commonConfigDefaults, $this->configDefaults),
            $this->configRequirements
        );

        $endpoint = $config['endpoint'] ?: $config[Options::BASE_URL];

        // Make sure endpoint is correctly set
        if (!$endpoint) {
            throw new InvalidArgumentException('You must provide the endpoint for the CloudSearch domain.');
        }

        if (strpos($endpoint, 'http') !== 0) {
            $endpoint = $config[Options::SCHEME] . '://' . $endpoint;
            $config['endpoint'] = $endpoint;
            $config[Options::BASE_URL] = $endpoint;
        }

        // Determine the region from the endpoint
        $endpoint = Url::factory($endpoint);
        list(,$region) = explode('.', $endpoint->getHost());
        $config[Options::REGION] = $config[Options::SIGNATURE_REGION] = $region;

        // Create dependencies
        $exceptionParser = new JsonQueryExceptionParser();
        $description = ServiceDescription::factory(sprintf(
            $config->get(Options::SERVICE_DESCRIPTION),
            $config->get(Options::VERSION)
        ));
        $signature = $this->getSignature($description, $config);
        $credentials = $this->getCredentials($config);

        // Resolve backoff strategy
        $backoff = $config->get(Options::BACKOFF);
        if ($backoff === null) {
            $backoff = new BackoffPlugin(
                // Retry failed requests up to 3 times if it is determined that the request can be retried
                new TruncatedBackoffStrategy(3,
                    // Retry failed requests with 400-level responses due to throttling
                    new ThrottlingErrorChecker($exceptionParser,
                        // Retry failed requests due to transient network or cURL problems
                        new CurlBackoffStrategy(null,
                            // Retry failed requests with 500-level responses
                            new HttpBackoffStrategy(array(500, 503, 509),
                                new ExponentialBackoffStrategy()
                            )
                        )
                    )
                )
            );
            $config->set(Options::BACKOFF, $backoff);
        }
        if ($backoff) {
            $this->addBackoffLogger($backoff, $config);
        }

        // Create client
        $client = new CloudSearchDomainClient($credentials, $signature, $config);
        $client->setDescription($description);

        // Add exception marshaling so that more descriptive exception are thrown
        $client->addSubscriber(new ExceptionListener(new NamespaceExceptionFactory(
            $exceptionParser,
            __NAMESPACE__ . '\\Exception',
            __NAMESPACE__ . '\\Exception\\CloudSearchDomainException'
        )));

        // Add the UserAgentPlugin to append to the User-Agent header of requests
        $client->addSubscriber(new UserAgentListener);

        // Filters used for the cache plugin
        $client->getConfig()->set(
            'params.cache.key_filter',
            'header=date,x-amz-date,x-amz-security-token,x-amzn-authorization'
        );

        // Disable parameter validation if needed
        if ($config->get(Options::VALIDATION) === false) {
            $params = $config->get('command.params') ?: array();
            $params['command.disable_validation'] = true;
            $config->set('command.params', $params);
        }

        return $client;
    }
}
