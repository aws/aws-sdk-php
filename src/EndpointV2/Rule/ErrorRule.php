<?php

namespace Aws\EndpointV2\Rule;

use Aws\EndpointV2\Ruleset\RulesetStandardLibrary;
use Aws\Exception\UnresolvedEndpointException;

class ErrorRule extends Rule
{
    /** @var array */
    private $error;

    public function __construct($spec)
    {
        parent::__construct($spec);
        $this->error = $spec['error'];
    }

    /**
     * @return array
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * If an error rule's conditions are met, raise an
     * UnresolvedEndpointError containing the fully resolved error string.
     *
     * @return null
     * @throws UnresolvedEndpointException
     */
    public function evaluate(
        array &$inputParameters,
        RulesetStandardLibrary $standardLibrary
    )
    {
        if ($this->evaluateConditions($inputParameters, $standardLibrary)) {
            $message = $standardLibrary->resolveValue($this->error, $inputParameters);
            throw new UnresolvedEndpointException($message);
        }
        return false;
    }
}
