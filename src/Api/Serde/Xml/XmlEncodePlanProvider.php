<?php
namespace Aws\Api\Serde\Xml;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Shape;
use Aws\Api\StructureShape;

/**
 * Builds and caches XmlEncodePlan objects, one per shape.
 *
 * Plans attach to the shape via the shared ShapePlanCache (slot XML_ENCODE)
 * and reuse its generation-based invalidation. Composite child plans are
 * compiled lazily, when traversal first reaches the child, so a request only
 * ever compiles the shapes it actually encodes.
 *
 * The compiled values mirror XmlBody's per-request derivation exactly, so the
 * XMLWriter output is byte-identical.
 *
 * @internal
 */
final class XmlEncodePlanProvider
{
    /**
     * Returns the cached plan for a shape, compiling it on first use.
     *
     * @param Shape $shape
     *
     * @return XmlEncodePlan
     */
    public function get(Shape $shape): XmlEncodePlan
    {
        return $shape->getSerdePlan(ShapePlanCache::XML_ENCODE)
            ?? $shape->cacheSerdePlan(
                ShapePlanCache::XML_ENCODE,
                $this->compile($shape)
            );
    }

    private function compile(Shape $shape): XmlEncodePlan
    {
        $plan = new XmlEncodePlan();
        $plan->type = XmlShapeType::fromShape($shape);
        $plan->namespace = self::namespaceAttribute($shape);
        $plan->rootName = self::rootElementName($shape);

        switch ($plan->type) {
            case XmlShapeType::STRUCTURE:
                /** @var StructureShape $shape */
                $this->compileStructureMembers($shape, $plan);
                break;

            case XmlShapeType::LIST:
                /** @var ListShape $shape */
                $item = $shape->getMember();
                $plan->flattened = (bool) $shape['flattened'];
                $plan->listItemType = XmlShapeType::fromShape($item);
                $plan->listItemShape = $item;
                // Wrapped lists name each item by member locationName or 'member';
                // flattened lists reuse the list's own element name at runtime.
                $plan->listItemName = $item['locationName'] ?: 'member';
                $plan->listItemNs = self::namespaceAttribute($item);
                $plan->listItemAttribute = self::writesAttribute($item);
                $plan->listItemAttrName = $item['locationName'] ?: null;
                break;

            case XmlShapeType::MAP:
                /** @var MapShape $shape */
                $key = $shape->getKey();
                $value = $shape->getValue();
                $plan->flattened = (bool) $shape['flattened'];
                $plan->mapEntryName = $plan->flattened ? null : 'entry';
                $plan->mapKeyName = $key['locationName'] ?: 'key';
                $plan->mapValueName = $value['locationName'] ?: 'value';
                $plan->mapKeyShape = $key;
                $plan->mapValueShape = $value;
                $plan->mapKeyType = XmlShapeType::fromShape($key);
                $plan->mapValueType = XmlShapeType::fromShape($value);
                $plan->mapKeyNs = self::namespaceAttribute($key);
                $plan->mapValueNs = self::namespaceAttribute($value);
                $plan->mapKeyAttribute = self::writesAttribute($key);
                $plan->mapValueAttribute = self::writesAttribute($value);
                // Each entry element is opened with the map shape's namespace,
                // matching XmlBody::add_map (startElement($shape, $xmlEntry)).
                $plan->mapEntryNs = $plan->namespace;
                break;

            case XmlShapeType::TIMESTAMP:
                $plan->timestampFormat = self::timestampFormat($shape);
                break;
        }

        return $plan;
    }

    /**
     * Precomputes member descriptors keyed by SDK name, plus the list of
     * xmlAttribute member names (emitted first). Element name resolution and
     * the child namespace attribute are precomputed per member. XmlBody derives
     * these on every request; here they are computed once.
     */
    private function compileStructureMembers(StructureShape $shape, XmlEncodePlan $plan): void
    {
        $members = [];
        $attributeMembers = [];

        foreach ($shape->getMembers() as $name => $member) {
            $isAttribute = (bool) $member['xmlAttribute'];

            $elementName = $name;
            if ($member['locationName']
                && !isset($member['locationNameAtStructureLevel'])
            ) {
                $elementName = $member['locationName'];
            }

            $members[$name] = [
                XmlEncodePlan::M_ELEMENT   => $elementName,
                XmlEncodePlan::M_TYPE      => XmlShapeType::fromShape($member),
                XmlEncodePlan::M_SHAPE     => $member,
                XmlEncodePlan::M_ATTRIBUTE => $isAttribute,
                XmlEncodePlan::M_NS        => self::namespaceAttribute($member),
                XmlEncodePlan::M_ATTR_NAME => self::writesAttribute($member)
                    ? ($member['locationName'] ?: $elementName)
                    : null,
            ];

            if ($isAttribute) {
                $attributeMembers[] = $name;
            }
        }

        $plan->members = $members;
        $plan->attributeMembers = $attributeMembers;
    }

    /**
     * Precomputes the root element name using the current three-level
     * precedence, reproducing XmlBody::determineRootElementName so the runtime
     * serializer does not inspect shape metadata to open the document root:
     *   1. the original ShapeMap target definition's locationName
     *   2. the resolved shape's locationName
     *   3. the modeled shape name
     */
    private static function rootElementName(Shape $shape): string
    {
        $shapeName = $shape->getName();

        if ($shapeName && $shape instanceof StructureShape) {
            $original = $shape->getOriginalDefinition($shapeName);
            if (isset($original['locationName'])) {
                return $original['locationName'];
            }
        }

        if ($shape['locationName']) {
            return $shape['locationName'];
        }

        return (string) $shapeName;
    }

    /**
     * Whether XmlBody writes this shape as an attribute. Only string shapes
     * honor xmlAttribute (XmlBody::add_string); every other type is written as
     * an element even when the model marks it xmlAttribute.
     */
    private static function writesAttribute(Shape $shape): bool
    {
        return $shape['type'] === 'string' && $shape['xmlAttribute'];
    }

    /**
     * Precomputes the xmlns attribute for a shape, or null when absent.
     *
     * @return array{0:string,1:string}|null [attributeName, uri]
     */
    private static function namespaceAttribute(Shape $shape): ?array
    {
        $ns = $shape['xmlNamespace'];
        if (!$ns) {
            return null;
        }

        $name = isset($ns['prefix']) ? "xmlns:{$ns['prefix']}" : 'xmlns';

        return [$name, $ns['uri']];
    }

    /**
     * Resolves the timestamp format for a shape. Matches XmlBody's default of
     * iso8601 (not JSON's unixTimestamp).
     */
    private static function timestampFormat(Shape $shape): string
    {
        return !empty($shape['timestampFormat'])
            ? $shape['timestampFormat']
            : 'iso8601';
    }
}
