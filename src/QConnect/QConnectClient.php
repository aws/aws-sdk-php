<?php
namespace Aws\QConnect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Q Connect** service.
 * @method \Aws\Result activateMessageTemplate(array $args = [])
 * @phpstan-method \Aws\Result activateMessageTemplate(array{knowledgeBaseId?: string, messageTemplateId?: string, versionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise activateMessageTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activateMessageTemplateAsync(array{knowledgeBaseId?: string, messageTemplateId?: string, versionNumber?: int, ...} $args = [])
 * @method \Aws\Result createAIAgent(array $args = [])
 * @phpstan-method \Aws\Result createAIAgent(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     name?: string,
 *     type?: 'ANSWER_RECOMMENDATION'|'CASE_SUMMARIZATION'|'EMAIL_GENERATIVE_ANSWER'|'EMAIL_OVERVIEW'|'EMAIL_RESPONSE'|'MANUAL_SEARCH'|'NOTE_TAKING'|'ORCHESTRATION'|'SELF_SERVICE',
 *     configuration?: array{
 *         manualSearchAIAgentConfiguration?: array{
 *             answerGenerationAIPromptId?: string,
 *             answerGenerationAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             locale?: string,
 *             ...,
 *         },
 *         answerRecommendationAIAgentConfiguration?: array{
 *             intentLabelingGenerationAIPromptId?: string,
 *             queryReformulationAIPromptId?: string,
 *             answerGenerationAIPromptId?: string,
 *             answerGenerationAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             locale?: string,
 *             suggestedMessages?: list<string>,
 *             ...,
 *         },
 *         selfServiceAIAgentConfiguration?: array{
 *             selfServicePreProcessingAIPromptId?: string,
 *             selfServiceAnswerGenerationAIPromptId?: string,
 *             selfServiceAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         emailResponseAIAgentConfiguration?: array{
 *             emailResponseAIPromptId?: string,
 *             emailQueryReformulationAIPromptId?: string,
 *             locale?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         emailOverviewAIAgentConfiguration?: array{emailOverviewAIPromptId?: string, locale?: string, ...},
 *         emailGenerativeAnswerAIAgentConfiguration?: array{
 *             emailGenerativeAnswerAIPromptId?: string,
 *             emailQueryReformulationAIPromptId?: string,
 *             locale?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         orchestrationAIAgentConfiguration?: array{
 *             orchestrationAIPromptId?: string,
 *             orchestrationAIGuardrailId?: string,
 *             toolConfigurations?: list<array>,
 *             connectInstanceArn?: string,
 *             locale?: string,
 *             ...,
 *         },
 *         noteTakingAIAgentConfiguration?: array{noteTakingAIPromptId?: string, noteTakingAIGuardrailId?: string, locale?: string, ...},
 *         caseSummarizationAIAgentConfiguration?: array{caseSummarizationAIPromptId?: string, caseSummarizationAIGuardrailId?: string, locale?: string, ...},
 *         ...,
 *     },
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     tags?: array<string, string>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAIAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAIAgentAsync(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     name?: string,
 *     type?: 'ANSWER_RECOMMENDATION'|'CASE_SUMMARIZATION'|'EMAIL_GENERATIVE_ANSWER'|'EMAIL_OVERVIEW'|'EMAIL_RESPONSE'|'MANUAL_SEARCH'|'NOTE_TAKING'|'ORCHESTRATION'|'SELF_SERVICE',
 *     configuration?: array{
 *         manualSearchAIAgentConfiguration?: array{
 *             answerGenerationAIPromptId?: string,
 *             answerGenerationAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             locale?: string,
 *             ...,
 *         },
 *         answerRecommendationAIAgentConfiguration?: array{
 *             intentLabelingGenerationAIPromptId?: string,
 *             queryReformulationAIPromptId?: string,
 *             answerGenerationAIPromptId?: string,
 *             answerGenerationAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             locale?: string,
 *             suggestedMessages?: list<string>,
 *             ...,
 *         },
 *         selfServiceAIAgentConfiguration?: array{
 *             selfServicePreProcessingAIPromptId?: string,
 *             selfServiceAnswerGenerationAIPromptId?: string,
 *             selfServiceAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         emailResponseAIAgentConfiguration?: array{
 *             emailResponseAIPromptId?: string,
 *             emailQueryReformulationAIPromptId?: string,
 *             locale?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         emailOverviewAIAgentConfiguration?: array{emailOverviewAIPromptId?: string, locale?: string, ...},
 *         emailGenerativeAnswerAIAgentConfiguration?: array{
 *             emailGenerativeAnswerAIPromptId?: string,
 *             emailQueryReformulationAIPromptId?: string,
 *             locale?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         orchestrationAIAgentConfiguration?: array{
 *             orchestrationAIPromptId?: string,
 *             orchestrationAIGuardrailId?: string,
 *             toolConfigurations?: list<array>,
 *             connectInstanceArn?: string,
 *             locale?: string,
 *             ...,
 *         },
 *         noteTakingAIAgentConfiguration?: array{noteTakingAIPromptId?: string, noteTakingAIGuardrailId?: string, locale?: string, ...},
 *         caseSummarizationAIAgentConfiguration?: array{caseSummarizationAIPromptId?: string, caseSummarizationAIGuardrailId?: string, locale?: string, ...},
 *         ...,
 *     },
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     tags?: array<string, string>,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAIAgentVersion(array $args = [])
 * @phpstan-method \Aws\Result createAIAgentVersion(array{
 *     assistantId?: string,
 *     aiAgentId?: string,
 *     modifiedTime?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAIAgentVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAIAgentVersionAsync(array{
 *     assistantId?: string,
 *     aiAgentId?: string,
 *     modifiedTime?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAIGuardrail(array $args = [])
 * @phpstan-method \Aws\Result createAIGuardrail(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     name?: string,
 *     blockedInputMessaging?: string,
 *     blockedOutputsMessaging?: string,
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     description?: string,
 *     topicPolicyConfig?: array{topicsConfig?: list<array>, ...},
 *     contentPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     wordPolicyConfig?: array{wordsConfig?: list<array>, managedWordListsConfig?: list<array>, ...},
 *     sensitiveInformationPolicyConfig?: array{piiEntitiesConfig?: list<array>, regexesConfig?: list<array>, ...},
 *     contextualGroundingPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAIGuardrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAIGuardrailAsync(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     name?: string,
 *     blockedInputMessaging?: string,
 *     blockedOutputsMessaging?: string,
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     description?: string,
 *     topicPolicyConfig?: array{topicsConfig?: list<array>, ...},
 *     contentPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     wordPolicyConfig?: array{wordsConfig?: list<array>, managedWordListsConfig?: list<array>, ...},
 *     sensitiveInformationPolicyConfig?: array{piiEntitiesConfig?: list<array>, regexesConfig?: list<array>, ...},
 *     contextualGroundingPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAIGuardrailVersion(array $args = [])
 * @phpstan-method \Aws\Result createAIGuardrailVersion(array{
 *     assistantId?: string,
 *     aiGuardrailId?: string,
 *     modifiedTime?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAIGuardrailVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAIGuardrailVersionAsync(array{
 *     assistantId?: string,
 *     aiGuardrailId?: string,
 *     modifiedTime?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAIPrompt(array $args = [])
 * @phpstan-method \Aws\Result createAIPrompt(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     name?: string,
 *     type?: 'ANSWER_GENERATION'|'CASE_SUMMARIZATION'|'EMAIL_GENERATIVE_ANSWER'|'EMAIL_OVERVIEW'|'EMAIL_QUERY_REFORMULATION'|'EMAIL_RESPONSE'|'INTENT_LABELING_GENERATION'|'NOTE_TAKING'|'ORCHESTRATION'|'QUERY_REFORMULATION'|'SELF_SERVICE_ANSWER_GENERATION'|'SELF_SERVICE_PRE_PROCESSING',
 *     templateConfiguration?: array{textFullAIPromptEditTemplateConfiguration?: array{text?: string, ...}, ...},
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     templateType?: 'TEXT',
 *     modelId?: string,
 *     apiFormat?: 'ANTHROPIC_CLAUDE_MESSAGES'|'ANTHROPIC_CLAUDE_TEXT_COMPLETIONS'|'MESSAGES'|'TEXT_COMPLETIONS',
 *     tags?: array<string, string>,
 *     description?: string,
 *     inferenceConfiguration?: array{temperature?: float, topP?: float, topK?: int, maxTokensToSample?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAIPromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAIPromptAsync(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     name?: string,
 *     type?: 'ANSWER_GENERATION'|'CASE_SUMMARIZATION'|'EMAIL_GENERATIVE_ANSWER'|'EMAIL_OVERVIEW'|'EMAIL_QUERY_REFORMULATION'|'EMAIL_RESPONSE'|'INTENT_LABELING_GENERATION'|'NOTE_TAKING'|'ORCHESTRATION'|'QUERY_REFORMULATION'|'SELF_SERVICE_ANSWER_GENERATION'|'SELF_SERVICE_PRE_PROCESSING',
 *     templateConfiguration?: array{textFullAIPromptEditTemplateConfiguration?: array{text?: string, ...}, ...},
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     templateType?: 'TEXT',
 *     modelId?: string,
 *     apiFormat?: 'ANTHROPIC_CLAUDE_MESSAGES'|'ANTHROPIC_CLAUDE_TEXT_COMPLETIONS'|'MESSAGES'|'TEXT_COMPLETIONS',
 *     tags?: array<string, string>,
 *     description?: string,
 *     inferenceConfiguration?: array{temperature?: float, topP?: float, topK?: int, maxTokensToSample?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAIPromptVersion(array $args = [])
 * @phpstan-method \Aws\Result createAIPromptVersion(array{
 *     assistantId?: string,
 *     aiPromptId?: string,
 *     modifiedTime?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAIPromptVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAIPromptVersionAsync(array{
 *     assistantId?: string,
 *     aiPromptId?: string,
 *     modifiedTime?: int|string|\DateTimeInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssistant(array $args = [])
 * @phpstan-method \Aws\Result createAssistant(array{
 *     clientToken?: string,
 *     name?: string,
 *     type?: 'AGENT',
 *     description?: string,
 *     tags?: array<string, string>,
 *     serverSideEncryptionConfiguration?: array{kmsKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssistantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssistantAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     type?: 'AGENT',
 *     description?: string,
 *     tags?: array<string, string>,
 *     serverSideEncryptionConfiguration?: array{kmsKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssistantAssociation(array $args = [])
 * @phpstan-method \Aws\Result createAssistantAssociation(array{
 *     assistantId?: string,
 *     associationType?: 'EXTERNAL_BEDROCK_KNOWLEDGE_BASE'|'KNOWLEDGE_BASE',
 *     association?: array{
 *         knowledgeBaseId?: string,
 *         externalBedrockKnowledgeBaseConfig?: array{bedrockKnowledgeBaseArn?: string, accessRoleArn?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssistantAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssistantAssociationAsync(array{
 *     assistantId?: string,
 *     associationType?: 'EXTERNAL_BEDROCK_KNOWLEDGE_BASE'|'KNOWLEDGE_BASE',
 *     association?: array{
 *         knowledgeBaseId?: string,
 *         externalBedrockKnowledgeBaseConfig?: array{bedrockKnowledgeBaseArn?: string, accessRoleArn?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContent(array $args = [])
 * @phpstan-method \Aws\Result createContent(array{
 *     knowledgeBaseId?: string,
 *     name?: string,
 *     title?: string,
 *     overrideLinkOutUri?: string,
 *     metadata?: array<string, string>,
 *     uploadId?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContentAsync(array{
 *     knowledgeBaseId?: string,
 *     name?: string,
 *     title?: string,
 *     overrideLinkOutUri?: string,
 *     metadata?: array<string, string>,
 *     uploadId?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createContentAssociation(array $args = [])
 * @phpstan-method \Aws\Result createContentAssociation(array{
 *     clientToken?: string,
 *     knowledgeBaseId?: string,
 *     contentId?: string,
 *     associationType?: 'AMAZON_CONNECT_GUIDE',
 *     association?: array{amazonConnectGuideAssociation?: array{flowId?: string, ...}, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createContentAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createContentAssociationAsync(array{
 *     clientToken?: string,
 *     knowledgeBaseId?: string,
 *     contentId?: string,
 *     associationType?: 'AMAZON_CONNECT_GUIDE',
 *     association?: array{amazonConnectGuideAssociation?: array{flowId?: string, ...}, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result createKnowledgeBase(array{
 *     clientToken?: string,
 *     name?: string,
 *     knowledgeBaseType?: 'CUSTOM'|'EXTERNAL'|'MANAGED'|'MESSAGE_TEMPLATES'|'QUICK_RESPONSES',
 *     sourceConfiguration?: array{
 *         appIntegrations?: array{appIntegrationArn?: string, objectFields?: list<string>, ...},
 *         managedSourceConfiguration?: array{webCrawlerConfiguration?: array, ...},
 *         ...,
 *     },
 *     renderingConfiguration?: array{templateUri?: string, ...},
 *     vectorIngestionConfiguration?: array{
 *         chunkingConfiguration?: array{
 *             chunkingStrategy?: 'FIXED_SIZE'|'HIERARCHICAL'|'NONE'|'SEMANTIC',
 *             fixedSizeChunkingConfiguration?: array,
 *             hierarchicalChunkingConfiguration?: array,
 *             semanticChunkingConfiguration?: array,
 *             ...,
 *         },
 *         parsingConfiguration?: array{parsingStrategy?: 'BEDROCK_FOUNDATION_MODEL', bedrockFoundationModelConfiguration?: array, ...},
 *         ...,
 *     },
 *     serverSideEncryptionConfiguration?: array{kmsKeyId?: string, ...},
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKnowledgeBaseAsync(array{
 *     clientToken?: string,
 *     name?: string,
 *     knowledgeBaseType?: 'CUSTOM'|'EXTERNAL'|'MANAGED'|'MESSAGE_TEMPLATES'|'QUICK_RESPONSES',
 *     sourceConfiguration?: array{
 *         appIntegrations?: array{appIntegrationArn?: string, objectFields?: list<string>, ...},
 *         managedSourceConfiguration?: array{webCrawlerConfiguration?: array, ...},
 *         ...,
 *     },
 *     renderingConfiguration?: array{templateUri?: string, ...},
 *     vectorIngestionConfiguration?: array{
 *         chunkingConfiguration?: array{
 *             chunkingStrategy?: 'FIXED_SIZE'|'HIERARCHICAL'|'NONE'|'SEMANTIC',
 *             fixedSizeChunkingConfiguration?: array,
 *             hierarchicalChunkingConfiguration?: array,
 *             semanticChunkingConfiguration?: array,
 *             ...,
 *         },
 *         parsingConfiguration?: array{parsingStrategy?: 'BEDROCK_FOUNDATION_MODEL', bedrockFoundationModelConfiguration?: array, ...},
 *         ...,
 *     },
 *     serverSideEncryptionConfiguration?: array{kmsKeyId?: string, ...},
 *     description?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMessageTemplate(array $args = [])
 * @phpstan-method \Aws\Result createMessageTemplate(array{
 *     knowledgeBaseId?: string,
 *     name?: string,
 *     content?: array{
 *         email?: array{subject?: string, body?: array, headers?: list<array>, ...},
 *         sms?: array{body?: array, ...},
 *         whatsApp?: array{data?: string, ...},
 *         push?: array{adm?: array, apns?: array, fcm?: array, baidu?: array, ...},
 *         ...,
 *     },
 *     description?: string,
 *     channelSubtype?: 'EMAIL'|'PUSH'|'SMS'|'WHATSAPP',
 *     language?: string,
 *     sourceConfiguration?: array{whatsApp?: array{businessAccountId?: string, templateId?: string, components?: list<string>, ...}, ...},
 *     defaultAttributes?: array{
 *         systemAttributes?: array{name?: string, customerEndpoint?: array, systemEndpoint?: array, ...},
 *         agentAttributes?: array{firstName?: string, lastName?: string, ...},
 *         customerProfileAttributes?: array{
 *             profileId?: string,
 *             profileARN?: string,
 *             firstName?: string,
 *             middleName?: string,
 *             lastName?: string,
 *             accountNumber?: string,
 *             emailAddress?: string,
 *             phoneNumber?: string,
 *             additionalInformation?: string,
 *             partyType?: string,
 *             businessName?: string,
 *             birthDate?: string,
 *             gender?: string,
 *             mobilePhoneNumber?: string,
 *             homePhoneNumber?: string,
 *             businessPhoneNumber?: string,
 *             businessEmailAddress?: string,
 *             address1?: string,
 *             address2?: string,
 *             address3?: string,
 *             address4?: string,
 *             city?: string,
 *             county?: string,
 *             country?: string,
 *             postalCode?: string,
 *             province?: string,
 *             state?: string,
 *             shippingAddress1?: string,
 *             shippingAddress2?: string,
 *             shippingAddress3?: string,
 *             shippingAddress4?: string,
 *             shippingCity?: string,
 *             shippingCounty?: string,
 *             shippingCountry?: string,
 *             shippingPostalCode?: string,
 *             shippingProvince?: string,
 *             shippingState?: string,
 *             mailingAddress1?: string,
 *             mailingAddress2?: string,
 *             mailingAddress3?: string,
 *             mailingAddress4?: string,
 *             mailingCity?: string,
 *             mailingCounty?: string,
 *             mailingCountry?: string,
 *             mailingPostalCode?: string,
 *             mailingProvince?: string,
 *             mailingState?: string,
 *             billingAddress1?: string,
 *             billingAddress2?: string,
 *             billingAddress3?: string,
 *             billingAddress4?: string,
 *             billingCity?: string,
 *             billingCounty?: string,
 *             billingCountry?: string,
 *             billingPostalCode?: string,
 *             billingProvince?: string,
 *             billingState?: string,
 *             custom?: array<string, string>,
 *             ...,
 *         },
 *         customAttributes?: array<string, string>,
 *         ...,
 *     },
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMessageTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMessageTemplateAsync(array{
 *     knowledgeBaseId?: string,
 *     name?: string,
 *     content?: array{
 *         email?: array{subject?: string, body?: array, headers?: list<array>, ...},
 *         sms?: array{body?: array, ...},
 *         whatsApp?: array{data?: string, ...},
 *         push?: array{adm?: array, apns?: array, fcm?: array, baidu?: array, ...},
 *         ...,
 *     },
 *     description?: string,
 *     channelSubtype?: 'EMAIL'|'PUSH'|'SMS'|'WHATSAPP',
 *     language?: string,
 *     sourceConfiguration?: array{whatsApp?: array{businessAccountId?: string, templateId?: string, components?: list<string>, ...}, ...},
 *     defaultAttributes?: array{
 *         systemAttributes?: array{name?: string, customerEndpoint?: array, systemEndpoint?: array, ...},
 *         agentAttributes?: array{firstName?: string, lastName?: string, ...},
 *         customerProfileAttributes?: array{
 *             profileId?: string,
 *             profileARN?: string,
 *             firstName?: string,
 *             middleName?: string,
 *             lastName?: string,
 *             accountNumber?: string,
 *             emailAddress?: string,
 *             phoneNumber?: string,
 *             additionalInformation?: string,
 *             partyType?: string,
 *             businessName?: string,
 *             birthDate?: string,
 *             gender?: string,
 *             mobilePhoneNumber?: string,
 *             homePhoneNumber?: string,
 *             businessPhoneNumber?: string,
 *             businessEmailAddress?: string,
 *             address1?: string,
 *             address2?: string,
 *             address3?: string,
 *             address4?: string,
 *             city?: string,
 *             county?: string,
 *             country?: string,
 *             postalCode?: string,
 *             province?: string,
 *             state?: string,
 *             shippingAddress1?: string,
 *             shippingAddress2?: string,
 *             shippingAddress3?: string,
 *             shippingAddress4?: string,
 *             shippingCity?: string,
 *             shippingCounty?: string,
 *             shippingCountry?: string,
 *             shippingPostalCode?: string,
 *             shippingProvince?: string,
 *             shippingState?: string,
 *             mailingAddress1?: string,
 *             mailingAddress2?: string,
 *             mailingAddress3?: string,
 *             mailingAddress4?: string,
 *             mailingCity?: string,
 *             mailingCounty?: string,
 *             mailingCountry?: string,
 *             mailingPostalCode?: string,
 *             mailingProvince?: string,
 *             mailingState?: string,
 *             billingAddress1?: string,
 *             billingAddress2?: string,
 *             billingAddress3?: string,
 *             billingAddress4?: string,
 *             billingCity?: string,
 *             billingCounty?: string,
 *             billingCountry?: string,
 *             billingPostalCode?: string,
 *             billingProvince?: string,
 *             billingState?: string,
 *             custom?: array<string, string>,
 *             ...,
 *         },
 *         customAttributes?: array<string, string>,
 *         ...,
 *     },
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMessageTemplateAttachment(array $args = [])
 * @phpstan-method \Aws\Result createMessageTemplateAttachment(array{
 *     knowledgeBaseId?: string,
 *     messageTemplateId?: string,
 *     contentDisposition?: 'ATTACHMENT',
 *     name?: string,
 *     body?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMessageTemplateAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMessageTemplateAttachmentAsync(array{
 *     knowledgeBaseId?: string,
 *     messageTemplateId?: string,
 *     contentDisposition?: 'ATTACHMENT',
 *     name?: string,
 *     body?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMessageTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result createMessageTemplateVersion(array{knowledgeBaseId?: string, messageTemplateId?: string, messageTemplateContentSha256?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createMessageTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMessageTemplateVersionAsync(array{knowledgeBaseId?: string, messageTemplateId?: string, messageTemplateContentSha256?: string, ...} $args = [])
 * @method \Aws\Result createQuickResponse(array $args = [])
 * @phpstan-method \Aws\Result createQuickResponse(array{
 *     knowledgeBaseId?: string,
 *     name?: string,
 *     content?: array{content?: string, ...},
 *     contentType?: string,
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     description?: string,
 *     shortcutKey?: string,
 *     isActive?: bool,
 *     channels?: list<string>,
 *     language?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQuickResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQuickResponseAsync(array{
 *     knowledgeBaseId?: string,
 *     name?: string,
 *     content?: array{content?: string, ...},
 *     contentType?: string,
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     description?: string,
 *     shortcutKey?: string,
 *     isActive?: bool,
 *     channels?: list<string>,
 *     language?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSession(array $args = [])
 * @phpstan-method \Aws\Result createSession(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     tagFilter?: array{
 *         tagCondition?: array{key?: string, value?: string, ...},
 *         andConditions?: list<array>,
 *         orConditions?: list<array>,
 *         ...,
 *     },
 *     aiAgentConfiguration?: array<string, array{aiAgentId?: string, ...}>,
 *     contactArn?: string,
 *     orchestratorConfigurationList?: list<array{aiAgentId?: string, orchestratorUseCase?: string, ...}>,
 *     removeOrchestratorConfigurationList?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSessionAsync(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     name?: string,
 *     description?: string,
 *     tags?: array<string, string>,
 *     tagFilter?: array{
 *         tagCondition?: array{key?: string, value?: string, ...},
 *         andConditions?: list<array>,
 *         orConditions?: list<array>,
 *         ...,
 *     },
 *     aiAgentConfiguration?: array<string, array{aiAgentId?: string, ...}>,
 *     contactArn?: string,
 *     orchestratorConfigurationList?: list<array{aiAgentId?: string, orchestratorUseCase?: string, ...}>,
 *     removeOrchestratorConfigurationList?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deactivateMessageTemplate(array $args = [])
 * @phpstan-method \Aws\Result deactivateMessageTemplate(array{knowledgeBaseId?: string, messageTemplateId?: string, versionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateMessageTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivateMessageTemplateAsync(array{knowledgeBaseId?: string, messageTemplateId?: string, versionNumber?: int, ...} $args = [])
 * @method \Aws\Result deleteAIAgent(array $args = [])
 * @phpstan-method \Aws\Result deleteAIAgent(array{assistantId?: string, aiAgentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAIAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAIAgentAsync(array{assistantId?: string, aiAgentId?: string, ...} $args = [])
 * @method \Aws\Result deleteAIAgentVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteAIAgentVersion(array{assistantId?: string, aiAgentId?: string, versionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAIAgentVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAIAgentVersionAsync(array{assistantId?: string, aiAgentId?: string, versionNumber?: int, ...} $args = [])
 * @method \Aws\Result deleteAIGuardrail(array $args = [])
 * @phpstan-method \Aws\Result deleteAIGuardrail(array{assistantId?: string, aiGuardrailId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAIGuardrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAIGuardrailAsync(array{assistantId?: string, aiGuardrailId?: string, ...} $args = [])
 * @method \Aws\Result deleteAIGuardrailVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteAIGuardrailVersion(array{assistantId?: string, aiGuardrailId?: string, versionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAIGuardrailVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAIGuardrailVersionAsync(array{assistantId?: string, aiGuardrailId?: string, versionNumber?: int, ...} $args = [])
 * @method \Aws\Result deleteAIPrompt(array $args = [])
 * @phpstan-method \Aws\Result deleteAIPrompt(array{assistantId?: string, aiPromptId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAIPromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAIPromptAsync(array{assistantId?: string, aiPromptId?: string, ...} $args = [])
 * @method \Aws\Result deleteAIPromptVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteAIPromptVersion(array{assistantId?: string, aiPromptId?: string, versionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAIPromptVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAIPromptVersionAsync(array{assistantId?: string, aiPromptId?: string, versionNumber?: int, ...} $args = [])
 * @method \Aws\Result deleteAssistant(array $args = [])
 * @phpstan-method \Aws\Result deleteAssistant(array{assistantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssistantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssistantAsync(array{assistantId?: string, ...} $args = [])
 * @method \Aws\Result deleteAssistantAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteAssistantAssociation(array{assistantAssociationId?: string, assistantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssistantAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssistantAssociationAsync(array{assistantAssociationId?: string, assistantId?: string, ...} $args = [])
 * @method \Aws\Result deleteContent(array $args = [])
 * @phpstan-method \Aws\Result deleteContent(array{knowledgeBaseId?: string, contentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContentAsync(array{knowledgeBaseId?: string, contentId?: string, ...} $args = [])
 * @method \Aws\Result deleteContentAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteContentAssociation(array{knowledgeBaseId?: string, contentId?: string, contentAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteContentAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteContentAssociationAsync(array{knowledgeBaseId?: string, contentId?: string, contentAssociationId?: string, ...} $args = [])
 * @method \Aws\Result deleteImportJob(array $args = [])
 * @phpstan-method \Aws\Result deleteImportJob(array{knowledgeBaseId?: string, importJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImportJobAsync(array{knowledgeBaseId?: string, importJobId?: string, ...} $args = [])
 * @method \Aws\Result deleteKnowledgeBase(array $args = [])
 * @phpstan-method \Aws\Result deleteKnowledgeBase(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteKnowledgeBaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteKnowledgeBaseAsync(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result deleteMessageTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteMessageTemplate(array{knowledgeBaseId?: string, messageTemplateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMessageTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMessageTemplateAsync(array{knowledgeBaseId?: string, messageTemplateId?: string, ...} $args = [])
 * @method \Aws\Result deleteMessageTemplateAttachment(array $args = [])
 * @phpstan-method \Aws\Result deleteMessageTemplateAttachment(array{knowledgeBaseId?: string, messageTemplateId?: string, attachmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMessageTemplateAttachmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMessageTemplateAttachmentAsync(array{knowledgeBaseId?: string, messageTemplateId?: string, attachmentId?: string, ...} $args = [])
 * @method \Aws\Result deleteQuickResponse(array $args = [])
 * @phpstan-method \Aws\Result deleteQuickResponse(array{knowledgeBaseId?: string, quickResponseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQuickResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQuickResponseAsync(array{knowledgeBaseId?: string, quickResponseId?: string, ...} $args = [])
 * @method \Aws\Result getAIAgent(array $args = [])
 * @phpstan-method \Aws\Result getAIAgent(array{assistantId?: string, aiAgentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAIAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAIAgentAsync(array{assistantId?: string, aiAgentId?: string, ...} $args = [])
 * @method \Aws\Result getAIGuardrail(array $args = [])
 * @phpstan-method \Aws\Result getAIGuardrail(array{assistantId?: string, aiGuardrailId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAIGuardrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAIGuardrailAsync(array{assistantId?: string, aiGuardrailId?: string, ...} $args = [])
 * @method \Aws\Result getAIPrompt(array $args = [])
 * @phpstan-method \Aws\Result getAIPrompt(array{assistantId?: string, aiPromptId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAIPromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAIPromptAsync(array{assistantId?: string, aiPromptId?: string, ...} $args = [])
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
 * @method \Aws\Result getContentAssociation(array $args = [])
 * @phpstan-method \Aws\Result getContentAssociation(array{knowledgeBaseId?: string, contentId?: string, contentAssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getContentAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContentAssociationAsync(array{knowledgeBaseId?: string, contentId?: string, contentAssociationId?: string, ...} $args = [])
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
 * @method \Aws\Result getMessageTemplate(array $args = [])
 * @phpstan-method \Aws\Result getMessageTemplate(array{messageTemplateId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMessageTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMessageTemplateAsync(array{messageTemplateId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result getNextMessage(array $args = [])
 * @phpstan-method \Aws\Result getNextMessage(array{assistantId?: string, sessionId?: string, nextMessageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNextMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNextMessageAsync(array{assistantId?: string, sessionId?: string, nextMessageToken?: string, ...} $args = [])
 * @method \Aws\Result getQuickResponse(array $args = [])
 * @phpstan-method \Aws\Result getQuickResponse(array{quickResponseId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQuickResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQuickResponseAsync(array{quickResponseId?: string, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result getRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getRecommendations(array{
 *     assistantId?: string,
 *     sessionId?: string,
 *     maxResults?: int,
 *     waitTimeSeconds?: int,
 *     nextChunkToken?: string,
 *     recommendationType?: 'BLOCKED_CASE_SUMMARIZATION_CHUNK'|'BLOCKED_GENERATIVE_ANSWER_CHUNK'|'BLOCKED_INTENT_ANSWER_CHUNK'|'BLOCKED_NOTES_CHUNK'|'CASE_SUMMARIZATION_CHUNK'|'DETECTED_INTENT'|'EMAIL_GENERATIVE_ANSWER_CHUNK'|'EMAIL_OVERVIEW_CHUNK'|'EMAIL_RESPONSE_CHUNK'|'GENERATIVE_ANSWER'|'GENERATIVE_ANSWER_CHUNK'|'GENERATIVE_RESPONSE'|'INTENT_ANSWER_CHUNK'|'KNOWLEDGE_CONTENT'|'NOTES_CHUNK'|'SUGGESTED_MESSAGE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationsAsync(array{
 *     assistantId?: string,
 *     sessionId?: string,
 *     maxResults?: int,
 *     waitTimeSeconds?: int,
 *     nextChunkToken?: string,
 *     recommendationType?: 'BLOCKED_CASE_SUMMARIZATION_CHUNK'|'BLOCKED_GENERATIVE_ANSWER_CHUNK'|'BLOCKED_INTENT_ANSWER_CHUNK'|'BLOCKED_NOTES_CHUNK'|'CASE_SUMMARIZATION_CHUNK'|'DETECTED_INTENT'|'EMAIL_GENERATIVE_ANSWER_CHUNK'|'EMAIL_OVERVIEW_CHUNK'|'EMAIL_RESPONSE_CHUNK'|'GENERATIVE_ANSWER'|'GENERATIVE_ANSWER_CHUNK'|'GENERATIVE_RESPONSE'|'INTENT_ANSWER_CHUNK'|'KNOWLEDGE_CONTENT'|'NOTES_CHUNK'|'SUGGESTED_MESSAGE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{assistantId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{assistantId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result listAIAgentVersions(array $args = [])
 * @phpstan-method \Aws\Result listAIAgentVersions(array{
 *     assistantId?: string,
 *     aiAgentId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     origin?: 'CUSTOMER'|'SYSTEM',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAIAgentVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAIAgentVersionsAsync(array{
 *     assistantId?: string,
 *     aiAgentId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     origin?: 'CUSTOMER'|'SYSTEM',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAIAgents(array $args = [])
 * @phpstan-method \Aws\Result listAIAgents(array{assistantId?: string, nextToken?: string, maxResults?: int, origin?: 'CUSTOMER'|'SYSTEM', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAIAgentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAIAgentsAsync(array{assistantId?: string, nextToken?: string, maxResults?: int, origin?: 'CUSTOMER'|'SYSTEM', ...} $args = [])
 * @method \Aws\Result listAIGuardrailVersions(array $args = [])
 * @phpstan-method \Aws\Result listAIGuardrailVersions(array{assistantId?: string, aiGuardrailId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAIGuardrailVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAIGuardrailVersionsAsync(array{assistantId?: string, aiGuardrailId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAIGuardrails(array $args = [])
 * @phpstan-method \Aws\Result listAIGuardrails(array{assistantId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAIGuardrailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAIGuardrailsAsync(array{assistantId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAIPromptVersions(array $args = [])
 * @phpstan-method \Aws\Result listAIPromptVersions(array{
 *     assistantId?: string,
 *     aiPromptId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     origin?: 'CUSTOMER'|'SYSTEM',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAIPromptVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAIPromptVersionsAsync(array{
 *     assistantId?: string,
 *     aiPromptId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     origin?: 'CUSTOMER'|'SYSTEM',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAIPrompts(array $args = [])
 * @phpstan-method \Aws\Result listAIPrompts(array{assistantId?: string, nextToken?: string, maxResults?: int, origin?: 'CUSTOMER'|'SYSTEM', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAIPromptsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAIPromptsAsync(array{assistantId?: string, nextToken?: string, maxResults?: int, origin?: 'CUSTOMER'|'SYSTEM', ...} $args = [])
 * @method \Aws\Result listAssistantAssociations(array $args = [])
 * @phpstan-method \Aws\Result listAssistantAssociations(array{nextToken?: string, maxResults?: int, assistantId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssistantAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssistantAssociationsAsync(array{nextToken?: string, maxResults?: int, assistantId?: string, ...} $args = [])
 * @method \Aws\Result listAssistants(array $args = [])
 * @phpstan-method \Aws\Result listAssistants(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssistantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssistantsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listContentAssociations(array $args = [])
 * @phpstan-method \Aws\Result listContentAssociations(array{nextToken?: string, maxResults?: int, knowledgeBaseId?: string, contentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContentAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContentAssociationsAsync(array{nextToken?: string, maxResults?: int, knowledgeBaseId?: string, contentId?: string, ...} $args = [])
 * @method \Aws\Result listContents(array $args = [])
 * @phpstan-method \Aws\Result listContents(array{nextToken?: string, maxResults?: int, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listContentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listContentsAsync(array{nextToken?: string, maxResults?: int, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result listImportJobs(array $args = [])
 * @phpstan-method \Aws\Result listImportJobs(array{nextToken?: string, maxResults?: int, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportJobsAsync(array{nextToken?: string, maxResults?: int, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result listKnowledgeBases(array $args = [])
 * @phpstan-method \Aws\Result listKnowledgeBases(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listKnowledgeBasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listKnowledgeBasesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listMessageTemplateVersions(array $args = [])
 * @phpstan-method \Aws\Result listMessageTemplateVersions(array{knowledgeBaseId?: string, messageTemplateId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMessageTemplateVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMessageTemplateVersionsAsync(array{knowledgeBaseId?: string, messageTemplateId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listMessageTemplates(array $args = [])
 * @phpstan-method \Aws\Result listMessageTemplates(array{nextToken?: string, maxResults?: int, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMessageTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMessageTemplatesAsync(array{nextToken?: string, maxResults?: int, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result listMessages(array $args = [])
 * @phpstan-method \Aws\Result listMessages(array{
 *     assistantId?: string,
 *     sessionId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: 'ALL'|'TEXT_ONLY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMessagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMessagesAsync(array{
 *     assistantId?: string,
 *     sessionId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: 'ALL'|'TEXT_ONLY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listModels(array $args = [])
 * @phpstan-method \Aws\Result listModels(array{
 *     assistantId?: string,
 *     aiPromptType?: 'ANSWER_GENERATION'|'CASE_SUMMARIZATION'|'EMAIL_GENERATIVE_ANSWER'|'EMAIL_OVERVIEW'|'EMAIL_QUERY_REFORMULATION'|'EMAIL_RESPONSE'|'INTENT_LABELING_GENERATION'|'NOTE_TAKING'|'ORCHESTRATION'|'QUERY_REFORMULATION'|'SELF_SERVICE_ANSWER_GENERATION'|'SELF_SERVICE_PRE_PROCESSING',
 *     modelLifecycle?: 'ACTIVE'|'LEGACY',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listModelsAsync(array{
 *     assistantId?: string,
 *     aiPromptType?: 'ANSWER_GENERATION'|'CASE_SUMMARIZATION'|'EMAIL_GENERATIVE_ANSWER'|'EMAIL_OVERVIEW'|'EMAIL_QUERY_REFORMULATION'|'EMAIL_RESPONSE'|'INTENT_LABELING_GENERATION'|'NOTE_TAKING'|'ORCHESTRATION'|'QUERY_REFORMULATION'|'SELF_SERVICE_ANSWER_GENERATION'|'SELF_SERVICE_PRE_PROCESSING',
 *     modelLifecycle?: 'ACTIVE'|'LEGACY',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listQuickResponses(array $args = [])
 * @phpstan-method \Aws\Result listQuickResponses(array{nextToken?: string, maxResults?: int, knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQuickResponsesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQuickResponsesAsync(array{nextToken?: string, maxResults?: int, knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result listSpans(array $args = [])
 * @phpstan-method \Aws\Result listSpans(array{assistantId?: string, sessionId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSpansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpansAsync(array{assistantId?: string, sessionId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result notifyRecommendationsReceived(array $args = [])
 * @phpstan-method \Aws\Result notifyRecommendationsReceived(array{assistantId?: string, sessionId?: string, recommendationIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise notifyRecommendationsReceivedAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise notifyRecommendationsReceivedAsync(array{assistantId?: string, sessionId?: string, recommendationIds?: list<string>, ...} $args = [])
 * @method \Aws\Result putFeedback(array $args = [])
 * @phpstan-method \Aws\Result putFeedback(array{
 *     assistantId?: string,
 *     targetId?: string,
 *     targetType?: 'MESSAGE'|'RECOMMENDATION'|'RESULT',
 *     contentFeedback?: array{generativeContentFeedbackData?: array{relevance?: 'HELPFUL'|'NOT_HELPFUL', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFeedbackAsync(array{
 *     assistantId?: string,
 *     targetId?: string,
 *     targetType?: 'MESSAGE'|'RECOMMENDATION'|'RESULT',
 *     contentFeedback?: array{generativeContentFeedbackData?: array{relevance?: 'HELPFUL'|'NOT_HELPFUL', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result queryAssistant(array $args = [])
 * @phpstan-method \Aws\Result queryAssistant(array{
 *     assistantId?: string,
 *     queryText?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sessionId?: string,
 *     queryCondition?: list<array{single?: array, ...}>,
 *     queryInputData?: array{
 *         queryTextInputData?: array{text?: string, ...},
 *         intentInputData?: array{intentId?: string, ...},
 *         caseSummarizationInputData?: array{caseArn?: string, ...},
 *         ...,
 *     },
 *     overrideKnowledgeBaseSearchType?: 'HYBRID'|'SEMANTIC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise queryAssistantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryAssistantAsync(array{
 *     assistantId?: string,
 *     queryText?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     sessionId?: string,
 *     queryCondition?: list<array{single?: array, ...}>,
 *     queryInputData?: array{
 *         queryTextInputData?: array{text?: string, ...},
 *         intentInputData?: array{intentId?: string, ...},
 *         caseSummarizationInputData?: array{caseArn?: string, ...},
 *         ...,
 *     },
 *     overrideKnowledgeBaseSearchType?: 'HYBRID'|'SEMANTIC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeAssistantAIAgent(array $args = [])
 * @phpstan-method \Aws\Result removeAssistantAIAgent(array{
 *     assistantId?: string,
 *     aiAgentType?: 'ANSWER_RECOMMENDATION'|'CASE_SUMMARIZATION'|'EMAIL_GENERATIVE_ANSWER'|'EMAIL_OVERVIEW'|'EMAIL_RESPONSE'|'MANUAL_SEARCH'|'NOTE_TAKING'|'ORCHESTRATION'|'SELF_SERVICE',
 *     orchestratorUseCase?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removeAssistantAIAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeAssistantAIAgentAsync(array{
 *     assistantId?: string,
 *     aiAgentType?: 'ANSWER_RECOMMENDATION'|'CASE_SUMMARIZATION'|'EMAIL_GENERATIVE_ANSWER'|'EMAIL_OVERVIEW'|'EMAIL_RESPONSE'|'MANUAL_SEARCH'|'NOTE_TAKING'|'ORCHESTRATION'|'SELF_SERVICE',
 *     orchestratorUseCase?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeKnowledgeBaseTemplateUri(array $args = [])
 * @phpstan-method \Aws\Result removeKnowledgeBaseTemplateUri(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeKnowledgeBaseTemplateUriAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeKnowledgeBaseTemplateUriAsync(array{knowledgeBaseId?: string, ...} $args = [])
 * @method \Aws\Result renderMessageTemplate(array $args = [])
 * @phpstan-method \Aws\Result renderMessageTemplate(array{
 *     knowledgeBaseId?: string,
 *     messageTemplateId?: string,
 *     attributes?: array{
 *         systemAttributes?: array{name?: string, customerEndpoint?: array, systemEndpoint?: array, ...},
 *         agentAttributes?: array{firstName?: string, lastName?: string, ...},
 *         customerProfileAttributes?: array{
 *             profileId?: string,
 *             profileARN?: string,
 *             firstName?: string,
 *             middleName?: string,
 *             lastName?: string,
 *             accountNumber?: string,
 *             emailAddress?: string,
 *             phoneNumber?: string,
 *             additionalInformation?: string,
 *             partyType?: string,
 *             businessName?: string,
 *             birthDate?: string,
 *             gender?: string,
 *             mobilePhoneNumber?: string,
 *             homePhoneNumber?: string,
 *             businessPhoneNumber?: string,
 *             businessEmailAddress?: string,
 *             address1?: string,
 *             address2?: string,
 *             address3?: string,
 *             address4?: string,
 *             city?: string,
 *             county?: string,
 *             country?: string,
 *             postalCode?: string,
 *             province?: string,
 *             state?: string,
 *             shippingAddress1?: string,
 *             shippingAddress2?: string,
 *             shippingAddress3?: string,
 *             shippingAddress4?: string,
 *             shippingCity?: string,
 *             shippingCounty?: string,
 *             shippingCountry?: string,
 *             shippingPostalCode?: string,
 *             shippingProvince?: string,
 *             shippingState?: string,
 *             mailingAddress1?: string,
 *             mailingAddress2?: string,
 *             mailingAddress3?: string,
 *             mailingAddress4?: string,
 *             mailingCity?: string,
 *             mailingCounty?: string,
 *             mailingCountry?: string,
 *             mailingPostalCode?: string,
 *             mailingProvince?: string,
 *             mailingState?: string,
 *             billingAddress1?: string,
 *             billingAddress2?: string,
 *             billingAddress3?: string,
 *             billingAddress4?: string,
 *             billingCity?: string,
 *             billingCounty?: string,
 *             billingCountry?: string,
 *             billingPostalCode?: string,
 *             billingProvince?: string,
 *             billingState?: string,
 *             custom?: array<string, string>,
 *             ...,
 *         },
 *         customAttributes?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise renderMessageTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise renderMessageTemplateAsync(array{
 *     knowledgeBaseId?: string,
 *     messageTemplateId?: string,
 *     attributes?: array{
 *         systemAttributes?: array{name?: string, customerEndpoint?: array, systemEndpoint?: array, ...},
 *         agentAttributes?: array{firstName?: string, lastName?: string, ...},
 *         customerProfileAttributes?: array{
 *             profileId?: string,
 *             profileARN?: string,
 *             firstName?: string,
 *             middleName?: string,
 *             lastName?: string,
 *             accountNumber?: string,
 *             emailAddress?: string,
 *             phoneNumber?: string,
 *             additionalInformation?: string,
 *             partyType?: string,
 *             businessName?: string,
 *             birthDate?: string,
 *             gender?: string,
 *             mobilePhoneNumber?: string,
 *             homePhoneNumber?: string,
 *             businessPhoneNumber?: string,
 *             businessEmailAddress?: string,
 *             address1?: string,
 *             address2?: string,
 *             address3?: string,
 *             address4?: string,
 *             city?: string,
 *             county?: string,
 *             country?: string,
 *             postalCode?: string,
 *             province?: string,
 *             state?: string,
 *             shippingAddress1?: string,
 *             shippingAddress2?: string,
 *             shippingAddress3?: string,
 *             shippingAddress4?: string,
 *             shippingCity?: string,
 *             shippingCounty?: string,
 *             shippingCountry?: string,
 *             shippingPostalCode?: string,
 *             shippingProvince?: string,
 *             shippingState?: string,
 *             mailingAddress1?: string,
 *             mailingAddress2?: string,
 *             mailingAddress3?: string,
 *             mailingAddress4?: string,
 *             mailingCity?: string,
 *             mailingCounty?: string,
 *             mailingCountry?: string,
 *             mailingPostalCode?: string,
 *             mailingProvince?: string,
 *             mailingState?: string,
 *             billingAddress1?: string,
 *             billingAddress2?: string,
 *             billingAddress3?: string,
 *             billingAddress4?: string,
 *             billingCity?: string,
 *             billingCounty?: string,
 *             billingCountry?: string,
 *             billingPostalCode?: string,
 *             billingProvince?: string,
 *             billingState?: string,
 *             custom?: array<string, string>,
 *             ...,
 *         },
 *         customAttributes?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result retrieve(array $args = [])
 * @phpstan-method \Aws\Result retrieve(array{
 *     assistantId?: string,
 *     retrievalConfiguration?: array{
 *         knowledgeSource?: array{assistantAssociationIds?: list<string>, ...},
 *         filter?: array{
 *             andAll?: list<array>,
 *             equals?: array,
 *             greaterThan?: array,
 *             greaterThanOrEquals?: array,
 *             in?: array,
 *             lessThan?: array,
 *             lessThanOrEquals?: array,
 *             listContains?: array,
 *             notEquals?: array,
 *             notIn?: array,
 *             orAll?: list<array>,
 *             startsWith?: array,
 *             stringContains?: array,
 *             ...,
 *         },
 *         numberOfResults?: int,
 *         overrideKnowledgeBaseSearchType?: 'HYBRID'|'SEMANTIC',
 *         ...,
 *     },
 *     retrievalQuery?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise retrieveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retrieveAsync(array{
 *     assistantId?: string,
 *     retrievalConfiguration?: array{
 *         knowledgeSource?: array{assistantAssociationIds?: list<string>, ...},
 *         filter?: array{
 *             andAll?: list<array>,
 *             equals?: array,
 *             greaterThan?: array,
 *             greaterThanOrEquals?: array,
 *             in?: array,
 *             lessThan?: array,
 *             lessThanOrEquals?: array,
 *             listContains?: array,
 *             notEquals?: array,
 *             notIn?: array,
 *             orAll?: list<array>,
 *             startsWith?: array,
 *             stringContains?: array,
 *             ...,
 *         },
 *         numberOfResults?: int,
 *         overrideKnowledgeBaseSearchType?: 'HYBRID'|'SEMANTIC',
 *         ...,
 *     },
 *     retrievalQuery?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchContent(array $args = [])
 * @phpstan-method \Aws\Result searchContent(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     knowledgeBaseId?: string,
 *     searchExpression?: array{filters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchContentAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     knowledgeBaseId?: string,
 *     searchExpression?: array{filters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchMessageTemplates(array $args = [])
 * @phpstan-method \Aws\Result searchMessageTemplates(array{
 *     knowledgeBaseId?: string,
 *     searchExpression?: array{
 *         queries?: list<array>,
 *         filters?: list<array>,
 *         orderOnField?: array{name?: string, order?: 'ASC'|'DESC', ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchMessageTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchMessageTemplatesAsync(array{
 *     knowledgeBaseId?: string,
 *     searchExpression?: array{
 *         queries?: list<array>,
 *         filters?: list<array>,
 *         orderOnField?: array{name?: string, order?: 'ASC'|'DESC', ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchQuickResponses(array $args = [])
 * @phpstan-method \Aws\Result searchQuickResponses(array{
 *     knowledgeBaseId?: string,
 *     searchExpression?: array{
 *         queries?: list<array>,
 *         filters?: list<array>,
 *         orderOnField?: array{name?: string, order?: 'ASC'|'DESC', ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     attributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchQuickResponsesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchQuickResponsesAsync(array{
 *     knowledgeBaseId?: string,
 *     searchExpression?: array{
 *         queries?: list<array>,
 *         filters?: list<array>,
 *         orderOnField?: array{name?: string, order?: 'ASC'|'DESC', ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     attributes?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchSessions(array $args = [])
 * @phpstan-method \Aws\Result searchSessions(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     assistantId?: string,
 *     searchExpression?: array{filters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchSessionsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     assistantId?: string,
 *     searchExpression?: array{filters?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendMessage(array $args = [])
 * @phpstan-method \Aws\Result sendMessage(array{
 *     assistantId?: string,
 *     sessionId?: string,
 *     type?: 'TEXT'|'TOOL_USE_RESULT',
 *     message?: array{value?: array{text?: array, toolUseResult?: array, ...}, ...},
 *     aiAgentId?: string,
 *     conversationContext?: array{selfServiceConversationHistory?: list<array>, ...},
 *     configuration?: array{generateFillerMessage?: bool, generateChunkedMessage?: bool, ...},
 *     clientToken?: string,
 *     orchestratorUseCase?: string,
 *     metadata?: array<string, string>,
 *     originRequestId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendMessageAsync(array{
 *     assistantId?: string,
 *     sessionId?: string,
 *     type?: 'TEXT'|'TOOL_USE_RESULT',
 *     message?: array{value?: array{text?: array, toolUseResult?: array, ...}, ...},
 *     aiAgentId?: string,
 *     conversationContext?: array{selfServiceConversationHistory?: list<array>, ...},
 *     configuration?: array{generateFillerMessage?: bool, generateChunkedMessage?: bool, ...},
 *     clientToken?: string,
 *     orchestratorUseCase?: string,
 *     metadata?: array<string, string>,
 *     originRequestId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startContentUpload(array $args = [])
 * @phpstan-method \Aws\Result startContentUpload(array{knowledgeBaseId?: string, contentType?: string, presignedUrlTimeToLive?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startContentUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startContentUploadAsync(array{knowledgeBaseId?: string, contentType?: string, presignedUrlTimeToLive?: int, ...} $args = [])
 * @method \Aws\Result startImportJob(array $args = [])
 * @phpstan-method \Aws\Result startImportJob(array{
 *     knowledgeBaseId?: string,
 *     importJobType?: 'QUICK_RESPONSES',
 *     uploadId?: string,
 *     clientToken?: string,
 *     metadata?: array<string, string>,
 *     externalSourceConfiguration?: array{source?: 'AMAZON_CONNECT', configuration?: array{connectConfiguration?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImportJobAsync(array{
 *     knowledgeBaseId?: string,
 *     importJobType?: 'QUICK_RESPONSES',
 *     uploadId?: string,
 *     clientToken?: string,
 *     metadata?: array<string, string>,
 *     externalSourceConfiguration?: array{source?: 'AMAZON_CONNECT', configuration?: array{connectConfiguration?: array, ...}, ...},
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
 * @method \Aws\Result updateAIAgent(array $args = [])
 * @phpstan-method \Aws\Result updateAIAgent(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     aiAgentId?: string,
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     configuration?: array{
 *         manualSearchAIAgentConfiguration?: array{
 *             answerGenerationAIPromptId?: string,
 *             answerGenerationAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             locale?: string,
 *             ...,
 *         },
 *         answerRecommendationAIAgentConfiguration?: array{
 *             intentLabelingGenerationAIPromptId?: string,
 *             queryReformulationAIPromptId?: string,
 *             answerGenerationAIPromptId?: string,
 *             answerGenerationAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             locale?: string,
 *             suggestedMessages?: list<string>,
 *             ...,
 *         },
 *         selfServiceAIAgentConfiguration?: array{
 *             selfServicePreProcessingAIPromptId?: string,
 *             selfServiceAnswerGenerationAIPromptId?: string,
 *             selfServiceAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         emailResponseAIAgentConfiguration?: array{
 *             emailResponseAIPromptId?: string,
 *             emailQueryReformulationAIPromptId?: string,
 *             locale?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         emailOverviewAIAgentConfiguration?: array{emailOverviewAIPromptId?: string, locale?: string, ...},
 *         emailGenerativeAnswerAIAgentConfiguration?: array{
 *             emailGenerativeAnswerAIPromptId?: string,
 *             emailQueryReformulationAIPromptId?: string,
 *             locale?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         orchestrationAIAgentConfiguration?: array{
 *             orchestrationAIPromptId?: string,
 *             orchestrationAIGuardrailId?: string,
 *             toolConfigurations?: list<array>,
 *             connectInstanceArn?: string,
 *             locale?: string,
 *             ...,
 *         },
 *         noteTakingAIAgentConfiguration?: array{noteTakingAIPromptId?: string, noteTakingAIGuardrailId?: string, locale?: string, ...},
 *         caseSummarizationAIAgentConfiguration?: array{caseSummarizationAIPromptId?: string, caseSummarizationAIGuardrailId?: string, locale?: string, ...},
 *         ...,
 *     },
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAIAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAIAgentAsync(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     aiAgentId?: string,
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     configuration?: array{
 *         manualSearchAIAgentConfiguration?: array{
 *             answerGenerationAIPromptId?: string,
 *             answerGenerationAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             locale?: string,
 *             ...,
 *         },
 *         answerRecommendationAIAgentConfiguration?: array{
 *             intentLabelingGenerationAIPromptId?: string,
 *             queryReformulationAIPromptId?: string,
 *             answerGenerationAIPromptId?: string,
 *             answerGenerationAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             locale?: string,
 *             suggestedMessages?: list<string>,
 *             ...,
 *         },
 *         selfServiceAIAgentConfiguration?: array{
 *             selfServicePreProcessingAIPromptId?: string,
 *             selfServiceAnswerGenerationAIPromptId?: string,
 *             selfServiceAIGuardrailId?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         emailResponseAIAgentConfiguration?: array{
 *             emailResponseAIPromptId?: string,
 *             emailQueryReformulationAIPromptId?: string,
 *             locale?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         emailOverviewAIAgentConfiguration?: array{emailOverviewAIPromptId?: string, locale?: string, ...},
 *         emailGenerativeAnswerAIAgentConfiguration?: array{
 *             emailGenerativeAnswerAIPromptId?: string,
 *             emailQueryReformulationAIPromptId?: string,
 *             locale?: string,
 *             associationConfigurations?: list<array>,
 *             ...,
 *         },
 *         orchestrationAIAgentConfiguration?: array{
 *             orchestrationAIPromptId?: string,
 *             orchestrationAIGuardrailId?: string,
 *             toolConfigurations?: list<array>,
 *             connectInstanceArn?: string,
 *             locale?: string,
 *             ...,
 *         },
 *         noteTakingAIAgentConfiguration?: array{noteTakingAIPromptId?: string, noteTakingAIGuardrailId?: string, locale?: string, ...},
 *         caseSummarizationAIAgentConfiguration?: array{caseSummarizationAIPromptId?: string, caseSummarizationAIGuardrailId?: string, locale?: string, ...},
 *         ...,
 *     },
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAIGuardrail(array $args = [])
 * @phpstan-method \Aws\Result updateAIGuardrail(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     aiGuardrailId?: string,
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     blockedInputMessaging?: string,
 *     blockedOutputsMessaging?: string,
 *     description?: string,
 *     topicPolicyConfig?: array{topicsConfig?: list<array>, ...},
 *     contentPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     wordPolicyConfig?: array{wordsConfig?: list<array>, managedWordListsConfig?: list<array>, ...},
 *     sensitiveInformationPolicyConfig?: array{piiEntitiesConfig?: list<array>, regexesConfig?: list<array>, ...},
 *     contextualGroundingPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAIGuardrailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAIGuardrailAsync(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     aiGuardrailId?: string,
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     blockedInputMessaging?: string,
 *     blockedOutputsMessaging?: string,
 *     description?: string,
 *     topicPolicyConfig?: array{topicsConfig?: list<array>, ...},
 *     contentPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     wordPolicyConfig?: array{wordsConfig?: list<array>, managedWordListsConfig?: list<array>, ...},
 *     sensitiveInformationPolicyConfig?: array{piiEntitiesConfig?: list<array>, regexesConfig?: list<array>, ...},
 *     contextualGroundingPolicyConfig?: array{filtersConfig?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAIPrompt(array $args = [])
 * @phpstan-method \Aws\Result updateAIPrompt(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     aiPromptId?: string,
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     templateConfiguration?: array{textFullAIPromptEditTemplateConfiguration?: array{text?: string, ...}, ...},
 *     description?: string,
 *     modelId?: string,
 *     inferenceConfiguration?: array{temperature?: float, topP?: float, topK?: int, maxTokensToSample?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAIPromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAIPromptAsync(array{
 *     clientToken?: string,
 *     assistantId?: string,
 *     aiPromptId?: string,
 *     visibilityStatus?: 'PUBLISHED'|'SAVED',
 *     templateConfiguration?: array{textFullAIPromptEditTemplateConfiguration?: array{text?: string, ...}, ...},
 *     description?: string,
 *     modelId?: string,
 *     inferenceConfiguration?: array{temperature?: float, topP?: float, topK?: int, maxTokensToSample?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssistantAIAgent(array $args = [])
 * @phpstan-method \Aws\Result updateAssistantAIAgent(array{
 *     assistantId?: string,
 *     aiAgentType?: 'ANSWER_RECOMMENDATION'|'CASE_SUMMARIZATION'|'EMAIL_GENERATIVE_ANSWER'|'EMAIL_OVERVIEW'|'EMAIL_RESPONSE'|'MANUAL_SEARCH'|'NOTE_TAKING'|'ORCHESTRATION'|'SELF_SERVICE',
 *     configuration?: array{aiAgentId?: string, ...},
 *     orchestratorUseCase?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssistantAIAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssistantAIAgentAsync(array{
 *     assistantId?: string,
 *     aiAgentType?: 'ANSWER_RECOMMENDATION'|'CASE_SUMMARIZATION'|'EMAIL_GENERATIVE_ANSWER'|'EMAIL_OVERVIEW'|'EMAIL_RESPONSE'|'MANUAL_SEARCH'|'NOTE_TAKING'|'ORCHESTRATION'|'SELF_SERVICE',
 *     configuration?: array{aiAgentId?: string, ...},
 *     orchestratorUseCase?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateContent(array $args = [])
 * @phpstan-method \Aws\Result updateContent(array{
 *     knowledgeBaseId?: string,
 *     contentId?: string,
 *     revisionId?: string,
 *     title?: string,
 *     overrideLinkOutUri?: string,
 *     removeOverrideLinkOutUri?: bool,
 *     metadata?: array<string, string>,
 *     uploadId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateContentAsync(array{
 *     knowledgeBaseId?: string,
 *     contentId?: string,
 *     revisionId?: string,
 *     title?: string,
 *     overrideLinkOutUri?: string,
 *     removeOverrideLinkOutUri?: bool,
 *     metadata?: array<string, string>,
 *     uploadId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateKnowledgeBaseTemplateUri(array $args = [])
 * @phpstan-method \Aws\Result updateKnowledgeBaseTemplateUri(array{knowledgeBaseId?: string, templateUri?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateKnowledgeBaseTemplateUriAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateKnowledgeBaseTemplateUriAsync(array{knowledgeBaseId?: string, templateUri?: string, ...} $args = [])
 * @method \Aws\Result updateMessageTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateMessageTemplate(array{
 *     knowledgeBaseId?: string,
 *     messageTemplateId?: string,
 *     content?: array{
 *         email?: array{subject?: string, body?: array, headers?: list<array>, ...},
 *         sms?: array{body?: array, ...},
 *         whatsApp?: array{data?: string, ...},
 *         push?: array{adm?: array, apns?: array, fcm?: array, baidu?: array, ...},
 *         ...,
 *     },
 *     language?: string,
 *     sourceConfiguration?: array{whatsApp?: array{businessAccountId?: string, templateId?: string, components?: list<string>, ...}, ...},
 *     defaultAttributes?: array{
 *         systemAttributes?: array{name?: string, customerEndpoint?: array, systemEndpoint?: array, ...},
 *         agentAttributes?: array{firstName?: string, lastName?: string, ...},
 *         customerProfileAttributes?: array{
 *             profileId?: string,
 *             profileARN?: string,
 *             firstName?: string,
 *             middleName?: string,
 *             lastName?: string,
 *             accountNumber?: string,
 *             emailAddress?: string,
 *             phoneNumber?: string,
 *             additionalInformation?: string,
 *             partyType?: string,
 *             businessName?: string,
 *             birthDate?: string,
 *             gender?: string,
 *             mobilePhoneNumber?: string,
 *             homePhoneNumber?: string,
 *             businessPhoneNumber?: string,
 *             businessEmailAddress?: string,
 *             address1?: string,
 *             address2?: string,
 *             address3?: string,
 *             address4?: string,
 *             city?: string,
 *             county?: string,
 *             country?: string,
 *             postalCode?: string,
 *             province?: string,
 *             state?: string,
 *             shippingAddress1?: string,
 *             shippingAddress2?: string,
 *             shippingAddress3?: string,
 *             shippingAddress4?: string,
 *             shippingCity?: string,
 *             shippingCounty?: string,
 *             shippingCountry?: string,
 *             shippingPostalCode?: string,
 *             shippingProvince?: string,
 *             shippingState?: string,
 *             mailingAddress1?: string,
 *             mailingAddress2?: string,
 *             mailingAddress3?: string,
 *             mailingAddress4?: string,
 *             mailingCity?: string,
 *             mailingCounty?: string,
 *             mailingCountry?: string,
 *             mailingPostalCode?: string,
 *             mailingProvince?: string,
 *             mailingState?: string,
 *             billingAddress1?: string,
 *             billingAddress2?: string,
 *             billingAddress3?: string,
 *             billingAddress4?: string,
 *             billingCity?: string,
 *             billingCounty?: string,
 *             billingCountry?: string,
 *             billingPostalCode?: string,
 *             billingProvince?: string,
 *             billingState?: string,
 *             custom?: array<string, string>,
 *             ...,
 *         },
 *         customAttributes?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMessageTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMessageTemplateAsync(array{
 *     knowledgeBaseId?: string,
 *     messageTemplateId?: string,
 *     content?: array{
 *         email?: array{subject?: string, body?: array, headers?: list<array>, ...},
 *         sms?: array{body?: array, ...},
 *         whatsApp?: array{data?: string, ...},
 *         push?: array{adm?: array, apns?: array, fcm?: array, baidu?: array, ...},
 *         ...,
 *     },
 *     language?: string,
 *     sourceConfiguration?: array{whatsApp?: array{businessAccountId?: string, templateId?: string, components?: list<string>, ...}, ...},
 *     defaultAttributes?: array{
 *         systemAttributes?: array{name?: string, customerEndpoint?: array, systemEndpoint?: array, ...},
 *         agentAttributes?: array{firstName?: string, lastName?: string, ...},
 *         customerProfileAttributes?: array{
 *             profileId?: string,
 *             profileARN?: string,
 *             firstName?: string,
 *             middleName?: string,
 *             lastName?: string,
 *             accountNumber?: string,
 *             emailAddress?: string,
 *             phoneNumber?: string,
 *             additionalInformation?: string,
 *             partyType?: string,
 *             businessName?: string,
 *             birthDate?: string,
 *             gender?: string,
 *             mobilePhoneNumber?: string,
 *             homePhoneNumber?: string,
 *             businessPhoneNumber?: string,
 *             businessEmailAddress?: string,
 *             address1?: string,
 *             address2?: string,
 *             address3?: string,
 *             address4?: string,
 *             city?: string,
 *             county?: string,
 *             country?: string,
 *             postalCode?: string,
 *             province?: string,
 *             state?: string,
 *             shippingAddress1?: string,
 *             shippingAddress2?: string,
 *             shippingAddress3?: string,
 *             shippingAddress4?: string,
 *             shippingCity?: string,
 *             shippingCounty?: string,
 *             shippingCountry?: string,
 *             shippingPostalCode?: string,
 *             shippingProvince?: string,
 *             shippingState?: string,
 *             mailingAddress1?: string,
 *             mailingAddress2?: string,
 *             mailingAddress3?: string,
 *             mailingAddress4?: string,
 *             mailingCity?: string,
 *             mailingCounty?: string,
 *             mailingCountry?: string,
 *             mailingPostalCode?: string,
 *             mailingProvince?: string,
 *             mailingState?: string,
 *             billingAddress1?: string,
 *             billingAddress2?: string,
 *             billingAddress3?: string,
 *             billingAddress4?: string,
 *             billingCity?: string,
 *             billingCounty?: string,
 *             billingCountry?: string,
 *             billingPostalCode?: string,
 *             billingProvince?: string,
 *             billingState?: string,
 *             custom?: array<string, string>,
 *             ...,
 *         },
 *         customAttributes?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMessageTemplateMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateMessageTemplateMetadata(array{
 *     knowledgeBaseId?: string,
 *     messageTemplateId?: string,
 *     name?: string,
 *     description?: string,
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMessageTemplateMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMessageTemplateMetadataAsync(array{
 *     knowledgeBaseId?: string,
 *     messageTemplateId?: string,
 *     name?: string,
 *     description?: string,
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQuickResponse(array $args = [])
 * @phpstan-method \Aws\Result updateQuickResponse(array{
 *     knowledgeBaseId?: string,
 *     quickResponseId?: string,
 *     name?: string,
 *     content?: array{content?: string, ...},
 *     contentType?: string,
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     removeGroupingConfiguration?: bool,
 *     description?: string,
 *     removeDescription?: bool,
 *     shortcutKey?: string,
 *     removeShortcutKey?: bool,
 *     isActive?: bool,
 *     channels?: list<string>,
 *     language?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQuickResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQuickResponseAsync(array{
 *     knowledgeBaseId?: string,
 *     quickResponseId?: string,
 *     name?: string,
 *     content?: array{content?: string, ...},
 *     contentType?: string,
 *     groupingConfiguration?: array{criteria?: string, values?: list<string>, ...},
 *     removeGroupingConfiguration?: bool,
 *     description?: string,
 *     removeDescription?: bool,
 *     shortcutKey?: string,
 *     removeShortcutKey?: bool,
 *     isActive?: bool,
 *     channels?: list<string>,
 *     language?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSession(array $args = [])
 * @phpstan-method \Aws\Result updateSession(array{
 *     assistantId?: string,
 *     sessionId?: string,
 *     description?: string,
 *     tagFilter?: array{
 *         tagCondition?: array{key?: string, value?: string, ...},
 *         andConditions?: list<array>,
 *         orConditions?: list<array>,
 *         ...,
 *     },
 *     aiAgentConfiguration?: array<string, array{aiAgentId?: string, ...}>,
 *     orchestratorConfigurationList?: list<array{aiAgentId?: string, orchestratorUseCase?: string, ...}>,
 *     removeOrchestratorConfigurationList?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSessionAsync(array{
 *     assistantId?: string,
 *     sessionId?: string,
 *     description?: string,
 *     tagFilter?: array{
 *         tagCondition?: array{key?: string, value?: string, ...},
 *         andConditions?: list<array>,
 *         orConditions?: list<array>,
 *         ...,
 *     },
 *     aiAgentConfiguration?: array<string, array{aiAgentId?: string, ...}>,
 *     orchestratorConfigurationList?: list<array{aiAgentId?: string, orchestratorUseCase?: string, ...}>,
 *     removeOrchestratorConfigurationList?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSessionData(array $args = [])
 * @phpstan-method \Aws\Result updateSessionData(array{
 *     assistantId?: string,
 *     sessionId?: string,
 *     namespace?: 'Custom',
 *     data?: list<array{key?: string, value?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSessionDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSessionDataAsync(array{
 *     assistantId?: string,
 *     sessionId?: string,
 *     namespace?: 'Custom',
 *     data?: list<array{key?: string, value?: array, ...}>,
 *     ...,
 * } $args = [])
 */
class QConnectClient extends AwsClient {}
