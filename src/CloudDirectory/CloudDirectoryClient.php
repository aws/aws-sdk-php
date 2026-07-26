<?php
namespace Aws\CloudDirectory;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudDirectory** service.
 * @method \Aws\Result addFacetToObject(array $args = [])
 * @phpstan-method \Aws\Result addFacetToObject(array{
 *     DirectoryArn?: string,
 *     SchemaFacet?: array{SchemaArn?: string, FacetName?: string, ...},
 *     ObjectAttributeList?: list<array{Key?: array, Value?: array, ...}>,
 *     ObjectReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addFacetToObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addFacetToObjectAsync(array{
 *     DirectoryArn?: string,
 *     SchemaFacet?: array{SchemaArn?: string, FacetName?: string, ...},
 *     ObjectAttributeList?: list<array{Key?: array, Value?: array, ...}>,
 *     ObjectReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result applySchema(array $args = [])
 * @phpstan-method \Aws\Result applySchema(array{PublishedSchemaArn?: string, DirectoryArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise applySchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise applySchemaAsync(array{PublishedSchemaArn?: string, DirectoryArn?: string, ...} $args = [])
 * @method \Aws\Result attachObject(array $args = [])
 * @phpstan-method \Aws\Result attachObject(array{
 *     DirectoryArn?: string,
 *     ParentReference?: array{Selector?: string, ...},
 *     ChildReference?: array{Selector?: string, ...},
 *     LinkName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise attachObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachObjectAsync(array{
 *     DirectoryArn?: string,
 *     ParentReference?: array{Selector?: string, ...},
 *     ChildReference?: array{Selector?: string, ...},
 *     LinkName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result attachPolicy(array $args = [])
 * @phpstan-method \Aws\Result attachPolicy(array{
 *     DirectoryArn?: string,
 *     PolicyReference?: array{Selector?: string, ...},
 *     ObjectReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise attachPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachPolicyAsync(array{
 *     DirectoryArn?: string,
 *     PolicyReference?: array{Selector?: string, ...},
 *     ObjectReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result attachToIndex(array $args = [])
 * @phpstan-method \Aws\Result attachToIndex(array{
 *     DirectoryArn?: string,
 *     IndexReference?: array{Selector?: string, ...},
 *     TargetReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise attachToIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachToIndexAsync(array{
 *     DirectoryArn?: string,
 *     IndexReference?: array{Selector?: string, ...},
 *     TargetReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result attachTypedLink(array $args = [])
 * @phpstan-method \Aws\Result attachTypedLink(array{
 *     DirectoryArn?: string,
 *     SourceObjectReference?: array{Selector?: string, ...},
 *     TargetObjectReference?: array{Selector?: string, ...},
 *     TypedLinkFacet?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *     Attributes?: list<array{AttributeName?: string, Value?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise attachTypedLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachTypedLinkAsync(array{
 *     DirectoryArn?: string,
 *     SourceObjectReference?: array{Selector?: string, ...},
 *     TargetObjectReference?: array{Selector?: string, ...},
 *     TypedLinkFacet?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *     Attributes?: list<array{AttributeName?: string, Value?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchRead(array $args = [])
 * @phpstan-method \Aws\Result batchRead(array{
 *     DirectoryArn?: string,
 *     Operations?: list<array{
 *         ListObjectAttributes?: array,
 *         ListObjectChildren?: array,
 *         ListAttachedIndices?: array,
 *         ListObjectParentPaths?: array,
 *         GetObjectInformation?: array,
 *         GetObjectAttributes?: array,
 *         ListObjectParents?: array,
 *         ListObjectPolicies?: array,
 *         ListPolicyAttachments?: array,
 *         LookupPolicy?: array,
 *         ListIndex?: array,
 *         ListOutgoingTypedLinks?: array,
 *         ListIncomingTypedLinks?: array,
 *         GetLinkAttributes?: array,
 *         ...,
 *     }>,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchReadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchReadAsync(array{
 *     DirectoryArn?: string,
 *     Operations?: list<array{
 *         ListObjectAttributes?: array,
 *         ListObjectChildren?: array,
 *         ListAttachedIndices?: array,
 *         ListObjectParentPaths?: array,
 *         GetObjectInformation?: array,
 *         GetObjectAttributes?: array,
 *         ListObjectParents?: array,
 *         ListObjectPolicies?: array,
 *         ListPolicyAttachments?: array,
 *         LookupPolicy?: array,
 *         ListIndex?: array,
 *         ListOutgoingTypedLinks?: array,
 *         ListIncomingTypedLinks?: array,
 *         GetLinkAttributes?: array,
 *         ...,
 *     }>,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchWrite(array $args = [])
 * @phpstan-method \Aws\Result batchWrite(array{
 *     DirectoryArn?: string,
 *     Operations?: list<array{
 *         CreateObject?: array,
 *         AttachObject?: array,
 *         DetachObject?: array,
 *         UpdateObjectAttributes?: array,
 *         DeleteObject?: array,
 *         AddFacetToObject?: array,
 *         RemoveFacetFromObject?: array,
 *         AttachPolicy?: array,
 *         DetachPolicy?: array,
 *         CreateIndex?: array,
 *         AttachToIndex?: array,
 *         DetachFromIndex?: array,
 *         AttachTypedLink?: array,
 *         DetachTypedLink?: array,
 *         UpdateLinkAttributes?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchWriteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchWriteAsync(array{
 *     DirectoryArn?: string,
 *     Operations?: list<array{
 *         CreateObject?: array,
 *         AttachObject?: array,
 *         DetachObject?: array,
 *         UpdateObjectAttributes?: array,
 *         DeleteObject?: array,
 *         AddFacetToObject?: array,
 *         RemoveFacetFromObject?: array,
 *         AttachPolicy?: array,
 *         DetachPolicy?: array,
 *         CreateIndex?: array,
 *         AttachToIndex?: array,
 *         DetachFromIndex?: array,
 *         AttachTypedLink?: array,
 *         DetachTypedLink?: array,
 *         UpdateLinkAttributes?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDirectory(array $args = [])
 * @phpstan-method \Aws\Result createDirectory(array{Name?: string, SchemaArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDirectoryAsync(array{Name?: string, SchemaArn?: string, ...} $args = [])
 * @method \Aws\Result createFacet(array $args = [])
 * @phpstan-method \Aws\Result createFacet(array{
 *     SchemaArn?: string,
 *     Name?: string,
 *     Attributes?: list<array{
 *         Name?: string,
 *         AttributeDefinition?: array,
 *         AttributeReference?: array,
 *         RequiredBehavior?: 'NOT_REQUIRED'|'REQUIRED_ALWAYS',
 *         ...,
 *     }>,
 *     ObjectType?: 'INDEX'|'LEAF_NODE'|'NODE'|'POLICY',
 *     FacetStyle?: 'DYNAMIC'|'STATIC',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFacetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFacetAsync(array{
 *     SchemaArn?: string,
 *     Name?: string,
 *     Attributes?: list<array{
 *         Name?: string,
 *         AttributeDefinition?: array,
 *         AttributeReference?: array,
 *         RequiredBehavior?: 'NOT_REQUIRED'|'REQUIRED_ALWAYS',
 *         ...,
 *     }>,
 *     ObjectType?: 'INDEX'|'LEAF_NODE'|'NODE'|'POLICY',
 *     FacetStyle?: 'DYNAMIC'|'STATIC',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIndex(array $args = [])
 * @phpstan-method \Aws\Result createIndex(array{
 *     DirectoryArn?: string,
 *     OrderedIndexedAttributeList?: list<array{SchemaArn?: string, FacetName?: string, Name?: string, ...}>,
 *     IsUnique?: bool,
 *     ParentReference?: array{Selector?: string, ...},
 *     LinkName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIndexAsync(array{
 *     DirectoryArn?: string,
 *     OrderedIndexedAttributeList?: list<array{SchemaArn?: string, FacetName?: string, Name?: string, ...}>,
 *     IsUnique?: bool,
 *     ParentReference?: array{Selector?: string, ...},
 *     LinkName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createObject(array $args = [])
 * @phpstan-method \Aws\Result createObject(array{
 *     DirectoryArn?: string,
 *     SchemaFacets?: list<array{SchemaArn?: string, FacetName?: string, ...}>,
 *     ObjectAttributeList?: list<array{Key?: array, Value?: array, ...}>,
 *     ParentReference?: array{Selector?: string, ...},
 *     LinkName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createObjectAsync(array{
 *     DirectoryArn?: string,
 *     SchemaFacets?: list<array{SchemaArn?: string, FacetName?: string, ...}>,
 *     ObjectAttributeList?: list<array{Key?: array, Value?: array, ...}>,
 *     ParentReference?: array{Selector?: string, ...},
 *     LinkName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSchema(array $args = [])
 * @phpstan-method \Aws\Result createSchema(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSchemaAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result createTypedLinkFacet(array $args = [])
 * @phpstan-method \Aws\Result createTypedLinkFacet(array{
 *     SchemaArn?: string,
 *     Facet?: array{Name?: string, Attributes?: list<array>, IdentityAttributeOrder?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTypedLinkFacetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTypedLinkFacetAsync(array{
 *     SchemaArn?: string,
 *     Facet?: array{Name?: string, Attributes?: list<array>, IdentityAttributeOrder?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDirectory(array $args = [])
 * @phpstan-method \Aws\Result deleteDirectory(array{DirectoryArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDirectoryAsync(array{DirectoryArn?: string, ...} $args = [])
 * @method \Aws\Result deleteFacet(array $args = [])
 * @phpstan-method \Aws\Result deleteFacet(array{SchemaArn?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFacetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFacetAsync(array{SchemaArn?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result deleteObject(array $args = [])
 * @phpstan-method \Aws\Result deleteObject(array{DirectoryArn?: string, ObjectReference?: array{Selector?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteObjectAsync(array{DirectoryArn?: string, ObjectReference?: array{Selector?: string, ...}, ...} $args = [])
 * @method \Aws\Result deleteSchema(array $args = [])
 * @phpstan-method \Aws\Result deleteSchema(array{SchemaArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSchemaAsync(array{SchemaArn?: string, ...} $args = [])
 * @method \Aws\Result deleteTypedLinkFacet(array $args = [])
 * @phpstan-method \Aws\Result deleteTypedLinkFacet(array{SchemaArn?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTypedLinkFacetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTypedLinkFacetAsync(array{SchemaArn?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result detachFromIndex(array $args = [])
 * @phpstan-method \Aws\Result detachFromIndex(array{
 *     DirectoryArn?: string,
 *     IndexReference?: array{Selector?: string, ...},
 *     TargetReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detachFromIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachFromIndexAsync(array{
 *     DirectoryArn?: string,
 *     IndexReference?: array{Selector?: string, ...},
 *     TargetReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result detachObject(array $args = [])
 * @phpstan-method \Aws\Result detachObject(array{DirectoryArn?: string, ParentReference?: array{Selector?: string, ...}, LinkName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachObjectAsync(array{DirectoryArn?: string, ParentReference?: array{Selector?: string, ...}, LinkName?: string, ...} $args = [])
 * @method \Aws\Result detachPolicy(array $args = [])
 * @phpstan-method \Aws\Result detachPolicy(array{
 *     DirectoryArn?: string,
 *     PolicyReference?: array{Selector?: string, ...},
 *     ObjectReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detachPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachPolicyAsync(array{
 *     DirectoryArn?: string,
 *     PolicyReference?: array{Selector?: string, ...},
 *     ObjectReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result detachTypedLink(array $args = [])
 * @phpstan-method \Aws\Result detachTypedLink(array{
 *     DirectoryArn?: string,
 *     TypedLinkSpecifier?: array{
 *         TypedLinkFacet?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *         SourceObjectReference?: array{Selector?: string, ...},
 *         TargetObjectReference?: array{Selector?: string, ...},
 *         IdentityAttributeValues?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise detachTypedLinkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachTypedLinkAsync(array{
 *     DirectoryArn?: string,
 *     TypedLinkSpecifier?: array{
 *         TypedLinkFacet?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *         SourceObjectReference?: array{Selector?: string, ...},
 *         TargetObjectReference?: array{Selector?: string, ...},
 *         IdentityAttributeValues?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result disableDirectory(array $args = [])
 * @phpstan-method \Aws\Result disableDirectory(array{DirectoryArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableDirectoryAsync(array{DirectoryArn?: string, ...} $args = [])
 * @method \Aws\Result enableDirectory(array $args = [])
 * @phpstan-method \Aws\Result enableDirectory(array{DirectoryArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableDirectoryAsync(array{DirectoryArn?: string, ...} $args = [])
 * @method \Aws\Result getAppliedSchemaVersion(array $args = [])
 * @phpstan-method \Aws\Result getAppliedSchemaVersion(array{SchemaArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAppliedSchemaVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAppliedSchemaVersionAsync(array{SchemaArn?: string, ...} $args = [])
 * @method \Aws\Result getDirectory(array $args = [])
 * @phpstan-method \Aws\Result getDirectory(array{DirectoryArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDirectoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDirectoryAsync(array{DirectoryArn?: string, ...} $args = [])
 * @method \Aws\Result getFacet(array $args = [])
 * @phpstan-method \Aws\Result getFacet(array{SchemaArn?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFacetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFacetAsync(array{SchemaArn?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result getLinkAttributes(array $args = [])
 * @phpstan-method \Aws\Result getLinkAttributes(array{
 *     DirectoryArn?: string,
 *     TypedLinkSpecifier?: array{
 *         TypedLinkFacet?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *         SourceObjectReference?: array{Selector?: string, ...},
 *         TargetObjectReference?: array{Selector?: string, ...},
 *         IdentityAttributeValues?: list<array>,
 *         ...,
 *     },
 *     AttributeNames?: list<string>,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinkAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLinkAttributesAsync(array{
 *     DirectoryArn?: string,
 *     TypedLinkSpecifier?: array{
 *         TypedLinkFacet?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *         SourceObjectReference?: array{Selector?: string, ...},
 *         TargetObjectReference?: array{Selector?: string, ...},
 *         IdentityAttributeValues?: list<array>,
 *         ...,
 *     },
 *     AttributeNames?: list<string>,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getObjectAttributes(array $args = [])
 * @phpstan-method \Aws\Result getObjectAttributes(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     SchemaFacet?: array{SchemaArn?: string, FacetName?: string, ...},
 *     AttributeNames?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectAttributesAsync(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     SchemaFacet?: array{SchemaArn?: string, FacetName?: string, ...},
 *     AttributeNames?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getObjectInformation(array $args = [])
 * @phpstan-method \Aws\Result getObjectInformation(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getObjectInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectInformationAsync(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getSchemaAsJson(array $args = [])
 * @phpstan-method \Aws\Result getSchemaAsJson(array{SchemaArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSchemaAsJsonAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSchemaAsJsonAsync(array{SchemaArn?: string, ...} $args = [])
 * @method \Aws\Result getTypedLinkFacetInformation(array $args = [])
 * @phpstan-method \Aws\Result getTypedLinkFacetInformation(array{SchemaArn?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTypedLinkFacetInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTypedLinkFacetInformationAsync(array{SchemaArn?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result listAppliedSchemaArns(array $args = [])
 * @phpstan-method \Aws\Result listAppliedSchemaArns(array{DirectoryArn?: string, SchemaArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppliedSchemaArnsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppliedSchemaArnsAsync(array{DirectoryArn?: string, SchemaArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listAttachedIndices(array $args = [])
 * @phpstan-method \Aws\Result listAttachedIndices(array{
 *     DirectoryArn?: string,
 *     TargetReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachedIndicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttachedIndicesAsync(array{
 *     DirectoryArn?: string,
 *     TargetReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDevelopmentSchemaArns(array $args = [])
 * @phpstan-method \Aws\Result listDevelopmentSchemaArns(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDevelopmentSchemaArnsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevelopmentSchemaArnsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listDirectories(array $args = [])
 * @phpstan-method \Aws\Result listDirectories(array{NextToken?: string, MaxResults?: int, state?: 'DELETED'|'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDirectoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDirectoriesAsync(array{NextToken?: string, MaxResults?: int, state?: 'DELETED'|'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result listFacetAttributes(array $args = [])
 * @phpstan-method \Aws\Result listFacetAttributes(array{SchemaArn?: string, Name?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFacetAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFacetAttributesAsync(array{SchemaArn?: string, Name?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listFacetNames(array $args = [])
 * @phpstan-method \Aws\Result listFacetNames(array{SchemaArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFacetNamesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFacetNamesAsync(array{SchemaArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listIncomingTypedLinks(array $args = [])
 * @phpstan-method \Aws\Result listIncomingTypedLinks(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     FilterAttributeRanges?: list<array{AttributeName?: string, Range?: array, ...}>,
 *     FilterTypedLink?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIncomingTypedLinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIncomingTypedLinksAsync(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     FilterAttributeRanges?: list<array{AttributeName?: string, Range?: array, ...}>,
 *     FilterTypedLink?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIndex(array $args = [])
 * @phpstan-method \Aws\Result listIndex(array{
 *     DirectoryArn?: string,
 *     RangesOnIndexedValues?: list<array{AttributeKey?: array, Range?: array, ...}>,
 *     IndexReference?: array{Selector?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIndexAsync(array{
 *     DirectoryArn?: string,
 *     RangesOnIndexedValues?: list<array{AttributeKey?: array, Range?: array, ...}>,
 *     IndexReference?: array{Selector?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listObjectAttributes(array $args = [])
 * @phpstan-method \Aws\Result listObjectAttributes(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     FacetFilter?: array{SchemaArn?: string, FacetName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectAttributesAsync(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     FacetFilter?: array{SchemaArn?: string, FacetName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listObjectChildren(array $args = [])
 * @phpstan-method \Aws\Result listObjectChildren(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectChildrenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectChildrenAsync(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listObjectParentPaths(array $args = [])
 * @phpstan-method \Aws\Result listObjectParentPaths(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectParentPathsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectParentPathsAsync(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listObjectParents(array $args = [])
 * @phpstan-method \Aws\Result listObjectParents(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     IncludeAllLinksToEachParent?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectParentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectParentsAsync(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     IncludeAllLinksToEachParent?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listObjectPolicies(array $args = [])
 * @phpstan-method \Aws\Result listObjectPolicies(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listObjectPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectPoliciesAsync(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOutgoingTypedLinks(array $args = [])
 * @phpstan-method \Aws\Result listOutgoingTypedLinks(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     FilterAttributeRanges?: list<array{AttributeName?: string, Range?: array, ...}>,
 *     FilterTypedLink?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOutgoingTypedLinksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOutgoingTypedLinksAsync(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     FilterAttributeRanges?: list<array{AttributeName?: string, Range?: array, ...}>,
 *     FilterTypedLink?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPolicyAttachments(array $args = [])
 * @phpstan-method \Aws\Result listPolicyAttachments(array{
 *     DirectoryArn?: string,
 *     PolicyReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyAttachmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyAttachmentsAsync(array{
 *     DirectoryArn?: string,
 *     PolicyReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ConsistencyLevel?: 'EVENTUAL'|'SERIALIZABLE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPublishedSchemaArns(array $args = [])
 * @phpstan-method \Aws\Result listPublishedSchemaArns(array{SchemaArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPublishedSchemaArnsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPublishedSchemaArnsAsync(array{SchemaArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTypedLinkFacetAttributes(array $args = [])
 * @phpstan-method \Aws\Result listTypedLinkFacetAttributes(array{SchemaArn?: string, Name?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTypedLinkFacetAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTypedLinkFacetAttributesAsync(array{SchemaArn?: string, Name?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTypedLinkFacetNames(array $args = [])
 * @phpstan-method \Aws\Result listTypedLinkFacetNames(array{SchemaArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTypedLinkFacetNamesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTypedLinkFacetNamesAsync(array{SchemaArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result lookupPolicy(array $args = [])
 * @phpstan-method \Aws\Result lookupPolicy(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise lookupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise lookupPolicyAsync(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result publishSchema(array $args = [])
 * @phpstan-method \Aws\Result publishSchema(array{DevelopmentSchemaArn?: string, Version?: string, MinorVersion?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise publishSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishSchemaAsync(array{DevelopmentSchemaArn?: string, Version?: string, MinorVersion?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result putSchemaFromJson(array $args = [])
 * @phpstan-method \Aws\Result putSchemaFromJson(array{SchemaArn?: string, Document?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putSchemaFromJsonAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSchemaFromJsonAsync(array{SchemaArn?: string, Document?: string, ...} $args = [])
 * @method \Aws\Result removeFacetFromObject(array $args = [])
 * @phpstan-method \Aws\Result removeFacetFromObject(array{
 *     DirectoryArn?: string,
 *     SchemaFacet?: array{SchemaArn?: string, FacetName?: string, ...},
 *     ObjectReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removeFacetFromObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeFacetFromObjectAsync(array{
 *     DirectoryArn?: string,
 *     SchemaFacet?: array{SchemaArn?: string, FacetName?: string, ...},
 *     ObjectReference?: array{Selector?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateFacet(array $args = [])
 * @phpstan-method \Aws\Result updateFacet(array{
 *     SchemaArn?: string,
 *     Name?: string,
 *     AttributeUpdates?: list<array{Attribute?: array, Action?: 'CREATE_OR_UPDATE'|'DELETE', ...}>,
 *     ObjectType?: 'INDEX'|'LEAF_NODE'|'NODE'|'POLICY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFacetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFacetAsync(array{
 *     SchemaArn?: string,
 *     Name?: string,
 *     AttributeUpdates?: list<array{Attribute?: array, Action?: 'CREATE_OR_UPDATE'|'DELETE', ...}>,
 *     ObjectType?: 'INDEX'|'LEAF_NODE'|'NODE'|'POLICY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLinkAttributes(array $args = [])
 * @phpstan-method \Aws\Result updateLinkAttributes(array{
 *     DirectoryArn?: string,
 *     TypedLinkSpecifier?: array{
 *         TypedLinkFacet?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *         SourceObjectReference?: array{Selector?: string, ...},
 *         TargetObjectReference?: array{Selector?: string, ...},
 *         IdentityAttributeValues?: list<array>,
 *         ...,
 *     },
 *     AttributeUpdates?: list<array{AttributeKey?: array, AttributeAction?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLinkAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLinkAttributesAsync(array{
 *     DirectoryArn?: string,
 *     TypedLinkSpecifier?: array{
 *         TypedLinkFacet?: array{SchemaArn?: string, TypedLinkName?: string, ...},
 *         SourceObjectReference?: array{Selector?: string, ...},
 *         TargetObjectReference?: array{Selector?: string, ...},
 *         IdentityAttributeValues?: list<array>,
 *         ...,
 *     },
 *     AttributeUpdates?: list<array{AttributeKey?: array, AttributeAction?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateObjectAttributes(array $args = [])
 * @phpstan-method \Aws\Result updateObjectAttributes(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     AttributeUpdates?: list<array{ObjectAttributeKey?: array, ObjectAttributeAction?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateObjectAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateObjectAttributesAsync(array{
 *     DirectoryArn?: string,
 *     ObjectReference?: array{Selector?: string, ...},
 *     AttributeUpdates?: list<array{ObjectAttributeKey?: array, ObjectAttributeAction?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSchema(array $args = [])
 * @phpstan-method \Aws\Result updateSchema(array{SchemaArn?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSchemaAsync(array{SchemaArn?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result updateTypedLinkFacet(array $args = [])
 * @phpstan-method \Aws\Result updateTypedLinkFacet(array{
 *     SchemaArn?: string,
 *     Name?: string,
 *     AttributeUpdates?: list<array{Attribute?: array, Action?: 'CREATE_OR_UPDATE'|'DELETE', ...}>,
 *     IdentityAttributeOrder?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTypedLinkFacetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTypedLinkFacetAsync(array{
 *     SchemaArn?: string,
 *     Name?: string,
 *     AttributeUpdates?: list<array{Attribute?: array, Action?: 'CREATE_OR_UPDATE'|'DELETE', ...}>,
 *     IdentityAttributeOrder?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result upgradeAppliedSchema(array $args = [])
 * @phpstan-method \Aws\Result upgradeAppliedSchema(array{PublishedSchemaArn?: string, DirectoryArn?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise upgradeAppliedSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise upgradeAppliedSchemaAsync(array{PublishedSchemaArn?: string, DirectoryArn?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result upgradePublishedSchema(array $args = [])
 * @phpstan-method \Aws\Result upgradePublishedSchema(array{DevelopmentSchemaArn?: string, PublishedSchemaArn?: string, MinorVersion?: string, DryRun?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise upgradePublishedSchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise upgradePublishedSchemaAsync(array{DevelopmentSchemaArn?: string, PublishedSchemaArn?: string, MinorVersion?: string, DryRun?: bool, ...} $args = [])
 * @method \Aws\Result listManagedSchemaArns(array $args = []) (supported in versions 2017-01-11)
 * @phpstan-method \Aws\Result listManagedSchemaArns(array{SchemaArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedSchemaArnsAsync(array $args = []) (supported in versions 2017-01-11)
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedSchemaArnsAsync(array{SchemaArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 */
class CloudDirectoryClient extends AwsClient {}
