<?php

namespace Aws\EndpointV2;


trait EndpointV2MiddlewareTrait
{
    private function normalizeEndpointProviderArgs(
        $commandArgs,
        $inputMembers,
        $clientArgs,
        $contextParams,
        $staticContextParams
    )
    {
        $filteredCommandArgs = $this->filterCommandArgs($inputMembers, $commandArgs);
        $boundParams  = array_merge(array_merge($clientArgs, $contextParams), $staticContextParams);
        return array_merge($filteredCommandArgs, $boundParams);
    }

    private function scopeContextParams($commandArgs, $contextParams)
    {
        $scopedParams = [];

        foreach($contextParams as $name => $spec) {
            if (isset($commandArgs[$spec['shape']])) {
                $scopedParams[$name] = $commandArgs[$spec['shape']];
            }
        }
        return $scopedParams;
    }

    private function scopeStaticContextParams($staticContextParams)
    {
        $scopedParams = [];

        forEach($staticContextParams as $paramName => $paramValue) {
            $scopedParams[$paramName] = $paramValue['value'];
        }
        return $scopedParams;
    }

    private function filterCommandArgs($members, $commandArgs)
    {
        $filteredArgs = [];

        foreach($members as $name => $value) {
            if (isset($commandArgs[$name])) {
                $filteredArgs[$name] = $commandArgs[$name];
            }
        }
        return $filteredArgs;
    }
}