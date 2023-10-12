<?php
namespace Aws\EndpointV2;

use Aws\Api\Service;

/**
 * Handles endpoint rule evaluation and endpoint resolution.
 *
 * IMPORTANT: this middleware must be prepended to the "build" step.
 *
 * @internal
 */
class EndpointV2Middleware
{
    /** @var callable */
    private $nextHandler;

    /** @var EndpointProviderV2 */
    private $endpointProvider;

    private $api;

    private $clientArgs;


    /**
     * Create a middleware wrapper function
     *
     * @param EndpointProviderV2 $endpointProvider
     * @param Service $api
     * @param array $args
     * @return \Closure
     */
    public static function wrap(
        EndpointProviderV2 $endpointProvider,
        Service $api,
        array $args
    )
    {
        return function (callable $handler) use ($endpointProvider, $api, $args) {
            return new self($handler, $endpointProvider, $api, $args);
        };
    }

    public function __construct(
        callable $nextHandler,
        EndpointProviderV2 $endpointProvider,
        Service $api,
        array $args
    )
    {
        $this->nextHandler = $nextHandler;
        $this->endpointProvider = $endpointProvider;
        $this->api = $api;
        $this->clientArgs = $args;
    }

    public function __invoke($command)
    {
        $nextHandler = $this->nextHandler;
        $operation = $this->api->getOperation($command->getName());
        $commandArgs = $command->toArray();

        $providerArgs = $this->resolveArgs($commandArgs, $operation);
        $endpoint = $this->endpointProvider->resolveEndpoint($providerArgs);

        if (!empty($endpoint->getProperties()['authSchemes'])) {
            $this->applyAuthScheme(
                $endpoint->getProperties()['authSchemes'],
                $command
            );
        }

        return $nextHandler($command, $endpoint);
    }

    private function resolveArgs($commandArgs, $operation)
    {
        $rulesetParams = $this->endpointProvider->getRuleset()->getParameters();
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

        return array_merge(
            $this->clientArgs,
            $contextParams,
            $staticContextParams,
            $endpointCommandArgs
        );
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

    private function bindStaticContextParams($staticContextParams)
    {
        $scopedParams = [];

        forEach($staticContextParams as $paramName => $paramValue) {
            $scopedParams[$paramName] = $paramValue['value'];
        }
        return $scopedParams;
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

    private function applyAuthScheme($authSchemes, $command)
    {
        $authScheme = $this->resolveAuthScheme($authSchemes);
        $command->setAuthSchemes($authScheme);
    }

    private function resolveAuthScheme($authSchemes)
    {
        $validAuthSchemes = ['sigv4', 'sigv4a', 'none', 'bearer'];
        $invalidAuthSchemes = [];

        foreach($authSchemes as $authScheme) {
            if (in_array($authScheme['name'], $validAuthSchemes)) {
                return $this->normalizeAuthScheme($authScheme);
            } else {
                $invalidAuthSchemes[] = "`{$authScheme['name']}`";
            }
        }

        $invalidAuthSchemesString = implode(', ', $invalidAuthSchemes);
        $validAuthSchemesString = '`' . implode('`, `', $validAuthSchemes) . '`';
        throw new \InvalidArgumentException(
            "This operation requests {$invalidAuthSchemesString}"
            . " auth schemes, but the client only supports {$validAuthSchemesString}."
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
            && $authScheme['name'] !== 'sigv4a'
        ) {
            $normalizedAuthScheme['version'] = 's3v4';
        } elseif ($authScheme['name'] === 'none') {
            $normalizedAuthScheme['version'] = 'anonymous';
        }
        else {
            $normalizedAuthScheme['version'] = str_replace(
                'sig', '', $authScheme['name']
            );
        }

        $normalizedAuthScheme['name'] = $authScheme['signingName'] ?? null;
        $normalizedAuthScheme['region'] = $authScheme['signingRegion'] ?? null;
        $normalizedAuthScheme['signingRegionSet'] = $authScheme['signingRegionSet'] ?? null;

        return $normalizedAuthScheme;
    }
}
