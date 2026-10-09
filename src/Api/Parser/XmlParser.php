<?php
namespace Aws\Api\Parser;

use Aws\Api\DateTimeResult;
use Aws\Api\Serde\Xml\XmlDecodePlan;
use Aws\Api\Serde\Xml\XmlDecodePlanProvider;
use Aws\Api\Serde\Xml\XmlShapeType;
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
                foreach ($plan->members as $index => $member) {
                    $node = $member[XmlDecodePlan::M_NODE];
                    if (isset($value->{$node})) {
                        $type = $member[XmlDecodePlan::M_TYPE];
                        $nodeValue = $value->{$node};
                        switch ($type) {
                            case XmlShapeType::STRUCTURE:
                            case XmlShapeType::LIST:
                            case XmlShapeType::MAP:
                                $childPlan = $member[XmlDecodePlan::M_PLAN];
                                if ($childPlan === null) {
                                    $childPlan = $this->planProvider->get(
                                        $member[XmlDecodePlan::M_SHAPE]
                                    );
                                    $plan->members[$index][XmlDecodePlan::M_PLAN] = $childPlan;
                                }
                                $parsed = $this->parsePlan($childPlan, $nodeValue);
                                break;

                            case XmlShapeType::BLOB:
                                $parsed = base64_decode((string) $nodeValue);
                                break;

                            case XmlShapeType::BOOLEAN:
                                $parsed = $nodeValue == 'true';
                                break;

                            case XmlShapeType::TIMESTAMP:
                                $parsed = DateTimeResult::fromTimestamp(
                                    (string) $nodeValue,
                                    $member[XmlDecodePlan::M_TSFORMAT]
                                );
                                break;

                            default: // SCALAR
                                $coerce = $member[XmlDecodePlan::M_COERCE];
                                if ($coerce === XmlDecodePlan::COERCE_INT) {
                                    $parsed = (int) (string) $nodeValue;
                                } elseif ($coerce === XmlDecodePlan::COERCE_FLOAT) {
                                    $s = (string) $nodeValue;
                                    $parsed = match ($s) {
                                        'NaN', 'Infinity', '-Infinity' => $s,
                                        default => (float) $s,
                                    };
                                } else {
                                    $parsed = (string) $nodeValue;
                                }
                        }
                        $target[$member[XmlDecodePlan::M_SDK]] = $parsed;
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
                switch ($plan->listItemType) {
                    case XmlShapeType::STRUCTURE:
                    case XmlShapeType::LIST:
                    case XmlShapeType::MAP:
                        $childPlan = $plan->listItemPlan
                            ??= $this->planProvider->get($plan->listItemShape);
                        foreach ($value as $v) {
                            $target[] = $this->parsePlan($childPlan, $v);
                        }
                        break;

                    case XmlShapeType::BLOB:
                        foreach ($value as $v) {
                            $target[] = base64_decode((string) $v);
                        }
                        break;

                    case XmlShapeType::BOOLEAN:
                        foreach ($value as $v) {
                            $target[] = $v == 'true';
                        }
                        break;

                    case XmlShapeType::TIMESTAMP:
                        $timestampFormat = $plan->listItemTsFormat;
                        foreach ($value as $v) {
                            $target[] = DateTimeResult::fromTimestamp(
                                (string) $v,
                                $timestampFormat
                            );
                        }
                        break;

                    default: // SCALAR
                        if ($plan->listItemCoerce === XmlDecodePlan::COERCE_INT) {
                            foreach ($value as $v) {
                                $target[] = (int) (string) $v;
                            }
                        } elseif ($plan->listItemCoerce === XmlDecodePlan::COERCE_FLOAT) {
                            foreach ($value as $v) {
                                $s = (string) $v;
                                $target[] = match ($s) {
                                    'NaN', 'Infinity', '-Infinity' => $s,
                                    default => (float) $s,
                                };
                            }
                        } else {
                            foreach ($value as $v) {
                                $target[] = (string) $v;
                            }
                        }
                }
                return $target;

            case XmlShapeType::MAP:
                $target = [];
                if (!$plan->flattened) {
                    $value = $value->entry;
                }
                $keyPlan = null;
                if ($plan->mapKeyType >= XmlShapeType::STRUCTURE
                    && $plan->mapKeyType <= XmlShapeType::MAP
                ) {
                    $keyPlan = $plan->mapKeyPlan
                        ??= $this->planProvider->get($plan->mapKeyShape);
                }
                $valuePlan = null;
                if ($plan->mapValueType >= XmlShapeType::STRUCTURE
                    && $plan->mapValueType <= XmlShapeType::MAP
                ) {
                    $valuePlan = $plan->mapValuePlan
                        ??= $this->planProvider->get($plan->mapValueShape);
                }
                foreach ($value as $node) {
                    $key = $this->parseResolvedValue(
                        $plan->mapKeyType,
                        $keyPlan,
                        null,
                        $plan->mapKeyCoerce,
                        $node->{$plan->mapKeyName}
                    );
                    $target[$key] = $this->parseResolvedValue(
                        $plan->mapValueType,
                        $valuePlan,
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
                return DateTimeResult::fromTimestamp(
                    (string) $value,
                    $plan->timestampFormat
                );

            default: // SCALAR (string, integer, float/double handled below)
                return (string) $value;
        }
    }

    /**
     * Decodes a value whose model-derived metadata has already been resolved.
     */
    private function parseResolvedValue(
        int $type,
        ?XmlDecodePlan $childPlan,
        ?string $tsFormat,
        int $coerce,
        $value
    ) {
        switch ($type) {
            case XmlShapeType::STRUCTURE:
            case XmlShapeType::LIST:
            case XmlShapeType::MAP:
                /** @var XmlDecodePlan $childPlan */
                return $this->parsePlan($childPlan, $value);

            case XmlShapeType::BLOB:
                return base64_decode((string) $value);

            case XmlShapeType::BOOLEAN:
                return $value == 'true';

            case XmlShapeType::TIMESTAMP:
                return DateTimeResult::fromTimestamp(
                    (string) $value,
                    $tsFormat
                );

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

    private function readAttribute(string $key, string $namespace, \SimpleXMLElement $value)
    {
        $attributes = $value->attributes($namespace);
        return isset($attributes[$key]) ? (string) $attributes[$key] : null;
    }
}
