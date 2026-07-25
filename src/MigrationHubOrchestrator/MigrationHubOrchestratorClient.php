<?php
namespace Aws\MigrationHubOrchestrator;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Migration Hub Orchestrator** service.
 * @method \Aws\Result createTemplate(array $args = [])
 * @phpstan-method \Aws\Result createTemplate(array{
 *     templateName?: string,
 *     templateDescription?: string,
 *     templateSource?: array{workflowId?: string, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTemplateAsync(array{
 *     templateName?: string,
 *     templateDescription?: string,
 *     templateSource?: array{workflowId?: string, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkflow(array $args = [])
 * @phpstan-method \Aws\Result createWorkflow(array{
 *     name?: string,
 *     description?: string,
 *     templateId?: string,
 *     applicationConfigurationId?: string,
 *     inputParameters?: array<string, array{
 *         integerValue?: int,
 *         stringValue?: string,
 *         listOfStringsValue?: list<string>,
 *         mapOfStringValue?: array<string, string>,
 *         ...,
 *     }>,
 *     stepTargets?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkflowAsync(array{
 *     name?: string,
 *     description?: string,
 *     templateId?: string,
 *     applicationConfigurationId?: string,
 *     inputParameters?: array<string, array{
 *         integerValue?: int,
 *         stringValue?: string,
 *         listOfStringsValue?: list<string>,
 *         mapOfStringValue?: array<string, string>,
 *         ...,
 *     }>,
 *     stepTargets?: list<string>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkflowStep(array $args = [])
 * @phpstan-method \Aws\Result createWorkflowStep(array{
 *     name?: string,
 *     stepGroupId?: string,
 *     workflowId?: string,
 *     stepActionType?: 'AUTOMATED'|'MANUAL',
 *     description?: string,
 *     workflowStepAutomationConfiguration?: array{
 *         scriptLocationS3Bucket?: string,
 *         scriptLocationS3Key?: array{linux?: string, windows?: string, ...},
 *         command?: array{linux?: string, windows?: string, ...},
 *         runEnvironment?: 'AWS'|'ONPREMISE',
 *         targetType?: 'ALL'|'NONE'|'SINGLE',
 *         ...,
 *     },
 *     stepTarget?: list<string>,
 *     outputs?: list<array{
 *         name?: string,
 *         dataType?: 'INTEGER'|'STRING'|'STRINGLIST'|'STRINGMAP',
 *         required?: bool,
 *         value?: array,
 *         ...,
 *     }>,
 *     previous?: list<string>,
 *     next?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkflowStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkflowStepAsync(array{
 *     name?: string,
 *     stepGroupId?: string,
 *     workflowId?: string,
 *     stepActionType?: 'AUTOMATED'|'MANUAL',
 *     description?: string,
 *     workflowStepAutomationConfiguration?: array{
 *         scriptLocationS3Bucket?: string,
 *         scriptLocationS3Key?: array{linux?: string, windows?: string, ...},
 *         command?: array{linux?: string, windows?: string, ...},
 *         runEnvironment?: 'AWS'|'ONPREMISE',
 *         targetType?: 'ALL'|'NONE'|'SINGLE',
 *         ...,
 *     },
 *     stepTarget?: list<string>,
 *     outputs?: list<array{
 *         name?: string,
 *         dataType?: 'INTEGER'|'STRING'|'STRINGLIST'|'STRINGMAP',
 *         required?: bool,
 *         value?: array,
 *         ...,
 *     }>,
 *     previous?: list<string>,
 *     next?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkflowStepGroup(array $args = [])
 * @phpstan-method \Aws\Result createWorkflowStepGroup(array{
 *     workflowId?: string,
 *     name?: string,
 *     description?: string,
 *     next?: list<string>,
 *     previous?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkflowStepGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkflowStepGroupAsync(array{
 *     workflowId?: string,
 *     name?: string,
 *     description?: string,
 *     next?: list<string>,
 *     previous?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteTemplate(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkflow(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflow(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkflowStep(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflowStep(array{id?: string, stepGroupId?: string, workflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowStepAsync(array{id?: string, stepGroupId?: string, workflowId?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkflowStepGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflowStepGroup(array{workflowId?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowStepGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowStepGroupAsync(array{workflowId?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getTemplate(array $args = [])
 * @phpstan-method \Aws\Result getTemplate(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getTemplateStep(array $args = [])
 * @phpstan-method \Aws\Result getTemplateStep(array{id?: string, templateId?: string, stepGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateStepAsync(array{id?: string, templateId?: string, stepGroupId?: string, ...} $args = [])
 * @method \Aws\Result getTemplateStepGroup(array $args = [])
 * @phpstan-method \Aws\Result getTemplateStepGroup(array{templateId?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateStepGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateStepGroupAsync(array{templateId?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getWorkflow(array $args = [])
 * @phpstan-method \Aws\Result getWorkflow(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getWorkflowStep(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowStep(array{workflowId?: string, stepGroupId?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowStepAsync(array{workflowId?: string, stepGroupId?: string, id?: string, ...} $args = [])
 * @method \Aws\Result getWorkflowStepGroup(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowStepGroup(array{id?: string, workflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowStepGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowStepGroupAsync(array{id?: string, workflowId?: string, ...} $args = [])
 * @method \Aws\Result listPlugins(array $args = [])
 * @phpstan-method \Aws\Result listPlugins(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPluginsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPluginsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTemplateStepGroups(array $args = [])
 * @phpstan-method \Aws\Result listTemplateStepGroups(array{maxResults?: int, nextToken?: string, templateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplateStepGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplateStepGroupsAsync(array{maxResults?: int, nextToken?: string, templateId?: string, ...} $args = [])
 * @method \Aws\Result listTemplateSteps(array $args = [])
 * @phpstan-method \Aws\Result listTemplateSteps(array{maxResults?: int, nextToken?: string, templateId?: string, stepGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplateStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplateStepsAsync(array{maxResults?: int, nextToken?: string, templateId?: string, stepGroupId?: string, ...} $args = [])
 * @method \Aws\Result listTemplates(array $args = [])
 * @phpstan-method \Aws\Result listTemplates(array{maxResults?: int, nextToken?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplatesAsync(array{maxResults?: int, nextToken?: string, name?: string, ...} $args = [])
 * @method \Aws\Result listWorkflowStepGroups(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowStepGroups(array{nextToken?: string, maxResults?: int, workflowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowStepGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowStepGroupsAsync(array{nextToken?: string, maxResults?: int, workflowId?: string, ...} $args = [])
 * @method \Aws\Result listWorkflowSteps(array $args = [])
 * @phpstan-method \Aws\Result listWorkflowSteps(array{nextToken?: string, maxResults?: int, workflowId?: string, stepGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowStepsAsync(array{nextToken?: string, maxResults?: int, workflowId?: string, stepGroupId?: string, ...} $args = [])
 * @method \Aws\Result listWorkflows(array $args = [])
 * @phpstan-method \Aws\Result listWorkflows(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     templateId?: string,
 *     adsApplicationConfigurationName?: string,
 *     status?: 'COMPLETED'|'CREATING'|'CREATION_FAILED'|'DELETED'|'DELETING'|'DELETION_FAILED'|'IN_PROGRESS'|'NOT_STARTED'|'PAUSED'|'PAUSING'|'PAUSING_FAILED'|'STARTING'|'USER_ATTENTION_REQUIRED'|'WORKFLOW_FAILED',
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     templateId?: string,
 *     adsApplicationConfigurationName?: string,
 *     status?: 'COMPLETED'|'CREATING'|'CREATION_FAILED'|'DELETED'|'DELETING'|'DELETION_FAILED'|'IN_PROGRESS'|'NOT_STARTED'|'PAUSED'|'PAUSING'|'PAUSING_FAILED'|'STARTING'|'USER_ATTENTION_REQUIRED'|'WORKFLOW_FAILED',
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result retryWorkflowStep(array $args = [])
 * @phpstan-method \Aws\Result retryWorkflowStep(array{workflowId?: string, stepGroupId?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise retryWorkflowStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retryWorkflowStepAsync(array{workflowId?: string, stepGroupId?: string, id?: string, ...} $args = [])
 * @method \Aws\Result startWorkflow(array $args = [])
 * @phpstan-method \Aws\Result startWorkflow(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startWorkflowAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result stopWorkflow(array $args = [])
 * @phpstan-method \Aws\Result stopWorkflow(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopWorkflowAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateTemplate(array{id?: string, templateName?: string, templateDescription?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTemplateAsync(array{id?: string, templateName?: string, templateDescription?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateWorkflow(array $args = [])
 * @phpstan-method \Aws\Result updateWorkflow(array{
 *     id?: string,
 *     name?: string,
 *     description?: string,
 *     inputParameters?: array<string, array{
 *         integerValue?: int,
 *         stringValue?: string,
 *         listOfStringsValue?: list<string>,
 *         mapOfStringValue?: array<string, string>,
 *         ...,
 *     }>,
 *     stepTargets?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkflowAsync(array{
 *     id?: string,
 *     name?: string,
 *     description?: string,
 *     inputParameters?: array<string, array{
 *         integerValue?: int,
 *         stringValue?: string,
 *         listOfStringsValue?: list<string>,
 *         mapOfStringValue?: array<string, string>,
 *         ...,
 *     }>,
 *     stepTargets?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkflowStep(array $args = [])
 * @phpstan-method \Aws\Result updateWorkflowStep(array{
 *     id?: string,
 *     stepGroupId?: string,
 *     workflowId?: string,
 *     name?: string,
 *     description?: string,
 *     stepActionType?: 'AUTOMATED'|'MANUAL',
 *     workflowStepAutomationConfiguration?: array{
 *         scriptLocationS3Bucket?: string,
 *         scriptLocationS3Key?: array{linux?: string, windows?: string, ...},
 *         command?: array{linux?: string, windows?: string, ...},
 *         runEnvironment?: 'AWS'|'ONPREMISE',
 *         targetType?: 'ALL'|'NONE'|'SINGLE',
 *         ...,
 *     },
 *     stepTarget?: list<string>,
 *     outputs?: list<array{
 *         name?: string,
 *         dataType?: 'INTEGER'|'STRING'|'STRINGLIST'|'STRINGMAP',
 *         required?: bool,
 *         value?: array,
 *         ...,
 *     }>,
 *     previous?: list<string>,
 *     next?: list<string>,
 *     status?: 'AWAITING_DEPENDENCIES'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PAUSED'|'READY'|'SKIPPED'|'USER_ATTENTION_REQUIRED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkflowStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkflowStepAsync(array{
 *     id?: string,
 *     stepGroupId?: string,
 *     workflowId?: string,
 *     name?: string,
 *     description?: string,
 *     stepActionType?: 'AUTOMATED'|'MANUAL',
 *     workflowStepAutomationConfiguration?: array{
 *         scriptLocationS3Bucket?: string,
 *         scriptLocationS3Key?: array{linux?: string, windows?: string, ...},
 *         command?: array{linux?: string, windows?: string, ...},
 *         runEnvironment?: 'AWS'|'ONPREMISE',
 *         targetType?: 'ALL'|'NONE'|'SINGLE',
 *         ...,
 *     },
 *     stepTarget?: list<string>,
 *     outputs?: list<array{
 *         name?: string,
 *         dataType?: 'INTEGER'|'STRING'|'STRINGLIST'|'STRINGMAP',
 *         required?: bool,
 *         value?: array,
 *         ...,
 *     }>,
 *     previous?: list<string>,
 *     next?: list<string>,
 *     status?: 'AWAITING_DEPENDENCIES'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PAUSED'|'READY'|'SKIPPED'|'USER_ATTENTION_REQUIRED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkflowStepGroup(array $args = [])
 * @phpstan-method \Aws\Result updateWorkflowStepGroup(array{
 *     workflowId?: string,
 *     id?: string,
 *     name?: string,
 *     description?: string,
 *     next?: list<string>,
 *     previous?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkflowStepGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkflowStepGroupAsync(array{
 *     workflowId?: string,
 *     id?: string,
 *     name?: string,
 *     description?: string,
 *     next?: list<string>,
 *     previous?: list<string>,
 *     ...,
 * } $args = [])
 */
class MigrationHubOrchestratorClient extends AwsClient {}
