<?php
namespace Aws\Api;

use Aws\Api\Serializer\QuerySerializer;
use Aws\Api\Serializer\Ec2ParamBuilder;
use Aws\Api\Parser\QueryParser;

/**
 * Represents a web service API model.
 */
class Service extends AbstractModel
{
    /** @var callable */
    private $apiProvider;

    /** @var string */
    private $serviceName;

    /** @var string */
    private $apiVersion;

    /** @var Operation[] */
    private $operations = [];

    /** @var array|null */
    private $paginators = null;

    /** @var array|null */
    private $waiters = null;

    /**
     * @param callable $apiProvider
     * @param string   $serviceName
     * @param string   $apiVersion
     * @param array    $options     Hash of options
     *
     * @internal param array $definition Service description
     */
    public function __construct(
        callable $apiProvider,
        $serviceName,
        $apiVersion,
        array $options = []
    ) {
        $definition = $apiProvider('api', $serviceName, $apiVersion);
        $this->apiProvider = $apiProvider;
        $this->serviceName = $serviceName;
        $this->apiVersion = $apiVersion;

        if (!isset($definition['operations'])) {
            $definition['operations'] = [];
        }

        if (!isset($definition['shapes'])) {
            $definition['shapes'] = [];
        }

        if (!isset($options['shape_map'])) {
            $options['shape_map'] = new ShapeMap($definition['shapes']);
        }

        parent::__construct($definition, $options['shape_map']);
    }

    /**
     * Creates a request serializer for the provided API object.
     *
     * @param Service $api      API that contains a protocol.
     * @param string  $endpoint Endpoint to send requests to.
     *
     * @return callable
     * @throws \UnexpectedValueException
     */
    public static function createSerializer(Service $api, $endpoint)
    {
        static $mapping = [
            'json'      => 'Aws\Api\Serializer\JsonRpcSerializer',
            'query'     => 'Aws\Api\Serializer\QuerySerializer',
            'rest-json' => 'Aws\Api\Serializer\RestJsonSerializer',
            'rest-xml'  => 'Aws\Api\Serializer\RestXmlSerializer'
        ];

        $proto = $api->getProtocol();

        if (isset($mapping[$proto])) {
            return new $mapping[$proto]($api, $endpoint);
        } elseif ($proto == 'ec2') {
            return new QuerySerializer($api, $endpoint, new Ec2ParamBuilder());
        } else {
            throw new \UnexpectedValueException(
                'Unknown protocol: ' . $api->getProtocol()
            );
        }
    }

    /**
     * Creates an error parser for the given protocol.
     *
     * @param string $protocol Protocol to parse (e.g., query, json, etc.)
     *
     * @return callable
     * @throws \UnexpectedValueException
     */
    public static function createErrorParser($protocol)
    {
        static $mapping = [
            'json'      => 'Aws\Api\ErrorParser\JsonRpcErrorParser',
            'query'     => 'Aws\Api\ErrorParser\XmlErrorParser',
            'rest-json' => 'Aws\Api\ErrorParser\RestJsonErrorParser',
            'rest-xml'  => 'Aws\Api\ErrorParser\XmlErrorParser',
            'ec2'       => 'Aws\Api\ErrorParser\XmlErrorParser'
        ];

        if (!isset($mapping[$protocol])) {
            throw new \UnexpectedValueException("Unknown protocol: $protocol");
        }

        return new $mapping[$protocol]();
    }

    /**
     * Applies the listeners needed to parse client models.
     *
     * @param Service $api API to create a parser for
     * @return callable
     * @throws \UnexpectedValueException
     */
    public static function createParser(Service $api)
    {
        static $mapping = [
            'json'      => 'Aws\Api\Parser\JsonRpcParser',
            'query'     => 'Aws\Api\Parser\QueryParser',
            'rest-json' => 'Aws\Api\Parser\RestJsonParser',
            'rest-xml'  => 'Aws\Api\Parser\RestXmlParser'
        ];

        $proto = $api->getProtocol();
        if (isset($mapping[$proto])) {
            return new $mapping[$proto]($api);
        } elseif ($proto == 'ec2') {
            return new QueryParser($api, null, false);
        } else {
            throw new \UnexpectedValueException(
                'Unknown protocol: ' . $api->getProtocol()
            );
        }
    }

    /**
     * Get the full name of the service
     *
     * @return string
     */
    public function getServiceFullName()
    {
        return $this->getMetadata('serviceFullName');
    }

    /**
     * Get the API version of the service
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->getMetadata('apiVersion');
    }

    /**
     * Get the API version of the service
     *
     * @return string
     */
    public function getEndpointPrefix()
    {
        return $this->getMetadata('endpointPrefix');
    }

    /**
     * Get the signing name used by the service.
     *
     * @return string
     */
    public function getSigningName()
    {
        return $this->getMetadata('signingName')
            ?: $this->getMetadata('endpointPrefix');
    }

    /**
     * Get the protocol used by the service.
     *
     * @return string
     */
    public function getProtocol()
    {
        return $this->getMetadata('protocol');
    }

    /**
     * Check if the description has a specific operation by name.
     *
     * @param string $name Operation to check by name
     *
     * @return bool
     */
    public function hasOperation($name)
    {
        return isset($this['operations'][$name]);
    }

    /**
     * Get an operation by name.
     *
     * @param string $name Operation to retrieve by name
     *
     * @return Operation
     * @throws \InvalidArgumentException If the operation is not found
     */
    public function getOperation($name)
    {
        if (!isset($this->operations[$name])) {
            if (!isset($this->definition['operations'][$name])) {
                throw new \InvalidArgumentException('Unknown operation: '
                    . $name);
            }

            $this->operations[$name] = new Operation(
                $this->definition['operations'][$name],
                $this->shapeMap
            );
        }

        return $this->operations[$name];
    }

    /**
     * Get all of the operations of the description.
     *
     * @return Operation[]
     */
    public function getOperations()
    {
        $result = [];
        foreach ($this->definition['operations'] as $name => $definition) {
            $result[$name] = $this->getOperation($name);
        }

        return $result;
    }

    /**
     * Get all of the service metadata or a specific metadata key value.
     *
     * @param string|null $key Key to retrieve or null to retrieve all metadata
     *
     * @return mixed Returns the result or null if the key is not found
     */
    public function getMetadata($key = null)
    {
        if (!$key) {
            if (!isset($this->definition['metadata'])) {
                $this->definition['metadata'] = [];
            }
            return $this['metadata'];
        }

        if (isset($this->definition['metadata'][$key])) {
            return $this->definition['metadata'][$key];
        }

        return null;
    }

    /**
     * Determines if the service has a paginator by name.
     *
     * @param string $name Name of the paginator.
     *
     * @return bool
     */
    public function hasPaginator($name)
    {
        if (!isset($this->paginators)) {
            $res = call_user_func(
                $this->apiProvider,
                'paginator',
                $this->serviceName,
                $this->apiVersion
            );
            $this->paginators = isset($res['pagination']) ? $res['pagination'] : [];
        }

        return isset($this->paginators[$name]);
    }

    /**
     * Retrieve a paginator by name.
     *
     * @param string $name Paginator to retrieve by name. This argument is
     *                     typically the operation name.
     * @return array
     * @throws \UnexpectedValueException if the paginator does not exist.
     */
    public function getPaginatorConfig($name)
    {
        static $defaults = [
            'input_token'  => null,
            'output_token' => null,
            'limit_key'    => null,
            'result_key'   => null,
            'more_results' => null,
        ];

        if (!$this->hasPaginator($name)) {
            throw new \UnexpectedValueException("There is no {$name} "
                . "paginator defined for the {$this->serviceName} service.");
        }

        return $this->paginators[$name] + $defaults;
    }

    /**
     * Determines if the service has a waiter by name.
     *
     * @param string $name Name of the waiter.
     *
     * @return bool
     */
    public function hasWaiter($name)
    {
        if (!isset($this->waiters)) {
            $res = call_user_func(
                $this->apiProvider,
                'waiter',
                $this->serviceName,
                $this->apiVersion
            );
            $this->waiters = isset($res['waiters']) ? $res['waiters'] : [];
        }

        return isset($this->waiters[$name]);
    }

    /**
     * Get a waiter configuration by name.
     *
     * @param string $name Name of the waiter by name.
     *
     * @return array
     * @throws \UnexpectedValueException if the waiter does not exist.
     */
    public function getWaiterConfig($name)
    {
        // Error if the waiter is not defined
        if (!$this->hasWaiter($name)) {
            throw new \UnexpectedValueException("There is no {$name} waiter "
                . "defined for the {$this->serviceName} service.");
        }

        // Resolve the configuration for the named waiter
        if (!isset($this->waiters[$name]['waiter_name'])) {
            $this->resolveWaiterConfig($name);
        }

        return $this->waiters[$name];
    }

    private function resolveWaiterConfig($name)
    {
        static $defaults = [
            'operation'     => null,
            'ignore_errors' => [],
            'description'   => null,
            'success_type'  => null,
            'success_path'  => null,
            'success_value' => null,
            'failure_type'  => null,
            'failure_path'  => null,
            'failure_value' => null,
        ];

        $config = $this->waiters[$name];

        // Resolve extensions and defaults
        if (isset($config['extends'])) {
            $config += $this->waiters[$config['extends']];
        }
        if (isset($this->waiters['__default__'])) {
            $config += $this->waiters['__default__'];
        }
        $config += $defaults;

        // Merge acceptor settings into success/failure settings
        foreach ($config as $cfgKey => $cfgVal) {
            if (substr($cfgKey, 0, 9) == 'acceptor_') {
                $option = substr($cfgKey, 9);
                if (!isset($config["success_{$option}"])) {
                    $config["success_{$option}"] = $cfgVal;
                }
                if (!isset($config["failure_{$option}"])) {
                    $config["failure_{$option}"] = $cfgVal;
                }
                unset($config[$cfgKey]);
            }
        }

        // Add the waiter name and remove description
        $config['waiter_name'] = $name;
        unset($config['description']);

        $this->waiters[$name] = $config;
    }
}
