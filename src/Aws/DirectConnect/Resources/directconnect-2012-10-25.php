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
    'apiVersion' => '2012-10-25',
    'endpointPrefix' => 'directconnect',
    'serviceFullName' => 'AWS Direct Connect',
    'serviceType' => 'json',
    'jsonVersion' => '1.1',
    'targetPrefix' => 'OvertureService.',
    'signatureVersion' => 'v4',
    'namespace' => 'DirectConnect',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'directconnect.us-east-1.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'directconnect.us-west-1.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'directconnect.us-west-2.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'directconnect.eu-west-1.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'directconnect.ap-northeast-1.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'directconnect.ap-southeast-1.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'directconnect.ap-southeast-2.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'directconnect.sa-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        'CreateConnection' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'Connection',
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
                    'default' => 'OvertureService.CreateConnection',
                ),
                'offeringId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
                'connectionName' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A server-side error occurred during the API call. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectServerException',
                ),
                array(
                    'reason' => 'The API was called with invalid parameters. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectClientException',
                ),
            ),
        ),
        'CreatePrivateVirtualInterface' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'VirtualInterface',
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
                    'default' => 'OvertureService.CreatePrivateVirtualInterface',
                ),
                'connectionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'newPrivateVirtualInterface' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'virtualInterfaceName' => array(
                            'type' => 'string',
                        ),
                        'vlan' => array(
                            'type' => 'numeric',
                        ),
                        'asn' => array(
                            'type' => 'numeric',
                        ),
                        'authKey' => array(
                            'type' => 'string',
                        ),
                        'amazonAddress' => array(
                            'type' => 'string',
                        ),
                        'customerAddress' => array(
                            'type' => 'string',
                        ),
                        'virtualGatewayId' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A server-side error occurred during the API call. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectServerException',
                ),
                array(
                    'reason' => 'The API was called with invalid parameters. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectClientException',
                ),
            ),
        ),
        'CreatePublicVirtualInterface' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'VirtualInterface',
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
                    'default' => 'OvertureService.CreatePublicVirtualInterface',
                ),
                'connectionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'newPublicVirtualInterface' => array(
                    'type' => 'object',
                    'location' => 'json',
                    'properties' => array(
                        'virtualInterfaceName' => array(
                            'type' => 'string',
                        ),
                        'vlan' => array(
                            'type' => 'numeric',
                        ),
                        'asn' => array(
                            'type' => 'numeric',
                        ),
                        'authKey' => array(
                            'type' => 'string',
                        ),
                        'amazonAddress' => array(
                            'type' => 'string',
                        ),
                        'customerAddress' => array(
                            'type' => 'string',
                        ),
                        'routeFilterPrefixes' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'RouteFilterPrefix',
                                'type' => 'object',
                                'properties' => array(
                                    'cidr' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A server-side error occurred during the API call. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectServerException',
                ),
                array(
                    'reason' => 'The API was called with invalid parameters. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectClientException',
                ),
            ),
        ),
        'DeleteConnection' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'Connection',
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
                    'default' => 'OvertureService.DeleteConnection',
                ),
                'connectionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A server-side error occurred during the API call. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectServerException',
                ),
                array(
                    'reason' => 'The API was called with invalid parameters. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectClientException',
                ),
            ),
        ),
        'DeleteVirtualInterface' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'DeleteVirtualInterfaceResponse',
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
                    'default' => 'OvertureService.DeleteVirtualInterface',
                ),
                'virtualInterfaceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A server-side error occurred during the API call. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectServerException',
                ),
                array(
                    'reason' => 'The API was called with invalid parameters. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectClientException',
                ),
            ),
        ),
        'DescribeConnectionDetail' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'ConnectionDetail',
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
                    'default' => 'OvertureService.DescribeConnectionDetail',
                ),
                'connectionId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A server-side error occurred during the API call. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectServerException',
                ),
                array(
                    'reason' => 'The API was called with invalid parameters. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectClientException',
                ),
            ),
        ),
        'DescribeConnections' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'Connections',
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
                    'default' => 'OvertureService.DescribeConnections',
                ),
                'connectionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A server-side error occurred during the API call. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectServerException',
                ),
                array(
                    'reason' => 'The API was called with invalid parameters. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectClientException',
                ),
            ),
        ),
        'DescribeOfferingDetail' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'OfferingDetail',
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
                    'default' => 'OvertureService.DescribeOfferingDetail',
                ),
                'offeringId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A server-side error occurred during the API call. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectServerException',
                ),
                array(
                    'reason' => 'The API was called with invalid parameters. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectClientException',
                ),
            ),
        ),
        'DescribeOfferings' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'Offerings',
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
                    'default' => 'OvertureService.DescribeOfferings',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A server-side error occurred during the API call. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectServerException',
                ),
                array(
                    'reason' => 'The API was called with invalid parameters. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectClientException',
                ),
            ),
        ),
        'DescribeVirtualGateways' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'VirtualGateways',
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
                    'default' => 'OvertureService.DescribeVirtualGateways',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A server-side error occurred during the API call. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectServerException',
                ),
                array(
                    'reason' => 'The API was called with invalid parameters. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectClientException',
                ),
            ),
        ),
        'DescribeVirtualInterfaces' => array(
            'httpMethod' => 'POST',
            'uri' => '/',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'VirtualInterfaces',
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
                    'default' => 'OvertureService.DescribeVirtualInterfaces',
                ),
                'connectionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'virtualInterfaceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'A server-side error occurred during the API call. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectServerException',
                ),
                array(
                    'reason' => 'The API was called with invalid parameters. The error message will contain additional details about the cause.',
                    'class' => 'DirectConnectClientException',
                ),
            ),
        ),
    ),
    'models' => array(
        'Connection' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'connectionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'connectionName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'connectionState' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'region' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'location' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'VirtualInterface' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'virtualInterfaceId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'location' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'connectionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'virtualInterfaceType' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'virtualInterfaceName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'vlan' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'asn' => array(
                    'type' => 'numeric',
                    'location' => 'json',
                ),
                'authKey' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'amazonAddress' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'customerAddress' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'virtualInterfaceState' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'customerRouterConfig' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'virtualGatewayId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'routeFilterPrefixes' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'RouteFilterPrefix',
                        'type' => 'object',
                        'properties' => array(
                            'cidr' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'DeleteVirtualInterfaceResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'virtualInterfaceState' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
            ),
        ),
        'ConnectionDetail' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'connectionId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'connectionName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'connectionState' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'region' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'location' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'bandwidth' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'connectionCosts' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ConnectionCost',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            'unit' => array(
                                'type' => 'string',
                            ),
                            'currencyCode' => array(
                                'type' => 'string',
                            ),
                            'amount' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'orderSteps' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ConnectionOrderStep',
                        'type' => 'object',
                        'properties' => array(
                            'number' => array(
                                'type' => 'string',
                            ),
                            'name' => array(
                                'type' => 'string',
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                            'owner' => array(
                                'type' => 'string',
                            ),
                            'sla' => array(
                                'type' => 'numeric',
                            ),
                            'stepState' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'Connections' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'connections' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Connection',
                        'type' => 'object',
                        'properties' => array(
                            'connectionId' => array(
                                'type' => 'string',
                            ),
                            'connectionName' => array(
                                'type' => 'string',
                            ),
                            'connectionState' => array(
                                'type' => 'string',
                            ),
                            'region' => array(
                                'type' => 'string',
                            ),
                            'location' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'OfferingDetail' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'offeringId' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'region' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'location' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'offeringName' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'description' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'bandwidth' => array(
                    'type' => 'string',
                    'location' => 'json',
                ),
                'connectionCosts' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'ConnectionCost',
                        'type' => 'object',
                        'properties' => array(
                            'name' => array(
                                'type' => 'string',
                            ),
                            'unit' => array(
                                'type' => 'string',
                            ),
                            'currencyCode' => array(
                                'type' => 'string',
                            ),
                            'amount' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'orderSteps' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'OfferingOrderStep',
                        'type' => 'object',
                        'properties' => array(
                            'number' => array(
                                'type' => 'string',
                            ),
                            'name' => array(
                                'type' => 'string',
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                            'owner' => array(
                                'type' => 'string',
                            ),
                            'sla' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'Offerings' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'offerings' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'Offering',
                        'type' => 'object',
                        'properties' => array(
                            'offeringId' => array(
                                'type' => 'string',
                            ),
                            'region' => array(
                                'type' => 'string',
                            ),
                            'location' => array(
                                'type' => 'string',
                            ),
                            'offeringName' => array(
                                'type' => 'string',
                            ),
                            'description' => array(
                                'type' => 'string',
                            ),
                            'bandwidth' => array(
                                'type' => 'string',
                            ),
                            'connectionCosts' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ConnectionCost',
                                    'type' => 'object',
                                    'properties' => array(
                                        'name' => array(
                                            'type' => 'string',
                                        ),
                                        'unit' => array(
                                            'type' => 'string',
                                        ),
                                        'currencyCode' => array(
                                            'type' => 'string',
                                        ),
                                        'amount' => array(
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
        'VirtualGateways' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'virtualGateways' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'VirtualGateway',
                        'type' => 'object',
                        'properties' => array(
                            'virtualGatewayId' => array(
                                'type' => 'string',
                            ),
                            'virtualGatewayState' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'VirtualInterfaces' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'virtualInterfaces' => array(
                    'type' => 'array',
                    'location' => 'json',
                    'items' => array(
                        'name' => 'VirtualInterface',
                        'type' => 'object',
                        'properties' => array(
                            'virtualInterfaceId' => array(
                                'type' => 'string',
                            ),
                            'location' => array(
                                'type' => 'string',
                            ),
                            'connectionId' => array(
                                'type' => 'string',
                            ),
                            'virtualInterfaceType' => array(
                                'type' => 'string',
                            ),
                            'virtualInterfaceName' => array(
                                'type' => 'string',
                            ),
                            'vlan' => array(
                                'type' => 'numeric',
                            ),
                            'asn' => array(
                                'type' => 'numeric',
                            ),
                            'authKey' => array(
                                'type' => 'string',
                            ),
                            'amazonAddress' => array(
                                'type' => 'string',
                            ),
                            'customerAddress' => array(
                                'type' => 'string',
                            ),
                            'virtualInterfaceState' => array(
                                'type' => 'string',
                            ),
                            'customerRouterConfig' => array(
                                'type' => 'string',
                            ),
                            'virtualGatewayId' => array(
                                'type' => 'string',
                            ),
                            'routeFilterPrefixes' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'RouteFilterPrefix',
                                    'type' => 'object',
                                    'properties' => array(
                                        'cidr' => array(
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
    ),
);
