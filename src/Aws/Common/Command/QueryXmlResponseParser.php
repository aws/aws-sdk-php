<?php

namespace Aws\Common\Command;

use Guzzle\Common\Collection;
use Guzzle\Service\Description\Operation;
use Guzzle\Service\Description\Parameter;
use Guzzle\Service\Command\OperationResponseParser;

/**
 * Class used for custom Query XML response parsing
 */
class QueryXmlResponseParser extends OperationResponseParser
{
    /**
     * {@inheritdoc}
     */
    protected function xmlToArray(\SimpleXMLElement $xml, Operation $operation, Parameter $model)
    {
        $data = parent::xmlToArray($xml, $operation, $model);

        if ($operation->getServiceDescription()->getData('xmlWrapped')) {
            $wrappingNode = $operation->getName() . 'Result';
            if (isset($data[$wrappingNode])) {
                $data = $data[$wrappingNode] + $data;
                unset($data[$wrappingNode]);
            }
        }

        return $data;
    }
}
