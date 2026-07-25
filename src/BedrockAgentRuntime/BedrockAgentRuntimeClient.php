<?php
namespace Aws\BedrockAgentRuntime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Agents for Amazon Bedrock Runtime** service.
 * @method \Aws\Result agenticRetrieveStream(array $args = [])
 * @phpstan-method \Aws\Result agenticRetrieveStream(array{
 *     agenticRetrieveConfiguration?: array{
 *         foundationModelConfiguration?: array{bedrockFoundationModelConfiguration?: array, type?: 'BEDROCK_FOUNDATION_MODEL', ...},
 *         foundationModelType?: 'CUSTOM'|'MANAGED',
 *         maxAgentIteration?: int,
 *         rerankingConfiguration?: array{bedrockRerankingConfiguration?: array, type?: 'BEDROCK_RERANKING_MODEL', ...},
 *         rerankingModelType?: 'CUSTOM'|'MANAGED'|'NONE',
 *         ...,
 *     },
 *     generateResponse?: bool,
 *     messages?: list<array{content?: array, role?: 'assistant'|'user', ...}>,
 *     nextToken?: string,
 *     policyConfiguration?: array{bedrockGuardrailConfiguration?: array{guardrailId?: string, guardrailVersion?: string, ...}, ...},
 *     retrievers?: list<array{configuration?: array, description?: string, ...}>,
 *     userContext?: array{userId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise agenticRetrieveStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise agenticRetrieveStreamAsync(array{
 *     agenticRetrieveConfiguration?: array{
 *         foundationModelConfiguration?: array{bedrockFoundationModelConfiguration?: array, type?: 'BEDROCK_FOUNDATION_MODEL', ...},
 *         foundationModelType?: 'CUSTOM'|'MANAGED',
 *         maxAgentIteration?: int,
 *         rerankingConfiguration?: array{bedrockRerankingConfiguration?: array, type?: 'BEDROCK_RERANKING_MODEL', ...},
 *         rerankingModelType?: 'CUSTOM'|'MANAGED'|'NONE',
 *         ...,
 *     },
 *     generateResponse?: bool,
 *     messages?: list<array{content?: array, role?: 'assistant'|'user', ...}>,
 *     nextToken?: string,
 *     policyConfiguration?: array{bedrockGuardrailConfiguration?: array{guardrailId?: string, guardrailVersion?: string, ...}, ...},
 *     retrievers?: list<array{configuration?: array, description?: string, ...}>,
 *     userContext?: array{userId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInvocation(array $args = [])
 * @phpstan-method \Aws\Result createInvocation(array{description?: string, invocationId?: string, sessionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createInvocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInvocationAsync(array{description?: string, invocationId?: string, sessionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result createSession(array $args = [])
 * @phpstan-method \Aws\Result createSession(array{encryptionKeyArn?: string, sessionMetadata?: array<string, string>, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSessionAsync(array{encryptionKeyArn?: string, sessionMetadata?: array<string, string>, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result deleteAgentMemory(array $args = [])
 * @phpstan-method \Aws\Result deleteAgentMemory(array{agentAliasId?: string, agentId?: string, memoryId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAgentMemoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAgentMemoryAsync(array{agentAliasId?: string, agentId?: string, memoryId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result deleteSession(array $args = [])
 * @phpstan-method \Aws\Result deleteSession(array{sessionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSessionAsync(array{sessionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result endSession(array $args = [])
 * @phpstan-method \Aws\Result endSession(array{sessionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise endSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise endSessionAsync(array{sessionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result generateQuery(array $args = [])
 * @phpstan-method \Aws\Result generateQuery(array{
 *     queryGenerationInput?: array{text?: string, type?: 'TEXT', ...},
 *     transformationConfiguration?: array{
 *         mode?: 'TEXT_TO_SQL',
 *         textToSqlConfiguration?: array{knowledgeBaseConfiguration?: array, type?: 'KNOWLEDGE_BASE', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise generateQueryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateQueryAsync(array{
 *     queryGenerationInput?: array{text?: string, type?: 'TEXT', ...},
 *     transformationConfiguration?: array{
 *         mode?: 'TEXT_TO_SQL',
 *         textToSqlConfiguration?: array{knowledgeBaseConfiguration?: array, type?: 'KNOWLEDGE_BASE', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAgentMemory(array $args = [])
 * @phpstan-method \Aws\Result getAgentMemory(array{
 *     agentAliasId?: string,
 *     agentId?: string,
 *     maxItems?: int,
 *     memoryId?: string,
 *     memoryType?: 'SESSION_SUMMARY',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentMemoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentMemoryAsync(array{
 *     agentAliasId?: string,
 *     agentId?: string,
 *     maxItems?: int,
 *     memoryId?: string,
 *     memoryType?: 'SESSION_SUMMARY',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDocumentContent(array $args = [])
 * @phpstan-method \Aws\Result getDocumentContent(array{
 *     dataSourceId?: string,
 *     documentId?: string,
 *     knowledgeBaseId?: string,
 *     outputFormat?: 'EXTRACTED'|'RAW',
 *     userContext?: array{userId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentContentAsync(array{
 *     dataSourceId?: string,
 *     documentId?: string,
 *     knowledgeBaseId?: string,
 *     outputFormat?: 'EXTRACTED'|'RAW',
 *     userContext?: array{userId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getExecutionFlowSnapshot(array $args = [])
 * @phpstan-method \Aws\Result getExecutionFlowSnapshot(array{executionIdentifier?: string, flowAliasIdentifier?: string, flowIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExecutionFlowSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExecutionFlowSnapshotAsync(array{executionIdentifier?: string, flowAliasIdentifier?: string, flowIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getFlowExecution(array $args = [])
 * @phpstan-method \Aws\Result getFlowExecution(array{executionIdentifier?: string, flowAliasIdentifier?: string, flowIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFlowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFlowExecutionAsync(array{executionIdentifier?: string, flowAliasIdentifier?: string, flowIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getInvocationStep(array $args = [])
 * @phpstan-method \Aws\Result getInvocationStep(array{invocationIdentifier?: string, invocationStepId?: string, sessionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvocationStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvocationStepAsync(array{invocationIdentifier?: string, invocationStepId?: string, sessionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{sessionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{sessionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result invokeAgent(array $args = [])
 * @phpstan-method \Aws\Result invokeAgent(array{
 *     agentAliasId?: string,
 *     agentId?: string,
 *     bedrockModelConfigurations?: array{performanceConfig?: array{latency?: 'optimized'|'standard', ...}, ...},
 *     enableTrace?: bool,
 *     endSession?: bool,
 *     inputText?: string,
 *     memoryId?: string,
 *     promptCreationConfigurations?: array{excludePreviousThinkingSteps?: bool, previousConversationTurnsToInclude?: int, ...},
 *     sessionId?: string,
 *     sessionState?: array{
 *         conversationHistory?: array{messages?: list<array>, ...},
 *         files?: list<array>,
 *         invocationId?: string,
 *         knowledgeBaseConfigurations?: list<array>,
 *         promptSessionAttributes?: array<string, string>,
 *         returnControlInvocationResults?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         ...,
 *     },
 *     sourceArn?: string,
 *     streamingConfigurations?: array{applyGuardrailInterval?: int, streamFinalResponse?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeAgentAsync(array{
 *     agentAliasId?: string,
 *     agentId?: string,
 *     bedrockModelConfigurations?: array{performanceConfig?: array{latency?: 'optimized'|'standard', ...}, ...},
 *     enableTrace?: bool,
 *     endSession?: bool,
 *     inputText?: string,
 *     memoryId?: string,
 *     promptCreationConfigurations?: array{excludePreviousThinkingSteps?: bool, previousConversationTurnsToInclude?: int, ...},
 *     sessionId?: string,
 *     sessionState?: array{
 *         conversationHistory?: array{messages?: list<array>, ...},
 *         files?: list<array>,
 *         invocationId?: string,
 *         knowledgeBaseConfigurations?: list<array>,
 *         promptSessionAttributes?: array<string, string>,
 *         returnControlInvocationResults?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         ...,
 *     },
 *     sourceArn?: string,
 *     streamingConfigurations?: array{applyGuardrailInterval?: int, streamFinalResponse?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeFlow(array $args = [])
 * @phpstan-method \Aws\Result invokeFlow(array{
 *     enableTrace?: bool,
 *     executionId?: string,
 *     flowAliasIdentifier?: string,
 *     flowIdentifier?: string,
 *     inputs?: list<array{content?: array, nodeInputName?: string, nodeName?: string, nodeOutputName?: string, ...}>,
 *     modelPerformanceConfiguration?: array{performanceConfig?: array{latency?: 'optimized'|'standard', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeFlowAsync(array{
 *     enableTrace?: bool,
 *     executionId?: string,
 *     flowAliasIdentifier?: string,
 *     flowIdentifier?: string,
 *     inputs?: list<array{content?: array, nodeInputName?: string, nodeName?: string, nodeOutputName?: string, ...}>,
 *     modelPerformanceConfiguration?: array{performanceConfig?: array{latency?: 'optimized'|'standard', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeInlineAgent(array $args = [])
 * @phpstan-method \Aws\Result invokeInlineAgent(array{
 *     actionGroups?: list<array{
 *         actionGroupExecutor?: array,
 *         actionGroupName?: string,
 *         apiSchema?: array,
 *         description?: string,
 *         functionSchema?: array,
 *         parentActionGroupSignature?: 'AMAZON.CodeInterpreter'|'AMAZON.UserInput'|'ANTHROPIC.Bash'|'ANTHROPIC.Computer'|'ANTHROPIC.TextEditor',
 *         parentActionGroupSignatureParams?: array<string, string>,
 *         ...,
 *     }>,
 *     agentCollaboration?: 'DISABLED'|'SUPERVISOR'|'SUPERVISOR_ROUTER',
 *     agentName?: string,
 *     bedrockModelConfigurations?: array{performanceConfig?: array{latency?: 'optimized'|'standard', ...}, ...},
 *     collaboratorConfigurations?: list<array{
 *         agentAliasArn?: string,
 *         collaboratorInstruction?: string,
 *         collaboratorName?: string,
 *         relayConversationHistory?: 'DISABLED'|'TO_COLLABORATOR',
 *         ...,
 *     }>,
 *     collaborators?: list<array{
 *         actionGroups?: list<array>,
 *         agentCollaboration?: 'DISABLED'|'SUPERVISOR'|'SUPERVISOR_ROUTER',
 *         agentName?: string,
 *         collaboratorConfigurations?: list<array>,
 *         customerEncryptionKeyArn?: string,
 *         foundationModel?: string,
 *         guardrailConfiguration?: array,
 *         idleSessionTTLInSeconds?: int,
 *         instruction?: string,
 *         knowledgeBases?: list<array>,
 *         promptOverrideConfiguration?: array,
 *         ...,
 *     }>,
 *     customOrchestration?: array{executor?: array{lambda?: string, ...}, ...},
 *     customerEncryptionKeyArn?: string,
 *     enableTrace?: bool,
 *     endSession?: bool,
 *     foundationModel?: string,
 *     guardrailConfiguration?: array{guardrailIdentifier?: string, guardrailVersion?: string, ...},
 *     idleSessionTTLInSeconds?: int,
 *     inlineSessionState?: array{
 *         conversationHistory?: array{messages?: list<array>, ...},
 *         files?: list<array>,
 *         invocationId?: string,
 *         promptSessionAttributes?: array<string, string>,
 *         returnControlInvocationResults?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         ...,
 *     },
 *     inputText?: string,
 *     instruction?: string,
 *     knowledgeBases?: list<array{description?: string, knowledgeBaseId?: string, retrievalConfiguration?: array, ...}>,
 *     orchestrationType?: 'CUSTOM_ORCHESTRATION'|'DEFAULT',
 *     promptCreationConfigurations?: array{excludePreviousThinkingSteps?: bool, previousConversationTurnsToInclude?: int, ...},
 *     promptOverrideConfiguration?: array{overrideLambda?: string, promptConfigurations?: list<array>, ...},
 *     sessionId?: string,
 *     streamingConfigurations?: array{applyGuardrailInterval?: int, streamFinalResponse?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeInlineAgentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeInlineAgentAsync(array{
 *     actionGroups?: list<array{
 *         actionGroupExecutor?: array,
 *         actionGroupName?: string,
 *         apiSchema?: array,
 *         description?: string,
 *         functionSchema?: array,
 *         parentActionGroupSignature?: 'AMAZON.CodeInterpreter'|'AMAZON.UserInput'|'ANTHROPIC.Bash'|'ANTHROPIC.Computer'|'ANTHROPIC.TextEditor',
 *         parentActionGroupSignatureParams?: array<string, string>,
 *         ...,
 *     }>,
 *     agentCollaboration?: 'DISABLED'|'SUPERVISOR'|'SUPERVISOR_ROUTER',
 *     agentName?: string,
 *     bedrockModelConfigurations?: array{performanceConfig?: array{latency?: 'optimized'|'standard', ...}, ...},
 *     collaboratorConfigurations?: list<array{
 *         agentAliasArn?: string,
 *         collaboratorInstruction?: string,
 *         collaboratorName?: string,
 *         relayConversationHistory?: 'DISABLED'|'TO_COLLABORATOR',
 *         ...,
 *     }>,
 *     collaborators?: list<array{
 *         actionGroups?: list<array>,
 *         agentCollaboration?: 'DISABLED'|'SUPERVISOR'|'SUPERVISOR_ROUTER',
 *         agentName?: string,
 *         collaboratorConfigurations?: list<array>,
 *         customerEncryptionKeyArn?: string,
 *         foundationModel?: string,
 *         guardrailConfiguration?: array,
 *         idleSessionTTLInSeconds?: int,
 *         instruction?: string,
 *         knowledgeBases?: list<array>,
 *         promptOverrideConfiguration?: array,
 *         ...,
 *     }>,
 *     customOrchestration?: array{executor?: array{lambda?: string, ...}, ...},
 *     customerEncryptionKeyArn?: string,
 *     enableTrace?: bool,
 *     endSession?: bool,
 *     foundationModel?: string,
 *     guardrailConfiguration?: array{guardrailIdentifier?: string, guardrailVersion?: string, ...},
 *     idleSessionTTLInSeconds?: int,
 *     inlineSessionState?: array{
 *         conversationHistory?: array{messages?: list<array>, ...},
 *         files?: list<array>,
 *         invocationId?: string,
 *         promptSessionAttributes?: array<string, string>,
 *         returnControlInvocationResults?: list<array>,
 *         sessionAttributes?: array<string, string>,
 *         ...,
 *     },
 *     inputText?: string,
 *     instruction?: string,
 *     knowledgeBases?: list<array{description?: string, knowledgeBaseId?: string, retrievalConfiguration?: array, ...}>,
 *     orchestrationType?: 'CUSTOM_ORCHESTRATION'|'DEFAULT',
 *     promptCreationConfigurations?: array{excludePreviousThinkingSteps?: bool, previousConversationTurnsToInclude?: int, ...},
 *     promptOverrideConfiguration?: array{overrideLambda?: string, promptConfigurations?: list<array>, ...},
 *     sessionId?: string,
 *     streamingConfigurations?: array{applyGuardrailInterval?: int, streamFinalResponse?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFlowExecutionEvents(array $args = [])
 * @phpstan-method \Aws\Result listFlowExecutionEvents(array{
 *     eventType?: 'Flow'|'Node',
 *     executionIdentifier?: string,
 *     flowAliasIdentifier?: string,
 *     flowIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowExecutionEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowExecutionEventsAsync(array{
 *     eventType?: 'Flow'|'Node',
 *     executionIdentifier?: string,
 *     flowAliasIdentifier?: string,
 *     flowIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFlowExecutions(array $args = [])
 * @phpstan-method \Aws\Result listFlowExecutions(array{flowAliasIdentifier?: string, flowIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFlowExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFlowExecutionsAsync(array{flowAliasIdentifier?: string, flowIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listInvocationSteps(array $args = [])
 * @phpstan-method \Aws\Result listInvocationSteps(array{invocationIdentifier?: string, maxResults?: int, nextToken?: string, sessionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvocationStepsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvocationStepsAsync(array{invocationIdentifier?: string, maxResults?: int, nextToken?: string, sessionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listInvocations(array $args = [])
 * @phpstan-method \Aws\Result listInvocations(array{maxResults?: int, nextToken?: string, sessionIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvocationsAsync(array{maxResults?: int, nextToken?: string, sessionIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listSessions(array $args = [])
 * @phpstan-method \Aws\Result listSessions(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result optimizePrompt(array $args = [])
 * @phpstan-method \Aws\Result optimizePrompt(array{input?: array{textPrompt?: array{text?: string, ...}, ...}, targetModelId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise optimizePromptAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise optimizePromptAsync(array{input?: array{textPrompt?: array{text?: string, ...}, ...}, targetModelId?: string, ...} $args = [])
 * @method \Aws\Result putInvocationStep(array $args = [])
 * @phpstan-method \Aws\Result putInvocationStep(array{
 *     invocationIdentifier?: string,
 *     invocationStepId?: string,
 *     invocationStepTime?: int|string|\DateTimeInterface,
 *     payload?: array{contentBlocks?: list<array>, ...},
 *     sessionIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putInvocationStepAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putInvocationStepAsync(array{
 *     invocationIdentifier?: string,
 *     invocationStepId?: string,
 *     invocationStepTime?: int|string|\DateTimeInterface,
 *     payload?: array{contentBlocks?: list<array>, ...},
 *     sessionIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rerank(array $args = [])
 * @phpstan-method \Aws\Result rerank(array{
 *     nextToken?: string,
 *     queries?: list<array{textQuery?: array, type?: 'TEXT', ...}>,
 *     rerankingConfiguration?: array{
 *         bedrockRerankingConfiguration?: array{modelConfiguration?: array, numberOfResults?: int, ...},
 *         type?: 'BEDROCK_RERANKING_MODEL',
 *         ...,
 *     },
 *     sources?: list<array{inlineDocumentSource?: array, type?: 'INLINE', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise rerankAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rerankAsync(array{
 *     nextToken?: string,
 *     queries?: list<array{textQuery?: array, type?: 'TEXT', ...}>,
 *     rerankingConfiguration?: array{
 *         bedrockRerankingConfiguration?: array{modelConfiguration?: array, numberOfResults?: int, ...},
 *         type?: 'BEDROCK_RERANKING_MODEL',
 *         ...,
 *     },
 *     sources?: list<array{inlineDocumentSource?: array, type?: 'INLINE', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result retrieve(array $args = [])
 * @phpstan-method \Aws\Result retrieve(array{
 *     guardrailConfiguration?: array{guardrailId?: string, guardrailVersion?: string, ...},
 *     knowledgeBaseId?: string,
 *     nextToken?: string,
 *     retrievalConfiguration?: array{
 *         managedSearchConfiguration?: array{
 *             filter?: array,
 *             numberOfResults?: int,
 *             rerankingConfiguration?: array,
 *             rerankingModelType?: 'CUSTOM'|'MANAGED'|'NONE',
 *             ...,
 *         },
 *         vectorSearchConfiguration?: array{
 *             filter?: array,
 *             implicitFilterConfiguration?: array,
 *             numberOfResults?: int,
 *             overrideSearchType?: 'HYBRID'|'SEMANTIC',
 *             rerankingConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     retrievalQuery?: array{
 *         image?: array{
 *             format?: 'gif'|'jpeg'|'png'|'webp',
 *             inlineContent?: string|resource|\Psr\Http\Message\StreamInterface,
 *             ...,
 *         },
 *         text?: string,
 *         type?: 'IMAGE'|'TEXT',
 *         ...,
 *     },
 *     userContext?: array{userId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise retrieveAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retrieveAsync(array{
 *     guardrailConfiguration?: array{guardrailId?: string, guardrailVersion?: string, ...},
 *     knowledgeBaseId?: string,
 *     nextToken?: string,
 *     retrievalConfiguration?: array{
 *         managedSearchConfiguration?: array{
 *             filter?: array,
 *             numberOfResults?: int,
 *             rerankingConfiguration?: array,
 *             rerankingModelType?: 'CUSTOM'|'MANAGED'|'NONE',
 *             ...,
 *         },
 *         vectorSearchConfiguration?: array{
 *             filter?: array,
 *             implicitFilterConfiguration?: array,
 *             numberOfResults?: int,
 *             overrideSearchType?: 'HYBRID'|'SEMANTIC',
 *             rerankingConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     retrievalQuery?: array{
 *         image?: array{
 *             format?: 'gif'|'jpeg'|'png'|'webp',
 *             inlineContent?: string|resource|\Psr\Http\Message\StreamInterface,
 *             ...,
 *         },
 *         text?: string,
 *         type?: 'IMAGE'|'TEXT',
 *         ...,
 *     },
 *     userContext?: array{userId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result retrieveAndGenerate(array $args = [])
 * @phpstan-method \Aws\Result retrieveAndGenerate(array{
 *     input?: array{text?: string, ...},
 *     retrieveAndGenerateConfiguration?: array{
 *         externalSourcesConfiguration?: array{generationConfiguration?: array, modelArn?: string, sources?: list<array>, ...},
 *         knowledgeBaseConfiguration?: array{
 *             generationConfiguration?: array,
 *             knowledgeBaseId?: string,
 *             modelArn?: string,
 *             orchestrationConfiguration?: array,
 *             retrievalConfiguration?: array,
 *             ...,
 *         },
 *         type?: 'EXTERNAL_SOURCES'|'KNOWLEDGE_BASE',
 *         ...,
 *     },
 *     sessionConfiguration?: array{kmsKeyArn?: string, ...},
 *     sessionId?: string,
 *     userContext?: array{userId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise retrieveAndGenerateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retrieveAndGenerateAsync(array{
 *     input?: array{text?: string, ...},
 *     retrieveAndGenerateConfiguration?: array{
 *         externalSourcesConfiguration?: array{generationConfiguration?: array, modelArn?: string, sources?: list<array>, ...},
 *         knowledgeBaseConfiguration?: array{
 *             generationConfiguration?: array,
 *             knowledgeBaseId?: string,
 *             modelArn?: string,
 *             orchestrationConfiguration?: array,
 *             retrievalConfiguration?: array,
 *             ...,
 *         },
 *         type?: 'EXTERNAL_SOURCES'|'KNOWLEDGE_BASE',
 *         ...,
 *     },
 *     sessionConfiguration?: array{kmsKeyArn?: string, ...},
 *     sessionId?: string,
 *     userContext?: array{userId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result retrieveAndGenerateStream(array $args = [])
 * @phpstan-method \Aws\Result retrieveAndGenerateStream(array{
 *     input?: array{text?: string, ...},
 *     retrieveAndGenerateConfiguration?: array{
 *         externalSourcesConfiguration?: array{generationConfiguration?: array, modelArn?: string, sources?: list<array>, ...},
 *         knowledgeBaseConfiguration?: array{
 *             generationConfiguration?: array,
 *             knowledgeBaseId?: string,
 *             modelArn?: string,
 *             orchestrationConfiguration?: array,
 *             retrievalConfiguration?: array,
 *             ...,
 *         },
 *         type?: 'EXTERNAL_SOURCES'|'KNOWLEDGE_BASE',
 *         ...,
 *     },
 *     sessionConfiguration?: array{kmsKeyArn?: string, ...},
 *     sessionId?: string,
 *     userContext?: array{userId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise retrieveAndGenerateStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retrieveAndGenerateStreamAsync(array{
 *     input?: array{text?: string, ...},
 *     retrieveAndGenerateConfiguration?: array{
 *         externalSourcesConfiguration?: array{generationConfiguration?: array, modelArn?: string, sources?: list<array>, ...},
 *         knowledgeBaseConfiguration?: array{
 *             generationConfiguration?: array,
 *             knowledgeBaseId?: string,
 *             modelArn?: string,
 *             orchestrationConfiguration?: array,
 *             retrievalConfiguration?: array,
 *             ...,
 *         },
 *         type?: 'EXTERNAL_SOURCES'|'KNOWLEDGE_BASE',
 *         ...,
 *     },
 *     sessionConfiguration?: array{kmsKeyArn?: string, ...},
 *     sessionId?: string,
 *     userContext?: array{userId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startFlowExecution(array $args = [])
 * @phpstan-method \Aws\Result startFlowExecution(array{
 *     flowAliasIdentifier?: string,
 *     flowExecutionName?: string,
 *     flowIdentifier?: string,
 *     inputs?: list<array{content?: array, nodeInputName?: string, nodeName?: string, nodeOutputName?: string, ...}>,
 *     modelPerformanceConfiguration?: array{performanceConfig?: array{latency?: 'optimized'|'standard', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startFlowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFlowExecutionAsync(array{
 *     flowAliasIdentifier?: string,
 *     flowExecutionName?: string,
 *     flowIdentifier?: string,
 *     inputs?: list<array{content?: array, nodeInputName?: string, nodeName?: string, nodeOutputName?: string, ...}>,
 *     modelPerformanceConfiguration?: array{performanceConfig?: array{latency?: 'optimized'|'standard', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopFlowExecution(array $args = [])
 * @phpstan-method \Aws\Result stopFlowExecution(array{executionIdentifier?: string, flowAliasIdentifier?: string, flowIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopFlowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopFlowExecutionAsync(array{executionIdentifier?: string, flowAliasIdentifier?: string, flowIdentifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateSession(array $args = [])
 * @phpstan-method \Aws\Result updateSession(array{sessionIdentifier?: string, sessionMetadata?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSessionAsync(array{sessionIdentifier?: string, sessionMetadata?: array<string, string>, ...} $args = [])
 */
class BedrockAgentRuntimeClient extends AwsClient {}
