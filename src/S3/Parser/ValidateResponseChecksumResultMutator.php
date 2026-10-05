<?php

namespace Aws\S3\Parser;

use Aws\Api\Service;
use Aws\CommandInterface;
use Aws\HashingStream;
use Aws\PhpHash;
use Aws\ResultInterface;
use Aws\S3\CalculatesChecksumTrait;
use Aws\S3\Exception\S3Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * A custom s3 result mutator that validates the response checksums.
 *
 * @internal
 */
final class ValidateResponseChecksumResultMutator implements S3ResultMutator
{
    use CalculatesChecksumTrait;

    public const DEFAULT_VALIDATION_MODE = 'when_supported';

    /** @var Service $api */
    private $api;

    /** @var array $api */
    private $config;

    /**
     * @param Service $api
     * @param array $config
     */
    public function __construct(Service $api, array $config = [])
    {
        $this->api = $api;
        $this->config = $config;
    }

    /**
     * @param ResultInterface $result
     * @param CommandInterface|null $command
     * @param ResponseInterface|null $response
     *
     * @return ResultInterface
     */
    public function __invoke(
        ResultInterface $result,
        ?CommandInterface $command = null,
        ?ResponseInterface $response = null
    ): ResultInterface
    {
        $operation = $this->api->getOperation($command->getName());

        // Skip this middleware if the operation doesn't have an httpChecksum
        $checksumInfo = $operation['httpChecksum'] ?? null;
        if (is_null($checksumInfo)) {
            return $result;
        }

        $mode = $this->config['response_checksum_validation'] ?? self::DEFAULT_VALIDATION_MODE;
        $checksumModeEnabledMember = $checksumInfo['requestValidationModeMember'] ?? "";
        $checksumModeEnabled = strtolower($command[$checksumModeEnabledMember] ?? "");
        $responseAlgorithms = $checksumInfo['responseAlgorithms'] ?? [];
        $shouldSkipValidation = $this->shouldSkipValidation(
            $mode,
            $checksumModeEnabled,
            $responseAlgorithms
        );

        if ($shouldSkipValidation) {
            return $result;
        }

        $checksumPriority = $this->getChecksumPriority();
        $checksumsToCheck = array_intersect(
            $responseAlgorithms,
            array_map(
                'strtoupper',
                array_keys($checksumPriority)
            )
        );
        $checksumToValidate = $this->chooseChecksumHeaderToValidate(
            $checksumsToCheck,
            $response
        );
        if (empty($checksumToValidate)) {
            return $result;
        }

        $checksumHeaderValue = $response->getHeaderLine(
            'x-amz-checksum-' . $checksumToValidate
        );
        if (empty($checksumHeaderValue)) {
            return $result;
        }

        $checksumValidationInfo = [
            'checksum' => $checksumToValidate,
            'checksumHeaderValue' => $checksumHeaderValue,
        ];
        if ($this->isMultipartGetObject($command, $checksumValidationInfo)) {
            return $result;
        }

        $payloadMember = $operation->getOutput()['payload'] ?? null;
        $payload = $payloadMember !== null
            ? $result[$payloadMember]
            : null;
        if ($payload instanceof StreamInterface && !$payload->isSeekable()) {
            $result[$payloadMember] = $this->createChecksumValidatingStream(
                $payload,
                $checksumToValidate,
                $checksumHeaderValue,
                $command,
                $result
            );

            return $result;
        }

        $calculatedChecksumValue = $this->getEncodedValue(
            $checksumToValidate,
            $response->getBody()
        );
        if (!hash_equals($checksumHeaderValue, $calculatedChecksumValue)) {
            throw new S3Exception(
                "Calculated response checksum did not match the expected value",
                $command
            );
        }
        $result['ChecksumValidated'] = $checksumToValidate;

        return $result;
    }

    /**
     * @param StreamInterface $stream
     * @param string $checksum
     * @param string $checksumHeaderValue
     * @param CommandInterface $command
     * @param ResultInterface $result
     *
     * @return StreamInterface
     */
    private function createChecksumValidatingStream(
        StreamInterface $stream,
        string $checksum,
        string $checksumHeaderValue,
        CommandInterface $command,
        ResultInterface $result
    ): StreamInterface
    {
        $hashAlgorithm = strtolower($checksum);
        if ($hashAlgorithm === 'crc32') {
            $hashAlgorithm = 'crc32b';
        }

        return new HashingStream(
            $stream,
            new PhpHash($hashAlgorithm, ['base64' => true]),
            function ($calculatedChecksumValue) use (
                $checksum,
                $checksumHeaderValue,
                $command,
                $result
            ) {
                $checksumMatches = hash_equals(
                    $checksumHeaderValue,
                    $calculatedChecksumValue
                );
                if (!$checksumMatches) {
                    throw new S3Exception(
                        "Calculated response checksum did not match the expected value",
                        $command
                    );
                }

                $result['ChecksumValidated'] = $checksum;
            }
        );
    }

    /**
     * @param $checksumPriority
     * @param ResponseInterface $response
     *
     * @return string
     */
    private function chooseChecksumHeaderToValidate(
        $checksumPriority,
        ResponseInterface $response
    ): ?string
    {
        foreach ($checksumPriority as $checksum) {
            $checksumHeader = 'x-amz-checksum-' . $checksum;
            if ($response->hasHeader($checksumHeader)) {
                return $checksum;
            }
        }

        return null;
    }

    /**
     * @param string $mode
     * @param string $checksumModeEnabled
     * @param array $responseAlgorithms
     *
     * @return bool
     */
    private function shouldSkipValidation(
        string $mode,
        string $checksumModeEnabled,
        array $responseAlgorithms
    ): bool
    {
        return empty($responseAlgorithms)
            || ($mode === 'when_required' && $checksumModeEnabled !== 'enabled');
    }

    /**
     * @return string[]
     */
    private function getChecksumPriority(): array
    {
        return extension_loaded('awscrt')
            ? self::$supportedAlgorithms
            : array_slice(self::$supportedAlgorithms, 1);
    }

    /**
     * @param CommandInterface $command
     * @param array $checksumValidationInfo
     *
     * @return bool
     */
    private function isMultipartGetObject(
        CommandInterface $command,
        array $checksumValidationInfo
    ): bool
    {
        $isGetObject = $command->getName() === "GetObject";
        $hasChecksum = !empty($checksumValidationInfo['checksumHeaderValue']);
        if (!$isGetObject || !$hasChecksum) {
            return false;
        }

        $headerValue = $checksumValidationInfo['checksumHeaderValue'];
        $lastDashPos = strrpos($headerValue, '-');
        $endOfChecksum = substr($headerValue, $lastDashPos + 1);

        return is_numeric($endOfChecksum)
            && (int) $endOfChecksum > 1
            && (int) $endOfChecksum < 10000;
    }
}
