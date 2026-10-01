<?php
namespace Aws\Api\Serde\Xml;

/**
 * Compiled instructions for encoding one shape to an XML fragment.
 *
 * A plan is built once per shape and cached on the shape
 * (ShapePlanCache::XML_ENCODE). It removes the per-request model reads that
 * XmlBody would otherwise perform: shape-type dispatch, namespace lookups,
 * structure attribute-vs-element partitioning and element-name resolution,
 * list/map flattening decisions, and collection element naming.
 *
 * The XMLWriter calls themselves are unchanged; only the trait derivation is
 * precomputed, so writer output stays byte-identical.
 *
 * Descriptor tuples use named index constants rather than magic offsets.
 *
 * @internal
 */
final class XmlEncodePlan
{
    // Structure member descriptor, keyed by SDK member name:
    // members[sdkName] = [...]. Input order is preserved at runtime by
    // iterating the caller's value array; attribute members are emitted first.
    public const M_ELEMENT   = 0; // resolved element/attribute name
    public const M_TYPE      = 1; // XmlShapeType tag
    public const M_SHAPE     = 2; // child Shape, for lazy composite plan lookup
    public const M_ATTRIBUTE = 3; // bool: modeled xmlAttribute, ordered first
    public const M_NS        = 4; // child namespace attribute [name, uri] or null
    public const M_ATTR_NAME = 5; // attribute name if written as one, else null

    /** @var int XmlShapeType tag for the shape this shape encodes. */
    public $type;

    /**
     * Root element name for this shape, precomputed via the three-level
     * precedence (ShapeMap original locationName, resolved locationName, shape
     * name). Lets the serializer open the document root without inspecting shape
     * metadata at request time. Only meaningful when the shape is used as a root.
     *
     * @var string|null
     */
    public $rootName;

    /**
     * Namespace attribute to emit when this shape opens an element, or null.
     * Precomputed as [name, uri], e.g. ['xmlns:ns2', 'http://...'] or
     * ['xmlns', 'http://...'].
     *
     * @var array{0:string,1:string}|null
     */
    public $namespace;

    /** @var array<string,array>|null Member descriptors keyed by SDK name. */
    public $members;

    /** @var array<int,string>|null SDK names of xmlAttribute members (emit first). */
    public $attributeMembers;

    // --- List fields ---
    /** @var bool Whether a list/map is flattened (no wrapper element). */
    public $flattened = false;
    /** @var int|null XmlShapeType tag of the list element. */
    public $listItemType;
    /** @var \Aws\Api\Shape|null The list element Shape. */
    public $listItemShape;
    /** @var string|null Element name for wrapped list items ('member' default). */
    public $listItemName;
    /** @var array{0:string,1:string}|null Namespace attr for list items. */
    public $listItemNs;
    /** @var bool Whether list items are written as attributes (string only). */
    public $listItemAttribute = false;
    /** @var string|null Item locationName used as the attribute name. */
    public $listItemAttrName;

    // --- Map fields ---
    /** @var string|null Entry wrapper element name ('entry' when not flat). */
    public $mapEntryName;
    /** @var string|null Key element name ('key' default). */
    public $mapKeyName;
    /** @var string|null Value element name ('value' default). */
    public $mapValueName;
    /** @var \Aws\Api\Shape|null Map key Shape. */
    public $mapKeyShape;
    /** @var \Aws\Api\Shape|null Map value Shape. */
    public $mapValueShape;
    /** @var int|null XmlShapeType tag of the map value. */
    public $mapValueType;
    /** @var int|null XmlShapeType tag of the map key. */
    public $mapKeyType;
    /** @var array{0:string,1:string}|null Namespace attr for the entry element. */
    public $mapEntryNs;
    /** @var array{0:string,1:string}|null Namespace attr for map keys. */
    public $mapKeyNs;
    /** @var array{0:string,1:string}|null Namespace attr for map values. */
    public $mapValueNs;
    /** @var bool Whether map keys are written as attributes (string only). */
    public $mapKeyAttribute = false;
    /** @var bool Whether map values are written as attributes (string only). */
    public $mapValueAttribute = false;

    /** @var string|null Timestamp format when the shape is a timestamp. */
    public $timestampFormat;
}
