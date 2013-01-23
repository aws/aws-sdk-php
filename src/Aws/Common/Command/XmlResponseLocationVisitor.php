<?php

namespace Aws\Common\Command;

use Guzzle\Service\Description\Operation;
use Guzzle\Service\Description\Parameter;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Command\LocationVisitor\Response\XmlVisitor;

/**
 * Class used for custom AWS XML response parsing of query services
 */
class XmlResponseLocationVisitor extends XmlVisitor
{
    /**
     * {@inheritdoc}
     */
    public function before(CommandInterface $command, array &$result)
    {
        parent::before($command, $result);

        // Unwrapped wrapped responses
        $operation = $command->getOperation();
        if ($operation->getServiceDescription()->getData('resultWrapped')) {
            $wrappingNode = $operation->getName() . 'Result';
            if (isset($result[$wrappingNode])) {
                $result = $result[$wrappingNode] + $result;
                unset($result[$wrappingNode]);
            }
        }
    }
}
