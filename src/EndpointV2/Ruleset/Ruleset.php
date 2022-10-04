<?php

namespace Aws\EndpointV2\Ruleset;

use Aws\EndpointV2\Rule\RuleCreator;

/**
 * A collection of rules, parameter specs and a class of helper functions
 * used to resolve either an endpoint or an error.
 */
Class Ruleset
{
    /** @var string */
    private $version;

    /** @var array */
    private $parameters;

    /** @var array */
    private $rules;

    /** @var RulesetStandardLibrary */
    public $standardLibrary;

    public function __construct(array $ruleset, array $partitions)
    {
        $this->version = $ruleset['version'];
        $this->parameters = $this->createParameters($ruleset['parameters']);
        $this->rules = $this->createRules($ruleset['rules']);
        $this->standardLibrary = new RulesetStandardLibrary($partitions);
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Evaluate the ruleset against the input parameters.
     * Return the first rule the parameters match against.
     *
     * @return mixed
     */
    public function evaluate(array $inputParameters)
    {
        $this->validateInputParameters($inputParameters);

        foreach($this->rules as $rule) {
            $inputParametersCopy = $inputParameters;
            $evaluation = $rule->evaluate($inputParametersCopy, $this->standardLibrary);
            if ($evaluation !== false) {
                return $evaluation;
            }
        }
        return false;
    }

    /**
     * Ensures all corresponding client-provided parameters match
     * the Ruleset parameters' specified type.
     *
     * @return void
     */
    private function validateInputParameters(array &$inputParameters)
    {
        foreach($this->parameters as $paramName => $paramSpec) {
            $inputParam = isset($inputParameters[$paramName]) ? $inputParameters[$paramName] : null;

            if (is_null($inputParam) && !is_null($paramSpec->getDefault())) {
                $inputParameters[$paramName] = $paramSpec->getDefault();
            } elseif (!is_null($inputParam)) {
                $paramSpec->validateInputParam($inputParam);
            }
        }
    }

    private function createParameters(array $parameters)
    {
        $parameterList = [];

        foreach($parameters as $name => $spec) {
            $parameterList[$name] = new RulesetParameter($name, $spec);
        }

        return $parameterList;
    }

    private function createRules(array $rules)
    {
        $rulesList = [];

        forEach($rules as $rule) {
            $ruleObj = RuleCreator::create($rule['type'], $rule);
            $rulesList[] = $ruleObj;
        }
        return $rulesList;
    }
}

