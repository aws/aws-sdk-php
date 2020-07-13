<?php
namespace Aws\Arn;

use Aws\Arn\S3\AccessPointArn as S3AccessPointArn;
use Aws\Arn\S3\OutpostsBucketArn;
use Aws\Arn\S3\RegionalBucketArn;
use Aws\Arn\S3\OutpostsAccessPointArn;

/**
 * @internal
 */
class ArnParser
{
    /**
     * @param $string
     * @return bool
     */
    public static function isArn($string)
    {
        return strpos($string, 'arn:') === 0;
    }

    /**
     * Parses a string and returns an instance of ArnInterface. Returns a
     * specific type of Arn object if it has a specific class representation
     * or a generic Arn object if not.
     *
     * @param $string
     * @return ArnInterface
     */
    public static function parse($string)
    {
        $data = Arn::parse($string);
        $resource = self::explodeResourceComponent($data['resource']);
        if ($resource[0] === 'outpost') {
            if (isset($resource[2]) && $resource[2] === 'bucket') {
                return new OutpostsBucketArn($string);
            }
            if (isset($resource[2]) && $resource[2] === 'accesspoint') {
                return new OutpostsAccessPointArn($string);
            }
        }
        if ($resource[0] === 'accesspoint') {
            if ($data['service'] === 's3') {
                return new S3AccessPointArn($string);
            }
            return new AccessPointArn($string);
        }
        if ($data['service'] === 's3' && $resource[0] === 'bucket') {
            return new RegionalBucketArn($string);
        }

        return new Arn($data);
    }

    private static function explodeResourceComponent($resource)
    {
        return preg_split("/[\/:]/", $resource);
    }
}
