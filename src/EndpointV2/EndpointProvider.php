<?php

namespace Aws\EndpointV2;

use Aws\EndpointV2\Ruleset\Ruleset;
use Aws\Exception\UnresolvedEndpointException;

/**
 * Given a service's Ruleset and client-provided input parameters, provides
 * either an object reflecting the properties of a resolved endpoint,
 * or throws an error.
 */
class EndpointProvider
{
    /** @var Ruleset */
    private $ruleSet;

    public function __construct(array $ruleSet, array $partitions = null)
    {
        $this->ruleSet = new Ruleset($ruleSet, $partitions);
    }

    /**
     * @return Ruleset
     */
    public function getRuleSet()
    {
        return $this->ruleSet;
    }

    /**
     * Given a Ruleset and input parameters, determines the correct endpoint
     * or an error to be thrown for a given request.
     *
     * @return RulesetEndpoint
     * @throws UnresolvedEndpointException
     */
    public function resolveEndpoint(array $inputParameters)
    {
        $errorParams = $inputParameters;
        $endpoint = $this->ruleSet->evaluate($inputParameters);

        if (is_null($endpoint)) {
            throw new UnresolvedEndpointException(
                'Unable to resolve an endpoint using the provider arguments: '
                . json_encode($errorParams) . '. Note: you can provide an "endpoint" '
                . 'option to a client constructor to bypass the use of an endpoint '
                . 'provider.');
        }
        return $endpoint;
    }
}
