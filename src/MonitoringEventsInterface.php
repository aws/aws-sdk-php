<?php
namespace Aws;

/**
 * Interface for adding and retrieving monitoring events
 */
interface MonitoringEventsInterface
{

    /**
     * Get client-side monitoring events attached to this object
     *
     * @return array
     */
    public function getMonitoringEvents();

    /**
     * Attach client-side monitoring event to this object
     *
     * @param array $event
     */
    public function addMonitoringEvent(array $event);

    /**
     * Set monitoring events for this object
     *
     * @param array $events
     */
    public function setMonitoringEvents(array $events);

}
