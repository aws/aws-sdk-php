<?php
namespace Aws\EndpointDiscovery;

class EndpointList
{
    private $active;

    public function __construct($endpoints)
    {
        $this->active = $endpoints;
        reset($this->active);
    }

    public function getActive()
    {
        $active = key($this->active);
        if (next($this->active) === false) {
            reset($this->active);
        }
        return $active;
    }

    public function remove($index)
    {
        unset($this->active[$index]);
    }
}