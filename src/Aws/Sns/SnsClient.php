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

namespace Aws\Sns;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Simple Notification Service
 *
 * @method Model addPermission(array $args = array()) {@command Sns AddPermission}
 * @method Model confirmSubscription(array $args = array()) {@command Sns ConfirmSubscription}
 * @method Model createTopic(array $args = array()) {@command Sns CreateTopic}
 * @method Model deleteTopic(array $args = array()) {@command Sns DeleteTopic}
 * @method Model getSubscriptionAttributes(array $args = array()) {@command Sns GetSubscriptionAttributes}
 * @method Model getTopicAttributes(array $args = array()) {@command Sns GetTopicAttributes}
 * @method Model listSubscriptions(array $args = array()) {@command Sns ListSubscriptions}
 * @method Model listSubscriptionsByTopic(array $args = array()) {@command Sns ListSubscriptionsByTopic}
 * @method Model listTopics(array $args = array()) {@command Sns ListTopics}
 * @method Model publish(array $args = array()) {@command Sns Publish}
 * @method Model removePermission(array $args = array()) {@command Sns RemovePermission}
 * @method Model setSubscriptionAttributes(array $args = array()) {@command Sns SetSubscriptionAttributes}
 * @method Model setTopicAttributes(array $args = array()) {@command Sns SetTopicAttributes}
 * @method Model subscribe(array $args = array()) {@command Sns Subscribe}
 * @method Model unsubscribe(array $args = array()) {@command Sns Unsubscribe}
 * @method ResourceIteratorInterface getListSubscriptionsIterator(array $args = array()) The input array uses the parameters of the ListSubscriptions operation
 * @method ResourceIteratorInterface getListSubscriptionsByTopicIterator(array $args = array()) The input array uses the parameters of the ListSubscriptionsByTopic operation
 * @method ResourceIteratorInterface getListTopicsIterator(array $args = array()) The input array uses the parameters of the ListTopics operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-sns.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.Sns.SnsClient.html API docs
 */
class SnsClient extends AbstractClient
{
    const LATEST_API_VERSION = '2010-03-31';

    /**
     * Factory method to create a new Amazon Simple Notification Service client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/sns-%s.php'
            ))
            ->build();
    }
}
