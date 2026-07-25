<?php
namespace Aws\ConnectWisdomService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Connect Wisdom Service** service.
 * @method \Aws\Result createAssistant(array $args = [])
 * @phpstan-method \Aws\Result createAssistant(array{
 *     clientToken?: string,
 *     description?: string,
 *     name?: string,
 *     serverSideEncryptionConfiguration?: array{kmsKeyId?: string, ...},
 *     tags?: array<string, string>,
 *     type?: 'AGENT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssistantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssistantAsync(array{
 *     clientToken?: string,
 *     description?: string,
 *     name?: string,
 *     serverSideEncryptionConfiguration?: array{kmsKeyId?: string, ...},
 *     tags?: array<string, string>,
 *     type?: 'AGENT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssistantAssociation(array $args = [])
 * @phpstan-method \Aws\Result createAssistantAssociation(array{
 *     assistantId?: string,
 *     association?: array{knowledgeBaseId?: string, ...},
 *     associationType?: 'KNOWLEDGE_BASE',
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssistantAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssistantAssociationAsync(array{
 *     assistantId?: string,
 *     association?: array{knowledgeBaseId?: string, ...},
 *     associationType?: 'KNOWLEDGE_BASE',
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContent(array $args = [])
 * @phpstan-method \Aws\Result createContent(array{
 *     clientToken?: string,
 *     knowledgeBaseId?: string,
 *     metadata?: array<string, string>,
 *     name?: string,
 *     overrideLinkOutUri?: string,
 *     tags?: array<string, string>,
 *     title?: string,
 *     uploadId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContentAsync(array{
 *     clientToken?: string,
 *     knowledgeBaseId?: string,
 *     metadata?: array<string, string>,
 *     name?: string,
 *     overrideLinkOutUri?: string,
 *     tags?: array<string, string>,
 *     title?: string,
 *     uploadId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result createKnowledgeBase(array{
 *     clientToken?: string,
 *     description?: string,
 *     knowledgeBaseType?: 'CUSTOM'|'EXTERNAL'|'QUICK_RESPONSES',
 *     name?: string,
 *     renderingConfiguration?: array{templateUri?: string, ...},
 *     serverSideEncryptionConfiguration?: array{kmsKeyId?: string, ...},
 *     sourceConfiguration?: array{appIntegrations?: array{appIntegrationArn?: string, objectFields?: list<string>, ...}, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKnowledgeBaseAsync(array{
 *     clientToken?: string,
 *     description?: string,
 *     knowledgeBaseType?: 'CUSTOM'|'EXTERNAL'|'QUICK_RESPONSES',
 *     name?: string,
 *     renderingConfiguration?: array{templateUri?: string, ...},
 *     serverSideEncryptionConfiguration?: array{kmsKeyId?: string, ...},
 *     sourceConfiguration?: array{appIntegrations?: array{appIntegrationArn?: string, objectFields?: list<string>, ...}, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQuickResponse(array $args = [])
 * @phpstan-method \Aws\Result createQuickResponse(array{
 *     channels?: list<string>,
 *     clientToken?: string,
 *     content?: array{content?: string, ...},
 *     contentType?: string,
 *     description?: string,
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     isActive?: bool,
 *     knowledgeBaseId?: string,
 *     language?: string,
 *     name?: string,
 *     shortcutKey?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQuickResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQuickResponseAsync(array{
 *     channels?: list<string>,
 *     clientToken?: string,
 *     content?: array{content?: string, ...},
 *     contentType?: string,
 *     description?: string,
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     isActive?: bool,
 *     knowledgeBaseId?: string,
 *     language?: string,
 *     name?: string,
 *     shortcutKey?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSession(array $args = [])
 * @phpstan-method \Aws\Result createSession(array{
 *     assistantId?: string,
 *     clientToken?: string,
 *     description?: string,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSessionAsync(array{
 *     assistantId?: string,
 *     clientToken?: string,
 *     description?: string,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAssistant(array $args = [])
 * @phpstan-method \Aws\Result deleteAssistant(array{assistantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssistantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssistantAsync(array{assistantId?: string, ...} $args = [])
 * @method \Aws\Result deleteAssistantAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteAssistantAssociation(array{assistantAssociationId?: string, assistantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssistantAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssistantAssociationAsync(array{assistantAssociationId?: string, assistantId?: string, ...} $args = [])
 * @method \Aws\Result deleteContent(array $args = [])
 * @phpstan-method \Aws\Result deleteContent(array{contentId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContentAsync(array{contentId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result deleteImportJob(array $args = [])
 * @phpstan-method \Aws\Result deleteImportJob(array{importJobId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImportJobAsync(array{importJobId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result deleteKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result deleteKnowledgeBase(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKnowledgeBaseAsync(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result deleteQuickResponse(array $args = [])
 * @phpstan-method \Aws\Result deleteQuickResponse(array{knowledgeBaseId?: string, quickResponseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQuickResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQuickResponseAsync(array{knowledgeBaseId?: string, quickResponseId?: string, ...} $args = [])
 * @method \Aws\Result getAssistant(array $args = [])
 * @phpstan-method \Aws\Result getAssistant(array{assistantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssistantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssistantAsync(array{assistantId?: string, ...} $args = [])
 * @method \Aws\Result getAssistantAssociation(array $args = [])
 * @phpstan-method \Aws\Result getAssistantAssociation(array{assistantAssociationId?: string, assistantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssistantAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssistantAssociationAsync(array{assistantAssociationId?: string, assistantId?: string, ...} $args = [])
 * @method \Aws\Result getContent(array $args = [])
 * @phpstan-method \Aws\Result getContent(array{contentId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContentAsync(array{contentId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result getContentSummary(array $args = [])
 * @phpstan-method \Aws\Result getContentSummary(array{contentId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContentSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContentSummaryAsync(array{contentId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result getImportJob(array $args = [])
 * @phpstan-method \Aws\Result getImportJob(array{importJobId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImportJobAsync(array{importJobId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result getKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result getKnowledgeBase(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getKnowledgeBaseAsync(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result getQuickResponse(array $args = [])
 * @phpstan-method \Aws\Result getQuickResponse(array{knowledgeBaseId?: string, quickResponseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQuickResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQuickResponseAsync(array{knowledgeBaseId?: string, quickResponseId?: string, ...} $args = [])
 * @method \Aws\Result getRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getRecommendations(array{assistantId?: string, maxResults?: int, sessionId?: string, waitTimeSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationsAsync(array{assistantId?: string, maxResults?: int, sessionId?: string, waitTimeSeconds?: int, ...} $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{assistantId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{assistantId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result listAssistantAssociations(array $args = [])
 * @phpstan-method \Aws\Result listAssistantAssociations(array{assistantId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssistantAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssistantAssociationsAsync(array{assistantId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAssistants(array $args = [])
 * @phpstan-method \Aws\Result listAssistants(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssistantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssistantsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listContents(array $args = [])
 * @phpstan-method \Aws\Result listContents(array{knowledgeBaseId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContentsAsync(array{knowledgeBaseId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listImportJobs(array{knowledgeBaseId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportJobsAsync(array{knowledgeBaseId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listKnowledgeBases(array $args = [])
 * @phpstan-method \Aws\Result listKnowledgeBases(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKnowledgeBasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKnowledgeBasesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listQuickResponses(array $args = [])
 * @phpstan-method \Aws\Result listQuickResponses(array{knowledgeBaseId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQuickResponsesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQuickResponsesAsync(array{knowledgeBaseId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result notifyRecommendationsReceived(array $args = [])
 * @phpstan-method \Aws\Result notifyRecommendationsReceived(array{assistantId?: string, recommendationIds?: list<string>, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise notifyRecommendationsReceivedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise notifyRecommendationsReceivedAsync(array{assistantId?: string, recommendationIds?: list<string>, sessionId?: string, ...} $args = [])
 * @method \Aws\Result queryAssistant(array $args = [])
 * @phpstan-method \Aws\Result queryAssistant(array{assistantId?: string, maxResults?: int, nextToken?: string, queryText?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise queryAssistantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryAssistantAsync(array{assistantId?: string, maxResults?: int, nextToken?: string, queryText?: string, ...} $args = [])
 * @method \Aws\Result removeKnowledgeBaseTemplateUri(array $args = [])
 * @phpstan-method \Aws\Result removeKnowledgeBaseTemplateUri(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeKnowledgeBaseTemplateUriAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeKnowledgeBaseTemplateUriAsync(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result searchContent(array $args = [])
 * @phpstan-method \Aws\Result searchContent(array{
 *     knowledgeBaseId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchExpression?: array{filters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchContentAsync(array{
 *     knowledgeBaseId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchExpression?: array{filters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchQuickResponses(array $args = [])
 * @phpstan-method \Aws\Result searchQuickResponses(array{
 *     attributes?: array<string, string>,
 *     knowledgeBaseId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchExpression?: array{
 *         filters?: list<array>,
 *         orderOnField?: array{name?: string, order?: 'ASC'|'DESC', ...},
 *         queries?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchQuickResponsesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchQuickResponsesAsync(array{
 *     attributes?: array<string, string>,
 *     knowledgeBaseId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchExpression?: array{
 *         filters?: list<array>,
 *         orderOnField?: array{name?: string, order?: 'ASC'|'DESC', ...},
 *         queries?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchSessions(array $args = [])
 * @phpstan-method \Aws\Result searchSessions(array{
 *     assistantId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchExpression?: array{filters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchSessionsAsync(array{
 *     assistantId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchExpression?: array{filters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startContentUpload(array $args = [])
 * @phpstan-method \Aws\Result startContentUpload(array{contentType?: string, knowledgeBaseId?: string, presignedUrlTimeToLive?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startContentUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startContentUploadAsync(array{contentType?: string, knowledgeBaseId?: string, presignedUrlTimeToLive?: int, ...} $args = [])
 * @method \Aws\Result startImportJob(array $args = [])
 * @phpstan-method \Aws\Result startImportJob(array{
 *     clientToken?: string,
 *     externalSourceConfiguration?: array{configuration?: array{connectConfiguration?: array, ...}, source?: 'AMAZON_CONNECT', ...},
 *     importJobType?: 'QUICK_RESPONSES',
 *     knowledgeBaseId?: string,
 *     metadata?: array<string, string>,
 *     uploadId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImportJobAsync(array{
 *     clientToken?: string,
 *     externalSourceConfiguration?: array{configuration?: array{connectConfiguration?: array, ...}, source?: 'AMAZON_CONNECT', ...},
 *     importJobType?: 'QUICK_RESPONSES',
 *     knowledgeBaseId?: string,
 *     metadata?: array<string, string>,
 *     uploadId?: string,
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
 * @method \Aws\Result updateContent(array $args = [])
 * @phpstan-method \Aws\Result updateContent(array{
 *     contentId?: string,
 *     knowledgeBaseId?: string,
 *     metadata?: array<string, string>,
 *     overrideLinkOutUri?: string,
 *     removeOverrideLinkOutUri?: bool,
 *     revisionId?: string,
 *     title?: string,
 *     uploadId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContentAsync(array{
 *     contentId?: string,
 *     knowledgeBaseId?: string,
 *     metadata?: array<string, string>,
 *     overrideLinkOutUri?: string,
 *     removeOverrideLinkOutUri?: bool,
 *     revisionId?: string,
 *     title?: string,
 *     uploadId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKnowledgeBaseTemplateUri(array $args = [])
 * @phpstan-method \Aws\Result updateKnowledgeBaseTemplateUri(array{knowledgeBaseId?: string, templateUri?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKnowledgeBaseTemplateUriAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKnowledgeBaseTemplateUriAsync(array{knowledgeBaseId?: string, templateUri?: string, ...} $args = [])
 * @method \Aws\Result updateQuickResponse(array $args = [])
 * @phpstan-method \Aws\Result updateQuickResponse(array{
 *     channels?: list<string>,
 *     content?: array{content?: string, ...},
 *     contentType?: string,
 *     description?: string,
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     isActive?: bool,
 *     knowledgeBaseId?: string,
 *     language?: string,
 *     name?: string,
 *     quickResponseId?: string,
 *     removeDescription?: bool,
 *     removeGroupingConfiguration?: bool,
 *     removeShortcutKey?: bool,
 *     shortcutKey?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQuickResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQuickResponseAsync(array{
 *     channels?: list<string>,
 *     content?: array{content?: string, ...},
 *     contentType?: string,
 *     description?: string,
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     isActive?: bool,
 *     knowledgeBaseId?: string,
 *     language?: string,
 *     name?: string,
 *     quickResponseId?: string,
 *     removeDescription?: bool,
 *     removeGroupingConfiguration?: bool,
 *     removeShortcutKey?: bool,
 *     shortcutKey?: string,
 *     ...,
 * } $args = [])
 */
class ConnectWisdomServiceClient extends AwsClient {}
