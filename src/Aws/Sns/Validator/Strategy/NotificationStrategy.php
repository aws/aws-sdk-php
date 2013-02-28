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

namespace Aws\Sns\Validator\Strategy;

class NotificationStrategy implements StrategyInterface
{
    public function buildSignatureBody(\stdClass $jsonMessage)
    {
        $body = '';
        $body .= sprintf("Message\n%s\n", $jsonMessage->Message);
        $body .= sprintf("MessageId\n%s\n", $jsonMessage->MessageId);

        if (isset($jsonMessage->Subject) && '' != $jsonMessage->Subject) {
            $body .= sprintf("Subject\n%s\n", $jsonMessage->Subject);
        }

        $body .= sprintf("Timestamp\n%s\n", $jsonMessage->Timestamp);
        $body .= sprintf("TopicArn\n%s\n", $jsonMessage->TopicArn);
        $body .= sprintf("Type\n%s\n", $jsonMessage->Type);
        return $body;
    }
}
