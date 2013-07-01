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
    'apiVersion' => '2012-06-30',
    'endpointPrefix' => 'storagegateway',
    'serviceFullName' => 'AWS Storage Gateway',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'StorageGateway_20120630.',
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
                    'default' => 'StorageGateway_20120630.ActivateGateway',
                ),
                'ActivationKey' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 50,
                ),
                'GatewayName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 2,
                    'maxLength' => 255,
                ),
                'GatewayTimezone' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'GMT-12:00',
                        'GMT-11:00',
                        'GMT-10:00',
                        'GMT-9:00',
                        'GMT-8:00',
                        'GMT-7:00',
                        'GMT-6:00',
                        'GMT-5:00',
                        'GMT-4:00',
                        'GMT-3:30',
                        'GMT-3:00',
                        'GMT-2:00',
                        'GMT-1:00',
                        'GMT',
                        'GMT+1:00',
                        'GMT+2:00',
                        'GMT+3:00',
                        'GMT+3:30',
                        'GMT+4:00',
                        'GMT+4:30',
                        'GMT+5:00',
                        'GMT+5:30',
                        'GMT+5:45',
                        'GMT+6:00',
                        'GMT+7:00',
                        'GMT+8:00',
                        'GMT+9:00',
                        'GMT+9:30',
                        'GMT+10:00',
                        'GMT+11:00',
                        'GMT+12:00',
                    ),
                ),
                'GatewayRegion' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 25,
                ),
                'GatewayType' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'STORED',
                        'CACHED',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.AddCache',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
                'DiskIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 300,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.AddUploadBuffer',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
                'DiskIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 300,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.AddWorkingStorage',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
                'DiskIds' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                        'minLength' => 1,
                        'maxLength' => 300,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.CreateCachediSCSIVolume',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
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
                    'maxLength' => 200,
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
                    'maxLength' => 100,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.CreateSnapshot',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
                'SnapshotDescription' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.CreateSnapshotFromVolumeRecoveryPoint',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
                'SnapshotDescription' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.CreateStorediSCSIVolume',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
                'DiskId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 300,
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
                    'maxLength' => 200,
                ),
                'NetworkInterfaceId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DeleteBandwidthRateLimit',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
                'BandwidthType' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'UPLOAD',
                        'DOWNLOAD',
                        'ALL',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DeleteChapCredentials',
                ),
                'TargetARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 800,
                ),
                'InitiatorName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DeleteGateway',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DeleteSnapshotSchedule',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DeleteVolume',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DescribeBandwidthRateLimit',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DescribeCache',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DescribeCachediSCSIVolumes',
                ),
                'VolumeARNs' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'VolumeARN',
                        'type' => 'string',
                        'minLength' => 50,
                        'maxLength' => 500,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DescribeChapCredentials',
                ),
                'TargetARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 800,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DescribeGatewayInformation',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DescribeMaintenanceStartTime',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DescribeSnapshotSchedule',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DescribeStorediSCSIVolumes',
                ),
                'VolumeARNs' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'VolumeARN',
                        'type' => 'string',
                        'minLength' => 50,
                        'maxLength' => 500,
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DescribeUploadBuffer',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.DescribeWorkingStorage',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.ListGateways',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1000,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.ListLocalDisks',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.ListVolumeRecoveryPoints',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.ListVolumes',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 1000,
                ),
                'Limit' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                    'minimum' => 1,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.ShutdownGateway',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.StartGateway',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.UpdateBandwidthRateLimit',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
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
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.UpdateChapCredentials',
                ),
                'TargetARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 800,
                ),
                'SecretToAuthenticateInitiator' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 12,
                    'maxLength' => 16,
                ),
                'InitiatorName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 1,
                    'maxLength' => 255,
                ),
                'SecretToAuthenticateTarget' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 12,
                    'maxLength' => 16,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.UpdateGatewayInformation',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
                'GatewayName' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 2,
                    'maxLength' => 255,
                ),
                'GatewayTimezone' => array(
                    'type' => 'string',
                    'location' => 'json',
                    'enum' => array(
                        'GMT-12:00',
                        'GMT-11:00',
                        'GMT-10:00',
                        'GMT-9:00',
                        'GMT-8:00',
                        'GMT-7:00',
                        'GMT-6:00',
                        'GMT-5:00',
                        'GMT-4:00',
                        'GMT-3:30',
                        'GMT-3:00',
                        'GMT-2:00',
                        'GMT-1:00',
                        'GMT',
                        'GMT+1:00',
                        'GMT+2:00',
                        'GMT+3:00',
                        'GMT+3:30',
                        'GMT+4:00',
                        'GMT+4:30',
                        'GMT+5:00',
                        'GMT+5:30',
                        'GMT+5:45',
                        'GMT+6:00',
                        'GMT+7:00',
                        'GMT+8:00',
                        'GMT+9:00',
                        'GMT+9:30',
                        'GMT+10:00',
                        'GMT+11:00',
                        'GMT+12:00',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.UpdateGatewaySoftwareNow',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.UpdateMaintenanceStartTime',
                ),
                'GatewayARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
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
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'default' => 'StorageGateway_20120630.UpdateSnapshotSchedule',
                ),
                'VolumeARN' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                    'minLength' => 50,
                    'maxLength' => 500,
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
                    'maxLength' => 255,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'An exception occured because an invalid gateway request was issued to the service. See the error and message fields for more information.',
                    'class' => 'InvalidGatewayRequestException',
                ),
                array(
                    'reason' => 'An internal server error has occured during the request. See the error and message fields for more information.',
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
                    'location' => 'json',
                ),
            ),
        ),
        'AddCacheOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'AddUploadBufferOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'AddWorkingStorageOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateCachediSCSIVolumeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'TargetARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateSnapshotOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'SnapshotId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateSnapshotFromVolumeRecoveryPointOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'SnapshotId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VolumeARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VolumeRecoveryPointTime' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'CreateStorediSCSIVolumeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VolumeSizeInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'TargetARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteBandwidthRateLimitOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteChapCredentialsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TargetARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InitiatorName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteGatewayOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteSnapshotScheduleOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DeleteVolumeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeBandwidthRateLimitOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'AverageUploadRateLimitInBitsPerSec' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'AverageDownloadRateLimitInBitsPerSec' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeCacheOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DiskIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                    ),
                ),
                'CacheAllocatedInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'CacheUsedPercentage' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'CacheDirtyPercentage' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'CacheHitPercentage' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'CacheMissPercentage' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeCachediSCSIVolumesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'CachediSCSIVolumes' => array(
                    'type' => 'array',
                    'location' => 'json',
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
                    'location' => 'json',
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
                    'location' => 'json',
                ),
                'GatewayId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'GatewayTimezone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'GatewayState' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'GatewayNetworkInterfaces' => array(
                    'type' => 'array',
                    'location' => 'json',
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
                    'location' => 'json',
                ),
                'NextUpdateAvailabilityDate' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeMaintenanceStartTimeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'HourOfDay' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'MinuteOfHour' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'DayOfWeek' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'Timezone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeSnapshotScheduleOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'StartAt' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'RecurrenceInHours' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'Description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Timezone' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeStorediSCSIVolumesOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'StorediSCSIVolumes' => array(
                    'type' => 'array',
                    'location' => 'json',
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
        'DescribeUploadBufferOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DiskIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                    ),
                ),
                'UploadBufferUsedInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'UploadBufferAllocatedInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
        ),
        'DescribeWorkingStorageOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'DiskIds' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'DiskId',
                        'type' => 'string',
                    ),
                ),
                'WorkingStorageUsedInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'WorkingStorageAllocatedInBytes' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
            ),
        ),
        'ListGatewaysOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'Gateways' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'GatewayInfo',
                        'type' => 'object',
                        'properties' => array(
                            'GatewayARN' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ListLocalDisksOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'Disks' => array(
                    'type' => 'array',
                    'location' => 'json',
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
        'ListVolumeRecoveryPointsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VolumeRecoveryPointInfos' => array(
                    'type' => 'array',
                    'location' => 'json',
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
                    'location' => 'json',
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'VolumeInfos' => array(
                    'type' => 'array',
                    'location' => 'json',
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
        'ShutdownGatewayOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'StartGatewayOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateBandwidthRateLimitOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateChapCredentialsOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'TargetARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'InitiatorName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateGatewayInformationOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateGatewaySoftwareNowOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateMaintenanceStartTimeOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'GatewayARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'UpdateSnapshotScheduleOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'VolumeARN' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'operations' => array(
            'DescribeCachediSCSIVolumes' => array(
                'result_key' => 'CachediSCSIVolumes',
            ),
            'DescribeStorediSCSIVolumes' => array(
                'result_key' => 'StorediSCSIVolumes',
            ),
            'ListGateways' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'Limit',
                'result_key' => 'Gateways',
            ),
            'ListLocalDisks' => array(
                'result_key' => 'Disks',
            ),
            'ListVolumeRecoveryPoints' => array(
                'result_key' => 'VolumeRecoveryPointInfos',
            ),
            'ListVolumes' => array(
                'token_param' => 'Marker',
                'token_key' => 'Marker',
                'limit_key' => 'Limit',
                'result_key' => 'VolumeInfos',
            ),
        ),
    ),
);
