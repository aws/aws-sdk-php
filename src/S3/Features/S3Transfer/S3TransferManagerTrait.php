<?php

namespace Aws\S3\Features\S3Transfer;

use Aws\S3\S3Client;
use Aws\S3\S3ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;

trait S3TransferManagerTrait
{
    private static array $defaultConfig = [
        'targetPartSizeBytes' => 8 * 1024 * 1024,
        'multipartUploadThresholdBytes' => 16 * 1024 * 1024,
        'multipartDownloadThresholdBytes' => 16 * 1024 * 1024,
        'checksumValidationEnabled' => true,
        'checksumAlgorithm' => 'crc32',
        'multipartDownloadType' => 'partGet',
        'concurrency' => 5,
    ];

    /**
     * Returns a default instance of S3Client.
     *
     * @return S3Client
     */
    private function defaultS3Client(): S3ClientInterface
    {
        return new S3Client([]);
    }

    /**
     * Validates a provided value is not empty, and if so then
     * it throws an exception with the provided message.
     * @param mixed $value
     *
     * @return mixed
     */
    private function requireNonEmpty(mixed $value, string $message): mixed {
        if (empty($value)) {
            throw new \InvalidArgumentException($message);
        }

        return $value;
    }

    /**
     * Validates a string value is a valid S3 URI.
     * Valid S3 URI Example: S3://mybucket.dev/myobject.txt
     *
     * @param string $uri
     *
     * @return bool
     */
    private function isValidS3URI(string $uri): bool
    {
        // in the expression `substr($uri, 5)))` the 5 belongs to the size of `s3://`.
        return str_starts_with(strtolower($uri), 's3://')
            && count(explode('/', substr($uri, 5))) > 1;
    }

    /**
     * Converts a S3 URI into an array with a Bucket and Key
     * properties set.
     *
     * @param string $uri: The S3 URI.
     *
     * @return array
     */
    private function s3UriAsBucketAndKey(string $uri): array {
        $errorMessage = "Invalid URI: $uri. A valid S3 URI must be s3://bucket/key";
        if (!$this->isValidS3URI($uri)) {
            throw new \InvalidArgumentException($errorMessage);
        }

        $path = substr($uri, 5); // without s3://
        $parts = explode('/', $path, 2);

        if (count($parts) < 2) {
            throw new \InvalidArgumentException($errorMessage);
        }

        return [
            'Bucket' => $parts[0],
            'Key' => $parts[1],
        ];
    }

}