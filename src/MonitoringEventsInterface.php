<?php
namespace Aws;

/**
 * Interface for adding and retrieving monitoring events
 */
interface MonitoringEventsInterface
{

    /**
     * Get client-side monitoring events attached to this exception.
     *
     * @return array
     */
    public function getMonitoringEvents();

    /**
     * Attach client-side monitoring event to this exception
     *
     * @param array $event
     */
    public function addMonitoringEvent(array $event);

}
