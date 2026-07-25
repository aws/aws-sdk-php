<?php
namespace Aws\SupplyChain;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Supply Chain** service.
 * @method \Aws\Result createBillOfMaterialsImportJob(array $args = [])
 * @phpstan-method \Aws\Result createBillOfMaterialsImportJob(array{instanceId?: string, s3uri?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBillOfMaterialsImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBillOfMaterialsImportJobAsync(array{instanceId?: string, s3uri?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createDataIntegrationFlow(array $args = [])
 * @phpstan-method \Aws\Result createDataIntegrationFlow(array{
 *     instanceId?: string,
 *     name?: string,
 *     sources?: list<array{sourceType?: 'DATASET'|'S3', sourceName?: string, s3Source?: array, datasetSource?: array, ...}>,
 *     transformation?: array{transformationType?: 'NONE'|'SQL', sqlTransformation?: array{query?: string, ...}, ...},
 *     target?: array{
 *         targetType?: 'DATASET'|'S3',
 *         s3Target?: array{bucketName?: string, prefix?: string, options?: array, ...},
 *         datasetTarget?: array{datasetIdentifier?: string, options?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataIntegrationFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataIntegrationFlowAsync(array{
 *     instanceId?: string,
 *     name?: string,
 *     sources?: list<array{sourceType?: 'DATASET'|'S3', sourceName?: string, s3Source?: array, datasetSource?: array, ...}>,
 *     transformation?: array{transformationType?: 'NONE'|'SQL', sqlTransformation?: array{query?: string, ...}, ...},
 *     target?: array{
 *         targetType?: 'DATASET'|'S3',
 *         s3Target?: array{bucketName?: string, prefix?: string, options?: array, ...},
 *         datasetTarget?: array{datasetIdentifier?: string, options?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataLakeDataset(array $args = [])
 * @phpstan-method \Aws\Result createDataLakeDataset(array{
 *     instanceId?: string,
 *     namespace?: string,
 *     name?: string,
 *     schema?: array{name?: string, fields?: list<array>, primaryKeys?: list<array>, ...},
 *     description?: string,
 *     partitionSpec?: array{fields?: list<array>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataLakeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataLakeDatasetAsync(array{
 *     instanceId?: string,
 *     namespace?: string,
 *     name?: string,
 *     schema?: array{name?: string, fields?: list<array>, primaryKeys?: list<array>, ...},
 *     description?: string,
 *     partitionSpec?: array{fields?: list<array>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataLakeNamespace(array $args = [])
 * @phpstan-method \Aws\Result createDataLakeNamespace(array{instanceId?: string, name?: string, description?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataLakeNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataLakeNamespaceAsync(array{instanceId?: string, name?: string, description?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createInstance(array $args = [])
 * @phpstan-method \Aws\Result createInstance(array{
 *     instanceName?: string,
 *     instanceDescription?: string,
 *     kmsKeyArn?: string,
 *     webAppDnsDomain?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInstanceAsync(array{
 *     instanceName?: string,
 *     instanceDescription?: string,
 *     kmsKeyArn?: string,
 *     webAppDnsDomain?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDataIntegrationFlow(array $args = [])
 * @phpstan-method \Aws\Result deleteDataIntegrationFlow(array{instanceId?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataIntegrationFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataIntegrationFlowAsync(array{instanceId?: string, name?: string, ...} $args = [])
 * @method \Aws\Result deleteDataLakeDataset(array $args = [])
 * @phpstan-method \Aws\Result deleteDataLakeDataset(array{instanceId?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataLakeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataLakeDatasetAsync(array{instanceId?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \Aws\Result deleteDataLakeNamespace(array $args = [])
 * @phpstan-method \Aws\Result deleteDataLakeNamespace(array{instanceId?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataLakeNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataLakeNamespaceAsync(array{instanceId?: string, name?: string, ...} $args = [])
 * @method \Aws\Result deleteInstance(array $args = [])
 * @phpstan-method \Aws\Result deleteInstance(array{instanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstanceAsync(array{instanceId?: string, ...} $args = [])
 * @method \Aws\Result getBillOfMaterialsImportJob(array $args = [])
 * @phpstan-method \Aws\Result getBillOfMaterialsImportJob(array{instanceId?: string, jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBillOfMaterialsImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBillOfMaterialsImportJobAsync(array{instanceId?: string, jobId?: string, ...} $args = [])
 * @method \Aws\Result getDataIntegrationEvent(array $args = [])
 * @phpstan-method \Aws\Result getDataIntegrationEvent(array{instanceId?: string, eventId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataIntegrationEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataIntegrationEventAsync(array{instanceId?: string, eventId?: string, ...} $args = [])
 * @method \Aws\Result getDataIntegrationFlow(array $args = [])
 * @phpstan-method \Aws\Result getDataIntegrationFlow(array{instanceId?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataIntegrationFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataIntegrationFlowAsync(array{instanceId?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getDataIntegrationFlowExecution(array $args = [])
 * @phpstan-method \Aws\Result getDataIntegrationFlowExecution(array{instanceId?: string, flowName?: string, executionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataIntegrationFlowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataIntegrationFlowExecutionAsync(array{instanceId?: string, flowName?: string, executionId?: string, ...} $args = [])
 * @method \Aws\Result getDataLakeDataset(array $args = [])
 * @phpstan-method \Aws\Result getDataLakeDataset(array{instanceId?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataLakeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataLakeDatasetAsync(array{instanceId?: string, namespace?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getDataLakeNamespace(array $args = [])
 * @phpstan-method \Aws\Result getDataLakeNamespace(array{instanceId?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataLakeNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataLakeNamespaceAsync(array{instanceId?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getInstance(array $args = [])
 * @phpstan-method \Aws\Result getInstance(array{instanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceAsync(array{instanceId?: string, ...} $args = [])
 * @method \Aws\Result listDataIntegrationEvents(array $args = [])
 * @phpstan-method \Aws\Result listDataIntegrationEvents(array{
 *     instanceId?: string,
 *     eventType?: 'scn.data.dataset'|'scn.data.forecast'|'scn.data.inboundorder'|'scn.data.inboundorderline'|'scn.data.inboundorderlineschedule'|'scn.data.inventorylevel'|'scn.data.outboundorderline'|'scn.data.outboundshipment'|'scn.data.processheader'|'scn.data.processoperation'|'scn.data.processproduct'|'scn.data.reservation'|'scn.data.shipment'|'scn.data.shipmentstop'|'scn.data.shipmentstoporder'|'scn.data.supplyplan',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataIntegrationEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataIntegrationEventsAsync(array{
 *     instanceId?: string,
 *     eventType?: 'scn.data.dataset'|'scn.data.forecast'|'scn.data.inboundorder'|'scn.data.inboundorderline'|'scn.data.inboundorderlineschedule'|'scn.data.inventorylevel'|'scn.data.outboundorderline'|'scn.data.outboundshipment'|'scn.data.processheader'|'scn.data.processoperation'|'scn.data.processproduct'|'scn.data.reservation'|'scn.data.shipment'|'scn.data.shipmentstop'|'scn.data.shipmentstoporder'|'scn.data.supplyplan',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataIntegrationFlowExecutions(array $args = [])
 * @phpstan-method \Aws\Result listDataIntegrationFlowExecutions(array{instanceId?: string, flowName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataIntegrationFlowExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataIntegrationFlowExecutionsAsync(array{instanceId?: string, flowName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataIntegrationFlows(array $args = [])
 * @phpstan-method \Aws\Result listDataIntegrationFlows(array{instanceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataIntegrationFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataIntegrationFlowsAsync(array{instanceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataLakeDatasets(array $args = [])
 * @phpstan-method \Aws\Result listDataLakeDatasets(array{instanceId?: string, namespace?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataLakeDatasetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataLakeDatasetsAsync(array{instanceId?: string, namespace?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataLakeNamespaces(array $args = [])
 * @phpstan-method \Aws\Result listDataLakeNamespaces(array{instanceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataLakeNamespacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataLakeNamespacesAsync(array{instanceId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listInstances(array $args = [])
 * @phpstan-method \Aws\Result listInstances(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     instanceNameFilter?: list<string>,
 *     instanceStateFilter?: list<'Active'|'CreateFailed'|'DeleteFailed'|'Deleted'|'Deleting'|'Initializing'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInstancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInstancesAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     instanceNameFilter?: list<string>,
 *     instanceStateFilter?: list<'Active'|'CreateFailed'|'DeleteFailed'|'Deleted'|'Deleting'|'Initializing'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result sendDataIntegrationEvent(array $args = [])
 * @phpstan-method \Aws\Result sendDataIntegrationEvent(array{
 *     instanceId?: string,
 *     eventType?: 'scn.data.dataset'|'scn.data.forecast'|'scn.data.inboundorder'|'scn.data.inboundorderline'|'scn.data.inboundorderlineschedule'|'scn.data.inventorylevel'|'scn.data.outboundorderline'|'scn.data.outboundshipment'|'scn.data.processheader'|'scn.data.processoperation'|'scn.data.processproduct'|'scn.data.reservation'|'scn.data.shipment'|'scn.data.shipmentstop'|'scn.data.shipmentstoporder'|'scn.data.supplyplan',
 *     data?: string,
 *     eventGroupId?: string,
 *     eventTimestamp?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     datasetTarget?: array{datasetIdentifier?: string, operationType?: 'APPEND'|'DELETE'|'UPSERT', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendDataIntegrationEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendDataIntegrationEventAsync(array{
 *     instanceId?: string,
 *     eventType?: 'scn.data.dataset'|'scn.data.forecast'|'scn.data.inboundorder'|'scn.data.inboundorderline'|'scn.data.inboundorderlineschedule'|'scn.data.inventorylevel'|'scn.data.outboundorderline'|'scn.data.outboundshipment'|'scn.data.processheader'|'scn.data.processoperation'|'scn.data.processproduct'|'scn.data.reservation'|'scn.data.shipment'|'scn.data.shipmentstop'|'scn.data.shipmentstoporder'|'scn.data.supplyplan',
 *     data?: string,
 *     eventGroupId?: string,
 *     eventTimestamp?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     datasetTarget?: array{datasetIdentifier?: string, operationType?: 'APPEND'|'DELETE'|'UPSERT', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDataIntegrationFlow(array $args = [])
 * @phpstan-method \Aws\Result updateDataIntegrationFlow(array{
 *     instanceId?: string,
 *     name?: string,
 *     sources?: list<array{sourceType?: 'DATASET'|'S3', sourceName?: string, s3Source?: array, datasetSource?: array, ...}>,
 *     transformation?: array{transformationType?: 'NONE'|'SQL', sqlTransformation?: array{query?: string, ...}, ...},
 *     target?: array{
 *         targetType?: 'DATASET'|'S3',
 *         s3Target?: array{bucketName?: string, prefix?: string, options?: array, ...},
 *         datasetTarget?: array{datasetIdentifier?: string, options?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataIntegrationFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataIntegrationFlowAsync(array{
 *     instanceId?: string,
 *     name?: string,
 *     sources?: list<array{sourceType?: 'DATASET'|'S3', sourceName?: string, s3Source?: array, datasetSource?: array, ...}>,
 *     transformation?: array{transformationType?: 'NONE'|'SQL', sqlTransformation?: array{query?: string, ...}, ...},
 *     target?: array{
 *         targetType?: 'DATASET'|'S3',
 *         s3Target?: array{bucketName?: string, prefix?: string, options?: array, ...},
 *         datasetTarget?: array{datasetIdentifier?: string, options?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataLakeDataset(array $args = [])
 * @phpstan-method \Aws\Result updateDataLakeDataset(array{instanceId?: string, namespace?: string, name?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataLakeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataLakeDatasetAsync(array{instanceId?: string, namespace?: string, name?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateDataLakeNamespace(array $args = [])
 * @phpstan-method \Aws\Result updateDataLakeNamespace(array{instanceId?: string, name?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataLakeNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataLakeNamespaceAsync(array{instanceId?: string, name?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateInstance(array $args = [])
 * @phpstan-method \Aws\Result updateInstance(array{instanceId?: string, instanceName?: string, instanceDescription?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInstanceAsync(array{instanceId?: string, instanceName?: string, instanceDescription?: string, ...} $args = [])
 */
class SupplyChainClient extends AwsClient {}
