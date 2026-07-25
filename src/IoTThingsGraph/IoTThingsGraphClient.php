<?php
namespace Aws\IoTThingsGraph;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Things Graph** service.
 * @method \Aws\Result associateEntityToThing(array $args = [])
 * @phpstan-method \Aws\Result associateEntityToThing(array{thingName?: string, entityId?: string, namespaceVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateEntityToThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateEntityToThingAsync(array{thingName?: string, entityId?: string, namespaceVersion?: int, ...} $args = [])
 * @method \Aws\Result createFlowTemplate(array $args = [])
 * @phpstan-method \Aws\Result createFlowTemplate(array{definition?: array{language?: 'GRAPHQL', text?: string, ...}, compatibleNamespaceVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createFlowTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFlowTemplateAsync(array{definition?: array{language?: 'GRAPHQL', text?: string, ...}, compatibleNamespaceVersion?: int, ...} $args = [])
 * @method \Aws\Result createSystemInstance(array $args = [])
 * @phpstan-method \Aws\Result createSystemInstance(array{
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     definition?: array{language?: 'GRAPHQL', text?: string, ...},
 *     target?: 'CLOUD'|'GREENGRASS',
 *     greengrassGroupName?: string,
 *     s3BucketName?: string,
 *     metricsConfiguration?: array{cloudMetricEnabled?: bool, metricRuleRoleArn?: string, ...},
 *     flowActionsRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSystemInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSystemInstanceAsync(array{
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     definition?: array{language?: 'GRAPHQL', text?: string, ...},
 *     target?: 'CLOUD'|'GREENGRASS',
 *     greengrassGroupName?: string,
 *     s3BucketName?: string,
 *     metricsConfiguration?: array{cloudMetricEnabled?: bool, metricRuleRoleArn?: string, ...},
 *     flowActionsRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSystemTemplate(array $args = [])
 * @phpstan-method \Aws\Result createSystemTemplate(array{definition?: array{language?: 'GRAPHQL', text?: string, ...}, compatibleNamespaceVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSystemTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSystemTemplateAsync(array{definition?: array{language?: 'GRAPHQL', text?: string, ...}, compatibleNamespaceVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteFlowTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteFlowTemplate(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFlowTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFlowTemplateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteNamespace(array $args = [])
 * @phpstan-method \Aws\Result deleteNamespace(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNamespaceAsync(array{...} $args = [])
 * @method \Aws\Result deleteSystemInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteSystemInstance(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSystemInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSystemInstanceAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteSystemTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteSystemTemplate(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSystemTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSystemTemplateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deploySystemInstance(array $args = [])
 * @phpstan-method \Aws\Result deploySystemInstance(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deploySystemInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deploySystemInstanceAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deprecateFlowTemplate(array $args = [])
 * @phpstan-method \Aws\Result deprecateFlowTemplate(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deprecateFlowTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deprecateFlowTemplateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deprecateSystemTemplate(array $args = [])
 * @phpstan-method \Aws\Result deprecateSystemTemplate(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deprecateSystemTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deprecateSystemTemplateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result describeNamespace(array $args = [])
 * @phpstan-method \Aws\Result describeNamespace(array{namespaceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNamespaceAsync(array{namespaceName?: string, ...} $args = [])
 * @method \Aws\Result dissociateEntityFromThing(array $args = [])
 * @phpstan-method \Aws\Result dissociateEntityFromThing(array{
 *     thingName?: string,
 *     entityType?: 'ACTION'|'CAPABILITY'|'DEVICE'|'DEVICE_MODEL'|'ENUM'|'EVENT'|'MAPPING'|'PROPERTY'|'SERVICE'|'STATE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise dissociateEntityFromThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise dissociateEntityFromThingAsync(array{
 *     thingName?: string,
 *     entityType?: 'ACTION'|'CAPABILITY'|'DEVICE'|'DEVICE_MODEL'|'ENUM'|'EVENT'|'MAPPING'|'PROPERTY'|'SERVICE'|'STATE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getEntities(array $args = [])
 * @phpstan-method \Aws\Result getEntities(array{ids?: list<string>, namespaceVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEntitiesAsync(array{ids?: list<string>, namespaceVersion?: int, ...} $args = [])
 * @method \Aws\Result getFlowTemplate(array $args = [])
 * @phpstan-method \Aws\Result getFlowTemplate(array{id?: string, revisionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFlowTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFlowTemplateAsync(array{id?: string, revisionNumber?: int, ...} $args = [])
 * @method \Aws\Result getFlowTemplateRevisions(array $args = [])
 * @phpstan-method \Aws\Result getFlowTemplateRevisions(array{id?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFlowTemplateRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFlowTemplateRevisionsAsync(array{id?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getNamespaceDeletionStatus(array $args = [])
 * @phpstan-method \Aws\Result getNamespaceDeletionStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNamespaceDeletionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNamespaceDeletionStatusAsync(array{...} $args = [])
 * @method \Aws\Result getSystemInstance(array $args = [])
 * @phpstan-method \Aws\Result getSystemInstance(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSystemInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSystemInstanceAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getSystemTemplate(array $args = [])
 * @phpstan-method \Aws\Result getSystemTemplate(array{id?: string, revisionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSystemTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSystemTemplateAsync(array{id?: string, revisionNumber?: int, ...} $args = [])
 * @method \Aws\Result getSystemTemplateRevisions(array $args = [])
 * @phpstan-method \Aws\Result getSystemTemplateRevisions(array{id?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSystemTemplateRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSystemTemplateRevisionsAsync(array{id?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getUploadStatus(array $args = [])
 * @phpstan-method \Aws\Result getUploadStatus(array{uploadId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUploadStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUploadStatusAsync(array{uploadId?: string, ...} $args = [])
 * @method \Aws\Result listFlowExecutionMessages(array $args = [])
 * @phpstan-method \Aws\Result listFlowExecutionMessages(array{flowExecutionId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowExecutionMessagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowExecutionMessagesAsync(array{flowExecutionId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{maxResults?: int, resourceArn?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{maxResults?: int, resourceArn?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result searchEntities(array $args = [])
 * @phpstan-method \Aws\Result searchEntities(array{
 *     entityTypes?: list<'ACTION'|'CAPABILITY'|'DEVICE'|'DEVICE_MODEL'|'ENUM'|'EVENT'|'MAPPING'|'PROPERTY'|'SERVICE'|'STATE'>,
 *     filters?: list<array{name?: 'NAME'|'NAMESPACE'|'REFERENCED_ENTITY_ID'|'SEMANTIC_TYPE_PATH', value?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     namespaceVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchEntitiesAsync(array{
 *     entityTypes?: list<'ACTION'|'CAPABILITY'|'DEVICE'|'DEVICE_MODEL'|'ENUM'|'EVENT'|'MAPPING'|'PROPERTY'|'SERVICE'|'STATE'>,
 *     filters?: list<array{name?: 'NAME'|'NAMESPACE'|'REFERENCED_ENTITY_ID'|'SEMANTIC_TYPE_PATH', value?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     namespaceVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchFlowExecutions(array $args = [])
 * @phpstan-method \Aws\Result searchFlowExecutions(array{
 *     systemInstanceId?: string,
 *     flowExecutionId?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchFlowExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchFlowExecutionsAsync(array{
 *     systemInstanceId?: string,
 *     flowExecutionId?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchFlowTemplates(array $args = [])
 * @phpstan-method \Aws\Result searchFlowTemplates(array{
 *     filters?: list<array{name?: 'DEVICE_MODEL_ID', value?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchFlowTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchFlowTemplatesAsync(array{
 *     filters?: list<array{name?: 'DEVICE_MODEL_ID', value?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchSystemInstances(array $args = [])
 * @phpstan-method \Aws\Result searchSystemInstances(array{
 *     filters?: list<array{name?: 'GREENGRASS_GROUP_NAME'|'STATUS'|'SYSTEM_TEMPLATE_ID', value?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchSystemInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchSystemInstancesAsync(array{
 *     filters?: list<array{name?: 'GREENGRASS_GROUP_NAME'|'STATUS'|'SYSTEM_TEMPLATE_ID', value?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchSystemTemplates(array $args = [])
 * @phpstan-method \Aws\Result searchSystemTemplates(array{
 *     filters?: list<array{name?: 'FLOW_TEMPLATE_ID', value?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchSystemTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchSystemTemplatesAsync(array{
 *     filters?: list<array{name?: 'FLOW_TEMPLATE_ID', value?: list<string>, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchThings(array $args = [])
 * @phpstan-method \Aws\Result searchThings(array{entityId?: string, nextToken?: string, maxResults?: int, namespaceVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise searchThingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchThingsAsync(array{entityId?: string, nextToken?: string, maxResults?: int, namespaceVersion?: int, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result undeploySystemInstance(array $args = [])
 * @phpstan-method \Aws\Result undeploySystemInstance(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise undeploySystemInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise undeploySystemInstanceAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateFlowTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateFlowTemplate(array{
 *     id?: string,
 *     definition?: array{language?: 'GRAPHQL', text?: string, ...},
 *     compatibleNamespaceVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlowTemplateAsync(array{
 *     id?: string,
 *     definition?: array{language?: 'GRAPHQL', text?: string, ...},
 *     compatibleNamespaceVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSystemTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateSystemTemplate(array{
 *     id?: string,
 *     definition?: array{language?: 'GRAPHQL', text?: string, ...},
 *     compatibleNamespaceVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSystemTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSystemTemplateAsync(array{
 *     id?: string,
 *     definition?: array{language?: 'GRAPHQL', text?: string, ...},
 *     compatibleNamespaceVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result uploadEntityDefinitions(array $args = [])
 * @phpstan-method \Aws\Result uploadEntityDefinitions(array{
 *     document?: array{language?: 'GRAPHQL', text?: string, ...},
 *     syncWithPublicNamespace?: bool,
 *     deprecateExistingEntities?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadEntityDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadEntityDefinitionsAsync(array{
 *     document?: array{language?: 'GRAPHQL', text?: string, ...},
 *     syncWithPublicNamespace?: bool,
 *     deprecateExistingEntities?: bool,
 *     ...,
 * } $args = [])
 */
class IoTThingsGraphClient extends AwsClient {}
