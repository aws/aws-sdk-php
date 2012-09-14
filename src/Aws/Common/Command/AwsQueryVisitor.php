<?php

namespace Aws\Common\Command;

use Guzzle\Http\Message\RequestInterface;
use Guzzle\Service\Description\ApiParam;
use Guzzle\Service\Command\LocationVisitor\AbstractVisitor;

/**
 * Location visitor used to serialize AWS query parameters (e.g. EC2, SES, SNS, SQS, etc) as POST fields
 */
class AwsQueryVisitor extends AbstractVisitor
{
    /**
     * {@inheritdoc}
     */
    public function visit(ApiParam $param, RequestInterface $request, $value)
    {
        $query = array();
        $this->customResolver($value, $param, $query, ($param->getLocationKey() ?: $param->getName()));
        $request->addPostFields($query);
    }

    /**
     * Map nested parameters into the location_key based parameters
     *
     * @param array    $value  Value to map
     * @param ApiParam $param  Parameter that holds information about the current key
     * @param array    $query  Built up query string values
     * @param string   $prefix String to prepend to sub query values
     */
    protected function customResolver(array $value, ApiParam $param, array &$query, $prefix = '')
    {
        if ($param->getType() == 'object') {
            foreach ($value as $name => $v) {
                if ($subParam = $param->getProperty($name)) {
                    $key = $prefix . '.' . ($subParam->getLocationKey() ?: $subParam->getName());
                    if (is_array($v)) {
                        $this->customResolver($v, $subParam, $query, $key);
                    } else {
                        $query[$key] = $v;
                    }
                }
            }
        } elseif ($param->getType() == 'array') {
            foreach ($value as $index => $v) {
                if ($args = $param->getLocationArgs()) {
                    if (isset($args['offset'])) {
                        $index += $args['offset'];
                    }
                }
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
