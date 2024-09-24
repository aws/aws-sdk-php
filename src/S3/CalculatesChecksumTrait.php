<?php
namespace Aws\S3;

use AWS\CRT\CRT;
use Aws\Exception\CommonRuntimeException;
use GuzzleHttp\Psr7;
use InvalidArgumentException;

trait CalculatesChecksumTrait
{
    private static $supportedAlgorithms = [
        'crc32c' => true,
        'crc32' => true,
        'sha256' => true,
        'sha1' => true
    ];

    /**
     * @param string $requestedAlgorithm  the algorithm to encode with
     * @param string $value               the value to be encoded
     * @return string
     */
    public static function getEncodedValue($requestedAlgorithm, $value) {
        $requestedAlgorithm = strtolower($requestedAlgorithm);
        $useCrt = extension_loaded('awscrt');

        if (array_key_exists($requestedAlgorithm, self::$supportedAlgorithms)) {
            if ($useCrt) {
                $crt = new Crt();
                switch ($requestedAlgorithm) {
                    case 'crc32c':
                        return base64_encode(pack('N*',($crt::crc32c($value))));
                    case 'crc32':
                        return base64_encode(pack('N*',($crt::crc32($value))));
                    default:
                        break;
                }
            }

            if ($requestedAlgorithm === 'crc32c') {
                throw new CommonRuntimeException("crc32c is not supported for checksums "
                    . "without use of the common runtime for php.  Please enable the CRT or choose "
                    . "a different algorithm."
                );
            }

            if ($requestedAlgorithm === "crc32") {
                $requestedAlgorithm = "crc32b";
            }
            return base64_encode(Psr7\Utils::hash($value, $requestedAlgorithm, true));
        }

        throw new InvalidArgumentException(
            "Invalid checksum requested: {$requestedAlgorithm}."
            . "  Valid algorithms are CRC32C, CRC32, SHA256, and SHA1."
        );
    }
}
