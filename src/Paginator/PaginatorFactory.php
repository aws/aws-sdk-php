<?php
namespace Aws\Paginator;

use Aws\Api\ApiProviderInterface;
use Aws\AwsClientInterface;

/**
 * @internal Factory used to create ResultPaginator and ResourceIterator objects
 */
class PaginatorFactory
{
    /** @var array */
    private static $paginators = [];

    /** @var array */
    private static $defaults = [
        'input_token'  => null,
        'output_token' => null,
        'limit_key'    => null,
        'result_key'   => null,
        'more_results' => null,
    ];

    /** @var ApiProviderInterface */
    private $apiProvider;

    /** @var string */
    private $serviceName;

    /** @var string */
    private $apiVersion;

    /**
     * @param ApiProviderInterface $apiProvider
     * @param string               $serviceName
     * @param string               $apiVersion
     */
    public function __construct(
        ApiProviderInterface $apiProvider,
        $serviceName,
        $apiVersion
    ) {
        $this->apiProvider = $apiProvider;
        $this->serviceName = $serviceName;
        $this->apiVersion = $apiVersion;
    }

    /**
     * @param AwsClientInterface $client
     * @param string $name
     * @param array $args
     * @param array $config
     *
     * @return ResultPaginator
     * @throws \UnexpectedValueException
     */
    public function createPaginator(
        AwsClientInterface $client,
        $name,
        array $args = [],
        array $config = []
    ) {
        $config += $this->getOperationConfig($name);

        if ($config['output_token'] && $config['input_token']) {
            return new ResultPaginator($client, $name, $args, $config);
        }

        throw new \UnexpectedValueException("Results for the {$name} operation "
            . "of the {$this->serviceName} service cannot be paginated.");
    }

    /**
     * @param AwsClientInterface $client
     * @param string $name
     * @param array $args
     * @param array $config
     *
     * @return ResourceIterator
     * @throws \UnexpectedValueException
     */
    public function createIterator(
        AwsClientInterface $client,
        $name,
        array $args = [],
        array $config = []
    ) {
        $config += $this->getOperationConfig($name);

        if ($config['result_key']) {
            return new ResourceIterator(
                new ResultPaginator($client, $name, $args, $config),
                $config
            );
        }

        throw new \UnexpectedValueException("There are no resources to iterate "
            . "for the {$name} operation of the {$this->serviceName} service.");
    }

    private function getOperationConfig($operationName)
    {
        $key = "{$this->serviceName}-{$this->apiVersion}";

        if (!isset(self::$paginators[$key])) {
            $paginators = $this->apiProvider->getServicePaginatorConfig(
                $this->serviceName,
                $this->apiVersion
            );
            self::$paginators[$key] = $paginators['pagination'];
        }

        $config = self::$defaults;
        if (isset(self::$paginators[$key][$operationName])) {
            $config = self::$paginators[$key][$operationName] + $config;
        }

        return $config;
    }
}
