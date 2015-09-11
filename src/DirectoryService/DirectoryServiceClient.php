<?php
namespace Aws\DirectoryService;

use Aws\AwsClient;

/**
 * AWS Directory Service client
 *
 * @method \Aws\Result connectDirectory(array $args = [])
 * @method \Aws\Result createAlias(array $args = [])
 * @method \Aws\Result createComputer(array $args = [])
 * @method \Aws\Result createDirectory(array $args = [])
 * @method \Aws\Result createSnapshot(array $args = [])
 * @method \Aws\Result deleteDirectory(array $args = [])
 * @method \Aws\Result deleteSnapshot(array $args = [])
 * @method \Aws\Result describeDirectories(array $args = [])
 * @method \Aws\Result describeSnapshots(array $args = [])
 * @method \Aws\Result disableRadius(array $args = [])
 * @method \Aws\Result disableSso(array $args = [])
 * @method \Aws\Result enableRadius(array $args = [])
 * @method \Aws\Result enableSso(array $args = [])
 * @method \Aws\Result getDirectoryLimits(array $args = [])
 * @method \Aws\Result getSnapshotLimits(array $args = [])
 * @method \Aws\Result restoreFromSnapshot(array $args = [])
 * @method \Aws\Result updateRadius(array $args = [])
 */
class DirectoryServiceClient extends AwsClient {}
