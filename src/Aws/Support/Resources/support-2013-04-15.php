<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

return array (
    'apiVersion' => '2013-04-15',
    'endpointPrefix' => 'support',
    'serviceFullName' => 'AWS Support',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'AWSSupport_20130415.',
    'signatureVersion' => 'v4',
    'namespace' => 'Support',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'support.us-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'AddCommunicationToCase' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'AddCommunicationToCaseResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.AddCommunicationToCase',
                ),
                'caseId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'communicationBody' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 8000,
                ),
                'ccEmailAddresses' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'CcEmailAddress',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned when the CaseId requested could not be located.',
                    'class' => 'CaseIdNotFoundException',
                ),
            ),
        ),
        'CreateCase' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateCaseResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.CreateCase',
                ),
                'subject' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'serviceCode' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'severityCode' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'categoryCode' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'communicationBody' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 8000,
                ),
                'ccEmailAddresses' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 10,
                    'items' => array(
                        'name' => 'CcEmailAddress',
                        'type' => 'string',
                    ),
                ),
                'language' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'issueType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned when you have exceeded the case creation limit for an account.',
                    'class' => 'CaseCreationLimitExceededException',
                ),
            ),
        ),
        'DescribeCases' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeCasesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.DescribeCases',
                ),
                'caseIdList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 100,
                    'items' => array(
                        'name' => 'CaseId',
                        'type' => 'string',
                    ),
                ),
                'displayId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'afterTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'beforeTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'includeResolvedCases' => array(
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'maxResults' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 10,
                    'maximum' => 100,
                ),
                'language' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned when the CaseId requested could not be located.',
                    'class' => 'CaseIdNotFoundException',
                ),
            ),
        ),
        'DescribeCommunications' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeCommunicationsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.DescribeCommunications',
                ),
                'caseId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'beforeTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'afterTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'maxResults' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 10,
                    'maximum' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned when the CaseId requested could not be located.',
                    'class' => 'CaseIdNotFoundException',
                ),
            ),
        ),
        'DescribeServices' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeServicesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.DescribeServices',
                ),
                'serviceCodeList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'maxItems' => 100,
                    'items' => array(
                        'name' => 'ServiceCode',
                        'type' => 'string',
                    ),
                ),
                'language' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeSeverityLevels' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeSeverityLevelsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.DescribeSeverityLevels',
                ),
                'language' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeTrustedAdvisorCheckRefreshStatuses' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTrustedAdvisorCheckRefreshStatusesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.DescribeTrustedAdvisorCheckRefreshStatuses',
                ),
                'checkIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeTrustedAdvisorCheckResult' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTrustedAdvisorCheckResultResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.DescribeTrustedAdvisorCheckResult',
                ),
                'checkId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'language' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeTrustedAdvisorCheckSummaries' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTrustedAdvisorCheckSummariesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.DescribeTrustedAdvisorCheckSummaries',
                ),
                'checkIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'String',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeTrustedAdvisorChecks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTrustedAdvisorChecksResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.DescribeTrustedAdvisorChecks',
                ),
                'language' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'RefreshTrustedAdvisorCheck' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RefreshTrustedAdvisorCheckResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.RefreshTrustedAdvisorCheck',
                ),
                'checkId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ResolveCase' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ResolveCaseResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'application/x-amz-json-1.1',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Target' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'AWSSupport_20130415.ResolveCase',
                ),
                'caseId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Returns HTTP error 500.',
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'reason' => 'Returned when the CaseId requested could not be located.',
                    'class' => 'CaseIdNotFoundException',
                ),
            ),
        ),
    ),
    'models' => array(
        'AddCommunicationToCaseResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'result' => array(
                    'type' => 'boolean',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateCaseResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'caseId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeCasesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'cases' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'CaseDetails',
                        'type' => 'object',
                        'properties' => array(
                            'caseId' => array(
                                'type' => 'string',
                            ),
                            'displayId' => array(
                                'type' => 'string',
                            ),
                            'subject' => array(
                                'type' => 'string',
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                            'serviceCode' => array(
                                'type' => 'string',
                            ),
                            'categoryCode' => array(
                                'type' => 'string',
                            ),
                            'severityCode' => array(
                                'type' => 'string',
                            ),
                            'submittedBy' => array(
                                'type' => 'string',
                            ),
                            'timeCreated' => array(
                                'type' => 'string',
                            ),
                            'recentCommunications' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'communications' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'Communication',
                                            'type' => 'object',
                                            'properties' => array(
                                                'caseId' => array(
                                                    'type' => 'string',
                                                ),
                                                'body' => array(
                                                    'type' => 'string',
                                                ),
                                                'submittedBy' => array(
                                                    'type' => 'string',
                                                ),
                                                'timeCreated' => array(
                                                    'type' => 'string',
                                                ),
                                            ),
                                        ),
                                    ),
                                    'nextToken' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'ccEmailAddresses' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'CcEmailAddress',
                                    'type' => 'string',
                                ),
                            ),
                            'language' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeCommunicationsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'communications' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Communication',
                        'type' => 'object',
                        'properties' => array(
                            'caseId' => array(
                                'type' => 'string',
                            ),
                            'body' => array(
                                'type' => 'string',
                            ),
                            'submittedBy' => array(
                                'type' => 'string',
                            ),
                            'timeCreated' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'nextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeServicesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'services' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Service',
                        'type' => 'object',
                        'properties' => array(
                            'code' => array(
                                'type' => 'string',
                            ),
                            'name' => array(
                                'type' => 'string',
                            ),
                            'categories' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'Category',
                                    'type' => 'object',
                                    'properties' => array(
                                        'code' => array(
                                            'type' => 'string',
                                        ),
                                        'name' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeSeverityLevelsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'severityLevels' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'SeverityLevel',
                        'type' => 'object',
                        'properties' => array(
                            'code' => array(
                                'type' => 'string',
                            ),
                            'name' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeTrustedAdvisorCheckRefreshStatusesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'statuses' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'TrustedAdvisorCheckRefreshStatus',
                        'type' => 'object',
                        'properties' => array(
                            'checkId' => array(
                                'type' => 'string',
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                            'millisUntilNextRefreshable' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeTrustedAdvisorCheckResultResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'result' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'checkId' => array(
                            'type' => 'string',
                        ),
                        'timestamp' => array(
                            'type' => 'string',
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'resourcesSummary' => array(
                            'type' => 'object',
                            'properties' => array(
                                'resourcesProcessed' => array(
                                    'type' => 'numeric',
                                ),
                                'resourcesFlagged' => array(
                                    'type' => 'numeric',
                                ),
                                'resourcesIgnored' => array(
                                    'type' => 'numeric',
                                ),
                                'resourcesSuppressed' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                        'categorySpecificSummary' => array(
                            'type' => 'object',
                            'properties' => array(
                                'costOptimizing' => array(
                                    'type' => 'object',
                                    'properties' => array(
                                        'estimatedMonthlySavings' => array(
                                            'type' => 'numeric',
                                        ),
                                        'estimatedPercentMonthlySavings' => array(
                                            'type' => 'numeric',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'flaggedResources' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'TrustedAdvisorResourceDetail',
                                'type' => 'object',
                                'properties' => array(
                                    'status' => array(
                                        'type' => 'string',
                                    ),
                                    'region' => array(
                                        'type' => 'string',
                                    ),
                                    'resourceId' => array(
                                        'type' => 'string',
                                    ),
                                    'isSuppressed' => array(
                                        'type' => 'boolean',
                                    ),
                                    'metadata' => array(
                                        'type' => 'array',
                                        'items' => array(
                                            'name' => 'String',
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeTrustedAdvisorCheckSummariesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'summaries' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'TrustedAdvisorCheckSummary',
                        'type' => 'object',
                        'properties' => array(
                            'checkId' => array(
                                'type' => 'string',
                            ),
                            'timestamp' => array(
                                'type' => 'string',
                            ),
                            'status' => array(
                                'type' => 'string',
                            ),
                            'hasFlaggedResources' => array(
                                'type' => 'boolean',
                            ),
                            'resourcesSummary' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'resourcesProcessed' => array(
                                        'type' => 'numeric',
                                    ),
                                    'resourcesFlagged' => array(
                                        'type' => 'numeric',
                                    ),
                                    'resourcesIgnored' => array(
                                        'type' => 'numeric',
                                    ),
                                    'resourcesSuppressed' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                            'categorySpecificSummary' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'costOptimizing' => array(
                                        'type' => 'object',
                                        'properties' => array(
                                            'estimatedMonthlySavings' => array(
                                                'type' => 'numeric',
                                            ),
                                            'estimatedPercentMonthlySavings' => array(
                                                'type' => 'numeric',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeTrustedAdvisorChecksResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'checks' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'TrustedAdvisorCheckDescription',
                        'type' => 'object',
                        'properties' => array(
                            'id' => array(
                                'type' => 'string',
                            ),
                            'name' => array(
                                'type' => 'string',
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                            'category' => array(
                                'type' => 'string',
                            ),
                            'metadata' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'String',
                                    'type' => 'string',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'RefreshTrustedAdvisorCheckResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'status' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'checkId' => array(
                            'type' => 'string',
                        ),
                        'status' => array(
                            'type' => 'string',
                        ),
                        'millisUntilNextRefreshable' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
            ),
        ),
        'ResolveCaseResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'initialCaseStatus' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'finalCaseStatus' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'operations' => array(
            'DescribeCases' => array(
                'token_param' => 'nextToken',
                'token_key' => 'nextToken',
                'limit_key' => 'maxResults',
                'result_key' => 'cases',
            ),
            'DescribeCommunications' => array(
                'token_param' => 'nextToken',
                'token_key' => 'nextToken',
                'limit_key' => 'maxResults',
                'result_key' => 'communications',
            ),
            'DescribeServices' => array(
                'result_key' => 'services',
            ),
            'DescribeTrustedAdvisorCheckRefreshStatuses' => array(
                'result_key' => 'statuses',
            ),
            'DescribeTrustedAdvisorCheckSummaries' => array(
                'result_key' => 'summaries',
            ),
            'DescribeSeverityLevels' => array(
                'result_key' => 'severityLevelsList',
            ),
            'DescribeTrustedAdvisorChecks' => array(
                'result_key' => 'checks',
            ),
        ),
    ),
);
