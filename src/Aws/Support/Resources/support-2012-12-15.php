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
            'summary' => 'This action adds additional customer communication to an AWS Support case. You use the CaseId value to identify the case to which you want to add communication. You can list a set of email addresses to copy on the communication using the CcEmailAddresses value. The CommunicationBody value contains the text of the communication.',
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
            'summary' => 'Creates a new case in the AWS Support Center. This action is modeled on the behavior of the AWS Support Center Open a new case page. Its parameters require you to specify the following information:',
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
            'summary' => 'This action returns a list of cases that you specify by passing one or more CaseIds. In addition, you can filter the cases by date by setting values for the AfterTime and BeforeTime request parameters.',
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
            'summary' => 'This action returns communications regarding the support case. You can use the AfterTime and BeforeTime parameters to filter by date. The CaseId parameter enables you to identify a specific case by its CaseId number.',
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
            'summary' => 'Returns the current list of AWS services and a list of service categories that applies to each one. You then use service names and categories in your CreateCase requests. Each AWS service has its own set of categories.',
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
            'summary' => 'This action returns the list of severity levels that you can assign to an AWS Support case. The severity level for a case is also a field in the CaseDetails data type included in any CreateCase request.',
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
        'ResolveCase' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ResolveCaseResponse',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Takes a CaseId and returns the initial state of the case along with the state of the case after the call to ResolveCase completed.',
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
        'DescribeTrustedAdvisorCheckRefreshStatuses' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTrustedAdvisorCheckRefreshStatusesResponse',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'Returns the status of all refresh requests Trusted Advisor checks called using RefreshTrustedAdvisorCheck.',
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
                    'default' => 'AWSSupportAPIService.DescribeTrustedAdvisorCheckRefreshStatuses',
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
        'DescribeTrustedAdvisorCheckResult' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTrustedAdvisorCheckResultResponse',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'This action responds with the results of a Trusted Advisor check. Once you have obtained the list of available Trusted Advisor checks by calling DescribeTrustedAdvisorChecks, you specify the CheckId for the check you want to retrieve from AWS Support.',
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
        'DescribeTrustedAdvisorCheckSummaries' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTrustedAdvisorCheckSummariesResponse',
            'responseType' => 'model',
            'responseNotes' => 'Returns a json_decoded array of the response body',
            'summary' => 'This action enables you to get the latest summaries for Trusted Advisor checks that you specify in your request. You submit the list of Trusted Advisor checks for which you want summaries. You obtain these CheckIds by submitting a DescribeTrustedAdvisorChecks request.',
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
            'summary' => 'This action enables you to get a list of the available Trusted Advisor checks. You must specify a language code. English ("en") and Japanese ("jp") are currently supported. The response contains a list of TrustedAdvisorCheckDescription objects.',
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
            'summary' => 'This action enables you to query the service to request a refresh for a specific Trusted Advisor check. Your request body contains a CheckId for which you are querying. The response body contains a RefreshTrustedAdvisorCheckResult object containing Status and TimeUntilNextRefresh fields.',
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
                'result_key' => 'severityLevels',
            ),
            'DescribeTrustedAdvisorChecks' => array(
                'result_key' => 'checks',
            ),
        ),
    ),
);
