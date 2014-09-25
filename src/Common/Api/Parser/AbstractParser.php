<?php
namespace Aws\Common\Api\Parser;

use Aws\Common\Api\Service;

/**
 * @internal
 */
abstract class AbstractParser
{
    /** @var \Aws\Common\Api\Service Representation of the service API*/
    protected $api;

    /**
     * @param Service $api Service description
     */
    public function __construct(Service $api)
    {
        $this->api = $api;
    }
}
