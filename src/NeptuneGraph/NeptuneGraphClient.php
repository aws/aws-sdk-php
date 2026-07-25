<?php
namespace Aws\NeptuneGraph;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Neptune Graph** service.
 * @method \Aws\Result cancelExportTask(array $args = [])
 * @phpstan-method \Aws\Result cancelExportTask(array{taskIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelExportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelExportTaskAsync(array{taskIdentifier?: string, ...} $args = [])
 * @method \Aws\Result cancelImportTask(array $args = [])
 * @phpstan-method \Aws\Result cancelImportTask(array{taskIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelImportTaskAsync(array{taskIdentifier?: string, ...} $args = [])
 * @method \Aws\Result cancelQuery(array $args = [])
 * @phpstan-method \Aws\Result cancelQuery(array{graphIdentifier?: string, queryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelQueryAsync(array{graphIdentifier?: string, queryId?: string, ...} $args = [])
 * @method \Aws\Result createGraph(array $args = [])
 * @phpstan-method \Aws\Result createGraph(array{
 *     graphName?: string,
 *     tags?: array<string, string>,
 *     publicConnectivity?: bool,
 *     kmsKeyIdentifier?: string,
 *     vectorSearchConfiguration?: array{dimension?: int, ...},
 *     replicaCount?: int,
 *     deletionProtection?: bool,
 *     provisionedMemory?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGraphAsync(array{
 *     graphName?: string,
 *     tags?: array<string, string>,
 *     publicConnectivity?: bool,
 *     kmsKeyIdentifier?: string,
 *     vectorSearchConfiguration?: array{dimension?: int, ...},
 *     replicaCount?: int,
 *     deletionProtection?: bool,
 *     provisionedMemory?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGraphSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createGraphSnapshot(array{graphIdentifier?: string, snapshotName?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGraphSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGraphSnapshotAsync(array{graphIdentifier?: string, snapshotName?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createGraphUsingImportTask(array $args = [])
 * @phpstan-method \Aws\Result createGraphUsingImportTask(array{
 *     graphName?: string,
 *     tags?: array<string, string>,
 *     publicConnectivity?: bool,
 *     kmsKeyIdentifier?: string,
 *     vectorSearchConfiguration?: array{dimension?: int, ...},
 *     replicaCount?: int,
 *     deletionProtection?: bool,
 *     importOptions?: array{
 *         neptune?: array{
 *             s3ExportPath?: string,
 *             s3ExportKmsKeyId?: string,
 *             preserveDefaultVertexLabels?: bool,
 *             preserveEdgeIds?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     maxProvisionedMemory?: int,
 *     minProvisionedMemory?: int,
 *     failOnError?: bool,
 *     source?: string,
 *     format?: 'CSV'|'NTRIPLES'|'OPEN_CYPHER'|'PARQUET',
 *     parquetType?: 'COLUMNAR',
 *     blankNodeHandling?: 'convertToIri',
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGraphUsingImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGraphUsingImportTaskAsync(array{
 *     graphName?: string,
 *     tags?: array<string, string>,
 *     publicConnectivity?: bool,
 *     kmsKeyIdentifier?: string,
 *     vectorSearchConfiguration?: array{dimension?: int, ...},
 *     replicaCount?: int,
 *     deletionProtection?: bool,
 *     importOptions?: array{
 *         neptune?: array{
 *             s3ExportPath?: string,
 *             s3ExportKmsKeyId?: string,
 *             preserveDefaultVertexLabels?: bool,
 *             preserveEdgeIds?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     maxProvisionedMemory?: int,
 *     minProvisionedMemory?: int,
 *     failOnError?: bool,
 *     source?: string,
 *     format?: 'CSV'|'NTRIPLES'|'OPEN_CYPHER'|'PARQUET',
 *     parquetType?: 'COLUMNAR',
 *     blankNodeHandling?: 'convertToIri',
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPrivateGraphEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createPrivateGraphEndpoint(array{
 *     graphIdentifier?: string,
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPrivateGraphEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPrivateGraphEndpointAsync(array{
 *     graphIdentifier?: string,
 *     vpcId?: string,
 *     subnetIds?: list<string>,
 *     vpcSecurityGroupIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGraph(array $args = [])
 * @phpstan-method \Aws\Result deleteGraph(array{graphIdentifier?: string, skipSnapshot?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGraphAsync(array{graphIdentifier?: string, skipSnapshot?: bool, ...} $args = [])
 * @method \Aws\Result deleteGraphSnapshot(array $args = [])
 * @phpstan-method \Aws\Result deleteGraphSnapshot(array{snapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGraphSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGraphSnapshotAsync(array{snapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deletePrivateGraphEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deletePrivateGraphEndpoint(array{graphIdentifier?: string, vpcId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePrivateGraphEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePrivateGraphEndpointAsync(array{graphIdentifier?: string, vpcId?: string, ...} $args = [])
 * @method \Aws\Result executeQuery(array $args = [])
 * @phpstan-method \Aws\Result executeQuery(array{
 *     graphIdentifier?: string,
 *     queryString?: string,
 *     language?: 'OPEN_CYPHER',
 *     parameters?: array<string, array>,
 *     planCache?: 'AUTO'|'DISABLED'|'ENABLED',
 *     explainMode?: 'DETAILS'|'STATIC',
 *     queryTimeoutMilliseconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeQueryAsync(array{
 *     graphIdentifier?: string,
 *     queryString?: string,
 *     language?: 'OPEN_CYPHER',
 *     parameters?: array<string, array>,
 *     planCache?: 'AUTO'|'DISABLED'|'ENABLED',
 *     explainMode?: 'DETAILS'|'STATIC',
 *     queryTimeoutMilliseconds?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getExportTask(array $args = [])
 * @phpstan-method \Aws\Result getExportTask(array{taskIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExportTaskAsync(array{taskIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getGraph(array $args = [])
 * @phpstan-method \Aws\Result getGraph(array{graphIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGraphAsync(array{graphIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getGraphSnapshot(array $args = [])
 * @phpstan-method \Aws\Result getGraphSnapshot(array{snapshotIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGraphSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGraphSnapshotAsync(array{snapshotIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getGraphSummary(array $args = [])
 * @phpstan-method \Aws\Result getGraphSummary(array{graphIdentifier?: string, mode?: 'BASIC'|'DETAILED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGraphSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGraphSummaryAsync(array{graphIdentifier?: string, mode?: 'BASIC'|'DETAILED', ...} $args = [])
 * @method \Aws\Result getImportTask(array $args = [])
 * @phpstan-method \Aws\Result getImportTask(array{taskIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImportTaskAsync(array{taskIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getPrivateGraphEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getPrivateGraphEndpoint(array{graphIdentifier?: string, vpcId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPrivateGraphEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPrivateGraphEndpointAsync(array{graphIdentifier?: string, vpcId?: string, ...} $args = [])
 * @method \Aws\Result getQuery(array $args = [])
 * @phpstan-method \Aws\Result getQuery(array{graphIdentifier?: string, queryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryAsync(array{graphIdentifier?: string, queryId?: string, ...} $args = [])
 * @method \Aws\Result listExportTasks(array $args = [])
 * @phpstan-method \Aws\Result listExportTasks(array{graphIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listExportTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExportTasksAsync(array{graphIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listGraphSnapshots(array $args = [])
 * @phpstan-method \Aws\Result listGraphSnapshots(array{graphIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGraphSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGraphSnapshotsAsync(array{graphIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listGraphs(array $args = [])
 * @phpstan-method \Aws\Result listGraphs(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGraphsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGraphsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listImportTasks(array $args = [])
 * @phpstan-method \Aws\Result listImportTasks(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportTasksAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPrivateGraphEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listPrivateGraphEndpoints(array{graphIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrivateGraphEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPrivateGraphEndpointsAsync(array{graphIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listQueries(array $args = [])
 * @phpstan-method \Aws\Result listQueries(array{graphIdentifier?: string, maxResults?: int, state?: 'ALL'|'CANCELLING'|'RUNNING'|'WAITING', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQueriesAsync(array{graphIdentifier?: string, maxResults?: int, state?: 'ALL'|'CANCELLING'|'RUNNING'|'WAITING', ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result resetGraph(array $args = [])
 * @phpstan-method \Aws\Result resetGraph(array{graphIdentifier?: string, skipSnapshot?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetGraphAsync(array{graphIdentifier?: string, skipSnapshot?: bool, ...} $args = [])
 * @method \Aws\Result restoreGraphFromSnapshot(array $args = [])
 * @phpstan-method \Aws\Result restoreGraphFromSnapshot(array{
 *     snapshotIdentifier?: string,
 *     graphName?: string,
 *     provisionedMemory?: int,
 *     deletionProtection?: bool,
 *     tags?: array<string, string>,
 *     replicaCount?: int,
 *     publicConnectivity?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreGraphFromSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreGraphFromSnapshotAsync(array{
 *     snapshotIdentifier?: string,
 *     graphName?: string,
 *     provisionedMemory?: int,
 *     deletionProtection?: bool,
 *     tags?: array<string, string>,
 *     replicaCount?: int,
 *     publicConnectivity?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startExportTask(array $args = [])
 * @phpstan-method \Aws\Result startExportTask(array{
 *     graphIdentifier?: string,
 *     roleArn?: string,
 *     format?: 'CSV'|'PARQUET',
 *     destination?: string,
 *     kmsKeyIdentifier?: string,
 *     parquetType?: 'COLUMNAR',
 *     exportFilter?: array{vertexFilter?: array<string, array>, edgeFilter?: array<string, array>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startExportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startExportTaskAsync(array{
 *     graphIdentifier?: string,
 *     roleArn?: string,
 *     format?: 'CSV'|'PARQUET',
 *     destination?: string,
 *     kmsKeyIdentifier?: string,
 *     parquetType?: 'COLUMNAR',
 *     exportFilter?: array{vertexFilter?: array<string, array>, edgeFilter?: array<string, array>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startGraph(array $args = [])
 * @phpstan-method \Aws\Result startGraph(array{graphIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startGraphAsync(array{graphIdentifier?: string, ...} $args = [])
 * @method \Aws\Result startImportTask(array $args = [])
 * @phpstan-method \Aws\Result startImportTask(array{
 *     importOptions?: array{
 *         neptune?: array{
 *             s3ExportPath?: string,
 *             s3ExportKmsKeyId?: string,
 *             preserveDefaultVertexLabels?: bool,
 *             preserveEdgeIds?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     failOnError?: bool,
 *     source?: string,
 *     format?: 'CSV'|'NTRIPLES'|'OPEN_CYPHER'|'PARQUET',
 *     parquetType?: 'COLUMNAR',
 *     blankNodeHandling?: 'convertToIri',
 *     graphIdentifier?: string,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImportTaskAsync(array{
 *     importOptions?: array{
 *         neptune?: array{
 *             s3ExportPath?: string,
 *             s3ExportKmsKeyId?: string,
 *             preserveDefaultVertexLabels?: bool,
 *             preserveEdgeIds?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     failOnError?: bool,
 *     source?: string,
 *     format?: 'CSV'|'NTRIPLES'|'OPEN_CYPHER'|'PARQUET',
 *     parquetType?: 'COLUMNAR',
 *     blankNodeHandling?: 'convertToIri',
 *     graphIdentifier?: string,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopGraph(array $args = [])
 * @phpstan-method \Aws\Result stopGraph(array{graphIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopGraphAsync(array{graphIdentifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateGraph(array $args = [])
 * @phpstan-method \Aws\Result updateGraph(array{
 *     graphIdentifier?: string,
 *     publicConnectivity?: bool,
 *     provisionedMemory?: int,
 *     deletionProtection?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGraphAsync(array{
 *     graphIdentifier?: string,
 *     publicConnectivity?: bool,
 *     provisionedMemory?: int,
 *     deletionProtection?: bool,
 *     ...,
 * } $args = [])
 */
class NeptuneGraphClient extends AwsClient {}
