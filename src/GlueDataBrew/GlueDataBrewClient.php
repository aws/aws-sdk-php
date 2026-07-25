<?php
namespace Aws\GlueDataBrew;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Glue DataBrew** service.
 * @method \Aws\Result batchDeleteRecipeVersion(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteRecipeVersion(array{Name?: string, RecipeVersions?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteRecipeVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteRecipeVersionAsync(array{Name?: string, RecipeVersions?: list<string>, ...} $args = [])
 * @method \Aws\Result createDataset(array $args = [])
 * @phpstan-method \Aws\Result createDataset(array{
 *     Name?: string,
 *     Format?: 'CSV'|'EXCEL'|'JSON'|'ORC'|'PARQUET',
 *     FormatOptions?: array{
 *         Json?: array{MultiLine?: bool, ...},
 *         Excel?: array{SheetNames?: list<string>, SheetIndexes?: list<int>, HeaderRow?: bool, ...},
 *         Csv?: array{Delimiter?: string, HeaderRow?: bool, ...},
 *         ...,
 *     },
 *     Input?: array{
 *         S3InputDefinition?: array{Bucket?: string, Key?: string, BucketOwner?: string, ...},
 *         DataCatalogInputDefinition?: array{CatalogId?: string, DatabaseName?: string, TableName?: string, TempDirectory?: array, ...},
 *         DatabaseInputDefinition?: array{
 *             GlueConnectionName?: string,
 *             DatabaseTableName?: string,
 *             TempDirectory?: array,
 *             QueryString?: string,
 *             ...,
 *         },
 *         Metadata?: array{SourceArn?: string, ...},
 *         ...,
 *     },
 *     PathOptions?: array{
 *         LastModifiedDateCondition?: array{Expression?: string, ValuesMap?: array<string, string>, ...},
 *         FilesLimit?: array{MaxFiles?: int, OrderedBy?: 'LAST_MODIFIED_DATE', Order?: 'ASCENDING'|'DESCENDING', ...},
 *         Parameters?: array<string, array>,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetAsync(array{
 *     Name?: string,
 *     Format?: 'CSV'|'EXCEL'|'JSON'|'ORC'|'PARQUET',
 *     FormatOptions?: array{
 *         Json?: array{MultiLine?: bool, ...},
 *         Excel?: array{SheetNames?: list<string>, SheetIndexes?: list<int>, HeaderRow?: bool, ...},
 *         Csv?: array{Delimiter?: string, HeaderRow?: bool, ...},
 *         ...,
 *     },
 *     Input?: array{
 *         S3InputDefinition?: array{Bucket?: string, Key?: string, BucketOwner?: string, ...},
 *         DataCatalogInputDefinition?: array{CatalogId?: string, DatabaseName?: string, TableName?: string, TempDirectory?: array, ...},
 *         DatabaseInputDefinition?: array{
 *             GlueConnectionName?: string,
 *             DatabaseTableName?: string,
 *             TempDirectory?: array,
 *             QueryString?: string,
 *             ...,
 *         },
 *         Metadata?: array{SourceArn?: string, ...},
 *         ...,
 *     },
 *     PathOptions?: array{
 *         LastModifiedDateCondition?: array{Expression?: string, ValuesMap?: array<string, string>, ...},
 *         FilesLimit?: array{MaxFiles?: int, OrderedBy?: 'LAST_MODIFIED_DATE', Order?: 'ASCENDING'|'DESCENDING', ...},
 *         Parameters?: array<string, array>,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProfileJob(array $args = [])
 * @phpstan-method \Aws\Result createProfileJob(array{
 *     DatasetName?: string,
 *     EncryptionKeyArn?: string,
 *     EncryptionMode?: 'SSE-KMS'|'SSE-S3',
 *     Name?: string,
 *     LogSubscription?: 'DISABLE'|'ENABLE',
 *     MaxCapacity?: int,
 *     MaxRetries?: int,
 *     OutputLocation?: array{Bucket?: string, Key?: string, BucketOwner?: string, ...},
 *     Configuration?: array{
 *         DatasetStatisticsConfiguration?: array{IncludedStatistics?: list<string>, Overrides?: list<array>, ...},
 *         ProfileColumns?: list<array>,
 *         ColumnStatisticsConfigurations?: list<array>,
 *         EntityDetectorConfiguration?: array{EntityTypes?: list<string>, AllowedStatistics?: list<array>, ...},
 *         ...,
 *     },
 *     ValidationConfigurations?: list<array{RulesetArn?: string, ValidationMode?: 'CHECK_ALL', ...}>,
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     Timeout?: int,
 *     JobSample?: array{Mode?: 'CUSTOM_ROWS'|'FULL_DATASET', Size?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProfileJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProfileJobAsync(array{
 *     DatasetName?: string,
 *     EncryptionKeyArn?: string,
 *     EncryptionMode?: 'SSE-KMS'|'SSE-S3',
 *     Name?: string,
 *     LogSubscription?: 'DISABLE'|'ENABLE',
 *     MaxCapacity?: int,
 *     MaxRetries?: int,
 *     OutputLocation?: array{Bucket?: string, Key?: string, BucketOwner?: string, ...},
 *     Configuration?: array{
 *         DatasetStatisticsConfiguration?: array{IncludedStatistics?: list<string>, Overrides?: list<array>, ...},
 *         ProfileColumns?: list<array>,
 *         ColumnStatisticsConfigurations?: list<array>,
 *         EntityDetectorConfiguration?: array{EntityTypes?: list<string>, AllowedStatistics?: list<array>, ...},
 *         ...,
 *     },
 *     ValidationConfigurations?: list<array{RulesetArn?: string, ValidationMode?: 'CHECK_ALL', ...}>,
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     Timeout?: int,
 *     JobSample?: array{Mode?: 'CUSTOM_ROWS'|'FULL_DATASET', Size?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @phpstan-method \Aws\Result createProject(array{
 *     DatasetName?: string,
 *     Name?: string,
 *     RecipeName?: string,
 *     Sample?: array{Size?: int, Type?: 'FIRST_N'|'LAST_N'|'RANDOM', ...},
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProjectAsync(array{
 *     DatasetName?: string,
 *     Name?: string,
 *     RecipeName?: string,
 *     Sample?: array{Size?: int, Type?: 'FIRST_N'|'LAST_N'|'RANDOM', ...},
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRecipe(array $args = [])
 * @phpstan-method \Aws\Result createRecipe(array{
 *     Description?: string,
 *     Name?: string,
 *     Steps?: list<array{Action?: array, ConditionExpressions?: list<array>, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRecipeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRecipeAsync(array{
 *     Description?: string,
 *     Name?: string,
 *     Steps?: list<array{Action?: array, ConditionExpressions?: list<array>, ...}>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRecipeJob(array $args = [])
 * @phpstan-method \Aws\Result createRecipeJob(array{
 *     DatasetName?: string,
 *     EncryptionKeyArn?: string,
 *     EncryptionMode?: 'SSE-KMS'|'SSE-S3',
 *     Name?: string,
 *     LogSubscription?: 'DISABLE'|'ENABLE',
 *     MaxCapacity?: int,
 *     MaxRetries?: int,
 *     Outputs?: list<array{
 *         CompressionFormat?: 'BROTLI'|'BZIP2'|'DEFLATE'|'GZIP'|'LZ4'|'LZO'|'SNAPPY'|'ZLIB'|'ZSTD',
 *         Format?: 'AVRO'|'CSV'|'GLUEPARQUET'|'JSON'|'ORC'|'PARQUET'|'TABLEAUHYPER'|'XML',
 *         PartitionColumns?: list<string>,
 *         Location?: array,
 *         Overwrite?: bool,
 *         FormatOptions?: array,
 *         MaxOutputFiles?: int,
 *         ...,
 *     }>,
 *     DataCatalogOutputs?: list<array{
 *         CatalogId?: string,
 *         DatabaseName?: string,
 *         TableName?: string,
 *         S3Options?: array,
 *         DatabaseOptions?: array,
 *         Overwrite?: bool,
 *         ...,
 *     }>,
 *     DatabaseOutputs?: list<array{GlueConnectionName?: string, DatabaseOptions?: array, DatabaseOutputMode?: 'NEW_TABLE', ...}>,
 *     ProjectName?: string,
 *     RecipeReference?: array{Name?: string, RecipeVersion?: string, ...},
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     Timeout?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRecipeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRecipeJobAsync(array{
 *     DatasetName?: string,
 *     EncryptionKeyArn?: string,
 *     EncryptionMode?: 'SSE-KMS'|'SSE-S3',
 *     Name?: string,
 *     LogSubscription?: 'DISABLE'|'ENABLE',
 *     MaxCapacity?: int,
 *     MaxRetries?: int,
 *     Outputs?: list<array{
 *         CompressionFormat?: 'BROTLI'|'BZIP2'|'DEFLATE'|'GZIP'|'LZ4'|'LZO'|'SNAPPY'|'ZLIB'|'ZSTD',
 *         Format?: 'AVRO'|'CSV'|'GLUEPARQUET'|'JSON'|'ORC'|'PARQUET'|'TABLEAUHYPER'|'XML',
 *         PartitionColumns?: list<string>,
 *         Location?: array,
 *         Overwrite?: bool,
 *         FormatOptions?: array,
 *         MaxOutputFiles?: int,
 *         ...,
 *     }>,
 *     DataCatalogOutputs?: list<array{
 *         CatalogId?: string,
 *         DatabaseName?: string,
 *         TableName?: string,
 *         S3Options?: array,
 *         DatabaseOptions?: array,
 *         Overwrite?: bool,
 *         ...,
 *     }>,
 *     DatabaseOutputs?: list<array{GlueConnectionName?: string, DatabaseOptions?: array, DatabaseOutputMode?: 'NEW_TABLE', ...}>,
 *     ProjectName?: string,
 *     RecipeReference?: array{Name?: string, RecipeVersion?: string, ...},
 *     RoleArn?: string,
 *     Tags?: array<string, string>,
 *     Timeout?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRuleset(array $args = [])
 * @phpstan-method \Aws\Result createRuleset(array{
 *     Name?: string,
 *     Description?: string,
 *     TargetArn?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Disabled?: bool,
 *         CheckExpression?: string,
 *         SubstitutionMap?: array<string, string>,
 *         Threshold?: array,
 *         ColumnSelectors?: list<array>,
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRulesetAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     TargetArn?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Disabled?: bool,
 *         CheckExpression?: string,
 *         SubstitutionMap?: array<string, string>,
 *         Threshold?: array,
 *         ColumnSelectors?: list<array>,
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSchedule(array $args = [])
 * @phpstan-method \Aws\Result createSchedule(array{JobNames?: list<string>, CronExpression?: string, Tags?: array<string, string>, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduleAsync(array{JobNames?: list<string>, CronExpression?: string, Tags?: array<string, string>, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @phpstan-method \Aws\Result deleteDataset(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteJob(array $args = [])
 * @phpstan-method \Aws\Result deleteJob(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteProject(array $args = [])
 * @phpstan-method \Aws\Result deleteProject(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteRecipeVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteRecipeVersion(array{Name?: string, RecipeVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecipeVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecipeVersionAsync(array{Name?: string, RecipeVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteRuleset(array $args = [])
 * @phpstan-method \Aws\Result deleteRuleset(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRulesetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteSchedule(array $args = [])
 * @phpstan-method \Aws\Result deleteSchedule(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduleAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @phpstan-method \Aws\Result describeDataset(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDatasetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeJob(array $args = [])
 * @phpstan-method \Aws\Result describeJob(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeJobRun(array $args = [])
 * @phpstan-method \Aws\Result describeJobRun(array{Name?: string, RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobRunAsync(array{Name?: string, RunId?: string, ...} $args = [])
 * @method \Aws\Result describeProject(array $args = [])
 * @phpstan-method \Aws\Result describeProject(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProjectAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeRecipe(array $args = [])
 * @phpstan-method \Aws\Result describeRecipe(array{Name?: string, RecipeVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRecipeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRecipeAsync(array{Name?: string, RecipeVersion?: string, ...} $args = [])
 * @method \Aws\Result describeRuleset(array $args = [])
 * @phpstan-method \Aws\Result describeRuleset(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRulesetAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result describeSchedule(array $args = [])
 * @phpstan-method \Aws\Result describeSchedule(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScheduleAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @phpstan-method \Aws\Result listDatasets(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listJobRuns(array $args = [])
 * @phpstan-method \Aws\Result listJobRuns(array{Name?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobRunsAsync(array{Name?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{DatasetName?: string, MaxResults?: int, NextToken?: string, ProjectName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{DatasetName?: string, MaxResults?: int, NextToken?: string, ProjectName?: string, ...} $args = [])
 * @method \Aws\Result listProjects(array $args = [])
 * @phpstan-method \Aws\Result listProjects(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProjectsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRecipeVersions(array $args = [])
 * @phpstan-method \Aws\Result listRecipeVersions(array{MaxResults?: int, NextToken?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecipeVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecipeVersionsAsync(array{MaxResults?: int, NextToken?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result listRecipes(array $args = [])
 * @phpstan-method \Aws\Result listRecipes(array{MaxResults?: int, NextToken?: string, RecipeVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecipesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecipesAsync(array{MaxResults?: int, NextToken?: string, RecipeVersion?: string, ...} $args = [])
 * @method \Aws\Result listRulesets(array $args = [])
 * @phpstan-method \Aws\Result listRulesets(array{TargetArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRulesetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRulesetsAsync(array{TargetArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSchedules(array $args = [])
 * @phpstan-method \Aws\Result listSchedules(array{JobName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchedulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchedulesAsync(array{JobName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result publishRecipe(array $args = [])
 * @phpstan-method \Aws\Result publishRecipe(array{Description?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise publishRecipeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishRecipeAsync(array{Description?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result sendProjectSessionAction(array $args = [])
 * @phpstan-method \Aws\Result sendProjectSessionAction(array{
 *     Preview?: bool,
 *     Name?: string,
 *     RecipeStep?: array{
 *         Action?: array{Operation?: string, Parameters?: array<string, string>, ...},
 *         ConditionExpressions?: list<array>,
 *         ...,
 *     },
 *     StepIndex?: int,
 *     ClientSessionId?: string,
 *     ViewFrame?: array{
 *         StartColumnIndex?: int,
 *         ColumnRange?: int,
 *         HiddenColumns?: list<string>,
 *         StartRowIndex?: int,
 *         RowRange?: int,
 *         Analytics?: 'DISABLE'|'ENABLE',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendProjectSessionActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendProjectSessionActionAsync(array{
 *     Preview?: bool,
 *     Name?: string,
 *     RecipeStep?: array{
 *         Action?: array{Operation?: string, Parameters?: array<string, string>, ...},
 *         ConditionExpressions?: list<array>,
 *         ...,
 *     },
 *     StepIndex?: int,
 *     ClientSessionId?: string,
 *     ViewFrame?: array{
 *         StartColumnIndex?: int,
 *         ColumnRange?: int,
 *         HiddenColumns?: list<string>,
 *         StartRowIndex?: int,
 *         RowRange?: int,
 *         Analytics?: 'DISABLE'|'ENABLE',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startJobRun(array $args = [])
 * @phpstan-method \Aws\Result startJobRun(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startJobRunAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result startProjectSession(array $args = [])
 * @phpstan-method \Aws\Result startProjectSession(array{Name?: string, AssumeControl?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startProjectSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startProjectSessionAsync(array{Name?: string, AssumeControl?: bool, ...} $args = [])
 * @method \Aws\Result stopJobRun(array $args = [])
 * @phpstan-method \Aws\Result stopJobRun(array{Name?: string, RunId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopJobRunAsync(array{Name?: string, RunId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDataset(array $args = [])
 * @phpstan-method \Aws\Result updateDataset(array{
 *     Name?: string,
 *     Format?: 'CSV'|'EXCEL'|'JSON'|'ORC'|'PARQUET',
 *     FormatOptions?: array{
 *         Json?: array{MultiLine?: bool, ...},
 *         Excel?: array{SheetNames?: list<string>, SheetIndexes?: list<int>, HeaderRow?: bool, ...},
 *         Csv?: array{Delimiter?: string, HeaderRow?: bool, ...},
 *         ...,
 *     },
 *     Input?: array{
 *         S3InputDefinition?: array{Bucket?: string, Key?: string, BucketOwner?: string, ...},
 *         DataCatalogInputDefinition?: array{CatalogId?: string, DatabaseName?: string, TableName?: string, TempDirectory?: array, ...},
 *         DatabaseInputDefinition?: array{
 *             GlueConnectionName?: string,
 *             DatabaseTableName?: string,
 *             TempDirectory?: array,
 *             QueryString?: string,
 *             ...,
 *         },
 *         Metadata?: array{SourceArn?: string, ...},
 *         ...,
 *     },
 *     PathOptions?: array{
 *         LastModifiedDateCondition?: array{Expression?: string, ValuesMap?: array<string, string>, ...},
 *         FilesLimit?: array{MaxFiles?: int, OrderedBy?: 'LAST_MODIFIED_DATE', Order?: 'ASCENDING'|'DESCENDING', ...},
 *         Parameters?: array<string, array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDatasetAsync(array{
 *     Name?: string,
 *     Format?: 'CSV'|'EXCEL'|'JSON'|'ORC'|'PARQUET',
 *     FormatOptions?: array{
 *         Json?: array{MultiLine?: bool, ...},
 *         Excel?: array{SheetNames?: list<string>, SheetIndexes?: list<int>, HeaderRow?: bool, ...},
 *         Csv?: array{Delimiter?: string, HeaderRow?: bool, ...},
 *         ...,
 *     },
 *     Input?: array{
 *         S3InputDefinition?: array{Bucket?: string, Key?: string, BucketOwner?: string, ...},
 *         DataCatalogInputDefinition?: array{CatalogId?: string, DatabaseName?: string, TableName?: string, TempDirectory?: array, ...},
 *         DatabaseInputDefinition?: array{
 *             GlueConnectionName?: string,
 *             DatabaseTableName?: string,
 *             TempDirectory?: array,
 *             QueryString?: string,
 *             ...,
 *         },
 *         Metadata?: array{SourceArn?: string, ...},
 *         ...,
 *     },
 *     PathOptions?: array{
 *         LastModifiedDateCondition?: array{Expression?: string, ValuesMap?: array<string, string>, ...},
 *         FilesLimit?: array{MaxFiles?: int, OrderedBy?: 'LAST_MODIFIED_DATE', Order?: 'ASCENDING'|'DESCENDING', ...},
 *         Parameters?: array<string, array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProfileJob(array $args = [])
 * @phpstan-method \Aws\Result updateProfileJob(array{
 *     Configuration?: array{
 *         DatasetStatisticsConfiguration?: array{IncludedStatistics?: list<string>, Overrides?: list<array>, ...},
 *         ProfileColumns?: list<array>,
 *         ColumnStatisticsConfigurations?: list<array>,
 *         EntityDetectorConfiguration?: array{EntityTypes?: list<string>, AllowedStatistics?: list<array>, ...},
 *         ...,
 *     },
 *     EncryptionKeyArn?: string,
 *     EncryptionMode?: 'SSE-KMS'|'SSE-S3',
 *     Name?: string,
 *     LogSubscription?: 'DISABLE'|'ENABLE',
 *     MaxCapacity?: int,
 *     MaxRetries?: int,
 *     OutputLocation?: array{Bucket?: string, Key?: string, BucketOwner?: string, ...},
 *     ValidationConfigurations?: list<array{RulesetArn?: string, ValidationMode?: 'CHECK_ALL', ...}>,
 *     RoleArn?: string,
 *     Timeout?: int,
 *     JobSample?: array{Mode?: 'CUSTOM_ROWS'|'FULL_DATASET', Size?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProfileJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProfileJobAsync(array{
 *     Configuration?: array{
 *         DatasetStatisticsConfiguration?: array{IncludedStatistics?: list<string>, Overrides?: list<array>, ...},
 *         ProfileColumns?: list<array>,
 *         ColumnStatisticsConfigurations?: list<array>,
 *         EntityDetectorConfiguration?: array{EntityTypes?: list<string>, AllowedStatistics?: list<array>, ...},
 *         ...,
 *     },
 *     EncryptionKeyArn?: string,
 *     EncryptionMode?: 'SSE-KMS'|'SSE-S3',
 *     Name?: string,
 *     LogSubscription?: 'DISABLE'|'ENABLE',
 *     MaxCapacity?: int,
 *     MaxRetries?: int,
 *     OutputLocation?: array{Bucket?: string, Key?: string, BucketOwner?: string, ...},
 *     ValidationConfigurations?: list<array{RulesetArn?: string, ValidationMode?: 'CHECK_ALL', ...}>,
 *     RoleArn?: string,
 *     Timeout?: int,
 *     JobSample?: array{Mode?: 'CUSTOM_ROWS'|'FULL_DATASET', Size?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProject(array $args = [])
 * @phpstan-method \Aws\Result updateProject(array{
 *     Sample?: array{Size?: int, Type?: 'FIRST_N'|'LAST_N'|'RANDOM', ...},
 *     RoleArn?: string,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProjectAsync(array{
 *     Sample?: array{Size?: int, Type?: 'FIRST_N'|'LAST_N'|'RANDOM', ...},
 *     RoleArn?: string,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRecipe(array $args = [])
 * @phpstan-method \Aws\Result updateRecipe(array{
 *     Description?: string,
 *     Name?: string,
 *     Steps?: list<array{Action?: array, ConditionExpressions?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRecipeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRecipeAsync(array{
 *     Description?: string,
 *     Name?: string,
 *     Steps?: list<array{Action?: array, ConditionExpressions?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRecipeJob(array $args = [])
 * @phpstan-method \Aws\Result updateRecipeJob(array{
 *     EncryptionKeyArn?: string,
 *     EncryptionMode?: 'SSE-KMS'|'SSE-S3',
 *     Name?: string,
 *     LogSubscription?: 'DISABLE'|'ENABLE',
 *     MaxCapacity?: int,
 *     MaxRetries?: int,
 *     Outputs?: list<array{
 *         CompressionFormat?: 'BROTLI'|'BZIP2'|'DEFLATE'|'GZIP'|'LZ4'|'LZO'|'SNAPPY'|'ZLIB'|'ZSTD',
 *         Format?: 'AVRO'|'CSV'|'GLUEPARQUET'|'JSON'|'ORC'|'PARQUET'|'TABLEAUHYPER'|'XML',
 *         PartitionColumns?: list<string>,
 *         Location?: array,
 *         Overwrite?: bool,
 *         FormatOptions?: array,
 *         MaxOutputFiles?: int,
 *         ...,
 *     }>,
 *     DataCatalogOutputs?: list<array{
 *         CatalogId?: string,
 *         DatabaseName?: string,
 *         TableName?: string,
 *         S3Options?: array,
 *         DatabaseOptions?: array,
 *         Overwrite?: bool,
 *         ...,
 *     }>,
 *     DatabaseOutputs?: list<array{GlueConnectionName?: string, DatabaseOptions?: array, DatabaseOutputMode?: 'NEW_TABLE', ...}>,
 *     RoleArn?: string,
 *     Timeout?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRecipeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRecipeJobAsync(array{
 *     EncryptionKeyArn?: string,
 *     EncryptionMode?: 'SSE-KMS'|'SSE-S3',
 *     Name?: string,
 *     LogSubscription?: 'DISABLE'|'ENABLE',
 *     MaxCapacity?: int,
 *     MaxRetries?: int,
 *     Outputs?: list<array{
 *         CompressionFormat?: 'BROTLI'|'BZIP2'|'DEFLATE'|'GZIP'|'LZ4'|'LZO'|'SNAPPY'|'ZLIB'|'ZSTD',
 *         Format?: 'AVRO'|'CSV'|'GLUEPARQUET'|'JSON'|'ORC'|'PARQUET'|'TABLEAUHYPER'|'XML',
 *         PartitionColumns?: list<string>,
 *         Location?: array,
 *         Overwrite?: bool,
 *         FormatOptions?: array,
 *         MaxOutputFiles?: int,
 *         ...,
 *     }>,
 *     DataCatalogOutputs?: list<array{
 *         CatalogId?: string,
 *         DatabaseName?: string,
 *         TableName?: string,
 *         S3Options?: array,
 *         DatabaseOptions?: array,
 *         Overwrite?: bool,
 *         ...,
 *     }>,
 *     DatabaseOutputs?: list<array{GlueConnectionName?: string, DatabaseOptions?: array, DatabaseOutputMode?: 'NEW_TABLE', ...}>,
 *     RoleArn?: string,
 *     Timeout?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRuleset(array $args = [])
 * @phpstan-method \Aws\Result updateRuleset(array{
 *     Name?: string,
 *     Description?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Disabled?: bool,
 *         CheckExpression?: string,
 *         SubstitutionMap?: array<string, string>,
 *         Threshold?: array,
 *         ColumnSelectors?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRulesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRulesetAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Rules?: list<array{
 *         Name?: string,
 *         Disabled?: bool,
 *         CheckExpression?: string,
 *         SubstitutionMap?: array<string, string>,
 *         Threshold?: array,
 *         ColumnSelectors?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSchedule(array $args = [])
 * @phpstan-method \Aws\Result updateSchedule(array{JobNames?: list<string>, CronExpression?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScheduleAsync(array{JobNames?: list<string>, CronExpression?: string, Name?: string, ...} $args = [])
 */
class GlueDataBrewClient extends AwsClient {}
