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

class NotificationMessage extends AbstractMessage
{
    /**
     * {@inheritdoc}
     */
    public function getStringToSign()
    {
        $body = '';
        $body .= sprintf("Message\n%s\n", $this->data['Message']);
        $body .= sprintf("MessageId\n%s\n", $this->data['MessageId']);
        if ($this->data['Subject']) {
            $body .= sprintf("Subject\n%s\n", $this->data['Subject']);
        }
        $body .= sprintf("Timestamp\n%s\n", $this->data['Timestamp']);
        $body .= sprintf("TopicArn\n%s\n", $this->data['TopicArn']);
        $body .= sprintf("Type\n%s\n", $this->data['Type']);

        return $body;
    }

    /**
     * The Subject parameter specified when the notification was published to
     * the topic. Note that this is an optional parameter. If no Subject was
     * specified, then this name/value pair does not appear in the original
     * JSON document.
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->data['Subject'];
    }
}
