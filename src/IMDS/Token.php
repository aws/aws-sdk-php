<?php

namespace Aws\IMDS;

use DateTime;
use DateInterval;

final class Token
{
    const DEFAULT_TOKEN_TTL = 21600;
    const X_AWS_EC2_METADATA_TOKEN_TTL_SECONDS_KEY = 'x-aws-ec2-metadata-token-ttl-seconds';
    const X_AWS_EC2_METADATA_TOKEN_KEY = 'x-aws-ec2-metadata-token';
    /**
     * @var string $value
     */
    private $value;
    /**
     * @var DateInterval $ttl
     */
    private $ttl;
    /**
     * @var DateTime $createdTime
     */
    private $createdTime;

    /**
     * @param $ttl
     * @param $value
     */
    public function __construct($value, $ttl)
    {
        $this->value = $value;
        $this->ttl = $ttl;
        $this->createdTime = new DateTime();
    }

    /**
     * @return string
     */
    public function value() {
        return $this->value;
    }

    /**
     * @return DateInterval
     */
    public function ttl() {
        return $this->ttl;
    }

    /**
     * @return bool
     */
    public function isExpired() {
        $now = new DateTime();

        return $now > $this->createdTime->add($this->ttl);
    }

    public function __toString()
    {
        return "Token={value: " . $this->value . ", ttl: " . $this->ttl->s . ", createdTime: " . $this->createdTime->format("Y-m-d H:i:s") . "}";
    }
}
