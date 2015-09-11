<?php
namespace Aws\Swf;

use Aws\AwsClient;

/**
 * Amazon Simple Workflow Service (Amazon SWF) client.
 *
 * @method \Aws\Result countClosedWorkflowExecutions(array $args = [])
 * @method \Aws\Result countOpenWorkflowExecutions(array $args = [])
 * @method \Aws\Result countPendingActivityTasks(array $args = [])
 * @method \Aws\Result countPendingDecisionTasks(array $args = [])
 * @method \Aws\Result deprecateActivityType(array $args = [])
 * @method \Aws\Result deprecateDomain(array $args = [])
 * @method \Aws\Result deprecateWorkflowType(array $args = [])
 * @method \Aws\Result describeActivityType(array $args = [])
 * @method \Aws\Result describeDomain(array $args = [])
 * @method \Aws\Result describeWorkflowExecution(array $args = [])
 * @method \Aws\Result describeWorkflowType(array $args = [])
 * @method \Aws\Result getWorkflowExecutionHistory(array $args = [])
 * @method \Aws\Result listActivityTypes(array $args = [])
 * @method \Aws\Result listClosedWorkflowExecutions(array $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @method \Aws\Result listOpenWorkflowExecutions(array $args = [])
 * @method \Aws\Result listWorkflowTypes(array $args = [])
 * @method \Aws\Result pollForActivityTask(array $args = [])
 * @method \Aws\Result pollForDecisionTask(array $args = [])
 * @method \Aws\Result recordActivityTaskHeartbeat(array $args = [])
 * @method \Aws\Result registerActivityType(array $args = [])
 * @method \Aws\Result registerDomain(array $args = [])
 * @method \Aws\Result registerWorkflowType(array $args = [])
 * @method \Aws\Result requestCancelWorkflowExecution(array $args = [])
 * @method \Aws\Result respondActivityTaskCanceled(array $args = [])
 * @method \Aws\Result respondActivityTaskCompleted(array $args = [])
 * @method \Aws\Result respondActivityTaskFailed(array $args = [])
 * @method \Aws\Result respondDecisionTaskCompleted(array $args = [])
 * @method \Aws\Result signalWorkflowExecution(array $args = [])
 * @method \Aws\Result startWorkflowExecution(array $args = [])
 * @method \Aws\Result terminateWorkflowExecution(array $args = [])
 */
class SwfClient extends AwsClient {}
