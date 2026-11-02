<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\Credentials;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Scripted, invokable credential source for the closure-based credential-refresh
 * compliance runner. Responses are queued ahead of each call. The source records
 * whether it was contacted and what it last returned so tests can distinguish
 * freshly returned credentials from cached ones.
 */
final class ScriptedSourceClosure
{
    /** @var array Queue of Credentials or rejected PromiseInterface. */
    private $queue = [];

    /** @var bool */
    private $contacted = false;

    /** @var Credentials|null */
    private $lastReturned;

    /**
     * @param Credentials|PromiseInterface $response
     */
    public function queue($response): void
    {
        $this->queue[] = $response;
    }

    public function resetContacted(): void
    {
        $this->contacted = false;
        $this->lastReturned = null;
    }

    public function wasContacted(): bool
    {
        return $this->contacted;
    }

    public function lastReturnedIs($creds): bool
    {
        return $this->lastReturned !== null && $this->lastReturned === $creds;
    }

    public function __invoke($previousCredentials = null): PromiseInterface
    {
        $this->contacted = true;

        if (empty($this->queue)) {
            throw new \LogicException('ScriptedSourceClosure contacted with no queued response.');
        }

        $response = array_shift($this->queue);

        if ($response instanceof Credentials) {
            $this->lastReturned = $response;
            return Create::promiseFor($response);
        }

        return Create::promiseFor($response);
    }
}
