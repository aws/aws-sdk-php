<?php
namespace Aws\Appflow;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Appflow** service.
 * @method \Aws\Result cancelFlowExecutions(array $args = [])
 * @phpstan-method \Aws\Result cancelFlowExecutions(array{flowName?: string, executionIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelFlowExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelFlowExecutionsAsync(array{flowName?: string, executionIds?: list<string>, ...} $args = [])
 * @method \Aws\Result createConnectorProfile(array $args = [])
 * @phpstan-method \Aws\Result createConnectorProfile(array{
 *     connectorProfileName?: string,
 *     kmsArn?: string,
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     connectorLabel?: string,
 *     connectionMode?: 'Private'|'Public',
 *     connectorProfileConfig?: array{
 *         connectorProfileProperties?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             Honeycode?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             Redshift?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Snowflake?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         connectorProfileCredentials?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             Honeycode?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             Redshift?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Snowflake?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectorProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorProfileAsync(array{
 *     connectorProfileName?: string,
 *     kmsArn?: string,
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     connectorLabel?: string,
 *     connectionMode?: 'Private'|'Public',
 *     connectorProfileConfig?: array{
 *         connectorProfileProperties?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             Honeycode?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             Redshift?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Snowflake?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         connectorProfileCredentials?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             Honeycode?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             Redshift?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Snowflake?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFlow(array $args = [])
 * @phpstan-method \Aws\Result createFlow(array{
 *     flowName?: string,
 *     description?: string,
 *     kmsArn?: string,
 *     triggerConfig?: array{triggerType?: 'Event'|'OnDemand'|'Scheduled', triggerProperties?: array{Scheduled?: array, ...}, ...},
 *     sourceFlowConfig?: array{
 *         connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *         apiVersion?: string,
 *         connectorProfileName?: string,
 *         sourceConnectorProperties?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             S3?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         incrementalPullConfig?: array{datetimeTypeFieldName?: string, ...},
 *         ...,
 *     },
 *     destinationFlowConfigList?: list<array{
 *         connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *         apiVersion?: string,
 *         connectorProfileName?: string,
 *         destinationConnectorProperties?: array,
 *         ...,
 *     }>,
 *     tasks?: list<array{
 *         sourceFields?: list<string>,
 *         connectorOperator?: array,
 *         destinationField?: string,
 *         taskType?: 'Arithmetic'|'Filter'|'Map'|'Map_all'|'Mask'|'Merge'|'Partition'|'Passthrough'|'Truncate'|'Validate',
 *         taskProperties?: array<string, string>,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     metadataCatalogConfig?: array{glueDataCatalog?: array{roleArn?: string, databaseName?: string, tablePrefix?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFlowAsync(array{
 *     flowName?: string,
 *     description?: string,
 *     kmsArn?: string,
 *     triggerConfig?: array{triggerType?: 'Event'|'OnDemand'|'Scheduled', triggerProperties?: array{Scheduled?: array, ...}, ...},
 *     sourceFlowConfig?: array{
 *         connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *         apiVersion?: string,
 *         connectorProfileName?: string,
 *         sourceConnectorProperties?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             S3?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         incrementalPullConfig?: array{datetimeTypeFieldName?: string, ...},
 *         ...,
 *     },
 *     destinationFlowConfigList?: list<array{
 *         connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *         apiVersion?: string,
 *         connectorProfileName?: string,
 *         destinationConnectorProperties?: array,
 *         ...,
 *     }>,
 *     tasks?: list<array{
 *         sourceFields?: list<string>,
 *         connectorOperator?: array,
 *         destinationField?: string,
 *         taskType?: 'Arithmetic'|'Filter'|'Map'|'Map_all'|'Mask'|'Merge'|'Partition'|'Passthrough'|'Truncate'|'Validate',
 *         taskProperties?: array<string, string>,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     metadataCatalogConfig?: array{glueDataCatalog?: array{roleArn?: string, databaseName?: string, tablePrefix?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteConnectorProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectorProfile(array{connectorProfileName?: string, forceDelete?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectorProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectorProfileAsync(array{connectorProfileName?: string, forceDelete?: bool, ...} $args = [])
 * @method \Aws\Result deleteFlow(array $args = [])
 * @phpstan-method \Aws\Result deleteFlow(array{flowName?: string, forceDelete?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFlowAsync(array{flowName?: string, forceDelete?: bool, ...} $args = [])
 * @method \Aws\Result describeConnector(array $args = [])
 * @phpstan-method \Aws\Result describeConnector(array{
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     connectorLabel?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectorAsync(array{
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     connectorLabel?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeConnectorEntity(array $args = [])
 * @phpstan-method \Aws\Result describeConnectorEntity(array{
 *     connectorEntityName?: string,
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     connectorProfileName?: string,
 *     apiVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectorEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectorEntityAsync(array{
 *     connectorEntityName?: string,
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     connectorProfileName?: string,
 *     apiVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeConnectorProfiles(array $args = [])
 * @phpstan-method \Aws\Result describeConnectorProfiles(array{
 *     connectorProfileNames?: list<string>,
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     connectorLabel?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectorProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectorProfilesAsync(array{
 *     connectorProfileNames?: list<string>,
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     connectorLabel?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeConnectors(array $args = [])
 * @phpstan-method \Aws\Result describeConnectors(array{
 *     connectorTypes?: list<'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectorsAsync(array{
 *     connectorTypes?: list<'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk'>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeFlow(array $args = [])
 * @phpstan-method \Aws\Result describeFlow(array{flowName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFlowAsync(array{flowName?: string, ...} $args = [])
 * @method \Aws\Result describeFlowExecutionRecords(array $args = [])
 * @phpstan-method \Aws\Result describeFlowExecutionRecords(array{flowName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFlowExecutionRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFlowExecutionRecordsAsync(array{flowName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listConnectorEntities(array $args = [])
 * @phpstan-method \Aws\Result listConnectorEntities(array{
 *     connectorProfileName?: string,
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     entitiesPath?: string,
 *     apiVersion?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorEntitiesAsync(array{
 *     connectorProfileName?: string,
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     entitiesPath?: string,
 *     apiVersion?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listConnectors(array $args = [])
 * @phpstan-method \Aws\Result listConnectors(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listFlows(array $args = [])
 * @phpstan-method \Aws\Result listFlows(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result registerConnector(array $args = [])
 * @phpstan-method \Aws\Result registerConnector(array{
 *     connectorLabel?: string,
 *     description?: string,
 *     connectorProvisioningType?: 'LAMBDA',
 *     connectorProvisioningConfig?: array{lambda?: array{lambdaArn?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerConnectorAsync(array{
 *     connectorLabel?: string,
 *     description?: string,
 *     connectorProvisioningType?: 'LAMBDA',
 *     connectorProvisioningConfig?: array{lambda?: array{lambdaArn?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result resetConnectorMetadataCache(array $args = [])
 * @phpstan-method \Aws\Result resetConnectorMetadataCache(array{
 *     connectorProfileName?: string,
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     connectorEntityName?: string,
 *     entitiesPath?: string,
 *     apiVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise resetConnectorMetadataCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetConnectorMetadataCacheAsync(array{
 *     connectorProfileName?: string,
 *     connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *     connectorEntityName?: string,
 *     entitiesPath?: string,
 *     apiVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startFlow(array $args = [])
 * @phpstan-method \Aws\Result startFlow(array{flowName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFlowAsync(array{flowName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result stopFlow(array $args = [])
 * @phpstan-method \Aws\Result stopFlow(array{flowName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopFlowAsync(array{flowName?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result unregisterConnector(array $args = [])
 * @phpstan-method \Aws\Result unregisterConnector(array{connectorLabel?: string, forceDelete?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unregisterConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unregisterConnectorAsync(array{connectorLabel?: string, forceDelete?: bool, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateConnectorProfile(array $args = [])
 * @phpstan-method \Aws\Result updateConnectorProfile(array{
 *     connectorProfileName?: string,
 *     connectionMode?: 'Private'|'Public',
 *     connectorProfileConfig?: array{
 *         connectorProfileProperties?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             Honeycode?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             Redshift?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Snowflake?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         connectorProfileCredentials?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             Honeycode?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             Redshift?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Snowflake?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectorProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectorProfileAsync(array{
 *     connectorProfileName?: string,
 *     connectionMode?: 'Private'|'Public',
 *     connectorProfileConfig?: array{
 *         connectorProfileProperties?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             Honeycode?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             Redshift?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Snowflake?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         connectorProfileCredentials?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             Honeycode?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             Redshift?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Snowflake?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnectorRegistration(array $args = [])
 * @phpstan-method \Aws\Result updateConnectorRegistration(array{
 *     connectorLabel?: string,
 *     description?: string,
 *     connectorProvisioningConfig?: array{lambda?: array{lambdaArn?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectorRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectorRegistrationAsync(array{
 *     connectorLabel?: string,
 *     description?: string,
 *     connectorProvisioningConfig?: array{lambda?: array{lambdaArn?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFlow(array $args = [])
 * @phpstan-method \Aws\Result updateFlow(array{
 *     flowName?: string,
 *     description?: string,
 *     triggerConfig?: array{triggerType?: 'Event'|'OnDemand'|'Scheduled', triggerProperties?: array{Scheduled?: array, ...}, ...},
 *     sourceFlowConfig?: array{
 *         connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *         apiVersion?: string,
 *         connectorProfileName?: string,
 *         sourceConnectorProperties?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             S3?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         incrementalPullConfig?: array{datetimeTypeFieldName?: string, ...},
 *         ...,
 *     },
 *     destinationFlowConfigList?: list<array{
 *         connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *         apiVersion?: string,
 *         connectorProfileName?: string,
 *         destinationConnectorProperties?: array,
 *         ...,
 *     }>,
 *     tasks?: list<array{
 *         sourceFields?: list<string>,
 *         connectorOperator?: array,
 *         destinationField?: string,
 *         taskType?: 'Arithmetic'|'Filter'|'Map'|'Map_all'|'Mask'|'Merge'|'Partition'|'Passthrough'|'Truncate'|'Validate',
 *         taskProperties?: array<string, string>,
 *         ...,
 *     }>,
 *     metadataCatalogConfig?: array{glueDataCatalog?: array{roleArn?: string, databaseName?: string, tablePrefix?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlowAsync(array{
 *     flowName?: string,
 *     description?: string,
 *     triggerConfig?: array{triggerType?: 'Event'|'OnDemand'|'Scheduled', triggerProperties?: array{Scheduled?: array, ...}, ...},
 *     sourceFlowConfig?: array{
 *         connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *         apiVersion?: string,
 *         connectorProfileName?: string,
 *         sourceConnectorProperties?: array{
 *             Amplitude?: array,
 *             Datadog?: array,
 *             Dynatrace?: array,
 *             GoogleAnalytics?: array,
 *             InforNexus?: array,
 *             Marketo?: array,
 *             S3?: array,
 *             Salesforce?: array,
 *             ServiceNow?: array,
 *             Singular?: array,
 *             Slack?: array,
 *             Trendmicro?: array,
 *             Veeva?: array,
 *             Zendesk?: array,
 *             SAPOData?: array,
 *             CustomConnector?: array,
 *             Pardot?: array,
 *             ...,
 *         },
 *         incrementalPullConfig?: array{datetimeTypeFieldName?: string, ...},
 *         ...,
 *     },
 *     destinationFlowConfigList?: list<array{
 *         connectorType?: 'Amplitude'|'CustomConnector'|'CustomerProfiles'|'Datadog'|'Dynatrace'|'EventBridge'|'Googleanalytics'|'Honeycode'|'Infornexus'|'LookoutMetrics'|'Marketo'|'Pardot'|'Redshift'|'S3'|'SAPOData'|'Salesforce'|'Servicenow'|'Singular'|'Slack'|'Snowflake'|'Trendmicro'|'Upsolver'|'Veeva'|'Zendesk',
 *         apiVersion?: string,
 *         connectorProfileName?: string,
 *         destinationConnectorProperties?: array,
 *         ...,
 *     }>,
 *     tasks?: list<array{
 *         sourceFields?: list<string>,
 *         connectorOperator?: array,
 *         destinationField?: string,
 *         taskType?: 'Arithmetic'|'Filter'|'Map'|'Map_all'|'Mask'|'Merge'|'Partition'|'Passthrough'|'Truncate'|'Validate',
 *         taskProperties?: array<string, string>,
 *         ...,
 *     }>,
 *     metadataCatalogConfig?: array{glueDataCatalog?: array{roleArn?: string, databaseName?: string, tablePrefix?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 */
class AppflowClient extends AwsClient {}
