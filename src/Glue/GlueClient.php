<?php
namespace Aws\Glue;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Glue** service.
 * @method \Aws\Result associateGlossaryTerms(array $args = [])
 * @phpstan-method \Aws\Result associateGlossaryTerms(array{AssetIdentifier?: string, GlossaryTermIdentifiers?: list<string>, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateGlossaryTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateGlossaryTermsAsync(array{AssetIdentifier?: string, GlossaryTermIdentifiers?: list<string>, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result batchCreatePartition(array $args = [])
 * @phpstan-method \Aws\Result batchCreatePartition(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionInputList?: list<array{
 *         Values?: list<string>,
 *         LastAccessTime?: int|string|\DateTimeInterface,
 *         StorageDescriptor?: array,
 *         Parameters?: array<string, string>,
 *         LastAnalyzedTime?: int|string|\DateTimeInterface,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreatePartitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreatePartitionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionInputList?: list<array{
 *         Values?: list<string>,
 *         LastAccessTime?: int|string|\DateTimeInterface,
 *         StorageDescriptor?: array,
 *         Parameters?: array<string, string>,
 *         LastAnalyzedTime?: int|string|\DateTimeInterface,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteConnection(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteConnection(array{CatalogId?: string, ConnectionNameList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteConnectionAsync(array{CatalogId?: string, ConnectionNameList?: list<string>, ...} $args = [])
 * @method \Aws\Result batchDeletePartition(array $args = [])
 * @phpstan-method \Aws\Result batchDeletePartition(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionsToDelete?: list<array{Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeletePartitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeletePartitionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionsToDelete?: list<array{Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteTable(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteTable(array{CatalogId?: string, DatabaseName?: string, TablesToDelete?: list<string>, TransactionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteTableAsync(array{CatalogId?: string, DatabaseName?: string, TablesToDelete?: list<string>, TransactionId?: string, ...} $args = [])
 * @method \Aws\Result batchDeleteTableVersion(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteTableVersion(array{CatalogId?: string, DatabaseName?: string, TableName?: string, VersionIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteTableVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteTableVersionAsync(array{CatalogId?: string, DatabaseName?: string, TableName?: string, VersionIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetBlueprints(array $args = [])
 * @phpstan-method \Aws\Result batchGetBlueprints(array{Names?: list<string>, IncludeBlueprint?: bool, IncludeParameterSpec?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetBlueprintsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetBlueprintsAsync(array{Names?: list<string>, IncludeBlueprint?: bool, IncludeParameterSpec?: bool, ...} $args = [])
 * @method \Aws\Result batchGetCrawlers(array $args = [])
 * @phpstan-method \Aws\Result batchGetCrawlers(array{CrawlerNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCrawlersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCrawlersAsync(array{CrawlerNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetCustomEntityTypes(array $args = [])
 * @phpstan-method \Aws\Result batchGetCustomEntityTypes(array{Names?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCustomEntityTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCustomEntityTypesAsync(array{Names?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetDataQualityResult(array $args = [])
 * @phpstan-method \Aws\Result batchGetDataQualityResult(array{ResultIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetDataQualityResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetDataQualityResultAsync(array{ResultIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetDevEndpoints(array $args = [])
 * @phpstan-method \Aws\Result batchGetDevEndpoints(array{DevEndpointNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetDevEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetDevEndpointsAsync(array{DevEndpointNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetIterableForms(array $args = [])
 * @phpstan-method \Aws\Result batchGetIterableForms(array{AssetIdentifier?: string, IterableFormName?: string, ItemIdentifiers?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetIterableFormsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetIterableFormsAsync(array{AssetIdentifier?: string, IterableFormName?: string, ItemIdentifiers?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetJobs(array $args = [])
 * @phpstan-method \Aws\Result batchGetJobs(array{JobNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetJobsAsync(array{JobNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetPartition(array $args = [])
 * @phpstan-method \Aws\Result batchGetPartition(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionsToGet?: list<array{Values?: list<string>, ...}>,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     QuerySessionContext?: array{
 *         QueryId?: string,
 *         QueryStartTime?: int|string|\DateTimeInterface,
 *         ClusterId?: string,
 *         QueryAuthorizationId?: string,
 *         AdditionalContext?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetPartitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetPartitionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionsToGet?: list<array{Values?: list<string>, ...}>,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     QuerySessionContext?: array{
 *         QueryId?: string,
 *         QueryStartTime?: int|string|\DateTimeInterface,
 *         ClusterId?: string,
 *         QueryAuthorizationId?: string,
 *         AdditionalContext?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetTableOptimizer(array $args = [])
 * @phpstan-method \Aws\Result batchGetTableOptimizer(array{
 *     Entries?: list<array{
 *         catalogId?: string,
 *         databaseName?: string,
 *         tableName?: string,
 *         type?: 'compaction'|'orphan_file_deletion'|'retention',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetTableOptimizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetTableOptimizerAsync(array{
 *     Entries?: list<array{
 *         catalogId?: string,
 *         databaseName?: string,
 *         tableName?: string,
 *         type?: 'compaction'|'orphan_file_deletion'|'retention',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetTriggers(array $args = [])
 * @phpstan-method \Aws\Result batchGetTriggers(array{TriggerNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetTriggersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetTriggersAsync(array{TriggerNames?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetWorkflows(array $args = [])
 * @phpstan-method \Aws\Result batchGetWorkflows(array{Names?: list<string>, IncludeGraph?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetWorkflowsAsync(array{Names?: list<string>, IncludeGraph?: bool, ...} $args = [])
 * @method \Aws\Result batchPutDataQualityStatisticAnnotation(array $args = [])
 * @phpstan-method \Aws\Result batchPutDataQualityStatisticAnnotation(array{
 *     InclusionAnnotations?: list<array{ProfileId?: string, StatisticId?: string, InclusionAnnotation?: 'EXCLUDE'|'INCLUDE', ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutDataQualityStatisticAnnotationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutDataQualityStatisticAnnotationAsync(array{
 *     InclusionAnnotations?: list<array{ProfileId?: string, StatisticId?: string, InclusionAnnotation?: 'EXCLUDE'|'INCLUDE', ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchStopJobRun(array $args = [])
 * @phpstan-method \Aws\Result batchStopJobRun(array{JobName?: string, JobRunIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchStopJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchStopJobRunAsync(array{JobName?: string, JobRunIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchUpdatePartition(array $args = [])
 * @phpstan-method \Aws\Result batchUpdatePartition(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Entries?: list<array{PartitionValueList?: list<string>, PartitionInput?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdatePartitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdatePartitionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Entries?: list<array{PartitionValueList?: list<string>, PartitionInput?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelDataQualityRuleRecommendationRun(array $args = [])
 * @phpstan-method \Aws\Result cancelDataQualityRuleRecommendationRun(array{RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelDataQualityRuleRecommendationRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelDataQualityRuleRecommendationRunAsync(array{RunId?: string, ...} $args = [])
 * @method \Aws\Result cancelDataQualityRulesetEvaluationRun(array $args = [])
 * @phpstan-method \Aws\Result cancelDataQualityRulesetEvaluationRun(array{RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelDataQualityRulesetEvaluationRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelDataQualityRulesetEvaluationRunAsync(array{RunId?: string, ...} $args = [])
 * @method \Aws\Result cancelMLTaskRun(array $args = [])
 * @phpstan-method \Aws\Result cancelMLTaskRun(array{TransformId?: string, TaskRunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMLTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMLTaskRunAsync(array{TransformId?: string, TaskRunId?: string, ...} $args = [])
 * @method \Aws\Result cancelStatement(array $args = [])
 * @phpstan-method \Aws\Result cancelStatement(array{SessionId?: string, Id?: int, RequestOrigin?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelStatementAsync(array{SessionId?: string, Id?: int, RequestOrigin?: string, ...} $args = [])
 * @method \Aws\Result checkSchemaVersionValidity(array $args = [])
 * @phpstan-method \Aws\Result checkSchemaVersionValidity(array{DataFormat?: 'AVRO'|'JSON'|'PROTOBUF', SchemaDefinition?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise checkSchemaVersionValidityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise checkSchemaVersionValidityAsync(array{DataFormat?: 'AVRO'|'JSON'|'PROTOBUF', SchemaDefinition?: string, ...} $args = [])
 * @method \Aws\Result createBlueprint(array $args = [])
 * @phpstan-method \Aws\Result createBlueprint(array{Name?: string, Description?: string, BlueprintLocation?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBlueprintAsync(array{Name?: string, Description?: string, BlueprintLocation?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createCatalog(array $args = [])
 * @phpstan-method \Aws\Result createCatalog(array{
 *     Name?: string,
 *     CatalogInput?: array{
 *         Description?: string,
 *         FederatedCatalog?: array{Identifier?: string, ConnectionName?: string, ConnectionType?: string, ...},
 *         Parameters?: array<string, string>,
 *         TargetRedshiftCatalog?: array{CatalogArn?: string, ...},
 *         CatalogProperties?: array{
 *             DataLakeAccessProperties?: array,
 *             IcebergOptimizationProperties?: array,
 *             CustomProperties?: array<string, string>,
 *             ...,
 *         },
 *         CreateTableDefaultPermissions?: list<array>,
 *         CreateDatabaseDefaultPermissions?: list<array>,
 *         AllowFullTableExternalDataAccess?: 'False'|'True',
 *         OverwriteChildResourcePermissionsWithDefault?: 'Accept'|'Deny',
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCatalogAsync(array{
 *     Name?: string,
 *     CatalogInput?: array{
 *         Description?: string,
 *         FederatedCatalog?: array{Identifier?: string, ConnectionName?: string, ConnectionType?: string, ...},
 *         Parameters?: array<string, string>,
 *         TargetRedshiftCatalog?: array{CatalogArn?: string, ...},
 *         CatalogProperties?: array{
 *             DataLakeAccessProperties?: array,
 *             IcebergOptimizationProperties?: array,
 *             CustomProperties?: array<string, string>,
 *             ...,
 *         },
 *         CreateTableDefaultPermissions?: list<array>,
 *         CreateDatabaseDefaultPermissions?: list<array>,
 *         AllowFullTableExternalDataAccess?: 'False'|'True',
 *         OverwriteChildResourcePermissionsWithDefault?: 'Accept'|'Deny',
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createClassifier(array $args = [])
 * @phpstan-method \Aws\Result createClassifier(array{
 *     GrokClassifier?: array{Classification?: string, Name?: string, GrokPattern?: string, CustomPatterns?: string, ...},
 *     XMLClassifier?: array{Classification?: string, Name?: string, RowTag?: string, ...},
 *     JsonClassifier?: array{Name?: string, JsonPath?: string, ...},
 *     CsvClassifier?: array{
 *         Name?: string,
 *         Delimiter?: string,
 *         QuoteSymbol?: string,
 *         ContainsHeader?: 'ABSENT'|'PRESENT'|'UNKNOWN',
 *         Header?: list<string>,
 *         DisableValueTrimming?: bool,
 *         AllowSingleColumn?: bool,
 *         CustomDatatypeConfigured?: bool,
 *         CustomDatatypes?: list<string>,
 *         Serde?: 'LazySimpleSerDe'|'None'|'OpenCSVSerDe',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClassifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClassifierAsync(array{
 *     GrokClassifier?: array{Classification?: string, Name?: string, GrokPattern?: string, CustomPatterns?: string, ...},
 *     XMLClassifier?: array{Classification?: string, Name?: string, RowTag?: string, ...},
 *     JsonClassifier?: array{Name?: string, JsonPath?: string, ...},
 *     CsvClassifier?: array{
 *         Name?: string,
 *         Delimiter?: string,
 *         QuoteSymbol?: string,
 *         ContainsHeader?: 'ABSENT'|'PRESENT'|'UNKNOWN',
 *         Header?: list<string>,
 *         DisableValueTrimming?: bool,
 *         AllowSingleColumn?: bool,
 *         CustomDatatypeConfigured?: bool,
 *         CustomDatatypes?: list<string>,
 *         Serde?: 'LazySimpleSerDe'|'None'|'OpenCSVSerDe',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createColumnStatisticsTaskSettings(array $args = [])
 * @phpstan-method \Aws\Result createColumnStatisticsTaskSettings(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Role?: string,
 *     Schedule?: string,
 *     ColumnNameList?: list<string>,
 *     SampleSize?: float,
 *     CatalogID?: string,
 *     SecurityConfiguration?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createColumnStatisticsTaskSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createColumnStatisticsTaskSettingsAsync(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Role?: string,
 *     Schedule?: string,
 *     ColumnNameList?: list<string>,
 *     SampleSize?: float,
 *     CatalogID?: string,
 *     SecurityConfiguration?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @phpstan-method \Aws\Result createConnection(array{
 *     CatalogId?: string,
 *     ConnectionInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         ConnectionType?: 'ADOBEANALYTICS'|'ASANA'|'AZURECOSMOS'|'AZURESQL'|'BIGQUERY'|'BLACKBAUD'|'BLACKBAUDRAISEREDGENXT'|'CIRCLECI'|'CLOUDERAHIVE'|'CLOUDERAIMPALA'|'CLOUDWATCH'|'CLOUDWATCHMETRICS'|'CMDB'|'CUSTOM'|'DATADOG'|'DATALAKEGEN2'|'DB2'|'DB2AS400'|'DOCUMENTDB'|'DOCUSIGNMONITOR'|'DOMO'|'DYNAMODB'|'DYNATRACE'|'FACEBOOKADS'|'FACEBOOKPAGEINSIGHTS'|'FRESHDESK'|'FRESHSALES'|'GITLAB'|'GOOGLEADS'|'GOOGLEANALYTICS4'|'GOOGLECLOUDSTORAGE'|'GOOGLESEARCHCONSOLE'|'GOOGLESHEETS'|'HBASE'|'HUBSPOT'|'INSTAGRAMADS'|'INTERCOM'|'JDBC'|'JIRACLOUD'|'KAFKA'|'KUSTOMER'|'LINKEDIN'|'MAILCHIMP'|'MARKETO'|'MARKETPLACE'|'MICROSOFTDYNAMIC365FINANCEANDOPS'|'MICROSOFTDYNAMICS365CRM'|'MICROSOFTTEAMS'|'MIXPANEL'|'MONDAY'|'MONGODB'|'MYSQL'|'NETSUITEERP'|'NETWORK'|'OKTA'|'OPENSEARCH'|'ORACLE'|'PAYPAL'|'PENDO'|'PIPEDIVE'|'PIPEDRIVE'|'POSTGRESQL'|'PRODUCTBOARD'|'QUICKBOOKS'|'SALESFORCE'|'SALESFORCECOMMERCECLOUD'|'SALESFORCEMARKETINGCLOUD'|'SALESFORCEPARDOT'|'SAPCONCUR'|'SAPHANA'|'SAPODATA'|'SENDGRID'|'SERVICENOW'|'SFTP'|'SLACK'|'SMARTSHEET'|'SNAPCHATADS'|'SQLSERVER'|'STRIPE'|'SYNAPSE'|'TERADATA'|'TERADATANOS'|'TIMESTREAM'|'TPCDS'|'TWILIO'|'VERTICA'|'VIEW_VALIDATION_ATHENA'|'VIEW_VALIDATION_REDSHIFT'|'WOOCOMMERCE'|'ZENDESK'|'ZOHOCRM'|'ZOOM',
 *         MatchCriteria?: list<string>,
 *         ConnectionProperties?: array<string, string>,
 *         SparkProperties?: array<string, string>,
 *         AthenaProperties?: array<string, string>,
 *         PythonProperties?: array<string, string>,
 *         PhysicalConnectionRequirements?: array{SubnetId?: string, SecurityGroupIdList?: list<string>, AvailabilityZone?: string, ...},
 *         AuthenticationConfiguration?: array{
 *             AuthenticationType?: 'BASIC'|'CUSTOM'|'IAM'|'OAUTH2',
 *             OAuth2Properties?: array,
 *             SecretArn?: string,
 *             KmsKeyArn?: string,
 *             BasicAuthenticationCredentials?: array,
 *             CustomAuthenticationCredentials?: array<string, string>,
 *             ...,
 *         },
 *         ValidateCredentials?: bool,
 *         ValidateForComputeEnvironments?: list<'ATHENA'|'PYTHON'|'SPARK'>,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionAsync(array{
 *     CatalogId?: string,
 *     ConnectionInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         ConnectionType?: 'ADOBEANALYTICS'|'ASANA'|'AZURECOSMOS'|'AZURESQL'|'BIGQUERY'|'BLACKBAUD'|'BLACKBAUDRAISEREDGENXT'|'CIRCLECI'|'CLOUDERAHIVE'|'CLOUDERAIMPALA'|'CLOUDWATCH'|'CLOUDWATCHMETRICS'|'CMDB'|'CUSTOM'|'DATADOG'|'DATALAKEGEN2'|'DB2'|'DB2AS400'|'DOCUMENTDB'|'DOCUSIGNMONITOR'|'DOMO'|'DYNAMODB'|'DYNATRACE'|'FACEBOOKADS'|'FACEBOOKPAGEINSIGHTS'|'FRESHDESK'|'FRESHSALES'|'GITLAB'|'GOOGLEADS'|'GOOGLEANALYTICS4'|'GOOGLECLOUDSTORAGE'|'GOOGLESEARCHCONSOLE'|'GOOGLESHEETS'|'HBASE'|'HUBSPOT'|'INSTAGRAMADS'|'INTERCOM'|'JDBC'|'JIRACLOUD'|'KAFKA'|'KUSTOMER'|'LINKEDIN'|'MAILCHIMP'|'MARKETO'|'MARKETPLACE'|'MICROSOFTDYNAMIC365FINANCEANDOPS'|'MICROSOFTDYNAMICS365CRM'|'MICROSOFTTEAMS'|'MIXPANEL'|'MONDAY'|'MONGODB'|'MYSQL'|'NETSUITEERP'|'NETWORK'|'OKTA'|'OPENSEARCH'|'ORACLE'|'PAYPAL'|'PENDO'|'PIPEDIVE'|'PIPEDRIVE'|'POSTGRESQL'|'PRODUCTBOARD'|'QUICKBOOKS'|'SALESFORCE'|'SALESFORCECOMMERCECLOUD'|'SALESFORCEMARKETINGCLOUD'|'SALESFORCEPARDOT'|'SAPCONCUR'|'SAPHANA'|'SAPODATA'|'SENDGRID'|'SERVICENOW'|'SFTP'|'SLACK'|'SMARTSHEET'|'SNAPCHATADS'|'SQLSERVER'|'STRIPE'|'SYNAPSE'|'TERADATA'|'TERADATANOS'|'TIMESTREAM'|'TPCDS'|'TWILIO'|'VERTICA'|'VIEW_VALIDATION_ATHENA'|'VIEW_VALIDATION_REDSHIFT'|'WOOCOMMERCE'|'ZENDESK'|'ZOHOCRM'|'ZOOM',
 *         MatchCriteria?: list<string>,
 *         ConnectionProperties?: array<string, string>,
 *         SparkProperties?: array<string, string>,
 *         AthenaProperties?: array<string, string>,
 *         PythonProperties?: array<string, string>,
 *         PhysicalConnectionRequirements?: array{SubnetId?: string, SecurityGroupIdList?: list<string>, AvailabilityZone?: string, ...},
 *         AuthenticationConfiguration?: array{
 *             AuthenticationType?: 'BASIC'|'CUSTOM'|'IAM'|'OAUTH2',
 *             OAuth2Properties?: array,
 *             SecretArn?: string,
 *             KmsKeyArn?: string,
 *             BasicAuthenticationCredentials?: array,
 *             CustomAuthenticationCredentials?: array<string, string>,
 *             ...,
 *         },
 *         ValidateCredentials?: bool,
 *         ValidateForComputeEnvironments?: list<'ATHENA'|'PYTHON'|'SPARK'>,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCrawler(array $args = [])
 * @phpstan-method \Aws\Result createCrawler(array{
 *     Name?: string,
 *     Role?: string,
 *     DatabaseName?: string,
 *     Description?: string,
 *     Targets?: array{
 *         S3Targets?: list<array>,
 *         JdbcTargets?: list<array>,
 *         MongoDBTargets?: list<array>,
 *         DynamoDBTargets?: list<array>,
 *         CatalogTargets?: list<array>,
 *         DeltaTargets?: list<array>,
 *         IcebergTargets?: list<array>,
 *         HudiTargets?: list<array>,
 *         ...,
 *     },
 *     Schedule?: string,
 *     Classifiers?: list<string>,
 *     TablePrefix?: string,
 *     SchemaChangePolicy?: array{
 *         UpdateBehavior?: 'LOG'|'UPDATE_IN_DATABASE',
 *         DeleteBehavior?: 'DELETE_FROM_DATABASE'|'DEPRECATE_IN_DATABASE'|'LOG',
 *         ...,
 *     },
 *     RecrawlPolicy?: array{RecrawlBehavior?: 'CRAWL_EVENT_MODE'|'CRAWL_EVERYTHING'|'CRAWL_NEW_FOLDERS_ONLY', ...},
 *     LineageConfiguration?: array{CrawlerLineageSettings?: 'DISABLE'|'ENABLE', ...},
 *     LakeFormationConfiguration?: array{UseLakeFormationCredentials?: bool, AccountId?: string, ...},
 *     Configuration?: string,
 *     CrawlerSecurityConfiguration?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCrawlerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCrawlerAsync(array{
 *     Name?: string,
 *     Role?: string,
 *     DatabaseName?: string,
 *     Description?: string,
 *     Targets?: array{
 *         S3Targets?: list<array>,
 *         JdbcTargets?: list<array>,
 *         MongoDBTargets?: list<array>,
 *         DynamoDBTargets?: list<array>,
 *         CatalogTargets?: list<array>,
 *         DeltaTargets?: list<array>,
 *         IcebergTargets?: list<array>,
 *         HudiTargets?: list<array>,
 *         ...,
 *     },
 *     Schedule?: string,
 *     Classifiers?: list<string>,
 *     TablePrefix?: string,
 *     SchemaChangePolicy?: array{
 *         UpdateBehavior?: 'LOG'|'UPDATE_IN_DATABASE',
 *         DeleteBehavior?: 'DELETE_FROM_DATABASE'|'DEPRECATE_IN_DATABASE'|'LOG',
 *         ...,
 *     },
 *     RecrawlPolicy?: array{RecrawlBehavior?: 'CRAWL_EVENT_MODE'|'CRAWL_EVERYTHING'|'CRAWL_NEW_FOLDERS_ONLY', ...},
 *     LineageConfiguration?: array{CrawlerLineageSettings?: 'DISABLE'|'ENABLE', ...},
 *     LakeFormationConfiguration?: array{UseLakeFormationCredentials?: bool, AccountId?: string, ...},
 *     Configuration?: string,
 *     CrawlerSecurityConfiguration?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomEntityType(array $args = [])
 * @phpstan-method \Aws\Result createCustomEntityType(array{Name?: string, RegexString?: string, ContextWords?: list<string>, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomEntityTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomEntityTypeAsync(array{Name?: string, RegexString?: string, ContextWords?: list<string>, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createDataQualityRuleset(array $args = [])
 * @phpstan-method \Aws\Result createDataQualityRuleset(array{
 *     Name?: string,
 *     Description?: string,
 *     Ruleset?: string,
 *     Tags?: array<string, string>,
 *     TargetTable?: array{TableName?: string, DatabaseName?: string, CatalogId?: string, ...},
 *     DataQualitySecurityConfiguration?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataQualityRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataQualityRulesetAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Ruleset?: string,
 *     Tags?: array<string, string>,
 *     TargetTable?: array{TableName?: string, DatabaseName?: string, CatalogId?: string, ...},
 *     DataQualitySecurityConfiguration?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDatabase(array $args = [])
 * @phpstan-method \Aws\Result createDatabase(array{
 *     CatalogId?: string,
 *     DatabaseInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         LocationUri?: string,
 *         Parameters?: array<string, string>,
 *         CreateTableDefaultPermissions?: list<array>,
 *         TargetDatabase?: array{CatalogId?: string, DatabaseName?: string, Region?: string, ...},
 *         FederatedDatabase?: array{Identifier?: string, ConnectionName?: string, ConnectionType?: string, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatabaseAsync(array{
 *     CatalogId?: string,
 *     DatabaseInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         LocationUri?: string,
 *         Parameters?: array<string, string>,
 *         CreateTableDefaultPermissions?: list<array>,
 *         TargetDatabase?: array{CatalogId?: string, DatabaseName?: string, Region?: string, ...},
 *         FederatedDatabase?: array{Identifier?: string, ConnectionName?: string, ConnectionType?: string, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDevEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createDevEndpoint(array{
 *     EndpointName?: string,
 *     RoleArn?: string,
 *     SecurityGroupIds?: list<string>,
 *     SubnetId?: string,
 *     PublicKey?: string,
 *     PublicKeys?: list<string>,
 *     NumberOfNodes?: int,
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     GlueVersion?: string,
 *     NumberOfWorkers?: int,
 *     ExtraPythonLibsS3Path?: string,
 *     ExtraJarsS3Path?: string,
 *     SecurityConfiguration?: string,
 *     Tags?: array<string, string>,
 *     Arguments?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDevEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDevEndpointAsync(array{
 *     EndpointName?: string,
 *     RoleArn?: string,
 *     SecurityGroupIds?: list<string>,
 *     SubnetId?: string,
 *     PublicKey?: string,
 *     PublicKeys?: list<string>,
 *     NumberOfNodes?: int,
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     GlueVersion?: string,
 *     NumberOfWorkers?: int,
 *     ExtraPythonLibsS3Path?: string,
 *     ExtraJarsS3Path?: string,
 *     SecurityConfiguration?: string,
 *     Tags?: array<string, string>,
 *     Arguments?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGlossary(array $args = [])
 * @phpstan-method \Aws\Result createGlossary(array{Name?: string, Description?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlossaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGlossaryAsync(array{Name?: string, Description?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result createGlossaryTerm(array $args = [])
 * @phpstan-method \Aws\Result createGlossaryTerm(array{
 *     GlossaryIdentifier?: string,
 *     Name?: string,
 *     ShortDescription?: string,
 *     LongDescription?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlossaryTermAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGlossaryTermAsync(array{
 *     GlossaryIdentifier?: string,
 *     Name?: string,
 *     ShortDescription?: string,
 *     LongDescription?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGlueIdentityCenterConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createGlueIdentityCenterConfiguration(array{InstanceArn?: string, Scopes?: list<string>, UserBackgroundSessionsEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlueIdentityCenterConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGlueIdentityCenterConfigurationAsync(array{InstanceArn?: string, Scopes?: list<string>, UserBackgroundSessionsEnabled?: bool, ...} $args = [])
 * @method \Aws\Result createIntegration(array $args = [])
 * @phpstan-method \Aws\Result createIntegration(array{
 *     IntegrationName?: string,
 *     SourceArn?: string,
 *     TargetArn?: string,
 *     Description?: string,
 *     DataFilter?: string,
 *     KmsKeyId?: string,
 *     AdditionalEncryptionContext?: array<string, string>,
 *     Tags?: list<array{key?: string, value?: string, ...}>,
 *     IntegrationConfig?: array{RefreshInterval?: string, SourceProperties?: array<string, string>, ContinuousSync?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationAsync(array{
 *     IntegrationName?: string,
 *     SourceArn?: string,
 *     TargetArn?: string,
 *     Description?: string,
 *     DataFilter?: string,
 *     KmsKeyId?: string,
 *     AdditionalEncryptionContext?: array<string, string>,
 *     Tags?: list<array{key?: string, value?: string, ...}>,
 *     IntegrationConfig?: array{RefreshInterval?: string, SourceProperties?: array<string, string>, ContinuousSync?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntegrationResourceProperty(array $args = [])
 * @phpstan-method \Aws\Result createIntegrationResourceProperty(array{
 *     ResourceArn?: string,
 *     SourceProcessingProperties?: array{RoleArn?: string, ...},
 *     TargetProcessingProperties?: array{RoleArn?: string, KmsArn?: string, ConnectionName?: string, EventBusArn?: string, ...},
 *     Tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationResourcePropertyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationResourcePropertyAsync(array{
 *     ResourceArn?: string,
 *     SourceProcessingProperties?: array{RoleArn?: string, ...},
 *     TargetProcessingProperties?: array{RoleArn?: string, KmsArn?: string, ConnectionName?: string, EventBusArn?: string, ...},
 *     Tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntegrationTableProperties(array $args = [])
 * @phpstan-method \Aws\Result createIntegrationTableProperties(array{
 *     ResourceArn?: string,
 *     TableName?: string,
 *     SourceTableConfig?: array{
 *         Fields?: list<string>,
 *         FilterPredicate?: string,
 *         PrimaryKey?: list<string>,
 *         RecordUpdateField?: string,
 *         ...,
 *     },
 *     TargetTableConfig?: array{UnnestSpec?: 'FULL'|'NOUNNEST'|'TOPLEVEL', PartitionSpec?: list<array>, TargetTableName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntegrationTablePropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntegrationTablePropertiesAsync(array{
 *     ResourceArn?: string,
 *     TableName?: string,
 *     SourceTableConfig?: array{
 *         Fields?: list<string>,
 *         FilterPredicate?: string,
 *         PrimaryKey?: list<string>,
 *         RecordUpdateField?: string,
 *         ...,
 *     },
 *     TargetTableConfig?: array{UnnestSpec?: 'FULL'|'NOUNNEST'|'TOPLEVEL', PartitionSpec?: list<array>, TargetTableName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createJob(array $args = [])
 * @phpstan-method \Aws\Result createJob(array{
 *     Name?: string,
 *     JobMode?: 'NOTEBOOK'|'SCRIPT'|'VISUAL',
 *     JobRunQueuingEnabled?: bool,
 *     Description?: string,
 *     LogUri?: string,
 *     Role?: string,
 *     ExecutionProperty?: array{MaxConcurrentRuns?: int, ...},
 *     Command?: array{Name?: string, ScriptLocation?: string, PythonVersion?: string, Runtime?: string, ...},
 *     DefaultArguments?: array<string, string>,
 *     NonOverridableArguments?: array<string, string>,
 *     Connections?: array{Connections?: list<string>, ...},
 *     MaxRetries?: int,
 *     AllocatedCapacity?: int,
 *     Timeout?: int,
 *     MaxCapacity?: float,
 *     SecurityConfiguration?: string,
 *     Tags?: array<string, string>,
 *     NotificationProperty?: array{NotifyDelayAfter?: int, ...},
 *     GlueVersion?: string,
 *     NumberOfWorkers?: int,
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     CodeGenConfigurationNodes?: array<string, array{
 *         AthenaConnectorSource?: array,
 *         JDBCConnectorSource?: array,
 *         SparkConnectorSource?: array,
 *         CatalogSource?: array,
 *         RedshiftSource?: array,
 *         S3CatalogSource?: array,
 *         S3CsvSource?: array,
 *         S3JsonSource?: array,
 *         S3ParquetSource?: array,
 *         RelationalCatalogSource?: array,
 *         DynamoDBCatalogSource?: array,
 *         JDBCConnectorTarget?: array,
 *         SparkConnectorTarget?: array,
 *         CatalogTarget?: array,
 *         RedshiftTarget?: array,
 *         S3CatalogTarget?: array,
 *         S3GlueParquetTarget?: array,
 *         S3DirectTarget?: array,
 *         ApplyMapping?: array,
 *         SelectFields?: array,
 *         DropFields?: array,
 *         RenameField?: array,
 *         Spigot?: array,
 *         Join?: array,
 *         SplitFields?: array,
 *         SelectFromCollection?: array,
 *         FillMissingValues?: array,
 *         Filter?: array,
 *         CustomCode?: array,
 *         SparkSQL?: array,
 *         DirectKinesisSource?: array,
 *         DirectKafkaSource?: array,
 *         CatalogKinesisSource?: array,
 *         CatalogKafkaSource?: array,
 *         DropNullFields?: array,
 *         Merge?: array,
 *         Union?: array,
 *         PIIDetection?: array,
 *         Aggregate?: array,
 *         DropDuplicates?: array,
 *         GovernedCatalogTarget?: array,
 *         GovernedCatalogSource?: array,
 *         MicrosoftSQLServerCatalogSource?: array,
 *         MySQLCatalogSource?: array,
 *         OracleSQLCatalogSource?: array,
 *         PostgreSQLCatalogSource?: array,
 *         MicrosoftSQLServerCatalogTarget?: array,
 *         MySQLCatalogTarget?: array,
 *         OracleSQLCatalogTarget?: array,
 *         PostgreSQLCatalogTarget?: array,
 *         Route?: array,
 *         DynamicTransform?: array,
 *         EvaluateDataQuality?: array,
 *         S3CatalogHudiSource?: array,
 *         CatalogHudiSource?: array,
 *         S3HudiSource?: array,
 *         S3HudiCatalogTarget?: array,
 *         S3HudiDirectTarget?: array,
 *         DirectJDBCSource?: array,
 *         S3CatalogDeltaSource?: array,
 *         CatalogDeltaSource?: array,
 *         S3DeltaSource?: array,
 *         S3DeltaCatalogTarget?: array,
 *         S3DeltaDirectTarget?: array,
 *         AmazonRedshiftSource?: array,
 *         AmazonRedshiftTarget?: array,
 *         EvaluateDataQualityMultiFrame?: array,
 *         Recipe?: array,
 *         SnowflakeSource?: array,
 *         SnowflakeTarget?: array,
 *         ConnectorDataSource?: array,
 *         ConnectorDataTarget?: array,
 *         S3CatalogIcebergSource?: array,
 *         CatalogIcebergSource?: array,
 *         S3IcebergCatalogTarget?: array,
 *         S3IcebergDirectTarget?: array,
 *         S3ExcelSource?: array,
 *         S3HyperDirectTarget?: array,
 *         DynamoDBELTConnectorSource?: array,
 *         ...,
 *     }>,
 *     ExecutionClass?: 'FLEX'|'STANDARD',
 *     SourceControlDetails?: array{
 *         Provider?: 'AWS_CODE_COMMIT'|'BITBUCKET'|'GITHUB'|'GITLAB',
 *         Repository?: string,
 *         Owner?: string,
 *         Branch?: string,
 *         Folder?: string,
 *         LastCommitId?: string,
 *         AuthStrategy?: 'AWS_SECRETS_MANAGER'|'PERSONAL_ACCESS_TOKEN',
 *         AuthToken?: string,
 *         ...,
 *     },
 *     MaintenanceWindow?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobAsync(array{
 *     Name?: string,
 *     JobMode?: 'NOTEBOOK'|'SCRIPT'|'VISUAL',
 *     JobRunQueuingEnabled?: bool,
 *     Description?: string,
 *     LogUri?: string,
 *     Role?: string,
 *     ExecutionProperty?: array{MaxConcurrentRuns?: int, ...},
 *     Command?: array{Name?: string, ScriptLocation?: string, PythonVersion?: string, Runtime?: string, ...},
 *     DefaultArguments?: array<string, string>,
 *     NonOverridableArguments?: array<string, string>,
 *     Connections?: array{Connections?: list<string>, ...},
 *     MaxRetries?: int,
 *     AllocatedCapacity?: int,
 *     Timeout?: int,
 *     MaxCapacity?: float,
 *     SecurityConfiguration?: string,
 *     Tags?: array<string, string>,
 *     NotificationProperty?: array{NotifyDelayAfter?: int, ...},
 *     GlueVersion?: string,
 *     NumberOfWorkers?: int,
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     CodeGenConfigurationNodes?: array<string, array{
 *         AthenaConnectorSource?: array,
 *         JDBCConnectorSource?: array,
 *         SparkConnectorSource?: array,
 *         CatalogSource?: array,
 *         RedshiftSource?: array,
 *         S3CatalogSource?: array,
 *         S3CsvSource?: array,
 *         S3JsonSource?: array,
 *         S3ParquetSource?: array,
 *         RelationalCatalogSource?: array,
 *         DynamoDBCatalogSource?: array,
 *         JDBCConnectorTarget?: array,
 *         SparkConnectorTarget?: array,
 *         CatalogTarget?: array,
 *         RedshiftTarget?: array,
 *         S3CatalogTarget?: array,
 *         S3GlueParquetTarget?: array,
 *         S3DirectTarget?: array,
 *         ApplyMapping?: array,
 *         SelectFields?: array,
 *         DropFields?: array,
 *         RenameField?: array,
 *         Spigot?: array,
 *         Join?: array,
 *         SplitFields?: array,
 *         SelectFromCollection?: array,
 *         FillMissingValues?: array,
 *         Filter?: array,
 *         CustomCode?: array,
 *         SparkSQL?: array,
 *         DirectKinesisSource?: array,
 *         DirectKafkaSource?: array,
 *         CatalogKinesisSource?: array,
 *         CatalogKafkaSource?: array,
 *         DropNullFields?: array,
 *         Merge?: array,
 *         Union?: array,
 *         PIIDetection?: array,
 *         Aggregate?: array,
 *         DropDuplicates?: array,
 *         GovernedCatalogTarget?: array,
 *         GovernedCatalogSource?: array,
 *         MicrosoftSQLServerCatalogSource?: array,
 *         MySQLCatalogSource?: array,
 *         OracleSQLCatalogSource?: array,
 *         PostgreSQLCatalogSource?: array,
 *         MicrosoftSQLServerCatalogTarget?: array,
 *         MySQLCatalogTarget?: array,
 *         OracleSQLCatalogTarget?: array,
 *         PostgreSQLCatalogTarget?: array,
 *         Route?: array,
 *         DynamicTransform?: array,
 *         EvaluateDataQuality?: array,
 *         S3CatalogHudiSource?: array,
 *         CatalogHudiSource?: array,
 *         S3HudiSource?: array,
 *         S3HudiCatalogTarget?: array,
 *         S3HudiDirectTarget?: array,
 *         DirectJDBCSource?: array,
 *         S3CatalogDeltaSource?: array,
 *         CatalogDeltaSource?: array,
 *         S3DeltaSource?: array,
 *         S3DeltaCatalogTarget?: array,
 *         S3DeltaDirectTarget?: array,
 *         AmazonRedshiftSource?: array,
 *         AmazonRedshiftTarget?: array,
 *         EvaluateDataQualityMultiFrame?: array,
 *         Recipe?: array,
 *         SnowflakeSource?: array,
 *         SnowflakeTarget?: array,
 *         ConnectorDataSource?: array,
 *         ConnectorDataTarget?: array,
 *         S3CatalogIcebergSource?: array,
 *         CatalogIcebergSource?: array,
 *         S3IcebergCatalogTarget?: array,
 *         S3IcebergDirectTarget?: array,
 *         S3ExcelSource?: array,
 *         S3HyperDirectTarget?: array,
 *         DynamoDBELTConnectorSource?: array,
 *         ...,
 *     }>,
 *     ExecutionClass?: 'FLEX'|'STANDARD',
 *     SourceControlDetails?: array{
 *         Provider?: 'AWS_CODE_COMMIT'|'BITBUCKET'|'GITHUB'|'GITLAB',
 *         Repository?: string,
 *         Owner?: string,
 *         Branch?: string,
 *         Folder?: string,
 *         LastCommitId?: string,
 *         AuthStrategy?: 'AWS_SECRETS_MANAGER'|'PERSONAL_ACCESS_TOKEN',
 *         AuthToken?: string,
 *         ...,
 *     },
 *     MaintenanceWindow?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMLTransform(array $args = [])
 * @phpstan-method \Aws\Result createMLTransform(array{
 *     Name?: string,
 *     Description?: string,
 *     InputRecordTables?: list<array{
 *         DatabaseName?: string,
 *         TableName?: string,
 *         CatalogId?: string,
 *         ConnectionName?: string,
 *         AdditionalOptions?: array<string, string>,
 *         ...,
 *     }>,
 *     Parameters?: array{
 *         TransformType?: 'FIND_MATCHES',
 *         FindMatchesParameters?: array{
 *             PrimaryKeyColumnName?: string,
 *             PrecisionRecallTradeoff?: float,
 *             AccuracyCostTradeoff?: float,
 *             EnforceProvidedLabels?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Role?: string,
 *     GlueVersion?: string,
 *     MaxCapacity?: float,
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     NumberOfWorkers?: int,
 *     Timeout?: int,
 *     MaxRetries?: int,
 *     Tags?: array<string, string>,
 *     TransformEncryption?: array{
 *         MlUserDataEncryption?: array{MlUserDataEncryptionMode?: 'DISABLED'|'SSE-KMS', KmsKeyId?: string, ...},
 *         TaskRunSecurityConfigurationName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMLTransformAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMLTransformAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     InputRecordTables?: list<array{
 *         DatabaseName?: string,
 *         TableName?: string,
 *         CatalogId?: string,
 *         ConnectionName?: string,
 *         AdditionalOptions?: array<string, string>,
 *         ...,
 *     }>,
 *     Parameters?: array{
 *         TransformType?: 'FIND_MATCHES',
 *         FindMatchesParameters?: array{
 *             PrimaryKeyColumnName?: string,
 *             PrecisionRecallTradeoff?: float,
 *             AccuracyCostTradeoff?: float,
 *             EnforceProvidedLabels?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Role?: string,
 *     GlueVersion?: string,
 *     MaxCapacity?: float,
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     NumberOfWorkers?: int,
 *     Timeout?: int,
 *     MaxRetries?: int,
 *     Tags?: array<string, string>,
 *     TransformEncryption?: array{
 *         MlUserDataEncryption?: array{MlUserDataEncryptionMode?: 'DISABLED'|'SSE-KMS', KmsKeyId?: string, ...},
 *         TaskRunSecurityConfigurationName?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPartition(array $args = [])
 * @phpstan-method \Aws\Result createPartition(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionInput?: array{
 *         Values?: list<string>,
 *         LastAccessTime?: int|string|\DateTimeInterface,
 *         StorageDescriptor?: array{
 *             Columns?: list<array>,
 *             Location?: string,
 *             AdditionalLocations?: list<string>,
 *             InputFormat?: string,
 *             OutputFormat?: string,
 *             Compressed?: bool,
 *             NumberOfBuckets?: int,
 *             SerdeInfo?: array,
 *             BucketColumns?: list<string>,
 *             SortColumns?: list<array>,
 *             Parameters?: array<string, string>,
 *             SkewedInfo?: array,
 *             StoredAsSubDirectories?: bool,
 *             SchemaReference?: array,
 *             ...,
 *         },
 *         Parameters?: array<string, string>,
 *         LastAnalyzedTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPartitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPartitionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionInput?: array{
 *         Values?: list<string>,
 *         LastAccessTime?: int|string|\DateTimeInterface,
 *         StorageDescriptor?: array{
 *             Columns?: list<array>,
 *             Location?: string,
 *             AdditionalLocations?: list<string>,
 *             InputFormat?: string,
 *             OutputFormat?: string,
 *             Compressed?: bool,
 *             NumberOfBuckets?: int,
 *             SerdeInfo?: array,
 *             BucketColumns?: list<string>,
 *             SortColumns?: list<array>,
 *             Parameters?: array<string, string>,
 *             SkewedInfo?: array,
 *             StoredAsSubDirectories?: bool,
 *             SchemaReference?: array,
 *             ...,
 *         },
 *         Parameters?: array<string, string>,
 *         LastAnalyzedTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPartitionIndex(array $args = [])
 * @phpstan-method \Aws\Result createPartitionIndex(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionIndex?: array{Keys?: list<string>, IndexName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPartitionIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPartitionIndexAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionIndex?: array{Keys?: list<string>, IndexName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRegistry(array $args = [])
 * @phpstan-method \Aws\Result createRegistry(array{RegistryName?: string, Description?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegistryAsync(array{RegistryName?: string, Description?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createSchema(array $args = [])
 * @phpstan-method \Aws\Result createSchema(array{
 *     RegistryId?: array{RegistryName?: string, RegistryArn?: string, ...},
 *     SchemaName?: string,
 *     DataFormat?: 'AVRO'|'JSON'|'PROTOBUF',
 *     Compatibility?: 'BACKWARD'|'BACKWARD_ALL'|'DISABLED'|'FORWARD'|'FORWARD_ALL'|'FULL'|'FULL_ALL'|'NONE',
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     SchemaDefinition?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSchemaAsync(array{
 *     RegistryId?: array{RegistryName?: string, RegistryArn?: string, ...},
 *     SchemaName?: string,
 *     DataFormat?: 'AVRO'|'JSON'|'PROTOBUF',
 *     Compatibility?: 'BACKWARD'|'BACKWARD_ALL'|'DISABLED'|'FORWARD'|'FORWARD_ALL'|'FULL'|'FULL_ALL'|'NONE',
 *     Description?: string,
 *     Tags?: array<string, string>,
 *     SchemaDefinition?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createScript(array $args = [])
 * @phpstan-method \Aws\Result createScript(array{
 *     DagNodes?: list<array{Id?: string, NodeType?: string, Args?: list<array>, LineNumber?: int, ...}>,
 *     DagEdges?: list<array{Source?: string, Target?: string, TargetParameter?: string, ...}>,
 *     Language?: 'PYTHON'|'SCALA',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScriptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScriptAsync(array{
 *     DagNodes?: list<array{Id?: string, NodeType?: string, Args?: list<array>, LineNumber?: int, ...}>,
 *     DagEdges?: list<array{Source?: string, Target?: string, TargetParameter?: string, ...}>,
 *     Language?: 'PYTHON'|'SCALA',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSecurityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createSecurityConfiguration(array{
 *     Name?: string,
 *     EncryptionConfiguration?: array{
 *         S3Encryption?: list<array>,
 *         CloudWatchEncryption?: array{CloudWatchEncryptionMode?: 'DISABLED'|'SSE-KMS', KmsKeyArn?: string, ...},
 *         JobBookmarksEncryption?: array{JobBookmarksEncryptionMode?: 'CSE-KMS'|'DISABLED', KmsKeyArn?: string, ...},
 *         DataQualityEncryption?: array{DataQualityEncryptionMode?: 'DISABLED'|'SSE-KMS', KmsKeyArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSecurityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSecurityConfigurationAsync(array{
 *     Name?: string,
 *     EncryptionConfiguration?: array{
 *         S3Encryption?: list<array>,
 *         CloudWatchEncryption?: array{CloudWatchEncryptionMode?: 'DISABLED'|'SSE-KMS', KmsKeyArn?: string, ...},
 *         JobBookmarksEncryption?: array{JobBookmarksEncryptionMode?: 'CSE-KMS'|'DISABLED', KmsKeyArn?: string, ...},
 *         DataQualityEncryption?: array{DataQualityEncryptionMode?: 'DISABLED'|'SSE-KMS', KmsKeyArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSession(array $args = [])
 * @phpstan-method \Aws\Result createSession(array{
 *     Id?: string,
 *     Description?: string,
 *     Role?: string,
 *     Command?: array{Name?: string, PythonVersion?: string, ...},
 *     Timeout?: int,
 *     IdleTimeout?: int,
 *     DefaultArguments?: array<string, string>,
 *     Connections?: array{Connections?: list<string>, ...},
 *     MaxCapacity?: float,
 *     NumberOfWorkers?: int,
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     SecurityConfiguration?: string,
 *     GlueVersion?: string,
 *     Tags?: array<string, string>,
 *     RequestOrigin?: string,
 *     SessionType?: 'LIVY'|'SPARK_CONNECT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSessionAsync(array{
 *     Id?: string,
 *     Description?: string,
 *     Role?: string,
 *     Command?: array{Name?: string, PythonVersion?: string, ...},
 *     Timeout?: int,
 *     IdleTimeout?: int,
 *     DefaultArguments?: array<string, string>,
 *     Connections?: array{Connections?: list<string>, ...},
 *     MaxCapacity?: float,
 *     NumberOfWorkers?: int,
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     SecurityConfiguration?: string,
 *     GlueVersion?: string,
 *     Tags?: array<string, string>,
 *     RequestOrigin?: string,
 *     SessionType?: 'LIVY'|'SPARK_CONNECT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTable(array $args = [])
 * @phpstan-method \Aws\Result createTable(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Name?: string,
 *     TableInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         Owner?: string,
 *         LastAccessTime?: int|string|\DateTimeInterface,
 *         LastAnalyzedTime?: int|string|\DateTimeInterface,
 *         Retention?: int,
 *         StorageDescriptor?: array{
 *             Columns?: list<array>,
 *             Location?: string,
 *             AdditionalLocations?: list<string>,
 *             InputFormat?: string,
 *             OutputFormat?: string,
 *             Compressed?: bool,
 *             NumberOfBuckets?: int,
 *             SerdeInfo?: array,
 *             BucketColumns?: list<string>,
 *             SortColumns?: list<array>,
 *             Parameters?: array<string, string>,
 *             SkewedInfo?: array,
 *             StoredAsSubDirectories?: bool,
 *             SchemaReference?: array,
 *             ...,
 *         },
 *         PartitionKeys?: list<array>,
 *         ViewOriginalText?: string,
 *         ViewExpandedText?: string,
 *         TableType?: string,
 *         Parameters?: array<string, string>,
 *         TargetTable?: array{CatalogId?: string, DatabaseName?: string, Name?: string, Region?: string, ...},
 *         ViewDefinition?: array{
 *             IsProtected?: bool,
 *             Definer?: string,
 *             Representations?: list<array>,
 *             ViewVersionId?: int,
 *             ViewVersionToken?: string,
 *             RefreshSeconds?: int,
 *             LastRefreshType?: 'FULL'|'INCREMENTAL',
 *             SubObjects?: list<string>,
 *             SubObjectVersionIds?: list<int>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     PartitionIndexes?: list<array{Keys?: list<string>, IndexName?: string, ...}>,
 *     TransactionId?: string,
 *     OpenTableFormatInput?: array{
 *         IcebergInput?: array{MetadataOperation?: 'CREATE', Version?: string, CreateIcebergTableInput?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTableAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Name?: string,
 *     TableInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         Owner?: string,
 *         LastAccessTime?: int|string|\DateTimeInterface,
 *         LastAnalyzedTime?: int|string|\DateTimeInterface,
 *         Retention?: int,
 *         StorageDescriptor?: array{
 *             Columns?: list<array>,
 *             Location?: string,
 *             AdditionalLocations?: list<string>,
 *             InputFormat?: string,
 *             OutputFormat?: string,
 *             Compressed?: bool,
 *             NumberOfBuckets?: int,
 *             SerdeInfo?: array,
 *             BucketColumns?: list<string>,
 *             SortColumns?: list<array>,
 *             Parameters?: array<string, string>,
 *             SkewedInfo?: array,
 *             StoredAsSubDirectories?: bool,
 *             SchemaReference?: array,
 *             ...,
 *         },
 *         PartitionKeys?: list<array>,
 *         ViewOriginalText?: string,
 *         ViewExpandedText?: string,
 *         TableType?: string,
 *         Parameters?: array<string, string>,
 *         TargetTable?: array{CatalogId?: string, DatabaseName?: string, Name?: string, Region?: string, ...},
 *         ViewDefinition?: array{
 *             IsProtected?: bool,
 *             Definer?: string,
 *             Representations?: list<array>,
 *             ViewVersionId?: int,
 *             ViewVersionToken?: string,
 *             RefreshSeconds?: int,
 *             LastRefreshType?: 'FULL'|'INCREMENTAL',
 *             SubObjects?: list<string>,
 *             SubObjectVersionIds?: list<int>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     PartitionIndexes?: list<array{Keys?: list<string>, IndexName?: string, ...}>,
 *     TransactionId?: string,
 *     OpenTableFormatInput?: array{
 *         IcebergInput?: array{MetadataOperation?: 'CREATE', Version?: string, CreateIcebergTableInput?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTableOptimizer(array $args = [])
 * @phpstan-method \Aws\Result createTableOptimizer(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Type?: 'compaction'|'orphan_file_deletion'|'retention',
 *     TableOptimizerConfiguration?: array{
 *         roleArn?: string,
 *         enabled?: bool,
 *         vpcConfiguration?: array{glueConnectionName?: string, ...},
 *         compactionConfiguration?: array{icebergConfiguration?: array, ...},
 *         retentionConfiguration?: array{icebergConfiguration?: array, ...},
 *         orphanFileDeletionConfiguration?: array{icebergConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTableOptimizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTableOptimizerAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Type?: 'compaction'|'orphan_file_deletion'|'retention',
 *     TableOptimizerConfiguration?: array{
 *         roleArn?: string,
 *         enabled?: bool,
 *         vpcConfiguration?: array{glueConnectionName?: string, ...},
 *         compactionConfiguration?: array{icebergConfiguration?: array, ...},
 *         retentionConfiguration?: array{icebergConfiguration?: array, ...},
 *         orphanFileDeletionConfiguration?: array{icebergConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrigger(array $args = [])
 * @phpstan-method \Aws\Result createTrigger(array{
 *     Name?: string,
 *     WorkflowName?: string,
 *     Type?: 'CONDITIONAL'|'EVENT'|'ON_DEMAND'|'SCHEDULED',
 *     Schedule?: string,
 *     Predicate?: array{Logical?: 'AND'|'ANY', Conditions?: list<array>, ...},
 *     Actions?: list<array{
 *         JobName?: string,
 *         Arguments?: array<string, string>,
 *         Timeout?: int,
 *         SecurityConfiguration?: string,
 *         NotificationProperty?: array,
 *         CrawlerName?: string,
 *         ...,
 *     }>,
 *     Description?: string,
 *     StartOnCreation?: bool,
 *     Tags?: array<string, string>,
 *     EventBatchingCondition?: array{BatchSize?: int, BatchWindow?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTriggerAsync(array{
 *     Name?: string,
 *     WorkflowName?: string,
 *     Type?: 'CONDITIONAL'|'EVENT'|'ON_DEMAND'|'SCHEDULED',
 *     Schedule?: string,
 *     Predicate?: array{Logical?: 'AND'|'ANY', Conditions?: list<array>, ...},
 *     Actions?: list<array{
 *         JobName?: string,
 *         Arguments?: array<string, string>,
 *         Timeout?: int,
 *         SecurityConfiguration?: string,
 *         NotificationProperty?: array,
 *         CrawlerName?: string,
 *         ...,
 *     }>,
 *     Description?: string,
 *     StartOnCreation?: bool,
 *     Tags?: array<string, string>,
 *     EventBatchingCondition?: array{BatchSize?: int, BatchWindow?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUsageProfile(array $args = [])
 * @phpstan-method \Aws\Result createUsageProfile(array{
 *     Name?: string,
 *     Description?: string,
 *     Configuration?: array{SessionConfiguration?: array<string, array>, JobConfiguration?: array<string, array>, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUsageProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUsageProfileAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Configuration?: array{SessionConfiguration?: array<string, array>, JobConfiguration?: array<string, array>, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserDefinedFunction(array $args = [])
 * @phpstan-method \Aws\Result createUserDefinedFunction(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     FunctionInput?: array{
 *         FunctionName?: string,
 *         ClassName?: string,
 *         OwnerName?: string,
 *         FunctionType?: 'AGGREGATE_FUNCTION'|'REGULAR_FUNCTION'|'STORED_PROCEDURE',
 *         OwnerType?: 'GROUP'|'ROLE'|'USER',
 *         ResourceUris?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserDefinedFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserDefinedFunctionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     FunctionInput?: array{
 *         FunctionName?: string,
 *         ClassName?: string,
 *         OwnerName?: string,
 *         FunctionType?: 'AGGREGATE_FUNCTION'|'REGULAR_FUNCTION'|'STORED_PROCEDURE',
 *         OwnerType?: 'GROUP'|'ROLE'|'USER',
 *         ResourceUris?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkflow(array $args = [])
 * @phpstan-method \Aws\Result createWorkflow(array{
 *     Name?: string,
 *     Description?: string,
 *     DefaultRunProperties?: array<string, string>,
 *     Tags?: array<string, string>,
 *     MaxConcurrentRuns?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkflowAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     DefaultRunProperties?: array<string, string>,
 *     Tags?: array<string, string>,
 *     MaxConcurrentRuns?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAsset(array $args = [])
 * @phpstan-method \Aws\Result deleteAsset(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteAssetType(array $args = [])
 * @phpstan-method \Aws\Result deleteAssetType(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetTypeAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteAttachment(array $args = [])
 * @phpstan-method \Aws\Result deleteAttachment(array{
 *     AssetIdentifier?: string,
 *     IterableFormName?: string,
 *     ItemIdentifier?: string,
 *     AttachmentName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAttachmentAsync(array{
 *     AssetIdentifier?: string,
 *     IterableFormName?: string,
 *     ItemIdentifier?: string,
 *     AttachmentName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBlueprint(array $args = [])
 * @phpstan-method \Aws\Result deleteBlueprint(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBlueprintAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteCatalog(array $args = [])
 * @phpstan-method \Aws\Result deleteCatalog(array{CatalogId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCatalogAsync(array{CatalogId?: string, ...} $args = [])
 * @method \Aws\Result deleteClassifier(array $args = [])
 * @phpstan-method \Aws\Result deleteClassifier(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClassifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClassifierAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteColumnStatisticsForPartition(array $args = [])
 * @phpstan-method \Aws\Result deleteColumnStatisticsForPartition(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValues?: list<string>,
 *     ColumnName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteColumnStatisticsForPartitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteColumnStatisticsForPartitionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValues?: list<string>,
 *     ColumnName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteColumnStatisticsForTable(array $args = [])
 * @phpstan-method \Aws\Result deleteColumnStatisticsForTable(array{CatalogId?: string, DatabaseName?: string, TableName?: string, ColumnName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteColumnStatisticsForTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteColumnStatisticsForTableAsync(array{CatalogId?: string, DatabaseName?: string, TableName?: string, ColumnName?: string, ...} $args = [])
 * @method \Aws\Result deleteColumnStatisticsTaskSettings(array $args = [])
 * @phpstan-method \Aws\Result deleteColumnStatisticsTaskSettings(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteColumnStatisticsTaskSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteColumnStatisticsTaskSettingsAsync(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{CatalogId?: string, ConnectionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{CatalogId?: string, ConnectionName?: string, ...} $args = [])
 * @method \Aws\Result deleteConnectionType(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectionType(array{ConnectionType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionTypeAsync(array{ConnectionType?: string, ...} $args = [])
 * @method \Aws\Result deleteCrawler(array $args = [])
 * @phpstan-method \Aws\Result deleteCrawler(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCrawlerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCrawlerAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomEntityType(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomEntityType(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomEntityTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomEntityTypeAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteDataQualityRuleset(array $args = [])
 * @phpstan-method \Aws\Result deleteDataQualityRuleset(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataQualityRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataQualityRulesetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteDatabase(array $args = [])
 * @phpstan-method \Aws\Result deleteDatabase(array{CatalogId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatabaseAsync(array{CatalogId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteDevEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deleteDevEndpoint(array{EndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDevEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDevEndpointAsync(array{EndpointName?: string, ...} $args = [])
 * @method \Aws\Result deleteFormType(array $args = [])
 * @phpstan-method \Aws\Result deleteFormType(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFormTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFormTypeAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteGlossary(array $args = [])
 * @phpstan-method \Aws\Result deleteGlossary(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlossaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGlossaryAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteGlossaryTerm(array $args = [])
 * @phpstan-method \Aws\Result deleteGlossaryTerm(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlossaryTermAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGlossaryTermAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteGlueIdentityCenterConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteGlueIdentityCenterConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlueIdentityCenterConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGlueIdentityCenterConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result deleteIntegration(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegration(array{IntegrationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationAsync(array{IntegrationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegrationResourceProperty(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegrationResourceProperty(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationResourcePropertyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationResourcePropertyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteIntegrationTableProperties(array $args = [])
 * @phpstan-method \Aws\Result deleteIntegrationTableProperties(array{ResourceArn?: string, TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntegrationTablePropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntegrationTablePropertiesAsync(array{ResourceArn?: string, TableName?: string, ...} $args = [])
 * @method \Aws\Result deleteJob(array $args = [])
 * @phpstan-method \Aws\Result deleteJob(array{JobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobAsync(array{JobName?: string, ...} $args = [])
 * @method \Aws\Result deleteMLTransform(array $args = [])
 * @phpstan-method \Aws\Result deleteMLTransform(array{TransformId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMLTransformAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMLTransformAsync(array{TransformId?: string, ...} $args = [])
 * @method \Aws\Result deletePartition(array $args = [])
 * @phpstan-method \Aws\Result deletePartition(array{CatalogId?: string, DatabaseName?: string, TableName?: string, PartitionValues?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePartitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePartitionAsync(array{CatalogId?: string, DatabaseName?: string, TableName?: string, PartitionValues?: list<string>, ...} $args = [])
 * @method \Aws\Result deletePartitionIndex(array $args = [])
 * @phpstan-method \Aws\Result deletePartitionIndex(array{CatalogId?: string, DatabaseName?: string, TableName?: string, IndexName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePartitionIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePartitionIndexAsync(array{CatalogId?: string, DatabaseName?: string, TableName?: string, IndexName?: string, ...} $args = [])
 * @method \Aws\Result deleteRegistry(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistry(array{RegistryId?: array{RegistryName?: string, RegistryArn?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistryAsync(array{RegistryId?: array{RegistryName?: string, RegistryArn?: string, ...}, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{PolicyHashCondition?: string, ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{PolicyHashCondition?: string, ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result deleteSchema(array $args = [])
 * @phpstan-method \Aws\Result deleteSchema(array{SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSchemaAsync(array{SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...}, ...} $args = [])
 * @method \Aws\Result deleteSchemaVersions(array $args = [])
 * @phpstan-method \Aws\Result deleteSchemaVersions(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     Versions?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSchemaVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSchemaVersionsAsync(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     Versions?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteSecurityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteSecurityConfiguration(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSecurityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSecurityConfigurationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteSession(array $args = [])
 * @phpstan-method \Aws\Result deleteSession(array{Id?: string, RequestOrigin?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSessionAsync(array{Id?: string, RequestOrigin?: string, ...} $args = [])
 * @method \Aws\Result deleteTable(array $args = [])
 * @phpstan-method \Aws\Result deleteTable(array{CatalogId?: string, DatabaseName?: string, Name?: string, TransactionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableAsync(array{CatalogId?: string, DatabaseName?: string, Name?: string, TransactionId?: string, ...} $args = [])
 * @method \Aws\Result deleteTableOptimizer(array $args = [])
 * @phpstan-method \Aws\Result deleteTableOptimizer(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Type?: 'compaction'|'orphan_file_deletion'|'retention',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableOptimizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableOptimizerAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Type?: 'compaction'|'orphan_file_deletion'|'retention',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteTableVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteTableVersion(array{CatalogId?: string, DatabaseName?: string, TableName?: string, VersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTableVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTableVersionAsync(array{CatalogId?: string, DatabaseName?: string, TableName?: string, VersionId?: string, ...} $args = [])
 * @method \Aws\Result deleteTrigger(array $args = [])
 * @phpstan-method \Aws\Result deleteTrigger(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTriggerAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteUsageProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteUsageProfile(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUsageProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUsageProfileAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteUserDefinedFunction(array $args = [])
 * @phpstan-method \Aws\Result deleteUserDefinedFunction(array{CatalogId?: string, DatabaseName?: string, FunctionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserDefinedFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserDefinedFunctionAsync(array{CatalogId?: string, DatabaseName?: string, FunctionName?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkflow(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkflow(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkflowAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeConnectionType(array $args = [])
 * @phpstan-method \Aws\Result describeConnectionType(array{ConnectionType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConnectionTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectionTypeAsync(array{ConnectionType?: string, ...} $args = [])
 * @method \Aws\Result describeEntity(array $args = [])
 * @phpstan-method \Aws\Result describeEntity(array{
 *     ConnectionName?: string,
 *     CatalogId?: string,
 *     EntityName?: string,
 *     NextToken?: string,
 *     DataStoreApiVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEntityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEntityAsync(array{
 *     ConnectionName?: string,
 *     CatalogId?: string,
 *     EntityName?: string,
 *     NextToken?: string,
 *     DataStoreApiVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInboundIntegrations(array $args = [])
 * @phpstan-method \Aws\Result describeInboundIntegrations(array{IntegrationArn?: string, Marker?: string, MaxRecords?: int, TargetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInboundIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInboundIntegrationsAsync(array{IntegrationArn?: string, Marker?: string, MaxRecords?: int, TargetArn?: string, ...} $args = [])
 * @method \Aws\Result describeIntegrations(array $args = [])
 * @phpstan-method \Aws\Result describeIntegrations(array{
 *     IntegrationIdentifier?: string,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIntegrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIntegrationsAsync(array{
 *     IntegrationIdentifier?: string,
 *     Marker?: string,
 *     MaxRecords?: int,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateGlossaryTerms(array $args = [])
 * @phpstan-method \Aws\Result disassociateGlossaryTerms(array{AssetIdentifier?: string, GlossaryTermIdentifiers?: list<string>, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateGlossaryTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateGlossaryTermsAsync(array{AssetIdentifier?: string, GlossaryTermIdentifiers?: list<string>, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result getAsset(array $args = [])
 * @phpstan-method \Aws\Result getAsset(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getAssetType(array $args = [])
 * @phpstan-method \Aws\Result getAssetType(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetTypeAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getBlueprint(array $args = [])
 * @phpstan-method \Aws\Result getBlueprint(array{Name?: string, IncludeBlueprint?: bool, IncludeParameterSpec?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBlueprintAsync(array{Name?: string, IncludeBlueprint?: bool, IncludeParameterSpec?: bool, ...} $args = [])
 * @method \Aws\Result getBlueprintRun(array $args = [])
 * @phpstan-method \Aws\Result getBlueprintRun(array{BlueprintName?: string, RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBlueprintRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBlueprintRunAsync(array{BlueprintName?: string, RunId?: string, ...} $args = [])
 * @method \Aws\Result getBlueprintRuns(array $args = [])
 * @phpstan-method \Aws\Result getBlueprintRuns(array{BlueprintName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBlueprintRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBlueprintRunsAsync(array{BlueprintName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getCatalog(array $args = [])
 * @phpstan-method \Aws\Result getCatalog(array{CatalogId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCatalogAsync(array{CatalogId?: string, ...} $args = [])
 * @method \Aws\Result getCatalogImportStatus(array $args = [])
 * @phpstan-method \Aws\Result getCatalogImportStatus(array{CatalogId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCatalogImportStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCatalogImportStatusAsync(array{CatalogId?: string, ...} $args = [])
 * @method \Aws\Result getCatalogs(array $args = [])
 * @phpstan-method \Aws\Result getCatalogs(array{
 *     ParentCatalogId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Recursive?: bool,
 *     IncludeRoot?: bool,
 *     HasDatabases?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCatalogsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCatalogsAsync(array{
 *     ParentCatalogId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Recursive?: bool,
 *     IncludeRoot?: bool,
 *     HasDatabases?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getClassifier(array $args = [])
 * @phpstan-method \Aws\Result getClassifier(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClassifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClassifierAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getClassifiers(array $args = [])
 * @phpstan-method \Aws\Result getClassifiers(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClassifiersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClassifiersAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getColumnStatisticsForPartition(array $args = [])
 * @phpstan-method \Aws\Result getColumnStatisticsForPartition(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValues?: list<string>,
 *     ColumnNames?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getColumnStatisticsForPartitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getColumnStatisticsForPartitionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValues?: list<string>,
 *     ColumnNames?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getColumnStatisticsForTable(array $args = [])
 * @phpstan-method \Aws\Result getColumnStatisticsForTable(array{CatalogId?: string, DatabaseName?: string, TableName?: string, ColumnNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getColumnStatisticsForTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getColumnStatisticsForTableAsync(array{CatalogId?: string, DatabaseName?: string, TableName?: string, ColumnNames?: list<string>, ...} $args = [])
 * @method \Aws\Result getColumnStatisticsTaskRun(array $args = [])
 * @phpstan-method \Aws\Result getColumnStatisticsTaskRun(array{ColumnStatisticsTaskRunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getColumnStatisticsTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getColumnStatisticsTaskRunAsync(array{ColumnStatisticsTaskRunId?: string, ...} $args = [])
 * @method \Aws\Result getColumnStatisticsTaskRuns(array $args = [])
 * @phpstan-method \Aws\Result getColumnStatisticsTaskRuns(array{DatabaseName?: string, TableName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getColumnStatisticsTaskRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getColumnStatisticsTaskRunsAsync(array{DatabaseName?: string, TableName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getColumnStatisticsTaskSettings(array $args = [])
 * @phpstan-method \Aws\Result getColumnStatisticsTaskSettings(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getColumnStatisticsTaskSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getColumnStatisticsTaskSettingsAsync(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \Aws\Result getConnection(array $args = [])
 * @phpstan-method \Aws\Result getConnection(array{
 *     CatalogId?: string,
 *     Name?: string,
 *     HidePassword?: bool,
 *     ApplyOverrideForComputeEnvironment?: 'ATHENA'|'PYTHON'|'SPARK',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionAsync(array{
 *     CatalogId?: string,
 *     Name?: string,
 *     HidePassword?: bool,
 *     ApplyOverrideForComputeEnvironment?: 'ATHENA'|'PYTHON'|'SPARK',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getConnections(array $args = [])
 * @phpstan-method \Aws\Result getConnections(array{
 *     CatalogId?: string,
 *     Filter?: array{
 *         MatchCriteria?: list<string>,
 *         ConnectionType?: 'ADOBEANALYTICS'|'ASANA'|'AZURECOSMOS'|'AZURESQL'|'BIGQUERY'|'BLACKBAUD'|'BLACKBAUDRAISEREDGENXT'|'CIRCLECI'|'CLOUDERAHIVE'|'CLOUDERAIMPALA'|'CLOUDWATCH'|'CLOUDWATCHMETRICS'|'CMDB'|'CUSTOM'|'DATADOG'|'DATALAKEGEN2'|'DB2'|'DB2AS400'|'DOCUMENTDB'|'DOCUSIGNMONITOR'|'DOMO'|'DYNAMODB'|'DYNATRACE'|'FACEBOOKADS'|'FACEBOOKPAGEINSIGHTS'|'FRESHDESK'|'FRESHSALES'|'GITLAB'|'GOOGLEADS'|'GOOGLEANALYTICS4'|'GOOGLECLOUDSTORAGE'|'GOOGLESEARCHCONSOLE'|'GOOGLESHEETS'|'HBASE'|'HUBSPOT'|'INSTAGRAMADS'|'INTERCOM'|'JDBC'|'JIRACLOUD'|'KAFKA'|'KUSTOMER'|'LINKEDIN'|'MAILCHIMP'|'MARKETO'|'MARKETPLACE'|'MICROSOFTDYNAMIC365FINANCEANDOPS'|'MICROSOFTDYNAMICS365CRM'|'MICROSOFTTEAMS'|'MIXPANEL'|'MONDAY'|'MONGODB'|'MYSQL'|'NETSUITEERP'|'NETWORK'|'OKTA'|'OPENSEARCH'|'ORACLE'|'PAYPAL'|'PENDO'|'PIPEDIVE'|'PIPEDRIVE'|'POSTGRESQL'|'PRODUCTBOARD'|'QUICKBOOKS'|'SALESFORCE'|'SALESFORCECOMMERCECLOUD'|'SALESFORCEMARKETINGCLOUD'|'SALESFORCEPARDOT'|'SAPCONCUR'|'SAPHANA'|'SAPODATA'|'SENDGRID'|'SERVICENOW'|'SFTP'|'SLACK'|'SMARTSHEET'|'SNAPCHATADS'|'SQLSERVER'|'STRIPE'|'SYNAPSE'|'TERADATA'|'TERADATANOS'|'TIMESTREAM'|'TPCDS'|'TWILIO'|'VERTICA'|'VIEW_VALIDATION_ATHENA'|'VIEW_VALIDATION_REDSHIFT'|'WOOCOMMERCE'|'ZENDESK'|'ZOHOCRM'|'ZOOM',
 *         ConnectionSchemaVersion?: int,
 *         ...,
 *     },
 *     HidePassword?: bool,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionsAsync(array{
 *     CatalogId?: string,
 *     Filter?: array{
 *         MatchCriteria?: list<string>,
 *         ConnectionType?: 'ADOBEANALYTICS'|'ASANA'|'AZURECOSMOS'|'AZURESQL'|'BIGQUERY'|'BLACKBAUD'|'BLACKBAUDRAISEREDGENXT'|'CIRCLECI'|'CLOUDERAHIVE'|'CLOUDERAIMPALA'|'CLOUDWATCH'|'CLOUDWATCHMETRICS'|'CMDB'|'CUSTOM'|'DATADOG'|'DATALAKEGEN2'|'DB2'|'DB2AS400'|'DOCUMENTDB'|'DOCUSIGNMONITOR'|'DOMO'|'DYNAMODB'|'DYNATRACE'|'FACEBOOKADS'|'FACEBOOKPAGEINSIGHTS'|'FRESHDESK'|'FRESHSALES'|'GITLAB'|'GOOGLEADS'|'GOOGLEANALYTICS4'|'GOOGLECLOUDSTORAGE'|'GOOGLESEARCHCONSOLE'|'GOOGLESHEETS'|'HBASE'|'HUBSPOT'|'INSTAGRAMADS'|'INTERCOM'|'JDBC'|'JIRACLOUD'|'KAFKA'|'KUSTOMER'|'LINKEDIN'|'MAILCHIMP'|'MARKETO'|'MARKETPLACE'|'MICROSOFTDYNAMIC365FINANCEANDOPS'|'MICROSOFTDYNAMICS365CRM'|'MICROSOFTTEAMS'|'MIXPANEL'|'MONDAY'|'MONGODB'|'MYSQL'|'NETSUITEERP'|'NETWORK'|'OKTA'|'OPENSEARCH'|'ORACLE'|'PAYPAL'|'PENDO'|'PIPEDIVE'|'PIPEDRIVE'|'POSTGRESQL'|'PRODUCTBOARD'|'QUICKBOOKS'|'SALESFORCE'|'SALESFORCECOMMERCECLOUD'|'SALESFORCEMARKETINGCLOUD'|'SALESFORCEPARDOT'|'SAPCONCUR'|'SAPHANA'|'SAPODATA'|'SENDGRID'|'SERVICENOW'|'SFTP'|'SLACK'|'SMARTSHEET'|'SNAPCHATADS'|'SQLSERVER'|'STRIPE'|'SYNAPSE'|'TERADATA'|'TERADATANOS'|'TIMESTREAM'|'TPCDS'|'TWILIO'|'VERTICA'|'VIEW_VALIDATION_ATHENA'|'VIEW_VALIDATION_REDSHIFT'|'WOOCOMMERCE'|'ZENDESK'|'ZOHOCRM'|'ZOOM',
 *         ConnectionSchemaVersion?: int,
 *         ...,
 *     },
 *     HidePassword?: bool,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCrawler(array $args = [])
 * @phpstan-method \Aws\Result getCrawler(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCrawlerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCrawlerAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getCrawlerMetrics(array $args = [])
 * @phpstan-method \Aws\Result getCrawlerMetrics(array{CrawlerNameList?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCrawlerMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCrawlerMetricsAsync(array{CrawlerNameList?: list<string>, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getCrawlers(array $args = [])
 * @phpstan-method \Aws\Result getCrawlers(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCrawlersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCrawlersAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getCustomEntityType(array $args = [])
 * @phpstan-method \Aws\Result getCustomEntityType(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomEntityTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCustomEntityTypeAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getDashboardUrl(array $args = [])
 * @phpstan-method \Aws\Result getDashboardUrl(array{ResourceId?: string, ResourceType?: 'JOB'|'SESSION', RequestOrigin?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDashboardUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDashboardUrlAsync(array{ResourceId?: string, ResourceType?: 'JOB'|'SESSION', RequestOrigin?: string, ...} $args = [])
 * @method \Aws\Result getDataCatalogEncryptionSettings(array $args = [])
 * @phpstan-method \Aws\Result getDataCatalogEncryptionSettings(array{CatalogId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataCatalogEncryptionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataCatalogEncryptionSettingsAsync(array{CatalogId?: string, ...} $args = [])
 * @method \Aws\Result getDataQualityModel(array $args = [])
 * @phpstan-method \Aws\Result getDataQualityModel(array{StatisticId?: string, ProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataQualityModelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataQualityModelAsync(array{StatisticId?: string, ProfileId?: string, ...} $args = [])
 * @method \Aws\Result getDataQualityModelResult(array $args = [])
 * @phpstan-method \Aws\Result getDataQualityModelResult(array{StatisticId?: string, ProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataQualityModelResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataQualityModelResultAsync(array{StatisticId?: string, ProfileId?: string, ...} $args = [])
 * @method \Aws\Result getDataQualityResult(array $args = [])
 * @phpstan-method \Aws\Result getDataQualityResult(array{ResultId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataQualityResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataQualityResultAsync(array{ResultId?: string, ...} $args = [])
 * @method \Aws\Result getDataQualityRuleRecommendationRun(array $args = [])
 * @phpstan-method \Aws\Result getDataQualityRuleRecommendationRun(array{RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataQualityRuleRecommendationRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataQualityRuleRecommendationRunAsync(array{RunId?: string, ...} $args = [])
 * @method \Aws\Result getDataQualityRuleset(array $args = [])
 * @phpstan-method \Aws\Result getDataQualityRuleset(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataQualityRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataQualityRulesetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getDataQualityRulesetEvaluationRun(array $args = [])
 * @phpstan-method \Aws\Result getDataQualityRulesetEvaluationRun(array{RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataQualityRulesetEvaluationRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataQualityRulesetEvaluationRunAsync(array{RunId?: string, ...} $args = [])
 * @method \Aws\Result getDatabase(array $args = [])
 * @phpstan-method \Aws\Result getDatabase(array{CatalogId?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDatabaseAsync(array{CatalogId?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getDatabases(array $args = [])
 * @phpstan-method \Aws\Result getDatabases(array{
 *     CatalogId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ResourceShareType?: 'ALL'|'FEDERATED'|'FOREIGN',
 *     AttributesToGet?: list<'NAME'|'TARGET_DATABASE'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDatabasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDatabasesAsync(array{
 *     CatalogId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ResourceShareType?: 'ALL'|'FEDERATED'|'FOREIGN',
 *     AttributesToGet?: list<'NAME'|'TARGET_DATABASE'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDataflowGraph(array $args = [])
 * @phpstan-method \Aws\Result getDataflowGraph(array{PythonScript?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataflowGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataflowGraphAsync(array{PythonScript?: string, ...} $args = [])
 * @method \Aws\Result getDevEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getDevEndpoint(array{EndpointName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDevEndpointAsync(array{EndpointName?: string, ...} $args = [])
 * @method \Aws\Result getDevEndpoints(array $args = [])
 * @phpstan-method \Aws\Result getDevEndpoints(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDevEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDevEndpointsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getEntityRecords(array $args = [])
 * @phpstan-method \Aws\Result getEntityRecords(array{
 *     ConnectionName?: string,
 *     CatalogId?: string,
 *     EntityName?: string,
 *     NextToken?: string,
 *     DataStoreApiVersion?: string,
 *     ConnectionOptions?: array<string, string>,
 *     FilterPredicate?: string,
 *     Limit?: int,
 *     OrderBy?: string,
 *     SelectedFields?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getEntityRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEntityRecordsAsync(array{
 *     ConnectionName?: string,
 *     CatalogId?: string,
 *     EntityName?: string,
 *     NextToken?: string,
 *     DataStoreApiVersion?: string,
 *     ConnectionOptions?: array<string, string>,
 *     FilterPredicate?: string,
 *     Limit?: int,
 *     OrderBy?: string,
 *     SelectedFields?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFormType(array $args = [])
 * @phpstan-method \Aws\Result getFormType(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFormTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFormTypeAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getGlossary(array $args = [])
 * @phpstan-method \Aws\Result getGlossary(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlossaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGlossaryAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getGlossaryTerm(array $args = [])
 * @phpstan-method \Aws\Result getGlossaryTerm(array{Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlossaryTermAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGlossaryTermAsync(array{Identifier?: string, ...} $args = [])
 * @method \Aws\Result getGlueIdentityCenterConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getGlueIdentityCenterConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlueIdentityCenterConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGlueIdentityCenterConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getIntegrationResourceProperty(array $args = [])
 * @phpstan-method \Aws\Result getIntegrationResourceProperty(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationResourcePropertyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationResourcePropertyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getIntegrationTableProperties(array $args = [])
 * @phpstan-method \Aws\Result getIntegrationTableProperties(array{ResourceArn?: string, TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntegrationTablePropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntegrationTablePropertiesAsync(array{ResourceArn?: string, TableName?: string, ...} $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @phpstan-method \Aws\Result getJob(array{JobName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobAsync(array{JobName?: string, ...} $args = [])
 * @method \Aws\Result getJobBookmark(array $args = [])
 * @phpstan-method \Aws\Result getJobBookmark(array{JobName?: string, RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobBookmarkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobBookmarkAsync(array{JobName?: string, RunId?: string, ...} $args = [])
 * @method \Aws\Result getJobRun(array $args = [])
 * @phpstan-method \Aws\Result getJobRun(array{JobName?: string, RunId?: string, PredecessorsIncluded?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobRunAsync(array{JobName?: string, RunId?: string, PredecessorsIncluded?: bool, ...} $args = [])
 * @method \Aws\Result getJobRuns(array $args = [])
 * @phpstan-method \Aws\Result getJobRuns(array{JobName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobRunsAsync(array{JobName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getJobs(array $args = [])
 * @phpstan-method \Aws\Result getJobs(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getMLTaskRun(array $args = [])
 * @phpstan-method \Aws\Result getMLTaskRun(array{TransformId?: string, TaskRunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMLTaskRunAsync(array{TransformId?: string, TaskRunId?: string, ...} $args = [])
 * @method \Aws\Result getMLTaskRuns(array $args = [])
 * @phpstan-method \Aws\Result getMLTaskRuns(array{
 *     TransformId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         TaskRunType?: 'EVALUATION'|'EXPORT_LABELS'|'FIND_MATCHES'|'IMPORT_LABELS'|'LABELING_SET_GENERATION',
 *         Status?: 'FAILED'|'RUNNING'|'STARTING'|'STOPPED'|'STOPPING'|'SUCCEEDED'|'TIMEOUT',
 *         StartedBefore?: int|string|\DateTimeInterface,
 *         StartedAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     Sort?: array{Column?: 'STARTED'|'STATUS'|'TASK_RUN_TYPE', SortDirection?: 'ASCENDING'|'DESCENDING', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLTaskRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMLTaskRunsAsync(array{
 *     TransformId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         TaskRunType?: 'EVALUATION'|'EXPORT_LABELS'|'FIND_MATCHES'|'IMPORT_LABELS'|'LABELING_SET_GENERATION',
 *         Status?: 'FAILED'|'RUNNING'|'STARTING'|'STOPPED'|'STOPPING'|'SUCCEEDED'|'TIMEOUT',
 *         StartedBefore?: int|string|\DateTimeInterface,
 *         StartedAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     Sort?: array{Column?: 'STARTED'|'STATUS'|'TASK_RUN_TYPE', SortDirection?: 'ASCENDING'|'DESCENDING', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMLTransform(array $args = [])
 * @phpstan-method \Aws\Result getMLTransform(array{TransformId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLTransformAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMLTransformAsync(array{TransformId?: string, ...} $args = [])
 * @method \Aws\Result getMLTransforms(array $args = [])
 * @phpstan-method \Aws\Result getMLTransforms(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         Name?: string,
 *         TransformType?: 'FIND_MATCHES',
 *         Status?: 'DELETING'|'NOT_READY'|'READY',
 *         GlueVersion?: string,
 *         CreatedBefore?: int|string|\DateTimeInterface,
 *         CreatedAfter?: int|string|\DateTimeInterface,
 *         LastModifiedBefore?: int|string|\DateTimeInterface,
 *         LastModifiedAfter?: int|string|\DateTimeInterface,
 *         Schema?: list<array>,
 *         ...,
 *     },
 *     Sort?: array{
 *         Column?: 'CREATED'|'LAST_MODIFIED'|'NAME'|'STATUS'|'TRANSFORM_TYPE',
 *         SortDirection?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMLTransformsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMLTransformsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         Name?: string,
 *         TransformType?: 'FIND_MATCHES',
 *         Status?: 'DELETING'|'NOT_READY'|'READY',
 *         GlueVersion?: string,
 *         CreatedBefore?: int|string|\DateTimeInterface,
 *         CreatedAfter?: int|string|\DateTimeInterface,
 *         LastModifiedBefore?: int|string|\DateTimeInterface,
 *         LastModifiedAfter?: int|string|\DateTimeInterface,
 *         Schema?: list<array>,
 *         ...,
 *     },
 *     Sort?: array{
 *         Column?: 'CREATED'|'LAST_MODIFIED'|'NAME'|'STATUS'|'TRANSFORM_TYPE',
 *         SortDirection?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMapping(array $args = [])
 * @phpstan-method \Aws\Result getMapping(array{
 *     Source?: array{DatabaseName?: string, TableName?: string, ...},
 *     Sinks?: list<array{DatabaseName?: string, TableName?: string, ...}>,
 *     Location?: array{Jdbc?: list<array>, S3?: list<array>, DynamoDB?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMappingAsync(array{
 *     Source?: array{DatabaseName?: string, TableName?: string, ...},
 *     Sinks?: list<array{DatabaseName?: string, TableName?: string, ...}>,
 *     Location?: array{Jdbc?: list<array>, S3?: list<array>, DynamoDB?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getMaterializedViewRefreshTaskRun(array $args = [])
 * @phpstan-method \Aws\Result getMaterializedViewRefreshTaskRun(array{CatalogId?: string, MaterializedViewRefreshTaskRunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMaterializedViewRefreshTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMaterializedViewRefreshTaskRunAsync(array{CatalogId?: string, MaterializedViewRefreshTaskRunId?: string, ...} $args = [])
 * @method \Aws\Result getPartition(array $args = [])
 * @phpstan-method \Aws\Result getPartition(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValues?: list<string>,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPartitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPartitionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValues?: list<string>,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPartitionIndexes(array $args = [])
 * @phpstan-method \Aws\Result getPartitionIndexes(array{CatalogId?: string, DatabaseName?: string, TableName?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPartitionIndexesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPartitionIndexesAsync(array{CatalogId?: string, DatabaseName?: string, TableName?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getPartitions(array $args = [])
 * @phpstan-method \Aws\Result getPartitions(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Expression?: string,
 *     NextToken?: string,
 *     Segment?: array{SegmentNumber?: int, TotalSegments?: int, ...},
 *     MaxResults?: int,
 *     ExcludeColumnSchema?: bool,
 *     TransactionId?: string,
 *     QueryAsOfTime?: int|string|\DateTimeInterface,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPartitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPartitionsAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Expression?: string,
 *     NextToken?: string,
 *     Segment?: array{SegmentNumber?: int, TotalSegments?: int, ...},
 *     MaxResults?: int,
 *     ExcludeColumnSchema?: bool,
 *     TransactionId?: string,
 *     QueryAsOfTime?: int|string|\DateTimeInterface,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPlan(array $args = [])
 * @phpstan-method \Aws\Result getPlan(array{
 *     Mapping?: list<array{
 *         SourceTable?: string,
 *         SourcePath?: string,
 *         SourceType?: string,
 *         TargetTable?: string,
 *         TargetPath?: string,
 *         TargetType?: string,
 *         ...,
 *     }>,
 *     Source?: array{DatabaseName?: string, TableName?: string, ...},
 *     Sinks?: list<array{DatabaseName?: string, TableName?: string, ...}>,
 *     Location?: array{Jdbc?: list<array>, S3?: list<array>, DynamoDB?: list<array>, ...},
 *     Language?: 'PYTHON'|'SCALA',
 *     AdditionalPlanOptionsMap?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPlanAsync(array{
 *     Mapping?: list<array{
 *         SourceTable?: string,
 *         SourcePath?: string,
 *         SourceType?: string,
 *         TargetTable?: string,
 *         TargetPath?: string,
 *         TargetType?: string,
 *         ...,
 *     }>,
 *     Source?: array{DatabaseName?: string, TableName?: string, ...},
 *     Sinks?: list<array{DatabaseName?: string, TableName?: string, ...}>,
 *     Location?: array{Jdbc?: list<array>, S3?: list<array>, DynamoDB?: list<array>, ...},
 *     Language?: 'PYTHON'|'SCALA',
 *     AdditionalPlanOptionsMap?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRegistry(array $args = [])
 * @phpstan-method \Aws\Result getRegistry(array{RegistryId?: array{RegistryName?: string, RegistryArn?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegistryAsync(array{RegistryId?: array{RegistryName?: string, RegistryArn?: string, ...}, ...} $args = [])
 * @method \Aws\Result getResourcePolicies(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicies(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePoliciesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getSchema(array $args = [])
 * @phpstan-method \Aws\Result getSchema(array{SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSchemaAsync(array{SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...}, ...} $args = [])
 * @method \Aws\Result getSchemaByDefinition(array $args = [])
 * @phpstan-method \Aws\Result getSchemaByDefinition(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaDefinition?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSchemaByDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSchemaByDefinitionAsync(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaDefinition?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSchemaVersion(array $args = [])
 * @phpstan-method \Aws\Result getSchemaVersion(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaVersionId?: string,
 *     SchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSchemaVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSchemaVersionAsync(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaVersionId?: string,
 *     SchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSchemaVersionsDiff(array $args = [])
 * @phpstan-method \Aws\Result getSchemaVersionsDiff(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     FirstSchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     SecondSchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     SchemaDiffType?: 'SYNTAX_DIFF',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSchemaVersionsDiffAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSchemaVersionsDiffAsync(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     FirstSchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     SecondSchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     SchemaDiffType?: 'SYNTAX_DIFF',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSecurityConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getSecurityConfiguration(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSecurityConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSecurityConfigurationAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getSecurityConfigurations(array $args = [])
 * @phpstan-method \Aws\Result getSecurityConfigurations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSecurityConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSecurityConfigurationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{Id?: string, RequestOrigin?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{Id?: string, RequestOrigin?: string, ...} $args = [])
 * @method \Aws\Result getSessionEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getSessionEndpoint(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionEndpointAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result getStatement(array $args = [])
 * @phpstan-method \Aws\Result getStatement(array{SessionId?: string, Id?: int, RequestOrigin?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStatementAsync(array{SessionId?: string, Id?: int, RequestOrigin?: string, ...} $args = [])
 * @method \Aws\Result getTable(array $args = [])
 * @phpstan-method \Aws\Result getTable(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Name?: string,
 *     TransactionId?: string,
 *     QueryAsOfTime?: int|string|\DateTimeInterface,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     IncludeStatusDetails?: bool,
 *     AttributesToGet?: list<'DEFAULT'|'LATEST_ICEBERG_METADATA'|'NAME'|'TABLE_TYPE'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Name?: string,
 *     TransactionId?: string,
 *     QueryAsOfTime?: int|string|\DateTimeInterface,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     IncludeStatusDetails?: bool,
 *     AttributesToGet?: list<'DEFAULT'|'LATEST_ICEBERG_METADATA'|'NAME'|'TABLE_TYPE'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTableOptimizer(array $args = [])
 * @phpstan-method \Aws\Result getTableOptimizer(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Type?: 'compaction'|'orphan_file_deletion'|'retention',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableOptimizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableOptimizerAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Type?: 'compaction'|'orphan_file_deletion'|'retention',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTableVersion(array $args = [])
 * @phpstan-method \Aws\Result getTableVersion(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     VersionId?: string,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableVersionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     VersionId?: string,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTableVersions(array $args = [])
 * @phpstan-method \Aws\Result getTableVersions(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableVersionsAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTables(array $args = [])
 * @phpstan-method \Aws\Result getTables(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Expression?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     TransactionId?: string,
 *     QueryAsOfTime?: int|string|\DateTimeInterface,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     IncludeStatusDetails?: bool,
 *     AttributesToGet?: list<'DEFAULT'|'LATEST_ICEBERG_METADATA'|'NAME'|'TABLE_TYPE'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTablesAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Expression?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     TransactionId?: string,
 *     QueryAsOfTime?: int|string|\DateTimeInterface,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     IncludeStatusDetails?: bool,
 *     AttributesToGet?: list<'DEFAULT'|'LATEST_ICEBERG_METADATA'|'NAME'|'TABLE_TYPE'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTags(array $args = [])
 * @phpstan-method \Aws\Result getTags(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTagsAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result getTrigger(array $args = [])
 * @phpstan-method \Aws\Result getTrigger(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTriggerAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getTriggers(array $args = [])
 * @phpstan-method \Aws\Result getTriggers(array{NextToken?: string, DependentJobName?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTriggersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTriggersAsync(array{NextToken?: string, DependentJobName?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getUnfilteredPartitionMetadata(array $args = [])
 * @phpstan-method \Aws\Result getUnfilteredPartitionMetadata(array{
 *     Region?: string,
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValues?: list<string>,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     SupportedPermissionTypes?: list<'CELL_FILTER_PERMISSION'|'COLUMN_PERMISSION'|'NESTED_CELL_PERMISSION'|'NESTED_PERMISSION'>,
 *     QuerySessionContext?: array{
 *         QueryId?: string,
 *         QueryStartTime?: int|string|\DateTimeInterface,
 *         ClusterId?: string,
 *         QueryAuthorizationId?: string,
 *         AdditionalContext?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getUnfilteredPartitionMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUnfilteredPartitionMetadataAsync(array{
 *     Region?: string,
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValues?: list<string>,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     SupportedPermissionTypes?: list<'CELL_FILTER_PERMISSION'|'COLUMN_PERMISSION'|'NESTED_CELL_PERMISSION'|'NESTED_PERMISSION'>,
 *     QuerySessionContext?: array{
 *         QueryId?: string,
 *         QueryStartTime?: int|string|\DateTimeInterface,
 *         ClusterId?: string,
 *         QueryAuthorizationId?: string,
 *         AdditionalContext?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getUnfilteredPartitionsMetadata(array $args = [])
 * @phpstan-method \Aws\Result getUnfilteredPartitionsMetadata(array{
 *     Region?: string,
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Expression?: string,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     SupportedPermissionTypes?: list<'CELL_FILTER_PERMISSION'|'COLUMN_PERMISSION'|'NESTED_CELL_PERMISSION'|'NESTED_PERMISSION'>,
 *     NextToken?: string,
 *     Segment?: array{SegmentNumber?: int, TotalSegments?: int, ...},
 *     MaxResults?: int,
 *     QuerySessionContext?: array{
 *         QueryId?: string,
 *         QueryStartTime?: int|string|\DateTimeInterface,
 *         ClusterId?: string,
 *         QueryAuthorizationId?: string,
 *         AdditionalContext?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getUnfilteredPartitionsMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUnfilteredPartitionsMetadataAsync(array{
 *     Region?: string,
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Expression?: string,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     SupportedPermissionTypes?: list<'CELL_FILTER_PERMISSION'|'COLUMN_PERMISSION'|'NESTED_CELL_PERMISSION'|'NESTED_PERMISSION'>,
 *     NextToken?: string,
 *     Segment?: array{SegmentNumber?: int, TotalSegments?: int, ...},
 *     MaxResults?: int,
 *     QuerySessionContext?: array{
 *         QueryId?: string,
 *         QueryStartTime?: int|string|\DateTimeInterface,
 *         ClusterId?: string,
 *         QueryAuthorizationId?: string,
 *         AdditionalContext?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getUnfilteredTableMetadata(array $args = [])
 * @phpstan-method \Aws\Result getUnfilteredTableMetadata(array{
 *     Region?: string,
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Name?: string,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     SupportedPermissionTypes?: list<'CELL_FILTER_PERMISSION'|'COLUMN_PERMISSION'|'NESTED_CELL_PERMISSION'|'NESTED_PERMISSION'>,
 *     ParentResourceArn?: string,
 *     RootResourceArn?: string,
 *     SupportedDialect?: array{Dialect?: 'ATHENA'|'REDSHIFT'|'SPARK', DialectVersion?: string, ...},
 *     Permissions?: list<'ALL'|'ALTER'|'CREATE_DATABASE'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DROP'|'INSERT'|'SELECT'>,
 *     QuerySessionContext?: array{
 *         QueryId?: string,
 *         QueryStartTime?: int|string|\DateTimeInterface,
 *         ClusterId?: string,
 *         QueryAuthorizationId?: string,
 *         AdditionalContext?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getUnfilteredTableMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUnfilteredTableMetadataAsync(array{
 *     Region?: string,
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Name?: string,
 *     AuditContext?: array{AdditionalAuditContext?: string, RequestedColumns?: list<string>, AllColumnsRequested?: bool, ...},
 *     SupportedPermissionTypes?: list<'CELL_FILTER_PERMISSION'|'COLUMN_PERMISSION'|'NESTED_CELL_PERMISSION'|'NESTED_PERMISSION'>,
 *     ParentResourceArn?: string,
 *     RootResourceArn?: string,
 *     SupportedDialect?: array{Dialect?: 'ATHENA'|'REDSHIFT'|'SPARK', DialectVersion?: string, ...},
 *     Permissions?: list<'ALL'|'ALTER'|'CREATE_DATABASE'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DROP'|'INSERT'|'SELECT'>,
 *     QuerySessionContext?: array{
 *         QueryId?: string,
 *         QueryStartTime?: int|string|\DateTimeInterface,
 *         ClusterId?: string,
 *         QueryAuthorizationId?: string,
 *         AdditionalContext?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getUsageProfile(array $args = [])
 * @phpstan-method \Aws\Result getUsageProfile(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsageProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsageProfileAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result getUserDefinedFunction(array $args = [])
 * @phpstan-method \Aws\Result getUserDefinedFunction(array{CatalogId?: string, DatabaseName?: string, FunctionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserDefinedFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserDefinedFunctionAsync(array{CatalogId?: string, DatabaseName?: string, FunctionName?: string, ...} $args = [])
 * @method \Aws\Result getUserDefinedFunctions(array $args = [])
 * @phpstan-method \Aws\Result getUserDefinedFunctions(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Pattern?: string,
 *     FunctionType?: 'AGGREGATE_FUNCTION'|'REGULAR_FUNCTION'|'STORED_PROCEDURE',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserDefinedFunctionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserDefinedFunctionsAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Pattern?: string,
 *     FunctionType?: 'AGGREGATE_FUNCTION'|'REGULAR_FUNCTION'|'STORED_PROCEDURE',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getWorkflow(array $args = [])
 * @phpstan-method \Aws\Result getWorkflow(array{Name?: string, IncludeGraph?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowAsync(array{Name?: string, IncludeGraph?: bool, ...} $args = [])
 * @method \Aws\Result getWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowRun(array{Name?: string, RunId?: string, IncludeGraph?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowRunAsync(array{Name?: string, RunId?: string, IncludeGraph?: bool, ...} $args = [])
 * @method \Aws\Result getWorkflowRunProperties(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowRunProperties(array{Name?: string, RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowRunPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowRunPropertiesAsync(array{Name?: string, RunId?: string, ...} $args = [])
 * @method \Aws\Result getWorkflowRuns(array $args = [])
 * @phpstan-method \Aws\Result getWorkflowRuns(array{Name?: string, IncludeGraph?: bool, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkflowRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkflowRunsAsync(array{Name?: string, IncludeGraph?: bool, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result importCatalogToGlue(array $args = [])
 * @phpstan-method \Aws\Result importCatalogToGlue(array{CatalogId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importCatalogToGlueAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importCatalogToGlueAsync(array{CatalogId?: string, ...} $args = [])
 * @method \Aws\Result listAssetTypes(array $args = [])
 * @phpstan-method \Aws\Result listAssetTypes(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetTypesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listBlueprints(array $args = [])
 * @phpstan-method \Aws\Result listBlueprints(array{NextToken?: string, MaxResults?: int, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBlueprintsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBlueprintsAsync(array{NextToken?: string, MaxResults?: int, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result listColumnStatisticsTaskRuns(array $args = [])
 * @phpstan-method \Aws\Result listColumnStatisticsTaskRuns(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listColumnStatisticsTaskRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listColumnStatisticsTaskRunsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listConnectionTypes(array $args = [])
 * @phpstan-method \Aws\Result listConnectionTypes(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectionTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectionTypesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listCrawlers(array $args = [])
 * @phpstan-method \Aws\Result listCrawlers(array{MaxResults?: int, NextToken?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCrawlersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCrawlersAsync(array{MaxResults?: int, NextToken?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result listCrawls(array $args = [])
 * @phpstan-method \Aws\Result listCrawls(array{
 *     CrawlerName?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         FieldName?: 'CRAWL_ID'|'DPU_HOUR'|'END_TIME'|'START_TIME'|'STATE',
 *         FilterOperator?: 'EQ'|'GE'|'GT'|'LE'|'LT'|'NE',
 *         FieldValue?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCrawlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCrawlsAsync(array{
 *     CrawlerName?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{
 *         FieldName?: 'CRAWL_ID'|'DPU_HOUR'|'END_TIME'|'START_TIME'|'STATE',
 *         FilterOperator?: 'EQ'|'GE'|'GT'|'LE'|'LT'|'NE',
 *         FieldValue?: string,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCustomEntityTypes(array $args = [])
 * @phpstan-method \Aws\Result listCustomEntityTypes(array{NextToken?: string, MaxResults?: int, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomEntityTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomEntityTypesAsync(array{NextToken?: string, MaxResults?: int, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result listDataQualityResults(array $args = [])
 * @phpstan-method \Aws\Result listDataQualityResults(array{
 *     Filter?: array{
 *         DataSource?: array{GlueTable?: array, DataQualityGlueTable?: array, ...},
 *         JobName?: string,
 *         JobRunId?: string,
 *         StartedAfter?: int|string|\DateTimeInterface,
 *         StartedBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataQualityResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataQualityResultsAsync(array{
 *     Filter?: array{
 *         DataSource?: array{GlueTable?: array, DataQualityGlueTable?: array, ...},
 *         JobName?: string,
 *         JobRunId?: string,
 *         StartedAfter?: int|string|\DateTimeInterface,
 *         StartedBefore?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataQualityRuleRecommendationRuns(array $args = [])
 * @phpstan-method \Aws\Result listDataQualityRuleRecommendationRuns(array{
 *     Filter?: array{
 *         DataSource?: array{GlueTable?: array, DataQualityGlueTable?: array, ...},
 *         StartedBefore?: int|string|\DateTimeInterface,
 *         StartedAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataQualityRuleRecommendationRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataQualityRuleRecommendationRunsAsync(array{
 *     Filter?: array{
 *         DataSource?: array{GlueTable?: array, DataQualityGlueTable?: array, ...},
 *         StartedBefore?: int|string|\DateTimeInterface,
 *         StartedAfter?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataQualityRulesetEvaluationRuns(array $args = [])
 * @phpstan-method \Aws\Result listDataQualityRulesetEvaluationRuns(array{
 *     Filter?: array{
 *         DataSource?: array{GlueTable?: array, DataQualityGlueTable?: array, ...},
 *         StartedBefore?: int|string|\DateTimeInterface,
 *         StartedAfter?: int|string|\DateTimeInterface,
 *         RulesetName?: string,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataQualityRulesetEvaluationRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataQualityRulesetEvaluationRunsAsync(array{
 *     Filter?: array{
 *         DataSource?: array{GlueTable?: array, DataQualityGlueTable?: array, ...},
 *         StartedBefore?: int|string|\DateTimeInterface,
 *         StartedAfter?: int|string|\DateTimeInterface,
 *         RulesetName?: string,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataQualityRulesets(array $args = [])
 * @phpstan-method \Aws\Result listDataQualityRulesets(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         Name?: string,
 *         Description?: string,
 *         CreatedBefore?: int|string|\DateTimeInterface,
 *         CreatedAfter?: int|string|\DateTimeInterface,
 *         LastModifiedBefore?: int|string|\DateTimeInterface,
 *         LastModifiedAfter?: int|string|\DateTimeInterface,
 *         TargetTable?: array{TableName?: string, DatabaseName?: string, CatalogId?: string, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataQualityRulesetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataQualityRulesetsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         Name?: string,
 *         Description?: string,
 *         CreatedBefore?: int|string|\DateTimeInterface,
 *         CreatedAfter?: int|string|\DateTimeInterface,
 *         LastModifiedBefore?: int|string|\DateTimeInterface,
 *         LastModifiedAfter?: int|string|\DateTimeInterface,
 *         TargetTable?: array{TableName?: string, DatabaseName?: string, CatalogId?: string, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataQualityStatisticAnnotations(array $args = [])
 * @phpstan-method \Aws\Result listDataQualityStatisticAnnotations(array{
 *     StatisticId?: string,
 *     ProfileId?: string,
 *     TimestampFilter?: array{RecordedBefore?: int|string|\DateTimeInterface, RecordedAfter?: int|string|\DateTimeInterface, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataQualityStatisticAnnotationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataQualityStatisticAnnotationsAsync(array{
 *     StatisticId?: string,
 *     ProfileId?: string,
 *     TimestampFilter?: array{RecordedBefore?: int|string|\DateTimeInterface, RecordedAfter?: int|string|\DateTimeInterface, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataQualityStatistics(array $args = [])
 * @phpstan-method \Aws\Result listDataQualityStatistics(array{
 *     StatisticId?: string,
 *     ProfileId?: string,
 *     TimestampFilter?: array{RecordedBefore?: int|string|\DateTimeInterface, RecordedAfter?: int|string|\DateTimeInterface, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataQualityStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataQualityStatisticsAsync(array{
 *     StatisticId?: string,
 *     ProfileId?: string,
 *     TimestampFilter?: array{RecordedBefore?: int|string|\DateTimeInterface, RecordedAfter?: int|string|\DateTimeInterface, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDevEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listDevEndpoints(array{NextToken?: string, MaxResults?: int, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevEndpointsAsync(array{NextToken?: string, MaxResults?: int, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result listEntities(array $args = [])
 * @phpstan-method \Aws\Result listEntities(array{
 *     ConnectionName?: string,
 *     CatalogId?: string,
 *     ParentEntityName?: string,
 *     NextToken?: string,
 *     DataStoreApiVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntitiesAsync(array{
 *     ConnectionName?: string,
 *     CatalogId?: string,
 *     ParentEntityName?: string,
 *     NextToken?: string,
 *     DataStoreApiVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFormTypes(array $args = [])
 * @phpstan-method \Aws\Result listFormTypes(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFormTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFormTypesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGlossaries(array $args = [])
 * @phpstan-method \Aws\Result listGlossaries(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGlossariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGlossariesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listGlossaryTerms(array $args = [])
 * @phpstan-method \Aws\Result listGlossaryTerms(array{GlossaryIdentifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGlossaryTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGlossaryTermsAsync(array{GlossaryIdentifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listIntegrationResourceProperties(array $args = [])
 * @phpstan-method \Aws\Result listIntegrationResourceProperties(array{
 *     Marker?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntegrationResourcePropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntegrationResourcePropertiesAsync(array{
 *     Marker?: string,
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxRecords?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIterableForms(array $args = [])
 * @phpstan-method \Aws\Result listIterableForms(array{AssetIdentifier?: string, IterableFormName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIterableFormsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIterableFormsAsync(array{AssetIdentifier?: string, IterableFormName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{NextToken?: string, MaxResults?: int, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{NextToken?: string, MaxResults?: int, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result listMLTransforms(array $args = [])
 * @phpstan-method \Aws\Result listMLTransforms(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         Name?: string,
 *         TransformType?: 'FIND_MATCHES',
 *         Status?: 'DELETING'|'NOT_READY'|'READY',
 *         GlueVersion?: string,
 *         CreatedBefore?: int|string|\DateTimeInterface,
 *         CreatedAfter?: int|string|\DateTimeInterface,
 *         LastModifiedBefore?: int|string|\DateTimeInterface,
 *         LastModifiedAfter?: int|string|\DateTimeInterface,
 *         Schema?: list<array>,
 *         ...,
 *     },
 *     Sort?: array{
 *         Column?: 'CREATED'|'LAST_MODIFIED'|'NAME'|'STATUS'|'TRANSFORM_TYPE',
 *         SortDirection?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMLTransformsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMLTransformsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         Name?: string,
 *         TransformType?: 'FIND_MATCHES',
 *         Status?: 'DELETING'|'NOT_READY'|'READY',
 *         GlueVersion?: string,
 *         CreatedBefore?: int|string|\DateTimeInterface,
 *         CreatedAfter?: int|string|\DateTimeInterface,
 *         LastModifiedBefore?: int|string|\DateTimeInterface,
 *         LastModifiedAfter?: int|string|\DateTimeInterface,
 *         Schema?: list<array>,
 *         ...,
 *     },
 *     Sort?: array{
 *         Column?: 'CREATED'|'LAST_MODIFIED'|'NAME'|'STATUS'|'TRANSFORM_TYPE',
 *         SortDirection?: 'ASCENDING'|'DESCENDING',
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMaterializedViewRefreshTaskRuns(array $args = [])
 * @phpstan-method \Aws\Result listMaterializedViewRefreshTaskRuns(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMaterializedViewRefreshTaskRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMaterializedViewRefreshTaskRunsAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRegistries(array $args = [])
 * @phpstan-method \Aws\Result listRegistries(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegistriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegistriesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSchemaVersions(array $args = [])
 * @phpstan-method \Aws\Result listSchemaVersions(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchemaVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchemaVersionsAsync(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSchemas(array $args = [])
 * @phpstan-method \Aws\Result listSchemas(array{
 *     RegistryId?: array{RegistryName?: string, RegistryArn?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchemasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchemasAsync(array{
 *     RegistryId?: array{RegistryName?: string, RegistryArn?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSessions(array $args = [])
 * @phpstan-method \Aws\Result listSessions(array{NextToken?: string, MaxResults?: int, Tags?: array<string, string>, RequestOrigin?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsAsync(array{NextToken?: string, MaxResults?: int, Tags?: array<string, string>, RequestOrigin?: string, ...} $args = [])
 * @method \Aws\Result listStatements(array $args = [])
 * @phpstan-method \Aws\Result listStatements(array{SessionId?: string, RequestOrigin?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStatementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStatementsAsync(array{SessionId?: string, RequestOrigin?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTableOptimizerRuns(array $args = [])
 * @phpstan-method \Aws\Result listTableOptimizerRuns(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Type?: 'compaction'|'orphan_file_deletion'|'retention',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTableOptimizerRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTableOptimizerRunsAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Type?: 'compaction'|'orphan_file_deletion'|'retention',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTriggers(array $args = [])
 * @phpstan-method \Aws\Result listTriggers(array{NextToken?: string, DependentJobName?: string, MaxResults?: int, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTriggersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTriggersAsync(array{NextToken?: string, DependentJobName?: string, MaxResults?: int, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result listUsageProfiles(array $args = [])
 * @phpstan-method \Aws\Result listUsageProfiles(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsageProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsageProfilesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listWorkflows(array $args = [])
 * @phpstan-method \Aws\Result listWorkflows(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkflowsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result modifyIntegration(array $args = [])
 * @phpstan-method \Aws\Result modifyIntegration(array{
 *     IntegrationIdentifier?: string,
 *     Description?: string,
 *     DataFilter?: string,
 *     IntegrationConfig?: array{RefreshInterval?: string, SourceProperties?: array<string, string>, ContinuousSync?: bool, ...},
 *     IntegrationName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyIntegrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyIntegrationAsync(array{
 *     IntegrationIdentifier?: string,
 *     Description?: string,
 *     DataFilter?: string,
 *     IntegrationConfig?: array{RefreshInterval?: string, SourceProperties?: array<string, string>, ContinuousSync?: bool, ...},
 *     IntegrationName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAsset(array $args = [])
 * @phpstan-method \Aws\Result putAsset(array{
 *     AssetTypeId?: string,
 *     Identifier?: string,
 *     Name?: string,
 *     Description?: string,
 *     Forms?: array<string, array{FormTypeId?: string, Content?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAssetAsync(array{
 *     AssetTypeId?: string,
 *     Identifier?: string,
 *     Name?: string,
 *     Description?: string,
 *     Forms?: array<string, array{FormTypeId?: string, Content?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAssetType(array $args = [])
 * @phpstan-method \Aws\Result putAssetType(array{
 *     Name?: string,
 *     Forms?: array<string, array{FormTypeIdentifier?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAssetTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAssetTypeAsync(array{
 *     Name?: string,
 *     Forms?: array<string, array{FormTypeIdentifier?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAttachment(array $args = [])
 * @phpstan-method \Aws\Result putAttachment(array{
 *     AssetIdentifier?: string,
 *     IterableFormName?: string,
 *     ItemIdentifier?: string,
 *     AttachmentName?: string,
 *     Content?: string,
 *     FormTypeId?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAttachmentAsync(array{
 *     AssetIdentifier?: string,
 *     IterableFormName?: string,
 *     ItemIdentifier?: string,
 *     AttachmentName?: string,
 *     Content?: string,
 *     FormTypeId?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDataCatalogEncryptionSettings(array $args = [])
 * @phpstan-method \Aws\Result putDataCatalogEncryptionSettings(array{
 *     CatalogId?: string,
 *     DataCatalogEncryptionSettings?: array{
 *         EncryptionAtRest?: array{
 *             CatalogEncryptionMode?: 'DISABLED'|'SSE-KMS'|'SSE-KMS-WITH-SERVICE-ROLE',
 *             SseAwsKmsKeyId?: string,
 *             CatalogEncryptionServiceRole?: string,
 *             ...,
 *         },
 *         ConnectionPasswordEncryption?: array{ReturnConnectionPasswordEncrypted?: bool, AwsKmsKeyId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDataCatalogEncryptionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDataCatalogEncryptionSettingsAsync(array{
 *     CatalogId?: string,
 *     DataCatalogEncryptionSettings?: array{
 *         EncryptionAtRest?: array{
 *             CatalogEncryptionMode?: 'DISABLED'|'SSE-KMS'|'SSE-KMS-WITH-SERVICE-ROLE',
 *             SseAwsKmsKeyId?: string,
 *             CatalogEncryptionServiceRole?: string,
 *             ...,
 *         },
 *         ConnectionPasswordEncryption?: array{ReturnConnectionPasswordEncrypted?: bool, AwsKmsKeyId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDataQualityProfileAnnotation(array $args = [])
 * @phpstan-method \Aws\Result putDataQualityProfileAnnotation(array{ProfileId?: string, InclusionAnnotation?: 'EXCLUDE'|'INCLUDE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putDataQualityProfileAnnotationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDataQualityProfileAnnotationAsync(array{ProfileId?: string, InclusionAnnotation?: 'EXCLUDE'|'INCLUDE', ...} $args = [])
 * @method \Aws\Result putFormType(array $args = [])
 * @phpstan-method \Aws\Result putFormType(array{Name?: string, Schema?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putFormTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFormTypeAsync(array{Name?: string, Schema?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{
 *     PolicyInJson?: string,
 *     ResourceArn?: string,
 *     PolicyHashCondition?: string,
 *     PolicyExistsCondition?: 'MUST_EXIST'|'NONE'|'NOT_EXIST',
 *     EnableHybrid?: 'FALSE'|'TRUE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{
 *     PolicyInJson?: string,
 *     ResourceArn?: string,
 *     PolicyHashCondition?: string,
 *     PolicyExistsCondition?: 'MUST_EXIST'|'NONE'|'NOT_EXIST',
 *     EnableHybrid?: 'FALSE'|'TRUE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putSchemaVersionMetadata(array $args = [])
 * @phpstan-method \Aws\Result putSchemaVersionMetadata(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     SchemaVersionId?: string,
 *     MetadataKeyValue?: array{MetadataKey?: string, MetadataValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSchemaVersionMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSchemaVersionMetadataAsync(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     SchemaVersionId?: string,
 *     MetadataKeyValue?: array{MetadataKey?: string, MetadataValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putWorkflowRunProperties(array $args = [])
 * @phpstan-method \Aws\Result putWorkflowRunProperties(array{Name?: string, RunId?: string, RunProperties?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putWorkflowRunPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putWorkflowRunPropertiesAsync(array{Name?: string, RunId?: string, RunProperties?: array<string, string>, ...} $args = [])
 * @method \Aws\Result querySchemaVersionMetadata(array $args = [])
 * @phpstan-method \Aws\Result querySchemaVersionMetadata(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     SchemaVersionId?: string,
 *     MetadataList?: list<array{MetadataKey?: string, MetadataValue?: string, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise querySchemaVersionMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise querySchemaVersionMetadataAsync(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     SchemaVersionId?: string,
 *     MetadataList?: list<array{MetadataKey?: string, MetadataValue?: string, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerConnectionType(array $args = [])
 * @phpstan-method \Aws\Result registerConnectionType(array{
 *     ConnectionType?: string,
 *     IntegrationType?: 'REST',
 *     Description?: string,
 *     ConnectionProperties?: array{
 *         Url?: array{
 *             Name?: string,
 *             KeyOverride?: string,
 *             Required?: bool,
 *             DefaultValue?: string,
 *             AllowedValues?: list<string>,
 *             PropertyLocation?: 'BODY'|'HEADER'|'PATH'|'QUERY_PARAM',
 *             PropertyType?: 'READ_ONLY'|'SECRET'|'SECRET_OR_USER_INPUT'|'UNUSED'|'USER_INPUT',
 *             ...,
 *         },
 *         AdditionalRequestParameters?: list<array>,
 *         ...,
 *     },
 *     ConnectorAuthenticationConfiguration?: array{
 *         AuthenticationTypes?: list<'BASIC'|'CUSTOM'|'IAM'|'OAUTH2'>,
 *         OAuth2Properties?: array{
 *             OAuth2GrantType?: 'AUTHORIZATION_CODE'|'CLIENT_CREDENTIALS'|'JWT_BEARER',
 *             ClientCredentialsProperties?: array,
 *             JWTBearerProperties?: array,
 *             AuthorizationCodeProperties?: array,
 *             ...,
 *         },
 *         BasicAuthenticationProperties?: array{Username?: array, Password?: array, ...},
 *         CustomAuthenticationProperties?: array{AuthenticationParameters?: list<array>, ...},
 *         ...,
 *     },
 *     RestConfiguration?: array{
 *         GlobalSourceConfiguration?: array{
 *             RequestMethod?: 'GET'|'POST',
 *             RequestPath?: string,
 *             RequestParameters?: list<array>,
 *             ResponseConfiguration?: array,
 *             PaginationConfiguration?: array,
 *             ...,
 *         },
 *         ValidationEndpointConfiguration?: array{
 *             RequestMethod?: 'GET'|'POST',
 *             RequestPath?: string,
 *             RequestParameters?: list<array>,
 *             ResponseConfiguration?: array,
 *             PaginationConfiguration?: array,
 *             ...,
 *         },
 *         EntityConfigurations?: array<string, array>,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerConnectionTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerConnectionTypeAsync(array{
 *     ConnectionType?: string,
 *     IntegrationType?: 'REST',
 *     Description?: string,
 *     ConnectionProperties?: array{
 *         Url?: array{
 *             Name?: string,
 *             KeyOverride?: string,
 *             Required?: bool,
 *             DefaultValue?: string,
 *             AllowedValues?: list<string>,
 *             PropertyLocation?: 'BODY'|'HEADER'|'PATH'|'QUERY_PARAM',
 *             PropertyType?: 'READ_ONLY'|'SECRET'|'SECRET_OR_USER_INPUT'|'UNUSED'|'USER_INPUT',
 *             ...,
 *         },
 *         AdditionalRequestParameters?: list<array>,
 *         ...,
 *     },
 *     ConnectorAuthenticationConfiguration?: array{
 *         AuthenticationTypes?: list<'BASIC'|'CUSTOM'|'IAM'|'OAUTH2'>,
 *         OAuth2Properties?: array{
 *             OAuth2GrantType?: 'AUTHORIZATION_CODE'|'CLIENT_CREDENTIALS'|'JWT_BEARER',
 *             ClientCredentialsProperties?: array,
 *             JWTBearerProperties?: array,
 *             AuthorizationCodeProperties?: array,
 *             ...,
 *         },
 *         BasicAuthenticationProperties?: array{Username?: array, Password?: array, ...},
 *         CustomAuthenticationProperties?: array{AuthenticationParameters?: list<array>, ...},
 *         ...,
 *     },
 *     RestConfiguration?: array{
 *         GlobalSourceConfiguration?: array{
 *             RequestMethod?: 'GET'|'POST',
 *             RequestPath?: string,
 *             RequestParameters?: list<array>,
 *             ResponseConfiguration?: array,
 *             PaginationConfiguration?: array,
 *             ...,
 *         },
 *         ValidationEndpointConfiguration?: array{
 *             RequestMethod?: 'GET'|'POST',
 *             RequestPath?: string,
 *             RequestParameters?: list<array>,
 *             ResponseConfiguration?: array,
 *             PaginationConfiguration?: array,
 *             ...,
 *         },
 *         EntityConfigurations?: array<string, array>,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerSchemaVersion(array $args = [])
 * @phpstan-method \Aws\Result registerSchemaVersion(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaDefinition?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerSchemaVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerSchemaVersionAsync(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaDefinition?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeSchemaVersionMetadata(array $args = [])
 * @phpstan-method \Aws\Result removeSchemaVersionMetadata(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     SchemaVersionId?: string,
 *     MetadataKeyValue?: array{MetadataKey?: string, MetadataValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removeSchemaVersionMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeSchemaVersionMetadataAsync(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     SchemaVersionId?: string,
 *     MetadataKeyValue?: array{MetadataKey?: string, MetadataValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result resetJobBookmark(array $args = [])
 * @phpstan-method \Aws\Result resetJobBookmark(array{JobName?: string, RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetJobBookmarkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetJobBookmarkAsync(array{JobName?: string, RunId?: string, ...} $args = [])
 * @method \Aws\Result resumeWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result resumeWorkflowRun(array{Name?: string, RunId?: string, NodeIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeWorkflowRunAsync(array{Name?: string, RunId?: string, NodeIds?: list<string>, ...} $args = [])
 * @method \Aws\Result runStatement(array $args = [])
 * @phpstan-method \Aws\Result runStatement(array{SessionId?: string, Code?: string, RequestOrigin?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise runStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise runStatementAsync(array{SessionId?: string, Code?: string, RequestOrigin?: string, ...} $args = [])
 * @method \Aws\Result searchAssets(array $args = [])
 * @phpstan-method \Aws\Result searchAssets(array{
 *     SearchText?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{Attribute?: string, Order?: 'ASCENDING'|'DESCENDING', ...},
 *     FilterClause?: array{
 *         AndAllFilters?: list<array>,
 *         OrAnyFilters?: list<array>,
 *         AttributeFilter?: array{
 *             Attribute?: string,
 *             Operator?: 'equals'|'greaterThan'|'greaterThanOrEquals'|'lessThan'|'lessThanOrEquals'|'notExists',
 *             Value?: array,
 *             ...,
 *         },
 *         MapFilter?: array{Attribute?: string, Key?: string, Value?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAssetsAsync(array{
 *     SearchText?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{Attribute?: string, Order?: 'ASCENDING'|'DESCENDING', ...},
 *     FilterClause?: array{
 *         AndAllFilters?: list<array>,
 *         OrAnyFilters?: list<array>,
 *         AttributeFilter?: array{
 *             Attribute?: string,
 *             Operator?: 'equals'|'greaterThan'|'greaterThanOrEquals'|'lessThan'|'lessThanOrEquals'|'notExists',
 *             Value?: array,
 *             ...,
 *         },
 *         MapFilter?: array{Attribute?: string, Key?: string, Value?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchTables(array $args = [])
 * @phpstan-method \Aws\Result searchTables(array{
 *     CatalogId?: string,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         Key?: string,
 *         Value?: string,
 *         Comparator?: 'EQUALS'|'GREATER_THAN'|'GREATER_THAN_EQUALS'|'LESS_THAN'|'LESS_THAN_EQUALS',
 *         ...,
 *     }>,
 *     SearchText?: string,
 *     SortCriteria?: list<array{FieldName?: string, Sort?: 'ASC'|'DESC', ...}>,
 *     MaxResults?: int,
 *     ResourceShareType?: 'ALL'|'FEDERATED'|'FOREIGN',
 *     IncludeStatusDetails?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchTablesAsync(array{
 *     CatalogId?: string,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         Key?: string,
 *         Value?: string,
 *         Comparator?: 'EQUALS'|'GREATER_THAN'|'GREATER_THAN_EQUALS'|'LESS_THAN'|'LESS_THAN_EQUALS',
 *         ...,
 *     }>,
 *     SearchText?: string,
 *     SortCriteria?: list<array{FieldName?: string, Sort?: 'ASC'|'DESC', ...}>,
 *     MaxResults?: int,
 *     ResourceShareType?: 'ALL'|'FEDERATED'|'FOREIGN',
 *     IncludeStatusDetails?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startBlueprintRun(array $args = [])
 * @phpstan-method \Aws\Result startBlueprintRun(array{BlueprintName?: string, Parameters?: string, RoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startBlueprintRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBlueprintRunAsync(array{BlueprintName?: string, Parameters?: string, RoleArn?: string, ...} $args = [])
 * @method \Aws\Result startColumnStatisticsTaskRun(array $args = [])
 * @phpstan-method \Aws\Result startColumnStatisticsTaskRun(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     ColumnNameList?: list<string>,
 *     Role?: string,
 *     SampleSize?: float,
 *     CatalogID?: string,
 *     SecurityConfiguration?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startColumnStatisticsTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startColumnStatisticsTaskRunAsync(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     ColumnNameList?: list<string>,
 *     Role?: string,
 *     SampleSize?: float,
 *     CatalogID?: string,
 *     SecurityConfiguration?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startColumnStatisticsTaskRunSchedule(array $args = [])
 * @phpstan-method \Aws\Result startColumnStatisticsTaskRunSchedule(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startColumnStatisticsTaskRunScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startColumnStatisticsTaskRunScheduleAsync(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \Aws\Result startCrawler(array $args = [])
 * @phpstan-method \Aws\Result startCrawler(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCrawlerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCrawlerAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result startCrawlerSchedule(array $args = [])
 * @phpstan-method \Aws\Result startCrawlerSchedule(array{CrawlerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startCrawlerScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCrawlerScheduleAsync(array{CrawlerName?: string, ...} $args = [])
 * @method \Aws\Result startDataQualityRuleRecommendationRun(array $args = [])
 * @phpstan-method \Aws\Result startDataQualityRuleRecommendationRun(array{
 *     DataSource?: array{
 *         GlueTable?: array{
 *             DatabaseName?: string,
 *             TableName?: string,
 *             CatalogId?: string,
 *             ConnectionName?: string,
 *             AdditionalOptions?: array<string, string>,
 *             ...,
 *         },
 *         DataQualityGlueTable?: array{
 *             DatabaseName?: string,
 *             TableName?: string,
 *             CatalogId?: string,
 *             ConnectionName?: string,
 *             AdditionalOptions?: array<string, string>,
 *             PreProcessingQuery?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Role?: string,
 *     NumberOfWorkers?: int,
 *     Timeout?: int,
 *     CreatedRulesetName?: string,
 *     DataQualitySecurityConfiguration?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataQualityRuleRecommendationRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDataQualityRuleRecommendationRunAsync(array{
 *     DataSource?: array{
 *         GlueTable?: array{
 *             DatabaseName?: string,
 *             TableName?: string,
 *             CatalogId?: string,
 *             ConnectionName?: string,
 *             AdditionalOptions?: array<string, string>,
 *             ...,
 *         },
 *         DataQualityGlueTable?: array{
 *             DatabaseName?: string,
 *             TableName?: string,
 *             CatalogId?: string,
 *             ConnectionName?: string,
 *             AdditionalOptions?: array<string, string>,
 *             PreProcessingQuery?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Role?: string,
 *     NumberOfWorkers?: int,
 *     Timeout?: int,
 *     CreatedRulesetName?: string,
 *     DataQualitySecurityConfiguration?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDataQualityRulesetEvaluationRun(array $args = [])
 * @phpstan-method \Aws\Result startDataQualityRulesetEvaluationRun(array{
 *     DataSource?: array{
 *         GlueTable?: array{
 *             DatabaseName?: string,
 *             TableName?: string,
 *             CatalogId?: string,
 *             ConnectionName?: string,
 *             AdditionalOptions?: array<string, string>,
 *             ...,
 *         },
 *         DataQualityGlueTable?: array{
 *             DatabaseName?: string,
 *             TableName?: string,
 *             CatalogId?: string,
 *             ConnectionName?: string,
 *             AdditionalOptions?: array<string, string>,
 *             PreProcessingQuery?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Role?: string,
 *     NumberOfWorkers?: int,
 *     Timeout?: int,
 *     ClientToken?: string,
 *     AdditionalRunOptions?: array{
 *         CloudWatchMetricsEnabled?: bool,
 *         ResultsS3Prefix?: string,
 *         CompositeRuleEvaluationMethod?: 'COLUMN'|'ROW',
 *         CustomLogGroupPrefix?: string,
 *         ...,
 *     },
 *     RulesetNames?: list<string>,
 *     AdditionalDataSources?: array<string, array{GlueTable?: array, DataQualityGlueTable?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataQualityRulesetEvaluationRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDataQualityRulesetEvaluationRunAsync(array{
 *     DataSource?: array{
 *         GlueTable?: array{
 *             DatabaseName?: string,
 *             TableName?: string,
 *             CatalogId?: string,
 *             ConnectionName?: string,
 *             AdditionalOptions?: array<string, string>,
 *             ...,
 *         },
 *         DataQualityGlueTable?: array{
 *             DatabaseName?: string,
 *             TableName?: string,
 *             CatalogId?: string,
 *             ConnectionName?: string,
 *             AdditionalOptions?: array<string, string>,
 *             PreProcessingQuery?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Role?: string,
 *     NumberOfWorkers?: int,
 *     Timeout?: int,
 *     ClientToken?: string,
 *     AdditionalRunOptions?: array{
 *         CloudWatchMetricsEnabled?: bool,
 *         ResultsS3Prefix?: string,
 *         CompositeRuleEvaluationMethod?: 'COLUMN'|'ROW',
 *         CustomLogGroupPrefix?: string,
 *         ...,
 *     },
 *     RulesetNames?: list<string>,
 *     AdditionalDataSources?: array<string, array{GlueTable?: array, DataQualityGlueTable?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startExportLabelsTaskRun(array $args = [])
 * @phpstan-method \Aws\Result startExportLabelsTaskRun(array{TransformId?: string, OutputS3Path?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startExportLabelsTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startExportLabelsTaskRunAsync(array{TransformId?: string, OutputS3Path?: string, ...} $args = [])
 * @method \Aws\Result startImportLabelsTaskRun(array $args = [])
 * @phpstan-method \Aws\Result startImportLabelsTaskRun(array{TransformId?: string, InputS3Path?: string, ReplaceAllLabels?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportLabelsTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImportLabelsTaskRunAsync(array{TransformId?: string, InputS3Path?: string, ReplaceAllLabels?: bool, ...} $args = [])
 * @method \Aws\Result startJobRun(array $args = [])
 * @phpstan-method \Aws\Result startJobRun(array{
 *     JobName?: string,
 *     JobRunQueuingEnabled?: bool,
 *     JobRunId?: string,
 *     Arguments?: array<string, string>,
 *     AllocatedCapacity?: int,
 *     Timeout?: int,
 *     MaxCapacity?: float,
 *     SecurityConfiguration?: string,
 *     NotificationProperty?: array{NotifyDelayAfter?: int, ...},
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     NumberOfWorkers?: int,
 *     ExecutionClass?: 'FLEX'|'STANDARD',
 *     ExecutionRoleSessionPolicy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startJobRunAsync(array{
 *     JobName?: string,
 *     JobRunQueuingEnabled?: bool,
 *     JobRunId?: string,
 *     Arguments?: array<string, string>,
 *     AllocatedCapacity?: int,
 *     Timeout?: int,
 *     MaxCapacity?: float,
 *     SecurityConfiguration?: string,
 *     NotificationProperty?: array{NotifyDelayAfter?: int, ...},
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     NumberOfWorkers?: int,
 *     ExecutionClass?: 'FLEX'|'STANDARD',
 *     ExecutionRoleSessionPolicy?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMLEvaluationTaskRun(array $args = [])
 * @phpstan-method \Aws\Result startMLEvaluationTaskRun(array{TransformId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMLEvaluationTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMLEvaluationTaskRunAsync(array{TransformId?: string, ...} $args = [])
 * @method \Aws\Result startMLLabelingSetGenerationTaskRun(array $args = [])
 * @phpstan-method \Aws\Result startMLLabelingSetGenerationTaskRun(array{TransformId?: string, OutputS3Path?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMLLabelingSetGenerationTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMLLabelingSetGenerationTaskRunAsync(array{TransformId?: string, OutputS3Path?: string, ...} $args = [])
 * @method \Aws\Result startMaterializedViewRefreshTaskRun(array $args = [])
 * @phpstan-method \Aws\Result startMaterializedViewRefreshTaskRun(array{CatalogId?: string, DatabaseName?: string, TableName?: string, FullRefresh?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMaterializedViewRefreshTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMaterializedViewRefreshTaskRunAsync(array{CatalogId?: string, DatabaseName?: string, TableName?: string, FullRefresh?: bool, ...} $args = [])
 * @method \Aws\Result startTrigger(array $args = [])
 * @phpstan-method \Aws\Result startTrigger(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTriggerAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result startWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result startWorkflowRun(array{Name?: string, RunProperties?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startWorkflowRunAsync(array{Name?: string, RunProperties?: array<string, string>, ...} $args = [])
 * @method \Aws\Result stopColumnStatisticsTaskRun(array $args = [])
 * @phpstan-method \Aws\Result stopColumnStatisticsTaskRun(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopColumnStatisticsTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopColumnStatisticsTaskRunAsync(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \Aws\Result stopColumnStatisticsTaskRunSchedule(array $args = [])
 * @phpstan-method \Aws\Result stopColumnStatisticsTaskRunSchedule(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopColumnStatisticsTaskRunScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopColumnStatisticsTaskRunScheduleAsync(array{DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \Aws\Result stopCrawler(array $args = [])
 * @phpstan-method \Aws\Result stopCrawler(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopCrawlerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopCrawlerAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result stopCrawlerSchedule(array $args = [])
 * @phpstan-method \Aws\Result stopCrawlerSchedule(array{CrawlerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopCrawlerScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopCrawlerScheduleAsync(array{CrawlerName?: string, ...} $args = [])
 * @method \Aws\Result stopMaterializedViewRefreshTaskRun(array $args = [])
 * @phpstan-method \Aws\Result stopMaterializedViewRefreshTaskRun(array{CatalogId?: string, DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopMaterializedViewRefreshTaskRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopMaterializedViewRefreshTaskRunAsync(array{CatalogId?: string, DatabaseName?: string, TableName?: string, ...} $args = [])
 * @method \Aws\Result stopSession(array $args = [])
 * @phpstan-method \Aws\Result stopSession(array{Id?: string, RequestOrigin?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopSessionAsync(array{Id?: string, RequestOrigin?: string, ...} $args = [])
 * @method \Aws\Result stopTrigger(array $args = [])
 * @phpstan-method \Aws\Result stopTrigger(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTriggerAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result stopWorkflowRun(array $args = [])
 * @phpstan-method \Aws\Result stopWorkflowRun(array{Name?: string, RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopWorkflowRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopWorkflowRunAsync(array{Name?: string, RunId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, TagsToAdd?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, TagsToAdd?: array<string, string>, ...} $args = [])
 * @method \Aws\Result testConnection(array $args = [])
 * @phpstan-method \Aws\Result testConnection(array{
 *     ConnectionName?: string,
 *     CatalogId?: string,
 *     TestConnectionInput?: array{
 *         ConnectionType?: 'ADOBEANALYTICS'|'ASANA'|'AZURECOSMOS'|'AZURESQL'|'BIGQUERY'|'BLACKBAUD'|'BLACKBAUDRAISEREDGENXT'|'CIRCLECI'|'CLOUDERAHIVE'|'CLOUDERAIMPALA'|'CLOUDWATCH'|'CLOUDWATCHMETRICS'|'CMDB'|'CUSTOM'|'DATADOG'|'DATALAKEGEN2'|'DB2'|'DB2AS400'|'DOCUMENTDB'|'DOCUSIGNMONITOR'|'DOMO'|'DYNAMODB'|'DYNATRACE'|'FACEBOOKADS'|'FACEBOOKPAGEINSIGHTS'|'FRESHDESK'|'FRESHSALES'|'GITLAB'|'GOOGLEADS'|'GOOGLEANALYTICS4'|'GOOGLECLOUDSTORAGE'|'GOOGLESEARCHCONSOLE'|'GOOGLESHEETS'|'HBASE'|'HUBSPOT'|'INSTAGRAMADS'|'INTERCOM'|'JDBC'|'JIRACLOUD'|'KAFKA'|'KUSTOMER'|'LINKEDIN'|'MAILCHIMP'|'MARKETO'|'MARKETPLACE'|'MICROSOFTDYNAMIC365FINANCEANDOPS'|'MICROSOFTDYNAMICS365CRM'|'MICROSOFTTEAMS'|'MIXPANEL'|'MONDAY'|'MONGODB'|'MYSQL'|'NETSUITEERP'|'NETWORK'|'OKTA'|'OPENSEARCH'|'ORACLE'|'PAYPAL'|'PENDO'|'PIPEDIVE'|'PIPEDRIVE'|'POSTGRESQL'|'PRODUCTBOARD'|'QUICKBOOKS'|'SALESFORCE'|'SALESFORCECOMMERCECLOUD'|'SALESFORCEMARKETINGCLOUD'|'SALESFORCEPARDOT'|'SAPCONCUR'|'SAPHANA'|'SAPODATA'|'SENDGRID'|'SERVICENOW'|'SFTP'|'SLACK'|'SMARTSHEET'|'SNAPCHATADS'|'SQLSERVER'|'STRIPE'|'SYNAPSE'|'TERADATA'|'TERADATANOS'|'TIMESTREAM'|'TPCDS'|'TWILIO'|'VERTICA'|'VIEW_VALIDATION_ATHENA'|'VIEW_VALIDATION_REDSHIFT'|'WOOCOMMERCE'|'ZENDESK'|'ZOHOCRM'|'ZOOM',
 *         ConnectionProperties?: array<string, string>,
 *         AuthenticationConfiguration?: array{
 *             AuthenticationType?: 'BASIC'|'CUSTOM'|'IAM'|'OAUTH2',
 *             OAuth2Properties?: array,
 *             SecretArn?: string,
 *             KmsKeyArn?: string,
 *             BasicAuthenticationCredentials?: array,
 *             CustomAuthenticationCredentials?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testConnectionAsync(array{
 *     ConnectionName?: string,
 *     CatalogId?: string,
 *     TestConnectionInput?: array{
 *         ConnectionType?: 'ADOBEANALYTICS'|'ASANA'|'AZURECOSMOS'|'AZURESQL'|'BIGQUERY'|'BLACKBAUD'|'BLACKBAUDRAISEREDGENXT'|'CIRCLECI'|'CLOUDERAHIVE'|'CLOUDERAIMPALA'|'CLOUDWATCH'|'CLOUDWATCHMETRICS'|'CMDB'|'CUSTOM'|'DATADOG'|'DATALAKEGEN2'|'DB2'|'DB2AS400'|'DOCUMENTDB'|'DOCUSIGNMONITOR'|'DOMO'|'DYNAMODB'|'DYNATRACE'|'FACEBOOKADS'|'FACEBOOKPAGEINSIGHTS'|'FRESHDESK'|'FRESHSALES'|'GITLAB'|'GOOGLEADS'|'GOOGLEANALYTICS4'|'GOOGLECLOUDSTORAGE'|'GOOGLESEARCHCONSOLE'|'GOOGLESHEETS'|'HBASE'|'HUBSPOT'|'INSTAGRAMADS'|'INTERCOM'|'JDBC'|'JIRACLOUD'|'KAFKA'|'KUSTOMER'|'LINKEDIN'|'MAILCHIMP'|'MARKETO'|'MARKETPLACE'|'MICROSOFTDYNAMIC365FINANCEANDOPS'|'MICROSOFTDYNAMICS365CRM'|'MICROSOFTTEAMS'|'MIXPANEL'|'MONDAY'|'MONGODB'|'MYSQL'|'NETSUITEERP'|'NETWORK'|'OKTA'|'OPENSEARCH'|'ORACLE'|'PAYPAL'|'PENDO'|'PIPEDIVE'|'PIPEDRIVE'|'POSTGRESQL'|'PRODUCTBOARD'|'QUICKBOOKS'|'SALESFORCE'|'SALESFORCECOMMERCECLOUD'|'SALESFORCEMARKETINGCLOUD'|'SALESFORCEPARDOT'|'SAPCONCUR'|'SAPHANA'|'SAPODATA'|'SENDGRID'|'SERVICENOW'|'SFTP'|'SLACK'|'SMARTSHEET'|'SNAPCHATADS'|'SQLSERVER'|'STRIPE'|'SYNAPSE'|'TERADATA'|'TERADATANOS'|'TIMESTREAM'|'TPCDS'|'TWILIO'|'VERTICA'|'VIEW_VALIDATION_ATHENA'|'VIEW_VALIDATION_REDSHIFT'|'WOOCOMMERCE'|'ZENDESK'|'ZOHOCRM'|'ZOOM',
 *         ConnectionProperties?: array<string, string>,
 *         AuthenticationConfiguration?: array{
 *             AuthenticationType?: 'BASIC'|'CUSTOM'|'IAM'|'OAUTH2',
 *             OAuth2Properties?: array,
 *             SecretArn?: string,
 *             KmsKeyArn?: string,
 *             BasicAuthenticationCredentials?: array,
 *             CustomAuthenticationCredentials?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagsToRemove?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagsToRemove?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAsset(array $args = [])
 * @phpstan-method \Aws\Result updateAsset(array{Identifier?: string, Name?: string, Description?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssetAsync(array{Identifier?: string, Name?: string, Description?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result updateBlueprint(array $args = [])
 * @phpstan-method \Aws\Result updateBlueprint(array{Name?: string, Description?: string, BlueprintLocation?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBlueprintAsync(array{Name?: string, Description?: string, BlueprintLocation?: string, ...} $args = [])
 * @method \Aws\Result updateCatalog(array $args = [])
 * @phpstan-method \Aws\Result updateCatalog(array{
 *     CatalogId?: string,
 *     CatalogInput?: array{
 *         Description?: string,
 *         FederatedCatalog?: array{Identifier?: string, ConnectionName?: string, ConnectionType?: string, ...},
 *         Parameters?: array<string, string>,
 *         TargetRedshiftCatalog?: array{CatalogArn?: string, ...},
 *         CatalogProperties?: array{
 *             DataLakeAccessProperties?: array,
 *             IcebergOptimizationProperties?: array,
 *             CustomProperties?: array<string, string>,
 *             ...,
 *         },
 *         CreateTableDefaultPermissions?: list<array>,
 *         CreateDatabaseDefaultPermissions?: list<array>,
 *         AllowFullTableExternalDataAccess?: 'False'|'True',
 *         OverwriteChildResourcePermissionsWithDefault?: 'Accept'|'Deny',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCatalogAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCatalogAsync(array{
 *     CatalogId?: string,
 *     CatalogInput?: array{
 *         Description?: string,
 *         FederatedCatalog?: array{Identifier?: string, ConnectionName?: string, ConnectionType?: string, ...},
 *         Parameters?: array<string, string>,
 *         TargetRedshiftCatalog?: array{CatalogArn?: string, ...},
 *         CatalogProperties?: array{
 *             DataLakeAccessProperties?: array,
 *             IcebergOptimizationProperties?: array,
 *             CustomProperties?: array<string, string>,
 *             ...,
 *         },
 *         CreateTableDefaultPermissions?: list<array>,
 *         CreateDatabaseDefaultPermissions?: list<array>,
 *         AllowFullTableExternalDataAccess?: 'False'|'True',
 *         OverwriteChildResourcePermissionsWithDefault?: 'Accept'|'Deny',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateClassifier(array $args = [])
 * @phpstan-method \Aws\Result updateClassifier(array{
 *     GrokClassifier?: array{Name?: string, Classification?: string, GrokPattern?: string, CustomPatterns?: string, ...},
 *     XMLClassifier?: array{Name?: string, Classification?: string, RowTag?: string, ...},
 *     JsonClassifier?: array{Name?: string, JsonPath?: string, ...},
 *     CsvClassifier?: array{
 *         Name?: string,
 *         Delimiter?: string,
 *         QuoteSymbol?: string,
 *         ContainsHeader?: 'ABSENT'|'PRESENT'|'UNKNOWN',
 *         Header?: list<string>,
 *         DisableValueTrimming?: bool,
 *         AllowSingleColumn?: bool,
 *         CustomDatatypeConfigured?: bool,
 *         CustomDatatypes?: list<string>,
 *         Serde?: 'LazySimpleSerDe'|'None'|'OpenCSVSerDe',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClassifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClassifierAsync(array{
 *     GrokClassifier?: array{Name?: string, Classification?: string, GrokPattern?: string, CustomPatterns?: string, ...},
 *     XMLClassifier?: array{Name?: string, Classification?: string, RowTag?: string, ...},
 *     JsonClassifier?: array{Name?: string, JsonPath?: string, ...},
 *     CsvClassifier?: array{
 *         Name?: string,
 *         Delimiter?: string,
 *         QuoteSymbol?: string,
 *         ContainsHeader?: 'ABSENT'|'PRESENT'|'UNKNOWN',
 *         Header?: list<string>,
 *         DisableValueTrimming?: bool,
 *         AllowSingleColumn?: bool,
 *         CustomDatatypeConfigured?: bool,
 *         CustomDatatypes?: list<string>,
 *         Serde?: 'LazySimpleSerDe'|'None'|'OpenCSVSerDe',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateColumnStatisticsForPartition(array $args = [])
 * @phpstan-method \Aws\Result updateColumnStatisticsForPartition(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValues?: list<string>,
 *     ColumnStatisticsList?: list<array{
 *         ColumnName?: string,
 *         ColumnType?: string,
 *         AnalyzedTime?: int|string|\DateTimeInterface,
 *         StatisticsData?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateColumnStatisticsForPartitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateColumnStatisticsForPartitionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValues?: list<string>,
 *     ColumnStatisticsList?: list<array{
 *         ColumnName?: string,
 *         ColumnType?: string,
 *         AnalyzedTime?: int|string|\DateTimeInterface,
 *         StatisticsData?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateColumnStatisticsForTable(array $args = [])
 * @phpstan-method \Aws\Result updateColumnStatisticsForTable(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     ColumnStatisticsList?: list<array{
 *         ColumnName?: string,
 *         ColumnType?: string,
 *         AnalyzedTime?: int|string|\DateTimeInterface,
 *         StatisticsData?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateColumnStatisticsForTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateColumnStatisticsForTableAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     ColumnStatisticsList?: list<array{
 *         ColumnName?: string,
 *         ColumnType?: string,
 *         AnalyzedTime?: int|string|\DateTimeInterface,
 *         StatisticsData?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateColumnStatisticsTaskSettings(array $args = [])
 * @phpstan-method \Aws\Result updateColumnStatisticsTaskSettings(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Role?: string,
 *     Schedule?: string,
 *     ColumnNameList?: list<string>,
 *     SampleSize?: float,
 *     CatalogID?: string,
 *     SecurityConfiguration?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateColumnStatisticsTaskSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateColumnStatisticsTaskSettingsAsync(array{
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Role?: string,
 *     Schedule?: string,
 *     ColumnNameList?: list<string>,
 *     SampleSize?: float,
 *     CatalogID?: string,
 *     SecurityConfiguration?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnection(array $args = [])
 * @phpstan-method \Aws\Result updateConnection(array{
 *     CatalogId?: string,
 *     Name?: string,
 *     ConnectionInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         ConnectionType?: 'ADOBEANALYTICS'|'ASANA'|'AZURECOSMOS'|'AZURESQL'|'BIGQUERY'|'BLACKBAUD'|'BLACKBAUDRAISEREDGENXT'|'CIRCLECI'|'CLOUDERAHIVE'|'CLOUDERAIMPALA'|'CLOUDWATCH'|'CLOUDWATCHMETRICS'|'CMDB'|'CUSTOM'|'DATADOG'|'DATALAKEGEN2'|'DB2'|'DB2AS400'|'DOCUMENTDB'|'DOCUSIGNMONITOR'|'DOMO'|'DYNAMODB'|'DYNATRACE'|'FACEBOOKADS'|'FACEBOOKPAGEINSIGHTS'|'FRESHDESK'|'FRESHSALES'|'GITLAB'|'GOOGLEADS'|'GOOGLEANALYTICS4'|'GOOGLECLOUDSTORAGE'|'GOOGLESEARCHCONSOLE'|'GOOGLESHEETS'|'HBASE'|'HUBSPOT'|'INSTAGRAMADS'|'INTERCOM'|'JDBC'|'JIRACLOUD'|'KAFKA'|'KUSTOMER'|'LINKEDIN'|'MAILCHIMP'|'MARKETO'|'MARKETPLACE'|'MICROSOFTDYNAMIC365FINANCEANDOPS'|'MICROSOFTDYNAMICS365CRM'|'MICROSOFTTEAMS'|'MIXPANEL'|'MONDAY'|'MONGODB'|'MYSQL'|'NETSUITEERP'|'NETWORK'|'OKTA'|'OPENSEARCH'|'ORACLE'|'PAYPAL'|'PENDO'|'PIPEDIVE'|'PIPEDRIVE'|'POSTGRESQL'|'PRODUCTBOARD'|'QUICKBOOKS'|'SALESFORCE'|'SALESFORCECOMMERCECLOUD'|'SALESFORCEMARKETINGCLOUD'|'SALESFORCEPARDOT'|'SAPCONCUR'|'SAPHANA'|'SAPODATA'|'SENDGRID'|'SERVICENOW'|'SFTP'|'SLACK'|'SMARTSHEET'|'SNAPCHATADS'|'SQLSERVER'|'STRIPE'|'SYNAPSE'|'TERADATA'|'TERADATANOS'|'TIMESTREAM'|'TPCDS'|'TWILIO'|'VERTICA'|'VIEW_VALIDATION_ATHENA'|'VIEW_VALIDATION_REDSHIFT'|'WOOCOMMERCE'|'ZENDESK'|'ZOHOCRM'|'ZOOM',
 *         MatchCriteria?: list<string>,
 *         ConnectionProperties?: array<string, string>,
 *         SparkProperties?: array<string, string>,
 *         AthenaProperties?: array<string, string>,
 *         PythonProperties?: array<string, string>,
 *         PhysicalConnectionRequirements?: array{SubnetId?: string, SecurityGroupIdList?: list<string>, AvailabilityZone?: string, ...},
 *         AuthenticationConfiguration?: array{
 *             AuthenticationType?: 'BASIC'|'CUSTOM'|'IAM'|'OAUTH2',
 *             OAuth2Properties?: array,
 *             SecretArn?: string,
 *             KmsKeyArn?: string,
 *             BasicAuthenticationCredentials?: array,
 *             CustomAuthenticationCredentials?: array<string, string>,
 *             ...,
 *         },
 *         ValidateCredentials?: bool,
 *         ValidateForComputeEnvironments?: list<'ATHENA'|'PYTHON'|'SPARK'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectionAsync(array{
 *     CatalogId?: string,
 *     Name?: string,
 *     ConnectionInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         ConnectionType?: 'ADOBEANALYTICS'|'ASANA'|'AZURECOSMOS'|'AZURESQL'|'BIGQUERY'|'BLACKBAUD'|'BLACKBAUDRAISEREDGENXT'|'CIRCLECI'|'CLOUDERAHIVE'|'CLOUDERAIMPALA'|'CLOUDWATCH'|'CLOUDWATCHMETRICS'|'CMDB'|'CUSTOM'|'DATADOG'|'DATALAKEGEN2'|'DB2'|'DB2AS400'|'DOCUMENTDB'|'DOCUSIGNMONITOR'|'DOMO'|'DYNAMODB'|'DYNATRACE'|'FACEBOOKADS'|'FACEBOOKPAGEINSIGHTS'|'FRESHDESK'|'FRESHSALES'|'GITLAB'|'GOOGLEADS'|'GOOGLEANALYTICS4'|'GOOGLECLOUDSTORAGE'|'GOOGLESEARCHCONSOLE'|'GOOGLESHEETS'|'HBASE'|'HUBSPOT'|'INSTAGRAMADS'|'INTERCOM'|'JDBC'|'JIRACLOUD'|'KAFKA'|'KUSTOMER'|'LINKEDIN'|'MAILCHIMP'|'MARKETO'|'MARKETPLACE'|'MICROSOFTDYNAMIC365FINANCEANDOPS'|'MICROSOFTDYNAMICS365CRM'|'MICROSOFTTEAMS'|'MIXPANEL'|'MONDAY'|'MONGODB'|'MYSQL'|'NETSUITEERP'|'NETWORK'|'OKTA'|'OPENSEARCH'|'ORACLE'|'PAYPAL'|'PENDO'|'PIPEDIVE'|'PIPEDRIVE'|'POSTGRESQL'|'PRODUCTBOARD'|'QUICKBOOKS'|'SALESFORCE'|'SALESFORCECOMMERCECLOUD'|'SALESFORCEMARKETINGCLOUD'|'SALESFORCEPARDOT'|'SAPCONCUR'|'SAPHANA'|'SAPODATA'|'SENDGRID'|'SERVICENOW'|'SFTP'|'SLACK'|'SMARTSHEET'|'SNAPCHATADS'|'SQLSERVER'|'STRIPE'|'SYNAPSE'|'TERADATA'|'TERADATANOS'|'TIMESTREAM'|'TPCDS'|'TWILIO'|'VERTICA'|'VIEW_VALIDATION_ATHENA'|'VIEW_VALIDATION_REDSHIFT'|'WOOCOMMERCE'|'ZENDESK'|'ZOHOCRM'|'ZOOM',
 *         MatchCriteria?: list<string>,
 *         ConnectionProperties?: array<string, string>,
 *         SparkProperties?: array<string, string>,
 *         AthenaProperties?: array<string, string>,
 *         PythonProperties?: array<string, string>,
 *         PhysicalConnectionRequirements?: array{SubnetId?: string, SecurityGroupIdList?: list<string>, AvailabilityZone?: string, ...},
 *         AuthenticationConfiguration?: array{
 *             AuthenticationType?: 'BASIC'|'CUSTOM'|'IAM'|'OAUTH2',
 *             OAuth2Properties?: array,
 *             SecretArn?: string,
 *             KmsKeyArn?: string,
 *             BasicAuthenticationCredentials?: array,
 *             CustomAuthenticationCredentials?: array<string, string>,
 *             ...,
 *         },
 *         ValidateCredentials?: bool,
 *         ValidateForComputeEnvironments?: list<'ATHENA'|'PYTHON'|'SPARK'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCrawler(array $args = [])
 * @phpstan-method \Aws\Result updateCrawler(array{
 *     Name?: string,
 *     Role?: string,
 *     DatabaseName?: string,
 *     Description?: string,
 *     Targets?: array{
 *         S3Targets?: list<array>,
 *         JdbcTargets?: list<array>,
 *         MongoDBTargets?: list<array>,
 *         DynamoDBTargets?: list<array>,
 *         CatalogTargets?: list<array>,
 *         DeltaTargets?: list<array>,
 *         IcebergTargets?: list<array>,
 *         HudiTargets?: list<array>,
 *         ...,
 *     },
 *     Schedule?: string,
 *     Classifiers?: list<string>,
 *     TablePrefix?: string,
 *     SchemaChangePolicy?: array{
 *         UpdateBehavior?: 'LOG'|'UPDATE_IN_DATABASE',
 *         DeleteBehavior?: 'DELETE_FROM_DATABASE'|'DEPRECATE_IN_DATABASE'|'LOG',
 *         ...,
 *     },
 *     RecrawlPolicy?: array{RecrawlBehavior?: 'CRAWL_EVENT_MODE'|'CRAWL_EVERYTHING'|'CRAWL_NEW_FOLDERS_ONLY', ...},
 *     LineageConfiguration?: array{CrawlerLineageSettings?: 'DISABLE'|'ENABLE', ...},
 *     LakeFormationConfiguration?: array{UseLakeFormationCredentials?: bool, AccountId?: string, ...},
 *     Configuration?: string,
 *     CrawlerSecurityConfiguration?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCrawlerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCrawlerAsync(array{
 *     Name?: string,
 *     Role?: string,
 *     DatabaseName?: string,
 *     Description?: string,
 *     Targets?: array{
 *         S3Targets?: list<array>,
 *         JdbcTargets?: list<array>,
 *         MongoDBTargets?: list<array>,
 *         DynamoDBTargets?: list<array>,
 *         CatalogTargets?: list<array>,
 *         DeltaTargets?: list<array>,
 *         IcebergTargets?: list<array>,
 *         HudiTargets?: list<array>,
 *         ...,
 *     },
 *     Schedule?: string,
 *     Classifiers?: list<string>,
 *     TablePrefix?: string,
 *     SchemaChangePolicy?: array{
 *         UpdateBehavior?: 'LOG'|'UPDATE_IN_DATABASE',
 *         DeleteBehavior?: 'DELETE_FROM_DATABASE'|'DEPRECATE_IN_DATABASE'|'LOG',
 *         ...,
 *     },
 *     RecrawlPolicy?: array{RecrawlBehavior?: 'CRAWL_EVENT_MODE'|'CRAWL_EVERYTHING'|'CRAWL_NEW_FOLDERS_ONLY', ...},
 *     LineageConfiguration?: array{CrawlerLineageSettings?: 'DISABLE'|'ENABLE', ...},
 *     LakeFormationConfiguration?: array{UseLakeFormationCredentials?: bool, AccountId?: string, ...},
 *     Configuration?: string,
 *     CrawlerSecurityConfiguration?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCrawlerSchedule(array $args = [])
 * @phpstan-method \Aws\Result updateCrawlerSchedule(array{CrawlerName?: string, Schedule?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCrawlerScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCrawlerScheduleAsync(array{CrawlerName?: string, Schedule?: string, ...} $args = [])
 * @method \Aws\Result updateDataQualityRuleset(array $args = [])
 * @phpstan-method \Aws\Result updateDataQualityRuleset(array{Name?: string, Description?: string, Ruleset?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataQualityRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataQualityRulesetAsync(array{Name?: string, Description?: string, Ruleset?: string, ...} $args = [])
 * @method \Aws\Result updateDatabase(array $args = [])
 * @phpstan-method \Aws\Result updateDatabase(array{
 *     CatalogId?: string,
 *     Name?: string,
 *     DatabaseInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         LocationUri?: string,
 *         Parameters?: array<string, string>,
 *         CreateTableDefaultPermissions?: list<array>,
 *         TargetDatabase?: array{CatalogId?: string, DatabaseName?: string, Region?: string, ...},
 *         FederatedDatabase?: array{Identifier?: string, ConnectionName?: string, ConnectionType?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDatabaseAsync(array{
 *     CatalogId?: string,
 *     Name?: string,
 *     DatabaseInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         LocationUri?: string,
 *         Parameters?: array<string, string>,
 *         CreateTableDefaultPermissions?: list<array>,
 *         TargetDatabase?: array{CatalogId?: string, DatabaseName?: string, Region?: string, ...},
 *         FederatedDatabase?: array{Identifier?: string, ConnectionName?: string, ConnectionType?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDevEndpoint(array $args = [])
 * @phpstan-method \Aws\Result updateDevEndpoint(array{
 *     EndpointName?: string,
 *     PublicKey?: string,
 *     AddPublicKeys?: list<string>,
 *     DeletePublicKeys?: list<string>,
 *     CustomLibraries?: array{ExtraPythonLibsS3Path?: string, ExtraJarsS3Path?: string, ...},
 *     UpdateEtlLibraries?: bool,
 *     DeleteArguments?: list<string>,
 *     AddArguments?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDevEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDevEndpointAsync(array{
 *     EndpointName?: string,
 *     PublicKey?: string,
 *     AddPublicKeys?: list<string>,
 *     DeletePublicKeys?: list<string>,
 *     CustomLibraries?: array{ExtraPythonLibsS3Path?: string, ExtraJarsS3Path?: string, ...},
 *     UpdateEtlLibraries?: bool,
 *     DeleteArguments?: list<string>,
 *     AddArguments?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGlossary(array $args = [])
 * @phpstan-method \Aws\Result updateGlossary(array{Identifier?: string, Name?: string, Description?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlossaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlossaryAsync(array{Identifier?: string, Name?: string, Description?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result updateGlossaryTerm(array $args = [])
 * @phpstan-method \Aws\Result updateGlossaryTerm(array{
 *     Identifier?: string,
 *     Name?: string,
 *     ShortDescription?: string,
 *     LongDescription?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlossaryTermAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlossaryTermAsync(array{
 *     Identifier?: string,
 *     Name?: string,
 *     ShortDescription?: string,
 *     LongDescription?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGlueIdentityCenterConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateGlueIdentityCenterConfiguration(array{Scopes?: list<string>, UserBackgroundSessionsEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlueIdentityCenterConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlueIdentityCenterConfigurationAsync(array{Scopes?: list<string>, UserBackgroundSessionsEnabled?: bool, ...} $args = [])
 * @method \Aws\Result updateIntegrationResourceProperty(array $args = [])
 * @phpstan-method \Aws\Result updateIntegrationResourceProperty(array{
 *     ResourceArn?: string,
 *     SourceProcessingProperties?: array{RoleArn?: string, ...},
 *     TargetProcessingProperties?: array{RoleArn?: string, KmsArn?: string, ConnectionName?: string, EventBusArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntegrationResourcePropertyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntegrationResourcePropertyAsync(array{
 *     ResourceArn?: string,
 *     SourceProcessingProperties?: array{RoleArn?: string, ...},
 *     TargetProcessingProperties?: array{RoleArn?: string, KmsArn?: string, ConnectionName?: string, EventBusArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIntegrationTableProperties(array $args = [])
 * @phpstan-method \Aws\Result updateIntegrationTableProperties(array{
 *     ResourceArn?: string,
 *     TableName?: string,
 *     SourceTableConfig?: array{
 *         Fields?: list<string>,
 *         FilterPredicate?: string,
 *         PrimaryKey?: list<string>,
 *         RecordUpdateField?: string,
 *         ...,
 *     },
 *     TargetTableConfig?: array{UnnestSpec?: 'FULL'|'NOUNNEST'|'TOPLEVEL', PartitionSpec?: list<array>, TargetTableName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntegrationTablePropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntegrationTablePropertiesAsync(array{
 *     ResourceArn?: string,
 *     TableName?: string,
 *     SourceTableConfig?: array{
 *         Fields?: list<string>,
 *         FilterPredicate?: string,
 *         PrimaryKey?: list<string>,
 *         RecordUpdateField?: string,
 *         ...,
 *     },
 *     TargetTableConfig?: array{UnnestSpec?: 'FULL'|'NOUNNEST'|'TOPLEVEL', PartitionSpec?: list<array>, TargetTableName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateJob(array $args = [])
 * @phpstan-method \Aws\Result updateJob(array{
 *     JobName?: string,
 *     JobUpdate?: array{
 *         JobMode?: 'NOTEBOOK'|'SCRIPT'|'VISUAL',
 *         JobRunQueuingEnabled?: bool,
 *         Description?: string,
 *         LogUri?: string,
 *         Role?: string,
 *         ExecutionProperty?: array{MaxConcurrentRuns?: int, ...},
 *         Command?: array{Name?: string, ScriptLocation?: string, PythonVersion?: string, Runtime?: string, ...},
 *         DefaultArguments?: array<string, string>,
 *         NonOverridableArguments?: array<string, string>,
 *         Connections?: array{Connections?: list<string>, ...},
 *         MaxRetries?: int,
 *         AllocatedCapacity?: int,
 *         Timeout?: int,
 *         MaxCapacity?: float,
 *         WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *         NumberOfWorkers?: int,
 *         SecurityConfiguration?: string,
 *         NotificationProperty?: array{NotifyDelayAfter?: int, ...},
 *         GlueVersion?: string,
 *         CodeGenConfigurationNodes?: array<string, array>,
 *         ExecutionClass?: 'FLEX'|'STANDARD',
 *         SourceControlDetails?: array{
 *             Provider?: 'AWS_CODE_COMMIT'|'BITBUCKET'|'GITHUB'|'GITLAB',
 *             Repository?: string,
 *             Owner?: string,
 *             Branch?: string,
 *             Folder?: string,
 *             LastCommitId?: string,
 *             AuthStrategy?: 'AWS_SECRETS_MANAGER'|'PERSONAL_ACCESS_TOKEN',
 *             AuthToken?: string,
 *             ...,
 *         },
 *         MaintenanceWindow?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobAsync(array{
 *     JobName?: string,
 *     JobUpdate?: array{
 *         JobMode?: 'NOTEBOOK'|'SCRIPT'|'VISUAL',
 *         JobRunQueuingEnabled?: bool,
 *         Description?: string,
 *         LogUri?: string,
 *         Role?: string,
 *         ExecutionProperty?: array{MaxConcurrentRuns?: int, ...},
 *         Command?: array{Name?: string, ScriptLocation?: string, PythonVersion?: string, Runtime?: string, ...},
 *         DefaultArguments?: array<string, string>,
 *         NonOverridableArguments?: array<string, string>,
 *         Connections?: array{Connections?: list<string>, ...},
 *         MaxRetries?: int,
 *         AllocatedCapacity?: int,
 *         Timeout?: int,
 *         MaxCapacity?: float,
 *         WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *         NumberOfWorkers?: int,
 *         SecurityConfiguration?: string,
 *         NotificationProperty?: array{NotifyDelayAfter?: int, ...},
 *         GlueVersion?: string,
 *         CodeGenConfigurationNodes?: array<string, array>,
 *         ExecutionClass?: 'FLEX'|'STANDARD',
 *         SourceControlDetails?: array{
 *             Provider?: 'AWS_CODE_COMMIT'|'BITBUCKET'|'GITHUB'|'GITLAB',
 *             Repository?: string,
 *             Owner?: string,
 *             Branch?: string,
 *             Folder?: string,
 *             LastCommitId?: string,
 *             AuthStrategy?: 'AWS_SECRETS_MANAGER'|'PERSONAL_ACCESS_TOKEN',
 *             AuthToken?: string,
 *             ...,
 *         },
 *         MaintenanceWindow?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateJobFromSourceControl(array $args = [])
 * @phpstan-method \Aws\Result updateJobFromSourceControl(array{
 *     JobName?: string,
 *     Provider?: 'AWS_CODE_COMMIT'|'BITBUCKET'|'GITHUB'|'GITLAB',
 *     RepositoryName?: string,
 *     RepositoryOwner?: string,
 *     BranchName?: string,
 *     Folder?: string,
 *     CommitId?: string,
 *     AuthStrategy?: 'AWS_SECRETS_MANAGER'|'PERSONAL_ACCESS_TOKEN',
 *     AuthToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateJobFromSourceControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobFromSourceControlAsync(array{
 *     JobName?: string,
 *     Provider?: 'AWS_CODE_COMMIT'|'BITBUCKET'|'GITHUB'|'GITLAB',
 *     RepositoryName?: string,
 *     RepositoryOwner?: string,
 *     BranchName?: string,
 *     Folder?: string,
 *     CommitId?: string,
 *     AuthStrategy?: 'AWS_SECRETS_MANAGER'|'PERSONAL_ACCESS_TOKEN',
 *     AuthToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMLTransform(array $args = [])
 * @phpstan-method \Aws\Result updateMLTransform(array{
 *     TransformId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Parameters?: array{
 *         TransformType?: 'FIND_MATCHES',
 *         FindMatchesParameters?: array{
 *             PrimaryKeyColumnName?: string,
 *             PrecisionRecallTradeoff?: float,
 *             AccuracyCostTradeoff?: float,
 *             EnforceProvidedLabels?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Role?: string,
 *     GlueVersion?: string,
 *     MaxCapacity?: float,
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     NumberOfWorkers?: int,
 *     Timeout?: int,
 *     MaxRetries?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMLTransformAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMLTransformAsync(array{
 *     TransformId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Parameters?: array{
 *         TransformType?: 'FIND_MATCHES',
 *         FindMatchesParameters?: array{
 *             PrimaryKeyColumnName?: string,
 *             PrecisionRecallTradeoff?: float,
 *             AccuracyCostTradeoff?: float,
 *             EnforceProvidedLabels?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Role?: string,
 *     GlueVersion?: string,
 *     MaxCapacity?: float,
 *     WorkerType?: 'G.025X'|'G.1X'|'G.2X'|'G.4X'|'G.8X'|'Standard'|'Z.2X',
 *     NumberOfWorkers?: int,
 *     Timeout?: int,
 *     MaxRetries?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePartition(array $args = [])
 * @phpstan-method \Aws\Result updatePartition(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValueList?: list<string>,
 *     PartitionInput?: array{
 *         Values?: list<string>,
 *         LastAccessTime?: int|string|\DateTimeInterface,
 *         StorageDescriptor?: array{
 *             Columns?: list<array>,
 *             Location?: string,
 *             AdditionalLocations?: list<string>,
 *             InputFormat?: string,
 *             OutputFormat?: string,
 *             Compressed?: bool,
 *             NumberOfBuckets?: int,
 *             SerdeInfo?: array,
 *             BucketColumns?: list<string>,
 *             SortColumns?: list<array>,
 *             Parameters?: array<string, string>,
 *             SkewedInfo?: array,
 *             StoredAsSubDirectories?: bool,
 *             SchemaReference?: array,
 *             ...,
 *         },
 *         Parameters?: array<string, string>,
 *         LastAnalyzedTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePartitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePartitionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     PartitionValueList?: list<string>,
 *     PartitionInput?: array{
 *         Values?: list<string>,
 *         LastAccessTime?: int|string|\DateTimeInterface,
 *         StorageDescriptor?: array{
 *             Columns?: list<array>,
 *             Location?: string,
 *             AdditionalLocations?: list<string>,
 *             InputFormat?: string,
 *             OutputFormat?: string,
 *             Compressed?: bool,
 *             NumberOfBuckets?: int,
 *             SerdeInfo?: array,
 *             BucketColumns?: list<string>,
 *             SortColumns?: list<array>,
 *             Parameters?: array<string, string>,
 *             SkewedInfo?: array,
 *             StoredAsSubDirectories?: bool,
 *             SchemaReference?: array,
 *             ...,
 *         },
 *         Parameters?: array<string, string>,
 *         LastAnalyzedTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRegistry(array $args = [])
 * @phpstan-method \Aws\Result updateRegistry(array{RegistryId?: array{RegistryName?: string, RegistryArn?: string, ...}, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegistryAsync(array{RegistryId?: array{RegistryName?: string, RegistryArn?: string, ...}, Description?: string, ...} $args = [])
 * @method \Aws\Result updateSchema(array $args = [])
 * @phpstan-method \Aws\Result updateSchema(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     Compatibility?: 'BACKWARD'|'BACKWARD_ALL'|'DISABLED'|'FORWARD'|'FORWARD_ALL'|'FULL'|'FULL_ALL'|'NONE',
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSchemaAsync(array{
 *     SchemaId?: array{SchemaArn?: string, SchemaName?: string, RegistryName?: string, ...},
 *     SchemaVersionNumber?: array{LatestVersion?: bool, VersionNumber?: int, ...},
 *     Compatibility?: 'BACKWARD'|'BACKWARD_ALL'|'DISABLED'|'FORWARD'|'FORWARD_ALL'|'FULL'|'FULL_ALL'|'NONE',
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSourceControlFromJob(array $args = [])
 * @phpstan-method \Aws\Result updateSourceControlFromJob(array{
 *     JobName?: string,
 *     Provider?: 'AWS_CODE_COMMIT'|'BITBUCKET'|'GITHUB'|'GITLAB',
 *     RepositoryName?: string,
 *     RepositoryOwner?: string,
 *     BranchName?: string,
 *     Folder?: string,
 *     CommitId?: string,
 *     AuthStrategy?: 'AWS_SECRETS_MANAGER'|'PERSONAL_ACCESS_TOKEN',
 *     AuthToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSourceControlFromJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSourceControlFromJobAsync(array{
 *     JobName?: string,
 *     Provider?: 'AWS_CODE_COMMIT'|'BITBUCKET'|'GITHUB'|'GITLAB',
 *     RepositoryName?: string,
 *     RepositoryOwner?: string,
 *     BranchName?: string,
 *     Folder?: string,
 *     CommitId?: string,
 *     AuthStrategy?: 'AWS_SECRETS_MANAGER'|'PERSONAL_ACCESS_TOKEN',
 *     AuthToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTable(array $args = [])
 * @phpstan-method \Aws\Result updateTable(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Name?: string,
 *     TableInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         Owner?: string,
 *         LastAccessTime?: int|string|\DateTimeInterface,
 *         LastAnalyzedTime?: int|string|\DateTimeInterface,
 *         Retention?: int,
 *         StorageDescriptor?: array{
 *             Columns?: list<array>,
 *             Location?: string,
 *             AdditionalLocations?: list<string>,
 *             InputFormat?: string,
 *             OutputFormat?: string,
 *             Compressed?: bool,
 *             NumberOfBuckets?: int,
 *             SerdeInfo?: array,
 *             BucketColumns?: list<string>,
 *             SortColumns?: list<array>,
 *             Parameters?: array<string, string>,
 *             SkewedInfo?: array,
 *             StoredAsSubDirectories?: bool,
 *             SchemaReference?: array,
 *             ...,
 *         },
 *         PartitionKeys?: list<array>,
 *         ViewOriginalText?: string,
 *         ViewExpandedText?: string,
 *         TableType?: string,
 *         Parameters?: array<string, string>,
 *         TargetTable?: array{CatalogId?: string, DatabaseName?: string, Name?: string, Region?: string, ...},
 *         ViewDefinition?: array{
 *             IsProtected?: bool,
 *             Definer?: string,
 *             Representations?: list<array>,
 *             ViewVersionId?: int,
 *             ViewVersionToken?: string,
 *             RefreshSeconds?: int,
 *             LastRefreshType?: 'FULL'|'INCREMENTAL',
 *             SubObjects?: list<string>,
 *             SubObjectVersionIds?: list<int>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SkipArchive?: bool,
 *     TransactionId?: string,
 *     VersionId?: string,
 *     ViewUpdateAction?: 'ADD'|'ADD_OR_REPLACE'|'DROP'|'REPLACE',
 *     Force?: bool,
 *     UpdateOpenTableFormatInput?: array{UpdateIcebergInput?: array{UpdateIcebergTableInput?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTableAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     Name?: string,
 *     TableInput?: array{
 *         Name?: string,
 *         Description?: string,
 *         Owner?: string,
 *         LastAccessTime?: int|string|\DateTimeInterface,
 *         LastAnalyzedTime?: int|string|\DateTimeInterface,
 *         Retention?: int,
 *         StorageDescriptor?: array{
 *             Columns?: list<array>,
 *             Location?: string,
 *             AdditionalLocations?: list<string>,
 *             InputFormat?: string,
 *             OutputFormat?: string,
 *             Compressed?: bool,
 *             NumberOfBuckets?: int,
 *             SerdeInfo?: array,
 *             BucketColumns?: list<string>,
 *             SortColumns?: list<array>,
 *             Parameters?: array<string, string>,
 *             SkewedInfo?: array,
 *             StoredAsSubDirectories?: bool,
 *             SchemaReference?: array,
 *             ...,
 *         },
 *         PartitionKeys?: list<array>,
 *         ViewOriginalText?: string,
 *         ViewExpandedText?: string,
 *         TableType?: string,
 *         Parameters?: array<string, string>,
 *         TargetTable?: array{CatalogId?: string, DatabaseName?: string, Name?: string, Region?: string, ...},
 *         ViewDefinition?: array{
 *             IsProtected?: bool,
 *             Definer?: string,
 *             Representations?: list<array>,
 *             ViewVersionId?: int,
 *             ViewVersionToken?: string,
 *             RefreshSeconds?: int,
 *             LastRefreshType?: 'FULL'|'INCREMENTAL',
 *             SubObjects?: list<string>,
 *             SubObjectVersionIds?: list<int>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     SkipArchive?: bool,
 *     TransactionId?: string,
 *     VersionId?: string,
 *     ViewUpdateAction?: 'ADD'|'ADD_OR_REPLACE'|'DROP'|'REPLACE',
 *     Force?: bool,
 *     UpdateOpenTableFormatInput?: array{UpdateIcebergInput?: array{UpdateIcebergTableInput?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTableOptimizer(array $args = [])
 * @phpstan-method \Aws\Result updateTableOptimizer(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Type?: 'compaction'|'orphan_file_deletion'|'retention',
 *     TableOptimizerConfiguration?: array{
 *         roleArn?: string,
 *         enabled?: bool,
 *         vpcConfiguration?: array{glueConnectionName?: string, ...},
 *         compactionConfiguration?: array{icebergConfiguration?: array, ...},
 *         retentionConfiguration?: array{icebergConfiguration?: array, ...},
 *         orphanFileDeletionConfiguration?: array{icebergConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTableOptimizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTableOptimizerAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     Type?: 'compaction'|'orphan_file_deletion'|'retention',
 *     TableOptimizerConfiguration?: array{
 *         roleArn?: string,
 *         enabled?: bool,
 *         vpcConfiguration?: array{glueConnectionName?: string, ...},
 *         compactionConfiguration?: array{icebergConfiguration?: array, ...},
 *         retentionConfiguration?: array{icebergConfiguration?: array, ...},
 *         orphanFileDeletionConfiguration?: array{icebergConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrigger(array $args = [])
 * @phpstan-method \Aws\Result updateTrigger(array{
 *     Name?: string,
 *     TriggerUpdate?: array{
 *         Name?: string,
 *         Description?: string,
 *         Schedule?: string,
 *         Actions?: list<array>,
 *         Predicate?: array{Logical?: 'AND'|'ANY', Conditions?: list<array>, ...},
 *         EventBatchingCondition?: array{BatchSize?: int, BatchWindow?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTriggerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTriggerAsync(array{
 *     Name?: string,
 *     TriggerUpdate?: array{
 *         Name?: string,
 *         Description?: string,
 *         Schedule?: string,
 *         Actions?: list<array>,
 *         Predicate?: array{Logical?: 'AND'|'ANY', Conditions?: list<array>, ...},
 *         EventBatchingCondition?: array{BatchSize?: int, BatchWindow?: int, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUsageProfile(array $args = [])
 * @phpstan-method \Aws\Result updateUsageProfile(array{
 *     Name?: string,
 *     Description?: string,
 *     Configuration?: array{SessionConfiguration?: array<string, array>, JobConfiguration?: array<string, array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUsageProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUsageProfileAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Configuration?: array{SessionConfiguration?: array<string, array>, JobConfiguration?: array<string, array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserDefinedFunction(array $args = [])
 * @phpstan-method \Aws\Result updateUserDefinedFunction(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     FunctionName?: string,
 *     FunctionInput?: array{
 *         FunctionName?: string,
 *         ClassName?: string,
 *         OwnerName?: string,
 *         FunctionType?: 'AGGREGATE_FUNCTION'|'REGULAR_FUNCTION'|'STORED_PROCEDURE',
 *         OwnerType?: 'GROUP'|'ROLE'|'USER',
 *         ResourceUris?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserDefinedFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserDefinedFunctionAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     FunctionName?: string,
 *     FunctionInput?: array{
 *         FunctionName?: string,
 *         ClassName?: string,
 *         OwnerName?: string,
 *         FunctionType?: 'AGGREGATE_FUNCTION'|'REGULAR_FUNCTION'|'STORED_PROCEDURE',
 *         OwnerType?: 'GROUP'|'ROLE'|'USER',
 *         ResourceUris?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkflow(array $args = [])
 * @phpstan-method \Aws\Result updateWorkflow(array{
 *     Name?: string,
 *     Description?: string,
 *     DefaultRunProperties?: array<string, string>,
 *     MaxConcurrentRuns?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkflowAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     DefaultRunProperties?: array<string, string>,
 *     MaxConcurrentRuns?: int,
 *     ...,
 * } $args = [])
 */
class GlueClient extends AwsClient {}
