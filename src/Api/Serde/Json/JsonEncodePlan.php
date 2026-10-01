<?php
namespace Aws\Api\Serde\Json;

/**
 * Compiled instructions for encoding one shape to a JSON body value.
 *
 * A plan is built once per shape and cached on the shape
 * (ShapePlanCache::JSON_ENCODE). It removes the per-request model reads that
 * JsonBody would otherwise perform: shape-type dispatch, wire-name
 * derivation, and timestamp-format lookups.
 *
 * Descriptor tuples use named index constants rather than magic offsets.
 *
 * @internal
 */
final class JsonEncodePlan
{
    // Structure member descriptor: members[sdkName] = [...]
    public const M_WIRE      = 0; // wire (locationName) key
    public const M_TYPE      = 1; // JsonShapeType tag
    public const M_SHAPE     = 2; // child Shape, for lazy composite plan lookup
    public const M_TSFORMAT  = 3; // timestamp format, or null

    // List/map value descriptor: value = [...]
    public const V_TYPE      = 0; // JsonShapeType tag
    public const V_SHAPE     = 1; // element/value Shape
    public const V_TSFORMAT  = 2; // timestamp format, or null

    /** @var int JsonShapeType tag for the shape this plan encodes. */
    public $type;

    /** @var array<string,array>|null Member descriptors for a structure. */
    public $members;

    /** @var array|null Value descriptor for a list or map. */
    public $value;

    /** @var string|null Timestamp format when the root shape is a timestamp. */
    public $timestampFormat;
}
