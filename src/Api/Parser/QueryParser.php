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
        /** @var \Aws\AwsCommandInterface $command */
        $command = $event->getCommand();
        $name = $command->getName();
        $operation = $api->getOperation($name);
        $xml = $event->getResponse()->xml();

        if ($command->getApi()->getMetadata('resultWrapped') !== false) {
            $xml = $xml->{$name . 'Result'};
        }

        return new Result($this->xmlParser->parse(
            $operation->getOutput(),
            $xml
        ));
    }
}
