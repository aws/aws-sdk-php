<?php
namespace Aws\CodeDeploy;

use Aws\AwsClient;

/**
 * This client is used to interact with AWS CodeDeploy
 *
 * @method \Aws\Result addTagsToOnPremisesInstances(array $args = [])
 * @method \Aws\Result batchGetApplications(array $args = [])
 * @method \Aws\Result batchGetDeployments(array $args = [])
 * @method \Aws\Result batchGetOnPremisesInstances(array $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @method \Aws\Result createDeployment(array $args = [])
 * @method \Aws\Result createDeploymentConfig(array $args = [])
 * @method \Aws\Result createDeploymentGroup(array $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @method \Aws\Result deleteDeploymentConfig(array $args = [])
 * @method \Aws\Result deleteDeploymentGroup(array $args = [])
 * @method \Aws\Result deregisterOnPremisesInstance(array $args = [])
 * @method \Aws\Result getApplication(array $args = [])
 * @method \Aws\Result getApplicationRevision(array $args = [])
 * @method \Aws\Result getDeployment(array $args = [])
 * @method \Aws\Result getDeploymentConfig(array $args = [])
 * @method \Aws\Result getDeploymentGroup(array $args = [])
 * @method \Aws\Result getDeploymentInstance(array $args = [])
 * @method \Aws\Result getOnPremisesInstance(array $args = [])
 * @method \Aws\Result listApplicationRevisions(array $args = [])
 * @method \Aws\Result listApplications(array $args = [])
 * @method \Aws\Result listDeploymentConfigs(array $args = [])
 * @method \Aws\Result listDeploymentGroups(array $args = [])
 * @method \Aws\Result listDeploymentInstances(array $args = [])
 * @method \Aws\Result listDeployments(array $args = [])
 * @method \Aws\Result listOnPremisesInstances(array $args = [])
 * @method \Aws\Result registerApplicationRevision(array $args = [])
 * @method \Aws\Result registerOnPremisesInstance(array $args = [])
 * @method \Aws\Result removeTagsFromOnPremisesInstances(array $args = [])
 * @method \Aws\Result stopDeployment(array $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @method \Aws\Result updateDeploymentGroup(array $args = [])
 */
class CodeDeployClient extends AwsClient {}
