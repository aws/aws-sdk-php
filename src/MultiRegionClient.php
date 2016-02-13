<?php
namespace Aws;

class MultiRegionClient implements AwsClientInterface
{
    use AwsClientTrait;

    /** @var Session */
    private $session;
    /** @var AwsClientInterface[] A pool of clients keyed by region. */
    private $clientPool = [];
    /** @var callable */
    private $factory;

    public static function getArguments()
    {
        $args = array_intersect_key(
            ClientResolver::getDefaultArguments(),
            ['service' => true, 'region' => true]
        );
        $args['service']['fn'] = function ($value, &$args) {
            $ns = manifest($value)['namespace'];
            if (!isset($args['namespace'])) {
                $args['namespace'] = $ns;
            }
            if (!isset($args['client_factory'])) {
                $klass = "Aws\\$ns\\{$ns}Client";
                $args['client_factory'] = function (array $args) use ($klass) {
                    return new $klass($args);
                };
            }
        };

        return $args + [
            'client_factory' => [
                'type' => 'value',
                'valid' => ['callable'],
                'doc' => 'A callable that takes an array of client'
                    . ' configuration arguments and returns a regionalized'
                    . ' client.',
                'required' => true,
                'internal' => true,
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
        $defaultArgs = $this->session->getArgs();
        return isset($defaultArgs['region'])
            ? $defaultArgs['region']
            : null;
    }

    public function getCommand($name, array $args = [])
    {
        list($region, $args) = $this->getRegionFromArgs($args);

        return $this->getClientFromPool($region)->getCommand($name, $args);
    }

    public function getConfig($option = null)
    {
        return $this->getClientFromPool($this->getRegion())
            ->getConfig($option);
    }

    public function getCredentials()
    {
        return $this->getClientFromPool($this->getRegion())
            ->getCredentials();
    }

    public function getHandlerList()
    {
        return $this->getClientFromPool($this->getRegion())
            ->getHandlerList();
    }

    public function getApi()
    {
        return $this->getClientFromPool($this->getRegion())
            ->getApi();
    }

    public function getEndpoint()
    {
        return $this->getClientFromPool($this->getRegion())
            ->getEndpoint();
    }

    protected function handleResolvedArgs(array $args)
    {
        $this->factory = $args['client_factory'];
        unset($args['client_factory']);

        $this->session = new Session($args);
    }

    /**
     * @param string $region
     *
     * @return AwsClientInterface
     */
    protected function getClientFromPool($region)
    {
        if (empty($region) || !$this->isStringable($region)) {
            throw new \InvalidArgumentException();
        }

        if (empty($this->clientPool[$region])) {
            $args = $this->session->getArgs();
            $this->clientPool[$region]
                = call_user_func($this->factory, ['region' => $region] + $args);
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

    private function isStringable($var)
    {
        return is_string($var)
        || (is_object($var) && method_exists($var, '__toString'));
    }
}
