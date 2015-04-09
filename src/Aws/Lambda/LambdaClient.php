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

namespace Aws\Lambda;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonRestExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS Lambda
 *
 * @method Model addPermission(array $args = array()) {@command Lambda AddPermission}
 * @method Model createEventSourceMapping(array $args = array()) {@command Lambda CreateEventSourceMapping}
 * @method Model createFunction(array $args = array()) {@command Lambda CreateFunction}
 * @method Model deleteEventSourceMapping(array $args = array()) {@command Lambda DeleteEventSourceMapping}
 * @method Model deleteFunction(array $args = array()) {@command Lambda DeleteFunction}
 * @method Model getEventSourceMapping(array $args = array()) {@command Lambda GetEventSourceMapping}
 * @method Model getFunction(array $args = array()) {@command Lambda GetFunction}
 * @method Model getFunctionConfiguration(array $args = array()) {@command Lambda GetFunctionConfiguration}
 * @method Model getPolicy(array $args = array()) {@command Lambda GetPolicy}
 * @method Model invoke(array $args = array()) {@command Lambda Invoke}
 * @method Model invokeAsync(array $args = array()) {@command Lambda InvokeAsync}
 * @method Model listEventSourceMappings(array $args = array()) {@command Lambda ListEventSourceMappings}
 * @method Model listFunctions(array $args = array()) {@command Lambda ListFunctions}
 * @method Model removePermission(array $args = array()) {@command Lambda RemovePermission}
 * @method Model updateEventSourceMapping(array $args = array()) {@command Lambda UpdateEventSourceMapping}
 * @method Model updateFunctionCode(array $args = array()) {@command Lambda UpdateFunctionCode}
 * @method Model updateFunctionConfiguration(array $args = array()) {@command Lambda UpdateFunctionConfiguration}
 * @method ResourceIteratorInterface getListEventSourceMappingsIterator(array $args = array()) The input array uses the parameters of the ListEventSourceMappings operation
 * @method ResourceIteratorInterface getListFunctionsIterator(array $args = array()) The input array uses the parameters of the ListFunctions operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-lambda.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.Lambda.LambdaClient.html API docs
 */
class LambdaClient extends AbstractClient
{
    const LATEST_API_VERSION = '2015-03-31';

    /**
     * Factory method to create a new AWS Lambda client using an array of configuration options.
     *
     * See http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/lambda-%s.php'
            ))
            ->setExceptionParser(new JsonRestExceptionParser())
            ->build();
    }
}
