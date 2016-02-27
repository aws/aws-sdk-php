<?php
namespace Aws;

class MultiRegionClient implements AwsClientInterface
{
    use AwsClientTrait;

    /** @var AwsClientInterface[] A pool of clients keyed by region. */
    private $clientPool = [];
    /** @var callable */
    private $factory;
    /** @var array */
    private $args;

    public static function getArguments()
    {
        $args = array_intersect_key(
            ClientResolver::getDefaultArguments(),
            ['service' => true, 'region' => true]
        );

        return $args + [
            'client_factory' => [
                'type' => 'value',
                'valid' => ['callable'],
                'doc' => 'A callable that takes an array of client'
                    . ' configuration arguments and returns a regionalized'
                    . ' client.',
                'required' => true,
                'internal' => true,
                'default' => function (array $args) {
                    $ns = manifest($args['service'])['namespace'];
                    $klass = "Aws\\$ns\\{$ns}Client";
                    $defaultRegion = $args['region'];
                    return function (array $args) use ($klass, $defaultRegion) {
                        if (empty($args['region'])) {
                            $args['region'] = $defaultRegion;
                        }

                        return new $klass($args);
                    };
                },
            ],
        ];
    }

    /**
     * MultiRegionClient constructor.
     *
     * @param array $args
     */
    public function __construct(array $args = [])
    {
        if (!isset($args['service'])) {
            $args['service'] = $this->parseClass();
        }

        $argDefinitions = static::getArguments();
        $resolver = new ClientResolver($argDefinitions);
        $args = $resolver->resolve($args, new HandlerList);
        $this->handleResolvedArgs($args);
    }

    public function getRegion()
    {
        return $this->getClientFromPool('')
            ->getRegion();
    }

    public function getCommand($name, array $args = [])
    {
        list($region, $args) = $this->getRegionFromArgs($args);

        return $this->getClientFromPool($region)->getCommand($name, $args);
    }

    public function getConfig($option = null)
    {
        return $this->getClientFromPool('')
            ->getConfig($option);
    }

    public function getCredentials()
    {
        return $this->getClientFromPool('')
            ->getCredentials();
    }

    public function getHandlerList()
    {
        return $this->getClientFromPool('')
            ->getHandlerList();
    }

    public function getApi()
    {
        return $this->getClientFromPool('')
            ->getApi();
    }

    public function getEndpoint()
    {
        return $this->getClientFromPool('')
            ->getEndpoint();
    }

    protected function handleResolvedArgs(array $args)
    {
        $this->factory = $args['client_factory'];
        unset($args['client_factory']);

        $this->args = $args;
    }

    /**
     * @param string $region
     *
     * @return AwsClientInterface
     */
    protected function getClientFromPool($region)
    {
        if (empty($this->clientPool[$region])) {
            $factory = $this->factory;
            $this->clientPool[$region] = $factory(
                array_replace($this->args, array_filter(['region' => $region]))
            );
        }

        return $this->clientPool[$region];
    }

    /**
     * Parse the class name and return the "service" name of the client.
     *
     * @return string
     */
    private function parseClass()
    {
        $klass = get_class($this);

        if ($klass === __CLASS__) {
            return '';
        }

        return strtolower(substr($klass, strrpos($klass, '\\') + 1, -17));
    }

    private function getRegionFromArgs(array $args)
    {
        $region = isset($args['@region'])
            ? $args['@region']
            : $this->getRegion();
        unset($args['@region']);

        return [$region, $args];
    }
}
