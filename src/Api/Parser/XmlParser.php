<?php
namespace Aws\Api\Parser;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Shape;
use Aws\Api\StructureShape;

/**
 * @internal Implements standard XML parsing for REST-XML and Query protocols.
 */
class XmlParser
{
    public function parse(StructureShape $shape, \SimpleXMLElement $value)
    {
        // Remove the outermost wrapping element if present
        if ($shape['resultWrapper']) {
            $value = $value->{$shape['resultWrapper']};
        }

        return $this->dispatch($shape, $value);
    }

    private function dispatch($shape, \SimpleXMLElement $value)
    {
        static $methods = [
            'parse_structure' => true,
            'parse_list'      => true,
            'parse_map'       => true,
            'parse_blob'      => true,
            'parse_boolean'   => true,
            'parse_integer'   => true,
            'parse_float'     => true
        ];

        $type = 'parse_' . $shape['type'];
        if (isset($methods[$type])) {
            return $this->{$type}($shape, $value);
        }

        return (string) $value;
    }

    private function parse_structure(
        StructureShape $shape,
        \SimpleXMLElement  $value
    ) {
        $target = [];

        foreach ($shape->getMembers() as $name => $member) {
            // Extract the name of the XML node
            $node = $this->memberKey($member, $name);
            if (isset($value->{$node})) {
                $target[$name] = $this->dispatch($member, $value->{$node});
            }
        }

        return $target;
    }

    private function memberKey(Shape $shape, $name)
    {
        if ($shape instanceof ListShape && $shape['flattened']) {
            return $shape->getMember()['xmlName'] ?: $name;
        }

        return $name;
    }

    private function parse_list(ListShape $shape, \SimpleXMLElement  $value)
    {
        $target = [];
        $member = $shape->getMember();

        if (!$shape['flattened']) {
            $value = $value->{$member['xmlName'] ?: 'member'};
        }

        foreach ($value as $v) {
            $target[] = $this->dispatch($member, $v);
        }

        return $target;
    }

    private function parse_map(MapShape $shape, \SimpleXMLElement $value)
    {
        $target = [];

        if (!$shape['flattened']) {
            $value = $value->entry;
        }

        $mapKey = $shape->getKey();
        $mapValue = $shape->getValue();
        $keyName = $shape->getKey()['xmlName'] ?: 'key';
        $valueName = $shape->getValue()['xmlName'] ?: 'value';

        foreach ($value as $node) {
            $key = $this->dispatch($mapKey, $node->{$keyName});
            $value = $this->dispatch($mapValue, $node->{$valueName});
            $target[$key] = $value;
        }

        return $target;
    }

    private function parse_blob(Shape $shape, $value)
    {
        return base64_decode((string) $value);
    }

    private function parse_float(Shape $shape, $value)
    {
        return (float) (string) $value;
    }

    private function parse_integer(Shape $shape, $value)
    {
        return (int) (string) $value;
    }

    private function parse_boolean(Shape $shape, $value)
    {
        return $value == 'true' ? true : false;
    }
}
