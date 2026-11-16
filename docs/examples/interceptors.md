# Request and response inspection

Status: **Illustrative proposal**

```php
use Aws\S3\Input\HeadObjectRequest;
use Aws\S3\S3Client;
use Aws\S3\S3ClientConfig;
use Smithy\Client\Interceptor\AbstractInterceptor;
use Smithy\Client\Interceptor\RequestContext;
use Smithy\Client\Interceptor\ResponseContext;

final class StatusInterceptor extends AbstractInterceptor
{
    public function readBeforeTransmit(RequestContext $ctx): void
    {
        $request = $ctx->getHttpRequest();

        printf(
            "Sending %s for %s\n",
            $request->getMethod(),
            $ctx->operation->getName(),
        );
    }

    public function readAfterTransmit(ResponseContext $ctx): void
    {
        $response = $ctx->getHttpResponse();

        printf(
            "%s attempt returned HTTP %d\n",
            $ctx->operation->getName(),
            $response->getStatusCode(),
        );
    }
}

$config = (new S3ClientConfig(region: 'us-west-2'))
    ->withInterceptor(new StatusInterceptor());

$s3 = new S3Client($config);

$s3->headObject(new HeadObjectRequest(
    bucket: 'example-bucket',
    key: 'documents/example.txt',
));
```

Example output for a successful request without retries:

```text
Sending HEAD for HeadObject
HeadObject attempt returned HTTP 200
```

Both hooks run once per attempt, so retries can produce more than one request
and response event for a single operation call.

The example deliberately does not read message bodies or log URI query
strings, header values, or credentials.
