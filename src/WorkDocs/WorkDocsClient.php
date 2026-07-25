<?php
namespace Aws\WorkDocs;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon WorkDocs** service.
 * @method \Aws\Result abortDocumentVersionUpload(array $args = [])
 * @phpstan-method \Aws\Result abortDocumentVersionUpload(array{AuthenticationToken?: string, DocumentId?: string, VersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise abortDocumentVersionUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise abortDocumentVersionUploadAsync(array{AuthenticationToken?: string, DocumentId?: string, VersionId?: string, ...} $args = [])
 * @method \Aws\Result activateUser(array $args = [])
 * @phpstan-method \Aws\Result activateUser(array{UserId?: string, AuthenticationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise activateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise activateUserAsync(array{UserId?: string, AuthenticationToken?: string, ...} $args = [])
 * @method \Aws\Result addResourcePermissions(array $args = [])
 * @phpstan-method \Aws\Result addResourcePermissions(array{
 *     AuthenticationToken?: string,
 *     ResourceId?: string,
 *     Principals?: list<array{
 *         Id?: string,
 *         Type?: 'ANONYMOUS'|'GROUP'|'INVITE'|'ORGANIZATION'|'USER',
 *         Role?: 'CONTRIBUTOR'|'COOWNER'|'OWNER'|'VIEWER',
 *         ...,
 *     }>,
 *     NotificationOptions?: array{SendEmail?: bool, EmailMessage?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addResourcePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addResourcePermissionsAsync(array{
 *     AuthenticationToken?: string,
 *     ResourceId?: string,
 *     Principals?: list<array{
 *         Id?: string,
 *         Type?: 'ANONYMOUS'|'GROUP'|'INVITE'|'ORGANIZATION'|'USER',
 *         Role?: 'CONTRIBUTOR'|'COOWNER'|'OWNER'|'VIEWER',
 *         ...,
 *     }>,
 *     NotificationOptions?: array{SendEmail?: bool, EmailMessage?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createComment(array $args = [])
 * @phpstan-method \Aws\Result createComment(array{
 *     AuthenticationToken?: string,
 *     DocumentId?: string,
 *     VersionId?: string,
 *     ParentId?: string,
 *     ThreadId?: string,
 *     Text?: string,
 *     Visibility?: 'PRIVATE'|'PUBLIC',
 *     NotifyCollaborators?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCommentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCommentAsync(array{
 *     AuthenticationToken?: string,
 *     DocumentId?: string,
 *     VersionId?: string,
 *     ParentId?: string,
 *     ThreadId?: string,
 *     Text?: string,
 *     Visibility?: 'PRIVATE'|'PUBLIC',
 *     NotifyCollaborators?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomMetadata(array $args = [])
 * @phpstan-method \Aws\Result createCustomMetadata(array{
 *     AuthenticationToken?: string,
 *     ResourceId?: string,
 *     VersionId?: string,
 *     CustomMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomMetadataAsync(array{
 *     AuthenticationToken?: string,
 *     ResourceId?: string,
 *     VersionId?: string,
 *     CustomMetadata?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFolder(array $args = [])
 * @phpstan-method \Aws\Result createFolder(array{AuthenticationToken?: string, Name?: string, ParentFolderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFolderAsync(array{AuthenticationToken?: string, Name?: string, ParentFolderId?: string, ...} $args = [])
 * @method \Aws\Result createLabels(array $args = [])
 * @phpstan-method \Aws\Result createLabels(array{ResourceId?: string, Labels?: list<string>, AuthenticationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLabelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLabelsAsync(array{ResourceId?: string, Labels?: list<string>, AuthenticationToken?: string, ...} $args = [])
 * @method \Aws\Result createNotificationSubscription(array $args = [])
 * @phpstan-method \Aws\Result createNotificationSubscription(array{OrganizationId?: string, Endpoint?: string, Protocol?: 'HTTPS'|'SQS', SubscriptionType?: 'ALL', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotificationSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotificationSubscriptionAsync(array{OrganizationId?: string, Endpoint?: string, Protocol?: 'HTTPS'|'SQS', SubscriptionType?: 'ALL', ...} $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     OrganizationId?: string,
 *     Username?: string,
 *     EmailAddress?: string,
 *     GivenName?: string,
 *     Surname?: string,
 *     Password?: string,
 *     TimeZoneId?: string,
 *     StorageRule?: array{StorageAllocatedInBytes?: int, StorageType?: 'QUOTA'|'UNLIMITED', ...},
 *     AuthenticationToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     OrganizationId?: string,
 *     Username?: string,
 *     EmailAddress?: string,
 *     GivenName?: string,
 *     Surname?: string,
 *     Password?: string,
 *     TimeZoneId?: string,
 *     StorageRule?: array{StorageAllocatedInBytes?: int, StorageType?: 'QUOTA'|'UNLIMITED', ...},
 *     AuthenticationToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deactivateUser(array $args = [])
 * @phpstan-method \Aws\Result deactivateUser(array{UserId?: string, AuthenticationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deactivateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deactivateUserAsync(array{UserId?: string, AuthenticationToken?: string, ...} $args = [])
 * @method \Aws\Result deleteComment(array $args = [])
 * @phpstan-method \Aws\Result deleteComment(array{AuthenticationToken?: string, DocumentId?: string, VersionId?: string, CommentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCommentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCommentAsync(array{AuthenticationToken?: string, DocumentId?: string, VersionId?: string, CommentId?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomMetadata(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomMetadata(array{
 *     AuthenticationToken?: string,
 *     ResourceId?: string,
 *     VersionId?: string,
 *     Keys?: list<string>,
 *     DeleteAll?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomMetadataAsync(array{
 *     AuthenticationToken?: string,
 *     ResourceId?: string,
 *     VersionId?: string,
 *     Keys?: list<string>,
 *     DeleteAll?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDocument(array $args = [])
 * @phpstan-method \Aws\Result deleteDocument(array{AuthenticationToken?: string, DocumentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDocumentAsync(array{AuthenticationToken?: string, DocumentId?: string, ...} $args = [])
 * @method \Aws\Result deleteDocumentVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteDocumentVersion(array{AuthenticationToken?: string, DocumentId?: string, VersionId?: string, DeletePriorVersions?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDocumentVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDocumentVersionAsync(array{AuthenticationToken?: string, DocumentId?: string, VersionId?: string, DeletePriorVersions?: bool, ...} $args = [])
 * @method \Aws\Result deleteFolder(array $args = [])
 * @phpstan-method \Aws\Result deleteFolder(array{AuthenticationToken?: string, FolderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFolderAsync(array{AuthenticationToken?: string, FolderId?: string, ...} $args = [])
 * @method \Aws\Result deleteFolderContents(array $args = [])
 * @phpstan-method \Aws\Result deleteFolderContents(array{AuthenticationToken?: string, FolderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFolderContentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFolderContentsAsync(array{AuthenticationToken?: string, FolderId?: string, ...} $args = [])
 * @method \Aws\Result deleteLabels(array $args = [])
 * @phpstan-method \Aws\Result deleteLabels(array{ResourceId?: string, AuthenticationToken?: string, Labels?: list<string>, DeleteAll?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLabelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLabelsAsync(array{ResourceId?: string, AuthenticationToken?: string, Labels?: list<string>, DeleteAll?: bool, ...} $args = [])
 * @method \Aws\Result deleteNotificationSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteNotificationSubscription(array{SubscriptionId?: string, OrganizationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotificationSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotificationSubscriptionAsync(array{SubscriptionId?: string, OrganizationId?: string, ...} $args = [])
 * @method \Aws\Result deleteUser(array $args = [])
 * @phpstan-method \Aws\Result deleteUser(array{AuthenticationToken?: string, UserId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteUserAsync(array{AuthenticationToken?: string, UserId?: string, ...} $args = [])
 * @method \Aws\Result describeActivities(array $args = [])
 * @phpstan-method \Aws\Result describeActivities(array{
 *     AuthenticationToken?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     OrganizationId?: string,
 *     ActivityTypes?: string,
 *     ResourceId?: string,
 *     UserId?: string,
 *     IncludeIndirectActivities?: bool,
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeActivitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeActivitiesAsync(array{
 *     AuthenticationToken?: string,
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     OrganizationId?: string,
 *     ActivityTypes?: string,
 *     ResourceId?: string,
 *     UserId?: string,
 *     IncludeIndirectActivities?: bool,
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeComments(array $args = [])
 * @phpstan-method \Aws\Result describeComments(array{
 *     AuthenticationToken?: string,
 *     DocumentId?: string,
 *     VersionId?: string,
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCommentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCommentsAsync(array{
 *     AuthenticationToken?: string,
 *     DocumentId?: string,
 *     VersionId?: string,
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDocumentVersions(array $args = [])
 * @phpstan-method \Aws\Result describeDocumentVersions(array{
 *     AuthenticationToken?: string,
 *     DocumentId?: string,
 *     Marker?: string,
 *     Limit?: int,
 *     Include?: string,
 *     Fields?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDocumentVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDocumentVersionsAsync(array{
 *     AuthenticationToken?: string,
 *     DocumentId?: string,
 *     Marker?: string,
 *     Limit?: int,
 *     Include?: string,
 *     Fields?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeFolderContents(array $args = [])
 * @phpstan-method \Aws\Result describeFolderContents(array{
 *     AuthenticationToken?: string,
 *     FolderId?: string,
 *     Sort?: 'DATE'|'NAME',
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     Limit?: int,
 *     Marker?: string,
 *     Type?: 'ALL'|'DOCUMENT'|'FOLDER',
 *     Include?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFolderContentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFolderContentsAsync(array{
 *     AuthenticationToken?: string,
 *     FolderId?: string,
 *     Sort?: 'DATE'|'NAME',
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     Limit?: int,
 *     Marker?: string,
 *     Type?: 'ALL'|'DOCUMENT'|'FOLDER',
 *     Include?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeGroups(array $args = [])
 * @phpstan-method \Aws\Result describeGroups(array{
 *     AuthenticationToken?: string,
 *     SearchQuery?: string,
 *     OrganizationId?: string,
 *     Marker?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGroupsAsync(array{
 *     AuthenticationToken?: string,
 *     SearchQuery?: string,
 *     OrganizationId?: string,
 *     Marker?: string,
 *     Limit?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeNotificationSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result describeNotificationSubscriptions(array{OrganizationId?: string, Marker?: string, Limit?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNotificationSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNotificationSubscriptionsAsync(array{OrganizationId?: string, Marker?: string, Limit?: int, ...} $args = [])
 * @method \Aws\Result describeResourcePermissions(array $args = [])
 * @phpstan-method \Aws\Result describeResourcePermissions(array{
 *     AuthenticationToken?: string,
 *     ResourceId?: string,
 *     PrincipalId?: string,
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourcePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourcePermissionsAsync(array{
 *     AuthenticationToken?: string,
 *     ResourceId?: string,
 *     PrincipalId?: string,
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRootFolders(array $args = [])
 * @phpstan-method \Aws\Result describeRootFolders(array{AuthenticationToken?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRootFoldersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRootFoldersAsync(array{AuthenticationToken?: string, Limit?: int, Marker?: string, ...} $args = [])
 * @method \Aws\Result describeUsers(array $args = [])
 * @phpstan-method \Aws\Result describeUsers(array{
 *     AuthenticationToken?: string,
 *     OrganizationId?: string,
 *     UserIds?: string,
 *     Query?: string,
 *     Include?: 'ACTIVE_PENDING'|'ALL',
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     Sort?: 'FULL_NAME'|'STORAGE_LIMIT'|'STORAGE_USED'|'USER_NAME'|'USER_STATUS',
 *     Marker?: string,
 *     Limit?: int,
 *     Fields?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUsersAsync(array{
 *     AuthenticationToken?: string,
 *     OrganizationId?: string,
 *     UserIds?: string,
 *     Query?: string,
 *     Include?: 'ACTIVE_PENDING'|'ALL',
 *     Order?: 'ASCENDING'|'DESCENDING',
 *     Sort?: 'FULL_NAME'|'STORAGE_LIMIT'|'STORAGE_USED'|'USER_NAME'|'USER_STATUS',
 *     Marker?: string,
 *     Limit?: int,
 *     Fields?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCurrentUser(array $args = [])
 * @phpstan-method \Aws\Result getCurrentUser(array{AuthenticationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCurrentUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCurrentUserAsync(array{AuthenticationToken?: string, ...} $args = [])
 * @method \Aws\Result getDocument(array $args = [])
 * @phpstan-method \Aws\Result getDocument(array{AuthenticationToken?: string, DocumentId?: string, IncludeCustomMetadata?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentAsync(array{AuthenticationToken?: string, DocumentId?: string, IncludeCustomMetadata?: bool, ...} $args = [])
 * @method \Aws\Result getDocumentPath(array $args = [])
 * @phpstan-method \Aws\Result getDocumentPath(array{AuthenticationToken?: string, DocumentId?: string, Limit?: int, Fields?: string, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentPathAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentPathAsync(array{AuthenticationToken?: string, DocumentId?: string, Limit?: int, Fields?: string, Marker?: string, ...} $args = [])
 * @method \Aws\Result getDocumentVersion(array $args = [])
 * @phpstan-method \Aws\Result getDocumentVersion(array{
 *     AuthenticationToken?: string,
 *     DocumentId?: string,
 *     VersionId?: string,
 *     Fields?: string,
 *     IncludeCustomMetadata?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentVersionAsync(array{
 *     AuthenticationToken?: string,
 *     DocumentId?: string,
 *     VersionId?: string,
 *     Fields?: string,
 *     IncludeCustomMetadata?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFolder(array $args = [])
 * @phpstan-method \Aws\Result getFolder(array{AuthenticationToken?: string, FolderId?: string, IncludeCustomMetadata?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFolderAsync(array{AuthenticationToken?: string, FolderId?: string, IncludeCustomMetadata?: bool, ...} $args = [])
 * @method \Aws\Result getFolderPath(array $args = [])
 * @phpstan-method \Aws\Result getFolderPath(array{AuthenticationToken?: string, FolderId?: string, Limit?: int, Fields?: string, Marker?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFolderPathAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFolderPathAsync(array{AuthenticationToken?: string, FolderId?: string, Limit?: int, Fields?: string, Marker?: string, ...} $args = [])
 * @method \Aws\Result getResources(array $args = [])
 * @phpstan-method \Aws\Result getResources(array{
 *     AuthenticationToken?: string,
 *     UserId?: string,
 *     CollectionType?: 'SHARED_WITH_ME',
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcesAsync(array{
 *     AuthenticationToken?: string,
 *     UserId?: string,
 *     CollectionType?: 'SHARED_WITH_ME',
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result initiateDocumentVersionUpload(array $args = [])
 * @phpstan-method \Aws\Result initiateDocumentVersionUpload(array{
 *     AuthenticationToken?: string,
 *     Id?: string,
 *     Name?: string,
 *     ContentCreatedTimestamp?: int|string|\DateTimeInterface,
 *     ContentModifiedTimestamp?: int|string|\DateTimeInterface,
 *     ContentType?: string,
 *     DocumentSizeInBytes?: int,
 *     ParentFolderId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise initiateDocumentVersionUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initiateDocumentVersionUploadAsync(array{
 *     AuthenticationToken?: string,
 *     Id?: string,
 *     Name?: string,
 *     ContentCreatedTimestamp?: int|string|\DateTimeInterface,
 *     ContentModifiedTimestamp?: int|string|\DateTimeInterface,
 *     ContentType?: string,
 *     DocumentSizeInBytes?: int,
 *     ParentFolderId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeAllResourcePermissions(array $args = [])
 * @phpstan-method \Aws\Result removeAllResourcePermissions(array{AuthenticationToken?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeAllResourcePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeAllResourcePermissionsAsync(array{AuthenticationToken?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result removeResourcePermission(array $args = [])
 * @phpstan-method \Aws\Result removeResourcePermission(array{
 *     AuthenticationToken?: string,
 *     ResourceId?: string,
 *     PrincipalId?: string,
 *     PrincipalType?: 'ANONYMOUS'|'GROUP'|'INVITE'|'ORGANIZATION'|'USER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removeResourcePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeResourcePermissionAsync(array{
 *     AuthenticationToken?: string,
 *     ResourceId?: string,
 *     PrincipalId?: string,
 *     PrincipalType?: 'ANONYMOUS'|'GROUP'|'INVITE'|'ORGANIZATION'|'USER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result restoreDocumentVersions(array $args = [])
 * @phpstan-method \Aws\Result restoreDocumentVersions(array{AuthenticationToken?: string, DocumentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restoreDocumentVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreDocumentVersionsAsync(array{AuthenticationToken?: string, DocumentId?: string, ...} $args = [])
 * @method \Aws\Result searchResources(array $args = [])
 * @phpstan-method \Aws\Result searchResources(array{
 *     AuthenticationToken?: string,
 *     QueryText?: string,
 *     QueryScopes?: list<'CONTENT'|'NAME'>,
 *     OrganizationId?: string,
 *     AdditionalResponseFields?: list<'WEBURL'>,
 *     Filters?: array{
 *         TextLocales?: list<'AR'|'BG'|'BN'|'CS'|'DA'|'DE'|'DEFAULT'|'EL'|'EN'|'ES'|'FA'|'FI'|'FR'|'HI'|'HU'|'ID'|'IT'|'JA'|'KO'|'LT'|'LV'|'NL'|'NO'|'PT'|'RO'|'RU'|'SV'|'SW'|'TH'|'TR'|'ZH'>,
 *         ContentCategories?: list<'AUDIO'|'DOCUMENT'|'IMAGE'|'OTHER'|'PDF'|'PRESENTATION'|'SOURCE_CODE'|'SPREADSHEET'|'VIDEO'>,
 *         ResourceTypes?: list<'COMMENT'|'DOCUMENT'|'DOCUMENT_VERSION'|'FOLDER'>,
 *         Labels?: list<string>,
 *         Principals?: list<array>,
 *         AncestorIds?: list<string>,
 *         SearchCollectionTypes?: list<'OWNED'|'SHARED_WITH_ME'>,
 *         SizeRange?: array{StartValue?: int, EndValue?: int, ...},
 *         CreatedRange?: array{StartValue?: int|string|\DateTimeInterface, EndValue?: int|string|\DateTimeInterface, ...},
 *         ModifiedRange?: array{StartValue?: int|string|\DateTimeInterface, EndValue?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     OrderBy?: list<array{Field?: 'CREATED_TIMESTAMP'|'MODIFIED_TIMESTAMP'|'NAME'|'RELEVANCE'|'SIZE', Order?: 'ASC'|'DESC', ...}>,
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchResourcesAsync(array{
 *     AuthenticationToken?: string,
 *     QueryText?: string,
 *     QueryScopes?: list<'CONTENT'|'NAME'>,
 *     OrganizationId?: string,
 *     AdditionalResponseFields?: list<'WEBURL'>,
 *     Filters?: array{
 *         TextLocales?: list<'AR'|'BG'|'BN'|'CS'|'DA'|'DE'|'DEFAULT'|'EL'|'EN'|'ES'|'FA'|'FI'|'FR'|'HI'|'HU'|'ID'|'IT'|'JA'|'KO'|'LT'|'LV'|'NL'|'NO'|'PT'|'RO'|'RU'|'SV'|'SW'|'TH'|'TR'|'ZH'>,
 *         ContentCategories?: list<'AUDIO'|'DOCUMENT'|'IMAGE'|'OTHER'|'PDF'|'PRESENTATION'|'SOURCE_CODE'|'SPREADSHEET'|'VIDEO'>,
 *         ResourceTypes?: list<'COMMENT'|'DOCUMENT'|'DOCUMENT_VERSION'|'FOLDER'>,
 *         Labels?: list<string>,
 *         Principals?: list<array>,
 *         AncestorIds?: list<string>,
 *         SearchCollectionTypes?: list<'OWNED'|'SHARED_WITH_ME'>,
 *         SizeRange?: array{StartValue?: int, EndValue?: int, ...},
 *         CreatedRange?: array{StartValue?: int|string|\DateTimeInterface, EndValue?: int|string|\DateTimeInterface, ...},
 *         ModifiedRange?: array{StartValue?: int|string|\DateTimeInterface, EndValue?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     OrderBy?: list<array{Field?: 'CREATED_TIMESTAMP'|'MODIFIED_TIMESTAMP'|'NAME'|'RELEVANCE'|'SIZE', Order?: 'ASC'|'DESC', ...}>,
 *     Limit?: int,
 *     Marker?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDocument(array $args = [])
 * @phpstan-method \Aws\Result updateDocument(array{
 *     AuthenticationToken?: string,
 *     DocumentId?: string,
 *     Name?: string,
 *     ParentFolderId?: string,
 *     ResourceState?: 'ACTIVE'|'RECYCLED'|'RECYCLING'|'RESTORING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDocumentAsync(array{
 *     AuthenticationToken?: string,
 *     DocumentId?: string,
 *     Name?: string,
 *     ParentFolderId?: string,
 *     ResourceState?: 'ACTIVE'|'RECYCLED'|'RECYCLING'|'RESTORING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDocumentVersion(array $args = [])
 * @phpstan-method \Aws\Result updateDocumentVersion(array{AuthenticationToken?: string, DocumentId?: string, VersionId?: string, VersionStatus?: 'ACTIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDocumentVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDocumentVersionAsync(array{AuthenticationToken?: string, DocumentId?: string, VersionId?: string, VersionStatus?: 'ACTIVE', ...} $args = [])
 * @method \Aws\Result updateFolder(array $args = [])
 * @phpstan-method \Aws\Result updateFolder(array{
 *     AuthenticationToken?: string,
 *     FolderId?: string,
 *     Name?: string,
 *     ParentFolderId?: string,
 *     ResourceState?: 'ACTIVE'|'RECYCLED'|'RECYCLING'|'RESTORING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFolderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFolderAsync(array{
 *     AuthenticationToken?: string,
 *     FolderId?: string,
 *     Name?: string,
 *     ParentFolderId?: string,
 *     ResourceState?: 'ACTIVE'|'RECYCLED'|'RECYCLING'|'RESTORING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     AuthenticationToken?: string,
 *     UserId?: string,
 *     GivenName?: string,
 *     Surname?: string,
 *     Type?: 'ADMIN'|'MINIMALUSER'|'POWERUSER'|'USER'|'WORKSPACESUSER',
 *     StorageRule?: array{StorageAllocatedInBytes?: int, StorageType?: 'QUOTA'|'UNLIMITED', ...},
 *     TimeZoneId?: string,
 *     Locale?: 'de'|'default'|'en'|'es'|'fr'|'ja'|'ko'|'pt_BR'|'ru'|'zh_CN'|'zh_TW',
 *     GrantPoweruserPrivileges?: 'FALSE'|'TRUE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     AuthenticationToken?: string,
 *     UserId?: string,
 *     GivenName?: string,
 *     Surname?: string,
 *     Type?: 'ADMIN'|'MINIMALUSER'|'POWERUSER'|'USER'|'WORKSPACESUSER',
 *     StorageRule?: array{StorageAllocatedInBytes?: int, StorageType?: 'QUOTA'|'UNLIMITED', ...},
 *     TimeZoneId?: string,
 *     Locale?: 'de'|'default'|'en'|'es'|'fr'|'ja'|'ko'|'pt_BR'|'ru'|'zh_CN'|'zh_TW',
 *     GrantPoweruserPrivileges?: 'FALSE'|'TRUE',
 *     ...,
 * } $args = [])
 */
class WorkDocsClient extends AwsClient {}
