<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Integ\Utils;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Smithy\Http\Client\Connection\ConnectionManagerInterface;
use Smithy\Http\Client\CurlClient;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Http\Client\HttpRequestOptions;

/**
 * Wrap the curl client and remember the last request's host, path and
 * checksum header names. Header values, query strings and bodies are not
 * kept, so no credential can end up in a test failure message.
 */
final class RecordingHttpClient implements HttpClientInterface
{
    private readonly HttpClientInterface $inner;

    private string $lastHost = '';
    private string $lastPath = '';

    /** @var list<string> */
    private array $lastChecksumHeaders = [];

    public function __construct(?HttpClientInterface $inner = null)
    {
        $this->inner = $inner ?? new CurlClient(preservePath: true);
    }

    /**
     * Return the host of the last request.
     */
    public function lastHost(): string
    {
        return $this->lastHost;
    }

    /**
     * Return the path of the last request.
     */
    public function lastPath(): string
    {
        return $this->lastPath;
    }

    /**
     * Return the names of the `x-amz-checksum-*` headers on the last request.
     *
     * @return list<string>
     */
    public function lastChecksumHeaders(): array
    {
        return $this->lastChecksumHeaders;
    }

    public function getDefaultRequestOptions(): HttpRequestOptions
    {
        return $this->inner->getDefaultRequestOptions();
    }

    public function sendRequest(
        RequestInterface $request,
        ?HttpRequestOptions $options = null
    ): ResponseInterface
    {
        $this->lastHost = $request->getUri()->getHost();
        $this->lastPath = $request->getUri()->getPath();
        $this->lastChecksumHeaders = [];
        foreach (\array_keys($request->getHeaders()) as $name) {
            if (\str_starts_with(\strtolower((string) $name), 'x-amz-checksum-')) {
                $this->lastChecksumHeaders[] = \strtolower((string) $name);
            }
        }

        return $this->inner->sendRequest($request, $options);
    }

    public function getConnectionManager(): ConnectionManagerInterface
    {
        return $this->inner->getConnectionManager();
    }

    public function close(): void
    {
        $this->inner->close();
    }
}
