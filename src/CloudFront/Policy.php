<?php
namespace Aws\CloudFront;

class Policy
{
    private $resource;
    private $until;
    private $from;
    private $ip;

    /**
     * Creates a CloudFront policy for allowing access to restricted
     * distributions.
     *
     * @param string            $resource   The resource (URL or RTMP path) to
     *                                      which this policy grants access.
     * @param string|int        $until      UTC Unix timestamp indicating when
     *                                      this policy will expire.
     * @param string|int|null   $from       (Optional) UTC Unix timestamp
     *                                      indicating when this policy will
     *                                      become valid.
     * @param string|null       $ip         (Optional) The IP address range
     *                                      (expressed in standard IPv4 CIDR
     *                                      format) of the client(s) permitted
     *                                      to make requests under this policy.
     *
     * @link http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/private-content-setting-signed-cookie-custom-policy.html#private-content-custom-policy-statement-cookies
     */
    public function __construct($resource, $until, $from = null, $ip = null)
    {
        $this->resource = $resource;
        $this->until = $until;
        $this->from = $from;
        $this->ip = $ip;
    }

    public function __toString()
    {
        return json_encode([
            'Statement' => [
                [
                    'Resource' => $this->resource,
                    'Condition' => $this->getConditions(),
                ],
            ],
        ], JSON_UNESCAPED_SLASHES);
    }

    private function getConditions()
    {
        $conditions = ['DateLessThan' => ["AWS:EpochTime" => $this->until]];
        if (isset($this->from)) {
            $conditions['DateGreaterThan'] = ["AWS:EpochTime" => $this->from];
        }
        if (isset($this->ip)) {
            $conditions['IpAddress'] = ["AWS:SourceIp" => $this->ip];
        }

        return $conditions;
    }
}
