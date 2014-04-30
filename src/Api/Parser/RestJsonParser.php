<?php
namespace Aws\Api\Parser;

use Aws\Result;
use Aws\Api\Service;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * @internal
 */
class RestJsonParser extends RestParser
{
    /** @var JsonBody */
    private $builder;

    /**
     * @param Service  $api     Service description
     * @param JsonBody $builder JSON body builder
     */
    public function __construct(Service $api, JsonBody $builder)
    {
        parent::__construct($api);
        $this->builder = $builder;
    }

    public function createResult(Service $api, ProcessEvent $event)
    {
        $command = $event->getCommand();
        $name = $command->getName();
        $operation = $api->getOperation($name);
        return new Result([]);
    }
}
