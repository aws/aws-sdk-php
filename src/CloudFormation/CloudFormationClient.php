<?php
namespace Aws\CloudFormation;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudFormation** service.
 *
 * @method \Aws\Result cancelUpdateStack(array $args = [])
 * @method \Aws\Result createStack(array $args = [])
 * @method \Aws\Result deleteStack(array $args = [])
 * @method \Aws\Result describeStackEvents(array $args = [])
 * @method \Aws\Result describeStackResource(array $args = [])
 * @method \Aws\Result describeStackResources(array $args = [])
 * @method \Aws\Result describeStacks(array $args = [])
 * @method \Aws\Result estimateTemplateCost(array $args = [])
 * @method \Aws\Result getStackPolicy(array $args = [])
 * @method \Aws\Result getTemplate(array $args = [])
 * @method \Aws\Result getTemplateSummary(array $args = [])
 * @method \Aws\Result listStackResources(array $args = [])
 * @method \Aws\Result listStacks(array $args = [])
 * @method \Aws\Result setStackPolicy(array $args = [])
 * @method \Aws\Result signalResource(array $args = [])
 * @method \Aws\Result updateStack(array $args = [])
 * @method \Aws\Result validateTemplate(array $args = [])
 */
class CloudFormationClient extends AwsClient {}
