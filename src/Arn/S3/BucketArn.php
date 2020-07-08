<?php
namespace Aws\Arn\S3;

use Aws\Arn\Arn;
use Aws\Arn\ArnInterface;

/**
 * This class represents an S3 bucket ARN, which is in the
 * following format:
 *
 * @internal
 */
class BucketArn extends Arn implements ArnInterface
{
    public static function parse($string)
    {
        $data = parent::parse($string);
    }

    /**
     *
     * @param array $data
     */
    protected static function validate(array $data)
    {

    }
}
