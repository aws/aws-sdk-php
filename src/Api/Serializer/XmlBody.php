<?php
namespace Aws\Api\Serializer;

use Aws\Api\Serde\Xml\XmlEncodePlan;
use Aws\Api\Serde\Xml\XmlEncodePlanProvider;
use Aws\Api\Serde\Xml\XmlShapeType;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\TimestampShape;
use XMLWriter;

/**
 * @internal Formats the XML body of a REST-XML services.
 */
class XmlBody
{
    /** @var Service */
    private Service $api;

    /** @var XmlEncodePlanProvider */
    private $planProvider;

    /**
     * @param Service $api API being used to create the XML body.
     */
    public function __construct(Service $api)
    {
        $this->api = $api;
        $this->planProvider = new XmlEncodePlanProvider();
    }

    /**
     * Builds the XML body based on an array of arguments.
     *
     * @param Shape $shape Operation being constructed
     * @param array $args  Associative array of arguments
     *
     * @return string
     */
    public function build(Shape $shape, array $args)
    {
        $xml = new XMLWriter();
        $xml->openMemory();
        $xml->startDocument('1.0', 'UTF-8');

        $plan = $this->planProvider->get($shape);
        $plan->rootName ??= XmlEncodePlanProvider::rootElementName($shape);

        $this->formatPlan($plan, $plan->rootName, $args, $xml);
        $xml->endDocument();

        return $xml->outputMemory();
    }

    /**
     * Encodes a value using a compiled plan instead of re-reading the model.
     */
    private function formatPlan(
        XmlEncodePlan $plan,
        $name,
        $value,
        XMLWriter $xml
    ) {
        switch ($plan->type) {
            case XmlShapeType::STRUCTURE:
                $this->startElementPlan($plan, $name, $xml);

                if (empty($plan->attributeMembers)) {
                    foreach ($value as $k => $v) {
                        if ($v !== null && isset($plan->members[$k])) {
                            $this->formatStructureMember($plan, $k, $v, $xml);
                        }
                    }
                } else {
                    // Preserve legacy ordering: modeled xmlAttribute members
                    // are prepended in reverse caller order, including
                    // non-string members that are ultimately written as
                    // elements.
                    $attributeValues = [];
                    foreach ($value as $k => $v) {
                        if ($v !== null
                            && isset($plan->members[$k])
                            && $plan->members[$k][XmlEncodePlan::M_ATTRIBUTE]
                        ) {
                            $attributeValues[] = [$k, $v];
                        }
                    }
                    for ($i = count($attributeValues) - 1; $i >= 0; $i--) {
                        $this->formatStructureMember(
                            $plan,
                            $attributeValues[$i][0],
                            $attributeValues[$i][1],
                            $xml
                        );
                    }
                    foreach ($value as $k => $v) {
                        if ($v !== null
                            && isset($plan->members[$k])
                            && !$plan->members[$k][XmlEncodePlan::M_ATTRIBUTE]
                        ) {
                            $this->formatStructureMember($plan, $k, $v, $xml);
                        }
                    }
                }

                $xml->endElement();
                break;

            case XmlShapeType::LIST:
                if ($plan->flattened) {
                    $elementName = $name;
                } else {
                    $this->startElementPlan($plan, $name, $xml);
                    $elementName = $plan->listItemName;
                }
                $itemAttrName = $plan->listItemAttribute
                    ? ($plan->listItemAttrName ?? $elementName)
                    : null;

                switch ($plan->listItemType) {
                    case XmlShapeType::STRUCTURE:
                    case XmlShapeType::LIST:
                    case XmlShapeType::MAP:
                        $childPlan = $plan->listItemPlan
                            ??= $this->planProvider->get($plan->listItemShape);
                        foreach ($value as $v) {
                            $this->formatPlan($childPlan, $elementName, $v, $xml);
                        }
                        break;

                    case XmlShapeType::BLOB:
                        foreach ($value as $v) {
                            $this->writeLeafValue(
                                $elementName,
                                base64_encode($v),
                                $plan->listItemNs,
                                true,
                                $xml
                            );
                        }
                        break;

                    case XmlShapeType::TIMESTAMP:
                        foreach ($value as $v) {
                            $this->writeLeafValue(
                                $elementName,
                                TimestampShape::formatAsString(
                                    $v,
                                    $plan->listItemTimestampFormat
                                ),
                                $plan->listItemNs,
                                true,
                                $xml
                            );
                        }
                        break;

                    case XmlShapeType::BOOLEAN:
                        foreach ($value as $v) {
                            $this->writeLeafValue(
                                $elementName,
                                $v ? 'true' : 'false',
                                $plan->listItemNs,
                                true,
                                $xml
                            );
                        }
                        break;

                    default: // SCALAR
                        if ($itemAttrName !== null) {
                            foreach ($value as $v) {
                                $xml->writeAttribute($itemAttrName, $v);
                            }
                        } else {
                            foreach ($value as $v) {
                                $this->writeLeafValue(
                                    $elementName,
                                    $v,
                                    $plan->listItemNs,
                                    false,
                                    $xml
                                );
                            }
                        }
                }

                if (!$plan->flattened) {
                    $xml->endElement();
                }
                break;

            case XmlShapeType::MAP:
                $entryName = $plan->flattened ? $name : $plan->mapEntryName;
                if (!$plan->flattened) {
                    $this->startElementPlan($plan, $name, $xml);
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

                foreach ($value as $key => $v) {
                    $this->openLeaf($entryName, $plan->mapEntryNs, $xml);
                    $this->formatResolvedValue(
                        $plan->mapKeyType,
                        $keyPlan,
                        $plan->mapKeyName,
                        $key,
                        $plan->mapKeyAttribute ? $plan->mapKeyName : null,
                        $plan->mapKeyNs,
                        $plan->mapKeyTimestampFormat,
                        $xml
                    );
                    $this->formatResolvedValue(
                        $plan->mapValueType,
                        $valuePlan,
                        $plan->mapValueName,
                        $v,
                        $plan->mapValueAttribute ? $plan->mapValueName : null,
                        $plan->mapValueNs,
                        $plan->mapValueTimestampFormat,
                        $xml
                    );
                    $xml->endElement();
                }
                if (!$plan->flattened) {
                    $xml->endElement();
                }
                break;

            case XmlShapeType::BLOB:
                $this->writeLeafValue(
                    $name,
                    base64_encode($value),
                    $plan->namespace,
                    true,
                    $xml
                );
                break;

            case XmlShapeType::TIMESTAMP:
                $this->writeLeafValue(
                    $name,
                    TimestampShape::formatAsString(
                        $value,
                        $plan->timestampFormat
                    ),
                    $plan->namespace,
                    true,
                    $xml
                );
                break;

            case XmlShapeType::BOOLEAN:
                $this->writeLeafValue(
                    $name,
                    $value ? 'true' : 'false',
                    $plan->namespace,
                    true,
                    $xml
                );
                break;

            default: // SCALAR
                $this->writeLeafValue(
                    $name,
                    $value,
                    $plan->namespace,
                    false,
                    $xml
                );
        }
    }

    /**
     * Opens an element and writes the shape's precomputed namespace attribute.
     */
    private function startElementPlan(XmlEncodePlan $plan, $name, XMLWriter $xml)
    {
        $xml->startElement($name);
        if ($plan->namespace !== null) {
            $xml->writeAttribute($plan->namespace[0], $plan->namespace[1]);
        }
    }

    private function formatStructureMember(
        XmlEncodePlan $plan,
        $key,
        $value,
        XMLWriter $xml
    ) {
        $member = $plan->members[$key];
        $type = $member[XmlEncodePlan::M_TYPE];
        $name = $member[XmlEncodePlan::M_ELEMENT];
        $namespace = $member[XmlEncodePlan::M_NS];

        switch ($type) {
            case XmlShapeType::STRUCTURE:
            case XmlShapeType::LIST:
            case XmlShapeType::MAP:
                $childPlan = $member[XmlEncodePlan::M_PLAN];
                if ($childPlan === null) {
                    $childPlan = $this->planProvider->get(
                        $member[XmlEncodePlan::M_SHAPE]
                    );
                    $plan->members[$key][XmlEncodePlan::M_PLAN] = $childPlan;
                }
                $this->formatPlan($childPlan, $name, $value, $xml);
                return;

            case XmlShapeType::BLOB:
                $this->writeLeafValue(
                    $name,
                    base64_encode($value),
                    $namespace,
                    true,
                    $xml
                );
                return;

            case XmlShapeType::TIMESTAMP:
                $this->writeLeafValue(
                    $name,
                    TimestampShape::formatAsString(
                        $value,
                        $member[XmlEncodePlan::M_TSFORMAT]
                    ),
                    $namespace,
                    true,
                    $xml
                );
                return;

            case XmlShapeType::BOOLEAN:
                $this->writeLeafValue(
                    $name,
                    $value ? 'true' : 'false',
                    $namespace,
                    true,
                    $xml
                );
                return;

            default: // SCALAR
                if ($member[XmlEncodePlan::M_ATTR_NAME] !== null) {
                    $xml->writeAttribute(
                        $member[XmlEncodePlan::M_ATTR_NAME],
                        $value
                    );
                } else {
                    $this->writeLeafValue(
                        $name,
                        $value,
                        $namespace,
                        false,
                        $xml
                    );
                }
        }
    }

    /**
     * Formats a value whose model-derived metadata has already been resolved.
     */
    private function formatResolvedValue(
        int $type,
        ?XmlEncodePlan $childPlan,
        $name,
        $value,
        ?string $attributeName,
        ?array $ns,
        ?string $timestampFormat,
        XMLWriter $xml
    ) {
        switch ($type) {
            case XmlShapeType::STRUCTURE:
            case XmlShapeType::LIST:
            case XmlShapeType::MAP:
                /** @var XmlEncodePlan $childPlan */
                $this->formatPlan($childPlan, $name, $value, $xml);
                return;

            case XmlShapeType::BLOB:
                $this->writeLeafValue(
                    $name,
                    base64_encode($value),
                    $ns,
                    true,
                    $xml
                );
                return;

            case XmlShapeType::TIMESTAMP:
                $this->writeLeafValue(
                    $name,
                    TimestampShape::formatAsString($value, $timestampFormat),
                    $ns,
                    true,
                    $xml
                );
                return;

            case XmlShapeType::BOOLEAN:
                $this->writeLeafValue(
                    $name,
                    $value ? 'true' : 'false',
                    $ns,
                    true,
                    $xml
                );
                return;

            default: // SCALAR
                if ($attributeName !== null) {
                    $xml->writeAttribute($attributeName, $value);
                } else {
                    $this->writeLeafValue($name, $value, $ns, false, $xml);
                }
        }
    }

    /**
     * Writes a leaf with a single XMLWriter call when no namespace is needed.
     */
    private function writeLeafValue(
        $name,
        $value,
        ?array $ns,
        bool $raw,
        XMLWriter $xml
    ) {
        if ($ns === null) {
            $xml->writeElement($name, (string) $value);
            return;
        }

        $this->openLeaf($name, $ns, $xml);
        if ($raw) {
            $xml->writeRaw((string) $value);
        } else {
            $xml->text($value);
        }
        $xml->endElement();
    }

    /**
     * Opens a leaf element, writing its precomputed namespace attribute if any.
     */
    private function openLeaf($name, ?array $ns, XMLWriter $xml)
    {
        $xml->startElement($name);
        if ($ns !== null) {
            $xml->writeAttribute($ns[0], $ns[1]);
        }
    }
}
