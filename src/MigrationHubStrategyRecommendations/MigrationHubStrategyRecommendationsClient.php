<?php
namespace Aws\MigrationHubStrategyRecommendations;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Migration Hub Strategy Recommendations** service.
 * @method \Aws\Result getApplicationComponentDetails(array $args = [])
 * @phpstan-method \Aws\Result getApplicationComponentDetails(array{applicationComponentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationComponentDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationComponentDetailsAsync(array{applicationComponentId?: string, ...} $args = [])
 * @method \Aws\Result getApplicationComponentStrategies(array $args = [])
 * @phpstan-method \Aws\Result getApplicationComponentStrategies(array{applicationComponentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApplicationComponentStrategiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationComponentStrategiesAsync(array{applicationComponentId?: string, ...} $args = [])
 * @method \Aws\Result getAssessment(array $args = [])
 * @phpstan-method \Aws\Result getAssessment(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssessmentAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getImportFileTask(array $args = [])
 * @phpstan-method \Aws\Result getImportFileTask(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImportFileTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImportFileTaskAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getLatestAssessmentId(array $args = [])
 * @phpstan-method \Aws\Result getLatestAssessmentId(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLatestAssessmentIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLatestAssessmentIdAsync(array{...} $args = [])
 * @method \Aws\Result getPortfolioPreferences(array $args = [])
 * @phpstan-method \Aws\Result getPortfolioPreferences(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPortfolioPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPortfolioPreferencesAsync(array{...} $args = [])
 * @method \Aws\Result getPortfolioSummary(array $args = [])
 * @phpstan-method \Aws\Result getPortfolioSummary(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPortfolioSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPortfolioSummaryAsync(array{...} $args = [])
 * @method \Aws\Result getRecommendationReportDetails(array $args = [])
 * @phpstan-method \Aws\Result getRecommendationReportDetails(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendationReportDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationReportDetailsAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getServerDetails(array $args = [])
 * @phpstan-method \Aws\Result getServerDetails(array{maxResults?: int, nextToken?: string, serverId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServerDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServerDetailsAsync(array{maxResults?: int, nextToken?: string, serverId?: string, ...} $args = [])
 * @method \Aws\Result getServerStrategies(array $args = [])
 * @phpstan-method \Aws\Result getServerStrategies(array{serverId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServerStrategiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServerStrategiesAsync(array{serverId?: string, ...} $args = [])
 * @method \Aws\Result listAnalyzableServers(array $args = [])
 * @phpstan-method \Aws\Result listAnalyzableServers(array{maxResults?: int, nextToken?: string, sort?: 'ASC'|'DESC', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnalyzableServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnalyzableServersAsync(array{maxResults?: int, nextToken?: string, sort?: 'ASC'|'DESC', ...} $args = [])
 * @method \Aws\Result listApplicationComponents(array $args = [])
 * @phpstan-method \Aws\Result listApplicationComponents(array{
 *     applicationComponentCriteria?: 'ANALYSIS_STATUS'|'APP_NAME'|'APP_TYPE'|'DESTINATION'|'ERROR_CATEGORY'|'NOT_DEFINED'|'SERVER_ID'|'STRATEGY',
 *     filterValue?: string,
 *     groupIdFilter?: list<array{name?: 'ExternalId'|'ExternalSourceType', value?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sort?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listApplicationComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationComponentsAsync(array{
 *     applicationComponentCriteria?: 'ANALYSIS_STATUS'|'APP_NAME'|'APP_TYPE'|'DESTINATION'|'ERROR_CATEGORY'|'NOT_DEFINED'|'SERVER_ID'|'STRATEGY',
 *     filterValue?: string,
 *     groupIdFilter?: list<array{name?: 'ExternalId'|'ExternalSourceType', value?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sort?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCollectors(array $args = [])
 * @phpstan-method \Aws\Result listCollectors(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollectorsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listImportFileTask(array $args = [])
 * @phpstan-method \Aws\Result listImportFileTask(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportFileTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportFileTaskAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listServers(array $args = [])
 * @phpstan-method \Aws\Result listServers(array{
 *     filterValue?: string,
 *     groupIdFilter?: list<array{name?: 'ExternalId'|'ExternalSourceType', value?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     serverCriteria?: 'ANALYSIS_STATUS'|'DESTINATION'|'ERROR_CATEGORY'|'NOT_DEFINED'|'OS_NAME'|'SERVER_ID'|'STRATEGY',
 *     sort?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServersAsync(array{
 *     filterValue?: string,
 *     groupIdFilter?: list<array{name?: 'ExternalId'|'ExternalSourceType', value?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     serverCriteria?: 'ANALYSIS_STATUS'|'DESTINATION'|'ERROR_CATEGORY'|'NOT_DEFINED'|'OS_NAME'|'SERVER_ID'|'STRATEGY',
 *     sort?: 'ASC'|'DESC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putPortfolioPreferences(array $args = [])
 * @phpstan-method \Aws\Result putPortfolioPreferences(array{
 *     applicationMode?: 'ALL'|'KNOWN'|'UNKNOWN',
 *     applicationPreferences?: array{
 *         managementPreference?: array{awsManagedResources?: array, noPreference?: array, selfManageResources?: array, ...},
 *         ...,
 *     },
 *     databasePreferences?: array{
 *         databaseManagementPreference?: 'AWS-managed'|'No preference'|'Self-manage',
 *         databaseMigrationPreference?: array{heterogeneous?: array, homogeneous?: array, noPreference?: array, ...},
 *         ...,
 *     },
 *     prioritizeBusinessGoals?: array{
 *         businessGoals?: array{
 *             licenseCostReduction?: int,
 *             modernizeInfrastructureWithCloudNativeTechnologies?: int,
 *             reduceOperationalOverheadWithManagedServices?: int,
 *             speedOfMigration?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putPortfolioPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPortfolioPreferencesAsync(array{
 *     applicationMode?: 'ALL'|'KNOWN'|'UNKNOWN',
 *     applicationPreferences?: array{
 *         managementPreference?: array{awsManagedResources?: array, noPreference?: array, selfManageResources?: array, ...},
 *         ...,
 *     },
 *     databasePreferences?: array{
 *         databaseManagementPreference?: 'AWS-managed'|'No preference'|'Self-manage',
 *         databaseMigrationPreference?: array{heterogeneous?: array, homogeneous?: array, noPreference?: array, ...},
 *         ...,
 *     },
 *     prioritizeBusinessGoals?: array{
 *         businessGoals?: array{
 *             licenseCostReduction?: int,
 *             modernizeInfrastructureWithCloudNativeTechnologies?: int,
 *             reduceOperationalOverheadWithManagedServices?: int,
 *             speedOfMigration?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAssessment(array $args = [])
 * @phpstan-method \Aws\Result startAssessment(array{
 *     assessmentDataSourceType?: 'ApplicationDiscoveryService'|'ManualImport'|'StrategyRecommendationsApplicationDataCollector',
 *     assessmentTargets?: list<array{condition?: 'CONTAINS'|'EQUALS'|'NOT_CONTAINS'|'NOT_EQUALS', name?: string, values?: list<string>, ...}>,
 *     s3bucketForAnalysisData?: string,
 *     s3bucketForReportData?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAssessmentAsync(array{
 *     assessmentDataSourceType?: 'ApplicationDiscoveryService'|'ManualImport'|'StrategyRecommendationsApplicationDataCollector',
 *     assessmentTargets?: list<array{condition?: 'CONTAINS'|'EQUALS'|'NOT_CONTAINS'|'NOT_EQUALS', name?: string, values?: list<string>, ...}>,
 *     s3bucketForAnalysisData?: string,
 *     s3bucketForReportData?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startImportFileTask(array $args = [])
 * @phpstan-method \Aws\Result startImportFileTask(array{
 *     S3Bucket?: string,
 *     dataSourceType?: 'ApplicationDiscoveryService'|'Import'|'MPA'|'StrategyRecommendationsApplicationDataCollector',
 *     groupId?: list<array{name?: 'ExternalId'|'ExternalSourceType', value?: string, ...}>,
 *     name?: string,
 *     s3bucketForReportData?: string,
 *     s3key?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportFileTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImportFileTaskAsync(array{
 *     S3Bucket?: string,
 *     dataSourceType?: 'ApplicationDiscoveryService'|'Import'|'MPA'|'StrategyRecommendationsApplicationDataCollector',
 *     groupId?: list<array{name?: 'ExternalId'|'ExternalSourceType', value?: string, ...}>,
 *     name?: string,
 *     s3bucketForReportData?: string,
 *     s3key?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startRecommendationReportGeneration(array $args = [])
 * @phpstan-method \Aws\Result startRecommendationReportGeneration(array{
 *     groupIdFilter?: list<array{name?: 'ExternalId'|'ExternalSourceType', value?: string, ...}>,
 *     outputFormat?: 'Excel'|'Json',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startRecommendationReportGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRecommendationReportGenerationAsync(array{
 *     groupIdFilter?: list<array{name?: 'ExternalId'|'ExternalSourceType', value?: string, ...}>,
 *     outputFormat?: 'Excel'|'Json',
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopAssessment(array $args = [])
 * @phpstan-method \Aws\Result stopAssessment(array{assessmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAssessmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAssessmentAsync(array{assessmentId?: string, ...} $args = [])
 * @method \Aws\Result updateApplicationComponentConfig(array $args = [])
 * @phpstan-method \Aws\Result updateApplicationComponentConfig(array{
 *     appType?: 'Cassandra'|'DB2'|'DotNetFramework'|'Dotnet'|'DotnetCore'|'IBM WebSphere'|'IIS'|'JBoss'|'Java'|'Maria DB'|'Mongo DB'|'MySQL'|'Oracle'|'Oracle WebLogic'|'Other'|'PostgreSQLServer'|'SQLServer'|'Spring'|'Sybase'|'Tomcat'|'Unknown'|'Visual Basic',
 *     applicationComponentId?: string,
 *     configureOnly?: bool,
 *     inclusionStatus?: 'excludeFromAssessment'|'includeInAssessment',
 *     secretsManagerKey?: string,
 *     sourceCodeList?: list<array{
 *         location?: string,
 *         projectName?: string,
 *         sourceVersion?: string,
 *         versionControl?: 'AZURE_DEVOPS_GIT'|'GITHUB'|'GITHUB_ENTERPRISE',
 *         ...,
 *     }>,
 *     strategyOption?: array{
 *         isPreferred?: bool,
 *         strategy?: 'Refactor'|'Rehost'|'Relocate'|'Replatform'|'Repurchase'|'Retain'|'Retirement',
 *         targetDestination?: 'AWS Elastic BeanStalk'|'AWS Fargate'|'Amazon DocumentDB'|'Amazon DynamoDB'|'Amazon Elastic Cloud Compute (EC2)'|'Amazon Elastic Container Service (ECS)'|'Amazon Elastic Kubernetes Service (EKS)'|'Amazon Relational Database Service'|'Amazon Relational Database Service on MySQL'|'Amazon Relational Database Service on PostgreSQL'|'Aurora MySQL'|'Aurora PostgreSQL'|'Babelfish for Aurora PostgreSQL'|'None specified',
 *         toolName?: 'App2Container'|'Application Migration Service'|'Database Migration Service'|'End of Support Migration'|'In Place Operating System Upgrade'|'Native SQL Server Backup/Restore'|'Porting Assistant For .NET'|'Schema Conversion Tool'|'Strategy Recommendation Support'|'Windows Web Application Migration Assistant',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApplicationComponentConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationComponentConfigAsync(array{
 *     appType?: 'Cassandra'|'DB2'|'DotNetFramework'|'Dotnet'|'DotnetCore'|'IBM WebSphere'|'IIS'|'JBoss'|'Java'|'Maria DB'|'Mongo DB'|'MySQL'|'Oracle'|'Oracle WebLogic'|'Other'|'PostgreSQLServer'|'SQLServer'|'Spring'|'Sybase'|'Tomcat'|'Unknown'|'Visual Basic',
 *     applicationComponentId?: string,
 *     configureOnly?: bool,
 *     inclusionStatus?: 'excludeFromAssessment'|'includeInAssessment',
 *     secretsManagerKey?: string,
 *     sourceCodeList?: list<array{
 *         location?: string,
 *         projectName?: string,
 *         sourceVersion?: string,
 *         versionControl?: 'AZURE_DEVOPS_GIT'|'GITHUB'|'GITHUB_ENTERPRISE',
 *         ...,
 *     }>,
 *     strategyOption?: array{
 *         isPreferred?: bool,
 *         strategy?: 'Refactor'|'Rehost'|'Relocate'|'Replatform'|'Repurchase'|'Retain'|'Retirement',
 *         targetDestination?: 'AWS Elastic BeanStalk'|'AWS Fargate'|'Amazon DocumentDB'|'Amazon DynamoDB'|'Amazon Elastic Cloud Compute (EC2)'|'Amazon Elastic Container Service (ECS)'|'Amazon Elastic Kubernetes Service (EKS)'|'Amazon Relational Database Service'|'Amazon Relational Database Service on MySQL'|'Amazon Relational Database Service on PostgreSQL'|'Aurora MySQL'|'Aurora PostgreSQL'|'Babelfish for Aurora PostgreSQL'|'None specified',
 *         toolName?: 'App2Container'|'Application Migration Service'|'Database Migration Service'|'End of Support Migration'|'In Place Operating System Upgrade'|'Native SQL Server Backup/Restore'|'Porting Assistant For .NET'|'Schema Conversion Tool'|'Strategy Recommendation Support'|'Windows Web Application Migration Assistant',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServerConfig(array $args = [])
 * @phpstan-method \Aws\Result updateServerConfig(array{
 *     serverId?: string,
 *     strategyOption?: array{
 *         isPreferred?: bool,
 *         strategy?: 'Refactor'|'Rehost'|'Relocate'|'Replatform'|'Repurchase'|'Retain'|'Retirement',
 *         targetDestination?: 'AWS Elastic BeanStalk'|'AWS Fargate'|'Amazon DocumentDB'|'Amazon DynamoDB'|'Amazon Elastic Cloud Compute (EC2)'|'Amazon Elastic Container Service (ECS)'|'Amazon Elastic Kubernetes Service (EKS)'|'Amazon Relational Database Service'|'Amazon Relational Database Service on MySQL'|'Amazon Relational Database Service on PostgreSQL'|'Aurora MySQL'|'Aurora PostgreSQL'|'Babelfish for Aurora PostgreSQL'|'None specified',
 *         toolName?: 'App2Container'|'Application Migration Service'|'Database Migration Service'|'End of Support Migration'|'In Place Operating System Upgrade'|'Native SQL Server Backup/Restore'|'Porting Assistant For .NET'|'Schema Conversion Tool'|'Strategy Recommendation Support'|'Windows Web Application Migration Assistant',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServerConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServerConfigAsync(array{
 *     serverId?: string,
 *     strategyOption?: array{
 *         isPreferred?: bool,
 *         strategy?: 'Refactor'|'Rehost'|'Relocate'|'Replatform'|'Repurchase'|'Retain'|'Retirement',
 *         targetDestination?: 'AWS Elastic BeanStalk'|'AWS Fargate'|'Amazon DocumentDB'|'Amazon DynamoDB'|'Amazon Elastic Cloud Compute (EC2)'|'Amazon Elastic Container Service (ECS)'|'Amazon Elastic Kubernetes Service (EKS)'|'Amazon Relational Database Service'|'Amazon Relational Database Service on MySQL'|'Amazon Relational Database Service on PostgreSQL'|'Aurora MySQL'|'Aurora PostgreSQL'|'Babelfish for Aurora PostgreSQL'|'None specified',
 *         toolName?: 'App2Container'|'Application Migration Service'|'Database Migration Service'|'End of Support Migration'|'In Place Operating System Upgrade'|'Native SQL Server Backup/Restore'|'Porting Assistant For .NET'|'Schema Conversion Tool'|'Strategy Recommendation Support'|'Windows Web Application Migration Assistant',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class MigrationHubStrategyRecommendationsClient extends AwsClient {}
