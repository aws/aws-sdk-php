<?php
namespace Aws\DirectoryService;

use Aws\AwsClient;

/**
 * AWS Directory Service client
 *
 * @method \Aws\Result connectDirectory(array $args = [])
 * @method \GuzzleHttp\Promise\Promise connectDirectoryAsync(array $args = [])
 * @method \Aws\Result createAlias(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @method \Aws\Result createComputer(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createComputerAsync(array $args = [])
 * @method \Aws\Result createDirectory(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectoryAsync(array $args = [])
 * @method \Aws\Result createMicrosoftAD(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createMicrosoftADAsync(array $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSnapshotAsync(array $args = [])
 * @method \Aws\Result createTrust(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrustAsync(array $args = [])
 * @method \Aws\Result deleteDirectory(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDirectoryAsync(array $args = [])
 * @method \Aws\Result deleteSnapshot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSnapshotAsync(array $args = [])
 * @method \Aws\Result deleteTrust(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrustAsync(array $args = [])
 * @method \Aws\Result describeDirectories(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDirectoriesAsync(array $args = [])
 * @method \Aws\Result describeSnapshots(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSnapshotsAsync(array $args = [])
 * @method \Aws\Result describeTrusts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTrustsAsync(array $args = [])
 * @method \Aws\Result disableRadius(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disableRadiusAsync(array $args = [])
 * @method \Aws\Result disableSso(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disableSsoAsync(array $args = [])
 * @method \Aws\Result enableRadius(array $args = [])
 * @method \GuzzleHttp\Promise\Promise enableRadiusAsync(array $args = [])
 * @method \Aws\Result enableSso(array $args = [])
 * @method \GuzzleHttp\Promise\Promise enableSsoAsync(array $args = [])
 * @method \Aws\Result getDirectoryLimits(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDirectoryLimitsAsync(array $args = [])
 * @method \Aws\Result getSnapshotLimits(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSnapshotLimitsAsync(array $args = [])
 * @method \Aws\Result restoreFromSnapshot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreFromSnapshotAsync(array $args = [])
 * @method \Aws\Result updateRadius(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRadiusAsync(array $args = [])
 * @method \Aws\Result verifyTrust(array $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyTrustAsync(array $args = [])
 */
class DirectoryServiceClient extends AwsClient {}
