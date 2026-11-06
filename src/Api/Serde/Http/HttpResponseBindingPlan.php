<?php
namespace Aws\Api\Serde\Http;

use Aws\Api\Shape;
use Aws\Api\StructureShape;

/**
 * Compiled REST response bindings for one operation.
 *
 * A plan is built once per operation and cached on the operation in slot 3
 * (ShapePlanCache::HTTP_RESPONSE_BINDINGS). It removes the per-response model
 * reads AbstractRestParser would otherwise perform: output member iteration,
 * binding location dispatch, header name, type, format, and jsonvalue
 * derivation, boolean-list item resolution for fast bindings, prefix-length
 * calculation, and payload event-stream, structure, and union decisions.
 *
 * @internal
 */
final class HttpResponseBindingPlan
{
    // Binding tags (B_TAG).
    public const HEADER               = 0;
    public const PREFIX_HEADERS       = 1;
    public const STATUS_CODE          = 2;
    public const HEADER_SHAPE         = 3; // cold path: legacy exact-header logic
    public const PREFIX_HEADERS_SHAPE = 4; // cold path: legacy prefix-header logic

    // Exact-header value conversions (H_CONVERT).
    public const CONVERT_NONE         = 0;
    public const CONVERT_FLOAT        = 1;
    public const CONVERT_INT          = 2;
    public const CONVERT_BOOLEAN      = 3;
    public const CONVERT_BLOB         = 4;
    public const CONVERT_TIMESTAMP    = 5;
    public const CONVERT_JSONVALUE    = 6;
    public const CONVERT_BOOLEAN_LIST = 7;

    // Shared ordered binding descriptor prefix.
    public const B_TAG  = 0; // binding tag
    public const B_NAME = 1; // SDK output member name

    // HEADER descriptor: [tag, SDK name, wire name, conversion, timestamp format].
    public const H_WIRE     = 2;
    public const H_CONVERT  = 3;
    public const H_TSFORMAT = 4;

    // HEADER_SHAPE descriptor: [tag, SDK name, member Shape].
    public const H_SHAPE = 2;

    // PREFIX_HEADERS descriptor: [tag, SDK name, prefix, prefix length].
    public const P_PREFIX     = 2;
    public const P_PREFIX_LEN = 3;

    // PREFIX_HEADERS_SHAPE descriptor: [tag, SDK name, member Shape].
    public const P_SHAPE = 2;

    // Payload kinds.
    public const PAYLOAD_IMPLICIT     = 0;
    public const PAYLOAD_RAW          = 1;
    public const PAYLOAD_STRUCTURE    = 2;
    public const PAYLOAD_EVENT_STREAM = 3;

    /** @var StructureShape|null Implicit payload decoder target. */
    public $output;

    /** @var bool Output has at least one member. */
    public $hasMembers = false;

    /** @var int Payload kind. */
    public $payloadKind = self::PAYLOAD_IMPLICIT;

    /** @var string|null Explicit payload member name. */
    public $payloadName;

    /** @var Shape|null Structure decoder or event-stream member target. */
    public $payloadMember;

    /** @var bool Explicit structure payload is a union. */
    public $payloadUnion = false;

    /** @var array<int,array> Ordered packed response binding descriptors. */
    public $bindings = [];
}
