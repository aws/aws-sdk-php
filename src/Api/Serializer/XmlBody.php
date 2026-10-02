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
                // Iterate the input in order, prepending xmlAttribute members
                // so they emit first.
                $ordered = [];
                foreach ($value as $k => $v) {
                    if ($v === null || !isset($plan->members[$k])) {
                        continue;
                    }
                    if ($plan->members[$k][XmlEncodePlan::M_ATTRIBUTE]) {
                        $ordered = [$k => $v] + $ordered;
                    } else {
                        $ordered[$k] = $v;
                    }
                }
                foreach ($ordered as $k => $v) {
                    $member = $plan->members[$k];
                    $this->formatByTypePlan(
                        $member[XmlEncodePlan::M_TYPE],
                        $member[XmlEncodePlan::M_SHAPE],
                        $member[XmlEncodePlan::M_ELEMENT],
                        $v,
                        $member[XmlEncodePlan::M_ATTR_NAME],
                        $member[XmlEncodePlan::M_NS],
                        $xml
                    );
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
                foreach ($value as $v) {
                    $this->formatByTypePlan(
                        $plan->listItemType,
                        $plan->listItemShape,
                        $elementName,
                        $v,
                        $itemAttrName,
                        $plan->listItemNs,
                        $xml
                    );
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
                foreach ($value as $key => $v) {
                    $this->openLeaf($entryName, $plan->mapEntryNs, $xml);
                    $this->formatByTypePlan(
                        $plan->mapKeyType,
                        $plan->mapKeyShape,
                        $plan->mapKeyName,
                        $key,
                        $plan->mapKeyAttribute ? $plan->mapKeyName : null,
                        $plan->mapKeyNs,
                        $xml
                    );
                    $this->formatByTypePlan(
                        $plan->mapValueType,
                        $plan->mapValueShape,
                        $plan->mapValueName,
                        $v,
                        $plan->mapValueAttribute ? $plan->mapValueName : null,
                        $plan->mapValueNs,
                        $xml
                    );
                    $xml->endElement();
                }
                if (!$plan->flattened) {
                    $xml->endElement();
                }
                break;

            case XmlShapeType::BLOB:
                $this->startElementPlan($plan, $name, $xml);
                $xml->writeRaw(base64_encode($value));
                $xml->endElement();
                break;

            case XmlShapeType::TIMESTAMP:
                $this->startElementPlan($plan, $name, $xml);
                $xml->writeRaw(
                    TimestampShape::formatAsString($value, $plan->timestampFormat)
                );
                $xml->endElement();
                break;

            case XmlShapeType::BOOLEAN:
                $this->startElementPlan($plan, $name, $xml);
                $xml->writeRaw($value ? 'true' : 'false');
                $xml->endElement();
                break;

            default: // SCALAR
                $this->startElementPlan($plan, $name, $xml);
                $xml->text($value);
                $xml->endElement();
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

    /**
     * Formats one member, list item, or map key/value. Composite children fetch
     * their own plan lazily; leaf types are handled inline. A non-null
     * $attributeName writes the value as that attribute instead of an element;
     * the plan only sets it for string shapes.
     */
    private function formatByTypePlan(
        int $type,
        Shape $shape,
        $name,
        $value,
        ?string $attributeName,
        ?array $ns,
        XMLWriter $xml
    ) {
        switch ($type) {
            case XmlShapeType::STRUCTURE:
            case XmlShapeType::LIST:
            case XmlShapeType::MAP:
                $this->formatPlan($this->planProvider->get($shape), $name, $value, $xml);
                return;

            case XmlShapeType::BLOB:
                $this->openLeaf($name, $ns, $xml);
                $xml->writeRaw(base64_encode($value));
                $xml->endElement();
                return;

            case XmlShapeType::TIMESTAMP:
                $childPlan = $this->planProvider->get($shape);
                $this->openLeaf($name, $ns, $xml);
                $xml->writeRaw(
                    TimestampShape::formatAsString($value, $childPlan->timestampFormat)
                );
                $xml->endElement();
                return;

            case XmlShapeType::BOOLEAN:
                $this->openLeaf($name, $ns, $xml);
                $xml->writeRaw($value ? 'true' : 'false');
                $xml->endElement();
                return;

            default: // SCALAR
                if ($attributeName !== null) {
                    $xml->writeAttribute($attributeName, $value);
                } else {
                    $this->openLeaf($name, $ns, $xml);
                    $xml->text($value);
                    $xml->endElement();
                }
        }
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
