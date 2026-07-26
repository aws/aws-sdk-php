<?php
namespace Aws\BedrockAgent;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Agents for Amazon Bedrock** service.
 * @method \Aws\Result associateAgentCollaborator(array $args = [])
 * @phpstan-method \Aws\Result associateAgentCollaborator(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     agentDescriptor?: array{aliasArn?: string, ...},
 *     collaboratorName?: string,
 *     collaborationInstruction?: string,
 *     relayConversationHistory?: 'DISABLED'|'TO_COLLABORATOR',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAgentCollaboratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAgentCollaboratorAsync(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     agentDescriptor?: array{aliasArn?: string, ...},
 *     collaboratorName?: string,
 *     collaborationInstruction?: string,
 *     relayConversationHistory?: 'DISABLED'|'TO_COLLABORATOR',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateAgentKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result associateAgentKnowledgeBase(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     knowledgeBaseId?: string,
 *     description?: string,
 *     knowledgeBaseState?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAgentKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAgentKnowledgeBaseAsync(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     knowledgeBaseId?: string,
 *     description?: string,
 *     knowledgeBaseState?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgent(array $args = [])
 * @phpstan-method \Aws\Result createAgent(array{
 *     agentName?: string,
 *     clientToken?: string,
 *     instruction?: string,
 *     foundationModel?: string,
 *     description?: string,
 *     orchestrationType?: 'CUSTOM_ORCHESTRATION'|'DEFAULT',
 *     customOrchestration?: array{executor?: array{lambda?: string, ...}, ...},
 *     idleSessionTTLInSeconds?: int,
 *     agentResourceRoleArn?: string,
 *     customerEncryptionKeyArn?: string,
 *     tags?: array<string, string>,
 *     promptOverrideConfiguration?: array{promptConfigurations?: list<array>, overrideLambda?: string, ...},
 *     guardrailConfiguration?: array{guardrailIdentifier?: string, guardrailVersion?: string, ...},
 *     memoryConfiguration?: array{
 *         enabledMemoryTypes?: list<'SESSION_SUMMARY'>,
 *         storageDays?: int,
 *         sessionSummaryConfiguration?: array{maxRecentSessions?: int, ...},
 *         ...,
 *     },
 *     agentCollaboration?: 'DISABLED'|'SUPERVISOR'|'SUPERVISOR_ROUTER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentAsync(array{
 *     agentName?: string,
 *     clientToken?: string,
 *     instruction?: string,
 *     foundationModel?: string,
 *     description?: string,
 *     orchestrationType?: 'CUSTOM_ORCHESTRATION'|'DEFAULT',
 *     customOrchestration?: array{executor?: array{lambda?: string, ...}, ...},
 *     idleSessionTTLInSeconds?: int,
 *     agentResourceRoleArn?: string,
 *     customerEncryptionKeyArn?: string,
 *     tags?: array<string, string>,
 *     promptOverrideConfiguration?: array{promptConfigurations?: list<array>, overrideLambda?: string, ...},
 *     guardrailConfiguration?: array{guardrailIdentifier?: string, guardrailVersion?: string, ...},
 *     memoryConfiguration?: array{
 *         enabledMemoryTypes?: list<'SESSION_SUMMARY'>,
 *         storageDays?: int,
 *         sessionSummaryConfiguration?: array{maxRecentSessions?: int, ...},
 *         ...,
 *     },
 *     agentCollaboration?: 'DISABLED'|'SUPERVISOR'|'SUPERVISOR_ROUTER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgentActionGroup(array $args = [])
 * @phpstan-method \Aws\Result createAgentActionGroup(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     actionGroupName?: string,
 *     clientToken?: string,
 *     description?: string,
 *     parentActionGroupSignature?: 'AMAZON.CodeInterpreter'|'AMAZON.UserInput'|'ANTHROPIC.Bash'|'ANTHROPIC.Computer'|'ANTHROPIC.TextEditor',
 *     parentActionGroupSignatureParams?: array<string, string>,
 *     actionGroupExecutor?: array{lambda?: string, customControl?: 'RETURN_CONTROL', ...},
 *     apiSchema?: array{s3?: array{s3BucketName?: string, s3ObjectKey?: string, ...}, payload?: string, ...},
 *     actionGroupState?: 'DISABLED'|'ENABLED',
 *     functionSchema?: array{functions?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentActionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentActionGroupAsync(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     actionGroupName?: string,
 *     clientToken?: string,
 *     description?: string,
 *     parentActionGroupSignature?: 'AMAZON.CodeInterpreter'|'AMAZON.UserInput'|'ANTHROPIC.Bash'|'ANTHROPIC.Computer'|'ANTHROPIC.TextEditor',
 *     parentActionGroupSignatureParams?: array<string, string>,
 *     actionGroupExecutor?: array{lambda?: string, customControl?: 'RETURN_CONTROL', ...},
 *     apiSchema?: array{s3?: array{s3BucketName?: string, s3ObjectKey?: string, ...}, payload?: string, ...},
 *     actionGroupState?: 'DISABLED'|'ENABLED',
 *     functionSchema?: array{functions?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAgentAlias(array $args = [])
 * @phpstan-method \Aws\Result createAgentAlias(array{
 *     agentId?: string,
 *     agentAliasName?: string,
 *     clientToken?: string,
 *     description?: string,
 *     routingConfiguration?: list<array{agentVersion?: string, provisionedThroughput?: string, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAgentAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAgentAliasAsync(array{
 *     agentId?: string,
 *     agentAliasName?: string,
 *     clientToken?: string,
 *     description?: string,
 *     routingConfiguration?: list<array{agentVersion?: string, provisionedThroughput?: string, ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSource(array $args = [])
 * @phpstan-method \Aws\Result createDataSource(array{
 *     knowledgeBaseId?: string,
 *     clientToken?: string,
 *     name?: string,
 *     description?: string,
 *     dataSourceConfiguration?: array{
 *         type?: 'CONFLUENCE'|'CUSTOM'|'MANAGED_KNOWLEDGE_BASE_CONNECTOR'|'REDSHIFT_METADATA'|'S3'|'SALESFORCE'|'SHAREPOINT'|'WEB',
 *         managedKnowledgeBaseConnectorConfiguration?: array{
 *             deletionProtectionConfiguration?: array,
 *             mediaExtractionConfiguration?: array,
 *             connectorParameters?: array,
 *             ...,
 *         },
 *         s3Configuration?: array{bucketArn?: string, inclusionPrefixes?: list<string>, bucketOwnerAccountId?: string, ...},
 *         webConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         confluenceConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         salesforceConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         sharePointConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         ...,
 *     },
 *     dataDeletionPolicy?: 'DELETE'|'RETAIN',
 *     serverSideEncryptionConfiguration?: array{kmsKeyArn?: string, ...},
 *     vectorIngestionConfiguration?: array{
 *         chunkingConfiguration?: array{
 *             chunkingStrategy?: 'FIXED_SIZE'|'HIERARCHICAL'|'NONE'|'SEMANTIC',
 *             fixedSizeChunkingConfiguration?: array,
 *             hierarchicalChunkingConfiguration?: array,
 *             semanticChunkingConfiguration?: array,
 *             ...,
 *         },
 *         customTransformationConfiguration?: array{intermediateStorage?: array, transformations?: list<array>, ...},
 *         parsingConfiguration?: array{
 *             parsingStrategy?: 'BEDROCK_DATA_AUTOMATION'|'BEDROCK_FOUNDATION_MODEL'|'SMART_PARSING',
 *             bedrockFoundationModelConfiguration?: array,
 *             bedrockDataAutomationConfiguration?: array,
 *             ...,
 *         },
 *         contextEnrichmentConfiguration?: array{type?: 'BEDROCK_FOUNDATION_MODEL', bedrockFoundationModelConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSourceAsync(array{
 *     knowledgeBaseId?: string,
 *     clientToken?: string,
 *     name?: string,
 *     description?: string,
 *     dataSourceConfiguration?: array{
 *         type?: 'CONFLUENCE'|'CUSTOM'|'MANAGED_KNOWLEDGE_BASE_CONNECTOR'|'REDSHIFT_METADATA'|'S3'|'SALESFORCE'|'SHAREPOINT'|'WEB',
 *         managedKnowledgeBaseConnectorConfiguration?: array{
 *             deletionProtectionConfiguration?: array,
 *             mediaExtractionConfiguration?: array,
 *             connectorParameters?: array,
 *             ...,
 *         },
 *         s3Configuration?: array{bucketArn?: string, inclusionPrefixes?: list<string>, bucketOwnerAccountId?: string, ...},
 *         webConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         confluenceConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         salesforceConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         sharePointConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         ...,
 *     },
 *     dataDeletionPolicy?: 'DELETE'|'RETAIN',
 *     serverSideEncryptionConfiguration?: array{kmsKeyArn?: string, ...},
 *     vectorIngestionConfiguration?: array{
 *         chunkingConfiguration?: array{
 *             chunkingStrategy?: 'FIXED_SIZE'|'HIERARCHICAL'|'NONE'|'SEMANTIC',
 *             fixedSizeChunkingConfiguration?: array,
 *             hierarchicalChunkingConfiguration?: array,
 *             semanticChunkingConfiguration?: array,
 *             ...,
 *         },
 *         customTransformationConfiguration?: array{intermediateStorage?: array, transformations?: list<array>, ...},
 *         parsingConfiguration?: array{
 *             parsingStrategy?: 'BEDROCK_DATA_AUTOMATION'|'BEDROCK_FOUNDATION_MODEL'|'SMART_PARSING',
 *             bedrockFoundationModelConfiguration?: array,
 *             bedrockDataAutomationConfiguration?: array,
 *             ...,
 *         },
 *         contextEnrichmentConfiguration?: array{type?: 'BEDROCK_FOUNDATION_MODEL', bedrockFoundationModelConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFlow(array $args = [])
 * @phpstan-method \Aws\Result createFlow(array{
 *     name?: string,
 *     description?: string,
 *     executionRoleArn?: string,
 *     customerEncryptionKeyArn?: string,
 *     definition?: array{nodes?: list<array>, connections?: list<array>, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFlowAsync(array{
 *     name?: string,
 *     description?: string,
 *     executionRoleArn?: string,
 *     customerEncryptionKeyArn?: string,
 *     definition?: array{nodes?: list<array>, connections?: list<array>, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFlowAlias(array $args = [])
 * @phpstan-method \Aws\Result createFlowAlias(array{
 *     name?: string,
 *     description?: string,
 *     routingConfiguration?: list<array{flowVersion?: string, ...}>,
 *     concurrencyConfiguration?: array{type?: 'Automatic'|'Manual', maxConcurrency?: int, ...},
 *     flowIdentifier?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFlowAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFlowAliasAsync(array{
 *     name?: string,
 *     description?: string,
 *     routingConfiguration?: list<array{flowVersion?: string, ...}>,
 *     concurrencyConfiguration?: array{type?: 'Automatic'|'Manual', maxConcurrency?: int, ...},
 *     flowIdentifier?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFlowVersion(array $args = [])
 * @phpstan-method \Aws\Result createFlowVersion(array{flowIdentifier?: string, description?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createFlowVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFlowVersionAsync(array{flowIdentifier?: string, description?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result createKnowledgeBase(array{
 *     clientToken?: string,
 *     name?: string,
 *     description?: string,
 *     roleArn?: string,
 *     knowledgeBaseConfiguration?: array{
 *         type?: 'KENDRA'|'MANAGED'|'SQL'|'VECTOR',
 *         vectorKnowledgeBaseConfiguration?: array{
 *             embeddingModelArn?: string,
 *             embeddingModelConfiguration?: array,
 *             supplementalDataStorageConfiguration?: array,
 *             ...,
 *         },
 *         managedKnowledgeBaseConfiguration?: array{
 *             embeddingModelType?: 'CUSTOM'|'MANAGED',
 *             embeddingModelArn?: string,
 *             embeddingModelConfiguration?: array,
 *             serverSideEncryptionConfiguration?: array,
 *             ...,
 *         },
 *         kendraKnowledgeBaseConfiguration?: array{kendraIndexArn?: string, ...},
 *         sqlKnowledgeBaseConfiguration?: array{type?: 'REDSHIFT', redshiftConfiguration?: array, ...},
 *         ...,
 *     },
 *     storageConfiguration?: array{
 *         type?: 'MONGO_DB_ATLAS'|'NEPTUNE_ANALYTICS'|'OPENSEARCH_MANAGED_CLUSTER'|'OPENSEARCH_SERVERLESS'|'PINECONE'|'RDS'|'REDIS_ENTERPRISE_CLOUD'|'S3_VECTORS',
 *         opensearchServerlessConfiguration?: array{collectionArn?: string, vectorIndexName?: string, fieldMapping?: array, ...},
 *         opensearchManagedClusterConfiguration?: array{domainEndpoint?: string, domainArn?: string, vectorIndexName?: string, fieldMapping?: array, ...},
 *         pineconeConfiguration?: array{connectionString?: string, credentialsSecretArn?: string, namespace?: string, fieldMapping?: array, ...},
 *         redisEnterpriseCloudConfiguration?: array{endpoint?: string, vectorIndexName?: string, credentialsSecretArn?: string, fieldMapping?: array, ...},
 *         rdsConfiguration?: array{
 *             resourceArn?: string,
 *             credentialsSecretArn?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             fieldMapping?: array,
 *             ...,
 *         },
 *         mongoDbAtlasConfiguration?: array{
 *             endpoint?: string,
 *             databaseName?: string,
 *             collectionName?: string,
 *             vectorIndexName?: string,
 *             credentialsSecretArn?: string,
 *             fieldMapping?: array,
 *             endpointServiceName?: string,
 *             textIndexName?: string,
 *             ...,
 *         },
 *         neptuneAnalyticsConfiguration?: array{graphArn?: string, fieldMapping?: array, ...},
 *         s3VectorsConfiguration?: array{vectorBucketArn?: string, indexArn?: string, indexName?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKnowledgeBaseAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     description?: string,
 *     roleArn?: string,
 *     knowledgeBaseConfiguration?: array{
 *         type?: 'KENDRA'|'MANAGED'|'SQL'|'VECTOR',
 *         vectorKnowledgeBaseConfiguration?: array{
 *             embeddingModelArn?: string,
 *             embeddingModelConfiguration?: array,
 *             supplementalDataStorageConfiguration?: array,
 *             ...,
 *         },
 *         managedKnowledgeBaseConfiguration?: array{
 *             embeddingModelType?: 'CUSTOM'|'MANAGED',
 *             embeddingModelArn?: string,
 *             embeddingModelConfiguration?: array,
 *             serverSideEncryptionConfiguration?: array,
 *             ...,
 *         },
 *         kendraKnowledgeBaseConfiguration?: array{kendraIndexArn?: string, ...},
 *         sqlKnowledgeBaseConfiguration?: array{type?: 'REDSHIFT', redshiftConfiguration?: array, ...},
 *         ...,
 *     },
 *     storageConfiguration?: array{
 *         type?: 'MONGO_DB_ATLAS'|'NEPTUNE_ANALYTICS'|'OPENSEARCH_MANAGED_CLUSTER'|'OPENSEARCH_SERVERLESS'|'PINECONE'|'RDS'|'REDIS_ENTERPRISE_CLOUD'|'S3_VECTORS',
 *         opensearchServerlessConfiguration?: array{collectionArn?: string, vectorIndexName?: string, fieldMapping?: array, ...},
 *         opensearchManagedClusterConfiguration?: array{domainEndpoint?: string, domainArn?: string, vectorIndexName?: string, fieldMapping?: array, ...},
 *         pineconeConfiguration?: array{connectionString?: string, credentialsSecretArn?: string, namespace?: string, fieldMapping?: array, ...},
 *         redisEnterpriseCloudConfiguration?: array{endpoint?: string, vectorIndexName?: string, credentialsSecretArn?: string, fieldMapping?: array, ...},
 *         rdsConfiguration?: array{
 *             resourceArn?: string,
 *             credentialsSecretArn?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             fieldMapping?: array,
 *             ...,
 *         },
 *         mongoDbAtlasConfiguration?: array{
 *             endpoint?: string,
 *             databaseName?: string,
 *             collectionName?: string,
 *             vectorIndexName?: string,
 *             credentialsSecretArn?: string,
 *             fieldMapping?: array,
 *             endpointServiceName?: string,
 *             textIndexName?: string,
 *             ...,
 *         },
 *         neptuneAnalyticsConfiguration?: array{graphArn?: string, fieldMapping?: array, ...},
 *         s3VectorsConfiguration?: array{vectorBucketArn?: string, indexArn?: string, indexName?: string, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPrompt(array $args = [])
 * @phpstan-method \Aws\Result createPrompt(array{
 *     name?: string,
 *     description?: string,
 *     customerEncryptionKeyArn?: string,
 *     defaultVariant?: string,
 *     variants?: list<array{
 *         name?: string,
 *         templateType?: 'CHAT'|'TEXT',
 *         templateConfiguration?: array,
 *         modelId?: string,
 *         inferenceConfiguration?: array,
 *         metadata?: list<array>,
 *         additionalModelRequestFields?: array,
 *         genAiResource?: array,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPromptAsync(array{
 *     name?: string,
 *     description?: string,
 *     customerEncryptionKeyArn?: string,
 *     defaultVariant?: string,
 *     variants?: list<array{
 *         name?: string,
 *         templateType?: 'CHAT'|'TEXT',
 *         templateConfiguration?: array,
 *         modelId?: string,
 *         inferenceConfiguration?: array,
 *         metadata?: list<array>,
 *         additionalModelRequestFields?: array,
 *         genAiResource?: array,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPromptVersion(array $args = [])
 * @phpstan-method \Aws\Result createPromptVersion(array{
 *     promptIdentifier?: string,
 *     description?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPromptVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPromptVersionAsync(array{
 *     promptIdentifier?: string,
 *     description?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAgent(array $args = [])
 * @phpstan-method \Aws\Result deleteAgent(array{agentId?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentAsync(array{agentId?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \Aws\Result deleteAgentActionGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentActionGroup(array{agentId?: string, agentVersion?: string, actionGroupId?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentActionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentActionGroupAsync(array{agentId?: string, agentVersion?: string, actionGroupId?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \Aws\Result deleteAgentAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentAlias(array{agentId?: string, agentAliasId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentAliasAsync(array{agentId?: string, agentAliasId?: string, ...} $args = [])
 * @method \Aws\Result deleteAgentVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentVersion(array{agentId?: string, agentVersion?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentVersionAsync(array{agentId?: string, agentVersion?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \Aws\Result deleteDataSource(array $args = [])
 * @phpstan-method \Aws\Result deleteDataSource(array{knowledgeBaseId?: string, dataSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array{knowledgeBaseId?: string, dataSourceId?: string, ...} $args = [])
 * @method \Aws\Result deleteFlow(array $args = [])
 * @phpstan-method \Aws\Result deleteFlow(array{flowIdentifier?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFlowAsync(array{flowIdentifier?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \Aws\Result deleteFlowAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteFlowAlias(array{flowIdentifier?: string, aliasIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFlowAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFlowAliasAsync(array{flowIdentifier?: string, aliasIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteFlowVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteFlowVersion(array{flowIdentifier?: string, flowVersion?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFlowVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFlowVersionAsync(array{flowIdentifier?: string, flowVersion?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \Aws\Result deleteKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result deleteKnowledgeBase(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKnowledgeBaseAsync(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result deleteKnowledgeBaseDocuments(array $args = [])
 * @phpstan-method \Aws\Result deleteKnowledgeBaseDocuments(array{
 *     knowledgeBaseId?: string,
 *     dataSourceId?: string,
 *     clientToken?: string,
 *     documentIdentifiers?: list<array{dataSourceType?: 'CUSTOM'|'S3', s3?: array, custom?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKnowledgeBaseDocumentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKnowledgeBaseDocumentsAsync(array{
 *     knowledgeBaseId?: string,
 *     dataSourceId?: string,
 *     clientToken?: string,
 *     documentIdentifiers?: list<array{dataSourceType?: 'CUSTOM'|'S3', s3?: array, custom?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePrompt(array $args = [])
 * @phpstan-method \Aws\Result deletePrompt(array{promptIdentifier?: string, promptVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePromptAsync(array{promptIdentifier?: string, promptVersion?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{resourceArn?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{resourceArn?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \Aws\Result disassociateAgentCollaborator(array $args = [])
 * @phpstan-method \Aws\Result disassociateAgentCollaborator(array{agentId?: string, agentVersion?: string, collaboratorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAgentCollaboratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAgentCollaboratorAsync(array{agentId?: string, agentVersion?: string, collaboratorId?: string, ...} $args = [])
 * @method \Aws\Result disassociateAgentKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result disassociateAgentKnowledgeBase(array{agentId?: string, agentVersion?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAgentKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAgentKnowledgeBaseAsync(array{agentId?: string, agentVersion?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result getAgent(array $args = [])
 * @phpstan-method \Aws\Result getAgent(array{agentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentAsync(array{agentId?: string, ...} $args = [])
 * @method \Aws\Result getAgentActionGroup(array $args = [])
 * @phpstan-method \Aws\Result getAgentActionGroup(array{agentId?: string, agentVersion?: string, actionGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentActionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentActionGroupAsync(array{agentId?: string, agentVersion?: string, actionGroupId?: string, ...} $args = [])
 * @method \Aws\Result getAgentAlias(array $args = [])
 * @phpstan-method \Aws\Result getAgentAlias(array{agentId?: string, agentAliasId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentAliasAsync(array{agentId?: string, agentAliasId?: string, ...} $args = [])
 * @method \Aws\Result getAgentCollaborator(array $args = [])
 * @phpstan-method \Aws\Result getAgentCollaborator(array{agentId?: string, agentVersion?: string, collaboratorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentCollaboratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentCollaboratorAsync(array{agentId?: string, agentVersion?: string, collaboratorId?: string, ...} $args = [])
 * @method \Aws\Result getAgentKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result getAgentKnowledgeBase(array{agentId?: string, agentVersion?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentKnowledgeBaseAsync(array{agentId?: string, agentVersion?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result getAgentVersion(array $args = [])
 * @phpstan-method \Aws\Result getAgentVersion(array{agentId?: string, agentVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentVersionAsync(array{agentId?: string, agentVersion?: string, ...} $args = [])
 * @method \Aws\Result getDataSource(array $args = [])
 * @phpstan-method \Aws\Result getDataSource(array{knowledgeBaseId?: string, dataSourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSourceAsync(array{knowledgeBaseId?: string, dataSourceId?: string, ...} $args = [])
 * @method \Aws\Result getFlow(array $args = [])
 * @phpstan-method \Aws\Result getFlow(array{flowIdentifier?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFlowAsync(array{flowIdentifier?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \Aws\Result getFlowAlias(array $args = [])
 * @phpstan-method \Aws\Result getFlowAlias(array{flowIdentifier?: string, aliasIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFlowAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFlowAliasAsync(array{flowIdentifier?: string, aliasIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getFlowVersion(array $args = [])
 * @phpstan-method \Aws\Result getFlowVersion(array{flowIdentifier?: string, flowVersion?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFlowVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFlowVersionAsync(array{flowIdentifier?: string, flowVersion?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \Aws\Result getIngestionJob(array $args = [])
 * @phpstan-method \Aws\Result getIngestionJob(array{knowledgeBaseId?: string, dataSourceId?: string, ingestionJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIngestionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIngestionJobAsync(array{knowledgeBaseId?: string, dataSourceId?: string, ingestionJobId?: string, ...} $args = [])
 * @method \Aws\Result getKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result getKnowledgeBase(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKnowledgeBaseAsync(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result getKnowledgeBaseDocuments(array $args = [])
 * @phpstan-method \Aws\Result getKnowledgeBaseDocuments(array{
 *     knowledgeBaseId?: string,
 *     dataSourceId?: string,
 *     documentIdentifiers?: list<array{dataSourceType?: 'CUSTOM'|'S3', s3?: array, custom?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getKnowledgeBaseDocumentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKnowledgeBaseDocumentsAsync(array{
 *     knowledgeBaseId?: string,
 *     dataSourceId?: string,
 *     documentIdentifiers?: list<array{dataSourceType?: 'CUSTOM'|'S3', s3?: array, custom?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPrompt(array $args = [])
 * @phpstan-method \Aws\Result getPrompt(array{promptIdentifier?: string, promptVersion?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPromptAsync(array{promptIdentifier?: string, promptVersion?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result ingestKnowledgeBaseDocuments(array $args = [])
 * @phpstan-method \Aws\Result ingestKnowledgeBaseDocuments(array{
 *     knowledgeBaseId?: string,
 *     dataSourceId?: string,
 *     clientToken?: string,
 *     documents?: list<array{metadata?: array, content?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise ingestKnowledgeBaseDocumentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise ingestKnowledgeBaseDocumentsAsync(array{
 *     knowledgeBaseId?: string,
 *     dataSourceId?: string,
 *     clientToken?: string,
 *     documents?: list<array{metadata?: array, content?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAgentActionGroups(array $args = [])
 * @phpstan-method \Aws\Result listAgentActionGroups(array{agentId?: string, agentVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentActionGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentActionGroupsAsync(array{agentId?: string, agentVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAgentAliases(array $args = [])
 * @phpstan-method \Aws\Result listAgentAliases(array{agentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentAliasesAsync(array{agentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAgentCollaborators(array $args = [])
 * @phpstan-method \Aws\Result listAgentCollaborators(array{agentId?: string, agentVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentCollaboratorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentCollaboratorsAsync(array{agentId?: string, agentVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAgentKnowledgeBases(array $args = [])
 * @phpstan-method \Aws\Result listAgentKnowledgeBases(array{agentId?: string, agentVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentKnowledgeBasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentKnowledgeBasesAsync(array{agentId?: string, agentVersion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAgentVersions(array $args = [])
 * @phpstan-method \Aws\Result listAgentVersions(array{agentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentVersionsAsync(array{agentId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAgents(array $args = [])
 * @phpstan-method \Aws\Result listAgents(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAgentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAgentsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDataSources(array $args = [])
 * @phpstan-method \Aws\Result listDataSources(array{knowledgeBaseId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array{knowledgeBaseId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listFlowAliases(array $args = [])
 * @phpstan-method \Aws\Result listFlowAliases(array{flowIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowAliasesAsync(array{flowIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listFlowVersions(array $args = [])
 * @phpstan-method \Aws\Result listFlowVersions(array{flowIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowVersionsAsync(array{flowIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listFlows(array $args = [])
 * @phpstan-method \Aws\Result listFlows(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listIngestionJobs(array $args = [])
 * @phpstan-method \Aws\Result listIngestionJobs(array{
 *     knowledgeBaseId?: string,
 *     dataSourceId?: string,
 *     filters?: list<array{attribute?: 'STATUS', operator?: 'EQ', values?: list<string>, ...}>,
 *     sortBy?: array{attribute?: 'STARTED_AT'|'STATUS', order?: 'ASCENDING'|'DESCENDING', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIngestionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIngestionJobsAsync(array{
 *     knowledgeBaseId?: string,
 *     dataSourceId?: string,
 *     filters?: list<array{attribute?: 'STATUS', operator?: 'EQ', values?: list<string>, ...}>,
 *     sortBy?: array{attribute?: 'STARTED_AT'|'STATUS', order?: 'ASCENDING'|'DESCENDING', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listKnowledgeBaseDocuments(array $args = [])
 * @phpstan-method \Aws\Result listKnowledgeBaseDocuments(array{knowledgeBaseId?: string, dataSourceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKnowledgeBaseDocumentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKnowledgeBaseDocumentsAsync(array{knowledgeBaseId?: string, dataSourceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listKnowledgeBases(array $args = [])
 * @phpstan-method \Aws\Result listKnowledgeBases(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKnowledgeBasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKnowledgeBasesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPrompts(array $args = [])
 * @phpstan-method \Aws\Result listPrompts(array{promptIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPromptsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPromptsAsync(array{promptIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result prepareAgent(array $args = [])
 * @phpstan-method \Aws\Result prepareAgent(array{agentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise prepareAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise prepareAgentAsync(array{agentId?: string, ...} $args = [])
 * @method \Aws\Result prepareFlow(array $args = [])
 * @phpstan-method \Aws\Result prepareFlow(array{flowIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise prepareFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise prepareFlowAsync(array{flowIdentifier?: string, ...} $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{resourceArn?: string, policy?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{resourceArn?: string, policy?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \Aws\Result startIngestionJob(array $args = [])
 * @phpstan-method \Aws\Result startIngestionJob(array{knowledgeBaseId?: string, dataSourceId?: string, clientToken?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startIngestionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startIngestionJobAsync(array{knowledgeBaseId?: string, dataSourceId?: string, clientToken?: string, description?: string, ...} $args = [])
 * @method \Aws\Result stopIngestionJob(array $args = [])
 * @phpstan-method \Aws\Result stopIngestionJob(array{knowledgeBaseId?: string, dataSourceId?: string, ingestionJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopIngestionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopIngestionJobAsync(array{knowledgeBaseId?: string, dataSourceId?: string, ingestionJobId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAgent(array $args = [])
 * @phpstan-method \Aws\Result updateAgent(array{
 *     agentId?: string,
 *     agentName?: string,
 *     instruction?: string,
 *     foundationModel?: string,
 *     description?: string,
 *     orchestrationType?: 'CUSTOM_ORCHESTRATION'|'DEFAULT',
 *     customOrchestration?: array{executor?: array{lambda?: string, ...}, ...},
 *     idleSessionTTLInSeconds?: int,
 *     agentResourceRoleArn?: string,
 *     customerEncryptionKeyArn?: string,
 *     promptOverrideConfiguration?: array{promptConfigurations?: list<array>, overrideLambda?: string, ...},
 *     guardrailConfiguration?: array{guardrailIdentifier?: string, guardrailVersion?: string, ...},
 *     memoryConfiguration?: array{
 *         enabledMemoryTypes?: list<'SESSION_SUMMARY'>,
 *         storageDays?: int,
 *         sessionSummaryConfiguration?: array{maxRecentSessions?: int, ...},
 *         ...,
 *     },
 *     agentCollaboration?: 'DISABLED'|'SUPERVISOR'|'SUPERVISOR_ROUTER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentAsync(array{
 *     agentId?: string,
 *     agentName?: string,
 *     instruction?: string,
 *     foundationModel?: string,
 *     description?: string,
 *     orchestrationType?: 'CUSTOM_ORCHESTRATION'|'DEFAULT',
 *     customOrchestration?: array{executor?: array{lambda?: string, ...}, ...},
 *     idleSessionTTLInSeconds?: int,
 *     agentResourceRoleArn?: string,
 *     customerEncryptionKeyArn?: string,
 *     promptOverrideConfiguration?: array{promptConfigurations?: list<array>, overrideLambda?: string, ...},
 *     guardrailConfiguration?: array{guardrailIdentifier?: string, guardrailVersion?: string, ...},
 *     memoryConfiguration?: array{
 *         enabledMemoryTypes?: list<'SESSION_SUMMARY'>,
 *         storageDays?: int,
 *         sessionSummaryConfiguration?: array{maxRecentSessions?: int, ...},
 *         ...,
 *     },
 *     agentCollaboration?: 'DISABLED'|'SUPERVISOR'|'SUPERVISOR_ROUTER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgentActionGroup(array $args = [])
 * @phpstan-method \Aws\Result updateAgentActionGroup(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     actionGroupId?: string,
 *     actionGroupName?: string,
 *     description?: string,
 *     parentActionGroupSignature?: 'AMAZON.CodeInterpreter'|'AMAZON.UserInput'|'ANTHROPIC.Bash'|'ANTHROPIC.Computer'|'ANTHROPIC.TextEditor',
 *     parentActionGroupSignatureParams?: array<string, string>,
 *     actionGroupExecutor?: array{lambda?: string, customControl?: 'RETURN_CONTROL', ...},
 *     actionGroupState?: 'DISABLED'|'ENABLED',
 *     apiSchema?: array{s3?: array{s3BucketName?: string, s3ObjectKey?: string, ...}, payload?: string, ...},
 *     functionSchema?: array{functions?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentActionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentActionGroupAsync(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     actionGroupId?: string,
 *     actionGroupName?: string,
 *     description?: string,
 *     parentActionGroupSignature?: 'AMAZON.CodeInterpreter'|'AMAZON.UserInput'|'ANTHROPIC.Bash'|'ANTHROPIC.Computer'|'ANTHROPIC.TextEditor',
 *     parentActionGroupSignatureParams?: array<string, string>,
 *     actionGroupExecutor?: array{lambda?: string, customControl?: 'RETURN_CONTROL', ...},
 *     actionGroupState?: 'DISABLED'|'ENABLED',
 *     apiSchema?: array{s3?: array{s3BucketName?: string, s3ObjectKey?: string, ...}, payload?: string, ...},
 *     functionSchema?: array{functions?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgentAlias(array $args = [])
 * @phpstan-method \Aws\Result updateAgentAlias(array{
 *     agentId?: string,
 *     agentAliasId?: string,
 *     agentAliasName?: string,
 *     description?: string,
 *     routingConfiguration?: list<array{agentVersion?: string, provisionedThroughput?: string, ...}>,
 *     aliasInvocationState?: 'ACCEPT_INVOCATIONS'|'REJECT_INVOCATIONS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentAliasAsync(array{
 *     agentId?: string,
 *     agentAliasId?: string,
 *     agentAliasName?: string,
 *     description?: string,
 *     routingConfiguration?: list<array{agentVersion?: string, provisionedThroughput?: string, ...}>,
 *     aliasInvocationState?: 'ACCEPT_INVOCATIONS'|'REJECT_INVOCATIONS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgentCollaborator(array $args = [])
 * @phpstan-method \Aws\Result updateAgentCollaborator(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     collaboratorId?: string,
 *     agentDescriptor?: array{aliasArn?: string, ...},
 *     collaboratorName?: string,
 *     collaborationInstruction?: string,
 *     relayConversationHistory?: 'DISABLED'|'TO_COLLABORATOR',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentCollaboratorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentCollaboratorAsync(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     collaboratorId?: string,
 *     agentDescriptor?: array{aliasArn?: string, ...},
 *     collaboratorName?: string,
 *     collaborationInstruction?: string,
 *     relayConversationHistory?: 'DISABLED'|'TO_COLLABORATOR',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAgentKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result updateAgentKnowledgeBase(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     knowledgeBaseId?: string,
 *     description?: string,
 *     knowledgeBaseState?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAgentKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAgentKnowledgeBaseAsync(array{
 *     agentId?: string,
 *     agentVersion?: string,
 *     knowledgeBaseId?: string,
 *     description?: string,
 *     knowledgeBaseState?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataSource(array $args = [])
 * @phpstan-method \Aws\Result updateDataSource(array{
 *     knowledgeBaseId?: string,
 *     dataSourceId?: string,
 *     name?: string,
 *     description?: string,
 *     dataSourceConfiguration?: array{
 *         type?: 'CONFLUENCE'|'CUSTOM'|'MANAGED_KNOWLEDGE_BASE_CONNECTOR'|'REDSHIFT_METADATA'|'S3'|'SALESFORCE'|'SHAREPOINT'|'WEB',
 *         managedKnowledgeBaseConnectorConfiguration?: array{
 *             deletionProtectionConfiguration?: array,
 *             mediaExtractionConfiguration?: array,
 *             connectorParameters?: array,
 *             ...,
 *         },
 *         s3Configuration?: array{bucketArn?: string, inclusionPrefixes?: list<string>, bucketOwnerAccountId?: string, ...},
 *         webConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         confluenceConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         salesforceConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         sharePointConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         ...,
 *     },
 *     dataDeletionPolicy?: 'DELETE'|'RETAIN',
 *     serverSideEncryptionConfiguration?: array{kmsKeyArn?: string, ...},
 *     vectorIngestionConfiguration?: array{
 *         chunkingConfiguration?: array{
 *             chunkingStrategy?: 'FIXED_SIZE'|'HIERARCHICAL'|'NONE'|'SEMANTIC',
 *             fixedSizeChunkingConfiguration?: array,
 *             hierarchicalChunkingConfiguration?: array,
 *             semanticChunkingConfiguration?: array,
 *             ...,
 *         },
 *         customTransformationConfiguration?: array{intermediateStorage?: array, transformations?: list<array>, ...},
 *         parsingConfiguration?: array{
 *             parsingStrategy?: 'BEDROCK_DATA_AUTOMATION'|'BEDROCK_FOUNDATION_MODEL'|'SMART_PARSING',
 *             bedrockFoundationModelConfiguration?: array,
 *             bedrockDataAutomationConfiguration?: array,
 *             ...,
 *         },
 *         contextEnrichmentConfiguration?: array{type?: 'BEDROCK_FOUNDATION_MODEL', bedrockFoundationModelConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array{
 *     knowledgeBaseId?: string,
 *     dataSourceId?: string,
 *     name?: string,
 *     description?: string,
 *     dataSourceConfiguration?: array{
 *         type?: 'CONFLUENCE'|'CUSTOM'|'MANAGED_KNOWLEDGE_BASE_CONNECTOR'|'REDSHIFT_METADATA'|'S3'|'SALESFORCE'|'SHAREPOINT'|'WEB',
 *         managedKnowledgeBaseConnectorConfiguration?: array{
 *             deletionProtectionConfiguration?: array,
 *             mediaExtractionConfiguration?: array,
 *             connectorParameters?: array,
 *             ...,
 *         },
 *         s3Configuration?: array{bucketArn?: string, inclusionPrefixes?: list<string>, bucketOwnerAccountId?: string, ...},
 *         webConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         confluenceConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         salesforceConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         sharePointConfiguration?: array{sourceConfiguration?: array, crawlerConfiguration?: array, ...},
 *         ...,
 *     },
 *     dataDeletionPolicy?: 'DELETE'|'RETAIN',
 *     serverSideEncryptionConfiguration?: array{kmsKeyArn?: string, ...},
 *     vectorIngestionConfiguration?: array{
 *         chunkingConfiguration?: array{
 *             chunkingStrategy?: 'FIXED_SIZE'|'HIERARCHICAL'|'NONE'|'SEMANTIC',
 *             fixedSizeChunkingConfiguration?: array,
 *             hierarchicalChunkingConfiguration?: array,
 *             semanticChunkingConfiguration?: array,
 *             ...,
 *         },
 *         customTransformationConfiguration?: array{intermediateStorage?: array, transformations?: list<array>, ...},
 *         parsingConfiguration?: array{
 *             parsingStrategy?: 'BEDROCK_DATA_AUTOMATION'|'BEDROCK_FOUNDATION_MODEL'|'SMART_PARSING',
 *             bedrockFoundationModelConfiguration?: array,
 *             bedrockDataAutomationConfiguration?: array,
 *             ...,
 *         },
 *         contextEnrichmentConfiguration?: array{type?: 'BEDROCK_FOUNDATION_MODEL', bedrockFoundationModelConfiguration?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFlow(array $args = [])
 * @phpstan-method \Aws\Result updateFlow(array{
 *     name?: string,
 *     description?: string,
 *     executionRoleArn?: string,
 *     customerEncryptionKeyArn?: string,
 *     definition?: array{nodes?: list<array>, connections?: list<array>, ...},
 *     flowIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlowAsync(array{
 *     name?: string,
 *     description?: string,
 *     executionRoleArn?: string,
 *     customerEncryptionKeyArn?: string,
 *     definition?: array{nodes?: list<array>, connections?: list<array>, ...},
 *     flowIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFlowAlias(array $args = [])
 * @phpstan-method \Aws\Result updateFlowAlias(array{
 *     name?: string,
 *     description?: string,
 *     routingConfiguration?: list<array{flowVersion?: string, ...}>,
 *     concurrencyConfiguration?: array{type?: 'Automatic'|'Manual', maxConcurrency?: int, ...},
 *     flowIdentifier?: string,
 *     aliasIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFlowAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFlowAliasAsync(array{
 *     name?: string,
 *     description?: string,
 *     routingConfiguration?: list<array{flowVersion?: string, ...}>,
 *     concurrencyConfiguration?: array{type?: 'Automatic'|'Manual', maxConcurrency?: int, ...},
 *     flowIdentifier?: string,
 *     aliasIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result updateKnowledgeBase(array{
 *     knowledgeBaseId?: string,
 *     name?: string,
 *     description?: string,
 *     roleArn?: string,
 *     knowledgeBaseConfiguration?: array{
 *         type?: 'KENDRA'|'MANAGED'|'SQL'|'VECTOR',
 *         vectorKnowledgeBaseConfiguration?: array{
 *             embeddingModelArn?: string,
 *             embeddingModelConfiguration?: array,
 *             supplementalDataStorageConfiguration?: array,
 *             ...,
 *         },
 *         managedKnowledgeBaseConfiguration?: array{
 *             embeddingModelType?: 'CUSTOM'|'MANAGED',
 *             embeddingModelArn?: string,
 *             embeddingModelConfiguration?: array,
 *             serverSideEncryptionConfiguration?: array,
 *             ...,
 *         },
 *         kendraKnowledgeBaseConfiguration?: array{kendraIndexArn?: string, ...},
 *         sqlKnowledgeBaseConfiguration?: array{type?: 'REDSHIFT', redshiftConfiguration?: array, ...},
 *         ...,
 *     },
 *     storageConfiguration?: array{
 *         type?: 'MONGO_DB_ATLAS'|'NEPTUNE_ANALYTICS'|'OPENSEARCH_MANAGED_CLUSTER'|'OPENSEARCH_SERVERLESS'|'PINECONE'|'RDS'|'REDIS_ENTERPRISE_CLOUD'|'S3_VECTORS',
 *         opensearchServerlessConfiguration?: array{collectionArn?: string, vectorIndexName?: string, fieldMapping?: array, ...},
 *         opensearchManagedClusterConfiguration?: array{domainEndpoint?: string, domainArn?: string, vectorIndexName?: string, fieldMapping?: array, ...},
 *         pineconeConfiguration?: array{connectionString?: string, credentialsSecretArn?: string, namespace?: string, fieldMapping?: array, ...},
 *         redisEnterpriseCloudConfiguration?: array{endpoint?: string, vectorIndexName?: string, credentialsSecretArn?: string, fieldMapping?: array, ...},
 *         rdsConfiguration?: array{
 *             resourceArn?: string,
 *             credentialsSecretArn?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             fieldMapping?: array,
 *             ...,
 *         },
 *         mongoDbAtlasConfiguration?: array{
 *             endpoint?: string,
 *             databaseName?: string,
 *             collectionName?: string,
 *             vectorIndexName?: string,
 *             credentialsSecretArn?: string,
 *             fieldMapping?: array,
 *             endpointServiceName?: string,
 *             textIndexName?: string,
 *             ...,
 *         },
 *         neptuneAnalyticsConfiguration?: array{graphArn?: string, fieldMapping?: array, ...},
 *         s3VectorsConfiguration?: array{vectorBucketArn?: string, indexArn?: string, indexName?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKnowledgeBaseAsync(array{
 *     knowledgeBaseId?: string,
 *     name?: string,
 *     description?: string,
 *     roleArn?: string,
 *     knowledgeBaseConfiguration?: array{
 *         type?: 'KENDRA'|'MANAGED'|'SQL'|'VECTOR',
 *         vectorKnowledgeBaseConfiguration?: array{
 *             embeddingModelArn?: string,
 *             embeddingModelConfiguration?: array,
 *             supplementalDataStorageConfiguration?: array,
 *             ...,
 *         },
 *         managedKnowledgeBaseConfiguration?: array{
 *             embeddingModelType?: 'CUSTOM'|'MANAGED',
 *             embeddingModelArn?: string,
 *             embeddingModelConfiguration?: array,
 *             serverSideEncryptionConfiguration?: array,
 *             ...,
 *         },
 *         kendraKnowledgeBaseConfiguration?: array{kendraIndexArn?: string, ...},
 *         sqlKnowledgeBaseConfiguration?: array{type?: 'REDSHIFT', redshiftConfiguration?: array, ...},
 *         ...,
 *     },
 *     storageConfiguration?: array{
 *         type?: 'MONGO_DB_ATLAS'|'NEPTUNE_ANALYTICS'|'OPENSEARCH_MANAGED_CLUSTER'|'OPENSEARCH_SERVERLESS'|'PINECONE'|'RDS'|'REDIS_ENTERPRISE_CLOUD'|'S3_VECTORS',
 *         opensearchServerlessConfiguration?: array{collectionArn?: string, vectorIndexName?: string, fieldMapping?: array, ...},
 *         opensearchManagedClusterConfiguration?: array{domainEndpoint?: string, domainArn?: string, vectorIndexName?: string, fieldMapping?: array, ...},
 *         pineconeConfiguration?: array{connectionString?: string, credentialsSecretArn?: string, namespace?: string, fieldMapping?: array, ...},
 *         redisEnterpriseCloudConfiguration?: array{endpoint?: string, vectorIndexName?: string, credentialsSecretArn?: string, fieldMapping?: array, ...},
 *         rdsConfiguration?: array{
 *             resourceArn?: string,
 *             credentialsSecretArn?: string,
 *             databaseName?: string,
 *             tableName?: string,
 *             fieldMapping?: array,
 *             ...,
 *         },
 *         mongoDbAtlasConfiguration?: array{
 *             endpoint?: string,
 *             databaseName?: string,
 *             collectionName?: string,
 *             vectorIndexName?: string,
 *             credentialsSecretArn?: string,
 *             fieldMapping?: array,
 *             endpointServiceName?: string,
 *             textIndexName?: string,
 *             ...,
 *         },
 *         neptuneAnalyticsConfiguration?: array{graphArn?: string, fieldMapping?: array, ...},
 *         s3VectorsConfiguration?: array{vectorBucketArn?: string, indexArn?: string, indexName?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePrompt(array $args = [])
 * @phpstan-method \Aws\Result updatePrompt(array{
 *     name?: string,
 *     description?: string,
 *     customerEncryptionKeyArn?: string,
 *     defaultVariant?: string,
 *     variants?: list<array{
 *         name?: string,
 *         templateType?: 'CHAT'|'TEXT',
 *         templateConfiguration?: array,
 *         modelId?: string,
 *         inferenceConfiguration?: array,
 *         metadata?: list<array>,
 *         additionalModelRequestFields?: array,
 *         genAiResource?: array,
 *         ...,
 *     }>,
 *     promptIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePromptAsync(array{
 *     name?: string,
 *     description?: string,
 *     customerEncryptionKeyArn?: string,
 *     defaultVariant?: string,
 *     variants?: list<array{
 *         name?: string,
 *         templateType?: 'CHAT'|'TEXT',
 *         templateConfiguration?: array,
 *         modelId?: string,
 *         inferenceConfiguration?: array,
 *         metadata?: list<array>,
 *         additionalModelRequestFields?: array,
 *         genAiResource?: array,
 *         ...,
 *     }>,
 *     promptIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result validateFlowDefinition(array $args = [])
 * @phpstan-method \Aws\Result validateFlowDefinition(array{definition?: array{nodes?: list<array>, connections?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validateFlowDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateFlowDefinitionAsync(array{definition?: array{nodes?: list<array>, connections?: list<array>, ...}, ...} $args = [])
 */
class BedrockAgentClient extends AwsClient {}
