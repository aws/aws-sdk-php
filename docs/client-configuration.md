# Client configuration

Status: **Proposed and subject to change**

V4 service clients use service-specific configuration objects with native PHP
types and named arguments.

## Basic configuration

```php
use Aws\Lambda\LambdaClient;
use Aws\Lambda\LambdaClientConfig;

$lambda = new LambdaClient(new LambdaClientConfig(
    region: 'us-east-1',
));
```

When region or credentials are not supplied explicitly, the client resolves
them from the standard AWS configuration sources. See
[Credentials and regions](credentials-and-regions.md).

Configuration remains separate from operation input. The client owns region,
retry mode, endpoint options, and HTTP behavior.

## Service-specific options

Generated configuration can include endpoint parameters modeled for a service.
For example, an S3 client may expose S3-specific options alongside common AWS
configuration:

```php
use Aws\S3\S3Client;
use Aws\S3\S3ClientConfig;

$s3 = new S3Client(new S3ClientConfig(
    region: 'us-west-2',
    forcePathStyle: true,
    useDualStack: true,
    retryMode: 'standard',
    maxAttempts: 3,
));
```

## Explicit dependencies

Applications and frameworks can provide:

- Credential and identity resolvers.
- HTTP clients and HTTP configuration.
- Protocol implementations and protocol resolvers.
- Retry strategies.
- Interceptors and plugins.
- Transports.

The client supplies defaults for these extension points. Applications do not
assemble the pipeline for common calls.

Protocol implementations implement `Smithy\Protocol\ProtocolInterface`.
Protocol selection components implement
`Smithy\Client\Protocol\ProtocolResolverInterface`.

Custom endpoint configuration for generated AWS clients is still an open
design area and is not presented here as a settled API.

## Immutable changes

Configuration objects expose copy methods for common changes:

```php
$fipsConfig = $config
    ->withRegion('us-east-2')
    ->withUseFips(true)
    ->withMaxAttempts(4);
```

The original configuration is unchanged. A client retains the configuration
and resources with which it was constructed.

## Client reuse

Clients are long-lived, reusable, and safe to call from concurrent fibers.
Configuration makes ownership of resources such as HTTP connection pools
explicit so applications can share or isolate them intentionally.
