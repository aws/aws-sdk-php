<?php
namespace Aws\Api\Serde\Xml;

/**
 * Compiled instructions for decoding one shape from a SimpleXMLElement.
 *
 * A plan is built once per shape and cached on the shape
 * (ShapePlanCache::XML_DECODE). It removes the per-response model reads that
 * XmlParser would otherwise perform: shape-type dispatch, element-name
 * resolution (including the getOriginalDefinition special case), attribute
 * key + namespace derivation, list/map flattening decisions, and collection
 * element naming.
 *
 * The SimpleXML traversal itself is unchanged; only the trait derivation is
 * precomputed, so the parsed result is identical.
 *
 * Structure members preserve modeled order. Descriptor tuples use named index
 * constants rather than magic offsets.
 *
 * @internal
 */
final class XmlDecodePlan
{
    // Scalar coercion kinds, precomputed so the hot path never re-reads the
    // model type for a leaf (string/integer/float).
    public const COERCE_STRING = 0;
    public const COERCE_INT    = 1;
    public const COERCE_FLOAT  = 2;

    // Structure member descriptor: members[] = [...] in modeled order.
    public const M_SDK       = 0; // SDK member name (result key)
    public const M_NODE      = 1; // XML element name to read ($value->{node})
    public const M_TYPE      = 2; // XmlShapeType tag
    public const M_SHAPE     = 3; // child Shape, for lazy composite plan lookup
    public const M_ATTRIBUTE = 4; // bool: fall back to an attribute when absent
    public const M_ATTRKEY   = 5; // attribute key (locationName minus prefix), or null
    public const M_ATTRNS    = 6; // attribute namespace uri, or ''
    public const M_TSFORMAT  = 7; // timestamp format, or null
    public const M_COERCE    = 8; // scalar coercion kind (COERCE_*)
    public const M_PLAN      = 9; // lazily resolved composite child plan

    /** @var int XmlShapeType tag for the shape this plan decodes. */
    public $type;

    /** @var array<int,array>|null Ordered member descriptors for a structure. */
    public $members;

    /** @var bool Whether the structure is a union (drives Unknown fallback). */
    public $union = false;

    // --- List fields ---
    /** @var bool Whether a list/map is flattened (no wrapper element). */
    public $flattened = false;
    /** @var string|null Wrapper/item element name for wrapped lists. */
    public $listItemName;
    /** @var int|null XmlShapeType tag of the list element. */
    public $listItemType;
    /** @var \Aws\Api\Shape|null List element Shape. */
    public $listItemShape;
    /** @var string|null Timestamp format for a list of timestamps. */
    public $listItemTsFormat;
    /** @var int Scalar coercion kind for a scalar list element. */
    public $listItemCoerce = self::COERCE_STRING;
    /** @var XmlDecodePlan|null Lazily resolved composite list item plan. */
    public $listItemPlan;

    // --- Map fields ---
    /** @var string|null Key element name ('key' default). */
    public $mapKeyName;
    /** @var string|null Value element name ('value' default). */
    public $mapValueName;
    /** @var int|null XmlShapeType tag of the map key. */
    public $mapKeyType;
    /** @var int|null XmlShapeType tag of the map value. */
    public $mapValueType;
    /** @var \Aws\Api\Shape|null Map key Shape. */
    public $mapKeyShape;
    /** @var \Aws\Api\Shape|null Map value Shape. */
    public $mapValueShape;
    /** @var string|null Timestamp format for a timestamp map value. */
    public $mapValueTsFormat;
    /** @var int Scalar coercion kind for a scalar map key. */
    public $mapKeyCoerce = self::COERCE_STRING;
    /** @var int Scalar coercion kind for a scalar map value. */
    public $mapValueCoerce = self::COERCE_STRING;
    /** @var XmlDecodePlan|null Lazily resolved composite map key plan. */
    public $mapKeyPlan;
    /** @var XmlDecodePlan|null Lazily resolved composite map value plan. */
    public $mapValuePlan;

    /** @var string|null Timestamp format when the shape is a timestamp. */
    public $timestampFormat;
}
