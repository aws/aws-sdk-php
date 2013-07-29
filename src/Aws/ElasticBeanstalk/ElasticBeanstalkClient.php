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

namespace Aws\ElasticBeanstalk;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Credentials\Credentials;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS Elastic Beanstalk
 *
 * @method Model checkDNSAvailability(array $args = array()) {@command ElasticBeanstalk CheckDNSAvailability}
 * @method Model createApplication(array $args = array()) {@command ElasticBeanstalk CreateApplication}
 * @method Model createApplicationVersion(array $args = array()) {@command ElasticBeanstalk CreateApplicationVersion}
 * @method Model createConfigurationTemplate(array $args = array()) {@command ElasticBeanstalk CreateConfigurationTemplate}
 * @method Model createEnvironment(array $args = array()) {@command ElasticBeanstalk CreateEnvironment}
 * @method Model createStorageLocation(array $args = array()) {@command ElasticBeanstalk CreateStorageLocation}
 * @method Model deleteApplication(array $args = array()) {@command ElasticBeanstalk DeleteApplication}
 * @method Model deleteApplicationVersion(array $args = array()) {@command ElasticBeanstalk DeleteApplicationVersion}
 * @method Model deleteConfigurationTemplate(array $args = array()) {@command ElasticBeanstalk DeleteConfigurationTemplate}
 * @method Model deleteEnvironmentConfiguration(array $args = array()) {@command ElasticBeanstalk DeleteEnvironmentConfiguration}
 * @method Model describeApplicationVersions(array $args = array()) {@command ElasticBeanstalk DescribeApplicationVersions}
 * @method Model describeApplications(array $args = array()) {@command ElasticBeanstalk DescribeApplications}
 * @method Model describeConfigurationOptions(array $args = array()) {@command ElasticBeanstalk DescribeConfigurationOptions}
 * @method Model describeConfigurationSettings(array $args = array()) {@command ElasticBeanstalk DescribeConfigurationSettings}
 * @method Model describeEnvironmentResources(array $args = array()) {@command ElasticBeanstalk DescribeEnvironmentResources}
 * @method Model describeEnvironments(array $args = array()) {@command ElasticBeanstalk DescribeEnvironments}
 * @method Model describeEvents(array $args = array()) {@command ElasticBeanstalk DescribeEvents}
 * @method Model listAvailableSolutionStacks(array $args = array()) {@command ElasticBeanstalk ListAvailableSolutionStacks}
 * @method Model rebuildEnvironment(array $args = array()) {@command ElasticBeanstalk RebuildEnvironment}
 * @method Model requestEnvironmentInfo(array $args = array()) {@command ElasticBeanstalk RequestEnvironmentInfo}
 * @method Model restartAppServer(array $args = array()) {@command ElasticBeanstalk RestartAppServer}
 * @method Model retrieveEnvironmentInfo(array $args = array()) {@command ElasticBeanstalk RetrieveEnvironmentInfo}
 * @method Model swapEnvironmentCNAMEs(array $args = array()) {@command ElasticBeanstalk SwapEnvironmentCNAMEs}
 * @method Model terminateEnvironment(array $args = array()) {@command ElasticBeanstalk TerminateEnvironment}
 * @method Model updateApplication(array $args = array()) {@command ElasticBeanstalk UpdateApplication}
 * @method Model updateApplicationVersion(array $args = array()) {@command ElasticBeanstalk UpdateApplicationVersion}
 * @method Model updateConfigurationTemplate(array $args = array()) {@command ElasticBeanstalk UpdateConfigurationTemplate}
 * @method Model updateEnvironment(array $args = array()) {@command ElasticBeanstalk UpdateEnvironment}
 * @method Model validateConfigurationSettings(array $args = array()) {@command ElasticBeanstalk ValidateConfigurationSettings}
 * @method waitUntilEnvironmentReady(array $input) Wait using the EnvironmentReady waiter. The input array uses the parameters of the DescribeEnvironments operation and waiter specific settings
 * @method waitUntilEnvironmentTerminated(array $input) Wait using the EnvironmentTerminated waiter. The input array uses the parameters of the DescribeEnvironments operation and waiter specific settings
 * @method ResourceIteratorInterface getDescribeApplicationVersionsIterator(array $args = array()) The input array uses the parameters of the DescribeApplicationVersions operation
 * @method ResourceIteratorInterface getDescribeApplicationsIterator(array $args = array()) The input array uses the parameters of the DescribeApplications operation
 * @method ResourceIteratorInterface getDescribeConfigurationOptionsIterator(array $args = array()) The input array uses the parameters of the DescribeConfigurationOptions operation
 * @method ResourceIteratorInterface getDescribeEnvironmentsIterator(array $args = array()) The input array uses the parameters of the DescribeEnvironments operation
 * @method ResourceIteratorInterface getDescribeEventsIterator(array $args = array()) The input array uses the parameters of the DescribeEvents operation
 * @method ResourceIteratorInterface getListAvailableSolutionStacksIterator(array $args = array()) The input array uses the parameters of the ListAvailableSolutionStacks operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-elasticbeanstalk.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.ElasticBeanstalk.ElasticBeanstalkClient.html API docs
 */
class ElasticBeanstalkClient extends AbstractClient
{
    const LATEST_API_VERSION = '2010-12-01';

    /**
     * Factory method to create a new AWS Elastic Beanstalk client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/elasticbeanstalk-%s.php'
            ))
            ->build();
    }
}
