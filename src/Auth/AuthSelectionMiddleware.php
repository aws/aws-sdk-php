<?php
namespace Aws\Auth;

use Aws\Api\Service;
use Aws\CommandInterface;
use Aws\Identity\IdentityInterface;
use Closure;
use GuzzleHttp\Promise\Promise;

/**
 * Handles auth scheme resolution. If a service models and auth scheme using
 * the `auth` trait and the operation or metadata levels, this middleware will
 * attempt to select the first compatible auth scheme it encounters and apply its
 * signature version to the command's `@context` property bag.
 *
 * IMPORTANT: this middleware must be added to the "build" step.
 *
 * @internal
 */
class AuthSelectionMiddleware
{
    /** @var callable */
    private $nextHandler;

    /** @var AuthSchemeResolverInterface */
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
     * @param AuthSchemeResolverInterface $authResolver
     * @param callable $identityProvider
     * @param Service $api
     * @param array $args
     * @return Closure
     */
    public static function wrap(
        AuthSchemeResolverInterface $authResolver,
        callable $identityProvider,
        Service $api,
        array $args
    ): Closure
    {
        return function (callable $handler) use ($authResolver, $identityProvider, $api, $args) {
            return new self($handler, $authResolver, $identityProvider, $api, $args);
        };
    }

    /**
     * @param callable $nextHandler
     * @param $authResolver
     * @param callable $identityProvider
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
        $serviceAuth = $this->api->getMetadata('auth') ?: [];
        $operation = $this->api->getOperation($command->getName());
        $operationAuth = isset($operation['auth']) ? $operation['auth'] : [];
        $resolvableAuth = $operationAuth ?: $serviceAuth;

        if (!empty($resolvableAuth)) {
            if (isset($command['@context']['resolved_identity'])
                && $command['@context']['resolved_identity'] instanceof IdentityInterface
            ) {
                $identity = $command['@context']['resolved_identity'];
            } else {
                $identityFn = $this->identityProvider;
                $identity = $identityFn()->wait();
                $command['@context']['resolved_identity'] = $identity;
            }

            if (isset($command['@context']['auth_scheme_resolver'])
                && $command['@context']['auth_scheme_resolver'] instanceof AuthSchemeResolverInterface
            ){
                $resolver = $command['@context']['auth_scheme_resolver'];
            } else {
                $resolver = $this->authResolver;
            }

            $selectedAuthScheme = $resolver->selectAuthScheme($resolvableAuth, $identity);

            if (!empty($selectedAuthScheme)) {
                $command['@context']['signature_version'] = $selectedAuthScheme;
            }
        }

        return $nextHandler($command);
    }
}
