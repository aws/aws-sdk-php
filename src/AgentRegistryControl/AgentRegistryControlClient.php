<?php
namespace Aws\AgentRegistryControl;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Agent Registry Control** service.
 * @method \Aws\Result createRegistry(array $args = [])
 * @phpstan-method \Aws\Result createRegistry(array{
 *     name?: string,
 *     description?: string,
 *     encryptionConfiguration?: array{kmsKeyArn?: string, ...},
 *     discoveryConfiguration?: array{
 *         authorizerConfiguration?: array{customJWTAuthorizer?: array, ...},
 *         authorizerType?: 'AWS_IAM'|'CUSTOM_JWT',
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     approvalConfiguration?: array{autoApprovalRules?: list<'APPROVE_ALL'>, ...},
 *     customMetadataSchemaConfiguration?: array{defaultSchema?: string, recordTypeSchemaOverrides?: list<array>, ...},
 *     autoDetectionConfiguration?: array{scope?: 'ORGANIZATION', enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegistryAsync(array{
 *     name?: string,
 *     description?: string,
 *     encryptionConfiguration?: array{kmsKeyArn?: string, ...},
 *     discoveryConfiguration?: array{
 *         authorizerConfiguration?: array{customJWTAuthorizer?: array, ...},
 *         authorizerType?: 'AWS_IAM'|'CUSTOM_JWT',
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     approvalConfiguration?: array{autoApprovalRules?: list<'APPROVE_ALL'>, ...},
 *     customMetadataSchemaConfiguration?: array{defaultSchema?: string, recordTypeSchemaOverrides?: list<array>, ...},
 *     autoDetectionConfiguration?: array{scope?: 'ORGANIZATION', enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result createRegistryRecord(array{
 *     registryId?: string,
 *     name?: string,
 *     displayName?: string,
 *     description?: string,
 *     recordType?: 'AGENT'|'CUSTOM'|'GATEWAY'|'MCP'|'SKILL',
 *     descriptors?: array{
 *         mcpServer?: array{data?: string, dataSchemaVersion?: string, additionalData?: array, source?: array, ...},
 *         a2aAgentCard?: array{data?: string, dataSchemaVersion?: string, source?: array, ...},
 *         agentSkillsDefinition?: array{data?: string, dataSchemaVersion?: string, additionalData?: array, ...},
 *         custom?: array{data?: string, ...},
 *         http?: array{source?: array, ...},
 *         agui?: array{source?: array, ...},
 *         ...,
 *     },
 *     recordVersion?: string,
 *     clientToken?: string,
 *     provenance?: list<array{
 *         relation?: 'DETECTED_FROM',
 *         sourceId?: string,
 *         sourceType?: 'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Runtime',
 *         sourceDetails?: array,
 *         ...,
 *     }>,
 *     customMetadata?: array,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegistryRecordAsync(array{
 *     registryId?: string,
 *     name?: string,
 *     displayName?: string,
 *     description?: string,
 *     recordType?: 'AGENT'|'CUSTOM'|'GATEWAY'|'MCP'|'SKILL',
 *     descriptors?: array{
 *         mcpServer?: array{data?: string, dataSchemaVersion?: string, additionalData?: array, source?: array, ...},
 *         a2aAgentCard?: array{data?: string, dataSchemaVersion?: string, source?: array, ...},
 *         agentSkillsDefinition?: array{data?: string, dataSchemaVersion?: string, additionalData?: array, ...},
 *         custom?: array{data?: string, ...},
 *         http?: array{source?: array, ...},
 *         agui?: array{source?: array, ...},
 *         ...,
 *     },
 *     recordVersion?: string,
 *     clientToken?: string,
 *     provenance?: list<array{
 *         relation?: 'DETECTED_FROM',
 *         sourceId?: string,
 *         sourceType?: 'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Runtime',
 *         sourceDetails?: array,
 *         ...,
 *     }>,
 *     customMetadata?: array,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteRegistry(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistry(array{registryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistryAsync(array{registryId?: string, ...} $args = [])
 * @method \Aws\Result deleteRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistryRecord(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistryRecordAsync(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \Aws\Result getRegistry(array $args = [])
 * @phpstan-method \Aws\Result getRegistry(array{registryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegistryAsync(array{registryId?: string, ...} $args = [])
 * @method \Aws\Result getRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result getRegistryRecord(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegistryRecordAsync(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \Aws\Result listRegistries(array $args = [])
 * @phpstan-method \Aws\Result listRegistries(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: 'discoveryConfiguration.authorizerType'|'status', values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegistriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegistriesAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: 'discoveryConfiguration.authorizerType'|'status', values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRegistryRecords(array $args = [])
 * @phpstan-method \Aws\Result listRegistryRecords(array{
 *     registryId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: 'name'|'recordType'|'status', values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegistryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegistryRecordsAsync(array{
 *     registryId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: 'name'|'recordType'|'status', values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result submitRegistryRecordForApproval(array $args = [])
 * @phpstan-method \Aws\Result submitRegistryRecordForApproval(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise submitRegistryRecordForApprovalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitRegistryRecordForApprovalAsync(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateRegistry(array $args = [])
 * @phpstan-method \Aws\Result updateRegistry(array{
 *     registryId?: string,
 *     name?: string,
 *     description?: array{optionalValue?: string, ...},
 *     discoveryConfiguration?: array{authorizerConfiguration?: array{optionalValue?: array, ...}, ...},
 *     approvalConfiguration?: array{optionalValue?: array{autoApprovalRules?: list<'APPROVE_ALL'>, ...}, ...},
 *     customMetadataSchemaConfiguration?: array{optionalValue?: array{defaultSchema?: string, recordTypeSchemaOverrides?: list<array>, ...}, ...},
 *     autoDetectionConfiguration?: array{optionalValue?: array{scope?: 'ORGANIZATION', enabled?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegistryAsync(array{
 *     registryId?: string,
 *     name?: string,
 *     description?: array{optionalValue?: string, ...},
 *     discoveryConfiguration?: array{authorizerConfiguration?: array{optionalValue?: array, ...}, ...},
 *     approvalConfiguration?: array{optionalValue?: array{autoApprovalRules?: list<'APPROVE_ALL'>, ...}, ...},
 *     customMetadataSchemaConfiguration?: array{optionalValue?: array{defaultSchema?: string, recordTypeSchemaOverrides?: list<array>, ...}, ...},
 *     autoDetectionConfiguration?: array{optionalValue?: array{scope?: 'ORGANIZATION', enabled?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result updateRegistryRecord(array{
 *     registryId?: string,
 *     recordId?: string,
 *     name?: string,
 *     displayName?: array{optionalValue?: string, ...},
 *     description?: array{optionalValue?: string, ...},
 *     recordType?: 'AGENT'|'CUSTOM'|'GATEWAY'|'MCP'|'SKILL',
 *     descriptors?: array{
 *         optionalValue?: array{
 *             mcpServer?: array,
 *             a2aAgentCard?: array,
 *             agentSkillsDefinition?: array,
 *             custom?: array,
 *             http?: array,
 *             agui?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     recordVersion?: string,
 *     customMetadata?: array{optionalValue?: array, ...},
 *     triggerSynchronization?: bool,
 *     provenance?: list<array{
 *         relation?: 'DETECTED_FROM',
 *         sourceId?: string,
 *         sourceType?: 'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Runtime',
 *         sourceDetails?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegistryRecordAsync(array{
 *     registryId?: string,
 *     recordId?: string,
 *     name?: string,
 *     displayName?: array{optionalValue?: string, ...},
 *     description?: array{optionalValue?: string, ...},
 *     recordType?: 'AGENT'|'CUSTOM'|'GATEWAY'|'MCP'|'SKILL',
 *     descriptors?: array{
 *         optionalValue?: array{
 *             mcpServer?: array,
 *             a2aAgentCard?: array,
 *             agentSkillsDefinition?: array,
 *             custom?: array,
 *             http?: array,
 *             agui?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     recordVersion?: string,
 *     customMetadata?: array{optionalValue?: array, ...},
 *     triggerSynchronization?: bool,
 *     provenance?: list<array{
 *         relation?: 'DETECTED_FROM',
 *         sourceId?: string,
 *         sourceType?: 'AWS::BedrockAgentCore::Gateway'|'AWS::BedrockAgentCore::Runtime',
 *         sourceDetails?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRegistryRecordStatus(array $args = [])
 * @phpstan-method \Aws\Result updateRegistryRecordStatus(array{
 *     registryId?: string,
 *     recordId?: string,
 *     status?: 'APPROVED'|'CREATE_FAILED'|'CREATING'|'DEPRECATED'|'DRAFT'|'PENDING_APPROVAL'|'REJECTED'|'UPDATE_FAILED'|'UPDATING',
 *     statusReason?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegistryRecordStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegistryRecordStatusAsync(array{
 *     registryId?: string,
 *     recordId?: string,
 *     status?: 'APPROVED'|'CREATE_FAILED'|'CREATING'|'DEPRECATED'|'DRAFT'|'PENDING_APPROVAL'|'REJECTED'|'UPDATE_FAILED'|'UPDATING',
 *     statusReason?: string,
 *     ...,
 * } $args = [])
 */
class AgentRegistryControlClient extends AwsClient {}
