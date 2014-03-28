<?php

namespace Aws\Api;

/**
 * Represents a web service API model.
 */
class Service extends AbstractModel
{
    /** @var Operation[] */
    private $operations = [];

    /**
     * @param array $definition Service description
     * @param array $options    Hash of options
     */
    public function __construct(array $definition, array $options = [])
    {
        if (!isset($definition['operations'])) {
            $definition['operations'] = [];
        }

        if (!isset($definition['shapes'])) {
            $definition['shapes'] = [];
        }

        if (!isset($options['shape_map'])) {
            $options['shape_map'] = new ShapeMap($definition['shapes']);
        }

        $this->operationNames = array_keys($definition['operations']);
        parent::__construct($definition, $options['shape_map']);
    }

    /**
     * Check if the description has a specific operation by name.
     *
     * @param string $name Operation to check by name
     *
     * @return bool
     */
    public function hasOperation($name)
    {
        return isset($this['operations'][$name]);
    }

    /**
     * Get an operation by name.
     *
     * @param string $name Operation to retrieve by name
     *
     * @return Operation
     * @throws \InvalidArgumentException If the operation is not found
     */
    public function getOperation($name)
    {
        if (!isset($this->operations[$name])) {
            if (!isset($this->definition['operations'][$name])) {
                throw new \InvalidArgumentException('Unknown operation: '
                    . $name);
            }

            $this->operations[$name] = new Operation(
                $this->definition['operations'][$name],
                $this->shapeMap
            );
        }

        return $this->operations[$name];
    }

    /**
     * Get all of the operations of the description.
     *
     * @return Operation[]
     */
    public function getOperations()
    {
        $result = [];
        foreach ($this->definition['operations'] as $name => $definition) {
            $result[$name] = $this->getOperation($name);
        }

        return $result;
    }
}
