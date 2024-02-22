<?php

namespace Aws\IMDS;

use Aws\IMDS\Utils\Validator;

class Ec2MetadataResponse
{
    /**
     * @var string $body
     */
    private $body;

    /**
     * @param string $body
     */
    public function __construct($body)
    {
        $this->body = Validator::ifNullThrowException($body, "Metadata response is null");
    }

    /**
     * @return false|string[]
     */
    public function asList() {
        return explode("\n", $this->body);
    }

    /**
     * @return false|string
     */
    public function asJson() {
        return json_encode($this->body);
    }

    /**
     * @return string
     */
    public function asString() {
        return $this->body;
    }

    public function __toString() {
        return $this->asString();
    }

}
