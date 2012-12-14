<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Common\Client;

use Aws\Common\Credentials\Credentials;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\ExceptionListener;
use Aws\Common\Exception\InvalidArgumentException;
use Aws\Common\Exception\NamespaceExceptionFactory;
use Aws\Common\Exception\Parser\DefaultXmlExceptionParser;
use Aws\Common\Exception\Parser\ExceptionParserInterface;
use Aws\Common\Iterator\AwsResourceIteratorFactory;
use Aws\Common\Region\EndpointProviderInterface;
use Aws\Common\Region\CachingEndpointProvider;
use Aws\Common\Region\XmlEndpointProvider;
use Aws\Common\Signature\SignatureInterface;
use Guzzle\Cache\DoctrineCacheAdapter;
use Guzzle\Common\Collection;
use Guzzle\Plugin\Backoff\BackoffPlugin;
use Guzzle\Service\Client;
use Guzzle\Service\Resource\ResourceIteratorClassFactory;

/**
 * Builder for creating AWS service clients
 */
class ClientBuilder
{
    /**
     * @var array Default client config
     */
    protected static $commonConfigDefaults = array();

    /**
     * @var array Default client requirements
     */
    protected static $commonConfigRequirements = array(Options::REGION);

    /**
     * @var EndpointProviderInterface Default region/service endpoint provider
     */
    protected static $defaultEndpointProvider;

    /**
     * @var string The namespace of the client
     */
    protected $clientNamespace;

    /**
     * @var array The config options
     */
    protected $config = array();

    /**
     * @var array The config defaults
     */
    protected $configDefaults = array();

    /**
     * @var array The config requirements
     */
    protected $configRequirements = array();

    /**
     * @var CredentialsOptionResolver The resolver for credentials
     */
    protected $credentialsResolver;

    /**
     * @var SignatureOptionResolver The resolver for the signature
     */
    protected $signatureResolver;

    /**
     * @var SignatureInterface The signature
     */
    protected $signature;

    /**
     * @var array An array of client resolvers
     */
    protected $clientResolvers = array();

    /**
     * @var ExceptionParserInterface The Parser interface for the client
     */
    protected $exceptionParser;

    /**
     * @var array Array of configuration data for iterators available for the client
     */
    protected $iteratorsConfig = array();

    /**
     * Factory method for creating the client builder
     *
     * @param string $namespace The namespace of the client
     *
     * @return ClientBuilder
     */
    public static function factory($namespace = null)
    {
        return new static($namespace);
    }

    /**
     * Constructs a client builder
     *
     * @param string $namespace The namespace of the client
     */
    public function __construct($namespace = null)
    {
        $this->clientNamespace = $namespace;
    }

    /**
     * Sets the config options
     *
     * @param array|Collection $config The config options
     *
     * @return ClientBuilder
     */
    public function setConfig($config)
    {
        $this->config = $this->processArray($config);

        return $this;
    }

    /**
     * Sets the config options' defaults
     *
     * @param array|Collection $defaults The default values
     *
     * @return ClientBuilder
     */
    public function setConfigDefaults($defaults)
    {
        $this->configDefaults = $this->processArray($defaults);

        return $this;
    }

    /**
     * Sets the required config options
     *
     * @param array|Collection $required The required config options
     *
     * @return ClientBuilder
     */
    public function setConfigRequirements($required)
    {
        $this->configRequirements = $this->processArray($required);

        return $this;
    }

    /**
     * Sets the credential resolver
     *
     * @param CredentialsOptionResolver $credentialsResolver The credential resolver
     *
     * @return ClientBuilder
     */
    public function setCredentialsResolver(CredentialsOptionResolver $credentialsResolver)
    {
        $this->credentialsResolver = $credentialsResolver;

        return $this;
    }

    /**
     * Sets the signature resolver. You can use the setSignature method instead
     * to set the signature using the default SignatureOptionResolver.
     *
     * @param SignatureOptionResolver $signatureResolver The signature resolver
     *
     * @return ClientBuilder
     */
    public function setSignatureResolver(SignatureOptionResolver $signatureResolver)
    {
        $this->signatureResolver = $signatureResolver;

        return $this;
    }

    /**
     * Sets the signature. You can use the setSignatureResolver method to set
     * the SignatureOptionResolver instead if you need greater flexibility.
     *
     * @param SignatureInterface $signature The signature
     *
     * @return ClientBuilder
     */
    public function setSignature(SignatureInterface $signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Adds a client resolver. The most common case is adding a custom
     * exponential backoff strategy. If an exponential backoff strategy is not
     * provided, then a default one will be used.
     *
     * @param OptionResolverInterface $clientResolver A client resolver
     *
     * @return ClientBuilder
     */
    public function addClientResolver(OptionResolverInterface $clientResolver)
    {
        $this->clientResolvers[] = $clientResolver;

        return $this;
    }

    /**
     * Sets the exception parser. If one is not provided the builder will use
     * the default XML exception parser.
     *
     * @param ExceptionParserInterface $parser The exception parser
     *
     * @return ClientBuilder
     */
    public function setExceptionParser(ExceptionParserInterface $parser)
    {
        $this->exceptionParser = $parser;

        return $this;
    }

    /**
     * Set the configuration for the client's iterators
     *
     * @param array $config Configuration data for client's iterators
     *
     * @return ClientBuilder
     */
    public function setIteratorsConfig(array $config)
    {
        $this->iteratorsConfig = $config;

        return $this;
    }

    /**
     * Performs the building logic using all of the parameters that have been
     * set and falling back to default values. Returns an instantiate service
     * client with credentials prepared and plugins attached.
     *
     * @return AwsClientInterface
     * @throws InvalidArgumentException
     */
    public function build()
    {
        // Resolve config
        /** @var $config Collection */
        $config = Collection::fromConfig(
            $this->config,
            array_merge(self::$commonConfigDefaults, $this->configDefaults),
            (self::$commonConfigRequirements + $this->configRequirements)
        );

        // If no endpoint provider was explicitly set, the instantiate a default endpoint provider
        if (!$config->get(Options::ENDPOINT_PROVIDER)) {
            $config->set(Options::ENDPOINT_PROVIDER, $this->getDefaultEndpointProvider());
        }

        // If no base_url was explicitly set, then grab one using the default endpoint provider
        if (!$config->get(Options::BASE_URL)) {
            $this->addBaseUrlToConfig($config);
        }

        // Resolve credentials
        if (!$this->credentialsResolver) {
            $this->credentialsResolver = $this->getDefaultCredentialsResolver();
        }
        $this->credentialsResolver->resolve($config);

        // Resolve signature
        if (!$this->signatureResolver) {
            if (!$config->hasKey(Options::SIGNATURE) && !$this->signature) {
                throw new InvalidArgumentException('A signature has not been provided.');
            }
            $signature = $this->signature;
            $this->signatureResolver = new SignatureOptionResolver(function () use ($signature) {
                return $signature;
            });
        }
        $this->signatureResolver->resolve($config);

        // Add other client resolvers, like exponential backoff
        if (!$this->hasBackoffOptionResolver()) {
            $this->addClientResolver($this->getDefaultBackoffResolver());
        }
        $config->set(Options::RESOLVERS, $this->clientResolvers);

        // Determine service and class name
        $clientClass = 'Aws\Common\Client\DefaultClient';
        if ($this->clientNamespace) {
            $serviceName = substr($this->clientNamespace, strrpos($this->clientNamespace, '\\') + 1);
            $clientClass = $this->clientNamespace . '\\' . $serviceName . 'Client';
        }

        // Construct the client
        /** @var $client AwsClientInterface */
        $client = new $clientClass($config->get(Options::CREDENTIALS), $config->get(Options::SIGNATURE), $config);

        // Add exception marshaling so that more descriptive exception are thrown
        if ($this->clientNamespace) {
            $exceptionFactory = new NamespaceExceptionFactory(
                $this->exceptionParser ?: new DefaultXmlExceptionParser(),
                "{$this->clientNamespace}\\Exception",
                "{$this->clientNamespace}\\Exception\\{$serviceName}Exception"
            );
            $client->addSubscriber(new ExceptionListener($exceptionFactory));
        }

        // Add the UserAgentPlugin to append to the User-Agent header of requests
        $client->addSubscriber(new UserAgentListener());

        // Filters used for the cache plugin
        $client->getConfig()->set(
            'params.cache.key_filter',
            'header=date,x-amz-date,x-amz-security-token,x-amzn-authorization'
        );

        // Set the iterator resource factory based on the provided iterators config
        $client->setResourceIteratorFactory(new AwsResourceIteratorFactory(
            $this->iteratorsConfig,
            new ResourceIteratorClassFactory($this->clientNamespace . '\\Iterator')
        ));

        return $client;
    }

    /**
     * Add a base URL to the client of a region, scheme, and service were provided instead
     *
     * @param Collection $config Config object
     *
     * @throws InvalidArgumentException if required parameters are not set
     */
    protected function addBaseUrlToConfig(Collection $config)
    {
        $region = $config->get(Options::REGION);
        $service = $config->get(Options::SERVICE);

        if (!$region || !$service) {
            throw new InvalidArgumentException(
                'You must specify a [base_url] or a [region, service, and optional scheme]'
            );
        }

        $endpoint = $config->get(Options::ENDPOINT_PROVIDER)->getEndpoint($service, $region);
        $config->set(Options::BASE_URL, $endpoint->getBaseUrl($config->get(Options::SCHEME)));
    }

    /**
     * Returns the default credential resolver for a client
     *
     * @return CredentialsOptionResolver
     */
    protected function getDefaultCredentialsResolver()
    {
        return new CredentialsOptionResolver(function (Collection $config) {
            return Credentials::factory($config->getAll(array_keys(Credentials::getConfigDefaults())));
        });
    }

    /**
     * Returns the default exponential backoff plugin for a client
     *
     * @return BackoffOptionResolver
     */
    protected function getDefaultBackoffResolver()
    {
        return new BackoffOptionResolver(function() {
            return BackoffPlugin::getExponentialBackoff();
        });
    }

    /**
     * Determines whether or not an exponential backoff plugin has been added to the builder
     *
     * @return bool
     */
    protected function hasBackoffOptionResolver()
    {
        foreach ($this->clientResolvers as $resolver) {
            if ($resolver instanceof BackoffOptionResolver) {
                return true;
            }
        }

        return false;
    }

    /**
     * Ensures that an array (e.g. for config data) is actually in array form
     *
     * @param array|Collection $array The array data
     *
     * @return array
     * @throws InvalidArgumentException if the arg is not an array or Collection
     */
    protected function processArray($array)
    {
        if ($array instanceof Collection) {
            $array = $array->getAll();
        }

        if (!is_array($array)) {
            throw new InvalidArgumentException('The config must be provided as an array or Collection.');
        }

        return $array;
    }

    /**
     * Get the default {@see EndpointProviderInterface} object
     *
     * @return EndpointProviderInterface
     */
    protected function getDefaultEndpointProvider()
    {
        // @codeCoverageIgnoreStart
        if (!self::$defaultEndpointProvider) {
            self::$defaultEndpointProvider = new XmlEndpointProvider();
            // If APC is installed and Doctrine is present, then use APC caching
            if (class_exists('Doctrine\Common\Cache\ApcCache') && extension_loaded('apc')) {
                self::$defaultEndpointProvider = new CachingEndpointProvider(
                    self::$defaultEndpointProvider,
                    new DoctrineCacheAdapter(new \Doctrine\Common\Cache\ApcCache())
                );
            }
        }
        // @codeCoverageIgnoreEnd

        return self::$defaultEndpointProvider;
    }
}
