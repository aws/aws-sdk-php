<?php

namespace Aws\Api;

enum SupportedProtocols: string
{
    case REST_JSON = 'rest-json';
    case REST_XML = 'rest-xml';
    case JSON = 'json';
    case QUERY = 'query';
    case EC2 = 'ec2';

    /**
     * Check if a protocol is valid.
     *
     * @param string $protocol
     * @return bool True if the protocol is supported, otherwise false.
     */
    public static function isSupported(string $protocol): bool
    {
        return self::tryFrom($protocol) !== null;
    }
}
