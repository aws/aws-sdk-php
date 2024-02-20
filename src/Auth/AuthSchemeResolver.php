<?php

namespace Aws\Auth;

use Aws\Auth\Exception\AuthException;
use Aws\Identity\BearerTokenIdentity;
use Aws\Identity\IdentityInterface;

/**
 * Houses logic for selecting an auth scheme modeled in a service's `auth` trait.
 * The `auth` trait can be modeled either in a service's metadata, or at the operation level.
 */
class AuthSchemeResolver implements AuthSchemeResolverInterface
{
    /**
     * @var array Mapping of auth schemes to signature versions used in
     *            resolving a signature version.
     */
    private $authSchemeMap;

    /**
     * @var string[] Default mapping of modeled auth trait auth schemes
     *               to the SDK's supported signature versions.
     */
    private static $defaultAuthSchemeMap = [
        'aws.auth#sigv4' => 'v4',
        'aws.auth#sigv4a' => 'v4a',
        'smithy.api#httpBearerAuth' => 'bearer',
        'smithy.auth#noAuth' => 'anonymous'
    ];

    public function __construct(array $authSchemeMap = [])
    {
        $this->authSchemeMap = empty($authSchemeMap)
            ? self::$defaultAuthSchemeMap
            : $authSchemeMap;
    }

    /**
     * Accepts a priority-ordered list of auth schemes and an Identity
     * and selects the first compatible auth schemes, returning a normalized
     * signature version.  For example, based on the default auth scheme mapping,
     * if `aws.auth#sigv4` is selected, `v4` will be returned.
     *
     * @param array $authSchemes
     * @param $identity
     *
     * @return string
     * @throws AuthException
     */
    public function selectAuthScheme(
        array $authSchemes,
        IdentityInterface $identity
    ): string
    {
        $failureReasons = [];

        foreach($authSchemes as $authScheme) {
            $normalizedAuthScheme = isset($this->authSchemeMap[$authScheme])
                ? $this->authSchemeMap[$authScheme]
                : $authScheme;

            if ($this->isCompatibleAuthScheme($normalizedAuthScheme, $identity)) {
                return $normalizedAuthScheme;
            } else {
                $failureReasons[] = $this->getIncompatibilityMessage($authScheme);
            }
        }

        throw new AuthException(
            'Could not resolve an authentication scheme: '
            . implode('; ', $failureReasons)
        );
    }

    /**
     * Determines compatibility based on either Identity or the availability
     * of the CRT extension.
     *
     * @param $authScheme
     * @param $identity
     *
     * @return bool
     */
    private function isCompatibleAuthScheme($authScheme, $identity): bool
    {
        switch ($authScheme) {
            case 'v4':
            case 'anonymous':
                return true;
            case 'v4a':
                return extension_loaded('awscrt');
            case 'bearer':
                return $identity instanceof BearerTokenIdentity;
            default:
                return false;
        }
    }

    /**
     * Provides incompatibility messages in the event an incompatible auth scheme
     * is encountered.
     *
     * @param $authScheme
     *
     * @return string
     */
    private function getIncompatibilityMessage($authScheme): string
    {
        switch ($authScheme) {
            case 'v4a':
                return 'The aws-crt-php extension must be installed to use Signature V4A';
            case 'bearer':
                return 'Bearer token credentials must be provided to use Bearer authentication';
            default:
                return "The service does not support `{$authScheme}` authentication.";
        }
    }
}
