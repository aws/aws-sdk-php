<?php
namespace Aws;

use Aws\Exception\AwsException;
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * A "waiter" associated with an AWS resource (e.g., EC2 instance) that polls
 * the resource and waits until the resource is in a particular state.
 *
 * The configuration for the waiter must include information about the operation
 * and the conditions for wait completion. Waiters can be used in a blocking or
 * non-blocking manner and implement the same future/promise characteristics
 * that normal operations do.
 */
class Waiter extends Promise
{
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

    /** @var callable Callback executed when attempt response is processed. */
    private $processfn;

    /** @var PromiseInterface Promise of the most recent attempt. */
    private $currentFuture;

    /** @var array Default configuration options. */
    private static $defaults = ['initDelay' => 0, 'retry' => null];

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
     * @param array              $args   Command arguments.
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
        $this->args['@future'] = true; // Ensure all are asynchronous
        $this->config = $config + self::$defaults;
        $this->validate();
        $this->processfn = $this->getProcessFn();

        $this->cancelfn = function () {
            if ($this->currentFuture) {
                $this->currentFuture->cancel();
            }
        };

        // Give the wait function to the parent class.
        parent::__construct(function () {
            if ($this->currentFuture) {
                $this->currentFuture->wait();
            }
        });

        $this->pollResource();
    }

    /**
     * Returns a callback function that will be called during the "process"
     * event of every attempt of polling the resource.
     *
     * @return callable
     */
    private function getProcessFn()
    {
        return function ($result) {
            // $state = $this->determineState($result);
            static $tries = 0;
            $state = ++$tries < 5 ? 'retry' : 'success';

            if ($state === 'success') {
                $this->resolve($result);
            } elseif ($state === 'failed') {
                $this->reject("The {$this->name} waiter entered a failure state.", 0, $result);
            } elseif ($this->attempt < $this->config['maxAttempts']) {
                if ($this->config['retry']) {
                    $this->config['retry']($this->attempt);
                }
                $this->pollResource();
            } else {
                $this->reject(new \RuntimeException(
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
        if ($this->getState() !== 'pending') {
            return;
        }

        $this->attempt++;

        // Create the command use to check the resource's status
        $command = $this->client->getCommand(
            $this->config['operation'],
            $this->args
        );

        // Get the configured delay for this attempt.
        $delay = ($this->attempt === 1)
            ? $this->config['initDelay']
            : $this->config['delay'];

        if (is_callable($delay)) {
            $delay = $delay($this->attempt);
        }

        if ($delay) {
            // $command->setRequestOption('delay', $delay * 1000);
        }

        $this->currentFuture = $this->client->execute($command);

        // Add listeners to set delay for and process results of the attempt.
        $this->currentFuture->then(
            $this->processfn,
            $this->processfn
        );
    }

    /**
     * Determines the state of the waiter attempt, based on the result of
     * polling the resource. A waiter can have the state of "success", "failed",
     * or "retry".
     *
     * @param mixed $result
     *
     * @return string Will be "success", "failed", or "retry"
     */
    private function determineState($result)
    {
        foreach ($this->config['acceptors'] as $acceptor) {
            $matcher = 'matches' . ucfirst($acceptor['matcher']);
            if ($this->{$matcher}($result, $acceptor)) {
                return $acceptor['state'];
            }
        }

        return $result instanceof \Exception ? 'failed' : 'retry';
    }

    /**
     * @param result $result   Result or exception.
     * @param array  $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesPath($result, array $acceptor)
    {
        return !($result instanceof ResultInterface)
            ? false
            : $acceptor['expected'] == $result->search($acceptor['argument']);
    }

    /**
     * @param result $result   Result or exception.
     * @param array  $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesPathAll($result, array $acceptor)
    {
        if (!($result instanceof ResultInterface)) {
            return false;
        }

        $actuals = $result->search($acceptor['argument']) ?: [];
        foreach ($actuals as $actual) {
            if ($actual != $acceptor['expected']) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param result $result   Result or exception.
     * @param array  $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesPathAny($result, array $acceptor)
    {
        if (!($result instanceof ResultInterface)) {
            return false;
        }

        $actuals = $result->search($acceptor['argument']) ?: [];
        foreach ($actuals as $actual) {
            if ($actual == $acceptor['expected']) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param result $result   Result or exception.
     * @param array  $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesStatus($result, array $acceptor)
    {
        return !($result instanceof ResultInterface)
            ? false
            : $acceptor['expected'] == $result['@status'];
    }

    /**
     * @param result $result   Result or exception.
     * @param array  $acceptor Acceptor configuration being checked.
     *
     * @return bool
     */
    private function matchesError($result, array $acceptor)
    {
        return !($result instanceof AwsException)
            ? false
            : $result->getAwsErrorCode() == $acceptor['expected'];
    }

    private function validate()
    {
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
    }
}
