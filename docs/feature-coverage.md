# Feature coverage and open design areas

V4 is a developer preview. Coverage is limited and may change.

## Preview services

The preview includes exactly these five services:

| Service | Client |
| --- | --- |
| Amazon S3 | `Aws\S3\S3Client` |
| AWS STS | `Aws\Sts\StsClient` |
| AWS Lambda | `Aws\Lambda\LambdaClient` |
| Amazon EC2 | `Aws\Ec2\Ec2Client` |
| AWS SSO and SSO OIDC | `Aws\SSO\SSOClient`, `Aws\SSOOIDC\SSOOIDCClient` |

## Exclusions

Every other AWS service is excluded from the preview. Use V3 for them.
Also excluded from the preview:

- Production use. V3 is the supported SDK.
- A stable API. Names and signatures may change.
- Generated clients for services outside the five above.

## Open design areas

Share feedback on open areas through
[How to provide feedback](feedback.md).
