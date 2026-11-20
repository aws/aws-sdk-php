<?php
namespace Aws\AgentRegistryControl;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Agent Registry Control** service.
 * @method \Aws\Result associatePublisher(array $args = [])
 * @phpstan-method \Aws\Result associatePublisher(array{
 *     recordArn?: string,
 *     publisherArn?: string,
 *     subdomain?: string,
 *     categories?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePublisherAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePublisherAsync(array{
 *     recordArn?: string,
 *     publisherArn?: string,
 *     subdomain?: string,
 *     categories?: list<string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPublisher(array $args = [])
 * @phpstan-method \Aws\Result createPublisher(array{value?: array{domain?: string, ...}, tags?: array<string, string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPublisherAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPublisherAsync(array{value?: array{domain?: string, ...}, tags?: array<string, string>, clientToken?: string, ...} $args = [])
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
 *     recordType?: 'AGENT'|'CUSTOM'|'GATEWAY'|'MCP'|'SKILL'|'WEB_BOT',
 *     descriptors?: array{
 *         mcpServer?: array{data?: string, dataSchemaVersion?: string, additionalData?: array, source?: array, ...},
 *         a2aAgentCard?: array{data?: string, dataSchemaVersion?: string, source?: array, ...},
 *         agentSkillsDefinition?: array{data?: string, dataSchemaVersion?: string, additionalData?: array, ...},
 *         custom?: array{data?: string, ...},
 *         http?: array{source?: array, ...},
 *         agui?: array{source?: array, ...},
 *         signatureAgentCard?: array{data?: string, dataSchemaVersion?: string, source?: array, additionalData?: array, ...},
 *         ...,
 *     },
 *     artifact?: array{content?: string|resource|\Psr\Http\Message\StreamInterface, sha256?: string, ...},
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
 *     recordType?: 'AGENT'|'CUSTOM'|'GATEWAY'|'MCP'|'SKILL'|'WEB_BOT',
 *     descriptors?: array{
 *         mcpServer?: array{data?: string, dataSchemaVersion?: string, additionalData?: array, source?: array, ...},
 *         a2aAgentCard?: array{data?: string, dataSchemaVersion?: string, source?: array, ...},
 *         agentSkillsDefinition?: array{data?: string, dataSchemaVersion?: string, additionalData?: array, ...},
 *         custom?: array{data?: string, ...},
 *         http?: array{source?: array, ...},
 *         agui?: array{source?: array, ...},
 *         signatureAgentCard?: array{data?: string, dataSchemaVersion?: string, source?: array, additionalData?: array, ...},
 *         ...,
 *     },
 *     artifact?: array{content?: string|resource|\Psr\Http\Message\StreamInterface, sha256?: string, ...},
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
 * @method \Aws\Result deletePublisher(array $args = [])
 * @phpstan-method \Aws\Result deletePublisher(array{publisherArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePublisherAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePublisherAsync(array{publisherArn?: string, ...} $args = [])
 * @method \Aws\Result deleteRegistry(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistry(array{registryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistryAsync(array{registryId?: string, ...} $args = [])
 * @method \Aws\Result deleteRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistryRecord(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistryRecordAsync(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \Aws\Result disassociatePublisher(array $args = [])
 * @phpstan-method \Aws\Result disassociatePublisher(array{recordArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePublisherAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociatePublisherAsync(array{recordArn?: string, ...} $args = [])
 * @method \Aws\Result getPublisher(array $args = [])
 * @phpstan-method \Aws\Result getPublisher(array{publisherArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPublisherAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPublisherAsync(array{publisherArn?: string, ...} $args = [])
 * @method \Aws\Result getRegistry(array $args = [])
 * @phpstan-method \Aws\Result getRegistry(array{registryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegistryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegistryAsync(array{registryId?: string, ...} $args = [])
 * @method \Aws\Result getRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result getRegistryRecord(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegistryRecordAsync(array{registryId?: string, recordId?: string, ...} $args = [])
 * @method \Aws\Result listPublisherAssociations(array $args = [])
 * @phpstan-method \Aws\Result listPublisherAssociations(array{publisherArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPublisherAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPublisherAssociationsAsync(array{publisherArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPublishers(array $args = [])
 * @phpstan-method \Aws\Result listPublishers(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPublishersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPublishersAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
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
 * @method \Aws\Result updatePublisherAssociationApprovalStatus(array $args = [])
 * @phpstan-method \Aws\Result updatePublisherAssociationApprovalStatus(array{recordArn?: string, approvalStatus?: 'APPROVED'|'REJECTED', approvalStatusReason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePublisherAssociationApprovalStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePublisherAssociationApprovalStatusAsync(array{recordArn?: string, approvalStatus?: 'APPROVED'|'REJECTED', approvalStatusReason?: string, ...} $args = [])
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
 *     recordType?: 'AGENT'|'CUSTOM'|'GATEWAY'|'MCP'|'SKILL'|'WEB_BOT',
 *     descriptors?: array{
 *         optionalValue?: array{
 *             mcpServer?: array,
 *             a2aAgentCard?: array,
 *             agentSkillsDefinition?: array,
 *             custom?: array,
 *             http?: array,
 *             agui?: array,
 *             signatureAgentCard?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     artifact?: array{
 *         optionalValue?: array{content?: string|resource|\Psr\Http\Message\StreamInterface, sha256?: string, ...},
 *         ...,
 *     },
 *     recordVersion?: string,
 *     customMetadata?: array{optionalValue?: array, ...},
 *     triggerSynchronization?: bool,
 *     forceAuthentication?: bool,
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
 *     recordType?: 'AGENT'|'CUSTOM'|'GATEWAY'|'MCP'|'SKILL'|'WEB_BOT',
 *     descriptors?: array{
 *         optionalValue?: array{
 *             mcpServer?: array,
 *             a2aAgentCard?: array,
 *             agentSkillsDefinition?: array,
 *             custom?: array,
 *             http?: array,
 *             agui?: array,
 *             signatureAgentCard?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     artifact?: array{
 *         optionalValue?: array{content?: string|resource|\Psr\Http\Message\StreamInterface, sha256?: string, ...},
 *         ...,
 *     },
 *     recordVersion?: string,
 *     customMetadata?: array{optionalValue?: array, ...},
 *     triggerSynchronization?: bool,
 *     forceAuthentication?: bool,
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
 *     status?: 'APPROVED'|'CREATE_FAILED'|'CREATE_PENDING_AUTH'|'CREATING'|'DEPRECATED'|'DRAFT'|'PENDING_APPROVAL'|'REJECTED'|'UPDATE_FAILED'|'UPDATE_PENDING_AUTH'|'UPDATING',
 *     statusReason?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegistryRecordStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegistryRecordStatusAsync(array{
 *     registryId?: string,
 *     recordId?: string,
 *     status?: 'APPROVED'|'CREATE_FAILED'|'CREATE_PENDING_AUTH'|'CREATING'|'DEPRECATED'|'DRAFT'|'PENDING_APPROVAL'|'REJECTED'|'UPDATE_FAILED'|'UPDATE_PENDING_AUTH'|'UPDATING',
 *     statusReason?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result validatePublisher(array $args = [])
 * @phpstan-method \Aws\Result validatePublisher(array{publisherArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validatePublisherAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validatePublisherAsync(array{publisherArn?: string, ...} $args = [])
 */
class AgentRegistryControlClient extends AwsClient {}
