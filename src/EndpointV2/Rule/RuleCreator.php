<?php

namespace Aws\EndpointV2\Rule;

use Aws\Exception\UnresolvedEndpointException;

class RuleCreator
{
    public static function create($type, $spec)
    {
        $validRuleTypes = ['endpoint', 'error', 'tree'];
        if (!in_array($type, $validRuleTypes)) {
            throw new UnresolvedEndpointException(
                'Unknown rule type ' . $type .
                'must be of type `Endpoint`, `Tree` or `Error`'
            );
        }

        switch ($type) {
            case 'endpoint':
                return new EndpointRule($spec);
            case 'error':
                return new ErrorRule($spec);
            case 'tree':
                return new TreeRule($spec);
        }
    }
}

