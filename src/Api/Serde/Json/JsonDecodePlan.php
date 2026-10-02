<?php
namespace Aws\Api\Serde\Json;

/**
 * Compiled instructions for decoding one shape from a parsed JSON value.
 *
 * A plan is built once per shape and cached on the shape
 * (ShapePlanCache::JSON_DECODE). It removes the per-response model reads that
 * JsonParser would otherwise perform: shape-type dispatch, member iteration,
 * wire-name derivation, and collection member resolution.
 *
 * Structure members are stored as an ordered list to preserve V3 result order.
 * Descriptor tuples use named index constants rather than magic offsets.
 *
 * @internal
 */
final class JsonDecodePlan
{
    // Structure member descriptor: members[] = [...] in modeled order.
    public const M_SDK      = 0; // SDK member name (result key)
    public const M_WIRE     = 1; // wire (locationName) key
    public const M_TYPE     = 2; // JsonShapeType tag
    public const M_SHAPE    = 3; // child Shape, for lazy composite plan lookup
    public const M_TSFORMAT = 4; // timestamp format, or null

    // List/map value descriptor: value = [...]
    public const V_TYPE      = 0; // JsonShapeType tag
    public const V_SHAPE     = 1; // element/value Shape
    public const V_TSFORMAT  = 2; // timestamp format, or null

    /** @var int JsonShapeType tag for the shape this plan decodes. */
    public $type;

    /** @var array<int,array>|null Ordered member descriptors for a structure. */
    public $members;

    /** @var array|null Value descriptor for a list or map. */
    public $value;

    /** @var string|null Timestamp format when the root shape is a timestamp. */
    public $timestampFormat;

    /** @var bool Whether the structure is a union (drives Unknown fallback). */
    public $union = false;
}
