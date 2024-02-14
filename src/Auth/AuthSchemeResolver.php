<?php

namespace Aws\Auth;

use Aws\Auth\Exception\AuthException;
use Aws\Identity\BearerTokenIdentity;
use Aws\Identity\IdentityInterface;

class AuthSchemeResolver implements AuthSchemeResolverInterface
{
    /**
     * @var array
     */
    private $authSchemeMap;

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
            $normalizedAuthScheme  = $this->authSchemeMap[$authScheme] ?? $authScheme;

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
     * @param $authScheme
     * @param $identity
     *
     * @return bool
     */
    private function isCompatibleAuthScheme($authScheme, $identity): bool
    {
        if ($this->authSchemeMap !== self::$defaultAuthSchemeMap) {
            return true;
        }

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
