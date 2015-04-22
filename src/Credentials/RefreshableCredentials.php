<?php
namespace Aws\Credentials;

/**
 * Refreshes credentials using a callback function when they are expired.
 */
class RefreshableCredentials implements RefreshableCredentialsInterface
{
    /** @var CredentialsInterface Wrapped credentials object */
    private $credentials;

    /** @var callable */
    private $provider;

    /**
     * @param callable $provider A credentials provider function.
     */
    public function __construct(callable $provider)
    {
        $this->provider = $provider;
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

    public function refresh()
    {
        $this->credentials = null;
        $fn = $this->provider;
        $this->credentials = CredentialProvider::resolve($fn);
    }

    private function getCreds()
    {
        if ($this->credentials->isExpired()) {
            $this->refresh();
        }

        return $this->credentials;
    }
}
