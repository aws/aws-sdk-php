<?php

namespace Aws\IMDS;

use Aws\IMDS\Utils\Validator;

class EndpointMode
{
    const IPv4 = "IPv4";
    const IPv6 = "IPv6";
    private const EXCEPTION_CLASS = 'Aws\IMDS\Exceptions\EndpointModeNotValidException';
    /**
     * @var string $endpointMode
     */
    private $endpointMode;

    /**
     * @param string $endpointMode
     */
    public function __construct(string $endpointMode)
    {
        $this->endpointMode = Validator::ifNotInThrowException($endpointMode, [self::IPv4, self::IPv6], "endpointMode", self::EXCEPTION_CLASS);
    }

    public function __toString() {
        return $this->endpointMode;
    }

}
