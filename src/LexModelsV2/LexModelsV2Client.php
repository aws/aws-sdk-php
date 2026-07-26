<?php
namespace Aws\LexModelsV2;

use Aws\AwsClient;
use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **Amazon Lex Model Building V2** service.
 * @method \Aws\Result batchCreateCustomVocabularyItem(array $args = [])
 * @phpstan-method \Aws\Result batchCreateCustomVocabularyItem(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     customVocabularyItemList?: list<array{phrase?: string, weight?: int, displayAs?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateCustomVocabularyItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateCustomVocabularyItemAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     customVocabularyItemList?: list<array{phrase?: string, weight?: int, displayAs?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDeleteCustomVocabularyItem(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteCustomVocabularyItem(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     customVocabularyItemList?: list<array{itemId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteCustomVocabularyItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteCustomVocabularyItemAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     customVocabularyItemList?: list<array{itemId?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchUpdateCustomVocabularyItem(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateCustomVocabularyItem(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     customVocabularyItemList?: list<array{itemId?: string, phrase?: string, weight?: int, displayAs?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateCustomVocabularyItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateCustomVocabularyItemAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     customVocabularyItemList?: list<array{itemId?: string, phrase?: string, weight?: int, displayAs?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result buildBotLocale(array $args = [])
 * @phpstan-method \Aws\Result buildBotLocale(array{botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise buildBotLocaleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise buildBotLocaleAsync(array{botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \Aws\Result createBot(array $args = [])
 * @phpstan-method \Aws\Result createBot(array{
 *     botName?: string,
 *     description?: string,
 *     roleArn?: string,
 *     dataPrivacy?: array{childDirected?: bool, ...},
 *     idleSessionTTLInSeconds?: int,
 *     botTags?: array<string, string>,
 *     testBotAliasTags?: array<string, string>,
 *     botType?: 'Bot'|'BotNetwork',
 *     botMembers?: list<array{
 *         botMemberId?: string,
 *         botMemberName?: string,
 *         botMemberAliasId?: string,
 *         botMemberAliasName?: string,
 *         botMemberVersion?: string,
 *         ...,
 *     }>,
 *     errorLogSettings?: array{enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBotAsync(array{
 *     botName?: string,
 *     description?: string,
 *     roleArn?: string,
 *     dataPrivacy?: array{childDirected?: bool, ...},
 *     idleSessionTTLInSeconds?: int,
 *     botTags?: array<string, string>,
 *     testBotAliasTags?: array<string, string>,
 *     botType?: 'Bot'|'BotNetwork',
 *     botMembers?: list<array{
 *         botMemberId?: string,
 *         botMemberName?: string,
 *         botMemberAliasId?: string,
 *         botMemberAliasName?: string,
 *         botMemberVersion?: string,
 *         ...,
 *     }>,
 *     errorLogSettings?: array{enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBotAlias(array $args = [])
 * @phpstan-method \Aws\Result createBotAlias(array{
 *     botAliasName?: string,
 *     description?: string,
 *     botVersion?: string,
 *     botAliasLocaleSettings?: array<string, array{enabled?: bool, codeHookSpecification?: array, ...}>,
 *     conversationLogSettings?: array{textLogSettings?: list<array>, audioLogSettings?: list<array>, ...},
 *     sentimentAnalysisSettings?: array{detectSentiment?: bool, ...},
 *     botId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBotAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBotAliasAsync(array{
 *     botAliasName?: string,
 *     description?: string,
 *     botVersion?: string,
 *     botAliasLocaleSettings?: array<string, array{enabled?: bool, codeHookSpecification?: array, ...}>,
 *     conversationLogSettings?: array{textLogSettings?: list<array>, audioLogSettings?: list<array>, ...},
 *     sentimentAnalysisSettings?: array{detectSentiment?: bool, ...},
 *     botId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBotLocale(array $args = [])
 * @phpstan-method \Aws\Result createBotLocale(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     description?: string,
 *     nluIntentConfidenceThreshold?: float,
 *     voiceSettings?: array{engine?: 'generative'|'long-form'|'neural'|'standard', voiceId?: string, ...},
 *     unifiedSpeechSettings?: array{speechFoundationModel?: array{modelArn?: string, voiceId?: string, ...}, ...},
 *     audioFillerSettings?: array{
 *         enabled?: bool,
 *         audioType?: 'MELODY_CHIPPER_CHIME'|'MELODY_CURIOUS_CRAWL'|'MELODY_PATIENT_PING'|'MELODY_PONDERING_PONG'|'MELODY_RISING_RIPPLE'|'TYPING_KINETIC_KEYS'|'TYPING_QUIET_QWERTY',
 *         startDelayInMilliseconds?: int,
 *         minimumPlayDurationInMilliseconds?: int,
 *         responseDeliveryDelayInMilliseconds?: int,
 *         ...,
 *     },
 *     speechRecognitionSettings?: array{
 *         speechModelPreference?: 'Deepgram'|'Neural'|'Standard',
 *         speechModelConfig?: array{deepgramConfig?: array, ...},
 *         ...,
 *     },
 *     generativeAISettings?: array{
 *         runtimeSettings?: array{slotResolutionImprovement?: array, nluImprovement?: array, ...},
 *         buildtimeSettings?: array{descriptiveBotBuilder?: array, sampleUtteranceGeneration?: array, ...},
 *         ...,
 *     },
 *     speechDetectionSensitivity?: 'Default'|'HighNoiseTolerance'|'MaximumNoiseTolerance',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBotLocaleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBotLocaleAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     description?: string,
 *     nluIntentConfidenceThreshold?: float,
 *     voiceSettings?: array{engine?: 'generative'|'long-form'|'neural'|'standard', voiceId?: string, ...},
 *     unifiedSpeechSettings?: array{speechFoundationModel?: array{modelArn?: string, voiceId?: string, ...}, ...},
 *     audioFillerSettings?: array{
 *         enabled?: bool,
 *         audioType?: 'MELODY_CHIPPER_CHIME'|'MELODY_CURIOUS_CRAWL'|'MELODY_PATIENT_PING'|'MELODY_PONDERING_PONG'|'MELODY_RISING_RIPPLE'|'TYPING_KINETIC_KEYS'|'TYPING_QUIET_QWERTY',
 *         startDelayInMilliseconds?: int,
 *         minimumPlayDurationInMilliseconds?: int,
 *         responseDeliveryDelayInMilliseconds?: int,
 *         ...,
 *     },
 *     speechRecognitionSettings?: array{
 *         speechModelPreference?: 'Deepgram'|'Neural'|'Standard',
 *         speechModelConfig?: array{deepgramConfig?: array, ...},
 *         ...,
 *     },
 *     generativeAISettings?: array{
 *         runtimeSettings?: array{slotResolutionImprovement?: array, nluImprovement?: array, ...},
 *         buildtimeSettings?: array{descriptiveBotBuilder?: array, sampleUtteranceGeneration?: array, ...},
 *         ...,
 *     },
 *     speechDetectionSensitivity?: 'Default'|'HighNoiseTolerance'|'MaximumNoiseTolerance',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBotReplica(array $args = [])
 * @phpstan-method \Aws\Result createBotReplica(array{botId?: string, replicaRegion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBotReplicaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBotReplicaAsync(array{botId?: string, replicaRegion?: string, ...} $args = [])
 * @method \Aws\Result createBotVersion(array $args = [])
 * @phpstan-method \Aws\Result createBotVersion(array{
 *     botId?: string,
 *     description?: string,
 *     botVersionLocaleSpecification?: array<string, array{sourceBotVersion?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBotVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBotVersionAsync(array{
 *     botId?: string,
 *     description?: string,
 *     botVersionLocaleSpecification?: array<string, array{sourceBotVersion?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createExport(array $args = [])
 * @phpstan-method \Aws\Result createExport(array{
 *     resourceSpecification?: array{
 *         botExportSpecification?: array{botId?: string, botVersion?: string, ...},
 *         botLocaleExportSpecification?: array{botId?: string, botVersion?: string, localeId?: string, ...},
 *         customVocabularyExportSpecification?: array{botId?: string, botVersion?: string, localeId?: string, ...},
 *         testSetExportSpecification?: array{testSetId?: string, ...},
 *         ...,
 *     },
 *     fileFormat?: 'CSV'|'LexJson'|'TSV',
 *     filePassword?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExportAsync(array{
 *     resourceSpecification?: array{
 *         botExportSpecification?: array{botId?: string, botVersion?: string, ...},
 *         botLocaleExportSpecification?: array{botId?: string, botVersion?: string, localeId?: string, ...},
 *         customVocabularyExportSpecification?: array{botId?: string, botVersion?: string, localeId?: string, ...},
 *         testSetExportSpecification?: array{testSetId?: string, ...},
 *         ...,
 *     },
 *     fileFormat?: 'CSV'|'LexJson'|'TSV',
 *     filePassword?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIntent(array $args = [])
 * @phpstan-method \Aws\Result createIntent(array{
 *     intentName?: string,
 *     intentDisplayName?: string,
 *     description?: string,
 *     parentIntentSignature?: string,
 *     sampleUtterances?: list<array{utterance?: string, ...}>,
 *     dialogCodeHook?: array{enabled?: bool, ...},
 *     fulfillmentCodeHook?: array{
 *         enabled?: bool,
 *         postFulfillmentStatusSpecification?: array{
 *             successResponse?: array,
 *             failureResponse?: array,
 *             timeoutResponse?: array,
 *             successNextStep?: array,
 *             successConditional?: array,
 *             failureNextStep?: array,
 *             failureConditional?: array,
 *             timeoutNextStep?: array,
 *             timeoutConditional?: array,
 *             ...,
 *         },
 *         fulfillmentUpdatesSpecification?: array{active?: bool, startResponse?: array, updateResponse?: array, timeoutInSeconds?: int, ...},
 *         active?: bool,
 *         ...,
 *     },
 *     intentConfirmationSetting?: array{
 *         promptSpecification?: array{
 *             messageGroups?: list<array>,
 *             maxRetries?: int,
 *             allowInterrupt?: bool,
 *             messageSelectionStrategy?: 'Ordered'|'Random',
 *             promptAttemptsSpecification?: array<string, array>,
 *             ...,
 *         },
 *         declinationResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         active?: bool,
 *         confirmationResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         confirmationNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         confirmationConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         declinationNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         declinationConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         failureResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         failureNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         failureConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         codeHook?: array{
 *             enableCodeHookInvocation?: bool,
 *             active?: bool,
 *             invocationLabel?: string,
 *             postCodeHookSpecification?: array,
 *             ...,
 *         },
 *         elicitationCodeHook?: array{enableCodeHookInvocation?: bool, invocationLabel?: string, ...},
 *         ...,
 *     },
 *     intentClosingSetting?: array{
 *         closingResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         active?: bool,
 *         nextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         conditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         ...,
 *     },
 *     inputContexts?: list<array{name?: string, ...}>,
 *     outputContexts?: list<array{name?: string, timeToLiveInSeconds?: int, turnsToLive?: int, ...}>,
 *     kendraConfiguration?: array{kendraIndex?: string, queryFilterStringEnabled?: bool, queryFilterString?: string, ...},
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     initialResponseSetting?: array{
 *         initialResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         nextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         conditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         codeHook?: array{
 *             enableCodeHookInvocation?: bool,
 *             active?: bool,
 *             invocationLabel?: string,
 *             postCodeHookSpecification?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     qnAIntentConfiguration?: array{
 *         dataSourceConfiguration?: array{
 *             opensearchConfiguration?: array,
 *             kendraConfiguration?: array,
 *             bedrockKnowledgeStoreConfiguration?: array,
 *             ...,
 *         },
 *         bedrockModelConfiguration?: array{modelArn?: string, guardrail?: array, traceStatus?: 'DISABLED'|'ENABLED', customPrompt?: string, ...},
 *         ...,
 *     },
 *     qInConnectIntentConfiguration?: array{qInConnectAssistantConfiguration?: array{assistantArn?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntentAsync(array{
 *     intentName?: string,
 *     intentDisplayName?: string,
 *     description?: string,
 *     parentIntentSignature?: string,
 *     sampleUtterances?: list<array{utterance?: string, ...}>,
 *     dialogCodeHook?: array{enabled?: bool, ...},
 *     fulfillmentCodeHook?: array{
 *         enabled?: bool,
 *         postFulfillmentStatusSpecification?: array{
 *             successResponse?: array,
 *             failureResponse?: array,
 *             timeoutResponse?: array,
 *             successNextStep?: array,
 *             successConditional?: array,
 *             failureNextStep?: array,
 *             failureConditional?: array,
 *             timeoutNextStep?: array,
 *             timeoutConditional?: array,
 *             ...,
 *         },
 *         fulfillmentUpdatesSpecification?: array{active?: bool, startResponse?: array, updateResponse?: array, timeoutInSeconds?: int, ...},
 *         active?: bool,
 *         ...,
 *     },
 *     intentConfirmationSetting?: array{
 *         promptSpecification?: array{
 *             messageGroups?: list<array>,
 *             maxRetries?: int,
 *             allowInterrupt?: bool,
 *             messageSelectionStrategy?: 'Ordered'|'Random',
 *             promptAttemptsSpecification?: array<string, array>,
 *             ...,
 *         },
 *         declinationResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         active?: bool,
 *         confirmationResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         confirmationNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         confirmationConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         declinationNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         declinationConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         failureResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         failureNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         failureConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         codeHook?: array{
 *             enableCodeHookInvocation?: bool,
 *             active?: bool,
 *             invocationLabel?: string,
 *             postCodeHookSpecification?: array,
 *             ...,
 *         },
 *         elicitationCodeHook?: array{enableCodeHookInvocation?: bool, invocationLabel?: string, ...},
 *         ...,
 *     },
 *     intentClosingSetting?: array{
 *         closingResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         active?: bool,
 *         nextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         conditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         ...,
 *     },
 *     inputContexts?: list<array{name?: string, ...}>,
 *     outputContexts?: list<array{name?: string, timeToLiveInSeconds?: int, turnsToLive?: int, ...}>,
 *     kendraConfiguration?: array{kendraIndex?: string, queryFilterStringEnabled?: bool, queryFilterString?: string, ...},
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     initialResponseSetting?: array{
 *         initialResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         nextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         conditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         codeHook?: array{
 *             enableCodeHookInvocation?: bool,
 *             active?: bool,
 *             invocationLabel?: string,
 *             postCodeHookSpecification?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     qnAIntentConfiguration?: array{
 *         dataSourceConfiguration?: array{
 *             opensearchConfiguration?: array,
 *             kendraConfiguration?: array,
 *             bedrockKnowledgeStoreConfiguration?: array,
 *             ...,
 *         },
 *         bedrockModelConfiguration?: array{modelArn?: string, guardrail?: array, traceStatus?: 'DISABLED'|'ENABLED', customPrompt?: string, ...},
 *         ...,
 *     },
 *     qInConnectIntentConfiguration?: array{qInConnectAssistantConfiguration?: array{assistantArn?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result createResourcePolicy(array{resourceArn?: string, policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourcePolicyAsync(array{resourceArn?: string, policy?: string, ...} $args = [])
 * @method \Aws\Result createResourcePolicyStatement(array $args = [])
 * @phpstan-method \Aws\Result createResourcePolicyStatement(array{
 *     resourceArn?: string,
 *     statementId?: string,
 *     effect?: 'Allow'|'Deny',
 *     principal?: list<array{service?: string, arn?: string, ...}>,
 *     action?: list<string>,
 *     condition?: array<string, array<string, string>>,
 *     expectedRevisionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourcePolicyStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourcePolicyStatementAsync(array{
 *     resourceArn?: string,
 *     statementId?: string,
 *     effect?: 'Allow'|'Deny',
 *     principal?: list<array{service?: string, arn?: string, ...}>,
 *     action?: list<string>,
 *     condition?: array<string, array<string, string>>,
 *     expectedRevisionId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSlot(array $args = [])
 * @phpstan-method \Aws\Result createSlot(array{
 *     slotName?: string,
 *     description?: string,
 *     slotTypeId?: string,
 *     valueElicitationSetting?: array{
 *         defaultValueSpecification?: array{defaultValueList?: list<array>, ...},
 *         slotConstraint?: 'Optional'|'Required',
 *         promptSpecification?: array{
 *             messageGroups?: list<array>,
 *             maxRetries?: int,
 *             allowInterrupt?: bool,
 *             messageSelectionStrategy?: 'Ordered'|'Random',
 *             promptAttemptsSpecification?: array<string, array>,
 *             ...,
 *         },
 *         sampleUtterances?: list<array>,
 *         waitAndContinueSpecification?: array{waitingResponse?: array, continueResponse?: array, stillWaitingResponse?: array, active?: bool, ...},
 *         slotCaptureSetting?: array{
 *             captureResponse?: array,
 *             captureNextStep?: array,
 *             captureConditional?: array,
 *             failureResponse?: array,
 *             failureNextStep?: array,
 *             failureConditional?: array,
 *             codeHook?: array,
 *             elicitationCodeHook?: array,
 *             ...,
 *         },
 *         slotResolutionSetting?: array{slotResolutionStrategy?: 'Default'|'EnhancedFallback', ...},
 *         ...,
 *     },
 *     obfuscationSetting?: array{obfuscationSettingType?: 'DefaultObfuscation'|'None', ...},
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     intentId?: string,
 *     multipleValuesSetting?: array{allowMultipleValues?: bool, ...},
 *     subSlotSetting?: array{expression?: string, slotSpecifications?: array<string, array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSlotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSlotAsync(array{
 *     slotName?: string,
 *     description?: string,
 *     slotTypeId?: string,
 *     valueElicitationSetting?: array{
 *         defaultValueSpecification?: array{defaultValueList?: list<array>, ...},
 *         slotConstraint?: 'Optional'|'Required',
 *         promptSpecification?: array{
 *             messageGroups?: list<array>,
 *             maxRetries?: int,
 *             allowInterrupt?: bool,
 *             messageSelectionStrategy?: 'Ordered'|'Random',
 *             promptAttemptsSpecification?: array<string, array>,
 *             ...,
 *         },
 *         sampleUtterances?: list<array>,
 *         waitAndContinueSpecification?: array{waitingResponse?: array, continueResponse?: array, stillWaitingResponse?: array, active?: bool, ...},
 *         slotCaptureSetting?: array{
 *             captureResponse?: array,
 *             captureNextStep?: array,
 *             captureConditional?: array,
 *             failureResponse?: array,
 *             failureNextStep?: array,
 *             failureConditional?: array,
 *             codeHook?: array,
 *             elicitationCodeHook?: array,
 *             ...,
 *         },
 *         slotResolutionSetting?: array{slotResolutionStrategy?: 'Default'|'EnhancedFallback', ...},
 *         ...,
 *     },
 *     obfuscationSetting?: array{obfuscationSettingType?: 'DefaultObfuscation'|'None', ...},
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     intentId?: string,
 *     multipleValuesSetting?: array{allowMultipleValues?: bool, ...},
 *     subSlotSetting?: array{expression?: string, slotSpecifications?: array<string, array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSlotType(array $args = [])
 * @phpstan-method \Aws\Result createSlotType(array{
 *     slotTypeName?: string,
 *     description?: string,
 *     slotTypeValues?: list<array{sampleValue?: array, synonyms?: list<array>, ...}>,
 *     valueSelectionSetting?: array{
 *         resolutionStrategy?: 'Concatenation'|'OriginalValue'|'TopResolution',
 *         regexFilter?: array{pattern?: string, ...},
 *         advancedRecognitionSetting?: array{audioRecognitionStrategy?: 'UseSlotValuesAsCustomVocabulary', ...},
 *         ...,
 *     },
 *     parentSlotTypeSignature?: string,
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     externalSourceSetting?: array{grammarSlotTypeSetting?: array{source?: array, ...}, ...},
 *     compositeSlotTypeSetting?: array{subSlots?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSlotTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSlotTypeAsync(array{
 *     slotTypeName?: string,
 *     description?: string,
 *     slotTypeValues?: list<array{sampleValue?: array, synonyms?: list<array>, ...}>,
 *     valueSelectionSetting?: array{
 *         resolutionStrategy?: 'Concatenation'|'OriginalValue'|'TopResolution',
 *         regexFilter?: array{pattern?: string, ...},
 *         advancedRecognitionSetting?: array{audioRecognitionStrategy?: 'UseSlotValuesAsCustomVocabulary', ...},
 *         ...,
 *     },
 *     parentSlotTypeSignature?: string,
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     externalSourceSetting?: array{grammarSlotTypeSetting?: array{source?: array, ...}, ...},
 *     compositeSlotTypeSetting?: array{subSlots?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTestSetDiscrepancyReport(array $args = [])
 * @phpstan-method \Aws\Result createTestSetDiscrepancyReport(array{
 *     testSetId?: string,
 *     target?: array{botAliasTarget?: array{botId?: string, botAliasId?: string, localeId?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTestSetDiscrepancyReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTestSetDiscrepancyReportAsync(array{
 *     testSetId?: string,
 *     target?: array{botAliasTarget?: array{botId?: string, botAliasId?: string, localeId?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUploadUrl(array $args = [])
 * @phpstan-method \Aws\Result createUploadUrl(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createUploadUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUploadUrlAsync(array{...} $args = [])
 * @method \Aws\Result deleteBot(array $args = [])
 * @phpstan-method \Aws\Result deleteBot(array{botId?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBotAsync(array{botId?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \Aws\Result deleteBotAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteBotAlias(array{botAliasId?: string, botId?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBotAliasAsync(array{botAliasId?: string, botId?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \Aws\Result deleteBotAnalyzerRecommendation(array $args = [])
 * @phpstan-method \Aws\Result deleteBotAnalyzerRecommendation(array{botId?: string, botAnalyzerRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotAnalyzerRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBotAnalyzerRecommendationAsync(array{botId?: string, botAnalyzerRequestId?: string, ...} $args = [])
 * @method \Aws\Result deleteBotLocale(array $args = [])
 * @phpstan-method \Aws\Result deleteBotLocale(array{botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotLocaleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBotLocaleAsync(array{botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \Aws\Result deleteBotReplica(array $args = [])
 * @phpstan-method \Aws\Result deleteBotReplica(array{botId?: string, replicaRegion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotReplicaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBotReplicaAsync(array{botId?: string, replicaRegion?: string, ...} $args = [])
 * @method \Aws\Result deleteBotVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteBotVersion(array{botId?: string, botVersion?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBotVersionAsync(array{botId?: string, botVersion?: string, skipResourceInUseCheck?: bool, ...} $args = [])
 * @method \Aws\Result deleteCustomVocabulary(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomVocabulary(array{botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomVocabularyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomVocabularyAsync(array{botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \Aws\Result deleteExport(array $args = [])
 * @phpstan-method \Aws\Result deleteExport(array{exportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExportAsync(array{exportId?: string, ...} $args = [])
 * @method \Aws\Result deleteImport(array $args = [])
 * @phpstan-method \Aws\Result deleteImport(array{importId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteImportAsync(array{importId?: string, ...} $args = [])
 * @method \Aws\Result deleteIntent(array $args = [])
 * @phpstan-method \Aws\Result deleteIntent(array{intentId?: string, botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntentAsync(array{intentId?: string, botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{resourceArn?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{resourceArn?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicyStatement(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicyStatement(array{resourceArn?: string, statementId?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyStatementAsync(array{resourceArn?: string, statementId?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \Aws\Result deleteSlot(array $args = [])
 * @phpstan-method \Aws\Result deleteSlot(array{slotId?: string, botId?: string, botVersion?: string, localeId?: string, intentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSlotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSlotAsync(array{slotId?: string, botId?: string, botVersion?: string, localeId?: string, intentId?: string, ...} $args = [])
 * @method \Aws\Result deleteSlotType(array $args = [])
 * @phpstan-method \Aws\Result deleteSlotType(array{
 *     slotTypeId?: string,
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     skipResourceInUseCheck?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSlotTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSlotTypeAsync(array{
 *     slotTypeId?: string,
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     skipResourceInUseCheck?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteTestSet(array $args = [])
 * @phpstan-method \Aws\Result deleteTestSet(array{testSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTestSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTestSetAsync(array{testSetId?: string, ...} $args = [])
 * @method \Aws\Result deleteUtterances(array $args = [])
 * @phpstan-method \Aws\Result deleteUtterances(array{botId?: string, localeId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUtterancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUtterancesAsync(array{botId?: string, localeId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result describeBot(array $args = [])
 * @phpstan-method \Aws\Result describeBot(array{botId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBotAsync(array{botId?: string, ...} $args = [])
 * @method \Aws\Result describeBotAlias(array $args = [])
 * @phpstan-method \Aws\Result describeBotAlias(array{botAliasId?: string, botId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBotAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBotAliasAsync(array{botAliasId?: string, botId?: string, ...} $args = [])
 * @method \Aws\Result describeBotAnalyzerRecommendation(array $args = [])
 * @phpstan-method \Aws\Result describeBotAnalyzerRecommendation(array{botId?: string, botAnalyzerRequestId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBotAnalyzerRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBotAnalyzerRecommendationAsync(array{botId?: string, botAnalyzerRequestId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result describeBotLocale(array $args = [])
 * @phpstan-method \Aws\Result describeBotLocale(array{botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBotLocaleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBotLocaleAsync(array{botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \Aws\Result describeBotRecommendation(array $args = [])
 * @phpstan-method \Aws\Result describeBotRecommendation(array{botId?: string, botVersion?: string, localeId?: string, botRecommendationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBotRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBotRecommendationAsync(array{botId?: string, botVersion?: string, localeId?: string, botRecommendationId?: string, ...} $args = [])
 * @method \Aws\Result describeBotReplica(array $args = [])
 * @phpstan-method \Aws\Result describeBotReplica(array{botId?: string, replicaRegion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBotReplicaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBotReplicaAsync(array{botId?: string, replicaRegion?: string, ...} $args = [])
 * @method \Aws\Result describeBotResourceGeneration(array $args = [])
 * @phpstan-method \Aws\Result describeBotResourceGeneration(array{botId?: string, botVersion?: string, localeId?: string, generationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBotResourceGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBotResourceGenerationAsync(array{botId?: string, botVersion?: string, localeId?: string, generationId?: string, ...} $args = [])
 * @method \Aws\Result describeBotVersion(array $args = [])
 * @phpstan-method \Aws\Result describeBotVersion(array{botId?: string, botVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBotVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBotVersionAsync(array{botId?: string, botVersion?: string, ...} $args = [])
 * @method \Aws\Result describeCustomVocabularyMetadata(array $args = [])
 * @phpstan-method \Aws\Result describeCustomVocabularyMetadata(array{botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomVocabularyMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomVocabularyMetadataAsync(array{botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \Aws\Result describeExport(array $args = [])
 * @phpstan-method \Aws\Result describeExport(array{exportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExportAsync(array{exportId?: string, ...} $args = [])
 * @method \Aws\Result describeImport(array $args = [])
 * @phpstan-method \Aws\Result describeImport(array{importId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImportAsync(array{importId?: string, ...} $args = [])
 * @method \Aws\Result describeIntent(array $args = [])
 * @phpstan-method \Aws\Result describeIntent(array{intentId?: string, botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIntentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIntentAsync(array{intentId?: string, botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \Aws\Result describeResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result describeResourcePolicy(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result describeSlot(array $args = [])
 * @phpstan-method \Aws\Result describeSlot(array{slotId?: string, botId?: string, botVersion?: string, localeId?: string, intentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSlotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSlotAsync(array{slotId?: string, botId?: string, botVersion?: string, localeId?: string, intentId?: string, ...} $args = [])
 * @method \Aws\Result describeSlotType(array $args = [])
 * @phpstan-method \Aws\Result describeSlotType(array{slotTypeId?: string, botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSlotTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSlotTypeAsync(array{slotTypeId?: string, botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \Aws\Result describeTestExecution(array $args = [])
 * @phpstan-method \Aws\Result describeTestExecution(array{testExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTestExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTestExecutionAsync(array{testExecutionId?: string, ...} $args = [])
 * @method \Aws\Result describeTestSet(array $args = [])
 * @phpstan-method \Aws\Result describeTestSet(array{testSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTestSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTestSetAsync(array{testSetId?: string, ...} $args = [])
 * @method \Aws\Result describeTestSetDiscrepancyReport(array $args = [])
 * @phpstan-method \Aws\Result describeTestSetDiscrepancyReport(array{testSetDiscrepancyReportId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTestSetDiscrepancyReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTestSetDiscrepancyReportAsync(array{testSetDiscrepancyReportId?: string, ...} $args = [])
 * @method \Aws\Result describeTestSetGeneration(array $args = [])
 * @phpstan-method \Aws\Result describeTestSetGeneration(array{testSetGenerationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTestSetGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTestSetGenerationAsync(array{testSetGenerationId?: string, ...} $args = [])
 * @method \Aws\Result generateBotElement(array $args = [])
 * @phpstan-method \Aws\Result generateBotElement(array{intentId?: string, botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise generateBotElementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateBotElementAsync(array{intentId?: string, botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \Aws\Result getTestExecutionArtifactsUrl(array $args = [])
 * @phpstan-method \Aws\Result getTestExecutionArtifactsUrl(array{testExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTestExecutionArtifactsUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTestExecutionArtifactsUrlAsync(array{testExecutionId?: string, ...} $args = [])
 * @method \Aws\Result listAggregatedUtterances(array $args = [])
 * @phpstan-method \Aws\Result listAggregatedUtterances(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     aggregationDuration?: array{relativeAggregationDuration?: array{timeDimension?: 'Days'|'Hours'|'Weeks', timeValue?: int, ...}, ...},
 *     sortBy?: array{attribute?: 'HitCount'|'MissedCount', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'Utterance', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAggregatedUtterancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAggregatedUtterancesAsync(array{
 *     botId?: string,
 *     botAliasId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     aggregationDuration?: array{relativeAggregationDuration?: array{timeDimension?: 'Days'|'Hours'|'Weeks', timeValue?: int, ...}, ...},
 *     sortBy?: array{attribute?: 'HitCount'|'MissedCount', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'Utterance', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBotAliasReplicas(array $args = [])
 * @phpstan-method \Aws\Result listBotAliasReplicas(array{botId?: string, replicaRegion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotAliasReplicasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotAliasReplicasAsync(array{botId?: string, replicaRegion?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listBotAliases(array $args = [])
 * @phpstan-method \Aws\Result listBotAliases(array{botId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotAliasesAsync(array{botId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listBotAnalyzerHistory(array $args = [])
 * @phpstan-method \Aws\Result listBotAnalyzerHistory(array{botId?: string, localeId?: string, botVersion?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotAnalyzerHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotAnalyzerHistoryAsync(array{botId?: string, localeId?: string, botVersion?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listBotLocales(array $args = [])
 * @phpstan-method \Aws\Result listBotLocales(array{
 *     botId?: string,
 *     botVersion?: string,
 *     sortBy?: array{attribute?: 'BotLocaleName', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'BotLocaleName', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotLocalesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotLocalesAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     sortBy?: array{attribute?: 'BotLocaleName', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'BotLocaleName', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBotRecommendations(array $args = [])
 * @phpstan-method \Aws\Result listBotRecommendations(array{botId?: string, botVersion?: string, localeId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotRecommendationsAsync(array{botId?: string, botVersion?: string, localeId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listBotReplicas(array $args = [])
 * @phpstan-method \Aws\Result listBotReplicas(array{botId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotReplicasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotReplicasAsync(array{botId?: string, ...} $args = [])
 * @method \Aws\Result listBotResourceGenerations(array $args = [])
 * @phpstan-method \Aws\Result listBotResourceGenerations(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     sortBy?: array{attribute?: 'creationStartTime'|'lastUpdatedTime', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotResourceGenerationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotResourceGenerationsAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     sortBy?: array{attribute?: 'creationStartTime'|'lastUpdatedTime', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBotVersionReplicas(array $args = [])
 * @phpstan-method \Aws\Result listBotVersionReplicas(array{
 *     botId?: string,
 *     replicaRegion?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: array{attribute?: 'BotVersion', order?: 'Ascending'|'Descending', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotVersionReplicasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotVersionReplicasAsync(array{
 *     botId?: string,
 *     replicaRegion?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: array{attribute?: 'BotVersion', order?: 'Ascending'|'Descending', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBotVersions(array $args = [])
 * @phpstan-method \Aws\Result listBotVersions(array{
 *     botId?: string,
 *     sortBy?: array{attribute?: 'BotVersion', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotVersionsAsync(array{
 *     botId?: string,
 *     sortBy?: array{attribute?: 'BotVersion', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBots(array $args = [])
 * @phpstan-method \Aws\Result listBots(array{
 *     sortBy?: array{attribute?: 'BotName', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'BotName'|'BotType', values?: list<string>, operator?: 'CO'|'EQ'|'NE', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBotsAsync(array{
 *     sortBy?: array{attribute?: 'BotName', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'BotName'|'BotType', values?: list<string>, operator?: 'CO'|'EQ'|'NE', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBuiltInIntents(array $args = [])
 * @phpstan-method \Aws\Result listBuiltInIntents(array{
 *     localeId?: string,
 *     sortBy?: array{attribute?: 'IntentSignature', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBuiltInIntentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBuiltInIntentsAsync(array{
 *     localeId?: string,
 *     sortBy?: array{attribute?: 'IntentSignature', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBuiltInSlotTypes(array $args = [])
 * @phpstan-method \Aws\Result listBuiltInSlotTypes(array{
 *     localeId?: string,
 *     sortBy?: array{attribute?: 'SlotTypeSignature', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBuiltInSlotTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBuiltInSlotTypesAsync(array{
 *     localeId?: string,
 *     sortBy?: array{attribute?: 'SlotTypeSignature', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCustomVocabularyItems(array $args = [])
 * @phpstan-method \Aws\Result listCustomVocabularyItems(array{botId?: string, botVersion?: string, localeId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomVocabularyItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomVocabularyItemsAsync(array{botId?: string, botVersion?: string, localeId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listExports(array $args = [])
 * @phpstan-method \Aws\Result listExports(array{
 *     botId?: string,
 *     botVersion?: string,
 *     sortBy?: array{attribute?: 'LastUpdatedDateTime', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'ExportResourceType', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     localeId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listExportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExportsAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     sortBy?: array{attribute?: 'LastUpdatedDateTime', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'ExportResourceType', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     localeId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listImports(array $args = [])
 * @phpstan-method \Aws\Result listImports(array{
 *     botId?: string,
 *     botVersion?: string,
 *     sortBy?: array{attribute?: 'LastUpdatedDateTime', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'ImportResourceType', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     localeId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listImportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listImportsAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     sortBy?: array{attribute?: 'LastUpdatedDateTime', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'ImportResourceType', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     localeId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIntentMetrics(array $args = [])
 * @phpstan-method \Aws\Result listIntentMetrics(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     metrics?: list<array{
 *         name?: 'Count'|'Dropped'|'Failure'|'Success'|'Switched',
 *         statistic?: 'Avg'|'Max'|'Sum',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     binBy?: list<array{
 *         name?: 'ConversationStartTime'|'UtteranceTimestamp',
 *         interval?: 'OneDay'|'OneHour',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     groupBy?: list<array{name?: 'IntentEndState'|'IntentLevel'|'IntentName', ...}>,
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'IntentEndState'|'IntentName'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntentMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntentMetricsAsync(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     metrics?: list<array{
 *         name?: 'Count'|'Dropped'|'Failure'|'Success'|'Switched',
 *         statistic?: 'Avg'|'Max'|'Sum',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     binBy?: list<array{
 *         name?: 'ConversationStartTime'|'UtteranceTimestamp',
 *         interval?: 'OneDay'|'OneHour',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     groupBy?: list<array{name?: 'IntentEndState'|'IntentLevel'|'IntentName', ...}>,
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'IntentEndState'|'IntentName'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIntentPaths(array $args = [])
 * @phpstan-method \Aws\Result listIntentPaths(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     intentPath?: string,
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'LocaleId'|'Modality',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntentPathsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntentPathsAsync(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     intentPath?: string,
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'LocaleId'|'Modality',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIntentStageMetrics(array $args = [])
 * @phpstan-method \Aws\Result listIntentStageMetrics(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     metrics?: list<array{
 *         name?: 'Count'|'Dropped'|'Failed'|'Retry'|'Success',
 *         statistic?: 'Avg'|'Max'|'Sum',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     binBy?: list<array{
 *         name?: 'ConversationStartTime'|'UtteranceTimestamp',
 *         interval?: 'OneDay'|'OneHour',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     groupBy?: list<array{name?: 'IntentStageName'|'SwitchedToIntent', ...}>,
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'IntentName'|'IntentStageName'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntentStageMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntentStageMetricsAsync(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     metrics?: list<array{
 *         name?: 'Count'|'Dropped'|'Failed'|'Retry'|'Success',
 *         statistic?: 'Avg'|'Max'|'Sum',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     binBy?: list<array{
 *         name?: 'ConversationStartTime'|'UtteranceTimestamp',
 *         interval?: 'OneDay'|'OneHour',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     groupBy?: list<array{name?: 'IntentStageName'|'SwitchedToIntent', ...}>,
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'IntentName'|'IntentStageName'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIntents(array $args = [])
 * @phpstan-method \Aws\Result listIntents(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     sortBy?: array{attribute?: 'IntentName'|'LastUpdatedDateTime', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'IntentName', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIntentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIntentsAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     sortBy?: array{attribute?: 'IntentName'|'LastUpdatedDateTime', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'IntentName', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecommendedIntents(array $args = [])
 * @phpstan-method \Aws\Result listRecommendedIntents(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     botRecommendationId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecommendedIntentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendedIntentsAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     botRecommendationId?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSessionAnalyticsData(array $args = [])
 * @phpstan-method \Aws\Result listSessionAnalyticsData(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     sortBy?: array{name?: 'ConversationStartTime'|'Duration'|'NumberOfTurns', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'ConversationEndState'|'Duration'|'IntentPath'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionAnalyticsDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionAnalyticsDataAsync(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     sortBy?: array{name?: 'ConversationStartTime'|'Duration'|'NumberOfTurns', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'ConversationEndState'|'Duration'|'IntentPath'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSessionMetrics(array $args = [])
 * @phpstan-method \Aws\Result listSessionMetrics(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     metrics?: list<array{
 *         name?: 'Concurrency'|'Count'|'Dropped'|'Duration'|'Failure'|'Success'|'TurnsPerConversation',
 *         statistic?: 'Avg'|'Max'|'Sum',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     binBy?: list<array{
 *         name?: 'ConversationStartTime'|'UtteranceTimestamp',
 *         interval?: 'OneDay'|'OneHour',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     groupBy?: list<array{name?: 'ConversationEndState'|'LocaleId', ...}>,
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'ConversationEndState'|'Duration'|'IntentPath'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSessionMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionMetricsAsync(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     metrics?: list<array{
 *         name?: 'Concurrency'|'Count'|'Dropped'|'Duration'|'Failure'|'Success'|'TurnsPerConversation',
 *         statistic?: 'Avg'|'Max'|'Sum',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     binBy?: list<array{
 *         name?: 'ConversationStartTime'|'UtteranceTimestamp',
 *         interval?: 'OneDay'|'OneHour',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     groupBy?: list<array{name?: 'ConversationEndState'|'LocaleId', ...}>,
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'ConversationEndState'|'Duration'|'IntentPath'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSlotTypes(array $args = [])
 * @phpstan-method \Aws\Result listSlotTypes(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     sortBy?: array{attribute?: 'LastUpdatedDateTime'|'SlotTypeName', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'ExternalSourceType'|'SlotTypeName', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSlotTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSlotTypesAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     sortBy?: array{attribute?: 'LastUpdatedDateTime'|'SlotTypeName', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'ExternalSourceType'|'SlotTypeName', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSlots(array $args = [])
 * @phpstan-method \Aws\Result listSlots(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     intentId?: string,
 *     sortBy?: array{attribute?: 'LastUpdatedDateTime'|'SlotName', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'SlotName', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSlotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSlotsAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     intentId?: string,
 *     sortBy?: array{attribute?: 'LastUpdatedDateTime'|'SlotName', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{name?: 'SlotName', values?: list<string>, operator?: 'CO'|'EQ', ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceARN?: string, ...} $args = [])
 * @method \Aws\Result listTestExecutionResultItems(array $args = [])
 * @phpstan-method \Aws\Result listTestExecutionResultItems(array{
 *     testExecutionId?: string,
 *     resultFilterBy?: array{
 *         resultTypeFilter?: 'ConversationLevelTestResults'|'IntentClassificationTestResults'|'OverallTestResults'|'SlotResolutionTestResults'|'UtteranceLevelResults',
 *         conversationLevelTestResultsFilterBy?: array{endToEndResult?: 'ExecutionError'|'Matched'|'Mismatched', ...},
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestExecutionResultItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestExecutionResultItemsAsync(array{
 *     testExecutionId?: string,
 *     resultFilterBy?: array{
 *         resultTypeFilter?: 'ConversationLevelTestResults'|'IntentClassificationTestResults'|'OverallTestResults'|'SlotResolutionTestResults'|'UtteranceLevelResults',
 *         conversationLevelTestResultsFilterBy?: array{endToEndResult?: 'ExecutionError'|'Matched'|'Mismatched', ...},
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTestExecutions(array $args = [])
 * @phpstan-method \Aws\Result listTestExecutions(array{
 *     sortBy?: array{attribute?: 'CreationDateTime'|'TestSetName', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestExecutionsAsync(array{
 *     sortBy?: array{attribute?: 'CreationDateTime'|'TestSetName', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTestSetRecords(array $args = [])
 * @phpstan-method \Aws\Result listTestSetRecords(array{testSetId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestSetRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestSetRecordsAsync(array{testSetId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTestSets(array $args = [])
 * @phpstan-method \Aws\Result listTestSets(array{
 *     sortBy?: array{attribute?: 'LastUpdatedDateTime'|'TestSetName', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTestSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTestSetsAsync(array{
 *     sortBy?: array{attribute?: 'LastUpdatedDateTime'|'TestSetName', order?: 'Ascending'|'Descending', ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listUtteranceAnalyticsData(array $args = [])
 * @phpstan-method \Aws\Result listUtteranceAnalyticsData(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     sortBy?: array{name?: 'UtteranceTimestamp', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId'|'UtteranceState'|'UtteranceText',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUtteranceAnalyticsDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUtteranceAnalyticsDataAsync(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     sortBy?: array{name?: 'UtteranceTimestamp', order?: 'Ascending'|'Descending', ...},
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId'|'UtteranceState'|'UtteranceText',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listUtteranceMetrics(array $args = [])
 * @phpstan-method \Aws\Result listUtteranceMetrics(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     metrics?: list<array{
 *         name?: 'Count'|'Detected'|'Missed'|'UtteranceTimestamp',
 *         statistic?: 'Avg'|'Max'|'Sum',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     binBy?: list<array{
 *         name?: 'ConversationStartTime'|'UtteranceTimestamp',
 *         interval?: 'OneDay'|'OneHour',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     groupBy?: list<array{name?: 'UtteranceState'|'UtteranceText', ...}>,
 *     attributes?: list<array{name?: 'LastUsedIntent', ...}>,
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId'|'UtteranceState'|'UtteranceText',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUtteranceMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUtteranceMetricsAsync(array{
 *     botId?: string,
 *     startDateTime?: int|string|\DateTimeInterface,
 *     endDateTime?: int|string|\DateTimeInterface,
 *     metrics?: list<array{
 *         name?: 'Count'|'Detected'|'Missed'|'UtteranceTimestamp',
 *         statistic?: 'Avg'|'Max'|'Sum',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     binBy?: list<array{
 *         name?: 'ConversationStartTime'|'UtteranceTimestamp',
 *         interval?: 'OneDay'|'OneHour',
 *         order?: 'Ascending'|'Descending',
 *         ...,
 *     }>,
 *     groupBy?: list<array{name?: 'UtteranceState'|'UtteranceText', ...}>,
 *     attributes?: list<array{name?: 'LastUsedIntent', ...}>,
 *     filters?: list<array{
 *         name?: 'BotAliasId'|'BotVersion'|'Channel'|'LocaleId'|'Modality'|'OriginatingRequestId'|'SessionId'|'UtteranceState'|'UtteranceText',
 *         operator?: 'EQ'|'GT'|'LT',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchAssociatedTranscripts(array $args = [])
 * @phpstan-method \Aws\Result searchAssociatedTranscripts(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     botRecommendationId?: string,
 *     searchOrder?: 'Ascending'|'Descending',
 *     filters?: list<array{name?: 'IntentId'|'SlotTypeId', values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextIndex?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAssociatedTranscriptsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAssociatedTranscriptsAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     botRecommendationId?: string,
 *     searchOrder?: 'Ascending'|'Descending',
 *     filters?: list<array{name?: 'IntentId'|'SlotTypeId', values?: list<string>, ...}>,
 *     maxResults?: int,
 *     nextIndex?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startBotAnalyzer(array $args = [])
 * @phpstan-method \Aws\Result startBotAnalyzer(array{botId?: string, analysisScope?: 'BotLocale', localeId?: string, botVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startBotAnalyzerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBotAnalyzerAsync(array{botId?: string, analysisScope?: 'BotLocale', localeId?: string, botVersion?: string, ...} $args = [])
 * @method \Aws\Result startBotRecommendation(array $args = [])
 * @phpstan-method \Aws\Result startBotRecommendation(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     transcriptSourceSetting?: array{
 *         s3BucketTranscriptSource?: array{
 *             s3BucketName?: string,
 *             pathFormat?: array,
 *             transcriptFormat?: 'Lex',
 *             transcriptFilter?: array,
 *             kmsKeyArn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     encryptionSetting?: array{kmsKeyArn?: string, botLocaleExportPassword?: string, associatedTranscriptsPassword?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startBotRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBotRecommendationAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     transcriptSourceSetting?: array{
 *         s3BucketTranscriptSource?: array{
 *             s3BucketName?: string,
 *             pathFormat?: array,
 *             transcriptFormat?: 'Lex',
 *             transcriptFilter?: array,
 *             kmsKeyArn?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     encryptionSetting?: array{kmsKeyArn?: string, botLocaleExportPassword?: string, associatedTranscriptsPassword?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startBotResourceGeneration(array $args = [])
 * @phpstan-method \Aws\Result startBotResourceGeneration(array{generationInputPrompt?: string, botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startBotResourceGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBotResourceGenerationAsync(array{generationInputPrompt?: string, botId?: string, botVersion?: string, localeId?: string, ...} $args = [])
 * @method \Aws\Result startImport(array $args = [])
 * @phpstan-method \Aws\Result startImport(array{
 *     importId?: string,
 *     resourceSpecification?: array{
 *         botImportSpecification?: array{
 *             botName?: string,
 *             roleArn?: string,
 *             dataPrivacy?: array,
 *             errorLogSettings?: array,
 *             idleSessionTTLInSeconds?: int,
 *             botTags?: array<string, string>,
 *             testBotAliasTags?: array<string, string>,
 *             ...,
 *         },
 *         botLocaleImportSpecification?: array{
 *             botId?: string,
 *             botVersion?: string,
 *             localeId?: string,
 *             nluIntentConfidenceThreshold?: float,
 *             voiceSettings?: array,
 *             speechRecognitionSettings?: array,
 *             speechDetectionSensitivity?: 'Default'|'HighNoiseTolerance'|'MaximumNoiseTolerance',
 *             unifiedSpeechSettings?: array,
 *             audioFillerSettings?: array,
 *             ...,
 *         },
 *         customVocabularyImportSpecification?: array{botId?: string, botVersion?: string, localeId?: string, ...},
 *         testSetImportResourceSpecification?: array{
 *             testSetName?: string,
 *             description?: string,
 *             roleArn?: string,
 *             storageLocation?: array,
 *             importInputLocation?: array,
 *             modality?: 'Audio'|'Text',
 *             testSetTags?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     mergeStrategy?: 'Append'|'FailOnConflict'|'Overwrite',
 *     filePassword?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImportAsync(array{
 *     importId?: string,
 *     resourceSpecification?: array{
 *         botImportSpecification?: array{
 *             botName?: string,
 *             roleArn?: string,
 *             dataPrivacy?: array,
 *             errorLogSettings?: array,
 *             idleSessionTTLInSeconds?: int,
 *             botTags?: array<string, string>,
 *             testBotAliasTags?: array<string, string>,
 *             ...,
 *         },
 *         botLocaleImportSpecification?: array{
 *             botId?: string,
 *             botVersion?: string,
 *             localeId?: string,
 *             nluIntentConfidenceThreshold?: float,
 *             voiceSettings?: array,
 *             speechRecognitionSettings?: array,
 *             speechDetectionSensitivity?: 'Default'|'HighNoiseTolerance'|'MaximumNoiseTolerance',
 *             unifiedSpeechSettings?: array,
 *             audioFillerSettings?: array,
 *             ...,
 *         },
 *         customVocabularyImportSpecification?: array{botId?: string, botVersion?: string, localeId?: string, ...},
 *         testSetImportResourceSpecification?: array{
 *             testSetName?: string,
 *             description?: string,
 *             roleArn?: string,
 *             storageLocation?: array,
 *             importInputLocation?: array,
 *             modality?: 'Audio'|'Text',
 *             testSetTags?: array<string, string>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     mergeStrategy?: 'Append'|'FailOnConflict'|'Overwrite',
 *     filePassword?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTestExecution(array $args = [])
 * @phpstan-method \Aws\Result startTestExecution(array{
 *     testSetId?: string,
 *     target?: array{botAliasTarget?: array{botId?: string, botAliasId?: string, localeId?: string, ...}, ...},
 *     apiMode?: 'NonStreaming'|'Streaming',
 *     testExecutionModality?: 'Audio'|'Text',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTestExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTestExecutionAsync(array{
 *     testSetId?: string,
 *     target?: array{botAliasTarget?: array{botId?: string, botAliasId?: string, localeId?: string, ...}, ...},
 *     apiMode?: 'NonStreaming'|'Streaming',
 *     testExecutionModality?: 'Audio'|'Text',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTestSetGeneration(array $args = [])
 * @phpstan-method \Aws\Result startTestSetGeneration(array{
 *     testSetName?: string,
 *     description?: string,
 *     storageLocation?: array{s3BucketName?: string, s3Path?: string, kmsKeyArn?: string, ...},
 *     generationDataSource?: array{
 *         conversationLogsDataSource?: array{botId?: string, botAliasId?: string, localeId?: string, filter?: array, ...},
 *         ...,
 *     },
 *     roleArn?: string,
 *     testSetTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startTestSetGenerationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTestSetGenerationAsync(array{
 *     testSetName?: string,
 *     description?: string,
 *     storageLocation?: array{s3BucketName?: string, s3Path?: string, kmsKeyArn?: string, ...},
 *     generationDataSource?: array{
 *         conversationLogsDataSource?: array{botId?: string, botAliasId?: string, localeId?: string, filter?: array, ...},
 *         ...,
 *     },
 *     roleArn?: string,
 *     testSetTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopBotAnalyzer(array $args = [])
 * @phpstan-method \Aws\Result stopBotAnalyzer(array{botId?: string, botAnalyzerRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopBotAnalyzerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopBotAnalyzerAsync(array{botId?: string, botAnalyzerRequestId?: string, ...} $args = [])
 * @method \Aws\Result stopBotRecommendation(array $args = [])
 * @phpstan-method \Aws\Result stopBotRecommendation(array{botId?: string, botVersion?: string, localeId?: string, botRecommendationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopBotRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopBotRecommendationAsync(array{botId?: string, botVersion?: string, localeId?: string, botRecommendationId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceARN?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceARN?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBot(array $args = [])
 * @phpstan-method \Aws\Result updateBot(array{
 *     botId?: string,
 *     botName?: string,
 *     description?: string,
 *     roleArn?: string,
 *     dataPrivacy?: array{childDirected?: bool, ...},
 *     idleSessionTTLInSeconds?: int,
 *     botType?: 'Bot'|'BotNetwork',
 *     botMembers?: list<array{
 *         botMemberId?: string,
 *         botMemberName?: string,
 *         botMemberAliasId?: string,
 *         botMemberAliasName?: string,
 *         botMemberVersion?: string,
 *         ...,
 *     }>,
 *     errorLogSettings?: array{enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBotAsync(array{
 *     botId?: string,
 *     botName?: string,
 *     description?: string,
 *     roleArn?: string,
 *     dataPrivacy?: array{childDirected?: bool, ...},
 *     idleSessionTTLInSeconds?: int,
 *     botType?: 'Bot'|'BotNetwork',
 *     botMembers?: list<array{
 *         botMemberId?: string,
 *         botMemberName?: string,
 *         botMemberAliasId?: string,
 *         botMemberAliasName?: string,
 *         botMemberVersion?: string,
 *         ...,
 *     }>,
 *     errorLogSettings?: array{enabled?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBotAlias(array $args = [])
 * @phpstan-method \Aws\Result updateBotAlias(array{
 *     botAliasId?: string,
 *     botAliasName?: string,
 *     description?: string,
 *     botVersion?: string,
 *     botAliasLocaleSettings?: array<string, array{enabled?: bool, codeHookSpecification?: array, ...}>,
 *     conversationLogSettings?: array{textLogSettings?: list<array>, audioLogSettings?: list<array>, ...},
 *     sentimentAnalysisSettings?: array{detectSentiment?: bool, ...},
 *     botId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBotAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBotAliasAsync(array{
 *     botAliasId?: string,
 *     botAliasName?: string,
 *     description?: string,
 *     botVersion?: string,
 *     botAliasLocaleSettings?: array<string, array{enabled?: bool, codeHookSpecification?: array, ...}>,
 *     conversationLogSettings?: array{textLogSettings?: list<array>, audioLogSettings?: list<array>, ...},
 *     sentimentAnalysisSettings?: array{detectSentiment?: bool, ...},
 *     botId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBotLocale(array $args = [])
 * @phpstan-method \Aws\Result updateBotLocale(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     description?: string,
 *     nluIntentConfidenceThreshold?: float,
 *     voiceSettings?: array{engine?: 'generative'|'long-form'|'neural'|'standard', voiceId?: string, ...},
 *     unifiedSpeechSettings?: array{speechFoundationModel?: array{modelArn?: string, voiceId?: string, ...}, ...},
 *     audioFillerSettings?: array{
 *         enabled?: bool,
 *         audioType?: 'MELODY_CHIPPER_CHIME'|'MELODY_CURIOUS_CRAWL'|'MELODY_PATIENT_PING'|'MELODY_PONDERING_PONG'|'MELODY_RISING_RIPPLE'|'TYPING_KINETIC_KEYS'|'TYPING_QUIET_QWERTY',
 *         startDelayInMilliseconds?: int,
 *         minimumPlayDurationInMilliseconds?: int,
 *         responseDeliveryDelayInMilliseconds?: int,
 *         ...,
 *     },
 *     speechRecognitionSettings?: array{
 *         speechModelPreference?: 'Deepgram'|'Neural'|'Standard',
 *         speechModelConfig?: array{deepgramConfig?: array, ...},
 *         ...,
 *     },
 *     generativeAISettings?: array{
 *         runtimeSettings?: array{slotResolutionImprovement?: array, nluImprovement?: array, ...},
 *         buildtimeSettings?: array{descriptiveBotBuilder?: array, sampleUtteranceGeneration?: array, ...},
 *         ...,
 *     },
 *     speechDetectionSensitivity?: 'Default'|'HighNoiseTolerance'|'MaximumNoiseTolerance',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBotLocaleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBotLocaleAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     description?: string,
 *     nluIntentConfidenceThreshold?: float,
 *     voiceSettings?: array{engine?: 'generative'|'long-form'|'neural'|'standard', voiceId?: string, ...},
 *     unifiedSpeechSettings?: array{speechFoundationModel?: array{modelArn?: string, voiceId?: string, ...}, ...},
 *     audioFillerSettings?: array{
 *         enabled?: bool,
 *         audioType?: 'MELODY_CHIPPER_CHIME'|'MELODY_CURIOUS_CRAWL'|'MELODY_PATIENT_PING'|'MELODY_PONDERING_PONG'|'MELODY_RISING_RIPPLE'|'TYPING_KINETIC_KEYS'|'TYPING_QUIET_QWERTY',
 *         startDelayInMilliseconds?: int,
 *         minimumPlayDurationInMilliseconds?: int,
 *         responseDeliveryDelayInMilliseconds?: int,
 *         ...,
 *     },
 *     speechRecognitionSettings?: array{
 *         speechModelPreference?: 'Deepgram'|'Neural'|'Standard',
 *         speechModelConfig?: array{deepgramConfig?: array, ...},
 *         ...,
 *     },
 *     generativeAISettings?: array{
 *         runtimeSettings?: array{slotResolutionImprovement?: array, nluImprovement?: array, ...},
 *         buildtimeSettings?: array{descriptiveBotBuilder?: array, sampleUtteranceGeneration?: array, ...},
 *         ...,
 *     },
 *     speechDetectionSensitivity?: 'Default'|'HighNoiseTolerance'|'MaximumNoiseTolerance',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBotRecommendation(array $args = [])
 * @phpstan-method \Aws\Result updateBotRecommendation(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     botRecommendationId?: string,
 *     encryptionSetting?: array{kmsKeyArn?: string, botLocaleExportPassword?: string, associatedTranscriptsPassword?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBotRecommendationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBotRecommendationAsync(array{
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     botRecommendationId?: string,
 *     encryptionSetting?: array{kmsKeyArn?: string, botLocaleExportPassword?: string, associatedTranscriptsPassword?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateExport(array $args = [])
 * @phpstan-method \Aws\Result updateExport(array{exportId?: string, filePassword?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateExportAsync(array{exportId?: string, filePassword?: string, ...} $args = [])
 * @method \Aws\Result updateIntent(array $args = [])
 * @phpstan-method \Aws\Result updateIntent(array{
 *     intentId?: string,
 *     intentName?: string,
 *     intentDisplayName?: string,
 *     description?: string,
 *     parentIntentSignature?: string,
 *     sampleUtterances?: list<array{utterance?: string, ...}>,
 *     dialogCodeHook?: array{enabled?: bool, ...},
 *     fulfillmentCodeHook?: array{
 *         enabled?: bool,
 *         postFulfillmentStatusSpecification?: array{
 *             successResponse?: array,
 *             failureResponse?: array,
 *             timeoutResponse?: array,
 *             successNextStep?: array,
 *             successConditional?: array,
 *             failureNextStep?: array,
 *             failureConditional?: array,
 *             timeoutNextStep?: array,
 *             timeoutConditional?: array,
 *             ...,
 *         },
 *         fulfillmentUpdatesSpecification?: array{active?: bool, startResponse?: array, updateResponse?: array, timeoutInSeconds?: int, ...},
 *         active?: bool,
 *         ...,
 *     },
 *     slotPriorities?: list<array{priority?: int, slotId?: string, ...}>,
 *     intentConfirmationSetting?: array{
 *         promptSpecification?: array{
 *             messageGroups?: list<array>,
 *             maxRetries?: int,
 *             allowInterrupt?: bool,
 *             messageSelectionStrategy?: 'Ordered'|'Random',
 *             promptAttemptsSpecification?: array<string, array>,
 *             ...,
 *         },
 *         declinationResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         active?: bool,
 *         confirmationResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         confirmationNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         confirmationConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         declinationNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         declinationConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         failureResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         failureNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         failureConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         codeHook?: array{
 *             enableCodeHookInvocation?: bool,
 *             active?: bool,
 *             invocationLabel?: string,
 *             postCodeHookSpecification?: array,
 *             ...,
 *         },
 *         elicitationCodeHook?: array{enableCodeHookInvocation?: bool, invocationLabel?: string, ...},
 *         ...,
 *     },
 *     intentClosingSetting?: array{
 *         closingResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         active?: bool,
 *         nextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         conditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         ...,
 *     },
 *     inputContexts?: list<array{name?: string, ...}>,
 *     outputContexts?: list<array{name?: string, timeToLiveInSeconds?: int, turnsToLive?: int, ...}>,
 *     kendraConfiguration?: array{kendraIndex?: string, queryFilterStringEnabled?: bool, queryFilterString?: string, ...},
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     initialResponseSetting?: array{
 *         initialResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         nextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         conditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         codeHook?: array{
 *             enableCodeHookInvocation?: bool,
 *             active?: bool,
 *             invocationLabel?: string,
 *             postCodeHookSpecification?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     qnAIntentConfiguration?: array{
 *         dataSourceConfiguration?: array{
 *             opensearchConfiguration?: array,
 *             kendraConfiguration?: array,
 *             bedrockKnowledgeStoreConfiguration?: array,
 *             ...,
 *         },
 *         bedrockModelConfiguration?: array{modelArn?: string, guardrail?: array, traceStatus?: 'DISABLED'|'ENABLED', customPrompt?: string, ...},
 *         ...,
 *     },
 *     qInConnectIntentConfiguration?: array{qInConnectAssistantConfiguration?: array{assistantArn?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIntentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIntentAsync(array{
 *     intentId?: string,
 *     intentName?: string,
 *     intentDisplayName?: string,
 *     description?: string,
 *     parentIntentSignature?: string,
 *     sampleUtterances?: list<array{utterance?: string, ...}>,
 *     dialogCodeHook?: array{enabled?: bool, ...},
 *     fulfillmentCodeHook?: array{
 *         enabled?: bool,
 *         postFulfillmentStatusSpecification?: array{
 *             successResponse?: array,
 *             failureResponse?: array,
 *             timeoutResponse?: array,
 *             successNextStep?: array,
 *             successConditional?: array,
 *             failureNextStep?: array,
 *             failureConditional?: array,
 *             timeoutNextStep?: array,
 *             timeoutConditional?: array,
 *             ...,
 *         },
 *         fulfillmentUpdatesSpecification?: array{active?: bool, startResponse?: array, updateResponse?: array, timeoutInSeconds?: int, ...},
 *         active?: bool,
 *         ...,
 *     },
 *     slotPriorities?: list<array{priority?: int, slotId?: string, ...}>,
 *     intentConfirmationSetting?: array{
 *         promptSpecification?: array{
 *             messageGroups?: list<array>,
 *             maxRetries?: int,
 *             allowInterrupt?: bool,
 *             messageSelectionStrategy?: 'Ordered'|'Random',
 *             promptAttemptsSpecification?: array<string, array>,
 *             ...,
 *         },
 *         declinationResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         active?: bool,
 *         confirmationResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         confirmationNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         confirmationConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         declinationNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         declinationConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         failureResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         failureNextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         failureConditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         codeHook?: array{
 *             enableCodeHookInvocation?: bool,
 *             active?: bool,
 *             invocationLabel?: string,
 *             postCodeHookSpecification?: array,
 *             ...,
 *         },
 *         elicitationCodeHook?: array{enableCodeHookInvocation?: bool, invocationLabel?: string, ...},
 *         ...,
 *     },
 *     intentClosingSetting?: array{
 *         closingResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         active?: bool,
 *         nextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         conditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         ...,
 *     },
 *     inputContexts?: list<array{name?: string, ...}>,
 *     outputContexts?: list<array{name?: string, timeToLiveInSeconds?: int, turnsToLive?: int, ...}>,
 *     kendraConfiguration?: array{kendraIndex?: string, queryFilterStringEnabled?: bool, queryFilterString?: string, ...},
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     initialResponseSetting?: array{
 *         initialResponse?: array{messageGroups?: list<array>, allowInterrupt?: bool, ...},
 *         nextStep?: array{dialogAction?: array, intent?: array, sessionAttributes?: array<string, string>, ...},
 *         conditional?: array{active?: bool, conditionalBranches?: list<array>, defaultBranch?: array, ...},
 *         codeHook?: array{
 *             enableCodeHookInvocation?: bool,
 *             active?: bool,
 *             invocationLabel?: string,
 *             postCodeHookSpecification?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     qnAIntentConfiguration?: array{
 *         dataSourceConfiguration?: array{
 *             opensearchConfiguration?: array,
 *             kendraConfiguration?: array,
 *             bedrockKnowledgeStoreConfiguration?: array,
 *             ...,
 *         },
 *         bedrockModelConfiguration?: array{modelArn?: string, guardrail?: array, traceStatus?: 'DISABLED'|'ENABLED', customPrompt?: string, ...},
 *         ...,
 *     },
 *     qInConnectIntentConfiguration?: array{qInConnectAssistantConfiguration?: array{assistantArn?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result updateResourcePolicy(array{resourceArn?: string, policy?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourcePolicyAsync(array{resourceArn?: string, policy?: string, expectedRevisionId?: string, ...} $args = [])
 * @method \Aws\Result updateSlot(array $args = [])
 * @phpstan-method \Aws\Result updateSlot(array{
 *     slotId?: string,
 *     slotName?: string,
 *     description?: string,
 *     slotTypeId?: string,
 *     valueElicitationSetting?: array{
 *         defaultValueSpecification?: array{defaultValueList?: list<array>, ...},
 *         slotConstraint?: 'Optional'|'Required',
 *         promptSpecification?: array{
 *             messageGroups?: list<array>,
 *             maxRetries?: int,
 *             allowInterrupt?: bool,
 *             messageSelectionStrategy?: 'Ordered'|'Random',
 *             promptAttemptsSpecification?: array<string, array>,
 *             ...,
 *         },
 *         sampleUtterances?: list<array>,
 *         waitAndContinueSpecification?: array{waitingResponse?: array, continueResponse?: array, stillWaitingResponse?: array, active?: bool, ...},
 *         slotCaptureSetting?: array{
 *             captureResponse?: array,
 *             captureNextStep?: array,
 *             captureConditional?: array,
 *             failureResponse?: array,
 *             failureNextStep?: array,
 *             failureConditional?: array,
 *             codeHook?: array,
 *             elicitationCodeHook?: array,
 *             ...,
 *         },
 *         slotResolutionSetting?: array{slotResolutionStrategy?: 'Default'|'EnhancedFallback', ...},
 *         ...,
 *     },
 *     obfuscationSetting?: array{obfuscationSettingType?: 'DefaultObfuscation'|'None', ...},
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     intentId?: string,
 *     multipleValuesSetting?: array{allowMultipleValues?: bool, ...},
 *     subSlotSetting?: array{expression?: string, slotSpecifications?: array<string, array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSlotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSlotAsync(array{
 *     slotId?: string,
 *     slotName?: string,
 *     description?: string,
 *     slotTypeId?: string,
 *     valueElicitationSetting?: array{
 *         defaultValueSpecification?: array{defaultValueList?: list<array>, ...},
 *         slotConstraint?: 'Optional'|'Required',
 *         promptSpecification?: array{
 *             messageGroups?: list<array>,
 *             maxRetries?: int,
 *             allowInterrupt?: bool,
 *             messageSelectionStrategy?: 'Ordered'|'Random',
 *             promptAttemptsSpecification?: array<string, array>,
 *             ...,
 *         },
 *         sampleUtterances?: list<array>,
 *         waitAndContinueSpecification?: array{waitingResponse?: array, continueResponse?: array, stillWaitingResponse?: array, active?: bool, ...},
 *         slotCaptureSetting?: array{
 *             captureResponse?: array,
 *             captureNextStep?: array,
 *             captureConditional?: array,
 *             failureResponse?: array,
 *             failureNextStep?: array,
 *             failureConditional?: array,
 *             codeHook?: array,
 *             elicitationCodeHook?: array,
 *             ...,
 *         },
 *         slotResolutionSetting?: array{slotResolutionStrategy?: 'Default'|'EnhancedFallback', ...},
 *         ...,
 *     },
 *     obfuscationSetting?: array{obfuscationSettingType?: 'DefaultObfuscation'|'None', ...},
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     intentId?: string,
 *     multipleValuesSetting?: array{allowMultipleValues?: bool, ...},
 *     subSlotSetting?: array{expression?: string, slotSpecifications?: array<string, array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSlotType(array $args = [])
 * @phpstan-method \Aws\Result updateSlotType(array{
 *     slotTypeId?: string,
 *     slotTypeName?: string,
 *     description?: string,
 *     slotTypeValues?: list<array{sampleValue?: array, synonyms?: list<array>, ...}>,
 *     valueSelectionSetting?: array{
 *         resolutionStrategy?: 'Concatenation'|'OriginalValue'|'TopResolution',
 *         regexFilter?: array{pattern?: string, ...},
 *         advancedRecognitionSetting?: array{audioRecognitionStrategy?: 'UseSlotValuesAsCustomVocabulary', ...},
 *         ...,
 *     },
 *     parentSlotTypeSignature?: string,
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     externalSourceSetting?: array{grammarSlotTypeSetting?: array{source?: array, ...}, ...},
 *     compositeSlotTypeSetting?: array{subSlots?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSlotTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSlotTypeAsync(array{
 *     slotTypeId?: string,
 *     slotTypeName?: string,
 *     description?: string,
 *     slotTypeValues?: list<array{sampleValue?: array, synonyms?: list<array>, ...}>,
 *     valueSelectionSetting?: array{
 *         resolutionStrategy?: 'Concatenation'|'OriginalValue'|'TopResolution',
 *         regexFilter?: array{pattern?: string, ...},
 *         advancedRecognitionSetting?: array{audioRecognitionStrategy?: 'UseSlotValuesAsCustomVocabulary', ...},
 *         ...,
 *     },
 *     parentSlotTypeSignature?: string,
 *     botId?: string,
 *     botVersion?: string,
 *     localeId?: string,
 *     externalSourceSetting?: array{grammarSlotTypeSetting?: array{source?: array, ...}, ...},
 *     compositeSlotTypeSetting?: array{subSlots?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTestSet(array $args = [])
 * @phpstan-method \Aws\Result updateTestSet(array{testSetId?: string, testSetName?: string, description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTestSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTestSetAsync(array{testSetId?: string, testSetName?: string, description?: string, ...} $args = [])
 */
class LexModelsV2Client extends AwsClient {}
