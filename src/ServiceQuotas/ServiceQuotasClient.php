<?php
namespace Aws\ServiceQuotas;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Service Quotas** service.
 * @method \Aws\Result associateServiceQuotaTemplate(array $args = [])
 * @phpstan-method \Aws\Result associateServiceQuotaTemplate(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateServiceQuotaTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateServiceQuotaTemplateAsync(array{...} $args = [])
 * @method \Aws\Result createSupportCase(array $args = [])
 * @phpstan-method \Aws\Result createSupportCase(array{RequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createSupportCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSupportCaseAsync(array{RequestId?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceQuotaIncreaseRequestFromTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceQuotaIncreaseRequestFromTemplate(array{ServiceCode?: string, QuotaCode?: string, AwsRegion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceQuotaIncreaseRequestFromTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceQuotaIncreaseRequestFromTemplateAsync(array{ServiceCode?: string, QuotaCode?: string, AwsRegion?: string, ...} $args = [])
 * @method \Aws\Result disassociateServiceQuotaTemplate(array $args = [])
 * @phpstan-method \Aws\Result disassociateServiceQuotaTemplate(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateServiceQuotaTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateServiceQuotaTemplateAsync(array{...} $args = [])
 * @method \Aws\Result getAWSDefaultServiceQuota(array $args = [])
 * @phpstan-method \Aws\Result getAWSDefaultServiceQuota(array{ServiceCode?: string, QuotaCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAWSDefaultServiceQuotaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAWSDefaultServiceQuotaAsync(array{ServiceCode?: string, QuotaCode?: string, ...} $args = [])
 * @method \Aws\Result getAssociationForServiceQuotaTemplate(array $args = [])
 * @phpstan-method \Aws\Result getAssociationForServiceQuotaTemplate(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssociationForServiceQuotaTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssociationForServiceQuotaTemplateAsync(array{...} $args = [])
 * @method \Aws\Result getAutoManagementConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getAutoManagementConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutoManagementConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutoManagementConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getQuotaUtilizationReport(array $args = [])
 * @phpstan-method \Aws\Result getQuotaUtilizationReport(array{ReportId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQuotaUtilizationReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQuotaUtilizationReportAsync(array{ReportId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result getRequestedServiceQuotaChange(array $args = [])
 * @phpstan-method \Aws\Result getRequestedServiceQuotaChange(array{RequestId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRequestedServiceQuotaChangeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRequestedServiceQuotaChangeAsync(array{RequestId?: string, ...} $args = [])
 * @method \Aws\Result getServiceQuota(array $args = [])
 * @phpstan-method \Aws\Result getServiceQuota(array{ServiceCode?: string, QuotaCode?: string, ContextId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceQuotaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceQuotaAsync(array{ServiceCode?: string, QuotaCode?: string, ContextId?: string, ...} $args = [])
 * @method \Aws\Result getServiceQuotaIncreaseRequestFromTemplate(array $args = [])
 * @phpstan-method \Aws\Result getServiceQuotaIncreaseRequestFromTemplate(array{ServiceCode?: string, QuotaCode?: string, AwsRegion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getServiceQuotaIncreaseRequestFromTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceQuotaIncreaseRequestFromTemplateAsync(array{ServiceCode?: string, QuotaCode?: string, AwsRegion?: string, ...} $args = [])
 * @method \Aws\Result listAWSDefaultServiceQuotas(array $args = [])
 * @phpstan-method \Aws\Result listAWSDefaultServiceQuotas(array{ServiceCode?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAWSDefaultServiceQuotasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAWSDefaultServiceQuotasAsync(array{ServiceCode?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listRequestedServiceQuotaChangeHistory(array $args = [])
 * @phpstan-method \Aws\Result listRequestedServiceQuotaChangeHistory(array{
 *     ServiceCode?: string,
 *     Status?: 'APPROVED'|'CASE_CLOSED'|'CASE_OPENED'|'DENIED'|'INVALID_REQUEST'|'NOT_APPROVED'|'PENDING',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuotaRequestedAtLevel?: 'ACCOUNT'|'ALL'|'RESOURCE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRequestedServiceQuotaChangeHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRequestedServiceQuotaChangeHistoryAsync(array{
 *     ServiceCode?: string,
 *     Status?: 'APPROVED'|'CASE_CLOSED'|'CASE_OPENED'|'DENIED'|'INVALID_REQUEST'|'NOT_APPROVED'|'PENDING',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuotaRequestedAtLevel?: 'ACCOUNT'|'ALL'|'RESOURCE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listRequestedServiceQuotaChangeHistoryByQuota(array $args = [])
 * @phpstan-method \Aws\Result listRequestedServiceQuotaChangeHistoryByQuota(array{
 *     ServiceCode?: string,
 *     QuotaCode?: string,
 *     Status?: 'APPROVED'|'CASE_CLOSED'|'CASE_OPENED'|'DENIED'|'INVALID_REQUEST'|'NOT_APPROVED'|'PENDING',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuotaRequestedAtLevel?: 'ACCOUNT'|'ALL'|'RESOURCE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRequestedServiceQuotaChangeHistoryByQuotaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRequestedServiceQuotaChangeHistoryByQuotaAsync(array{
 *     ServiceCode?: string,
 *     QuotaCode?: string,
 *     Status?: 'APPROVED'|'CASE_CLOSED'|'CASE_OPENED'|'DENIED'|'INVALID_REQUEST'|'NOT_APPROVED'|'PENDING',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuotaRequestedAtLevel?: 'ACCOUNT'|'ALL'|'RESOURCE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServiceQuotaIncreaseRequestsInTemplate(array $args = [])
 * @phpstan-method \Aws\Result listServiceQuotaIncreaseRequestsInTemplate(array{ServiceCode?: string, AwsRegion?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceQuotaIncreaseRequestsInTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceQuotaIncreaseRequestsInTemplateAsync(array{ServiceCode?: string, AwsRegion?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listServiceQuotas(array $args = [])
 * @phpstan-method \Aws\Result listServiceQuotas(array{
 *     ServiceCode?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuotaCode?: string,
 *     QuotaAppliedAtLevel?: 'ACCOUNT'|'ALL'|'RESOURCE',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceQuotasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceQuotasAsync(array{
 *     ServiceCode?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     QuotaCode?: string,
 *     QuotaAppliedAtLevel?: 'ACCOUNT'|'ALL'|'RESOURCE',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result putServiceQuotaIncreaseRequestIntoTemplate(array $args = [])
 * @phpstan-method \Aws\Result putServiceQuotaIncreaseRequestIntoTemplate(array{QuotaCode?: string, ServiceCode?: string, AwsRegion?: string, DesiredValue?: float, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putServiceQuotaIncreaseRequestIntoTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putServiceQuotaIncreaseRequestIntoTemplateAsync(array{QuotaCode?: string, ServiceCode?: string, AwsRegion?: string, DesiredValue?: float, ...} $args = [])
 * @method \Aws\Result requestServiceQuotaIncrease(array $args = [])
 * @phpstan-method \Aws\Result requestServiceQuotaIncrease(array{
 *     ServiceCode?: string,
 *     QuotaCode?: string,
 *     DesiredValue?: float,
 *     ContextId?: string,
 *     SupportCaseAllowed?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise requestServiceQuotaIncreaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise requestServiceQuotaIncreaseAsync(array{
 *     ServiceCode?: string,
 *     QuotaCode?: string,
 *     DesiredValue?: float,
 *     ContextId?: string,
 *     SupportCaseAllowed?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAutoManagement(array $args = [])
 * @phpstan-method \Aws\Result startAutoManagement(array{
 *     OptInLevel?: 'ACCOUNT',
 *     OptInType?: 'NotifyAndAdjust'|'NotifyOnly',
 *     NotificationArn?: string,
 *     ExclusionList?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAutoManagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAutoManagementAsync(array{
 *     OptInLevel?: 'ACCOUNT',
 *     OptInType?: 'NotifyAndAdjust'|'NotifyOnly',
 *     NotificationArn?: string,
 *     ExclusionList?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startQuotaUtilizationReport(array $args = [])
 * @phpstan-method \Aws\Result startQuotaUtilizationReport(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startQuotaUtilizationReportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQuotaUtilizationReportAsync(array{...} $args = [])
 * @method \Aws\Result stopAutoManagement(array $args = [])
 * @phpstan-method \Aws\Result stopAutoManagement(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopAutoManagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopAutoManagementAsync(array{...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAutoManagement(array $args = [])
 * @phpstan-method \Aws\Result updateAutoManagement(array{
 *     OptInType?: 'NotifyAndAdjust'|'NotifyOnly',
 *     NotificationArn?: string,
 *     ExclusionList?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutoManagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutoManagementAsync(array{
 *     OptInType?: 'NotifyAndAdjust'|'NotifyOnly',
 *     NotificationArn?: string,
 *     ExclusionList?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 */
class ServiceQuotasClient extends AwsClient {}
