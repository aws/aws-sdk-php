<?php

use Aws\Api\ApiProvider;

class ClientAnnotator
{
    use PhpFileLinterTrait;

    /** @var ReflectionClass */
    private $reflection;

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
        static $methods;

        if (empty($methods)) {
            $methods = [];
            $provider = ApiProvider::defaultProvider();

            foreach ($this->getVersions() as $version) {
                $methodsInVersion = array_keys(
                    $provider('api', $this->getEndpoint(), $version)['operations']
                );
                foreach ($methodsInVersion as $method) {
                    if (empty($methods[$method])) {
                        $methods[$method] = [];
                    }

                    $methods[$method] []= $version;
                }
            }
        }

        return $methods;
    }

    private function getVersions()
    {
        static $versions;

        if (empty($versions)) {
            $versions = ApiProvider::defaultProvider()
                ->getVersions($this->getEndpoint());

            // ensure that versions are always iterated from oldest to newest
            sort($versions);
        }

        return $versions;
    }

    private function getApiDefinition()
    {
        static $api;

        if (empty($api)) {
            $provider = ApiProvider::defaultProvider();
            $api = $provider('api', $this->getEndpoint(), 'latest');
        }

        return $api;
    }

    private function getEndpoint()
    {
        static $endpoint;

        if (empty($endpoint)) {
            $service = strtolower(
                preg_replace('/Client$/', '', $this->reflection->getShortName())
            );

            $endpoint = Aws\manifest($service)['endpoint'];
        }

        return $endpoint;
    }

    private function getDefaultDocComment()
    {
        return <<<EODC
/**
 * This client is used to interact with the **{$this->getApiDefinition()['metadata']['serviceFullName']}** service.
 */
EODC;
    }
}
