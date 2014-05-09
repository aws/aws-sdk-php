<?php
namespace Aws\Common\Subscriber;

use GuzzleHttp\Command\Event\CommandErrorEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Listens for command errors and adds the parsed error information to the
 * command.
 */
class Error implements SubscriberInterface
{
    /** @var callable */
    private $parser;

    /**
     * @param callable $parser AWS error parser that accepts a Response and
     *                         returns an associative array of error data.
     */
    public function __construct(callable $parser)
    {
        $this->parser = $parser;
    }

    public function getEvents()
    {
        return ['error' => ['onError', RequestEvents::EARLY]];
    }

    public function onError(CommandErrorEvent $event)
    {
        $response = $event->getRequestErrorEvent()->getResponse();

        // Don't update networking errors
        if (!$response) {
            return;
        }

        $parser = $this->parser;
        $event['aws_error'] = $parser($response);
    }
}
