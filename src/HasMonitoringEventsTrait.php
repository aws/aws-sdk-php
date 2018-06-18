<?php
namespace Aws;


trait HasMonitoringEventsTrait
{
    private $monitoringEvents = [];

    /**
     * Get client-side monitoring events attached to this object
     *
     * @return array
     */
    public function getMonitoringEvents()
    {
        return $this->monitoringEvents;
    }

    /**
     * Attach client-side monitoring event to this object
     *
     * @param array $event
     */
    public function addMonitoringEvent(array $event)
    {
        $this->monitoringEvents []= $event;
    }

    /**
     * Set monitoring events for this object
     *
     * @param array $events
     */
    public function setMonitoringEvents(array $events)
    {
        $this->monitoringEvents = $events;
    }
}
