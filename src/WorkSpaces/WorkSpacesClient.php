<?php
namespace Aws\WorkSpaces;

use Aws\AwsClient;

/**
 * Amazon WorkSpaces client.
 *
 * @method \Aws\Result createWorkspaces(array $args = [])
 * @method \Aws\Result describeWorkspaceBundles(array $args = [])
 * @method \Aws\Result describeWorkspaceDirectories(array $args = [])
 * @method \Aws\Result describeWorkspaces(array $args = [])
 * @method \Aws\Result rebootWorkspaces(array $args = [])
 * @method \Aws\Result rebuildWorkspaces(array $args = [])
 * @method \Aws\Result terminateWorkspaces(array $args = [])
 */
class WorkSpacesClient extends AwsClient {}
