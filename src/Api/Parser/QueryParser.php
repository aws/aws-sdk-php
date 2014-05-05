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
        $command = $event->getCommand();
        $output = $api->getOperation($command->getName())->getOutput();
        $xml = $event->getResponse()->xml();

        if ($wrapper = $output['resultWrapper']) {
            $xml = $xml->{$wrapper};
        }

        return new Result($this->xmlParser->parse($output, $xml));
    }
}
