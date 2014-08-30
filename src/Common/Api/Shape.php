<?php
namespace Aws\Common\Api;

/**
 * Base class representing a modeled shape.
 */
class Shape extends AbstractModel
{
    /**
     * Get a concrete shape for the given definition.
     *
     * @param array    $definition
     * @param ShapeMap $shapeMap
     *
     * @return mixed
     * @throws \RuntimeException if the type is invalid
     */
    public static function create(array $definition, ShapeMap $shapeMap)
    {
        static $map = [
            'structure' => 'Aws\Common\Api\StructureShape',
            'map'       => 'Aws\Common\Api\MapShape',
            'list'      => 'Aws\Common\Api\ListShape',
            'timestamp' => 'Aws\Common\Api\TimestampShape',
            'integer'   => 'Aws\Common\Api\Shape',
            'double'    => 'Aws\Common\Api\Shape',
            'float'     => 'Aws\Common\Api\Shape',
            'long'      => 'Aws\Common\Api\Shape',
            'string'    => 'Aws\Common\Api\Shape',
            'byte'      => 'Aws\Common\Api\Shape',
            'character' => 'Aws\Common\Api\Shape',
            'blob'      => 'Aws\Common\Api\Shape',
            'boolean'   => 'Aws\Common\Api\Shape'
        ];

        if (isset($definition['shape'])) {
            return $shapeMap->resolve($definition);
        }

        if (!isset($map[$definition['type']])) {
            throw new \RuntimeException('Invalid type');
        }

        $type = $map[$definition['type']];

        return new $type($definition, $shapeMap);
    }

    /**
     * Get the type of the shape
     *
     * @return string
     */
    public function getType()
    {
        return $this->definition['type'];
    }

    /**
     * Get the name of the shape
     *
     * @return string
     */
    public function getName()
    {
        return $this->definition['name'];
    }
}
