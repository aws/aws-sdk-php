<?php
namespace Aws\Detective;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Detective** service.
 * @method \Aws\Result acceptInvitation(array $args = [])
 * @phpstan-method \Aws\Result acceptInvitation(array{GraphArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptInvitationAsync(array{GraphArn?: string, ...} $args = [])
 * @method \Aws\Result batchGetGraphMemberDatasources(array $args = [])
 * @phpstan-method \Aws\Result batchGetGraphMemberDatasources(array{GraphArn?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetGraphMemberDatasourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetGraphMemberDatasourcesAsync(array{GraphArn?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchGetMembershipDatasources(array $args = [])
 * @phpstan-method \Aws\Result batchGetMembershipDatasources(array{GraphArns?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetMembershipDatasourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetMembershipDatasourcesAsync(array{GraphArns?: list<string>, ...} $args = [])
 * @method \Aws\Result createGraph(array $args = [])
 * @phpstan-method \Aws\Result createGraph(array{Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createGraphAsync(array{Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result createMembers(array $args = [])
 * @phpstan-method \Aws\Result createMembers(array{
 *     GraphArn?: string,
 *     Message?: string,
 *     DisableEmailNotification?: bool,
 *     Accounts?: list<array{AccountId?: string, EmailAddress?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMembersAsync(array{
 *     GraphArn?: string,
 *     Message?: string,
 *     DisableEmailNotification?: bool,
 *     Accounts?: list<array{AccountId?: string, EmailAddress?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGraph(array $args = [])
 * @phpstan-method \Aws\Result deleteGraph(array{GraphArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGraphAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGraphAsync(array{GraphArn?: string, ...} $args = [])
 * @method \Aws\Result deleteMembers(array $args = [])
 * @phpstan-method \Aws\Result deleteMembers(array{GraphArn?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMembersAsync(array{GraphArn?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result describeOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeOrganizationConfiguration(array{GraphArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array{GraphArn?: string, ...} $args = [])
 * @method \Aws\Result disableOrganizationAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result disableOrganizationAdminAccount(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableOrganizationAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableOrganizationAdminAccountAsync(array{...} $args = [])
 * @method \Aws\Result disassociateMembership(array $args = [])
 * @phpstan-method \Aws\Result disassociateMembership(array{GraphArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateMembershipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateMembershipAsync(array{GraphArn?: string, ...} $args = [])
 * @method \Aws\Result enableOrganizationAdminAccount(array $args = [])
 * @phpstan-method \Aws\Result enableOrganizationAdminAccount(array{AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableOrganizationAdminAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableOrganizationAdminAccountAsync(array{AccountId?: string, ...} $args = [])
 * @method \Aws\Result getInvestigation(array $args = [])
 * @phpstan-method \Aws\Result getInvestigation(array{GraphArn?: string, InvestigationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvestigationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvestigationAsync(array{GraphArn?: string, InvestigationId?: string, ...} $args = [])
 * @method \Aws\Result getMembers(array $args = [])
 * @phpstan-method \Aws\Result getMembers(array{GraphArn?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMembersAsync(array{GraphArn?: string, AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result listDatasourcePackages(array $args = [])
 * @phpstan-method \Aws\Result listDatasourcePackages(array{GraphArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasourcePackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatasourcePackagesAsync(array{GraphArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listGraphs(array $args = [])
 * @phpstan-method \Aws\Result listGraphs(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listGraphsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listGraphsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listIndicators(array $args = [])
 * @phpstan-method \Aws\Result listIndicators(array{
 *     GraphArn?: string,
 *     InvestigationId?: string,
 *     IndicatorType?: 'FLAGGED_IP_ADDRESS'|'IMPOSSIBLE_TRAVEL'|'NEW_ASO'|'NEW_GEOLOCATION'|'NEW_USER_AGENT'|'RELATED_FINDING'|'RELATED_FINDING_GROUP'|'TTP_OBSERVED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listIndicatorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIndicatorsAsync(array{
 *     GraphArn?: string,
 *     InvestigationId?: string,
 *     IndicatorType?: 'FLAGGED_IP_ADDRESS'|'IMPOSSIBLE_TRAVEL'|'NEW_ASO'|'NEW_GEOLOCATION'|'NEW_USER_AGENT'|'RELATED_FINDING'|'RELATED_FINDING_GROUP'|'TTP_OBSERVED',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInvestigations(array $args = [])
 * @phpstan-method \Aws\Result listInvestigations(array{
 *     GraphArn?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     FilterCriteria?: array{
 *         Severity?: array{Value?: string, ...},
 *         Status?: array{Value?: string, ...},
 *         State?: array{Value?: string, ...},
 *         EntityArn?: array{Value?: string, ...},
 *         CreatedTime?: array{StartInclusive?: int|string|\DateTimeInterface, EndInclusive?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     SortCriteria?: array{Field?: 'CREATED_TIME'|'SEVERITY'|'STATUS', SortOrder?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvestigationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvestigationsAsync(array{
 *     GraphArn?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     FilterCriteria?: array{
 *         Severity?: array{Value?: string, ...},
 *         Status?: array{Value?: string, ...},
 *         State?: array{Value?: string, ...},
 *         EntityArn?: array{Value?: string, ...},
 *         CreatedTime?: array{StartInclusive?: int|string|\DateTimeInterface, EndInclusive?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     SortCriteria?: array{Field?: 'CREATED_TIME'|'SEVERITY'|'STATUS', SortOrder?: 'ASC'|'DESC', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInvitations(array $args = [])
 * @phpstan-method \Aws\Result listInvitations(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvitationsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listMembers(array $args = [])
 * @phpstan-method \Aws\Result listMembers(array{GraphArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMembersAsync(array{GraphArn?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listOrganizationAdminAccounts(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationAdminAccounts(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationAdminAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationAdminAccountsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result rejectInvitation(array $args = [])
 * @phpstan-method \Aws\Result rejectInvitation(array{GraphArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectInvitationAsync(array{GraphArn?: string, ...} $args = [])
 * @method \Aws\Result startInvestigation(array $args = [])
 * @phpstan-method \Aws\Result startInvestigation(array{
 *     GraphArn?: string,
 *     EntityArn?: string,
 *     ScopeStartTime?: int|string|\DateTimeInterface,
 *     ScopeEndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startInvestigationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startInvestigationAsync(array{
 *     GraphArn?: string,
 *     EntityArn?: string,
 *     ScopeStartTime?: int|string|\DateTimeInterface,
 *     ScopeEndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startMonitoringMember(array $args = [])
 * @phpstan-method \Aws\Result startMonitoringMember(array{GraphArn?: string, AccountId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startMonitoringMemberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMonitoringMemberAsync(array{GraphArn?: string, AccountId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDatasourcePackages(array $args = [])
 * @phpstan-method \Aws\Result updateDatasourcePackages(array{
 *     GraphArn?: string,
 *     DatasourcePackages?: list<'ASFF_SECURITYHUB_FINDING'|'DETECTIVE_CORE'|'EKS_AUDIT'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDatasourcePackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDatasourcePackagesAsync(array{
 *     GraphArn?: string,
 *     DatasourcePackages?: list<'ASFF_SECURITYHUB_FINDING'|'DETECTIVE_CORE'|'EKS_AUDIT'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateInvestigationState(array $args = [])
 * @phpstan-method \Aws\Result updateInvestigationState(array{GraphArn?: string, InvestigationId?: string, State?: 'ACTIVE'|'ARCHIVED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInvestigationStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInvestigationStateAsync(array{GraphArn?: string, InvestigationId?: string, State?: 'ACTIVE'|'ARCHIVED', ...} $args = [])
 * @method \Aws\Result updateOrganizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateOrganizationConfiguration(array{GraphArn?: string, AutoEnable?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array{GraphArn?: string, AutoEnable?: bool, ...} $args = [])
 */
class DetectiveClient extends AwsClient {}
