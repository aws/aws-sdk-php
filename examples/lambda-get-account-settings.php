<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

/**
 * Smoke test: hit AWS Lambda's GetAccountSettings live.
 *
 * Exercises the entire v4 pipeline end-to-end — serialization,
 * endpoint resolution via the compiled BDD bytecode, SigV4 signing
 * via {@see \Smithy\Auth\Aws\SigV4Signer}, transport via
 * {@see \Smithy\Http\Curl\CurlClient}, and deserialization of the
 * restJson1 response body.
 *
 * Usage:
 *   export AWS_ACCESS_KEY_ID=...
 *   export AWS_SECRET_ACCESS_KEY=...
 *   export AWS_SESSION_TOKEN=...   # optional (STS-derived)
 *   php examples/lambda-get-account-settings.php [region]
 */

require __DIR__ . '/../vendor/autoload.php';

use Aws\Core\Credentials\Provider\EnvCredentialProvider;
use Aws\Services\Lambda\LambdaClient;
use Aws\Services\Lambda\LambdaClientConfig;

$region = $argv[1] ?? getenv('AWS_REGION') ?: 'us-east-1';

$client = new LambdaClient(new LambdaClientConfig(
    region: $region,
    credentials: new EnvCredentialProvider(),
));

echo "Calling Lambda GetAccountSettings in region: {$region}\n";

try {
    $response = $client->getAccountSettings();
} catch (\Throwable $e) {
    fwrite(STDERR, "Request failed: {$e->getMessage()}\n");
    fwrite(STDERR, $e->getTraceAsString() . "\n");
    exit(1);
}

echo "\n=== AccountLimit ===\n";
if ($response->accountLimit !== null) {
    foreach ((array) $response->accountLimit as $k => $v) {
        printf("  %s = %s\n", $k, is_scalar($v) ? (string) $v : json_encode($v));
    }
} else {
    echo "  (none)\n";
}

echo "\n=== AccountUsage ===\n";
if ($response->accountUsage !== null) {
    foreach ((array) $response->accountUsage as $k => $v) {
        printf("  %s = %s\n", $k, is_scalar($v) ? (string) $v : json_encode($v));
    }
} else {
    echo "  (none)\n";
}

echo "\nOK\n";
