<?php
namespace Aws\FIS;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Fault Injection Simulator** service.
 * @method \Aws\Result createExperimentTemplate(array $args = [])
 * @phpstan-method \Aws\Result createExperimentTemplate(array{
 *     clientToken?: string,
 *     description?: string,
 *     stopConditions?: list<array{source?: string, value?: string, ...}>,
 *     targets?: array<string, array{
 *         resourceType?: string,
 *         resourceArns?: list<string>,
 *         resourceTags?: array<string, string>,
 *         filters?: list<array>,
 *         selectionMode?: string,
 *         parameters?: array<string, string>,
 *         ...,
 *     }>,
 *     actions?: array<string, array{
 *         actionId?: string,
 *         description?: string,
 *         parameters?: array<string, string>,
 *         targets?: array<string, string>,
 *         startAfter?: list<string>,
 *         ...,
 *     }>,
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     logConfiguration?: array{
 *         cloudWatchLogsConfiguration?: array{logGroupArn?: string, ...},
 *         s3Configuration?: array{bucketName?: string, prefix?: string, ...},
 *         logSchemaVersion?: int,
 *         ...,
 *     },
 *     experimentOptions?: array{accountTargeting?: 'multi-account'|'single-account', emptyTargetResolutionMode?: 'fail'|'skip', ...},
 *     experimentReportConfiguration?: array{
 *         outputs?: array{s3Configuration?: array, ...},
 *         dataSources?: array{cloudWatchDashboards?: list<array>, ...},
 *         preExperimentDuration?: string,
 *         postExperimentDuration?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExperimentTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExperimentTemplateAsync(array{
 *     clientToken?: string,
 *     description?: string,
 *     stopConditions?: list<array{source?: string, value?: string, ...}>,
 *     targets?: array<string, array{
 *         resourceType?: string,
 *         resourceArns?: list<string>,
 *         resourceTags?: array<string, string>,
 *         filters?: list<array>,
 *         selectionMode?: string,
 *         parameters?: array<string, string>,
 *         ...,
 *     }>,
 *     actions?: array<string, array{
 *         actionId?: string,
 *         description?: string,
 *         parameters?: array<string, string>,
 *         targets?: array<string, string>,
 *         startAfter?: list<string>,
 *         ...,
 *     }>,
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     logConfiguration?: array{
 *         cloudWatchLogsConfiguration?: array{logGroupArn?: string, ...},
 *         s3Configuration?: array{bucketName?: string, prefix?: string, ...},
 *         logSchemaVersion?: int,
 *         ...,
 *     },
 *     experimentOptions?: array{accountTargeting?: 'multi-account'|'single-account', emptyTargetResolutionMode?: 'fail'|'skip', ...},
 *     experimentReportConfiguration?: array{
 *         outputs?: array{s3Configuration?: array, ...},
 *         dataSources?: array{cloudWatchDashboards?: list<array>, ...},
 *         preExperimentDuration?: string,
 *         postExperimentDuration?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTargetAccountConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createTargetAccountConfiguration(array{
 *     clientToken?: string,
 *     experimentTemplateId?: string,
 *     accountId?: string,
 *     roleArn?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTargetAccountConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTargetAccountConfigurationAsync(array{
 *     clientToken?: string,
 *     experimentTemplateId?: string,
 *     accountId?: string,
 *     roleArn?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteExperimentTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteExperimentTemplate(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExperimentTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExperimentTemplateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteTargetAccountConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteTargetAccountConfiguration(array{experimentTemplateId?: string, accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTargetAccountConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTargetAccountConfigurationAsync(array{experimentTemplateId?: string, accountId?: string, ...} $args = [])
 * @method \Aws\Result getAction(array $args = [])
 * @phpstan-method \Aws\Result getAction(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getActionAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getExperiment(array $args = [])
 * @phpstan-method \Aws\Result getExperiment(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExperimentAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getExperimentTargetAccountConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getExperimentTargetAccountConfiguration(array{experimentId?: string, accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExperimentTargetAccountConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExperimentTargetAccountConfigurationAsync(array{experimentId?: string, accountId?: string, ...} $args = [])
 * @method \Aws\Result getExperimentTemplate(array $args = [])
 * @phpstan-method \Aws\Result getExperimentTemplate(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExperimentTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExperimentTemplateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getSafetyLever(array $args = [])
 * @phpstan-method \Aws\Result getSafetyLever(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSafetyLeverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSafetyLeverAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getTargetAccountConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getTargetAccountConfiguration(array{experimentTemplateId?: string, accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTargetAccountConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTargetAccountConfigurationAsync(array{experimentTemplateId?: string, accountId?: string, ...} $args = [])
 * @method \Aws\Result getTargetResourceType(array $args = [])
 * @phpstan-method \Aws\Result getTargetResourceType(array{resourceType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTargetResourceTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTargetResourceTypeAsync(array{resourceType?: string, ...} $args = [])
 * @method \Aws\Result listActions(array $args = [])
 * @phpstan-method \Aws\Result listActions(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActionsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listExperimentResolvedTargets(array $args = [])
 * @phpstan-method \Aws\Result listExperimentResolvedTargets(array{experimentId?: string, maxResults?: int, nextToken?: string, targetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExperimentResolvedTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExperimentResolvedTargetsAsync(array{experimentId?: string, maxResults?: int, nextToken?: string, targetName?: string, ...} $args = [])
 * @method \Aws\Result listExperimentTargetAccountConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listExperimentTargetAccountConfigurations(array{experimentId?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExperimentTargetAccountConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExperimentTargetAccountConfigurationsAsync(array{experimentId?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listExperimentTemplates(array $args = [])
 * @phpstan-method \Aws\Result listExperimentTemplates(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExperimentTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExperimentTemplatesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listExperiments(array $args = [])
 * @phpstan-method \Aws\Result listExperiments(array{maxResults?: int, nextToken?: string, experimentTemplateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExperimentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExperimentsAsync(array{maxResults?: int, nextToken?: string, experimentTemplateId?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTargetAccountConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listTargetAccountConfigurations(array{experimentTemplateId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetAccountConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTargetAccountConfigurationsAsync(array{experimentTemplateId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTargetResourceTypes(array $args = [])
 * @phpstan-method \Aws\Result listTargetResourceTypes(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetResourceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTargetResourceTypesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result startExperiment(array $args = [])
 * @phpstan-method \Aws\Result startExperiment(array{
 *     clientToken?: string,
 *     experimentTemplateId?: string,
 *     experimentOptions?: array{actionsMode?: 'run-all'|'skip-all', ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startExperimentAsync(array{
 *     clientToken?: string,
 *     experimentTemplateId?: string,
 *     experimentOptions?: array{actionsMode?: 'run-all'|'skip-all', ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopExperiment(array $args = [])
 * @phpstan-method \Aws\Result stopExperiment(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopExperimentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopExperimentAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateExperimentTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateExperimentTemplate(array{
 *     id?: string,
 *     description?: string,
 *     stopConditions?: list<array{source?: string, value?: string, ...}>,
 *     targets?: array<string, array{
 *         resourceType?: string,
 *         resourceArns?: list<string>,
 *         resourceTags?: array<string, string>,
 *         filters?: list<array>,
 *         selectionMode?: string,
 *         parameters?: array<string, string>,
 *         ...,
 *     }>,
 *     actions?: array<string, array{
 *         actionId?: string,
 *         description?: string,
 *         parameters?: array<string, string>,
 *         targets?: array<string, string>,
 *         startAfter?: list<string>,
 *         ...,
 *     }>,
 *     roleArn?: string,
 *     logConfiguration?: array{
 *         cloudWatchLogsConfiguration?: array{logGroupArn?: string, ...},
 *         s3Configuration?: array{bucketName?: string, prefix?: string, ...},
 *         logSchemaVersion?: int,
 *         ...,
 *     },
 *     experimentOptions?: array{emptyTargetResolutionMode?: 'fail'|'skip', ...},
 *     experimentReportConfiguration?: array{
 *         outputs?: array{s3Configuration?: array, ...},
 *         dataSources?: array{cloudWatchDashboards?: list<array>, ...},
 *         preExperimentDuration?: string,
 *         postExperimentDuration?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateExperimentTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateExperimentTemplateAsync(array{
 *     id?: string,
 *     description?: string,
 *     stopConditions?: list<array{source?: string, value?: string, ...}>,
 *     targets?: array<string, array{
 *         resourceType?: string,
 *         resourceArns?: list<string>,
 *         resourceTags?: array<string, string>,
 *         filters?: list<array>,
 *         selectionMode?: string,
 *         parameters?: array<string, string>,
 *         ...,
 *     }>,
 *     actions?: array<string, array{
 *         actionId?: string,
 *         description?: string,
 *         parameters?: array<string, string>,
 *         targets?: array<string, string>,
 *         startAfter?: list<string>,
 *         ...,
 *     }>,
 *     roleArn?: string,
 *     logConfiguration?: array{
 *         cloudWatchLogsConfiguration?: array{logGroupArn?: string, ...},
 *         s3Configuration?: array{bucketName?: string, prefix?: string, ...},
 *         logSchemaVersion?: int,
 *         ...,
 *     },
 *     experimentOptions?: array{emptyTargetResolutionMode?: 'fail'|'skip', ...},
 *     experimentReportConfiguration?: array{
 *         outputs?: array{s3Configuration?: array, ...},
 *         dataSources?: array{cloudWatchDashboards?: list<array>, ...},
 *         preExperimentDuration?: string,
 *         postExperimentDuration?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSafetyLeverState(array $args = [])
 * @phpstan-method \Aws\Result updateSafetyLeverState(array{id?: string, state?: array{status?: 'disengaged'|'engaged', reason?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSafetyLeverStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSafetyLeverStateAsync(array{id?: string, state?: array{status?: 'disengaged'|'engaged', reason?: string, ...}, ...} $args = [])
 * @method \Aws\Result updateTargetAccountConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateTargetAccountConfiguration(array{experimentTemplateId?: string, accountId?: string, roleArn?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTargetAccountConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTargetAccountConfigurationAsync(array{experimentTemplateId?: string, accountId?: string, roleArn?: string, description?: string, ...} $args = [])
 */
class FISClient extends AwsClient {}
