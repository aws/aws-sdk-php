<?php
namespace Aws\Resiliencehubv2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Resilience Hub V2** service.
 * @method \Aws\Result createAssertion(array $args = [])
 * @phpstan-method \Aws\Result createAssertion(array{serviceArn?: string, text?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssertionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssertionAsync(array{serviceArn?: string, text?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createInputSource(array $args = [])
 * @phpstan-method \Aws\Result createInputSource(array{
 *     serviceArn?: string,
 *     resourceConfiguration?: array{
 *         resourceTags?: list<array>,
 *         cfnStackArn?: string,
 *         tfStateFileUrl?: string,
 *         eks?: array{clusterArn?: string, namespaces?: list<string>, ...},
 *         designFileS3Url?: string,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInputSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInputSourceAsync(array{
 *     serviceArn?: string,
 *     resourceConfiguration?: array{
 *         resourceTags?: list<array>,
 *         cfnStackArn?: string,
 *         tfStateFileUrl?: string,
 *         eks?: array{clusterArn?: string, namespaces?: list<string>, ...},
 *         designFileS3Url?: string,
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPolicy(array $args = [])
 * @phpstan-method \Aws\Result createPolicy(array{
 *     name?: string,
 *     description?: string,
 *     availabilitySlo?: array{target?: float, ...},
 *     multiAz?: array{
 *         rtoInMinutes?: int,
 *         rpoInMinutes?: int,
 *         disasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *         ...,
 *     },
 *     multiRegion?: array{
 *         rtoInMinutes?: int,
 *         rpoInMinutes?: int,
 *         disasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *         ...,
 *     },
 *     dataRecovery?: array{timeBetweenBackupsInMinutes?: int, ...},
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyAsync(array{
 *     name?: string,
 *     description?: string,
 *     availabilitySlo?: array{target?: float, ...},
 *     multiAz?: array{
 *         rtoInMinutes?: int,
 *         rpoInMinutes?: int,
 *         disasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *         ...,
 *     },
 *     multiRegion?: array{
 *         rtoInMinutes?: int,
 *         rpoInMinutes?: int,
 *         disasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *         ...,
 *     },
 *     dataRecovery?: array{timeBetweenBackupsInMinutes?: int, ...},
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReport(array $args = [])
 * @phpstan-method \Aws\Result createReport(array{serviceArn?: string, reportType?: 'FAILURE_MODE', clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReportAsync(array{serviceArn?: string, reportType?: 'FAILURE_MODE', clientToken?: string, ...} $args = [])
 * @method \Aws\Result createService(array $args = [])
 * @phpstan-method \Aws\Result createService(array{
 *     name?: string,
 *     description?: string,
 *     associatedSystems?: list<array{systemArn?: string, systemName?: string, userJourneyIds?: list<string>, ...}>,
 *     policyArn?: string,
 *     regions?: list<string>,
 *     permissionModel?: array{invokerRoleName?: string, crossAccountRoles?: list<array>, ...},
 *     dependencyDiscovery?: 'DISABLED'|'ENABLED',
 *     reportConfiguration?: array{reportOutputs?: list<array>, ...},
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceAsync(array{
 *     name?: string,
 *     description?: string,
 *     associatedSystems?: list<array{systemArn?: string, systemName?: string, userJourneyIds?: list<string>, ...}>,
 *     policyArn?: string,
 *     regions?: list<string>,
 *     permissionModel?: array{invokerRoleName?: string, crossAccountRoles?: list<array>, ...},
 *     dependencyDiscovery?: 'DISABLED'|'ENABLED',
 *     reportConfiguration?: array{reportOutputs?: list<array>, ...},
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceFunction(array $args = [])
 * @phpstan-method \Aws\Result createServiceFunction(array{
 *     name?: string,
 *     serviceArn?: string,
 *     description?: string,
 *     criticality?: 'PRIMARY'|'SUPPLEMENTAL',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceFunctionAsync(array{
 *     name?: string,
 *     serviceArn?: string,
 *     description?: string,
 *     criticality?: 'PRIMARY'|'SUPPLEMENTAL',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceFunctionResources(array $args = [])
 * @phpstan-method \Aws\Result createServiceFunctionResources(array{serviceArn?: string, serviceFunctionId?: string, resources?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceFunctionResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceFunctionResourcesAsync(array{serviceArn?: string, serviceFunctionId?: string, resources?: list<string>, ...} $args = [])
 * @method \Aws\Result createSystem(array $args = [])
 * @phpstan-method \Aws\Result createSystem(array{
 *     name?: string,
 *     description?: string,
 *     sharingEnabled?: bool,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSystemAsync(array{
 *     name?: string,
 *     description?: string,
 *     sharingEnabled?: bool,
 *     kmsKeyId?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserJourney(array $args = [])
 * @phpstan-method \Aws\Result createUserJourney(array{systemArn?: string, name?: string, description?: string, policyArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserJourneyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserJourneyAsync(array{systemArn?: string, name?: string, description?: string, policyArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteAssertion(array $args = [])
 * @phpstan-method \Aws\Result deleteAssertion(array{serviceArn?: string, assertionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssertionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssertionAsync(array{serviceArn?: string, assertionId?: string, ...} $args = [])
 * @method \Aws\Result deleteInputSource(array $args = [])
 * @phpstan-method \Aws\Result deleteInputSource(array{serviceArn?: string, inputSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInputSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInputSourceAsync(array{serviceArn?: string, inputSourceId?: string, ...} $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePolicy(array{policyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyAsync(array{policyArn?: string, ...} $args = [])
 * @method \Aws\Result deleteService(array $args = [])
 * @phpstan-method \Aws\Result deleteService(array{serviceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceAsync(array{serviceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceFunction(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceFunction(array{serviceArn?: string, serviceFunctionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceFunctionAsync(array{serviceArn?: string, serviceFunctionId?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceFunctionResources(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceFunctionResources(array{serviceArn?: string, serviceFunctionId?: string, resources?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceFunctionResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceFunctionResourcesAsync(array{serviceArn?: string, serviceFunctionId?: string, resources?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteSystem(array $args = [])
 * @phpstan-method \Aws\Result deleteSystem(array{systemArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSystemAsync(array{systemArn?: string, ...} $args = [])
 * @method \Aws\Result deleteUserJourney(array $args = [])
 * @phpstan-method \Aws\Result deleteUserJourney(array{systemArn?: string, userJourneyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserJourneyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserJourneyAsync(array{systemArn?: string, userJourneyId?: string, ...} $args = [])
 * @method \Aws\Result getFailureModeFinding(array $args = [])
 * @phpstan-method \Aws\Result getFailureModeFinding(array{findingId?: string, serviceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFailureModeFindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFailureModeFindingAsync(array{findingId?: string, serviceArn?: string, ...} $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{policyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{policyArn?: string, ...} $args = [])
 * @method \Aws\Result getService(array $args = [])
 * @phpstan-method \Aws\Result getService(array{serviceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceAsync(array{serviceArn?: string, ...} $args = [])
 * @method \Aws\Result getSystem(array $args = [])
 * @phpstan-method \Aws\Result getSystem(array{systemArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSystemAsync(array{systemArn?: string, ...} $args = [])
 * @method \Aws\Result getUserJourney(array $args = [])
 * @phpstan-method \Aws\Result getUserJourney(array{systemArn?: string, userJourneyId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserJourneyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserJourneyAsync(array{systemArn?: string, userJourneyId?: string, ...} $args = [])
 * @method \Aws\Result importApp(array $args = [])
 * @phpstan-method \Aws\Result importApp(array{
 *     v1AppArn?: string,
 *     policyArn?: string,
 *     kmsKeyId?: string,
 *     skipManuallyAddedResources?: bool,
 *     associatedSystems?: list<array{systemArn?: string, systemName?: string, userJourneyIds?: list<string>, ...}>,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importAppAsync(array{
 *     v1AppArn?: string,
 *     policyArn?: string,
 *     kmsKeyId?: string,
 *     skipManuallyAddedResources?: bool,
 *     associatedSystems?: list<array{systemArn?: string, systemName?: string, userJourneyIds?: list<string>, ...}>,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importPolicy(array $args = [])
 * @phpstan-method \Aws\Result importPolicy(array{
 *     v1PolicyArn?: string,
 *     kmsKeyId?: string,
 *     availabilitySlo?: array{target?: float, ...},
 *     multiAzDisasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *     multiRegionDisasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importPolicyAsync(array{
 *     v1PolicyArn?: string,
 *     kmsKeyId?: string,
 *     availabilitySlo?: array{target?: float, ...},
 *     multiAzDisasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *     multiRegionDisasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAssertions(array $args = [])
 * @phpstan-method \Aws\Result listAssertions(array{serviceArn?: string, source?: 'AI_GENERATED'|'USER', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssertionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssertionsAsync(array{serviceArn?: string, source?: 'AI_GENERATED'|'USER', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDependencies(array $args = [])
 * @phpstan-method \Aws\Result listDependencies(array{
 *     serviceArn?: string,
 *     queryRangeStartTime?: int|string|\DateTimeInterface,
 *     queryRangeEndTime?: int|string|\DateTimeInterface,
 *     queryRangeGranularity?: 'DAILY'|'HOURLY',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDependenciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDependenciesAsync(array{
 *     serviceArn?: string,
 *     queryRangeStartTime?: int|string|\DateTimeInterface,
 *     queryRangeEndTime?: int|string|\DateTimeInterface,
 *     queryRangeGranularity?: 'DAILY'|'HOURLY',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFailureModeAssessments(array $args = [])
 * @phpstan-method \Aws\Result listFailureModeAssessments(array{
 *     serviceArn?: string,
 *     assessmentStatuses?: list<'FAILED'|'IN_PROGRESS'|'NOT_STARTED'|'PENDING'|'SUCCESS'>,
 *     startedAfter?: int|string|\DateTimeInterface,
 *     endedBefore?: int|string|\DateTimeInterface,
 *     sortBy?: 'STARTED_AT',
 *     sortOrder?: 'ASC'|'DESC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFailureModeAssessmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFailureModeAssessmentsAsync(array{
 *     serviceArn?: string,
 *     assessmentStatuses?: list<'FAILED'|'IN_PROGRESS'|'NOT_STARTED'|'PENDING'|'SUCCESS'>,
 *     startedAfter?: int|string|\DateTimeInterface,
 *     endedBefore?: int|string|\DateTimeInterface,
 *     sortBy?: 'STARTED_AT',
 *     sortOrder?: 'ASC'|'DESC',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFailureModeFindings(array $args = [])
 * @phpstan-method \Aws\Result listFailureModeFindings(array{
 *     serviceArn?: string,
 *     severity?: 'HIGH'|'LOW'|'MEDIUM',
 *     failureCategory?: 'EXCESSIVE_LATENCY'|'EXCESSIVE_LOAD'|'MISCONFIGURATION_AND_BUGS'|'SHARED_FATE'|'SINGLE_POINT_OF_FAILURE',
 *     status?: 'IRRELEVANT'|'OPEN'|'RESOLVED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFailureModeFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFailureModeFindingsAsync(array{
 *     serviceArn?: string,
 *     severity?: 'HIGH'|'LOW'|'MEDIUM',
 *     failureCategory?: 'EXCESSIVE_LATENCY'|'EXCESSIVE_LOAD'|'MISCONFIGURATION_AND_BUGS'|'SHARED_FATE'|'SINGLE_POINT_OF_FAILURE',
 *     status?: 'IRRELEVANT'|'OPEN'|'RESOLVED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInputSources(array $args = [])
 * @phpstan-method \Aws\Result listInputSources(array{
 *     serviceArn?: string,
 *     type?: 'CFN_STACK'|'DESIGN_FILE'|'EKS'|'MONITORING'|'TAGS'|'TERRAFORM',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInputSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInputSourcesAsync(array{
 *     serviceArn?: string,
 *     type?: 'CFN_STACK'|'DESIGN_FILE'|'EKS'|'MONITORING'|'TAGS'|'TERRAFORM',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPolicies(array $args = [])
 * @phpstan-method \Aws\Result listPolicies(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoliciesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listReports(array $args = [])
 * @phpstan-method \Aws\Result listReports(array{serviceArn?: string, reportType?: 'FAILURE_MODE', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReportsAsync(array{serviceArn?: string, reportType?: 'FAILURE_MODE', maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listResources(array $args = [])
 * @phpstan-method \Aws\Result listResources(array{
 *     serviceArn?: string,
 *     serviceFunctionId?: string,
 *     awsRegion?: string,
 *     resourceTypes?: list<string>,
 *     billable?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcesAsync(array{
 *     serviceArn?: string,
 *     serviceFunctionId?: string,
 *     awsRegion?: string,
 *     resourceTypes?: list<string>,
 *     billable?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceEvents(array $args = [])
 * @phpstan-method \Aws\Result listServiceEvents(array{
 *     serviceArn?: string,
 *     eventTypes?: list<'ASSERTION_CREATED'|'ASSERTION_DELETED'|'ASSERTION_UPDATED'|'SERVICE_ACHIEVABILITY_UPDATED'|'SERVICE_CREATED'|'SERVICE_DELETED'|'SERVICE_FUNCTION_CREATED'|'SERVICE_FUNCTION_DELETED'|'SERVICE_FUNCTION_RESOURCES_ADDED'|'SERVICE_FUNCTION_RESOURCES_REMOVED'|'SERVICE_FUNCTION_UPDATED'|'SERVICE_INPUT_SOURCES_UPDATED'|'SERVICE_POLICY_ASSOCIATED'|'SERVICE_POLICY_DISASSOCIATED'|'SERVICE_RESOURCES_ASSOCIATED'|'SERVICE_RESOURCES_DISASSOCIATED'|'SERVICE_SYSTEM_ASSOCIATED'|'SERVICE_SYSTEM_DISASSOCIATED'|'SERVICE_WORKFLOW_UPDATED'>,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceEventsAsync(array{
 *     serviceArn?: string,
 *     eventTypes?: list<'ASSERTION_CREATED'|'ASSERTION_DELETED'|'ASSERTION_UPDATED'|'SERVICE_ACHIEVABILITY_UPDATED'|'SERVICE_CREATED'|'SERVICE_DELETED'|'SERVICE_FUNCTION_CREATED'|'SERVICE_FUNCTION_DELETED'|'SERVICE_FUNCTION_RESOURCES_ADDED'|'SERVICE_FUNCTION_RESOURCES_REMOVED'|'SERVICE_FUNCTION_UPDATED'|'SERVICE_INPUT_SOURCES_UPDATED'|'SERVICE_POLICY_ASSOCIATED'|'SERVICE_POLICY_DISASSOCIATED'|'SERVICE_RESOURCES_ASSOCIATED'|'SERVICE_RESOURCES_DISASSOCIATED'|'SERVICE_SYSTEM_ASSOCIATED'|'SERVICE_SYSTEM_DISASSOCIATED'|'SERVICE_WORKFLOW_UPDATED'>,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceFunctions(array $args = [])
 * @phpstan-method \Aws\Result listServiceFunctions(array{serviceArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceFunctionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceFunctionsAsync(array{serviceArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listServiceTopologyEdges(array $args = [])
 * @phpstan-method \Aws\Result listServiceTopologyEdges(array{serviceArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceTopologyEdgesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceTopologyEdgesAsync(array{serviceArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{
 *     systemArn?: string,
 *     userJourneyId?: string,
 *     ouId?: string,
 *     accountId?: string,
 *     assessmentStatus?: 'FAILED'|'IN_PROGRESS'|'NOT_STARTED'|'PENDING'|'SUCCESS',
 *     policyArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{
 *     systemArn?: string,
 *     userJourneyId?: string,
 *     ouId?: string,
 *     accountId?: string,
 *     assessmentStatus?: 'FAILED'|'IN_PROGRESS'|'NOT_STARTED'|'PENDING'|'SUCCESS',
 *     policyArn?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSystemEvents(array $args = [])
 * @phpstan-method \Aws\Result listSystemEvents(array{
 *     systemArn?: string,
 *     eventTypes?: list<'SYSTEM_CREATED'|'SYSTEM_DELETED'|'SYSTEM_POLICY_ASSOCIATED'|'SYSTEM_POLICY_DISASSOCIATED'|'SYSTEM_SERVICE_ASSOCIATED'|'SYSTEM_SERVICE_DISASSOCIATED'|'SYSTEM_USER_JOURNEY_CREATED'|'SYSTEM_USER_JOURNEY_DELETED'|'SYSTEM_USER_JOURNEY_UPDATED'>,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSystemEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSystemEventsAsync(array{
 *     systemArn?: string,
 *     eventTypes?: list<'SYSTEM_CREATED'|'SYSTEM_DELETED'|'SYSTEM_POLICY_ASSOCIATED'|'SYSTEM_POLICY_DISASSOCIATED'|'SYSTEM_SERVICE_ASSOCIATED'|'SYSTEM_SERVICE_DISASSOCIATED'|'SYSTEM_USER_JOURNEY_CREATED'|'SYSTEM_USER_JOURNEY_DELETED'|'SYSTEM_USER_JOURNEY_UPDATED'>,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSystems(array $args = [])
 * @phpstan-method \Aws\Result listSystems(array{ouId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSystemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSystemsAsync(array{ouId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listUserJourneys(array $args = [])
 * @phpstan-method \Aws\Result listUserJourneys(array{systemArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUserJourneysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUserJourneysAsync(array{systemArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result startFailureModeAssessment(array $args = [])
 * @phpstan-method \Aws\Result startFailureModeAssessment(array{serviceArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startFailureModeAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFailureModeAssessmentAsync(array{serviceArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAssertion(array $args = [])
 * @phpstan-method \Aws\Result updateAssertion(array{serviceArn?: string, assertionId?: string, text?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssertionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssertionAsync(array{serviceArn?: string, assertionId?: string, text?: string, ...} $args = [])
 * @method \Aws\Result updateDependency(array $args = [])
 * @phpstan-method \Aws\Result updateDependency(array{
 *     serviceArn?: string,
 *     dependencyId?: string,
 *     criticality?: 'HARD'|'SOFT'|'UNKNOWN',
 *     comment?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDependencyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDependencyAsync(array{
 *     serviceArn?: string,
 *     dependencyId?: string,
 *     criticality?: 'HARD'|'SOFT'|'UNKNOWN',
 *     comment?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFailureModeFinding(array $args = [])
 * @phpstan-method \Aws\Result updateFailureModeFinding(array{findingId?: string, status?: 'IRRELEVANT'|'OPEN'|'RESOLVED', serviceArn?: string, comment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFailureModeFindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFailureModeFindingAsync(array{findingId?: string, status?: 'IRRELEVANT'|'OPEN'|'RESOLVED', serviceArn?: string, comment?: string, ...} $args = [])
 * @method \Aws\Result updatePolicy(array $args = [])
 * @phpstan-method \Aws\Result updatePolicy(array{
 *     policyArn?: string,
 *     description?: string,
 *     availabilitySlo?: array{target?: float, ...},
 *     multiAz?: array{
 *         rtoInMinutes?: int,
 *         rpoInMinutes?: int,
 *         disasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *         ...,
 *     },
 *     multiRegion?: array{
 *         rtoInMinutes?: int,
 *         rpoInMinutes?: int,
 *         disasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *         ...,
 *     },
 *     dataRecovery?: array{timeBetweenBackupsInMinutes?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePolicyAsync(array{
 *     policyArn?: string,
 *     description?: string,
 *     availabilitySlo?: array{target?: float, ...},
 *     multiAz?: array{
 *         rtoInMinutes?: int,
 *         rpoInMinutes?: int,
 *         disasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *         ...,
 *     },
 *     multiRegion?: array{
 *         rtoInMinutes?: int,
 *         rpoInMinutes?: int,
 *         disasterRecoveryApproach?: 'ACTIVE_ACTIVE'|'BACKUP_AND_RESTORE'|'HOT_STANDBY'|'PILOT_LIGHT'|'WARM_STANDBY',
 *         ...,
 *     },
 *     dataRecovery?: array{timeBetweenBackupsInMinutes?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateService(array $args = [])
 * @phpstan-method \Aws\Result updateService(array{
 *     serviceArn?: string,
 *     description?: string,
 *     associatedSystems?: list<array{systemArn?: string, systemName?: string, userJourneyIds?: list<string>, ...}>,
 *     policyArn?: string,
 *     regions?: list<string>,
 *     permissionModel?: array{invokerRoleName?: string, crossAccountRoles?: list<array>, ...},
 *     dependencyDiscovery?: 'DISABLED'|'ENABLED',
 *     reportConfiguration?: array{reportOutputs?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceAsync(array{
 *     serviceArn?: string,
 *     description?: string,
 *     associatedSystems?: list<array{systemArn?: string, systemName?: string, userJourneyIds?: list<string>, ...}>,
 *     policyArn?: string,
 *     regions?: list<string>,
 *     permissionModel?: array{invokerRoleName?: string, crossAccountRoles?: list<array>, ...},
 *     dependencyDiscovery?: 'DISABLED'|'ENABLED',
 *     reportConfiguration?: array{reportOutputs?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceFunction(array $args = [])
 * @phpstan-method \Aws\Result updateServiceFunction(array{
 *     serviceArn?: string,
 *     serviceFunctionId?: string,
 *     name?: string,
 *     description?: string,
 *     criticality?: 'PRIMARY'|'SUPPLEMENTAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceFunctionAsync(array{
 *     serviceArn?: string,
 *     serviceFunctionId?: string,
 *     name?: string,
 *     description?: string,
 *     criticality?: 'PRIMARY'|'SUPPLEMENTAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSystem(array $args = [])
 * @phpstan-method \Aws\Result updateSystem(array{systemArn?: string, description?: string, sharingEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSystemAsync(array{systemArn?: string, description?: string, sharingEnabled?: bool, ...} $args = [])
 * @method \Aws\Result updateUserJourney(array $args = [])
 * @phpstan-method \Aws\Result updateUserJourney(array{
 *     systemArn?: string,
 *     userJourneyId?: string,
 *     name?: string,
 *     description?: string,
 *     policyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserJourneyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserJourneyAsync(array{
 *     systemArn?: string,
 *     userJourneyId?: string,
 *     name?: string,
 *     description?: string,
 *     policyArn?: string,
 *     ...,
 * } $args = [])
 */
class Resiliencehubv2Client extends AwsClient {}
