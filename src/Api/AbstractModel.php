<?php

namespace Aws\Api;

use GuzzleHttp\ToArrayInterface;

/**
 * Base class that is used by most API shapes
 */
abstract class AbstractModel implements ToArrayInterface, \ArrayAccess
{
    /** @var array */
    protected $definition;

    /** @var ShapeMap */
    protected $shapeMap;

    /**
     * @param array    $definition Service description
     * @param ShapeMap $shapeMap   Shapemap used for creating shapes
     */
    public function __construct(array $definition, ShapeMap $shapeMap)
    {
        if (!isset($definition['metadata'])) {
            $definition['metadata'] = [];
        }

        $this->definition = $definition;
        $this->shapeMap = $shapeMap;
    }

    public function toArray()
    {
        return $this->definition;
    }

    public function getMetadata($key = null)
    {
        if (!$key) {
            return $this['metadata'];
        } elseif (isset($this->definition['metadata'][$key])) {
            return $this->definition['metadata'][$key];
        }

        return null;
    }

    public function offsetGet($offset)
    {
        return isset($this->definition[$offset])
            ? $this->definition[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        $this->definition[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->definition[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->definition[$offset]);
    }

    protected function shapeAt($key)
    {
        if (!isset($this->definition[$key])) {
            throw new \InvalidArgumentException('Expected shape definition at '
                . $key);
        }

        return $this->shapeFor($this->definition[$key]);
    }

    protected function shapeFor(array $definition)
    {
        return isset($definition['shape'])
            ? $this->shapeMap->resolve($definition)
            : Shape::create($definition, $this->shapeMap);
    }
}
