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
    'apiVersion' => '2012-12-15',
    'endpointPrefix' => 'support',
    'serviceFullName' => 'AWS Support',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'AWSSupportAPIService.',
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
            'responseNotes' => 'Returns a json_decoded array of the response body',
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
                    'default' => 'AWSSupportAPIService.AddCommunicationToCase',
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
                    'items' => array(
                        'name' => 'CcEmailAddress',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InternalServerErrorException',
                ),
                array(
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
            'responseNotes' => 'Returns a json_decoded array of the response body',
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
                    'default' => 'AWSSupportAPIService.CreateCase',
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
                    'class' => 'InternalServerErrorException',
                ),
                array(
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
            'responseNotes' => 'Returns a json_decoded array of the response body',
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
                    'default' => 'AWSSupportAPIService.DescribeCases',
                ),
                'caseIdList' => array(
                    'type' => 'array',
                    'location' => 'json',
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
                    'class' => 'InternalServerErrorException',
                ),
                array(
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
            'responseNotes' => 'Returns a json_decoded array of the response body',
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
                    'default' => 'AWSSupportAPIService.DescribeCommunications',
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
                    'class' => 'InternalServerErrorException',
                ),
                array(
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
            'responseNotes' => 'Returns a json_decoded array of the response body',
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
                    'default' => 'AWSSupportAPIService.DescribeServices',
                ),
                'serviceCodeList' => array(
                    'type' => 'array',
                    'location' => 'json',
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
            'responseNotes' => 'Returns a json_decoded array of the response body',
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
                    'default' => 'AWSSupportAPIService.DescribeSeverityLevels',
                ),
                'placeholder' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
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
            'responseNotes' => 'Returns a json_decoded array of the response body',
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
                    'default' => 'AWSSupportAPIService.ResolveCase',
                ),
                'caseId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InternalServerErrorException',
                ),
                array(
                    'class' => 'CaseIdNotFoundException',
                ),
            ),
        ),
        'DescribeTrustedAdvisorCheckResult' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTrustedAdvisorCheckResultResponse',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
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
                    'default' => 'AWSSupportAPIService.DescribeTrustedAdvisorCheckResult',
                ),
                'checkId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
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
            'responseNotes' => 'Returns a json_decoded array of the response body',
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
                    'default' => 'AWSSupportAPIService.DescribeTrustedAdvisorCheckSummaries',
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
            'responseNotes' => 'Returns a json_decoded array of the response body',
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
                    'default' => 'AWSSupportAPIService.DescribeTrustedAdvisorChecks',
                ),
                'language' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
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
            'responseNotes' => 'Returns a json_decoded array of the response body',
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
                    'default' => 'AWSSupportAPIService.RefreshTrustedAdvisorCheck',
                ),
                'checkId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'InternalServerErrorException',
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
                'severityLevelsList' => array(
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
                    'type' => 'string',
                    'location' => 'json',
                ),
                'timeUntilNextRefresh' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
        ),
    ),
);
