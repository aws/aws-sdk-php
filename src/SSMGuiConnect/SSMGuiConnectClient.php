<?php
namespace Aws\SSMGuiConnect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS SSM-GUIConnect** service.
 * @method \Aws\Result deleteConnectionRecordingPreferences(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectionRecordingPreferences(array{ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionRecordingPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionRecordingPreferencesAsync(array{ClientToken?: string, ...} $args = [])
 * @method \Aws\Result getConnectionRecordingPreferences(array $args = [])
 * @phpstan-method \Aws\Result getConnectionRecordingPreferences(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionRecordingPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionRecordingPreferencesAsync(array{...} $args = [])
 * @method \Aws\Result updateConnectionRecordingPreferences(array $args = [])
 * @phpstan-method \Aws\Result updateConnectionRecordingPreferences(array{
 *     ClientToken?: string,
 *     ConnectionRecordingPreferences?: array{KMSKeyArn?: string, RecordingDestinations?: array{S3Buckets?: list<array>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionRecordingPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectionRecordingPreferencesAsync(array{
 *     ClientToken?: string,
 *     ConnectionRecordingPreferences?: array{KMSKeyArn?: string, RecordingDestinations?: array{S3Buckets?: list<array>, ...}, ...},
 *     ...,
 * } $args = [])
 */
class SSMGuiConnectClient extends AwsClient {}
