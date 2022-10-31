<?php

namespace Aws\EndpointV2;

use Aws\EndpointV2\Ruleset\Ruleset;
use Aws\Exception\UnresolvedEndpointException;
use Aws\LruArrayCache;

/**
 * Given a service's Ruleset and client-provided input parameters, provides
 * either an object reflecting the properties of a resolved endpoint,
 * or throws an error.
 */
class EndpointProvider
{
    /** @var Ruleset */
    private $ruleSet;

    /** @var LruArrayCache */
    private $cache;

    public function __construct(array $ruleSet, array $partitions)
    {
        $this->ruleSet = new Ruleset($ruleSet, $partitions);
        $this->cache = new LruArrayCache(100);
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
        $hashedParams = $this->hashInputParameters($inputParameters);
        $match = $this->cache->get($hashedParams);

        if (!is_null($match)) {
            return $match;
        }

        $endpoint = $this->ruleSet->evaluate($inputParameters);
        if ($endpoint === false) {
            throw new UnresolvedEndpointException(
                'Unable to resolve an endpoint using the provider arguments: '
                . json_encode($errorParams)
            );
        }
        $this->cache->set($hashedParams, $endpoint);

        return $endpoint;
    }

    private function hashInputParameters($inputParameters)
    {
        return md5(serialize($inputParameters));
    }
}
