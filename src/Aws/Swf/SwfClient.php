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

namespace Aws\Swf;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon Simple Workflow Service
 *
 * @method Model countClosedWorkflowExecutions(array $args = array()) {@command Swf CountClosedWorkflowExecutions}
 * @method Model countOpenWorkflowExecutions(array $args = array()) {@command Swf CountOpenWorkflowExecutions}
 * @method Model countPendingActivityTasks(array $args = array()) {@command Swf CountPendingActivityTasks}
 * @method Model countPendingDecisionTasks(array $args = array()) {@command Swf CountPendingDecisionTasks}
 * @method Model deprecateActivityType(array $args = array()) {@command Swf DeprecateActivityType}
 * @method Model deprecateDomain(array $args = array()) {@command Swf DeprecateDomain}
 * @method Model deprecateWorkflowType(array $args = array()) {@command Swf DeprecateWorkflowType}
 * @method Model describeActivityType(array $args = array()) {@command Swf DescribeActivityType}
 * @method Model describeDomain(array $args = array()) {@command Swf DescribeDomain}
 * @method Model describeWorkflowExecution(array $args = array()) {@command Swf DescribeWorkflowExecution}
 * @method Model describeWorkflowType(array $args = array()) {@command Swf DescribeWorkflowType}
 * @method Model getWorkflowExecutionHistory(array $args = array()) {@command Swf GetWorkflowExecutionHistory}
 * @method Model listActivityTypes(array $args = array()) {@command Swf ListActivityTypes}
 * @method Model listClosedWorkflowExecutions(array $args = array()) {@command Swf ListClosedWorkflowExecutions}
 * @method Model listDomains(array $args = array()) {@command Swf ListDomains}
 * @method Model listOpenWorkflowExecutions(array $args = array()) {@command Swf ListOpenWorkflowExecutions}
 * @method Model listWorkflowTypes(array $args = array()) {@command Swf ListWorkflowTypes}
 * @method Model pollForActivityTask(array $args = array()) {@command Swf PollForActivityTask}
 * @method Model pollForDecisionTask(array $args = array()) {@command Swf PollForDecisionTask}
 * @method Model recordActivityTaskHeartbeat(array $args = array()) {@command Swf RecordActivityTaskHeartbeat}
 * @method Model registerActivityType(array $args = array()) {@command Swf RegisterActivityType}
 * @method Model registerDomain(array $args = array()) {@command Swf RegisterDomain}
 * @method Model registerWorkflowType(array $args = array()) {@command Swf RegisterWorkflowType}
 * @method Model requestCancelWorkflowExecution(array $args = array()) {@command Swf RequestCancelWorkflowExecution}
 * @method Model respondActivityTaskCanceled(array $args = array()) {@command Swf RespondActivityTaskCanceled}
 * @method Model respondActivityTaskCompleted(array $args = array()) {@command Swf RespondActivityTaskCompleted}
 * @method Model respondActivityTaskFailed(array $args = array()) {@command Swf RespondActivityTaskFailed}
 * @method Model respondDecisionTaskCompleted(array $args = array()) {@command Swf RespondDecisionTaskCompleted}
 * @method Model signalWorkflowExecution(array $args = array()) {@command Swf SignalWorkflowExecution}
 * @method Model startWorkflowExecution(array $args = array()) {@command Swf StartWorkflowExecution}
 * @method Model terminateWorkflowExecution(array $args = array()) {@command Swf TerminateWorkflowExecution}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-swf.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.Swf.SwfClient.html API docs
 */
class SwfClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-01-25';

    /**
     * Factory method to create a new Amazon Simple Workflow Service client using an array of configuration options.
     *
     * The following array keys and values are available options:
     *
     * - Credential options (`key`, `secret`, and optional `token` OR `credentials` is required)
     *     - key: AWS Access Key ID
     *     - secret: AWS secret access key
     *     - credentials: You can optionally provide a custom `Aws\Common\Credentials\CredentialsInterface` object
     *     - token: Custom AWS security token to use with request authentication
     *     - token.ttd: UNIX timestamp for when the custom credentials expire
     *     - credentials.cache.key: Optional custom cache key to use with the credentials
     * - Region and Endpoint options (a `region` and optional `scheme` OR a `base_url` is required)
     *     - region: Region name (e.g. 'us-east-1', 'us-west-1', 'us-west-2', 'eu-west-1', etc...)
     *     - scheme: URI Scheme of the base URL (e.g. 'https', 'http').
     *     - base_url: Instead of using a `region` and `scheme`, you can specify a custom base URL for the client
     * - Generic client options
     *     - ssl.cert: Set to true to use the bundled CA cert or pass the full path to an SSL certificate bundle. This
     *           option should be used when you encounter curl error code 60.
     *     - curl.CURLOPT_VERBOSE: Set to true to output curl debug information during transfers
     *     - curl.*: Prefix any available cURL option with `curl.` to add cURL options to each request.
     *           See: http://www.php.net/manual/en/function.curl-setopt.php
     *     - service.description.cache.ttl: Optional TTL used for the service description cache
     * - Signature options
     *     - signature: You can optionally provide a custom signature implementation used to sign requests
     *     - signature.service: Set to explicitly override the service name used in signatures
     *     - signature.region:  Set to explicitly override the region name used in signatures
     * - Exponential backoff options
     *     - client.backoff.logger: `Guzzle\Common\Log\LogAdapterInterface` object used to log backoff retries. Use
     *           'debug' to emit PHP warnings when a retry is issued.
     *     - client.backoff.logger.template: Optional template to use for exponential backoff log messages. See
     *           `Guzzle\Http\Plugin\ExponentialBackoffLogger` for formatting information.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/swf-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
