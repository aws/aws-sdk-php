<?php
namespace Aws\LexModelBuildingService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Lex Model Building Service** service.
 * @method \Aws\Result createBotVersion(array $args = [])
 * @phpstan-method \Aws\Result createBotVersion(array{name?: string, checksum?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBotVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBotVersionAsync(array{name?: string, checksum?: string, ...} $args = [])
 * @method \Aws\Result createIntentVersion(array $args = [])
 * @phpstan-method \Aws\Result createIntentVersion(array{name?: string, checksum?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createIntentVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIntentVersionAsync(array{name?: string, checksum?: string, ...} $args = [])
 * @method \Aws\Result createSlotTypeVersion(array $args = [])
 * @phpstan-method \Aws\Result createSlotTypeVersion(array{name?: string, checksum?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSlotTypeVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSlotTypeVersionAsync(array{name?: string, checksum?: string, ...} $args = [])
 * @method \Aws\Result deleteBot(array $args = [])
 * @phpstan-method \Aws\Result deleteBot(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBotAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteBotAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteBotAlias(array{name?: string, botName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBotAliasAsync(array{name?: string, botName?: string, ...} $args = [])
 * @method \Aws\Result deleteBotChannelAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteBotChannelAssociation(array{name?: string, botName?: string, botAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotChannelAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBotChannelAssociationAsync(array{name?: string, botName?: string, botAlias?: string, ...} $args = [])
 * @method \Aws\Result deleteBotVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteBotVersion(array{name?: string, version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBotVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBotVersionAsync(array{name?: string, version?: string, ...} $args = [])
 * @method \Aws\Result deleteIntent(array $args = [])
 * @phpstan-method \Aws\Result deleteIntent(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntentAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteIntentVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteIntentVersion(array{name?: string, version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIntentVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIntentVersionAsync(array{name?: string, version?: string, ...} $args = [])
 * @method \Aws\Result deleteSlotType(array $args = [])
 * @phpstan-method \Aws\Result deleteSlotType(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSlotTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSlotTypeAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteSlotTypeVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteSlotTypeVersion(array{name?: string, version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSlotTypeVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSlotTypeVersionAsync(array{name?: string, version?: string, ...} $args = [])
 * @method \Aws\Result deleteUtterances(array $args = [])
 * @phpstan-method \Aws\Result deleteUtterances(array{botName?: string, userId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUtterancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUtterancesAsync(array{botName?: string, userId?: string, ...} $args = [])
 * @method \Aws\Result getBot(array $args = [])
 * @phpstan-method \Aws\Result getBot(array{name?: string, versionOrAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBotAsync(array{name?: string, versionOrAlias?: string, ...} $args = [])
 * @method \Aws\Result getBotAlias(array $args = [])
 * @phpstan-method \Aws\Result getBotAlias(array{name?: string, botName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBotAliasAsync(array{name?: string, botName?: string, ...} $args = [])
 * @method \Aws\Result getBotAliases(array $args = [])
 * @phpstan-method \Aws\Result getBotAliases(array{botName?: string, nextToken?: string, maxResults?: int, nameContains?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBotAliasesAsync(array{botName?: string, nextToken?: string, maxResults?: int, nameContains?: string, ...} $args = [])
 * @method \Aws\Result getBotChannelAssociation(array $args = [])
 * @phpstan-method \Aws\Result getBotChannelAssociation(array{name?: string, botName?: string, botAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotChannelAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBotChannelAssociationAsync(array{name?: string, botName?: string, botAlias?: string, ...} $args = [])
 * @method \Aws\Result getBotChannelAssociations(array $args = [])
 * @phpstan-method \Aws\Result getBotChannelAssociations(array{botName?: string, botAlias?: string, nextToken?: string, maxResults?: int, nameContains?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotChannelAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBotChannelAssociationsAsync(array{botName?: string, botAlias?: string, nextToken?: string, maxResults?: int, nameContains?: string, ...} $args = [])
 * @method \Aws\Result getBotVersions(array $args = [])
 * @phpstan-method \Aws\Result getBotVersions(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBotVersionsAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getBots(array $args = [])
 * @phpstan-method \Aws\Result getBots(array{nextToken?: string, maxResults?: int, nameContains?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBotsAsync(array{nextToken?: string, maxResults?: int, nameContains?: string, ...} $args = [])
 * @method \Aws\Result getBuiltinIntent(array $args = [])
 * @phpstan-method \Aws\Result getBuiltinIntent(array{signature?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBuiltinIntentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBuiltinIntentAsync(array{signature?: string, ...} $args = [])
 * @method \Aws\Result getBuiltinIntents(array $args = [])
 * @phpstan-method \Aws\Result getBuiltinIntents(array{
 *     locale?: 'de-DE'|'en-AU'|'en-GB'|'en-IN'|'en-US'|'es-419'|'es-ES'|'es-US'|'fr-CA'|'fr-FR'|'it-IT'|'ja-JP'|'ko-KR',
 *     signatureContains?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getBuiltinIntentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBuiltinIntentsAsync(array{
 *     locale?: 'de-DE'|'en-AU'|'en-GB'|'en-IN'|'en-US'|'es-419'|'es-ES'|'es-US'|'fr-CA'|'fr-FR'|'it-IT'|'ja-JP'|'ko-KR',
 *     signatureContains?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getBuiltinSlotTypes(array $args = [])
 * @phpstan-method \Aws\Result getBuiltinSlotTypes(array{
 *     locale?: 'de-DE'|'en-AU'|'en-GB'|'en-IN'|'en-US'|'es-419'|'es-ES'|'es-US'|'fr-CA'|'fr-FR'|'it-IT'|'ja-JP'|'ko-KR',
 *     signatureContains?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getBuiltinSlotTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBuiltinSlotTypesAsync(array{
 *     locale?: 'de-DE'|'en-AU'|'en-GB'|'en-IN'|'en-US'|'es-419'|'es-ES'|'es-US'|'fr-CA'|'fr-FR'|'it-IT'|'ja-JP'|'ko-KR',
 *     signatureContains?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getExport(array $args = [])
 * @phpstan-method \Aws\Result getExport(array{
 *     name?: string,
 *     version?: string,
 *     resourceType?: 'BOT'|'INTENT'|'SLOT_TYPE',
 *     exportType?: 'ALEXA_SKILLS_KIT'|'LEX',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExportAsync(array{
 *     name?: string,
 *     version?: string,
 *     resourceType?: 'BOT'|'INTENT'|'SLOT_TYPE',
 *     exportType?: 'ALEXA_SKILLS_KIT'|'LEX',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getImport(array $args = [])
 * @phpstan-method \Aws\Result getImport(array{importId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getImportAsync(array{importId?: string, ...} $args = [])
 * @method \Aws\Result getIntent(array $args = [])
 * @phpstan-method \Aws\Result getIntent(array{name?: string, version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntentAsync(array{name?: string, version?: string, ...} $args = [])
 * @method \Aws\Result getIntentVersions(array $args = [])
 * @phpstan-method \Aws\Result getIntentVersions(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntentVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntentVersionsAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getIntents(array $args = [])
 * @phpstan-method \Aws\Result getIntents(array{nextToken?: string, maxResults?: int, nameContains?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIntentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIntentsAsync(array{nextToken?: string, maxResults?: int, nameContains?: string, ...} $args = [])
 * @method \Aws\Result getMigration(array $args = [])
 * @phpstan-method \Aws\Result getMigration(array{migrationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMigrationAsync(array{migrationId?: string, ...} $args = [])
 * @method \Aws\Result getMigrations(array $args = [])
 * @phpstan-method \Aws\Result getMigrations(array{
 *     sortByAttribute?: 'MIGRATION_DATE_TIME'|'V1_BOT_NAME',
 *     sortByOrder?: 'ASCENDING'|'DESCENDING',
 *     v1BotNameContains?: string,
 *     migrationStatusEquals?: 'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMigrationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMigrationsAsync(array{
 *     sortByAttribute?: 'MIGRATION_DATE_TIME'|'V1_BOT_NAME',
 *     sortByOrder?: 'ASCENDING'|'DESCENDING',
 *     v1BotNameContains?: string,
 *     migrationStatusEquals?: 'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSlotType(array $args = [])
 * @phpstan-method \Aws\Result getSlotType(array{name?: string, version?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSlotTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSlotTypeAsync(array{name?: string, version?: string, ...} $args = [])
 * @method \Aws\Result getSlotTypeVersions(array $args = [])
 * @phpstan-method \Aws\Result getSlotTypeVersions(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSlotTypeVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSlotTypeVersionsAsync(array{name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result getSlotTypes(array $args = [])
 * @phpstan-method \Aws\Result getSlotTypes(array{nextToken?: string, maxResults?: int, nameContains?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSlotTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSlotTypesAsync(array{nextToken?: string, maxResults?: int, nameContains?: string, ...} $args = [])
 * @method \Aws\Result getUtterancesView(array $args = [])
 * @phpstan-method \Aws\Result getUtterancesView(array{botName?: string, botVersions?: list<string>, statusType?: 'Detected'|'Missed', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUtterancesViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUtterancesViewAsync(array{botName?: string, botVersions?: list<string>, statusType?: 'Detected'|'Missed', ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putBot(array $args = [])
 * @phpstan-method \Aws\Result putBot(array{
 *     name?: string,
 *     description?: string,
 *     intents?: list<array{intentName?: string, intentVersion?: string, ...}>,
 *     enableModelImprovements?: bool,
 *     nluIntentConfidenceThreshold?: float,
 *     clarificationPrompt?: array{messages?: list<array>, maxAttempts?: int, responseCard?: string, ...},
 *     abortStatement?: array{messages?: list<array>, responseCard?: string, ...},
 *     idleSessionTTLInSeconds?: int,
 *     voiceId?: string,
 *     checksum?: string,
 *     processBehavior?: 'BUILD'|'SAVE',
 *     locale?: 'de-DE'|'en-AU'|'en-GB'|'en-IN'|'en-US'|'es-419'|'es-ES'|'es-US'|'fr-CA'|'fr-FR'|'it-IT'|'ja-JP'|'ko-KR',
 *     childDirected?: bool,
 *     detectSentiment?: bool,
 *     createVersion?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBotAsync(array{
 *     name?: string,
 *     description?: string,
 *     intents?: list<array{intentName?: string, intentVersion?: string, ...}>,
 *     enableModelImprovements?: bool,
 *     nluIntentConfidenceThreshold?: float,
 *     clarificationPrompt?: array{messages?: list<array>, maxAttempts?: int, responseCard?: string, ...},
 *     abortStatement?: array{messages?: list<array>, responseCard?: string, ...},
 *     idleSessionTTLInSeconds?: int,
 *     voiceId?: string,
 *     checksum?: string,
 *     processBehavior?: 'BUILD'|'SAVE',
 *     locale?: 'de-DE'|'en-AU'|'en-GB'|'en-IN'|'en-US'|'es-419'|'es-ES'|'es-US'|'fr-CA'|'fr-FR'|'it-IT'|'ja-JP'|'ko-KR',
 *     childDirected?: bool,
 *     detectSentiment?: bool,
 *     createVersion?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putBotAlias(array $args = [])
 * @phpstan-method \Aws\Result putBotAlias(array{
 *     name?: string,
 *     description?: string,
 *     botVersion?: string,
 *     botName?: string,
 *     checksum?: string,
 *     conversationLogs?: array{logSettings?: list<array>, iamRoleArn?: string, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBotAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBotAliasAsync(array{
 *     name?: string,
 *     description?: string,
 *     botVersion?: string,
 *     botName?: string,
 *     checksum?: string,
 *     conversationLogs?: array{logSettings?: list<array>, iamRoleArn?: string, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putIntent(array $args = [])
 * @phpstan-method \Aws\Result putIntent(array{
 *     name?: string,
 *     description?: string,
 *     slots?: list<array{
 *         name?: string,
 *         description?: string,
 *         slotConstraint?: 'Optional'|'Required',
 *         slotType?: string,
 *         slotTypeVersion?: string,
 *         valueElicitationPrompt?: array,
 *         priority?: int,
 *         sampleUtterances?: list<string>,
 *         responseCard?: string,
 *         obfuscationSetting?: 'DEFAULT_OBFUSCATION'|'NONE',
 *         defaultValueSpec?: array,
 *         ...,
 *     }>,
 *     sampleUtterances?: list<string>,
 *     confirmationPrompt?: array{messages?: list<array>, maxAttempts?: int, responseCard?: string, ...},
 *     rejectionStatement?: array{messages?: list<array>, responseCard?: string, ...},
 *     followUpPrompt?: array{
 *         prompt?: array{messages?: list<array>, maxAttempts?: int, responseCard?: string, ...},
 *         rejectionStatement?: array{messages?: list<array>, responseCard?: string, ...},
 *         ...,
 *     },
 *     conclusionStatement?: array{messages?: list<array>, responseCard?: string, ...},
 *     dialogCodeHook?: array{uri?: string, messageVersion?: string, ...},
 *     fulfillmentActivity?: array{type?: 'CodeHook'|'ReturnIntent', codeHook?: array{uri?: string, messageVersion?: string, ...}, ...},
 *     parentIntentSignature?: string,
 *     checksum?: string,
 *     createVersion?: bool,
 *     kendraConfiguration?: array{kendraIndex?: string, queryFilterString?: string, role?: string, ...},
 *     inputContexts?: list<array{name?: string, ...}>,
 *     outputContexts?: list<array{name?: string, timeToLiveInSeconds?: int, turnsToLive?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putIntentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putIntentAsync(array{
 *     name?: string,
 *     description?: string,
 *     slots?: list<array{
 *         name?: string,
 *         description?: string,
 *         slotConstraint?: 'Optional'|'Required',
 *         slotType?: string,
 *         slotTypeVersion?: string,
 *         valueElicitationPrompt?: array,
 *         priority?: int,
 *         sampleUtterances?: list<string>,
 *         responseCard?: string,
 *         obfuscationSetting?: 'DEFAULT_OBFUSCATION'|'NONE',
 *         defaultValueSpec?: array,
 *         ...,
 *     }>,
 *     sampleUtterances?: list<string>,
 *     confirmationPrompt?: array{messages?: list<array>, maxAttempts?: int, responseCard?: string, ...},
 *     rejectionStatement?: array{messages?: list<array>, responseCard?: string, ...},
 *     followUpPrompt?: array{
 *         prompt?: array{messages?: list<array>, maxAttempts?: int, responseCard?: string, ...},
 *         rejectionStatement?: array{messages?: list<array>, responseCard?: string, ...},
 *         ...,
 *     },
 *     conclusionStatement?: array{messages?: list<array>, responseCard?: string, ...},
 *     dialogCodeHook?: array{uri?: string, messageVersion?: string, ...},
 *     fulfillmentActivity?: array{type?: 'CodeHook'|'ReturnIntent', codeHook?: array{uri?: string, messageVersion?: string, ...}, ...},
 *     parentIntentSignature?: string,
 *     checksum?: string,
 *     createVersion?: bool,
 *     kendraConfiguration?: array{kendraIndex?: string, queryFilterString?: string, role?: string, ...},
 *     inputContexts?: list<array{name?: string, ...}>,
 *     outputContexts?: list<array{name?: string, timeToLiveInSeconds?: int, turnsToLive?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putSlotType(array $args = [])
 * @phpstan-method \Aws\Result putSlotType(array{
 *     name?: string,
 *     description?: string,
 *     enumerationValues?: list<array{value?: string, synonyms?: list<string>, ...}>,
 *     checksum?: string,
 *     valueSelectionStrategy?: 'ORIGINAL_VALUE'|'TOP_RESOLUTION',
 *     createVersion?: bool,
 *     parentSlotTypeSignature?: string,
 *     slotTypeConfigurations?: list<array{regexConfiguration?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSlotTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSlotTypeAsync(array{
 *     name?: string,
 *     description?: string,
 *     enumerationValues?: list<array{value?: string, synonyms?: list<string>, ...}>,
 *     checksum?: string,
 *     valueSelectionStrategy?: 'ORIGINAL_VALUE'|'TOP_RESOLUTION',
 *     createVersion?: bool,
 *     parentSlotTypeSignature?: string,
 *     slotTypeConfigurations?: list<array{regexConfiguration?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startImport(array $args = [])
 * @phpstan-method \Aws\Result startImport(array{
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     resourceType?: 'BOT'|'INTENT'|'SLOT_TYPE',
 *     mergeStrategy?: 'FAIL_ON_CONFLICT'|'OVERWRITE_LATEST',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startImportAsync(array{
 *     payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *     resourceType?: 'BOT'|'INTENT'|'SLOT_TYPE',
 *     mergeStrategy?: 'FAIL_ON_CONFLICT'|'OVERWRITE_LATEST',
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMigration(array $args = [])
 * @phpstan-method \Aws\Result startMigration(array{
 *     v1BotName?: string,
 *     v1BotVersion?: string,
 *     v2BotName?: string,
 *     v2BotRole?: string,
 *     migrationStrategy?: 'CREATE_NEW'|'UPDATE_EXISTING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMigrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMigrationAsync(array{
 *     v1BotName?: string,
 *     v1BotVersion?: string,
 *     v2BotName?: string,
 *     v2BotRole?: string,
 *     migrationStrategy?: 'CREATE_NEW'|'UPDATE_EXISTING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 */
class LexModelBuildingServiceClient extends AwsClient {}
