<?php
namespace Aws\Support;

use Aws\AwsClient;

/**
 * AWS Support client.
 *
 * @method \Aws\Result addAttachmentsToSet(array $args = [])
 * @method \Aws\Result addCommunicationToCase(array $args = [])
 * @method \Aws\Result createCase(array $args = [])
 * @method \Aws\Result describeAttachment(array $args = [])
 * @method \Aws\Result describeCases(array $args = [])
 * @method \Aws\Result describeCommunications(array $args = [])
 * @method \Aws\Result describeServices(array $args = [])
 * @method \Aws\Result describeSeverityLevels(array $args = [])
 * @method \Aws\Result describeTrustedAdvisorCheckRefreshStatuses(array $args = [])
 * @method \Aws\Result describeTrustedAdvisorCheckResult(array $args = [])
 * @method \Aws\Result describeTrustedAdvisorCheckSummaries(array $args = [])
 * @method \Aws\Result describeTrustedAdvisorChecks(array $args = [])
 * @method \Aws\Result refreshTrustedAdvisorCheck(array $args = [])
 * @method \Aws\Result resolveCase(array $args = [])
 */
class SupportClient extends AwsClient {}
