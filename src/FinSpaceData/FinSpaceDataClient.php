<?php
namespace Aws\FinSpaceData;

use Aws\AwsClient;
use Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **FinSpace Public API** service.
 * @method \Aws\Result associateUserToPermissionGroup(array $args = [])
 * @phpstan-method \Aws\Result associateUserToPermissionGroup(array{permissionGroupId?: string, userId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateUserToPermissionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateUserToPermissionGroupAsync(array{permissionGroupId?: string, userId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createChangeset(array $args = [])
 * @phpstan-method \Aws\Result createChangeset(array{
 *     clientToken?: string,
 *     datasetId?: string,
 *     changeType?: 'APPEND'|'MODIFY'|'REPLACE',
 *     sourceParams?: array<string, string>,
 *     formatParams?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createChangesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChangesetAsync(array{
 *     clientToken?: string,
 *     datasetId?: string,
 *     changeType?: 'APPEND'|'MODIFY'|'REPLACE',
 *     sourceParams?: array<string, string>,
 *     formatParams?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataView(array $args = [])
 * @phpstan-method \Aws\Result createDataView(array{
 *     clientToken?: string,
 *     datasetId?: string,
 *     autoUpdate?: bool,
 *     sortColumns?: list<string>,
 *     partitionColumns?: list<string>,
 *     asOfTimestamp?: int,
 *     destinationTypeParams?: array{
 *         destinationType?: string,
 *         s3DestinationExportFileFormat?: 'DELIMITED_TEXT'|'PARQUET',
 *         s3DestinationExportFileFormatOptions?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataViewAsync(array{
 *     clientToken?: string,
 *     datasetId?: string,
 *     autoUpdate?: bool,
 *     sortColumns?: list<string>,
 *     partitionColumns?: list<string>,
 *     asOfTimestamp?: int,
 *     destinationTypeParams?: array{
 *         destinationType?: string,
 *         s3DestinationExportFileFormat?: 'DELIMITED_TEXT'|'PARQUET',
 *         s3DestinationExportFileFormatOptions?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataset(array $args = [])
 * @phpstan-method \Aws\Result createDataset(array{
 *     clientToken?: string,
 *     datasetTitle?: string,
 *     kind?: 'NON_TABULAR'|'TABULAR',
 *     datasetDescription?: string,
 *     ownerInfo?: array{name?: string, phoneNumber?: string, email?: string, ...},
 *     permissionGroupParams?: array{permissionGroupId?: string, datasetPermissions?: list<array>, ...},
 *     alias?: string,
 *     schemaDefinition?: array{tabularSchemaConfig?: array{columns?: list<array>, primaryKeyColumns?: list<string>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDatasetAsync(array{
 *     clientToken?: string,
 *     datasetTitle?: string,
 *     kind?: 'NON_TABULAR'|'TABULAR',
 *     datasetDescription?: string,
 *     ownerInfo?: array{name?: string, phoneNumber?: string, email?: string, ...},
 *     permissionGroupParams?: array{permissionGroupId?: string, datasetPermissions?: list<array>, ...},
 *     alias?: string,
 *     schemaDefinition?: array{tabularSchemaConfig?: array{columns?: list<array>, primaryKeyColumns?: list<string>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPermissionGroup(array $args = [])
 * @phpstan-method \Aws\Result createPermissionGroup(array{
 *     name?: string,
 *     description?: string,
 *     applicationPermissions?: list<'AccessNotebooks'|'CreateDataset'|'GetTemporaryCredentials'|'ManageAttributeSets'|'ManageClusters'|'ManageUsersAndGroups'|'ViewAuditData'>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPermissionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPermissionGroupAsync(array{
 *     name?: string,
 *     description?: string,
 *     applicationPermissions?: list<'AccessNotebooks'|'CreateDataset'|'GetTemporaryCredentials'|'ManageAttributeSets'|'ManageClusters'|'ManageUsersAndGroups'|'ViewAuditData'>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @phpstan-method \Aws\Result createUser(array{
 *     emailAddress?: string,
 *     type?: 'APP_USER'|'SUPER_USER',
 *     firstName?: string,
 *     lastName?: string,
 *     apiAccess?: 'DISABLED'|'ENABLED',
 *     apiAccessPrincipalArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserAsync(array{
 *     emailAddress?: string,
 *     type?: 'APP_USER'|'SUPER_USER',
 *     firstName?: string,
 *     lastName?: string,
 *     apiAccess?: 'DISABLED'|'ENABLED',
 *     apiAccessPrincipalArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @phpstan-method \Aws\Result deleteDataset(array{clientToken?: string, datasetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array{clientToken?: string, datasetId?: string, ...} $args = [])
 * @method \Aws\Result deletePermissionGroup(array $args = [])
 * @phpstan-method \Aws\Result deletePermissionGroup(array{permissionGroupId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePermissionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePermissionGroupAsync(array{permissionGroupId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result disableUser(array $args = [])
 * @phpstan-method \Aws\Result disableUser(array{userId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableUserAsync(array{userId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result disassociateUserFromPermissionGroup(array $args = [])
 * @phpstan-method \Aws\Result disassociateUserFromPermissionGroup(array{permissionGroupId?: string, userId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateUserFromPermissionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateUserFromPermissionGroupAsync(array{permissionGroupId?: string, userId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result enableUser(array $args = [])
 * @phpstan-method \Aws\Result enableUser(array{userId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableUserAsync(array{userId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getChangeset(array $args = [])
 * @phpstan-method \Aws\Result getChangeset(array{datasetId?: string, changesetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChangesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChangesetAsync(array{datasetId?: string, changesetId?: string, ...} $args = [])
 * @method \Aws\Result getDataView(array $args = [])
 * @phpstan-method \Aws\Result getDataView(array{dataViewId?: string, datasetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataViewAsync(array{dataViewId?: string, datasetId?: string, ...} $args = [])
 * @method \Aws\Result getDataset(array $args = [])
 * @phpstan-method \Aws\Result getDataset(array{datasetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDatasetAsync(array{datasetId?: string, ...} $args = [])
 * @method \Aws\Result getExternalDataViewAccessDetails(array $args = [])
 * @phpstan-method \Aws\Result getExternalDataViewAccessDetails(array{dataViewId?: string, datasetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExternalDataViewAccessDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExternalDataViewAccessDetailsAsync(array{dataViewId?: string, datasetId?: string, ...} $args = [])
 * @method \Aws\Result getPermissionGroup(array $args = [])
 * @phpstan-method \Aws\Result getPermissionGroup(array{permissionGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPermissionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPermissionGroupAsync(array{permissionGroupId?: string, ...} $args = [])
 * @method \Aws\Result getProgrammaticAccessCredentials(array $args = [])
 * @phpstan-method \Aws\Result getProgrammaticAccessCredentials(array{durationInMinutes?: int, environmentId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProgrammaticAccessCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProgrammaticAccessCredentialsAsync(array{durationInMinutes?: int, environmentId?: string, ...} $args = [])
 * @method \Aws\Result getUser(array $args = [])
 * @phpstan-method \Aws\Result getUser(array{userId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserAsync(array{userId?: string, ...} $args = [])
 * @method \Aws\Result getWorkingLocation(array $args = [])
 * @phpstan-method \Aws\Result getWorkingLocation(array{locationType?: 'INGESTION'|'SAGEMAKER', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkingLocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkingLocationAsync(array{locationType?: 'INGESTION'|'SAGEMAKER', ...} $args = [])
 * @method \Aws\Result listChangesets(array $args = [])
 * @phpstan-method \Aws\Result listChangesets(array{datasetId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listChangesetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChangesetsAsync(array{datasetId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDataViews(array $args = [])
 * @phpstan-method \Aws\Result listDataViews(array{datasetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataViewsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataViewsAsync(array{datasetId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @phpstan-method \Aws\Result listDatasets(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasetsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPermissionGroups(array $args = [])
 * @phpstan-method \Aws\Result listPermissionGroups(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPermissionGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPermissionGroupsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listPermissionGroupsByUser(array $args = [])
 * @phpstan-method \Aws\Result listPermissionGroupsByUser(array{userId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPermissionGroupsByUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPermissionGroupsByUserAsync(array{userId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @phpstan-method \Aws\Result listUsers(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listUsersByPermissionGroup(array $args = [])
 * @phpstan-method \Aws\Result listUsersByPermissionGroup(array{permissionGroupId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersByPermissionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUsersByPermissionGroupAsync(array{permissionGroupId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result resetUserPassword(array $args = [])
 * @phpstan-method \Aws\Result resetUserPassword(array{userId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetUserPasswordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetUserPasswordAsync(array{userId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateChangeset(array $args = [])
 * @phpstan-method \Aws\Result updateChangeset(array{
 *     clientToken?: string,
 *     datasetId?: string,
 *     changesetId?: string,
 *     sourceParams?: array<string, string>,
 *     formatParams?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChangesetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateChangesetAsync(array{
 *     clientToken?: string,
 *     datasetId?: string,
 *     changesetId?: string,
 *     sourceParams?: array<string, string>,
 *     formatParams?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataset(array $args = [])
 * @phpstan-method \Aws\Result updateDataset(array{
 *     clientToken?: string,
 *     datasetId?: string,
 *     datasetTitle?: string,
 *     kind?: 'NON_TABULAR'|'TABULAR',
 *     datasetDescription?: string,
 *     alias?: string,
 *     schemaDefinition?: array{tabularSchemaConfig?: array{columns?: list<array>, primaryKeyColumns?: list<string>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDatasetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDatasetAsync(array{
 *     clientToken?: string,
 *     datasetId?: string,
 *     datasetTitle?: string,
 *     kind?: 'NON_TABULAR'|'TABULAR',
 *     datasetDescription?: string,
 *     alias?: string,
 *     schemaDefinition?: array{tabularSchemaConfig?: array{columns?: list<array>, primaryKeyColumns?: list<string>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePermissionGroup(array $args = [])
 * @phpstan-method \Aws\Result updatePermissionGroup(array{
 *     permissionGroupId?: string,
 *     name?: string,
 *     description?: string,
 *     applicationPermissions?: list<'AccessNotebooks'|'CreateDataset'|'GetTemporaryCredentials'|'ManageAttributeSets'|'ManageClusters'|'ManageUsersAndGroups'|'ViewAuditData'>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePermissionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePermissionGroupAsync(array{
 *     permissionGroupId?: string,
 *     name?: string,
 *     description?: string,
 *     applicationPermissions?: list<'AccessNotebooks'|'CreateDataset'|'GetTemporaryCredentials'|'ManageAttributeSets'|'ManageClusters'|'ManageUsersAndGroups'|'ViewAuditData'>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @phpstan-method \Aws\Result updateUser(array{
 *     userId?: string,
 *     type?: 'APP_USER'|'SUPER_USER',
 *     firstName?: string,
 *     lastName?: string,
 *     apiAccess?: 'DISABLED'|'ENABLED',
 *     apiAccessPrincipalArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserAsync(array{
 *     userId?: string,
 *     type?: 'APP_USER'|'SUPER_USER',
 *     firstName?: string,
 *     lastName?: string,
 *     apiAccess?: 'DISABLED'|'ENABLED',
 *     apiAccessPrincipalArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 */
class FinSpaceDataClient extends AwsClient {}
