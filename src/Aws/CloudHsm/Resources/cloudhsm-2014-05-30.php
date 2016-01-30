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
    'apiVersion' => '2014-05-30',
    'endpointPrefix' => 'cloudhsm',
    'serviceFullName' => 'Amazon CloudHSM',
    'serviceAbbreviation' => 'CloudHSM',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'CloudHsmFrontendService.',
    'signatureVersion' => 'v4',
    'namespace' => 'CloudHsm',
    'operations' => array(
        'CreateHapg' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateHapgResponse',
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
                    'default' => 'CloudHsmFrontendService.CreateHapg',
                ),
                'Label' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'CreateHsm' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateHsmResponse',
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
                    'default' => 'CloudHsmFrontendService.CreateHsm',
                ),
                'SubnetId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshKey' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'EniIp' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IamRoleArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ExternalId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SubscriptionType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ClientToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SyslogIp' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'CreateLunaClient' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateLunaClientResponse',
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
                    'default' => 'CloudHsmFrontendService.CreateLunaClient',
                ),
                'Label' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Certificate' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 600,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'DeleteHapg' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteHapgResponse',
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
                    'default' => 'CloudHsmFrontendService.DeleteHapg',
                ),
                'HapgArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'DeleteHsm' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteHsmResponse',
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
                    'default' => 'CloudHsmFrontendService.DeleteHsm',
                ),
                'HsmArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'DeleteLunaClient' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteLunaClientResponse',
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
                    'default' => 'CloudHsmFrontendService.DeleteLunaClient',
                ),
                'ClientArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'DescribeHapg' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeHapgResponse',
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
                    'default' => 'CloudHsmFrontendService.DescribeHapg',
                ),
                'HapgArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'DescribeHsm' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeHsmResponse',
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
                    'default' => 'CloudHsmFrontendService.DescribeHsm',
                ),
                'HsmArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HsmSerialNumber' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'DescribeLunaClient' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeLunaClientResponse',
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
                    'default' => 'CloudHsmFrontendService.DescribeLunaClient',
                ),
                'ClientArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CertificateFingerprint' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'GetConfig' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'GetConfigResponse',
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
                    'default' => 'CloudHsmFrontendService.GetConfig',
                ),
                'ClientArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ClientVersion' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HapgList' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'HapgArn',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ListAvailableZones' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListAvailableZonesResponse',
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
                    'default' => 'CloudHsmFrontendService.ListAvailableZones',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ListHapgs' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListHapgsResponse',
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
                    'default' => 'CloudHsmFrontendService.ListHapgs',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ListHsms' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListHsmsResponse',
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
                    'default' => 'CloudHsmFrontendService.ListHsms',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ListLunaClients' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListLunaClientsResponse',
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
                    'default' => 'CloudHsmFrontendService.ListLunaClients',
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ModifyHapg' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ModifyHapgResponse',
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
                    'default' => 'CloudHsmFrontendService.ModifyHapg',
                ),
                'HapgArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Label' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'PartitionSerialList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PartitionSerial',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ModifyHsm' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ModifyHsmResponse',
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
                    'default' => 'CloudHsmFrontendService.ModifyHsm',
                ),
                'HsmArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SubnetId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'EniIp' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IamRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ExternalId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SyslogIp' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
                array(
                    'reason' => 'Indicates that an internal error occurred.',
                    'class' => 'CloudHsmInternalException',
                ),
                array(
                    'reason' => 'Indicates that one or more of the request parameters are not valid.',
                    'class' => 'InvalidRequestException',
                ),
            ),
        ),
        'ModifyLunaClient' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ModifyLunaClientResponse',
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
                    'default' => 'CloudHsmFrontendService.ModifyLunaClient',
                ),
                'ClientArn' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Certificate' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 600,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Indicates that an exception occurred in the AWS CloudHSM service.',
                    'class' => 'CloudHsmServiceException',
                ),
            ),
        ),
    ),
    'models' => array(
        'CreateHapgResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HapgArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateHsmResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HsmArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateLunaClientResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ClientArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteHapgResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteHsmResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteLunaClientResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeHapgResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HapgArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HapgSerial' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HsmsLastActionFailed' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'HsmArn',
                        'type' => 'string',
                    ),
                ),
                'HsmsPendingDeletion' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'HsmArn',
                        'type' => 'string',
                    ),
                ),
                'HsmsPendingRegistration' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'HsmArn',
                        'type' => 'string',
                    ),
                ),
                'Label' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LastModifiedTimestamp' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'PartitionSerialList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PartitionSerial',
                        'type' => 'string',
                    ),
                ),
                'State' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeHsmResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HsmArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Status' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StatusDetails' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AvailabilityZone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'EniId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'EniIp' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SubscriptionType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SubscriptionStartDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SubscriptionEndDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VpcId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SubnetId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'IamRoleArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SerialNumber' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VendorName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HsmType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SoftwareVersion' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshPublicKey' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SshKeyLastUpdated' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ServerCertUri' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ServerCertLastUpdated' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Partitions' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'PartitionArn',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'DescribeLunaClientResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ClientArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Certificate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'CertificateFingerprint' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'LastModifiedTimestamp' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Label' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'GetConfigResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ConfigType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ConfigFile' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ConfigCred' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListAvailableZonesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'AZList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'AZ',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'ListHapgsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HapgList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'HapgArn',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListHsmsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HsmList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'HsmArn',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListLunaClientsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ClientList' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ClientArn',
                        'type' => 'string',
                    ),
                ),
                'NextToken' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ModifyHapgResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HapgArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ModifyHsmResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HsmArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ModifyLunaClientResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ClientArn' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
);
