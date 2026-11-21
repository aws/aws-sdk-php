<?php

declare(strict_types=1);

namespace Aws\Core\Client;

use Smithy\Client\ClientInterface;

/**
 * Contract every AWS service client implements.
 *
 * Extends the base {@see ClientInterface} to narrow `getConfig()` to
 * {@see AbstractAwsClientConfig}. `executeOperation()` is inherited unchanged —
 * dispatch through the pipeline is the same operation, whether or not
 * the target service is AWS.
 */
interface AwsClientInterface extends ClientInterface
{
    /**
     * The AWS-narrowed configuration. Callers get `region`,
     * `credentialProvider`, `signingName`, etc. directly.
     */
    public function getConfig(): AbstractAwsClientConfig;

    /**
     * The untransformed specification serviceId (aws.api#service sdkId) of the
     * target service, for example "S3" or "SSO OIDC". The client and
     * namespace names are the PascalCase transform of this value.
     */
    public function sdkId(): string;
}
