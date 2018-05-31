<?php
namespace Aws;


trait HasMonitoringEventsTrait
{
    private $monitoringEvents;

    /**
     * Get client-side monitoring events attached to this exception.
     *
     * @return array
     */
    public function getMonitoringEvents()
    {
        return $this->monitoringEvents;
    }

    /**
     * Attach client-side monitoring event to this exception
     *
     * @param array $event
     */
    public function addMonitoringEvent(array $event)
    {
        $this->monitoringEvents []= $event;
    }
}
