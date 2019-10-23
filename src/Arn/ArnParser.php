<?php
namespace Aws\Arn;

use Aws\Arn\S3\BucketArn;

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
        if (substr($data['resource'], 0, 11) === 'accesspoint') {
            return new AccessPointArn($data);
        }
        if (substr($data['resource'], 0, 6) === 'bucket'
            && $data['service'] === 's3'
        ) {
            return new BucketArn($data);
        }

        return new Arn($data);
    }
}
