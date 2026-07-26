<?php
namespace Aws\DataZone;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon DataZone** service.
 * @method \Aws\Result acceptPredictions(array $args = [])
 * @phpstan-method \Aws\Result acceptPredictions(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     revision?: string,
 *     acceptRule?: array{rule?: 'ALL'|'NONE', threshold?: float, ...},
 *     acceptChoices?: list<array{predictionTarget?: string, predictionChoice?: int, editedValue?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptPredictionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptPredictionsAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     revision?: string,
 *     acceptRule?: array{rule?: 'ALL'|'NONE', threshold?: float, ...},
 *     acceptChoices?: list<array{predictionTarget?: string, predictionChoice?: int, editedValue?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result acceptSubscriptionRequest(array $args = [])
 * @phpstan-method \Aws\Result acceptSubscriptionRequest(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     decisionComment?: string,
 *     assetScopes?: list<array{assetId?: string, filterIds?: list<string>, ...}>,
 *     assetPermissions?: list<array{assetId?: string, permissions?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptSubscriptionRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptSubscriptionRequestAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     decisionComment?: string,
 *     assetScopes?: list<array{assetId?: string, filterIds?: list<string>, ...}>,
 *     assetPermissions?: list<array{assetId?: string, permissions?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addEntityOwner(array $args = [])
 * @phpstan-method \Aws\Result addEntityOwner(array{
 *     domainIdentifier?: string,
 *     entityType?: 'DOMAIN_UNIT',
 *     entityIdentifier?: string,
 *     owner?: array{user?: array{userIdentifier?: string, ...}, group?: array{groupIdentifier?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addEntityOwnerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addEntityOwnerAsync(array{
 *     domainIdentifier?: string,
 *     entityType?: 'DOMAIN_UNIT',
 *     entityIdentifier?: string,
 *     owner?: array{user?: array{userIdentifier?: string, ...}, group?: array{groupIdentifier?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result addPolicyGrant(array $args = [])
 * @phpstan-method \Aws\Result addPolicyGrant(array{
 *     domainIdentifier?: string,
 *     entityType?: 'ASSET_TYPE'|'DOMAIN_UNIT'|'ENVIRONMENT_BLUEPRINT_CONFIGURATION'|'ENVIRONMENT_PROFILE',
 *     entityIdentifier?: string,
 *     policyType?: 'ADD_TO_PROJECT_MEMBER_POOL'|'CREATE_ASSET_TYPE'|'CREATE_DOMAIN_UNIT'|'CREATE_ENVIRONMENT'|'CREATE_ENVIRONMENT_FROM_BLUEPRINT'|'CREATE_ENVIRONMENT_PROFILE'|'CREATE_FORM_TYPE'|'CREATE_GLOSSARY'|'CREATE_PROJECT'|'CREATE_PROJECT_FROM_PROJECT_PROFILE'|'DELEGATE_CREATE_ENVIRONMENT_PROFILE'|'OVERRIDE_DOMAIN_UNIT_OWNERS'|'OVERRIDE_PROJECT_OWNERS'|'USE_ASSET_TYPE',
 *     principal?: array{
 *         user?: array{userIdentifier?: string, allUsersGrantFilter?: array, ...},
 *         group?: array{groupIdentifier?: string, ...},
 *         project?: array{
 *             projectDesignation?: 'CONTRIBUTOR'|'OWNER'|'PROJECT_CATALOG_STEWARD',
 *             projectIdentifier?: string,
 *             projectGrantFilter?: array,
 *             ...,
 *         },
 *         domainUnit?: array{domainUnitDesignation?: 'OWNER', domainUnitIdentifier?: string, domainUnitGrantFilter?: array, ...},
 *         ...,
 *     },
 *     detail?: array{
 *         createDomainUnit?: array{includeChildDomainUnits?: bool, ...},
 *         overrideDomainUnitOwners?: array{includeChildDomainUnits?: bool, ...},
 *         addToProjectMemberPool?: array{includeChildDomainUnits?: bool, ...},
 *         overrideProjectOwners?: array{includeChildDomainUnits?: bool, ...},
 *         createGlossary?: array{includeChildDomainUnits?: bool, ...},
 *         createFormType?: array{includeChildDomainUnits?: bool, ...},
 *         createAssetType?: array{includeChildDomainUnits?: bool, ...},
 *         createProject?: array{includeChildDomainUnits?: bool, ...},
 *         createEnvironmentProfile?: array{domainUnitId?: string, ...},
 *         delegateCreateEnvironmentProfile?: array,
 *         createEnvironment?: array,
 *         createEnvironmentFromBlueprint?: array,
 *         createProjectFromProjectProfile?: array{includeChildDomainUnits?: bool, projectProfiles?: list<string>, ...},
 *         useAssetType?: array{domainUnitId?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addPolicyGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addPolicyGrantAsync(array{
 *     domainIdentifier?: string,
 *     entityType?: 'ASSET_TYPE'|'DOMAIN_UNIT'|'ENVIRONMENT_BLUEPRINT_CONFIGURATION'|'ENVIRONMENT_PROFILE',
 *     entityIdentifier?: string,
 *     policyType?: 'ADD_TO_PROJECT_MEMBER_POOL'|'CREATE_ASSET_TYPE'|'CREATE_DOMAIN_UNIT'|'CREATE_ENVIRONMENT'|'CREATE_ENVIRONMENT_FROM_BLUEPRINT'|'CREATE_ENVIRONMENT_PROFILE'|'CREATE_FORM_TYPE'|'CREATE_GLOSSARY'|'CREATE_PROJECT'|'CREATE_PROJECT_FROM_PROJECT_PROFILE'|'DELEGATE_CREATE_ENVIRONMENT_PROFILE'|'OVERRIDE_DOMAIN_UNIT_OWNERS'|'OVERRIDE_PROJECT_OWNERS'|'USE_ASSET_TYPE',
 *     principal?: array{
 *         user?: array{userIdentifier?: string, allUsersGrantFilter?: array, ...},
 *         group?: array{groupIdentifier?: string, ...},
 *         project?: array{
 *             projectDesignation?: 'CONTRIBUTOR'|'OWNER'|'PROJECT_CATALOG_STEWARD',
 *             projectIdentifier?: string,
 *             projectGrantFilter?: array,
 *             ...,
 *         },
 *         domainUnit?: array{domainUnitDesignation?: 'OWNER', domainUnitIdentifier?: string, domainUnitGrantFilter?: array, ...},
 *         ...,
 *     },
 *     detail?: array{
 *         createDomainUnit?: array{includeChildDomainUnits?: bool, ...},
 *         overrideDomainUnitOwners?: array{includeChildDomainUnits?: bool, ...},
 *         addToProjectMemberPool?: array{includeChildDomainUnits?: bool, ...},
 *         overrideProjectOwners?: array{includeChildDomainUnits?: bool, ...},
 *         createGlossary?: array{includeChildDomainUnits?: bool, ...},
 *         createFormType?: array{includeChildDomainUnits?: bool, ...},
 *         createAssetType?: array{includeChildDomainUnits?: bool, ...},
 *         createProject?: array{includeChildDomainUnits?: bool, ...},
 *         createEnvironmentProfile?: array{domainUnitId?: string, ...},
 *         delegateCreateEnvironmentProfile?: array,
 *         createEnvironment?: array,
 *         createEnvironmentFromBlueprint?: array,
 *         createProjectFromProjectProfile?: array{includeChildDomainUnits?: bool, projectProfiles?: list<string>, ...},
 *         useAssetType?: array{domainUnitId?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateEnvironmentRole(array $args = [])
 * @phpstan-method \Aws\Result associateEnvironmentRole(array{domainIdentifier?: string, environmentIdentifier?: string, environmentRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateEnvironmentRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateEnvironmentRoleAsync(array{domainIdentifier?: string, environmentIdentifier?: string, environmentRoleArn?: string, ...} $args = [])
 * @method \Aws\Result associateGovernedTerms(array $args = [])
 * @phpstan-method \Aws\Result associateGovernedTerms(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET',
 *     governedGlossaryTerms?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateGovernedTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateGovernedTermsAsync(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET',
 *     governedGlossaryTerms?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchGetAttributesMetadata(array $args = [])
 * @phpstan-method \Aws\Result batchGetAttributesMetadata(array{
 *     domainIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     entityIdentifier?: string,
 *     entityRevision?: string,
 *     attributeIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAttributesMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetAttributesMetadataAsync(array{
 *     domainIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     entityIdentifier?: string,
 *     entityRevision?: string,
 *     attributeIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchPutAttributesMetadata(array $args = [])
 * @phpstan-method \Aws\Result batchPutAttributesMetadata(array{
 *     domainIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     entityIdentifier?: string,
 *     clientToken?: string,
 *     attributes?: list<array{attributeIdentifier?: string, forms?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutAttributesMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutAttributesMetadataAsync(array{
 *     domainIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     entityIdentifier?: string,
 *     clientToken?: string,
 *     attributes?: list<array{attributeIdentifier?: string, forms?: list<array>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelMetadataGenerationRun(array $args = [])
 * @phpstan-method \Aws\Result cancelMetadataGenerationRun(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMetadataGenerationRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMetadataGenerationRunAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result cancelSubscription(array $args = [])
 * @phpstan-method \Aws\Result cancelSubscription(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelSubscriptionAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result createAccountPool(array $args = [])
 * @phpstan-method \Aws\Result createAccountPool(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     resolutionStrategy?: 'MANUAL',
 *     accountSource?: array{
 *         accounts?: list<array>,
 *         customAccountPoolHandler?: array{lambdaFunctionArn?: string, lambdaExecutionRoleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccountPoolAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     resolutionStrategy?: 'MANUAL',
 *     accountSource?: array{
 *         accounts?: list<array>,
 *         customAccountPoolHandler?: array{lambdaFunctionArn?: string, lambdaExecutionRoleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAsset(array $args = [])
 * @phpstan-method \Aws\Result createAsset(array{
 *     name?: string,
 *     domainIdentifier?: string,
 *     externalIdentifier?: string,
 *     typeIdentifier?: string,
 *     typeRevision?: string,
 *     description?: string,
 *     glossaryTerms?: list<string>,
 *     formsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     owningProjectIdentifier?: string,
 *     predictionConfiguration?: array{businessNameGeneration?: array{enabled?: bool, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssetAsync(array{
 *     name?: string,
 *     domainIdentifier?: string,
 *     externalIdentifier?: string,
 *     typeIdentifier?: string,
 *     typeRevision?: string,
 *     description?: string,
 *     glossaryTerms?: list<string>,
 *     formsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     owningProjectIdentifier?: string,
 *     predictionConfiguration?: array{businessNameGeneration?: array{enabled?: bool, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssetFilter(array $args = [])
 * @phpstan-method \Aws\Result createAssetFilter(array{
 *     domainIdentifier?: string,
 *     assetIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     configuration?: array{
 *         columnConfiguration?: array{includedColumnNames?: list<string>, ...},
 *         rowConfiguration?: array{rowFilter?: array, sensitive?: bool, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssetFilterAsync(array{
 *     domainIdentifier?: string,
 *     assetIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     configuration?: array{
 *         columnConfiguration?: array{includedColumnNames?: list<string>, ...},
 *         rowConfiguration?: array{rowFilter?: array, sensitive?: bool, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssetRevision(array $args = [])
 * @phpstan-method \Aws\Result createAssetRevision(array{
 *     name?: string,
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     typeRevision?: string,
 *     description?: string,
 *     glossaryTerms?: list<string>,
 *     formsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     predictionConfiguration?: array{businessNameGeneration?: array{enabled?: bool, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssetRevisionAsync(array{
 *     name?: string,
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     typeRevision?: string,
 *     description?: string,
 *     glossaryTerms?: list<string>,
 *     formsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     predictionConfiguration?: array{businessNameGeneration?: array{enabled?: bool, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssetType(array $args = [])
 * @phpstan-method \Aws\Result createAssetType(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     formsInput?: array<string, array{typeIdentifier?: string, typeRevision?: string, required?: bool, ...}>,
 *     owningProjectIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssetTypeAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     formsInput?: array<string, array{typeIdentifier?: string, typeRevision?: string, required?: bool, ...}>,
 *     owningProjectIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConnection(array $args = [])
 * @phpstan-method \Aws\Result createConnection(array{
 *     awsLocation?: array{accessRole?: string, awsAccountId?: string, awsRegion?: string, iamConnectionId?: string, ...},
 *     clientToken?: string,
 *     configurations?: list<array{classification?: string, properties?: array<string, string>, ...}>,
 *     description?: string,
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     name?: string,
 *     props?: array{
 *         athenaProperties?: array{workgroupName?: string, ...},
 *         glueProperties?: array{glueConnectionInput?: array, ...},
 *         hyperPodProperties?: array{clusterName?: string, ...},
 *         iamProperties?: array{glueLineageSyncEnabled?: bool, ...},
 *         redshiftProperties?: array{
 *             storage?: array,
 *             databaseName?: string,
 *             host?: string,
 *             port?: int,
 *             credentials?: array,
 *             lineageSync?: array,
 *             ...,
 *         },
 *         sparkEmrProperties?: array{
 *             computeArn?: string,
 *             instanceProfileArn?: string,
 *             javaVirtualEnv?: string,
 *             logUri?: string,
 *             pythonVirtualEnv?: string,
 *             runtimeRole?: string,
 *             trustedCertificatesS3Uri?: string,
 *             managedEndpointArn?: string,
 *             ...,
 *         },
 *         sparkGlueProperties?: array{
 *             additionalArgs?: array,
 *             glueConnectionName?: string,
 *             glueConnectionNames?: list<string>,
 *             glueVersion?: string,
 *             idleTimeout?: int,
 *             javaVirtualEnv?: string,
 *             numberOfWorkers?: int,
 *             pythonVirtualEnv?: string,
 *             workerType?: string,
 *             ...,
 *         },
 *         s3Properties?: array{s3Uri?: string, s3AccessGrantLocationId?: string, registerS3AccessGrantLocation?: bool, ...},
 *         snowflakeProperties?: array{
 *             connectivityProperties?: array,
 *             snowflakeRole?: string,
 *             identityMapping?: array,
 *             lineageSync?: array,
 *             ...,
 *         },
 *         amazonQProperties?: array{isEnabled?: bool, profileArn?: string, authMode?: string, ...},
 *         mlflowProperties?: array{trackingServerArn?: string, ...},
 *         workflowsMwaaProperties?: array{mwaaEnvironmentName?: string, ...},
 *         workflowsServerlessProperties?: array,
 *         lakehouseProperties?: array{glueLineageSyncEnabled?: bool, ...},
 *         vpcProperties?: array{vpcId?: string, subnetIds?: list<string>, securityGroupId?: string, ...},
 *         ...,
 *     },
 *     enableTrustedIdentityPropagation?: bool,
 *     scope?: 'DOMAIN'|'PROJECT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionAsync(array{
 *     awsLocation?: array{accessRole?: string, awsAccountId?: string, awsRegion?: string, iamConnectionId?: string, ...},
 *     clientToken?: string,
 *     configurations?: list<array{classification?: string, properties?: array<string, string>, ...}>,
 *     description?: string,
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     name?: string,
 *     props?: array{
 *         athenaProperties?: array{workgroupName?: string, ...},
 *         glueProperties?: array{glueConnectionInput?: array, ...},
 *         hyperPodProperties?: array{clusterName?: string, ...},
 *         iamProperties?: array{glueLineageSyncEnabled?: bool, ...},
 *         redshiftProperties?: array{
 *             storage?: array,
 *             databaseName?: string,
 *             host?: string,
 *             port?: int,
 *             credentials?: array,
 *             lineageSync?: array,
 *             ...,
 *         },
 *         sparkEmrProperties?: array{
 *             computeArn?: string,
 *             instanceProfileArn?: string,
 *             javaVirtualEnv?: string,
 *             logUri?: string,
 *             pythonVirtualEnv?: string,
 *             runtimeRole?: string,
 *             trustedCertificatesS3Uri?: string,
 *             managedEndpointArn?: string,
 *             ...,
 *         },
 *         sparkGlueProperties?: array{
 *             additionalArgs?: array,
 *             glueConnectionName?: string,
 *             glueConnectionNames?: list<string>,
 *             glueVersion?: string,
 *             idleTimeout?: int,
 *             javaVirtualEnv?: string,
 *             numberOfWorkers?: int,
 *             pythonVirtualEnv?: string,
 *             workerType?: string,
 *             ...,
 *         },
 *         s3Properties?: array{s3Uri?: string, s3AccessGrantLocationId?: string, registerS3AccessGrantLocation?: bool, ...},
 *         snowflakeProperties?: array{
 *             connectivityProperties?: array,
 *             snowflakeRole?: string,
 *             identityMapping?: array,
 *             lineageSync?: array,
 *             ...,
 *         },
 *         amazonQProperties?: array{isEnabled?: bool, profileArn?: string, authMode?: string, ...},
 *         mlflowProperties?: array{trackingServerArn?: string, ...},
 *         workflowsMwaaProperties?: array{mwaaEnvironmentName?: string, ...},
 *         workflowsServerlessProperties?: array,
 *         lakehouseProperties?: array{glueLineageSyncEnabled?: bool, ...},
 *         vpcProperties?: array{vpcId?: string, subnetIds?: list<string>, securityGroupId?: string, ...},
 *         ...,
 *     },
 *     enableTrustedIdentityPropagation?: bool,
 *     scope?: 'DOMAIN'|'PROJECT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataProduct(array $args = [])
 * @phpstan-method \Aws\Result createDataProduct(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     owningProjectIdentifier?: string,
 *     description?: string,
 *     glossaryTerms?: list<string>,
 *     formsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     items?: list<array{itemType?: 'ASSET', identifier?: string, revision?: string, glossaryTerms?: list<string>, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataProductAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     owningProjectIdentifier?: string,
 *     description?: string,
 *     glossaryTerms?: list<string>,
 *     formsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     items?: list<array{itemType?: 'ASSET', identifier?: string, revision?: string, glossaryTerms?: list<string>, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataProductRevision(array $args = [])
 * @phpstan-method \Aws\Result createDataProductRevision(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     glossaryTerms?: list<string>,
 *     items?: list<array{itemType?: 'ASSET', identifier?: string, revision?: string, glossaryTerms?: list<string>, ...}>,
 *     formsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataProductRevisionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataProductRevisionAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     glossaryTerms?: list<string>,
 *     items?: list<array{itemType?: 'ASSET', identifier?: string, revision?: string, glossaryTerms?: list<string>, ...}>,
 *     formsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDataSource(array $args = [])
 * @phpstan-method \Aws\Result createDataSource(array{
 *     name?: string,
 *     description?: string,
 *     domainIdentifier?: string,
 *     projectIdentifier?: string,
 *     environmentIdentifier?: string,
 *     connectionIdentifier?: string,
 *     type?: string,
 *     configuration?: array{
 *         glueRunConfiguration?: array{
 *             dataAccessRole?: string,
 *             relationalFilterConfigurations?: list<array>,
 *             autoImportDataQualityResult?: bool,
 *             catalogName?: string,
 *             ...,
 *         },
 *         redshiftRunConfiguration?: array{
 *             dataAccessRole?: string,
 *             relationalFilterConfigurations?: list<array>,
 *             redshiftCredentialConfiguration?: array,
 *             redshiftStorage?: array,
 *             ...,
 *         },
 *         sageMakerRunConfiguration?: array{trackingAssets?: array<string, list<string>>, ...},
 *         ...,
 *     },
 *     recommendation?: array{enableBusinessNameGeneration?: bool, ...},
 *     enableSetting?: 'DISABLED'|'ENABLED',
 *     schedule?: array{
 *         timezone?: 'AFRICA_JOHANNESBURG'|'AMERICA_MONTREAL'|'AMERICA_SAO_PAULO'|'ASIA_BAHRAIN'|'ASIA_BANGKOK'|'ASIA_CALCUTTA'|'ASIA_DUBAI'|'ASIA_HONG_KONG'|'ASIA_JAKARTA'|'ASIA_KUALA_LUMPUR'|'ASIA_SEOUL'|'ASIA_SHANGHAI'|'ASIA_SINGAPORE'|'ASIA_TAIPEI'|'ASIA_TOKYO'|'AUSTRALIA_MELBOURNE'|'AUSTRALIA_SYDNEY'|'CANADA_CENTRAL'|'CET'|'CST6CDT'|'ETC_GMT'|'ETC_GMT0'|'ETC_GMT_ADD_0'|'ETC_GMT_ADD_1'|'ETC_GMT_ADD_10'|'ETC_GMT_ADD_11'|'ETC_GMT_ADD_12'|'ETC_GMT_ADD_2'|'ETC_GMT_ADD_3'|'ETC_GMT_ADD_4'|'ETC_GMT_ADD_5'|'ETC_GMT_ADD_6'|'ETC_GMT_ADD_7'|'ETC_GMT_ADD_8'|'ETC_GMT_ADD_9'|'ETC_GMT_NEG_0'|'ETC_GMT_NEG_1'|'ETC_GMT_NEG_10'|'ETC_GMT_NEG_11'|'ETC_GMT_NEG_12'|'ETC_GMT_NEG_13'|'ETC_GMT_NEG_14'|'ETC_GMT_NEG_2'|'ETC_GMT_NEG_3'|'ETC_GMT_NEG_4'|'ETC_GMT_NEG_5'|'ETC_GMT_NEG_6'|'ETC_GMT_NEG_7'|'ETC_GMT_NEG_8'|'ETC_GMT_NEG_9'|'EUROPE_DUBLIN'|'EUROPE_LONDON'|'EUROPE_PARIS'|'EUROPE_STOCKHOLM'|'EUROPE_ZURICH'|'ISRAEL'|'MEXICO_GENERAL'|'MST7MDT'|'PACIFIC_AUCKLAND'|'US_CENTRAL'|'US_EASTERN'|'US_MOUNTAIN'|'US_PACIFIC'|'UTC',
 *         schedule?: string,
 *         ...,
 *     },
 *     publishOnImport?: bool,
 *     assetFormsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDataSourceAsync(array{
 *     name?: string,
 *     description?: string,
 *     domainIdentifier?: string,
 *     projectIdentifier?: string,
 *     environmentIdentifier?: string,
 *     connectionIdentifier?: string,
 *     type?: string,
 *     configuration?: array{
 *         glueRunConfiguration?: array{
 *             dataAccessRole?: string,
 *             relationalFilterConfigurations?: list<array>,
 *             autoImportDataQualityResult?: bool,
 *             catalogName?: string,
 *             ...,
 *         },
 *         redshiftRunConfiguration?: array{
 *             dataAccessRole?: string,
 *             relationalFilterConfigurations?: list<array>,
 *             redshiftCredentialConfiguration?: array,
 *             redshiftStorage?: array,
 *             ...,
 *         },
 *         sageMakerRunConfiguration?: array{trackingAssets?: array<string, list<string>>, ...},
 *         ...,
 *     },
 *     recommendation?: array{enableBusinessNameGeneration?: bool, ...},
 *     enableSetting?: 'DISABLED'|'ENABLED',
 *     schedule?: array{
 *         timezone?: 'AFRICA_JOHANNESBURG'|'AMERICA_MONTREAL'|'AMERICA_SAO_PAULO'|'ASIA_BAHRAIN'|'ASIA_BANGKOK'|'ASIA_CALCUTTA'|'ASIA_DUBAI'|'ASIA_HONG_KONG'|'ASIA_JAKARTA'|'ASIA_KUALA_LUMPUR'|'ASIA_SEOUL'|'ASIA_SHANGHAI'|'ASIA_SINGAPORE'|'ASIA_TAIPEI'|'ASIA_TOKYO'|'AUSTRALIA_MELBOURNE'|'AUSTRALIA_SYDNEY'|'CANADA_CENTRAL'|'CET'|'CST6CDT'|'ETC_GMT'|'ETC_GMT0'|'ETC_GMT_ADD_0'|'ETC_GMT_ADD_1'|'ETC_GMT_ADD_10'|'ETC_GMT_ADD_11'|'ETC_GMT_ADD_12'|'ETC_GMT_ADD_2'|'ETC_GMT_ADD_3'|'ETC_GMT_ADD_4'|'ETC_GMT_ADD_5'|'ETC_GMT_ADD_6'|'ETC_GMT_ADD_7'|'ETC_GMT_ADD_8'|'ETC_GMT_ADD_9'|'ETC_GMT_NEG_0'|'ETC_GMT_NEG_1'|'ETC_GMT_NEG_10'|'ETC_GMT_NEG_11'|'ETC_GMT_NEG_12'|'ETC_GMT_NEG_13'|'ETC_GMT_NEG_14'|'ETC_GMT_NEG_2'|'ETC_GMT_NEG_3'|'ETC_GMT_NEG_4'|'ETC_GMT_NEG_5'|'ETC_GMT_NEG_6'|'ETC_GMT_NEG_7'|'ETC_GMT_NEG_8'|'ETC_GMT_NEG_9'|'EUROPE_DUBLIN'|'EUROPE_LONDON'|'EUROPE_PARIS'|'EUROPE_STOCKHOLM'|'EUROPE_ZURICH'|'ISRAEL'|'MEXICO_GENERAL'|'MST7MDT'|'PACIFIC_AUCKLAND'|'US_CENTRAL'|'US_EASTERN'|'US_MOUNTAIN'|'US_PACIFIC'|'UTC',
 *         schedule?: string,
 *         ...,
 *     },
 *     publishOnImport?: bool,
 *     assetFormsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomain(array $args = [])
 * @phpstan-method \Aws\Result createDomain(array{
 *     name?: string,
 *     description?: string,
 *     singleSignOn?: array{type?: 'DISABLED'|'IAM_IDC', userAssignment?: 'AUTOMATIC'|'MANUAL', idcInstanceArn?: string, ...},
 *     domainExecutionRole?: string,
 *     kmsKeyIdentifier?: string,
 *     tags?: array<string, string>,
 *     domainVersion?: 'V1'|'V2',
 *     serviceRole?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAsync(array{
 *     name?: string,
 *     description?: string,
 *     singleSignOn?: array{type?: 'DISABLED'|'IAM_IDC', userAssignment?: 'AUTOMATIC'|'MANUAL', idcInstanceArn?: string, ...},
 *     domainExecutionRole?: string,
 *     kmsKeyIdentifier?: string,
 *     tags?: array<string, string>,
 *     domainVersion?: 'V1'|'V2',
 *     serviceRole?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomainUnit(array $args = [])
 * @phpstan-method \Aws\Result createDomainUnit(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     parentDomainUnitIdentifier?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainUnitAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     parentDomainUnitIdentifier?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createEnvironment(array{
 *     projectIdentifier?: string,
 *     domainIdentifier?: string,
 *     description?: string,
 *     name?: string,
 *     environmentProfileIdentifier?: string,
 *     userParameters?: list<array{name?: string, value?: string, ...}>,
 *     glossaryTerms?: list<string>,
 *     environmentAccountIdentifier?: string,
 *     environmentAccountRegion?: string,
 *     environmentBlueprintIdentifier?: string,
 *     deploymentOrder?: int,
 *     environmentConfigurationId?: string,
 *     environmentConfigurationName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array{
 *     projectIdentifier?: string,
 *     domainIdentifier?: string,
 *     description?: string,
 *     name?: string,
 *     environmentProfileIdentifier?: string,
 *     userParameters?: list<array{name?: string, value?: string, ...}>,
 *     glossaryTerms?: list<string>,
 *     environmentAccountIdentifier?: string,
 *     environmentAccountRegion?: string,
 *     environmentBlueprintIdentifier?: string,
 *     deploymentOrder?: int,
 *     environmentConfigurationId?: string,
 *     environmentConfigurationName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironmentAction(array $args = [])
 * @phpstan-method \Aws\Result createEnvironmentAction(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     name?: string,
 *     parameters?: array{awsConsoleLink?: array{uri?: string, ...}, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentActionAsync(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     name?: string,
 *     parameters?: array{awsConsoleLink?: array{uri?: string, ...}, ...},
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironmentBlueprint(array $args = [])
 * @phpstan-method \Aws\Result createEnvironmentBlueprint(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     provisioningProperties?: array{cloudFormation?: array{templateUrl?: string, ...}, ...},
 *     userParameters?: list<array{
 *         keyName?: string,
 *         description?: string,
 *         fieldType?: string,
 *         defaultValue?: string,
 *         isEditable?: bool,
 *         isOptional?: bool,
 *         isUpdateSupported?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentBlueprintAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     provisioningProperties?: array{cloudFormation?: array{templateUrl?: string, ...}, ...},
 *     userParameters?: list<array{
 *         keyName?: string,
 *         description?: string,
 *         fieldType?: string,
 *         defaultValue?: string,
 *         isEditable?: bool,
 *         isOptional?: bool,
 *         isUpdateSupported?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEnvironmentProfile(array $args = [])
 * @phpstan-method \Aws\Result createEnvironmentProfile(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     environmentBlueprintIdentifier?: string,
 *     projectIdentifier?: string,
 *     userParameters?: list<array{name?: string, value?: string, ...}>,
 *     awsAccountId?: string,
 *     awsAccountRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEnvironmentProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentProfileAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     environmentBlueprintIdentifier?: string,
 *     projectIdentifier?: string,
 *     userParameters?: list<array{name?: string, value?: string, ...}>,
 *     awsAccountId?: string,
 *     awsAccountRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFormType(array $args = [])
 * @phpstan-method \Aws\Result createFormType(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     model?: array{smithy?: string, ...},
 *     owningProjectIdentifier?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFormTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFormTypeAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     model?: array{smithy?: string, ...},
 *     owningProjectIdentifier?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGlossary(array $args = [])
 * @phpstan-method \Aws\Result createGlossary(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     owningProjectIdentifier?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     usageRestrictions?: list<'ASSET_GOVERNED_TERMS'>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlossaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGlossaryAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     owningProjectIdentifier?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     usageRestrictions?: list<'ASSET_GOVERNED_TERMS'>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGlossaryTerm(array $args = [])
 * @phpstan-method \Aws\Result createGlossaryTerm(array{
 *     domainIdentifier?: string,
 *     glossaryIdentifier?: string,
 *     name?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     shortDescription?: string,
 *     longDescription?: string,
 *     termRelations?: array{isA?: list<string>, classifies?: list<string>, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGlossaryTermAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGlossaryTermAsync(array{
 *     domainIdentifier?: string,
 *     glossaryIdentifier?: string,
 *     name?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     shortDescription?: string,
 *     longDescription?: string,
 *     termRelations?: array{isA?: list<string>, classifies?: list<string>, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGroupProfile(array $args = [])
 * @phpstan-method \Aws\Result createGroupProfile(array{
 *     domainIdentifier?: string,
 *     groupIdentifier?: string,
 *     rolePrincipalArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGroupProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGroupProfileAsync(array{
 *     domainIdentifier?: string,
 *     groupIdentifier?: string,
 *     rolePrincipalArn?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createListingChangeSet(array $args = [])
 * @phpstan-method \Aws\Result createListingChangeSet(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET'|'DATA_PRODUCT',
 *     entityRevision?: string,
 *     action?: 'PUBLISH'|'UNPUBLISH',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createListingChangeSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createListingChangeSetAsync(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET'|'DATA_PRODUCT',
 *     entityRevision?: string,
 *     action?: 'PUBLISH'|'UNPUBLISH',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNotebook(array $args = [])
 * @phpstan-method \Aws\Result createNotebook(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     metadata?: array<string, string>,
 *     parameters?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotebookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotebookAsync(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     metadata?: array<string, string>,
 *     parameters?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @phpstan-method \Aws\Result createProject(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     resourceTags?: array<string, string>,
 *     glossaryTerms?: list<string>,
 *     domainUnitId?: string,
 *     projectProfileId?: string,
 *     userParameters?: list<array{
 *         environmentId?: string,
 *         environmentResolvedAccount?: array,
 *         environmentConfigurationName?: string,
 *         environmentParameters?: list<array>,
 *         ...,
 *     }>,
 *     projectCategory?: string,
 *     projectExecutionRole?: string,
 *     membershipAssignments?: list<array{
 *         member?: array,
 *         designation?: 'PROJECT_CATALOG_CONSUMER'|'PROJECT_CATALOG_STEWARD'|'PROJECT_CATALOG_VIEWER'|'PROJECT_CONTRIBUTOR'|'PROJECT_OWNER',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProjectAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     resourceTags?: array<string, string>,
 *     glossaryTerms?: list<string>,
 *     domainUnitId?: string,
 *     projectProfileId?: string,
 *     userParameters?: list<array{
 *         environmentId?: string,
 *         environmentResolvedAccount?: array,
 *         environmentConfigurationName?: string,
 *         environmentParameters?: list<array>,
 *         ...,
 *     }>,
 *     projectCategory?: string,
 *     projectExecutionRole?: string,
 *     membershipAssignments?: list<array{
 *         member?: array,
 *         designation?: 'PROJECT_CATALOG_CONSUMER'|'PROJECT_CATALOG_STEWARD'|'PROJECT_CATALOG_VIEWER'|'PROJECT_CONTRIBUTOR'|'PROJECT_OWNER',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProjectMembership(array $args = [])
 * @phpstan-method \Aws\Result createProjectMembership(array{
 *     domainIdentifier?: string,
 *     projectIdentifier?: string,
 *     member?: array{userIdentifier?: string, groupIdentifier?: string, ...},
 *     designation?: 'PROJECT_CATALOG_CONSUMER'|'PROJECT_CATALOG_STEWARD'|'PROJECT_CATALOG_VIEWER'|'PROJECT_CONTRIBUTOR'|'PROJECT_OWNER',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProjectMembershipAsync(array{
 *     domainIdentifier?: string,
 *     projectIdentifier?: string,
 *     member?: array{userIdentifier?: string, groupIdentifier?: string, ...},
 *     designation?: 'PROJECT_CATALOG_CONSUMER'|'PROJECT_CATALOG_STEWARD'|'PROJECT_CATALOG_VIEWER'|'PROJECT_CONTRIBUTOR'|'PROJECT_OWNER',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProjectProfile(array $args = [])
 * @phpstan-method \Aws\Result createProjectProfile(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     projectResourceTags?: list<array{key?: string, value?: string, isValueEditable?: bool, ...}>,
 *     allowCustomProjectResourceTags?: bool,
 *     projectResourceTagsDescription?: string,
 *     environmentConfigurations?: list<array{
 *         name?: string,
 *         id?: string,
 *         environmentBlueprintId?: string,
 *         description?: string,
 *         deploymentMode?: 'ON_CREATE'|'ON_DEMAND',
 *         configurationParameters?: array,
 *         awsAccount?: array,
 *         accountPools?: list<string>,
 *         awsRegion?: array,
 *         deploymentOrder?: int,
 *         ...,
 *     }>,
 *     domainUnitIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProjectProfileAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     projectResourceTags?: list<array{key?: string, value?: string, isValueEditable?: bool, ...}>,
 *     allowCustomProjectResourceTags?: bool,
 *     projectResourceTagsDescription?: string,
 *     environmentConfigurations?: list<array{
 *         name?: string,
 *         id?: string,
 *         environmentBlueprintId?: string,
 *         description?: string,
 *         deploymentMode?: 'ON_CREATE'|'ON_DEMAND',
 *         configurationParameters?: array,
 *         awsAccount?: array,
 *         accountPools?: list<string>,
 *         awsRegion?: array,
 *         deploymentOrder?: int,
 *         ...,
 *     }>,
 *     domainUnitIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRule(array $args = [])
 * @phpstan-method \Aws\Result createRule(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     target?: array{domainUnitTarget?: array{domainUnitId?: string, includeChildDomainUnits?: bool, ...}, ...},
 *     action?: 'CREATE_LISTING_CHANGE_SET'|'CREATE_SUBSCRIPTION_REQUEST',
 *     scope?: array{
 *         assetType?: array{selectionMode?: 'ALL'|'SPECIFIC', specificAssetTypes?: list<string>, ...},
 *         dataProduct?: bool,
 *         project?: array{selectionMode?: 'ALL'|'SPECIFIC', specificProjects?: list<string>, ...},
 *         ...,
 *     },
 *     detail?: array{
 *         metadataFormEnforcementDetail?: array{requiredMetadataForms?: list<array>, ...},
 *         glossaryTermEnforcementDetail?: array{requiredGlossaryTermIds?: list<string>, ...},
 *         ...,
 *     },
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     target?: array{domainUnitTarget?: array{domainUnitId?: string, includeChildDomainUnits?: bool, ...}, ...},
 *     action?: 'CREATE_LISTING_CHANGE_SET'|'CREATE_SUBSCRIPTION_REQUEST',
 *     scope?: array{
 *         assetType?: array{selectionMode?: 'ALL'|'SPECIFIC', specificAssetTypes?: list<string>, ...},
 *         dataProduct?: bool,
 *         project?: array{selectionMode?: 'ALL'|'SPECIFIC', specificProjects?: list<string>, ...},
 *         ...,
 *     },
 *     detail?: array{
 *         metadataFormEnforcementDetail?: array{requiredMetadataForms?: list<array>, ...},
 *         glossaryTermEnforcementDetail?: array{requiredGlossaryTermIds?: list<string>, ...},
 *         ...,
 *     },
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSubscriptionGrant(array $args = [])
 * @phpstan-method \Aws\Result createSubscriptionGrant(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     subscriptionTargetIdentifier?: string,
 *     grantedEntity?: array{listing?: array{identifier?: string, revision?: string, ...}, ...},
 *     assetTargetNames?: list<array{assetId?: string, targetName?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriptionGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriptionGrantAsync(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     subscriptionTargetIdentifier?: string,
 *     grantedEntity?: array{listing?: array{identifier?: string, revision?: string, ...}, ...},
 *     assetTargetNames?: list<array{assetId?: string, targetName?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSubscriptionRequest(array $args = [])
 * @phpstan-method \Aws\Result createSubscriptionRequest(array{
 *     domainIdentifier?: string,
 *     subscribedPrincipals?: list<array{project?: array, user?: array, group?: array, iam?: array, ...}>,
 *     subscribedListings?: list<array{identifier?: string, ...}>,
 *     requestReason?: string,
 *     clientToken?: string,
 *     metadataForms?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     assetPermissions?: list<array{assetId?: string, permissions?: array, ...}>,
 *     assetScopes?: list<array{assetId?: string, filterIds?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriptionRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriptionRequestAsync(array{
 *     domainIdentifier?: string,
 *     subscribedPrincipals?: list<array{project?: array, user?: array, group?: array, iam?: array, ...}>,
 *     subscribedListings?: list<array{identifier?: string, ...}>,
 *     requestReason?: string,
 *     clientToken?: string,
 *     metadataForms?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     assetPermissions?: list<array{assetId?: string, permissions?: array, ...}>,
 *     assetScopes?: list<array{assetId?: string, filterIds?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSubscriptionTarget(array $args = [])
 * @phpstan-method \Aws\Result createSubscriptionTarget(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     name?: string,
 *     type?: string,
 *     subscriptionTargetConfig?: list<array{formName?: string, content?: string, ...}>,
 *     authorizedPrincipals?: list<string>,
 *     manageAccessRole?: string,
 *     applicableAssetTypes?: list<string>,
 *     provider?: string,
 *     clientToken?: string,
 *     subscriptionGrantCreationMode?: 'AUTOMATIC'|'MANUAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSubscriptionTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriptionTargetAsync(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     name?: string,
 *     type?: string,
 *     subscriptionTargetConfig?: list<array{formName?: string, content?: string, ...}>,
 *     authorizedPrincipals?: list<string>,
 *     manageAccessRole?: string,
 *     applicableAssetTypes?: list<string>,
 *     provider?: string,
 *     clientToken?: string,
 *     subscriptionGrantCreationMode?: 'AUTOMATIC'|'MANUAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createUserProfile(array $args = [])
 * @phpstan-method \Aws\Result createUserProfile(array{
 *     domainIdentifier?: string,
 *     userIdentifier?: string,
 *     userType?: 'IAM_ROLE'|'IAM_ROLE_SESSION'|'IAM_USER'|'SSO_USER',
 *     sessionName?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUserProfileAsync(array{
 *     domainIdentifier?: string,
 *     userIdentifier?: string,
 *     userType?: 'IAM_ROLE'|'IAM_ROLE_SESSION'|'IAM_USER'|'SSO_USER',
 *     sessionName?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccountPool(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountPool(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountPoolAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteAsset(array $args = [])
 * @phpstan-method \Aws\Result deleteAsset(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteAssetFilter(array $args = [])
 * @phpstan-method \Aws\Result deleteAssetFilter(array{domainIdentifier?: string, assetIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetFilterAsync(array{domainIdentifier?: string, assetIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteAssetType(array $args = [])
 * @phpstan-method \Aws\Result deleteAssetType(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssetTypeAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDataExportConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteDataExportConfiguration(array{domainIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataExportConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataExportConfigurationAsync(array{domainIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDataProduct(array $args = [])
 * @phpstan-method \Aws\Result deleteDataProduct(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataProductAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteDataSource(array $args = [])
 * @phpstan-method \Aws\Result deleteDataSource(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     clientToken?: string,
 *     retainPermissionsOnRevokeFailure?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDataSourceAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     clientToken?: string,
 *     retainPermissionsOnRevokeFailure?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{identifier?: string, clientToken?: string, skipDeletionCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{identifier?: string, clientToken?: string, skipDeletionCheck?: bool, ...} $args = [])
 * @method \Aws\Result deleteDomainUnit(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainUnit(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainUnitAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironment(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironmentAction(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironmentAction(array{domainIdentifier?: string, environmentIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentActionAsync(array{domainIdentifier?: string, environmentIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironmentBlueprint(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironmentBlueprint(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentBlueprintAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironmentBlueprintConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironmentBlueprintConfiguration(array{domainIdentifier?: string, environmentBlueprintIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentBlueprintConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentBlueprintConfigurationAsync(array{domainIdentifier?: string, environmentBlueprintIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteEnvironmentProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironmentProfile(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEnvironmentProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentProfileAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteFormType(array $args = [])
 * @phpstan-method \Aws\Result deleteFormType(array{domainIdentifier?: string, formTypeIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFormTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFormTypeAsync(array{domainIdentifier?: string, formTypeIdentifier?: string, ...} $args = [])
 * @method \Aws\Result deleteGlossary(array $args = [])
 * @phpstan-method \Aws\Result deleteGlossary(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlossaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGlossaryAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteGlossaryTerm(array $args = [])
 * @phpstan-method \Aws\Result deleteGlossaryTerm(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGlossaryTermAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGlossaryTermAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteLineageEvent(array $args = [])
 * @phpstan-method \Aws\Result deleteLineageEvent(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLineageEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLineageEventAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteListing(array $args = [])
 * @phpstan-method \Aws\Result deleteListing(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteListingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteListingAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteNotebook(array $args = [])
 * @phpstan-method \Aws\Result deleteNotebook(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotebookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotebookAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteProject(array $args = [])
 * @phpstan-method \Aws\Result deleteProject(array{domainIdentifier?: string, identifier?: string, skipDeletionCheck?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectAsync(array{domainIdentifier?: string, identifier?: string, skipDeletionCheck?: bool, ...} $args = [])
 * @method \Aws\Result deleteProjectMembership(array $args = [])
 * @phpstan-method \Aws\Result deleteProjectMembership(array{
 *     domainIdentifier?: string,
 *     projectIdentifier?: string,
 *     member?: array{userIdentifier?: string, groupIdentifier?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectMembershipAsync(array{
 *     domainIdentifier?: string,
 *     projectIdentifier?: string,
 *     member?: array{userIdentifier?: string, groupIdentifier?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteProjectProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteProjectProfile(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProjectProfileAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @phpstan-method \Aws\Result deleteRule(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteSubscriptionGrant(array $args = [])
 * @phpstan-method \Aws\Result deleteSubscriptionGrant(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriptionGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubscriptionGrantAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteSubscriptionRequest(array $args = [])
 * @phpstan-method \Aws\Result deleteSubscriptionRequest(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriptionRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubscriptionRequestAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteSubscriptionTarget(array $args = [])
 * @phpstan-method \Aws\Result deleteSubscriptionTarget(array{domainIdentifier?: string, environmentIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSubscriptionTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubscriptionTargetAsync(array{domainIdentifier?: string, environmentIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result deleteTimeSeriesDataPoints(array $args = [])
 * @phpstan-method \Aws\Result deleteTimeSeriesDataPoints(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     formName?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTimeSeriesDataPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTimeSeriesDataPointsAsync(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     formName?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateEnvironmentRole(array $args = [])
 * @phpstan-method \Aws\Result disassociateEnvironmentRole(array{domainIdentifier?: string, environmentIdentifier?: string, environmentRoleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateEnvironmentRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateEnvironmentRoleAsync(array{domainIdentifier?: string, environmentIdentifier?: string, environmentRoleArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateGovernedTerms(array $args = [])
 * @phpstan-method \Aws\Result disassociateGovernedTerms(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET',
 *     governedGlossaryTerms?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateGovernedTermsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateGovernedTermsAsync(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET',
 *     governedGlossaryTerms?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAccountPool(array $args = [])
 * @phpstan-method \Aws\Result getAccountPool(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountPoolAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getAsset(array $args = [])
 * @phpstan-method \Aws\Result getAsset(array{domainIdentifier?: string, identifier?: string, revision?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetAsync(array{domainIdentifier?: string, identifier?: string, revision?: string, ...} $args = [])
 * @method \Aws\Result getAssetFilter(array $args = [])
 * @phpstan-method \Aws\Result getAssetFilter(array{domainIdentifier?: string, assetIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetFilterAsync(array{domainIdentifier?: string, assetIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getAssetType(array $args = [])
 * @phpstan-method \Aws\Result getAssetType(array{domainIdentifier?: string, identifier?: string, revision?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetTypeAsync(array{domainIdentifier?: string, identifier?: string, revision?: string, ...} $args = [])
 * @method \Aws\Result getConnection(array $args = [])
 * @phpstan-method \Aws\Result getConnection(array{domainIdentifier?: string, identifier?: string, withSecret?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionAsync(array{domainIdentifier?: string, identifier?: string, withSecret?: bool, ...} $args = [])
 * @method \Aws\Result getDataExportConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getDataExportConfiguration(array{domainIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataExportConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataExportConfigurationAsync(array{domainIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getDataProduct(array $args = [])
 * @phpstan-method \Aws\Result getDataProduct(array{domainIdentifier?: string, identifier?: string, revision?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataProductAsync(array{domainIdentifier?: string, identifier?: string, revision?: string, ...} $args = [])
 * @method \Aws\Result getDataSource(array $args = [])
 * @phpstan-method \Aws\Result getDataSource(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSourceAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getDataSourceRun(array $args = [])
 * @phpstan-method \Aws\Result getDataSourceRun(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDataSourceRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataSourceRunAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getDomain(array $args = [])
 * @phpstan-method \Aws\Result getDomain(array{identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainAsync(array{identifier?: string, ...} $args = [])
 * @method \Aws\Result getDomainUnit(array $args = [])
 * @phpstan-method \Aws\Result getDomainUnit(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainUnitAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getEnvironment(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getEnvironmentAction(array $args = [])
 * @phpstan-method \Aws\Result getEnvironmentAction(array{domainIdentifier?: string, environmentIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentActionAsync(array{domainIdentifier?: string, environmentIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getEnvironmentBlueprint(array $args = [])
 * @phpstan-method \Aws\Result getEnvironmentBlueprint(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentBlueprintAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getEnvironmentBlueprintConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getEnvironmentBlueprintConfiguration(array{domainIdentifier?: string, environmentBlueprintIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentBlueprintConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentBlueprintConfigurationAsync(array{domainIdentifier?: string, environmentBlueprintIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getEnvironmentCredentials(array $args = [])
 * @phpstan-method \Aws\Result getEnvironmentCredentials(array{domainIdentifier?: string, environmentIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentCredentialsAsync(array{domainIdentifier?: string, environmentIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getEnvironmentProfile(array $args = [])
 * @phpstan-method \Aws\Result getEnvironmentProfile(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnvironmentProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentProfileAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getFormType(array $args = [])
 * @phpstan-method \Aws\Result getFormType(array{domainIdentifier?: string, formTypeIdentifier?: string, revision?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFormTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFormTypeAsync(array{domainIdentifier?: string, formTypeIdentifier?: string, revision?: string, ...} $args = [])
 * @method \Aws\Result getGlossary(array $args = [])
 * @phpstan-method \Aws\Result getGlossary(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlossaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGlossaryAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getGlossaryTerm(array $args = [])
 * @phpstan-method \Aws\Result getGlossaryTerm(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlossaryTermAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGlossaryTermAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getGroupProfile(array $args = [])
 * @phpstan-method \Aws\Result getGroupProfile(array{domainIdentifier?: string, groupIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGroupProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGroupProfileAsync(array{domainIdentifier?: string, groupIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getIamPortalLoginUrl(array $args = [])
 * @phpstan-method \Aws\Result getIamPortalLoginUrl(array{domainIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIamPortalLoginUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIamPortalLoginUrlAsync(array{domainIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getJobRun(array $args = [])
 * @phpstan-method \Aws\Result getJobRun(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobRunAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getLineageEvent(array $args = [])
 * @phpstan-method \Aws\Result getLineageEvent(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLineageEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLineageEventAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getLineageNode(array $args = [])
 * @phpstan-method \Aws\Result getLineageNode(array{domainIdentifier?: string, identifier?: string, eventTimestamp?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLineageNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLineageNodeAsync(array{domainIdentifier?: string, identifier?: string, eventTimestamp?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result getListing(array $args = [])
 * @phpstan-method \Aws\Result getListing(array{domainIdentifier?: string, identifier?: string, listingRevision?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getListingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getListingAsync(array{domainIdentifier?: string, identifier?: string, listingRevision?: string, ...} $args = [])
 * @method \Aws\Result getMetadataGenerationRun(array $args = [])
 * @phpstan-method \Aws\Result getMetadataGenerationRun(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     type?: 'BUSINESS_DESCRIPTIONS'|'BUSINESS_GLOSSARY_ASSOCIATIONS'|'BUSINESS_NAMES',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getMetadataGenerationRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetadataGenerationRunAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     type?: 'BUSINESS_DESCRIPTIONS'|'BUSINESS_GLOSSARY_ASSOCIATIONS'|'BUSINESS_NAMES',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getNotebook(array $args = [])
 * @phpstan-method \Aws\Result getNotebook(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNotebookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNotebookAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getNotebookExport(array $args = [])
 * @phpstan-method \Aws\Result getNotebookExport(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNotebookExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNotebookExportAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getNotebookRun(array $args = [])
 * @phpstan-method \Aws\Result getNotebookRun(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNotebookRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNotebookRunAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getProject(array $args = [])
 * @phpstan-method \Aws\Result getProject(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProjectAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getProjectProfile(array $args = [])
 * @phpstan-method \Aws\Result getProjectProfile(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProjectProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProjectProfileAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getRule(array $args = [])
 * @phpstan-method \Aws\Result getRule(array{domainIdentifier?: string, identifier?: string, revision?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRuleAsync(array{domainIdentifier?: string, identifier?: string, revision?: string, ...} $args = [])
 * @method \Aws\Result getSubscription(array $args = [])
 * @phpstan-method \Aws\Result getSubscription(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubscriptionAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getSubscriptionGrant(array $args = [])
 * @phpstan-method \Aws\Result getSubscriptionGrant(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubscriptionGrantAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getSubscriptionRequestDetails(array $args = [])
 * @phpstan-method \Aws\Result getSubscriptionRequestDetails(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionRequestDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubscriptionRequestDetailsAsync(array{domainIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getSubscriptionTarget(array $args = [])
 * @phpstan-method \Aws\Result getSubscriptionTarget(array{domainIdentifier?: string, environmentIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSubscriptionTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubscriptionTargetAsync(array{domainIdentifier?: string, environmentIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \Aws\Result getTimeSeriesDataPoint(array $args = [])
 * @phpstan-method \Aws\Result getTimeSeriesDataPoint(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     identifier?: string,
 *     formName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTimeSeriesDataPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTimeSeriesDataPointAsync(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     identifier?: string,
 *     formName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getUserProfile(array $args = [])
 * @phpstan-method \Aws\Result getUserProfile(array{domainIdentifier?: string, userIdentifier?: string, type?: 'IAM'|'SSO', sessionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUserProfileAsync(array{domainIdentifier?: string, userIdentifier?: string, type?: 'IAM'|'SSO', sessionName?: string, ...} $args = [])
 * @method \Aws\Result listAccountPools(array $args = [])
 * @phpstan-method \Aws\Result listAccountPools(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     sortBy?: 'NAME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountPoolsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountPoolsAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     sortBy?: 'NAME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccountsInAccountPool(array $args = [])
 * @phpstan-method \Aws\Result listAccountsInAccountPool(array{domainIdentifier?: string, identifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountsInAccountPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccountsInAccountPoolAsync(array{domainIdentifier?: string, identifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listAssetFilters(array $args = [])
 * @phpstan-method \Aws\Result listAssetFilters(array{
 *     domainIdentifier?: string,
 *     assetIdentifier?: string,
 *     status?: 'INVALID'|'VALID',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetFiltersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetFiltersAsync(array{
 *     domainIdentifier?: string,
 *     assetIdentifier?: string,
 *     status?: 'INVALID'|'VALID',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAssetRevisions(array $args = [])
 * @phpstan-method \Aws\Result listAssetRevisions(array{domainIdentifier?: string, identifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetRevisionsAsync(array{domainIdentifier?: string, identifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listConnections(array $args = [])
 * @phpstan-method \Aws\Result listConnections(array{
 *     domainIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'NAME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     name?: string,
 *     environmentIdentifier?: string,
 *     projectIdentifier?: string,
 *     type?: 'AMAZON_Q'|'ATHENA'|'BIGQUERY'|'DATABRICKS'|'DOCUMENTDB'|'DYNAMODB'|'HYPERPOD'|'IAM'|'MLFLOW'|'MYSQL'|'OPENSEARCH'|'ORACLE'|'POSTGRESQL'|'REDSHIFT'|'S3'|'SAPHANA'|'SNOWFLAKE'|'SPARK'|'SQLSERVER'|'TERADATA'|'VERTICA'|'VPC'|'WORKFLOWS_MWAA',
 *     scope?: 'DOMAIN'|'PROJECT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectionsAsync(array{
 *     domainIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: 'NAME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     name?: string,
 *     environmentIdentifier?: string,
 *     projectIdentifier?: string,
 *     type?: 'AMAZON_Q'|'ATHENA'|'BIGQUERY'|'DATABRICKS'|'DOCUMENTDB'|'DYNAMODB'|'HYPERPOD'|'IAM'|'MLFLOW'|'MYSQL'|'OPENSEARCH'|'ORACLE'|'POSTGRESQL'|'REDSHIFT'|'S3'|'SAPHANA'|'SNOWFLAKE'|'SPARK'|'SQLSERVER'|'TERADATA'|'VERTICA'|'VPC'|'WORKFLOWS_MWAA',
 *     scope?: 'DOMAIN'|'PROJECT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataProductRevisions(array $args = [])
 * @phpstan-method \Aws\Result listDataProductRevisions(array{domainIdentifier?: string, identifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataProductRevisionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataProductRevisionsAsync(array{domainIdentifier?: string, identifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDataSourceRunActivities(array $args = [])
 * @phpstan-method \Aws\Result listDataSourceRunActivities(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     status?: 'FAILED'|'PUBLISHING_FAILED'|'SKIPPED_ALREADY_IMPORTED'|'SKIPPED_ARCHIVED'|'SKIPPED_NO_ACCESS'|'SUCCEEDED_CREATED'|'SUCCEEDED_UPDATED'|'UNCHANGED',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourceRunActivitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourceRunActivitiesAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     status?: 'FAILED'|'PUBLISHING_FAILED'|'SKIPPED_ALREADY_IMPORTED'|'SKIPPED_ARCHIVED'|'SKIPPED_NO_ACCESS'|'SUCCEEDED_CREATED'|'SUCCEEDED_UPDATED'|'UNCHANGED',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataSourceRuns(array $args = [])
 * @phpstan-method \Aws\Result listDataSourceRuns(array{
 *     domainIdentifier?: string,
 *     dataSourceIdentifier?: string,
 *     status?: 'FAILED'|'PARTIALLY_SUCCEEDED'|'REQUESTED'|'RUNNING'|'SUCCESS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourceRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourceRunsAsync(array{
 *     domainIdentifier?: string,
 *     dataSourceIdentifier?: string,
 *     status?: 'FAILED'|'PARTIALLY_SUCCEEDED'|'REQUESTED'|'RUNNING'|'SUCCESS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDataSources(array $args = [])
 * @phpstan-method \Aws\Result listDataSources(array{
 *     domainIdentifier?: string,
 *     projectIdentifier?: string,
 *     environmentIdentifier?: string,
 *     connectionIdentifier?: string,
 *     type?: string,
 *     status?: 'CREATING'|'DELETING'|'FAILED_CREATION'|'FAILED_DELETION'|'FAILED_UPDATE'|'READY'|'RUNNING'|'UPDATING',
 *     name?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDataSourcesAsync(array{
 *     domainIdentifier?: string,
 *     projectIdentifier?: string,
 *     environmentIdentifier?: string,
 *     connectionIdentifier?: string,
 *     type?: string,
 *     status?: 'CREATING'|'DELETING'|'FAILED_CREATION'|'FAILED_DELETION'|'FAILED_UPDATE'|'READY'|'RUNNING'|'UPDATING',
 *     name?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDomainUnitsForParent(array $args = [])
 * @phpstan-method \Aws\Result listDomainUnitsForParent(array{
 *     domainIdentifier?: string,
 *     parentDomainUnitIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainUnitsForParentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainUnitsForParentAsync(array{
 *     domainIdentifier?: string,
 *     parentDomainUnitIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @phpstan-method \Aws\Result listDomains(array{
 *     status?: 'AVAILABLE'|'CREATING'|'CREATION_FAILED'|'DELETED'|'DELETING'|'DELETION_FAILED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsAsync(array{
 *     status?: 'AVAILABLE'|'CREATING'|'CREATION_FAILED'|'DELETED'|'DELETING'|'DELETION_FAILED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEntityOwners(array $args = [])
 * @phpstan-method \Aws\Result listEntityOwners(array{
 *     domainIdentifier?: string,
 *     entityType?: 'DOMAIN_UNIT',
 *     entityIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEntityOwnersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEntityOwnersAsync(array{
 *     domainIdentifier?: string,
 *     entityType?: 'DOMAIN_UNIT',
 *     entityIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEnvironmentActions(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentActions(array{domainIdentifier?: string, environmentIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentActionsAsync(array{domainIdentifier?: string, environmentIdentifier?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listEnvironmentBlueprintConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentBlueprintConfigurations(array{domainIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentBlueprintConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentBlueprintConfigurationsAsync(array{domainIdentifier?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listEnvironmentBlueprints(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentBlueprints(array{domainIdentifier?: string, maxResults?: int, nextToken?: string, name?: string, managed?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentBlueprintsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentBlueprintsAsync(array{domainIdentifier?: string, maxResults?: int, nextToken?: string, name?: string, managed?: bool, ...} $args = [])
 * @method \Aws\Result listEnvironmentProfiles(array $args = [])
 * @phpstan-method \Aws\Result listEnvironmentProfiles(array{
 *     domainIdentifier?: string,
 *     awsAccountId?: string,
 *     awsAccountRegion?: string,
 *     environmentBlueprintIdentifier?: string,
 *     projectIdentifier?: string,
 *     name?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentProfilesAsync(array{
 *     domainIdentifier?: string,
 *     awsAccountId?: string,
 *     awsAccountRegion?: string,
 *     environmentBlueprintIdentifier?: string,
 *     projectIdentifier?: string,
 *     name?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{
 *     domainIdentifier?: string,
 *     awsAccountId?: string,
 *     status?: 'ACTIVE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETE_FAILED'|'DELETING'|'DISABLED'|'EXPIRED'|'INACCESSIBLE'|'SUSPENDED'|'UPDATE_FAILED'|'UPDATING'|'VALIDATION_FAILED',
 *     awsAccountRegion?: string,
 *     projectIdentifier?: string,
 *     environmentProfileIdentifier?: string,
 *     environmentBlueprintIdentifier?: string,
 *     provider?: string,
 *     name?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{
 *     domainIdentifier?: string,
 *     awsAccountId?: string,
 *     status?: 'ACTIVE'|'CREATE_FAILED'|'CREATING'|'DELETED'|'DELETE_FAILED'|'DELETING'|'DISABLED'|'EXPIRED'|'INACCESSIBLE'|'SUSPENDED'|'UPDATE_FAILED'|'UPDATING'|'VALIDATION_FAILED',
 *     awsAccountRegion?: string,
 *     projectIdentifier?: string,
 *     environmentProfileIdentifier?: string,
 *     environmentBlueprintIdentifier?: string,
 *     provider?: string,
 *     name?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobRuns(array $args = [])
 * @phpstan-method \Aws\Result listJobRuns(array{
 *     domainIdentifier?: string,
 *     jobIdentifier?: string,
 *     status?: 'ABORTED'|'CANCELED'|'FAILED'|'IN_PROGRESS'|'PARTIALLY_SUCCEEDED'|'SCHEDULED'|'SUCCESS'|'TIMED_OUT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobRunsAsync(array{
 *     domainIdentifier?: string,
 *     jobIdentifier?: string,
 *     status?: 'ABORTED'|'CANCELED'|'FAILED'|'IN_PROGRESS'|'PARTIALLY_SUCCEEDED'|'SCHEDULED'|'SUCCESS'|'TIMED_OUT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLineageEvents(array $args = [])
 * @phpstan-method \Aws\Result listLineageEvents(array{
 *     domainIdentifier?: string,
 *     maxResults?: int,
 *     timestampAfter?: int|string|\DateTimeInterface,
 *     timestampBefore?: int|string|\DateTimeInterface,
 *     processingStatus?: 'FAILED'|'PROCESSING'|'REQUESTED'|'SUCCESS',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLineageEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLineageEventsAsync(array{
 *     domainIdentifier?: string,
 *     maxResults?: int,
 *     timestampAfter?: int|string|\DateTimeInterface,
 *     timestampBefore?: int|string|\DateTimeInterface,
 *     processingStatus?: 'FAILED'|'PROCESSING'|'REQUESTED'|'SUCCESS',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLineageNodeHistory(array $args = [])
 * @phpstan-method \Aws\Result listLineageNodeHistory(array{
 *     domainIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     identifier?: string,
 *     direction?: 'DOWNSTREAM'|'UPSTREAM',
 *     eventTimestampGTE?: int|string|\DateTimeInterface,
 *     eventTimestampLTE?: int|string|\DateTimeInterface,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLineageNodeHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLineageNodeHistoryAsync(array{
 *     domainIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     identifier?: string,
 *     direction?: 'DOWNSTREAM'|'UPSTREAM',
 *     eventTimestampGTE?: int|string|\DateTimeInterface,
 *     eventTimestampLTE?: int|string|\DateTimeInterface,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMetadataGenerationRuns(array $args = [])
 * @phpstan-method \Aws\Result listMetadataGenerationRuns(array{
 *     domainIdentifier?: string,
 *     status?: 'CANCELED'|'FAILED'|'IN_PROGRESS'|'PARTIALLY_SUCCEEDED'|'SUBMITTED'|'SUCCEEDED',
 *     type?: 'BUSINESS_DESCRIPTIONS'|'BUSINESS_GLOSSARY_ASSOCIATIONS'|'BUSINESS_NAMES',
 *     nextToken?: string,
 *     maxResults?: int,
 *     targetIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMetadataGenerationRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMetadataGenerationRunsAsync(array{
 *     domainIdentifier?: string,
 *     status?: 'CANCELED'|'FAILED'|'IN_PROGRESS'|'PARTIALLY_SUCCEEDED'|'SUBMITTED'|'SUCCEEDED',
 *     type?: 'BUSINESS_DESCRIPTIONS'|'BUSINESS_GLOSSARY_ASSOCIATIONS'|'BUSINESS_NAMES',
 *     nextToken?: string,
 *     maxResults?: int,
 *     targetIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotebookRuns(array $args = [])
 * @phpstan-method \Aws\Result listNotebookRuns(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     notebookIdentifier?: string,
 *     status?: 'FAILED'|'QUEUED'|'RUNNING'|'STARTING'|'STOPPED'|'STOPPING'|'SUCCEEDED',
 *     scheduleIdentifier?: string,
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotebookRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotebookRunsAsync(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     notebookIdentifier?: string,
 *     status?: 'FAILED'|'QUEUED'|'RUNNING'|'STARTING'|'STOPPED'|'STOPPING'|'SUCCEEDED',
 *     scheduleIdentifier?: string,
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotebooks(array $args = [])
 * @phpstan-method \Aws\Result listNotebooks(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     status?: 'ACTIVE'|'ARCHIVED'|'SYNC_FAILED'|'SYNC_IN_PROGRESS',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotebooksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotebooksAsync(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     maxResults?: int,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     status?: 'ACTIVE'|'ARCHIVED'|'SYNC_FAILED'|'SYNC_IN_PROGRESS',
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotifications(array $args = [])
 * @phpstan-method \Aws\Result listNotifications(array{
 *     domainIdentifier?: string,
 *     type?: 'EVENT'|'TASK',
 *     afterTimestamp?: int|string|\DateTimeInterface,
 *     beforeTimestamp?: int|string|\DateTimeInterface,
 *     subjects?: list<string>,
 *     taskStatus?: 'ACTIVE'|'INACTIVE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotificationsAsync(array{
 *     domainIdentifier?: string,
 *     type?: 'EVENT'|'TASK',
 *     afterTimestamp?: int|string|\DateTimeInterface,
 *     beforeTimestamp?: int|string|\DateTimeInterface,
 *     subjects?: list<string>,
 *     taskStatus?: 'ACTIVE'|'INACTIVE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPolicyGrants(array $args = [])
 * @phpstan-method \Aws\Result listPolicyGrants(array{
 *     domainIdentifier?: string,
 *     entityType?: 'ASSET_TYPE'|'DOMAIN_UNIT'|'ENVIRONMENT_BLUEPRINT_CONFIGURATION'|'ENVIRONMENT_PROFILE',
 *     entityIdentifier?: string,
 *     policyType?: 'ADD_TO_PROJECT_MEMBER_POOL'|'CREATE_ASSET_TYPE'|'CREATE_DOMAIN_UNIT'|'CREATE_ENVIRONMENT'|'CREATE_ENVIRONMENT_FROM_BLUEPRINT'|'CREATE_ENVIRONMENT_PROFILE'|'CREATE_FORM_TYPE'|'CREATE_GLOSSARY'|'CREATE_PROJECT'|'CREATE_PROJECT_FROM_PROJECT_PROFILE'|'DELEGATE_CREATE_ENVIRONMENT_PROFILE'|'OVERRIDE_DOMAIN_UNIT_OWNERS'|'OVERRIDE_PROJECT_OWNERS'|'USE_ASSET_TYPE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyGrantsAsync(array{
 *     domainIdentifier?: string,
 *     entityType?: 'ASSET_TYPE'|'DOMAIN_UNIT'|'ENVIRONMENT_BLUEPRINT_CONFIGURATION'|'ENVIRONMENT_PROFILE',
 *     entityIdentifier?: string,
 *     policyType?: 'ADD_TO_PROJECT_MEMBER_POOL'|'CREATE_ASSET_TYPE'|'CREATE_DOMAIN_UNIT'|'CREATE_ENVIRONMENT'|'CREATE_ENVIRONMENT_FROM_BLUEPRINT'|'CREATE_ENVIRONMENT_PROFILE'|'CREATE_FORM_TYPE'|'CREATE_GLOSSARY'|'CREATE_PROJECT'|'CREATE_PROJECT_FROM_PROJECT_PROFILE'|'DELEGATE_CREATE_ENVIRONMENT_PROFILE'|'OVERRIDE_DOMAIN_UNIT_OWNERS'|'OVERRIDE_PROJECT_OWNERS'|'USE_ASSET_TYPE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProjectMemberships(array $args = [])
 * @phpstan-method \Aws\Result listProjectMemberships(array{
 *     domainIdentifier?: string,
 *     projectIdentifier?: string,
 *     sortBy?: 'NAME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectMembershipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProjectMembershipsAsync(array{
 *     domainIdentifier?: string,
 *     projectIdentifier?: string,
 *     sortBy?: 'NAME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProjectProfiles(array $args = [])
 * @phpstan-method \Aws\Result listProjectProfiles(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     sortBy?: 'NAME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProjectProfilesAsync(array{
 *     domainIdentifier?: string,
 *     name?: string,
 *     sortBy?: 'NAME',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProjects(array $args = [])
 * @phpstan-method \Aws\Result listProjects(array{
 *     domainIdentifier?: string,
 *     userIdentifier?: string,
 *     groupIdentifier?: string,
 *     name?: string,
 *     projectCategory?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProjectsAsync(array{
 *     domainIdentifier?: string,
 *     userIdentifier?: string,
 *     groupIdentifier?: string,
 *     name?: string,
 *     projectCategory?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRules(array $args = [])
 * @phpstan-method \Aws\Result listRules(array{
 *     domainIdentifier?: string,
 *     targetType?: 'DOMAIN_UNIT',
 *     targetIdentifier?: string,
 *     ruleType?: 'GLOSSARY_TERM_ENFORCEMENT'|'METADATA_FORM_ENFORCEMENT',
 *     action?: 'CREATE_LISTING_CHANGE_SET'|'CREATE_SUBSCRIPTION_REQUEST',
 *     projectIds?: list<string>,
 *     assetTypes?: list<string>,
 *     dataProduct?: bool,
 *     includeCascaded?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRulesAsync(array{
 *     domainIdentifier?: string,
 *     targetType?: 'DOMAIN_UNIT',
 *     targetIdentifier?: string,
 *     ruleType?: 'GLOSSARY_TERM_ENFORCEMENT'|'METADATA_FORM_ENFORCEMENT',
 *     action?: 'CREATE_LISTING_CHANGE_SET'|'CREATE_SUBSCRIPTION_REQUEST',
 *     projectIds?: list<string>,
 *     assetTypes?: list<string>,
 *     dataProduct?: bool,
 *     includeCascaded?: bool,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSubscriptionGrants(array $args = [])
 * @phpstan-method \Aws\Result listSubscriptionGrants(array{
 *     domainIdentifier?: string,
 *     environmentId?: string,
 *     subscriptionTargetId?: string,
 *     subscribedListingId?: string,
 *     subscriptionId?: string,
 *     owningProjectId?: string,
 *     owningIamPrincipalArn?: string,
 *     owningUserId?: string,
 *     owningGroupId?: string,
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionGrantsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscriptionGrantsAsync(array{
 *     domainIdentifier?: string,
 *     environmentId?: string,
 *     subscriptionTargetId?: string,
 *     subscribedListingId?: string,
 *     subscriptionId?: string,
 *     owningProjectId?: string,
 *     owningIamPrincipalArn?: string,
 *     owningUserId?: string,
 *     owningGroupId?: string,
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSubscriptionRequests(array $args = [])
 * @phpstan-method \Aws\Result listSubscriptionRequests(array{
 *     domainIdentifier?: string,
 *     status?: 'ACCEPTED'|'PENDING'|'REJECTED',
 *     subscribedListingId?: string,
 *     owningProjectId?: string,
 *     owningIamPrincipalArn?: string,
 *     approverProjectId?: string,
 *     owningUserId?: string,
 *     owningGroupId?: string,
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionRequestsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscriptionRequestsAsync(array{
 *     domainIdentifier?: string,
 *     status?: 'ACCEPTED'|'PENDING'|'REJECTED',
 *     subscribedListingId?: string,
 *     owningProjectId?: string,
 *     owningIamPrincipalArn?: string,
 *     approverProjectId?: string,
 *     owningUserId?: string,
 *     owningGroupId?: string,
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSubscriptionTargets(array $args = [])
 * @phpstan-method \Aws\Result listSubscriptionTargets(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscriptionTargetsAsync(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listSubscriptions(array{
 *     domainIdentifier?: string,
 *     subscriptionRequestIdentifier?: string,
 *     status?: 'APPROVED'|'CANCELLED'|'REVOKED',
 *     subscribedListingId?: string,
 *     owningProjectId?: string,
 *     owningIamPrincipalArn?: string,
 *     owningUserId?: string,
 *     owningGroupId?: string,
 *     approverProjectId?: string,
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubscriptionsAsync(array{
 *     domainIdentifier?: string,
 *     subscriptionRequestIdentifier?: string,
 *     status?: 'APPROVED'|'CANCELLED'|'REVOKED',
 *     subscribedListingId?: string,
 *     owningProjectId?: string,
 *     owningIamPrincipalArn?: string,
 *     owningUserId?: string,
 *     owningGroupId?: string,
 *     approverProjectId?: string,
 *     sortBy?: 'CREATED_AT'|'UPDATED_AT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listTimeSeriesDataPoints(array $args = [])
 * @phpstan-method \Aws\Result listTimeSeriesDataPoints(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     formName?: string,
 *     startedAt?: int|string|\DateTimeInterface,
 *     endedAt?: int|string|\DateTimeInterface,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTimeSeriesDataPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTimeSeriesDataPointsAsync(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     formName?: string,
 *     startedAt?: int|string|\DateTimeInterface,
 *     endedAt?: int|string|\DateTimeInterface,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result postLineageEvent(array $args = [])
 * @phpstan-method \Aws\Result postLineageEvent(array{
 *     domainIdentifier?: string,
 *     event?: string|resource|\Psr\Http\Message\StreamInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise postLineageEventAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise postLineageEventAsync(array{
 *     domainIdentifier?: string,
 *     event?: string|resource|\Psr\Http\Message\StreamInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result postTimeSeriesDataPoints(array $args = [])
 * @phpstan-method \Aws\Result postTimeSeriesDataPoints(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     forms?: list<array{
 *         formName?: string,
 *         typeIdentifier?: string,
 *         typeRevision?: string,
 *         timestamp?: int|string|\DateTimeInterface,
 *         content?: string,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise postTimeSeriesDataPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise postTimeSeriesDataPointsAsync(array{
 *     domainIdentifier?: string,
 *     entityIdentifier?: string,
 *     entityType?: 'ASSET'|'LISTING',
 *     forms?: list<array{
 *         formName?: string,
 *         typeIdentifier?: string,
 *         typeRevision?: string,
 *         timestamp?: int|string|\DateTimeInterface,
 *         content?: string,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putDataExportConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putDataExportConfiguration(array{
 *     domainIdentifier?: string,
 *     enableExport?: bool,
 *     encryptionConfiguration?: array{kmsKeyArn?: string, sseAlgorithm?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putDataExportConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDataExportConfigurationAsync(array{
 *     domainIdentifier?: string,
 *     enableExport?: bool,
 *     encryptionConfiguration?: array{kmsKeyArn?: string, sseAlgorithm?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putEnvironmentBlueprintConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putEnvironmentBlueprintConfiguration(array{
 *     domainIdentifier?: string,
 *     environmentBlueprintIdentifier?: string,
 *     provisioningRoleArn?: string,
 *     manageAccessRoleArn?: string,
 *     environmentRolePermissionBoundary?: string,
 *     enabledRegions?: list<string>,
 *     regionalParameters?: array<string, array<string, string>>,
 *     resourceConfigurations?: list<array{name?: string, description?: string, region?: string, parameters?: array<string, string>, ...}>,
 *     allowUserProvidedConfigurations?: bool,
 *     globalParameters?: array<string, string>,
 *     provisioningConfigurations?: list<array{lakeFormationConfiguration?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putEnvironmentBlueprintConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putEnvironmentBlueprintConfigurationAsync(array{
 *     domainIdentifier?: string,
 *     environmentBlueprintIdentifier?: string,
 *     provisioningRoleArn?: string,
 *     manageAccessRoleArn?: string,
 *     environmentRolePermissionBoundary?: string,
 *     enabledRegions?: list<string>,
 *     regionalParameters?: array<string, array<string, string>>,
 *     resourceConfigurations?: list<array{name?: string, description?: string, region?: string, parameters?: array<string, string>, ...}>,
 *     allowUserProvidedConfigurations?: bool,
 *     globalParameters?: array<string, string>,
 *     provisioningConfigurations?: list<array{lakeFormationConfiguration?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result queryGraph(array $args = [])
 * @phpstan-method \Aws\Result queryGraph(array{
 *     domainIdentifier?: string,
 *     match?: list<array{relationPattern?: array, entityPattern?: array, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     additionalAttributes?: array{formNames?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise queryGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryGraphAsync(array{
 *     domainIdentifier?: string,
 *     match?: list<array{relationPattern?: array, entityPattern?: array, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     additionalAttributes?: array{formNames?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result rejectPredictions(array $args = [])
 * @phpstan-method \Aws\Result rejectPredictions(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     revision?: string,
 *     rejectRule?: array{rule?: 'ALL'|'NONE', threshold?: float, ...},
 *     rejectChoices?: list<array{predictionTarget?: string, predictionChoices?: list<int>, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectPredictionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectPredictionsAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     revision?: string,
 *     rejectRule?: array{rule?: 'ALL'|'NONE', threshold?: float, ...},
 *     rejectChoices?: list<array{predictionTarget?: string, predictionChoices?: list<int>, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rejectSubscriptionRequest(array $args = [])
 * @phpstan-method \Aws\Result rejectSubscriptionRequest(array{domainIdentifier?: string, identifier?: string, decisionComment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectSubscriptionRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectSubscriptionRequestAsync(array{domainIdentifier?: string, identifier?: string, decisionComment?: string, ...} $args = [])
 * @method \Aws\Result removeEntityOwner(array $args = [])
 * @phpstan-method \Aws\Result removeEntityOwner(array{
 *     domainIdentifier?: string,
 *     entityType?: 'DOMAIN_UNIT',
 *     entityIdentifier?: string,
 *     owner?: array{user?: array{userIdentifier?: string, ...}, group?: array{groupIdentifier?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removeEntityOwnerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeEntityOwnerAsync(array{
 *     domainIdentifier?: string,
 *     entityType?: 'DOMAIN_UNIT',
 *     entityIdentifier?: string,
 *     owner?: array{user?: array{userIdentifier?: string, ...}, group?: array{groupIdentifier?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result removePolicyGrant(array $args = [])
 * @phpstan-method \Aws\Result removePolicyGrant(array{
 *     domainIdentifier?: string,
 *     entityType?: 'ASSET_TYPE'|'DOMAIN_UNIT'|'ENVIRONMENT_BLUEPRINT_CONFIGURATION'|'ENVIRONMENT_PROFILE',
 *     entityIdentifier?: string,
 *     policyType?: 'ADD_TO_PROJECT_MEMBER_POOL'|'CREATE_ASSET_TYPE'|'CREATE_DOMAIN_UNIT'|'CREATE_ENVIRONMENT'|'CREATE_ENVIRONMENT_FROM_BLUEPRINT'|'CREATE_ENVIRONMENT_PROFILE'|'CREATE_FORM_TYPE'|'CREATE_GLOSSARY'|'CREATE_PROJECT'|'CREATE_PROJECT_FROM_PROJECT_PROFILE'|'DELEGATE_CREATE_ENVIRONMENT_PROFILE'|'OVERRIDE_DOMAIN_UNIT_OWNERS'|'OVERRIDE_PROJECT_OWNERS'|'USE_ASSET_TYPE',
 *     principal?: array{
 *         user?: array{userIdentifier?: string, allUsersGrantFilter?: array, ...},
 *         group?: array{groupIdentifier?: string, ...},
 *         project?: array{
 *             projectDesignation?: 'CONTRIBUTOR'|'OWNER'|'PROJECT_CATALOG_STEWARD',
 *             projectIdentifier?: string,
 *             projectGrantFilter?: array,
 *             ...,
 *         },
 *         domainUnit?: array{domainUnitDesignation?: 'OWNER', domainUnitIdentifier?: string, domainUnitGrantFilter?: array, ...},
 *         ...,
 *     },
 *     grantIdentifier?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removePolicyGrantAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removePolicyGrantAsync(array{
 *     domainIdentifier?: string,
 *     entityType?: 'ASSET_TYPE'|'DOMAIN_UNIT'|'ENVIRONMENT_BLUEPRINT_CONFIGURATION'|'ENVIRONMENT_PROFILE',
 *     entityIdentifier?: string,
 *     policyType?: 'ADD_TO_PROJECT_MEMBER_POOL'|'CREATE_ASSET_TYPE'|'CREATE_DOMAIN_UNIT'|'CREATE_ENVIRONMENT'|'CREATE_ENVIRONMENT_FROM_BLUEPRINT'|'CREATE_ENVIRONMENT_PROFILE'|'CREATE_FORM_TYPE'|'CREATE_GLOSSARY'|'CREATE_PROJECT'|'CREATE_PROJECT_FROM_PROJECT_PROFILE'|'DELEGATE_CREATE_ENVIRONMENT_PROFILE'|'OVERRIDE_DOMAIN_UNIT_OWNERS'|'OVERRIDE_PROJECT_OWNERS'|'USE_ASSET_TYPE',
 *     principal?: array{
 *         user?: array{userIdentifier?: string, allUsersGrantFilter?: array, ...},
 *         group?: array{groupIdentifier?: string, ...},
 *         project?: array{
 *             projectDesignation?: 'CONTRIBUTOR'|'OWNER'|'PROJECT_CATALOG_STEWARD',
 *             projectIdentifier?: string,
 *             projectGrantFilter?: array,
 *             ...,
 *         },
 *         domainUnit?: array{domainUnitDesignation?: 'OWNER', domainUnitIdentifier?: string, domainUnitGrantFilter?: array, ...},
 *         ...,
 *     },
 *     grantIdentifier?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result revokeSubscription(array $args = [])
 * @phpstan-method \Aws\Result revokeSubscription(array{domainIdentifier?: string, identifier?: string, retainPermissions?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeSubscriptionAsync(array{domainIdentifier?: string, identifier?: string, retainPermissions?: bool, ...} $args = [])
 * @method \Aws\Result search(array $args = [])
 * @phpstan-method \Aws\Result search(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchScope?: 'ASSET'|'DATA_PRODUCT'|'GLOSSARY'|'GLOSSARY_TERM',
 *     searchText?: string,
 *     searchIn?: list<array{attribute?: string, ...}>,
 *     filters?: array{
 *         filter?: array{
 *             attribute?: string,
 *             value?: string,
 *             intValue?: int,
 *             operator?: 'EQ'|'GE'|'GT'|'LE'|'LT'|'TEXT_SEARCH',
 *             ...,
 *         },
 *         and?: list<array>,
 *         or?: list<array>,
 *         ...,
 *     },
 *     sort?: array{attribute?: string, order?: 'ASCENDING'|'DESCENDING', ...},
 *     additionalAttributes?: list<'FORMS'|'TEXT_MATCH_RATIONALE'|'TIME_SERIES_DATA_POINT_FORMS'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAsync(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchScope?: 'ASSET'|'DATA_PRODUCT'|'GLOSSARY'|'GLOSSARY_TERM',
 *     searchText?: string,
 *     searchIn?: list<array{attribute?: string, ...}>,
 *     filters?: array{
 *         filter?: array{
 *             attribute?: string,
 *             value?: string,
 *             intValue?: int,
 *             operator?: 'EQ'|'GE'|'GT'|'LE'|'LT'|'TEXT_SEARCH',
 *             ...,
 *         },
 *         and?: list<array>,
 *         or?: list<array>,
 *         ...,
 *     },
 *     sort?: array{attribute?: string, order?: 'ASCENDING'|'DESCENDING', ...},
 *     additionalAttributes?: list<'FORMS'|'TEXT_MATCH_RATIONALE'|'TIME_SERIES_DATA_POINT_FORMS'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchGroupProfiles(array $args = [])
 * @phpstan-method \Aws\Result searchGroupProfiles(array{
 *     domainIdentifier?: string,
 *     groupType?: 'DATAZONE_SSO_GROUP'|'IAM_ROLE_SESSION_GROUP'|'SSO_GROUP',
 *     searchText?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchGroupProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchGroupProfilesAsync(array{
 *     domainIdentifier?: string,
 *     groupType?: 'DATAZONE_SSO_GROUP'|'IAM_ROLE_SESSION_GROUP'|'SSO_GROUP',
 *     searchText?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchListings(array $args = [])
 * @phpstan-method \Aws\Result searchListings(array{
 *     domainIdentifier?: string,
 *     searchText?: string,
 *     searchIn?: list<array{attribute?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: array{
 *         filter?: array{
 *             attribute?: string,
 *             value?: string,
 *             intValue?: int,
 *             operator?: 'EQ'|'GE'|'GT'|'LE'|'LT'|'TEXT_SEARCH',
 *             ...,
 *         },
 *         and?: list<array>,
 *         or?: list<array>,
 *         ...,
 *     },
 *     aggregations?: list<array{attribute?: string, displayValue?: string, ...}>,
 *     sort?: array{attribute?: string, order?: 'ASCENDING'|'DESCENDING', ...},
 *     additionalAttributes?: list<'FORMS'|'TEXT_MATCH_RATIONALE'|'TIME_SERIES_DATA_POINT_FORMS'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchListingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchListingsAsync(array{
 *     domainIdentifier?: string,
 *     searchText?: string,
 *     searchIn?: list<array{attribute?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: array{
 *         filter?: array{
 *             attribute?: string,
 *             value?: string,
 *             intValue?: int,
 *             operator?: 'EQ'|'GE'|'GT'|'LE'|'LT'|'TEXT_SEARCH',
 *             ...,
 *         },
 *         and?: list<array>,
 *         or?: list<array>,
 *         ...,
 *     },
 *     aggregations?: list<array{attribute?: string, displayValue?: string, ...}>,
 *     sort?: array{attribute?: string, order?: 'ASCENDING'|'DESCENDING', ...},
 *     additionalAttributes?: list<'FORMS'|'TEXT_MATCH_RATIONALE'|'TIME_SERIES_DATA_POINT_FORMS'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchTypes(array $args = [])
 * @phpstan-method \Aws\Result searchTypes(array{
 *     domainIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchScope?: 'ASSET_TYPE'|'FORM_TYPE'|'LINEAGE_NODE_TYPE',
 *     searchText?: string,
 *     searchIn?: list<array{attribute?: string, ...}>,
 *     filters?: array{
 *         filter?: array{
 *             attribute?: string,
 *             value?: string,
 *             intValue?: int,
 *             operator?: 'EQ'|'GE'|'GT'|'LE'|'LT'|'TEXT_SEARCH',
 *             ...,
 *         },
 *         and?: list<array>,
 *         or?: list<array>,
 *         ...,
 *     },
 *     sort?: array{attribute?: string, order?: 'ASCENDING'|'DESCENDING', ...},
 *     managed?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchTypesAsync(array{
 *     domainIdentifier?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchScope?: 'ASSET_TYPE'|'FORM_TYPE'|'LINEAGE_NODE_TYPE',
 *     searchText?: string,
 *     searchIn?: list<array{attribute?: string, ...}>,
 *     filters?: array{
 *         filter?: array{
 *             attribute?: string,
 *             value?: string,
 *             intValue?: int,
 *             operator?: 'EQ'|'GE'|'GT'|'LE'|'LT'|'TEXT_SEARCH',
 *             ...,
 *         },
 *         and?: list<array>,
 *         or?: list<array>,
 *         ...,
 *     },
 *     sort?: array{attribute?: string, order?: 'ASCENDING'|'DESCENDING', ...},
 *     managed?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchUserProfiles(array $args = [])
 * @phpstan-method \Aws\Result searchUserProfiles(array{
 *     domainIdentifier?: string,
 *     userType?: 'DATAZONE_IAM_USER'|'DATAZONE_SSO_USER'|'DATAZONE_USER'|'SSO_USER',
 *     searchText?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchUserProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchUserProfilesAsync(array{
 *     domainIdentifier?: string,
 *     userType?: 'DATAZONE_IAM_USER'|'DATAZONE_SSO_USER'|'DATAZONE_USER'|'SSO_USER',
 *     searchText?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDataSourceRun(array $args = [])
 * @phpstan-method \Aws\Result startDataSourceRun(array{domainIdentifier?: string, dataSourceIdentifier?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDataSourceRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDataSourceRunAsync(array{domainIdentifier?: string, dataSourceIdentifier?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result startMetadataGenerationRun(array $args = [])
 * @phpstan-method \Aws\Result startMetadataGenerationRun(array{
 *     domainIdentifier?: string,
 *     type?: 'BUSINESS_DESCRIPTIONS'|'BUSINESS_GLOSSARY_ASSOCIATIONS'|'BUSINESS_NAMES',
 *     types?: list<'BUSINESS_DESCRIPTIONS'|'BUSINESS_GLOSSARY_ASSOCIATIONS'|'BUSINESS_NAMES'>,
 *     target?: array{type?: 'ASSET', identifier?: string, revision?: string, ...},
 *     clientToken?: string,
 *     owningProjectIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMetadataGenerationRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMetadataGenerationRunAsync(array{
 *     domainIdentifier?: string,
 *     type?: 'BUSINESS_DESCRIPTIONS'|'BUSINESS_GLOSSARY_ASSOCIATIONS'|'BUSINESS_NAMES',
 *     types?: list<'BUSINESS_DESCRIPTIONS'|'BUSINESS_GLOSSARY_ASSOCIATIONS'|'BUSINESS_NAMES'>,
 *     target?: array{type?: 'ASSET', identifier?: string, revision?: string, ...},
 *     clientToken?: string,
 *     owningProjectIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startNotebookExport(array $args = [])
 * @phpstan-method \Aws\Result startNotebookExport(array{
 *     domainIdentifier?: string,
 *     notebookIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     fileFormat?: 'IPYNB'|'PDF',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startNotebookExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNotebookExportAsync(array{
 *     domainIdentifier?: string,
 *     notebookIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     fileFormat?: 'IPYNB'|'PDF',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startNotebookImport(array $args = [])
 * @phpstan-method \Aws\Result startNotebookImport(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     sourceLocation?: array{s3?: string, ...},
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startNotebookImportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNotebookImportAsync(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     sourceLocation?: array{s3?: string, ...},
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startNotebookRun(array $args = [])
 * @phpstan-method \Aws\Result startNotebookRun(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     notebookIdentifier?: string,
 *     scheduleIdentifier?: string,
 *     computeConfiguration?: array{instanceType?: string, environmentVersion?: string, ...},
 *     networkConfiguration?: array{
 *         networkAccessType?: 'PUBLIC_INTERNET_ONLY'|'VPC_ONLY',
 *         vpcId?: string,
 *         subnetIds?: list<string>,
 *         securityGroupIds?: list<string>,
 *         ...,
 *     },
 *     timeoutConfiguration?: array{runTimeoutInMinutes?: int, ...},
 *     triggerSource?: array{type?: 'MANUAL'|'SCHEDULED'|'WORKFLOW', name?: string, ...},
 *     metadata?: array<string, string>,
 *     parameters?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startNotebookRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNotebookRunAsync(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     notebookIdentifier?: string,
 *     scheduleIdentifier?: string,
 *     computeConfiguration?: array{instanceType?: string, environmentVersion?: string, ...},
 *     networkConfiguration?: array{
 *         networkAccessType?: 'PUBLIC_INTERNET_ONLY'|'VPC_ONLY',
 *         vpcId?: string,
 *         subnetIds?: list<string>,
 *         securityGroupIds?: list<string>,
 *         ...,
 *     },
 *     timeoutConfiguration?: array{runTimeoutInMinutes?: int, ...},
 *     triggerSource?: array{type?: 'MANUAL'|'SCHEDULED'|'WORKFLOW', name?: string, ...},
 *     metadata?: array<string, string>,
 *     parameters?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startNotebookSync(array $args = [])
 * @phpstan-method \Aws\Result startNotebookSync(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     sourceLocation?: array{s3?: string, ...},
 *     gitMetadata?: array{
 *         connectionId?: string,
 *         repository?: string,
 *         branch?: string,
 *         commitHash?: string,
 *         fileName?: string,
 *         committedAt?: int|string|\DateTimeInterface,
 *         commitMessage?: string,
 *         ...,
 *     },
 *     notebookId?: string,
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startNotebookSyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startNotebookSyncAsync(array{
 *     domainIdentifier?: string,
 *     owningProjectIdentifier?: string,
 *     sourceLocation?: array{s3?: string, ...},
 *     gitMetadata?: array{
 *         connectionId?: string,
 *         repository?: string,
 *         branch?: string,
 *         commitHash?: string,
 *         fileName?: string,
 *         committedAt?: int|string|\DateTimeInterface,
 *         commitMessage?: string,
 *         ...,
 *     },
 *     notebookId?: string,
 *     name?: string,
 *     description?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopNotebookRun(array $args = [])
 * @phpstan-method \Aws\Result stopNotebookRun(array{domainIdentifier?: string, identifier?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopNotebookRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopNotebookRunAsync(array{domainIdentifier?: string, identifier?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccountPool(array $args = [])
 * @phpstan-method \Aws\Result updateAccountPool(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     resolutionStrategy?: 'MANUAL',
 *     accountSource?: array{
 *         accounts?: list<array>,
 *         customAccountPoolHandler?: array{lambdaFunctionArn?: string, lambdaExecutionRoleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountPoolAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountPoolAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     resolutionStrategy?: 'MANUAL',
 *     accountSource?: array{
 *         accounts?: list<array>,
 *         customAccountPoolHandler?: array{lambdaFunctionArn?: string, lambdaExecutionRoleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssetFilter(array $args = [])
 * @phpstan-method \Aws\Result updateAssetFilter(array{
 *     domainIdentifier?: string,
 *     assetIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     configuration?: array{
 *         columnConfiguration?: array{includedColumnNames?: list<string>, ...},
 *         rowConfiguration?: array{rowFilter?: array, sensitive?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssetFilterAsync(array{
 *     domainIdentifier?: string,
 *     assetIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     configuration?: array{
 *         columnConfiguration?: array{includedColumnNames?: list<string>, ...},
 *         rowConfiguration?: array{rowFilter?: array, sensitive?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConnection(array $args = [])
 * @phpstan-method \Aws\Result updateConnection(array{
 *     configurations?: list<array{classification?: string, properties?: array<string, string>, ...}>,
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     description?: string,
 *     awsLocation?: array{accessRole?: string, awsAccountId?: string, awsRegion?: string, iamConnectionId?: string, ...},
 *     props?: array{
 *         athenaProperties?: array{workgroupName?: string, ...},
 *         glueProperties?: array{glueConnectionInput?: array, ...},
 *         iamProperties?: array{glueLineageSyncEnabled?: bool, ...},
 *         redshiftProperties?: array{
 *             storage?: array,
 *             databaseName?: string,
 *             host?: string,
 *             port?: int,
 *             credentials?: array,
 *             lineageSync?: array,
 *             ...,
 *         },
 *         sparkEmrProperties?: array{
 *             computeArn?: string,
 *             instanceProfileArn?: string,
 *             javaVirtualEnv?: string,
 *             logUri?: string,
 *             pythonVirtualEnv?: string,
 *             runtimeRole?: string,
 *             trustedCertificatesS3Uri?: string,
 *             managedEndpointArn?: string,
 *             ...,
 *         },
 *         s3Properties?: array{s3Uri?: string, s3AccessGrantLocationId?: string, registerS3AccessGrantLocation?: bool, ...},
 *         snowflakeProperties?: array{connectivityPropertiesPatch?: array, snowflakeRole?: string, lineageSync?: array, ...},
 *         amazonQProperties?: array{isEnabled?: bool, profileArn?: string, authMode?: string, ...},
 *         mlflowProperties?: array{trackingServerArn?: string, ...},
 *         lakehouseProperties?: array{glueLineageSyncEnabled?: bool, ...},
 *         vpcProperties?: array{vpcId?: string, subnetIds?: list<string>, securityGroupId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectionAsync(array{
 *     configurations?: list<array{classification?: string, properties?: array<string, string>, ...}>,
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     description?: string,
 *     awsLocation?: array{accessRole?: string, awsAccountId?: string, awsRegion?: string, iamConnectionId?: string, ...},
 *     props?: array{
 *         athenaProperties?: array{workgroupName?: string, ...},
 *         glueProperties?: array{glueConnectionInput?: array, ...},
 *         iamProperties?: array{glueLineageSyncEnabled?: bool, ...},
 *         redshiftProperties?: array{
 *             storage?: array,
 *             databaseName?: string,
 *             host?: string,
 *             port?: int,
 *             credentials?: array,
 *             lineageSync?: array,
 *             ...,
 *         },
 *         sparkEmrProperties?: array{
 *             computeArn?: string,
 *             instanceProfileArn?: string,
 *             javaVirtualEnv?: string,
 *             logUri?: string,
 *             pythonVirtualEnv?: string,
 *             runtimeRole?: string,
 *             trustedCertificatesS3Uri?: string,
 *             managedEndpointArn?: string,
 *             ...,
 *         },
 *         s3Properties?: array{s3Uri?: string, s3AccessGrantLocationId?: string, registerS3AccessGrantLocation?: bool, ...},
 *         snowflakeProperties?: array{connectivityPropertiesPatch?: array, snowflakeRole?: string, lineageSync?: array, ...},
 *         amazonQProperties?: array{isEnabled?: bool, profileArn?: string, authMode?: string, ...},
 *         mlflowProperties?: array{trackingServerArn?: string, ...},
 *         lakehouseProperties?: array{glueLineageSyncEnabled?: bool, ...},
 *         vpcProperties?: array{vpcId?: string, subnetIds?: list<string>, securityGroupId?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDataSource(array $args = [])
 * @phpstan-method \Aws\Result updateDataSource(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     enableSetting?: 'DISABLED'|'ENABLED',
 *     publishOnImport?: bool,
 *     assetFormsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     schedule?: array{
 *         timezone?: 'AFRICA_JOHANNESBURG'|'AMERICA_MONTREAL'|'AMERICA_SAO_PAULO'|'ASIA_BAHRAIN'|'ASIA_BANGKOK'|'ASIA_CALCUTTA'|'ASIA_DUBAI'|'ASIA_HONG_KONG'|'ASIA_JAKARTA'|'ASIA_KUALA_LUMPUR'|'ASIA_SEOUL'|'ASIA_SHANGHAI'|'ASIA_SINGAPORE'|'ASIA_TAIPEI'|'ASIA_TOKYO'|'AUSTRALIA_MELBOURNE'|'AUSTRALIA_SYDNEY'|'CANADA_CENTRAL'|'CET'|'CST6CDT'|'ETC_GMT'|'ETC_GMT0'|'ETC_GMT_ADD_0'|'ETC_GMT_ADD_1'|'ETC_GMT_ADD_10'|'ETC_GMT_ADD_11'|'ETC_GMT_ADD_12'|'ETC_GMT_ADD_2'|'ETC_GMT_ADD_3'|'ETC_GMT_ADD_4'|'ETC_GMT_ADD_5'|'ETC_GMT_ADD_6'|'ETC_GMT_ADD_7'|'ETC_GMT_ADD_8'|'ETC_GMT_ADD_9'|'ETC_GMT_NEG_0'|'ETC_GMT_NEG_1'|'ETC_GMT_NEG_10'|'ETC_GMT_NEG_11'|'ETC_GMT_NEG_12'|'ETC_GMT_NEG_13'|'ETC_GMT_NEG_14'|'ETC_GMT_NEG_2'|'ETC_GMT_NEG_3'|'ETC_GMT_NEG_4'|'ETC_GMT_NEG_5'|'ETC_GMT_NEG_6'|'ETC_GMT_NEG_7'|'ETC_GMT_NEG_8'|'ETC_GMT_NEG_9'|'EUROPE_DUBLIN'|'EUROPE_LONDON'|'EUROPE_PARIS'|'EUROPE_STOCKHOLM'|'EUROPE_ZURICH'|'ISRAEL'|'MEXICO_GENERAL'|'MST7MDT'|'PACIFIC_AUCKLAND'|'US_CENTRAL'|'US_EASTERN'|'US_MOUNTAIN'|'US_PACIFIC'|'UTC',
 *         schedule?: string,
 *         ...,
 *     },
 *     configuration?: array{
 *         glueRunConfiguration?: array{
 *             dataAccessRole?: string,
 *             relationalFilterConfigurations?: list<array>,
 *             autoImportDataQualityResult?: bool,
 *             catalogName?: string,
 *             ...,
 *         },
 *         redshiftRunConfiguration?: array{
 *             dataAccessRole?: string,
 *             relationalFilterConfigurations?: list<array>,
 *             redshiftCredentialConfiguration?: array,
 *             redshiftStorage?: array,
 *             ...,
 *         },
 *         sageMakerRunConfiguration?: array{trackingAssets?: array<string, list<string>>, ...},
 *         ...,
 *     },
 *     recommendation?: array{enableBusinessNameGeneration?: bool, ...},
 *     retainPermissionsOnRevokeFailure?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataSourceAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     enableSetting?: 'DISABLED'|'ENABLED',
 *     publishOnImport?: bool,
 *     assetFormsInput?: list<array{formName?: string, typeIdentifier?: string, typeRevision?: string, content?: string, ...}>,
 *     schedule?: array{
 *         timezone?: 'AFRICA_JOHANNESBURG'|'AMERICA_MONTREAL'|'AMERICA_SAO_PAULO'|'ASIA_BAHRAIN'|'ASIA_BANGKOK'|'ASIA_CALCUTTA'|'ASIA_DUBAI'|'ASIA_HONG_KONG'|'ASIA_JAKARTA'|'ASIA_KUALA_LUMPUR'|'ASIA_SEOUL'|'ASIA_SHANGHAI'|'ASIA_SINGAPORE'|'ASIA_TAIPEI'|'ASIA_TOKYO'|'AUSTRALIA_MELBOURNE'|'AUSTRALIA_SYDNEY'|'CANADA_CENTRAL'|'CET'|'CST6CDT'|'ETC_GMT'|'ETC_GMT0'|'ETC_GMT_ADD_0'|'ETC_GMT_ADD_1'|'ETC_GMT_ADD_10'|'ETC_GMT_ADD_11'|'ETC_GMT_ADD_12'|'ETC_GMT_ADD_2'|'ETC_GMT_ADD_3'|'ETC_GMT_ADD_4'|'ETC_GMT_ADD_5'|'ETC_GMT_ADD_6'|'ETC_GMT_ADD_7'|'ETC_GMT_ADD_8'|'ETC_GMT_ADD_9'|'ETC_GMT_NEG_0'|'ETC_GMT_NEG_1'|'ETC_GMT_NEG_10'|'ETC_GMT_NEG_11'|'ETC_GMT_NEG_12'|'ETC_GMT_NEG_13'|'ETC_GMT_NEG_14'|'ETC_GMT_NEG_2'|'ETC_GMT_NEG_3'|'ETC_GMT_NEG_4'|'ETC_GMT_NEG_5'|'ETC_GMT_NEG_6'|'ETC_GMT_NEG_7'|'ETC_GMT_NEG_8'|'ETC_GMT_NEG_9'|'EUROPE_DUBLIN'|'EUROPE_LONDON'|'EUROPE_PARIS'|'EUROPE_STOCKHOLM'|'EUROPE_ZURICH'|'ISRAEL'|'MEXICO_GENERAL'|'MST7MDT'|'PACIFIC_AUCKLAND'|'US_CENTRAL'|'US_EASTERN'|'US_MOUNTAIN'|'US_PACIFIC'|'UTC',
 *         schedule?: string,
 *         ...,
 *     },
 *     configuration?: array{
 *         glueRunConfiguration?: array{
 *             dataAccessRole?: string,
 *             relationalFilterConfigurations?: list<array>,
 *             autoImportDataQualityResult?: bool,
 *             catalogName?: string,
 *             ...,
 *         },
 *         redshiftRunConfiguration?: array{
 *             dataAccessRole?: string,
 *             relationalFilterConfigurations?: list<array>,
 *             redshiftCredentialConfiguration?: array,
 *             redshiftStorage?: array,
 *             ...,
 *         },
 *         sageMakerRunConfiguration?: array{trackingAssets?: array<string, list<string>>, ...},
 *         ...,
 *     },
 *     recommendation?: array{enableBusinessNameGeneration?: bool, ...},
 *     retainPermissionsOnRevokeFailure?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomain(array $args = [])
 * @phpstan-method \Aws\Result updateDomain(array{
 *     identifier?: string,
 *     description?: string,
 *     singleSignOn?: array{type?: 'DISABLED'|'IAM_IDC', userAssignment?: 'AUTOMATIC'|'MANUAL', idcInstanceArn?: string, ...},
 *     domainExecutionRole?: string,
 *     serviceRole?: string,
 *     name?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainAsync(array{
 *     identifier?: string,
 *     description?: string,
 *     singleSignOn?: array{type?: 'DISABLED'|'IAM_IDC', userAssignment?: 'AUTOMATIC'|'MANUAL', idcInstanceArn?: string, ...},
 *     domainExecutionRole?: string,
 *     serviceRole?: string,
 *     name?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDomainUnit(array $args = [])
 * @phpstan-method \Aws\Result updateDomainUnit(array{domainIdentifier?: string, identifier?: string, description?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainUnitAsync(array{domainIdentifier?: string, identifier?: string, description?: string, name?: string, ...} $args = [])
 * @method \Aws\Result updateEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironment(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     glossaryTerms?: list<string>,
 *     blueprintVersion?: string,
 *     userParameters?: list<array{name?: string, value?: string, ...}>,
 *     environmentConfigurationName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     glossaryTerms?: list<string>,
 *     blueprintVersion?: string,
 *     userParameters?: list<array{name?: string, value?: string, ...}>,
 *     environmentConfigurationName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnvironmentAction(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironmentAction(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     identifier?: string,
 *     parameters?: array{awsConsoleLink?: array{uri?: string, ...}, ...},
 *     name?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentActionAsync(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     identifier?: string,
 *     parameters?: array{awsConsoleLink?: array{uri?: string, ...}, ...},
 *     name?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnvironmentBlueprint(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironmentBlueprint(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     description?: string,
 *     provisioningProperties?: array{cloudFormation?: array{templateUrl?: string, ...}, ...},
 *     userParameters?: list<array{
 *         keyName?: string,
 *         description?: string,
 *         fieldType?: string,
 *         defaultValue?: string,
 *         isEditable?: bool,
 *         isOptional?: bool,
 *         isUpdateSupported?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentBlueprintAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     description?: string,
 *     provisioningProperties?: array{cloudFormation?: array{templateUrl?: string, ...}, ...},
 *     userParameters?: list<array{
 *         keyName?: string,
 *         description?: string,
 *         fieldType?: string,
 *         defaultValue?: string,
 *         isEditable?: bool,
 *         isOptional?: bool,
 *         isUpdateSupported?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnvironmentProfile(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironmentProfile(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     userParameters?: list<array{name?: string, value?: string, ...}>,
 *     awsAccountId?: string,
 *     awsAccountRegion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnvironmentProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentProfileAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     userParameters?: list<array{name?: string, value?: string, ...}>,
 *     awsAccountId?: string,
 *     awsAccountRegion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGlossary(array $args = [])
 * @phpstan-method \Aws\Result updateGlossary(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlossaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlossaryAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGlossaryTerm(array $args = [])
 * @phpstan-method \Aws\Result updateGlossaryTerm(array{
 *     domainIdentifier?: string,
 *     glossaryIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     shortDescription?: string,
 *     longDescription?: string,
 *     termRelations?: array{isA?: list<string>, classifies?: list<string>, ...},
 *     status?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlossaryTermAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlossaryTermAsync(array{
 *     domainIdentifier?: string,
 *     glossaryIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     shortDescription?: string,
 *     longDescription?: string,
 *     termRelations?: array{isA?: list<string>, classifies?: list<string>, ...},
 *     status?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGroupProfile(array $args = [])
 * @phpstan-method \Aws\Result updateGroupProfile(array{domainIdentifier?: string, groupIdentifier?: string, status?: 'ASSIGNED'|'NOT_ASSIGNED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGroupProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGroupProfileAsync(array{domainIdentifier?: string, groupIdentifier?: string, status?: 'ASSIGNED'|'NOT_ASSIGNED', ...} $args = [])
 * @method \Aws\Result updateNotebook(array $args = [])
 * @phpstan-method \Aws\Result updateNotebook(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     description?: string,
 *     status?: 'ACTIVE'|'ARCHIVED'|'SYNC_FAILED'|'SYNC_IN_PROGRESS',
 *     name?: string,
 *     cellOrder?: list<array>,
 *     metadata?: array<string, string>,
 *     parameters?: array<string, string>,
 *     environmentConfiguration?: array{
 *         imageVersion?: string,
 *         packageConfig?: array{packageManager?: 'UV', packageSpecification?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotebookAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotebookAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     description?: string,
 *     status?: 'ACTIVE'|'ARCHIVED'|'SYNC_FAILED'|'SYNC_IN_PROGRESS',
 *     name?: string,
 *     cellOrder?: list<array>,
 *     metadata?: array<string, string>,
 *     parameters?: array<string, string>,
 *     environmentConfiguration?: array{
 *         imageVersion?: string,
 *         packageConfig?: array{packageManager?: 'UV', packageSpecification?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProject(array $args = [])
 * @phpstan-method \Aws\Result updateProject(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     resourceTags?: array<string, string>,
 *     glossaryTerms?: list<string>,
 *     domainUnitId?: string,
 *     environmentDeploymentDetails?: array{
 *         overallDeploymentStatus?: 'FAILED_DEPLOYMENT'|'FAILED_VALIDATION'|'IN_PROGRESS'|'PENDING_DEPLOYMENT'|'SUCCESSFUL',
 *         environmentFailureReasons?: array<string, list<array>>,
 *         ...,
 *     },
 *     userParameters?: list<array{
 *         environmentId?: string,
 *         environmentResolvedAccount?: array,
 *         environmentConfigurationName?: string,
 *         environmentParameters?: list<array>,
 *         ...,
 *     }>,
 *     projectProfileVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProjectAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     resourceTags?: array<string, string>,
 *     glossaryTerms?: list<string>,
 *     domainUnitId?: string,
 *     environmentDeploymentDetails?: array{
 *         overallDeploymentStatus?: 'FAILED_DEPLOYMENT'|'FAILED_VALIDATION'|'IN_PROGRESS'|'PENDING_DEPLOYMENT'|'SUCCESSFUL',
 *         environmentFailureReasons?: array<string, list<array>>,
 *         ...,
 *     },
 *     userParameters?: list<array{
 *         environmentId?: string,
 *         environmentResolvedAccount?: array,
 *         environmentConfigurationName?: string,
 *         environmentParameters?: list<array>,
 *         ...,
 *     }>,
 *     projectProfileVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProjectProfile(array $args = [])
 * @phpstan-method \Aws\Result updateProjectProfile(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     projectResourceTags?: list<array{key?: string, value?: string, isValueEditable?: bool, ...}>,
 *     allowCustomProjectResourceTags?: bool,
 *     projectResourceTagsDescription?: string,
 *     environmentConfigurations?: list<array{
 *         name?: string,
 *         id?: string,
 *         environmentBlueprintId?: string,
 *         description?: string,
 *         deploymentMode?: 'ON_CREATE'|'ON_DEMAND',
 *         configurationParameters?: array,
 *         awsAccount?: array,
 *         accountPools?: list<string>,
 *         awsRegion?: array,
 *         deploymentOrder?: int,
 *         ...,
 *     }>,
 *     domainUnitIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProjectProfileAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     status?: 'DISABLED'|'ENABLED',
 *     projectResourceTags?: list<array{key?: string, value?: string, isValueEditable?: bool, ...}>,
 *     allowCustomProjectResourceTags?: bool,
 *     projectResourceTagsDescription?: string,
 *     environmentConfigurations?: list<array{
 *         name?: string,
 *         id?: string,
 *         environmentBlueprintId?: string,
 *         description?: string,
 *         deploymentMode?: 'ON_CREATE'|'ON_DEMAND',
 *         configurationParameters?: array,
 *         awsAccount?: array,
 *         accountPools?: list<string>,
 *         awsRegion?: array,
 *         deploymentOrder?: int,
 *         ...,
 *     }>,
 *     domainUnitIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRootDomainUnitOwner(array $args = [])
 * @phpstan-method \Aws\Result updateRootDomainUnitOwner(array{domainIdentifier?: string, currentOwner?: string, newOwner?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRootDomainUnitOwnerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRootDomainUnitOwnerAsync(array{domainIdentifier?: string, currentOwner?: string, newOwner?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateRule(array $args = [])
 * @phpstan-method \Aws\Result updateRule(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     scope?: array{
 *         assetType?: array{selectionMode?: 'ALL'|'SPECIFIC', specificAssetTypes?: list<string>, ...},
 *         dataProduct?: bool,
 *         project?: array{selectionMode?: 'ALL'|'SPECIFIC', specificProjects?: list<string>, ...},
 *         ...,
 *     },
 *     detail?: array{
 *         metadataFormEnforcementDetail?: array{requiredMetadataForms?: list<array>, ...},
 *         glossaryTermEnforcementDetail?: array{requiredGlossaryTermIds?: list<string>, ...},
 *         ...,
 *     },
 *     includeChildDomainUnits?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRuleAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     description?: string,
 *     scope?: array{
 *         assetType?: array{selectionMode?: 'ALL'|'SPECIFIC', specificAssetTypes?: list<string>, ...},
 *         dataProduct?: bool,
 *         project?: array{selectionMode?: 'ALL'|'SPECIFIC', specificProjects?: list<string>, ...},
 *         ...,
 *     },
 *     detail?: array{
 *         metadataFormEnforcementDetail?: array{requiredMetadataForms?: list<array>, ...},
 *         glossaryTermEnforcementDetail?: array{requiredGlossaryTermIds?: list<string>, ...},
 *         ...,
 *     },
 *     includeChildDomainUnits?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSubscriptionGrantStatus(array $args = [])
 * @phpstan-method \Aws\Result updateSubscriptionGrantStatus(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     assetIdentifier?: string,
 *     status?: 'GRANTED'|'GRANT_FAILED'|'GRANT_IN_PROGRESS'|'GRANT_PENDING'|'REVOKED'|'REVOKE_FAILED'|'REVOKE_IN_PROGRESS'|'REVOKE_PENDING',
 *     failureCause?: array{message?: string, ...},
 *     targetName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriptionGrantStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubscriptionGrantStatusAsync(array{
 *     domainIdentifier?: string,
 *     identifier?: string,
 *     assetIdentifier?: string,
 *     status?: 'GRANTED'|'GRANT_FAILED'|'GRANT_IN_PROGRESS'|'GRANT_PENDING'|'REVOKED'|'REVOKE_FAILED'|'REVOKE_IN_PROGRESS'|'REVOKE_PENDING',
 *     failureCause?: array{message?: string, ...},
 *     targetName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSubscriptionRequest(array $args = [])
 * @phpstan-method \Aws\Result updateSubscriptionRequest(array{domainIdentifier?: string, identifier?: string, requestReason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriptionRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubscriptionRequestAsync(array{domainIdentifier?: string, identifier?: string, requestReason?: string, ...} $args = [])
 * @method \Aws\Result updateSubscriptionTarget(array $args = [])
 * @phpstan-method \Aws\Result updateSubscriptionTarget(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     authorizedPrincipals?: list<string>,
 *     applicableAssetTypes?: list<string>,
 *     subscriptionTargetConfig?: list<array{formName?: string, content?: string, ...}>,
 *     manageAccessRole?: string,
 *     provider?: string,
 *     subscriptionGrantCreationMode?: 'AUTOMATIC'|'MANUAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSubscriptionTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubscriptionTargetAsync(array{
 *     domainIdentifier?: string,
 *     environmentIdentifier?: string,
 *     identifier?: string,
 *     name?: string,
 *     authorizedPrincipals?: list<string>,
 *     applicableAssetTypes?: list<string>,
 *     subscriptionTargetConfig?: list<array{formName?: string, content?: string, ...}>,
 *     manageAccessRole?: string,
 *     provider?: string,
 *     subscriptionGrantCreationMode?: 'AUTOMATIC'|'MANUAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateUserProfile(array $args = [])
 * @phpstan-method \Aws\Result updateUserProfile(array{
 *     domainIdentifier?: string,
 *     userIdentifier?: string,
 *     type?: 'IAM'|'SSO',
 *     status?: 'ACTIVATED'|'ASSIGNED'|'DEACTIVATED'|'NOT_ASSIGNED',
 *     sessionName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateUserProfileAsync(array{
 *     domainIdentifier?: string,
 *     userIdentifier?: string,
 *     type?: 'IAM'|'SSO',
 *     status?: 'ACTIVATED'|'ASSIGNED'|'DEACTIVATED'|'NOT_ASSIGNED',
 *     sessionName?: string,
 *     ...,
 * } $args = [])
 */
class DataZoneClient extends AwsClient {}
