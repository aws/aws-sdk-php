<?php
namespace Aws\Common\Credentials;

/**
 * A blank set of credentials. AWS clients must be provided credentials, but
 * there are some types of requests that do not need authentication. This class
 * can be used to pivot on that scenario, and also serve as a mock credentials
 * object when testing.
 */
class NullCredentials implements CredentialsInterface
{
    public function getAccessKeyId()
    {
        return '';
    }

    public function getSecretKey()
    {
        return '';
    }

    public function getSecurityToken()
    {
        return null;
    }

    public function getExpiration()
    {
        return null;
    }

    public function isExpired()
    {
        return false;
    }

    public function toArray()
    {
        return [
            'key'     => '',
            'secret'  => '',
            'token'   => null,
            'expires' => null
        ];
    }
}
