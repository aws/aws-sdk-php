<?php

namespace Aws;

use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Signature\SignatureInterface;
use Aws\Common\Signature\SignatureListener;
use GuzzleHttp\Client;
use GuzzleHttp\Command\AbstractClient;

/**
 * Default AWS client implementation
 */
class AwsClient extends AbstractClient implements AwsClientInterface
{
    const VERSION = '3.0.0-beta.1';

    /** @var CredentialsInterface AWS credentials */
    private $credentials;

    /** @var SignatureInterface Signature implementation of the service */
    private $signature;

    /** @var string */
    private $region;

    /** @var Api */
    private $api;

    /**
     * The AwsClient constructor accepts the following constructor option:
     *
     * - api: (required) The Api object used to interact with a web service
     * - signature: (required) SignatureInterface object used to sign requests
     * - credentials: (required) CredentialsInterface object used when signing
     *   requests.
     * - region: Region used to interact with the service
     * - client: {@see GuzzleHttp\Client} used to send requests.
     *
     * @param array $config Configuration options
     * @throws \InvalidArgumentException if any required options are missing
     */
    public function __construct(array $config)
    {
        $client = isset($config['client']) ? $config['client'] : new Client();

        // Make sure the user agent is prefixed by the SDK version
        $client->setDefaultOption(
            'headers/User-Agent',
            'aws-sdk-php/' . self::VERSION . ' ' . Client::getDefaultUserAgent()
        );

        foreach (['credentials', 'signature', 'api'] as $required) {
            if (!isset($config[$required])) {
                throw new \InvalidArgumentException($required . ' is required');
            }
        }

        $this->api = $config['api'];
        $this->credentials = $config['credentials'];
        $this->signature = $config['signature'];
        $this->region = isset($config['region']) ? $config['region'] : null;

        // Remove settings from the config collection
        unset($config['api'], $config['credentials'], $config['signature'],
            $config['client']);

        parent::__construct($client, $config);
        $this->getHttpClient()->getEmitter()->attach(
            new SignatureListener($this->credentials, $this->signature)
        );
    }

    public function getCommand($name, array $args = [])
    {

    }

    public function __call($name, array $arguments)
    {
        if (substr($name, 0, 3) === 'get' && substr($name, -8) === 'Iterator') {
            // Allow magic method calls for iterators.
            // (e.g. $client->get<CommandName>Iterator($params))
            $commandOptions = isset($arguments[0]) ? $arguments[0] : null;
            $iteratorOptions = isset($arguments[1]) ? $arguments[1] : [];
            // @todo: Add iterators
        } elseif (substr($name, 0, 9) == 'waitUntil') {
            // Allow magic method calls for waiters.
            // (e.g. $client->waitUntil<WaiterName>($params))
            // @todo: Add waiters
        }

        return parent::__call($name, $arguments);
    }

    public function getCredentials()
    {
        return $this->credentials;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getApi()
    {
        return $this->api;
    }
}
