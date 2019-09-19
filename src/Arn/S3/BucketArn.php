<?php
namespace Aws\Arn\S3;

use Aws\Arn\Arn;
use Aws\Arn\ArnInterface;
use Aws\Arn\Exception\InvalidArnException;

class BucketArn extends Arn implements ArnInterface
{
    /**
     * BucketArn constructor
     *
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
        self::validate($this->data);
    }

    /**
     * Validation specific to BucketArn
     *
     * @param array $data
     */
    protected static function validate(array $data)
    {
        if (empty($data['region'])) {
            throw new InvalidArnException("The 4th component of a S3 bucket ARN"
                . " represents the region and must not be empty.");
        }

        if (empty($data['account_id'])) {
            throw new InvalidArnException("The 5th component of a S3 bucket ARN"
                . " represents the account ID and must not be empty.");
        }

        if ($data['resource_type'] !== 'bucket_name') {
            throw new InvalidArnException("The 6th component of a S3 bucket ARN"
                . " represents the resource type and must be 'bucket_name'.");
        }

        if (empty($data['resource_id'])) {
            throw new InvalidArnException("The 7th component of a S3 bucket ARN"
                . " represents the resource ID and must not be empty.");
        }
    }
}