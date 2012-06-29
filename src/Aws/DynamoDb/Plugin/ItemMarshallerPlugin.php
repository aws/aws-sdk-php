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

namespace Aws\DynamoDb\Plugin;

use Aws\DynamoDb\Model\Item;
use Guzzle\Common\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Plugin used to marshal item arrays from DynamoDB into easier to use Item
 * objects.
 */
class ItemMarshallerPlugin implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            'command.after_send' => 'onCommandSent'
        );
    }

    /**
     * Event triggered when a command has been sent
     *
     * @param Event $event Received
     */
    public function onCommandSent(Event $event)
    {
        $command = $event['command'];
        /* @var $command \Guzzle\Service\Command\CommandInterface */
        switch ($command->getName()) {
            case 'GetItem':
                $item = $command->getResult();
                $command->setResult(new Item($item['Item']));
                break;
            case 'Query': // Fall through
            case 'Scan':
                $result = $command->getResult();
                foreach ($result['Items'] as &$item) {
                    $item = new Item($item);
                }
                $command->setResult($result);
                break;
            case 'BatchGetItem':
                $result = $command->getResult();
                if (isset($result['Responses'])) {
                    foreach ($result['Responses'] as $tableName => &$tableData) {
                        foreach ($tableData['Items'] as &$item) {
                            $item = new Item($item, $tableName);
                        }
                    }
                    $command->setResult($result);
                }
                break;
        }
    }
}
