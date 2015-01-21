<?php
namespace Aws\Signature;

/**
 * Signature provider functions.
 */
class Provider
{
    /**
     * Creates a Signature object from a signature version name.
     *
     * This provider currently supports: v2, v4, and s3 signature versions. The
     * $config array supports the following values:
     *
     * - service: The service name that the signer is signing for.
     * - region: The region name that the signer is signing for.
     *
     * @param string $signatureVersion Signature version to create.
     * @param array  $config           Associative array of signature options.
     *
     * @return SignatureInterface
     */
    public static function fromVersion($signatureVersion, array $config = [])
    {
        switch ($signatureVersion) {
            case 'v4':
                return self::createV4($config);
            case 's3':
                return new S3Signature();
            case 'v2':
                return new SignatureV2();
        }

        throw new \InvalidArgumentException("Unknown signature version: $signatureVersion");
    }

    private static function createV4(array $config)
    {
        foreach (['service', 'region'] as $key) {
            if (!isset($config[$key])) {
                throw new \InvalidArgumentException("{$key} is required");
            }
        }

        switch ($config['service']) {
            case 's3':
                return new S3SignatureV4($config['service'], $config['region']);
            default:
                return new SignatureV4($config['service'], $config['region']);
        }
    }
}
