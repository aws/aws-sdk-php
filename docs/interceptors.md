# Inspecting requests and responses

Status: **Implemented in development source, subject to change**

Interceptors observe or modify fixed stages of the client pipeline. Read hooks
are the appropriate choice for logging, metrics, tracing, request inspection,
and response inspection without changing the generated service API.

Applications normally extend `AbstractInterceptor` and override only the hooks
they need.

## Choose the right hook

Serialization and execution hooks run at most once per pipeline execution.
Attempt hooks repeat when the SDK retries:

| Hook | Frequency | Value available |
| --- | --- | --- |
| `readBeforeSerialization()` | At most once per execution | Typed operation input |
| `readAfterSerialization()` | At most once per execution | Serialized request before attempt preparation |
| `readBeforeSigning()` | Every attempt | Endpoint-resolved, unsigned request |
| `readAfterSigning()` | Every attempt | Signed request |
| `readBeforeTransmit()` | Every attempt | Final request immediately before transport |
| `readAfterTransmit()` | Every attempt with a response | Raw transport response |
| `readBeforeDeserialization()` | Every attempt with a response | Response after response modifiers |
| `readAfterDeserialization()` | Every attempt reaching deserialization | Typed output or deserialization error |
| `readAfterAttempt()` | Every attempt | Attempt output, response, and error |
| `readAfterExecution()` | Once per execution | Final output or error after retries |

Use `readBeforeSigning()` when an inspector does not need authentication
headers. Use `readBeforeTransmit()` only when the final wire request is
important. The latter can expose authorization material and other sensitive
headers.

## Inspect HTTP requests and responses

`RequestContext` and `ResponseContext` provide access to the underlying PSR-7
messages:

```php
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Interceptor\RequestContext;
use Smithy\Client\Interceptor\ResponseContext;

final class HttpInspectionInterceptor extends AbstractInterceptor
{
    /**
     * @param \Closure(string, array<string, mixed>): void $sink
     */
    public function __construct(
        private readonly \Closure $sink,
    ) {}

    public function readBeforeTransmit(RequestContext $ctx): void
    {
        $request = $ctx->getHttpRequest();

        ($this->sink)('request', [
            'operation' => $ctx->operation->getName(),
            'method' => $request->getMethod(),
            'origin' => self::origin($request->getUri()),
            'headerNames' => array_keys($request->getHeaders()),
        ]);
    }

    public function readAfterTransmit(ResponseContext $ctx): void
    {
        $response = $ctx->getHttpResponse();
        $requestId = $response->getHeaderLine('x-amz-request-id')
            ?: $response->getHeaderLine('x-amzn-requestid');

        ($this->sink)('response', [
            'operation' => $ctx->operation->getName(),
            'statusCode' => $response->getStatusCode(),
            'requestId' => $requestId !== '' ? $requestId : null,
            'headerNames' => array_keys($response->getHeaders()),
        ]);
    }

    private static function origin(
        \Psr\Http\Message\UriInterface $uri,
    ): string {
        return (string) $uri
            ->withUserInfo('')
            ->withPath('')
            ->withQuery('')
            ->withFragment('');
    }
}
```

The example records only header names and reduces the URI to its scheme and
authority. Production inspectors should define an explicit allowlist for every
path, header, or query value they retain.

Register the interceptor on an immutable client configuration:

```php
use Aws\S3\S3Client;
use Aws\S3\S3ClientConfig;

$config = (new S3ClientConfig(region: 'us-west-2'))
    ->withInterceptor(new HttpInspectionInterceptor(
        static function (string $event, array $context): void {
            // Send the event to an application-owned logger or telemetry sink.
        },
    ));

$s3 = new S3Client($config);
```

`withInterceptor()` appends to the existing chain.
`withPrependedInterceptor()` places an interceptor first, and
`withInterceptors()` replaces the chain. Reusable client features should
normally register interceptors through a plugin.

## Inspect the final result

`readAfterExecution()` runs once per pipeline execution after retries finish.
It can inspect the final typed output or error:

```php
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Interceptor\OutputContext;

final class CompletionInterceptor extends AbstractInterceptor
{
    public function readAfterExecution(
        OutputContext $ctx,
        ?\Throwable $error,
    ): void {
        if ($error !== null) {
            error_log(sprintf(
                '%s failed: %s',
                $ctx->operation->getName(),
                $error::class,
            ));

            return;
        }

        error_log(sprintf(
            '%s returned %s',
            $ctx->operation->getName(),
            $ctx->output !== null ? $ctx->output::class : 'no output',
        ));
    }
}
```

For attempt-level metrics, use `readAfterAttempt()` instead. A call that is
retried can produce several attempt events but only one execution event.

## Time a complete execution safely

A call wrapper encloses the complete retry loop. Keep per-call state in local
variables instead of mutable interceptor properties:

```php
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Interceptor\InputContext;
use Smithy\Core\Serde\SerializableStructInterface;

final class TimingInterceptor extends AbstractInterceptor
{
    public function interceptCalls(): bool
    {
        return true;
    }

    public function interceptCall(
        InputContext $ctx,
        callable $next,
    ): SerializableStructInterface {
        $started = hrtime(true);

        try {
            return $next($ctx);
        } finally {
            $durationMilliseconds =
                (hrtime(true) - $started) / 1_000_000;

            error_log(sprintf(
                '%s completed in %.2f ms',
                $ctx->operation->getName(),
                $durationMilliseconds,
            ));
        }
    }
}
```

Calling `$next($ctx)` twice performs two complete pipeline executions and can
duplicate side effects for non-idempotent operations.

## Do not consume bodies while inspecting

Request and response bodies may be streaming and non-seekable. Calling
`getContents()`, casting a body to a string, or otherwise reading it in a
request hook can change what is signed or transmitted. Reading a response body
before deserialization can consume bytes needed by the protocol decoder,
checksum validator, or application.

An inspector should normally record body size when known, content type, and
other safe metadata without reading the body itself. Capturing payloads should
require an explicit application-owned buffering policy and strict size and
redaction limits.

## Protect sensitive data

Generated shape debug output uses Smithy sensitivity metadata, but raw PSR-7
messages do not automatically redact themselves. Treat at least the following
as sensitive:

- Authorization and security-token headers.
- Cookies and bearer tokens.
- Presigned query parameters and credential-bearing URLs.
- Customer-provided encryption keys.
- Request and response bodies.
- Modeled headers or query values marked sensitive by a service.

Avoid logging the entire header map, URI, request object, response object, or
operation input through a generic object dumper.

## Keep read hooks reliable

A read hook can affect the operation if it throws. Logging and telemetry code
should catch failures from its external sink when losing an observation is
preferable to failing the AWS call.

Client interceptors are shared by concurrent fibers. Keep inspectors stateless,
or send records to a concurrency-safe external sink. Do not store one
operation's request, response, timer, or correlation state in a single mutable
interceptor property.

## HTTP-specific and transport-neutral interceptors

The `getHttpRequest()` and `getHttpResponse()` helpers require an HTTP
transport. An interceptor intended to support other Smithy transports should
inspect `TransportRequestInterface` and `TransportResponseInterface` instead
of assuming PSR-7 messages.
