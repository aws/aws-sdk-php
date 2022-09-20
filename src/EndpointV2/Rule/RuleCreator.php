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

        if ($type === 'endpoint') {
            return self::createEndpointRule($spec);
        } else if ($type === 'error') {
            return self::createErrorRule($spec);
        } else if ($type === 'tree') {
            return self::createTreeRule($spec);
        }
    }

    private static function createEndpointRule($spec)
    {
        return new EndpointRule($spec);
    }

    private static function createErrorRule($spec)
    {
        return new ErrorRule($spec);
    }

    private static function createTreeRule($spec)
    {
        return new TreeRule($spec);
    }
}

