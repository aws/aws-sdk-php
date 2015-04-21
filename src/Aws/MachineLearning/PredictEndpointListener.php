<?php

namespace Aws\MachineLearning;

use Guzzle\Common\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Guzzle\Service\Command\AbstractCommand;

/**
 * Listener used to change the endpoint to the Predict Endpoint
 */
class PredictEndpointListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array('command.before_send' => array('onCommandBeforeSend', -255));
    }

    /**
     * Updates the request URL to use the Predict Endpoint
     *
     * @param Event $event Event emitted
     */
    public function onCommandBeforeSend(Event $event)
    {
        /** @var AbstractCommand $command */
        $command = $event['command'];
        if ($command->getName() === 'Predict') {
            $request = $command->getRequest();
            $requestUrl = $request->getUrl(true);
            $request->setUrl($requestUrl->combine($command->get('PredictEndpoint')));
            $request->getParams()->remove('PredictEndpoint');
        }
    }
}
