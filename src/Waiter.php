<?php
namespace Aws;

use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Ring\Future\BaseFutureTrait;
use GuzzleHttp\Ring\Future\FutureInterface;
use React\Promise\Deferred;

/**
 * A "waiter" associated with an AWS resource (e.g., EC2 instance) that polls
 * the resource and waits until the resource is in a particular state.
 *
 * The configuration for the waiter must include information about the operation
 * and the conditions for wait completion. Waiters can be used in a blocking or
 * non-blocking manner and implement the same future/promise characteristics
 * that normal operations do.
 */
class Waiter implements FutureInterface
{
    use BaseFutureTrait {
        BaseFutureTrait::wait as parentWait;
    }

    /** @var AwsClientInterface Client used to execute each attempt. */
    private $client;

    /** @var string Name of the waiter. */
    private $name;

    /** @var array Params to use with each attempt operation. */
    private $args;

    /** @var array Waiter configuration. */
    private $config;

    /** @var int The number of the current attempt to poll the resource. */
    private $attempt;

    /** @var Deferred Represents the async state of the waiter. */
    private $deferred;

    /** @var callable Callback executed when attempt response is processed. */
    private $processfn;

    /** @var FutureResult Future of the most recent attempt. */
    private $currentFuture;

    /** @var array Default configuration options. */
    private static $defaults = [
        'initDelay' => 0,
        'retry'     => null,
    ];

    /** @var array Required configuration options. */
    private static $required = [
        'acceptors',
        'delay',
        'maxAttempts',
        'operation',
    ];

    /**
     * @param AwsClientInterface $client Client used to execute commands.
     * @param string             $name   Waiter name.
     * @param array              $args   Arguments for command.
     * @param array              $config Waiter config that overrides defaults.
     *
     * @throws \InvalidArgumentException if the configuration is incomplete.
     */
    public function __construct(
        AwsClientInterface $client,
        $name,
        array $args = [],
        array $config = []
    ) {
        // Set the necessary items to configure the waiter.
        $this->client = $client;
        $this->name = $name;
        $this->args = $args;
        $this->config = $config + self::$defaults;
        foreach (self::$required as $key) {
            if (!isset($this->config[$key])) {
                throw new \InvalidArgumentException(
                    'The provided waiter configuration was incomplete.'
                );
            }
        }
        if (isset($this->config['retry']) && !is_callable($this->config['retry'])) {
            throw new \InvalidArgumentException(
                'The provided "retry" callback is not callable.'
            );
        }

        // Configure the asynchronous behavior.
        $this->deferred = new Deferred();
        $this->wrappedPromise = $this->deferred->promise();

        // Setup callbacks.
        $this->processfn = $this->getProcessFn();
        $this->waitfn = function () {
            // If doing a blocking wait, just do attempts in a loop.
            while (!$this->isRealized
                && $this->attempt < $this->config['maxAttempts']
            ) {
                $this->pollResource();
            }
        };
        $this->cancelfn = function () {
            if ($this->currentFuture instanceof FutureInterface) {
                $this->currentFuture->cancel();
            }
        };

        // If async, begin waiting.
        if (!empty($this->args['@future'])) {
            $this->pollResource();
        }
    }

    public function wait()
    {
        $this->args['@future'] = false;
        if ($this->currentFuture instanceof FutureInterface) {
            $this->currentFuture->wait();
        }
        return $this->parentWait();
    }

    /**
     * Returns a callback function that will be called during the "process"
     * event of every attempt of polling the resource.
     *
     * @return callable
     */
    private function getProcessFn()
    {
        return function (ProcessEvent $event) {
            $state = $this->determineState($event);
            if ($state === 'success') {
                $this->deferred->resolve($event->getResult());
            } elseif ($state === 'failed') {
                $this->deferred->reject(new \RuntimeException(
                    "The {$this->name} waiter entered a failure state.", 0,
                    $event->getException()
                ));
                $event->setResult(true);
            } elseif ($this->attempt < $this->config['maxAttempts']) {
                if ($this->config['retry']) {
                    $this->config['retry']($this->attempt);
                }
                if ($this->args['@future'] === true) {
                    $this->deferred->progress($this->attempt);
                    $this->pollResource();
                }
            } else {
                $this->deferred->reject(new \RuntimeException(
                    "Waiter failed after the attempt #{$this->attempt}."
                ));
            }
        };
    }

    /**
     * Executes the command that polls the status of the resource to see if the
     * waiter can stop waiting.
     */
    private function pollResource()
    {
        // If the waiter's future is realized, do not make any more attempts.
        if ($this->isRealized) {
            return;
        }

        $this->attempt++;

        // Create the command use to check the resource's status
        $command = $this->client->getCommand(
            $this->config['operation'],
            $this->args
        );

        // Add listeners to set delay for and process results of the attempt.
        $emitter = $command->getEmitter();
        $emitter->on('process', $this->processfn, 'last');
        if ($delayFn = $this->getDelayFn()) {
            $emitter->on('prepared', $delayFn);
        }

        $this->currentFuture = $this->client->execute($command);
    }

    /**
     * Returns a callback function that will set the delay of a request when
     * attached to a "prepared" event.
     *
     * @return callable|null
     */
    private function getDelayFn()
    {
        // Get the configured delay for this attempt.
        $delay = ($this->attempt === 1)
            ? $this->config['initDelay']
            : $this->config['delay'];
        if (is_callable($delay)) {
            $delay = $delay($this->attempt);
        }

        // Set the delay as a request config option so it is managed at the
        // HTTP adapter layer in a potentially concurrent way.
        if ($delay) {
            return function (PreparedEvent $event) use ($delay) {
                $delay *= 1000; // RingPHP expects delay in milliseconds.
                $event->getRequest()->getConfig()->set('delay', $delay);
            };
        }

        return null;
    }

    /**
     * Determines the state of the waiter attempt, based on the result of
     * polling the resource. A waiter can have the state of "success", "failed",
     * or "retry".
     *
     * @param ProcessEvent $event
     *
     * @return string Will be "success", "failed", or "retry"
     */
    private function determineState(ProcessEvent $event)
    {
        foreach ($this->config['acceptors'] as $acceptor) {
            $matcher = 'matches' . ucfirst($acceptor['matcher']);
            if ($this->{$matcher}($event, $acceptor)) {
                return $acceptor['state'];
            }
        }

        return $event->getException() ? 'failed' : 'retry';
    }

    /**
     * @param ProcessEvent $event    Process event of the attempt.
     * @param array        $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesPath(ProcessEvent $event, array $acceptor)
    {
        if (!$event->getResult()) {
            return false;
        }

        $actual = $event->getResult()->search($acceptor['argument']);

        return $acceptor['expected'] == $actual;
    }

    /**
     * @param ProcessEvent $event    Process event of the attempt.
     * @param array        $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesPathAll(ProcessEvent $event, array $acceptor)
    {
        if (!$event->getResult()) {
            return false;
        }

        $actuals = $event->getResult()->search($acceptor['argument']) ?: [];
        foreach ($actuals as $actual) {
            if ($actual != $acceptor['expected']) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param ProcessEvent $event    Process event of the attempt.
     * @param array        $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesPathAny(ProcessEvent $event, array $acceptor)
    {
        if (!$event->getResult()) {
            return false;
        }

        $actuals = $event->getResult()->search($acceptor['argument']) ?: [];
        foreach ($actuals as $actual) {
            if ($actual == $acceptor['expected']) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param ProcessEvent $event    Process event of the attempt.
     * @param array        $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesStatus(ProcessEvent $event, array $acceptor)
    {
        if (!$event->getResponse()) {
            return false;
        }

        return $acceptor['expected'] == $event->getResponse()->getStatusCode();
    }

    /**
     * @param ProcessEvent $event    Process event of the attempt.
     * @param array        $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesError(ProcessEvent $event, array $acceptor)
    {
        /** @var \Aws\Exception\AwsException $exception */
        $exception = $event->getException();
        if (!$exception) {
            return false;
        }

        $actual = $exception->getAwsErrorCode();
        if ($actual == $acceptor['expected']) {
            $event->setResult(true); // a.k.a do not throw the exception.
            return true;
        }

        return false;
    }
}
