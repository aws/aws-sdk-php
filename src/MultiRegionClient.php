<?php
namespace Aws;

class MultiRegionClient implements AwsClientInterface
{
    use AwsClientTrait;

    /** @var string */
    private $namespace;
    /** @var Session */
    private $session;
    /** @var AwsClientInterface[] A pool of clients keyed by region. */
    private $clientPool = [];
    /** @var callable */
    private $factory;

    /**
     * MultiRegionClient constructor.
     * @param string|callable $clientFactory
     * @param array $args
     */
    public function __construct($clientFactory, array $args = [])
    {
        if (is_callable($clientFactory)) {
            $this->factory = $clientFactory;
        } elseif (class_exists($clientFactory)) {
            $this->factory = $this->getDefaultFactory($clientFactory);
        } else {
            $this->namespace = manifest($clientFactory)['namespace'];
            $this->factory = $this->getDefaultFactory(
                "Aws\\{$this->namespace}\\{$this->namespace}Client"
            );
        }

        $this->session = new Session($args);
    }

    private function getDefaultFactory($className) {
        return static function (array $args) use ($className) {
            return new $className($args);
        };
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
            $args = $this->session->getArgs($this->namespace);
            $this->clientPool[$region]
                = call_user_func($this->factory, ['region' => $region] + $args);
        }

        return $this->clientPool[$region];
    }

    private function isStringable($var)
    {
        return is_string($var)
            || (is_object($var) && method_exists($var, '__toString'));
    }

    public function getRegion()
    {
        $defaultArgs = $this->session->getArgs($this->namespace);
        return isset($defaultArgs['region'])
            ? $defaultArgs['region']
            : null;
    }

    public function getCommand($name, array $args = [])
    {
        list($region, $args) = $this->getRegionFromArgs($args);

        return $this->getClientFromPool($region)->getCommand($name, $args);
    }

    protected function getRegionFromArgs(array $args)
    {
        $region = isset($args['@region'])
            ? $args['@region']
            : $this->getRegion();
        unset($args['@region']);

        return [$region, $args];
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
}
