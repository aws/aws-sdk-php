<?php

use Aws\Api\ApiProvider;

class ClientAnnotator
{
    /** @var ReflectionClass */
    private $reflection;
    /** @var string */
    private $endpoint;
    /** @var string[] */
    private $versions;
    /** @var array */
    private $methods;


    public function __construct($clientClassName)
    {
        $this->reflection = new ReflectionClass($clientClassName);
    }

    public function updateApiMethodAnnotations()
    {
        return (new ClassAnnotationUpdater(
            $this->reflection,
            $this->getMethodAnnotations(),
            $this->getDefaultDocComment(),
            '/^\* @method \\\\Aws\\\\Result /'
        ))
            ->update();
    }

    private function getMethodAnnotations()
    {
        $annotations = [];

        foreach ($this->getMethods() as $method => $apiVersions) {
            $signature = lcfirst($method) . '(array $args = [])';
            $annotation = " * @method \\Aws\\Result $signature";

            if ($apiVersions !== $this->getVersions()) {
                $supportedIn = implode(', ', $apiVersions);
                $annotation .= " (supported in versions $supportedIn)";
            }

            $annotations []= $annotation;
        }

        return $annotations;
    }

    private function getMethods()
    {
        if (empty($this->methods)) {
            $this->methods = [];

            foreach ($this->getVersions() as $version) {
                $methodsInVersion = array_keys(
                    $this->getApiDefinition($version)['operations']
                );
                foreach ($methodsInVersion as $method) {
                    if (empty($this->methods[$method])) {
                        $this->methods[$method] = [];
                    }

                    $this->methods[$method] []= $version;
                }
            }
        }

        return $this->methods;
    }

    private function getVersions()
    {
        if (empty($this->versions)) {
            $this->versions = ApiProvider::defaultProvider()
                ->getVersions($this->getEndpoint());

            // ensure that versions are always iterated from oldest to newest
            sort($this->versions);
        }

        return $this->versions;
    }

    private function getApiDefinition($version = 'latest')
    {
        $provider = ApiProvider::defaultProvider();
        return $provider('api', $this->getEndpoint(), $version);
    }

    private function getEndpoint()
    {
        if (empty($this->endpoint)) {
            $service = strtolower(
                preg_replace('/Client$/', '', $this->reflection->getShortName())
            );

            $this->endpoint = Aws\manifest($service)['endpoint'];
        }

        return $this->endpoint;
    }

    private function getDefaultDocComment()
    {
        return <<<EODC
/**
 * **{$this->getApiDefinition()['metadata']['serviceFullName']}** client.
 */
EODC;
    }
}
