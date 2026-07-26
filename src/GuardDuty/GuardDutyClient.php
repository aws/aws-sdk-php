<?php
namespace Aws\GuardDuty;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon GuardDuty** service.
 * @method \Aws\Result acceptAdministratorInvitation(array $args = [])
 * @phpstan-method \Aws\Result acceptAdministratorInvitation(array{DetectorId?: string, AdministratorId?: string, InvitationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptAdministratorInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptAdministratorInvitationAsync(array{DetectorId?: string, AdministratorId?: string, InvitationId?: string, ...} $args = [])
 * @method \Aws\Result acceptInvitation(array $args = [])
 * @phpstan-method \Aws\Result acceptInvitation(array{DetectorId?: string, MasterId?: string, InvitationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptInvitationAsync(array{DetectorId?: string, MasterId?: string, InvitationId?: string, ...} $args = [])
 * @method \Aws\Result archiveFindings(array $args = [])
 * @phpstan-method \Aws\Result archiveFindings(array{DetectorId?: string, FindingIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise archiveFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise archiveFindingsAsync(array{DetectorId?: string, FindingIds?: list<string>, ...} $args = [])
 * @method \Aws\Result createDetector(array $args = [])
 * @phpstan-method \Aws\Result createDetector(array{
 *     Enable?: bool,
 *     ClientToken?: string,
 *     FindingPublishingFrequency?: 'FIFTEEN_MINUTES'|'ONE_HOUR'|'SIX_HOURS',
 *     DataSources?: array{
 *         S3Logs?: array{Enable?: bool, ...},
 *         Kubernetes?: array{AuditLogs?: array, ...},
 *         MalwareProtection?: array{ScanEc2InstanceWithFindings?: array, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     Features?: list<array{
 *         Name?: 'AI_ANALYST'|'AI_PROTECTION'|'EBS_MALWARE_PROTECTION'|'EKS_AUDIT_LOGS'|'EKS_RUNTIME_MONITORING'|'LAMBDA_NETWORK_LOGS'|'RDS_LOGIN_EVENTS'|'RUNTIME_MONITORING'|'S3_DATA_EVENTS',
 *         Status?: 'DISABLED'|'ENABLED',
 *         AdditionalConfiguration?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDetectorAsync(array{
 *     Enable?: bool,
 *     ClientToken?: string,
 *     FindingPublishingFrequency?: 'FIFTEEN_MINUTES'|'ONE_HOUR'|'SIX_HOURS',
 *     DataSources?: array{
 *         S3Logs?: array{Enable?: bool, ...},
 *         Kubernetes?: array{AuditLogs?: array, ...},
 *         MalwareProtection?: array{ScanEc2InstanceWithFindings?: array, ...},
 *         ...,
 *     },
 *     Tags?: array<string, string>,
 *     Features?: list<array{
 *         Name?: 'AI_ANALYST'|'AI_PROTECTION'|'EBS_MALWARE_PROTECTION'|'EKS_AUDIT_LOGS'|'EKS_RUNTIME_MONITORING'|'LAMBDA_NETWORK_LOGS'|'RDS_LOGIN_EVENTS'|'RUNTIME_MONITORING'|'S3_DATA_EVENTS',
 *         Status?: 'DISABLED'|'ENABLED',
 *         AdditionalConfiguration?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFilter(array $args = [])
 * @phpstan-method \Aws\Result createFilter(array{
 *     DetectorId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Action?: 'ARCHIVE'|'NOOP',
 *     Rank?: int,
 *     FindingCriteria?: array{Criterion?: array<string, array>, ...},
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFilterAsync(array{
 *     DetectorId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Action?: 'ARCHIVE'|'NOOP',
 *     Rank?: int,
 *     FindingCriteria?: array{Criterion?: array<string, array>, ...},
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createIPSet(array $args = [])
 * @phpstan-method \Aws\Result createIPSet(array{
 *     DetectorId?: string,
 *     Name?: string,
 *     Format?: 'ALIEN_VAULT'|'FIRE_EYE'|'OTX_CSV'|'PROOF_POINT'|'STIX'|'TXT',
 *     Location?: string,
 *     Activate?: bool,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIPSetAsync(array{
 *     DetectorId?: string,
 *     Name?: string,
 *     Format?: 'ALIEN_VAULT'|'FIRE_EYE'|'OTX_CSV'|'PROOF_POINT'|'STIX'|'TXT',
 *     Location?: string,
 *     Activate?: bool,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInvestigation(array $args = [])
 * @phpstan-method \Aws\Result createInvestigation(array{DetectorId?: string, TriggerPrompt?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createInvestigationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInvestigationAsync(array{DetectorId?: string, TriggerPrompt?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result createMalwareProtectionPlan(array $args = [])
 * @phpstan-method \Aws\Result createMalwareProtectionPlan(array{
 *     ClientToken?: string,
 *     Role?: string,
 *     ProtectedResource?: array{S3Bucket?: array{BucketName?: string, ObjectPrefixes?: list<string>, ...}, ...},
 *     Actions?: array{Tagging?: array{Status?: 'DISABLED'|'ENABLED', ...}, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMalwareProtectionPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMalwareProtectionPlanAsync(array{
 *     ClientToken?: string,
 *     Role?: string,
 *     ProtectedResource?: array{S3Bucket?: array{BucketName?: string, ObjectPrefixes?: list<string>, ...}, ...},
 *     Actions?: array{Tagging?: array{Status?: 'DISABLED'|'ENABLED', ...}, ...},
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createMembers(array $args = [])
 * @phpstan-method \Aws\Result createMembers(array{DetectorId?: string, AccountDetails?: list<array{AccountId?: string, Email?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMembersAsync(array{DetectorId?: string, AccountDetails?: list<array{AccountId?: string, Email?: string, ...}>, ...} $args = [])
 * @method \Aws\Result createPublishingDestination(array $args = [])
 * @phpstan-method \Aws\Result createPublishingDestination(array{
 *     DetectorId?: string,
 *     DestinationType?: 'S3',
 *     DestinationProperties?: array{DestinationArn?: string, KmsKeyArn?: string, ...},
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPublishingDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPublishingDestinationAsync(array{
 *     DetectorId?: string,
 *     DestinationType?: 'S3',
 *     DestinationProperties?: array{DestinationArn?: string, KmsKeyArn?: string, ...},
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSampleFindings(array $args = [])
 * @phpstan-method \Aws\Result createSampleFindings(array{DetectorId?: string, FindingTypes?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSampleFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSampleFindingsAsync(array{DetectorId?: string, FindingTypes?: list<string>, ...} $args = [])
 * @method \Aws\Result createThreatEntitySet(array $args = [])
 * @phpstan-method \Aws\Result createThreatEntitySet(array{
 *     DetectorId?: string,
 *     Name?: string,
 *     Format?: 'ALIEN_VAULT'|'FIRE_EYE'|'OTX_CSV'|'PROOF_POINT'|'STIX'|'TXT',
 *     Location?: string,
 *     ExpectedBucketOwner?: string,
 *     Activate?: bool,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createThreatEntitySetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThreatEntitySetAsync(array{
 *     DetectorId?: string,
 *     Name?: string,
 *     Format?: 'ALIEN_VAULT'|'FIRE_EYE'|'OTX_CSV'|'PROOF_POINT'|'STIX'|'TXT',
 *     Location?: string,
 *     ExpectedBucketOwner?: string,
 *     Activate?: bool,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createThreatIntelSet(array $args = [])
 * @phpstan-method \Aws\Result createThreatIntelSet(array{
 *     DetectorId?: string,
 *     Name?: string,
 *     Format?: 'ALIEN_VAULT'|'FIRE_EYE'|'OTX_CSV'|'PROOF_POINT'|'STIX'|'TXT',
 *     Location?: string,
 *     Activate?: bool,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createThreatIntelSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThreatIntelSetAsync(array{
 *     DetectorId?: string,
 *     Name?: string,
 *     Format?: 'ALIEN_VAULT'|'FIRE_EYE'|'OTX_CSV'|'PROOF_POINT'|'STIX'|'TXT',
 *     Location?: string,
 *     Activate?: bool,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTrustedEntitySet(array $args = [])
 * @phpstan-method \Aws\Result createTrustedEntitySet(array{
 *     DetectorId?: string,
 *     Name?: string,
 *     Format?: 'ALIEN_VAULT'|'FIRE_EYE'|'OTX_CSV'|'PROOF_POINT'|'STIX'|'TXT',
 *     Location?: string,
 *     ExpectedBucketOwner?: string,
 *     Activate?: bool,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTrustedEntitySetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTrustedEntitySetAsync(array{
 *     DetectorId?: string,
 *     Name?: string,
 *     Format?: 'ALIEN_VAULT'|'FIRE_EYE'|'OTX_CSV'|'PROOF_POINT'|'STIX'|'TXT',
 *     Location?: string,
 *     ExpectedBucketOwner?: string,
 *     Activate?: bool,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result declineInvitations(array $args = [])
 * @phpstan-method \Aws\Result declineInvitations(array{AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise declineInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise declineInvitationsAsync(array{AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteDetector(array $args = [])
 * @phpstan-method \Aws\Result deleteDetector(array{DetectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDetectorAsync(array{DetectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteFilter(array $args = [])
 * @phpstan-method \Aws\Result deleteFilter(array{DetectorId?: string, FilterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFilterAsync(array{DetectorId?: string, FilterName?: string, ...} $args = [])
 * @method \Aws\Result deleteIPSet(array $args = [])
 * @phpstan-method \Aws\Result deleteIPSet(array{DetectorId?: string, IpSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIPSetAsync(array{DetectorId?: string, IpSetId?: string, ...} $args = [])
 * @method \Aws\Result deleteInvitations(array $args = [])
 * @phpstan-method \Aws\Result deleteInvitations(array{AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInvitationsAsync(array{AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteMalwareProtectionPlan(array $args = [])
 * @phpstan-method \Aws\Result deleteMalwareProtectionPlan(array{MalwareProtectionPlanId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMalwareProtectionPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMalwareProtectionPlanAsync(array{MalwareProtectionPlanId?: string, ...} $args = [])
 * @method \Aws\Result deleteMembers(array $args = [])
 * @phpstan-method \Aws\Result deleteMembers(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMembersAsync(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result deletePublishingDestination(array $args = [])
 * @phpstan-method \Aws\Result deletePublishingDestination(array{DetectorId?: string, DestinationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePublishingDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePublishingDestinationAsync(array{DetectorId?: string, DestinationId?: string, ...} $args = [])
 * @method \Aws\Result deleteThreatEntitySet(array $args = [])
 * @phpstan-method \Aws\Result deleteThreatEntitySet(array{DetectorId?: string, ThreatEntitySetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteThreatEntitySetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteThreatEntitySetAsync(array{DetectorId?: string, ThreatEntitySetId?: string, ...} $args = [])
 * @method \Aws\Result deleteThreatIntelSet(array $args = [])
 * @phpstan-method \Aws\Result deleteThreatIntelSet(array{DetectorId?: string, ThreatIntelSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteThreatIntelSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteThreatIntelSetAsync(array{DetectorId?: string, ThreatIntelSetId?: string, ...} $args = [])
 * @method \Aws\Result deleteTrustedEntitySet(array $args = [])
 * @phpstan-method \Aws\Result deleteTrustedEntitySet(array{DetectorId?: string, TrustedEntitySetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTrustedEntitySetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTrustedEntitySetAsync(array{DetectorId?: string, TrustedEntitySetId?: string, ...} $args = [])
 * @method \Aws\Result describeMalwareScans(array $args = [])
 * @phpstan-method \Aws\Result describeMalwareScans(array{
 *     DetectorId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     FilterCriteria?: array{FilterCriterion?: list<array>, ...},
 *     SortCriteria?: array{AttributeName?: string, OrderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMalwareScansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMalwareScansAsync(array{
 *     DetectorId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     FilterCriteria?: array{FilterCriterion?: list<array>, ...},
 *     SortCriteria?: array{AttributeName?: string, OrderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeOrganizationConfiguration(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result describePublishingDestination(array $args = [])
 * @phpstan-method \Aws\Result describePublishingDestination(array{DetectorId?: string, DestinationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePublishingDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePublishingDestinationAsync(array{DetectorId?: string, DestinationId?: string, ...} $args = [])
 * @method \Aws\Result disableOrganizationAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result disableOrganizationAdminAccount(array{AdminAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableOrganizationAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableOrganizationAdminAccountAsync(array{AdminAccountId?: string, ...} $args = [])
 * @method \Aws\Result disassociateFromAdministratorAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateFromAdministratorAccount(array{DetectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFromAdministratorAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFromAdministratorAccountAsync(array{DetectorId?: string, ...} $args = [])
 * @method \Aws\Result disassociateFromMasterAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateFromMasterAccount(array{DetectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFromMasterAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFromMasterAccountAsync(array{DetectorId?: string, ...} $args = [])
 * @method \Aws\Result disassociateMembers(array $args = [])
 * @phpstan-method \Aws\Result disassociateMembers(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMembersAsync(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result enableOrganizationAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result enableOrganizationAdminAccount(array{AdminAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableOrganizationAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableOrganizationAdminAccountAsync(array{AdminAccountId?: string, ...} $args = [])
 * @method \Aws\Result getAdministratorAccount(array $args = [])
 * @phpstan-method \Aws\Result getAdministratorAccount(array{DetectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdministratorAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAdministratorAccountAsync(array{DetectorId?: string, ...} $args = [])
 * @method \Aws\Result getCoverageStatistics(array $args = [])
 * @phpstan-method \Aws\Result getCoverageStatistics(array{
 *     DetectorId?: string,
 *     FilterCriteria?: array{FilterCriterion?: list<array>, ...},
 *     StatisticsType?: list<'COUNT_BY_COVERAGE_STATUS'|'COUNT_BY_RESOURCE_TYPE'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getCoverageStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCoverageStatisticsAsync(array{
 *     DetectorId?: string,
 *     FilterCriteria?: array{FilterCriterion?: list<array>, ...},
 *     StatisticsType?: list<'COUNT_BY_COVERAGE_STATUS'|'COUNT_BY_RESOURCE_TYPE'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getDetector(array $args = [])
 * @phpstan-method \Aws\Result getDetector(array{DetectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDetectorAsync(array{DetectorId?: string, ...} $args = [])
 * @method \Aws\Result getFilter(array $args = [])
 * @phpstan-method \Aws\Result getFilter(array{DetectorId?: string, FilterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFilterAsync(array{DetectorId?: string, FilterName?: string, ...} $args = [])
 * @method \Aws\Result getFindings(array $args = [])
 * @phpstan-method \Aws\Result getFindings(array{
 *     DetectorId?: string,
 *     FindingIds?: list<string>,
 *     SortCriteria?: array{AttributeName?: string, OrderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsAsync(array{
 *     DetectorId?: string,
 *     FindingIds?: list<string>,
 *     SortCriteria?: array{AttributeName?: string, OrderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFindingsStatistics(array $args = [])
 * @phpstan-method \Aws\Result getFindingsStatistics(array{
 *     DetectorId?: string,
 *     FindingStatisticTypes?: list<'COUNT_BY_SEVERITY'>,
 *     FindingCriteria?: array{Criterion?: array<string, array>, ...},
 *     GroupBy?: 'ACCOUNT'|'DATE'|'FINDING_TYPE'|'RESOURCE'|'SEVERITY',
 *     OrderBy?: 'ASC'|'DESC',
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsStatisticsAsync(array{
 *     DetectorId?: string,
 *     FindingStatisticTypes?: list<'COUNT_BY_SEVERITY'>,
 *     FindingCriteria?: array{Criterion?: array<string, array>, ...},
 *     GroupBy?: 'ACCOUNT'|'DATE'|'FINDING_TYPE'|'RESOURCE'|'SEVERITY',
 *     OrderBy?: 'ASC'|'DESC',
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getIPSet(array $args = [])
 * @phpstan-method \Aws\Result getIPSet(array{DetectorId?: string, IpSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIPSetAsync(array{DetectorId?: string, IpSetId?: string, ...} $args = [])
 * @method \Aws\Result getInvestigation(array $args = [])
 * @phpstan-method \Aws\Result getInvestigation(array{DetectorId?: string, InvestigationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvestigationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvestigationAsync(array{DetectorId?: string, InvestigationId?: string, ...} $args = [])
 * @method \Aws\Result getInvitationsCount(array $args = [])
 * @phpstan-method \Aws\Result getInvitationsCount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvitationsCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvitationsCountAsync(array{...} $args = [])
 * @method \Aws\Result getMalwareProtectionPlan(array $args = [])
 * @phpstan-method \Aws\Result getMalwareProtectionPlan(array{MalwareProtectionPlanId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMalwareProtectionPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMalwareProtectionPlanAsync(array{MalwareProtectionPlanId?: string, ...} $args = [])
 * @method \Aws\Result getMalwareScan(array $args = [])
 * @phpstan-method \Aws\Result getMalwareScan(array{ScanId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMalwareScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMalwareScanAsync(array{ScanId?: string, ...} $args = [])
 * @method \Aws\Result getMalwareScanSettings(array $args = [])
 * @phpstan-method \Aws\Result getMalwareScanSettings(array{DetectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMalwareScanSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMalwareScanSettingsAsync(array{DetectorId?: string, ...} $args = [])
 * @method \Aws\Result getMasterAccount(array $args = [])
 * @phpstan-method \Aws\Result getMasterAccount(array{DetectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMasterAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMasterAccountAsync(array{DetectorId?: string, ...} $args = [])
 * @method \Aws\Result getMemberDetectors(array $args = [])
 * @phpstan-method \Aws\Result getMemberDetectors(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMemberDetectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMemberDetectorsAsync(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result getMembers(array $args = [])
 * @phpstan-method \Aws\Result getMembers(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMembersAsync(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result getOrganizationStatistics(array $args = [])
 * @phpstan-method \Aws\Result getOrganizationStatistics(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOrganizationStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOrganizationStatisticsAsync(array{...} $args = [])
 * @method \Aws\Result getRemainingFreeTrialDays(array $args = [])
 * @phpstan-method \Aws\Result getRemainingFreeTrialDays(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRemainingFreeTrialDaysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRemainingFreeTrialDaysAsync(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result getThreatEntitySet(array $args = [])
 * @phpstan-method \Aws\Result getThreatEntitySet(array{DetectorId?: string, ThreatEntitySetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getThreatEntitySetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getThreatEntitySetAsync(array{DetectorId?: string, ThreatEntitySetId?: string, ...} $args = [])
 * @method \Aws\Result getThreatIntelSet(array $args = [])
 * @phpstan-method \Aws\Result getThreatIntelSet(array{DetectorId?: string, ThreatIntelSetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getThreatIntelSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getThreatIntelSetAsync(array{DetectorId?: string, ThreatIntelSetId?: string, ...} $args = [])
 * @method \Aws\Result getTrustedEntitySet(array $args = [])
 * @phpstan-method \Aws\Result getTrustedEntitySet(array{DetectorId?: string, TrustedEntitySetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTrustedEntitySetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTrustedEntitySetAsync(array{DetectorId?: string, TrustedEntitySetId?: string, ...} $args = [])
 * @method \Aws\Result getUsageStatistics(array $args = [])
 * @phpstan-method \Aws\Result getUsageStatistics(array{
 *     DetectorId?: string,
 *     UsageStatisticType?: 'SUM_BY_ACCOUNT'|'SUM_BY_DATA_SOURCE'|'SUM_BY_FEATURES'|'SUM_BY_RESOURCE'|'TOP_ACCOUNTS_BY_FEATURE'|'TOP_RESOURCES',
 *     UsageCriteria?: array{
 *         AccountIds?: list<string>,
 *         DataSources?: list<'CLOUD_TRAIL'|'DNS_LOGS'|'EC2_MALWARE_SCAN'|'FLOW_LOGS'|'KUBERNETES_AUDIT_LOGS'|'S3_LOGS'>,
 *         Resources?: list<string>,
 *         Features?: list<'AI_PROTECTION'|'CLOUD_TRAIL'|'DNS_LOGS'|'EBS_MALWARE_PROTECTION'|'EC2_RUNTIME_MONITORING'|'EKS_AUDIT_LOGS'|'EKS_RUNTIME_MONITORING'|'FARGATE_RUNTIME_MONITORING'|'FLOW_LOGS'|'LAMBDA_NETWORK_LOGS'|'RDS_DBI_PROTECTION_PROVISIONED'|'RDS_DBI_PROTECTION_SERVERLESS'|'RDS_LOGIN_EVENTS'|'S3_DATA_EVENTS'>,
 *         ...,
 *     },
 *     Unit?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsageStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsageStatisticsAsync(array{
 *     DetectorId?: string,
 *     UsageStatisticType?: 'SUM_BY_ACCOUNT'|'SUM_BY_DATA_SOURCE'|'SUM_BY_FEATURES'|'SUM_BY_RESOURCE'|'TOP_ACCOUNTS_BY_FEATURE'|'TOP_RESOURCES',
 *     UsageCriteria?: array{
 *         AccountIds?: list<string>,
 *         DataSources?: list<'CLOUD_TRAIL'|'DNS_LOGS'|'EC2_MALWARE_SCAN'|'FLOW_LOGS'|'KUBERNETES_AUDIT_LOGS'|'S3_LOGS'>,
 *         Resources?: list<string>,
 *         Features?: list<'AI_PROTECTION'|'CLOUD_TRAIL'|'DNS_LOGS'|'EBS_MALWARE_PROTECTION'|'EC2_RUNTIME_MONITORING'|'EKS_AUDIT_LOGS'|'EKS_RUNTIME_MONITORING'|'FARGATE_RUNTIME_MONITORING'|'FLOW_LOGS'|'LAMBDA_NETWORK_LOGS'|'RDS_DBI_PROTECTION_PROVISIONED'|'RDS_DBI_PROTECTION_SERVERLESS'|'RDS_LOGIN_EVENTS'|'S3_DATA_EVENTS'>,
 *         ...,
 *     },
 *     Unit?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result inviteMembers(array $args = [])
 * @phpstan-method \Aws\Result inviteMembers(array{DetectorId?: string, AccountIds?: list<string>, DisableEmailNotification?: bool, Message?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise inviteMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise inviteMembersAsync(array{DetectorId?: string, AccountIds?: list<string>, DisableEmailNotification?: bool, Message?: string, ...} $args = [])
 * @method \Aws\Result listCoverage(array $args = [])
 * @phpstan-method \Aws\Result listCoverage(array{
 *     DetectorId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     FilterCriteria?: array{FilterCriterion?: list<array>, ...},
 *     SortCriteria?: array{
 *         AttributeName?: 'ACCOUNT_ID'|'ADDON_VERSION'|'CLUSTER_NAME'|'COVERAGE_STATUS'|'ECS_CLUSTER_NAME'|'EKS_CLUSTER_NAME'|'INSTANCE_ID'|'ISSUE'|'UPDATED_AT',
 *         OrderBy?: 'ASC'|'DESC',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCoverageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCoverageAsync(array{
 *     DetectorId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     FilterCriteria?: array{FilterCriterion?: list<array>, ...},
 *     SortCriteria?: array{
 *         AttributeName?: 'ACCOUNT_ID'|'ADDON_VERSION'|'CLUSTER_NAME'|'COVERAGE_STATUS'|'ECS_CLUSTER_NAME'|'EKS_CLUSTER_NAME'|'INSTANCE_ID'|'ISSUE'|'UPDATED_AT',
 *         OrderBy?: 'ASC'|'DESC',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDetectors(array $args = [])
 * @phpstan-method \Aws\Result listDetectors(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDetectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDetectorsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFilters(array $args = [])
 * @phpstan-method \Aws\Result listFilters(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFiltersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFiltersAsync(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listFindings(array $args = [])
 * @phpstan-method \Aws\Result listFindings(array{
 *     DetectorId?: string,
 *     FindingCriteria?: array{Criterion?: array<string, array>, ...},
 *     SortCriteria?: array{AttributeName?: string, OrderBy?: 'ASC'|'DESC', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingsAsync(array{
 *     DetectorId?: string,
 *     FindingCriteria?: array{Criterion?: array<string, array>, ...},
 *     SortCriteria?: array{AttributeName?: string, OrderBy?: 'ASC'|'DESC', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listIPSets(array $args = [])
 * @phpstan-method \Aws\Result listIPSets(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIPSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIPSetsAsync(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listInvestigations(array $args = [])
 * @phpstan-method \Aws\Result listInvestigations(array{
 *     DetectorId?: string,
 *     SortCriteria?: array{AttributeName?: 'CONFIDENCE'|'END_TIME'|'RISK_LEVEL'|'START_TIME'|'STATUS', OrderBy?: 'ASC'|'DESC', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvestigationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvestigationsAsync(array{
 *     DetectorId?: string,
 *     SortCriteria?: array{AttributeName?: 'CONFIDENCE'|'END_TIME'|'RISK_LEVEL'|'START_TIME'|'STATUS', OrderBy?: 'ASC'|'DESC', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInvitations(array $args = [])
 * @phpstan-method \Aws\Result listInvitations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvitationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listMalwareProtectionPlans(array $args = [])
 * @phpstan-method \Aws\Result listMalwareProtectionPlans(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMalwareProtectionPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMalwareProtectionPlansAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result listMalwareScans(array $args = [])
 * @phpstan-method \Aws\Result listMalwareScans(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     FilterCriteria?: array{ListMalwareScansFilterCriterion?: list<array>, ...},
 *     SortCriteria?: array{AttributeName?: string, OrderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMalwareScansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMalwareScansAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     FilterCriteria?: array{ListMalwareScansFilterCriterion?: list<array>, ...},
 *     SortCriteria?: array{AttributeName?: string, OrderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMembers(array $args = [])
 * @phpstan-method \Aws\Result listMembers(array{DetectorId?: string, MaxResults?: int, NextToken?: string, OnlyAssociated?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMembersAsync(array{DetectorId?: string, MaxResults?: int, NextToken?: string, OnlyAssociated?: string, ...} $args = [])
 * @method \Aws\Result listOrganizationAdminAccounts(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationAdminAccounts(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationAdminAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationAdminAccountsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listPublishingDestinations(array $args = [])
 * @phpstan-method \Aws\Result listPublishingDestinations(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPublishingDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPublishingDestinationsAsync(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result listThreatEntitySets(array $args = [])
 * @phpstan-method \Aws\Result listThreatEntitySets(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThreatEntitySetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThreatEntitySetsAsync(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listThreatIntelSets(array $args = [])
 * @phpstan-method \Aws\Result listThreatIntelSets(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThreatIntelSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThreatIntelSetsAsync(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTrustedEntitySets(array $args = [])
 * @phpstan-method \Aws\Result listTrustedEntitySets(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTrustedEntitySetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTrustedEntitySetsAsync(array{DetectorId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result sendObjectMalwareScan(array $args = [])
 * @phpstan-method \Aws\Result sendObjectMalwareScan(array{S3Object?: array{Bucket?: string, Key?: string, VersionId?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendObjectMalwareScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendObjectMalwareScanAsync(array{S3Object?: array{Bucket?: string, Key?: string, VersionId?: string, ...}, ...} $args = [])
 * @method \Aws\Result startMalwareScan(array $args = [])
 * @phpstan-method \Aws\Result startMalwareScan(array{
 *     ResourceArn?: string,
 *     ClientToken?: string,
 *     ScanConfiguration?: array{
 *         Role?: string,
 *         IncrementalScanDetails?: array{BaselineResourceArn?: string, ...},
 *         RecoveryPoint?: array{BackupVaultName?: string, ContinuousScanDetails?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startMalwareScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMalwareScanAsync(array{
 *     ResourceArn?: string,
 *     ClientToken?: string,
 *     ScanConfiguration?: array{
 *         Role?: string,
 *         IncrementalScanDetails?: array{BaselineResourceArn?: string, ...},
 *         RecoveryPoint?: array{BackupVaultName?: string, ContinuousScanDetails?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMonitoringMembers(array $args = [])
 * @phpstan-method \Aws\Result startMonitoringMembers(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMonitoringMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMonitoringMembersAsync(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result stopMonitoringMembers(array $args = [])
 * @phpstan-method \Aws\Result stopMonitoringMembers(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopMonitoringMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopMonitoringMembersAsync(array{DetectorId?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result unarchiveFindings(array $args = [])
 * @phpstan-method \Aws\Result unarchiveFindings(array{DetectorId?: string, FindingIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise unarchiveFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise unarchiveFindingsAsync(array{DetectorId?: string, FindingIds?: list<string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDetector(array $args = [])
 * @phpstan-method \Aws\Result updateDetector(array{
 *     DetectorId?: string,
 *     Enable?: bool,
 *     FindingPublishingFrequency?: 'FIFTEEN_MINUTES'|'ONE_HOUR'|'SIX_HOURS',
 *     DataSources?: array{
 *         S3Logs?: array{Enable?: bool, ...},
 *         Kubernetes?: array{AuditLogs?: array, ...},
 *         MalwareProtection?: array{ScanEc2InstanceWithFindings?: array, ...},
 *         ...,
 *     },
 *     Features?: list<array{
 *         Name?: 'AI_ANALYST'|'AI_PROTECTION'|'EBS_MALWARE_PROTECTION'|'EKS_AUDIT_LOGS'|'EKS_RUNTIME_MONITORING'|'LAMBDA_NETWORK_LOGS'|'RDS_LOGIN_EVENTS'|'RUNTIME_MONITORING'|'S3_DATA_EVENTS',
 *         Status?: 'DISABLED'|'ENABLED',
 *         AdditionalConfiguration?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDetectorAsync(array{
 *     DetectorId?: string,
 *     Enable?: bool,
 *     FindingPublishingFrequency?: 'FIFTEEN_MINUTES'|'ONE_HOUR'|'SIX_HOURS',
 *     DataSources?: array{
 *         S3Logs?: array{Enable?: bool, ...},
 *         Kubernetes?: array{AuditLogs?: array, ...},
 *         MalwareProtection?: array{ScanEc2InstanceWithFindings?: array, ...},
 *         ...,
 *     },
 *     Features?: list<array{
 *         Name?: 'AI_ANALYST'|'AI_PROTECTION'|'EBS_MALWARE_PROTECTION'|'EKS_AUDIT_LOGS'|'EKS_RUNTIME_MONITORING'|'LAMBDA_NETWORK_LOGS'|'RDS_LOGIN_EVENTS'|'RUNTIME_MONITORING'|'S3_DATA_EVENTS',
 *         Status?: 'DISABLED'|'ENABLED',
 *         AdditionalConfiguration?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFilter(array $args = [])
 * @phpstan-method \Aws\Result updateFilter(array{
 *     DetectorId?: string,
 *     FilterName?: string,
 *     Description?: string,
 *     Action?: 'ARCHIVE'|'NOOP',
 *     Rank?: int,
 *     FindingCriteria?: array{Criterion?: array<string, array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFilterAsync(array{
 *     DetectorId?: string,
 *     FilterName?: string,
 *     Description?: string,
 *     Action?: 'ARCHIVE'|'NOOP',
 *     Rank?: int,
 *     FindingCriteria?: array{Criterion?: array<string, array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFindingsFeedback(array $args = [])
 * @phpstan-method \Aws\Result updateFindingsFeedback(array{
 *     DetectorId?: string,
 *     FindingIds?: list<string>,
 *     Feedback?: 'NOT_USEFUL'|'USEFUL',
 *     Comments?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFindingsFeedbackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFindingsFeedbackAsync(array{
 *     DetectorId?: string,
 *     FindingIds?: list<string>,
 *     Feedback?: 'NOT_USEFUL'|'USEFUL',
 *     Comments?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIPSet(array $args = [])
 * @phpstan-method \Aws\Result updateIPSet(array{
 *     DetectorId?: string,
 *     IpSetId?: string,
 *     Name?: string,
 *     Location?: string,
 *     Activate?: bool,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIPSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIPSetAsync(array{
 *     DetectorId?: string,
 *     IpSetId?: string,
 *     Name?: string,
 *     Location?: string,
 *     Activate?: bool,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMalwareProtectionPlan(array $args = [])
 * @phpstan-method \Aws\Result updateMalwareProtectionPlan(array{
 *     MalwareProtectionPlanId?: string,
 *     Role?: string,
 *     Actions?: array{Tagging?: array{Status?: 'DISABLED'|'ENABLED', ...}, ...},
 *     ProtectedResource?: array{S3Bucket?: array{ObjectPrefixes?: list<string>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMalwareProtectionPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMalwareProtectionPlanAsync(array{
 *     MalwareProtectionPlanId?: string,
 *     Role?: string,
 *     Actions?: array{Tagging?: array{Status?: 'DISABLED'|'ENABLED', ...}, ...},
 *     ProtectedResource?: array{S3Bucket?: array{ObjectPrefixes?: list<string>, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMalwareScanSettings(array $args = [])
 * @phpstan-method \Aws\Result updateMalwareScanSettings(array{
 *     DetectorId?: string,
 *     ScanResourceCriteria?: array{Include?: array<string, array>, Exclude?: array<string, array>, ...},
 *     EbsSnapshotPreservation?: 'NO_RETENTION'|'RETENTION_WITH_FINDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMalwareScanSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMalwareScanSettingsAsync(array{
 *     DetectorId?: string,
 *     ScanResourceCriteria?: array{Include?: array<string, array>, Exclude?: array<string, array>, ...},
 *     EbsSnapshotPreservation?: 'NO_RETENTION'|'RETENTION_WITH_FINDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMemberDetectors(array $args = [])
 * @phpstan-method \Aws\Result updateMemberDetectors(array{
 *     DetectorId?: string,
 *     AccountIds?: list<string>,
 *     DataSources?: array{
 *         S3Logs?: array{Enable?: bool, ...},
 *         Kubernetes?: array{AuditLogs?: array, ...},
 *         MalwareProtection?: array{ScanEc2InstanceWithFindings?: array, ...},
 *         ...,
 *     },
 *     Features?: list<array{
 *         Name?: 'AI_PROTECTION'|'EBS_MALWARE_PROTECTION'|'EKS_AUDIT_LOGS'|'EKS_RUNTIME_MONITORING'|'LAMBDA_NETWORK_LOGS'|'RDS_LOGIN_EVENTS'|'RUNTIME_MONITORING'|'S3_DATA_EVENTS',
 *         Status?: 'DISABLED'|'ENABLED',
 *         AdditionalConfiguration?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMemberDetectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMemberDetectorsAsync(array{
 *     DetectorId?: string,
 *     AccountIds?: list<string>,
 *     DataSources?: array{
 *         S3Logs?: array{Enable?: bool, ...},
 *         Kubernetes?: array{AuditLogs?: array, ...},
 *         MalwareProtection?: array{ScanEc2InstanceWithFindings?: array, ...},
 *         ...,
 *     },
 *     Features?: list<array{
 *         Name?: 'AI_PROTECTION'|'EBS_MALWARE_PROTECTION'|'EKS_AUDIT_LOGS'|'EKS_RUNTIME_MONITORING'|'LAMBDA_NETWORK_LOGS'|'RDS_LOGIN_EVENTS'|'RUNTIME_MONITORING'|'S3_DATA_EVENTS',
 *         Status?: 'DISABLED'|'ENABLED',
 *         AdditionalConfiguration?: list<array>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateOrganizationConfiguration(array{
 *     DetectorId?: string,
 *     AutoEnable?: bool,
 *     DataSources?: array{
 *         S3Logs?: array{AutoEnable?: bool, ...},
 *         Kubernetes?: array{AuditLogs?: array, ...},
 *         MalwareProtection?: array{ScanEc2InstanceWithFindings?: array, ...},
 *         ...,
 *     },
 *     Features?: list<array{
 *         Name?: 'AI_PROTECTION'|'EBS_MALWARE_PROTECTION'|'EKS_AUDIT_LOGS'|'EKS_RUNTIME_MONITORING'|'LAMBDA_NETWORK_LOGS'|'RDS_LOGIN_EVENTS'|'RUNTIME_MONITORING'|'S3_DATA_EVENTS',
 *         AutoEnable?: 'ALL'|'NEW'|'NONE',
 *         AdditionalConfiguration?: list<array>,
 *         ...,
 *     }>,
 *     AutoEnableOrganizationMembers?: 'ALL'|'NEW'|'NONE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array{
 *     DetectorId?: string,
 *     AutoEnable?: bool,
 *     DataSources?: array{
 *         S3Logs?: array{AutoEnable?: bool, ...},
 *         Kubernetes?: array{AuditLogs?: array, ...},
 *         MalwareProtection?: array{ScanEc2InstanceWithFindings?: array, ...},
 *         ...,
 *     },
 *     Features?: list<array{
 *         Name?: 'AI_PROTECTION'|'EBS_MALWARE_PROTECTION'|'EKS_AUDIT_LOGS'|'EKS_RUNTIME_MONITORING'|'LAMBDA_NETWORK_LOGS'|'RDS_LOGIN_EVENTS'|'RUNTIME_MONITORING'|'S3_DATA_EVENTS',
 *         AutoEnable?: 'ALL'|'NEW'|'NONE',
 *         AdditionalConfiguration?: list<array>,
 *         ...,
 *     }>,
 *     AutoEnableOrganizationMembers?: 'ALL'|'NEW'|'NONE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePublishingDestination(array $args = [])
 * @phpstan-method \Aws\Result updatePublishingDestination(array{
 *     DetectorId?: string,
 *     DestinationId?: string,
 *     DestinationProperties?: array{DestinationArn?: string, KmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePublishingDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePublishingDestinationAsync(array{
 *     DetectorId?: string,
 *     DestinationId?: string,
 *     DestinationProperties?: array{DestinationArn?: string, KmsKeyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateThreatEntitySet(array $args = [])
 * @phpstan-method \Aws\Result updateThreatEntitySet(array{
 *     DetectorId?: string,
 *     ThreatEntitySetId?: string,
 *     Name?: string,
 *     Location?: string,
 *     ExpectedBucketOwner?: string,
 *     Activate?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThreatEntitySetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThreatEntitySetAsync(array{
 *     DetectorId?: string,
 *     ThreatEntitySetId?: string,
 *     Name?: string,
 *     Location?: string,
 *     ExpectedBucketOwner?: string,
 *     Activate?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateThreatIntelSet(array $args = [])
 * @phpstan-method \Aws\Result updateThreatIntelSet(array{
 *     DetectorId?: string,
 *     ThreatIntelSetId?: string,
 *     Name?: string,
 *     Location?: string,
 *     Activate?: bool,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThreatIntelSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThreatIntelSetAsync(array{
 *     DetectorId?: string,
 *     ThreatIntelSetId?: string,
 *     Name?: string,
 *     Location?: string,
 *     Activate?: bool,
 *     ExpectedBucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTrustedEntitySet(array $args = [])
 * @phpstan-method \Aws\Result updateTrustedEntitySet(array{
 *     DetectorId?: string,
 *     TrustedEntitySetId?: string,
 *     Name?: string,
 *     Location?: string,
 *     ExpectedBucketOwner?: string,
 *     Activate?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTrustedEntitySetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTrustedEntitySetAsync(array{
 *     DetectorId?: string,
 *     TrustedEntitySetId?: string,
 *     Name?: string,
 *     Location?: string,
 *     ExpectedBucketOwner?: string,
 *     Activate?: bool,
 *     ...,
 * } $args = [])
 */
class GuardDutyClient extends AwsClient {}
