<?php
namespace Aws\Common\Credentials;

use Aws\Common\Exception\CredentialsException;

/**
 * Refreshes credentials using a callback function when they are expired.
 */
class RefreshableCredentials implements CredentialsInterface
{
    /** @var CredentialsInterface Wrapped credentials object */
    private $credentials;

    /** @var callable */
    private $provider;

    /**
     * @param callable $callback A function that accepts no arguments and
     *                           returns a CredentialsInterface object.
     */
    public function __construct(callable $callback)
    {
        $this->provider = $callback;
        $this->refresh();
    }

    public function getAccessKeyId()
    {
        return $this->getCreds()->getAccessKeyId();
    }

    public function getSecretKey()
    {
        return $this->getCreds()->getSecretKey();
    }

    public function getSecurityToken()
    {
        return $this->getCreds()->getSecurityToken();
    }

    public function toArray()
    {
        return $this->getCreds()->toArray();
    }

    public function getExpiration()
    {
        return $this->credentials->getExpiration();
    }

    public function isExpired()
    {
        return $this->credentials->isExpired();
    }

    private function getCreds()
    {
        if ($this->credentials->isExpired()) {
            $this->refresh();
        }

        return $this->credentials;
    }

    private function refresh()
    {
        $this->credentials = null;
        $fn = $this->provider;
        $creds = $fn();
        if (!$creds instanceof CredentialsInterface) {
            throw new CredentialsException('Expected an instance of CredentialsInterface');
        }
        if ($creds->isExpired()) {
            throw new CredentialsException('Could not refresh credentials');
        }
        $this->credentials = $creds;
    }
}
