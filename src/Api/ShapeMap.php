<?php

namespace Aws\Api;

/**
 * Builds shape based on shape references.
 */
class ShapeMap
{
    /** @var array */
    private $definitions;

    /**
     * @param array $shapeModels Associative array of shape definitions.
     */
    public function __construct(array $shapeModels)
    {
        $this->definitions = $shapeModels;
    }

    /**
     * Get an array of shape names.
     *
     * @return array
     */
    public function getShapeNames()
    {
        return array_keys($this->definitions);
    }

    /**
     * Resolve a shape reference
     *
     * @param array $shapeRef Shape reference shape
     *
     * @return Shape
     * @throws \InvalidArgumentException
     */
    public function resolve(array $shapeRef)
    {
        $shape = $shapeRef['shape'];

        if (!isset($this->definitions[$shape])) {
            throw new \InvalidArgumentException('Shape not found: ' . $shape);
        }

        $definition = $this->definitions[$shape];

        if ($shapeRef) {
            $definition = $shapeRef + $definition;
            if (isset($shapeRef['metadata'])) {
                if (!isset($this->definitions[$shape]['metadata'])) {
                    $definition['metadata'] = $shapeRef['metadata'];
                } else {
                    $definition['metadata'] = $shapeRef['metadata']
                        + $this->definitions[$shape]['metadata'];
                }
            }
        }

        unset($definition['shape']);

        return Shape::create($definition, $this);
    }
}
