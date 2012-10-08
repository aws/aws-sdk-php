<?php

namespace Aws\Common\Command;

use Guzzle\Http\Message\RequestInterface;
use Guzzle\Service\Description\Parameter;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Command\LocationVisitor\Request\AbstractRequestVisitor;

/**
 * Location visitor used to serialize AWS query parameters (e.g. EC2, SES, SNS, SQS, etc) as POST fields
 */
class AwsQueryVisitor extends AbstractRequestVisitor
{
    /**
     * {@inheritdoc}
     */
    public function visit(CommandInterface $command, RequestInterface $request, Parameter $param, $value)
    {
        $query = array();
        $this->customResolver($value, $param, $query, $param->getWireName());
        $request->addPostFields($query);
    }

    /**
     * Map nested parameters into the location_key based parameters
     *
     * @param array    $value  Value to map
     * @param Parameter $param  Parameter that holds information about the current key
     * @param array    $query  Built up query string values
     * @param string   $prefix String to prepend to sub query values
     */
    protected function customResolver($value, Parameter $param, array &$query, $prefix = '')
    {
        if ($param->getType() == 'object') {
            foreach ($value as $name => $v) {
                if ($subParam = $param->getProperty($name)) {
                    $key = $prefix . '.' . $subParam->getWireName();
                    if (is_array($v)) {
                        $this->customResolver($v, $subParam, $query, $key);
                    } else {
                        $query[$key] = $v;
                    }
                }
            }
        } elseif ($param->getType() == 'array') {
            $offset = $param->getData('offset') ?: 0;
            foreach ($value as $index => $v) {
                $index += $offset;
                if (is_array($v) && $items = $param->getItems()) {
                    $this->customResolver($v, $items, $query, $prefix . '.' . $index);
                } else {
                    $query[$prefix . '.' . $index] = $v;
                }
            }
        } else {
            $query[$prefix] = $value;
        }
    }
}
