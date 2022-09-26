<?php
namespace Aws\Token;

use Aws\SSOOIDC\SSOOIDCClient;

class SsoToken extends Token
{
    private $refreshToken;
    private $clientId;
    private $clientSecret;
    private $registrationExpiration;
    private $region;
    private $startUrl;

    /**
     * Constructs a new basic token object, with the specified AWS
     * token
     *
     * @param string $token   Security token to use
     * @param int    $expires UNIX timestamp for when the token expires
     * @param string $refreshToken A token to refresh the token with
     * @param string $clientId  The client ID generated when performing the
     *  registration portion of the OIDC authorization flow. The clientId is
     *  used alongside the refreshToken to refresh the accessToken.
     * @param string $clientSecret The client secret generated when performing
     *  the registration portion of the OIDC authorization flow. The clientId is
     *  used alongside the refreshToken to refresh the accessToken.
     * @param int    $registrationExpiration  The expiration time of the client
     *  registration (clientId and clientSecret) as an epoch timestamp
     * @param string $region The configured sso_region for the profile that
     *  credentials are being resolved for. This field is set as a convenience
     *  and is not directly used by the token provider but is useful in other
     *  contexts.
     * @param string $startUrl The configured sso_start_url for the profile that
     *  credentials are being resolved for.
     * @param SSOOIDCClient $refreshClient The client that will be used to attempt refresh
     * @param string $refreshStartUrl The start url that will be used to attempt refresh
     */
    public function __construct(
        $token,
        $expires = null,
        $refreshToken = null,
        $clientId = null,
        $clientSecret = null,
        $registrationExpiration = null,
        $region = null,
        $startUrl = null
    ) {
        parent::__construct($token, $expires);
        $this->refreshToken = $refreshToken;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->registrationExpiration = $registrationExpiration;
        $this->region = $region;
        $this->startUrl = $startUrl;
    }

    public static function __set_state(array $state)
    {
        return new self(
            $state['token'],
            $state['expires'],
            $state['clientId'],
            $state['clientSecret'],
            $state['registrationExpiration'],
            $state['region'],
            $state['startUrl']
        );
    }

    public function __unserialize($data)
    {
        $this->token = $data['token'];
        $this->expires = $data['expires'];
        $this->refreshToken = $data['refreshToken'];
        $this->clientId = $data['clientId'];
        $this->clientSecret = $data['clientSecret'];
        $this->registrationExpiration = $data['registrationExpiration'];
        $this->region = $data['region'];
        $this->startUrl = $data['startUrl'];
    }

    /**
     * @return mixed|null
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @return mixed|null
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return mixed|null
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @return mixed|null
     */
    public function getRegistrationExpiration()
    {
        return $this->registrationExpiration;
    }

    /**
     * @return mixed|null
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return mixed|null
     */
    public function getStartUrl()
    {
        return $this->startUrl;
    }

}