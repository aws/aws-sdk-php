<?php

namespace Aws\Api\Serializer;

use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\StructureShape;
use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\TimestampShape;

/**
 * Formats the JSON body of a JSON-REST or JSON-RPC operation.
 * @internal
 */
class JsonBody
{
    private $api;

    public function __construct(Service $api)
    {
        $this->api = $api;
    }

    /**
     * Builds the JSON body based on an array of arguments.
     *
     * @param Shape $shape Operation being constructed
     * @param array $args  Associative array of arguments
     *
     * @return string
     */
    public function build(Shape $shape = null, array $args)
    {
        return $shape
            ? json_encode($this->format($shape, $args), JSON_FORCE_OBJECT)
            : '{}';
    }

    private function format(Shape $shape, $value)
    {
        static $methods = [
            'format_structure' => true,
            'format_list'      => true,
            'format_map'       => true,
            'format_blob'      => true,
            'format_timestamp' => true
        ];

        $type = 'format_' . $shape['type'];
        if (isset($methods[$type])) {
            return $this->{$type}($shape, $value);
        }

        return $value;
    }

    private function format_structure(StructureShape $shape, array $value)
    {
        $data = [];
        foreach ($value as $k => $v) {
            if ($v === null || !$shape->hasMember($k)) {
                continue;
            }
            $data[$shape['locationName'] ?: $k] = $this->format(
                $shape->getMember($k),
                $v
            );
        }

        return $data;
    }

    private function format_list(ListShape $shape, array $value)
    {
        $items = $shape->getMember();
        foreach ($value as &$v) {
            $data[] = $this->format($items, $v);
        }

        return $value;
    }

    private function format_map(MapShape $shape, array $value)
    {
        $values = $shape->getValue();
        foreach ($value as &$v) {
            $v = $this->format($values, $v);
        }

        return $value;
    }

    private function format_blob(Shape $shape, $value)
    {
        return base64_encode($value);
    }

    private function format_timestamp(TimestampShape $shape, $value)
    {
        return $shape->format(
            $value,
            $this->api->getMetadata('timestampFormat')
        );
    }
}
