<?php
namespace Aws\Efs;

use Aws\AwsClient;

/**
 * This client is used to interact with **Amazon EFS**.
 *
 * @method \Aws\Result createFileSystem(array $args = [])
 * @method \Aws\Result createMountTarget(array $args = [])
 * @method \Aws\Result createTags(array $args = [])
 * @method \Aws\Result deleteFileSystem(array $args = [])
 * @method \Aws\Result deleteMountTarget(array $args = [])
 * @method \Aws\Result deleteTags(array $args = [])
 * @method \Aws\Result describeFileSystems(array $args = [])
 * @method \Aws\Result describeMountTargetSecurityGroups(array $args = [])
 * @method \Aws\Result describeMountTargets(array $args = [])
 * @method \Aws\Result describeTags(array $args = [])
 * @method \Aws\Result modifyMountTargetSecurityGroups(array $args = [])
 */
class EfsClient extends AwsClient {}
