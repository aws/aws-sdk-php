<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Integ\Retry\Utils;

use Aws\Core\Exception\AwsException;
use Psr\Http\Message\StreamInterface;
use Smithy\Core\Endpoint\Endpoint;
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

/**
 * Protocol that sends a fixed body and can fail on server errors.
 */
final class TestRetryProtocol implements ProtocolInterface
{
    public function getId(): string
    {
        return 'smithy.tests#retryTest';
    }

    public function getMessageExchange(): MessageExchangeInterface
    {
        return HttpMessageExchange::instance();
    }

    public function __construct(
        private readonly string|StreamInterface|null $body = '',
        private readonly bool $failOnServerError = false
    ) {}

    public function serializeRequest(
        OperationInterface $operation,
        SerializableStructInterface $input,
    ): TransportRequestInterface
    {
        return new HttpTransportRequest(
            new Request('POST', new Uri('/'), [], $this->body)
        );
    }

    public function setServiceEndpoint(
        TransportRequestInterface $request,
        Endpoint $endpoint,
    ): TransportRequestInterface
    {
        $request = HttpTransportRequest::expect($request);

        return $request->withRequest(
            $request->request->withUri(new Uri($endpoint->url))
        );
    }

    public function deserializeResponse(
        OperationInterface $operation,
        TransportResponseInterface $response,
    ): SerializableStructInterface
    {
        $response = HttpTransportResponse::expect($response)->response;

        if ($this->failOnServerError && $response->getStatusCode() >= 500) {
            throw new AwsException(
                message: (string) $response->getBody(),
                fault: ErrorFault::Server,
                awsErrorCode: 'InternalError',
                requestId: 'abc123',
                httpStatusCode: $response->getStatusCode()
            );
        }

        return TestOutput::create();
    }
}
