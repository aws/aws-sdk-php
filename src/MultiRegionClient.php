<?php
namespace Aws;

class MultiRegionClient implements AwsClientInterface
{
    use MultiRegionTrait;
    /** @var string */
    private $namespace;
    /** @var Session */
    private $session;

    public function __construct($service, array $args = [])
    {
        $this->namespace = manifest($service)['namespace'];
        $this->session = new Session($args);
    }

    protected function getClientNamespace()
    {
        return $this->namespace;
    }

    protected function getSession()
    {
        return $this->session;
    }
}
