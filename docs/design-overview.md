# Design overview

AWS SDK for PHP V4 is a developer preview. Names, signatures, and behavior
may change before release. Continue using V3 for production.

## Architecture

V4 is built in layers:

1. **Published Smithy PHP packages** provide the shared runtime: async,
   core, codec, http, protocol, protocol-aws, and client.
2. **AWS core** (`Aws\Core`) adds authentication, credentials, endpoint
   resolution, retries, checksums, and AWS protocol handling on top of
   those packages.
3. **Generated service clients** (for example `Aws\S3\S3Client`) are
   produced from Smithy models by the V4 code generator. Each client has
   a typed configuration class, typed input and output classes, and
   typed errors.

## What generated clients give you

- A configuration class per service, such as `S3ClientConfig`.
- One input class and one output class per operation.
- Read-only array access on outputs, plus `fromArray()` and `toArray()`
  at array boundaries. See [Typed operations](typed-operations.md).
- Cooperative concurrency behind ordinary method calls. See
  [Concurrency](concurrency.md).

## Preview services

The preview covers exactly five services: S3, STS, Lambda, EC2, and SSO and
SSO OIDC. See [Feature coverage](feature-coverage.md) for details and
exclusions.

## Related pages

- [Client configuration](client-configuration.md)
- [Migration from V3](migration-from-v3.md)
- [Feature coverage and open design areas](feature-coverage.md)
