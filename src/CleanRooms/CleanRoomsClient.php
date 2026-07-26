<?php
namespace Aws\CleanRooms;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Clean Rooms Service** service.
 * @method \Aws\Result batchGetCollaborationAnalysisTemplate(array $args = [])
 * @phpstan-method \Aws\Result batchGetCollaborationAnalysisTemplate(array{collaborationIdentifier?: string, analysisTemplateArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCollaborationAnalysisTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCollaborationAnalysisTemplateAsync(array{collaborationIdentifier?: string, analysisTemplateArns?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetSchema(array $args = [])
 * @phpstan-method \Aws\Result batchGetSchema(array{collaborationIdentifier?: string, names?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetSchemaAsync(array{collaborationIdentifier?: string, names?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetSchemaAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result batchGetSchemaAnalysisRule(array{
 *     collaborationIdentifier?: string,
 *     schemaAnalysisRuleRequests?: list<array{name?: string, type?: 'AGGREGATION'|'CUSTOM'|'ID_MAPPING_TABLE'|'LIST', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetSchemaAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetSchemaAnalysisRuleAsync(array{
 *     collaborationIdentifier?: string,
 *     schemaAnalysisRuleRequests?: list<array{name?: string, type?: 'AGGREGATION'|'CUSTOM'|'ID_MAPPING_TABLE'|'LIST', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAnalysisTemplate(array $args = [])
 * @phpstan-method \Aws\Result createAnalysisTemplate(array{
 *     description?: string,
 *     membershipIdentifier?: string,
 *     name?: string,
 *     format?: 'PYSPARK_1_0'|'SQL',
 *     source?: array{
 *         text?: string,
 *         artifacts?: array{entryPoint?: array, additionalArtifacts?: list<array>, roleArn?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     analysisParameters?: list<array{
 *         name?: string,
 *         type?: 'BIGINT'|'BINARY'|'BOOLEAN'|'BYTE'|'CHAR'|'CHARACTER'|'DATE'|'DECIMAL'|'DOUBLE'|'DOUBLE_PRECISION'|'FLOAT'|'INT'|'INTEGER'|'LONG'|'NUMERIC'|'REAL'|'SHORT'|'SMALLINT'|'STRING'|'TIME'|'TIMESTAMP'|'TIMESTAMPTZ'|'TIMESTAMP_LTZ'|'TIMESTAMP_NTZ'|'TIMETZ'|'TINYINT'|'VARBYTE'|'VARCHAR',
 *         defaultValue?: string,
 *         ...,
 *     }>,
 *     schema?: array{referencedTables?: list<string>, ...},
 *     errorMessageConfiguration?: array{type?: 'DETAILED', ...},
 *     syntheticDataParameters?: array{
 *         mlSyntheticDataParameters?: array{epsilon?: float, maxMembershipInferenceAttackScore?: float, columnClassification?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAnalysisTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAnalysisTemplateAsync(array{
 *     description?: string,
 *     membershipIdentifier?: string,
 *     name?: string,
 *     format?: 'PYSPARK_1_0'|'SQL',
 *     source?: array{
 *         text?: string,
 *         artifacts?: array{entryPoint?: array, additionalArtifacts?: list<array>, roleArn?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     analysisParameters?: list<array{
 *         name?: string,
 *         type?: 'BIGINT'|'BINARY'|'BOOLEAN'|'BYTE'|'CHAR'|'CHARACTER'|'DATE'|'DECIMAL'|'DOUBLE'|'DOUBLE_PRECISION'|'FLOAT'|'INT'|'INTEGER'|'LONG'|'NUMERIC'|'REAL'|'SHORT'|'SMALLINT'|'STRING'|'TIME'|'TIMESTAMP'|'TIMESTAMPTZ'|'TIMESTAMP_LTZ'|'TIMESTAMP_NTZ'|'TIMETZ'|'TINYINT'|'VARBYTE'|'VARCHAR',
 *         defaultValue?: string,
 *         ...,
 *     }>,
 *     schema?: array{referencedTables?: list<string>, ...},
 *     errorMessageConfiguration?: array{type?: 'DETAILED', ...},
 *     syntheticDataParameters?: array{
 *         mlSyntheticDataParameters?: array{epsilon?: float, maxMembershipInferenceAttackScore?: float, columnClassification?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCollaboration(array $args = [])
 * @phpstan-method \Aws\Result createCollaboration(array{
 *     members?: list<array{
 *         accountId?: string,
 *         memberAbilities?: list<'CAN_QUERY'|'CAN_RECEIVE_RESULTS'|'CAN_RUN_JOB'>,
 *         mlMemberAbilities?: array,
 *         displayName?: string,
 *         paymentConfiguration?: array,
 *         ...,
 *     }>,
 *     name?: string,
 *     description?: string,
 *     creatorMemberAbilities?: list<'CAN_QUERY'|'CAN_RECEIVE_RESULTS'|'CAN_RUN_JOB'>,
 *     creatorMLMemberAbilities?: array{customMLMemberAbilities?: list<'CAN_RECEIVE_INFERENCE_OUTPUT'|'CAN_RECEIVE_MODEL_OUTPUT'>, ...},
 *     creatorDisplayName?: string,
 *     dataEncryptionMetadata?: array{
 *         allowCleartext?: bool,
 *         allowDuplicates?: bool,
 *         allowJoinsOnColumnsWithDifferentNames?: bool,
 *         preserveNulls?: bool,
 *         ...,
 *     },
 *     queryLogStatus?: 'DISABLED'|'ENABLED',
 *     jobLogStatus?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     creatorPaymentConfiguration?: array{
 *         queryCompute?: array{isResponsible?: bool, ...},
 *         machineLearning?: array{modelTraining?: array, modelInference?: array, syntheticDataGeneration?: array, ...},
 *         jobCompute?: array{isResponsible?: bool, ...},
 *         ...,
 *     },
 *     analyticsEngine?: 'CLEAN_ROOMS_SQL'|'SPARK',
 *     autoApprovedChangeRequestTypes?: list<'ADD_MEMBER'|'GRANT_RECEIVE_RESULTS_ABILITY'|'REVOKE_RECEIVE_RESULTS_ABILITY'>,
 *     allowedResultRegions?: list<'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2'>,
 *     isMetricsEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCollaborationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCollaborationAsync(array{
 *     members?: list<array{
 *         accountId?: string,
 *         memberAbilities?: list<'CAN_QUERY'|'CAN_RECEIVE_RESULTS'|'CAN_RUN_JOB'>,
 *         mlMemberAbilities?: array,
 *         displayName?: string,
 *         paymentConfiguration?: array,
 *         ...,
 *     }>,
 *     name?: string,
 *     description?: string,
 *     creatorMemberAbilities?: list<'CAN_QUERY'|'CAN_RECEIVE_RESULTS'|'CAN_RUN_JOB'>,
 *     creatorMLMemberAbilities?: array{customMLMemberAbilities?: list<'CAN_RECEIVE_INFERENCE_OUTPUT'|'CAN_RECEIVE_MODEL_OUTPUT'>, ...},
 *     creatorDisplayName?: string,
 *     dataEncryptionMetadata?: array{
 *         allowCleartext?: bool,
 *         allowDuplicates?: bool,
 *         allowJoinsOnColumnsWithDifferentNames?: bool,
 *         preserveNulls?: bool,
 *         ...,
 *     },
 *     queryLogStatus?: 'DISABLED'|'ENABLED',
 *     jobLogStatus?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     creatorPaymentConfiguration?: array{
 *         queryCompute?: array{isResponsible?: bool, ...},
 *         machineLearning?: array{modelTraining?: array, modelInference?: array, syntheticDataGeneration?: array, ...},
 *         jobCompute?: array{isResponsible?: bool, ...},
 *         ...,
 *     },
 *     analyticsEngine?: 'CLEAN_ROOMS_SQL'|'SPARK',
 *     autoApprovedChangeRequestTypes?: list<'ADD_MEMBER'|'GRANT_RECEIVE_RESULTS_ABILITY'|'REVOKE_RECEIVE_RESULTS_ABILITY'>,
 *     allowedResultRegions?: list<'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2'>,
 *     isMetricsEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCollaborationChangeRequest(array $args = [])
 * @phpstan-method \Aws\Result createCollaborationChangeRequest(array{
 *     collaborationIdentifier?: string,
 *     changes?: list<array{specificationType?: 'COLLABORATION'|'MEMBER', specification?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCollaborationChangeRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCollaborationChangeRequestAsync(array{
 *     collaborationIdentifier?: string,
 *     changes?: list<array{specificationType?: 'COLLABORATION'|'MEMBER', specification?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfiguredAudienceModelAssociation(array $args = [])
 * @phpstan-method \Aws\Result createConfiguredAudienceModelAssociation(array{
 *     membershipIdentifier?: string,
 *     configuredAudienceModelArn?: string,
 *     configuredAudienceModelAssociationName?: string,
 *     manageResourcePolicies?: bool,
 *     tags?: array<string, string>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfiguredAudienceModelAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfiguredAudienceModelAssociationAsync(array{
 *     membershipIdentifier?: string,
 *     configuredAudienceModelArn?: string,
 *     configuredAudienceModelAssociationName?: string,
 *     manageResourcePolicies?: bool,
 *     tags?: array<string, string>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfiguredTable(array $args = [])
 * @phpstan-method \Aws\Result createConfiguredTable(array{
 *     name?: string,
 *     description?: string,
 *     tableReference?: array{
 *         glue?: array{
 *             region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *             tableName?: string,
 *             databaseName?: string,
 *             ...,
 *         },
 *         snowflake?: array{
 *             secretArn?: string,
 *             accountIdentifier?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             schemaName?: string,
 *             tableSchema?: array,
 *             ...,
 *         },
 *         athena?: array{
 *             region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *             workGroup?: string,
 *             outputLocation?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             catalogName?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     allowedColumns?: list<string>,
 *     analysisMethod?: 'DIRECT_JOB'|'DIRECT_QUERY'|'MULTIPLE',
 *     selectedAnalysisMethods?: list<'DIRECT_JOB'|'DIRECT_QUERY'>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfiguredTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfiguredTableAsync(array{
 *     name?: string,
 *     description?: string,
 *     tableReference?: array{
 *         glue?: array{
 *             region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *             tableName?: string,
 *             databaseName?: string,
 *             ...,
 *         },
 *         snowflake?: array{
 *             secretArn?: string,
 *             accountIdentifier?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             schemaName?: string,
 *             tableSchema?: array,
 *             ...,
 *         },
 *         athena?: array{
 *             region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *             workGroup?: string,
 *             outputLocation?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             catalogName?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     allowedColumns?: list<string>,
 *     analysisMethod?: 'DIRECT_JOB'|'DIRECT_QUERY'|'MULTIPLE',
 *     selectedAnalysisMethods?: list<'DIRECT_JOB'|'DIRECT_QUERY'>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfiguredTableAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result createConfiguredTableAnalysisRule(array{
 *     configuredTableIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     analysisRulePolicy?: array{v1?: array{list?: array, aggregation?: array, custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfiguredTableAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfiguredTableAnalysisRuleAsync(array{
 *     configuredTableIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     analysisRulePolicy?: array{v1?: array{list?: array, aggregation?: array, custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfiguredTableAssociation(array $args = [])
 * @phpstan-method \Aws\Result createConfiguredTableAssociation(array{
 *     name?: string,
 *     description?: string,
 *     membershipIdentifier?: string,
 *     configuredTableIdentifier?: string,
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfiguredTableAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfiguredTableAssociationAsync(array{
 *     name?: string,
 *     description?: string,
 *     membershipIdentifier?: string,
 *     configuredTableIdentifier?: string,
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConfiguredTableAssociationAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result createConfiguredTableAssociationAnalysisRule(array{
 *     membershipIdentifier?: string,
 *     configuredTableAssociationIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     analysisRulePolicy?: array{v1?: array{list?: array, aggregation?: array, custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConfiguredTableAssociationAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfiguredTableAssociationAnalysisRuleAsync(array{
 *     membershipIdentifier?: string,
 *     configuredTableAssociationIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     analysisRulePolicy?: array{v1?: array{list?: array, aggregation?: array, custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIdMappingTable(array $args = [])
 * @phpstan-method \Aws\Result createIdMappingTable(array{
 *     membershipIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     inputReferenceConfig?: array{inputReferenceArn?: string, manageResourcePolicies?: bool, ...},
 *     tags?: array<string, string>,
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIdMappingTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIdMappingTableAsync(array{
 *     membershipIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     inputReferenceConfig?: array{inputReferenceArn?: string, manageResourcePolicies?: bool, ...},
 *     tags?: array<string, string>,
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIdNamespaceAssociation(array $args = [])
 * @phpstan-method \Aws\Result createIdNamespaceAssociation(array{
 *     membershipIdentifier?: string,
 *     inputReferenceConfig?: array{inputReferenceArn?: string, manageResourcePolicies?: bool, ...},
 *     tags?: array<string, string>,
 *     name?: string,
 *     description?: string,
 *     idMappingConfig?: array{allowUseAsDimensionColumn?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIdNamespaceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIdNamespaceAssociationAsync(array{
 *     membershipIdentifier?: string,
 *     inputReferenceConfig?: array{inputReferenceArn?: string, manageResourcePolicies?: bool, ...},
 *     tags?: array<string, string>,
 *     name?: string,
 *     description?: string,
 *     idMappingConfig?: array{allowUseAsDimensionColumn?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntermediateTable(array $args = [])
 * @phpstan-method \Aws\Result createIntermediateTable(array{
 *     membershipIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     populationAnalysisConfiguration?: array{sqlParameters?: array{queryString?: string, analysisTemplateArn?: string, ...}, ...},
 *     kmsKeyArn?: string,
 *     retentionInDays?: int,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntermediateTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntermediateTableAsync(array{
 *     membershipIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     populationAnalysisConfiguration?: array{sqlParameters?: array{queryString?: string, analysisTemplateArn?: string, ...}, ...},
 *     kmsKeyArn?: string,
 *     retentionInDays?: int,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntermediateTableAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result createIntermediateTableAnalysisRule(array{
 *     membershipIdentifier?: string,
 *     intermediateTableIdentifier?: string,
 *     analysisRuleType?: 'CUSTOM',
 *     analysisRulePolicy?: array{v1?: array{custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntermediateTableAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntermediateTableAnalysisRuleAsync(array{
 *     membershipIdentifier?: string,
 *     intermediateTableIdentifier?: string,
 *     analysisRuleType?: 'CUSTOM',
 *     analysisRulePolicy?: array{v1?: array{custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMembership(array $args = [])
 * @phpstan-method \Aws\Result createMembership(array{
 *     collaborationIdentifier?: string,
 *     queryLogStatus?: 'DISABLED'|'ENABLED',
 *     jobLogStatus?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     defaultResultConfiguration?: array{outputConfiguration?: array{s3?: array, ...}, roleArn?: string, ...},
 *     defaultJobResultConfiguration?: array{outputConfiguration?: array{s3?: array, ...}, roleArn?: string, ...},
 *     paymentConfiguration?: array{
 *         queryCompute?: array{isResponsible?: bool, ...},
 *         machineLearning?: array{modelTraining?: array, modelInference?: array, syntheticDataGeneration?: array, ...},
 *         jobCompute?: array{isResponsible?: bool, ...},
 *         ...,
 *     },
 *     isMetricsEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMembershipAsync(array{
 *     collaborationIdentifier?: string,
 *     queryLogStatus?: 'DISABLED'|'ENABLED',
 *     jobLogStatus?: 'DISABLED'|'ENABLED',
 *     tags?: array<string, string>,
 *     defaultResultConfiguration?: array{outputConfiguration?: array{s3?: array, ...}, roleArn?: string, ...},
 *     defaultJobResultConfiguration?: array{outputConfiguration?: array{s3?: array, ...}, roleArn?: string, ...},
 *     paymentConfiguration?: array{
 *         queryCompute?: array{isResponsible?: bool, ...},
 *         machineLearning?: array{modelTraining?: array, modelInference?: array, syntheticDataGeneration?: array, ...},
 *         jobCompute?: array{isResponsible?: bool, ...},
 *         ...,
 *     },
 *     isMetricsEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPrivacyBudgetTemplate(array $args = [])
 * @phpstan-method \Aws\Result createPrivacyBudgetTemplate(array{
 *     membershipIdentifier?: string,
 *     autoRefresh?: 'CALENDAR_MONTH'|'NONE',
 *     privacyBudgetType?: 'ACCESS_BUDGET'|'DIFFERENTIAL_PRIVACY',
 *     parameters?: array{
 *         differentialPrivacy?: array{epsilon?: int, usersNoisePerQuery?: int, ...},
 *         accessBudget?: array{budgetParameters?: list<array>, resourceArn?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPrivacyBudgetTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPrivacyBudgetTemplateAsync(array{
 *     membershipIdentifier?: string,
 *     autoRefresh?: 'CALENDAR_MONTH'|'NONE',
 *     privacyBudgetType?: 'ACCESS_BUDGET'|'DIFFERENTIAL_PRIVACY',
 *     parameters?: array{
 *         differentialPrivacy?: array{epsilon?: int, usersNoisePerQuery?: int, ...},
 *         accessBudget?: array{budgetParameters?: list<array>, resourceArn?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAnalysisTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteAnalysisTemplate(array{membershipIdentifier?: string, analysisTemplateIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAnalysisTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAnalysisTemplateAsync(array{membershipIdentifier?: string, analysisTemplateIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteCollaboration(array $args = [])
 * @phpstan-method \Aws\Result deleteCollaboration(array{collaborationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCollaborationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCollaborationAsync(array{collaborationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteConfiguredAudienceModelAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguredAudienceModelAssociation(array{configuredAudienceModelAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredAudienceModelAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfiguredAudienceModelAssociationAsync(array{configuredAudienceModelAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteConfiguredTable(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguredTable(array{configuredTableIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfiguredTableAsync(array{configuredTableIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteConfiguredTableAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguredTableAnalysisRule(array{configuredTableIdentifier?: string, analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredTableAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfiguredTableAnalysisRuleAsync(array{configuredTableIdentifier?: string, analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST', ...} $args = [])
 * @method \Aws\Result deleteConfiguredTableAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguredTableAssociation(array{configuredTableAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredTableAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfiguredTableAssociationAsync(array{configuredTableAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteConfiguredTableAssociationAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result deleteConfiguredTableAssociationAnalysisRule(array{
 *     membershipIdentifier?: string,
 *     configuredTableAssociationIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConfiguredTableAssociationAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfiguredTableAssociationAnalysisRuleAsync(array{
 *     membershipIdentifier?: string,
 *     configuredTableAssociationIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteIdMappingTable(array $args = [])
 * @phpstan-method \Aws\Result deleteIdMappingTable(array{idMappingTableIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdMappingTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdMappingTableAsync(array{idMappingTableIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteIdNamespaceAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteIdNamespaceAssociation(array{idNamespaceAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIdNamespaceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdNamespaceAssociationAsync(array{idNamespaceAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteIntermediateTable(array $args = [])
 * @phpstan-method \Aws\Result deleteIntermediateTable(array{membershipIdentifier?: string, intermediateTableIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntermediateTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntermediateTableAsync(array{membershipIdentifier?: string, intermediateTableIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteIntermediateTableAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result deleteIntermediateTableAnalysisRule(array{membershipIdentifier?: string, intermediateTableIdentifier?: string, analysisRuleType?: 'CUSTOM', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntermediateTableAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntermediateTableAnalysisRuleAsync(array{membershipIdentifier?: string, intermediateTableIdentifier?: string, analysisRuleType?: 'CUSTOM', ...} $args = [])
 * @method \Aws\Result deleteMember(array $args = [])
 * @phpstan-method \Aws\Result deleteMember(array{collaborationIdentifier?: string, accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMemberAsync(array{collaborationIdentifier?: string, accountId?: string, ...} $args = [])
 * @method \Aws\Result deleteMembership(array $args = [])
 * @phpstan-method \Aws\Result deleteMembership(array{membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMembershipAsync(array{membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deletePrivacyBudgetTemplate(array $args = [])
 * @phpstan-method \Aws\Result deletePrivacyBudgetTemplate(array{membershipIdentifier?: string, privacyBudgetTemplateIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePrivacyBudgetTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePrivacyBudgetTemplateAsync(array{membershipIdentifier?: string, privacyBudgetTemplateIdentifier?: string, ...} $args = [])
 * @method \Aws\Result disallowIntermediateTable(array $args = [])
 * @phpstan-method \Aws\Result disallowIntermediateTable(array{membershipIdentifier?: string, intermediateTableName?: string, includeDescendants?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disallowIntermediateTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disallowIntermediateTableAsync(array{membershipIdentifier?: string, intermediateTableName?: string, includeDescendants?: bool, ...} $args = [])
 * @method \Aws\Result getAnalysisTemplate(array $args = [])
 * @phpstan-method \Aws\Result getAnalysisTemplate(array{membershipIdentifier?: string, analysisTemplateIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAnalysisTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAnalysisTemplateAsync(array{membershipIdentifier?: string, analysisTemplateIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCollaboration(array $args = [])
 * @phpstan-method \Aws\Result getCollaboration(array{collaborationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCollaborationAsync(array{collaborationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCollaborationAnalysisTemplate(array $args = [])
 * @phpstan-method \Aws\Result getCollaborationAnalysisTemplate(array{collaborationIdentifier?: string, analysisTemplateArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationAnalysisTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCollaborationAnalysisTemplateAsync(array{collaborationIdentifier?: string, analysisTemplateArn?: string, ...} $args = [])
 * @method \Aws\Result getCollaborationChangeRequest(array $args = [])
 * @phpstan-method \Aws\Result getCollaborationChangeRequest(array{collaborationIdentifier?: string, changeRequestIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationChangeRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCollaborationChangeRequestAsync(array{collaborationIdentifier?: string, changeRequestIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCollaborationConfiguredAudienceModelAssociation(array $args = [])
 * @phpstan-method \Aws\Result getCollaborationConfiguredAudienceModelAssociation(array{collaborationIdentifier?: string, configuredAudienceModelAssociationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationConfiguredAudienceModelAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCollaborationConfiguredAudienceModelAssociationAsync(array{collaborationIdentifier?: string, configuredAudienceModelAssociationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCollaborationIdNamespaceAssociation(array $args = [])
 * @phpstan-method \Aws\Result getCollaborationIdNamespaceAssociation(array{collaborationIdentifier?: string, idNamespaceAssociationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationIdNamespaceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCollaborationIdNamespaceAssociationAsync(array{collaborationIdentifier?: string, idNamespaceAssociationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getCollaborationPrivacyBudgetTemplate(array $args = [])
 * @phpstan-method \Aws\Result getCollaborationPrivacyBudgetTemplate(array{collaborationIdentifier?: string, privacyBudgetTemplateIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCollaborationPrivacyBudgetTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCollaborationPrivacyBudgetTemplateAsync(array{collaborationIdentifier?: string, privacyBudgetTemplateIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getConfiguredAudienceModelAssociation(array $args = [])
 * @phpstan-method \Aws\Result getConfiguredAudienceModelAssociation(array{configuredAudienceModelAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredAudienceModelAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfiguredAudienceModelAssociationAsync(array{configuredAudienceModelAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getConfiguredTable(array $args = [])
 * @phpstan-method \Aws\Result getConfiguredTable(array{configuredTableIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfiguredTableAsync(array{configuredTableIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getConfiguredTableAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result getConfiguredTableAnalysisRule(array{configuredTableIdentifier?: string, analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredTableAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfiguredTableAnalysisRuleAsync(array{configuredTableIdentifier?: string, analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST', ...} $args = [])
 * @method \Aws\Result getConfiguredTableAssociation(array $args = [])
 * @phpstan-method \Aws\Result getConfiguredTableAssociation(array{configuredTableAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredTableAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfiguredTableAssociationAsync(array{configuredTableAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getConfiguredTableAssociationAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result getConfiguredTableAssociationAnalysisRule(array{
 *     membershipIdentifier?: string,
 *     configuredTableAssociationIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getConfiguredTableAssociationAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfiguredTableAssociationAnalysisRuleAsync(array{
 *     membershipIdentifier?: string,
 *     configuredTableAssociationIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getIdMappingTable(array $args = [])
 * @phpstan-method \Aws\Result getIdMappingTable(array{idMappingTableIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdMappingTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdMappingTableAsync(array{idMappingTableIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getIdNamespaceAssociation(array $args = [])
 * @phpstan-method \Aws\Result getIdNamespaceAssociation(array{idNamespaceAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIdNamespaceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdNamespaceAssociationAsync(array{idNamespaceAssociationIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getIntermediateTable(array $args = [])
 * @phpstan-method \Aws\Result getIntermediateTable(array{intermediateTableIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntermediateTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntermediateTableAsync(array{intermediateTableIdentifier?: string, membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getIntermediateTableAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result getIntermediateTableAnalysisRule(array{membershipIdentifier?: string, intermediateTableIdentifier?: string, analysisRuleType?: 'CUSTOM', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntermediateTableAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntermediateTableAnalysisRuleAsync(array{membershipIdentifier?: string, intermediateTableIdentifier?: string, analysisRuleType?: 'CUSTOM', ...} $args = [])
 * @method \Aws\Result getMembership(array $args = [])
 * @phpstan-method \Aws\Result getMembership(array{membershipIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMembershipAsync(array{membershipIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getPrivacyBudgetTemplate(array $args = [])
 * @phpstan-method \Aws\Result getPrivacyBudgetTemplate(array{membershipIdentifier?: string, privacyBudgetTemplateIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPrivacyBudgetTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPrivacyBudgetTemplateAsync(array{membershipIdentifier?: string, privacyBudgetTemplateIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getProtectedJob(array $args = [])
 * @phpstan-method \Aws\Result getProtectedJob(array{membershipIdentifier?: string, protectedJobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProtectedJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProtectedJobAsync(array{membershipIdentifier?: string, protectedJobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getProtectedQuery(array $args = [])
 * @phpstan-method \Aws\Result getProtectedQuery(array{membershipIdentifier?: string, protectedQueryIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProtectedQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProtectedQueryAsync(array{membershipIdentifier?: string, protectedQueryIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getSchema(array $args = [])
 * @phpstan-method \Aws\Result getSchema(array{collaborationIdentifier?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSchemaAsync(array{collaborationIdentifier?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getSchemaAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result getSchemaAnalysisRule(array{
 *     collaborationIdentifier?: string,
 *     name?: string,
 *     type?: 'AGGREGATION'|'CUSTOM'|'ID_MAPPING_TABLE'|'LIST',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getSchemaAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSchemaAnalysisRuleAsync(array{
 *     collaborationIdentifier?: string,
 *     name?: string,
 *     type?: 'AGGREGATION'|'CUSTOM'|'ID_MAPPING_TABLE'|'LIST',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAnalysisTemplates(array $args = [])
 * @phpstan-method \Aws\Result listAnalysisTemplates(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnalysisTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnalysisTemplatesAsync(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCollaborationAnalysisTemplates(array $args = [])
 * @phpstan-method \Aws\Result listCollaborationAnalysisTemplates(array{collaborationIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationAnalysisTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationAnalysisTemplatesAsync(array{collaborationIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCollaborationChangeRequests(array $args = [])
 * @phpstan-method \Aws\Result listCollaborationChangeRequests(array{
 *     collaborationIdentifier?: string,
 *     status?: 'APPROVED'|'CANCELLED'|'COMMITTED'|'DENIED'|'PENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationChangeRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationChangeRequestsAsync(array{
 *     collaborationIdentifier?: string,
 *     status?: 'APPROVED'|'CANCELLED'|'COMMITTED'|'DENIED'|'PENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCollaborationConfiguredAudienceModelAssociations(array $args = [])
 * @phpstan-method \Aws\Result listCollaborationConfiguredAudienceModelAssociations(array{collaborationIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationConfiguredAudienceModelAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationConfiguredAudienceModelAssociationsAsync(array{collaborationIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCollaborationIdNamespaceAssociations(array $args = [])
 * @phpstan-method \Aws\Result listCollaborationIdNamespaceAssociations(array{collaborationIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationIdNamespaceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationIdNamespaceAssociationsAsync(array{collaborationIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCollaborationPrivacyBudgetTemplates(array $args = [])
 * @phpstan-method \Aws\Result listCollaborationPrivacyBudgetTemplates(array{collaborationIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationPrivacyBudgetTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationPrivacyBudgetTemplatesAsync(array{collaborationIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listCollaborationPrivacyBudgets(array $args = [])
 * @phpstan-method \Aws\Result listCollaborationPrivacyBudgets(array{
 *     collaborationIdentifier?: string,
 *     privacyBudgetType?: 'ACCESS_BUDGET'|'DIFFERENTIAL_PRIVACY',
 *     maxResults?: int,
 *     nextToken?: string,
 *     accessBudgetResourceArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationPrivacyBudgetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationPrivacyBudgetsAsync(array{
 *     collaborationIdentifier?: string,
 *     privacyBudgetType?: 'ACCESS_BUDGET'|'DIFFERENTIAL_PRIVACY',
 *     maxResults?: int,
 *     nextToken?: string,
 *     accessBudgetResourceArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCollaborations(array $args = [])
 * @phpstan-method \Aws\Result listCollaborations(array{nextToken?: string, maxResults?: int, memberStatus?: 'ACTIVE'|'INVITED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCollaborationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCollaborationsAsync(array{nextToken?: string, maxResults?: int, memberStatus?: 'ACTIVE'|'INVITED', ...} $args = [])
 * @method \Aws\Result listConfiguredAudienceModelAssociations(array $args = [])
 * @phpstan-method \Aws\Result listConfiguredAudienceModelAssociations(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfiguredAudienceModelAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfiguredAudienceModelAssociationsAsync(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listConfiguredTableAssociations(array $args = [])
 * @phpstan-method \Aws\Result listConfiguredTableAssociations(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfiguredTableAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfiguredTableAssociationsAsync(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listConfiguredTables(array $args = [])
 * @phpstan-method \Aws\Result listConfiguredTables(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listConfiguredTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfiguredTablesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listIdMappingTables(array $args = [])
 * @phpstan-method \Aws\Result listIdMappingTables(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdMappingTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdMappingTablesAsync(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listIdNamespaceAssociations(array $args = [])
 * @phpstan-method \Aws\Result listIdNamespaceAssociations(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdNamespaceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdNamespaceAssociationsAsync(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listIntermediateTableVersions(array $args = [])
 * @phpstan-method \Aws\Result listIntermediateTableVersions(array{
 *     membershipIdentifier?: string,
 *     intermediateTableIdentifier?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntermediateTableVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntermediateTableVersionsAsync(array{
 *     membershipIdentifier?: string,
 *     intermediateTableIdentifier?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIntermediateTables(array $args = [])
 * @phpstan-method \Aws\Result listIntermediateTables(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntermediateTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntermediateTablesAsync(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listMembers(array $args = [])
 * @phpstan-method \Aws\Result listMembers(array{collaborationIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMembersAsync(array{collaborationIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listMemberships(array $args = [])
 * @phpstan-method \Aws\Result listMemberships(array{nextToken?: string, maxResults?: int, status?: 'ACTIVE'|'COLLABORATION_DELETED'|'REMOVED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembershipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMembershipsAsync(array{nextToken?: string, maxResults?: int, status?: 'ACTIVE'|'COLLABORATION_DELETED'|'REMOVED', ...} $args = [])
 * @method \Aws\Result listPrivacyBudgetTemplates(array $args = [])
 * @phpstan-method \Aws\Result listPrivacyBudgetTemplates(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrivacyBudgetTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPrivacyBudgetTemplatesAsync(array{membershipIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPrivacyBudgets(array $args = [])
 * @phpstan-method \Aws\Result listPrivacyBudgets(array{
 *     membershipIdentifier?: string,
 *     privacyBudgetType?: 'ACCESS_BUDGET'|'DIFFERENTIAL_PRIVACY',
 *     nextToken?: string,
 *     maxResults?: int,
 *     accessBudgetResourceArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrivacyBudgetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPrivacyBudgetsAsync(array{
 *     membershipIdentifier?: string,
 *     privacyBudgetType?: 'ACCESS_BUDGET'|'DIFFERENTIAL_PRIVACY',
 *     nextToken?: string,
 *     maxResults?: int,
 *     accessBudgetResourceArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProtectedJobs(array $args = [])
 * @phpstan-method \Aws\Result listProtectedJobs(array{
 *     membershipIdentifier?: string,
 *     status?: 'CANCELLED'|'CANCELLING'|'FAILED'|'STARTED'|'SUBMITTED'|'SUCCESS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProtectedJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProtectedJobsAsync(array{
 *     membershipIdentifier?: string,
 *     status?: 'CANCELLED'|'CANCELLING'|'FAILED'|'STARTED'|'SUBMITTED'|'SUCCESS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProtectedQueries(array $args = [])
 * @phpstan-method \Aws\Result listProtectedQueries(array{
 *     membershipIdentifier?: string,
 *     status?: 'CANCELLED'|'CANCELLING'|'FAILED'|'STARTED'|'SUBMITTED'|'SUCCESS'|'TIMED_OUT',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProtectedQueriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProtectedQueriesAsync(array{
 *     membershipIdentifier?: string,
 *     status?: 'CANCELLED'|'CANCELLING'|'FAILED'|'STARTED'|'SUBMITTED'|'SUCCESS'|'TIMED_OUT',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSchemas(array $args = [])
 * @phpstan-method \Aws\Result listSchemas(array{
 *     collaborationIdentifier?: string,
 *     schemaType?: 'ID_MAPPING_TABLE'|'INTERMEDIATE_TABLE'|'TABLE',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSchemasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchemasAsync(array{
 *     collaborationIdentifier?: string,
 *     schemaType?: 'ID_MAPPING_TABLE'|'INTERMEDIATE_TABLE'|'TABLE',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result populateIdMappingTable(array $args = [])
 * @phpstan-method \Aws\Result populateIdMappingTable(array{
 *     idMappingTableIdentifier?: string,
 *     membershipIdentifier?: string,
 *     jobType?: 'BATCH'|'DELETE_ONLY'|'INCREMENTAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise populateIdMappingTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise populateIdMappingTableAsync(array{
 *     idMappingTableIdentifier?: string,
 *     membershipIdentifier?: string,
 *     jobType?: 'BATCH'|'DELETE_ONLY'|'INCREMENTAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result populateIntermediateTable(array $args = [])
 * @phpstan-method \Aws\Result populateIntermediateTable(array{
 *     intermediateTableIdentifier?: string,
 *     membershipIdentifier?: string,
 *     parameters?: array<string, string>,
 *     computeConfiguration?: array{queryComputeConfiguration?: array{type?: 'CR.1X'|'CR.4X', number?: int, properties?: array, ...}, ...},
 *     analysisPayerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise populateIntermediateTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise populateIntermediateTableAsync(array{
 *     intermediateTableIdentifier?: string,
 *     membershipIdentifier?: string,
 *     parameters?: array<string, string>,
 *     computeConfiguration?: array{queryComputeConfiguration?: array{type?: 'CR.1X'|'CR.4X', number?: int, properties?: array, ...}, ...},
 *     analysisPayerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result previewPrivacyImpact(array $args = [])
 * @phpstan-method \Aws\Result previewPrivacyImpact(array{
 *     membershipIdentifier?: string,
 *     parameters?: array{differentialPrivacy?: array{epsilon?: int, usersNoisePerQuery?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise previewPrivacyImpactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise previewPrivacyImpactAsync(array{
 *     membershipIdentifier?: string,
 *     parameters?: array{differentialPrivacy?: array{epsilon?: int, usersNoisePerQuery?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startProtectedJob(array $args = [])
 * @phpstan-method \Aws\Result startProtectedJob(array{
 *     type?: 'PYSPARK',
 *     membershipIdentifier?: string,
 *     jobParameters?: array{analysisTemplateArn?: string, parameters?: array<string, string>, ...},
 *     resultConfiguration?: array{outputConfiguration?: array{member?: array, ...}, ...},
 *     computeConfiguration?: array{worker?: array{type?: 'CR.1X'|'CR.4X', number?: int, properties?: array, ...}, ...},
 *     jobComputePayerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startProtectedJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startProtectedJobAsync(array{
 *     type?: 'PYSPARK',
 *     membershipIdentifier?: string,
 *     jobParameters?: array{analysisTemplateArn?: string, parameters?: array<string, string>, ...},
 *     resultConfiguration?: array{outputConfiguration?: array{member?: array, ...}, ...},
 *     computeConfiguration?: array{worker?: array{type?: 'CR.1X'|'CR.4X', number?: int, properties?: array, ...}, ...},
 *     jobComputePayerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startProtectedQuery(array $args = [])
 * @phpstan-method \Aws\Result startProtectedQuery(array{
 *     type?: 'SQL',
 *     membershipIdentifier?: string,
 *     sqlParameters?: array{queryString?: string, analysisTemplateArn?: string, parameters?: array<string, string>, ...},
 *     resultConfiguration?: array{
 *         outputConfiguration?: array{s3?: array, member?: array, distribute?: array, intermediateTable?: array, ...},
 *         ...,
 *     },
 *     computeConfiguration?: array{worker?: array{type?: 'CR.1X'|'CR.4X', number?: int, properties?: array, ...}, ...},
 *     queryComputePayerAccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startProtectedQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startProtectedQueryAsync(array{
 *     type?: 'SQL',
 *     membershipIdentifier?: string,
 *     sqlParameters?: array{queryString?: string, analysisTemplateArn?: string, parameters?: array<string, string>, ...},
 *     resultConfiguration?: array{
 *         outputConfiguration?: array{s3?: array, member?: array, distribute?: array, intermediateTable?: array, ...},
 *         ...,
 *     },
 *     computeConfiguration?: array{worker?: array{type?: 'CR.1X'|'CR.4X', number?: int, properties?: array, ...}, ...},
 *     queryComputePayerAccountId?: string,
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
 * @method \Aws\Result updateAnalysisTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateAnalysisTemplate(array{membershipIdentifier?: string, analysisTemplateIdentifier?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAnalysisTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAnalysisTemplateAsync(array{membershipIdentifier?: string, analysisTemplateIdentifier?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateCollaboration(array $args = [])
 * @phpstan-method \Aws\Result updateCollaboration(array{
 *     collaborationIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     analyticsEngine?: 'CLEAN_ROOMS_SQL'|'SPARK',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCollaborationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCollaborationAsync(array{
 *     collaborationIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     analyticsEngine?: 'CLEAN_ROOMS_SQL'|'SPARK',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCollaborationChangeRequest(array $args = [])
 * @phpstan-method \Aws\Result updateCollaborationChangeRequest(array{
 *     collaborationIdentifier?: string,
 *     changeRequestIdentifier?: string,
 *     action?: 'APPROVE'|'CANCEL'|'COMMIT'|'DENY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCollaborationChangeRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCollaborationChangeRequestAsync(array{
 *     collaborationIdentifier?: string,
 *     changeRequestIdentifier?: string,
 *     action?: 'APPROVE'|'CANCEL'|'COMMIT'|'DENY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfiguredAudienceModelAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateConfiguredAudienceModelAssociation(array{
 *     configuredAudienceModelAssociationIdentifier?: string,
 *     membershipIdentifier?: string,
 *     description?: string,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfiguredAudienceModelAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfiguredAudienceModelAssociationAsync(array{
 *     configuredAudienceModelAssociationIdentifier?: string,
 *     membershipIdentifier?: string,
 *     description?: string,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfiguredTable(array $args = [])
 * @phpstan-method \Aws\Result updateConfiguredTable(array{
 *     configuredTableIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     tableReference?: array{
 *         glue?: array{
 *             region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *             tableName?: string,
 *             databaseName?: string,
 *             ...,
 *         },
 *         snowflake?: array{
 *             secretArn?: string,
 *             accountIdentifier?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             schemaName?: string,
 *             tableSchema?: array,
 *             ...,
 *         },
 *         athena?: array{
 *             region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *             workGroup?: string,
 *             outputLocation?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             catalogName?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     allowedColumns?: list<string>,
 *     analysisMethod?: 'DIRECT_JOB'|'DIRECT_QUERY'|'MULTIPLE',
 *     selectedAnalysisMethods?: list<'DIRECT_JOB'|'DIRECT_QUERY'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfiguredTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfiguredTableAsync(array{
 *     configuredTableIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     tableReference?: array{
 *         glue?: array{
 *             region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *             tableName?: string,
 *             databaseName?: string,
 *             ...,
 *         },
 *         snowflake?: array{
 *             secretArn?: string,
 *             accountIdentifier?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             schemaName?: string,
 *             tableSchema?: array,
 *             ...,
 *         },
 *         athena?: array{
 *             region?: 'af-south-1'|'ap-east-1'|'ap-east-2'|'ap-northeast-1'|'ap-northeast-2'|'ap-northeast-3'|'ap-south-1'|'ap-south-2'|'ap-southeast-1'|'ap-southeast-2'|'ap-southeast-3'|'ap-southeast-4'|'ap-southeast-5'|'ap-southeast-7'|'ca-central-1'|'ca-west-1'|'eu-central-1'|'eu-central-2'|'eu-north-1'|'eu-south-1'|'eu-south-2'|'eu-west-1'|'eu-west-2'|'eu-west-3'|'il-central-1'|'me-central-1'|'me-south-1'|'mx-central-1'|'sa-east-1'|'us-east-1'|'us-east-2'|'us-west-1'|'us-west-2',
 *             workGroup?: string,
 *             outputLocation?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             catalogName?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     allowedColumns?: list<string>,
 *     analysisMethod?: 'DIRECT_JOB'|'DIRECT_QUERY'|'MULTIPLE',
 *     selectedAnalysisMethods?: list<'DIRECT_JOB'|'DIRECT_QUERY'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfiguredTableAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result updateConfiguredTableAnalysisRule(array{
 *     configuredTableIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     analysisRulePolicy?: array{v1?: array{list?: array, aggregation?: array, custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfiguredTableAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfiguredTableAnalysisRuleAsync(array{
 *     configuredTableIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     analysisRulePolicy?: array{v1?: array{list?: array, aggregation?: array, custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfiguredTableAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateConfiguredTableAssociation(array{
 *     configuredTableAssociationIdentifier?: string,
 *     membershipIdentifier?: string,
 *     description?: string,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfiguredTableAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfiguredTableAssociationAsync(array{
 *     configuredTableAssociationIdentifier?: string,
 *     membershipIdentifier?: string,
 *     description?: string,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConfiguredTableAssociationAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result updateConfiguredTableAssociationAnalysisRule(array{
 *     membershipIdentifier?: string,
 *     configuredTableAssociationIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     analysisRulePolicy?: array{v1?: array{list?: array, aggregation?: array, custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConfiguredTableAssociationAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfiguredTableAssociationAnalysisRuleAsync(array{
 *     membershipIdentifier?: string,
 *     configuredTableAssociationIdentifier?: string,
 *     analysisRuleType?: 'AGGREGATION'|'CUSTOM'|'LIST',
 *     analysisRulePolicy?: array{v1?: array{list?: array, aggregation?: array, custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIdMappingTable(array $args = [])
 * @phpstan-method \Aws\Result updateIdMappingTable(array{
 *     idMappingTableIdentifier?: string,
 *     membershipIdentifier?: string,
 *     description?: string,
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIdMappingTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIdMappingTableAsync(array{
 *     idMappingTableIdentifier?: string,
 *     membershipIdentifier?: string,
 *     description?: string,
 *     kmsKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIdNamespaceAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateIdNamespaceAssociation(array{
 *     idNamespaceAssociationIdentifier?: string,
 *     membershipIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     idMappingConfig?: array{allowUseAsDimensionColumn?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIdNamespaceAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIdNamespaceAssociationAsync(array{
 *     idNamespaceAssociationIdentifier?: string,
 *     membershipIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     idMappingConfig?: array{allowUseAsDimensionColumn?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIntermediateTable(array $args = [])
 * @phpstan-method \Aws\Result updateIntermediateTable(array{
 *     intermediateTableIdentifier?: string,
 *     membershipIdentifier?: string,
 *     description?: string,
 *     kmsKeyArn?: string,
 *     columns?: list<array{name?: string, type?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntermediateTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntermediateTableAsync(array{
 *     intermediateTableIdentifier?: string,
 *     membershipIdentifier?: string,
 *     description?: string,
 *     kmsKeyArn?: string,
 *     columns?: list<array{name?: string, type?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIntermediateTableAnalysisRule(array $args = [])
 * @phpstan-method \Aws\Result updateIntermediateTableAnalysisRule(array{
 *     membershipIdentifier?: string,
 *     intermediateTableIdentifier?: string,
 *     analysisRuleType?: 'CUSTOM',
 *     analysisRulePolicy?: array{v1?: array{custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntermediateTableAnalysisRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntermediateTableAnalysisRuleAsync(array{
 *     membershipIdentifier?: string,
 *     intermediateTableIdentifier?: string,
 *     analysisRuleType?: 'CUSTOM',
 *     analysisRulePolicy?: array{v1?: array{custom?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMembership(array $args = [])
 * @phpstan-method \Aws\Result updateMembership(array{
 *     membershipIdentifier?: string,
 *     queryLogStatus?: 'DISABLED'|'ENABLED',
 *     jobLogStatus?: 'DISABLED'|'ENABLED',
 *     defaultResultConfiguration?: array{outputConfiguration?: array{s3?: array, ...}, roleArn?: string, ...},
 *     defaultJobResultConfiguration?: array{outputConfiguration?: array{s3?: array, ...}, roleArn?: string, ...},
 *     membershipPaymentConfiguration?: array{
 *         queryCompute?: array{isResponsible?: bool, ...},
 *         machineLearning?: array{modelTraining?: array, modelInference?: array, syntheticDataGeneration?: array, ...},
 *         jobCompute?: array{isResponsible?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMembershipAsync(array{
 *     membershipIdentifier?: string,
 *     queryLogStatus?: 'DISABLED'|'ENABLED',
 *     jobLogStatus?: 'DISABLED'|'ENABLED',
 *     defaultResultConfiguration?: array{outputConfiguration?: array{s3?: array, ...}, roleArn?: string, ...},
 *     defaultJobResultConfiguration?: array{outputConfiguration?: array{s3?: array, ...}, roleArn?: string, ...},
 *     membershipPaymentConfiguration?: array{
 *         queryCompute?: array{isResponsible?: bool, ...},
 *         machineLearning?: array{modelTraining?: array, modelInference?: array, syntheticDataGeneration?: array, ...},
 *         jobCompute?: array{isResponsible?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePrivacyBudgetTemplate(array $args = [])
 * @phpstan-method \Aws\Result updatePrivacyBudgetTemplate(array{
 *     membershipIdentifier?: string,
 *     privacyBudgetTemplateIdentifier?: string,
 *     privacyBudgetType?: 'ACCESS_BUDGET'|'DIFFERENTIAL_PRIVACY',
 *     parameters?: array{
 *         differentialPrivacy?: array{epsilon?: int, usersNoisePerQuery?: int, ...},
 *         accessBudget?: array{budgetParameters?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePrivacyBudgetTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePrivacyBudgetTemplateAsync(array{
 *     membershipIdentifier?: string,
 *     privacyBudgetTemplateIdentifier?: string,
 *     privacyBudgetType?: 'ACCESS_BUDGET'|'DIFFERENTIAL_PRIVACY',
 *     parameters?: array{
 *         differentialPrivacy?: array{epsilon?: int, usersNoisePerQuery?: int, ...},
 *         accessBudget?: array{budgetParameters?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProtectedJob(array $args = [])
 * @phpstan-method \Aws\Result updateProtectedJob(array{membershipIdentifier?: string, protectedJobIdentifier?: string, targetStatus?: 'CANCELLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProtectedJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProtectedJobAsync(array{membershipIdentifier?: string, protectedJobIdentifier?: string, targetStatus?: 'CANCELLED', ...} $args = [])
 * @method \Aws\Result updateProtectedQuery(array $args = [])
 * @phpstan-method \Aws\Result updateProtectedQuery(array{membershipIdentifier?: string, protectedQueryIdentifier?: string, targetStatus?: 'CANCELLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProtectedQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProtectedQueryAsync(array{membershipIdentifier?: string, protectedQueryIdentifier?: string, targetStatus?: 'CANCELLED', ...} $args = [])
 */
class CleanRoomsClient extends AwsClient {}
