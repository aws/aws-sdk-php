# Credentials and regions

Status: **Implemented in development source, subject to change**

Generated service configuration accepts explicit region and credentials. It
also supports standard AWS environment and shared-configuration sources.

## Region resolution

An explicit region takes precedence:

```php
$s3 = new S3Client(new S3ClientConfig(
    region: 'us-west-2',
));
```

When `region` is omitted, the resolution order is:

1. `AWS_REGION`
2. `AWS_DEFAULT_REGION`
3. `region` in the selected shared configuration profile

Client construction fails when none of these sources supplies a region.

## Default credential chain

When `credentials` is omitted, the default chain resolves credentials from:

- Environment variables.
- Static, session, `credential_process`, web identity, assume-role, and SSO
  profile configuration.
- ECS container credentials.
- EC2 instance metadata.

Resolved identities are cached and refreshable identities are refreshed
through their provider. Applications should not read credentials and copy
their values into long-lived configuration merely to use the standard chain.

## Explicit providers

Frameworks and applications can inject an identity resolver:

```php
$config = new S3ClientConfig(
    region: 'us-west-2',
    credentials: $credentialProvider,
);
```

A raw AWS credential identity can also be supplied and is adapted to the same
provider contract. Production applications should avoid embedding access keys
in source code.

## Construction-time configuration

Environment and shared-profile configuration are resolved when client
configuration is constructed. Long-running processes that change profiles or
environment variables must construct a new configuration and client. Existing
clients retain their original configuration.
