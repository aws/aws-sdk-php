<?php
namespace Aws\Ssm;

use Aws\AwsClient;

/**
 * Amazon EC2 Simple Systems Manager client.
 *
 * @method \Aws\Result addTagsToResource(array $args = [])
 * @phpstan-method \Aws\Result addTagsToResource(array{
 *     ResourceType?: 'Association'|'Automation'|'CloudConnector'|'Document'|'MaintenanceWindow'|'ManagedInstance'|'OpsItem'|'OpsMetadata'|'Parameter'|'PatchBaseline',
 *     ResourceId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addTagsToResourceAsync(array{
 *     ResourceType?: 'Association'|'Automation'|'CloudConnector'|'Document'|'MaintenanceWindow'|'ManagedInstance'|'OpsItem'|'OpsMetadata'|'Parameter'|'PatchBaseline',
 *     ResourceId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateOpsItemRelatedItem(array $args = [])
 * @phpstan-method \Aws\Result associateOpsItemRelatedItem(array{OpsItemId?: string, AssociationType?: string, ResourceType?: string, ResourceUri?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateOpsItemRelatedItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateOpsItemRelatedItemAsync(array{OpsItemId?: string, AssociationType?: string, ResourceType?: string, ResourceUri?: string, ...} $args = [])
 * @method \Aws\Result cancelCommand(array $args = [])
 * @phpstan-method \Aws\Result cancelCommand(array{CommandId?: string, InstanceIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelCommandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelCommandAsync(array{CommandId?: string, InstanceIds?: list<string>, ...} $args = [])
 * @method \Aws\Result cancelMaintenanceWindowExecution(array $args = [])
 * @phpstan-method \Aws\Result cancelMaintenanceWindowExecution(array{WindowExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelMaintenanceWindowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelMaintenanceWindowExecutionAsync(array{WindowExecutionId?: string, ...} $args = [])
 * @method \Aws\Result createActivation(array $args = [])
 * @phpstan-method \Aws\Result createActivation(array{
 *     Description?: string,
 *     DefaultInstanceName?: string,
 *     IamRole?: string,
 *     RegistrationLimit?: int,
 *     ExpirationDate?: int|string|\DateTimeInterface,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     RegistrationMetadata?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createActivationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createActivationAsync(array{
 *     Description?: string,
 *     DefaultInstanceName?: string,
 *     IamRole?: string,
 *     RegistrationLimit?: int,
 *     ExpirationDate?: int|string|\DateTimeInterface,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     RegistrationMetadata?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssociation(array $args = [])
 * @phpstan-method \Aws\Result createAssociation(array{
 *     Name?: string,
 *     DocumentVersion?: string,
 *     InstanceId?: string,
 *     Parameters?: array<string, list<string>>,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     ScheduleExpression?: string,
 *     OutputLocation?: array{
 *         S3Location?: array{OutputS3Region?: string, OutputS3BucketName?: string, OutputS3KeyPrefix?: string, ...},
 *         ...,
 *     },
 *     AssociationName?: string,
 *     AutomationTargetParameterName?: string,
 *     MaxErrors?: string,
 *     MaxConcurrency?: string,
 *     ComplianceSeverity?: 'CRITICAL'|'HIGH'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *     SyncCompliance?: 'AUTO'|'MANUAL',
 *     ApplyOnlyAtCronInterval?: bool,
 *     CalendarNames?: list<string>,
 *     TargetLocations?: list<array{
 *         Accounts?: list<string>,
 *         Regions?: list<string>,
 *         TargetLocationMaxConcurrency?: string,
 *         TargetLocationMaxErrors?: string,
 *         ExecutionRoleName?: string,
 *         TargetLocationAlarmConfiguration?: array,
 *         IncludeChildOrganizationUnits?: bool,
 *         ExcludeAccounts?: list<string>,
 *         Targets?: list<array>,
 *         TargetsMaxConcurrency?: string,
 *         TargetsMaxErrors?: string,
 *         ...,
 *     }>,
 *     ScheduleOffset?: int,
 *     Duration?: int,
 *     TargetMaps?: list<array<string, list<string>>>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     AssociationDispatchAssumeRole?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssociationAsync(array{
 *     Name?: string,
 *     DocumentVersion?: string,
 *     InstanceId?: string,
 *     Parameters?: array<string, list<string>>,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     ScheduleExpression?: string,
 *     OutputLocation?: array{
 *         S3Location?: array{OutputS3Region?: string, OutputS3BucketName?: string, OutputS3KeyPrefix?: string, ...},
 *         ...,
 *     },
 *     AssociationName?: string,
 *     AutomationTargetParameterName?: string,
 *     MaxErrors?: string,
 *     MaxConcurrency?: string,
 *     ComplianceSeverity?: 'CRITICAL'|'HIGH'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *     SyncCompliance?: 'AUTO'|'MANUAL',
 *     ApplyOnlyAtCronInterval?: bool,
 *     CalendarNames?: list<string>,
 *     TargetLocations?: list<array{
 *         Accounts?: list<string>,
 *         Regions?: list<string>,
 *         TargetLocationMaxConcurrency?: string,
 *         TargetLocationMaxErrors?: string,
 *         ExecutionRoleName?: string,
 *         TargetLocationAlarmConfiguration?: array,
 *         IncludeChildOrganizationUnits?: bool,
 *         ExcludeAccounts?: list<string>,
 *         Targets?: list<array>,
 *         TargetsMaxConcurrency?: string,
 *         TargetsMaxErrors?: string,
 *         ...,
 *     }>,
 *     ScheduleOffset?: int,
 *     Duration?: int,
 *     TargetMaps?: list<array<string, list<string>>>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     AssociationDispatchAssumeRole?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAssociationBatch(array $args = [])
 * @phpstan-method \Aws\Result createAssociationBatch(array{
 *     Entries?: list<array{
 *         Name?: string,
 *         InstanceId?: string,
 *         Parameters?: array<string, list<string>>,
 *         AutomationTargetParameterName?: string,
 *         DocumentVersion?: string,
 *         Targets?: list<array>,
 *         ScheduleExpression?: string,
 *         OutputLocation?: array,
 *         AssociationName?: string,
 *         MaxErrors?: string,
 *         MaxConcurrency?: string,
 *         ComplianceSeverity?: 'CRITICAL'|'HIGH'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *         SyncCompliance?: 'AUTO'|'MANUAL',
 *         ApplyOnlyAtCronInterval?: bool,
 *         CalendarNames?: list<string>,
 *         TargetLocations?: list<array>,
 *         ScheduleOffset?: int,
 *         Duration?: int,
 *         TargetMaps?: list<array<string, list<string>>>,
 *         AlarmConfiguration?: array,
 *         ...,
 *     }>,
 *     AssociationDispatchAssumeRole?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssociationBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAssociationBatchAsync(array{
 *     Entries?: list<array{
 *         Name?: string,
 *         InstanceId?: string,
 *         Parameters?: array<string, list<string>>,
 *         AutomationTargetParameterName?: string,
 *         DocumentVersion?: string,
 *         Targets?: list<array>,
 *         ScheduleExpression?: string,
 *         OutputLocation?: array,
 *         AssociationName?: string,
 *         MaxErrors?: string,
 *         MaxConcurrency?: string,
 *         ComplianceSeverity?: 'CRITICAL'|'HIGH'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *         SyncCompliance?: 'AUTO'|'MANUAL',
 *         ApplyOnlyAtCronInterval?: bool,
 *         CalendarNames?: list<string>,
 *         TargetLocations?: list<array>,
 *         ScheduleOffset?: int,
 *         Duration?: int,
 *         TargetMaps?: list<array<string, list<string>>>,
 *         AlarmConfiguration?: array,
 *         ...,
 *     }>,
 *     AssociationDispatchAssumeRole?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCloudConnector(array $args = [])
 * @phpstan-method \Aws\Result createCloudConnector(array{
 *     DisplayName?: string,
 *     RoleArn?: string,
 *     Description?: string,
 *     Configuration?: array{
 *         AzureConfiguration?: array{
 *             TenantId?: string,
 *             TenantDisplayName?: string,
 *             ApplicationId?: string,
 *             ApplicationDisplayName?: string,
 *             Targets?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ConfigConnectorArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCloudConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCloudConnectorAsync(array{
 *     DisplayName?: string,
 *     RoleArn?: string,
 *     Description?: string,
 *     Configuration?: array{
 *         AzureConfiguration?: array{
 *             TenantId?: string,
 *             TenantDisplayName?: string,
 *             ApplicationId?: string,
 *             ApplicationDisplayName?: string,
 *             Targets?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ConfigConnectorArn?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDocument(array $args = [])
 * @phpstan-method \Aws\Result createDocument(array{
 *     Content?: string,
 *     Requires?: list<array{Name?: string, Version?: string, RequireType?: string, VersionName?: string, ...}>,
 *     Attachments?: list<array{Key?: 'AttachmentReference'|'S3FileUrl'|'SourceUrl', Values?: list<string>, Name?: string, ...}>,
 *     Name?: string,
 *     DisplayName?: string,
 *     VersionName?: string,
 *     DocumentType?: 'ApplicationConfiguration'|'ApplicationConfigurationSchema'|'AutoApprovalPolicy'|'Automation'|'Automation.ChangeTemplate'|'ChangeCalendar'|'CloudFormation'|'Command'|'ConformancePackTemplate'|'DeploymentStrategy'|'ManualApprovalPolicy'|'Package'|'Policy'|'ProblemAnalysis'|'ProblemAnalysisTemplate'|'QuickSetup'|'Session',
 *     DocumentFormat?: 'JSON'|'TEXT'|'YAML',
 *     TargetType?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDocumentAsync(array{
 *     Content?: string,
 *     Requires?: list<array{Name?: string, Version?: string, RequireType?: string, VersionName?: string, ...}>,
 *     Attachments?: list<array{Key?: 'AttachmentReference'|'S3FileUrl'|'SourceUrl', Values?: list<string>, Name?: string, ...}>,
 *     Name?: string,
 *     DisplayName?: string,
 *     VersionName?: string,
 *     DocumentType?: 'ApplicationConfiguration'|'ApplicationConfigurationSchema'|'AutoApprovalPolicy'|'Automation'|'Automation.ChangeTemplate'|'ChangeCalendar'|'CloudFormation'|'Command'|'ConformancePackTemplate'|'DeploymentStrategy'|'ManualApprovalPolicy'|'Package'|'Policy'|'ProblemAnalysis'|'ProblemAnalysisTemplate'|'QuickSetup'|'Session',
 *     DocumentFormat?: 'JSON'|'TEXT'|'YAML',
 *     TargetType?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMaintenanceWindow(array $args = [])
 * @phpstan-method \Aws\Result createMaintenanceWindow(array{
 *     Name?: string,
 *     Description?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Schedule?: string,
 *     ScheduleTimezone?: string,
 *     ScheduleOffset?: int,
 *     Duration?: int,
 *     Cutoff?: int,
 *     AllowUnassociatedTargets?: bool,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMaintenanceWindowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMaintenanceWindowAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Schedule?: string,
 *     ScheduleTimezone?: string,
 *     ScheduleOffset?: int,
 *     Duration?: int,
 *     Cutoff?: int,
 *     AllowUnassociatedTargets?: bool,
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOpsItem(array $args = [])
 * @phpstan-method \Aws\Result createOpsItem(array{
 *     Description?: string,
 *     OpsItemType?: string,
 *     OperationalData?: array<string, array{Value?: string, Type?: 'SearchableString'|'String', ...}>,
 *     Notifications?: list<array{Arn?: string, ...}>,
 *     Priority?: int,
 *     RelatedOpsItems?: list<array{OpsItemId?: string, ...}>,
 *     Source?: string,
 *     Title?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Category?: string,
 *     Severity?: string,
 *     ActualStartTime?: int|string|\DateTimeInterface,
 *     ActualEndTime?: int|string|\DateTimeInterface,
 *     PlannedStartTime?: int|string|\DateTimeInterface,
 *     PlannedEndTime?: int|string|\DateTimeInterface,
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOpsItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOpsItemAsync(array{
 *     Description?: string,
 *     OpsItemType?: string,
 *     OperationalData?: array<string, array{Value?: string, Type?: 'SearchableString'|'String', ...}>,
 *     Notifications?: list<array{Arn?: string, ...}>,
 *     Priority?: int,
 *     RelatedOpsItems?: list<array{OpsItemId?: string, ...}>,
 *     Source?: string,
 *     Title?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Category?: string,
 *     Severity?: string,
 *     ActualStartTime?: int|string|\DateTimeInterface,
 *     ActualEndTime?: int|string|\DateTimeInterface,
 *     PlannedStartTime?: int|string|\DateTimeInterface,
 *     PlannedEndTime?: int|string|\DateTimeInterface,
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOpsMetadata(array $args = [])
 * @phpstan-method \Aws\Result createOpsMetadata(array{
 *     ResourceId?: string,
 *     Metadata?: array<string, array{Value?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOpsMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOpsMetadataAsync(array{
 *     ResourceId?: string,
 *     Metadata?: array<string, array{Value?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPatchBaseline(array $args = [])
 * @phpstan-method \Aws\Result createPatchBaseline(array{
 *     OperatingSystem?: 'ALMA_LINUX'|'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2022'|'AMAZON_LINUX_2023'|'CENTOS'|'DEBIAN'|'MACOS'|'ORACLE_LINUX'|'RASPBIAN'|'REDHAT_ENTERPRISE_LINUX'|'ROCKY_LINUX'|'SUSE'|'UBUNTU'|'WINDOWS',
 *     Name?: string,
 *     GlobalFilters?: array{PatchFilters?: list<array>, ...},
 *     ApprovalRules?: array{PatchRules?: list<array>, ...},
 *     ApprovedPatches?: list<string>,
 *     ApprovedPatchesComplianceLevel?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *     ApprovedPatchesEnableNonSecurity?: bool,
 *     RejectedPatches?: list<string>,
 *     RejectedPatchesAction?: 'ALLOW_AS_DEPENDENCY'|'BLOCK',
 *     Description?: string,
 *     Sources?: list<array{Name?: string, Products?: list<string>, Configuration?: string, ...}>,
 *     AvailableSecurityUpdatesComplianceStatus?: 'COMPLIANT'|'NON_COMPLIANT',
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPatchBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPatchBaselineAsync(array{
 *     OperatingSystem?: 'ALMA_LINUX'|'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2022'|'AMAZON_LINUX_2023'|'CENTOS'|'DEBIAN'|'MACOS'|'ORACLE_LINUX'|'RASPBIAN'|'REDHAT_ENTERPRISE_LINUX'|'ROCKY_LINUX'|'SUSE'|'UBUNTU'|'WINDOWS',
 *     Name?: string,
 *     GlobalFilters?: array{PatchFilters?: list<array>, ...},
 *     ApprovalRules?: array{PatchRules?: list<array>, ...},
 *     ApprovedPatches?: list<string>,
 *     ApprovedPatchesComplianceLevel?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *     ApprovedPatchesEnableNonSecurity?: bool,
 *     RejectedPatches?: list<string>,
 *     RejectedPatchesAction?: 'ALLOW_AS_DEPENDENCY'|'BLOCK',
 *     Description?: string,
 *     Sources?: list<array{Name?: string, Products?: list<string>, Configuration?: string, ...}>,
 *     AvailableSecurityUpdatesComplianceStatus?: 'COMPLIANT'|'NON_COMPLIANT',
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResourceDataSync(array $args = [])
 * @phpstan-method \Aws\Result createResourceDataSync(array{
 *     SyncName?: string,
 *     S3Destination?: array{
 *         BucketName?: string,
 *         Prefix?: string,
 *         SyncFormat?: 'JsonSerDe',
 *         Region?: string,
 *         AWSKMSKeyARN?: string,
 *         DestinationDataSharing?: array{DestinationDataSharingType?: string, ...},
 *         ...,
 *     },
 *     SyncType?: string,
 *     SyncSource?: array{
 *         SourceType?: string,
 *         AwsOrganizationsSource?: array{OrganizationSourceType?: string, OrganizationalUnits?: list<array>, ...},
 *         SourceRegions?: list<string>,
 *         IncludeFutureRegions?: bool,
 *         EnableAllOpsDataSources?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceDataSyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceDataSyncAsync(array{
 *     SyncName?: string,
 *     S3Destination?: array{
 *         BucketName?: string,
 *         Prefix?: string,
 *         SyncFormat?: 'JsonSerDe',
 *         Region?: string,
 *         AWSKMSKeyARN?: string,
 *         DestinationDataSharing?: array{DestinationDataSharingType?: string, ...},
 *         ...,
 *     },
 *     SyncType?: string,
 *     SyncSource?: array{
 *         SourceType?: string,
 *         AwsOrganizationsSource?: array{OrganizationSourceType?: string, OrganizationalUnits?: list<array>, ...},
 *         SourceRegions?: list<string>,
 *         IncludeFutureRegions?: bool,
 *         EnableAllOpsDataSources?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteActivation(array $args = [])
 * @phpstan-method \Aws\Result deleteActivation(array{ActivationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteActivationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteActivationAsync(array{ActivationId?: string, ...} $args = [])
 * @method \Aws\Result deleteAssociation(array $args = [])
 * @phpstan-method \Aws\Result deleteAssociation(array{Name?: string, InstanceId?: string, AssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAssociationAsync(array{Name?: string, InstanceId?: string, AssociationId?: string, ...} $args = [])
 * @method \Aws\Result deleteCloudConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteCloudConnector(array{CloudConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCloudConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCloudConnectorAsync(array{CloudConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteDocument(array $args = [])
 * @phpstan-method \Aws\Result deleteDocument(array{Name?: string, DocumentVersion?: string, VersionName?: string, Force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDocumentAsync(array{Name?: string, DocumentVersion?: string, VersionName?: string, Force?: bool, ...} $args = [])
 * @method \Aws\Result deleteInventory(array $args = [])
 * @phpstan-method \Aws\Result deleteInventory(array{
 *     TypeName?: string,
 *     SchemaDeleteOption?: 'DeleteSchema'|'DisableSchema',
 *     DryRun?: bool,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInventoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInventoryAsync(array{
 *     TypeName?: string,
 *     SchemaDeleteOption?: 'DeleteSchema'|'DisableSchema',
 *     DryRun?: bool,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteMaintenanceWindow(array $args = [])
 * @phpstan-method \Aws\Result deleteMaintenanceWindow(array{WindowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMaintenanceWindowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMaintenanceWindowAsync(array{WindowId?: string, ...} $args = [])
 * @method \Aws\Result deleteOpsItem(array $args = [])
 * @phpstan-method \Aws\Result deleteOpsItem(array{OpsItemId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOpsItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOpsItemAsync(array{OpsItemId?: string, ...} $args = [])
 * @method \Aws\Result deleteOpsMetadata(array $args = [])
 * @phpstan-method \Aws\Result deleteOpsMetadata(array{OpsMetadataArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOpsMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOpsMetadataAsync(array{OpsMetadataArn?: string, ...} $args = [])
 * @method \Aws\Result deleteParameter(array $args = [])
 * @phpstan-method \Aws\Result deleteParameter(array{Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteParameterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteParameterAsync(array{Name?: string, ...} $args = [])
 * @method \Aws\Result deleteParameters(array $args = [])
 * @phpstan-method \Aws\Result deleteParameters(array{Names?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteParametersAsync(array{Names?: list<string>, ...} $args = [])
 * @method \Aws\Result deletePatchBaseline(array $args = [])
 * @phpstan-method \Aws\Result deletePatchBaseline(array{BaselineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePatchBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePatchBaselineAsync(array{BaselineId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourceDataSync(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceDataSync(array{SyncName?: string, SyncType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceDataSyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceDataSyncAsync(array{SyncName?: string, SyncType?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, PolicyId?: string, PolicyHash?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, PolicyId?: string, PolicyHash?: string, ...} $args = [])
 * @method \Aws\Result deregisterManagedInstance(array $args = [])
 * @phpstan-method \Aws\Result deregisterManagedInstance(array{InstanceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterManagedInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterManagedInstanceAsync(array{InstanceId?: string, ...} $args = [])
 * @method \Aws\Result deregisterPatchBaselineForPatchGroup(array $args = [])
 * @phpstan-method \Aws\Result deregisterPatchBaselineForPatchGroup(array{BaselineId?: string, PatchGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterPatchBaselineForPatchGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterPatchBaselineForPatchGroupAsync(array{BaselineId?: string, PatchGroup?: string, ...} $args = [])
 * @method \Aws\Result deregisterTargetFromMaintenanceWindow(array $args = [])
 * @phpstan-method \Aws\Result deregisterTargetFromMaintenanceWindow(array{WindowId?: string, WindowTargetId?: string, Safe?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterTargetFromMaintenanceWindowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterTargetFromMaintenanceWindowAsync(array{WindowId?: string, WindowTargetId?: string, Safe?: bool, ...} $args = [])
 * @method \Aws\Result deregisterTaskFromMaintenanceWindow(array $args = [])
 * @phpstan-method \Aws\Result deregisterTaskFromMaintenanceWindow(array{WindowId?: string, WindowTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterTaskFromMaintenanceWindowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterTaskFromMaintenanceWindowAsync(array{WindowId?: string, WindowTaskId?: string, ...} $args = [])
 * @method \Aws\Result describeActivations(array $args = [])
 * @phpstan-method \Aws\Result describeActivations(array{
 *     Filters?: list<array{FilterKey?: 'ActivationIds'|'DefaultInstanceName'|'IamRole', FilterValues?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeActivationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeActivationsAsync(array{
 *     Filters?: list<array{FilterKey?: 'ActivationIds'|'DefaultInstanceName'|'IamRole', FilterValues?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAssociation(array $args = [])
 * @phpstan-method \Aws\Result describeAssociation(array{Name?: string, InstanceId?: string, AssociationId?: string, AssociationVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssociationAsync(array{Name?: string, InstanceId?: string, AssociationId?: string, AssociationVersion?: string, ...} $args = [])
 * @method \Aws\Result describeAssociationExecutionTargets(array $args = [])
 * @phpstan-method \Aws\Result describeAssociationExecutionTargets(array{
 *     AssociationId?: string,
 *     ExecutionId?: string,
 *     Filters?: list<array{Key?: 'ResourceId'|'ResourceType'|'Status', Value?: string, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssociationExecutionTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssociationExecutionTargetsAsync(array{
 *     AssociationId?: string,
 *     ExecutionId?: string,
 *     Filters?: list<array{Key?: 'ResourceId'|'ResourceType'|'Status', Value?: string, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAssociationExecutions(array $args = [])
 * @phpstan-method \Aws\Result describeAssociationExecutions(array{
 *     AssociationId?: string,
 *     Filters?: list<array{
 *         Key?: 'CreatedTime'|'ExecutionId'|'Status',
 *         Value?: string,
 *         Type?: 'EQUAL'|'GREATER_THAN'|'LESS_THAN',
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssociationExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAssociationExecutionsAsync(array{
 *     AssociationId?: string,
 *     Filters?: list<array{
 *         Key?: 'CreatedTime'|'ExecutionId'|'Status',
 *         Value?: string,
 *         Type?: 'EQUAL'|'GREATER_THAN'|'LESS_THAN',
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAutomationExecutions(array $args = [])
 * @phpstan-method \Aws\Result describeAutomationExecutions(array{
 *     Filters?: list<array{
 *         Key?: 'AutomationSubtype'|'AutomationType'|'CurrentAction'|'DocumentNamePrefix'|'ExecutionId'|'ExecutionStatus'|'OpsItemId'|'ParentExecutionId'|'StartTimeAfter'|'StartTimeBefore'|'TagKey'|'TargetResourceGroup',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAutomationExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAutomationExecutionsAsync(array{
 *     Filters?: list<array{
 *         Key?: 'AutomationSubtype'|'AutomationType'|'CurrentAction'|'DocumentNamePrefix'|'ExecutionId'|'ExecutionStatus'|'OpsItemId'|'ParentExecutionId'|'StartTimeAfter'|'StartTimeBefore'|'TagKey'|'TargetResourceGroup',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAutomationStepExecutions(array $args = [])
 * @phpstan-method \Aws\Result describeAutomationStepExecutions(array{
 *     AutomationExecutionId?: string,
 *     Filters?: list<array{
 *         Key?: 'Action'|'ParentStepExecutionId'|'ParentStepIteration'|'ParentStepIteratorValue'|'StartTimeAfter'|'StartTimeBefore'|'StepExecutionId'|'StepExecutionStatus'|'StepName',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ReverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAutomationStepExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAutomationStepExecutionsAsync(array{
 *     AutomationExecutionId?: string,
 *     Filters?: list<array{
 *         Key?: 'Action'|'ParentStepExecutionId'|'ParentStepIteration'|'ParentStepIteratorValue'|'StartTimeAfter'|'StartTimeBefore'|'StepExecutionId'|'StepExecutionStatus'|'StepName',
 *         Values?: list<string>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ReverseOrder?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAvailablePatches(array $args = [])
 * @phpstan-method \Aws\Result describeAvailablePatches(array{
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAvailablePatchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAvailablePatchesAsync(array{
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeDocument(array $args = [])
 * @phpstan-method \Aws\Result describeDocument(array{Name?: string, DocumentVersion?: string, VersionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDocumentAsync(array{Name?: string, DocumentVersion?: string, VersionName?: string, ...} $args = [])
 * @method \Aws\Result describeDocumentPermission(array $args = [])
 * @phpstan-method \Aws\Result describeDocumentPermission(array{Name?: string, PermissionType?: 'Share', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDocumentPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDocumentPermissionAsync(array{Name?: string, PermissionType?: 'Share', MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeEffectiveInstanceAssociations(array $args = [])
 * @phpstan-method \Aws\Result describeEffectiveInstanceAssociations(array{InstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEffectiveInstanceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEffectiveInstanceAssociationsAsync(array{InstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeEffectivePatchesForPatchBaseline(array $args = [])
 * @phpstan-method \Aws\Result describeEffectivePatchesForPatchBaseline(array{BaselineId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEffectivePatchesForPatchBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEffectivePatchesForPatchBaselineAsync(array{BaselineId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeInstanceAssociationsStatus(array $args = [])
 * @phpstan-method \Aws\Result describeInstanceAssociationsStatus(array{InstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceAssociationsStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstanceAssociationsStatusAsync(array{InstanceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describeInstanceInformation(array $args = [])
 * @phpstan-method \Aws\Result describeInstanceInformation(array{
 *     InstanceInformationFilterList?: list<array{
 *         key?: 'ActivationIds'|'AgentVersion'|'AssociationStatus'|'IamRole'|'InstanceIds'|'PingStatus'|'PlatformTypes'|'ResourceType',
 *         valueSet?: list<string>,
 *         ...,
 *     }>,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstanceInformationAsync(array{
 *     InstanceInformationFilterList?: list<array{
 *         key?: 'ActivationIds'|'AgentVersion'|'AssociationStatus'|'IamRole'|'InstanceIds'|'PingStatus'|'PlatformTypes'|'ResourceType',
 *         valueSet?: list<string>,
 *         ...,
 *     }>,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInstancePatchStates(array $args = [])
 * @phpstan-method \Aws\Result describeInstancePatchStates(array{InstanceIds?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstancePatchStatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstancePatchStatesAsync(array{InstanceIds?: list<string>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeInstancePatchStatesForPatchGroup(array $args = [])
 * @phpstan-method \Aws\Result describeInstancePatchStatesForPatchGroup(array{
 *     PatchGroup?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, Type?: 'Equal'|'GreaterThan'|'LessThan'|'NotEqual', ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstancePatchStatesForPatchGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstancePatchStatesForPatchGroupAsync(array{
 *     PatchGroup?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, Type?: 'Equal'|'GreaterThan'|'LessThan'|'NotEqual', ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInstancePatches(array $args = [])
 * @phpstan-method \Aws\Result describeInstancePatches(array{
 *     InstanceId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstancePatchesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstancePatchesAsync(array{
 *     InstanceId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInstanceProperties(array $args = [])
 * @phpstan-method \Aws\Result describeInstanceProperties(array{
 *     InstancePropertyFilterList?: list<array{
 *         key?: 'ActivationIds'|'AgentVersion'|'AssociationStatus'|'DocumentName'|'IamRole'|'InstanceIds'|'PingStatus'|'PlatformTypes'|'ResourceType',
 *         valueSet?: list<string>,
 *         ...,
 *     }>,
 *     FiltersWithOperator?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Operator?: 'BeginWith'|'Equal'|'GreaterThan'|'LessThan'|'NotEqual',
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstancePropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInstancePropertiesAsync(array{
 *     InstancePropertyFilterList?: list<array{
 *         key?: 'ActivationIds'|'AgentVersion'|'AssociationStatus'|'DocumentName'|'IamRole'|'InstanceIds'|'PingStatus'|'PlatformTypes'|'ResourceType',
 *         valueSet?: list<string>,
 *         ...,
 *     }>,
 *     FiltersWithOperator?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Operator?: 'BeginWith'|'Equal'|'GreaterThan'|'LessThan'|'NotEqual',
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeInventoryDeletions(array $args = [])
 * @phpstan-method \Aws\Result describeInventoryDeletions(array{DeletionId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInventoryDeletionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInventoryDeletionsAsync(array{DeletionId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result describeMaintenanceWindowExecutionTaskInvocations(array $args = [])
 * @phpstan-method \Aws\Result describeMaintenanceWindowExecutionTaskInvocations(array{
 *     WindowExecutionId?: string,
 *     TaskId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMaintenanceWindowExecutionTaskInvocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMaintenanceWindowExecutionTaskInvocationsAsync(array{
 *     WindowExecutionId?: string,
 *     TaskId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMaintenanceWindowExecutionTasks(array $args = [])
 * @phpstan-method \Aws\Result describeMaintenanceWindowExecutionTasks(array{
 *     WindowExecutionId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMaintenanceWindowExecutionTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMaintenanceWindowExecutionTasksAsync(array{
 *     WindowExecutionId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMaintenanceWindowExecutions(array $args = [])
 * @phpstan-method \Aws\Result describeMaintenanceWindowExecutions(array{
 *     WindowId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMaintenanceWindowExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMaintenanceWindowExecutionsAsync(array{
 *     WindowId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMaintenanceWindowSchedule(array $args = [])
 * @phpstan-method \Aws\Result describeMaintenanceWindowSchedule(array{
 *     WindowId?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     ResourceType?: 'INSTANCE'|'RESOURCE_GROUP',
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMaintenanceWindowScheduleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMaintenanceWindowScheduleAsync(array{
 *     WindowId?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     ResourceType?: 'INSTANCE'|'RESOURCE_GROUP',
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMaintenanceWindowTargets(array $args = [])
 * @phpstan-method \Aws\Result describeMaintenanceWindowTargets(array{
 *     WindowId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMaintenanceWindowTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMaintenanceWindowTargetsAsync(array{
 *     WindowId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMaintenanceWindowTasks(array $args = [])
 * @phpstan-method \Aws\Result describeMaintenanceWindowTasks(array{
 *     WindowId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMaintenanceWindowTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMaintenanceWindowTasksAsync(array{
 *     WindowId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMaintenanceWindows(array $args = [])
 * @phpstan-method \Aws\Result describeMaintenanceWindows(array{
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMaintenanceWindowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMaintenanceWindowsAsync(array{
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeMaintenanceWindowsForTarget(array $args = [])
 * @phpstan-method \Aws\Result describeMaintenanceWindowsForTarget(array{
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     ResourceType?: 'INSTANCE'|'RESOURCE_GROUP',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMaintenanceWindowsForTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMaintenanceWindowsForTargetAsync(array{
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     ResourceType?: 'INSTANCE'|'RESOURCE_GROUP',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOpsItems(array $args = [])
 * @phpstan-method \Aws\Result describeOpsItems(array{
 *     OpsItemFilters?: list<array{
 *         Key?: 'AccessRequestByApproverArn'|'AccessRequestByApproverId'|'AccessRequestByIsReplica'|'AccessRequestByRequesterArn'|'AccessRequestByRequesterId'|'AccessRequestBySourceAccountId'|'AccessRequestBySourceOpsItemId'|'AccessRequestBySourceRegion'|'AccessRequestByTargetResourceId'|'AccountId'|'ActualEndTime'|'ActualStartTime'|'AutomationId'|'Category'|'ChangeRequestByApproverArn'|'ChangeRequestByApproverName'|'ChangeRequestByRequesterArn'|'ChangeRequestByRequesterName'|'ChangeRequestByTargetsResourceGroup'|'ChangeRequestByTemplate'|'CreatedBy'|'CreatedTime'|'InsightByType'|'LastModifiedTime'|'OperationalData'|'OperationalDataKey'|'OperationalDataValue'|'OpsItemId'|'OpsItemType'|'PlannedEndTime'|'PlannedStartTime'|'Priority'|'ResourceId'|'Severity'|'Source'|'Status'|'Title',
 *         Values?: list<string>,
 *         Operator?: 'Contains'|'Equal'|'GreaterThan'|'LessThan',
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOpsItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOpsItemsAsync(array{
 *     OpsItemFilters?: list<array{
 *         Key?: 'AccessRequestByApproverArn'|'AccessRequestByApproverId'|'AccessRequestByIsReplica'|'AccessRequestByRequesterArn'|'AccessRequestByRequesterId'|'AccessRequestBySourceAccountId'|'AccessRequestBySourceOpsItemId'|'AccessRequestBySourceRegion'|'AccessRequestByTargetResourceId'|'AccountId'|'ActualEndTime'|'ActualStartTime'|'AutomationId'|'Category'|'ChangeRequestByApproverArn'|'ChangeRequestByApproverName'|'ChangeRequestByRequesterArn'|'ChangeRequestByRequesterName'|'ChangeRequestByTargetsResourceGroup'|'ChangeRequestByTemplate'|'CreatedBy'|'CreatedTime'|'InsightByType'|'LastModifiedTime'|'OperationalData'|'OperationalDataKey'|'OperationalDataValue'|'OpsItemId'|'OpsItemType'|'PlannedEndTime'|'PlannedStartTime'|'Priority'|'ResourceId'|'Severity'|'Source'|'Status'|'Title',
 *         Values?: list<string>,
 *         Operator?: 'Contains'|'Equal'|'GreaterThan'|'LessThan',
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeParameters(array $args = [])
 * @phpstan-method \Aws\Result describeParameters(array{
 *     Filters?: list<array{Key?: 'KeyId'|'Name'|'Type', Values?: list<string>, ...}>,
 *     ParameterFilters?: list<array{Key?: string, Option?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Shared?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeParametersAsync(array{
 *     Filters?: list<array{Key?: 'KeyId'|'Name'|'Type', Values?: list<string>, ...}>,
 *     ParameterFilters?: list<array{Key?: string, Option?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Shared?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePatchBaselines(array $args = [])
 * @phpstan-method \Aws\Result describePatchBaselines(array{
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePatchBaselinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePatchBaselinesAsync(array{
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePatchGroupState(array $args = [])
 * @phpstan-method \Aws\Result describePatchGroupState(array{PatchGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePatchGroupStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePatchGroupStateAsync(array{PatchGroup?: string, ...} $args = [])
 * @method \Aws\Result describePatchGroups(array $args = [])
 * @phpstan-method \Aws\Result describePatchGroups(array{
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePatchGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePatchGroupsAsync(array{
 *     MaxResults?: int,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describePatchProperties(array $args = [])
 * @phpstan-method \Aws\Result describePatchProperties(array{
 *     OperatingSystem?: 'ALMA_LINUX'|'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2022'|'AMAZON_LINUX_2023'|'CENTOS'|'DEBIAN'|'MACOS'|'ORACLE_LINUX'|'RASPBIAN'|'REDHAT_ENTERPRISE_LINUX'|'ROCKY_LINUX'|'SUSE'|'UBUNTU'|'WINDOWS',
 *     Property?: 'CLASSIFICATION'|'MSRC_SEVERITY'|'PRIORITY'|'PRODUCT'|'PRODUCT_FAMILY'|'SEVERITY',
 *     PatchSet?: 'APPLICATION'|'OS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePatchPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePatchPropertiesAsync(array{
 *     OperatingSystem?: 'ALMA_LINUX'|'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2022'|'AMAZON_LINUX_2023'|'CENTOS'|'DEBIAN'|'MACOS'|'ORACLE_LINUX'|'RASPBIAN'|'REDHAT_ENTERPRISE_LINUX'|'ROCKY_LINUX'|'SUSE'|'UBUNTU'|'WINDOWS',
 *     Property?: 'CLASSIFICATION'|'MSRC_SEVERITY'|'PRIORITY'|'PRODUCT'|'PRODUCT_FAMILY'|'SEVERITY',
 *     PatchSet?: 'APPLICATION'|'OS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeSessions(array $args = [])
 * @phpstan-method \Aws\Result describeSessions(array{
 *     State?: 'Active'|'History',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         key?: 'AccessType'|'InvokedAfter'|'InvokedBefore'|'Owner'|'SessionId'|'Status'|'Target',
 *         value?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSessionsAsync(array{
 *     State?: 'Active'|'History',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         key?: 'AccessType'|'InvokedAfter'|'InvokedBefore'|'Owner'|'SessionId'|'Status'|'Target',
 *         value?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateOpsItemRelatedItem(array $args = [])
 * @phpstan-method \Aws\Result disassociateOpsItemRelatedItem(array{OpsItemId?: string, AssociationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateOpsItemRelatedItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateOpsItemRelatedItemAsync(array{OpsItemId?: string, AssociationId?: string, ...} $args = [])
 * @method \Aws\Result getAccessToken(array $args = [])
 * @phpstan-method \Aws\Result getAccessToken(array{AccessRequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessTokenAsync(array{AccessRequestId?: string, ...} $args = [])
 * @method \Aws\Result getAutomationExecution(array $args = [])
 * @phpstan-method \Aws\Result getAutomationExecution(array{AutomationExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomationExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomationExecutionAsync(array{AutomationExecutionId?: string, ...} $args = [])
 * @method \Aws\Result getCalendarState(array $args = [])
 * @phpstan-method \Aws\Result getCalendarState(array{CalendarNames?: list<string>, AtTime?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCalendarStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCalendarStateAsync(array{CalendarNames?: list<string>, AtTime?: string, ...} $args = [])
 * @method \Aws\Result getCloudConnector(array $args = [])
 * @phpstan-method \Aws\Result getCloudConnector(array{CloudConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCloudConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCloudConnectorAsync(array{CloudConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getCommandInvocation(array $args = [])
 * @phpstan-method \Aws\Result getCommandInvocation(array{CommandId?: string, InstanceId?: string, PluginName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCommandInvocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCommandInvocationAsync(array{CommandId?: string, InstanceId?: string, PluginName?: string, ...} $args = [])
 * @method \Aws\Result getConnectionStatus(array $args = [])
 * @phpstan-method \Aws\Result getConnectionStatus(array{Target?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionStatusAsync(array{Target?: string, ...} $args = [])
 * @method \Aws\Result getDefaultPatchBaseline(array $args = [])
 * @phpstan-method \Aws\Result getDefaultPatchBaseline(array{
 *     OperatingSystem?: 'ALMA_LINUX'|'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2022'|'AMAZON_LINUX_2023'|'CENTOS'|'DEBIAN'|'MACOS'|'ORACLE_LINUX'|'RASPBIAN'|'REDHAT_ENTERPRISE_LINUX'|'ROCKY_LINUX'|'SUSE'|'UBUNTU'|'WINDOWS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDefaultPatchBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDefaultPatchBaselineAsync(array{
 *     OperatingSystem?: 'ALMA_LINUX'|'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2022'|'AMAZON_LINUX_2023'|'CENTOS'|'DEBIAN'|'MACOS'|'ORACLE_LINUX'|'RASPBIAN'|'REDHAT_ENTERPRISE_LINUX'|'ROCKY_LINUX'|'SUSE'|'UBUNTU'|'WINDOWS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDeployablePatchSnapshotForInstance(array $args = [])
 * @phpstan-method \Aws\Result getDeployablePatchSnapshotForInstance(array{
 *     InstanceId?: string,
 *     SnapshotId?: string,
 *     BaselineOverride?: array{
 *         OperatingSystem?: 'ALMA_LINUX'|'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2022'|'AMAZON_LINUX_2023'|'CENTOS'|'DEBIAN'|'MACOS'|'ORACLE_LINUX'|'RASPBIAN'|'REDHAT_ENTERPRISE_LINUX'|'ROCKY_LINUX'|'SUSE'|'UBUNTU'|'WINDOWS',
 *         GlobalFilters?: array{PatchFilters?: list<array>, ...},
 *         ApprovalRules?: array{PatchRules?: list<array>, ...},
 *         ApprovedPatches?: list<string>,
 *         ApprovedPatchesComplianceLevel?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *         RejectedPatches?: list<string>,
 *         RejectedPatchesAction?: 'ALLOW_AS_DEPENDENCY'|'BLOCK',
 *         ApprovedPatchesEnableNonSecurity?: bool,
 *         Sources?: list<array>,
 *         AvailableSecurityUpdatesComplianceStatus?: 'COMPLIANT'|'NON_COMPLIANT',
 *         ...,
 *     },
 *     UseS3DualStackEndpoint?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeployablePatchSnapshotForInstanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeployablePatchSnapshotForInstanceAsync(array{
 *     InstanceId?: string,
 *     SnapshotId?: string,
 *     BaselineOverride?: array{
 *         OperatingSystem?: 'ALMA_LINUX'|'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2022'|'AMAZON_LINUX_2023'|'CENTOS'|'DEBIAN'|'MACOS'|'ORACLE_LINUX'|'RASPBIAN'|'REDHAT_ENTERPRISE_LINUX'|'ROCKY_LINUX'|'SUSE'|'UBUNTU'|'WINDOWS',
 *         GlobalFilters?: array{PatchFilters?: list<array>, ...},
 *         ApprovalRules?: array{PatchRules?: list<array>, ...},
 *         ApprovedPatches?: list<string>,
 *         ApprovedPatchesComplianceLevel?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *         RejectedPatches?: list<string>,
 *         RejectedPatchesAction?: 'ALLOW_AS_DEPENDENCY'|'BLOCK',
 *         ApprovedPatchesEnableNonSecurity?: bool,
 *         Sources?: list<array>,
 *         AvailableSecurityUpdatesComplianceStatus?: 'COMPLIANT'|'NON_COMPLIANT',
 *         ...,
 *     },
 *     UseS3DualStackEndpoint?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDocument(array $args = [])
 * @phpstan-method \Aws\Result getDocument(array{
 *     Name?: string,
 *     VersionName?: string,
 *     DocumentVersion?: string,
 *     DocumentFormat?: 'JSON'|'TEXT'|'YAML',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDocumentAsync(array{
 *     Name?: string,
 *     VersionName?: string,
 *     DocumentVersion?: string,
 *     DocumentFormat?: 'JSON'|'TEXT'|'YAML',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getExecutionPreview(array $args = [])
 * @phpstan-method \Aws\Result getExecutionPreview(array{ExecutionPreviewId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getExecutionPreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExecutionPreviewAsync(array{ExecutionPreviewId?: string, ...} $args = [])
 * @method \Aws\Result getInventory(array $args = [])
 * @phpstan-method \Aws\Result getInventory(array{
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BeginWith'|'Equal'|'Exists'|'GreaterThan'|'LessThan'|'NotEqual',
 *         ...,
 *     }>,
 *     Aggregators?: list<array{Expression?: string, Aggregators?: list<array>, Groups?: list<array>, ...}>,
 *     ResultAttributes?: list<array{TypeName?: string, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getInventoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInventoryAsync(array{
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BeginWith'|'Equal'|'Exists'|'GreaterThan'|'LessThan'|'NotEqual',
 *         ...,
 *     }>,
 *     Aggregators?: list<array{Expression?: string, Aggregators?: list<array>, Groups?: list<array>, ...}>,
 *     ResultAttributes?: list<array{TypeName?: string, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getInventorySchema(array $args = [])
 * @phpstan-method \Aws\Result getInventorySchema(array{TypeName?: string, NextToken?: string, MaxResults?: int, Aggregator?: bool, SubType?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInventorySchemaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInventorySchemaAsync(array{TypeName?: string, NextToken?: string, MaxResults?: int, Aggregator?: bool, SubType?: bool, ...} $args = [])
 * @method \Aws\Result getMaintenanceWindow(array $args = [])
 * @phpstan-method \Aws\Result getMaintenanceWindow(array{WindowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMaintenanceWindowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMaintenanceWindowAsync(array{WindowId?: string, ...} $args = [])
 * @method \Aws\Result getMaintenanceWindowExecution(array $args = [])
 * @phpstan-method \Aws\Result getMaintenanceWindowExecution(array{WindowExecutionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMaintenanceWindowExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMaintenanceWindowExecutionAsync(array{WindowExecutionId?: string, ...} $args = [])
 * @method \Aws\Result getMaintenanceWindowExecutionTask(array $args = [])
 * @phpstan-method \Aws\Result getMaintenanceWindowExecutionTask(array{WindowExecutionId?: string, TaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMaintenanceWindowExecutionTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMaintenanceWindowExecutionTaskAsync(array{WindowExecutionId?: string, TaskId?: string, ...} $args = [])
 * @method \Aws\Result getMaintenanceWindowExecutionTaskInvocation(array $args = [])
 * @phpstan-method \Aws\Result getMaintenanceWindowExecutionTaskInvocation(array{WindowExecutionId?: string, TaskId?: string, InvocationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMaintenanceWindowExecutionTaskInvocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMaintenanceWindowExecutionTaskInvocationAsync(array{WindowExecutionId?: string, TaskId?: string, InvocationId?: string, ...} $args = [])
 * @method \Aws\Result getMaintenanceWindowTask(array $args = [])
 * @phpstan-method \Aws\Result getMaintenanceWindowTask(array{WindowId?: string, WindowTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMaintenanceWindowTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMaintenanceWindowTaskAsync(array{WindowId?: string, WindowTaskId?: string, ...} $args = [])
 * @method \Aws\Result getOpsItem(array $args = [])
 * @phpstan-method \Aws\Result getOpsItem(array{OpsItemId?: string, OpsItemArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOpsItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOpsItemAsync(array{OpsItemId?: string, OpsItemArn?: string, ...} $args = [])
 * @method \Aws\Result getOpsMetadata(array $args = [])
 * @phpstan-method \Aws\Result getOpsMetadata(array{OpsMetadataArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOpsMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOpsMetadataAsync(array{OpsMetadataArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getOpsSummary(array $args = [])
 * @phpstan-method \Aws\Result getOpsSummary(array{
 *     SyncName?: string,
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BeginWith'|'Equal'|'Exists'|'GreaterThan'|'LessThan'|'NotEqual',
 *         ...,
 *     }>,
 *     Aggregators?: list<array{
 *         AggregatorType?: string,
 *         TypeName?: string,
 *         AttributeName?: string,
 *         Values?: array<string, string>,
 *         Filters?: list<array>,
 *         Aggregators?: list<array>,
 *         ...,
 *     }>,
 *     ResultAttributes?: list<array{TypeName?: string, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getOpsSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOpsSummaryAsync(array{
 *     SyncName?: string,
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BeginWith'|'Equal'|'Exists'|'GreaterThan'|'LessThan'|'NotEqual',
 *         ...,
 *     }>,
 *     Aggregators?: list<array{
 *         AggregatorType?: string,
 *         TypeName?: string,
 *         AttributeName?: string,
 *         Values?: array<string, string>,
 *         Filters?: list<array>,
 *         Aggregators?: list<array>,
 *         ...,
 *     }>,
 *     ResultAttributes?: list<array{TypeName?: string, ...}>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getParameter(array $args = [])
 * @phpstan-method \Aws\Result getParameter(array{Name?: string, WithDecryption?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getParameterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getParameterAsync(array{Name?: string, WithDecryption?: bool, ...} $args = [])
 * @method \Aws\Result getParameterHistory(array $args = [])
 * @phpstan-method \Aws\Result getParameterHistory(array{Name?: string, WithDecryption?: bool, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getParameterHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getParameterHistoryAsync(array{Name?: string, WithDecryption?: bool, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result getParameters(array $args = [])
 * @phpstan-method \Aws\Result getParameters(array{Names?: list<string>, WithDecryption?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getParametersAsync(array{Names?: list<string>, WithDecryption?: bool, ...} $args = [])
 * @method \Aws\Result getParametersByPath(array $args = [])
 * @phpstan-method \Aws\Result getParametersByPath(array{
 *     Path?: string,
 *     Recursive?: bool,
 *     ParameterFilters?: list<array{Key?: string, Option?: string, Values?: list<string>, ...}>,
 *     WithDecryption?: bool,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getParametersByPathAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getParametersByPathAsync(array{
 *     Path?: string,
 *     Recursive?: bool,
 *     ParameterFilters?: list<array{Key?: string, Option?: string, Values?: list<string>, ...}>,
 *     WithDecryption?: bool,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPatchBaseline(array $args = [])
 * @phpstan-method \Aws\Result getPatchBaseline(array{BaselineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPatchBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPatchBaselineAsync(array{BaselineId?: string, ...} $args = [])
 * @method \Aws\Result getPatchBaselineForPatchGroup(array $args = [])
 * @phpstan-method \Aws\Result getPatchBaselineForPatchGroup(array{
 *     PatchGroup?: string,
 *     OperatingSystem?: 'ALMA_LINUX'|'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2022'|'AMAZON_LINUX_2023'|'CENTOS'|'DEBIAN'|'MACOS'|'ORACLE_LINUX'|'RASPBIAN'|'REDHAT_ENTERPRISE_LINUX'|'ROCKY_LINUX'|'SUSE'|'UBUNTU'|'WINDOWS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPatchBaselineForPatchGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPatchBaselineForPatchGroupAsync(array{
 *     PatchGroup?: string,
 *     OperatingSystem?: 'ALMA_LINUX'|'AMAZON_LINUX'|'AMAZON_LINUX_2'|'AMAZON_LINUX_2022'|'AMAZON_LINUX_2023'|'CENTOS'|'DEBIAN'|'MACOS'|'ORACLE_LINUX'|'RASPBIAN'|'REDHAT_ENTERPRISE_LINUX'|'ROCKY_LINUX'|'SUSE'|'UBUNTU'|'WINDOWS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourcePolicies(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicies(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePoliciesAsync(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getServiceSetting(array $args = [])
 * @phpstan-method \Aws\Result getServiceSetting(array{SettingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceSettingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceSettingAsync(array{SettingId?: string, ...} $args = [])
 * @method \Aws\Result labelParameterVersion(array $args = [])
 * @phpstan-method \Aws\Result labelParameterVersion(array{Name?: string, ParameterVersion?: int, Labels?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise labelParameterVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise labelParameterVersionAsync(array{Name?: string, ParameterVersion?: int, Labels?: list<string>, ...} $args = [])
 * @method \Aws\Result listAssociationVersions(array $args = [])
 * @phpstan-method \Aws\Result listAssociationVersions(array{AssociationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociationVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociationVersionsAsync(array{AssociationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listAssociations(array $args = [])
 * @phpstan-method \Aws\Result listAssociations(array{
 *     AssociationFilterList?: list<array{
 *         key?: 'AssociationId'|'AssociationName'|'AssociationStatusName'|'CloudConnectorId'|'InstanceId'|'LastExecutedAfter'|'LastExecutedBefore'|'Name'|'ResourceGroupName',
 *         value?: string,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociationsAsync(array{
 *     AssociationFilterList?: list<array{
 *         key?: 'AssociationId'|'AssociationName'|'AssociationStatusName'|'CloudConnectorId'|'InstanceId'|'LastExecutedAfter'|'LastExecutedBefore'|'Name'|'ResourceGroupName',
 *         value?: string,
 *         ...,
 *     }>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCloudConnectors(array $args = [])
 * @phpstan-method \Aws\Result listCloudConnectors(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{FilterKey?: 'SubscriptionId'|'TenantId', FilterValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCloudConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCloudConnectorsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{FilterKey?: 'SubscriptionId'|'TenantId', FilterValues?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCommandInvocations(array $args = [])
 * @phpstan-method \Aws\Result listCommandInvocations(array{
 *     CommandId?: string,
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{key?: 'DocumentName'|'ExecutionStage'|'InvokedAfter'|'InvokedBefore'|'Status', value?: string, ...}>,
 *     Details?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCommandInvocationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCommandInvocationsAsync(array{
 *     CommandId?: string,
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{key?: 'DocumentName'|'ExecutionStage'|'InvokedAfter'|'InvokedBefore'|'Status', value?: string, ...}>,
 *     Details?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCommands(array $args = [])
 * @phpstan-method \Aws\Result listCommands(array{
 *     CommandId?: string,
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{key?: 'DocumentName'|'ExecutionStage'|'InvokedAfter'|'InvokedBefore'|'Status', value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCommandsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCommandsAsync(array{
 *     CommandId?: string,
 *     InstanceId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{key?: 'DocumentName'|'ExecutionStage'|'InvokedAfter'|'InvokedBefore'|'Status', value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listComplianceItems(array $args = [])
 * @phpstan-method \Aws\Result listComplianceItems(array{
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BEGIN_WITH'|'EQUAL'|'GREATER_THAN'|'LESS_THAN'|'NOT_EQUAL',
 *         ...,
 *     }>,
 *     ResourceIds?: list<string>,
 *     ResourceTypes?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listComplianceItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComplianceItemsAsync(array{
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BEGIN_WITH'|'EQUAL'|'GREATER_THAN'|'LESS_THAN'|'NOT_EQUAL',
 *         ...,
 *     }>,
 *     ResourceIds?: list<string>,
 *     ResourceTypes?: list<string>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listComplianceSummaries(array $args = [])
 * @phpstan-method \Aws\Result listComplianceSummaries(array{
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BEGIN_WITH'|'EQUAL'|'GREATER_THAN'|'LESS_THAN'|'NOT_EQUAL',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listComplianceSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComplianceSummariesAsync(array{
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BEGIN_WITH'|'EQUAL'|'GREATER_THAN'|'LESS_THAN'|'NOT_EQUAL',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDocumentMetadataHistory(array $args = [])
 * @phpstan-method \Aws\Result listDocumentMetadataHistory(array{
 *     Name?: string,
 *     DocumentVersion?: string,
 *     Metadata?: 'DocumentReviews',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentMetadataHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDocumentMetadataHistoryAsync(array{
 *     Name?: string,
 *     DocumentVersion?: string,
 *     Metadata?: 'DocumentReviews',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDocumentVersions(array $args = [])
 * @phpstan-method \Aws\Result listDocumentVersions(array{Name?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDocumentVersionsAsync(array{Name?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listDocuments(array $args = [])
 * @phpstan-method \Aws\Result listDocuments(array{
 *     DocumentFilterList?: list<array{key?: 'DocumentType'|'Name'|'Owner'|'PlatformTypes', value?: string, ...}>,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDocumentsAsync(array{
 *     DocumentFilterList?: list<array{key?: 'DocumentType'|'Name'|'Owner'|'PlatformTypes', value?: string, ...}>,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInventoryEntries(array $args = [])
 * @phpstan-method \Aws\Result listInventoryEntries(array{
 *     InstanceId?: string,
 *     TypeName?: string,
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BeginWith'|'Equal'|'Exists'|'GreaterThan'|'LessThan'|'NotEqual',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInventoryEntriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInventoryEntriesAsync(array{
 *     InstanceId?: string,
 *     TypeName?: string,
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BeginWith'|'Equal'|'Exists'|'GreaterThan'|'LessThan'|'NotEqual',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNodes(array $args = [])
 * @phpstan-method \Aws\Result listNodes(array{
 *     SyncName?: string,
 *     Filters?: list<array{
 *         Key?: 'AccountId'|'AgentType'|'AgentVersion'|'AvailabilityZone'|'AvailabilityZoneId'|'ComputerName'|'InstanceId'|'InstanceStatus'|'IpAddress'|'ManagedStatus'|'OrganizationalUnitId'|'OrganizationalUnitPath'|'PlatformName'|'PlatformType'|'PlatformVersion'|'Region'|'ResourceType'|'SourceId'|'SourceLocation'|'SourceType',
 *         Values?: list<string>,
 *         Type?: 'BeginWith'|'Equal'|'NotEqual',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNodesAsync(array{
 *     SyncName?: string,
 *     Filters?: list<array{
 *         Key?: 'AccountId'|'AgentType'|'AgentVersion'|'AvailabilityZone'|'AvailabilityZoneId'|'ComputerName'|'InstanceId'|'InstanceStatus'|'IpAddress'|'ManagedStatus'|'OrganizationalUnitId'|'OrganizationalUnitPath'|'PlatformName'|'PlatformType'|'PlatformVersion'|'Region'|'ResourceType'|'SourceId'|'SourceLocation'|'SourceType',
 *         Values?: list<string>,
 *         Type?: 'BeginWith'|'Equal'|'NotEqual',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNodesSummary(array $args = [])
 * @phpstan-method \Aws\Result listNodesSummary(array{
 *     SyncName?: string,
 *     Filters?: list<array{
 *         Key?: 'AccountId'|'AgentType'|'AgentVersion'|'AvailabilityZone'|'AvailabilityZoneId'|'ComputerName'|'InstanceId'|'InstanceStatus'|'IpAddress'|'ManagedStatus'|'OrganizationalUnitId'|'OrganizationalUnitPath'|'PlatformName'|'PlatformType'|'PlatformVersion'|'Region'|'ResourceType'|'SourceId'|'SourceLocation'|'SourceType',
 *         Values?: list<string>,
 *         Type?: 'BeginWith'|'Equal'|'NotEqual',
 *         ...,
 *     }>,
 *     Aggregators?: list<array{
 *         AggregatorType?: 'Count',
 *         TypeName?: 'Instance',
 *         AttributeName?: 'AgentVersion'|'AvailabilityZone'|'PlatformName'|'PlatformType'|'PlatformVersion'|'Region'|'ResourceType'|'SourceType',
 *         Aggregators?: list<array>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listNodesSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNodesSummaryAsync(array{
 *     SyncName?: string,
 *     Filters?: list<array{
 *         Key?: 'AccountId'|'AgentType'|'AgentVersion'|'AvailabilityZone'|'AvailabilityZoneId'|'ComputerName'|'InstanceId'|'InstanceStatus'|'IpAddress'|'ManagedStatus'|'OrganizationalUnitId'|'OrganizationalUnitPath'|'PlatformName'|'PlatformType'|'PlatformVersion'|'Region'|'ResourceType'|'SourceId'|'SourceLocation'|'SourceType',
 *         Values?: list<string>,
 *         Type?: 'BeginWith'|'Equal'|'NotEqual',
 *         ...,
 *     }>,
 *     Aggregators?: list<array{
 *         AggregatorType?: 'Count',
 *         TypeName?: 'Instance',
 *         AttributeName?: 'AgentVersion'|'AvailabilityZone'|'PlatformName'|'PlatformType'|'PlatformVersion'|'Region'|'ResourceType'|'SourceType',
 *         Aggregators?: list<array>,
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOpsItemEvents(array $args = [])
 * @phpstan-method \Aws\Result listOpsItemEvents(array{
 *     Filters?: list<array{Key?: 'OpsItemId', Values?: list<string>, Operator?: 'Equal', ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOpsItemEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOpsItemEventsAsync(array{
 *     Filters?: list<array{Key?: 'OpsItemId', Values?: list<string>, Operator?: 'Equal', ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOpsItemRelatedItems(array $args = [])
 * @phpstan-method \Aws\Result listOpsItemRelatedItems(array{
 *     OpsItemId?: string,
 *     Filters?: list<array{Key?: 'AssociationId'|'ResourceType'|'ResourceUri', Values?: list<string>, Operator?: 'Equal', ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOpsItemRelatedItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOpsItemRelatedItemsAsync(array{
 *     OpsItemId?: string,
 *     Filters?: list<array{Key?: 'AssociationId'|'ResourceType'|'ResourceUri', Values?: list<string>, Operator?: 'Equal', ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOpsMetadata(array $args = [])
 * @phpstan-method \Aws\Result listOpsMetadata(array{
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOpsMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOpsMetadataAsync(array{
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceComplianceSummaries(array $args = [])
 * @phpstan-method \Aws\Result listResourceComplianceSummaries(array{
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BEGIN_WITH'|'EQUAL'|'GREATER_THAN'|'LESS_THAN'|'NOT_EQUAL',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceComplianceSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceComplianceSummariesAsync(array{
 *     Filters?: list<array{
 *         Key?: string,
 *         Values?: list<string>,
 *         Type?: 'BEGIN_WITH'|'EQUAL'|'GREATER_THAN'|'LESS_THAN'|'NOT_EQUAL',
 *         ...,
 *     }>,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceDataSync(array $args = [])
 * @phpstan-method \Aws\Result listResourceDataSync(array{SyncType?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceDataSyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceDataSyncAsync(array{SyncType?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{
 *     ResourceType?: 'Association'|'Automation'|'CloudConnector'|'Document'|'MaintenanceWindow'|'ManagedInstance'|'OpsItem'|'OpsMetadata'|'Parameter'|'PatchBaseline',
 *     ResourceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{
 *     ResourceType?: 'Association'|'Automation'|'CloudConnector'|'Document'|'MaintenanceWindow'|'ManagedInstance'|'OpsItem'|'OpsMetadata'|'Parameter'|'PatchBaseline',
 *     ResourceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result modifyDocumentPermission(array $args = [])
 * @phpstan-method \Aws\Result modifyDocumentPermission(array{
 *     Name?: string,
 *     PermissionType?: 'Share',
 *     AccountIdsToAdd?: list<string>,
 *     AccountIdsToRemove?: list<string>,
 *     SharedDocumentVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise modifyDocumentPermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyDocumentPermissionAsync(array{
 *     Name?: string,
 *     PermissionType?: 'Share',
 *     AccountIdsToAdd?: list<string>,
 *     AccountIdsToRemove?: list<string>,
 *     SharedDocumentVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putComplianceItems(array $args = [])
 * @phpstan-method \Aws\Result putComplianceItems(array{
 *     ResourceId?: string,
 *     ResourceType?: string,
 *     ComplianceType?: string,
 *     ExecutionSummary?: array{ExecutionTime?: int|string|\DateTimeInterface, ExecutionId?: string, ExecutionType?: string, ...},
 *     Items?: list<array{
 *         Id?: string,
 *         Title?: string,
 *         Severity?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *         Status?: 'COMPLIANT'|'NON_COMPLIANT',
 *         Details?: array<string, string>,
 *         ...,
 *     }>,
 *     ItemContentHash?: string,
 *     UploadType?: 'COMPLETE'|'PARTIAL',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putComplianceItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putComplianceItemsAsync(array{
 *     ResourceId?: string,
 *     ResourceType?: string,
 *     ComplianceType?: string,
 *     ExecutionSummary?: array{ExecutionTime?: int|string|\DateTimeInterface, ExecutionId?: string, ExecutionType?: string, ...},
 *     Items?: list<array{
 *         Id?: string,
 *         Title?: string,
 *         Severity?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *         Status?: 'COMPLIANT'|'NON_COMPLIANT',
 *         Details?: array<string, string>,
 *         ...,
 *     }>,
 *     ItemContentHash?: string,
 *     UploadType?: 'COMPLETE'|'PARTIAL',
 *     ...,
 * } $args = [])
 * @method \Aws\Result putInventory(array $args = [])
 * @phpstan-method \Aws\Result putInventory(array{
 *     InstanceId?: string,
 *     Items?: list<array{
 *         TypeName?: string,
 *         SchemaVersion?: string,
 *         CaptureTime?: string,
 *         ContentHash?: string,
 *         Content?: list<array<string, string>>,
 *         Context?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putInventoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putInventoryAsync(array{
 *     InstanceId?: string,
 *     Items?: list<array{
 *         TypeName?: string,
 *         SchemaVersion?: string,
 *         CaptureTime?: string,
 *         ContentHash?: string,
 *         Content?: list<array<string, string>>,
 *         Context?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putParameter(array $args = [])
 * @phpstan-method \Aws\Result putParameter(array{
 *     Name?: string,
 *     Description?: string,
 *     Value?: string,
 *     Type?: 'SecureString'|'String'|'StringList',
 *     KeyId?: string,
 *     Overwrite?: bool,
 *     AllowedPattern?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Tier?: 'Advanced'|'Intelligent-Tiering'|'Standard',
 *     Policies?: string,
 *     DataType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putParameterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putParameterAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     Value?: string,
 *     Type?: 'SecureString'|'String'|'StringList',
 *     KeyId?: string,
 *     Overwrite?: bool,
 *     AllowedPattern?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Tier?: 'Advanced'|'Intelligent-Tiering'|'Standard',
 *     Policies?: string,
 *     DataType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, Policy?: string, PolicyId?: string, PolicyHash?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, Policy?: string, PolicyId?: string, PolicyHash?: string, ...} $args = [])
 * @method \Aws\Result registerDefaultPatchBaseline(array $args = [])
 * @phpstan-method \Aws\Result registerDefaultPatchBaseline(array{BaselineId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerDefaultPatchBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerDefaultPatchBaselineAsync(array{BaselineId?: string, ...} $args = [])
 * @method \Aws\Result registerPatchBaselineForPatchGroup(array $args = [])
 * @phpstan-method \Aws\Result registerPatchBaselineForPatchGroup(array{BaselineId?: string, PatchGroup?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerPatchBaselineForPatchGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerPatchBaselineForPatchGroupAsync(array{BaselineId?: string, PatchGroup?: string, ...} $args = [])
 * @method \Aws\Result registerTargetWithMaintenanceWindow(array $args = [])
 * @phpstan-method \Aws\Result registerTargetWithMaintenanceWindow(array{
 *     WindowId?: string,
 *     ResourceType?: 'INSTANCE'|'RESOURCE_GROUP',
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     OwnerInformation?: string,
 *     Name?: string,
 *     Description?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerTargetWithMaintenanceWindowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerTargetWithMaintenanceWindowAsync(array{
 *     WindowId?: string,
 *     ResourceType?: 'INSTANCE'|'RESOURCE_GROUP',
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     OwnerInformation?: string,
 *     Name?: string,
 *     Description?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerTaskWithMaintenanceWindow(array $args = [])
 * @phpstan-method \Aws\Result registerTaskWithMaintenanceWindow(array{
 *     WindowId?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     TaskArn?: string,
 *     ServiceRoleArn?: string,
 *     TaskType?: 'AUTOMATION'|'LAMBDA'|'RUN_COMMAND'|'STEP_FUNCTIONS',
 *     TaskParameters?: array<string, array{Values?: list<string>, ...}>,
 *     TaskInvocationParameters?: array{
 *         RunCommand?: array{
 *             Comment?: string,
 *             CloudWatchOutputConfig?: array,
 *             DocumentHash?: string,
 *             DocumentHashType?: 'Sha1'|'Sha256',
 *             DocumentVersion?: string,
 *             NotificationConfig?: array,
 *             OutputS3BucketName?: string,
 *             OutputS3KeyPrefix?: string,
 *             Parameters?: array<string, list<string>>,
 *             ServiceRoleArn?: string,
 *             TimeoutSeconds?: int,
 *             ...,
 *         },
 *         Automation?: array{DocumentVersion?: string, Parameters?: array<string, list<string>>, ...},
 *         StepFunctions?: array{Input?: string, Name?: string, ...},
 *         Lambda?: array{
 *             ClientContext?: string,
 *             Qualifier?: string,
 *             Payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Priority?: int,
 *     MaxConcurrency?: string,
 *     MaxErrors?: string,
 *     LoggingInfo?: array{S3BucketName?: string, S3KeyPrefix?: string, S3Region?: string, ...},
 *     Name?: string,
 *     Description?: string,
 *     ClientToken?: string,
 *     CutoffBehavior?: 'CANCEL_TASK'|'CONTINUE_TASK',
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerTaskWithMaintenanceWindowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerTaskWithMaintenanceWindowAsync(array{
 *     WindowId?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     TaskArn?: string,
 *     ServiceRoleArn?: string,
 *     TaskType?: 'AUTOMATION'|'LAMBDA'|'RUN_COMMAND'|'STEP_FUNCTIONS',
 *     TaskParameters?: array<string, array{Values?: list<string>, ...}>,
 *     TaskInvocationParameters?: array{
 *         RunCommand?: array{
 *             Comment?: string,
 *             CloudWatchOutputConfig?: array,
 *             DocumentHash?: string,
 *             DocumentHashType?: 'Sha1'|'Sha256',
 *             DocumentVersion?: string,
 *             NotificationConfig?: array,
 *             OutputS3BucketName?: string,
 *             OutputS3KeyPrefix?: string,
 *             Parameters?: array<string, list<string>>,
 *             ServiceRoleArn?: string,
 *             TimeoutSeconds?: int,
 *             ...,
 *         },
 *         Automation?: array{DocumentVersion?: string, Parameters?: array<string, list<string>>, ...},
 *         StepFunctions?: array{Input?: string, Name?: string, ...},
 *         Lambda?: array{
 *             ClientContext?: string,
 *             Qualifier?: string,
 *             Payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Priority?: int,
 *     MaxConcurrency?: string,
 *     MaxErrors?: string,
 *     LoggingInfo?: array{S3BucketName?: string, S3KeyPrefix?: string, S3Region?: string, ...},
 *     Name?: string,
 *     Description?: string,
 *     ClientToken?: string,
 *     CutoffBehavior?: 'CANCEL_TASK'|'CONTINUE_TASK',
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result removeTagsFromResource(array $args = [])
 * @phpstan-method \Aws\Result removeTagsFromResource(array{
 *     ResourceType?: 'Association'|'Automation'|'CloudConnector'|'Document'|'MaintenanceWindow'|'ManagedInstance'|'OpsItem'|'OpsMetadata'|'Parameter'|'PatchBaseline',
 *     ResourceId?: string,
 *     TagKeys?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array{
 *     ResourceType?: 'Association'|'Automation'|'CloudConnector'|'Document'|'MaintenanceWindow'|'ManagedInstance'|'OpsItem'|'OpsMetadata'|'Parameter'|'PatchBaseline',
 *     ResourceId?: string,
 *     TagKeys?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result resetServiceSetting(array $args = [])
 * @phpstan-method \Aws\Result resetServiceSetting(array{SettingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetServiceSettingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetServiceSettingAsync(array{SettingId?: string, ...} $args = [])
 * @method \Aws\Result resumeSession(array $args = [])
 * @phpstan-method \Aws\Result resumeSession(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resumeSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeSessionAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result sendAutomationSignal(array $args = [])
 * @phpstan-method \Aws\Result sendAutomationSignal(array{
 *     AutomationExecutionId?: string,
 *     SignalType?: 'Approve'|'Reject'|'Resume'|'Revoke'|'StartStep'|'StopStep',
 *     Payload?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendAutomationSignalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendAutomationSignalAsync(array{
 *     AutomationExecutionId?: string,
 *     SignalType?: 'Approve'|'Reject'|'Resume'|'Revoke'|'StartStep'|'StopStep',
 *     Payload?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendCommand(array $args = [])
 * @phpstan-method \Aws\Result sendCommand(array{
 *     InstanceIds?: list<string>,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     DocumentName?: string,
 *     DocumentVersion?: string,
 *     DocumentHash?: string,
 *     DocumentHashType?: 'Sha1'|'Sha256',
 *     TimeoutSeconds?: int,
 *     Comment?: string,
 *     Parameters?: array<string, list<string>>,
 *     OutputS3Region?: string,
 *     OutputS3BucketName?: string,
 *     OutputS3KeyPrefix?: string,
 *     MaxConcurrency?: string,
 *     MaxErrors?: string,
 *     ServiceRoleArn?: string,
 *     NotificationConfig?: array{
 *         NotificationArn?: string,
 *         NotificationEvents?: list<'All'|'Cancelled'|'Failed'|'InProgress'|'Success'|'TimedOut'>,
 *         NotificationType?: 'Command'|'Invocation',
 *         ...,
 *     },
 *     CloudWatchOutputConfig?: array{CloudWatchLogGroupName?: string, CloudWatchOutputEnabled?: bool, ...},
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendCommandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendCommandAsync(array{
 *     InstanceIds?: list<string>,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     DocumentName?: string,
 *     DocumentVersion?: string,
 *     DocumentHash?: string,
 *     DocumentHashType?: 'Sha1'|'Sha256',
 *     TimeoutSeconds?: int,
 *     Comment?: string,
 *     Parameters?: array<string, list<string>>,
 *     OutputS3Region?: string,
 *     OutputS3BucketName?: string,
 *     OutputS3KeyPrefix?: string,
 *     MaxConcurrency?: string,
 *     MaxErrors?: string,
 *     ServiceRoleArn?: string,
 *     NotificationConfig?: array{
 *         NotificationArn?: string,
 *         NotificationEvents?: list<'All'|'Cancelled'|'Failed'|'InProgress'|'Success'|'TimedOut'>,
 *         NotificationType?: 'Command'|'Invocation',
 *         ...,
 *     },
 *     CloudWatchOutputConfig?: array{CloudWatchLogGroupName?: string, CloudWatchOutputEnabled?: bool, ...},
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAccessRequest(array $args = [])
 * @phpstan-method \Aws\Result startAccessRequest(array{
 *     Reason?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAccessRequestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAccessRequestAsync(array{
 *     Reason?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAssociationsOnce(array $args = [])
 * @phpstan-method \Aws\Result startAssociationsOnce(array{AssociationIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startAssociationsOnceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAssociationsOnceAsync(array{AssociationIds?: list<string>, ...} $args = [])
 * @method \Aws\Result startAutomationExecution(array $args = [])
 * @phpstan-method \Aws\Result startAutomationExecution(array{
 *     DocumentName?: string,
 *     DocumentVersion?: string,
 *     Parameters?: array<string, list<string>>,
 *     ClientToken?: string,
 *     Mode?: 'Auto'|'Interactive',
 *     TargetParameterName?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     TargetMaps?: list<array<string, list<string>>>,
 *     MaxConcurrency?: string,
 *     MaxErrors?: string,
 *     TargetLocations?: list<array{
 *         Accounts?: list<string>,
 *         Regions?: list<string>,
 *         TargetLocationMaxConcurrency?: string,
 *         TargetLocationMaxErrors?: string,
 *         ExecutionRoleName?: string,
 *         TargetLocationAlarmConfiguration?: array,
 *         IncludeChildOrganizationUnits?: bool,
 *         ExcludeAccounts?: list<string>,
 *         Targets?: list<array>,
 *         TargetsMaxConcurrency?: string,
 *         TargetsMaxErrors?: string,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     TargetLocationsURL?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAutomationExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAutomationExecutionAsync(array{
 *     DocumentName?: string,
 *     DocumentVersion?: string,
 *     Parameters?: array<string, list<string>>,
 *     ClientToken?: string,
 *     Mode?: 'Auto'|'Interactive',
 *     TargetParameterName?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     TargetMaps?: list<array<string, list<string>>>,
 *     MaxConcurrency?: string,
 *     MaxErrors?: string,
 *     TargetLocations?: list<array{
 *         Accounts?: list<string>,
 *         Regions?: list<string>,
 *         TargetLocationMaxConcurrency?: string,
 *         TargetLocationMaxErrors?: string,
 *         ExecutionRoleName?: string,
 *         TargetLocationAlarmConfiguration?: array,
 *         IncludeChildOrganizationUnits?: bool,
 *         ExcludeAccounts?: list<string>,
 *         Targets?: list<array>,
 *         TargetsMaxConcurrency?: string,
 *         TargetsMaxErrors?: string,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     TargetLocationsURL?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startChangeRequestExecution(array $args = [])
 * @phpstan-method \Aws\Result startChangeRequestExecution(array{
 *     ScheduledTime?: int|string|\DateTimeInterface,
 *     DocumentName?: string,
 *     DocumentVersion?: string,
 *     Parameters?: array<string, list<string>>,
 *     ChangeRequestName?: string,
 *     ClientToken?: string,
 *     AutoApprove?: bool,
 *     Runbooks?: list<array{
 *         DocumentName?: string,
 *         DocumentVersion?: string,
 *         Parameters?: array<string, list<string>>,
 *         TargetParameterName?: string,
 *         Targets?: list<array>,
 *         TargetMaps?: list<array<string, list<string>>>,
 *         MaxConcurrency?: string,
 *         MaxErrors?: string,
 *         TargetLocations?: list<array>,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ScheduledEndTime?: int|string|\DateTimeInterface,
 *     ChangeDetails?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startChangeRequestExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startChangeRequestExecutionAsync(array{
 *     ScheduledTime?: int|string|\DateTimeInterface,
 *     DocumentName?: string,
 *     DocumentVersion?: string,
 *     Parameters?: array<string, list<string>>,
 *     ChangeRequestName?: string,
 *     ClientToken?: string,
 *     AutoApprove?: bool,
 *     Runbooks?: list<array{
 *         DocumentName?: string,
 *         DocumentVersion?: string,
 *         Parameters?: array<string, list<string>>,
 *         TargetParameterName?: string,
 *         Targets?: list<array>,
 *         TargetMaps?: list<array<string, list<string>>>,
 *         MaxConcurrency?: string,
 *         MaxErrors?: string,
 *         TargetLocations?: list<array>,
 *         ...,
 *     }>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ScheduledEndTime?: int|string|\DateTimeInterface,
 *     ChangeDetails?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startExecutionPreview(array $args = [])
 * @phpstan-method \Aws\Result startExecutionPreview(array{
 *     DocumentName?: string,
 *     DocumentVersion?: string,
 *     ExecutionInputs?: array{
 *         Automation?: array{
 *             Parameters?: array<string, list<string>>,
 *             TargetParameterName?: string,
 *             Targets?: list<array>,
 *             TargetMaps?: list<array<string, list<string>>>,
 *             TargetLocations?: list<array>,
 *             TargetLocationsURL?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startExecutionPreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startExecutionPreviewAsync(array{
 *     DocumentName?: string,
 *     DocumentVersion?: string,
 *     ExecutionInputs?: array{
 *         Automation?: array{
 *             Parameters?: array<string, list<string>>,
 *             TargetParameterName?: string,
 *             Targets?: list<array>,
 *             TargetMaps?: list<array<string, list<string>>>,
 *             TargetLocations?: list<array>,
 *             TargetLocationsURL?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSession(array $args = [])
 * @phpstan-method \Aws\Result startSession(array{Target?: string, DocumentName?: string, Reason?: string, Parameters?: array<string, list<string>>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSessionAsync(array{Target?: string, DocumentName?: string, Reason?: string, Parameters?: array<string, list<string>>, ...} $args = [])
 * @method \Aws\Result stopAutomationExecution(array $args = [])
 * @phpstan-method \Aws\Result stopAutomationExecution(array{AutomationExecutionId?: string, Type?: 'Cancel'|'Complete', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAutomationExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAutomationExecutionAsync(array{AutomationExecutionId?: string, Type?: 'Cancel'|'Complete', ...} $args = [])
 * @method \Aws\Result terminateSession(array $args = [])
 * @phpstan-method \Aws\Result terminateSession(array{SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateSessionAsync(array{SessionId?: string, ...} $args = [])
 * @method \Aws\Result unlabelParameterVersion(array $args = [])
 * @phpstan-method \Aws\Result unlabelParameterVersion(array{Name?: string, ParameterVersion?: int, Labels?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unlabelParameterVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unlabelParameterVersionAsync(array{Name?: string, ParameterVersion?: int, Labels?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAssociation(array $args = [])
 * @phpstan-method \Aws\Result updateAssociation(array{
 *     AssociationId?: string,
 *     Parameters?: array<string, list<string>>,
 *     DocumentVersion?: string,
 *     ScheduleExpression?: string,
 *     OutputLocation?: array{
 *         S3Location?: array{OutputS3Region?: string, OutputS3BucketName?: string, OutputS3KeyPrefix?: string, ...},
 *         ...,
 *     },
 *     Name?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     AssociationName?: string,
 *     AssociationVersion?: string,
 *     AutomationTargetParameterName?: string,
 *     MaxErrors?: string,
 *     MaxConcurrency?: string,
 *     ComplianceSeverity?: 'CRITICAL'|'HIGH'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *     SyncCompliance?: 'AUTO'|'MANUAL',
 *     ApplyOnlyAtCronInterval?: bool,
 *     CalendarNames?: list<string>,
 *     TargetLocations?: list<array{
 *         Accounts?: list<string>,
 *         Regions?: list<string>,
 *         TargetLocationMaxConcurrency?: string,
 *         TargetLocationMaxErrors?: string,
 *         ExecutionRoleName?: string,
 *         TargetLocationAlarmConfiguration?: array,
 *         IncludeChildOrganizationUnits?: bool,
 *         ExcludeAccounts?: list<string>,
 *         Targets?: list<array>,
 *         TargetsMaxConcurrency?: string,
 *         TargetsMaxErrors?: string,
 *         ...,
 *     }>,
 *     ScheduleOffset?: int,
 *     Duration?: int,
 *     TargetMaps?: list<array<string, list<string>>>,
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     AssociationDispatchAssumeRole?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssociationAsync(array{
 *     AssociationId?: string,
 *     Parameters?: array<string, list<string>>,
 *     DocumentVersion?: string,
 *     ScheduleExpression?: string,
 *     OutputLocation?: array{
 *         S3Location?: array{OutputS3Region?: string, OutputS3BucketName?: string, OutputS3KeyPrefix?: string, ...},
 *         ...,
 *     },
 *     Name?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     AssociationName?: string,
 *     AssociationVersion?: string,
 *     AutomationTargetParameterName?: string,
 *     MaxErrors?: string,
 *     MaxConcurrency?: string,
 *     ComplianceSeverity?: 'CRITICAL'|'HIGH'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *     SyncCompliance?: 'AUTO'|'MANUAL',
 *     ApplyOnlyAtCronInterval?: bool,
 *     CalendarNames?: list<string>,
 *     TargetLocations?: list<array{
 *         Accounts?: list<string>,
 *         Regions?: list<string>,
 *         TargetLocationMaxConcurrency?: string,
 *         TargetLocationMaxErrors?: string,
 *         ExecutionRoleName?: string,
 *         TargetLocationAlarmConfiguration?: array,
 *         IncludeChildOrganizationUnits?: bool,
 *         ExcludeAccounts?: list<string>,
 *         Targets?: list<array>,
 *         TargetsMaxConcurrency?: string,
 *         TargetsMaxErrors?: string,
 *         ...,
 *     }>,
 *     ScheduleOffset?: int,
 *     Duration?: int,
 *     TargetMaps?: list<array<string, list<string>>>,
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     AssociationDispatchAssumeRole?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAssociationStatus(array $args = [])
 * @phpstan-method \Aws\Result updateAssociationStatus(array{
 *     Name?: string,
 *     InstanceId?: string,
 *     AssociationStatus?: array{
 *         Date?: int|string|\DateTimeInterface,
 *         Name?: 'Failed'|'Pending'|'Success',
 *         Message?: string,
 *         AdditionalInfo?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssociationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAssociationStatusAsync(array{
 *     Name?: string,
 *     InstanceId?: string,
 *     AssociationStatus?: array{
 *         Date?: int|string|\DateTimeInterface,
 *         Name?: 'Failed'|'Pending'|'Success',
 *         Message?: string,
 *         AdditionalInfo?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCloudConnector(array $args = [])
 * @phpstan-method \Aws\Result updateCloudConnector(array{
 *     CloudConnectorId?: string,
 *     DisplayName?: string,
 *     Configuration?: array{
 *         AzureConfiguration?: array{
 *             TenantId?: string,
 *             TenantDisplayName?: string,
 *             ApplicationId?: string,
 *             ApplicationDisplayName?: string,
 *             Targets?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCloudConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCloudConnectorAsync(array{
 *     CloudConnectorId?: string,
 *     DisplayName?: string,
 *     Configuration?: array{
 *         AzureConfiguration?: array{
 *             TenantId?: string,
 *             TenantDisplayName?: string,
 *             ApplicationId?: string,
 *             ApplicationDisplayName?: string,
 *             Targets?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDocument(array $args = [])
 * @phpstan-method \Aws\Result updateDocument(array{
 *     Content?: string,
 *     Attachments?: list<array{Key?: 'AttachmentReference'|'S3FileUrl'|'SourceUrl', Values?: list<string>, Name?: string, ...}>,
 *     Name?: string,
 *     DisplayName?: string,
 *     VersionName?: string,
 *     DocumentVersion?: string,
 *     DocumentFormat?: 'JSON'|'TEXT'|'YAML',
 *     TargetType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDocumentAsync(array{
 *     Content?: string,
 *     Attachments?: list<array{Key?: 'AttachmentReference'|'S3FileUrl'|'SourceUrl', Values?: list<string>, Name?: string, ...}>,
 *     Name?: string,
 *     DisplayName?: string,
 *     VersionName?: string,
 *     DocumentVersion?: string,
 *     DocumentFormat?: 'JSON'|'TEXT'|'YAML',
 *     TargetType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDocumentDefaultVersion(array $args = [])
 * @phpstan-method \Aws\Result updateDocumentDefaultVersion(array{Name?: string, DocumentVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDocumentDefaultVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDocumentDefaultVersionAsync(array{Name?: string, DocumentVersion?: string, ...} $args = [])
 * @method \Aws\Result updateDocumentMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateDocumentMetadata(array{
 *     Name?: string,
 *     DocumentVersion?: string,
 *     DocumentReviews?: array{Action?: 'Approve'|'Reject'|'SendForReview'|'UpdateReview', Comment?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDocumentMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDocumentMetadataAsync(array{
 *     Name?: string,
 *     DocumentVersion?: string,
 *     DocumentReviews?: array{Action?: 'Approve'|'Reject'|'SendForReview'|'UpdateReview', Comment?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMaintenanceWindow(array $args = [])
 * @phpstan-method \Aws\Result updateMaintenanceWindow(array{
 *     WindowId?: string,
 *     Name?: string,
 *     Description?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Schedule?: string,
 *     ScheduleTimezone?: string,
 *     ScheduleOffset?: int,
 *     Duration?: int,
 *     Cutoff?: int,
 *     AllowUnassociatedTargets?: bool,
 *     Enabled?: bool,
 *     Replace?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMaintenanceWindowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMaintenanceWindowAsync(array{
 *     WindowId?: string,
 *     Name?: string,
 *     Description?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Schedule?: string,
 *     ScheduleTimezone?: string,
 *     ScheduleOffset?: int,
 *     Duration?: int,
 *     Cutoff?: int,
 *     AllowUnassociatedTargets?: bool,
 *     Enabled?: bool,
 *     Replace?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMaintenanceWindowTarget(array $args = [])
 * @phpstan-method \Aws\Result updateMaintenanceWindowTarget(array{
 *     WindowId?: string,
 *     WindowTargetId?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     OwnerInformation?: string,
 *     Name?: string,
 *     Description?: string,
 *     Replace?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMaintenanceWindowTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMaintenanceWindowTargetAsync(array{
 *     WindowId?: string,
 *     WindowTargetId?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     OwnerInformation?: string,
 *     Name?: string,
 *     Description?: string,
 *     Replace?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMaintenanceWindowTask(array $args = [])
 * @phpstan-method \Aws\Result updateMaintenanceWindowTask(array{
 *     WindowId?: string,
 *     WindowTaskId?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     TaskArn?: string,
 *     ServiceRoleArn?: string,
 *     TaskParameters?: array<string, array{Values?: list<string>, ...}>,
 *     TaskInvocationParameters?: array{
 *         RunCommand?: array{
 *             Comment?: string,
 *             CloudWatchOutputConfig?: array,
 *             DocumentHash?: string,
 *             DocumentHashType?: 'Sha1'|'Sha256',
 *             DocumentVersion?: string,
 *             NotificationConfig?: array,
 *             OutputS3BucketName?: string,
 *             OutputS3KeyPrefix?: string,
 *             Parameters?: array<string, list<string>>,
 *             ServiceRoleArn?: string,
 *             TimeoutSeconds?: int,
 *             ...,
 *         },
 *         Automation?: array{DocumentVersion?: string, Parameters?: array<string, list<string>>, ...},
 *         StepFunctions?: array{Input?: string, Name?: string, ...},
 *         Lambda?: array{
 *             ClientContext?: string,
 *             Qualifier?: string,
 *             Payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Priority?: int,
 *     MaxConcurrency?: string,
 *     MaxErrors?: string,
 *     LoggingInfo?: array{S3BucketName?: string, S3KeyPrefix?: string, S3Region?: string, ...},
 *     Name?: string,
 *     Description?: string,
 *     Replace?: bool,
 *     CutoffBehavior?: 'CANCEL_TASK'|'CONTINUE_TASK',
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMaintenanceWindowTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMaintenanceWindowTaskAsync(array{
 *     WindowId?: string,
 *     WindowTaskId?: string,
 *     Targets?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     TaskArn?: string,
 *     ServiceRoleArn?: string,
 *     TaskParameters?: array<string, array{Values?: list<string>, ...}>,
 *     TaskInvocationParameters?: array{
 *         RunCommand?: array{
 *             Comment?: string,
 *             CloudWatchOutputConfig?: array,
 *             DocumentHash?: string,
 *             DocumentHashType?: 'Sha1'|'Sha256',
 *             DocumentVersion?: string,
 *             NotificationConfig?: array,
 *             OutputS3BucketName?: string,
 *             OutputS3KeyPrefix?: string,
 *             Parameters?: array<string, list<string>>,
 *             ServiceRoleArn?: string,
 *             TimeoutSeconds?: int,
 *             ...,
 *         },
 *         Automation?: array{DocumentVersion?: string, Parameters?: array<string, list<string>>, ...},
 *         StepFunctions?: array{Input?: string, Name?: string, ...},
 *         Lambda?: array{
 *             ClientContext?: string,
 *             Qualifier?: string,
 *             Payload?: string|resource|\Psr\Http\Message\StreamInterface,
 *             ...,
 *         },
 *         ...,
 *     },
 *     Priority?: int,
 *     MaxConcurrency?: string,
 *     MaxErrors?: string,
 *     LoggingInfo?: array{S3BucketName?: string, S3KeyPrefix?: string, S3Region?: string, ...},
 *     Name?: string,
 *     Description?: string,
 *     Replace?: bool,
 *     CutoffBehavior?: 'CANCEL_TASK'|'CONTINUE_TASK',
 *     AlarmConfiguration?: array{IgnorePollAlarmFailure?: bool, Alarms?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateManagedInstanceRole(array $args = [])
 * @phpstan-method \Aws\Result updateManagedInstanceRole(array{InstanceId?: string, IamRole?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateManagedInstanceRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateManagedInstanceRoleAsync(array{InstanceId?: string, IamRole?: string, ...} $args = [])
 * @method \Aws\Result updateOpsItem(array $args = [])
 * @phpstan-method \Aws\Result updateOpsItem(array{
 *     Description?: string,
 *     OperationalData?: array<string, array{Value?: string, Type?: 'SearchableString'|'String', ...}>,
 *     OperationalDataToDelete?: list<string>,
 *     Notifications?: list<array{Arn?: string, ...}>,
 *     Priority?: int,
 *     RelatedOpsItems?: list<array{OpsItemId?: string, ...}>,
 *     Status?: 'Approved'|'Cancelled'|'Cancelling'|'ChangeCalendarOverrideApproved'|'ChangeCalendarOverrideRejected'|'Closed'|'CompletedWithFailure'|'CompletedWithSuccess'|'Failed'|'InProgress'|'Open'|'Pending'|'PendingApproval'|'PendingChangeCalendarOverride'|'Rejected'|'Resolved'|'Revoked'|'RunbookInProgress'|'Scheduled'|'TimedOut',
 *     OpsItemId?: string,
 *     Title?: string,
 *     Category?: string,
 *     Severity?: string,
 *     ActualStartTime?: int|string|\DateTimeInterface,
 *     ActualEndTime?: int|string|\DateTimeInterface,
 *     PlannedStartTime?: int|string|\DateTimeInterface,
 *     PlannedEndTime?: int|string|\DateTimeInterface,
 *     OpsItemArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOpsItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOpsItemAsync(array{
 *     Description?: string,
 *     OperationalData?: array<string, array{Value?: string, Type?: 'SearchableString'|'String', ...}>,
 *     OperationalDataToDelete?: list<string>,
 *     Notifications?: list<array{Arn?: string, ...}>,
 *     Priority?: int,
 *     RelatedOpsItems?: list<array{OpsItemId?: string, ...}>,
 *     Status?: 'Approved'|'Cancelled'|'Cancelling'|'ChangeCalendarOverrideApproved'|'ChangeCalendarOverrideRejected'|'Closed'|'CompletedWithFailure'|'CompletedWithSuccess'|'Failed'|'InProgress'|'Open'|'Pending'|'PendingApproval'|'PendingChangeCalendarOverride'|'Rejected'|'Resolved'|'Revoked'|'RunbookInProgress'|'Scheduled'|'TimedOut',
 *     OpsItemId?: string,
 *     Title?: string,
 *     Category?: string,
 *     Severity?: string,
 *     ActualStartTime?: int|string|\DateTimeInterface,
 *     ActualEndTime?: int|string|\DateTimeInterface,
 *     PlannedStartTime?: int|string|\DateTimeInterface,
 *     PlannedEndTime?: int|string|\DateTimeInterface,
 *     OpsItemArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOpsMetadata(array $args = [])
 * @phpstan-method \Aws\Result updateOpsMetadata(array{
 *     OpsMetadataArn?: string,
 *     MetadataToUpdate?: array<string, array{Value?: string, ...}>,
 *     KeysToDelete?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOpsMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOpsMetadataAsync(array{
 *     OpsMetadataArn?: string,
 *     MetadataToUpdate?: array<string, array{Value?: string, ...}>,
 *     KeysToDelete?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePatchBaseline(array $args = [])
 * @phpstan-method \Aws\Result updatePatchBaseline(array{
 *     BaselineId?: string,
 *     Name?: string,
 *     GlobalFilters?: array{PatchFilters?: list<array>, ...},
 *     ApprovalRules?: array{PatchRules?: list<array>, ...},
 *     ApprovedPatches?: list<string>,
 *     ApprovedPatchesComplianceLevel?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *     ApprovedPatchesEnableNonSecurity?: bool,
 *     RejectedPatches?: list<string>,
 *     RejectedPatchesAction?: 'ALLOW_AS_DEPENDENCY'|'BLOCK',
 *     Description?: string,
 *     Sources?: list<array{Name?: string, Products?: list<string>, Configuration?: string, ...}>,
 *     AvailableSecurityUpdatesComplianceStatus?: 'COMPLIANT'|'NON_COMPLIANT',
 *     Replace?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePatchBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePatchBaselineAsync(array{
 *     BaselineId?: string,
 *     Name?: string,
 *     GlobalFilters?: array{PatchFilters?: list<array>, ...},
 *     ApprovalRules?: array{PatchRules?: list<array>, ...},
 *     ApprovedPatches?: list<string>,
 *     ApprovedPatchesComplianceLevel?: 'CRITICAL'|'HIGH'|'INFORMATIONAL'|'LOW'|'MEDIUM'|'UNSPECIFIED',
 *     ApprovedPatchesEnableNonSecurity?: bool,
 *     RejectedPatches?: list<string>,
 *     RejectedPatchesAction?: 'ALLOW_AS_DEPENDENCY'|'BLOCK',
 *     Description?: string,
 *     Sources?: list<array{Name?: string, Products?: list<string>, Configuration?: string, ...}>,
 *     AvailableSecurityUpdatesComplianceStatus?: 'COMPLIANT'|'NON_COMPLIANT',
 *     Replace?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateResourceDataSync(array $args = [])
 * @phpstan-method \Aws\Result updateResourceDataSync(array{
 *     SyncName?: string,
 *     SyncType?: string,
 *     SyncSource?: array{
 *         SourceType?: string,
 *         AwsOrganizationsSource?: array{OrganizationSourceType?: string, OrganizationalUnits?: list<array>, ...},
 *         SourceRegions?: list<string>,
 *         IncludeFutureRegions?: bool,
 *         EnableAllOpsDataSources?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceDataSyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceDataSyncAsync(array{
 *     SyncName?: string,
 *     SyncType?: string,
 *     SyncSource?: array{
 *         SourceType?: string,
 *         AwsOrganizationsSource?: array{OrganizationSourceType?: string, OrganizationalUnits?: list<array>, ...},
 *         SourceRegions?: list<string>,
 *         IncludeFutureRegions?: bool,
 *         EnableAllOpsDataSources?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceSetting(array $args = [])
 * @phpstan-method \Aws\Result updateServiceSetting(array{SettingId?: string, SettingValue?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceSettingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceSettingAsync(array{SettingId?: string, SettingValue?: string, ...} $args = [])
 * @method \Aws\Result validateCloudConnector(array $args = [])
 * @phpstan-method \Aws\Result validateCloudConnector(array{CloudConnectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validateCloudConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateCloudConnectorAsync(array{CloudConnectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 */
class SsmClient extends AwsClient {}
