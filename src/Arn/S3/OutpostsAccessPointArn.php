<?php
namespace Aws\Arn\S3;

use Aws\Arn\ArnInterface;
use Aws\Arn\Exception\InvalidArnException;

/**
 * @internal
 */
class OutpostsAccessPointArn extends AccessPointArn implements ArnInterface
{
    public static function parse($string)
    {
        $data = parent::parse($string);
        return self::parseOutposts($data);
    }

    private static function parseOutposts(array $data)
    {
        $outpostsData = explode(':', $data['resource_id']);

        if (isset($outpostsData[0])) {
            $data['outpost_id'] = $outpostsData[0];
        }
        if (isset($outpostsData[1])) {
            $data['access_point_name'] = $outpostsData[1];
        }

        return $data;
    }

    /**
     * Validation specific to OutpostsAccessPointArn
     *
     * @param array $data
     */
    protected static function validate(array $data)
    {
        if (empty($data['region'])) {
            throw new InvalidArnException("The 4th component of an access point ARN"
                . " represents the region and must not be empty.");
        }

        if (empty($data['account_id'])) {
            throw new InvalidArnException("The 5th component of an access point ARN"
                . " represents the account ID and must not be empty.");
        }
        if (!self::isValidHostLabel($data['account_id'])) {
            throw new InvalidArnException("The account ID in an access point ARN"
                . " must be a valid host label value.");
        }

        if (($data['resource_type'] !== 'outposts-accesspoint')) {
            throw new InvalidArnException("The 6th component of an S3 Outposts access point ARN"
                . " represents the resource type and must be 'outposts-accesspoint'.");
        }

        if (empty($data['outpost_id'])) {
            throw new InvalidArnException("The 7th component of an S3 Outposts access point ARN"
                . " represents the outpost ID and must not be empty.");
        }

        if (empty($data['access_point_name'])) {
            throw new InvalidArnException("The 8th component of an S3 Outposts access point ARN"
                . " represents the access point name and must not be empty.");
        }

        if (!self::isValidOutpostId($data['outpost_id'])) {
            throw new InvalidArnException("The 7th component of an S3 Outposts access point ARN"
                . " represents the outpost ID and must fit this pattern: `op-[0-9a-fA-F]{17}`");
        }

        if (!self::isValidAccessPointName($data['access_point_name'])) {
            throw new InvalidArnException("The 8th component of an S3 Outposts access point ARN"
                . " represents the access point name and must fit this pattern:"
                . " `[0-9a-zA-Z-]{3,50}`");
        }
    }

    private static function isValidOutpostId($id)
    {
        return true;
    }

    private static function isValidAccessPointName($name)
    {
        return true;
    }
}