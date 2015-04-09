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

namespace Aws\Ecs;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon EC2 Container Service
 *
 * @method Model createCluster(array $args = array()) {@command Ecs CreateCluster}
 * @method Model createService(array $args = array()) {@command Ecs CreateService}
 * @method Model deleteCluster(array $args = array()) {@command Ecs DeleteCluster}
 * @method Model deleteService(array $args = array()) {@command Ecs DeleteService}
 * @method Model deregisterContainerInstance(array $args = array()) {@command Ecs DeregisterContainerInstance}
 * @method Model deregisterTaskDefinition(array $args = array()) {@command Ecs DeregisterTaskDefinition}
 * @method Model describeClusters(array $args = array()) {@command Ecs DescribeClusters}
 * @method Model describeContainerInstances(array $args = array()) {@command Ecs DescribeContainerInstances}
 * @method Model describeServices(array $args = array()) {@command Ecs DescribeServices}
 * @method Model describeTaskDefinition(array $args = array()) {@command Ecs DescribeTaskDefinition}
 * @method Model describeTasks(array $args = array()) {@command Ecs DescribeTasks}
 * @method Model discoverPollEndpoint(array $args = array()) {@command Ecs DiscoverPollEndpoint}
 * @method Model listClusters(array $args = array()) {@command Ecs ListClusters}
 * @method Model listContainerInstances(array $args = array()) {@command Ecs ListContainerInstances}
 * @method Model listServices(array $args = array()) {@command Ecs ListServices}
 * @method Model listTaskDefinitionFamilies(array $args = array()) {@command Ecs ListTaskDefinitionFamilies}
 * @method Model listTaskDefinitions(array $args = array()) {@command Ecs ListTaskDefinitions}
 * @method Model listTasks(array $args = array()) {@command Ecs ListTasks}
 * @method Model registerContainerInstance(array $args = array()) {@command Ecs RegisterContainerInstance}
 * @method Model registerTaskDefinition(array $args = array()) {@command Ecs RegisterTaskDefinition}
 * @method Model runTask(array $args = array()) {@command Ecs RunTask}
 * @method Model startTask(array $args = array()) {@command Ecs StartTask}
 * @method Model stopTask(array $args = array()) {@command Ecs StopTask}
 * @method Model submitContainerStateChange(array $args = array()) {@command Ecs SubmitContainerStateChange}
 * @method Model submitTaskStateChange(array $args = array()) {@command Ecs SubmitTaskStateChange}
 * @method Model updateService(array $args = array()) {@command Ecs UpdateService}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-ecs.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.Ecs.EcsClient.html API docs
 */
class EcsClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-11-13';

    /**
     * Factory method to create a new Amazon EC2 Container Service client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/ecs-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
