<?php
namespace Aws\Auth;

use Aws\Api\Service;
use Aws\CommandInterface;
use Closure;
use GuzzleHttp\Promise\Promise;

/**
 * Handles auth scheme resolution.
 *
 * IMPORTANT: this middleware must be added to the "build" step.
 * Specifically, it must precede the 'endpoint-v2-middleware' step.
 *
 * @internal
 */
class AuthSchemeMiddleware
{
    /** @var callable */
    private $nextHandler;

    /** @var callable | AuthResolver */
    private $authResolver;

    /** @var callable */
    private $identityProvider;

    /** @var Service */
    private $api;

    /** @var array */
    private $clientArgs;

    /**
     * Create a middleware wrapper function
     *
     * @param AuthResolver|callable $authResolver
     * @param callable $identityProvider
     * @param Service $api
     * @param array $args
     * @return Closure
     */
    public static function wrap(
        $authResolver,
        callable $identityProvider,
        Service $api,
        array $args,
    ) : Closure
    {
        return function (callable $handler) use ($authResolver, $identityProvider, $api, $args) {
            return new self($handler, $authResolver, $identityProvider, $api, $args);
        };
    }

    /**
     * @param callable $nextHandler
     * @param EndpointProviderV2 $endpointProvider
     * @param Service $api
     * @param array $args
     */
    public function __construct(
        callable $nextHandler,
        $authResolver,
        callable $identityProvider,
        Service $api,
        array $args = []
    )
    {
        $this->nextHandler = $nextHandler;
        $this->authResolver = $authResolver;
        $this->api = $api;
        $this->identityProvider = $identityProvider;
        $this->clientArgs = $args;
    }

    /**
     * @param CommandInterface $command
     *
     * @return Promise
     */
    public function __invoke(CommandInterface $command)
    {
        $nextHandler = $this->nextHandler;
        $identityFn = $this->identityProvider;
        $identity = $identityFn()->wait();
        $serviceAuth = $this->api->getMetadata('auth') ?? [];
        $operationAuth = $this->api->getOperation($command->getName())['auth'] ?? [];
        $resolvableAuth = $operationAuth ?: $serviceAuth;

        if (!empty($resolvableAuth)) {
            $resolver = ($command['@context']['authResolver'] ?? null) instanceof AuthSchemeResolverInterface
                ? $command['@context']['authResolver']
                : $this->authResolver;
            $selectedAuthScheme = $resolver->selectAuthScheme($resolvableAuth, $identity);

            if (!empty($selectedAuthScheme)) {
                $command['@context']['signature_version'] = $selectedAuthScheme;
            }
        }

        return $nextHandler($command);
    }
}
