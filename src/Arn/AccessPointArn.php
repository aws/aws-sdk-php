<?php
namespace Aws\Arn;

use Aws\Arn\Exception\InvalidArnException;

class AccessPointArn extends Arn implements ArnInterface
{
    use ResourceTypeAndIdTrait;

    /**
     * AccessPointArn constructor
     *
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
        static::validate($this->data);
    }

    public static function parse($string)
    {
        $data = parent::parse($string);
        return self::parseResourceTypeAndId($data);
    }

    public function __toString()
    {
        if (!isset($this->string)) {
            $components = [
                $this->getPrefix(),
                $this->getPartition(),
                $this->getService(),
                $this->getRegion(),
                $this->getAccountId(),
                $this->getResourceType(),
                $this->getResourceId(),
            ];

            $this->string = implode(':', $components);
        }
        return $this->string;
    }

    /**
     * Validation specific to AccessPointArn
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

        if ($data['resource_type'] !== 'accesspoint') {
            throw new InvalidArnException("The 6th component of an access point ARN"
                . " represents the resource type and must be 'accesspoint'.");
        }

        if (empty($data['resource_id'])) {
            throw new InvalidArnException("The 7th component of an access point ARN"
                . " represents the resource ID and must not be empty.");
        }
    }
}