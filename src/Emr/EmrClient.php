<?php
namespace Aws\Emr;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic MapReduce (Amazon EMR)** service.
 *
 * @method \Aws\Result addInstanceGroups(array $args = [])
 * @method \Aws\Result addJobFlowSteps(array $args = [])
 * @method \Aws\Result addTags(array $args = [])
 * @method \Aws\Result describeCluster(array $args = [])
 * @method \Aws\Result describeJobFlows(array $args = [])
 * @method \Aws\Result describeStep(array $args = [])
 * @method \Aws\Result listBootstrapActions(array $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @method \Aws\Result listInstanceGroups(array $args = [])
 * @method \Aws\Result listInstances(array $args = [])
 * @method \Aws\Result listSteps(array $args = [])
 * @method \Aws\Result modifyInstanceGroups(array $args = [])
 * @method \Aws\Result removeTags(array $args = [])
 * @method \Aws\Result runJobFlow(array $args = [])
 * @method \Aws\Result setTerminationProtection(array $args = [])
 * @method \Aws\Result setVisibleToAllUsers(array $args = [])
 * @method \Aws\Result terminateJobFlows(array $args = [])
 */
class EmrClient extends AwsClient {}
