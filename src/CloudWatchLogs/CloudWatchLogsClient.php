<?php
namespace Aws\CloudWatchLogs;

use Aws\AwsClient;
use Aws\CommandInterface;
use Generator;

/**
 * This client is used to interact with the **Amazon CloudWatch Logs** service.
 *
 * @method \Aws\Result associateKmsKey(array $args = [])
 * @phpstan-method \Aws\Result associateKmsKey(array{logGroupName?: string, kmsKeyId?: string, resourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateKmsKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateKmsKeyAsync(array{logGroupName?: string, kmsKeyId?: string, resourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result associateSourceToS3TableIntegration(array $args = [])
 * @phpstan-method \Aws\Result associateSourceToS3TableIntegration(array{integrationArn?: string, dataSource?: array{name?: string, type?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSourceToS3TableIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSourceToS3TableIntegrationAsync(array{integrationArn?: string, dataSource?: array{name?: string, type?: string, ...}, ...} $args = [])
 * @method \Aws\Result cancelExportTask(array $args = [])
 * @phpstan-method \Aws\Result cancelExportTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelExportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelExportTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result cancelImportTask(array $args = [])
 * @phpstan-method \Aws\Result cancelImportTask(array{importId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelImportTaskAsync(array{importId?: string, ...} $args = [])
 * @method \Aws\Result createDelivery(array $args = [])
 * @phpstan-method \Aws\Result createDelivery(array{
 *     deliverySourceName?: string,
 *     deliveryDestinationArn?: string,
 *     recordFields?: list<string>,
 *     fieldDelimiter?: string,
 *     s3DeliveryConfiguration?: array{suffixPath?: string, enableHiveCompatiblePath?: bool, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDeliveryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDeliveryAsync(array{
 *     deliverySourceName?: string,
 *     deliveryDestinationArn?: string,
 *     recordFields?: list<string>,
 *     fieldDelimiter?: string,
 *     s3DeliveryConfiguration?: array{suffixPath?: string, enableHiveCompatiblePath?: bool, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExportTask(array $args = [])
 * @phpstan-method \Aws\Result createExportTask(array{
 *     taskName?: string,
 *     logGroupName?: string,
 *     logStreamNamePrefix?: string,
 *     from?: int,
 *     to?: int,
 *     destination?: string,
 *     destinationPrefix?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExportTaskAsync(array{
 *     taskName?: string,
 *     logGroupName?: string,
 *     logStreamNamePrefix?: string,
 *     from?: int,
 *     to?: int,
 *     destination?: string,
 *     destinationPrefix?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createImportTask(array $args = [])
 * @phpstan-method \Aws\Result createImportTask(array{
 *     importSourceArn?: string,
 *     importRoleArn?: string,
 *     importFilter?: array{startEventTime?: int, endEventTime?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createImportTaskAsync(array{
 *     importSourceArn?: string,
 *     importRoleArn?: string,
 *     importFilter?: array{startEventTime?: int, endEventTime?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLogAnomalyDetector(array $args = [])
 * @phpstan-method \Aws\Result createLogAnomalyDetector(array{
 *     logGroupArnList?: list<string>,
 *     detectorName?: string,
 *     evaluationFrequency?: 'FIFTEEN_MIN'|'FIVE_MIN'|'ONE_HOUR'|'ONE_MIN'|'TEN_MIN'|'THIRTY_MIN',
 *     filterPattern?: string,
 *     kmsKeyId?: string,
 *     anomalyVisibilityTime?: int,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLogAnomalyDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLogAnomalyDetectorAsync(array{
 *     logGroupArnList?: list<string>,
 *     detectorName?: string,
 *     evaluationFrequency?: 'FIFTEEN_MIN'|'FIVE_MIN'|'ONE_HOUR'|'ONE_MIN'|'TEN_MIN'|'THIRTY_MIN',
 *     filterPattern?: string,
 *     kmsKeyId?: string,
 *     anomalyVisibilityTime?: int,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLogGroup(array $args = [])
 * @phpstan-method \Aws\Result createLogGroup(array{
 *     logGroupName?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     logGroupClass?: 'DELIVERY'|'INFREQUENT_ACCESS'|'STANDARD',
 *     deletionProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLogGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLogGroupAsync(array{
 *     logGroupName?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     logGroupClass?: 'DELIVERY'|'INFREQUENT_ACCESS'|'STANDARD',
 *     deletionProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLogStream(array $args = [])
 * @phpstan-method \Aws\Result createLogStream(array{logGroupName?: string, logStreamName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLogStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLogStreamAsync(array{logGroupName?: string, logStreamName?: string, ...} $args = [])
 * @method \Aws\Result createLookupTable(array $args = [])
 * @phpstan-method \Aws\Result createLookupTable(array{
 *     lookupTableName?: string,
 *     description?: string,
 *     tableBody?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLookupTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLookupTableAsync(array{
 *     lookupTableName?: string,
 *     description?: string,
 *     tableBody?: string,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createScheduledQuery(array $args = [])
 * @phpstan-method \Aws\Result createScheduledQuery(array{
 *     name?: string,
 *     description?: string,
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     queryString?: string,
 *     logGroupIdentifiers?: list<string>,
 *     scheduleExpression?: string,
 *     timezone?: string,
 *     startTimeOffset?: int,
 *     endTimeOffset?: int,
 *     destinationConfiguration?: array{
 *         s3Configuration?: array{destinationIdentifier?: string, roleArn?: string, ownerAccountId?: string, kmsKeyId?: string, ...},
 *         ...,
 *     },
 *     scheduleStartTime?: int,
 *     scheduleEndTime?: int,
 *     executionRoleArn?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduledQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduledQueryAsync(array{
 *     name?: string,
 *     description?: string,
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     queryString?: string,
 *     logGroupIdentifiers?: list<string>,
 *     scheduleExpression?: string,
 *     timezone?: string,
 *     startTimeOffset?: int,
 *     endTimeOffset?: int,
 *     destinationConfiguration?: array{
 *         s3Configuration?: array{destinationIdentifier?: string, roleArn?: string, ownerAccountId?: string, kmsKeyId?: string, ...},
 *         ...,
 *     },
 *     scheduleStartTime?: int,
 *     scheduleEndTime?: int,
 *     executionRoleArn?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccountPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountPolicy(array{
 *     policyName?: string,
 *     policyType?: 'DATA_PROTECTION_POLICY'|'FIELD_INDEX_POLICY'|'METRIC_EXTRACTION_POLICY'|'SUBSCRIPTION_FILTER_POLICY'|'TRANSFORMER_POLICY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountPolicyAsync(array{
 *     policyName?: string,
 *     policyType?: 'DATA_PROTECTION_POLICY'|'FIELD_INDEX_POLICY'|'METRIC_EXTRACTION_POLICY'|'SUBSCRIPTION_FILTER_POLICY'|'TRANSFORMER_POLICY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDataProtectionPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteDataProtectionPolicy(array{logGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataProtectionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataProtectionPolicyAsync(array{logGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDelivery(array $args = [])
 * @phpstan-method \Aws\Result deleteDelivery(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeliveryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeliveryAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteDeliveryDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteDeliveryDestination(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeliveryDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeliveryDestinationAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteDeliveryDestinationPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteDeliveryDestinationPolicy(array{deliveryDestinationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeliveryDestinationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeliveryDestinationPolicyAsync(array{deliveryDestinationName?: string, ...} $args = [])
 * @method \Aws\Result deleteDeliverySource(array $args = [])
 * @phpstan-method \Aws\Result deleteDeliverySource(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDeliverySourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeliverySourceAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteDestination(array{destinationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDestinationAsync(array{destinationName?: string, ...} $args = [])
 * @method \Aws\Result deleteIndexPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteIndexPolicy(array{logGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIndexPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIndexPolicyAsync(array{logGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegration(array{integrationName?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array{integrationName?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result deleteLogAnomalyDetector(array $args = [])
 * @phpstan-method \Aws\Result deleteLogAnomalyDetector(array{anomalyDetectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLogAnomalyDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLogAnomalyDetectorAsync(array{anomalyDetectorArn?: string, ...} $args = [])
 * @method \Aws\Result deleteLogGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteLogGroup(array{logGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLogGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLogGroupAsync(array{logGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteLogStream(array $args = [])
 * @phpstan-method \Aws\Result deleteLogStream(array{logGroupName?: string, logStreamName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLogStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLogStreamAsync(array{logGroupName?: string, logStreamName?: string, ...} $args = [])
 * @method \Aws\Result deleteLookupTable(array $args = [])
 * @phpstan-method \Aws\Result deleteLookupTable(array{lookupTableArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLookupTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLookupTableAsync(array{lookupTableArn?: string, ...} $args = [])
 * @method \Aws\Result deleteMetricFilter(array $args = [])
 * @phpstan-method \Aws\Result deleteMetricFilter(array{logGroupName?: string, filterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMetricFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMetricFilterAsync(array{logGroupName?: string, filterName?: string, ...} $args = [])
 * @method \Aws\Result deleteQueryDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteQueryDefinition(array{queryDefinitionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueryDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueryDefinitionAsync(array{queryDefinitionId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{policyName?: string, resourceArn?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{policyName?: string, resourceArn?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \Aws\Result deleteRetentionPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteRetentionPolicy(array{logGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRetentionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRetentionPolicyAsync(array{logGroupName?: string, ...} $args = [])
 * @method \Aws\Result deleteScheduledQuery(array $args = [])
 * @phpstan-method \Aws\Result deleteScheduledQuery(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduledQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduledQueryAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteSubscriptionFilter(array $args = [])
 * @phpstan-method \Aws\Result deleteSubscriptionFilter(array{logGroupName?: string, filterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriptionFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubscriptionFilterAsync(array{logGroupName?: string, filterName?: string, ...} $args = [])
 * @method \Aws\Result deleteSyslogConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteSyslogConfiguration(array{logGroupIdentifier?: string, vpcEndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSyslogConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSyslogConfigurationAsync(array{logGroupIdentifier?: string, vpcEndpointId?: string, ...} $args = [])
 * @method \Aws\Result deleteTransformer(array $args = [])
 * @phpstan-method \Aws\Result deleteTransformer(array{logGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTransformerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTransformerAsync(array{logGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result describeAccountPolicies(array $args = [])
 * @phpstan-method \Aws\Result describeAccountPolicies(array{
 *     policyType?: 'DATA_PROTECTION_POLICY'|'FIELD_INDEX_POLICY'|'METRIC_EXTRACTION_POLICY'|'SUBSCRIPTION_FILTER_POLICY'|'TRANSFORMER_POLICY',
 *     policyName?: string,
 *     accountIdentifiers?: list<string>,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountPoliciesAsync(array{
 *     policyType?: 'DATA_PROTECTION_POLICY'|'FIELD_INDEX_POLICY'|'METRIC_EXTRACTION_POLICY'|'SUBSCRIPTION_FILTER_POLICY'|'TRANSFORMER_POLICY',
 *     policyName?: string,
 *     accountIdentifiers?: list<string>,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeConfigurationTemplates(array $args = [])
 * @phpstan-method \Aws\Result describeConfigurationTemplates(array{
 *     service?: string,
 *     logTypes?: list<string>,
 *     resourceTypes?: list<string>,
 *     deliveryDestinationTypes?: list<'CWL'|'FH'|'S3'|'XRAY'>,
 *     nextToken?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConfigurationTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConfigurationTemplatesAsync(array{
 *     service?: string,
 *     logTypes?: list<string>,
 *     resourceTypes?: list<string>,
 *     deliveryDestinationTypes?: list<'CWL'|'FH'|'S3'|'XRAY'>,
 *     nextToken?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDeliveries(array $args = [])
 * @phpstan-method \Aws\Result describeDeliveries(array{nextToken?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDeliveriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDeliveriesAsync(array{nextToken?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result describeDeliveryDestinations(array $args = [])
 * @phpstan-method \Aws\Result describeDeliveryDestinations(array{nextToken?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDeliveryDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDeliveryDestinationsAsync(array{nextToken?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result describeDeliverySources(array $args = [])
 * @phpstan-method \Aws\Result describeDeliverySources(array{nextToken?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDeliverySourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDeliverySourcesAsync(array{nextToken?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result describeDestinations(array $args = [])
 * @phpstan-method \Aws\Result describeDestinations(array{DestinationNamePrefix?: string, nextToken?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDestinationsAsync(array{DestinationNamePrefix?: string, nextToken?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result describeExportTasks(array $args = [])
 * @phpstan-method \Aws\Result describeExportTasks(array{
 *     taskId?: string,
 *     statusCode?: 'CANCELLED'|'COMPLETED'|'FAILED'|'PENDING'|'PENDING_CANCEL'|'RUNNING',
 *     nextToken?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExportTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExportTasksAsync(array{
 *     taskId?: string,
 *     statusCode?: 'CANCELLED'|'COMPLETED'|'FAILED'|'PENDING'|'PENDING_CANCEL'|'RUNNING',
 *     nextToken?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeFieldIndexes(array $args = [])
 * @phpstan-method \Aws\Result describeFieldIndexes(array{logGroupIdentifiers?: list<string>, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFieldIndexesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFieldIndexesAsync(array{logGroupIdentifiers?: list<string>, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeImportTaskBatches(array $args = [])
 * @phpstan-method \Aws\Result describeImportTaskBatches(array{
 *     importId?: string,
 *     batchImportStatus?: list<'CANCELLED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'>,
 *     limit?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImportTaskBatchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImportTaskBatchesAsync(array{
 *     importId?: string,
 *     batchImportStatus?: list<'CANCELLED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'>,
 *     limit?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeImportTasks(array $args = [])
 * @phpstan-method \Aws\Result describeImportTasks(array{
 *     importId?: string,
 *     importStatus?: 'CANCELLED'|'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     importSourceArn?: string,
 *     limit?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImportTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImportTasksAsync(array{
 *     importId?: string,
 *     importStatus?: 'CANCELLED'|'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     importSourceArn?: string,
 *     limit?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeIndexPolicies(array $args = [])
 * @phpstan-method \Aws\Result describeIndexPolicies(array{logGroupIdentifiers?: list<string>, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIndexPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIndexPoliciesAsync(array{logGroupIdentifiers?: list<string>, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeLogGroups(array $args = [])
 * @phpstan-method \Aws\Result describeLogGroups(array{
 *     accountIdentifiers?: list<string>,
 *     logGroupNamePrefix?: string,
 *     logGroupNamePattern?: string,
 *     nextToken?: string,
 *     limit?: int,
 *     includeLinkedAccounts?: bool,
 *     logGroupClass?: 'DELIVERY'|'INFREQUENT_ACCESS'|'STANDARD',
 *     logGroupIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLogGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLogGroupsAsync(array{
 *     accountIdentifiers?: list<string>,
 *     logGroupNamePrefix?: string,
 *     logGroupNamePattern?: string,
 *     nextToken?: string,
 *     limit?: int,
 *     includeLinkedAccounts?: bool,
 *     logGroupClass?: 'DELIVERY'|'INFREQUENT_ACCESS'|'STANDARD',
 *     logGroupIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeLogStreams(array $args = [])
 * @phpstan-method \Aws\Result describeLogStreams(array{
 *     logGroupName?: string,
 *     logGroupIdentifier?: string,
 *     logStreamNamePrefix?: string,
 *     orderBy?: 'LastEventTime'|'LogStreamName',
 *     descending?: bool,
 *     nextToken?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLogStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLogStreamsAsync(array{
 *     logGroupName?: string,
 *     logGroupIdentifier?: string,
 *     logStreamNamePrefix?: string,
 *     orderBy?: 'LastEventTime'|'LogStreamName',
 *     descending?: bool,
 *     nextToken?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeLookupTables(array $args = [])
 * @phpstan-method \Aws\Result describeLookupTables(array{lookupTableNamePrefix?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLookupTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLookupTablesAsync(array{lookupTableNamePrefix?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result describeMetricFilters(array $args = [])
 * @phpstan-method \Aws\Result describeMetricFilters(array{
 *     logGroupName?: string,
 *     filterNamePrefix?: string,
 *     nextToken?: string,
 *     limit?: int,
 *     metricName?: string,
 *     metricNamespace?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMetricFiltersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMetricFiltersAsync(array{
 *     logGroupName?: string,
 *     filterNamePrefix?: string,
 *     nextToken?: string,
 *     limit?: int,
 *     metricName?: string,
 *     metricNamespace?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeQueries(array $args = [])
 * @phpstan-method \Aws\Result describeQueries(array{
 *     logGroupName?: string,
 *     status?: 'Cancelled'|'Complete'|'Failed'|'Running'|'Scheduled'|'Timeout'|'Unknown',
 *     maxResults?: int,
 *     nextToken?: string,
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQueriesAsync(array{
 *     logGroupName?: string,
 *     status?: 'Cancelled'|'Complete'|'Failed'|'Running'|'Scheduled'|'Timeout'|'Unknown',
 *     maxResults?: int,
 *     nextToken?: string,
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeQueryDefinitions(array $args = [])
 * @phpstan-method \Aws\Result describeQueryDefinitions(array{
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     queryDefinitionNamePrefix?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQueryDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQueryDefinitionsAsync(array{
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     queryDefinitionNamePrefix?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeResourcePolicies(array $args = [])
 * @phpstan-method \Aws\Result describeResourcePolicies(array{nextToken?: string, limit?: int, resourceArn?: string, policyScope?: 'ACCOUNT'|'RESOURCE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourcePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourcePoliciesAsync(array{nextToken?: string, limit?: int, resourceArn?: string, policyScope?: 'ACCOUNT'|'RESOURCE', ...} $args = [])
 * @method \Aws\Result describeSubscriptionFilters(array $args = [])
 * @phpstan-method \Aws\Result describeSubscriptionFilters(array{logGroupName?: string, filterNamePrefix?: string, nextToken?: string, limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSubscriptionFiltersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSubscriptionFiltersAsync(array{logGroupName?: string, filterNamePrefix?: string, nextToken?: string, limit?: int, ...} $args = [])
 * @method \Aws\Result disassociateKmsKey(array $args = [])
 * @phpstan-method \Aws\Result disassociateKmsKey(array{logGroupName?: string, resourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateKmsKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateKmsKeyAsync(array{logGroupName?: string, resourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result disassociateSourceFromS3TableIntegration(array $args = [])
 * @phpstan-method \Aws\Result disassociateSourceFromS3TableIntegration(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSourceFromS3TableIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSourceFromS3TableIntegrationAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result filterLogEvents(array $args = [])
 * @phpstan-method \Aws\Result filterLogEvents(array{
 *     logGroupName?: string,
 *     logGroupIdentifier?: string,
 *     logStreamNames?: list<string>,
 *     logStreamNamePrefix?: string,
 *     startTime?: int,
 *     endTime?: int,
 *     filterPattern?: string,
 *     nextToken?: string,
 *     limit?: int,
 *     startFromHead?: bool,
 *     interleaved?: bool,
 *     unmask?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise filterLogEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise filterLogEventsAsync(array{
 *     logGroupName?: string,
 *     logGroupIdentifier?: string,
 *     logStreamNames?: list<string>,
 *     logStreamNamePrefix?: string,
 *     startTime?: int,
 *     endTime?: int,
 *     filterPattern?: string,
 *     nextToken?: string,
 *     limit?: int,
 *     startFromHead?: bool,
 *     interleaved?: bool,
 *     unmask?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDataProtectionPolicy(array $args = [])
 * @phpstan-method \Aws\Result getDataProtectionPolicy(array{logGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataProtectionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataProtectionPolicyAsync(array{logGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getDelivery(array $args = [])
 * @phpstan-method \Aws\Result getDelivery(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeliveryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeliveryAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getDeliveryDestination(array $args = [])
 * @phpstan-method \Aws\Result getDeliveryDestination(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeliveryDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeliveryDestinationAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getDeliveryDestinationPolicy(array $args = [])
 * @phpstan-method \Aws\Result getDeliveryDestinationPolicy(array{deliveryDestinationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeliveryDestinationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeliveryDestinationPolicyAsync(array{deliveryDestinationName?: string, ...} $args = [])
 * @method \Aws\Result getDeliverySource(array $args = [])
 * @phpstan-method \Aws\Result getDeliverySource(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeliverySourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeliverySourceAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result getIntegration(array $args = [])
 * @phpstan-method \Aws\Result getIntegration(array{integrationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationAsync(array{integrationName?: string, ...} $args = [])
 * @method \Aws\Result getLogAnomalyDetector(array $args = [])
 * @phpstan-method \Aws\Result getLogAnomalyDetector(array{anomalyDetectorArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLogAnomalyDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLogAnomalyDetectorAsync(array{anomalyDetectorArn?: string, ...} $args = [])
 * @method \Aws\Result getLogEvents(array $args = [])
 * @phpstan-method \Aws\Result getLogEvents(array{
 *     logGroupName?: string,
 *     logGroupIdentifier?: string,
 *     logStreamName?: string,
 *     startTime?: int,
 *     endTime?: int,
 *     nextToken?: string,
 *     limit?: int,
 *     startFromHead?: bool,
 *     unmask?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getLogEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLogEventsAsync(array{
 *     logGroupName?: string,
 *     logGroupIdentifier?: string,
 *     logStreamName?: string,
 *     startTime?: int,
 *     endTime?: int,
 *     nextToken?: string,
 *     limit?: int,
 *     startFromHead?: bool,
 *     unmask?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getLogFields(array $args = [])
 * @phpstan-method \Aws\Result getLogFields(array{dataSourceName?: string, dataSourceType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLogFieldsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLogFieldsAsync(array{dataSourceName?: string, dataSourceType?: string, ...} $args = [])
 * @method \Aws\Result getLogGroupFields(array $args = [])
 * @phpstan-method \Aws\Result getLogGroupFields(array{logGroupName?: string, time?: int, logGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLogGroupFieldsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLogGroupFieldsAsync(array{logGroupName?: string, time?: int, logGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getLogObject(array $args = [])
 * @phpstan-method \Aws\Result getLogObject(array{unmask?: bool, logObjectPointer?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLogObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLogObjectAsync(array{unmask?: bool, logObjectPointer?: string, ...} $args = [])
 * @method \Aws\Result getLogRecord(array $args = [])
 * @phpstan-method \Aws\Result getLogRecord(array{logRecordPointer?: string, unmask?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLogRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLogRecordAsync(array{logRecordPointer?: string, unmask?: bool, ...} $args = [])
 * @method \Aws\Result getLookupTable(array $args = [])
 * @phpstan-method \Aws\Result getLookupTable(array{lookupTableArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLookupTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLookupTableAsync(array{lookupTableArn?: string, ...} $args = [])
 * @method \Aws\Result getQueryResults(array $args = [])
 * @phpstan-method \Aws\Result getQueryResults(array{queryId?: string, nextToken?: string, maxItems?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryResultsAsync(array{queryId?: string, nextToken?: string, maxItems?: int, ...} $args = [])
 * @method \Aws\Result getScheduledQuery(array $args = [])
 * @phpstan-method \Aws\Result getScheduledQuery(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getScheduledQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScheduledQueryAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getScheduledQueryHistory(array $args = [])
 * @phpstan-method \Aws\Result getScheduledQueryHistory(array{
 *     identifier?: string,
 *     startTime?: int,
 *     endTime?: int,
 *     executionStatuses?: list<'Complete'|'Failed'|'InvalidQuery'|'Running'|'Timeout'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getScheduledQueryHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScheduledQueryHistoryAsync(array{
 *     identifier?: string,
 *     startTime?: int,
 *     endTime?: int,
 *     executionStatuses?: list<'Complete'|'Failed'|'InvalidQuery'|'Running'|'Timeout'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getStorageTierPolicy(array $args = [])
 * @phpstan-method \Aws\Result getStorageTierPolicy(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStorageTierPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStorageTierPolicyAsync(array{...} $args = [])
 * @method \Aws\Result getTransformer(array $args = [])
 * @phpstan-method \Aws\Result getTransformer(array{logGroupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTransformerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTransformerAsync(array{logGroupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listAggregateLogGroupSummaries(array $args = [])
 * @phpstan-method \Aws\Result listAggregateLogGroupSummaries(array{
 *     accountIdentifiers?: list<string>,
 *     includeLinkedAccounts?: bool,
 *     logGroupClass?: 'DELIVERY'|'INFREQUENT_ACCESS'|'STANDARD',
 *     logGroupNamePattern?: string,
 *     dataSources?: list<array{name?: string, type?: string, ...}>,
 *     groupBy?: 'DATA_SOURCE_NAME_AND_TYPE'|'DATA_SOURCE_NAME_TYPE_AND_FORMAT',
 *     nextToken?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAggregateLogGroupSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAggregateLogGroupSummariesAsync(array{
 *     accountIdentifiers?: list<string>,
 *     includeLinkedAccounts?: bool,
 *     logGroupClass?: 'DELIVERY'|'INFREQUENT_ACCESS'|'STANDARD',
 *     logGroupNamePattern?: string,
 *     dataSources?: list<array{name?: string, type?: string, ...}>,
 *     groupBy?: 'DATA_SOURCE_NAME_AND_TYPE'|'DATA_SOURCE_NAME_TYPE_AND_FORMAT',
 *     nextToken?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAnomalies(array $args = [])
 * @phpstan-method \Aws\Result listAnomalies(array{
 *     anomalyDetectorArn?: string,
 *     suppressionState?: 'SUPPRESSED'|'UNSUPPRESSED',
 *     limit?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnomaliesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnomaliesAsync(array{
 *     anomalyDetectorArn?: string,
 *     suppressionState?: 'SUPPRESSED'|'UNSUPPRESSED',
 *     limit?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIntegrations(array $args = [])
 * @phpstan-method \Aws\Result listIntegrations(array{
 *     integrationNamePrefix?: string,
 *     integrationType?: 'OPENSEARCH',
 *     integrationStatus?: 'ACTIVE'|'FAILED'|'PROVISIONING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntegrationsAsync(array{
 *     integrationNamePrefix?: string,
 *     integrationType?: 'OPENSEARCH',
 *     integrationStatus?: 'ACTIVE'|'FAILED'|'PROVISIONING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLogAnomalyDetectors(array $args = [])
 * @phpstan-method \Aws\Result listLogAnomalyDetectors(array{filterLogGroupArn?: string, limit?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLogAnomalyDetectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLogAnomalyDetectorsAsync(array{filterLogGroupArn?: string, limit?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listLogGroups(array $args = [])
 * @phpstan-method \Aws\Result listLogGroups(array{
 *     logGroupNamePattern?: string,
 *     logGroupClass?: 'DELIVERY'|'INFREQUENT_ACCESS'|'STANDARD',
 *     includeLinkedAccounts?: bool,
 *     accountIdentifiers?: list<string>,
 *     nextToken?: string,
 *     limit?: int,
 *     dataSources?: list<array{name?: string, type?: string, ...}>,
 *     fieldIndexNames?: list<string>,
 *     logGroupTags?: list<array{key?: string, values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLogGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLogGroupsAsync(array{
 *     logGroupNamePattern?: string,
 *     logGroupClass?: 'DELIVERY'|'INFREQUENT_ACCESS'|'STANDARD',
 *     includeLinkedAccounts?: bool,
 *     accountIdentifiers?: list<string>,
 *     nextToken?: string,
 *     limit?: int,
 *     dataSources?: list<array{name?: string, type?: string, ...}>,
 *     fieldIndexNames?: list<string>,
 *     logGroupTags?: list<array{key?: string, values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLogGroupsForQuery(array $args = [])
 * @phpstan-method \Aws\Result listLogGroupsForQuery(array{queryId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLogGroupsForQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLogGroupsForQueryAsync(array{queryId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listScheduledQueries(array $args = [])
 * @phpstan-method \Aws\Result listScheduledQueries(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     scheduleType?: 'AWS_MANAGED'|'CUSTOMER_MANAGED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listScheduledQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScheduledQueriesAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     scheduleType?: 'AWS_MANAGED'|'CUSTOMER_MANAGED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSourcesForS3TableIntegration(array $args = [])
 * @phpstan-method \Aws\Result listSourcesForS3TableIntegration(array{integrationArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSourcesForS3TableIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSourcesForS3TableIntegrationAsync(array{integrationArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listSyslogConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listSyslogConfigurations(array{logGroupIdentifier?: string, vpcEndpointId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSyslogConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSyslogConfigurationsAsync(array{logGroupIdentifier?: string, vpcEndpointId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTagsLogGroup(array $args = [])
 * @phpstan-method \Aws\Result listTagsLogGroup(array{logGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsLogGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsLogGroupAsync(array{logGroupName?: string, ...} $args = [])
 * @method \Aws\Result putAccountPolicy(array $args = [])
 * @phpstan-method \Aws\Result putAccountPolicy(array{
 *     policyName?: string,
 *     policyDocument?: string,
 *     policyType?: 'DATA_PROTECTION_POLICY'|'FIELD_INDEX_POLICY'|'METRIC_EXTRACTION_POLICY'|'SUBSCRIPTION_FILTER_POLICY'|'TRANSFORMER_POLICY',
 *     scope?: 'ALL',
 *     selectionCriteria?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAccountPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountPolicyAsync(array{
 *     policyName?: string,
 *     policyDocument?: string,
 *     policyType?: 'DATA_PROTECTION_POLICY'|'FIELD_INDEX_POLICY'|'METRIC_EXTRACTION_POLICY'|'SUBSCRIPTION_FILTER_POLICY'|'TRANSFORMER_POLICY',
 *     scope?: 'ALL',
 *     selectionCriteria?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBearerTokenAuthentication(array $args = [])
 * @phpstan-method \Aws\Result putBearerTokenAuthentication(array{logGroupIdentifier?: string, bearerTokenAuthenticationEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putBearerTokenAuthenticationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBearerTokenAuthenticationAsync(array{logGroupIdentifier?: string, bearerTokenAuthenticationEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putDataProtectionPolicy(array $args = [])
 * @phpstan-method \Aws\Result putDataProtectionPolicy(array{logGroupIdentifier?: string, policyDocument?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDataProtectionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDataProtectionPolicyAsync(array{logGroupIdentifier?: string, policyDocument?: string, ...} $args = [])
 * @method \Aws\Result putDeliveryDestination(array $args = [])
 * @phpstan-method \Aws\Result putDeliveryDestination(array{
 *     name?: string,
 *     outputFormat?: 'json'|'parquet'|'plain'|'raw'|'w3c',
 *     deliveryDestinationConfiguration?: array{destinationResourceArn?: string, ...},
 *     deliveryDestinationType?: 'CWL'|'FH'|'S3'|'XRAY',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDeliveryDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDeliveryDestinationAsync(array{
 *     name?: string,
 *     outputFormat?: 'json'|'parquet'|'plain'|'raw'|'w3c',
 *     deliveryDestinationConfiguration?: array{destinationResourceArn?: string, ...},
 *     deliveryDestinationType?: 'CWL'|'FH'|'S3'|'XRAY',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDeliveryDestinationPolicy(array $args = [])
 * @phpstan-method \Aws\Result putDeliveryDestinationPolicy(array{deliveryDestinationName?: string, deliveryDestinationPolicy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDeliveryDestinationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDeliveryDestinationPolicyAsync(array{deliveryDestinationName?: string, deliveryDestinationPolicy?: string, ...} $args = [])
 * @method \Aws\Result putDeliverySource(array $args = [])
 * @phpstan-method \Aws\Result putDeliverySource(array{
 *     name?: string,
 *     resourceArn?: string,
 *     logType?: string,
 *     tags?: array<string, string>,
 *     deliverySourceConfiguration?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDeliverySourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDeliverySourceAsync(array{
 *     name?: string,
 *     resourceArn?: string,
 *     logType?: string,
 *     tags?: array<string, string>,
 *     deliverySourceConfiguration?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDestination(array $args = [])
 * @phpstan-method \Aws\Result putDestination(array{destinationName?: string, targetArn?: string, roleArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDestinationAsync(array{destinationName?: string, targetArn?: string, roleArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result putDestinationPolicy(array $args = [])
 * @phpstan-method \Aws\Result putDestinationPolicy(array{destinationName?: string, accessPolicy?: string, forceUpdate?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDestinationPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDestinationPolicyAsync(array{destinationName?: string, accessPolicy?: string, forceUpdate?: bool, ...} $args = [])
 * @method \Aws\Result putIndexPolicy(array $args = [])
 * @phpstan-method \Aws\Result putIndexPolicy(array{logGroupIdentifier?: string, policyDocument?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putIndexPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putIndexPolicyAsync(array{logGroupIdentifier?: string, policyDocument?: string, ...} $args = [])
 * @method \Aws\Result putIntegration(array $args = [])
 * @phpstan-method \Aws\Result putIntegration(array{
 *     integrationName?: string,
 *     resourceConfig?: array{
 *         openSearchResourceConfig?: array{
 *             kmsKeyArn?: string,
 *             dataSourceRoleArn?: string,
 *             dashboardViewerPrincipals?: list<string>,
 *             applicationArn?: string,
 *             retentionDays?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     integrationType?: 'OPENSEARCH',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putIntegrationAsync(array{
 *     integrationName?: string,
 *     resourceConfig?: array{
 *         openSearchResourceConfig?: array{
 *             kmsKeyArn?: string,
 *             dataSourceRoleArn?: string,
 *             dashboardViewerPrincipals?: list<string>,
 *             applicationArn?: string,
 *             retentionDays?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     integrationType?: 'OPENSEARCH',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putLogEvents(array $args = [])
 * @phpstan-method \Aws\Result putLogEvents(array{
 *     logGroupName?: string,
 *     logStreamName?: string,
 *     logEvents?: list<array{timestamp?: int, message?: string, ...}>,
 *     sequenceToken?: string,
 *     entity?: array{keyAttributes?: array<string, string>, attributes?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putLogEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLogEventsAsync(array{
 *     logGroupName?: string,
 *     logStreamName?: string,
 *     logEvents?: list<array{timestamp?: int, message?: string, ...}>,
 *     sequenceToken?: string,
 *     entity?: array{keyAttributes?: array<string, string>, attributes?: array<string, string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putLogGroupDeletionProtection(array $args = [])
 * @phpstan-method \Aws\Result putLogGroupDeletionProtection(array{logGroupIdentifier?: string, deletionProtectionEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putLogGroupDeletionProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLogGroupDeletionProtectionAsync(array{logGroupIdentifier?: string, deletionProtectionEnabled?: bool, ...} $args = [])
 * @method \Aws\Result putMetricFilter(array $args = [])
 * @phpstan-method \Aws\Result putMetricFilter(array{
 *     logGroupName?: string,
 *     filterName?: string,
 *     filterPattern?: string,
 *     metricTransformations?: list<array{
 *         metricName?: string,
 *         metricNamespace?: string,
 *         metricValue?: string,
 *         defaultValue?: float,
 *         dimensions?: array<string, string>,
 *         unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         ...,
 *     }>,
 *     applyOnTransformedLogs?: bool,
 *     fieldSelectionCriteria?: string,
 *     emitSystemFieldDimensions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putMetricFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putMetricFilterAsync(array{
 *     logGroupName?: string,
 *     filterName?: string,
 *     filterPattern?: string,
 *     metricTransformations?: list<array{
 *         metricName?: string,
 *         metricNamespace?: string,
 *         metricValue?: string,
 *         defaultValue?: float,
 *         dimensions?: array<string, string>,
 *         unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         ...,
 *     }>,
 *     applyOnTransformedLogs?: bool,
 *     fieldSelectionCriteria?: string,
 *     emitSystemFieldDimensions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putQueryDefinition(array $args = [])
 * @phpstan-method \Aws\Result putQueryDefinition(array{
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     name?: string,
 *     queryDefinitionId?: string,
 *     logGroupNames?: list<string>,
 *     queryString?: string,
 *     clientToken?: string,
 *     parameters?: list<array{name?: string, defaultValue?: string, description?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putQueryDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putQueryDefinitionAsync(array{
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     name?: string,
 *     queryDefinitionId?: string,
 *     logGroupNames?: list<string>,
 *     queryString?: string,
 *     clientToken?: string,
 *     parameters?: list<array{name?: string, defaultValue?: string, description?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{policyName?: string, policyDocument?: string, resourceArn?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{policyName?: string, policyDocument?: string, resourceArn?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \Aws\Result putRetentionPolicy(array $args = [])
 * @phpstan-method \Aws\Result putRetentionPolicy(array{logGroupName?: string, retentionInDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putRetentionPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRetentionPolicyAsync(array{logGroupName?: string, retentionInDays?: int, ...} $args = [])
 * @method \Aws\Result putStorageTierPolicy(array $args = [])
 * @phpstan-method \Aws\Result putStorageTierPolicy(array{storageTier?: 'INTELLIGENT_TIERING'|'STANDARD', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putStorageTierPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putStorageTierPolicyAsync(array{storageTier?: 'INTELLIGENT_TIERING'|'STANDARD', ...} $args = [])
 * @method \Aws\Result putSubscriptionFilter(array $args = [])
 * @phpstan-method \Aws\Result putSubscriptionFilter(array{
 *     logGroupName?: string,
 *     filterName?: string,
 *     filterPattern?: string,
 *     destinationArn?: string,
 *     roleArn?: string,
 *     distribution?: 'ByLogStream'|'Random',
 *     applyOnTransformedLogs?: bool,
 *     fieldSelectionCriteria?: string,
 *     emitSystemFields?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSubscriptionFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSubscriptionFilterAsync(array{
 *     logGroupName?: string,
 *     filterName?: string,
 *     filterPattern?: string,
 *     destinationArn?: string,
 *     roleArn?: string,
 *     distribution?: 'ByLogStream'|'Random',
 *     applyOnTransformedLogs?: bool,
 *     fieldSelectionCriteria?: string,
 *     emitSystemFields?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putSyslogConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putSyslogConfiguration(array{logGroupIdentifier?: string, vpcEndpointId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putSyslogConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSyslogConfigurationAsync(array{logGroupIdentifier?: string, vpcEndpointId?: string, ...} $args = [])
 * @method \Aws\Result putTransformer(array $args = [])
 * @phpstan-method \Aws\Result putTransformer(array{
 *     logGroupIdentifier?: string,
 *     transformerConfig?: list<array{
 *         addKeys?: array,
 *         copyValue?: array,
 *         csv?: array,
 *         dateTimeConverter?: array,
 *         deleteKeys?: array,
 *         grok?: array,
 *         listToMap?: array,
 *         lowerCaseString?: array,
 *         moveKeys?: array,
 *         parseCloudfront?: array,
 *         parseJSON?: array,
 *         parseKeyValue?: array,
 *         parseRoute53?: array,
 *         parseToOCSF?: array,
 *         parsePostgres?: array,
 *         parseVPC?: array,
 *         parseWAF?: array,
 *         renameKeys?: array,
 *         splitString?: array,
 *         substituteString?: array,
 *         trimString?: array,
 *         typeConverter?: array,
 *         upperCaseString?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTransformerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTransformerAsync(array{
 *     logGroupIdentifier?: string,
 *     transformerConfig?: list<array{
 *         addKeys?: array,
 *         copyValue?: array,
 *         csv?: array,
 *         dateTimeConverter?: array,
 *         deleteKeys?: array,
 *         grok?: array,
 *         listToMap?: array,
 *         lowerCaseString?: array,
 *         moveKeys?: array,
 *         parseCloudfront?: array,
 *         parseJSON?: array,
 *         parseKeyValue?: array,
 *         parseRoute53?: array,
 *         parseToOCSF?: array,
 *         parsePostgres?: array,
 *         parseVPC?: array,
 *         parseWAF?: array,
 *         renameKeys?: array,
 *         splitString?: array,
 *         substituteString?: array,
 *         trimString?: array,
 *         typeConverter?: array,
 *         upperCaseString?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startLiveTail(array $args = [])
 * @phpstan-method \Aws\Result startLiveTail(array{
 *     logGroupIdentifiers?: list<string>,
 *     logStreamNames?: list<string>,
 *     logStreamNamePrefixes?: list<string>,
 *     logEventFilterPattern?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startLiveTailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startLiveTailAsync(array{
 *     logGroupIdentifiers?: list<string>,
 *     logStreamNames?: list<string>,
 *     logStreamNamePrefixes?: list<string>,
 *     logEventFilterPattern?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startQuery(array $args = [])
 * @phpstan-method \Aws\Result startQuery(array{
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     logGroupName?: string,
 *     logGroupNames?: list<string>,
 *     logGroupIdentifiers?: list<string>,
 *     startTime?: int,
 *     endTime?: int,
 *     queryString?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQueryAsync(array{
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     logGroupName?: string,
 *     logGroupNames?: list<string>,
 *     logGroupIdentifiers?: list<string>,
 *     startTime?: int,
 *     endTime?: int,
 *     queryString?: string,
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopQuery(array $args = [])
 * @phpstan-method \Aws\Result stopQuery(array{queryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopQueryAsync(array{queryId?: string, ...} $args = [])
 * @method \Aws\Result tagLogGroup(array $args = [])
 * @phpstan-method \Aws\Result tagLogGroup(array{logGroupName?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagLogGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagLogGroupAsync(array{logGroupName?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result testMetricFilter(array $args = [])
 * @phpstan-method \Aws\Result testMetricFilter(array{filterPattern?: string, logEventMessages?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise testMetricFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testMetricFilterAsync(array{filterPattern?: string, logEventMessages?: list<string>, ...} $args = [])
 * @method \Aws\Result testTransformer(array $args = [])
 * @phpstan-method \Aws\Result testTransformer(array{
 *     transformerConfig?: list<array{
 *         addKeys?: array,
 *         copyValue?: array,
 *         csv?: array,
 *         dateTimeConverter?: array,
 *         deleteKeys?: array,
 *         grok?: array,
 *         listToMap?: array,
 *         lowerCaseString?: array,
 *         moveKeys?: array,
 *         parseCloudfront?: array,
 *         parseJSON?: array,
 *         parseKeyValue?: array,
 *         parseRoute53?: array,
 *         parseToOCSF?: array,
 *         parsePostgres?: array,
 *         parseVPC?: array,
 *         parseWAF?: array,
 *         renameKeys?: array,
 *         splitString?: array,
 *         substituteString?: array,
 *         trimString?: array,
 *         typeConverter?: array,
 *         upperCaseString?: array,
 *         ...,
 *     }>,
 *     logEventMessages?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testTransformerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testTransformerAsync(array{
 *     transformerConfig?: list<array{
 *         addKeys?: array,
 *         copyValue?: array,
 *         csv?: array,
 *         dateTimeConverter?: array,
 *         deleteKeys?: array,
 *         grok?: array,
 *         listToMap?: array,
 *         lowerCaseString?: array,
 *         moveKeys?: array,
 *         parseCloudfront?: array,
 *         parseJSON?: array,
 *         parseKeyValue?: array,
 *         parseRoute53?: array,
 *         parseToOCSF?: array,
 *         parsePostgres?: array,
 *         parseVPC?: array,
 *         parseWAF?: array,
 *         renameKeys?: array,
 *         splitString?: array,
 *         substituteString?: array,
 *         trimString?: array,
 *         typeConverter?: array,
 *         upperCaseString?: array,
 *         ...,
 *     }>,
 *     logEventMessages?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagLogGroup(array $args = [])
 * @phpstan-method \Aws\Result untagLogGroup(array{logGroupName?: string, tags?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagLogGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagLogGroupAsync(array{logGroupName?: string, tags?: list<string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAnomaly(array $args = [])
 * @phpstan-method \Aws\Result updateAnomaly(array{
 *     anomalyId?: string,
 *     patternId?: string,
 *     anomalyDetectorArn?: string,
 *     suppressionType?: 'INFINITE'|'LIMITED',
 *     suppressionPeriod?: array{value?: int, suppressionUnit?: 'HOURS'|'MINUTES'|'SECONDS', ...},
 *     baseline?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAnomalyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAnomalyAsync(array{
 *     anomalyId?: string,
 *     patternId?: string,
 *     anomalyDetectorArn?: string,
 *     suppressionType?: 'INFINITE'|'LIMITED',
 *     suppressionPeriod?: array{value?: int, suppressionUnit?: 'HOURS'|'MINUTES'|'SECONDS', ...},
 *     baseline?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDeliveryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateDeliveryConfiguration(array{
 *     id?: string,
 *     recordFields?: list<string>,
 *     fieldDelimiter?: string,
 *     s3DeliveryConfiguration?: array{suffixPath?: string, enableHiveCompatiblePath?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDeliveryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeliveryConfigurationAsync(array{
 *     id?: string,
 *     recordFields?: list<string>,
 *     fieldDelimiter?: string,
 *     s3DeliveryConfiguration?: array{suffixPath?: string, enableHiveCompatiblePath?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLogAnomalyDetector(array $args = [])
 * @phpstan-method \Aws\Result updateLogAnomalyDetector(array{
 *     anomalyDetectorArn?: string,
 *     evaluationFrequency?: 'FIFTEEN_MIN'|'FIVE_MIN'|'ONE_HOUR'|'ONE_MIN'|'TEN_MIN'|'THIRTY_MIN',
 *     filterPattern?: string,
 *     anomalyVisibilityTime?: int,
 *     enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLogAnomalyDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLogAnomalyDetectorAsync(array{
 *     anomalyDetectorArn?: string,
 *     evaluationFrequency?: 'FIFTEEN_MIN'|'FIVE_MIN'|'ONE_HOUR'|'ONE_MIN'|'TEN_MIN'|'THIRTY_MIN',
 *     filterPattern?: string,
 *     anomalyVisibilityTime?: int,
 *     enabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLookupTable(array $args = [])
 * @phpstan-method \Aws\Result updateLookupTable(array{lookupTableArn?: string, description?: string, tableBody?: string, kmsKeyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLookupTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLookupTableAsync(array{lookupTableArn?: string, description?: string, tableBody?: string, kmsKeyId?: string, ...} $args = [])
 * @method \Aws\Result updateScheduledQuery(array $args = [])
 * @phpstan-method \Aws\Result updateScheduledQuery(array{
 *     identifier?: string,
 *     description?: string,
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     queryString?: string,
 *     logGroupIdentifiers?: list<string>,
 *     scheduleExpression?: string,
 *     timezone?: string,
 *     startTimeOffset?: int,
 *     endTimeOffset?: int,
 *     destinationConfiguration?: array{
 *         s3Configuration?: array{destinationIdentifier?: string, roleArn?: string, ownerAccountId?: string, kmsKeyId?: string, ...},
 *         ...,
 *     },
 *     scheduleStartTime?: int,
 *     scheduleEndTime?: int,
 *     executionRoleArn?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScheduledQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScheduledQueryAsync(array{
 *     identifier?: string,
 *     description?: string,
 *     queryLanguage?: 'CWLI'|'PPL'|'SQL',
 *     queryString?: string,
 *     logGroupIdentifiers?: list<string>,
 *     scheduleExpression?: string,
 *     timezone?: string,
 *     startTimeOffset?: int,
 *     endTimeOffset?: int,
 *     destinationConfiguration?: array{
 *         s3Configuration?: array{destinationIdentifier?: string, roleArn?: string, ownerAccountId?: string, kmsKeyId?: string, ...},
 *         ...,
 *     },
 *     scheduleStartTime?: int,
 *     scheduleEndTime?: int,
 *     executionRoleArn?: string,
 *     state?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 */
class CloudWatchLogsClient extends AwsClient {

    /**
     * Helper method for 'startLiveTail' operation that checks for results.
     *
     * Initiates 'startLiveTail' operation with given arguments, and continuously
     * checks response stream for session updates or results, yielding each
     * stream chunk when results are not empty. This method abstracts from users
     * the need of checking if there are logs entry available to be watched, which means
     * that users will always get a next item to be iterated when more log entries are
     * available.
     *
     * @param array $args Command arguments.
     *
     * @return Generator Yields session update or result stream chunks.
     */
    public function startLiveTailCheckingForResults(array $args): Generator
    {
        $response = $this->startLiveTail($args);
        foreach ($response['responseStream'] as $streamChunk) {
            if (isset($streamChunk['sessionUpdate'])) {
                if (!empty($streamChunk['sessionUpdate']['sessionResults'])) {
                    yield $streamChunk;
                }
            } else {
                yield $streamChunk;
            }
        }
    }
}
