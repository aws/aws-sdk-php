<?php

namespace Aws\Api;

/**
 * Represents an API operation.
 */
class Operation extends AbstractModel
{
    private $input;
    private $output;
    private $errors;

    public function __construct(array $definition, ShapeMap $shapeMap)
    {
        if (!isset($definition['http']['method'])) {
            $definition['http']['method'] = 'POST';
        }

        if (!isset($definition['http']['requestUri'])) {
            $definition['http']['requestUri'] = '/';
        }

        parent::__construct($definition, $shapeMap);
    }

    /**
     * @return StructureShape
     */
    public function getInput()
    {
        if (!$this->input) {
            if ($input = $this['input']) {
                $this->input = $this->shapeFor($input);
            } else {
                $this->input = new StructureShape([], $this->shapeMap);
            }
        }

        return $this->input;
    }

    /**
     * @return StructureShape
     */
    public function getOutput()
    {
        if (!$this->output) {
            if ($output = $this['output']) {
                $this->output = $this->shapeFor($output);
            } else {
                $this->output = new StructureShape([], $this->shapeMap);
            }
        }

        return $this->output;
    }

    /**
     * @return Shape[]
     */
    public function getErrors()
    {
        if ($this->errors === null) {
            if ($errors = $this['errors']) {
                foreach ($errors as &$error) {
                    $error = $this->shapeFor($error);
                }
                $this->errors = $errors;
            } else {
                $this->errors = [];
            }
        }

        return $this->errors;
    }
}
