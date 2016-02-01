<?php
namespace Aws;

trait MultiRegionTrait
{
    /** @var AwsClientInterface[] A pool of clients keyed by region. */
    private $clientPool = [];

    /**
     * @param string $region
     * @return AwsClientInterface
     */
    private function getClientFromPool($region)
    {
        if (empty($this->clientPool[$region])) {
            $clientClass = $this->getClientClass();
            $args = $this->getSession()->getArgs($this->getClientNamespace());
            $this->clientPool[$region]
                = new $clientClass(['region' => $region] + $args);
        }

        return $this->clientPool[$region];
    }

    /**
     * Returns the name of the client class to instantiate in getClientFromPool.
     *
     * @return string
     */
    protected function getClientClass()
    {
        $ns = $this->getClientNamespace();
        return "Aws\\{$ns}\\{$ns}Client";
    }

    /**
     * @return Session
     */
    abstract protected function getSession();

    /**
     * @return string|null
     */
    protected function getClientNamespace()
    {
        return null;
    }

    public function getRegion()
    {
        $defaultArgs = $this->getSession()->getArgs($this->getClientNamespace());
        return isset($defaultArgs['region'])
            ? $defaultArgs['region']
            : null;
    }

    public function getCommand($name, array $args = [])
    {
        $region = isset($args['@region'])
            ? $args['@region']
            : $this->getRegion();
        unset($args['@region']);

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

    public function executeAsync(CommandInterface $command)
    {
        return $this->getClientFromPool($this->getRegion())
            ->executeAsync($command);
    }
}
