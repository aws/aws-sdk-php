<?php
namespace Aws\Api\Parser;

use Aws\Api\Service;
use Aws\Result;
use GuzzleHttp\Command\Event\ProcessEvent;

/**
 * @internal Parses query (XML) responses (e.g., EC2, SQS, and many others)
 */
class QueryParser extends AbstractParser
{
    /** @var XmlParser */
    private $xmlParser;

    /**
     * @param Service   $api       Service description
     * @param XmlParser $xmlParser Optional XML parser
     */
    public function __construct(Service $api, XmlParser $xmlParser = null)
    {
        parent::__construct($api);
        $this->xmlParser = $xmlParser ?: new XmlParser();
    }

    protected function createResult(Service $api, ProcessEvent $event)
    {
        $operation = $api->getOperation($event->getCommand()->getName());

        return new Result($this->xmlParser->parse(
            $operation->getOutput(),
            $event->getResponse()->xml()
        ));
    }
}
