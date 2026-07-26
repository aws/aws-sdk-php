<?php
namespace Aws\AppSync;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS AppSync** service.
 * @method \Aws\Result associateApi(array $args = [])
 * @phpstan-method \Aws\Result associateApi(array{domainName?: string, apiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateApiAsync(array{domainName?: string, apiId?: string, ...} $args = [])
 * @method \Aws\Result associateMergedGraphqlApi(array $args = [])
 * @phpstan-method \Aws\Result associateMergedGraphqlApi(array{
 *     sourceApiIdentifier?: string,
 *     mergedApiIdentifier?: string,
 *     description?: string,
 *     sourceApiAssociationConfig?: array{mergeType?: 'AUTO_MERGE'|'MANUAL_MERGE', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateMergedGraphqlApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateMergedGraphqlApiAsync(array{
 *     sourceApiIdentifier?: string,
 *     mergedApiIdentifier?: string,
 *     description?: string,
 *     sourceApiAssociationConfig?: array{mergeType?: 'AUTO_MERGE'|'MANUAL_MERGE', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateSourceGraphqlApi(array $args = [])
 * @phpstan-method \Aws\Result associateSourceGraphqlApi(array{
 *     mergedApiIdentifier?: string,
 *     sourceApiIdentifier?: string,
 *     description?: string,
 *     sourceApiAssociationConfig?: array{mergeType?: 'AUTO_MERGE'|'MANUAL_MERGE', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSourceGraphqlApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSourceGraphqlApiAsync(array{
 *     mergedApiIdentifier?: string,
 *     sourceApiIdentifier?: string,
 *     description?: string,
 *     sourceApiAssociationConfig?: array{mergeType?: 'AUTO_MERGE'|'MANUAL_MERGE', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApi(array $args = [])
 * @phpstan-method \Aws\Result createApi(array{
 *     name?: string,
 *     ownerContact?: string,
 *     tags?: array<string, string>,
 *     eventConfig?: array{
 *         authProviders?: list<array>,
 *         connectionAuthModes?: list<array>,
 *         defaultPublishAuthModes?: list<array>,
 *         defaultSubscribeAuthModes?: list<array>,
 *         logConfig?: array{logLevel?: 'ALL'|'DEBUG'|'ERROR'|'INFO'|'NONE', cloudWatchLogsRoleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApiAsync(array{
 *     name?: string,
 *     ownerContact?: string,
 *     tags?: array<string, string>,
 *     eventConfig?: array{
 *         authProviders?: list<array>,
 *         connectionAuthModes?: list<array>,
 *         defaultPublishAuthModes?: list<array>,
 *         defaultSubscribeAuthModes?: list<array>,
 *         logConfig?: array{logLevel?: 'ALL'|'DEBUG'|'ERROR'|'INFO'|'NONE', cloudWatchLogsRoleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApiCache(array $args = [])
 * @phpstan-method \Aws\Result createApiCache(array{
 *     apiId?: string,
 *     ttl?: int,
 *     transitEncryptionEnabled?: bool,
 *     atRestEncryptionEnabled?: bool,
 *     apiCachingBehavior?: 'FULL_REQUEST_CACHING'|'OPERATION_LEVEL_CACHING'|'PER_RESOLVER_CACHING',
 *     type?: 'LARGE'|'LARGE_12X'|'LARGE_2X'|'LARGE_4X'|'LARGE_8X'|'MEDIUM'|'R4_2XLARGE'|'R4_4XLARGE'|'R4_8XLARGE'|'R4_LARGE'|'R4_XLARGE'|'SMALL'|'T2_MEDIUM'|'T2_SMALL'|'XLARGE',
 *     healthMetricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createApiCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApiCacheAsync(array{
 *     apiId?: string,
 *     ttl?: int,
 *     transitEncryptionEnabled?: bool,
 *     atRestEncryptionEnabled?: bool,
 *     apiCachingBehavior?: 'FULL_REQUEST_CACHING'|'OPERATION_LEVEL_CACHING'|'PER_RESOLVER_CACHING',
 *     type?: 'LARGE'|'LARGE_12X'|'LARGE_2X'|'LARGE_4X'|'LARGE_8X'|'MEDIUM'|'R4_2XLARGE'|'R4_4XLARGE'|'R4_8XLARGE'|'R4_LARGE'|'R4_XLARGE'|'SMALL'|'T2_MEDIUM'|'T2_SMALL'|'XLARGE',
 *     healthMetricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createApiKey(array $args = [])
 * @phpstan-method \Aws\Result createApiKey(array{apiId?: string, description?: string, expires?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createApiKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApiKeyAsync(array{apiId?: string, description?: string, expires?: int, ...} $args = [])
 * @method \Aws\Result createChannelNamespace(array $args = [])
 * @phpstan-method \Aws\Result createChannelNamespace(array{
 *     apiId?: string,
 *     name?: string,
 *     subscribeAuthModes?: list<array{authType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT', ...}>,
 *     publishAuthModes?: list<array{authType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT', ...}>,
 *     codeHandlers?: string,
 *     tags?: array<string, string>,
 *     handlerConfigs?: array{
 *         onPublish?: array{behavior?: 'CODE'|'DIRECT', integration?: array, ...},
 *         onSubscribe?: array{behavior?: 'CODE'|'DIRECT', integration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelNamespaceAsync(array{
 *     apiId?: string,
 *     name?: string,
 *     subscribeAuthModes?: list<array{authType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT', ...}>,
 *     publishAuthModes?: list<array{authType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT', ...}>,
 *     codeHandlers?: string,
 *     tags?: array<string, string>,
 *     handlerConfigs?: array{
 *         onPublish?: array{behavior?: 'CODE'|'DIRECT', integration?: array, ...},
 *         onSubscribe?: array{behavior?: 'CODE'|'DIRECT', integration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSource(array $args = [])
 * @phpstan-method \Aws\Result createDataSource(array{
 *     apiId?: string,
 *     name?: string,
 *     description?: string,
 *     type?: 'AMAZON_BEDROCK_RUNTIME'|'AMAZON_DYNAMODB'|'AMAZON_ELASTICSEARCH'|'AMAZON_EVENTBRIDGE'|'AMAZON_OPENSEARCH_SERVICE'|'AWS_LAMBDA'|'HTTP'|'NONE'|'RELATIONAL_DATABASE',
 *     serviceRoleArn?: string,
 *     dynamodbConfig?: array{
 *         tableName?: string,
 *         awsRegion?: string,
 *         useCallerCredentials?: bool,
 *         deltaSyncConfig?: array{baseTableTTL?: int, deltaSyncTableName?: string, deltaSyncTableTTL?: int, ...},
 *         versioned?: bool,
 *         ...,
 *     },
 *     lambdaConfig?: array{lambdaFunctionArn?: string, ...},
 *     elasticsearchConfig?: array{endpoint?: string, awsRegion?: string, ...},
 *     openSearchServiceConfig?: array{endpoint?: string, awsRegion?: string, ...},
 *     httpConfig?: array{
 *         endpoint?: string,
 *         authorizationConfig?: array{authorizationType?: 'AWS_IAM', awsIamConfig?: array, ...},
 *         ...,
 *     },
 *     relationalDatabaseConfig?: array{
 *         relationalDatabaseSourceType?: 'RDS_HTTP_ENDPOINT',
 *         rdsHttpEndpointConfig?: array{
 *             awsRegion?: string,
 *             dbClusterIdentifier?: string,
 *             databaseName?: string,
 *             schema?: string,
 *             awsSecretStoreArn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     eventBridgeConfig?: array{eventBusArn?: string, ...},
 *     metricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSourceAsync(array{
 *     apiId?: string,
 *     name?: string,
 *     description?: string,
 *     type?: 'AMAZON_BEDROCK_RUNTIME'|'AMAZON_DYNAMODB'|'AMAZON_ELASTICSEARCH'|'AMAZON_EVENTBRIDGE'|'AMAZON_OPENSEARCH_SERVICE'|'AWS_LAMBDA'|'HTTP'|'NONE'|'RELATIONAL_DATABASE',
 *     serviceRoleArn?: string,
 *     dynamodbConfig?: array{
 *         tableName?: string,
 *         awsRegion?: string,
 *         useCallerCredentials?: bool,
 *         deltaSyncConfig?: array{baseTableTTL?: int, deltaSyncTableName?: string, deltaSyncTableTTL?: int, ...},
 *         versioned?: bool,
 *         ...,
 *     },
 *     lambdaConfig?: array{lambdaFunctionArn?: string, ...},
 *     elasticsearchConfig?: array{endpoint?: string, awsRegion?: string, ...},
 *     openSearchServiceConfig?: array{endpoint?: string, awsRegion?: string, ...},
 *     httpConfig?: array{
 *         endpoint?: string,
 *         authorizationConfig?: array{authorizationType?: 'AWS_IAM', awsIamConfig?: array, ...},
 *         ...,
 *     },
 *     relationalDatabaseConfig?: array{
 *         relationalDatabaseSourceType?: 'RDS_HTTP_ENDPOINT',
 *         rdsHttpEndpointConfig?: array{
 *             awsRegion?: string,
 *             dbClusterIdentifier?: string,
 *             databaseName?: string,
 *             schema?: string,
 *             awsSecretStoreArn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     eventBridgeConfig?: array{eventBusArn?: string, ...},
 *     metricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomainName(array $args = [])
 * @phpstan-method \Aws\Result createDomainName(array{domainName?: string, certificateArn?: string, description?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainNameAsync(array{domainName?: string, certificateArn?: string, description?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createFunction(array $args = [])
 * @phpstan-method \Aws\Result createFunction(array{
 *     apiId?: string,
 *     name?: string,
 *     description?: string,
 *     dataSourceName?: string,
 *     requestMappingTemplate?: string,
 *     responseMappingTemplate?: string,
 *     functionVersion?: string,
 *     syncConfig?: array{
 *         conflictHandler?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY',
 *         conflictDetection?: 'NONE'|'VERSION',
 *         lambdaConflictHandlerConfig?: array{lambdaConflictHandlerArn?: string, ...},
 *         ...,
 *     },
 *     maxBatchSize?: int,
 *     runtime?: array{name?: 'APPSYNC_JS', runtimeVersion?: string, ...},
 *     code?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFunctionAsync(array{
 *     apiId?: string,
 *     name?: string,
 *     description?: string,
 *     dataSourceName?: string,
 *     requestMappingTemplate?: string,
 *     responseMappingTemplate?: string,
 *     functionVersion?: string,
 *     syncConfig?: array{
 *         conflictHandler?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY',
 *         conflictDetection?: 'NONE'|'VERSION',
 *         lambdaConflictHandlerConfig?: array{lambdaConflictHandlerArn?: string, ...},
 *         ...,
 *     },
 *     maxBatchSize?: int,
 *     runtime?: array{name?: 'APPSYNC_JS', runtimeVersion?: string, ...},
 *     code?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGraphqlApi(array $args = [])
 * @phpstan-method \Aws\Result createGraphqlApi(array{
 *     name?: string,
 *     logConfig?: array{
 *         fieldLogLevel?: 'ALL'|'DEBUG'|'ERROR'|'INFO'|'NONE',
 *         cloudWatchLogsRoleArn?: string,
 *         excludeVerboseContent?: bool,
 *         ...,
 *     },
 *     authenticationType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT',
 *     userPoolConfig?: array{userPoolId?: string, awsRegion?: string, defaultAction?: 'ALLOW'|'DENY', appIdClientRegex?: string, ...},
 *     openIDConnectConfig?: array{issuer?: string, clientId?: string, iatTTL?: int, authTTL?: int, ...},
 *     tags?: array<string, string>,
 *     additionalAuthenticationProviders?: list<array{
 *         authenticationType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT',
 *         openIDConnectConfig?: array,
 *         userPoolConfig?: array,
 *         lambdaAuthorizerConfig?: array,
 *         ...,
 *     }>,
 *     xrayEnabled?: bool,
 *     lambdaAuthorizerConfig?: array{authorizerResultTtlInSeconds?: int, authorizerUri?: string, identityValidationExpression?: string, ...},
 *     apiType?: 'GRAPHQL'|'MERGED',
 *     mergedApiExecutionRoleArn?: string,
 *     visibility?: 'GLOBAL'|'PRIVATE',
 *     ownerContact?: string,
 *     introspectionConfig?: 'DISABLED'|'ENABLED',
 *     queryDepthLimit?: int,
 *     resolverCountLimit?: int,
 *     enhancedMetricsConfig?: array{
 *         resolverLevelMetricsBehavior?: 'FULL_REQUEST_RESOLVER_METRICS'|'PER_RESOLVER_METRICS',
 *         dataSourceLevelMetricsBehavior?: 'FULL_REQUEST_DATA_SOURCE_METRICS'|'PER_DATA_SOURCE_METRICS',
 *         operationLevelMetricsConfig?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGraphqlApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGraphqlApiAsync(array{
 *     name?: string,
 *     logConfig?: array{
 *         fieldLogLevel?: 'ALL'|'DEBUG'|'ERROR'|'INFO'|'NONE',
 *         cloudWatchLogsRoleArn?: string,
 *         excludeVerboseContent?: bool,
 *         ...,
 *     },
 *     authenticationType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT',
 *     userPoolConfig?: array{userPoolId?: string, awsRegion?: string, defaultAction?: 'ALLOW'|'DENY', appIdClientRegex?: string, ...},
 *     openIDConnectConfig?: array{issuer?: string, clientId?: string, iatTTL?: int, authTTL?: int, ...},
 *     tags?: array<string, string>,
 *     additionalAuthenticationProviders?: list<array{
 *         authenticationType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT',
 *         openIDConnectConfig?: array,
 *         userPoolConfig?: array,
 *         lambdaAuthorizerConfig?: array,
 *         ...,
 *     }>,
 *     xrayEnabled?: bool,
 *     lambdaAuthorizerConfig?: array{authorizerResultTtlInSeconds?: int, authorizerUri?: string, identityValidationExpression?: string, ...},
 *     apiType?: 'GRAPHQL'|'MERGED',
 *     mergedApiExecutionRoleArn?: string,
 *     visibility?: 'GLOBAL'|'PRIVATE',
 *     ownerContact?: string,
 *     introspectionConfig?: 'DISABLED'|'ENABLED',
 *     queryDepthLimit?: int,
 *     resolverCountLimit?: int,
 *     enhancedMetricsConfig?: array{
 *         resolverLevelMetricsBehavior?: 'FULL_REQUEST_RESOLVER_METRICS'|'PER_RESOLVER_METRICS',
 *         dataSourceLevelMetricsBehavior?: 'FULL_REQUEST_DATA_SOURCE_METRICS'|'PER_DATA_SOURCE_METRICS',
 *         operationLevelMetricsConfig?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResolver(array $args = [])
 * @phpstan-method \Aws\Result createResolver(array{
 *     apiId?: string,
 *     typeName?: string,
 *     fieldName?: string,
 *     dataSourceName?: string,
 *     requestMappingTemplate?: string,
 *     responseMappingTemplate?: string,
 *     kind?: 'PIPELINE'|'UNIT',
 *     pipelineConfig?: array{functions?: list<string>, ...},
 *     syncConfig?: array{
 *         conflictHandler?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY',
 *         conflictDetection?: 'NONE'|'VERSION',
 *         lambdaConflictHandlerConfig?: array{lambdaConflictHandlerArn?: string, ...},
 *         ...,
 *     },
 *     cachingConfig?: array{ttl?: int, cachingKeys?: list<string>, ...},
 *     maxBatchSize?: int,
 *     runtime?: array{name?: 'APPSYNC_JS', runtimeVersion?: string, ...},
 *     code?: string,
 *     metricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResolverAsync(array{
 *     apiId?: string,
 *     typeName?: string,
 *     fieldName?: string,
 *     dataSourceName?: string,
 *     requestMappingTemplate?: string,
 *     responseMappingTemplate?: string,
 *     kind?: 'PIPELINE'|'UNIT',
 *     pipelineConfig?: array{functions?: list<string>, ...},
 *     syncConfig?: array{
 *         conflictHandler?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY',
 *         conflictDetection?: 'NONE'|'VERSION',
 *         lambdaConflictHandlerConfig?: array{lambdaConflictHandlerArn?: string, ...},
 *         ...,
 *     },
 *     cachingConfig?: array{ttl?: int, cachingKeys?: list<string>, ...},
 *     maxBatchSize?: int,
 *     runtime?: array{name?: 'APPSYNC_JS', runtimeVersion?: string, ...},
 *     code?: string,
 *     metricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createType(array $args = [])
 * @phpstan-method \Aws\Result createType(array{apiId?: string, definition?: string, format?: 'JSON'|'SDL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTypeAsync(array{apiId?: string, definition?: string, format?: 'JSON'|'SDL', ...} $args = [])
 * @method \Aws\Result deleteApi(array $args = [])
 * @phpstan-method \Aws\Result deleteApi(array{apiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApiAsync(array{apiId?: string, ...} $args = [])
 * @method \Aws\Result deleteApiCache(array $args = [])
 * @phpstan-method \Aws\Result deleteApiCache(array{apiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApiCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApiCacheAsync(array{apiId?: string, ...} $args = [])
 * @method \Aws\Result deleteApiKey(array $args = [])
 * @phpstan-method \Aws\Result deleteApiKey(array{apiId?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteApiKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApiKeyAsync(array{apiId?: string, id?: string, ...} $args = [])
 * @method \Aws\Result deleteChannelNamespace(array $args = [])
 * @phpstan-method \Aws\Result deleteChannelNamespace(array{apiId?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteChannelNamespaceAsync(array{apiId?: string, name?: string, ...} $args = [])
 * @method \Aws\Result deleteDataSource(array $args = [])
 * @phpstan-method \Aws\Result deleteDataSource(array{apiId?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array{apiId?: string, name?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainName(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainName(array{domainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainNameAsync(array{domainName?: string, ...} $args = [])
 * @method \Aws\Result deleteFunction(array $args = [])
 * @phpstan-method \Aws\Result deleteFunction(array{apiId?: string, functionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFunctionAsync(array{apiId?: string, functionId?: string, ...} $args = [])
 * @method \Aws\Result deleteGraphqlApi(array $args = [])
 * @phpstan-method \Aws\Result deleteGraphqlApi(array{apiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGraphqlApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGraphqlApiAsync(array{apiId?: string, ...} $args = [])
 * @method \Aws\Result deleteResolver(array $args = [])
 * @phpstan-method \Aws\Result deleteResolver(array{apiId?: string, typeName?: string, fieldName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResolverAsync(array{apiId?: string, typeName?: string, fieldName?: string, ...} $args = [])
 * @method \Aws\Result deleteType(array $args = [])
 * @phpstan-method \Aws\Result deleteType(array{apiId?: string, typeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTypeAsync(array{apiId?: string, typeName?: string, ...} $args = [])
 * @method \Aws\Result disassociateApi(array $args = [])
 * @phpstan-method \Aws\Result disassociateApi(array{domainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateApiAsync(array{domainName?: string, ...} $args = [])
 * @method \Aws\Result disassociateMergedGraphqlApi(array $args = [])
 * @phpstan-method \Aws\Result disassociateMergedGraphqlApi(array{sourceApiIdentifier?: string, associationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMergedGraphqlApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMergedGraphqlApiAsync(array{sourceApiIdentifier?: string, associationId?: string, ...} $args = [])
 * @method \Aws\Result disassociateSourceGraphqlApi(array $args = [])
 * @phpstan-method \Aws\Result disassociateSourceGraphqlApi(array{mergedApiIdentifier?: string, associationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSourceGraphqlApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSourceGraphqlApiAsync(array{mergedApiIdentifier?: string, associationId?: string, ...} $args = [])
 * @method \Aws\Result evaluateCode(array $args = [])
 * @phpstan-method \Aws\Result evaluateCode(array{
 *     runtime?: array{name?: 'APPSYNC_JS', runtimeVersion?: string, ...},
 *     code?: string,
 *     context?: string,
 *     function?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise evaluateCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise evaluateCodeAsync(array{
 *     runtime?: array{name?: 'APPSYNC_JS', runtimeVersion?: string, ...},
 *     code?: string,
 *     context?: string,
 *     function?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result evaluateMappingTemplate(array $args = [])
 * @phpstan-method \Aws\Result evaluateMappingTemplate(array{template?: string, context?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise evaluateMappingTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise evaluateMappingTemplateAsync(array{template?: string, context?: string, ...} $args = [])
 * @method \Aws\Result flushApiCache(array $args = [])
 * @phpstan-method \Aws\Result flushApiCache(array{apiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise flushApiCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise flushApiCacheAsync(array{apiId?: string, ...} $args = [])
 * @method \Aws\Result getApiResource(array $args = [])
 * @phpstan-method \Aws\Result getApiResource(array{apiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApiResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApiResourceAsync(array{apiId?: string, ...} $args = [])
 * @method \Aws\Result getApiAssociation(array $args = [])
 * @phpstan-method \Aws\Result getApiAssociation(array{domainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApiAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApiAssociationAsync(array{domainName?: string, ...} $args = [])
 * @method \Aws\Result getApiCache(array $args = [])
 * @phpstan-method \Aws\Result getApiCache(array{apiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getApiCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApiCacheAsync(array{apiId?: string, ...} $args = [])
 * @method \Aws\Result getChannelNamespace(array $args = [])
 * @phpstan-method \Aws\Result getChannelNamespace(array{apiId?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChannelNamespaceAsync(array{apiId?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getDataSource(array $args = [])
 * @phpstan-method \Aws\Result getDataSource(array{apiId?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSourceAsync(array{apiId?: string, name?: string, ...} $args = [])
 * @method \Aws\Result getDataSourceIntrospection(array $args = [])
 * @phpstan-method \Aws\Result getDataSourceIntrospection(array{introspectionId?: string, includeModelsSDL?: bool, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSourceIntrospectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSourceIntrospectionAsync(array{introspectionId?: string, includeModelsSDL?: bool, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getDomainName(array $args = [])
 * @phpstan-method \Aws\Result getDomainName(array{domainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainNameAsync(array{domainName?: string, ...} $args = [])
 * @method \Aws\Result getFunction(array $args = [])
 * @phpstan-method \Aws\Result getFunction(array{apiId?: string, functionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFunctionAsync(array{apiId?: string, functionId?: string, ...} $args = [])
 * @method \Aws\Result getGraphqlApi(array $args = [])
 * @phpstan-method \Aws\Result getGraphqlApi(array{apiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGraphqlApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGraphqlApiAsync(array{apiId?: string, ...} $args = [])
 * @method \Aws\Result getGraphqlApiEnvironmentVariables(array $args = [])
 * @phpstan-method \Aws\Result getGraphqlApiEnvironmentVariables(array{apiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGraphqlApiEnvironmentVariablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGraphqlApiEnvironmentVariablesAsync(array{apiId?: string, ...} $args = [])
 * @method \Aws\Result getIntrospectionSchema(array $args = [])
 * @phpstan-method \Aws\Result getIntrospectionSchema(array{apiId?: string, format?: 'JSON'|'SDL', includeDirectives?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntrospectionSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntrospectionSchemaAsync(array{apiId?: string, format?: 'JSON'|'SDL', includeDirectives?: bool, ...} $args = [])
 * @method \Aws\Result getResolver(array $args = [])
 * @phpstan-method \Aws\Result getResolver(array{apiId?: string, typeName?: string, fieldName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResolverAsync(array{apiId?: string, typeName?: string, fieldName?: string, ...} $args = [])
 * @method \Aws\Result getSchemaCreationStatus(array $args = [])
 * @phpstan-method \Aws\Result getSchemaCreationStatus(array{apiId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSchemaCreationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSchemaCreationStatusAsync(array{apiId?: string, ...} $args = [])
 * @method \Aws\Result getSourceApiAssociation(array $args = [])
 * @phpstan-method \Aws\Result getSourceApiAssociation(array{mergedApiIdentifier?: string, associationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSourceApiAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSourceApiAssociationAsync(array{mergedApiIdentifier?: string, associationId?: string, ...} $args = [])
 * @method \Aws\Result getType(array $args = [])
 * @phpstan-method \Aws\Result getType(array{apiId?: string, typeName?: string, format?: 'JSON'|'SDL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTypeAsync(array{apiId?: string, typeName?: string, format?: 'JSON'|'SDL', ...} $args = [])
 * @method \Aws\Result listApiKeys(array $args = [])
 * @phpstan-method \Aws\Result listApiKeys(array{apiId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApiKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApiKeysAsync(array{apiId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listApis(array $args = [])
 * @phpstan-method \Aws\Result listApis(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listApisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApisAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listChannelNamespaces(array $args = [])
 * @phpstan-method \Aws\Result listChannelNamespaces(array{apiId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelNamespacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelNamespacesAsync(array{apiId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDataSources(array $args = [])
 * @phpstan-method \Aws\Result listDataSources(array{apiId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array{apiId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDomainNames(array $args = [])
 * @phpstan-method \Aws\Result listDomainNames(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainNamesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainNamesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listFunctions(array $args = [])
 * @phpstan-method \Aws\Result listFunctions(array{apiId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFunctionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFunctionsAsync(array{apiId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listGraphqlApis(array $args = [])
 * @phpstan-method \Aws\Result listGraphqlApis(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     apiType?: 'GRAPHQL'|'MERGED',
 *     owner?: 'CURRENT_ACCOUNT'|'OTHER_ACCOUNTS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGraphqlApisAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGraphqlApisAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     apiType?: 'GRAPHQL'|'MERGED',
 *     owner?: 'CURRENT_ACCOUNT'|'OTHER_ACCOUNTS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResolvers(array $args = [])
 * @phpstan-method \Aws\Result listResolvers(array{apiId?: string, typeName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolversAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResolversAsync(array{apiId?: string, typeName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listResolversByFunction(array $args = [])
 * @phpstan-method \Aws\Result listResolversByFunction(array{apiId?: string, functionId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResolversByFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResolversByFunctionAsync(array{apiId?: string, functionId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSourceApiAssociations(array $args = [])
 * @phpstan-method \Aws\Result listSourceApiAssociations(array{apiId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSourceApiAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSourceApiAssociationsAsync(array{apiId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTypes(array $args = [])
 * @phpstan-method \Aws\Result listTypes(array{apiId?: string, format?: 'JSON'|'SDL', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTypesAsync(array{apiId?: string, format?: 'JSON'|'SDL', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTypesByAssociation(array $args = [])
 * @phpstan-method \Aws\Result listTypesByAssociation(array{
 *     mergedApiIdentifier?: string,
 *     associationId?: string,
 *     format?: 'JSON'|'SDL',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTypesByAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTypesByAssociationAsync(array{
 *     mergedApiIdentifier?: string,
 *     associationId?: string,
 *     format?: 'JSON'|'SDL',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putGraphqlApiEnvironmentVariables(array $args = [])
 * @phpstan-method \Aws\Result putGraphqlApiEnvironmentVariables(array{apiId?: string, environmentVariables?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putGraphqlApiEnvironmentVariablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putGraphqlApiEnvironmentVariablesAsync(array{apiId?: string, environmentVariables?: array<string, string>, ...} $args = [])
 * @method \Aws\Result startDataSourceIntrospection(array $args = [])
 * @phpstan-method \Aws\Result startDataSourceIntrospection(array{rdsDataApiConfig?: array{resourceArn?: string, secretArn?: string, databaseName?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataSourceIntrospectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDataSourceIntrospectionAsync(array{rdsDataApiConfig?: array{resourceArn?: string, secretArn?: string, databaseName?: string, ...}, ...} $args = [])
 * @method \Aws\Result startSchemaCreation(array $args = [])
 * @phpstan-method \Aws\Result startSchemaCreation(array{apiId?: string, definition?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startSchemaCreationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSchemaCreationAsync(array{apiId?: string, definition?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \Aws\Result startSchemaMerge(array $args = [])
 * @phpstan-method \Aws\Result startSchemaMerge(array{associationId?: string, mergedApiIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startSchemaMergeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSchemaMergeAsync(array{associationId?: string, mergedApiIdentifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateApi(array $args = [])
 * @phpstan-method \Aws\Result updateApi(array{
 *     apiId?: string,
 *     name?: string,
 *     ownerContact?: string,
 *     eventConfig?: array{
 *         authProviders?: list<array>,
 *         connectionAuthModes?: list<array>,
 *         defaultPublishAuthModes?: list<array>,
 *         defaultSubscribeAuthModes?: list<array>,
 *         logConfig?: array{logLevel?: 'ALL'|'DEBUG'|'ERROR'|'INFO'|'NONE', cloudWatchLogsRoleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApiAsync(array{
 *     apiId?: string,
 *     name?: string,
 *     ownerContact?: string,
 *     eventConfig?: array{
 *         authProviders?: list<array>,
 *         connectionAuthModes?: list<array>,
 *         defaultPublishAuthModes?: list<array>,
 *         defaultSubscribeAuthModes?: list<array>,
 *         logConfig?: array{logLevel?: 'ALL'|'DEBUG'|'ERROR'|'INFO'|'NONE', cloudWatchLogsRoleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApiCache(array $args = [])
 * @phpstan-method \Aws\Result updateApiCache(array{
 *     apiId?: string,
 *     ttl?: int,
 *     apiCachingBehavior?: 'FULL_REQUEST_CACHING'|'OPERATION_LEVEL_CACHING'|'PER_RESOLVER_CACHING',
 *     type?: 'LARGE'|'LARGE_12X'|'LARGE_2X'|'LARGE_4X'|'LARGE_8X'|'MEDIUM'|'R4_2XLARGE'|'R4_4XLARGE'|'R4_8XLARGE'|'R4_LARGE'|'R4_XLARGE'|'SMALL'|'T2_MEDIUM'|'T2_SMALL'|'XLARGE',
 *     healthMetricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApiCacheAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApiCacheAsync(array{
 *     apiId?: string,
 *     ttl?: int,
 *     apiCachingBehavior?: 'FULL_REQUEST_CACHING'|'OPERATION_LEVEL_CACHING'|'PER_RESOLVER_CACHING',
 *     type?: 'LARGE'|'LARGE_12X'|'LARGE_2X'|'LARGE_4X'|'LARGE_8X'|'MEDIUM'|'R4_2XLARGE'|'R4_4XLARGE'|'R4_8XLARGE'|'R4_LARGE'|'R4_XLARGE'|'SMALL'|'T2_MEDIUM'|'T2_SMALL'|'XLARGE',
 *     healthMetricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateApiKey(array $args = [])
 * @phpstan-method \Aws\Result updateApiKey(array{apiId?: string, id?: string, description?: string, expires?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateApiKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApiKeyAsync(array{apiId?: string, id?: string, description?: string, expires?: int, ...} $args = [])
 * @method \Aws\Result updateChannelNamespace(array $args = [])
 * @phpstan-method \Aws\Result updateChannelNamespace(array{
 *     apiId?: string,
 *     name?: string,
 *     subscribeAuthModes?: list<array{authType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT', ...}>,
 *     publishAuthModes?: list<array{authType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT', ...}>,
 *     codeHandlers?: string,
 *     handlerConfigs?: array{
 *         onPublish?: array{behavior?: 'CODE'|'DIRECT', integration?: array, ...},
 *         onSubscribe?: array{behavior?: 'CODE'|'DIRECT', integration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChannelNamespaceAsync(array{
 *     apiId?: string,
 *     name?: string,
 *     subscribeAuthModes?: list<array{authType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT', ...}>,
 *     publishAuthModes?: list<array{authType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT', ...}>,
 *     codeHandlers?: string,
 *     handlerConfigs?: array{
 *         onPublish?: array{behavior?: 'CODE'|'DIRECT', integration?: array, ...},
 *         onSubscribe?: array{behavior?: 'CODE'|'DIRECT', integration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataSource(array $args = [])
 * @phpstan-method \Aws\Result updateDataSource(array{
 *     apiId?: string,
 *     name?: string,
 *     description?: string,
 *     type?: 'AMAZON_BEDROCK_RUNTIME'|'AMAZON_DYNAMODB'|'AMAZON_ELASTICSEARCH'|'AMAZON_EVENTBRIDGE'|'AMAZON_OPENSEARCH_SERVICE'|'AWS_LAMBDA'|'HTTP'|'NONE'|'RELATIONAL_DATABASE',
 *     serviceRoleArn?: string,
 *     dynamodbConfig?: array{
 *         tableName?: string,
 *         awsRegion?: string,
 *         useCallerCredentials?: bool,
 *         deltaSyncConfig?: array{baseTableTTL?: int, deltaSyncTableName?: string, deltaSyncTableTTL?: int, ...},
 *         versioned?: bool,
 *         ...,
 *     },
 *     lambdaConfig?: array{lambdaFunctionArn?: string, ...},
 *     elasticsearchConfig?: array{endpoint?: string, awsRegion?: string, ...},
 *     openSearchServiceConfig?: array{endpoint?: string, awsRegion?: string, ...},
 *     httpConfig?: array{
 *         endpoint?: string,
 *         authorizationConfig?: array{authorizationType?: 'AWS_IAM', awsIamConfig?: array, ...},
 *         ...,
 *     },
 *     relationalDatabaseConfig?: array{
 *         relationalDatabaseSourceType?: 'RDS_HTTP_ENDPOINT',
 *         rdsHttpEndpointConfig?: array{
 *             awsRegion?: string,
 *             dbClusterIdentifier?: string,
 *             databaseName?: string,
 *             schema?: string,
 *             awsSecretStoreArn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     eventBridgeConfig?: array{eventBusArn?: string, ...},
 *     metricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array{
 *     apiId?: string,
 *     name?: string,
 *     description?: string,
 *     type?: 'AMAZON_BEDROCK_RUNTIME'|'AMAZON_DYNAMODB'|'AMAZON_ELASTICSEARCH'|'AMAZON_EVENTBRIDGE'|'AMAZON_OPENSEARCH_SERVICE'|'AWS_LAMBDA'|'HTTP'|'NONE'|'RELATIONAL_DATABASE',
 *     serviceRoleArn?: string,
 *     dynamodbConfig?: array{
 *         tableName?: string,
 *         awsRegion?: string,
 *         useCallerCredentials?: bool,
 *         deltaSyncConfig?: array{baseTableTTL?: int, deltaSyncTableName?: string, deltaSyncTableTTL?: int, ...},
 *         versioned?: bool,
 *         ...,
 *     },
 *     lambdaConfig?: array{lambdaFunctionArn?: string, ...},
 *     elasticsearchConfig?: array{endpoint?: string, awsRegion?: string, ...},
 *     openSearchServiceConfig?: array{endpoint?: string, awsRegion?: string, ...},
 *     httpConfig?: array{
 *         endpoint?: string,
 *         authorizationConfig?: array{authorizationType?: 'AWS_IAM', awsIamConfig?: array, ...},
 *         ...,
 *     },
 *     relationalDatabaseConfig?: array{
 *         relationalDatabaseSourceType?: 'RDS_HTTP_ENDPOINT',
 *         rdsHttpEndpointConfig?: array{
 *             awsRegion?: string,
 *             dbClusterIdentifier?: string,
 *             databaseName?: string,
 *             schema?: string,
 *             awsSecretStoreArn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     eventBridgeConfig?: array{eventBusArn?: string, ...},
 *     metricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomainName(array $args = [])
 * @phpstan-method \Aws\Result updateDomainName(array{domainName?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainNameAsync(array{domainName?: string, description?: string, ...} $args = [])
 * @method \Aws\Result updateFunction(array $args = [])
 * @phpstan-method \Aws\Result updateFunction(array{
 *     apiId?: string,
 *     name?: string,
 *     description?: string,
 *     functionId?: string,
 *     dataSourceName?: string,
 *     requestMappingTemplate?: string,
 *     responseMappingTemplate?: string,
 *     functionVersion?: string,
 *     syncConfig?: array{
 *         conflictHandler?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY',
 *         conflictDetection?: 'NONE'|'VERSION',
 *         lambdaConflictHandlerConfig?: array{lambdaConflictHandlerArn?: string, ...},
 *         ...,
 *     },
 *     maxBatchSize?: int,
 *     runtime?: array{name?: 'APPSYNC_JS', runtimeVersion?: string, ...},
 *     code?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFunctionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFunctionAsync(array{
 *     apiId?: string,
 *     name?: string,
 *     description?: string,
 *     functionId?: string,
 *     dataSourceName?: string,
 *     requestMappingTemplate?: string,
 *     responseMappingTemplate?: string,
 *     functionVersion?: string,
 *     syncConfig?: array{
 *         conflictHandler?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY',
 *         conflictDetection?: 'NONE'|'VERSION',
 *         lambdaConflictHandlerConfig?: array{lambdaConflictHandlerArn?: string, ...},
 *         ...,
 *     },
 *     maxBatchSize?: int,
 *     runtime?: array{name?: 'APPSYNC_JS', runtimeVersion?: string, ...},
 *     code?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGraphqlApi(array $args = [])
 * @phpstan-method \Aws\Result updateGraphqlApi(array{
 *     apiId?: string,
 *     name?: string,
 *     logConfig?: array{
 *         fieldLogLevel?: 'ALL'|'DEBUG'|'ERROR'|'INFO'|'NONE',
 *         cloudWatchLogsRoleArn?: string,
 *         excludeVerboseContent?: bool,
 *         ...,
 *     },
 *     authenticationType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT',
 *     userPoolConfig?: array{userPoolId?: string, awsRegion?: string, defaultAction?: 'ALLOW'|'DENY', appIdClientRegex?: string, ...},
 *     openIDConnectConfig?: array{issuer?: string, clientId?: string, iatTTL?: int, authTTL?: int, ...},
 *     additionalAuthenticationProviders?: list<array{
 *         authenticationType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT',
 *         openIDConnectConfig?: array,
 *         userPoolConfig?: array,
 *         lambdaAuthorizerConfig?: array,
 *         ...,
 *     }>,
 *     xrayEnabled?: bool,
 *     lambdaAuthorizerConfig?: array{authorizerResultTtlInSeconds?: int, authorizerUri?: string, identityValidationExpression?: string, ...},
 *     mergedApiExecutionRoleArn?: string,
 *     ownerContact?: string,
 *     introspectionConfig?: 'DISABLED'|'ENABLED',
 *     queryDepthLimit?: int,
 *     resolverCountLimit?: int,
 *     enhancedMetricsConfig?: array{
 *         resolverLevelMetricsBehavior?: 'FULL_REQUEST_RESOLVER_METRICS'|'PER_RESOLVER_METRICS',
 *         dataSourceLevelMetricsBehavior?: 'FULL_REQUEST_DATA_SOURCE_METRICS'|'PER_DATA_SOURCE_METRICS',
 *         operationLevelMetricsConfig?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGraphqlApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGraphqlApiAsync(array{
 *     apiId?: string,
 *     name?: string,
 *     logConfig?: array{
 *         fieldLogLevel?: 'ALL'|'DEBUG'|'ERROR'|'INFO'|'NONE',
 *         cloudWatchLogsRoleArn?: string,
 *         excludeVerboseContent?: bool,
 *         ...,
 *     },
 *     authenticationType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT',
 *     userPoolConfig?: array{userPoolId?: string, awsRegion?: string, defaultAction?: 'ALLOW'|'DENY', appIdClientRegex?: string, ...},
 *     openIDConnectConfig?: array{issuer?: string, clientId?: string, iatTTL?: int, authTTL?: int, ...},
 *     additionalAuthenticationProviders?: list<array{
 *         authenticationType?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'AWS_LAMBDA'|'OPENID_CONNECT',
 *         openIDConnectConfig?: array,
 *         userPoolConfig?: array,
 *         lambdaAuthorizerConfig?: array,
 *         ...,
 *     }>,
 *     xrayEnabled?: bool,
 *     lambdaAuthorizerConfig?: array{authorizerResultTtlInSeconds?: int, authorizerUri?: string, identityValidationExpression?: string, ...},
 *     mergedApiExecutionRoleArn?: string,
 *     ownerContact?: string,
 *     introspectionConfig?: 'DISABLED'|'ENABLED',
 *     queryDepthLimit?: int,
 *     resolverCountLimit?: int,
 *     enhancedMetricsConfig?: array{
 *         resolverLevelMetricsBehavior?: 'FULL_REQUEST_RESOLVER_METRICS'|'PER_RESOLVER_METRICS',
 *         dataSourceLevelMetricsBehavior?: 'FULL_REQUEST_DATA_SOURCE_METRICS'|'PER_DATA_SOURCE_METRICS',
 *         operationLevelMetricsConfig?: 'DISABLED'|'ENABLED',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResolver(array $args = [])
 * @phpstan-method \Aws\Result updateResolver(array{
 *     apiId?: string,
 *     typeName?: string,
 *     fieldName?: string,
 *     dataSourceName?: string,
 *     requestMappingTemplate?: string,
 *     responseMappingTemplate?: string,
 *     kind?: 'PIPELINE'|'UNIT',
 *     pipelineConfig?: array{functions?: list<string>, ...},
 *     syncConfig?: array{
 *         conflictHandler?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY',
 *         conflictDetection?: 'NONE'|'VERSION',
 *         lambdaConflictHandlerConfig?: array{lambdaConflictHandlerArn?: string, ...},
 *         ...,
 *     },
 *     cachingConfig?: array{ttl?: int, cachingKeys?: list<string>, ...},
 *     maxBatchSize?: int,
 *     runtime?: array{name?: 'APPSYNC_JS', runtimeVersion?: string, ...},
 *     code?: string,
 *     metricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResolverAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResolverAsync(array{
 *     apiId?: string,
 *     typeName?: string,
 *     fieldName?: string,
 *     dataSourceName?: string,
 *     requestMappingTemplate?: string,
 *     responseMappingTemplate?: string,
 *     kind?: 'PIPELINE'|'UNIT',
 *     pipelineConfig?: array{functions?: list<string>, ...},
 *     syncConfig?: array{
 *         conflictHandler?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY',
 *         conflictDetection?: 'NONE'|'VERSION',
 *         lambdaConflictHandlerConfig?: array{lambdaConflictHandlerArn?: string, ...},
 *         ...,
 *     },
 *     cachingConfig?: array{ttl?: int, cachingKeys?: list<string>, ...},
 *     maxBatchSize?: int,
 *     runtime?: array{name?: 'APPSYNC_JS', runtimeVersion?: string, ...},
 *     code?: string,
 *     metricsConfig?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSourceApiAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateSourceApiAssociation(array{
 *     associationId?: string,
 *     mergedApiIdentifier?: string,
 *     description?: string,
 *     sourceApiAssociationConfig?: array{mergeType?: 'AUTO_MERGE'|'MANUAL_MERGE', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSourceApiAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSourceApiAssociationAsync(array{
 *     associationId?: string,
 *     mergedApiIdentifier?: string,
 *     description?: string,
 *     sourceApiAssociationConfig?: array{mergeType?: 'AUTO_MERGE'|'MANUAL_MERGE', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateType(array $args = [])
 * @phpstan-method \Aws\Result updateType(array{apiId?: string, typeName?: string, definition?: string, format?: 'JSON'|'SDL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTypeAsync(array{apiId?: string, typeName?: string, definition?: string, format?: 'JSON'|'SDL', ...} $args = [])
 */
class AppSyncClient extends AwsClient {}
