<?php
namespace Aws\Common\Subscriber;

use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * Changes the location to which a REST web service downloads the body of a
 * response.
 */
class SaveAs implements SubscriberInterface
{
    /** @var string The key for the name of the parameter used to control it */
    private $paramName;

    /**
     * @param string $paramName The key used to control the SaveAs behavior
     */
    public function __construct($paramName = 'SaveAs')
    {
        $this->paramName = $paramName;
    }

    public function getEvents()
    {
        return ['prepared' => ['onPrepared', RequestEvents::LATE]];
    }

    public function onPrepared(PreparedEvent $event)
    {
        $command = $event->getCommand();

        if ($value = $command[$this->paramName]) {
            $event->getRequest()->getConfig()->set('save_to', $value);
        }
    }
}
