<?php
namespace Aws\Backup;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Backup** service.
 * @method \Aws\Result associateBackupVaultMpaApprovalTeam(array $args = [])
 * @phpstan-method \Aws\Result associateBackupVaultMpaApprovalTeam(array{BackupVaultName?: string, MpaApprovalTeamArn?: string, RequesterComment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateBackupVaultMpaApprovalTeamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateBackupVaultMpaApprovalTeamAsync(array{BackupVaultName?: string, MpaApprovalTeamArn?: string, RequesterComment?: string, ...} $args = [])
 * @method \Aws\Result cancelLegalHold(array $args = [])
 * @phpstan-method \Aws\Result cancelLegalHold(array{LegalHoldId?: string, CancelDescription?: string, RetainRecordInDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelLegalHoldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelLegalHoldAsync(array{LegalHoldId?: string, CancelDescription?: string, RetainRecordInDays?: int, ...} $args = [])
 * @method \Aws\Result createBackupPlan(array $args = [])
 * @phpstan-method \Aws\Result createBackupPlan(array{
 *     BackupPlan?: array{
 *         BackupPlanName?: string,
 *         Rules?: list<array>,
 *         AdvancedBackupSettings?: list<array>,
 *         ScanSettings?: list<array>,
 *         ...,
 *     },
 *     BackupPlanTags?: array<string, string>,
 *     CreatorRequestId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBackupPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBackupPlanAsync(array{
 *     BackupPlan?: array{
 *         BackupPlanName?: string,
 *         Rules?: list<array>,
 *         AdvancedBackupSettings?: list<array>,
 *         ScanSettings?: list<array>,
 *         ...,
 *     },
 *     BackupPlanTags?: array<string, string>,
 *     CreatorRequestId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBackupSelection(array $args = [])
 * @phpstan-method \Aws\Result createBackupSelection(array{
 *     BackupPlanId?: string,
 *     BackupSelection?: array{
 *         SelectionName?: string,
 *         IamRoleArn?: string,
 *         Resources?: list<string>,
 *         ListOfTags?: list<array>,
 *         NotResources?: list<string>,
 *         Conditions?: array{
 *             StringEquals?: list<array>,
 *             StringNotEquals?: list<array>,
 *             StringLike?: list<array>,
 *             StringNotLike?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     CreatorRequestId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBackupSelectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBackupSelectionAsync(array{
 *     BackupPlanId?: string,
 *     BackupSelection?: array{
 *         SelectionName?: string,
 *         IamRoleArn?: string,
 *         Resources?: list<string>,
 *         ListOfTags?: list<array>,
 *         NotResources?: list<string>,
 *         Conditions?: array{
 *             StringEquals?: list<array>,
 *             StringNotEquals?: list<array>,
 *             StringLike?: list<array>,
 *             StringNotLike?: list<array>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     CreatorRequestId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBackupVault(array $args = [])
 * @phpstan-method \Aws\Result createBackupVault(array{
 *     BackupVaultName?: string,
 *     BackupVaultTags?: array<string, string>,
 *     EncryptionKeyArn?: string,
 *     CreatorRequestId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBackupVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBackupVaultAsync(array{
 *     BackupVaultName?: string,
 *     BackupVaultTags?: array<string, string>,
 *     EncryptionKeyArn?: string,
 *     CreatorRequestId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFramework(array $args = [])
 * @phpstan-method \Aws\Result createFramework(array{
 *     FrameworkName?: string,
 *     FrameworkDescription?: string,
 *     FrameworkControls?: list<array{ControlName?: string, ControlInputParameters?: list<array>, ControlScope?: array, ...}>,
 *     IdempotencyToken?: string,
 *     FrameworkTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFrameworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFrameworkAsync(array{
 *     FrameworkName?: string,
 *     FrameworkDescription?: string,
 *     FrameworkControls?: list<array{ControlName?: string, ControlInputParameters?: list<array>, ControlScope?: array, ...}>,
 *     IdempotencyToken?: string,
 *     FrameworkTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLegalHold(array $args = [])
 * @phpstan-method \Aws\Result createLegalHold(array{
 *     Title?: string,
 *     Description?: string,
 *     IdempotencyToken?: string,
 *     RecoveryPointSelection?: array{
 *         VaultNames?: list<string>,
 *         ResourceIdentifiers?: list<string>,
 *         DateRange?: array{FromDate?: int|string|\DateTimeInterface, ToDate?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLegalHoldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLegalHoldAsync(array{
 *     Title?: string,
 *     Description?: string,
 *     IdempotencyToken?: string,
 *     RecoveryPointSelection?: array{
 *         VaultNames?: list<string>,
 *         ResourceIdentifiers?: list<string>,
 *         DateRange?: array{FromDate?: int|string|\DateTimeInterface, ToDate?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLogicallyAirGappedBackupVault(array $args = [])
 * @phpstan-method \Aws\Result createLogicallyAirGappedBackupVault(array{
 *     BackupVaultName?: string,
 *     BackupVaultTags?: array<string, string>,
 *     CreatorRequestId?: string,
 *     MinRetentionDays?: int,
 *     MaxRetentionDays?: int,
 *     EncryptionKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLogicallyAirGappedBackupVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLogicallyAirGappedBackupVaultAsync(array{
 *     BackupVaultName?: string,
 *     BackupVaultTags?: array<string, string>,
 *     CreatorRequestId?: string,
 *     MinRetentionDays?: int,
 *     MaxRetentionDays?: int,
 *     EncryptionKeyArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createReportPlan(array $args = [])
 * @phpstan-method \Aws\Result createReportPlan(array{
 *     ReportPlanName?: string,
 *     ReportPlanDescription?: string,
 *     ReportDeliveryChannel?: array{S3BucketName?: string, S3KeyPrefix?: string, Formats?: list<string>, ...},
 *     ReportSetting?: array{
 *         ReportTemplate?: string,
 *         FrameworkArns?: list<string>,
 *         NumberOfFrameworks?: int,
 *         Accounts?: list<string>,
 *         OrganizationUnits?: list<string>,
 *         Regions?: list<string>,
 *         ...,
 *     },
 *     ReportPlanTags?: array<string, string>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createReportPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReportPlanAsync(array{
 *     ReportPlanName?: string,
 *     ReportPlanDescription?: string,
 *     ReportDeliveryChannel?: array{S3BucketName?: string, S3KeyPrefix?: string, Formats?: list<string>, ...},
 *     ReportSetting?: array{
 *         ReportTemplate?: string,
 *         FrameworkArns?: list<string>,
 *         NumberOfFrameworks?: int,
 *         Accounts?: list<string>,
 *         OrganizationUnits?: list<string>,
 *         Regions?: list<string>,
 *         ...,
 *     },
 *     ReportPlanTags?: array<string, string>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRestoreAccessBackupVault(array $args = [])
 * @phpstan-method \Aws\Result createRestoreAccessBackupVault(array{
 *     SourceBackupVaultArn?: string,
 *     BackupVaultName?: string,
 *     BackupVaultTags?: array<string, string>,
 *     CreatorRequestId?: string,
 *     RequesterComment?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRestoreAccessBackupVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRestoreAccessBackupVaultAsync(array{
 *     SourceBackupVaultArn?: string,
 *     BackupVaultName?: string,
 *     BackupVaultTags?: array<string, string>,
 *     CreatorRequestId?: string,
 *     RequesterComment?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRestoreTestingPlan(array $args = [])
 * @phpstan-method \Aws\Result createRestoreTestingPlan(array{
 *     CreatorRequestId?: string,
 *     RestoreTestingPlan?: array{
 *         RecoveryPointSelection?: array{
 *             Algorithm?: 'LATEST_WITHIN_WINDOW'|'RANDOM_WITHIN_WINDOW',
 *             ExcludeVaults?: list<string>,
 *             IncludeVaults?: list<string>,
 *             RecoveryPointTypes?: list<'CONTINUOUS'|'SNAPSHOT'>,
 *             SelectionWindowDays?: int,
 *             ...,
 *         },
 *         RestoreTestingPlanName?: string,
 *         ScheduleExpression?: string,
 *         ScheduleExpressionTimezone?: string,
 *         StartWindowHours?: int,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRestoreTestingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRestoreTestingPlanAsync(array{
 *     CreatorRequestId?: string,
 *     RestoreTestingPlan?: array{
 *         RecoveryPointSelection?: array{
 *             Algorithm?: 'LATEST_WITHIN_WINDOW'|'RANDOM_WITHIN_WINDOW',
 *             ExcludeVaults?: list<string>,
 *             IncludeVaults?: list<string>,
 *             RecoveryPointTypes?: list<'CONTINUOUS'|'SNAPSHOT'>,
 *             SelectionWindowDays?: int,
 *             ...,
 *         },
 *         RestoreTestingPlanName?: string,
 *         ScheduleExpression?: string,
 *         ScheduleExpressionTimezone?: string,
 *         StartWindowHours?: int,
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRestoreTestingSelection(array $args = [])
 * @phpstan-method \Aws\Result createRestoreTestingSelection(array{
 *     CreatorRequestId?: string,
 *     RestoreTestingPlanName?: string,
 *     RestoreTestingSelection?: array{
 *         IamRoleArn?: string,
 *         ProtectedResourceArns?: list<string>,
 *         ProtectedResourceConditions?: array{StringEquals?: list<array>, StringNotEquals?: list<array>, ...},
 *         ProtectedResourceType?: string,
 *         RestoreMetadataOverrides?: array<string, string>,
 *         RestoreTestingSelectionName?: string,
 *         ValidationWindowHours?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRestoreTestingSelectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRestoreTestingSelectionAsync(array{
 *     CreatorRequestId?: string,
 *     RestoreTestingPlanName?: string,
 *     RestoreTestingSelection?: array{
 *         IamRoleArn?: string,
 *         ProtectedResourceArns?: list<string>,
 *         ProtectedResourceConditions?: array{StringEquals?: list<array>, StringNotEquals?: list<array>, ...},
 *         ProtectedResourceType?: string,
 *         RestoreMetadataOverrides?: array<string, string>,
 *         RestoreTestingSelectionName?: string,
 *         ValidationWindowHours?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTieringConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createTieringConfiguration(array{
 *     TieringConfiguration?: array{TieringConfigurationName?: string, BackupVaultName?: string, ResourceSelection?: list<array>, ...},
 *     TieringConfigurationTags?: array<string, string>,
 *     CreatorRequestId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTieringConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTieringConfigurationAsync(array{
 *     TieringConfiguration?: array{TieringConfigurationName?: string, BackupVaultName?: string, ResourceSelection?: list<array>, ...},
 *     TieringConfigurationTags?: array<string, string>,
 *     CreatorRequestId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBackupPlan(array $args = [])
 * @phpstan-method \Aws\Result deleteBackupPlan(array{BackupPlanId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackupPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackupPlanAsync(array{BackupPlanId?: string, ...} $args = [])
 * @method \Aws\Result deleteBackupSelection(array $args = [])
 * @phpstan-method \Aws\Result deleteBackupSelection(array{BackupPlanId?: string, SelectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackupSelectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackupSelectionAsync(array{BackupPlanId?: string, SelectionId?: string, ...} $args = [])
 * @method \Aws\Result deleteBackupVault(array $args = [])
 * @phpstan-method \Aws\Result deleteBackupVault(array{BackupVaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackupVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackupVaultAsync(array{BackupVaultName?: string, ...} $args = [])
 * @method \Aws\Result deleteBackupVaultAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteBackupVaultAccessPolicy(array{BackupVaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackupVaultAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackupVaultAccessPolicyAsync(array{BackupVaultName?: string, ...} $args = [])
 * @method \Aws\Result deleteBackupVaultLockConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteBackupVaultLockConfiguration(array{BackupVaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackupVaultLockConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackupVaultLockConfigurationAsync(array{BackupVaultName?: string, ...} $args = [])
 * @method \Aws\Result deleteBackupVaultNotifications(array $args = [])
 * @phpstan-method \Aws\Result deleteBackupVaultNotifications(array{BackupVaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackupVaultNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackupVaultNotificationsAsync(array{BackupVaultName?: string, ...} $args = [])
 * @method \Aws\Result deleteFramework(array $args = [])
 * @phpstan-method \Aws\Result deleteFramework(array{FrameworkName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFrameworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFrameworkAsync(array{FrameworkName?: string, ...} $args = [])
 * @method \Aws\Result deleteRecoveryPoint(array $args = [])
 * @phpstan-method \Aws\Result deleteRecoveryPoint(array{BackupVaultName?: string, RecoveryPointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRecoveryPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecoveryPointAsync(array{BackupVaultName?: string, RecoveryPointArn?: string, ...} $args = [])
 * @method \Aws\Result deleteReportPlan(array $args = [])
 * @phpstan-method \Aws\Result deleteReportPlan(array{ReportPlanName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteReportPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReportPlanAsync(array{ReportPlanName?: string, ...} $args = [])
 * @method \Aws\Result deleteRestoreTestingPlan(array $args = [])
 * @phpstan-method \Aws\Result deleteRestoreTestingPlan(array{RestoreTestingPlanName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRestoreTestingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRestoreTestingPlanAsync(array{RestoreTestingPlanName?: string, ...} $args = [])
 * @method \Aws\Result deleteRestoreTestingSelection(array $args = [])
 * @phpstan-method \Aws\Result deleteRestoreTestingSelection(array{RestoreTestingPlanName?: string, RestoreTestingSelectionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRestoreTestingSelectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRestoreTestingSelectionAsync(array{RestoreTestingPlanName?: string, RestoreTestingSelectionName?: string, ...} $args = [])
 * @method \Aws\Result deleteTieringConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteTieringConfiguration(array{TieringConfigurationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTieringConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTieringConfigurationAsync(array{TieringConfigurationName?: string, ...} $args = [])
 * @method \Aws\Result describeBackupJob(array $args = [])
 * @phpstan-method \Aws\Result describeBackupJob(array{BackupJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBackupJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBackupJobAsync(array{BackupJobId?: string, ...} $args = [])
 * @method \Aws\Result describeBackupVault(array $args = [])
 * @phpstan-method \Aws\Result describeBackupVault(array{BackupVaultName?: string, BackupVaultAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBackupVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBackupVaultAsync(array{BackupVaultName?: string, BackupVaultAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeCopyJob(array $args = [])
 * @phpstan-method \Aws\Result describeCopyJob(array{CopyJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCopyJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCopyJobAsync(array{CopyJobId?: string, ...} $args = [])
 * @method \Aws\Result describeFramework(array $args = [])
 * @phpstan-method \Aws\Result describeFramework(array{FrameworkName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFrameworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFrameworkAsync(array{FrameworkName?: string, ...} $args = [])
 * @method \Aws\Result describeGlobalSettings(array $args = [])
 * @phpstan-method \Aws\Result describeGlobalSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGlobalSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGlobalSettingsAsync(array{...} $args = [])
 * @method \Aws\Result describeProtectedResource(array $args = [])
 * @phpstan-method \Aws\Result describeProtectedResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProtectedResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProtectedResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result describeRecoveryPoint(array $args = [])
 * @phpstan-method \Aws\Result describeRecoveryPoint(array{BackupVaultName?: string, RecoveryPointArn?: string, BackupVaultAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRecoveryPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRecoveryPointAsync(array{BackupVaultName?: string, RecoveryPointArn?: string, BackupVaultAccountId?: string, ...} $args = [])
 * @method \Aws\Result describeRegionSettings(array $args = [])
 * @phpstan-method \Aws\Result describeRegionSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRegionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegionSettingsAsync(array{...} $args = [])
 * @method \Aws\Result describeReportJob(array $args = [])
 * @phpstan-method \Aws\Result describeReportJob(array{ReportJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReportJobAsync(array{ReportJobId?: string, ...} $args = [])
 * @method \Aws\Result describeReportPlan(array $args = [])
 * @phpstan-method \Aws\Result describeReportPlan(array{ReportPlanName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeReportPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReportPlanAsync(array{ReportPlanName?: string, ...} $args = [])
 * @method \Aws\Result describeRestoreJob(array $args = [])
 * @phpstan-method \Aws\Result describeRestoreJob(array{RestoreJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRestoreJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRestoreJobAsync(array{RestoreJobId?: string, ...} $args = [])
 * @method \Aws\Result describeScanJob(array $args = [])
 * @phpstan-method \Aws\Result describeScanJob(array{ScanJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScanJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScanJobAsync(array{ScanJobId?: string, ...} $args = [])
 * @method \Aws\Result disassociateBackupVaultMpaApprovalTeam(array $args = [])
 * @phpstan-method \Aws\Result disassociateBackupVaultMpaApprovalTeam(array{BackupVaultName?: string, RequesterComment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateBackupVaultMpaApprovalTeamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateBackupVaultMpaApprovalTeamAsync(array{BackupVaultName?: string, RequesterComment?: string, ...} $args = [])
 * @method \Aws\Result disassociateRecoveryPoint(array $args = [])
 * @phpstan-method \Aws\Result disassociateRecoveryPoint(array{BackupVaultName?: string, RecoveryPointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateRecoveryPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateRecoveryPointAsync(array{BackupVaultName?: string, RecoveryPointArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateRecoveryPointFromParent(array $args = [])
 * @phpstan-method \Aws\Result disassociateRecoveryPointFromParent(array{BackupVaultName?: string, RecoveryPointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateRecoveryPointFromParentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateRecoveryPointFromParentAsync(array{BackupVaultName?: string, RecoveryPointArn?: string, ...} $args = [])
 * @method \Aws\Result exportBackupPlanTemplate(array $args = [])
 * @phpstan-method \Aws\Result exportBackupPlanTemplate(array{BackupPlanId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise exportBackupPlanTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise exportBackupPlanTemplateAsync(array{BackupPlanId?: string, ...} $args = [])
 * @method \Aws\Result getBackupPlan(array $args = [])
 * @phpstan-method \Aws\Result getBackupPlan(array{BackupPlanId?: string, VersionId?: string, MaxScheduledRunsPreview?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackupPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackupPlanAsync(array{BackupPlanId?: string, VersionId?: string, MaxScheduledRunsPreview?: int, ...} $args = [])
 * @method \Aws\Result getBackupPlanFromJSON(array $args = [])
 * @phpstan-method \Aws\Result getBackupPlanFromJSON(array{BackupPlanTemplateJson?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackupPlanFromJSONAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackupPlanFromJSONAsync(array{BackupPlanTemplateJson?: string, ...} $args = [])
 * @method \Aws\Result getBackupPlanFromTemplate(array $args = [])
 * @phpstan-method \Aws\Result getBackupPlanFromTemplate(array{BackupPlanTemplateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackupPlanFromTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackupPlanFromTemplateAsync(array{BackupPlanTemplateId?: string, ...} $args = [])
 * @method \Aws\Result getBackupSelection(array $args = [])
 * @phpstan-method \Aws\Result getBackupSelection(array{BackupPlanId?: string, SelectionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackupSelectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackupSelectionAsync(array{BackupPlanId?: string, SelectionId?: string, ...} $args = [])
 * @method \Aws\Result getBackupVaultAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result getBackupVaultAccessPolicy(array{BackupVaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackupVaultAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackupVaultAccessPolicyAsync(array{BackupVaultName?: string, ...} $args = [])
 * @method \Aws\Result getBackupVaultNotifications(array $args = [])
 * @phpstan-method \Aws\Result getBackupVaultNotifications(array{BackupVaultName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackupVaultNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackupVaultNotificationsAsync(array{BackupVaultName?: string, ...} $args = [])
 * @method \Aws\Result getLegalHold(array $args = [])
 * @phpstan-method \Aws\Result getLegalHold(array{LegalHoldId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLegalHoldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLegalHoldAsync(array{LegalHoldId?: string, ...} $args = [])
 * @method \Aws\Result getPITRMalwareScanResults(array $args = [])
 * @phpstan-method \Aws\Result getPITRMalwareScanResults(array{
 *     RecoveryPointArn?: string,
 *     BackupVaultName?: string,
 *     ScanEndTime?: int|string|\DateTimeInterface,
 *     MalwareScanner?: 'GUARDDUTY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPITRMalwareScanResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPITRMalwareScanResultsAsync(array{
 *     RecoveryPointArn?: string,
 *     BackupVaultName?: string,
 *     ScanEndTime?: int|string|\DateTimeInterface,
 *     MalwareScanner?: 'GUARDDUTY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getRecoveryPointIndexDetails(array $args = [])
 * @phpstan-method \Aws\Result getRecoveryPointIndexDetails(array{BackupVaultName?: string, RecoveryPointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecoveryPointIndexDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecoveryPointIndexDetailsAsync(array{BackupVaultName?: string, RecoveryPointArn?: string, ...} $args = [])
 * @method \Aws\Result getRecoveryPointRestoreMetadata(array $args = [])
 * @phpstan-method \Aws\Result getRecoveryPointRestoreMetadata(array{BackupVaultName?: string, RecoveryPointArn?: string, BackupVaultAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRecoveryPointRestoreMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecoveryPointRestoreMetadataAsync(array{BackupVaultName?: string, RecoveryPointArn?: string, BackupVaultAccountId?: string, ...} $args = [])
 * @method \Aws\Result getRestoreJobMetadata(array $args = [])
 * @phpstan-method \Aws\Result getRestoreJobMetadata(array{RestoreJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRestoreJobMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRestoreJobMetadataAsync(array{RestoreJobId?: string, ...} $args = [])
 * @method \Aws\Result getRestoreTestingInferredMetadata(array $args = [])
 * @phpstan-method \Aws\Result getRestoreTestingInferredMetadata(array{BackupVaultAccountId?: string, BackupVaultName?: string, RecoveryPointArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRestoreTestingInferredMetadataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRestoreTestingInferredMetadataAsync(array{BackupVaultAccountId?: string, BackupVaultName?: string, RecoveryPointArn?: string, ...} $args = [])
 * @method \Aws\Result getRestoreTestingPlan(array $args = [])
 * @phpstan-method \Aws\Result getRestoreTestingPlan(array{RestoreTestingPlanName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRestoreTestingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRestoreTestingPlanAsync(array{RestoreTestingPlanName?: string, ...} $args = [])
 * @method \Aws\Result getRestoreTestingSelection(array $args = [])
 * @phpstan-method \Aws\Result getRestoreTestingSelection(array{RestoreTestingPlanName?: string, RestoreTestingSelectionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRestoreTestingSelectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRestoreTestingSelectionAsync(array{RestoreTestingPlanName?: string, RestoreTestingSelectionName?: string, ...} $args = [])
 * @method \Aws\Result getSupportedResourceTypes(array $args = [])
 * @phpstan-method \Aws\Result getSupportedResourceTypes(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSupportedResourceTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSupportedResourceTypesAsync(array{...} $args = [])
 * @method \Aws\Result getTieringConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getTieringConfiguration(array{TieringConfigurationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTieringConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTieringConfigurationAsync(array{TieringConfigurationName?: string, ...} $args = [])
 * @method \Aws\Result listBackupJobSummaries(array $args = [])
 * @phpstan-method \Aws\Result listBackupJobSummaries(array{
 *     AccountId?: string,
 *     State?: 'ABORTED'|'ABORTING'|'AGGREGATE_ALL'|'ANY'|'COMPLETED'|'CREATED'|'EXPIRED'|'FAILED'|'PARTIAL'|'PENDING'|'RUNNING',
 *     ResourceType?: string,
 *     MessageCategory?: string,
 *     AggregationPeriod?: 'FOURTEEN_DAYS'|'ONE_DAY'|'SEVEN_DAYS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBackupJobSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBackupJobSummariesAsync(array{
 *     AccountId?: string,
 *     State?: 'ABORTED'|'ABORTING'|'AGGREGATE_ALL'|'ANY'|'COMPLETED'|'CREATED'|'EXPIRED'|'FAILED'|'PARTIAL'|'PENDING'|'RUNNING',
 *     ResourceType?: string,
 *     MessageCategory?: string,
 *     AggregationPeriod?: 'FOURTEEN_DAYS'|'ONE_DAY'|'SEVEN_DAYS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBackupJobs(array $args = [])
 * @phpstan-method \Aws\Result listBackupJobs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ByResourceArn?: string,
 *     ByState?: 'ABORTED'|'ABORTING'|'COMPLETED'|'CREATED'|'EXPIRED'|'FAILED'|'PARTIAL'|'PENDING'|'RUNNING',
 *     ByBackupVaultName?: string,
 *     ByCreatedBefore?: int|string|\DateTimeInterface,
 *     ByCreatedAfter?: int|string|\DateTimeInterface,
 *     ByResourceType?: string,
 *     ByAccountId?: string,
 *     ByCompleteAfter?: int|string|\DateTimeInterface,
 *     ByCompleteBefore?: int|string|\DateTimeInterface,
 *     ByParentJobId?: string,
 *     ByMessageCategory?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBackupJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBackupJobsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ByResourceArn?: string,
 *     ByState?: 'ABORTED'|'ABORTING'|'COMPLETED'|'CREATED'|'EXPIRED'|'FAILED'|'PARTIAL'|'PENDING'|'RUNNING',
 *     ByBackupVaultName?: string,
 *     ByCreatedBefore?: int|string|\DateTimeInterface,
 *     ByCreatedAfter?: int|string|\DateTimeInterface,
 *     ByResourceType?: string,
 *     ByAccountId?: string,
 *     ByCompleteAfter?: int|string|\DateTimeInterface,
 *     ByCompleteBefore?: int|string|\DateTimeInterface,
 *     ByParentJobId?: string,
 *     ByMessageCategory?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBackupPlanTemplates(array $args = [])
 * @phpstan-method \Aws\Result listBackupPlanTemplates(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBackupPlanTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBackupPlanTemplatesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listBackupPlanVersions(array $args = [])
 * @phpstan-method \Aws\Result listBackupPlanVersions(array{BackupPlanId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBackupPlanVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBackupPlanVersionsAsync(array{BackupPlanId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listBackupPlans(array $args = [])
 * @phpstan-method \Aws\Result listBackupPlans(array{NextToken?: string, MaxResults?: int, IncludeDeleted?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBackupPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBackupPlansAsync(array{NextToken?: string, MaxResults?: int, IncludeDeleted?: bool, ...} $args = [])
 * @method \Aws\Result listBackupSelections(array $args = [])
 * @phpstan-method \Aws\Result listBackupSelections(array{BackupPlanId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBackupSelectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBackupSelectionsAsync(array{BackupPlanId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listBackupVaults(array $args = [])
 * @phpstan-method \Aws\Result listBackupVaults(array{
 *     ByVaultType?: 'BACKUP_VAULT'|'LOGICALLY_AIR_GAPPED_BACKUP_VAULT'|'RESTORE_ACCESS_BACKUP_VAULT',
 *     ByShared?: bool,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBackupVaultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBackupVaultsAsync(array{
 *     ByVaultType?: 'BACKUP_VAULT'|'LOGICALLY_AIR_GAPPED_BACKUP_VAULT'|'RESTORE_ACCESS_BACKUP_VAULT',
 *     ByShared?: bool,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCopyJobSummaries(array $args = [])
 * @phpstan-method \Aws\Result listCopyJobSummaries(array{
 *     AccountId?: string,
 *     State?: 'ABORTED'|'ABORTING'|'AGGREGATE_ALL'|'ANY'|'COMPLETED'|'COMPLETING'|'CREATED'|'FAILED'|'FAILING'|'PARTIAL'|'RUNNING',
 *     ResourceType?: string,
 *     MessageCategory?: string,
 *     AggregationPeriod?: 'FOURTEEN_DAYS'|'ONE_DAY'|'SEVEN_DAYS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCopyJobSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCopyJobSummariesAsync(array{
 *     AccountId?: string,
 *     State?: 'ABORTED'|'ABORTING'|'AGGREGATE_ALL'|'ANY'|'COMPLETED'|'COMPLETING'|'CREATED'|'FAILED'|'FAILING'|'PARTIAL'|'RUNNING',
 *     ResourceType?: string,
 *     MessageCategory?: string,
 *     AggregationPeriod?: 'FOURTEEN_DAYS'|'ONE_DAY'|'SEVEN_DAYS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCopyJobs(array $args = [])
 * @phpstan-method \Aws\Result listCopyJobs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ByResourceArn?: string,
 *     ByState?: 'COMPLETED'|'CREATED'|'FAILED'|'PARTIAL'|'RUNNING',
 *     ByCreatedBefore?: int|string|\DateTimeInterface,
 *     ByCreatedAfter?: int|string|\DateTimeInterface,
 *     ByResourceType?: string,
 *     ByDestinationVaultArn?: string,
 *     ByAccountId?: string,
 *     ByCompleteBefore?: int|string|\DateTimeInterface,
 *     ByCompleteAfter?: int|string|\DateTimeInterface,
 *     ByParentJobId?: string,
 *     ByMessageCategory?: string,
 *     BySourceRecoveryPointArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCopyJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCopyJobsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ByResourceArn?: string,
 *     ByState?: 'COMPLETED'|'CREATED'|'FAILED'|'PARTIAL'|'RUNNING',
 *     ByCreatedBefore?: int|string|\DateTimeInterface,
 *     ByCreatedAfter?: int|string|\DateTimeInterface,
 *     ByResourceType?: string,
 *     ByDestinationVaultArn?: string,
 *     ByAccountId?: string,
 *     ByCompleteBefore?: int|string|\DateTimeInterface,
 *     ByCompleteAfter?: int|string|\DateTimeInterface,
 *     ByParentJobId?: string,
 *     ByMessageCategory?: string,
 *     BySourceRecoveryPointArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFrameworks(array $args = [])
 * @phpstan-method \Aws\Result listFrameworks(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFrameworksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFrameworksAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listIndexedRecoveryPoints(array $args = [])
 * @phpstan-method \Aws\Result listIndexedRecoveryPoints(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SourceResourceArn?: string,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     ResourceType?: string,
 *     IndexStatus?: 'ACTIVE'|'DELETING'|'FAILED'|'PENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIndexedRecoveryPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIndexedRecoveryPointsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     SourceResourceArn?: string,
 *     CreatedBefore?: int|string|\DateTimeInterface,
 *     CreatedAfter?: int|string|\DateTimeInterface,
 *     ResourceType?: string,
 *     IndexStatus?: 'ACTIVE'|'DELETING'|'FAILED'|'PENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLegalHolds(array $args = [])
 * @phpstan-method \Aws\Result listLegalHolds(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLegalHoldsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLegalHoldsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listProtectedResources(array $args = [])
 * @phpstan-method \Aws\Result listProtectedResources(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProtectedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProtectedResourcesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listProtectedResourcesByBackupVault(array $args = [])
 * @phpstan-method \Aws\Result listProtectedResourcesByBackupVault(array{BackupVaultName?: string, BackupVaultAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProtectedResourcesByBackupVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProtectedResourcesByBackupVaultAsync(array{BackupVaultName?: string, BackupVaultAccountId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRecoveryPointsByBackupVault(array $args = [])
 * @phpstan-method \Aws\Result listRecoveryPointsByBackupVault(array{
 *     BackupVaultName?: string,
 *     BackupVaultAccountId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ByResourceArn?: string,
 *     ByResourceType?: string,
 *     ByBackupPlanId?: string,
 *     ByCreatedBefore?: int|string|\DateTimeInterface,
 *     ByCreatedAfter?: int|string|\DateTimeInterface,
 *     ByParentRecoveryPointArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecoveryPointsByBackupVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecoveryPointsByBackupVaultAsync(array{
 *     BackupVaultName?: string,
 *     BackupVaultAccountId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ByResourceArn?: string,
 *     ByResourceType?: string,
 *     ByBackupPlanId?: string,
 *     ByCreatedBefore?: int|string|\DateTimeInterface,
 *     ByCreatedAfter?: int|string|\DateTimeInterface,
 *     ByParentRecoveryPointArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRecoveryPointsByLegalHold(array $args = [])
 * @phpstan-method \Aws\Result listRecoveryPointsByLegalHold(array{LegalHoldId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecoveryPointsByLegalHoldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecoveryPointsByLegalHoldAsync(array{LegalHoldId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRecoveryPointsByResource(array $args = [])
 * @phpstan-method \Aws\Result listRecoveryPointsByResource(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ManagedByAWSBackupOnly?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecoveryPointsByResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecoveryPointsByResourceAsync(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ManagedByAWSBackupOnly?: bool, ...} $args = [])
 * @method \Aws\Result listReportJobs(array $args = [])
 * @phpstan-method \Aws\Result listReportJobs(array{
 *     ByReportPlanName?: string,
 *     ByCreationBefore?: int|string|\DateTimeInterface,
 *     ByCreationAfter?: int|string|\DateTimeInterface,
 *     ByStatus?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listReportJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReportJobsAsync(array{
 *     ByReportPlanName?: string,
 *     ByCreationBefore?: int|string|\DateTimeInterface,
 *     ByCreationAfter?: int|string|\DateTimeInterface,
 *     ByStatus?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listReportPlans(array $args = [])
 * @phpstan-method \Aws\Result listReportPlans(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listReportPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReportPlansAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRestoreAccessBackupVaults(array $args = [])
 * @phpstan-method \Aws\Result listRestoreAccessBackupVaults(array{BackupVaultName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRestoreAccessBackupVaultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRestoreAccessBackupVaultsAsync(array{BackupVaultName?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRestoreJobSummaries(array $args = [])
 * @phpstan-method \Aws\Result listRestoreJobSummaries(array{
 *     AccountId?: string,
 *     State?: 'ABORTED'|'AGGREGATE_ALL'|'ANY'|'COMPLETED'|'CREATED'|'FAILED'|'PENDING'|'RUNNING',
 *     ResourceType?: string,
 *     AggregationPeriod?: 'FOURTEEN_DAYS'|'ONE_DAY'|'SEVEN_DAYS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRestoreJobSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRestoreJobSummariesAsync(array{
 *     AccountId?: string,
 *     State?: 'ABORTED'|'AGGREGATE_ALL'|'ANY'|'COMPLETED'|'CREATED'|'FAILED'|'PENDING'|'RUNNING',
 *     ResourceType?: string,
 *     AggregationPeriod?: 'FOURTEEN_DAYS'|'ONE_DAY'|'SEVEN_DAYS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRestoreJobs(array $args = [])
 * @phpstan-method \Aws\Result listRestoreJobs(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ByAccountId?: string,
 *     ByResourceType?: string,
 *     ByCreatedBefore?: int|string|\DateTimeInterface,
 *     ByCreatedAfter?: int|string|\DateTimeInterface,
 *     ByStatus?: 'ABORTED'|'COMPLETED'|'FAILED'|'PENDING'|'RUNNING',
 *     ByCompleteBefore?: int|string|\DateTimeInterface,
 *     ByCompleteAfter?: int|string|\DateTimeInterface,
 *     ByRestoreTestingPlanArn?: string,
 *     ByParentJobId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRestoreJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRestoreJobsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ByAccountId?: string,
 *     ByResourceType?: string,
 *     ByCreatedBefore?: int|string|\DateTimeInterface,
 *     ByCreatedAfter?: int|string|\DateTimeInterface,
 *     ByStatus?: 'ABORTED'|'COMPLETED'|'FAILED'|'PENDING'|'RUNNING',
 *     ByCompleteBefore?: int|string|\DateTimeInterface,
 *     ByCompleteAfter?: int|string|\DateTimeInterface,
 *     ByRestoreTestingPlanArn?: string,
 *     ByParentJobId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRestoreJobsByProtectedResource(array $args = [])
 * @phpstan-method \Aws\Result listRestoreJobsByProtectedResource(array{
 *     ResourceArn?: string,
 *     ByStatus?: 'ABORTED'|'COMPLETED'|'FAILED'|'PENDING'|'RUNNING',
 *     ByRecoveryPointCreationDateAfter?: int|string|\DateTimeInterface,
 *     ByRecoveryPointCreationDateBefore?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRestoreJobsByProtectedResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRestoreJobsByProtectedResourceAsync(array{
 *     ResourceArn?: string,
 *     ByStatus?: 'ABORTED'|'COMPLETED'|'FAILED'|'PENDING'|'RUNNING',
 *     ByRecoveryPointCreationDateAfter?: int|string|\DateTimeInterface,
 *     ByRecoveryPointCreationDateBefore?: int|string|\DateTimeInterface,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRestoreTestingPlans(array $args = [])
 * @phpstan-method \Aws\Result listRestoreTestingPlans(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRestoreTestingPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRestoreTestingPlansAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listRestoreTestingSelections(array $args = [])
 * @phpstan-method \Aws\Result listRestoreTestingSelections(array{MaxResults?: int, NextToken?: string, RestoreTestingPlanName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRestoreTestingSelectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRestoreTestingSelectionsAsync(array{MaxResults?: int, NextToken?: string, RestoreTestingPlanName?: string, ...} $args = [])
 * @method \Aws\Result listScanJobSummaries(array $args = [])
 * @phpstan-method \Aws\Result listScanJobSummaries(array{
 *     AccountId?: string,
 *     ResourceType?: string,
 *     MalwareScanner?: 'GUARDDUTY',
 *     ScanResultStatus?: 'NO_THREATS_FOUND'|'THREATS_FOUND'|'UNKNOWN',
 *     State?: 'AGGREGATE_ALL'|'ANY'|'CANCELED'|'COMPLETED'|'COMPLETED_WITH_ISSUES'|'CREATED'|'FAILED'|'RUNNING',
 *     AggregationPeriod?: 'FOURTEEN_DAYS'|'ONE_DAY'|'SEVEN_DAYS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listScanJobSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScanJobSummariesAsync(array{
 *     AccountId?: string,
 *     ResourceType?: string,
 *     MalwareScanner?: 'GUARDDUTY',
 *     ScanResultStatus?: 'NO_THREATS_FOUND'|'THREATS_FOUND'|'UNKNOWN',
 *     State?: 'AGGREGATE_ALL'|'ANY'|'CANCELED'|'COMPLETED'|'COMPLETED_WITH_ISSUES'|'CREATED'|'FAILED'|'RUNNING',
 *     AggregationPeriod?: 'FOURTEEN_DAYS'|'ONE_DAY'|'SEVEN_DAYS',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listScanJobs(array $args = [])
 * @phpstan-method \Aws\Result listScanJobs(array{
 *     ByAccountId?: string,
 *     ByBackupVaultName?: string,
 *     ByCompleteAfter?: int|string|\DateTimeInterface,
 *     ByCompleteBefore?: int|string|\DateTimeInterface,
 *     ByMalwareScanner?: 'GUARDDUTY',
 *     ByRecoveryPointArn?: string,
 *     ByResourceArn?: string,
 *     ByResourceType?: 'EBS'|'EC2'|'S3',
 *     ByScanResultStatus?: 'NO_THREATS_FOUND'|'THREATS_FOUND'|'UNKNOWN',
 *     ByState?: 'CANCELED'|'COMPLETED'|'COMPLETED_WITH_ISSUES'|'CREATED'|'FAILED'|'RUNNING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listScanJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScanJobsAsync(array{
 *     ByAccountId?: string,
 *     ByBackupVaultName?: string,
 *     ByCompleteAfter?: int|string|\DateTimeInterface,
 *     ByCompleteBefore?: int|string|\DateTimeInterface,
 *     ByMalwareScanner?: 'GUARDDUTY',
 *     ByRecoveryPointArn?: string,
 *     ByResourceArn?: string,
 *     ByResourceType?: 'EBS'|'EC2'|'S3',
 *     ByScanResultStatus?: 'NO_THREATS_FOUND'|'THREATS_FOUND'|'UNKNOWN',
 *     ByState?: 'CANCELED'|'COMPLETED'|'COMPLETED_WITH_ISSUES'|'CREATED'|'FAILED'|'RUNNING',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{ResourceArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTieringConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listTieringConfigurations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTieringConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTieringConfigurationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result putBackupVaultAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result putBackupVaultAccessPolicy(array{BackupVaultName?: string, Policy?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putBackupVaultAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBackupVaultAccessPolicyAsync(array{BackupVaultName?: string, Policy?: string, ...} $args = [])
 * @method \Aws\Result putBackupVaultLockConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putBackupVaultLockConfiguration(array{BackupVaultName?: string, MinRetentionDays?: int, MaxRetentionDays?: int, ChangeableForDays?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putBackupVaultLockConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBackupVaultLockConfigurationAsync(array{BackupVaultName?: string, MinRetentionDays?: int, MaxRetentionDays?: int, ChangeableForDays?: int, ...} $args = [])
 * @method \Aws\Result putBackupVaultNotifications(array $args = [])
 * @phpstan-method \Aws\Result putBackupVaultNotifications(array{
 *     BackupVaultName?: string,
 *     SNSTopicArn?: string,
 *     BackupVaultEvents?: list<'BACKUP_JOB_COMPLETED'|'BACKUP_JOB_EXPIRED'|'BACKUP_JOB_FAILED'|'BACKUP_JOB_STARTED'|'BACKUP_JOB_SUCCESSFUL'|'BACKUP_PLAN_CREATED'|'BACKUP_PLAN_MODIFIED'|'CONTINUOUS_BACKUP_INTERRUPTED'|'COPY_JOB_FAILED'|'COPY_JOB_STARTED'|'COPY_JOB_SUCCESSFUL'|'EKS_BACKUP_OBJECT_FAILED'|'EKS_RESTORE_OBJECT_FAILED'|'EKS_RESTORE_OBJECT_SKIPPED'|'RECOVERY_POINT_INDEXING_FAILED'|'RECOVERY_POINT_INDEX_COMPLETED'|'RECOVERY_POINT_INDEX_DELETED'|'RECOVERY_POINT_MODIFIED'|'RESTORE_JOB_COMPLETED'|'RESTORE_JOB_FAILED'|'RESTORE_JOB_STARTED'|'RESTORE_JOB_SUCCESSFUL'|'S3_BACKUP_OBJECT_FAILED'|'S3_RESTORE_OBJECT_FAILED'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putBackupVaultNotificationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBackupVaultNotificationsAsync(array{
 *     BackupVaultName?: string,
 *     SNSTopicArn?: string,
 *     BackupVaultEvents?: list<'BACKUP_JOB_COMPLETED'|'BACKUP_JOB_EXPIRED'|'BACKUP_JOB_FAILED'|'BACKUP_JOB_STARTED'|'BACKUP_JOB_SUCCESSFUL'|'BACKUP_PLAN_CREATED'|'BACKUP_PLAN_MODIFIED'|'CONTINUOUS_BACKUP_INTERRUPTED'|'COPY_JOB_FAILED'|'COPY_JOB_STARTED'|'COPY_JOB_SUCCESSFUL'|'EKS_BACKUP_OBJECT_FAILED'|'EKS_RESTORE_OBJECT_FAILED'|'EKS_RESTORE_OBJECT_SKIPPED'|'RECOVERY_POINT_INDEXING_FAILED'|'RECOVERY_POINT_INDEX_COMPLETED'|'RECOVERY_POINT_INDEX_DELETED'|'RECOVERY_POINT_MODIFIED'|'RESTORE_JOB_COMPLETED'|'RESTORE_JOB_FAILED'|'RESTORE_JOB_STARTED'|'RESTORE_JOB_SUCCESSFUL'|'S3_BACKUP_OBJECT_FAILED'|'S3_RESTORE_OBJECT_FAILED'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putRestoreValidationResult(array $args = [])
 * @phpstan-method \Aws\Result putRestoreValidationResult(array{
 *     RestoreJobId?: string,
 *     ValidationStatus?: 'FAILED'|'SUCCESSFUL'|'TIMED_OUT'|'VALIDATING',
 *     ValidationStatusMessage?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRestoreValidationResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRestoreValidationResultAsync(array{
 *     RestoreJobId?: string,
 *     ValidationStatus?: 'FAILED'|'SUCCESSFUL'|'TIMED_OUT'|'VALIDATING',
 *     ValidationStatusMessage?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result revokeRestoreAccessBackupVault(array $args = [])
 * @phpstan-method \Aws\Result revokeRestoreAccessBackupVault(array{BackupVaultName?: string, RestoreAccessBackupVaultArn?: string, RequesterComment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeRestoreAccessBackupVaultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeRestoreAccessBackupVaultAsync(array{BackupVaultName?: string, RestoreAccessBackupVaultArn?: string, RequesterComment?: string, ...} $args = [])
 * @method \Aws\Result startBackupJob(array $args = [])
 * @phpstan-method \Aws\Result startBackupJob(array{
 *     BackupVaultName?: string,
 *     LogicallyAirGappedBackupVaultArn?: string,
 *     ResourceArn?: string,
 *     IamRoleArn?: string,
 *     IdempotencyToken?: string,
 *     StartWindowMinutes?: int,
 *     CompleteWindowMinutes?: int,
 *     Lifecycle?: array{
 *         MoveToColdStorageAfterDays?: int,
 *         DeleteAfterDays?: int,
 *         OptInToArchiveForSupportedResources?: bool,
 *         DeleteAfterEvent?: 'DELETE_AFTER_COPY',
 *         ...,
 *     },
 *     RecoveryPointTags?: array<string, string>,
 *     BackupOptions?: array<string, string>,
 *     Index?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startBackupJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startBackupJobAsync(array{
 *     BackupVaultName?: string,
 *     LogicallyAirGappedBackupVaultArn?: string,
 *     ResourceArn?: string,
 *     IamRoleArn?: string,
 *     IdempotencyToken?: string,
 *     StartWindowMinutes?: int,
 *     CompleteWindowMinutes?: int,
 *     Lifecycle?: array{
 *         MoveToColdStorageAfterDays?: int,
 *         DeleteAfterDays?: int,
 *         OptInToArchiveForSupportedResources?: bool,
 *         DeleteAfterEvent?: 'DELETE_AFTER_COPY',
 *         ...,
 *     },
 *     RecoveryPointTags?: array<string, string>,
 *     BackupOptions?: array<string, string>,
 *     Index?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startCopyJob(array $args = [])
 * @phpstan-method \Aws\Result startCopyJob(array{
 *     RecoveryPointArn?: string,
 *     SourceBackupVaultName?: string,
 *     DestinationBackupVaultArn?: string,
 *     IamRoleArn?: string,
 *     IdempotencyToken?: string,
 *     Lifecycle?: array{
 *         MoveToColdStorageAfterDays?: int,
 *         DeleteAfterDays?: int,
 *         OptInToArchiveForSupportedResources?: bool,
 *         DeleteAfterEvent?: 'DELETE_AFTER_COPY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startCopyJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCopyJobAsync(array{
 *     RecoveryPointArn?: string,
 *     SourceBackupVaultName?: string,
 *     DestinationBackupVaultArn?: string,
 *     IamRoleArn?: string,
 *     IdempotencyToken?: string,
 *     Lifecycle?: array{
 *         MoveToColdStorageAfterDays?: int,
 *         DeleteAfterDays?: int,
 *         OptInToArchiveForSupportedResources?: bool,
 *         DeleteAfterEvent?: 'DELETE_AFTER_COPY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startReportJob(array $args = [])
 * @phpstan-method \Aws\Result startReportJob(array{ReportPlanName?: string, IdempotencyToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startReportJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReportJobAsync(array{ReportPlanName?: string, IdempotencyToken?: string, ...} $args = [])
 * @method \Aws\Result startRestoreJob(array $args = [])
 * @phpstan-method \Aws\Result startRestoreJob(array{
 *     RecoveryPointArn?: string,
 *     Metadata?: array<string, string>,
 *     IamRoleArn?: string,
 *     IdempotencyToken?: string,
 *     ResourceType?: string,
 *     CopySourceTagsToRestoredResource?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startRestoreJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startRestoreJobAsync(array{
 *     RecoveryPointArn?: string,
 *     Metadata?: array<string, string>,
 *     IamRoleArn?: string,
 *     IdempotencyToken?: string,
 *     ResourceType?: string,
 *     CopySourceTagsToRestoredResource?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startScanJob(array $args = [])
 * @phpstan-method \Aws\Result startScanJob(array{
 *     BackupVaultName?: string,
 *     ContinuousScanEndTime?: int|string|\DateTimeInterface,
 *     IamRoleArn?: string,
 *     IdempotencyToken?: string,
 *     MalwareScanner?: 'GUARDDUTY',
 *     RecoveryPointArn?: string,
 *     ScanBaseRecoveryPointArn?: string,
 *     ScanMode?: 'FULL_SCAN'|'INCREMENTAL_SCAN',
 *     ScannerRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startScanJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startScanJobAsync(array{
 *     BackupVaultName?: string,
 *     ContinuousScanEndTime?: int|string|\DateTimeInterface,
 *     IamRoleArn?: string,
 *     IdempotencyToken?: string,
 *     MalwareScanner?: 'GUARDDUTY',
 *     RecoveryPointArn?: string,
 *     ScanBaseRecoveryPointArn?: string,
 *     ScanMode?: 'FULL_SCAN'|'INCREMENTAL_SCAN',
 *     ScannerRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopBackupJob(array $args = [])
 * @phpstan-method \Aws\Result stopBackupJob(array{BackupJobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopBackupJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopBackupJobAsync(array{BackupJobId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeyList?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeyList?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBackupPlan(array $args = [])
 * @phpstan-method \Aws\Result updateBackupPlan(array{
 *     BackupPlanId?: string,
 *     BackupPlan?: array{
 *         BackupPlanName?: string,
 *         Rules?: list<array>,
 *         AdvancedBackupSettings?: list<array>,
 *         ScanSettings?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBackupPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBackupPlanAsync(array{
 *     BackupPlanId?: string,
 *     BackupPlan?: array{
 *         BackupPlanName?: string,
 *         Rules?: list<array>,
 *         AdvancedBackupSettings?: list<array>,
 *         ScanSettings?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFramework(array $args = [])
 * @phpstan-method \Aws\Result updateFramework(array{
 *     FrameworkName?: string,
 *     FrameworkDescription?: string,
 *     FrameworkControls?: list<array{ControlName?: string, ControlInputParameters?: list<array>, ControlScope?: array, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFrameworkAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFrameworkAsync(array{
 *     FrameworkName?: string,
 *     FrameworkDescription?: string,
 *     FrameworkControls?: list<array{ControlName?: string, ControlInputParameters?: list<array>, ControlScope?: array, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateGlobalSettings(array $args = [])
 * @phpstan-method \Aws\Result updateGlobalSettings(array{GlobalSettings?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlobalSettingsAsync(array{GlobalSettings?: array<string, string>, ...} $args = [])
 * @method \Aws\Result updateRecoveryPointIndexSettings(array $args = [])
 * @phpstan-method \Aws\Result updateRecoveryPointIndexSettings(array{
 *     BackupVaultName?: string,
 *     RecoveryPointArn?: string,
 *     IamRoleArn?: string,
 *     Index?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRecoveryPointIndexSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRecoveryPointIndexSettingsAsync(array{
 *     BackupVaultName?: string,
 *     RecoveryPointArn?: string,
 *     IamRoleArn?: string,
 *     Index?: 'DISABLED'|'ENABLED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRecoveryPointLifecycle(array $args = [])
 * @phpstan-method \Aws\Result updateRecoveryPointLifecycle(array{
 *     BackupVaultName?: string,
 *     RecoveryPointArn?: string,
 *     Lifecycle?: array{
 *         MoveToColdStorageAfterDays?: int,
 *         DeleteAfterDays?: int,
 *         OptInToArchiveForSupportedResources?: bool,
 *         DeleteAfterEvent?: 'DELETE_AFTER_COPY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRecoveryPointLifecycleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRecoveryPointLifecycleAsync(array{
 *     BackupVaultName?: string,
 *     RecoveryPointArn?: string,
 *     Lifecycle?: array{
 *         MoveToColdStorageAfterDays?: int,
 *         DeleteAfterDays?: int,
 *         OptInToArchiveForSupportedResources?: bool,
 *         DeleteAfterEvent?: 'DELETE_AFTER_COPY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRegionSettings(array $args = [])
 * @phpstan-method \Aws\Result updateRegionSettings(array{
 *     ResourceTypeOptInPreference?: array<string, bool>,
 *     ResourceTypeManagementPreference?: array<string, bool>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegionSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegionSettingsAsync(array{
 *     ResourceTypeOptInPreference?: array<string, bool>,
 *     ResourceTypeManagementPreference?: array<string, bool>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateReportPlan(array $args = [])
 * @phpstan-method \Aws\Result updateReportPlan(array{
 *     ReportPlanName?: string,
 *     ReportPlanDescription?: string,
 *     ReportDeliveryChannel?: array{S3BucketName?: string, S3KeyPrefix?: string, Formats?: list<string>, ...},
 *     ReportSetting?: array{
 *         ReportTemplate?: string,
 *         FrameworkArns?: list<string>,
 *         NumberOfFrameworks?: int,
 *         Accounts?: list<string>,
 *         OrganizationUnits?: list<string>,
 *         Regions?: list<string>,
 *         ...,
 *     },
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateReportPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReportPlanAsync(array{
 *     ReportPlanName?: string,
 *     ReportPlanDescription?: string,
 *     ReportDeliveryChannel?: array{S3BucketName?: string, S3KeyPrefix?: string, Formats?: list<string>, ...},
 *     ReportSetting?: array{
 *         ReportTemplate?: string,
 *         FrameworkArns?: list<string>,
 *         NumberOfFrameworks?: int,
 *         Accounts?: list<string>,
 *         OrganizationUnits?: list<string>,
 *         Regions?: list<string>,
 *         ...,
 *     },
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRestoreTestingPlan(array $args = [])
 * @phpstan-method \Aws\Result updateRestoreTestingPlan(array{
 *     RestoreTestingPlan?: array{
 *         RecoveryPointSelection?: array{
 *             Algorithm?: 'LATEST_WITHIN_WINDOW'|'RANDOM_WITHIN_WINDOW',
 *             ExcludeVaults?: list<string>,
 *             IncludeVaults?: list<string>,
 *             RecoveryPointTypes?: list<'CONTINUOUS'|'SNAPSHOT'>,
 *             SelectionWindowDays?: int,
 *             ...,
 *         },
 *         ScheduleExpression?: string,
 *         ScheduleExpressionTimezone?: string,
 *         StartWindowHours?: int,
 *         ...,
 *     },
 *     RestoreTestingPlanName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRestoreTestingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRestoreTestingPlanAsync(array{
 *     RestoreTestingPlan?: array{
 *         RecoveryPointSelection?: array{
 *             Algorithm?: 'LATEST_WITHIN_WINDOW'|'RANDOM_WITHIN_WINDOW',
 *             ExcludeVaults?: list<string>,
 *             IncludeVaults?: list<string>,
 *             RecoveryPointTypes?: list<'CONTINUOUS'|'SNAPSHOT'>,
 *             SelectionWindowDays?: int,
 *             ...,
 *         },
 *         ScheduleExpression?: string,
 *         ScheduleExpressionTimezone?: string,
 *         StartWindowHours?: int,
 *         ...,
 *     },
 *     RestoreTestingPlanName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRestoreTestingSelection(array $args = [])
 * @phpstan-method \Aws\Result updateRestoreTestingSelection(array{
 *     RestoreTestingPlanName?: string,
 *     RestoreTestingSelection?: array{
 *         IamRoleArn?: string,
 *         ProtectedResourceArns?: list<string>,
 *         ProtectedResourceConditions?: array{StringEquals?: list<array>, StringNotEquals?: list<array>, ...},
 *         RestoreMetadataOverrides?: array<string, string>,
 *         ValidationWindowHours?: int,
 *         ...,
 *     },
 *     RestoreTestingSelectionName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRestoreTestingSelectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRestoreTestingSelectionAsync(array{
 *     RestoreTestingPlanName?: string,
 *     RestoreTestingSelection?: array{
 *         IamRoleArn?: string,
 *         ProtectedResourceArns?: list<string>,
 *         ProtectedResourceConditions?: array{StringEquals?: list<array>, StringNotEquals?: list<array>, ...},
 *         RestoreMetadataOverrides?: array<string, string>,
 *         ValidationWindowHours?: int,
 *         ...,
 *     },
 *     RestoreTestingSelectionName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTieringConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateTieringConfiguration(array{
 *     TieringConfigurationName?: string,
 *     TieringConfiguration?: array{ResourceSelection?: list<array>, BackupVaultName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTieringConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTieringConfigurationAsync(array{
 *     TieringConfigurationName?: string,
 *     TieringConfiguration?: array{ResourceSelection?: list<array>, BackupVaultName?: string, ...},
 *     ...,
 * } $args = [])
 */
class BackupClient extends AwsClient {}
