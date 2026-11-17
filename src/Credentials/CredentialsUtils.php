<?php

namespace Aws\Credentials;

final class CredentialsUtils
{
    // Request timeout, in seconds, for the service clients that credential
    // providers create (STS, SSO, SSO OIDC, Sign-In, Cognito). Guzzle sets
    // none by default, and a refresh runs in the calling process, so a source
    // that connects but never answers would block it indefinitely. The
    // timeout covers the whole request, connecting included. Matches the
    // Java v2 SDK's default read timeout.
    private const SOURCE_CLIENT_TIMEOUT = 30;

    /**
     * Returns client `http` options with the credential-source request
     * timeout added. Values already set in $http are kept.
     *
     * @internal
     *
     * @param array $http Existing `http` client options.
     *
     * @return array
     */
    public static function withSourceClientTimeouts(array $http = []): array
    {
        return $http + ['timeout' => self::SOURCE_CLIENT_TIMEOUT];
    }

    /**
     * Determines whether a given host
     * is a loopback address.
     *
     * @param $host
     *
     * @return bool
     */
    public static function isLoopBackAddress($host): bool
    {
        if (!filter_var($host, FILTER_VALIDATE_IP)) {
            return false;
        }

        if (filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            if ($host === '::1') {
                return true;
            }

            return false;
        }

        $loopbackStart = ip2long('127.0.0.0');
        $loopbackEnd = ip2long('127.255.255.255');
        $ipLong = ip2long($host);

        return ($ipLong >= $loopbackStart && $ipLong <= $loopbackEnd);
    }
}
