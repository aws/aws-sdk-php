<?php

class ServiceBuilder
{
    private $namespace;
    private $model;
    private $clientPath;
    private $exceptionPath;

    public function __construct(
        $namespace,
        array $model,
        $clientPath,
        $exceptionPath
    ) {
        $this->namespace = $namespace;
        $this->model = $model;
        $this->clientPath = $clientPath;
        $this->exceptionPath = $exceptionPath;
    }

    public function buildClient()
    {
        return $this->buildFileIfMissing('Client');
    }

    public function buildException()
    {
        return $this->buildFileIfMissing('Exception');
    }

    private function buildFileIfMissing($fileType)
    {
        $property = lcfirst($fileType) . 'Path';
        $method = 'generateDefault' . $fileType;
        if (!file_exists($this->{$property})) {
            if (!is_dir(dirname($this->{$property}))) {
                mkdir(dirname($this->{$property}), 0755, true);
            }

            file_put_contents($this->{$property}, $this->{$method}(), LOCK_EX);
        }

        return $this;
    }

    private function getFullName()
    {
        return $this->model['metadata']['serviceFullName'];
    }

    private function generateDefaultClient()
    {
        return <<<EOPHP
<?php
namespace Aws\\{$this->namespace};

use Aws\\AwsClient;

/**
 * This client is used to interact with the **{$this->getFullName()}** service.
 */
class {$this->namespace}Client extends AwsClient {}

EOPHP;
    }

    private function generateDefaultException()
    {
        return <<<EOPHP
<?php
namespace Aws\\{$this->namespace}\\Exception;

use Aws\\Exception\\AwsException;

/**
 * Represents an error interacting with the **{$this->getFullName()}** service.
 */
class {$this->namespace}Exception extends AwsException {}

EOPHP;
    }
}
