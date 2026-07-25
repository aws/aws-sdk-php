<?php
namespace Aws\QApps;

use Aws\AwsClient;

/**
 * This client is used to interact with the **QApps** service.
 * @method \Aws\Result associateLibraryItemReview(array $args = [])
 * @phpstan-method \Aws\Result associateLibraryItemReview(array{instanceId?: string, libraryItemId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateLibraryItemReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateLibraryItemReviewAsync(array{instanceId?: string, libraryItemId?: string, ...} $args = [])
 * @method \Aws\Result associateQAppWithUser(array $args = [])
 * @phpstan-method \Aws\Result associateQAppWithUser(array{instanceId?: string, appId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateQAppWithUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateQAppWithUserAsync(array{instanceId?: string, appId?: string, ...} $args = [])
 * @method \Aws\Result batchCreateCategory(array $args = [])
 * @phpstan-method \Aws\Result batchCreateCategory(array{instanceId?: string, categories?: list<array{id?: string, title?: string, color?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateCategoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateCategoryAsync(array{instanceId?: string, categories?: list<array{id?: string, title?: string, color?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchDeleteCategory(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteCategory(array{instanceId?: string, categories?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeleteCategoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteCategoryAsync(array{instanceId?: string, categories?: list<string>, ...} $args = [])
 * @method \Aws\Result batchUpdateCategory(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateCategory(array{instanceId?: string, categories?: list<array{id?: string, title?: string, color?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateCategoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateCategoryAsync(array{instanceId?: string, categories?: list<array{id?: string, title?: string, color?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createLibraryItem(array $args = [])
 * @phpstan-method \Aws\Result createLibraryItem(array{instanceId?: string, appId?: string, appVersion?: int, categories?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLibraryItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLibraryItemAsync(array{instanceId?: string, appId?: string, appVersion?: int, categories?: list<string>, ...} $args = [])
 * @method \Aws\Result createPresignedUrl(array $args = [])
 * @phpstan-method \Aws\Result createPresignedUrl(array{
 *     instanceId?: string,
 *     cardId?: string,
 *     appId?: string,
 *     fileContentsSha256?: string,
 *     fileName?: string,
 *     scope?: 'APPLICATION'|'SESSION',
 *     sessionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPresignedUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPresignedUrlAsync(array{
 *     instanceId?: string,
 *     cardId?: string,
 *     appId?: string,
 *     fileContentsSha256?: string,
 *     fileName?: string,
 *     scope?: 'APPLICATION'|'SESSION',
 *     sessionId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createQApp(array $args = [])
 * @phpstan-method \Aws\Result createQApp(array{
 *     instanceId?: string,
 *     title?: string,
 *     description?: string,
 *     appDefinition?: array{cards?: list<array>, initialPrompt?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQAppAsync(array{
 *     instanceId?: string,
 *     title?: string,
 *     description?: string,
 *     appDefinition?: array{cards?: list<array>, initialPrompt?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteLibraryItem(array $args = [])
 * @phpstan-method \Aws\Result deleteLibraryItem(array{instanceId?: string, libraryItemId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLibraryItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLibraryItemAsync(array{instanceId?: string, libraryItemId?: string, ...} $args = [])
 * @method \Aws\Result deleteQApp(array $args = [])
 * @phpstan-method \Aws\Result deleteQApp(array{instanceId?: string, appId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQAppAsync(array{instanceId?: string, appId?: string, ...} $args = [])
 * @method \Aws\Result describeQAppPermissions(array $args = [])
 * @phpstan-method \Aws\Result describeQAppPermissions(array{instanceId?: string, appId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQAppPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQAppPermissionsAsync(array{instanceId?: string, appId?: string, ...} $args = [])
 * @method \Aws\Result disassociateLibraryItemReview(array $args = [])
 * @phpstan-method \Aws\Result disassociateLibraryItemReview(array{instanceId?: string, libraryItemId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateLibraryItemReviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateLibraryItemReviewAsync(array{instanceId?: string, libraryItemId?: string, ...} $args = [])
 * @method \Aws\Result disassociateQAppFromUser(array $args = [])
 * @phpstan-method \Aws\Result disassociateQAppFromUser(array{instanceId?: string, appId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateQAppFromUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateQAppFromUserAsync(array{instanceId?: string, appId?: string, ...} $args = [])
 * @method \Aws\Result exportQAppSessionData(array $args = [])
 * @phpstan-method \Aws\Result exportQAppSessionData(array{instanceId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportQAppSessionDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportQAppSessionDataAsync(array{instanceId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result getLibraryItem(array $args = [])
 * @phpstan-method \Aws\Result getLibraryItem(array{instanceId?: string, libraryItemId?: string, appId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLibraryItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLibraryItemAsync(array{instanceId?: string, libraryItemId?: string, appId?: string, ...} $args = [])
 * @method \Aws\Result getQApp(array $args = [])
 * @phpstan-method \Aws\Result getQApp(array{instanceId?: string, appId?: string, appVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQAppAsync(array{instanceId?: string, appId?: string, appVersion?: int, ...} $args = [])
 * @method \Aws\Result getQAppSession(array $args = [])
 * @phpstan-method \Aws\Result getQAppSession(array{instanceId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQAppSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQAppSessionAsync(array{instanceId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result getQAppSessionMetadata(array $args = [])
 * @phpstan-method \Aws\Result getQAppSessionMetadata(array{instanceId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQAppSessionMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQAppSessionMetadataAsync(array{instanceId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result importDocument(array $args = [])
 * @phpstan-method \Aws\Result importDocument(array{
 *     instanceId?: string,
 *     cardId?: string,
 *     appId?: string,
 *     fileContentsBase64?: string,
 *     fileName?: string,
 *     scope?: 'APPLICATION'|'SESSION',
 *     sessionId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importDocumentAsync(array{
 *     instanceId?: string,
 *     cardId?: string,
 *     appId?: string,
 *     fileContentsBase64?: string,
 *     fileName?: string,
 *     scope?: 'APPLICATION'|'SESSION',
 *     sessionId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCategories(array $args = [])
 * @phpstan-method \Aws\Result listCategories(array{instanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCategoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCategoriesAsync(array{instanceId?: string, ...} $args = [])
 * @method \Aws\Result listLibraryItems(array $args = [])
 * @phpstan-method \Aws\Result listLibraryItems(array{instanceId?: string, limit?: int, nextToken?: string, categoryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLibraryItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLibraryItemsAsync(array{instanceId?: string, limit?: int, nextToken?: string, categoryId?: string, ...} $args = [])
 * @method \Aws\Result listQAppSessionData(array $args = [])
 * @phpstan-method \Aws\Result listQAppSessionData(array{instanceId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQAppSessionDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQAppSessionDataAsync(array{instanceId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result listQApps(array $args = [])
 * @phpstan-method \Aws\Result listQApps(array{instanceId?: string, limit?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listQAppsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQAppsAsync(array{instanceId?: string, limit?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceARN?: string, ...} $args = [])
 * @method \Aws\Result predictQApp(array $args = [])
 * @phpstan-method \Aws\Result predictQApp(array{instanceId?: string, options?: array{conversation?: list<array>, problemStatement?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise predictQAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise predictQAppAsync(array{instanceId?: string, options?: array{conversation?: list<array>, problemStatement?: string, ...}, ...} $args = [])
 * @method \Aws\Result startQAppSession(array $args = [])
 * @phpstan-method \Aws\Result startQAppSession(array{
 *     instanceId?: string,
 *     appId?: string,
 *     appVersion?: int,
 *     initialValues?: list<array{cardId?: string, value?: string, submissionMutation?: array, ...}>,
 *     sessionId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startQAppSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQAppSessionAsync(array{
 *     instanceId?: string,
 *     appId?: string,
 *     appVersion?: int,
 *     initialValues?: list<array{cardId?: string, value?: string, submissionMutation?: array, ...}>,
 *     sessionId?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopQAppSession(array $args = [])
 * @phpstan-method \Aws\Result stopQAppSession(array{instanceId?: string, sessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopQAppSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopQAppSessionAsync(array{instanceId?: string, sessionId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceARN?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceARN?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateLibraryItem(array $args = [])
 * @phpstan-method \Aws\Result updateLibraryItem(array{
 *     instanceId?: string,
 *     libraryItemId?: string,
 *     status?: 'DISABLED'|'PUBLISHED',
 *     categories?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLibraryItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLibraryItemAsync(array{
 *     instanceId?: string,
 *     libraryItemId?: string,
 *     status?: 'DISABLED'|'PUBLISHED',
 *     categories?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLibraryItemMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateLibraryItemMetadata(array{instanceId?: string, libraryItemId?: string, isVerified?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLibraryItemMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLibraryItemMetadataAsync(array{instanceId?: string, libraryItemId?: string, isVerified?: bool, ...} $args = [])
 * @method \Aws\Result updateQApp(array $args = [])
 * @phpstan-method \Aws\Result updateQApp(array{
 *     instanceId?: string,
 *     appId?: string,
 *     title?: string,
 *     description?: string,
 *     appDefinition?: array{cards?: list<array>, initialPrompt?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQAppAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQAppAsync(array{
 *     instanceId?: string,
 *     appId?: string,
 *     title?: string,
 *     description?: string,
 *     appDefinition?: array{cards?: list<array>, initialPrompt?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQAppPermissions(array $args = [])
 * @phpstan-method \Aws\Result updateQAppPermissions(array{
 *     instanceId?: string,
 *     appId?: string,
 *     grantPermissions?: list<array{action?: 'read'|'write', principal?: string, ...}>,
 *     revokePermissions?: list<array{action?: 'read'|'write', principal?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQAppPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQAppPermissionsAsync(array{
 *     instanceId?: string,
 *     appId?: string,
 *     grantPermissions?: list<array{action?: 'read'|'write', principal?: string, ...}>,
 *     revokePermissions?: list<array{action?: 'read'|'write', principal?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQAppSession(array $args = [])
 * @phpstan-method \Aws\Result updateQAppSession(array{
 *     instanceId?: string,
 *     sessionId?: string,
 *     values?: list<array{cardId?: string, value?: string, submissionMutation?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQAppSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQAppSessionAsync(array{
 *     instanceId?: string,
 *     sessionId?: string,
 *     values?: list<array{cardId?: string, value?: string, submissionMutation?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateQAppSessionMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateQAppSessionMetadata(array{
 *     instanceId?: string,
 *     sessionId?: string,
 *     sessionName?: string,
 *     sharingConfiguration?: array{enabled?: bool, acceptResponses?: bool, revealCards?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQAppSessionMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQAppSessionMetadataAsync(array{
 *     instanceId?: string,
 *     sessionId?: string,
 *     sessionName?: string,
 *     sharingConfiguration?: array{enabled?: bool, acceptResponses?: bool, revealCards?: bool, ...},
 *     ...,
 * } $args = [])
 */
class QAppsClient extends AwsClient {}
