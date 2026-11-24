<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Utils\Http;

use Psr\Http\Message\{
    RequestInterface,
    StreamInterface,
    UriInterface
};

final readonly class GenericPsrRequest implements RequestInterface
{
    public function __construct(private RequestInterface $request) {}

    public function getRequestTarget(): string
    {
        return $this->request->getRequestTarget();
    }

    public function withRequestTarget(string $requestTarget): static
    {
        return new self($this->request->withRequestTarget($requestTarget));
    }

    public function getMethod(): string
    {
        return $this->request->getMethod();
    }

    public function withMethod(string $method): static
    {
        return new self($this->request->withMethod($method));
    }

    public function getUri(): UriInterface
    {
        return $this->request->getUri();
    }

    public function withUri(
        UriInterface $uri,
        bool $preserveHost = false
    ): static
    {
        return new self($this->request->withUri($uri, $preserveHost));
    }

    public function getProtocolVersion(): string
    {
        return $this->request->getProtocolVersion();
    }

    public function withProtocolVersion(string $version): static
    {
        return new self($this->request->withProtocolVersion($version));
    }

    public function getHeaders(): array
    {
        return $this->request->getHeaders();
    }

    public function hasHeader(string $name): bool
    {
        return $this->request->hasHeader($name);
    }

    public function getHeader(string $name): array
    {
        return $this->request->getHeader($name);
    }

    public function getHeaderLine(string $name): string
    {
        return $this->request->getHeaderLine($name);
    }

    public function withHeader(string $name, $value): static
    {
        return new self($this->request->withHeader($name, $value));
    }

    public function withAddedHeader(string $name, $value): static
    {
        return new self($this->request->withAddedHeader($name, $value));
    }

    public function withoutHeader(string $name): static
    {
        return new self($this->request->withoutHeader($name));
    }

    public function getBody(): StreamInterface
    {
        return $this->request->getBody();
    }

    public function withBody(StreamInterface $body): static
    {
        return new self($this->request->withBody($body));
    }
}
