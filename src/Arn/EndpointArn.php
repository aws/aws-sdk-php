<?php
namespace Aws\Arn;

use Aws\Arn\Exception\InvalidArnException;

class EndpointArn extends Arn implements ArnInterface
{
    /**
     * EndpointArn constructor
     *
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
        self::validate($this->data);
    }

    /**
     * Validation specific to EndpointArn
     *
     * @param array $data
     */
    protected static function validate(array $data)
    {
        if (empty($data['region'])) {
            throw new InvalidArnException("The 4th component of an endpoint ARN"
                . " represents the region and must not be empty.");
        }

        if (empty($data['account_id'])) {
            throw new InvalidArnException("The 5th component of an endpoint ARN"
                . " represents the account ID and must not be empty.");
        }

        if ($data['resource_type'] !== 'endpoint') {
            throw new InvalidArnException("The 6th component of an endpoint ARN"
                . " represents the resource type and must be 'endpoint'.");
        }
    }
}