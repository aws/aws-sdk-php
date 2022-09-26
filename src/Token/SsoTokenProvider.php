<?php
namespace Aws\Token;


use Aws\Api\DateTimeResult;
use Aws\Exception\TokenException;
use Aws\SSOOIDC\SSOOIDCClient;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Token that comes from the SSO provider
 */
class SsoTokenProvider extends Token implements RefreshableTokenProviderInterface
{
    use ParsesIniTrait;

    const ENV_PROFILE = 'AWS_PROFILE';

    private $ssoProfileName;
    private $filename;
    private $config;

    /**
     * Constructs a new sso credential provider
     *
     * @param string $ssoProfileName the name of the ini profile name
     * @param string $filename the location of the ini file
     * @param array $config configuration options
     */
    public function __construct($ssoProfileName = null, $filename = null, $config = []) {
        $profileName = getenv(self::ENV_PROFILE) ?: 'default';
        $this->ssoProfileName = !empty($ssoProfileName) ? $ssoProfileName : $profileName;
        $this->filename =  !empty($filename)
            ? $filename :
            self::getHomeDir() . '/.aws/config';
        $this->config = $config;
    }

    /**
     * Loads cached sso credentials
     *
     * @return PromiseInterface
     */
    public function __invoke($previousCredentials = null)
    {
        return Promise\Coroutine::of(function () use ($previousCredentials) {
            if (!@is_readable($this->filename)) {
                throw new TokenException("Cannot read token from $this->filename");
            }
            $profiles = self::loadProfiles($this->filename);
            if (!isset($profiles[$this->ssoProfileName])) {
                throw new TokenException("Profile {$this->ssoProfileName} does not exist in {$this->filename}.");
            }
            $ssoProfile = $profiles[$this->ssoProfileName];
            if (empty($ssoProfile['sso_session'])) {
                throw new TokenException(
                    "Profile {$this->ssoProfileName} in {$this->filename} must contain an sso_session."
                );
            }

            $sessionProfileName = 'sso-session ' . $ssoProfile['sso_session'];
            if (empty($profiles[$sessionProfileName])) {
                throw new TokenException(
                    "Profile {$this->ssoProfileName} does not exist in {$this->filename}"
                );
            }

            $sessionProfileData = $profiles[$sessionProfileName];
            if (empty($sessionProfileData['sso_start_url'])
                || empty($sessionProfileData['sso_region'])
            ) {
                throw new TokenException(
                    "Profile {$this->ssoProfileName} in {$this->filename} must contain the following keys: "
                    . "sso_start_url and sso_region."
                );
            }

            $tokenLocation = self::getTokenLocation($ssoProfile['sso_session']);

            if (!@is_readable($tokenLocation)) {
                throw new TokenException("Unable to read token file at $tokenLocation");
            }

            $tokenData = json_decode(file_get_contents($tokenLocation), true);
            if (empty($tokenData['accessToken']) || empty($tokenData['expiresAt'])) {
                throw new TokenException(
                    "Token file at {$tokenLocation} must contain an access token and an expiration"
                );
            }

            try {
                $expiration = strtotime($tokenData['expiresAt']);
            } catch (\Exception $e) {
                throw new TokenException("Cached SSO token returned an invalid expiration");
            }
            if ($expiration > time()) {
                throw new TokenException("Cached SSO token returned an expired token");
            }

            $refreshToken = isset($tokenData['refreshToken'])
                ? $tokenData['refreshToken']
                : null;
            $clientId = isset($tokenData['clientId'])
                ? $tokenData['clientId']
                : null;
            $clientSecret = isset($tokenData['clientSecret'])
                ? $tokenData['clientSecret']
                : null;
            $registrationExpiration = isset($tokenData['registrationExpiresAt'])
                ? $tokenData['registrationExpiresAt']
                : null;
            $region = isset($tokenData['region'])
                ? $tokenData['region']
                : null;
            $startUrl = isset($tokenData['startUrl'])
                ? $tokenData['startUrl']
                : null;
            if (empty($config['ssoClient'])) {
                $ssooidcClient = new SSOOIDCClient([
                    'region' => $sessionProfileData['sso_region'],
                    'version' => '2019-06-10',
                    'credentials' => false
                ]);
            } else {
                $ssooidcClient = $config['ssoClient'];
            }
            yield new SsoToken(
                $tokenData['accessToken'],
                $tokenData['expiresAt'],
                $refreshToken,
                $clientId,
                $clientSecret,
                $registrationExpiration,
                $region,
                $startUrl
            );
        });
    }

    /**
     * Refreshes the token
     * @return mixed|null
     */
    public function refresh($previousToken) {
        if (
            empty($this->ssoOidcClient)
            || empty($this->refreshStartUrl)
        ) {
            throw new TokenException(
                "Cannot refresh this token without an 'ssooidcClient' "
                . "and a 'start_url'"
            );
        }
        try {
            //try to reload from disk
            $token = TokenProvider::sso();
            if (
                $token instanceof SsoTokenProvider
                && !$token->getExpiration()
            ) {
                return $token;
            }
        } finally {
            //if reload from disk fails, try refreshing
            $response = $this->ssoOidcClient->createToken([
                'clientId' => $this->clientId,
                'clientSecret' => $this->clientSecret,
                'grantType' => 'refresh_token', // REQUIRED
                'refreshToken' => $this->refreshToken,
            ]);
            return $token;
            echo "hi";
        }
    }

    public function shouldAttemptRefresh($previousToken)
    {
       return strtotime("-10 minutes") >= $previousToken->getExpiration()
           && $previousToken->getRegistrationExpiration() < time();
    }

    /**
     * @param $sso_session
     * @return string
     */
    public static function getTokenLocation($sso_session)
    {
        return self::getHomeDir()
            . '/.aws/sso/cache/'
            . utf8_encode(sha1($sso_session))
            . ".json";
    }
}
