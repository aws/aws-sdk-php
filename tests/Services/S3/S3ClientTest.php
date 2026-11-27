<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Services\S3;

use Aws\Core\Checksum\RequestChecksumCalculation;
use Aws\Services\S3\Input\PutObjectRequest;
use Aws\Services\S3\S3Client;
use Aws\Services\S3\S3ClientConfig;
use Aws\Services\S3\Shape\ChecksumAlgorithm;
use Aws\Tests\Utils\Http\MockHttpClient;
use Aws\Tests\Utils\TemporaryAwsEnvironment;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Smithy\Auth\Aws\AwsCredentials;

/**
 * Verify default request checksums on the generated S3 client.
 *
 * With the default configuration a string body is hashed up front, so the
 * checksum travels as a header (not as an `aws-chunked` trailer).
 */
final class S3ClientTest extends TestCase
{
    private const BODY = 'hello checksum';

    public function testPutObjectSendsCrc32ByDefault(): void
    {
        $request = $this->putObject();

        self::assertSame(
            [\base64_encode(\pack('N', \crc32(self::BODY)))],
            $request->getHeader('x-amz-checksum-crc32')
        );
        self::assertSame(['CRC32'], $request->getHeader('x-amz-sdk-checksum-algorithm'));
        self::assertSame([], $request->getHeader('x-amz-trailer'));
    }

    public function testPutObjectSendsNoChecksumWhenRequired(): void
    {
        $request = $this->putObject(
            ['requestChecksumCalculation' => RequestChecksumCalculation::WHEN_REQUIRED]
        );

        self::assertSame([], $this->checksumHeaderNames($request));
    }

    public function testPutObjectSendsOnlyTheRequestedAlgorithm(): void
    {
        $request = $this->putObject([], ChecksumAlgorithm::sha256());

        self::assertSame(['x-amz-checksum-sha256'], $this->checksumHeaderNames($request));
        self::assertSame(
            [\base64_encode(\hash('sha256', self::BODY, true))],
            $request->getHeader('x-amz-checksum-sha256')
        );
    }

    /**
     * Return the names of the `x-amz-checksum-*` headers on a request.
     *
     * @return list<string>
     */
    private function checksumHeaderNames(RequestInterface $request): array
    {
        $names = [];
        foreach (\array_keys($request->getHeaders()) as $name) {
            if (\str_starts_with(\strtolower((string) $name), 'x-amz-checksum-')) {
                $names[] = \strtolower((string) $name);
            }
        }

        return $names;
    }

    /**
     * Send a small PutObject and return the request the transport saw.
     *
     * @param array<string, mixed> $config
     */
    private function putObject(
        array $config = [],
        ?ChecksumAlgorithm $algorithm = null
    ): RequestInterface
    {
        $http = new MockHttpClient();
        $http->willReturn('');

        TemporaryAwsEnvironment::run(
            static function () use ($http, $config, $algorithm): void {
                $client = new S3Client(new S3ClientConfig(...[
                    'region' => 'us-west-2',
                    'credentials' => new AwsCredentials('AKID', 'SECRET'),
                    'httpClient' => $http,
                    ...$config
                ]));
                $client->putObject(new PutObjectRequest(
                    bucket: 'bucket',
                    key: 'key',
                    body: self::BODY,
                    checksumAlgorithm: $algorithm
                ));
            }
        );

        $request = $http->sentRequests[0] ?? null;
        self::assertNotNull($request);

        return $request;
    }
}
