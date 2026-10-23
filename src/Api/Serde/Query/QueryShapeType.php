<?php
namespace Aws\Api\Serde\Query;

use Aws\Api\Shape;

/**
 * Maps a modeled shape to an integer category tag for Query serialization.
 *
 * The categories mirror the legacy QueryParamBuilder dispatch, which called a
 * format_<type> method when one existed and cast the value to a string
 * otherwise. Every type without a dedicated formatter is SCALAR.
 *
 * @internal
 */
final class QueryShapeType
{
    public const SCALAR    = 0;
    public const STRUCTURE = 1;
    public const LIST      = 2;
    public const MAP       = 3;
    public const BLOB      = 4;
    public const TIMESTAMP = 5;
    public const BOOLEAN   = 6;

    /**
     * Item tag for a list shape with no member definition. Never returned by
     * fromShape(). Serializing a non-empty value of such a list throws.
     */
    public const MISSING   = 7;

    /**
     * Member tag for a structure member whose shape failed to resolve. Never
     * returned by fromShape(). Serializing a value for it throws.
     */
    public const UNRESOLVED = 8;

    /**
     * Categorizes a shape once, at plan-compile time.
     *
     * @param Shape $shape
     *
     * @return int One of the class constants.
     */
    public static function fromShape(Shape $shape): int
    {
        switch ($shape['type']) {
            case 'structure':
                return self::STRUCTURE;
            case 'list':
                return self::LIST;
            case 'map':
                return self::MAP;
            case 'blob':
                return self::BLOB;
            case 'timestamp':
                return self::TIMESTAMP;
            case 'boolean':
                return self::BOOLEAN;
            default:
                return self::SCALAR;
        }
    }
}
