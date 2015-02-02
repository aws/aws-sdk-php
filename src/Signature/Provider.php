<?php
namespace Aws\Signature;

/**
 * Signature provider functions.
 */
class Provider
{
    /**
     * Creates a signature provider that caches previously created signature
     * objects.
     *
     * @param callable $provider Signature provider to wrap.
     *
     * @return callable
     */
    public static function memoize(callable $provider)
    {
        $cache = [];
        return function ($version, $service, $region) use (&$cache, $provider) {
            $key = "($version)($service)($region)";
            if (!isset($cache[$key])) {
                $cache[$key] = $provider($version, $service, $region);
            }
            return $cache[$key];
        };
    }

    /**
     * Signature provider that creates signature objects from a version string.
     *
     * This provider currently recognizes the following signature versions:
     *
     * - v4: Signature version 4.
     * - v2: Signature version 2.
     * - s3: Amazon S3 specific signature.
     * - anonymous: Does not sign requests.
     *
     * @return callable
     */
    public static function version()
    {
        return function ($version, $service, $region) {
            switch ($version) {
                case 'v4':
                    return $service === 's3'
                        ? new S3SignatureV4($service, $region)
                        : new SignatureV4($service, $region);
                case 's3':
                    return new S3Signature();
                case 'v2':
                    return new SignatureV2();
                case 'anonymous':
                    return new AnonymousSignature();
            }

            throw new \InvalidArgumentException("Unknown signature version: $version");
        };
    }
}
