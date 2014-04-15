<?php
namespace Aws\Api\Parser;

use Aws\Api\Service;
use Aws\Result;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * @internal
 */
abstract class AbstractParser implements SubscriberInterface
{
    /** @var \Aws\Api\Service Representation of the service API*/
    protected $api;

    /**
     * @param Service $api Service description
     */
    public function __construct(Service $api)
    {
        $this->api = $api;
    }

    public function getEvents()
    {
        return ['process' => ['onProcess']];
    }

    public function onProcess(ProcessEvent $event)
    {
        // Guard against intercepted or injected results that need no parsing.
        if ($event->getResult()) {
            return;
        } elseif (!$event->getResponse()) {
            throw new \RuntimeException('The response cannot be parsed.');
        } else {
            $event->setResult($this->createResult($event));
        }
    }

    /**
     * Creates an Aws\Result object based on the response data
     *
     * @param ProcessEvent $event
     *
     * @return Result
     */
    abstract protected function createResult(ProcessEvent $event);
}
