<?php
namespace Aws\Api\Parser;

use Aws\Api\Service;

/**
 * @internal
 */
abstract class AbstractParser
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
}
