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

namespace Aws\Emr;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Elastic MapReduce
 *
 * @method Model addInstanceGroups(array $args = array()) {@command Emr AddInstanceGroups}
 * @method Model addJobFlowSteps(array $args = array()) {@command Emr AddJobFlowSteps}
 * @method Model describeJobFlows(array $args = array()) {@command Emr DescribeJobFlows}
 * @method Model modifyInstanceGroups(array $args = array()) {@command Emr ModifyInstanceGroups}
 * @method Model runJobFlow(array $args = array()) {@command Emr RunJobFlow}
 * @method Model setTerminationProtection(array $args = array()) {@command Emr SetTerminationProtection}
 * @method Model setVisibleToAllUsers(array $args = array()) {@command Emr SetVisibleToAllUsers}
 * @method Model terminateJobFlows(array $args = array()) {@command Emr TerminateJobFlows}
 * @method ResourceIteratorInterface getDescribeJobFlowsIterator(array $args = array()) The input array uses the parameters of the DescribeJobFlows operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-emr.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.Emr.EmrClient.html API docs
 */
class EmrClient extends AbstractClient
{
    const LATEST_API_VERSION = '2009-03-31';

    /**
     * Factory method to create a new Amazon Elastic MapReduce client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @see \Aws\Common\Client\DefaultClient for a list of available configuration options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/emr-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
