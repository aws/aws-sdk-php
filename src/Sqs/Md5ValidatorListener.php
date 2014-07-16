<?php
namespace Aws\Sqs;

use Aws\Sqs\Exception\SqsException;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Listener used to validate the MD5 of the ReceiveMessage body.
 */
class Md5ValidatorListener implements SubscriberInterface
{
    public function getEvents()
    {
        return ['process' => ['onProcess', RequestEvents::LATE]];
    }

    public function onProcess(ProcessEvent $event)
    {
        if ($event->getCommand()->getName() !== 'ReceiveMessage') {
            return;
        }

        $result = $event->getResult();

        if (isset($result['Messages'])) {
            foreach ($result['Messages'] as $message) {
                if ($message['MD5OfBody'] != md5($message['Body'])) {
                    throw new SqsException(
                        'Body MD5 mismatch for ' . var_export($message, true),
                        $event->getTransaction()
                    );
                }
            }
        }
    }
}
