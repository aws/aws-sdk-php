<?php
namespace Aws\Api\Serde\Query;

/**
 * Compiled instructions for serializing one shape to Query parameters.
 *
 * A plan is built once per shape and cached on the shape, in slot
 * ShapePlanCache::QUERY_ENCODE for AWS Query and EC2_QUERY_ENCODE for EC2.
 * It holds every decision QueryParamBuilder used to derive from the model on
 * each request: query names, type dispatch, list and map segments, and
 * timestamp formats. Only parameter key construction remains runtime work.
 *
 * List items and map values share the item* fields.
 *
 * @internal
 */
final class QueryEncodePlan
{
    // Structure member descriptor: members[sdkName] = [...]
    public const M_NAME     = 0; // query name segment
    public const M_TYPE     = 1; // QueryShapeType tag
    public const M_SHAPE    = 2; // member Shape, for lazy child plan lookup
    public const M_TSFORMAT = 3; // timestamp format, or null
    public const M_PLAN     = 4; // lazily resolved child plan

    /** @var int QueryShapeType tag for the shape this plan encodes. */
    public $type;

    /** @var array<string,array>|null Member descriptors for a structure. */
    public $members;

    /** @var bool Whether a list or map is flattened (AWS Query only). */
    public $flattened = false;

    /** @var string|null Wrapped list segment, such as ".member". */
    public $listMemberSegment;

    /** @var string|null Name that replaces the last prefix segment of a flattened list. */
    public $listFlatName;

    /** @var int|null QueryShapeType tag of list items or map values. */
    public $itemType;

    /** @var \Aws\Api\Shape|null List item or map value shape. */
    public $itemShape;

    /** @var string|null Timestamp format of list items or map values. */
    public $itemTimestampFormat;

    /** @var QueryEncodePlan|null Lazily resolved list item or map value plan. */
    public $itemPlan;

    /** @var string|null Map entry segment, ".entry" or "" when flattened. */
    public $mapEntrySegment;

    /** @var string|null Key name suffix, such as ".key". */
    public $mapKeySuffix;

    /** @var string|null Value name suffix, such as ".value". */
    public $mapValueSuffix;

    /**
     * @var bool True when a key or value name contains "%". The legacy builder
     *           passed those names through sprintf(), so they keep that path.
     */
    public $mapSprintf = false;

    /** @var int|null QueryShapeType tag of map keys. */
    public $mapKeyType;

    /** @var \Aws\Api\Shape|null Map key shape. */
    public $mapKeyShape;

    /** @var string|null Timestamp format of map keys. */
    public $mapKeyTimestampFormat;

    /** @var QueryEncodePlan|null Lazily resolved map key plan. */
    public $mapKeyPlan;

    /** @var string|null Timestamp format when the root shape is a timestamp. */
    public $timestampFormat;
}
