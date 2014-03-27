<?php

namespace Aws;

use Aws\Api\Model;
use Aws\Api\Serializer\JsonRpcSerializer;
use Aws\Api\Serializer\QuerySerializer;
use Aws\Api\Serializer\RestJsonSerializer;
use Aws\Api\Parser\JsonRpcParser;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\Signature\SignatureV2;
use Aws\Signature\SignatureV4;
use Aws\Signature\SignatureInterface;
use Aws\Subscriber\Signature;
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

    /** @var Model */
    private $api;

    /** @var string */
    private $endpoint;

    /**
     * The AwsClient constructor accepts the following constructor option:
     *
     * - api: (required) The Api object used to interact with a web service
     * - endpoint: (required) String representing the service endpoint
     * - credentials: CredentialsInterface object used when signing. If none is
     *   specified, credentials will be created based on the environment.
     * - region: Region used to interact with the service
     * - client: {@see GuzzleHttp\Client} used to send requests.
     * - signature: string representing the signature version to use
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

        foreach (['api', 'endpoint'] as $required) {
            if (!isset($config[$required])) {
                throw new \InvalidArgumentException($required . ' is required');
            }
        }

        $this->api = $config['api'];
        $this->endpoint = $config['endpoint'];
        $this->region = isset($config['region']) ? $config['region'] : null;
        $this->addCredentials($config);
        $this->addSignature($config);

        // Remove settings from the config collection
        unset($config['api'], $config['credentials'], $config['signature'],
            $config['client']);

        parent::__construct($client, $config);
        $this->getHttpClient()->getEmitter()->attach(
            new Signature($this->credentials, $this->signature)
        );

        $this->addProtocol();
    }

    public function getCommand($name, array $args = [])
    {
        $command = null;
        if (isset($this->api['operations'][$name])) {
            $command = $this->api['operations'][$name];
        } else {
            $name = ucfirst($name);
            if (isset($this->api['operations'][$name])) {
                $command = $this->api['operations'][$name];
            }
        }

        if (!$command) {
            throw new \InvalidArgumentException("Operation not found: $name");
        }

        return new AwsCommand($name, $args, $this->api, clone $this->getEmitter());
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

    /**
     * Applies the appropriate request serializers and response parsers.
     */
    private function addProtocol()
    {
        $type = $this->api['metadata']['type'];
        $em = $this->getEmitter();

        if ($type == 'json') {
            $em->attach(new JsonRpcSerializer($this->endpoint, $this->api));
            $em->attach(new JsonRpcParser($this->api));
        } elseif ($type == 'query') {
            $em->attach(new QuerySerializer($this->endpoint, $this->api));
            // $em->attach(new XmlParser($this->api));
        } elseif ($type = 'rest-json') {
            $em->attach(new RestJsonSerializer($this->endpoint, $this->api));
            // $em->attach(new RestJsonParser($this->api));
        } elseif ($type == 'rest-xml') {
            // $em->attach(new RestXmlSerializer($this->endpoint, $this->api));
            // $em->attach(new RestXmlParser($this->api));
        } else {
            throw new \UnexpectedValueException('Unknown protocol ' . $type);
        }
    }

    /**
     * Applies the appropriate credentials to the client.
     */
    private function addCredentials(array $config)
    {
        if (!isset($config['credentials'])) {
            $this->credentials = Credentials::factory();
        } elseif (!($config['credentials'] instanceof CredentialsInterface)) {
            throw new \InvalidArgumentException('The credentials setting must '
                . ' implement Aws\Credentials\CredentialsInterface');
        } else {
            $this->credentials = $config['credentials'];
        }
    }

    /**
     * Applies the appropriate signature to the client.
     */
    private function addSignature(array $config)
    {
        $version = isset($config['signature'])
            ? $config['signature']
            : $this->api->getMetadata('signatureVersion');

        switch ($version) {
            case 'v4':
                $this->signature =  new SignatureV4(
                    $this->api->getMetadata('signingName')
                        ?: $this->api->getMetadata('endpointPrefix'),
                    $this->region
                );
                break;
            case 'v2':
                $this->signature =  new SignatureV2();
                break;
            default:
                throw new \InvalidArgumentException("Unknown signature"
                    . " version {$version}");
        }
    }
}
