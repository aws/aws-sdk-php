<?php
declare(strict_types=1);

/**
 * Fixture for validating the `@phpstan-method` shape annotations on
 * generated client classes.
 *
 * This file is not a test in the PHPUnit sense. It is a consumer-style
 * code sample that PHPStan and Psalm parse to verify:
 *
 *   1. Generated annotations don't trigger InvalidDocblock errors.
 *   2. Valid keys are accepted without warnings.
 *   3. Wrong value types on a known key are flagged.
 *   4. Extra keys not in the shape are NOT flagged (unsealed shapes work).
 *   5. Dynamically-built array variables are NOT flagged (optional-key
 *      calibration accepts general arrays).
 *   6. Omitting a "required" key is NOT flagged (we intentionally make
 *      every key optional in the docblock).
 *
 * Run from the SDK root:
 *   vendor/bin/phpstan analyze tests/Build/PhpStan/fixture.php
 *   vendor/bin/psalm  --root=. tests/Build/PhpStan/fixture.php
 *
 * PHPStan must be >= 2.2 (where bare `...` unsealed array shapes landed).
 * Psalm must be >= 5.
 */

namespace Aws\Test\Build\PhpStan;

use Aws\DynamoDb\DynamoDbClient;
use Aws\S3\S3Client;
use Aws\Sqs\SqsClient;

function fixture_s3(S3Client $s3): void
{
    // (1) Inline literal with valid keys. Should infer types correctly.
    $s3->getObject([
        'Bucket' => 'my-bucket',
        'Key' => 'path/to/file.txt',
    ]);

    // (2) Required key omitted. Should NOT be flagged because we render
    //     every member as optional.
    $s3->getObject([
        'Key' => 'path/to/file.txt',
    ]);

    // (3) Extra key not in the shape. Should NOT be flagged because the
    //     shape is unsealed (trailing `...`).
    $s3->getObject([
        'Bucket' => 'my-bucket',
        'Key' => 'path/to/file.txt',
        'NotARealOption' => 'some value',
    ]);

    // (4) Dynamically-built array passed as $args. Should NOT be flagged.
    /** @var array<string, mixed> $dynamic */
    $dynamic = [];
    $dynamic['Bucket'] = 'my-bucket';
    $dynamic['Key'] = 'path/to/file.txt';
    $s3->getObject($dynamic);

    // (5) Wrong value type on a known key. PHPStan SHOULD flag this with
    //     `expects string, int given`. Commented out by default so the
    //     fixture stays clean; uncomment to manually verify.
    //
    // $s3->getObject([
    //     'Bucket' => 'my-bucket',
    //     'Key' => 12345, // intentionally wrong: Key expects string
    // ]);
}

function fixture_dynamodb(DynamoDbClient $ddb): void
{
    $ddb->putItem([
        'TableName' => 'Users',
        'Item' => ['UserId' => ['S' => 'abc-123']],
    ]);

    // Extra key (unsealed acceptance).
    $ddb->putItem([
        'TableName' => 'Users',
        'Item' => ['UserId' => ['S' => 'abc-123']],
        'NotARealOption' => true,
    ]);

    // Empty-input operation: should accept any array without flagging.
    $ddb->describeLimits([]);
}

function fixture_sqs(SqsClient $sqs): void
{
    $sqs->sendMessage([
        'QueueUrl' => 'https://sqs.us-east-1.amazonaws.com/123/my-queue',
        'MessageBody' => 'hello world',
    ]);

    // Required key omitted (all-optional calibration).
    $sqs->sendMessage([]);
}
