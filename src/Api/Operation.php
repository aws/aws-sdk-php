<?php

namespace Aws\Api;

/**
 * Represents an API operation.
 */
class Operation extends AbstractModel
{
    public function __construct(array $definition, ShapeMap $shapeMap)
    {
        if (!isset($definition['http']['method'])) {
            $definition['http']['method'] = 'POST';
        }

        if (!isset($definition['http']['requestUri'])) {
            $definition['http']['requestUri'] = '/';
        }

        parent::__construct($definition, $shapeMap);

        if ($input = $this['input']) {
            $this['input'] = $this->shapeFor($input);
        }

        if ($output = $this['output']) {
            $this['output'] = $this->shapeFor($output);
        }

        if ($errors = $this['errors']) {
            foreach ($errors as &$error) {
                $error = $this->shapeFor($error);
            }
            $this['errors'] = $errors;
        } else {
            $this['errors'] = [];
        }
    }
}
