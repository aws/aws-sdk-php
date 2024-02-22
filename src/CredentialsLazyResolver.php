<?php

namespace Aws;

use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * @inheritDoc
 */
class CredentialsLazyResolver implements LazyResolver
{
    /** @var mixed The resolved value */
    private $resolvedValue;

    /** @var callable The callable used to compute the value */
    private $callable;
    /**
     * @var bool $resolvedValueWasPromise
     */
    private $resolvedValueIsDeferred;

    /**
     * Constructs a new LazyResolver instance.
     *
     * @param callable $callable The callable used to compute the value.
     */
    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    /**
     * @inheritDoc
     * this implementation caches the result to avoid re-computation.
     */
    public function resolve(bool $force = false): mixed
    {
        if ($this->isResolved() && !$force) {
            return $this->resolvedValue;
        }

        $fn = $this->callable;
        $resolvedValue = $fn();
        if ($resolvedValue instanceof PromiseInterface) {
            $resolvedValue = $resolvedValue->wait();
            $this->resolvedValueIsDeferred = true;
        }

        return $this->resolvedValue = $resolvedValue;
    }

    /**
     * @inheritDoc
     */
    public function isResolved(): bool
    {
        return isset($this->resolvedValue);
    }

    /**
     * This is for keeping backward compatibility with implementations already in
     * place that starts using this resolver. For example, if credentials are resolved
     * by doing $credentialsProvider(), it can keep being called in that way.
     *
     * @return mixed|PromiseInterface
     */
    public function __invoke()
    {
        if (!$this->isResolved()) {
            $this->resolve();
        }

        $value = $this->resolvedValue;

        if ($this->resolvedValueIsDeferred) {
            $value = Create::promiseFor($value);
        }

        return $value;
    }
}
