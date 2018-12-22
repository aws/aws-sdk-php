<?php
namespace Aws\EndpointDiscovery;

class EndpointList
{
    private $active;
    private $expired;

    public function __construct($endpoints)
    {
        $this->active = $endpoints;
        reset($this->active);
    }

    public function getActive()
    {
        while (time() > current($this->active)) {
            $key = key($this->active);
            $this->expired[$key] = current($this->active);
            $this->increment($this->active);
            unset($this->active[$key]);
            if (count($this->active) < 1) {
                return null;
            }
        }
        $active = key($this->active);
        $this->increment($this->active);
        return $active;
    }

    public function getExpired()
    {
        if (count($this->expired) < 1) {
            return null;
        }
        $expired = key($this->expired);
        $this->increment($this->expired);
        return $expired;
    }

    public function remove($key)
    {
        unset($this->active[$key]);
        unset($this->expired[$key]);
    }

    private function increment($array)
    {
        if (next($array) === false) {
            reset($array);
        }
    }
}