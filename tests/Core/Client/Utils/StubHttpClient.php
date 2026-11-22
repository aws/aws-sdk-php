<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client\Utils;

use Psr\Http\Message\RequestInterface;
use Smithy\Http\Client\Connection\ConnectionManagerInterface;
use Smithy\Http\Client\HttpClientInterface;
use Smithy\Http\Client\HttpRequestOptions;
use Smithy\Http\Message\Response;
use Smithy\Http\Message\ResponseInterface;

/**
 * HTTP client that answers every request with an empty 200 response.
 */
final class StubHttpClient implements HttpClientInterface
{
    public function getDefaultRequestOptions(): HttpRequestOptions
    {
        return new HttpRequestOptions();
    }

    public function sendRequest(
        RequestInterface $request,
        ?HttpRequestOptions $options = null
    ): ResponseInterface
    {
        return new Response();
    }

    public function sendMulti(
        array $requests,
        ?HttpRequestOptions $options = null
    ): array
    {
        return [];
    }

    public function getConnectionManager(): ConnectionManagerInterface
    {
        throw new \LogicException('Not used in this test.');
    }

    public function close(): void {}
}
