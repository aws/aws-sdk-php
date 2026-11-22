<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Generated\Protocol;

use Aws\Tests\Core\Integ\Retry\Generated\Exception\ModeledRetryableException;
use Aws\Tests\Core\Integ\Retry\Generated\Exception\ModeledThrottlingException;
use Aws\Tests\Core\Integ\Retry\Generated\Output\RetryFixtureOutput;
use Smithy\Core\Endpoint\Endpoint;
use Smithy\Core\Exception\ApiException;
use Smithy\Core\Exception\ErrorFault;
use Smithy\Core\Serde\SerializableStructInterface;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Core\Transport\{
    MessageExchangeInterface,
    TransportRequestInterface,
    TransportResponseInterface
};
use Smithy\Http\Message\{
    HttpMessageExchange,
    HttpTransportRequest,
    HttpTransportResponse,
    Request,
    Uri
};
use Smithy\Protocol\ProtocolInterface;

final class RetryFixtureProtocol implements ProtocolInterface
{
    public function getId(): string
    {
        return 'aws.tests.retry#retryFixture';
    }

    public function getMessageExchange(): MessageExchangeInterface
    {
        return HttpMessageExchange::instance();
    }

    public function serializeRequest(
        OperationInterface $operation,
        SerializableStructInterface $input
    ): TransportRequestInterface
    {
        return new HttpTransportRequest(new Request(
            'POST',
            new Uri('/' . $operation->getName()),
            [],
            $operation->getName()
        ));
    }

    public function setServiceEndpoint(
        TransportRequestInterface $request,
        Endpoint $endpoint
    ): TransportRequestInterface
    {
        $request = HttpTransportRequest::expect($request);
        $endpointUri = new Uri($endpoint->url);
        $requestUri = $request->request->getUri();

        return $request->withRequest(
            $request->request->withUri($endpointUri->withPath(
                \rtrim($endpointUri->getPath(), '/')
                    . $requestUri->getPath()
            ))
        );
    }

    public function deserializeResponse(
        OperationInterface $operation,
        TransportResponseInterface $response
    ): SerializableStructInterface
    {
        $response = HttpTransportResponse::expect($response)->response;
        $statusCode = $response->getStatusCode();
        $body = (string) $response->getBody();

        if ($statusCode < 300) {
            return new RetryFixtureOutput($body === '' ? null : $body);
        }

        return match ($body) {
            'modeled-retryable' => throw new ModeledRetryableException(
                'modeled-retryable',
                ErrorFault::Client
            ),
            'modeled-throttling' => throw new ModeledThrottlingException(
                'modeled-throttling',
                ErrorFault::Client
            ),
            default => throw new ApiException(
                $body === '' ? 'error' : $body,
                ErrorFault::Server
            ),
        };
    }
}
