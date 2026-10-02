<?php
namespace Aws\Api\Parser;

use Aws\Api\DateTimeResult;
use Aws\Api\Parser\Exception\ParserException;
use Aws\Api\Serde\Xml\XmlDecodePlan;
use Aws\Api\Serde\Xml\XmlDecodePlanProvider;
use Aws\Api\Serde\Xml\XmlShapeType;
use Aws\Api\Shape;
use Aws\Api\StructureShape;

/**
 * @internal Implements standard XML parsing for REST-XML and Query protocols.
 */
class XmlParser
{
    /** @var XmlDecodePlanProvider */
    private $planProvider;

    public function __construct()
    {
        $this->planProvider = new XmlDecodePlanProvider();
    }

    public function parse(StructureShape $shape, \SimpleXMLElement $value)
    {
        return $this->parsePlan($this->planProvider->get($shape), $value);
    }

    /**
     * Decodes a value using a compiled plan instead of re-reading the model.
     *
     * Preserves modeled member order, attribute fallback, flattening, union
     * handling, and value coercion.
     */
    private function parsePlan(XmlDecodePlan $plan, \SimpleXMLElement $value)
    {
        switch ($plan->type) {
            case XmlShapeType::STRUCTURE:
                $target = [];
                foreach ($plan->members as $member) {
                    $node = $member[XmlDecodePlan::M_NODE];
                    if (isset($value->{$node})) {
                        $target[$member[XmlDecodePlan::M_SDK]] = $this->parseByType(
                            $member[XmlDecodePlan::M_TYPE],
                            $member[XmlDecodePlan::M_SHAPE],
                            $member[XmlDecodePlan::M_TSFORMAT],
                            $member[XmlDecodePlan::M_COERCE],
                            $value->{$node}
                        );
                    } elseif ($member[XmlDecodePlan::M_ATTRIBUTE]) {
                        $target[$member[XmlDecodePlan::M_SDK]] = $this->readAttribute(
                            $member[XmlDecodePlan::M_ATTRKEY],
                            $member[XmlDecodePlan::M_ATTRNS],
                            $value
                        );
                    }
                }
                if ($plan->union && empty($target)) {
                    foreach ($value as $key => $val) {
                        $name = $val->children()->getName();
                        $target['Unknown'][$name] = $val->$name;
                    }
                }
                return $target;

            case XmlShapeType::LIST:
                $target = [];
                if (!$plan->flattened) {
                    $value = $value->{$plan->listItemName};
                }
                foreach ($value as $v) {
                    $target[] = $this->parseByType(
                        $plan->listItemType,
                        $plan->listItemShape,
                        $plan->listItemTsFormat,
                        $plan->listItemCoerce,
                        $v
                    );
                }
                return $target;

            case XmlShapeType::MAP:
                $target = [];
                if (!$plan->flattened) {
                    $value = $value->entry;
                }
                foreach ($value as $node) {
                    $key = $this->parseByType(
                        $plan->mapKeyType,
                        $plan->mapKeyShape,
                        null,
                        $plan->mapKeyCoerce,
                        $node->{$plan->mapKeyName}
                    );
                    $target[$key] = $this->parseByType(
                        $plan->mapValueType,
                        $plan->mapValueShape,
                        $plan->mapValueTsFormat,
                        $plan->mapValueCoerce,
                        $node->{$plan->mapValueName}
                    );
                }
                return $target;

            case XmlShapeType::BLOB:
                return base64_decode((string) $value);

            case XmlShapeType::BOOLEAN:
                return $value == 'true';

            case XmlShapeType::TIMESTAMP:
                return $this->coerceTimestamp($value, $plan->timestampFormat);

            default: // SCALAR (string, integer, float/double handled below)
                return (string) $value;
        }
    }

    /**
     * Decodes one member, list item, or map key/value. Composite children fetch
     * their own plan lazily; leaf types are handled inline. Integer/float leaf
     * coercion is resolved from the child Shape's type here (the plan tag only
     * distinguishes SCALAR from the specially handled leaves).
     */
    private function parseByType(int $type, Shape $shape, ?string $tsFormat, int $coerce, $value)
    {
        switch ($type) {
            case XmlShapeType::STRUCTURE:
            case XmlShapeType::LIST:
            case XmlShapeType::MAP:
                return $this->parsePlan($this->planProvider->get($shape), $value);

            case XmlShapeType::BLOB:
                return base64_decode((string) $value);

            case XmlShapeType::BOOLEAN:
                return $value == 'true';

            case XmlShapeType::TIMESTAMP:
                return $this->coerceTimestamp($value, $tsFormat);

            default: // SCALAR: coercion kind precomputed, no model read
                if ($coerce === XmlDecodePlan::COERCE_INT) {
                    return (int) (string) $value;
                }
                if ($coerce === XmlDecodePlan::COERCE_FLOAT) {
                    $s = (string) $value;
                    return match ($s) {
                        'NaN', 'Infinity', '-Infinity' => $s,
                        default => (float) $s,
                    };
                }
                return (string) $value;
        }
    }

    private function coerceTimestamp($value, ?string $tsFormat)
    {
        if (is_string($value)
            || is_int($value)
            || (is_object($value) && method_exists($value, '__toString'))
        ) {
            return DateTimeResult::fromTimestamp((string) $value, $tsFormat);
        }
        throw new ParserException('Invalid timestamp value passed to XmlParser::parse_timestamp');
    }

    private function readAttribute(string $key, string $namespace, \SimpleXMLElement $value)
    {
        $attributes = $value->attributes($namespace);
        return isset($attributes[$key]) ? (string) $attributes[$key] : null;
    }

}
