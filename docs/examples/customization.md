# Configuration and customization

Status: **Illustrative proposal**

## Common runtime behavior

```php
use Aws\S3\S3Client;
use Aws\S3\S3ClientConfig;
use Smithy\Http\Client\Configuration\ConnectionManagerConfiguration;
use Smithy\Http\Client\Configuration\HttpClientConfiguration;
use Smithy\Http\Client\HttpRequestOptions;

$s3 = new S3Client(new S3ClientConfig(
    region: 'us-west-2',
    useDualStack: true,
    retryMode: 'standard',
    maxAttempts: 3,
    httpClientConfig: new HttpClientConfiguration(
        connectionManagerConfig: new ConnectionManagerConfiguration(
            maxConcurrency: 50,
        ),
        defaultOptions: new HttpRequestOptions(
            timeout: 30,
            readTimeout: 10,
        ),
    ),
));
```

## Service-specific endpoint behavior

```php
$pathStyleS3 = new S3Client(new S3ClientConfig(
    region: 'us-west-2',
    forcePathStyle: true,
));
```

Generated configuration exposes the dependency injection points described in
[Client configuration](../client-configuration.md), including protocol
implementations and resolvers. Custom endpoint configuration for generated AWS
clients remains under design.

See [Request and response inspection](interceptors.md) for an interceptor
example.
