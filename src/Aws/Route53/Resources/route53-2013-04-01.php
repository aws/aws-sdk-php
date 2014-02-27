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
    'apiVersion' => '2013-04-01',
    'endpointPrefix' => 'route53',
    'serviceFullName' => 'Amazon Route 53',
    'serviceAbbreviation' => 'Route 53',
    'serviceType' => 'rest-xml',
    'globalEndpoint' => 'route53.amazonaws.com',
    'signatureVersion' => 'v3https',
    'namespace' => 'Route53',
    'regions' => array(
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'us-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'us-west-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'eu-west-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'ap-northeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'ap-southeast-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'ap-southeast-2' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
        'sa-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'route53.amazonaws.com',
        ),
    ),
    'operations' => array(
        'ChangeResourceRecordSets' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/hostedzone/{HostedZoneId}/rrset/',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ChangeResourceRecordSetsResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'ChangeResourceRecordSetsRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'HostedZoneId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                    'filters' => array(
                        'Aws\\Route53\\Route53Client::cleanId',
                    ),
                ),
                'ChangeBatch' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Comment' => array(
                            'type' => 'string',
                            'maxLength' => 256,
                        ),
                        'Changes' => array(
                            'required' => true,
                            'type' => 'array',
                            'minItems' => 1,
                            'items' => array(
                                'name' => 'Change',
                                'type' => 'object',
                                'properties' => array(
                                    'Action' => array(
                                        'required' => true,
                                        'type' => 'string',
                                    ),
                                    'ResourceRecordSet' => array(
                                        'required' => true,
                                        'type' => 'object',
                                        'properties' => array(
                                            'Name' => array(
                                                'required' => true,
                                                'type' => 'string',
                                                'maxLength' => 1024,
                                            ),
                                            'Type' => array(
                                                'required' => true,
                                                'type' => 'string',
                                            ),
                                            'SetIdentifier' => array(
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 128,
                                            ),
                                            'Weight' => array(
                                                'type' => 'numeric',
                                                'maximum' => 255,
                                            ),
                                            'Region' => array(
                                                'type' => 'string',
                                                'minLength' => 1,
                                                'maxLength' => 64,
                                            ),
                                            'Failover' => array(
                                                'type' => 'string',
                                            ),
                                            'TTL' => array(
                                                'type' => 'numeric',
                                                'maximum' => 2147483647,
                                            ),
                                            'ResourceRecords' => array(
                                                'type' => 'array',
                                                'minItems' => 1,
                                                'items' => array(
                                                    'name' => 'ResourceRecord',
                                                    'type' => 'object',
                                                    'properties' => array(
                                                        'Value' => array(
                                                            'required' => true,
                                                            'type' => 'string',
                                                            'maxLength' => 4000,
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            'AliasTarget' => array(
                                                'type' => 'object',
                                                'properties' => array(
                                                    'HostedZoneId' => array(
                                                        'required' => true,
                                                        'type' => 'string',
                                                        'maxLength' => 32,
                                                    ),
                                                    'DNSName' => array(
                                                        'required' => true,
                                                        'type' => 'string',
                                                        'maxLength' => 1024,
                                                    ),
                                                    'EvaluateTargetHealth' => array(
                                                        'required' => true,
                                                        'type' => 'boolean',
                                                        'format' => 'boolean-string',
                                                    ),
                                                ),
                                            ),
                                            'HealthCheckId' => array(
                                                'type' => 'string',
                                                'maxLength' => 64,
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchHostedZoneException',
                ),
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
                array(
                    'reason' => 'This error contains a list of one or more error messages. Each error message indicates one error in the change batch. For more information, see Example InvalidChangeBatch Errors.',
                    'class' => 'InvalidChangeBatchException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The request was rejected because Route 53 was still processing a prior request.',
                    'class' => 'PriorRequestNotCompleteException',
                ),
            ),
        ),
        'CreateHealthCheck' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/healthcheck',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateHealthCheckResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'CreateHealthCheckRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                    'minLength' => 1,
                    'maxLength' => 64,
                ),
                'HealthCheckConfig' => array(
                    'required' => true,
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'IPAddress' => array(
                            'required' => true,
                            'type' => 'string',
                            'maxLength' => 15,
                        ),
                        'Port' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 65535,
                        ),
                        'Type' => array(
                            'required' => true,
                            'type' => 'string',
                        ),
                        'ResourcePath' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'FullyQualifiedDomainName' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'SearchString' => array(
                            'type' => 'string',
                            'maxLength' => 255,
                        ),
                        'RequestInterval' => array(
                            'type' => 'numeric',
                            'minimum' => 10,
                            'maximum' => 30,
                        ),
                        'FailureThreshold' => array(
                            'type' => 'numeric',
                            'minimum' => 1,
                            'maximum' => 10,
                        ),
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'TooManyHealthChecksException',
                ),
                array(
                    'reason' => 'The health check you are trying to create already exists. Route 53 returns this error when a health check has already been created with the specified CallerReference.',
                    'class' => 'HealthCheckAlreadyExistsException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'CreateHostedZone' => array(
            'httpMethod' => 'POST',
            'uri' => '/2013-04-01/hostedzone',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'CreateHostedZoneResponse',
            'responseType' => 'model',
            'data' => array(
                'xmlRoot' => array(
                    'name' => 'CreateHostedZoneRequest',
                    'namespaces' => array(
                        'https://route53.amazonaws.com/doc/2013-04-01/',
                    ),
                ),
            ),
            'parameters' => array(
                'Name' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                    'maxLength' => 1024,
                ),
                'CallerReference' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'xml',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'HostedZoneConfig' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Comment' => array(
                            'type' => 'string',
                            'maxLength' => 256,
                        ),
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'This error indicates that the specified domain name is not valid.',
                    'class' => 'InvalidDomainNameException',
                ),
                array(
                    'reason' => 'The hosted zone you are trying to create already exists. Route 53 returns this error when a hosted zone has already been created with the specified CallerReference.',
                    'class' => 'HostedZoneAlreadyExistsException',
                ),
                array(
                    'reason' => 'This error indicates that you\'ve reached the maximum number of hosted zones that can be created for the current AWS account. You can request an increase to the limit on the Contact Us page.',
                    'class' => 'TooManyHostedZonesException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'Route 53 allows some duplicate domain names, but there is a maximum number of duplicate names. This error indicates that you have reached that maximum. If you want to create another hosted zone with the same name and Route 53 generates this error, you can request an increase to the limit on the Contact Us page.',
                    'class' => 'DelegationSetNotAvailableException',
                ),
            ),
        ),
        'DeleteHealthCheck' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2013-04-01/healthcheck/{HealthCheckId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DeleteHealthCheckResponse',
            'responseType' => 'model',
            'parameters' => array(
                'HealthCheckId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 64,
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
                array(
                    'reason' => 'There are resource records associated with this health check. Before you can delete the health check, you must disassociate it from the resource record sets.',
                    'class' => 'HealthCheckInUseException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'DeleteHostedZone' => array(
            'httpMethod' => 'DELETE',
            'uri' => '/2013-04-01/hostedzone/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'DeleteHostedZoneResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                    'filters' => array(
                        'Aws\\Route53\\Route53Client::cleanId',
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchHostedZoneException',
                ),
                array(
                    'reason' => 'The hosted zone contains resource record sets in addition to the default NS and SOA resource record sets. Before you can delete the hosted zone, you must delete the additional resource record sets.',
                    'class' => 'HostedZoneNotEmptyException',
                ),
                array(
                    'reason' => 'The request was rejected because Route 53 was still processing a prior request.',
                    'class' => 'PriorRequestNotCompleteException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'GetChange' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/change/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetChangeResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                    'filters' => array(
                        'Aws\\Route53\\Route53Client::cleanId',
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchChangeException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'GetHealthCheck' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/healthcheck/{HealthCheckId}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetHealthCheckResponse',
            'responseType' => 'model',
            'parameters' => array(
                'HealthCheckId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 64,
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'The health check you are trying to get or delete does not exist.',
                    'class' => 'NoSuchHealthCheckException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The resource you are trying to access is unsupported on this Route 53 endpoint. Please consider using a newer endpoint or a tool that does so.',
                    'class' => 'IncompatibleVersionException',
                ),
            ),
        ),
        'GetHostedZone' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/hostedzone/{Id}',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'GetHostedZoneResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Id' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                    'filters' => array(
                        'Aws\\Route53\\Route53Client::cleanId',
                    ),
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchHostedZoneException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'ListHealthChecks' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/healthcheck',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListHealthChecksResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'marker',
                    'maxLength' => 64,
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'maxitems',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
                array(
                    'reason' => 'The resource you are trying to access is unsupported on this Route 53 endpoint. Please consider using a newer endpoint or a tool that does so.',
                    'class' => 'IncompatibleVersionException',
                ),
            ),
        ),
        'ListHostedZones' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/hostedzone',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListHostedZonesResponse',
            'responseType' => 'model',
            'parameters' => array(
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'marker',
                    'maxLength' => 64,
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'maxitems',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
        'ListResourceRecordSets' => array(
            'httpMethod' => 'GET',
            'uri' => '/2013-04-01/hostedzone/{HostedZoneId}/rrset',
            'class' => 'Guzzle\\Service\\Command\\OperationCommand',
            'responseClass' => 'ListResourceRecordSetsResponse',
            'responseType' => 'model',
            'parameters' => array(
                'HostedZoneId' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'uri',
                    'maxLength' => 32,
                    'filters' => array(
                        'Aws\\Route53\\Route53Client::cleanId',
                    ),
                ),
                'StartRecordName' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'name',
                    'maxLength' => 1024,
                ),
                'StartRecordType' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'type',
                ),
                'StartRecordIdentifier' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'identifier',
                    'minLength' => 1,
                    'maxLength' => 128,
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'query',
                    'sentAs' => 'maxitems',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/xml',
                ),
            ),
            'errorResponses' => array(
                array(
                    'class' => 'NoSuchHostedZoneException',
                ),
                array(
                    'reason' => 'Some value specified in the request is invalid or the XML document is malformed.',
                    'class' => 'InvalidInputException',
                ),
            ),
        ),
    ),
    'models' => array(
        'ChangeResourceRecordSetsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ChangeInfo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubmittedAt' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CreateHealthCheckResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HealthCheck' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'HealthCheckConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IPAddress' => array(
                                    'type' => 'string',
                                ),
                                'Port' => array(
                                    'type' => 'numeric',
                                ),
                                'Type' => array(
                                    'type' => 'string',
                                ),
                                'ResourcePath' => array(
                                    'type' => 'string',
                                ),
                                'FullyQualifiedDomainName' => array(
                                    'type' => 'string',
                                ),
                                'SearchString' => array(
                                    'type' => 'string',
                                ),
                                'RequestInterval' => array(
                                    'type' => 'numeric',
                                ),
                                'FailureThreshold' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                    ),
                ),
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'CreateHostedZoneResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HostedZone' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Config' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Comment' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ResourceRecordSetCount' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'ChangeInfo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubmittedAt' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'DelegationSet' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'NameServers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'NameServer',
                                'type' => 'string',
                                'sentAs' => 'NameServer',
                            ),
                        ),
                    ),
                ),
                'Location' => array(
                    'type' => 'string',
                    'location' => 'header',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteHealthCheckResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'DeleteHostedZoneResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ChangeInfo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubmittedAt' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetChangeResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ChangeInfo' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Status' => array(
                            'type' => 'string',
                        ),
                        'SubmittedAt' => array(
                            'type' => 'string',
                        ),
                        'Comment' => array(
                            'type' => 'string',
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetHealthCheckResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HealthCheck' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'HealthCheckConfig' => array(
                            'type' => 'object',
                            'properties' => array(
                                'IPAddress' => array(
                                    'type' => 'string',
                                ),
                                'Port' => array(
                                    'type' => 'numeric',
                                ),
                                'Type' => array(
                                    'type' => 'string',
                                ),
                                'ResourcePath' => array(
                                    'type' => 'string',
                                ),
                                'FullyQualifiedDomainName' => array(
                                    'type' => 'string',
                                ),
                                'SearchString' => array(
                                    'type' => 'string',
                                ),
                                'RequestInterval' => array(
                                    'type' => 'numeric',
                                ),
                                'FailureThreshold' => array(
                                    'type' => 'numeric',
                                ),
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'GetHostedZoneResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HostedZone' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'Id' => array(
                            'type' => 'string',
                        ),
                        'Name' => array(
                            'type' => 'string',
                        ),
                        'CallerReference' => array(
                            'type' => 'string',
                        ),
                        'Config' => array(
                            'type' => 'object',
                            'properties' => array(
                                'Comment' => array(
                                    'type' => 'string',
                                ),
                            ),
                        ),
                        'ResourceRecordSetCount' => array(
                            'type' => 'numeric',
                        ),
                    ),
                ),
                'DelegationSet' => array(
                    'type' => 'object',
                    'location' => 'xml',
                    'properties' => array(
                        'NameServers' => array(
                            'type' => 'array',
                            'items' => array(
                                'name' => 'NameServer',
                                'type' => 'string',
                                'sentAs' => 'NameServer',
                            ),
                        ),
                    ),
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListHealthChecksResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HealthChecks' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'HealthCheck',
                        'type' => 'object',
                        'sentAs' => 'HealthCheck',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'CallerReference' => array(
                                'type' => 'string',
                            ),
                            'HealthCheckConfig' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'IPAddress' => array(
                                        'type' => 'string',
                                    ),
                                    'Port' => array(
                                        'type' => 'numeric',
                                    ),
                                    'Type' => array(
                                        'type' => 'string',
                                    ),
                                    'ResourcePath' => array(
                                        'type' => 'string',
                                    ),
                                    'FullyQualifiedDomainName' => array(
                                        'type' => 'string',
                                    ),
                                    'SearchString' => array(
                                        'type' => 'string',
                                    ),
                                    'RequestInterval' => array(
                                        'type' => 'numeric',
                                    ),
                                    'FailureThreshold' => array(
                                        'type' => 'numeric',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListHostedZonesResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'HostedZones' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'HostedZone',
                        'type' => 'object',
                        'sentAs' => 'HostedZone',
                        'properties' => array(
                            'Id' => array(
                                'type' => 'string',
                            ),
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'CallerReference' => array(
                                'type' => 'string',
                            ),
                            'Config' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'Comment' => array(
                                        'type' => 'string',
                                    ),
                                ),
                            ),
                            'ResourceRecordSetCount' => array(
                                'type' => 'numeric',
                            ),
                        ),
                    ),
                ),
                'Marker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'NextMarker' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
        'ListResourceRecordSetsResponse' => array(
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => array(
                'ResourceRecordSets' => array(
                    'type' => 'array',
                    'location' => 'xml',
                    'items' => array(
                        'name' => 'ResourceRecordSet',
                        'type' => 'object',
                        'sentAs' => 'ResourceRecordSet',
                        'properties' => array(
                            'Name' => array(
                                'type' => 'string',
                            ),
                            'Type' => array(
                                'type' => 'string',
                            ),
                            'SetIdentifier' => array(
                                'type' => 'string',
                            ),
                            'Weight' => array(
                                'type' => 'numeric',
                            ),
                            'Region' => array(
                                'type' => 'string',
                            ),
                            'Failover' => array(
                                'type' => 'string',
                            ),
                            'TTL' => array(
                                'type' => 'numeric',
                            ),
                            'ResourceRecords' => array(
                                'type' => 'array',
                                'items' => array(
                                    'name' => 'ResourceRecord',
                                    'type' => 'object',
                                    'sentAs' => 'ResourceRecord',
                                    'properties' => array(
                                        'Value' => array(
                                            'type' => 'string',
                                        ),
                                    ),
                                ),
                            ),
                            'AliasTarget' => array(
                                'type' => 'object',
                                'properties' => array(
                                    'HostedZoneId' => array(
                                        'type' => 'string',
                                    ),
                                    'DNSName' => array(
                                        'type' => 'string',
                                    ),
                                    'EvaluateTargetHealth' => array(
                                        'type' => 'boolean',
                                    ),
                                ),
                            ),
                            'HealthCheckId' => array(
                                'type' => 'string',
                            ),
                        ),
                    ),
                ),
                'IsTruncated' => array(
                    'type' => 'boolean',
                    'location' => 'xml',
                ),
                'NextRecordName' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextRecordType' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'NextRecordIdentifier' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'MaxItems' => array(
                    'type' => 'string',
                    'location' => 'xml',
                ),
                'RequestId' => array(
                    'location' => 'header',
                    'sentAs' => 'x-amz-request-id',
                ),
            ),
        ),
    ),
    'iterators' => array(
        'ListHealthChecks' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'HealthChecks',
        ),
        'ListHostedZones' => array(
            'input_token' => 'Marker',
            'output_token' => 'NextMarker',
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'HostedZones',
        ),
        'ListResourceRecordSets' => array(
            'more_results' => 'IsTruncated',
            'limit_key' => 'MaxItems',
            'result_key' => 'ResourceRecordSets',
            'input_token' => array(
                'StartRecordName',
                'StartRecordType',
                'StartRecordIdentifier',
            ),
            'output_token' => array(
                'NextRecordName',
                'NextRecordType',
                'NextRecordIdentifier',
            ),
        ),
    ),
);
