<?php
namespace Aws\Api\Serde\Xml;

use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Serde\ShapePlanCache;
use Aws\Api\Shape;
use Aws\Api\StructureShape;

/**
 * Builds and caches XmlDecodePlan objects, one per shape.
 *
 * Plans attach to the shape via the shared ShapePlanCache (slot XML_DECODE)
 * and reuse its generation-based invalidation. Composite child plans are
 * compiled lazily, when traversal first reaches the child.
 *
 * The compiled values mirror XmlParser's per-response derivation exactly, so
 * the parsed result is identical.
 *
 * @internal
 */
final class XmlDecodePlanProvider
{
    /**
     * Returns the cached plan for a shape, compiling it on first use.
     *
     * @param Shape $shape
     *
     * @return XmlDecodePlan
     */
    public function get(Shape $shape): XmlDecodePlan
    {
        return $shape->getSerdePlan(ShapePlanCache::XML_DECODE)
            ?? $shape->cacheSerdePlan(
                ShapePlanCache::XML_DECODE,
                $this->compile($shape)
            );
    }

    private function compile(Shape $shape): XmlDecodePlan
    {
        $plan = new XmlDecodePlan();
        $plan->type = XmlShapeType::fromShape($shape);

        switch ($plan->type) {
            case XmlShapeType::STRUCTURE:
                /** @var StructureShape $shape */
                $this->compileStructureMembers($shape, $plan);
                break;

            case XmlShapeType::LIST:
                /** @var ListShape $shape */
                $item = $shape->getMember();
                $plan->flattened = (bool) $shape['flattened'];
                $plan->listItemName = $item['locationName'] ?: 'member';
                $plan->listItemType = XmlShapeType::fromShape($item);
                $plan->listItemShape = $item;
                $plan->listItemTsFormat = self::timestampFormat($item);
                $plan->listItemCoerce = self::coercionKind($item);
                break;

            case XmlShapeType::MAP:
                /** @var MapShape $shape */
                $key = $shape->getKey();
                $value = $shape->getValue();
                $plan->flattened = (bool) $shape['flattened'];
                $plan->mapKeyName = $key['locationName'] ?: 'key';
                $plan->mapValueName = $value['locationName'] ?: 'value';
                $plan->mapKeyType = XmlShapeType::fromShape($key);
                $plan->mapValueType = XmlShapeType::fromShape($value);
                $plan->mapKeyShape = $key;
                $plan->mapValueShape = $value;
                $plan->mapValueTsFormat = self::timestampFormat($value);
                $plan->mapKeyCoerce = self::coercionKind($key);
                $plan->mapValueCoerce = self::coercionKind($value);
                break;

            case XmlShapeType::TIMESTAMP:
                $plan->timestampFormat = self::timestampFormat($shape);
                break;
        }

        return $plan;
    }

    private function compileStructureMembers(StructureShape $shape, XmlDecodePlan $plan): void
    {
        $members = [];
        $ns = $shape['xmlNamespace'];
        $nsUri = $ns['uri'] ?? '';
        $nsPrefix = isset($ns['prefix']) ? $ns['prefix'] . ':' : '';

        foreach ($shape->getMembers() as $name => $member) {
            $isAttribute = !empty($member['xmlAttribute']);

            $members[] = [
                XmlDecodePlan::M_SDK       => $name,
                XmlDecodePlan::M_NODE      => $this->memberNode($member, $name),
                XmlDecodePlan::M_TYPE      => XmlShapeType::fromShape($member),
                XmlDecodePlan::M_SHAPE     => $member,
                XmlDecodePlan::M_ATTRIBUTE => $isAttribute,
                XmlDecodePlan::M_ATTRKEY   => $isAttribute
                    ? str_replace($nsPrefix, '', $member['locationName'])
                    : null,
                XmlDecodePlan::M_ATTRNS    => $nsUri,
                XmlDecodePlan::M_TSFORMAT  => self::timestampFormat($member),
                XmlDecodePlan::M_COERCE    => self::coercionKind($member),
            ];
        }

        $plan->members = $members;
        $plan->union = !empty($shape['union']);
    }

    /**
     * Resolves the element name to read for a structure member, reproducing
     * XmlParser::memberKey including the getOriginalDefinition special case:
     * a StructureShape member whose locationName was inherited from the target
     * shape definition (not declared at member level) reads by member name.
     */
    private function memberNode(Shape $member, string $name): string
    {
        if ($member instanceof StructureShape && isset($member['locationName'])) {
            $originalDef = $member->getOriginalDefinition($member->getName());
            if ($originalDef
                && isset($originalDef['locationName'])
                && $originalDef['locationName'] === $member['locationName']
            ) {
                return $name;
            }
        }

        return $member['locationName'] ?? $name;
    }

    /**
     * Precomputes the scalar coercion kind so the hot path never re-reads the
     * model type for a leaf. Non-scalars return COERCE_STRING (unused).
     */
    private static function coercionKind(Shape $shape): int
    {
        switch ($shape['type']) {
            case 'integer':
                return XmlDecodePlan::COERCE_INT;
            case 'float':
            case 'double':
                return XmlDecodePlan::COERCE_FLOAT;
            default:
                return XmlDecodePlan::COERCE_STRING;
        }
    }

    /**
     * Timestamp decode format, or null. Matches XmlParser's decode default of
     * null (DateTimeResult auto-detects), NOT the encode default iso8601.
     */
    private static function timestampFormat(Shape $shape): ?string
    {
        if (XmlShapeType::fromShape($shape) !== XmlShapeType::TIMESTAMP) {
            return null;
        }

        return !empty($shape['timestampFormat'])
            ? $shape['timestampFormat']
            : null;
    }
}
