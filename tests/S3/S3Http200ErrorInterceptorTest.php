<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\S3;

use Aws\Core\S3\S3ErrorInterceptor;
use Aws\Core\S3\S3Http200ErrorInterceptor;
use Aws\Tests\S3\Utils\AwsExceptionOperation;
use Aws\Tests\S3\Utils\S3TestClient;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Smithy\Client\Interceptor\OutputContext;
use Smithy\Client\Interceptor\ResponseContext;
use Smithy\Core\Exception\ApiException;
use Smithy\Core\Retry\RetrySafety;
use Smithy\Core\Shape\OperationInterface;
use Smithy\Http\Message\HttpTransportRequest;
use Smithy\Http\Message\HttpTransportResponse;
use Smithy\Http\Message\Request;
use Smithy\Http\Message\Response;
use Smithy\Protocol\Aws\AwsProtocolException;

/**
 * Verify S3 handling of HTTP 200 responses that carry an `Error` body.
 */
#[CoversClass(S3Http200ErrorInterceptor::class)]
final class S3Http200ErrorInterceptorTest extends TestCase
{
    private const INTERNAL_ERROR_BODY = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"
        . '<Error>'
        . '<Code>InternalError</Code>'
        . '<Message>We encountered an internal error. Please try again.</Message>'
        . '<RequestId>656c76696e6727732072657175657374</RequestId>'
        . '<HostId>Uuag1LuByRx9e6j5Onimru9pO4ZVKnJ2Qz7</HostId>'
        . '</Error>';

    private const SLOW_DOWN_BODY = '<Error>'
        . '<Code>SlowDown</Code>'
        . '<Message>Please reduce your request rate.</Message>'
        . '</Error>';

    private S3TestClient $client;

    protected function setUp(): void
    {
        $this->client = S3TestClient::forModel();
    }

    public function testInternalErrorBodyBecomesRetryableError(): void
    {
        $error = $this->raise(
            'ListObjectsV2',
            new Response(200, [], self::INTERNAL_ERROR_BODY)
        );

        $this->assertSame('InternalError', $error->getAwsErrorCode());
        $this->assertSame(
            'We encountered an internal error. Please try again.',
            $error->getMessage()
        );
        $this->assertSame(
            '656c76696e6727732072657175657374',
            $error->getAwsRequestId()
        );
        $this->assertSame(200, $error->getHttpStatusCode());
        $this->assertSame(
            'Uuag1LuByRx9e6j5Onimru9pO4ZVKnJ2Qz7',
            $error->getExtendedRequestId()
        );
        $this->assertSame(RetrySafety::Yes, $error->getRetrySafety());
        $this->assertFalse($error->isThrottle());
    }

    public function testSlowDownBodyBecomesRetryableThrottle(): void
    {
        $error = $this->raise(
            'DeleteObjects',
            new Response(200, [], self::SLOW_DOWN_BODY)
        );

        $this->assertSame('SlowDown', $error->getAwsErrorCode());
        $this->assertSame(
            'Please reduce your request rate.',
            $error->getMessage()
        );
        $this->assertSame(RetrySafety::Yes, $error->getRetrySafety());
        $this->assertTrue($error->isThrottle());
    }

    public function testUnknownCodeBecomesNonRetryableError(): void
    {
        $error = $this->raise(
            'ListObjectsV2',
            new Response(
                200,
                [],
                '<Error><Code>SomethingNew</Code>'
                    . '<Message>An unexpected error.</Message></Error>'
            )
        );

        $this->assertSame('SomethingNew', $error->getAwsErrorCode());
        $this->assertSame('An unexpected error.', $error->getMessage());
        $this->assertSame(RetrySafety::No, $error->getRetrySafety());
        $this->assertFalse($error->isThrottle());
    }

    public function testMissingCodeAndMessageUseDefaultMessage(): void
    {
        $error = $this->raise(
            'ListObjectsV2',
            new Response(200, [], '<Error></Error>')
        );

        $this->assertNull($error->getAwsErrorCode());
        $this->assertSame('HTTP 200: Unknown', $error->getMessage());
    }

    public function testMissingHostIdLeavesExtendedRequestIdNull(): void
    {
        $error = $this->raise(
            'DeleteObjects',
            new Response(200, [], self::SLOW_DOWN_BODY)
        );

        $this->assertNull($error->getExtendedRequestId());
    }

    public function testModeledOperationRaisesGenericErrorWithoutServiceClass(): void
    {
        $operation = $this->client->operation('ListObjectsV2');

        try {
            (new S3Http200ErrorInterceptor())->readBeforeDeserialization(
                $this->responseContext(
                    $operation,
                    new Response(200, [], self::SLOW_DOWN_BODY)
                )
            );
            $this->fail('Expected a 200-with-error to raise an error.');
        } catch (ApiException $error) {
            $this->assertSame(ApiException::class, $error::class);
            $this->assertSame(
                'Please reduce your request rate.',
                $error->getMessage()
            );
            $this->assertSame(RetrySafety::Yes, $error->getRetrySafety());
            $this->assertTrue($error->isThrottle());
        }
    }

    public function testDeleteResultWithNestedErrorIsNotRaised(): void
    {
        $this->assertNoErrorRaised(
            'DeleteObjects',
            new Response(
                200,
                [],
                '<?xml version="1.0" encoding="UTF-8"?>'
                    . '<DeleteResult xmlns="http://s3.amazonaws.com/doc/2006-03-01/">'
                    . '<Deleted><Key>sample1.txt</Key></Deleted>'
                    . '<Error><Key>sample2.txt</Key>'
                    . '<Code>AccessDenied</Code>'
                    . '<Message>Access Denied</Message></Error>'
                    . '</DeleteResult>'
            )
        );
    }

    public function testExpiredToken206OnGetObjectIsNotRaised(): void
    {
        $this->assertNoErrorRaised(
            'GetObject',
            new Response(
                206,
                [],
                '<?xml version="1.0" encoding="UTF-8"?>'
                    . '<Error><Code>ExpiredToken</Code>'
                    . '<Message>The provided token has expired.</Message></Error>'
            )
        );
    }

    public function testErrorBodyOnStreamingOperationIsNotRaised(): void
    {
        $this->assertNoErrorRaised(
            'GetObject',
            new Response(200, [], self::INTERNAL_ERROR_BODY)
        );
    }

    public function testErrorBodyOnStringPayloadOperationIsNotRaised(): void
    {
        $this->assertNoErrorRaised(
            'GetBucketPolicy',
            new Response(200, [], self::INTERNAL_ERROR_BODY)
        );
    }

    public function testNonErrorBodyIsNotRaised(): void
    {
        $this->assertNoErrorRaised(
            'ListObjectsV2',
            new Response(
                200,
                [],
                '<?xml version="1.0" encoding="UTF-8"?>'
                    . '<ListBucketResult><Name>b</Name></ListBucketResult>'
            )
        );
    }

    public function testNonXmlBodyIsNotRaised(): void
    {
        $this->assertNoErrorRaised(
            'ListObjectsV2',
            new Response(200, [], 'not xml at all')
        );
    }

    public function testMalformedErrorBodyIsNotRaised(): void
    {
        $this->assertNoErrorRaised(
            'ListObjectsV2',
            new Response(200, [], '<Error><Code>SlowDown</Error>')
        );
    }

    public function testOversizedBodyIsNotRaised(): void
    {
        $this->assertNoErrorRaised(
            'ListObjectsV2',
            new Response(
                200,
                [],
                '<Error><Code>SlowDown</Code><Message>'
                    . \str_repeat('a', 262144)
                    . '</Message></Error>'
            )
        );
    }

    public function testEmptyBodyIsNotRaised(): void
    {
        $this->assertNoErrorRaised(
            'ListObjectsV2',
            new Response(200, [], '')
        );
    }

    /**
     * Run `readBeforeDeserialization` and return the raised AWS error.
     */
    private function raise(
        string $operationName,
        Response $response
    ): AwsProtocolException
    {
        $operation = new AwsExceptionOperation(
            $this->client->operation($operationName)
        );
        try {
            (new S3Http200ErrorInterceptor())->readBeforeDeserialization(
                $this->responseContext($operation, $response)
            );
        } catch (AwsProtocolException $error) {
            $this->decorateExtendedRequestId($operation, $response, $error);

            return $error;
        }

        $this->fail('Expected a 200-with-error to raise an AWS error.');
    }

    /**
     * Assert that `readBeforeDeserialization` raises nothing for `$response`.
     *
     * @return void
     */
    private function assertNoErrorRaised(
        string $operationName,
        Response $response
    ): void
    {
        (new S3Http200ErrorInterceptor())->readBeforeDeserialization(
            $this->responseContext(
                $this->client->operation($operationName),
                $response
            )
        );

        $this->addToAssertionCount(1);
    }

    /**
     * Run the sibling interceptor so the raised error carries the extended
     * request ID, matching the full plugin pipeline.
     *
     * @return void
     */
    private function decorateExtendedRequestId(
        OperationInterface $operation,
        Response $response,
        AwsProtocolException $error
    ): void
    {
        try {
            (new S3ErrorInterceptor())->modifyBeforeAttemptCompletion(
                new OutputContext(
                    $operation,
                    $operation->createInput([]),
                    $this->client->getConfig(),
                    null,
                    new HttpTransportResponse($response),
                    null
                ),
                $error
            );
        } catch (AwsProtocolException) {
        }
    }

    private function responseContext(
        OperationInterface $operation,
        Response $response
    ): ResponseContext
    {
        return new ResponseContext(
            $operation,
            $operation->createInput([]),
            $this->client->getConfig(),
            new HttpTransportRequest(Request::fromNormalized(
                'GET',
                'https://s3.us-east-1.amazonaws.com/'
            )),
            new HttpTransportResponse($response)
        );
    }
}
