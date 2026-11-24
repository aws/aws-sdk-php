<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Utils\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Smithy\Http\Client\{
    HttpClientInterface,
    HttpRequestOptions
};
use Smithy\Http\Client\Connection\ConnectionManagerInterface;
use Smithy\Http\Message\Response;

/**
 * Scriptable in-memory HTTP client for tests.
 *
 * Supports queued responses, queued exceptions, and queued handlers while
 * recording every request/options pair that reached the transport boundary.
 */
class MockHttpClient implements HttpClientInterface
{
    private ?HttpRequestOptions $defaultOptions = null;
    private ?ConnectionManagerInterface $connectionManager = null;

    /**
     * @var list<ResponseInterface|\Throwable|callable(
     *     RequestInterface,
     *     HttpRequestOptions,
     *     self
     * ): ResponseInterface>
     */
    private array $queue = [];

    /**
     * @var ResponseInterface|\Throwable|callable(
     *     RequestInterface,
     *     HttpRequestOptions,
     *     self
     * ): ResponseInterface|null
     */
    private mixed $fallback = null;

    /** @var list<RequestInterface> */
    public array $sentRequests = [];

    /** @var list<HttpRequestOptions> */
    public array $sentOptions = [];

    public int $sendCallCount = 0;

    public function queueResponse(
        ResponseInterface|string $response = '',
        int $status = 200,
        array $headers = []
    ): self
    {
        $this->queue[] = $this->normalizeResponse($response, $status, $headers);

        return $this;
    }

    public function queueException(\Throwable $error): self
    {
        $this->queue[] = $error;

        return $this;
    }

    /**
     * @param callable(
     *     RequestInterface,
     *     HttpRequestOptions,
     *     self
     * ): ResponseInterface $handler
     */
    public function queueHandler(callable $handler): self
    {
        $this->queue[] = $handler;

        return $this;
    }

    public function fallbackResponse(
        ResponseInterface|string $response = '',
        int $status = 200,
        array $headers = []
    ): self
    {
        $this->fallback = $this->normalizeResponse(
            $response,
            $status,
            $headers
        );

        return $this;
    }

    public function fallbackException(\Throwable $error): self
    {
        $this->fallback = $error;

        return $this;
    }

    /**
     * @param callable(
     *     RequestInterface,
     *     HttpRequestOptions,
     *     self
     * ): ResponseInterface $handler
     */
    public function fallbackHandler(callable $handler): self
    {
        $this->fallback = $handler;

        return $this;
    }

    public function willReturn(
        string $body = '',
        int $status = 200,
        array $headers = []
    ): self
    {
        return $this->queueResponse($body, $status, $headers);
    }

    public function willThrow(\Throwable $error): self
    {
        return $this->queueException($error);
    }

    public function reset(): self
    {
        $this->queue = [];
        $this->fallback = null;
        $this->sentRequests = [];
        $this->sentOptions = [];
        $this->sendCallCount = 0;

        return $this;
    }

    /** @return list<RequestInterface> */
    public function getSentRequests(): array
    {
        return $this->sentRequests;
    }

    public function getLastRequest(): ?RequestInterface
    {
        return $this->sentRequests === []
            ? null
            : $this->sentRequests[\count($this->sentRequests) - 1];
    }

    public function getDefaultRequestOptions(): HttpRequestOptions
    {
        return $this->defaultOptions ??= new HttpRequestOptions();
    }

    public function withDefaultRequestOptions(
        HttpRequestOptions $options
    ): self
    {
        $this->defaultOptions = $options;

        return $this;
    }

    /** @return list<HttpRequestOptions> */
    public function getSentOptions(): array
    {
        return $this->sentOptions;
    }

    public function sendRequest(
        RequestInterface $request,
        ?HttpRequestOptions $options = null
    ): ResponseInterface
    {
        $options ??= $this->getDefaultRequestOptions();
        ++$this->sendCallCount;
        $this->sentRequests[] = $request;
        $this->sentOptions[] = $options;

        if ($this->queue !== []) {
            return $this->resolveScriptEntry(
                \array_shift($this->queue),
                $request,
                $options
            );
        }

        if ($this->fallback !== null) {
            return $this->resolveScriptEntry(
                $this->fallback,
                $request,
                $options
            );
        }

        return new Response(200, [], 'default');
    }

    /** @inheritDoc */
    public function getConnectionManager(): ConnectionManagerInterface
    {
        return $this->connectionManager ??= new MockConnectionManager();
    }

    /** @inheritDoc */
    public function close(): void {}

    private function normalizeResponse(
        ResponseInterface|string $response,
        int $status,
        array $headers
    ): ResponseInterface
    {
        if ($response instanceof ResponseInterface) {
            return $response;
        }

        return new Response($status, $headers, $response);
    }

    /**
     * @param ResponseInterface|\Throwable|callable(
     *     RequestInterface,
     *     HttpRequestOptions,
     *     self
     * ): ResponseInterface $entry
     */
    private function resolveScriptEntry(
        mixed $entry,
        RequestInterface $request,
        HttpRequestOptions $options
    ): ResponseInterface
    {
        if ($entry instanceof \Throwable) {
            throw $entry;
        }

        if ($entry instanceof ResponseInterface) {
            return $entry;
        }

        return $entry($request, $options, $this);
    }
}
