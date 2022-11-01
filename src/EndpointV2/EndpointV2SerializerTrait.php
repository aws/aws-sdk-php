<?php

namespace Aws\EndpointV2;

/**
 * Set of helper functions used to set endpoints and endpoint
 * properties derived from dynamic endpoint resolution.
 *
 * @internal
 */
trait EndpointV2SerializerTrait
{
    private static $accelerateExclusions = [
        'CreateBucket' => true,
        'DeleteBucket' => true,
        'ListBuckets' => true,
    ];

    private function resolveProviderArgs(
        $operation,
        $endpointProvider,
        $commandArgs,
        $clientArgs,
        $operationName = null
    )
    {
        $service = $this->api->getServiceName();
        $rulesetParams = $endpointProvider->getRuleset()->getParameters();
        $endpointCommandArgs = $this->filterEndpointCommandArgs(
            $rulesetParams,
            $commandArgs,
            $service
        );
        $staticContextParams = $this->scopeStaticContextParams(
            $operation->getStaticContextParams()
        );
        $contextParams = $this->scopeContextParams(
            $commandArgs, $operation->getContextParams()
        );
        $providerArgs = $this->normalizeEndpointProviderArgs(
            $endpointCommandArgs,
            $clientArgs,
            $contextParams,
            $staticContextParams
        );

        if (isset($operationName) && isset(self::$accelerateExclusions[$operationName])
        ) {
            $providerArgs['Accelerate'] = false;
        }

        return $providerArgs;
    }

    private function normalizeEndpointProviderArgs(
        $endpointCommandArgs,
        $clientArgs,
        $contextParams,
        $staticContextParams
    )
    {
        $boundParams  = array_merge(
            array_merge($clientArgs, $contextParams),
            $staticContextParams
        );

        return array_merge($boundParams, $endpointCommandArgs);
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

    private function filterEndpointCommandArgs(
        $rulesetParams,
        $commandArgs,
        $service
    )
    {
        $filteredArgs = [];

        if ($service === 's3' || $service === 's3control') {
            $this->addS3EndpointCommandArgs($commandArgs);
        }

        foreach($rulesetParams as $name => $value) {
            if (isset($rulesetParams[$name]) && isset($commandArgs[$name])) {
                $filteredArgs[$name] = $commandArgs[$name];
            }
        }
        return $filteredArgs;
    }

    private function applyHeaders($endpoint, &$headers)
    {
        if (!is_null($endpoint->getHeaders())) {
           $headers = array_merge(
               $headers,
               $endpoint->getHeaders()
           );
        }
    }

    private function applyAuthSchemeToCommand($endpoint, $command)
    {
        if (isset($endpoint->getProperties()['authSchemes'])) {
            $authScheme = $this->selectAuthScheme(
                $endpoint->getProperties()['authSchemes']
            );
            $command->setAuthSchemes($authScheme);
        }
    }

    private function selectAuthScheme($authSchemes)
    {
        $validAuthSchemes = ['sigv4', 'sigv4a' ];

        foreach($authSchemes as $authScheme) {
            if (in_array($authScheme['name'], $validAuthSchemes)) {
                return $this->normalizeAuthScheme($authScheme);
            } else {
                $unsupportedScheme = $authScheme['name'];
            }
        }

        throw new \InvalidArgumentException(
            "This operation requests {$unsupportedScheme} 
            . but the client only supports sigv4 and sigv4a"
        );
    }

    private function normalizeAuthScheme($authScheme)
    {
       /*
            sigv4a will contain a regionSet property. which is guaranteed to be `*`
            for now.  The SigV4 class handles this automatically for now. It seems
            complexity will be added here in the future.
       */
        $normalizedAuthScheme = [];

        if (isset($authScheme['disableDoubleEncoding'])
            && $authScheme['disableDoubleEncoding'] === true
        ) {
            $normalizedAuthScheme['version'] = 's3v4';
        } else {
            $normalizedAuthScheme['version'] = str_replace(
                'sig', '', $authScheme['name']
            );
        }
        $normalizedAuthScheme['name'] = isset($authScheme['signingName']) ?
            $authScheme['signingName'] : null;
        $normalizedAuthScheme['region'] = isset($authScheme['signingRegion']) ?
            $authScheme['signingRegion'] : null;

        return $normalizedAuthScheme;
    }

    private function processS3RequestUri($requestUri)
    {
        $requestUri = str_replace('/{Bucket}', '/', $requestUri);
        $requestUri = str_replace('//', '/', $requestUri);
        $requestUri = str_replace('/?', '?', $requestUri);

        return $requestUri;
    }

    private function addS3EndpointCommandArgs(&$commandArgs)
    {
        $keys = [
            '@use_dual_stack_endpoint' => 'UseDualStack',
            '@use_accelerate_endpoint' => 'Accelerate',
            '@use_path_style_endpoint' => 'ForcePathStyle'
        ];

        foreach ($keys as $commandKey => $endpointArgKey) {
            if (isset($commandArgs[$commandKey])) {
                if ($commandArgs[$commandKey] === true
                    || $commandArgs[$commandKey] === false
                ) {
                    $commandArgs[$endpointArgKey] = $commandArgs[$commandKey];
                }
            }
        }
    }
}
