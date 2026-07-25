<?php
namespace Aws\ConnectCases;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Connect Cases** service.
 * @method \Aws\Result batchGetCaseRule(array $args = [])
 * @phpstan-method \Aws\Result batchGetCaseRule(array{domainId?: string, caseRules?: list<array{id?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetCaseRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetCaseRuleAsync(array{domainId?: string, caseRules?: list<array{id?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchGetField(array $args = [])
 * @phpstan-method \Aws\Result batchGetField(array{domainId?: string, fields?: list<array{id?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetFieldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetFieldAsync(array{domainId?: string, fields?: list<array{id?: string, ...}>, ...} $args = [])
 * @method \Aws\Result batchPutFieldOptions(array $args = [])
 * @phpstan-method \Aws\Result batchPutFieldOptions(array{
 *     domainId?: string,
 *     fieldId?: string,
 *     options?: list<array{name?: string, value?: string, active?: bool, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutFieldOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutFieldOptionsAsync(array{
 *     domainId?: string,
 *     fieldId?: string,
 *     options?: list<array{name?: string, value?: string, active?: bool, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCase(array $args = [])
 * @phpstan-method \Aws\Result createCase(array{
 *     domainId?: string,
 *     templateId?: string,
 *     fields?: list<array{id?: string, value?: array, ...}>,
 *     clientToken?: string,
 *     performedBy?: array{userArn?: string, customEntity?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCaseAsync(array{
 *     domainId?: string,
 *     templateId?: string,
 *     fields?: list<array{id?: string, value?: array, ...}>,
 *     clientToken?: string,
 *     performedBy?: array{userArn?: string, customEntity?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCaseRule(array $args = [])
 * @phpstan-method \Aws\Result createCaseRule(array{
 *     domainId?: string,
 *     name?: string,
 *     description?: string,
 *     rule?: array{
 *         required?: array{defaultValue?: bool, conditions?: list<array>, ...},
 *         fieldOptions?: array{parentFieldId?: string, childFieldId?: string, parentChildFieldOptionsMappings?: list<array>, ...},
 *         hidden?: array{defaultValue?: bool, conditions?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCaseRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCaseRuleAsync(array{
 *     domainId?: string,
 *     name?: string,
 *     description?: string,
 *     rule?: array{
 *         required?: array{defaultValue?: bool, conditions?: list<array>, ...},
 *         fieldOptions?: array{parentFieldId?: string, childFieldId?: string, parentChildFieldOptionsMappings?: list<array>, ...},
 *         hidden?: array{defaultValue?: bool, conditions?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomain(array $args = [])
 * @phpstan-method \Aws\Result createDomain(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result createField(array $args = [])
 * @phpstan-method \Aws\Result createField(array{
 *     domainId?: string,
 *     name?: string,
 *     type?: 'Boolean'|'DateTime'|'Number'|'SingleSelect'|'Text'|'Url'|'User',
 *     description?: string,
 *     attributes?: array{text?: array{isMultiline?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFieldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFieldAsync(array{
 *     domainId?: string,
 *     name?: string,
 *     type?: 'Boolean'|'DateTime'|'Number'|'SingleSelect'|'Text'|'Url'|'User',
 *     description?: string,
 *     attributes?: array{text?: array{isMultiline?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLayout(array $args = [])
 * @phpstan-method \Aws\Result createLayout(array{
 *     domainId?: string,
 *     name?: string,
 *     content?: array{basic?: array{topPanel?: array, moreInfo?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLayoutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLayoutAsync(array{
 *     domainId?: string,
 *     name?: string,
 *     content?: array{basic?: array{topPanel?: array, moreInfo?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRelatedItem(array $args = [])
 * @phpstan-method \Aws\Result createRelatedItem(array{
 *     domainId?: string,
 *     caseId?: string,
 *     type?: 'Comment'|'ConnectCase'|'Contact'|'Custom'|'File'|'Sla',
 *     content?: array{
 *         contact?: array{contactArn?: string, ...},
 *         comment?: array{body?: string, contentType?: 'Text/Plain', ...},
 *         file?: array{fileArn?: string, ...},
 *         sla?: array{slaInputConfiguration?: array, ...},
 *         connectCase?: array{caseId?: string, ...},
 *         custom?: array{fields?: list<array>, ...},
 *         ...,
 *     },
 *     performedBy?: array{userArn?: string, customEntity?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRelatedItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRelatedItemAsync(array{
 *     domainId?: string,
 *     caseId?: string,
 *     type?: 'Comment'|'ConnectCase'|'Contact'|'Custom'|'File'|'Sla',
 *     content?: array{
 *         contact?: array{contactArn?: string, ...},
 *         comment?: array{body?: string, contentType?: 'Text/Plain', ...},
 *         file?: array{fileArn?: string, ...},
 *         sla?: array{slaInputConfiguration?: array, ...},
 *         connectCase?: array{caseId?: string, ...},
 *         custom?: array{fields?: list<array>, ...},
 *         ...,
 *     },
 *     performedBy?: array{userArn?: string, customEntity?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTemplate(array $args = [])
 * @phpstan-method \Aws\Result createTemplate(array{
 *     domainId?: string,
 *     name?: string,
 *     description?: string,
 *     layoutConfiguration?: array{defaultLayout?: string, ...},
 *     requiredFields?: list<array{fieldId?: string, ...}>,
 *     status?: 'Active'|'Inactive',
 *     rules?: list<array{caseRuleId?: string, fieldId?: string, ...}>,
 *     tagPropagationConfigurations?: list<array{resourceType?: 'Cases', tagMap?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTemplateAsync(array{
 *     domainId?: string,
 *     name?: string,
 *     description?: string,
 *     layoutConfiguration?: array{defaultLayout?: string, ...},
 *     requiredFields?: list<array{fieldId?: string, ...}>,
 *     status?: 'Active'|'Inactive',
 *     rules?: list<array{caseRuleId?: string, fieldId?: string, ...}>,
 *     tagPropagationConfigurations?: list<array{resourceType?: 'Cases', tagMap?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteCase(array $args = [])
 * @phpstan-method \Aws\Result deleteCase(array{domainId?: string, caseId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCaseAsync(array{domainId?: string, caseId?: string, ...} $args = [])
 * @method \Aws\Result deleteCaseRule(array $args = [])
 * @phpstan-method \Aws\Result deleteCaseRule(array{domainId?: string, caseRuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCaseRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCaseRuleAsync(array{domainId?: string, caseRuleId?: string, ...} $args = [])
 * @method \Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{domainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{domainId?: string, ...} $args = [])
 * @method \Aws\Result deleteField(array $args = [])
 * @phpstan-method \Aws\Result deleteField(array{domainId?: string, fieldId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFieldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFieldAsync(array{domainId?: string, fieldId?: string, ...} $args = [])
 * @method \Aws\Result deleteLayout(array $args = [])
 * @phpstan-method \Aws\Result deleteLayout(array{domainId?: string, layoutId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLayoutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLayoutAsync(array{domainId?: string, layoutId?: string, ...} $args = [])
 * @method \Aws\Result deleteRelatedItem(array $args = [])
 * @phpstan-method \Aws\Result deleteRelatedItem(array{domainId?: string, caseId?: string, relatedItemId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRelatedItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRelatedItemAsync(array{domainId?: string, caseId?: string, relatedItemId?: string, ...} $args = [])
 * @method \Aws\Result deleteTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteTemplate(array{domainId?: string, templateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTemplateAsync(array{domainId?: string, templateId?: string, ...} $args = [])
 * @method \Aws\Result getCase(array $args = [])
 * @phpstan-method \Aws\Result getCase(array{caseId?: string, domainId?: string, fields?: list<array{id?: string, ...}>, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCaseAsync(array{caseId?: string, domainId?: string, fields?: list<array{id?: string, ...}>, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getCaseAuditEvents(array $args = [])
 * @phpstan-method \Aws\Result getCaseAuditEvents(array{caseId?: string, domainId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCaseAuditEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCaseAuditEventsAsync(array{caseId?: string, domainId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getCaseEventConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getCaseEventConfiguration(array{domainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCaseEventConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCaseEventConfigurationAsync(array{domainId?: string, ...} $args = [])
 * @method \Aws\Result getDomain(array $args = [])
 * @phpstan-method \Aws\Result getDomain(array{domainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainAsync(array{domainId?: string, ...} $args = [])
 * @method \Aws\Result getLayout(array $args = [])
 * @phpstan-method \Aws\Result getLayout(array{domainId?: string, layoutId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLayoutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLayoutAsync(array{domainId?: string, layoutId?: string, ...} $args = [])
 * @method \Aws\Result getTemplate(array $args = [])
 * @phpstan-method \Aws\Result getTemplate(array{domainId?: string, templateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTemplateAsync(array{domainId?: string, templateId?: string, ...} $args = [])
 * @method \Aws\Result listCaseRules(array $args = [])
 * @phpstan-method \Aws\Result listCaseRules(array{domainId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCaseRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCaseRulesAsync(array{domainId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCasesForContact(array $args = [])
 * @phpstan-method \Aws\Result listCasesForContact(array{domainId?: string, contactArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCasesForContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCasesForContactAsync(array{domainId?: string, contactArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listDomains(array $args = [])
 * @phpstan-method \Aws\Result listDomains(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listFieldOptions(array $args = [])
 * @phpstan-method \Aws\Result listFieldOptions(array{domainId?: string, fieldId?: string, maxResults?: int, nextToken?: string, values?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFieldOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFieldOptionsAsync(array{domainId?: string, fieldId?: string, maxResults?: int, nextToken?: string, values?: list<string>, ...} $args = [])
 * @method \Aws\Result listFields(array $args = [])
 * @phpstan-method \Aws\Result listFields(array{domainId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFieldsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFieldsAsync(array{domainId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listLayouts(array $args = [])
 * @phpstan-method \Aws\Result listLayouts(array{domainId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLayoutsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLayoutsAsync(array{domainId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result listTemplates(array $args = [])
 * @phpstan-method \Aws\Result listTemplates(array{domainId?: string, maxResults?: int, nextToken?: string, status?: list<'Active'|'Inactive'>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTemplatesAsync(array{domainId?: string, maxResults?: int, nextToken?: string, status?: list<'Active'|'Inactive'>, ...} $args = [])
 * @method \Aws\Result putCaseEventConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putCaseEventConfiguration(array{
 *     domainId?: string,
 *     eventBridge?: array{enabled?: bool, includedData?: array{caseData?: array, relatedItemData?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putCaseEventConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putCaseEventConfigurationAsync(array{
 *     domainId?: string,
 *     eventBridge?: array{enabled?: bool, includedData?: array{caseData?: array, relatedItemData?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchAllRelatedItems(array $args = [])
 * @phpstan-method \Aws\Result searchAllRelatedItems(array{
 *     domainId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{contact?: array, comment?: array, file?: array, sla?: array, connectCase?: array, custom?: array, ...}>,
 *     sorts?: list<array{sortProperty?: 'AssociationTime'|'CaseId', sortOrder?: 'Asc'|'Desc', ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAllRelatedItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAllRelatedItemsAsync(array{
 *     domainId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{contact?: array, comment?: array, file?: array, sla?: array, connectCase?: array, custom?: array, ...}>,
 *     sorts?: list<array{sortProperty?: 'AssociationTime'|'CaseId', sortOrder?: 'Asc'|'Desc', ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchCases(array $args = [])
 * @phpstan-method \Aws\Result searchCases(array{
 *     domainId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchTerm?: string,
 *     filter?: array{
 *         field?: array{
 *             equalTo?: array,
 *             contains?: array,
 *             greaterThan?: array,
 *             greaterThanOrEqualTo?: array,
 *             lessThan?: array,
 *             lessThanOrEqualTo?: array,
 *             ...,
 *         },
 *         not?: array,
 *         tag?: array{equalTo?: array, ...},
 *         andAll?: list<array>,
 *         orAll?: list<array>,
 *         ...,
 *     },
 *     sorts?: list<array{fieldId?: string, sortOrder?: 'Asc'|'Desc', ...}>,
 *     fields?: list<array{id?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchCasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchCasesAsync(array{
 *     domainId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     searchTerm?: string,
 *     filter?: array{
 *         field?: array{
 *             equalTo?: array,
 *             contains?: array,
 *             greaterThan?: array,
 *             greaterThanOrEqualTo?: array,
 *             lessThan?: array,
 *             lessThanOrEqualTo?: array,
 *             ...,
 *         },
 *         not?: array,
 *         tag?: array{equalTo?: array, ...},
 *         andAll?: list<array>,
 *         orAll?: list<array>,
 *         ...,
 *     },
 *     sorts?: list<array{fieldId?: string, sortOrder?: 'Asc'|'Desc', ...}>,
 *     fields?: list<array{id?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchRelatedItems(array $args = [])
 * @phpstan-method \Aws\Result searchRelatedItems(array{
 *     domainId?: string,
 *     caseId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{contact?: array, comment?: array, file?: array, sla?: array, connectCase?: array, custom?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchRelatedItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchRelatedItemsAsync(array{
 *     domainId?: string,
 *     caseId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{contact?: array, comment?: array, file?: array, sla?: array, connectCase?: array, custom?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateCase(array $args = [])
 * @phpstan-method \Aws\Result updateCase(array{
 *     domainId?: string,
 *     caseId?: string,
 *     fields?: list<array{id?: string, value?: array, ...}>,
 *     performedBy?: array{userArn?: string, customEntity?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCaseAsync(array{
 *     domainId?: string,
 *     caseId?: string,
 *     fields?: list<array{id?: string, value?: array, ...}>,
 *     performedBy?: array{userArn?: string, customEntity?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCaseRule(array $args = [])
 * @phpstan-method \Aws\Result updateCaseRule(array{
 *     domainId?: string,
 *     caseRuleId?: string,
 *     name?: string,
 *     description?: string,
 *     rule?: array{
 *         required?: array{defaultValue?: bool, conditions?: list<array>, ...},
 *         fieldOptions?: array{parentFieldId?: string, childFieldId?: string, parentChildFieldOptionsMappings?: list<array>, ...},
 *         hidden?: array{defaultValue?: bool, conditions?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCaseRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCaseRuleAsync(array{
 *     domainId?: string,
 *     caseRuleId?: string,
 *     name?: string,
 *     description?: string,
 *     rule?: array{
 *         required?: array{defaultValue?: bool, conditions?: list<array>, ...},
 *         fieldOptions?: array{parentFieldId?: string, childFieldId?: string, parentChildFieldOptionsMappings?: list<array>, ...},
 *         hidden?: array{defaultValue?: bool, conditions?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateField(array $args = [])
 * @phpstan-method \Aws\Result updateField(array{
 *     domainId?: string,
 *     fieldId?: string,
 *     name?: string,
 *     description?: string,
 *     attributes?: array{text?: array{isMultiline?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFieldAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFieldAsync(array{
 *     domainId?: string,
 *     fieldId?: string,
 *     name?: string,
 *     description?: string,
 *     attributes?: array{text?: array{isMultiline?: bool, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateLayout(array $args = [])
 * @phpstan-method \Aws\Result updateLayout(array{
 *     domainId?: string,
 *     layoutId?: string,
 *     name?: string,
 *     content?: array{basic?: array{topPanel?: array, moreInfo?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLayoutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLayoutAsync(array{
 *     domainId?: string,
 *     layoutId?: string,
 *     name?: string,
 *     content?: array{basic?: array{topPanel?: array, moreInfo?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRelatedItem(array $args = [])
 * @phpstan-method \Aws\Result updateRelatedItem(array{
 *     domainId?: string,
 *     caseId?: string,
 *     relatedItemId?: string,
 *     content?: array{
 *         comment?: array{body?: string, contentType?: 'Text/Plain', ...},
 *         custom?: array{fields?: list<array>, ...},
 *         ...,
 *     },
 *     performedBy?: array{userArn?: string, customEntity?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRelatedItemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRelatedItemAsync(array{
 *     domainId?: string,
 *     caseId?: string,
 *     relatedItemId?: string,
 *     content?: array{
 *         comment?: array{body?: string, contentType?: 'Text/Plain', ...},
 *         custom?: array{fields?: list<array>, ...},
 *         ...,
 *     },
 *     performedBy?: array{userArn?: string, customEntity?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateTemplate(array{
 *     domainId?: string,
 *     templateId?: string,
 *     name?: string,
 *     description?: string,
 *     layoutConfiguration?: array{defaultLayout?: string, ...},
 *     requiredFields?: list<array{fieldId?: string, ...}>,
 *     status?: 'Active'|'Inactive',
 *     rules?: list<array{caseRuleId?: string, fieldId?: string, ...}>,
 *     tagPropagationConfigurations?: list<array{resourceType?: 'Cases', tagMap?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTemplateAsync(array{
 *     domainId?: string,
 *     templateId?: string,
 *     name?: string,
 *     description?: string,
 *     layoutConfiguration?: array{defaultLayout?: string, ...},
 *     requiredFields?: list<array{fieldId?: string, ...}>,
 *     status?: 'Active'|'Inactive',
 *     rules?: list<array{caseRuleId?: string, fieldId?: string, ...}>,
 *     tagPropagationConfigurations?: list<array{resourceType?: 'Cases', tagMap?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 */
class ConnectCasesClient extends AwsClient {}
