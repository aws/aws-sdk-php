<?php
namespace Aws\Api\Parser;

use Aws\Api\Service;
use Aws\Result;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * @internal
 */
class JsonRpcParser extends AbstractParser
{
    private $builder;

    /**
     * @param Service  $api     Service description
     * @param JsonBody $builder JSON body builder
     */
    public function __construct(Service $api, JsonBody $builder = null)
    {
        parent::__construct($api);
        $this->builder = $builder ?: new JsonBody();
    }

    public function createResult(Service $api, ProcessEvent $event)
    {
        $operation = $api->getOperation($event->getCommand()->getName());

        return new Result($this->builder->build(
            $operation->getOutput(),
            $event->getResponse()->json()
        ));
    }
}
