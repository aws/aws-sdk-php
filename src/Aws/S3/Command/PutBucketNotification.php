<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\S3\Command;

/**
 * This implementation of the PUT operation uses the notification subresource to
 * enable notifications of specified events for a bucket.
 *
 * @link http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTnotification.html
 */
class PutBucketNotification extends AbstractRequiresKey
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        // If topics were added individually, then build up the NotificationConfiguration
        if (!$this['body'] && $this['topics']) {
            $xml = '<NotificationConfiguration>';
            foreach ((array) $this['topics'] as $topic) {
                $xml .= "<TopicConfiguration><Topic>{$topic['Topic']}</Topic>"
                    . "<Event>{$topic['Event']}</Event></TopicConfiguration>";
            }
            $this['body'] = $xml . '</NotificationConfiguration>';
        }

        parent::build();
    }

    /**
     * Add a TopicConfiguration to the NotificationConfiguration
     *
     * @param string $topic Amazon SNS topic to which Amazon S3 will publish a
     *                      message to report the specified events for the bucket.
     * @param string $event Bucket event for which to send notifications. Currently,
     *                      s3:ReducedRedundancyLostObject is the only event supported for notifications.
     *
     * @return self
     */
    public function addTopic($topic, $event)
    {
        $topics = $this['topics'] ?: array();
        $topics[] = array(
            'Topic' => $topic,
            'Event' => $event
        );

        return $this->set('topics', $topics);
    }
}
