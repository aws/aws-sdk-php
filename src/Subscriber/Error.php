<?php
namespace Aws\Subscriber;

use GuzzleHttp\Command\Event\CommandErrorEvent;
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
        return ['error' => ['onError']];
    }

    public function onError(CommandErrorEvent $event)
    {
        $response = $event->getRequestErrorEvent()->getResponse();

        // Don't update networking errors
        if (!$response) {
            return;
        }

        $event['error'] = call_user_func($this->parser, $response);
    }
}
