<?php
namespace Aws\Macie2;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Macie 2** service.
 * @method \Aws\Result acceptInvitation(array $args = [])
 * @phpstan-method \Aws\Result acceptInvitation(array{administratorAccountId?: string, invitationId?: string, masterAccount?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptInvitationAsync(array{administratorAccountId?: string, invitationId?: string, masterAccount?: string, ...} $args = [])
 * @method \Aws\Result batchGetCustomDataIdentifiers(array $args = [])
 * @phpstan-method \Aws\Result batchGetCustomDataIdentifiers(array{ids?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCustomDataIdentifiersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCustomDataIdentifiersAsync(array{ids?: list<string>, ...} $args = [])
 * @method \Aws\Result batchUpdateAutomatedDiscoveryAccounts(array $args = [])
 * @phpstan-method \Aws\Result batchUpdateAutomatedDiscoveryAccounts(array{accounts?: list<array{accountId?: string, status?: 'DISABLED'|'ENABLED', ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateAutomatedDiscoveryAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdateAutomatedDiscoveryAccountsAsync(array{accounts?: list<array{accountId?: string, status?: 'DISABLED'|'ENABLED', ...}>, ...} $args = [])
 * @method \Aws\Result createAllowList(array $args = [])
 * @phpstan-method \Aws\Result createAllowList(array{
 *     clientToken?: string,
 *     criteria?: array{regex?: string, s3WordsList?: array{bucketName?: string, objectKey?: string, ...}, ...},
 *     description?: string,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAllowListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAllowListAsync(array{
 *     clientToken?: string,
 *     criteria?: array{regex?: string, s3WordsList?: array{bucketName?: string, objectKey?: string, ...}, ...},
 *     description?: string,
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createClassificationJob(array $args = [])
 * @phpstan-method \Aws\Result createClassificationJob(array{
 *     allowListIds?: list<string>,
 *     clientToken?: string,
 *     customDataIdentifierIds?: list<string>,
 *     description?: string,
 *     initialRun?: bool,
 *     jobType?: 'ONE_TIME'|'SCHEDULED',
 *     managedDataIdentifierIds?: list<string>,
 *     managedDataIdentifierSelector?: 'ALL'|'EXCLUDE'|'INCLUDE'|'NONE'|'RECOMMENDED',
 *     name?: string,
 *     s3JobDefinition?: array{
 *         bucketCriteria?: array{excludes?: array, includes?: array, ...},
 *         bucketDefinitions?: list<array>,
 *         scoping?: array{excludes?: array, includes?: array, ...},
 *         ...,
 *     },
 *     samplingPercentage?: int,
 *     scheduleFrequency?: array{
 *         dailySchedule?: array,
 *         monthlySchedule?: array{dayOfMonth?: int, ...},
 *         weeklySchedule?: array{dayOfWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY', ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClassificationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClassificationJobAsync(array{
 *     allowListIds?: list<string>,
 *     clientToken?: string,
 *     customDataIdentifierIds?: list<string>,
 *     description?: string,
 *     initialRun?: bool,
 *     jobType?: 'ONE_TIME'|'SCHEDULED',
 *     managedDataIdentifierIds?: list<string>,
 *     managedDataIdentifierSelector?: 'ALL'|'EXCLUDE'|'INCLUDE'|'NONE'|'RECOMMENDED',
 *     name?: string,
 *     s3JobDefinition?: array{
 *         bucketCriteria?: array{excludes?: array, includes?: array, ...},
 *         bucketDefinitions?: list<array>,
 *         scoping?: array{excludes?: array, includes?: array, ...},
 *         ...,
 *     },
 *     samplingPercentage?: int,
 *     scheduleFrequency?: array{
 *         dailySchedule?: array,
 *         monthlySchedule?: array{dayOfMonth?: int, ...},
 *         weeklySchedule?: array{dayOfWeek?: 'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY', ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomDataIdentifier(array $args = [])
 * @phpstan-method \Aws\Result createCustomDataIdentifier(array{
 *     clientToken?: string,
 *     description?: string,
 *     ignoreWords?: list<string>,
 *     keywords?: list<string>,
 *     maximumMatchDistance?: int,
 *     name?: string,
 *     regex?: string,
 *     severityLevels?: list<array{occurrencesThreshold?: int, severity?: 'HIGH'|'LOW'|'MEDIUM', ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomDataIdentifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomDataIdentifierAsync(array{
 *     clientToken?: string,
 *     description?: string,
 *     ignoreWords?: list<string>,
 *     keywords?: list<string>,
 *     maximumMatchDistance?: int,
 *     name?: string,
 *     regex?: string,
 *     severityLevels?: list<array{occurrencesThreshold?: int, severity?: 'HIGH'|'LOW'|'MEDIUM', ...}>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFindingsFilter(array $args = [])
 * @phpstan-method \Aws\Result createFindingsFilter(array{
 *     action?: 'ARCHIVE'|'NOOP',
 *     clientToken?: string,
 *     description?: string,
 *     findingCriteria?: array{criterion?: array<string, array>, ...},
 *     name?: string,
 *     position?: int,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFindingsFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFindingsFilterAsync(array{
 *     action?: 'ARCHIVE'|'NOOP',
 *     clientToken?: string,
 *     description?: string,
 *     findingCriteria?: array{criterion?: array<string, array>, ...},
 *     name?: string,
 *     position?: int,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createInvitations(array $args = [])
 * @phpstan-method \Aws\Result createInvitations(array{accountIds?: list<string>, disableEmailNotification?: bool, message?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInvitationsAsync(array{accountIds?: list<string>, disableEmailNotification?: bool, message?: string, ...} $args = [])
 * @method \Aws\Result createMember(array $args = [])
 * @phpstan-method \Aws\Result createMember(array{account?: array{accountId?: string, email?: string, ...}, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMemberAsync(array{account?: array{accountId?: string, email?: string, ...}, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createSampleFindings(array $args = [])
 * @phpstan-method \Aws\Result createSampleFindings(array{
 *     findingTypes?: list<'Policy:IAMUser/S3BlockPublicAccessDisabled'|'Policy:IAMUser/S3BucketEncryptionDisabled'|'Policy:IAMUser/S3BucketPublic'|'Policy:IAMUser/S3BucketReplicatedExternally'|'Policy:IAMUser/S3BucketSharedExternally'|'Policy:IAMUser/S3BucketSharedWithCloudFront'|'SensitiveData:S3Object/Credentials'|'SensitiveData:S3Object/CustomIdentifier'|'SensitiveData:S3Object/Financial'|'SensitiveData:S3Object/Multiple'|'SensitiveData:S3Object/Personal'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSampleFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSampleFindingsAsync(array{
 *     findingTypes?: list<'Policy:IAMUser/S3BlockPublicAccessDisabled'|'Policy:IAMUser/S3BucketEncryptionDisabled'|'Policy:IAMUser/S3BucketPublic'|'Policy:IAMUser/S3BucketReplicatedExternally'|'Policy:IAMUser/S3BucketSharedExternally'|'Policy:IAMUser/S3BucketSharedWithCloudFront'|'SensitiveData:S3Object/Credentials'|'SensitiveData:S3Object/CustomIdentifier'|'SensitiveData:S3Object/Financial'|'SensitiveData:S3Object/Multiple'|'SensitiveData:S3Object/Personal'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result declineInvitations(array $args = [])
 * @phpstan-method \Aws\Result declineInvitations(array{accountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise declineInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise declineInvitationsAsync(array{accountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteAllowList(array $args = [])
 * @phpstan-method \Aws\Result deleteAllowList(array{id?: string, ignoreJobChecks?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAllowListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAllowListAsync(array{id?: string, ignoreJobChecks?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomDataIdentifier(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomDataIdentifier(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomDataIdentifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomDataIdentifierAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteFindingsFilter(array $args = [])
 * @phpstan-method \Aws\Result deleteFindingsFilter(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFindingsFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFindingsFilterAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteInvitations(array $args = [])
 * @phpstan-method \Aws\Result deleteInvitations(array{accountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInvitationsAsync(array{accountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteMember(array $args = [])
 * @phpstan-method \Aws\Result deleteMember(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMemberAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result describeBuckets(array $args = [])
 * @phpstan-method \Aws\Result describeBuckets(array{
 *     criteria?: array<string, array{eq?: list<string>, gt?: int, gte?: int, lt?: int, lte?: int, neq?: list<string>, prefix?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortCriteria?: array{attributeName?: string, orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBucketsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBucketsAsync(array{
 *     criteria?: array<string, array{eq?: list<string>, gt?: int, gte?: int, lt?: int, lte?: int, neq?: list<string>, prefix?: string, ...}>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortCriteria?: array{attributeName?: string, orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeClassificationJob(array $args = [])
 * @phpstan-method \Aws\Result describeClassificationJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClassificationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClassificationJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result describeOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeOrganizationConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result disableMacie(array $args = [])
 * @phpstan-method \Aws\Result disableMacie(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableMacieAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableMacieAsync(array{...} $args = [])
 * @method \Aws\Result disableOrganizationAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result disableOrganizationAdminAccount(array{adminAccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableOrganizationAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableOrganizationAdminAccountAsync(array{adminAccountId?: string, ...} $args = [])
 * @method \Aws\Result disassociateFromAdministratorAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateFromAdministratorAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFromAdministratorAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFromAdministratorAccountAsync(array{...} $args = [])
 * @method \Aws\Result disassociateFromMasterAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateFromMasterAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateFromMasterAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFromMasterAccountAsync(array{...} $args = [])
 * @method \Aws\Result disassociateMember(array $args = [])
 * @phpstan-method \Aws\Result disassociateMember(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMemberAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result enableMacie(array $args = [])
 * @phpstan-method \Aws\Result enableMacie(array{
 *     clientToken?: string,
 *     findingPublishingFrequency?: 'FIFTEEN_MINUTES'|'ONE_HOUR'|'SIX_HOURS',
 *     status?: 'ENABLED'|'PAUSED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableMacieAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableMacieAsync(array{
 *     clientToken?: string,
 *     findingPublishingFrequency?: 'FIFTEEN_MINUTES'|'ONE_HOUR'|'SIX_HOURS',
 *     status?: 'ENABLED'|'PAUSED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableOrganizationAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result enableOrganizationAdminAccount(array{adminAccountId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableOrganizationAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableOrganizationAdminAccountAsync(array{adminAccountId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getAdministratorAccount(array $args = [])
 * @phpstan-method \Aws\Result getAdministratorAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAdministratorAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAdministratorAccountAsync(array{...} $args = [])
 * @method \Aws\Result getAllowList(array $args = [])
 * @phpstan-method \Aws\Result getAllowList(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAllowListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAllowListAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getAutomatedDiscoveryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getAutomatedDiscoveryConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutomatedDiscoveryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutomatedDiscoveryConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getBucketStatistics(array $args = [])
 * @phpstan-method \Aws\Result getBucketStatistics(array{accountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketStatisticsAsync(array{accountId?: string, ...} $args = [])
 * @method \Aws\Result getClassificationExportConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getClassificationExportConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClassificationExportConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClassificationExportConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getClassificationScope(array $args = [])
 * @phpstan-method \Aws\Result getClassificationScope(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getClassificationScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getClassificationScopeAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getCustomDataIdentifier(array $args = [])
 * @phpstan-method \Aws\Result getCustomDataIdentifier(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCustomDataIdentifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCustomDataIdentifierAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getFindingStatistics(array $args = [])
 * @phpstan-method \Aws\Result getFindingStatistics(array{
 *     findingCriteria?: array{criterion?: array<string, array>, ...},
 *     groupBy?: 'classificationDetails.jobId'|'resourcesAffected.s3Bucket.name'|'severity.description'|'type',
 *     size?: int,
 *     sortCriteria?: array{attributeName?: 'count'|'groupKey', orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingStatisticsAsync(array{
 *     findingCriteria?: array{criterion?: array<string, array>, ...},
 *     groupBy?: 'classificationDetails.jobId'|'resourcesAffected.s3Bucket.name'|'severity.description'|'type',
 *     size?: int,
 *     sortCriteria?: array{attributeName?: 'count'|'groupKey', orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFindings(array $args = [])
 * @phpstan-method \Aws\Result getFindings(array{
 *     findingIds?: list<string>,
 *     sortCriteria?: array{attributeName?: string, orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsAsync(array{
 *     findingIds?: list<string>,
 *     sortCriteria?: array{attributeName?: string, orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getFindingsFilter(array $args = [])
 * @phpstan-method \Aws\Result getFindingsFilter(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsFilterAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getFindingsPublicationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getFindingsPublicationConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getFindingsPublicationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsPublicationConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getInvitationsCount(array $args = [])
 * @phpstan-method \Aws\Result getInvitationsCount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvitationsCountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvitationsCountAsync(array{...} $args = [])
 * @method \Aws\Result getMacieSession(array $args = [])
 * @phpstan-method \Aws\Result getMacieSession(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMacieSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMacieSessionAsync(array{...} $args = [])
 * @method \Aws\Result getMasterAccount(array $args = [])
 * @phpstan-method \Aws\Result getMasterAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMasterAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMasterAccountAsync(array{...} $args = [])
 * @method \Aws\Result getMember(array $args = [])
 * @phpstan-method \Aws\Result getMember(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMemberAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getResourceProfile(array $args = [])
 * @phpstan-method \Aws\Result getResourceProfile(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceProfileAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result getRevealConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getRevealConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRevealConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRevealConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getSensitiveDataOccurrences(array $args = [])
 * @phpstan-method \Aws\Result getSensitiveDataOccurrences(array{findingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSensitiveDataOccurrencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSensitiveDataOccurrencesAsync(array{findingId?: string, ...} $args = [])
 * @method \Aws\Result getSensitiveDataOccurrencesAvailability(array $args = [])
 * @phpstan-method \Aws\Result getSensitiveDataOccurrencesAvailability(array{findingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSensitiveDataOccurrencesAvailabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSensitiveDataOccurrencesAvailabilityAsync(array{findingId?: string, ...} $args = [])
 * @method \Aws\Result getSensitivityInspectionTemplate(array $args = [])
 * @phpstan-method \Aws\Result getSensitivityInspectionTemplate(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSensitivityInspectionTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSensitivityInspectionTemplateAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getUsageStatistics(array $args = [])
 * @phpstan-method \Aws\Result getUsageStatistics(array{
 *     filterBy?: list<array{
 *         comparator?: 'CONTAINS'|'EQ'|'GT'|'GTE'|'LT'|'LTE'|'NE',
 *         key?: 'accountId'|'freeTrialStartDate'|'serviceLimit'|'total',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: array{key?: 'accountId'|'freeTrialStartDate'|'serviceLimitValue'|'total', orderBy?: 'ASC'|'DESC', ...},
 *     timeRange?: 'MONTH_TO_DATE'|'PAST_30_DAYS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsageStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsageStatisticsAsync(array{
 *     filterBy?: list<array{
 *         comparator?: 'CONTAINS'|'EQ'|'GT'|'GTE'|'LT'|'LTE'|'NE',
 *         key?: 'accountId'|'freeTrialStartDate'|'serviceLimit'|'total',
 *         values?: list<string>,
 *         ...,
 *     }>,
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortBy?: array{key?: 'accountId'|'freeTrialStartDate'|'serviceLimitValue'|'total', orderBy?: 'ASC'|'DESC', ...},
 *     timeRange?: 'MONTH_TO_DATE'|'PAST_30_DAYS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result getUsageTotals(array $args = [])
 * @phpstan-method \Aws\Result getUsageTotals(array{timeRange?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getUsageTotalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getUsageTotalsAsync(array{timeRange?: string, ...} $args = [])
 * @method \Aws\Result listAllowLists(array $args = [])
 * @phpstan-method \Aws\Result listAllowLists(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAllowListsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAllowListsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAutomatedDiscoveryAccounts(array $args = [])
 * @phpstan-method \Aws\Result listAutomatedDiscoveryAccounts(array{accountIds?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutomatedDiscoveryAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutomatedDiscoveryAccountsAsync(array{accountIds?: list<string>, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listClassificationJobs(array $args = [])
 * @phpstan-method \Aws\Result listClassificationJobs(array{
 *     filterCriteria?: array{excludes?: list<array>, includes?: list<array>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortCriteria?: array{attributeName?: 'createdAt'|'jobStatus'|'jobType'|'name', orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listClassificationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClassificationJobsAsync(array{
 *     filterCriteria?: array{excludes?: list<array>, includes?: list<array>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortCriteria?: array{attributeName?: 'createdAt'|'jobStatus'|'jobType'|'name', orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listClassificationScopes(array $args = [])
 * @phpstan-method \Aws\Result listClassificationScopes(array{name?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClassificationScopesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClassificationScopesAsync(array{name?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCustomDataIdentifiers(array $args = [])
 * @phpstan-method \Aws\Result listCustomDataIdentifiers(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomDataIdentifiersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomDataIdentifiersAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listFindings(array $args = [])
 * @phpstan-method \Aws\Result listFindings(array{
 *     findingCriteria?: array{criterion?: array<string, array>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortCriteria?: array{attributeName?: string, orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingsAsync(array{
 *     findingCriteria?: array{criterion?: array<string, array>, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortCriteria?: array{attributeName?: string, orderBy?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFindingsFilters(array $args = [])
 * @phpstan-method \Aws\Result listFindingsFilters(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFindingsFiltersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingsFiltersAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listInvitations(array $args = [])
 * @phpstan-method \Aws\Result listInvitations(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvitationsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listManagedDataIdentifiers(array $args = [])
 * @phpstan-method \Aws\Result listManagedDataIdentifiers(array{nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedDataIdentifiersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedDataIdentifiersAsync(array{nextToken?: string, ...} $args = [])
 * @method \Aws\Result listMembers(array $args = [])
 * @phpstan-method \Aws\Result listMembers(array{maxResults?: int, nextToken?: string, onlyAssociated?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMembersAsync(array{maxResults?: int, nextToken?: string, onlyAssociated?: string, ...} $args = [])
 * @method \Aws\Result listOrganizationAdminAccounts(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationAdminAccounts(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationAdminAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationAdminAccountsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listResourceProfileArtifacts(array $args = [])
 * @phpstan-method \Aws\Result listResourceProfileArtifacts(array{nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceProfileArtifactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceProfileArtifactsAsync(array{nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listResourceProfileDetections(array $args = [])
 * @phpstan-method \Aws\Result listResourceProfileDetections(array{maxResults?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceProfileDetectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceProfileDetectionsAsync(array{maxResults?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listSensitivityInspectionTemplates(array $args = [])
 * @phpstan-method \Aws\Result listSensitivityInspectionTemplates(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSensitivityInspectionTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSensitivityInspectionTemplatesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result putClassificationExportConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putClassificationExportConfiguration(array{
 *     configuration?: array{
 *         s3Destination?: array{bucketName?: string, expectedBucketOwner?: string, keyPrefix?: string, kmsKeyArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putClassificationExportConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putClassificationExportConfigurationAsync(array{
 *     configuration?: array{
 *         s3Destination?: array{bucketName?: string, expectedBucketOwner?: string, keyPrefix?: string, kmsKeyArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putFindingsPublicationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putFindingsPublicationConfiguration(array{
 *     clientToken?: string,
 *     securityHubConfiguration?: array{publishClassificationFindings?: bool, publishPolicyFindings?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putFindingsPublicationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFindingsPublicationConfigurationAsync(array{
 *     clientToken?: string,
 *     securityHubConfiguration?: array{publishClassificationFindings?: bool, publishPolicyFindings?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchResources(array $args = [])
 * @phpstan-method \Aws\Result searchResources(array{
 *     bucketCriteria?: array{excludes?: array{and?: list<array>, ...}, includes?: array{and?: list<array>, ...}, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortCriteria?: array{
 *         attributeName?: 'ACCOUNT_ID'|'RESOURCE_NAME'|'S3_CLASSIFIABLE_OBJECT_COUNT'|'S3_CLASSIFIABLE_SIZE_IN_BYTES',
 *         orderBy?: 'ASC'|'DESC',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchResourcesAsync(array{
 *     bucketCriteria?: array{excludes?: array{and?: list<array>, ...}, includes?: array{and?: list<array>, ...}, ...},
 *     maxResults?: int,
 *     nextToken?: string,
 *     sortCriteria?: array{
 *         attributeName?: 'ACCOUNT_ID'|'RESOURCE_NAME'|'S3_CLASSIFIABLE_OBJECT_COUNT'|'S3_CLASSIFIABLE_SIZE_IN_BYTES',
 *         orderBy?: 'ASC'|'DESC',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result testCustomDataIdentifier(array $args = [])
 * @phpstan-method \Aws\Result testCustomDataIdentifier(array{
 *     ignoreWords?: list<string>,
 *     keywords?: list<string>,
 *     maximumMatchDistance?: int,
 *     regex?: string,
 *     sampleText?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testCustomDataIdentifierAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testCustomDataIdentifierAsync(array{
 *     ignoreWords?: list<string>,
 *     keywords?: list<string>,
 *     maximumMatchDistance?: int,
 *     regex?: string,
 *     sampleText?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAllowList(array $args = [])
 * @phpstan-method \Aws\Result updateAllowList(array{
 *     criteria?: array{regex?: string, s3WordsList?: array{bucketName?: string, objectKey?: string, ...}, ...},
 *     description?: string,
 *     id?: string,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAllowListAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAllowListAsync(array{
 *     criteria?: array{regex?: string, s3WordsList?: array{bucketName?: string, objectKey?: string, ...}, ...},
 *     description?: string,
 *     id?: string,
 *     name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAutomatedDiscoveryConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateAutomatedDiscoveryConfiguration(array{autoEnableOrganizationMembers?: 'ALL'|'NEW'|'NONE', status?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutomatedDiscoveryConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutomatedDiscoveryConfigurationAsync(array{autoEnableOrganizationMembers?: 'ALL'|'NEW'|'NONE', status?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result updateClassificationJob(array $args = [])
 * @phpstan-method \Aws\Result updateClassificationJob(array{jobId?: string, jobStatus?: 'CANCELLED'|'COMPLETE'|'IDLE'|'PAUSED'|'RUNNING'|'USER_PAUSED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClassificationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClassificationJobAsync(array{jobId?: string, jobStatus?: 'CANCELLED'|'COMPLETE'|'IDLE'|'PAUSED'|'RUNNING'|'USER_PAUSED', ...} $args = [])
 * @method \Aws\Result updateClassificationScope(array $args = [])
 * @phpstan-method \Aws\Result updateClassificationScope(array{
 *     id?: string,
 *     s3?: array{excludes?: array{bucketNames?: list<string>, operation?: 'ADD'|'REMOVE'|'REPLACE', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClassificationScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClassificationScopeAsync(array{
 *     id?: string,
 *     s3?: array{excludes?: array{bucketNames?: list<string>, operation?: 'ADD'|'REMOVE'|'REPLACE', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateFindingsFilter(array $args = [])
 * @phpstan-method \Aws\Result updateFindingsFilter(array{
 *     action?: 'ARCHIVE'|'NOOP',
 *     clientToken?: string,
 *     description?: string,
 *     findingCriteria?: array{criterion?: array<string, array>, ...},
 *     id?: string,
 *     name?: string,
 *     position?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFindingsFilterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFindingsFilterAsync(array{
 *     action?: 'ARCHIVE'|'NOOP',
 *     clientToken?: string,
 *     description?: string,
 *     findingCriteria?: array{criterion?: array<string, array>, ...},
 *     id?: string,
 *     name?: string,
 *     position?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMacieSession(array $args = [])
 * @phpstan-method \Aws\Result updateMacieSession(array{findingPublishingFrequency?: 'FIFTEEN_MINUTES'|'ONE_HOUR'|'SIX_HOURS', status?: 'ENABLED'|'PAUSED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMacieSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMacieSessionAsync(array{findingPublishingFrequency?: 'FIFTEEN_MINUTES'|'ONE_HOUR'|'SIX_HOURS', status?: 'ENABLED'|'PAUSED', ...} $args = [])
 * @method \Aws\Result updateMemberSession(array $args = [])
 * @phpstan-method \Aws\Result updateMemberSession(array{id?: string, status?: 'ENABLED'|'PAUSED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMemberSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMemberSessionAsync(array{id?: string, status?: 'ENABLED'|'PAUSED', ...} $args = [])
 * @method \Aws\Result updateOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateOrganizationConfiguration(array{autoEnable?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array{autoEnable?: bool, ...} $args = [])
 * @method \Aws\Result updateResourceProfile(array $args = [])
 * @phpstan-method \Aws\Result updateResourceProfile(array{resourceArn?: string, sensitivityScoreOverride?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceProfileAsync(array{resourceArn?: string, sensitivityScoreOverride?: int, ...} $args = [])
 * @method \Aws\Result updateResourceProfileDetections(array $args = [])
 * @phpstan-method \Aws\Result updateResourceProfileDetections(array{
 *     resourceArn?: string,
 *     suppressDataIdentifiers?: list<array{id?: string, type?: 'CUSTOM'|'MANAGED', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateResourceProfileDetectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceProfileDetectionsAsync(array{
 *     resourceArn?: string,
 *     suppressDataIdentifiers?: list<array{id?: string, type?: 'CUSTOM'|'MANAGED', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRevealConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateRevealConfiguration(array{
 *     configuration?: array{kmsKeyId?: string, status?: 'DISABLED'|'ENABLED', ...},
 *     retrievalConfiguration?: array{retrievalMode?: 'ASSUME_ROLE'|'CALLER_CREDENTIALS', roleName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRevealConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRevealConfigurationAsync(array{
 *     configuration?: array{kmsKeyId?: string, status?: 'DISABLED'|'ENABLED', ...},
 *     retrievalConfiguration?: array{retrievalMode?: 'ASSUME_ROLE'|'CALLER_CREDENTIALS', roleName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSensitivityInspectionTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateSensitivityInspectionTemplate(array{
 *     description?: string,
 *     excludes?: array{managedDataIdentifierIds?: list<string>, ...},
 *     id?: string,
 *     includes?: array{
 *         allowListIds?: list<string>,
 *         customDataIdentifierIds?: list<string>,
 *         managedDataIdentifierIds?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSensitivityInspectionTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSensitivityInspectionTemplateAsync(array{
 *     description?: string,
 *     excludes?: array{managedDataIdentifierIds?: list<string>, ...},
 *     id?: string,
 *     includes?: array{
 *         allowListIds?: list<string>,
 *         customDataIdentifierIds?: list<string>,
 *         managedDataIdentifierIds?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class Macie2Client extends AwsClient {}
