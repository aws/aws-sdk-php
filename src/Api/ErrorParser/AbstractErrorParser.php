<?php
namespace Aws\Api\ErrorParser;

use Aws\Api\Service;

class AbstractErrorParser
{
    /**
     * @var Service
     */
    protected $api;

    /**
     * @param Service $api
     */
    public function __construct(Service $api = null)
    {
        $this->api = $api;
    }
}