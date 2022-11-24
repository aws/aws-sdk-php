<?php

namespace Aws\EndpointV2;

use Aws\Api\Serializer\RestSerializer;
use GuzzleHttp\Psr7\Uri;

/**
 * Set of helper functions used to set endpoints and endpoint
 * properties derived from dynamic endpoint resolution.
 *
 * @internal
 */
trait EndpointV2SerializerTrait
{
    /**
     * Merges endpoint resolution arguments passed from the client
     * and command and attempts to resolve an endpoint. Headers and
     * auth schemes may be returned in a resolved endpoint object.
     * A resolved endpoint uri and headers will be applied to the request.
     * Auth schemes are applied to the command and compared against the default
     * auth scheme at signing.
     *
     * @internal
     */
    private function setRequestOptions(
        $endpointProvider,
        $command,
        $operation,
        $commandArgs,
        $clientArgs,
        &$headers
    )
    {
        $providerArgs = $this->resolveProviderArgs(
            $endpointProvider,
            $operation,
            $commandArgs,
            $clientArgs
        );
        $endpoint = $endpointProvider->resolveEndpoint($providerArgs);

        $this->endpoint = $endpoint->getUrl();
        $this->applyAuthSchemeToCommand($endpoint, $command);
        $this->applyHeaders($endpoint, $headers);
    }

    private function resolveProviderArgs(
        $endpointProvider,
        $operation,
        $commandArgs,
        $clientArgs
    )
    {
        $rulesetParams = $endpointProvider->getRuleset()->getParameters();
        $endpointCommandArgs = $this->filterEndpointCommandArgs(
            $rulesetParams,
            $commandArgs
        );
        $staticContextParams = $this->bindStaticContextParams(
            $operation->getStaticContextParams()
        );
        $contextParams = $this->bindContextParams(
            $commandArgs, $operation->getContextParams()
        );
        $providerArgs = $this->normalizeEndpointProviderArgs(
            $endpointCommandArgs,
            $clientArgs,
            $contextParams,
            $staticContextParams
        );

        return $providerArgs;
    }

    /**
     * Merges endpoint provider arguments from different sources.
     * Client built-ins are superseded by client context params.
     * Client context params are superseded by context params on
     * an input member's shape.  Context params are superseded by
     * static context params. The result of this combination is then
     * merged with any appropriate arguments from the command.
     */
    private function normalizeEndpointProviderArgs(
        $endpointCommandArgs,
        $clientArgs,
        $contextParams,
        $staticContextParams
    )
    {
        $commandContextParams = array_merge($contextParams, $staticContextParams);
        $combinedEndpointArgs = array_merge($clientArgs, $commandContextParams);

        return array_merge($combinedEndpointArgs, $endpointCommandArgs);
    }

    private function bindContextParams($commandArgs, $contextParams)
    {
        $scopedParams = [];

        foreach($contextParams as $name => $spec) {
            if (isset($commandArgs[$spec['shape']])) {
                $scopedParams[$name] = $commandArgs[$spec['shape']];
            }
        }
        return $scopedParams;
    }

    private function bindStaticContextParams($staticContextParams)
    {
        $scopedParams = [];

        forEach($staticContextParams as $paramName => $paramValue) {
            $scopedParams[$paramName] = $paramValue['value'];
        }
        return $scopedParams;
    }

    private function filterEndpointCommandArgs(
        $rulesetParams,
        $commandArgs
    )
    {
        $endpointMiddlewareOpts = [
            '@use_dual_stack_endpoint' => 'UseDualStack',
            '@use_accelerate_endpoint' => 'Accelerate',
            '@use_path_style_endpoint' => 'ForcePathStyle'
        ];

        $filteredArgs = [];

        foreach($rulesetParams as $name => $value) {
            if (isset($commandArgs[$name])) {
                if (!empty($value->getBuiltIn())) {
                    continue;
                }
                $filteredArgs[$name] = $commandArgs[$name];
            }
        }

        if ($this->api->getServiceName() === 's3') {
            foreach($endpointMiddlewareOpts as $optionName => $newValue) {
                if (isset($commandArgs[$optionName])) {
                    $filteredArgs[$newValue] = $commandArgs[$optionName];
                }
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
}
