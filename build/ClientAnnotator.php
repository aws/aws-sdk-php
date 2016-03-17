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

    /**
     * Adds @method annotations to a client class.
     *
     * @return bool TRUE on success, FALSE on failure
     */
    public function updateApiMethodAnnotations()
    {
        $updater = new ClassAnnotationUpdater(
            $this->reflection,
            $this->getMethodAnnotations(),
            $this->getDefaultDocComment(),
            '/^\* @method (\\\\Aws\\\\Result|\\\\GuzzleHttp\\\\Promise\\\\Promise) /'
        );

        return $updater->update();
    }

    private function getMethodAnnotations()
    {
        $annotations = [];

        foreach ($this->getMethods() as $command => $apiVersions) {
            $commandMethods = [
                $command => '\\Aws\\Result',
                "{$command}Async" => '\\GuzzleHttp\\Promise\\Promise',
            ];
            foreach ($commandMethods as $method => $returnType) {
                $annotations []= $this->getAnnotationLine(
                    $method,
                    $returnType,
                    $apiVersions
                );
            }
        }

        return $annotations;
    }

    private function getAnnotationLine($method, $return, array $versionsWithSupport)
    {
        $signature = lcfirst($method) . '(array $args = [])';
        $annotation = " * @method $return $signature";

        if ($versionsWithSupport !== $this->getVersions()) {
            $supportedIn = implode(', ', $versionsWithSupport);
            $annotation .= " (supported in versions $supportedIn)";
        }

        return $annotation;
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
                preg_replace('/(MultiRegion)?Client$/', '', $this->reflection->getShortName())
            );

            $this->endpoint = Aws\manifest($service)['endpoint'];
        }

        return $this->endpoint;
    }

    private function getDefaultDocComment()
    {
        $serviceName = $this->getApiDefinition()['metadata']['serviceFullName'];
        switch ($this->reflection->getParentClass()->getShortName()) {
            case 'MultiRegionClient':
                return <<<EODC
/**
 * **{$serviceName}** multi-region client.
 *
 */
EODC;
            default:
                return <<<EODC
/**
 * **{$serviceName}** client.
 *
 */
EODC;
        }
    }
}
