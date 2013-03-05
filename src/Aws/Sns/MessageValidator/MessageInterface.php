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

namespace Aws\Sns\MessageValidator;

use Guzzle\Common\Collection;

interface MessageInterface
{
    /**
     * The Message value specified when the notification was published to
     * the topic.
     *
     * @var string
     */
    public function getMessage();

    /**
     * A Universally Unique Identifier, unique for each message published. For a
     * notification that Amazon SNS resends during a retry, the message ID of
     * the original message is used.
     *
     * @var string
     */
    public function getMessageId();

    /**
     * The time (GMT) when the notification was published.
     *
     * @var string
     */
    public function getTimestamp();

    /**
     * The Amazon Resource Name (ARN) for the topic that this message was
     * published to.
     *
     * @var string
     */
    public function getTopicArn();

    /**
     * The type of message. For a notification, the type is Notification.
     * For a unsubscribe confirmation, the type is UnsubscribeConfirmation.
     *
     * @var string
     */
    public function getType();

    /**
     * Base64-encoded "SHA1withRSA" signature of the Message, MessageId, Subject
     * (if present), Type, Timestamp, and TopicArn values.
     *
     * @var string
     */
    public function getSignature();

    /**
     * The URL to the certificate that was used to sign the message.
     *
     * @var string
     */
    public function getSigningCertUrl();

    /**
     * The entire message data
     *
     * @var Collection
     */
    public function getData();

    /**
     * Builds a newline delimited string to sign according to the specs
     * http://docs.aws.amazon.com/sns/latest/gsg/SendMessageToHttp.verify.signature.html
     *
     * @var string
     */
    public function getStringToSign();
}
