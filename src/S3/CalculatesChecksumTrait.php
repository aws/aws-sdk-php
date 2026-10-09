<?php
namespace Aws\S3;

use AWS\CRT\CRT;
use Aws\Exception\CommonRuntimeException;
use GuzzleHttp\Psr7;
use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;

trait CalculatesChecksumTrait
{
    public static array $supportedAlgorithms = [
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

        if (isset(self::$supportedAlgorithms[$requestedAlgorithm])) {
            $isCrtAlgorithm = $requestedAlgorithm === 'crc32c'
                || $requestedAlgorithm === 'crc32';
            if ($useCrt && $isCrtAlgorithm) {
                return self::getCrtEncodedValue($requestedAlgorithm, $value);
            }

            if ($requestedAlgorithm === 'crc32c') {
                throw new CommonRuntimeException(
                    "crc32c is not supported for checksums "
                    . "without use of the common runtime for php.  Please enable the CRT or choose "
                    . "a different algorithm."
                );
            }

            if ($requestedAlgorithm === "crc32") {
                $requestedAlgorithm = "crc32b";
            }

            return base64_encode(
                Psr7\Utils::hash(
                    Psr7\Utils::streamFor($value),
                    $requestedAlgorithm,
                    true
                )
            );
        }

        $validAlgorithms = implode(', ', array_keys(self::$supportedAlgorithms));
        throw new InvalidArgumentException(
            "Invalid checksum requested: {$requestedAlgorithm}."
            . "  Valid algorithms supported by the runtime are {$validAlgorithms}."
        );
    }

    /**
     * @param string $requestedAlgorithm
     * @param mixed $value
     *
     * @return string
     */
    private static function getCrtEncodedValue(
        string $requestedAlgorithm,
        $value
    ): string
    {
        $crt = new Crt();
        $stream = $value instanceof StreamInterface ? $value : null;
        $position = $stream !== null && $stream->isSeekable()
            ? $stream->tell()
            : null;

        try {
            $input = $stream !== null ? (string) $stream : $value;
            $checksum = $requestedAlgorithm === 'crc32c'
                ? $crt::crc32c($input)
                : $crt::crc32($input);

            return base64_encode(pack('N*', $checksum));
        } finally {
            if ($position !== null) {
                $stream->seek($position);
            }
        }
    }

    /**
     * Returns the first checksum available, if available.
     *
     * @param array $parameters
     *
     * @return string|null
     */
    public static function filterChecksum(array $parameters): ?string
    {
        foreach (self::$supportedAlgorithms as $algorithm => $_) {
            $checksumAlgorithm = "Checksum" . strtoupper($algorithm);
            if (isset($parameters[$checksumAlgorithm])) {
                return $checksumAlgorithm;
            }
        }

        return null;
    }
}
