<?php
namespace Aws\Api\Serde\Xml;

use Aws\Api\Shape;

/**
 * Maps a modeled shape to an integer category tag for XML encoding.
 *
 * Integer tags replace repeated model-string reads and string dispatch inside
 * the XML encode traversal. The categories are structure, list, map, blob,
 * timestamp, boolean, and a default
 * (scalar) bucket for string/integer/long/double/float and any other leaf.
 *
 * XML has no document category (unlike JSON).
 *
 * @internal
 */
final class XmlShapeType
{
    public const SCALAR    = 0; // string, integer, long, double, float, ...
    public const STRUCTURE = 1;
    public const LIST      = 2;
    public const MAP       = 3;
    public const BLOB      = 4;
    public const TIMESTAMP = 5;
    public const BOOLEAN   = 6;

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
