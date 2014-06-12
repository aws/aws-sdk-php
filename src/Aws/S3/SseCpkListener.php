<?php

namespace Aws\S3;

use Guzzle\Common\Event;
use Guzzle\Service\Command\CommandInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * This listener simplifies the SSE-CPK process by encoding and hashing the key.
 */
class SseCpkListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array('command.before_prepare' => 'onCommandBeforePrepare');
    }

    public function onCommandBeforePrepare(Event $event)
    {
        /** @var CommandInterface $command */
        $command = $event['command'];

        // Prepare the normal SSE-CPK headers
        if ($command['SSECustomerKey']) {
            $this->prepareSseParams($command);
        }

        // If it's a copy operation, prepare the SSE-CPK headers for the source.
        if ($command['CopySourceSSECustomerKey']) {
            $this->prepareSseParams($command, true);
        }
    }

    private function prepareSseParams(CommandInterface $command, $isCopy = false)
    {
        $prefix = $isCopy ? 'CopySource' : '';

        // Base64 encode the provided key
        $key = $command[$prefix . 'SSECustomerKey'];
        $command[$prefix . 'SSECustomerKey'] = base64_encode($key);

        // Base64 the provided MD5 or, generate an MD5 if not provided
        if ($md5 = $command[$prefix . 'SSECustomerKeyMD5']) {
            $command[$prefix . 'SSECustomerKeyMD5'] = base64_encode($md5);
        } else {
            $command[$prefix . 'SSECustomerKeyMD5'] = base64_encode(md5($key, true));
        }
    }
}
