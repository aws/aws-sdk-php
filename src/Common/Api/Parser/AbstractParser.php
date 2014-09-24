<?php
namespace Aws\Common\Api\Parser;

use Aws\Common\Api\Service;
use GuzzleHttp\Model\Model;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * @internal
 */
abstract class AbstractParser implements SubscriberInterface
{
    /** @var \Aws\Common\Api\Service Representation of the service API*/
    private $api;

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
        if ($event->getResult() !== null) {
            return;
        } elseif (!$event->getResponse()) {
            throw new \RuntimeException('The response cannot be parsed.');
        }

        $event->setResult($this->createResult($this->api, $event));
    }

    /**
     * Creates an Aws\Result object based on the response data
     *
     * @param Service      $api
     * @param ProcessEvent $event
     *
     * @return Model
     */
    abstract protected function createResult(Service $api, ProcessEvent $event);
}
