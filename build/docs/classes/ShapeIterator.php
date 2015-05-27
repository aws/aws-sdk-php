<?php
namespace Aws\Build\Docs;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Shape;
use Aws\Api\StructureShape;
use Aws\Api\DocModel;

/**
 * @internal
 */
class ShapeIterator implements \Iterator
{
    private static $keys = ['name', 'param', 'type', 'docs', 'recursive',
        'required', 'min', 'max', 'enum', 'pattern', 'complex'];

    private static $types = [
        'structure' => 'structure',
        'map'       => 'map',
        'list'      => 'list',
        'integer'   => 'integer',
        'long'      => 'integer',
        'string'    => 'string',
        'character' => 'string',
        'byte'      => 'string',
        'blob'      => 'stream',
        'double'    => 'float',
        'float'     => 'float',
        'boolean'   => 'boolean',
        'timestamp' => 'timestamp',
    ];

    /** @var DocModel */
    private $docs;

    /** @var array */
    private $shapes;

    /** @var int */
    private $index;

    public function __construct(StructureShape $root, DocModel $docs)
    {
        $this->docs = $docs;
        $this->shapes = [];
        $this->index = 0;
        $this->walkStructure($root, [], []);
        $this->rewind();
    }

    public function current()
    {
        return $this->shapes[$this->index];
    }

    public function next()
    {
        $this->index++;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->shapes[$this->index]);
    }

    public function rewind()
    {
        $this->index = 0;
    }

    private function walkComplexMember(Shape $shape, array $visited, array $path)
    {
        // Store the path associated with this shape to aid in recursion detection.
        $visited[$shape->getName()] = $path;

        // Delegate traversal to the proper method
        if ($shape instanceof StructureShape) {
            $this->walkStructure($shape, $visited, $path);
        } elseif ($shape instanceof MapShape) {
            $this->walkMap($shape, $visited, $path);
        } elseif ($shape instanceof ListShape) {
            $this->walkList($shape, $visited, $path);
        } else {
            throw new \UnexpectedValueException('Expected a complex shape.');
        }

        // Remove the shape from visited collection. This is also to aid in recursion detection.
        unset($visited[$shape->getName()]);

        // Add a "closer shape" that will be yielded by the iterator. These
        // shapes indicate the closure of a complex shape, and make it easier
        // to code the visual representation of the shape tree.
        $this->shapes[$this->index++] = ['name' => 'closer', 'type' => $shape->getType()];
    }

    private function walkStructure(StructureShape $shape, array $visited, array $path)
    {
        $shapeMembers = $shape->getMembers();
        ksort($shapeMembers);
        foreach ($shapeMembers as $ref => $member) {
            // Create the shape data from the Shape object.
            $data = $this->createShapeData($member);
            $path[] = $data['param'] = "'{$ref}'";
            $data['docs'] = $this->docs->getShapeDocs($member->getName(), $shape->getName(), $ref);
            $data['recursive'] = $this->getRecursionPath($member, $visited);
            $data['path'] = $path;

            // For structures, we have to see if the member is required.
            if (isset($shape['required']) && in_array($ref, $shape['required'])) {
                $data['required'] = true;
            }

            // Save the shape data.
            $this->shapes[$this->index++] = $data;

            // If the member is complex and not recursive, traverse it too.
            if ($data['complex'] && !$data['recursive']) {
                $this->walkComplexMember($member, $visited, $path);
            }
        }
    }

    private function walkMap(MapShape $shape, array $visited, array $path)
    {
        $key = $shape->getKey();
        $value = $shape->getValue();

        // Create the shape data from the Shape object.
        $data = $this->createShapeData($value);
        $path[] = $data['param'] = "'<{$key['name']}>'";
        $data['docs'] = $this->docs->getShapeDocs($value->getName(), $shape->getName(), 'value');
        $data['recursive'] = $this->getRecursionPath($value, $visited);
        $data['path'] = $path;

        // Save the shape data.
        $this->shapes[$this->index++] = $data;

        // If the value is complex and not recursive, traverse it too.
        if ($data['complex'] && !$data['recursive']) {
            $this->walkComplexMember($value, $visited, $path);
        }
    }

    private function walkList(ListShape $shape, array $visited, array $path)
    {
        $member = $shape->getMember();

        // Create the shape data from the Shape object.
        $data = $this->createShapeData($member);
        $path[] = $data['param'] = "<index>";
        $data['docs'] = $this->docs->getShapeDocs($member->getName(), $shape->getName(), 'member');
        $data['recursive'] = $this->getRecursionPath($member, $visited);
        $data['path'] = $path;

        // Save the shape data.
        $this->shapes[$this->index++] = $data;

        // If the member is complex and not recursive, traverse it too.
        if ($data['complex'] && !$data['recursive']) {
            $this->walkComplexMember($member, $visited, $path);
        }
    }

    private function getRecursionPath(Shape $shape, array $visited)
    {
        return isset($visited[$shape->getName()])
            ? $visited[$shape->getName()]
            : null;
    }

    private function createShapeData(Shape $shape)
    {
        // Get basic data from the shape object
        $data = $shape->toArray();
        unset($data['members'], $data['member'], $data['key'], $data['value'], $data['required']);
        $data += array_fill_keys(self::$keys, null);

        // Determine the type.
        $data['type'] = self::$types[$shape->getType()];

        // Determine the subtype for complex types.
        if ($data['type'] === 'structure') {
            $data['complex'] = 'mixed';
        } elseif ($data['type'] === 'map') {
            /** @var MapShape $shape */
            $data['complex'] = self::$types[$shape->getValue()->getType()];
        } elseif ($data['type'] === 'list') {
            /** @var ListShape $shape */
            $data['complex'] = self::$types[$shape->getMember()->getType()];
        }

        return $data;
    }
}
