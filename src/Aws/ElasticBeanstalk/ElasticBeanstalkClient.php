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

/**
 * Client to interact with AWS Elastic Beanstalk
 *
 * @method Model checkDNSAvailability(array $args = array()) {@command elasticbeanstalk CheckDNSAvailability}
 * @method Model createApplication(array $args = array()) {@command elasticbeanstalk CreateApplication}
 * @method Model createApplicationVersion(array $args = array()) {@command elasticbeanstalk CreateApplicationVersion}
 * @method Model createConfigurationTemplate(array $args = array()) {@command elasticbeanstalk CreateConfigurationTemplate}
 * @method Model createEnvironment(array $args = array()) {@command elasticbeanstalk CreateEnvironment}
 * @method Model createStorageLocation(array $args = array()) {@command elasticbeanstalk CreateStorageLocation}
 * @method Model deleteApplication(array $args = array()) {@command elasticbeanstalk DeleteApplication}
 * @method Model deleteApplicationVersion(array $args = array()) {@command elasticbeanstalk DeleteApplicationVersion}
 * @method Model deleteConfigurationTemplate(array $args = array()) {@command elasticbeanstalk DeleteConfigurationTemplate}
 * @method Model deleteEnvironmentConfiguration(array $args = array()) {@command elasticbeanstalk DeleteEnvironmentConfiguration}
 * @method Model describeApplicationVersions(array $args = array()) {@command elasticbeanstalk DescribeApplicationVersions}
 * @method Model describeApplications(array $args = array()) {@command elasticbeanstalk DescribeApplications}
 * @method Model describeConfigurationOptions(array $args = array()) {@command elasticbeanstalk DescribeConfigurationOptions}
 * @method Model describeConfigurationSettings(array $args = array()) {@command elasticbeanstalk DescribeConfigurationSettings}
 * @method Model describeEnvironmentResources(array $args = array()) {@command elasticbeanstalk DescribeEnvironmentResources}
 * @method Model describeEnvironments(array $args = array()) {@command elasticbeanstalk DescribeEnvironments}
 * @method Model describeEvents(array $args = array()) {@command elasticbeanstalk DescribeEvents}
 * @method Model listAvailableSolutionStacks(array $args = array()) {@command elasticbeanstalk ListAvailableSolutionStacks}
 * @method Model rebuildEnvironment(array $args = array()) {@command elasticbeanstalk RebuildEnvironment}
 * @method Model requestEnvironmentInfo(array $args = array()) {@command elasticbeanstalk RequestEnvironmentInfo}
 * @method Model restartAppServer(array $args = array()) {@command elasticbeanstalk RestartAppServer}
 * @method Model retrieveEnvironmentInfo(array $args = array()) {@command elasticbeanstalk RetrieveEnvironmentInfo}
 * @method Model swapEnvironmentCNAMEs(array $args = array()) {@command elasticbeanstalk SwapEnvironmentCNAMEs}
 * @method Model terminateEnvironment(array $args = array()) {@command elasticbeanstalk TerminateEnvironment}
 * @method Model updateApplication(array $args = array()) {@command elasticbeanstalk UpdateApplication}
 * @method Model updateApplicationVersion(array $args = array()) {@command elasticbeanstalk UpdateApplicationVersion}
 * @method Model updateConfigurationTemplate(array $args = array()) {@command elasticbeanstalk UpdateConfigurationTemplate}
 * @method Model updateEnvironment(array $args = array()) {@command elasticbeanstalk UpdateEnvironment}
 * @method Model validateConfigurationSettings(array $args = array()) {@command elasticbeanstalk ValidateConfigurationSettings}
 * @method waitUntilEnvironmentReady(array $input) Wait using the EnvironmentReady waiter. The input array uses the parameters of the DescribeEnvironments operation and waiter specific settings
 * @method waitUntilEnvironmentTerminated(array $input) Wait using the EnvironmentTerminated waiter. The input array uses the parameters of the DescribeEnvironments operation and waiter specific settings
 */
class ElasticBeanstalkClient extends AbstractClient
{
    /**
     * Factory method to create a new AWS Elastic Beanstalk client using an array of configuration options:
     *
     * Credential options (`key`, `secret`, and optional `token` OR `credentials` is required)
     *
     * - key: AWS Access Key ID
     * - secret: AWS secret access key
     * - credentials: You can optionally provide a custom `Aws\Common\Credentials\CredentialsInterface` object
     * - token: Custom AWS security token to use with request authentication
     * - token.ttd: UNIX timestamp for when the custom credentials expire
     * - credentials.cache: Used to cache credentials when using providers that require HTTP requests. Set the true
     *   to use the default APC cache or provide a `Guzzle\Cache\CacheAdapterInterface` object.
     * - credentials.cache.key: Optional custom cache key to use with the credentials
     * - credentials.client: Pass this option to specify a custom `Guzzle\Http\ClientInterface` to use if your
     *   credentials require a HTTP request (e.g. RefreshableInstanceProfileCredentials)
     *
     * Region and Endpoint options (a `region` and optional `scheme` OR a `base_url` is required)
     *
     * - region: Region name (e.g. 'us-east-1', 'us-west-1', 'us-west-2', 'eu-west-1', etc...)
     * - scheme: URI Scheme of the base URL (e.g. 'https', 'http').
     * - base_url: Instead of using a `region` and `scheme`, you can specify a custom base URL for the client
     * - endpoint_provider: Optional `Aws\Common\Region\EndpointProviderInterface` used to provide region endpoints
     *
     * Generic client options
     *
     * - ssl.certificate_authority: Set to true to use the bundled CA cert (default), system to use the certificate
     *   bundled with your system, or pass the full path to an SSL certificate bundle. This option should be used when
     *   you encounter curl error code 60.
     * - curl.options: Array of cURL options to apply to every request.
     *   See http://www.php.net/manual/en/function.curl-setopt.php for a list of available options
     * - signature: You can optionally provide a custom signature implementation used to sign requests
     * - signature.service: Set to explicitly override the service name used in signatures
     * - signature.region:  Set to explicitly override the region name used in signatures
     * - client.backoff.logger: `Guzzle\Log\LogAdapterInterface` object used to log backoff retries. Use
     *   'debug' to emit PHP warnings when a retry is issued.
     * - client.backoff.logger.template: Optional template to use for exponential backoff log messages. See
     *   `Guzzle\Plugin\Backoff\BackoffLogger` for formatting information.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/elasticbeanstalk-2010-12-01.php'))
            ->build();
    }
}
