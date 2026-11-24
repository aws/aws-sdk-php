<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Services\S3;

use Aws\Core\S3\S3ErrorInterceptor;
use Aws\Tests\Services\S3\Utils\S3TestClient;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Smithy\Client\Interceptor\OutputContext;
use Smithy\Core\Exception\ApiException;
use Smithy\Http\Message\HttpTransportResponse;
use Smithy\Http\Message\Response;
use Smithy\Protocol\Aws\AwsDocumentException;
use Smithy\Protocol\Aws\AwsErrorInterface;
use Smithy\Protocol\Aws\AwsExtendedRequestIdInterface;

/**
 * Verify S3 status-based error inference and extended request IDs.
 */
#[CoversClass(S3ErrorInterceptor::class)]
final class S3ErrorInterceptorTest extends TestCase
{
    private const HEADERS = [
        'x-amz-request-id' => 'req-1',
        'x-amz-id-2' => 'host-1'
    ];

    private S3TestClient $client;

    protected function setUp(): void
    {
        $this->client = S3TestClient::forModel();
    }

    public function testEmptyBody404BecomesNotFound(): void
    {
        $error = $this->complete(
            'HeadObject',
            new Response(404, self::HEADERS, '')
        );

        $this->assertSame('NotFound', $error->getAwsErrorCode());
        $this->assertSame('req-1', $error->getAwsRequestId());
        $this->assertSame(404, $error->getHttpStatusCode());
        $this->assertSame('HTTP 404: NotFound', $error->getMessage());
        $this->assertSame('host-1', $error->getExtendedRequestId());
    }

    public function testEmptyBodyNon404KeepsUnmodeledError(): void
    {
        $error = $this->complete(
            'HeadObject',
            new Response(403, self::HEADERS, '')
        );

        $this->assertSame('Unknown', $error->getAwsErrorCode());
        $this->assertSame(403, $error->getHttpStatusCode());
        $this->assertSame('HTTP 403: Unknown', $error->getMessage());
        $this->assertSame('host-1', $error->getExtendedRequestId());
    }

    public function testModeledErrorTakesHostIdFromBody(): void
    {
        $error = $this->complete(
            'GetObject',
            new Response(
                404,
                [],
                '<Error><Code>NoSuchKey</Code>'
                    . '<Message>The specified key does not exist.</Message>'
                    . '<RequestId>req-2</RequestId>'
                    . '<HostId>host-2</HostId></Error>'
            )
        );

        $this->assertSame('NoSuchKey', $error->getAwsErrorCode());
        $this->assertSame('req-2', $error->getAwsRequestId());
        $this->assertSame(
            'The specified key does not exist.',
            $error->getMessage()
        );
        $this->assertSame('host-2', $error->getExtendedRequestId());
    }

    public function testModeledDynamicErrorGetsExtendedRequestId(): void
    {
        $error = $this->complete(
            'GetObjectAcl',
            new Response(
                404,
                [],
                '<Error><Code>NoSuchKey</Code><Message>m</Message>'
                    . '<RequestId>req-3</RequestId>'
                    . '<HostId>host-3</HostId></Error>'
            )
        );

        $this->assertInstanceOf(AwsDocumentException::class, $error);
        $this->assertSame('NoSuchKey', $error->getAwsErrorCode());
        $this->assertSame('req-3', $error->getAwsRequestId());
        $this->assertSame('host-3', $error->getExtendedRequestId());
    }

    public function testErrorWithBodyKeepsItsCode(): void
    {
        $error = $this->complete(
            'HeadObject',
            new Response(
                403,
                self::HEADERS,
                '<Error><Code>AccessDenied</Code>'
                    . '<Message>Access Denied</Message></Error>'
            )
        );

        $this->assertSame('AccessDenied', $error->getAwsErrorCode());
        $this->assertSame('Access Denied', $error->getMessage());
        $this->assertSame('host-1', $error->getExtendedRequestId());
    }

    public function testBodyWithoutHostIdLeavesExtendedRequestIdNull(): void
    {
        $error = $this->complete(
            'GetObject',
            new Response(
                404,
                [],
                '<Error><Code>NoSuchKey</Code><Message>m</Message></Error>'
            )
        );

        $this->assertNull($error->getExtendedRequestId());
    }

    public function testMalformedBodyLeavesExtendedRequestIdNull(): void
    {
        $error = $this->complete(
            'GetObject',
            new Response(500, [], '<Error><HostId>h</Error>')
        );

        $this->assertNull($error->getExtendedRequestId());
    }

    public function testReturnsOutputWhenThereIsNoError(): void
    {
        $operation = $this->client->operation('ListObjectsV2');
        $output = $operation->createOutput([]);

        $this->assertSame(
            $output,
            (new S3ErrorInterceptor())->modifyBeforeAttemptCompletion(
                new OutputContext(
                    $operation,
                    $operation->createInputFromValue([]),
                    $this->client->getConfig(),
                    null,
                    new HttpTransportResponse(new Response(200, [], '')),
                    $output
                ),
                null
            )
        );
    }

    /**
     * Deserialize `$response` with the S3 protocol and run the attempt
     * completion hook on the resulting error.
     */
    private function complete(
        string $operationName,
        Response $response
    ): AwsErrorInterface&AwsExtendedRequestIdInterface&ApiException
    {
        $operation = $this->client->operation($operationName);
        $input = $operation->createInputFromValue([]);
        $transportResponse = new HttpTransportResponse($response);
        try {
            $this->client->getConfig()->getProtocol()->deserializeResponse(
                $operation,
                $transportResponse
            );
            $this->fail('Expected an error response.');
        } catch (ApiException $error) {
        }

        try {
            (new S3ErrorInterceptor())->modifyBeforeAttemptCompletion(
                new OutputContext(
                    $operation,
                    $input,
                    $this->client->getConfig(),
                    null,
                    $transportResponse,
                    null
                ),
                $error
            );
        } catch (ApiException $completed) {
            return $completed;
        }

        $this->fail('Expected the hook to rethrow an S3 error.');
    }
}
