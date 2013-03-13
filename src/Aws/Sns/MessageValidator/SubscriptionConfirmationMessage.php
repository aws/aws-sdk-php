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

class SubscriptionConfirmationMessage extends AbstractMessage
{
    /**
     * {@inheritdoc}
     */
    public function getStringToSign()
    {
        $body = '';
        $body .= sprintf("Message\n%s\n", $this->data['Message']);
        $body .= sprintf("MessageId\n%s\n", $this->data['MessageId']);
        $body .= sprintf("SubscribeURL\n%s\n", $this->data['SubscribeURL']);
        $body .= sprintf("Timestamp\n%s\n", $this->data['Timestamp']);
        $body .= sprintf("Token\n%s\n", $this->data['Token']);
        $body .= sprintf("TopicArn\n%s\n", $this->data['TopicArn']);
        $body .= sprintf("Type\n%s\n", $this->data['Type']);

        return $body;
    }

    /**
     * A value you can use with the ConfirmSubscription action to confirm the
     * subscription. Alternatively, you can simply visit the SubscribeURL.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->data['Token'];
    }

    /**
     * The URL that you must visit in order to confirm the subscription.
     * Alternatively, you can instead use the Token with the ConfirmSubscription
     * action to confirm the subscription.
     *
     * @return string
     */
    public function getSubscribeUrl()
    {
        return $this->data['SubscribeURL'];
    }

    /**
     * {@inheritdoc}
     */
    protected static function getRequiredKeys()
    {
        return parent::getRequiredKeys() + array('SubscribeURL', 'Token');
    }
}
