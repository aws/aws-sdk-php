<?php
namespace Aws\Api;

/**
 * Represents a structure shape and resolve member shape references.
 */
class StructureShape extends Shape
{
    public function __construct(array $definition, ShapeMap $shapeMap)
    {
        $definition['type'] = 'structure';

        if (!isset($definition['members'])) {
            $definition['members'] = [];
        }

        parent::__construct($definition, $shapeMap);
    }

    /**
     * Gets a list of all members
     *
     * @return Shape[]
     */
    public function getMembers()
    {
        $result = [];
        foreach ($this->definition['members'] as $name => $definition) {
            $result[$name] = $this->shapeFor($definition);
        }

        return $result;
    }

    /**
     * Check if a specific member exists by name.
     *
     * @param string $name Name of the member to check
     *
     * @return bool
     */
    public function hasMember($name)
    {
        return isset($this->definition['members'][$name]);
    }

    /**
     * Retrieve a member by name.
     *
     * @param string $name Name of the member to retrieve
     *
     * @return Shape
     * @throws \InvalidArgumentException if the member is not found.
     */
    public function getMember($name)
    {
        if (!isset($this->definition['members'][$name])) {
            throw new \InvalidArgumentException('Unknown member ' . $name);
        }

        return $this->shapeFor($this->definition['members'][$name]);
    }
}
