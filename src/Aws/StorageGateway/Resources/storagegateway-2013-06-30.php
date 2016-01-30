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
    'apiVersion' => '2013-06-30',
    'endpointPrefix' => 'storagegateway',
    'serviceFullName' => 'AWS Storage Gateway',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'StorageGateway_20130630.',
    'signatureVersion' => 'v4',
    'namespace' => 'StorageGateway',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'storagegateway.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'storagegateway.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'storagegateway.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'storagegateway.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'storagegateway.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'storagegateway.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'storagegateway.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'storagegateway.sa-east-1.amazonaws.com',
        ),
        'cn-north-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'storagegateway.cn-north-1.amazonaws.com.cn',
        ),
    ),
    'operations' => array(
        'ActivateGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ActivateGatewayOutput',
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
                    'default' => 'StorageGateway_20130630.ActivateGateway',
                ),
                'ActivationKey' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'GatewayName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 2,
                ),
                'GatewayTimezone' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                ),
                'GatewayRegion' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'GatewayType' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 2,
                ),
                'TapeDriveType' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 2,
                ),
                'MediumChangerType' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 2,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'AddCache' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'AddCacheOutput',
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
                    'default' => 'StorageGateway_20130630.AddCache',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'DiskIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                        'minLength' => 1,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'AddTagsToResource' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'AddTagsToResourceOutput',
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
                    'default' => 'StorageGateway_20130630.AddTagsToResource',
                ),
                'ResourceARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'Tags' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'required' => true,
                                'type' => 'string',
                                'minLength' => 1,
                            ),
                            'Value' => array(
                                'required' => true,
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'AddUploadBuffer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'AddUploadBufferOutput',
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
                    'default' => 'StorageGateway_20130630.AddUploadBuffer',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'DiskIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                        'minLength' => 1,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'AddWorkingStorage' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'AddWorkingStorageOutput',
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
                    'default' => 'StorageGateway_20130630.AddWorkingStorage',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'DiskIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                        'minLength' => 1,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'CancelArchival' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CancelArchivalOutput',
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
                    'default' => 'StorageGateway_20130630.CancelArchival',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'TapeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'CancelRetrieval' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CancelRetrievalOutput',
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
                    'default' => 'StorageGateway_20130630.CancelRetrieval',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'TapeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'CreateCachediSCSIVolume' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateCachediSCSIVolumeOutput',
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
                    'default' => 'StorageGateway_20130630.CreateCachediSCSIVolume',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'VolumeSizeInBytes' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'SnapshotId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'TargetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'NetworkInterfaceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'ClientToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 5,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'CreateSnapshot' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateSnapshotOutput',
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
                    'default' => 'StorageGateway_20130630.CreateSnapshot',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'SnapshotDescription' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'CreateSnapshotFromVolumeRecoveryPoint' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateSnapshotFromVolumeRecoveryPointOutput',
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
                    'default' => 'StorageGateway_20130630.CreateSnapshotFromVolumeRecoveryPoint',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'SnapshotDescription' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'CreateStorediSCSIVolume' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateStorediSCSIVolumeOutput',
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
                    'default' => 'StorageGateway_20130630.CreateStorediSCSIVolume',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'DiskId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'SnapshotId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'PreserveExistingData' => array(
                    'required' => true,
                    'type' => 'boolean',
                    'format' => 'boolean-string',
                    'location' => 'json',
                ),
                'TargetName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'NetworkInterfaceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'CreateTapes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'CreateTapesOutput',
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
                    'default' => 'StorageGateway_20130630.CreateTapes',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'TapeSizeInBytes' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'ClientToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 5,
                ),
                'NumTapesToCreate' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 10,
                ),
                'TapeBarcodePrefix' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DeleteBandwidthRateLimit' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteBandwidthRateLimitOutput',
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
                    'default' => 'StorageGateway_20130630.DeleteBandwidthRateLimit',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'BandwidthType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DeleteChapCredentials' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteChapCredentialsOutput',
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
                    'default' => 'StorageGateway_20130630.DeleteChapCredentials',
                ),
                'TargetARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'InitiatorName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DeleteGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteGatewayOutput',
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
                    'default' => 'StorageGateway_20130630.DeleteGateway',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DeleteSnapshotSchedule' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteSnapshotScheduleOutput',
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
                    'default' => 'StorageGateway_20130630.DeleteSnapshotSchedule',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DeleteTape' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteTapeOutput',
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
                    'default' => 'StorageGateway_20130630.DeleteTape',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'TapeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DeleteTapeArchive' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteTapeArchiveOutput',
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
                    'default' => 'StorageGateway_20130630.DeleteTapeArchive',
                ),
                'TapeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DeleteVolume' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteVolumeOutput',
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
                    'default' => 'StorageGateway_20130630.DeleteVolume',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeBandwidthRateLimit' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeBandwidthRateLimitOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeBandwidthRateLimit',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeCache' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeCacheOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeCache',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeCachediSCSIVolumes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeCachediSCSIVolumesOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeCachediSCSIVolumes',
                ),
                'VolumeARNs' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'VolumeARN',
                        'type' => 'string',
                        'minLength' => 50,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeChapCredentials' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeChapCredentialsOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeChapCredentials',
                ),
                'TargetARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeGatewayInformation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeGatewayInformationOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeGatewayInformation',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeMaintenanceStartTime' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeMaintenanceStartTimeOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeMaintenanceStartTime',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeSnapshotSchedule' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeSnapshotScheduleOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeSnapshotSchedule',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeStorediSCSIVolumes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeStorediSCSIVolumesOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeStorediSCSIVolumes',
                ),
                'VolumeARNs' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'VolumeARN',
                        'type' => 'string',
                        'minLength' => 50,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeTapeArchives' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTapeArchivesOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeTapeArchives',
                ),
                'TapeARNs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'TapeARN',
                        'type' => 'string',
                        'minLength' => 50,
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeTapeRecoveryPoints' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTapeRecoveryPointsOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeTapeRecoveryPoints',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeTapes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeTapesOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeTapes',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'TapeARNs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'TapeARN',
                        'type' => 'string',
                        'minLength' => 50,
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeUploadBuffer' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeUploadBufferOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeUploadBuffer',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeVTLDevices' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeVTLDevicesOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeVTLDevices',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'VTLDeviceARNs' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'VTLDeviceARN',
                        'type' => 'string',
                        'minLength' => 50,
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DescribeWorkingStorage' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DescribeWorkingStorageOutput',
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
                    'default' => 'StorageGateway_20130630.DescribeWorkingStorage',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'DisableGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DisableGatewayOutput',
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
                    'default' => 'StorageGateway_20130630.DisableGateway',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ListGateways' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListGatewaysOutput',
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
                    'default' => 'StorageGateway_20130630.ListGateways',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ListLocalDisks' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListLocalDisksOutput',
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
                    'default' => 'StorageGateway_20130630.ListLocalDisks',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ListTagsForResource' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListTagsForResourceOutput',
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
                    'default' => 'StorageGateway_20130630.ListTagsForResource',
                ),
                'ResourceARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ListVolumeInitiators' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListVolumeInitiatorsOutput',
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
                    'default' => 'StorageGateway_20130630.ListVolumeInitiators',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ListVolumeRecoveryPoints' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListVolumeRecoveryPointsOutput',
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
                    'default' => 'StorageGateway_20130630.ListVolumeRecoveryPoints',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ListVolumes' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ListVolumesOutput',
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
                    'default' => 'StorageGateway_20130630.ListVolumes',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'RemoveTagsFromResource' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RemoveTagsFromResourceOutput',
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
                    'default' => 'StorageGateway_20130630.RemoveTagsFromResource',
                ),
                'ResourceARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'TagKeys' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'TagKey',
                        'type' => 'string',
                        'minLength' => 1,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ResetCache' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ResetCacheOutput',
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
                    'default' => 'StorageGateway_20130630.ResetCache',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'RetrieveTapeArchive' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RetrieveTapeArchiveOutput',
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
                    'default' => 'StorageGateway_20130630.RetrieveTapeArchive',
                ),
                'TapeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'RetrieveTapeRecoveryPoint' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'RetrieveTapeRecoveryPointOutput',
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
                    'default' => 'StorageGateway_20130630.RetrieveTapeRecoveryPoint',
                ),
                'TapeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'ShutdownGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ShutdownGatewayOutput',
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
                    'default' => 'StorageGateway_20130630.ShutdownGateway',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'StartGateway' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'StartGatewayOutput',
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
                    'default' => 'StorageGateway_20130630.StartGateway',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'UpdateBandwidthRateLimit' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateBandwidthRateLimitOutput',
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
                    'default' => 'StorageGateway_20130630.UpdateBandwidthRateLimit',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'AverageUploadRateLimitInBitsPerSec' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 51200,
                ),
                'AverageDownloadRateLimitInBitsPerSec' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 102400,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'UpdateChapCredentials' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateChapCredentialsOutput',
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
                    'default' => 'StorageGateway_20130630.UpdateChapCredentials',
                ),
                'TargetARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'SecretToAuthenticateInitiator' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'InitiatorName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
                'SecretToAuthenticateTarget' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'UpdateGatewayInformation' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateGatewayInformationOutput',
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
                    'default' => 'StorageGateway_20130630.UpdateGatewayInformation',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'GatewayName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 2,
                ),
                'GatewayTimezone' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 3,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'UpdateGatewaySoftwareNow' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateGatewaySoftwareNowOutput',
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
                    'default' => 'StorageGateway_20130630.UpdateGatewaySoftwareNow',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'UpdateMaintenanceStartTime' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateMaintenanceStartTimeOutput',
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
                    'default' => 'StorageGateway_20130630.UpdateMaintenanceStartTime',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'HourOfDay' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 23,
                ),
                'MinuteOfHour' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 59,
                ),
                'DayOfWeek' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 6,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'UpdateSnapshotSchedule' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateSnapshotScheduleOutput',
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
                    'default' => 'StorageGateway_20130630.UpdateSnapshotSchedule',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'StartAt' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                    'maximum' => 23,
                ),
                'RecurrenceInHours' => array(
                    'required' => true,
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                    'maximum' => 24,
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
        'UpdateVTLDeviceType' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'UpdateVTLDeviceTypeOutput',
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
                    'default' => 'StorageGateway_20130630.UpdateVTLDeviceType',
                ),
                'VTLDeviceARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                ),
                'DeviceType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 2,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occurred because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occurred during the request. See the error and message fields for more information.',
                    'class' => 'InternalServerErrorException',
                ),
            ),
        ),
    ),
    'models' => array(
        'ActivateGatewayOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'AddCacheOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'AddTagsToResourceOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ResourceARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'AddUploadBufferOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'AddWorkingStorageOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'CancelArchivalOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TapeARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'CancelRetrievalOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TapeARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'CreateCachediSCSIVolumeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                ),
                'TargetARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'CreateSnapshotOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                ),
                'SnapshotId' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'CreateSnapshotFromVolumeRecoveryPointOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SnapshotId' => array(
                    'type' => 'string',
                ),
                'VolumeARN' => array(
                    'type' => 'string',
                ),
                'VolumeRecoveryPointTime' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'CreateStorediSCSIVolumeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                ),
                'VolumeSizeInBytes' => array(
                    'type' => 'numeric',
                ),
                'TargetARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'CreateTapesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TapeARNs' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'TapeARN',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'DeleteBandwidthRateLimitOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DeleteChapCredentialsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TargetARN' => array(
                    'type' => 'string',
                ),
                'InitiatorName' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DeleteGatewayOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DeleteSnapshotScheduleOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DeleteTapeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TapeARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DeleteTapeArchiveOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TapeARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DeleteVolumeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DescribeBandwidthRateLimitOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'AverageUploadRateLimitInBitsPerSec' => array(
                    'type' => 'numeric',
                ),
                'AverageDownloadRateLimitInBitsPerSec' => array(
                    'type' => 'numeric',
                ),
            ),
        ),
        'DescribeCacheOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'DiskIds' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                    ),
                ),
                'CacheAllocatedInBytes' => array(
                    'type' => 'numeric',
                ),
                'CacheUsedPercentage' => array(
                    'type' => 'numeric',
                ),
                'CacheDirtyPercentage' => array(
                    'type' => 'numeric',
                ),
                'CacheHitPercentage' => array(
                    'type' => 'numeric',
                ),
                'CacheMissPercentage' => array(
                    'type' => 'numeric',
                ),
            ),
        ),
        'DescribeCachediSCSIVolumesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CachediSCSIVolumes' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'CachediSCSIVolume',
                        'type' => 'object',
                        'properties' => array(
                            'VolumeARN' => array(
                                'type' => 'string',
                            ),
                            'VolumeId' => array(
                                'type' => 'string',
                            ),
                            'VolumeType' => array(
                                'type' => 'string',
                            ),
                            'VolumeStatus' => array(
                                'type' => 'string',
                            ),
                            'VolumeSizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'VolumeProgress' => array(
                                'type' => 'numeric',
                            ),
                            'SourceSnapshotId' => array(
                                'type' => 'string',
                            ),
                            'VolumeiSCSIAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'TargetARN' => array(
                                        'type' => 'string',
                                    ),
                                    'NetworkInterfaceId' => array(
                                        'type' => 'string',
                                    ),
                                    'NetworkInterfacePort' => array(
                                        'type' => 'numeric',
                                    ),
                                    'LunNumber' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ChapEnabled' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeChapCredentialsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ChapCredentials' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'ChapInfo',
                        'type' => 'object',
                        'properties' => array(
                            'TargetARN' => array(
                                'type' => 'string',
                            ),
                            'SecretToAuthenticateInitiator' => array(
                                'type' => 'string',
                            ),
                            'InitiatorName' => array(
                                'type' => 'string',
                            ),
                            'SecretToAuthenticateTarget' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeGatewayInformationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'GatewayId' => array(
                    'type' => 'string',
                ),
                'GatewayName' => array(
                    'type' => 'string',
                ),
                'GatewayTimezone' => array(
                    'type' => 'string',
                ),
                'GatewayState' => array(
                    'type' => 'string',
                ),
                'GatewayNetworkInterfaces' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'NetworkInterface',
                        'type' => 'object',
                        'properties' => array(
                            'Ipv4Address' => array(
                                'type' => 'string',
                            ),
                            'MacAddress' => array(
                                'type' => 'string',
                            ),
                            'Ipv6Address' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'GatewayType' => array(
                    'type' => 'string',
                ),
                'NextUpdateAvailabilityDate' => array(
                    'type' => 'string',
                ),
                'LastSoftwareUpdate' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DescribeMaintenanceStartTimeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'HourOfDay' => array(
                    'type' => 'numeric',
                ),
                'MinuteOfHour' => array(
                    'type' => 'numeric',
                ),
                'DayOfWeek' => array(
                    'type' => 'numeric',
                ),
                'Timezone' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DescribeSnapshotScheduleOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                ),
                'StartAt' => array(
                    'type' => 'numeric',
                ),
                'RecurrenceInHours' => array(
                    'type' => 'numeric',
                ),
                'Description' => array(
                    'type' => 'string',
                ),
                'Timezone' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DescribeStorediSCSIVolumesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StorediSCSIVolumes' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'StorediSCSIVolume',
                        'type' => 'object',
                        'properties' => array(
                            'VolumeARN' => array(
                                'type' => 'string',
                            ),
                            'VolumeId' => array(
                                'type' => 'string',
                            ),
                            'VolumeType' => array(
                                'type' => 'string',
                            ),
                            'VolumeStatus' => array(
                                'type' => 'string',
                            ),
                            'VolumeSizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'VolumeProgress' => array(
                                'type' => 'numeric',
                            ),
                            'VolumeDiskId' => array(
                                'type' => 'string',
                            ),
                            'SourceSnapshotId' => array(
                                'type' => 'string',
                            ),
                            'PreservedExistingData' => array(
                                'type' => 'boolean',
                            ),
                            'VolumeiSCSIAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'TargetARN' => array(
                                        'type' => 'string',
                                    ),
                                    'NetworkInterfaceId' => array(
                                        'type' => 'string',
                                    ),
                                    'NetworkInterfacePort' => array(
                                        'type' => 'numeric',
                                    ),
                                    'LunNumber' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ChapEnabled' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DescribeTapeArchivesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TapeArchives' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'TapeArchive',
                        'type' => 'object',
                        'properties' => array(
                            'TapeARN' => array(
                                'type' => 'string',
                            ),
                            'TapeBarcode' => array(
                                'type' => 'string',
                            ),
                            'TapeSizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'CompletionTime' => array(
                                'type' => 'string',
                            ),
                            'RetrievedTo' => array(
                                'type' => 'string',
                            ),
                            'TapeStatus' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DescribeTapeRecoveryPointsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'TapeRecoveryPointInfos' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'TapeRecoveryPointInfo',
                        'type' => 'object',
                        'properties' => array(
                            'TapeARN' => array(
                                'type' => 'string',
                            ),
                            'TapeRecoveryPointTime' => array(
                                'type' => 'string',
                            ),
                            'TapeSizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'TapeStatus' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DescribeTapesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Tapes' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'Tape',
                        'type' => 'object',
                        'properties' => array(
                            'TapeARN' => array(
                                'type' => 'string',
                            ),
                            'TapeBarcode' => array(
                                'type' => 'string',
                            ),
                            'TapeSizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'TapeStatus' => array(
                                'type' => 'string',
                            ),
                            'VTLDevice' => array(
                                'type' => 'string',
                            ),
                            'Progress' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DescribeUploadBufferOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'DiskIds' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                    ),
                ),
                'UploadBufferUsedInBytes' => array(
                    'type' => 'numeric',
                ),
                'UploadBufferAllocatedInBytes' => array(
                    'type' => 'numeric',
                ),
            ),
        ),
        'DescribeVTLDevicesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'VTLDevices' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'VTLDevice',
                        'type' => 'object',
                        'properties' => array(
                            'VTLDeviceARN' => array(
                                'type' => 'string',
                            ),
                            'VTLDeviceType' => array(
                                'type' => 'string',
                            ),
                            'VTLDeviceVendor' => array(
                                'type' => 'string',
                            ),
                            'VTLDeviceProductIdentifier' => array(
                                'type' => 'string',
                            ),
                            'DeviceiSCSIAttributes' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'TargetARN' => array(
                                        'type' => 'string',
                                    ),
                                    'NetworkInterfaceId' => array(
                                        'type' => 'string',
                                    ),
                                    'NetworkInterfacePort' => array(
                                        'type' => 'numeric',
                                    ),
                                    'ChapEnabled' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'DescribeWorkingStorageOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'DiskIds' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                    ),
                ),
                'WorkingStorageUsedInBytes' => array(
                    'type' => 'numeric',
                ),
                'WorkingStorageAllocatedInBytes' => array(
                    'type' => 'numeric',
                ),
            ),
        ),
        'DisableGatewayOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'ListGatewaysOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Gateways' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'GatewayInfo',
                        'type' => 'object',
                        'properties' => array(
                            'GatewayARN' => array(
                                'type' => 'string',
                            ),
                            'GatewayType' => array(
                                'type' => 'string',
                            ),
                            'GatewayOperationalState' => array(
                                'type' => 'string',
                            ),
                            'GatewayName' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'ListLocalDisksOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'Disks' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'Disk',
                        'type' => 'object',
                        'properties' => array(
                            'DiskId' => array(
                                'type' => 'string',
                            ),
                            'DiskPath' => array(
                                'type' => 'string',
                            ),
                            'DiskNode' => array(
                                'type' => 'string',
                            ),
                            'DiskStatus' => array(
                                'type' => 'string',
                            ),
                            'DiskSizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'DiskAllocationType' => array(
                                'type' => 'string',
                            ),
                            'DiskAllocationResource' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListTagsForResourceOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ResourceARN' => array(
                    'type' => 'string',
                ),
                'Marker' => array(
                    'type' => 'string',
                ),
                'Tags' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'Tag',
                        'type' => 'object',
                        'properties' => array(
                            'Key' => array(
                                'type' => 'string',
                            ),
                            'Value' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListVolumeInitiatorsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Initiators' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'Initiator',
                        'type' => 'string',
                    ),
                ),
            ),
        ),
        'ListVolumeRecoveryPointsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'VolumeRecoveryPointInfos' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'VolumeRecoveryPointInfo',
                        'type' => 'object',
                        'properties' => array(
                            'VolumeARN' => array(
                                'type' => 'string',
                            ),
                            'VolumeSizeInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'VolumeUsageInBytes' => array(
                                'type' => 'numeric',
                            ),
                            'VolumeRecoveryPointTime' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'ListVolumesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'Marker' => array(
                    'type' => 'string',
                ),
                'VolumeInfos' => array(
                    'type' => 'array',
                    'items' => array(
                        'name' => 'VolumeInfo',
                        'type' => 'object',
                        'properties' => array(
                            'VolumeARN' => array(
                                'type' => 'string',
                            ),
                            'VolumeType' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'RemoveTagsFromResourceOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ResourceARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'ResetCacheOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'RetrieveTapeArchiveOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TapeARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'RetrieveTapeRecoveryPointOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TapeARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'ShutdownGatewayOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'StartGatewayOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'UpdateBandwidthRateLimitOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'UpdateChapCredentialsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TargetARN' => array(
                    'type' => 'string',
                ),
                'InitiatorName' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'UpdateGatewayInformationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
                'GatewayName' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'UpdateGatewaySoftwareNowOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'UpdateMaintenanceStartTimeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'UpdateSnapshotScheduleOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
        'UpdateVTLDeviceTypeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VTLDeviceARN' => array(
                    'type' => 'string',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'DescribeCachediSCSIVolumes' => array(
            'result_key' => 'CachediSCSIVolumes',
        ),
        'DescribeStorediSCSIVolumes' => array(
            'result_key' => 'StorediSCSIVolumes',
        ),
        'DescribeTapeArchives' => array(
            'input_token' => 'Marker',
            'limit_key' => 'Limit',
            'output_token' => 'Marker',
            'result_key' => 'TapeArchives',
        ),
        'DescribeTapeRecoveryPoints' => array(
            'input_token' => 'Marker',
            'limit_key' => 'Limit',
            'output_token' => 'Marker',
            'result_key' => 'TapeRecoveryPointInfos',
        ),
        'DescribeTapes' => array(
            'input_token' => 'Marker',
            'limit_key' => 'Limit',
            'output_token' => 'Marker',
            'result_key' => 'Tapes',
        ),
        'DescribeVTLDevices' => array(
            'input_token' => 'Marker',
            'limit_key' => 'Limit',
            'output_token' => 'Marker',
            'result_key' => 'VTLDevices',
        ),
        'ListGateways' => array(
            'input_token' => 'Marker',
            'limit_key' => 'Limit',
            'output_token' => 'Marker',
            'result_key' => 'Gateways',
        ),
        'ListLocalDisks' => array(
            'result_key' => 'Disks',
        ),
        'ListVolumeRecoveryPoints' => array(
            'result_key' => 'VolumeRecoveryPointInfos',
        ),
        'ListVolumes' => array(
            'input_token' => 'Marker',
            'limit_key' => 'Limit',
            'output_token' => 'Marker',
            'result_key' => 'VolumeInfos',
        ),
    ),
);
