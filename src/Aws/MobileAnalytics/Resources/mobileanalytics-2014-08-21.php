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
    'apiVersion' => '2014-08-21',
    'endpointPrefix' => 'mobileanalytics',
    'serviceFullName' => 'Amazon Mobile Analytics',
    'serviceType' => 'rest-json',
    'jsonVersion' => '1.1',
    'signatureVersion' => 'v4',
    'namespace' => 'MobileAnalytics',
    'regions' => array(
        // us-east-1 is currently the only region provided by AWS Mobile Analytics
        'us-east-1' => array(
            'http' => false,
            'https' => true,
            'hostname' => 'mobileanalytics.us-east-1.amazonaws.com',
        ),
    ),
    'operations' => array(
        //currently 'PubEvents' is the only method of AWS mobile analytics rest api
        'PutEvents' => array(
            'httpMethod' => 'POST',
            'uri' => '/2014-06-05/events',
            'class' => 'Aws\\Common\\Command\\JsonCommand',
            'responseClass' => 'EmptyOutput',
            'responseType' => 'model',
            'parameters' => array(
                //requests header
                'Connection' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => 'Keep-Alive',
                ),
                'Content-Type' => array(
                    'static' => true,
                    'location' => 'header',
                    //'default' => 'application/x-amz-json-1.1',
                    'default' => 'application/json',
                ),
                'command.expects' => array(
                    'static' => true,
                    'default' => 'application/json',
                ),
                'X-Amz-Date' => array(
                    'static' => true,
                    'location' => 'header',
                    'default' => '2014-08-21',
                ),
                'ClientContext' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'location' => 'header',
                    'sentAs' => 'x-amz-Client-Context',
                ),
                'ClientToken' => array(
                    'required' => true,
                    'type' => 'string',
                    'location' => 'header',
                    'sentAs' => 'x-amz-security-token',
                ),
                //requests body
                'events' => array(
                    'required' => true,
                    'type' => 'array',
                    'location' => 'json',
                    'eventType' => array(
                        'name' => 'string',
                        'type' => 'string',
                    ),
                    'session' => array(
                        'id' => array(
                            'name' => 'string',
                            'type' => 'string',
                            ),
                        'timestamp' => array(
                            'name' => 'string',
                            'type' => 'string',
                            ),
                    ),
                    'timestamp' => array(
                        'name' => 'string',
                        'type' => 'string',
                    ),
                ),
            ),
            'errorResponses' => array(
                array(
                    'reason' => 'Thrown for missing or bad input parameter(s).',
                    'class' => 'InvalidParameterException',
                ),
            ),
        ),
    ),
    'models' => array(
        'EmptyOutput' => array(
            'type' => 'object',
            'additionalProperties' => true,
        ),
    ),
);
