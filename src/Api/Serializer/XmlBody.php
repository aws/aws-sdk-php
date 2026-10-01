<?php
namespace Aws\Api\Serializer;

use Aws\Api\MapShape;
use Aws\Api\Serde\Xml\XmlEncodePlan;
use Aws\Api\Serde\Xml\XmlEncodePlanProvider;
use Aws\Api\Serde\Xml\XmlShapeType;
use Aws\Api\Service;
use Aws\Api\Shape;
use Aws\Api\StructureShape;
use Aws\Api\ListShape;
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
     * Builds the XML body using the pre-plan format() path.
     *
     * Retained only so the serde benchmark can compare the legacy path against
     * the plan path in a single process. Not used by the request pipeline.
     *
     * @internal
     */
    public function buildLegacy(Shape $shape, array $args)
    {
        $xml = new XMLWriter();
        $xml->openMemory();
        $xml->startDocument('1.0', 'UTF-8');

        $rootElementName = $this->determineRootElementName($shape);

        $this->format($shape, $rootElementName, $args, $xml);
        $xml->endDocument();

        return $xml->outputMemory();
    }

    private function startElement(Shape $shape, $name, XMLWriter $xml)
    {
        $xml->startElement($name);

        if ($ns = $shape['xmlNamespace']) {
            $xml->writeAttribute(
                isset($ns['prefix']) ? "xmlns:{$ns['prefix']}" : 'xmlns',
                $ns['uri']
            );
        }
    }

    private function format(Shape $shape, $name, $value, XMLWriter $xml)
    {
        // Any method mentioned here has a custom serialization handler.
        static $methods = [
            'add_structure' => true,
            'add_list'      => true,
            'add_blob'      => true,
            'add_timestamp' => true,
            'add_boolean'   => true,
            'add_map'       => true,
            'add_string'    => true
        ];

        $type = 'add_' . $shape['type'];
        if (isset($methods[$type])) {
            $this->{$type}($shape, $name, $value, $xml);
        } else {
            $this->defaultShape($shape, $name, $value, $xml);
        }
    }

    private function defaultShape(Shape $shape, $name, $value, XMLWriter $xml)
    {
        $this->startElement($shape, $name, $xml);
        $xml->text($value);
        $xml->endElement();
    }

    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    private function add_structure(
        StructureShape $shape,
        $name,
        array $value,
        \XMLWriter $xml
    ) {
        $this->startElement($shape, $name, $xml);

        foreach ($this->getStructureMembers($shape, $value) as $k => $definition) {
            // Default to member name
            $elementName = $k;

            if ($definition['member']['locationName']
                && !isset($definition['member']['locationNameAtStructureLevel'])
            ) {
                $elementName = $definition['member']['locationName'];
            }

            $this->format(
                $definition['member'],
                $elementName,
                $definition['value'],
                $xml
            );
        }

        $xml->endElement();
    }

    private function getStructureMembers(StructureShape $shape, array $value)
    {
        $members = [];

        foreach ($value as $k => $v) {
            if ($v !== null && $shape->hasMember($k)) {
                $definition = [
                    'member' => $shape->getMember($k),
                    'value'  => $v,
                ];

                if ($definition['member']['xmlAttribute']) {
                    // array_unshift_associative
                    $members = [$k => $definition] + $members;
                } else {
                    $members[$k] = $definition;
                }
            }
        }

        return $members;
    }

    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    private function add_list(
        ListShape $shape,
        $name,
        array $value,
        XMLWriter $xml
    ) {
        $items = $shape->getMember();

        if ($shape['flattened']) {
            $elementName = $name;
        } else {
            $this->startElement($shape, $name, $xml);
            $elementName = $items['locationName'] ?: 'member';
        }

        foreach ($value as $v) {
            $this->format($items, $elementName, $v, $xml);
        }

        if (!$shape['flattened']) {
            $xml->endElement();
        }
    }

    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    private function add_map(
        MapShape $shape,
        $name,
        array $value,
        XMLWriter $xml
    ) {
        $xmlEntry = $shape['flattened'] ? $name : 'entry';
        $xmlKey = $shape->getKey()['locationName'] ?: 'key';
        $xmlValue = $shape->getValue()['locationName'] ?: 'value';

        if (!$shape['flattened']) {
            $this->startElement($shape, $name, $xml);
        }

        foreach ($value as $key => $v) {
            $this->startElement($shape, $xmlEntry, $xml);
            $this->format($shape->getKey(), $xmlKey, $key, $xml);
            $this->format($shape->getValue(), $xmlValue, $v, $xml);
            $xml->endElement();
        }

        if (!$shape['flattened']) {
            $xml->endElement();
        }
    }

    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    private function add_blob(Shape $shape, $name, $value, XMLWriter $xml)
    {
        $this->startElement($shape, $name, $xml);
        $xml->writeRaw(base64_encode($value));
        $xml->endElement();
    }

    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    private function add_timestamp(
        TimestampShape $shape,
        $name,
        $value,
        XMLWriter $xml
    ) {
        $this->startElement($shape, $name, $xml);
        $timestampFormat = !empty($shape['timestampFormat'])
            ? $shape['timestampFormat']
            : 'iso8601';
        $xml->writeRaw(
            TimestampShape::formatAsString($value, $timestampFormat)
        );
        $xml->endElement();
    }

    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    private function add_boolean(
        Shape $shape,
        $name,
        $value,
        XMLWriter $xml
    ) {
        $this->startElement($shape, $name, $xml);
        $xml->writeRaw($value ? 'true' : 'false');
        $xml->endElement();
    }

    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    private function add_string(
        Shape $shape,
        $name,
        $value,
        XMLWriter $xml
    ) {
        if ($shape['xmlAttribute']) {
            $xml->writeAttribute($shape['locationName'] ?: $name, $value);
        } else {
            $this->defaultShape($shape, $name, $value, $xml);
        }
    }

    /**
     * Encodes a value using a compiled plan instead of re-reading the model.
     *
     * Emits the same XMLWriter tokens format() emits for the same shape, so the
     * serialized output is byte-identical.
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
                // Preserve XmlBody::getStructureMembers ordering: iterate the
                // input, prepending xmlAttribute members so they emit first.
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
     * the plan only sets it for string shapes, matching XmlBody::add_string.
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

    private function determineRootElementName(Shape $shape): string
    {
        $shapeName = $shape->getName();

        // Look up the shape definition first
        if ($shapeName && $shapeMap = $shape->getShapeMap()) {
            if (isset($shapeMap[$shapeName]['locationName'])) {
                return $shapeMap[$shapeName]['locationName'];
            }
        }

        // Fall back to shape's current locationName
        if ($shape['locationName']) {
            return $shape['locationName'];
        }

        return $shapeName;
    }
}
