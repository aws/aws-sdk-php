<?php
namespace Aws\BedrockAgentCore;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Bedrock AgentCore Data Plane Fronting Layer** service.
 * @method \Aws\Result batchCreateMemoryRecords(array $args = [])
 * @phpstan-method \Aws\Result batchCreateMemoryRecords(array{
 *     memoryId?: string,
 *     records?: list<array{
 *         requestIdentifier?: string,
 *         namespaces?: list<string>,
 *         content?: array,
 *         timestamp?: int|string|\DateTimeInterface,
 *         memoryStrategyId?: string,
 *         metadata?: array<string, array>,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateMemoryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateMemoryRecordsAsync(array{
 *     memoryId?: string,
 *     records?: list<array{
 *         requestIdentifier?: string,
 *         namespaces?: list<string>,
 *         content?: array,
 *         timestamp?: int|string|\DateTimeInterface,
 *         memoryStrategyId?: string,
 *         metadata?: array<string, array>,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteMemoryRecords(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteMemoryRecords(array{memoryId?: string, records?: list<array{memoryRecordId?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteMemoryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteMemoryRecordsAsync(array{memoryId?: string, records?: list<array{memoryRecordId?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchUpdateMemoryRecords(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateMemoryRecords(array{
 *     memoryId?: string,
 *     records?: list<array{
 *         memoryRecordId?: string,
 *         timestamp?: int|string|\DateTimeInterface,
 *         content?: array,
 *         namespaces?: list<string>,
 *         memoryStrategyId?: string,
 *         metadata?: array<string, array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateMemoryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateMemoryRecordsAsync(array{
 *     memoryId?: string,
 *     records?: list<array{
 *         memoryRecordId?: string,
 *         timestamp?: int|string|\DateTimeInterface,
 *         content?: array,
 *         namespaces?: list<string>,
 *         memoryStrategyId?: string,
 *         metadata?: array<string, array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result completeResourceTokenAuth(array $args = [])
 * @phpstan-method \Aws\Result completeResourceTokenAuth(array{userIdentifier?: array{userToken?: string, userId?: string, ...}, sessionUri?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise completeResourceTokenAuthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeResourceTokenAuthAsync(array{userIdentifier?: array{userToken?: string, userId?: string, ...}, sessionUri?: string, ...} $args = [])
 * @method \Aws\Result createABTest(array $args = [])
 * @phpstan-method \Aws\Result createABTest(array{
 *     name?: string,
 *     description?: string,
 *     gatewayArn?: string,
 *     variants?: list<array{name?: string, weight?: int, variantConfiguration?: array, ...}>,
 *     gatewayFilter?: array{targetPaths?: list<string>, ...},
 *     evaluationConfig?: array{onlineEvaluationConfigArn?: string, perVariantOnlineEvaluationConfig?: list<array>, ...},
 *     roleArn?: string,
 *     enableOnCreate?: bool,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createABTestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createABTestAsync(array{
 *     name?: string,
 *     description?: string,
 *     gatewayArn?: string,
 *     variants?: list<array{name?: string, weight?: int, variantConfiguration?: array, ...}>,
 *     gatewayFilter?: array{targetPaths?: list<string>, ...},
 *     evaluationConfig?: array{onlineEvaluationConfigArn?: string, perVariantOnlineEvaluationConfig?: list<array>, ...},
 *     roleArn?: string,
 *     enableOnCreate?: bool,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEvent(array $args = [])
 * @phpstan-method \Aws\Result createEvent(array{
 *     memoryId?: string,
 *     actorId?: string,
 *     sessionId?: string,
 *     eventTimestamp?: int|string|\DateTimeInterface,
 *     payload?: list<array{conversational?: array, blob?: array, ...}>,
 *     branch?: array{rootEventId?: string, name?: string, ...},
 *     clientToken?: string,
 *     metadata?: array<string, array{stringValue?: string, ...}>,
 *     extractionMode?: 'SKIP',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEventAsync(array{
 *     memoryId?: string,
 *     actorId?: string,
 *     sessionId?: string,
 *     eventTimestamp?: int|string|\DateTimeInterface,
 *     payload?: list<array{conversational?: array, blob?: array, ...}>,
 *     branch?: array{rootEventId?: string, name?: string, ...},
 *     clientToken?: string,
 *     metadata?: array<string, array{stringValue?: string, ...}>,
 *     extractionMode?: 'SKIP',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPaymentInstrument(array $args = [])
 * @phpstan-method \Aws\Result createPaymentInstrument(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     paymentConnectorId?: string,
 *     paymentInstrumentType?: 'EMBEDDED_CRYPTO_WALLET',
 *     paymentInstrumentDetails?: array{
 *         embeddedCryptoWallet?: array{
 *             network?: 'ETHEREUM'|'SOLANA',
 *             linkedAccounts?: list<array>,
 *             walletAddress?: string,
 *             redirectUrl?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPaymentInstrumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPaymentInstrumentAsync(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     paymentConnectorId?: string,
 *     paymentInstrumentType?: 'EMBEDDED_CRYPTO_WALLET',
 *     paymentInstrumentDetails?: array{
 *         embeddedCryptoWallet?: array{
 *             network?: 'ETHEREUM'|'SOLANA',
 *             linkedAccounts?: list<array>,
 *             walletAddress?: string,
 *             redirectUrl?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPaymentSession(array $args = [])
 * @phpstan-method \Aws\Result createPaymentSession(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     limits?: array{maxSpendAmount?: array{value?: string, currency?: 'USD', ...}, ...},
 *     expiryTimeInMinutes?: int,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPaymentSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPaymentSessionAsync(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     limits?: array{maxSpendAmount?: array{value?: string, currency?: 'USD', ...}, ...},
 *     expiryTimeInMinutes?: int,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteABTest(array $args = [])
 * @phpstan-method \Aws\Result deleteABTest(array{abTestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteABTestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteABTestAsync(array{abTestId?: string, ...} $args = [])
 * @method \Aws\Result deleteBatchEvaluation(array $args = [])
 * @phpstan-method \Aws\Result deleteBatchEvaluation(array{batchEvaluationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBatchEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBatchEvaluationAsync(array{batchEvaluationId?: string, ...} $args = [])
 * @method \Aws\Result deleteEvent(array $args = [])
 * @phpstan-method \Aws\Result deleteEvent(array{memoryId?: string, sessionId?: string, eventId?: string, actorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEventAsync(array{memoryId?: string, sessionId?: string, eventId?: string, actorId?: string, ...} $args = [])
 * @method \Aws\Result deleteMemoryRecord(array $args = [])
 * @phpstan-method \Aws\Result deleteMemoryRecord(array{memoryId?: string, memoryRecordId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMemoryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMemoryRecordAsync(array{memoryId?: string, memoryRecordId?: string, ...} $args = [])
 * @method \Aws\Result deletePaymentInstrument(array $args = [])
 * @phpstan-method \Aws\Result deletePaymentInstrument(array{
 *     userId?: string,
 *     paymentManagerArn?: string,
 *     paymentConnectorId?: string,
 *     paymentInstrumentId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePaymentInstrumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePaymentInstrumentAsync(array{
 *     userId?: string,
 *     paymentManagerArn?: string,
 *     paymentConnectorId?: string,
 *     paymentInstrumentId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePaymentSession(array $args = [])
 * @phpstan-method \Aws\Result deletePaymentSession(array{userId?: string, paymentManagerArn?: string, paymentSessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePaymentSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePaymentSessionAsync(array{userId?: string, paymentManagerArn?: string, paymentSessionId?: string, ...} $args = [])
 * @method \Aws\Result deleteRecommendation(array $args = [])
 * @phpstan-method \Aws\Result deleteRecommendation(array{recommendationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecommendationAsync(array{recommendationId?: string, ...} $args = [])
 * @method \Aws\Result evaluate(array $args = [])
 * @phpstan-method \Aws\Result evaluate(array{
 *     evaluatorId?: string,
 *     evaluationInput?: array{sessionSpans?: list<array>, ...},
 *     evaluationTarget?: array{spanIds?: list<string>, traceIds?: list<string>, ...},
 *     evaluationReferenceInputs?: list<array{context?: array, expectedResponse?: array, assertions?: list<array>, expectedTrajectory?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise evaluateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise evaluateAsync(array{
 *     evaluatorId?: string,
 *     evaluationInput?: array{sessionSpans?: list<array>, ...},
 *     evaluationTarget?: array{spanIds?: list<string>, traceIds?: list<string>, ...},
 *     evaluationReferenceInputs?: list<array{context?: array, expectedResponse?: array, assertions?: list<array>, expectedTrajectory?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getABTest(array $args = [])
 * @phpstan-method \Aws\Result getABTest(array{abTestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getABTestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getABTestAsync(array{abTestId?: string, ...} $args = [])
 * @method \Aws\Result getAgentCard(array $args = [])
 * @phpstan-method \Aws\Result getAgentCard(array{runtimeSessionId?: string, agentRuntimeArn?: string, qualifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAgentCardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAgentCardAsync(array{runtimeSessionId?: string, agentRuntimeArn?: string, qualifier?: string, ...} $args = [])
 * @method \Aws\Result getBatchEvaluation(array $args = [])
 * @phpstan-method \Aws\Result getBatchEvaluation(array{batchEvaluationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBatchEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBatchEvaluationAsync(array{batchEvaluationId?: string, ...} $args = [])
 * @method \Aws\Result getBrowserSession(array $args = [])
 * @phpstan-method \Aws\Result getBrowserSession(array{browserIdentifier?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBrowserSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBrowserSessionAsync(array{browserIdentifier?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result getCodeInterpreterSession(array $args = [])
 * @phpstan-method \Aws\Result getCodeInterpreterSession(array{codeInterpreterIdentifier?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCodeInterpreterSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCodeInterpreterSessionAsync(array{codeInterpreterIdentifier?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result getEvent(array $args = [])
 * @phpstan-method \Aws\Result getEvent(array{memoryId?: string, sessionId?: string, actorId?: string, eventId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEventAsync(array{memoryId?: string, sessionId?: string, actorId?: string, eventId?: string, ...} $args = [])
 * @method \Aws\Result getMemoryRecord(array $args = [])
 * @phpstan-method \Aws\Result getMemoryRecord(array{memoryId?: string, memoryRecordId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMemoryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMemoryRecordAsync(array{memoryId?: string, memoryRecordId?: string, ...} $args = [])
 * @method \Aws\Result getPaymentInstrument(array $args = [])
 * @phpstan-method \Aws\Result getPaymentInstrument(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     paymentConnectorId?: string,
 *     paymentInstrumentId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPaymentInstrumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPaymentInstrumentAsync(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     paymentConnectorId?: string,
 *     paymentInstrumentId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPaymentInstrumentBalance(array $args = [])
 * @phpstan-method \Aws\Result getPaymentInstrumentBalance(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     paymentConnectorId?: string,
 *     paymentInstrumentId?: string,
 *     chain?: 'BASE'|'BASE_SEPOLIA'|'ETHEREUM'|'SOLANA'|'SOLANA_DEVNET',
 *     token?: 'USDC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPaymentInstrumentBalanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPaymentInstrumentBalanceAsync(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     paymentConnectorId?: string,
 *     paymentInstrumentId?: string,
 *     chain?: 'BASE'|'BASE_SEPOLIA'|'ETHEREUM'|'SOLANA'|'SOLANA_DEVNET',
 *     token?: 'USDC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPaymentSession(array $args = [])
 * @phpstan-method \Aws\Result getPaymentSession(array{userId?: string, agentName?: string, paymentManagerArn?: string, paymentSessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPaymentSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPaymentSessionAsync(array{userId?: string, agentName?: string, paymentManagerArn?: string, paymentSessionId?: string, ...} $args = [])
 * @method \Aws\Result getRecommendation(array $args = [])
 * @phpstan-method \Aws\Result getRecommendation(array{recommendationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationAsync(array{recommendationId?: string, ...} $args = [])
 * @method \Aws\Result getResourceApiKey(array $args = [])
 * @phpstan-method \Aws\Result getResourceApiKey(array{workloadIdentityToken?: string, resourceCredentialProviderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceApiKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceApiKeyAsync(array{workloadIdentityToken?: string, resourceCredentialProviderName?: string, ...} $args = [])
 * @method \Aws\Result getResourceOauth2Token(array $args = [])
 * @phpstan-method \Aws\Result getResourceOauth2Token(array{
 *     workloadIdentityToken?: string,
 *     resourceCredentialProviderName?: string,
 *     scopes?: list<string>,
 *     oauth2Flow?: 'M2M'|'ON_BEHALF_OF_TOKEN_EXCHANGE'|'USER_FEDERATION',
 *     sessionUri?: string,
 *     resourceOauth2ReturnUrl?: string,
 *     forceAuthentication?: bool,
 *     customParameters?: array<string, string>,
 *     customState?: string,
 *     resources?: list<string>,
 *     audiences?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceOauth2TokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceOauth2TokenAsync(array{
 *     workloadIdentityToken?: string,
 *     resourceCredentialProviderName?: string,
 *     scopes?: list<string>,
 *     oauth2Flow?: 'M2M'|'ON_BEHALF_OF_TOKEN_EXCHANGE'|'USER_FEDERATION',
 *     sessionUri?: string,
 *     resourceOauth2ReturnUrl?: string,
 *     forceAuthentication?: bool,
 *     customParameters?: array<string, string>,
 *     customState?: string,
 *     resources?: list<string>,
 *     audiences?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourcePaymentToken(array $args = [])
 * @phpstan-method \Aws\Result getResourcePaymentToken(array{
 *     workloadIdentityToken?: string,
 *     resourceCredentialProviderName?: string,
 *     paymentTokenRequest?: array{
 *         coinbaseCdpTokenRequest?: array{
 *             requestMethod?: 'DELETE'|'GET'|'PATCH'|'POST'|'PUT',
 *             requestHost?: string,
 *             requestPath?: string,
 *             includeWalletAuthToken?: bool,
 *             requestBody?: string,
 *             ...,
 *         },
 *         stripePrivyTokenRequest?: array{
 *             requestHost?: string,
 *             requestPath?: string,
 *             requestBody?: string,
 *             includeAuthorizationSignature?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePaymentTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePaymentTokenAsync(array{
 *     workloadIdentityToken?: string,
 *     resourceCredentialProviderName?: string,
 *     paymentTokenRequest?: array{
 *         coinbaseCdpTokenRequest?: array{
 *             requestMethod?: 'DELETE'|'GET'|'PATCH'|'POST'|'PUT',
 *             requestHost?: string,
 *             requestPath?: string,
 *             includeWalletAuthToken?: bool,
 *             requestBody?: string,
 *             ...,
 *         },
 *         stripePrivyTokenRequest?: array{
 *             requestHost?: string,
 *             requestPath?: string,
 *             requestBody?: string,
 *             includeAuthorizationSignature?: bool,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getWorkloadAccessToken(array $args = [])
 * @phpstan-method \Aws\Result getWorkloadAccessToken(array{workloadName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkloadAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkloadAccessTokenAsync(array{workloadName?: string, ...} $args = [])
 * @method \Aws\Result getWorkloadAccessTokenForJWT(array $args = [])
 * @phpstan-method \Aws\Result getWorkloadAccessTokenForJWT(array{workloadName?: string, userToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkloadAccessTokenForJWTAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkloadAccessTokenForJWTAsync(array{workloadName?: string, userToken?: string, ...} $args = [])
 * @method \Aws\Result getWorkloadAccessTokenForUserId(array $args = [])
 * @phpstan-method \Aws\Result getWorkloadAccessTokenForUserId(array{workloadName?: string, userId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkloadAccessTokenForUserIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkloadAccessTokenForUserIdAsync(array{workloadName?: string, userId?: string, ...} $args = [])
 * @method \Aws\Result invokeAgentRuntime(array $args = [])
 * @phpstan-method \Aws\Result invokeAgentRuntime(array{
 *     contentType?: string,
 *     accept?: string,
 *     mcpSessionId?: string,
 *     runtimeSessionId?: string,
 *     mcpProtocolVersion?: string,
 *     mcpMethod?: string,
 *     mcpName?: string,
 *     runtimeUserId?: string,
 *     traceId?: string,
 *     traceParent?: string,
 *     traceState?: string,
 *     baggage?: string,
 *     agentRuntimeArn?: string,
 *     qualifier?: string,
 *     accountId?: string,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeAgentRuntimeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeAgentRuntimeAsync(array{
 *     contentType?: string,
 *     accept?: string,
 *     mcpSessionId?: string,
 *     runtimeSessionId?: string,
 *     mcpProtocolVersion?: string,
 *     mcpMethod?: string,
 *     mcpName?: string,
 *     runtimeUserId?: string,
 *     traceId?: string,
 *     traceParent?: string,
 *     traceState?: string,
 *     baggage?: string,
 *     agentRuntimeArn?: string,
 *     qualifier?: string,
 *     accountId?: string,
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeAgentRuntimeCommand(array $args = [])
 * @phpstan-method \Aws\Result invokeAgentRuntimeCommand(array{
 *     contentType?: string,
 *     accept?: string,
 *     runtimeSessionId?: string,
 *     traceId?: string,
 *     traceParent?: string,
 *     traceState?: string,
 *     baggage?: string,
 *     agentRuntimeArn?: string,
 *     qualifier?: string,
 *     accountId?: string,
 *     body?: array{command?: string, timeout?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeAgentRuntimeCommandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeAgentRuntimeCommandAsync(array{
 *     contentType?: string,
 *     accept?: string,
 *     runtimeSessionId?: string,
 *     traceId?: string,
 *     traceParent?: string,
 *     traceState?: string,
 *     baggage?: string,
 *     agentRuntimeArn?: string,
 *     qualifier?: string,
 *     accountId?: string,
 *     body?: array{command?: string, timeout?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeBrowser(array $args = [])
 * @phpstan-method \Aws\Result invokeBrowser(array{
 *     browserIdentifier?: string,
 *     sessionId?: string,
 *     action?: array{
 *         mouseClick?: array{x?: int, y?: int, button?: 'LEFT'|'MIDDLE'|'RIGHT', clickCount?: int, ...},
 *         mouseMove?: array{x?: int, y?: int, ...},
 *         mouseDrag?: array{endX?: int, endY?: int, startX?: int, startY?: int, button?: 'LEFT'|'MIDDLE'|'RIGHT', ...},
 *         mouseScroll?: array{x?: int, y?: int, deltaX?: int, deltaY?: int, ...},
 *         keyType?: array{text?: string, ...},
 *         keyPress?: array{key?: string, presses?: int, ...},
 *         keyShortcut?: array{keys?: list<string>, ...},
 *         screenshot?: array{format?: 'PNG', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeBrowserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeBrowserAsync(array{
 *     browserIdentifier?: string,
 *     sessionId?: string,
 *     action?: array{
 *         mouseClick?: array{x?: int, y?: int, button?: 'LEFT'|'MIDDLE'|'RIGHT', clickCount?: int, ...},
 *         mouseMove?: array{x?: int, y?: int, ...},
 *         mouseDrag?: array{endX?: int, endY?: int, startX?: int, startY?: int, button?: 'LEFT'|'MIDDLE'|'RIGHT', ...},
 *         mouseScroll?: array{x?: int, y?: int, deltaX?: int, deltaY?: int, ...},
 *         keyType?: array{text?: string, ...},
 *         keyPress?: array{key?: string, presses?: int, ...},
 *         keyShortcut?: array{keys?: list<string>, ...},
 *         screenshot?: array{format?: 'PNG', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeCodeInterpreter(array $args = [])
 * @phpstan-method \Aws\Result invokeCodeInterpreter(array{
 *     codeInterpreterIdentifier?: string,
 *     sessionId?: string,
 *     traceId?: string,
 *     traceParent?: string,
 *     name?: 'executeCode'|'executeCommand'|'getTask'|'listFiles'|'readFiles'|'removeFiles'|'startCommandExecution'|'stopTask'|'writeFiles',
 *     arguments?: array{
 *         code?: string,
 *         language?: 'javascript'|'python'|'typescript',
 *         clearContext?: bool,
 *         command?: string,
 *         path?: string,
 *         paths?: list<string>,
 *         content?: list<array>,
 *         directoryPath?: string,
 *         taskId?: string,
 *         runtime?: 'deno'|'nodejs'|'python',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeCodeInterpreterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeCodeInterpreterAsync(array{
 *     codeInterpreterIdentifier?: string,
 *     sessionId?: string,
 *     traceId?: string,
 *     traceParent?: string,
 *     name?: 'executeCode'|'executeCommand'|'getTask'|'listFiles'|'readFiles'|'removeFiles'|'startCommandExecution'|'stopTask'|'writeFiles',
 *     arguments?: array{
 *         code?: string,
 *         language?: 'javascript'|'python'|'typescript',
 *         clearContext?: bool,
 *         command?: string,
 *         path?: string,
 *         paths?: list<string>,
 *         content?: list<array>,
 *         directoryPath?: string,
 *         taskId?: string,
 *         runtime?: 'deno'|'nodejs'|'python',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result invokeHarness(array $args = [])
 * @phpstan-method \Aws\Result invokeHarness(array{
 *     harnessArn?: string,
 *     qualifier?: string,
 *     runtimeSessionId?: string,
 *     runtimeUserId?: string,
 *     traceParent?: string,
 *     traceState?: string,
 *     traceId?: string,
 *     baggage?: string,
 *     messages?: list<array{role?: 'assistant'|'user', content?: list<array>, ...}>,
 *     model?: array{
 *         bedrockModelConfig?: array{
 *             modelId?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'converse_stream'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         openAiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         geminiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             topK?: int,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         liteLlmModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             apiBase?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     systemPrompt?: list<array{text?: string, ...}>,
 *     tools?: list<array{
 *         type?: 'agentcore_browser'|'agentcore_code_interpreter'|'agentcore_gateway'|'inline_function'|'remote_mcp',
 *         name?: string,
 *         config?: array,
 *         ...,
 *     }>,
 *     skills?: list<array{path?: string, s3?: array, git?: array, awsSkills?: array, ...}>,
 *     allowedTools?: list<string>,
 *     maxIterations?: int,
 *     maxTokens?: int,
 *     timeoutSeconds?: int,
 *     actorId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeHarnessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeHarnessAsync(array{
 *     harnessArn?: string,
 *     qualifier?: string,
 *     runtimeSessionId?: string,
 *     runtimeUserId?: string,
 *     traceParent?: string,
 *     traceState?: string,
 *     traceId?: string,
 *     baggage?: string,
 *     messages?: list<array{role?: 'assistant'|'user', content?: list<array>, ...}>,
 *     model?: array{
 *         bedrockModelConfig?: array{
 *             modelId?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'converse_stream'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         openAiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             apiFormat?: 'chat_completions'|'responses',
 *             additionalParams?: array,
 *             ...,
 *         },
 *         geminiModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             topK?: int,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         liteLlmModelConfig?: array{
 *             modelId?: string,
 *             apiKeyArn?: string,
 *             apiBase?: string,
 *             maxTokens?: int,
 *             temperature?: float,
 *             topP?: float,
 *             additionalParams?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     systemPrompt?: list<array{text?: string, ...}>,
 *     tools?: list<array{
 *         type?: 'agentcore_browser'|'agentcore_code_interpreter'|'agentcore_gateway'|'inline_function'|'remote_mcp',
 *         name?: string,
 *         config?: array,
 *         ...,
 *     }>,
 *     skills?: list<array{path?: string, s3?: array, git?: array, awsSkills?: array, ...}>,
 *     allowedTools?: list<string>,
 *     maxIterations?: int,
 *     maxTokens?: int,
 *     timeoutSeconds?: int,
 *     actorId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listABTests(array $args = [])
 * @phpstan-method \Aws\Result listABTests(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listABTestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listABTestsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listActors(array $args = [])
 * @phpstan-method \Aws\Result listActors(array{memoryId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listActorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActorsAsync(array{memoryId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listBatchEvaluations(array $args = [])
 * @phpstan-method \Aws\Result listBatchEvaluations(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBatchEvaluationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBatchEvaluationsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listBrowserSessions(array $args = [])
 * @phpstan-method \Aws\Result listBrowserSessions(array{browserIdentifier?: string, maxResults?: int, nextToken?: string, status?: 'READY'|'TERMINATED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBrowserSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBrowserSessionsAsync(array{browserIdentifier?: string, maxResults?: int, nextToken?: string, status?: 'READY'|'TERMINATED', ...} $args = [])
 * @method \Aws\Result listCodeInterpreterSessions(array $args = [])
 * @phpstan-method \Aws\Result listCodeInterpreterSessions(array{
 *     codeInterpreterIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     status?: 'READY'|'TERMINATED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCodeInterpreterSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCodeInterpreterSessionsAsync(array{
 *     codeInterpreterIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     status?: 'READY'|'TERMINATED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEvents(array $args = [])
 * @phpstan-method \Aws\Result listEvents(array{
 *     memoryId?: string,
 *     sessionId?: string,
 *     actorId?: string,
 *     includePayloads?: bool,
 *     filter?: array{branch?: array{name?: string, includeParentBranches?: bool, ...}, eventMetadata?: list<array>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEventsAsync(array{
 *     memoryId?: string,
 *     sessionId?: string,
 *     actorId?: string,
 *     includePayloads?: bool,
 *     filter?: array{branch?: array{name?: string, includeParentBranches?: bool, ...}, eventMetadata?: list<array>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMemoryExtractionJobs(array $args = [])
 * @phpstan-method \Aws\Result listMemoryExtractionJobs(array{
 *     memoryId?: string,
 *     maxResults?: int,
 *     filter?: array{strategyId?: string, sessionId?: string, actorId?: string, status?: 'FAILED', ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMemoryExtractionJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMemoryExtractionJobsAsync(array{
 *     memoryId?: string,
 *     maxResults?: int,
 *     filter?: array{strategyId?: string, sessionId?: string, actorId?: string, status?: 'FAILED', ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMemoryRecords(array $args = [])
 * @phpstan-method \Aws\Result listMemoryRecords(array{
 *     memoryId?: string,
 *     namespace?: string,
 *     namespacePath?: string,
 *     memoryStrategyId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     metadataFilters?: list<array{
 *         left?: array,
 *         operator?: 'AFTER'|'BEFORE'|'CONTAINS'|'EQUALS_TO'|'EXISTS'|'GREATER_THAN'|'GREATER_THAN_OR_EQUALS'|'LESS_THAN'|'LESS_THAN_OR_EQUALS'|'NOT_EXISTS',
 *         right?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMemoryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMemoryRecordsAsync(array{
 *     memoryId?: string,
 *     namespace?: string,
 *     namespacePath?: string,
 *     memoryStrategyId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     metadataFilters?: list<array{
 *         left?: array,
 *         operator?: 'AFTER'|'BEFORE'|'CONTAINS'|'EQUALS_TO'|'EXISTS'|'GREATER_THAN'|'GREATER_THAN_OR_EQUALS'|'LESS_THAN'|'LESS_THAN_OR_EQUALS'|'NOT_EXISTS',
 *         right?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPaymentInstruments(array $args = [])
 * @phpstan-method \Aws\Result listPaymentInstruments(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     paymentConnectorId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPaymentInstrumentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPaymentInstrumentsAsync(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     paymentConnectorId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPaymentSessions(array $args = [])
 * @phpstan-method \Aws\Result listPaymentSessions(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPaymentSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPaymentSessionsAsync(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listRecommendations(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     statusFilter?: 'COMPLETED'|'DELETING'|'FAILED'|'IN_PROGRESS'|'PENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendationsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     statusFilter?: 'COMPLETED'|'DELETING'|'FAILED'|'IN_PROGRESS'|'PENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSessions(array $args = [])
 * @phpstan-method \Aws\Result listSessions(array{
 *     memoryId?: string,
 *     actorId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{eventFilter?: 'HAS_EVENTS', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsAsync(array{
 *     memoryId?: string,
 *     actorId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filter?: array{eventFilter?: 'HAS_EVENTS', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result processPayment(array $args = [])
 * @phpstan-method \Aws\Result processPayment(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     paymentSessionId?: string,
 *     paymentInstrumentId?: string,
 *     paymentType?: 'CRYPTO_X402',
 *     paymentInput?: array{cryptoX402?: array{version?: string, payload?: array, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise processPaymentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise processPaymentAsync(array{
 *     userId?: string,
 *     agentName?: string,
 *     paymentManagerArn?: string,
 *     paymentSessionId?: string,
 *     paymentInstrumentId?: string,
 *     paymentType?: 'CRYPTO_X402',
 *     paymentInput?: array{cryptoX402?: array{version?: string, payload?: array, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result retrieveMemoryRecords(array $args = [])
 * @phpstan-method \Aws\Result retrieveMemoryRecords(array{
 *     memoryId?: string,
 *     namespace?: string,
 *     namespacePath?: string,
 *     searchCriteria?: array{searchQuery?: string, memoryStrategyId?: string, topK?: int, metadataFilters?: list<array>, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise retrieveMemoryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise retrieveMemoryRecordsAsync(array{
 *     memoryId?: string,
 *     namespace?: string,
 *     namespacePath?: string,
 *     searchCriteria?: array{searchQuery?: string, memoryStrategyId?: string, topK?: int, metadataFilters?: list<array>, ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result saveBrowserSessionProfile(array $args = [])
 * @phpstan-method \Aws\Result saveBrowserSessionProfile(array{
 *     traceId?: string,
 *     traceParent?: string,
 *     profileIdentifier?: string,
 *     browserIdentifier?: string,
 *     sessionId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise saveBrowserSessionProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise saveBrowserSessionProfileAsync(array{
 *     traceId?: string,
 *     traceParent?: string,
 *     profileIdentifier?: string,
 *     browserIdentifier?: string,
 *     sessionId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchRegistryRecords(array $args = [])
 * @phpstan-method \Aws\Result searchRegistryRecords(array{searchQuery?: string, registryIds?: list<string>, maxResults?: int, filters?: array, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise searchRegistryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchRegistryRecordsAsync(array{searchQuery?: string, registryIds?: list<string>, maxResults?: int, filters?: array, ...} $args = [])
 * @method \Aws\Result startBatchEvaluation(array $args = [])
 * @phpstan-method \Aws\Result startBatchEvaluation(array{
 *     batchEvaluationName?: string,
 *     evaluators?: list<array{evaluatorId?: string, ...}>,
 *     insights?: list<array{insightId?: string, ...}>,
 *     dataSourceConfig?: array{
 *         cloudWatchLogs?: array{serviceNames?: list<string>, logGroupNames?: list<string>, filterConfig?: array, ...},
 *         onlineEvaluationConfigSource?: array{onlineEvaluationConfigArn?: string, timeRange?: array, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     evaluationMetadata?: array{sessionMetadata?: list<array>, ...},
 *     tags?: array<string, string>,
 *     kmsKeyArn?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startBatchEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBatchEvaluationAsync(array{
 *     batchEvaluationName?: string,
 *     evaluators?: list<array{evaluatorId?: string, ...}>,
 *     insights?: list<array{insightId?: string, ...}>,
 *     dataSourceConfig?: array{
 *         cloudWatchLogs?: array{serviceNames?: list<string>, logGroupNames?: list<string>, filterConfig?: array, ...},
 *         onlineEvaluationConfigSource?: array{onlineEvaluationConfigArn?: string, timeRange?: array, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     evaluationMetadata?: array{sessionMetadata?: list<array>, ...},
 *     tags?: array<string, string>,
 *     kmsKeyArn?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startBrowserSession(array $args = [])
 * @phpstan-method \Aws\Result startBrowserSession(array{
 *     traceId?: string,
 *     traceParent?: string,
 *     browserIdentifier?: string,
 *     name?: string,
 *     sessionTimeoutSeconds?: int,
 *     viewPort?: array{width?: int, height?: int, ...},
 *     extensions?: list<array{location?: array, ...}>,
 *     profileConfiguration?: array{profileIdentifier?: string, ...},
 *     proxyConfiguration?: array{proxies?: list<array>, bypass?: array{domainPatterns?: list<string>, ...}, ...},
 *     enterprisePolicies?: list<array{location?: array, type?: 'MANAGED'|'RECOMMENDED', ...}>,
 *     certificates?: list<array{location?: array, ...}>,
 *     filesystemConfigurations?: list<array{s3FilesConfiguration?: array, efsConfiguration?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startBrowserSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBrowserSessionAsync(array{
 *     traceId?: string,
 *     traceParent?: string,
 *     browserIdentifier?: string,
 *     name?: string,
 *     sessionTimeoutSeconds?: int,
 *     viewPort?: array{width?: int, height?: int, ...},
 *     extensions?: list<array{location?: array, ...}>,
 *     profileConfiguration?: array{profileIdentifier?: string, ...},
 *     proxyConfiguration?: array{proxies?: list<array>, bypass?: array{domainPatterns?: list<string>, ...}, ...},
 *     enterprisePolicies?: list<array{location?: array, type?: 'MANAGED'|'RECOMMENDED', ...}>,
 *     certificates?: list<array{location?: array, ...}>,
 *     filesystemConfigurations?: list<array{s3FilesConfiguration?: array, efsConfiguration?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startCodeInterpreterSession(array $args = [])
 * @phpstan-method \Aws\Result startCodeInterpreterSession(array{
 *     traceId?: string,
 *     traceParent?: string,
 *     codeInterpreterIdentifier?: string,
 *     name?: string,
 *     sessionTimeoutSeconds?: int,
 *     certificates?: list<array{location?: array, ...}>,
 *     filesystemConfigurations?: list<array{s3FilesConfiguration?: array, efsConfiguration?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCodeInterpreterSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCodeInterpreterSessionAsync(array{
 *     traceId?: string,
 *     traceParent?: string,
 *     codeInterpreterIdentifier?: string,
 *     name?: string,
 *     sessionTimeoutSeconds?: int,
 *     certificates?: list<array{location?: array, ...}>,
 *     filesystemConfigurations?: list<array{s3FilesConfiguration?: array, efsConfiguration?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMemoryExtractionJob(array $args = [])
 * @phpstan-method \Aws\Result startMemoryExtractionJob(array{memoryId?: string, extractionJob?: array{jobId?: string, ...}, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMemoryExtractionJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMemoryExtractionJobAsync(array{memoryId?: string, extractionJob?: array{jobId?: string, ...}, clientToken?: string, ...} $args = [])
 * @method \Aws\Result startRecommendation(array $args = [])
 * @phpstan-method \Aws\Result startRecommendation(array{
 *     name?: string,
 *     description?: string,
 *     type?: 'SYSTEM_PROMPT_RECOMMENDATION'|'TOOL_DESCRIPTION_RECOMMENDATION',
 *     recommendationConfig?: array{
 *         systemPromptRecommendationConfig?: array{systemPrompt?: array, agentTraces?: array, evaluationConfig?: array, ...},
 *         toolDescriptionRecommendationConfig?: array{toolDescription?: array, agentTraces?: array, ...},
 *         ...,
 *     },
 *     kmsKeyArn?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRecommendationAsync(array{
 *     name?: string,
 *     description?: string,
 *     type?: 'SYSTEM_PROMPT_RECOMMENDATION'|'TOOL_DESCRIPTION_RECOMMENDATION',
 *     recommendationConfig?: array{
 *         systemPromptRecommendationConfig?: array{systemPrompt?: array, agentTraces?: array, evaluationConfig?: array, ...},
 *         toolDescriptionRecommendationConfig?: array{toolDescription?: array, agentTraces?: array, ...},
 *         ...,
 *     },
 *     kmsKeyArn?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopBatchEvaluation(array $args = [])
 * @phpstan-method \Aws\Result stopBatchEvaluation(array{batchEvaluationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopBatchEvaluationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopBatchEvaluationAsync(array{batchEvaluationId?: string, ...} $args = [])
 * @method \Aws\Result stopBrowserSession(array $args = [])
 * @phpstan-method \Aws\Result stopBrowserSession(array{
 *     traceId?: string,
 *     traceParent?: string,
 *     browserIdentifier?: string,
 *     sessionId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise stopBrowserSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopBrowserSessionAsync(array{
 *     traceId?: string,
 *     traceParent?: string,
 *     browserIdentifier?: string,
 *     sessionId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopCodeInterpreterSession(array $args = [])
 * @phpstan-method \Aws\Result stopCodeInterpreterSession(array{
 *     traceId?: string,
 *     traceParent?: string,
 *     codeInterpreterIdentifier?: string,
 *     sessionId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise stopCodeInterpreterSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopCodeInterpreterSessionAsync(array{
 *     traceId?: string,
 *     traceParent?: string,
 *     codeInterpreterIdentifier?: string,
 *     sessionId?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopRuntimeSession(array $args = [])
 * @phpstan-method \Aws\Result stopRuntimeSession(array{runtimeSessionId?: string, agentRuntimeArn?: string, qualifier?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopRuntimeSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopRuntimeSessionAsync(array{runtimeSessionId?: string, agentRuntimeArn?: string, qualifier?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateABTest(array $args = [])
 * @phpstan-method \Aws\Result updateABTest(array{
 *     abTestId?: string,
 *     clientToken?: string,
 *     name?: string,
 *     description?: string,
 *     variants?: list<array{name?: string, weight?: int, variantConfiguration?: array, ...}>,
 *     gatewayFilter?: array{targetPaths?: list<string>, ...},
 *     evaluationConfig?: array{onlineEvaluationConfigArn?: string, perVariantOnlineEvaluationConfig?: list<array>, ...},
 *     roleArn?: string,
 *     executionStatus?: 'NOT_STARTED'|'PAUSED'|'RUNNING'|'STOPPED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateABTestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateABTestAsync(array{
 *     abTestId?: string,
 *     clientToken?: string,
 *     name?: string,
 *     description?: string,
 *     variants?: list<array{name?: string, weight?: int, variantConfiguration?: array, ...}>,
 *     gatewayFilter?: array{targetPaths?: list<string>, ...},
 *     evaluationConfig?: array{onlineEvaluationConfigArn?: string, perVariantOnlineEvaluationConfig?: list<array>, ...},
 *     roleArn?: string,
 *     executionStatus?: 'NOT_STARTED'|'PAUSED'|'RUNNING'|'STOPPED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBrowserStream(array $args = [])
 * @phpstan-method \Aws\Result updateBrowserStream(array{
 *     browserIdentifier?: string,
 *     sessionId?: string,
 *     streamUpdate?: array{automationStreamUpdate?: array{streamStatus?: 'DISABLED'|'ENABLED', ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrowserStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrowserStreamAsync(array{
 *     browserIdentifier?: string,
 *     sessionId?: string,
 *     streamUpdate?: array{automationStreamUpdate?: array{streamStatus?: 'DISABLED'|'ENABLED', ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 */
class BedrockAgentCoreClient extends AwsClient {}
