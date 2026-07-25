<?php
namespace Aws\LakeFormation;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Lake Formation** service.
 * @method \Aws\Result addLFTagsToResource(array $args = [])
 * @phpstan-method \Aws\Result addLFTagsToResource(array{
 *     CatalogId?: string,
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     LFTags?: list<array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addLFTagsToResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addLFTagsToResourceAsync(array{
 *     CatalogId?: string,
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     LFTags?: list<array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result assumeDecoratedRoleWithSAML(array $args = [])
 * @phpstan-method \Aws\Result assumeDecoratedRoleWithSAML(array{SAMLAssertion?: string, RoleArn?: string, PrincipalArn?: string, DurationSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise assumeDecoratedRoleWithSAMLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeDecoratedRoleWithSAMLAsync(array{SAMLAssertion?: string, RoleArn?: string, PrincipalArn?: string, DurationSeconds?: int, ...} $args = [])
 * @method \Aws\Result batchGrantPermissions(array $args = [])
 * @phpstan-method \Aws\Result batchGrantPermissions(array{
 *     CatalogId?: string,
 *     Entries?: list<array{
 *         Id?: string,
 *         Principal?: array,
 *         Resource?: array,
 *         Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *         Condition?: array,
 *         PermissionsWithGrantOption?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGrantPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGrantPermissionsAsync(array{
 *     CatalogId?: string,
 *     Entries?: list<array{
 *         Id?: string,
 *         Principal?: array,
 *         Resource?: array,
 *         Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *         Condition?: array,
 *         PermissionsWithGrantOption?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchRevokePermissions(array $args = [])
 * @phpstan-method \Aws\Result batchRevokePermissions(array{
 *     CatalogId?: string,
 *     Entries?: list<array{
 *         Id?: string,
 *         Principal?: array,
 *         Resource?: array,
 *         Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *         Condition?: array,
 *         PermissionsWithGrantOption?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchRevokePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchRevokePermissionsAsync(array{
 *     CatalogId?: string,
 *     Entries?: list<array{
 *         Id?: string,
 *         Principal?: array,
 *         Resource?: array,
 *         Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *         Condition?: array,
 *         PermissionsWithGrantOption?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelTransaction(array $args = [])
 * @phpstan-method \Aws\Result cancelTransaction(array{TransactionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelTransactionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelTransactionAsync(array{TransactionId?: string, ...} $args = [])
 * @method \Aws\Result commitTransaction(array $args = [])
 * @phpstan-method \Aws\Result commitTransaction(array{TransactionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise commitTransactionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise commitTransactionAsync(array{TransactionId?: string, ...} $args = [])
 * @method \Aws\Result createDataCellsFilter(array $args = [])
 * @phpstan-method \Aws\Result createDataCellsFilter(array{
 *     TableData?: array{
 *         TableCatalogId?: string,
 *         DatabaseName?: string,
 *         TableName?: string,
 *         Name?: string,
 *         RowFilter?: array{FilterExpression?: string, AllRowsWildcard?: array, ...},
 *         ColumnNames?: list<string>,
 *         ColumnWildcard?: array{ExcludedColumnNames?: list<string>, ...},
 *         VersionId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataCellsFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataCellsFilterAsync(array{
 *     TableData?: array{
 *         TableCatalogId?: string,
 *         DatabaseName?: string,
 *         TableName?: string,
 *         Name?: string,
 *         RowFilter?: array{FilterExpression?: string, AllRowsWildcard?: array, ...},
 *         ColumnNames?: list<string>,
 *         ColumnWildcard?: array{ExcludedColumnNames?: list<string>, ...},
 *         VersionId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLFTag(array $args = [])
 * @phpstan-method \Aws\Result createLFTag(array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLFTagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLFTagAsync(array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...} $args = [])
 * @method \Aws\Result createLFTagExpression(array $args = [])
 * @phpstan-method \Aws\Result createLFTagExpression(array{
 *     Name?: string,
 *     Description?: string,
 *     CatalogId?: string,
 *     Expression?: list<array{TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLFTagExpressionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLFTagExpressionAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     CatalogId?: string,
 *     Expression?: list<array{TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLakeFormationIdentityCenterConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createLakeFormationIdentityCenterConfiguration(array{
 *     CatalogId?: string,
 *     InstanceArn?: string,
 *     ExternalFiltering?: array{Status?: 'DISABLED'|'ENABLED', AuthorizedTargets?: list<string>, ...},
 *     ShareRecipients?: list<array{DataLakePrincipalIdentifier?: string, ...}>,
 *     ServiceIntegrations?: list<array{Redshift?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLakeFormationIdentityCenterConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLakeFormationIdentityCenterConfigurationAsync(array{
 *     CatalogId?: string,
 *     InstanceArn?: string,
 *     ExternalFiltering?: array{Status?: 'DISABLED'|'ENABLED', AuthorizedTargets?: list<string>, ...},
 *     ShareRecipients?: list<array{DataLakePrincipalIdentifier?: string, ...}>,
 *     ServiceIntegrations?: list<array{Redshift?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLakeFormationOptIn(array $args = [])
 * @phpstan-method \Aws\Result createLakeFormationOptIn(array{
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     Condition?: array{Expression?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLakeFormationOptInAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLakeFormationOptInAsync(array{
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     Condition?: array{Expression?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDataCellsFilter(array $args = [])
 * @phpstan-method \Aws\Result deleteDataCellsFilter(array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataCellsFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataCellsFilterAsync(array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteLFTag(array $args = [])
 * @phpstan-method \Aws\Result deleteLFTag(array{CatalogId?: string, TagKey?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLFTagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLFTagAsync(array{CatalogId?: string, TagKey?: string, ...} $args = [])
 * @method \Aws\Result deleteLFTagExpression(array $args = [])
 * @phpstan-method \Aws\Result deleteLFTagExpression(array{Name?: string, CatalogId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLFTagExpressionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLFTagExpressionAsync(array{Name?: string, CatalogId?: string, ...} $args = [])
 * @method \Aws\Result deleteLakeFormationIdentityCenterConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteLakeFormationIdentityCenterConfiguration(array{CatalogId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLakeFormationIdentityCenterConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLakeFormationIdentityCenterConfigurationAsync(array{CatalogId?: string, ...} $args = [])
 * @method \Aws\Result deleteLakeFormationOptIn(array $args = [])
 * @phpstan-method \Aws\Result deleteLakeFormationOptIn(array{
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     Condition?: array{Expression?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLakeFormationOptInAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLakeFormationOptInAsync(array{
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     Condition?: array{Expression?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteObjectsOnCancel(array $args = [])
 * @phpstan-method \Aws\Result deleteObjectsOnCancel(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     TransactionId?: string,
 *     Objects?: list<array{Uri?: string, ETag?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteObjectsOnCancelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteObjectsOnCancelAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     TransactionId?: string,
 *     Objects?: list<array{Uri?: string, ETag?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deregisterResource(array $args = [])
 * @phpstan-method \Aws\Result deregisterResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result describeLakeFormationIdentityCenterConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeLakeFormationIdentityCenterConfiguration(array{CatalogId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLakeFormationIdentityCenterConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLakeFormationIdentityCenterConfigurationAsync(array{CatalogId?: string, ...} $args = [])
 * @method \Aws\Result describeResource(array $args = [])
 * @phpstan-method \Aws\Result describeResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result describeTransaction(array $args = [])
 * @phpstan-method \Aws\Result describeTransaction(array{TransactionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTransactionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTransactionAsync(array{TransactionId?: string, ...} $args = [])
 * @method \Aws\Result extendTransaction(array $args = [])
 * @phpstan-method \Aws\Result extendTransaction(array{TransactionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise extendTransactionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise extendTransactionAsync(array{TransactionId?: string, ...} $args = [])
 * @method \Aws\Result getDataCellsFilter(array $args = [])
 * @phpstan-method \Aws\Result getDataCellsFilter(array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataCellsFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataCellsFilterAsync(array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getDataLakePrincipal(array $args = [])
 * @phpstan-method \Aws\Result getDataLakePrincipal(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataLakePrincipalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataLakePrincipalAsync(array{...} $args = [])
 * @method \Aws\Result getDataLakeSettings(array $args = [])
 * @phpstan-method \Aws\Result getDataLakeSettings(array{CatalogId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataLakeSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataLakeSettingsAsync(array{CatalogId?: string, ...} $args = [])
 * @method \Aws\Result getEffectivePermissionsForPath(array $args = [])
 * @phpstan-method \Aws\Result getEffectivePermissionsForPath(array{CatalogId?: string, ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEffectivePermissionsForPathAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEffectivePermissionsForPathAsync(array{CatalogId?: string, ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getLFTag(array $args = [])
 * @phpstan-method \Aws\Result getLFTag(array{CatalogId?: string, TagKey?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLFTagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLFTagAsync(array{CatalogId?: string, TagKey?: string, ...} $args = [])
 * @method \Aws\Result getLFTagExpression(array $args = [])
 * @phpstan-method \Aws\Result getLFTagExpression(array{Name?: string, CatalogId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLFTagExpressionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLFTagExpressionAsync(array{Name?: string, CatalogId?: string, ...} $args = [])
 * @method \Aws\Result getQueryState(array $args = [])
 * @phpstan-method \Aws\Result getQueryState(array{QueryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryStateAsync(array{QueryId?: string, ...} $args = [])
 * @method \Aws\Result getQueryStatistics(array $args = [])
 * @phpstan-method \Aws\Result getQueryStatistics(array{QueryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQueryStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryStatisticsAsync(array{QueryId?: string, ...} $args = [])
 * @method \Aws\Result getResourceLFTags(array $args = [])
 * @phpstan-method \Aws\Result getResourceLFTags(array{
 *     CatalogId?: string,
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     ShowAssignedLFTags?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceLFTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceLFTagsAsync(array{
 *     CatalogId?: string,
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     ShowAssignedLFTags?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTableObjects(array $args = [])
 * @phpstan-method \Aws\Result getTableObjects(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     TransactionId?: string,
 *     QueryAsOfTime?: int|string|\DateTimeInterface,
 *     PartitionPredicate?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTableObjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableObjectsAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     TransactionId?: string,
 *     QueryAsOfTime?: int|string|\DateTimeInterface,
 *     PartitionPredicate?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTemporaryDataLocationCredentials(array $args = [])
 * @phpstan-method \Aws\Result getTemporaryDataLocationCredentials(array{
 *     DurationSeconds?: int,
 *     AuditContext?: array{AdditionalAuditContext?: string, ...},
 *     DataLocations?: list<string>,
 *     CredentialsScope?: 'READ'|'READWRITE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemporaryDataLocationCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemporaryDataLocationCredentialsAsync(array{
 *     DurationSeconds?: int,
 *     AuditContext?: array{AdditionalAuditContext?: string, ...},
 *     DataLocations?: list<string>,
 *     CredentialsScope?: 'READ'|'READWRITE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTemporaryGluePartitionCredentials(array $args = [])
 * @phpstan-method \Aws\Result getTemporaryGluePartitionCredentials(array{
 *     TableArn?: string,
 *     Partition?: array{Values?: list<string>, ...},
 *     Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     DurationSeconds?: int,
 *     AuditContext?: array{AdditionalAuditContext?: string, ...},
 *     SupportedPermissionTypes?: list<'CELL_FILTER_PERMISSION'|'COLUMN_PERMISSION'|'NESTED_CELL_PERMISSION'|'NESTED_PERMISSION'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemporaryGluePartitionCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemporaryGluePartitionCredentialsAsync(array{
 *     TableArn?: string,
 *     Partition?: array{Values?: list<string>, ...},
 *     Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     DurationSeconds?: int,
 *     AuditContext?: array{AdditionalAuditContext?: string, ...},
 *     SupportedPermissionTypes?: list<'CELL_FILTER_PERMISSION'|'COLUMN_PERMISSION'|'NESTED_CELL_PERMISSION'|'NESTED_PERMISSION'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTemporaryGlueTableCredentials(array $args = [])
 * @phpstan-method \Aws\Result getTemporaryGlueTableCredentials(array{
 *     TableArn?: string,
 *     Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     DurationSeconds?: int,
 *     AuditContext?: array{AdditionalAuditContext?: string, ...},
 *     SupportedPermissionTypes?: list<'CELL_FILTER_PERMISSION'|'COLUMN_PERMISSION'|'NESTED_CELL_PERMISSION'|'NESTED_PERMISSION'>,
 *     S3Path?: string,
 *     QuerySessionContext?: array{
 *         QueryId?: string,
 *         QueryStartTime?: int|string|\DateTimeInterface,
 *         ClusterId?: string,
 *         QueryAuthorizationId?: string,
 *         AdditionalContext?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemporaryGlueTableCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemporaryGlueTableCredentialsAsync(array{
 *     TableArn?: string,
 *     Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     DurationSeconds?: int,
 *     AuditContext?: array{AdditionalAuditContext?: string, ...},
 *     SupportedPermissionTypes?: list<'CELL_FILTER_PERMISSION'|'COLUMN_PERMISSION'|'NESTED_CELL_PERMISSION'|'NESTED_PERMISSION'>,
 *     S3Path?: string,
 *     QuerySessionContext?: array{
 *         QueryId?: string,
 *         QueryStartTime?: int|string|\DateTimeInterface,
 *         ClusterId?: string,
 *         QueryAuthorizationId?: string,
 *         AdditionalContext?: array<string, string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getWorkUnitResults(array $args = [])
 * @phpstan-method \Aws\Result getWorkUnitResults(array{QueryId?: string, WorkUnitId?: int, WorkUnitToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkUnitResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkUnitResultsAsync(array{QueryId?: string, WorkUnitId?: int, WorkUnitToken?: string, ...} $args = [])
 * @method \Aws\Result getWorkUnits(array $args = [])
 * @phpstan-method \Aws\Result getWorkUnits(array{NextToken?: string, PageSize?: int, QueryId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWorkUnitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWorkUnitsAsync(array{NextToken?: string, PageSize?: int, QueryId?: string, ...} $args = [])
 * @method \Aws\Result grantPermissions(array $args = [])
 * @phpstan-method \Aws\Result grantPermissions(array{
 *     CatalogId?: string,
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     Condition?: array{Expression?: string, ...},
 *     PermissionsWithGrantOption?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise grantPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise grantPermissionsAsync(array{
 *     CatalogId?: string,
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     Condition?: array{Expression?: string, ...},
 *     PermissionsWithGrantOption?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataCellsFilter(array $args = [])
 * @phpstan-method \Aws\Result listDataCellsFilter(array{
 *     Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataCellsFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataCellsFilterAsync(array{
 *     Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLFTagExpressions(array $args = [])
 * @phpstan-method \Aws\Result listLFTagExpressions(array{CatalogId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLFTagExpressionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLFTagExpressionsAsync(array{CatalogId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listLFTags(array $args = [])
 * @phpstan-method \Aws\Result listLFTags(array{CatalogId?: string, ResourceShareType?: 'ALL'|'FOREIGN', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLFTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLFTagsAsync(array{CatalogId?: string, ResourceShareType?: 'ALL'|'FOREIGN', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listLakeFormationOptIns(array $args = [])
 * @phpstan-method \Aws\Result listLakeFormationOptIns(array{
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLakeFormationOptInsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLakeFormationOptInsAsync(array{
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPermissions(array $args = [])
 * @phpstan-method \Aws\Result listPermissions(array{
 *     CatalogId?: string,
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     ResourceType?: 'CATALOG'|'DATABASE'|'DATA_LOCATION'|'LF_NAMED_TAG_EXPRESSION'|'LF_TAG'|'LF_TAG_POLICY'|'LF_TAG_POLICY_DATABASE'|'LF_TAG_POLICY_TABLE'|'TABLE',
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     IncludeRelated?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPermissionsAsync(array{
 *     CatalogId?: string,
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     ResourceType?: 'CATALOG'|'DATABASE'|'DATA_LOCATION'|'LF_NAMED_TAG_EXPRESSION'|'LF_TAG'|'LF_TAG_POLICY'|'LF_TAG_POLICY_DATABASE'|'LF_TAG_POLICY_TABLE'|'TABLE',
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     IncludeRelated?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResources(array $args = [])
 * @phpstan-method \Aws\Result listResources(array{
 *     FilterConditionList?: list<array{
 *         Field?: 'LAST_MODIFIED'|'RESOURCE_ARN'|'ROLE_ARN',
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS',
 *         StringValueList?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcesAsync(array{
 *     FilterConditionList?: list<array{
 *         Field?: 'LAST_MODIFIED'|'RESOURCE_ARN'|'ROLE_ARN',
 *         ComparisonOperator?: 'BEGINS_WITH'|'BETWEEN'|'CONTAINS'|'EQ'|'GE'|'GT'|'IN'|'LE'|'LT'|'NE'|'NOT_CONTAINS',
 *         StringValueList?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTableStorageOptimizers(array $args = [])
 * @phpstan-method \Aws\Result listTableStorageOptimizers(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     StorageOptimizerType?: 'ALL'|'COMPACTION'|'GARBAGE_COLLECTION',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTableStorageOptimizersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTableStorageOptimizersAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     StorageOptimizerType?: 'ALL'|'COMPACTION'|'GARBAGE_COLLECTION',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTransactions(array $args = [])
 * @phpstan-method \Aws\Result listTransactions(array{
 *     CatalogId?: string,
 *     StatusFilter?: 'ABORTED'|'ACTIVE'|'ALL'|'COMMITTED'|'COMPLETED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTransactionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTransactionsAsync(array{
 *     CatalogId?: string,
 *     StatusFilter?: 'ABORTED'|'ACTIVE'|'ALL'|'COMMITTED'|'COMPLETED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDataLakeSettings(array $args = [])
 * @phpstan-method \Aws\Result putDataLakeSettings(array{
 *     CatalogId?: string,
 *     DataLakeSettings?: array{
 *         DataLakeAdmins?: list<array>,
 *         ReadOnlyAdmins?: list<array>,
 *         CreateDatabaseDefaultPermissions?: list<array>,
 *         CreateTableDefaultPermissions?: list<array>,
 *         Parameters?: array<string, string>,
 *         TrustedResourceOwners?: list<string>,
 *         AllowExternalDataFiltering?: bool,
 *         AllowFullTableExternalDataAccess?: bool,
 *         ExternalDataFilteringAllowList?: list<array>,
 *         AuthorizedSessionTagValueList?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDataLakeSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDataLakeSettingsAsync(array{
 *     CatalogId?: string,
 *     DataLakeSettings?: array{
 *         DataLakeAdmins?: list<array>,
 *         ReadOnlyAdmins?: list<array>,
 *         CreateDatabaseDefaultPermissions?: list<array>,
 *         CreateTableDefaultPermissions?: list<array>,
 *         Parameters?: array<string, string>,
 *         TrustedResourceOwners?: list<string>,
 *         AllowExternalDataFiltering?: bool,
 *         AllowFullTableExternalDataAccess?: bool,
 *         ExternalDataFilteringAllowList?: list<array>,
 *         AuthorizedSessionTagValueList?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerResource(array $args = [])
 * @phpstan-method \Aws\Result registerResource(array{
 *     ResourceArn?: string,
 *     UseServiceLinkedRole?: bool,
 *     RoleArn?: string,
 *     WithFederation?: bool,
 *     HybridAccessEnabled?: bool,
 *     WithPrivilegedAccess?: bool,
 *     ExpectedResourceOwnerAccount?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerResourceAsync(array{
 *     ResourceArn?: string,
 *     UseServiceLinkedRole?: bool,
 *     RoleArn?: string,
 *     WithFederation?: bool,
 *     HybridAccessEnabled?: bool,
 *     WithPrivilegedAccess?: bool,
 *     ExpectedResourceOwnerAccount?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeLFTagsFromResource(array $args = [])
 * @phpstan-method \Aws\Result removeLFTagsFromResource(array{
 *     CatalogId?: string,
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     LFTags?: list<array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removeLFTagsFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeLFTagsFromResourceAsync(array{
 *     CatalogId?: string,
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     LFTags?: list<array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result revokePermissions(array $args = [])
 * @phpstan-method \Aws\Result revokePermissions(array{
 *     CatalogId?: string,
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     Condition?: array{Expression?: string, ...},
 *     PermissionsWithGrantOption?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise revokePermissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokePermissionsAsync(array{
 *     CatalogId?: string,
 *     Principal?: array{DataLakePrincipalIdentifier?: string, ...},
 *     Resource?: array{
 *         Catalog?: array{Id?: string, ...},
 *         Database?: array{CatalogId?: string, Name?: string, ...},
 *         Table?: array{CatalogId?: string, DatabaseName?: string, Name?: string, TableWildcard?: array, ...},
 *         TableWithColumns?: array{
 *             CatalogId?: string,
 *             DatabaseName?: string,
 *             Name?: string,
 *             ColumnNames?: list<string>,
 *             ColumnWildcard?: array,
 *             ...,
 *         },
 *         DataLocation?: array{CatalogId?: string, ResourceArn?: string, ...},
 *         DataCellsFilter?: array{TableCatalogId?: string, DatabaseName?: string, TableName?: string, Name?: string, ...},
 *         LFTag?: array{CatalogId?: string, TagKey?: string, TagValues?: list<string>, ...},
 *         LFTagPolicy?: array{
 *             CatalogId?: string,
 *             ResourceType?: 'DATABASE'|'TABLE',
 *             Expression?: list<array>,
 *             ExpressionName?: string,
 *             ...,
 *         },
 *         LFTagExpression?: array{CatalogId?: string, Name?: string, ...},
 *         ...,
 *     },
 *     Permissions?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     Condition?: array{Expression?: string, ...},
 *     PermissionsWithGrantOption?: list<'ALL'|'ALTER'|'ASSOCIATE'|'CREATE_CATALOG'|'CREATE_DATABASE'|'CREATE_LF_TAG'|'CREATE_LF_TAG_EXPRESSION'|'CREATE_TABLE'|'DATA_LOCATION_ACCESS'|'DELETE'|'DESCRIBE'|'DROP'|'GRANT_WITH_LF_TAG_EXPRESSION'|'INSERT'|'SELECT'|'SUPER_USER'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchDatabasesByLFTags(array $args = [])
 * @phpstan-method \Aws\Result searchDatabasesByLFTags(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CatalogId?: string,
 *     Expression?: list<array{TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchDatabasesByLFTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchDatabasesByLFTagsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CatalogId?: string,
 *     Expression?: list<array{TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchTablesByLFTags(array $args = [])
 * @phpstan-method \Aws\Result searchTablesByLFTags(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CatalogId?: string,
 *     Expression?: list<array{TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchTablesByLFTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchTablesByLFTagsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     CatalogId?: string,
 *     Expression?: list<array{TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startQueryPlanning(array $args = [])
 * @phpstan-method \Aws\Result startQueryPlanning(array{
 *     QueryPlanningContext?: array{
 *         CatalogId?: string,
 *         DatabaseName?: string,
 *         QueryAsOfTime?: int|string|\DateTimeInterface,
 *         QueryParameters?: array<string, string>,
 *         TransactionId?: string,
 *         ...,
 *     },
 *     QueryString?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startQueryPlanningAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQueryPlanningAsync(array{
 *     QueryPlanningContext?: array{
 *         CatalogId?: string,
 *         DatabaseName?: string,
 *         QueryAsOfTime?: int|string|\DateTimeInterface,
 *         QueryParameters?: array<string, string>,
 *         TransactionId?: string,
 *         ...,
 *     },
 *     QueryString?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startTransaction(array $args = [])
 * @phpstan-method \Aws\Result startTransaction(array{TransactionType?: 'READ_AND_WRITE'|'READ_ONLY', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startTransactionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTransactionAsync(array{TransactionType?: 'READ_AND_WRITE'|'READ_ONLY', ...} $args = [])
 * @method \Aws\Result updateDataCellsFilter(array $args = [])
 * @phpstan-method \Aws\Result updateDataCellsFilter(array{
 *     TableData?: array{
 *         TableCatalogId?: string,
 *         DatabaseName?: string,
 *         TableName?: string,
 *         Name?: string,
 *         RowFilter?: array{FilterExpression?: string, AllRowsWildcard?: array, ...},
 *         ColumnNames?: list<string>,
 *         ColumnWildcard?: array{ExcludedColumnNames?: list<string>, ...},
 *         VersionId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataCellsFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataCellsFilterAsync(array{
 *     TableData?: array{
 *         TableCatalogId?: string,
 *         DatabaseName?: string,
 *         TableName?: string,
 *         Name?: string,
 *         RowFilter?: array{FilterExpression?: string, AllRowsWildcard?: array, ...},
 *         ColumnNames?: list<string>,
 *         ColumnWildcard?: array{ExcludedColumnNames?: list<string>, ...},
 *         VersionId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLFTag(array $args = [])
 * @phpstan-method \Aws\Result updateLFTag(array{
 *     CatalogId?: string,
 *     TagKey?: string,
 *     TagValuesToDelete?: list<string>,
 *     TagValuesToAdd?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLFTagAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLFTagAsync(array{
 *     CatalogId?: string,
 *     TagKey?: string,
 *     TagValuesToDelete?: list<string>,
 *     TagValuesToAdd?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLFTagExpression(array $args = [])
 * @phpstan-method \Aws\Result updateLFTagExpression(array{
 *     Name?: string,
 *     Description?: string,
 *     CatalogId?: string,
 *     Expression?: list<array{TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLFTagExpressionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLFTagExpressionAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     CatalogId?: string,
 *     Expression?: list<array{TagKey?: string, TagValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLakeFormationIdentityCenterConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateLakeFormationIdentityCenterConfiguration(array{
 *     CatalogId?: string,
 *     ShareRecipients?: list<array{DataLakePrincipalIdentifier?: string, ...}>,
 *     ServiceIntegrations?: list<array{Redshift?: list<array>, ...}>,
 *     ApplicationStatus?: 'DISABLED'|'ENABLED',
 *     ExternalFiltering?: array{Status?: 'DISABLED'|'ENABLED', AuthorizedTargets?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLakeFormationIdentityCenterConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLakeFormationIdentityCenterConfigurationAsync(array{
 *     CatalogId?: string,
 *     ShareRecipients?: list<array{DataLakePrincipalIdentifier?: string, ...}>,
 *     ServiceIntegrations?: list<array{Redshift?: list<array>, ...}>,
 *     ApplicationStatus?: 'DISABLED'|'ENABLED',
 *     ExternalFiltering?: array{Status?: 'DISABLED'|'ENABLED', AuthorizedTargets?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResource(array $args = [])
 * @phpstan-method \Aws\Result updateResource(array{
 *     RoleArn?: string,
 *     ResourceArn?: string,
 *     WithFederation?: bool,
 *     HybridAccessEnabled?: bool,
 *     ExpectedResourceOwnerAccount?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceAsync(array{
 *     RoleArn?: string,
 *     ResourceArn?: string,
 *     WithFederation?: bool,
 *     HybridAccessEnabled?: bool,
 *     ExpectedResourceOwnerAccount?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTableObjects(array $args = [])
 * @phpstan-method \Aws\Result updateTableObjects(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     TransactionId?: string,
 *     WriteOperations?: list<array{AddObject?: array, DeleteObject?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTableObjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTableObjectsAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     TransactionId?: string,
 *     WriteOperations?: list<array{AddObject?: array, DeleteObject?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTableStorageOptimizer(array $args = [])
 * @phpstan-method \Aws\Result updateTableStorageOptimizer(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     StorageOptimizerConfig?: array<string, array<string, string>>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTableStorageOptimizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTableStorageOptimizerAsync(array{
 *     CatalogId?: string,
 *     DatabaseName?: string,
 *     TableName?: string,
 *     StorageOptimizerConfig?: array<string, array<string, string>>,
 *     ...,
 * } $args = [])
 */
class LakeFormationClient extends AwsClient {}
