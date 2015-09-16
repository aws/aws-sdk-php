<?php
namespace Aws\Emr;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic MapReduce (Amazon EMR)** service.
 *
 * @method \Aws\Result addInstanceGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise addInstanceGroupsAsync(array $args = [])
 * @method \Aws\Result addJobFlowSteps(array $args = [])
 * @method \GuzzleHttp\Promise\Promise addJobFlowStepsAsync(array $args = [])
 * @method \Aws\Result addTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @method \Aws\Result describeCluster(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @method \Aws\Result describeJobFlows(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobFlowsAsync(array $args = [])
 * @method \Aws\Result describeStep(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStepAsync(array $args = [])
 * @method \Aws\Result listBootstrapActions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listBootstrapActionsAsync(array $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @method \Aws\Result listInstanceGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstanceGroupsAsync(array $args = [])
 * @method \Aws\Result listInstances(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstancesAsync(array $args = [])
 * @method \Aws\Result listSteps(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listStepsAsync(array $args = [])
 * @method \Aws\Result modifyInstanceGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyInstanceGroupsAsync(array $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @method \Aws\Result runJobFlow(array $args = [])
 * @method \GuzzleHttp\Promise\Promise runJobFlowAsync(array $args = [])
 * @method \Aws\Result setTerminationProtection(array $args = [])
 * @method \GuzzleHttp\Promise\Promise setTerminationProtectionAsync(array $args = [])
 * @method \Aws\Result setVisibleToAllUsers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise setVisibleToAllUsersAsync(array $args = [])
 * @method \Aws\Result terminateJobFlows(array $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateJobFlowsAsync(array $args = [])
 */
class EmrClient extends AwsClient {}
