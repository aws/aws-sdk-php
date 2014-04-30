<?php
namespace Aws\Api\Parser;

use Aws\Api\Service;
use Aws\Result;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * @internal Implements JSON-RPC parsing (e.g., DynamoDB)
 */
class JsonRpcParser extends AbstractParser
{
    private $parser;

    /**
     * @param Service  $api    Service description
     * @param JsonBody $parser JSON body builder
     */
    public function __construct(Service $api, JsonBody $parser = null)
    {
        parent::__construct($api);
        $this->parser = $parser ?: new JsonBody();
    }

    public function createResult(Service $api, ProcessEvent $event)
    {
        $operation = $api->getOperation($event->getCommand()->getName());

        return new Result($this->parser->parse(
            $operation->getOutput(),
            $event->getResponse()->json()
        ));
    }
}
