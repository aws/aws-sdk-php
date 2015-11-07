<?php
namespace Aws;

use Aws\Exception\AwsException;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7;

/**
 * @internal Middleware that retries failures.
 */
class RetryMiddleware
{
    private static $retryStatusCodes = [
        500 => true,
        503 => true
    ];

    private static $retryCodes = [
        'RequestLimitExceeded'                   => true,
        'Throttling'                             => true,
        'ThrottlingException'                    => true,
        'ProvisionedThroughputExceededException' => true,
        'RequestThrottled'                       => true,
    ];

    private $decider;
    private $delay;
    private $nextHandler;

    public function __construct(
        callable $decider,
        callable $delay,
        callable $nextHandler
    ) {
        $this->decider = $decider;
        $this->delay = $delay;
        $this->nextHandler = $nextHandler;
    }

    /**
     * Creates a default AWS retry decider function.
     *
     * @param int $maxRetries
     *
     * @return callable
     */
    public static function createDefaultDecider($maxRetries = 3)
    {
        return function (
            $retries,
            CommandInterface $command,
            RequestInterface $request,
            ResultInterface $result = null,
            $error = null
        ) use ($maxRetries) {
            // Allow command-level options to override this value
            $maxRetries = null !== $command['@retries'] ?
                $command['@retries']
                : $maxRetries;

            if ($retries >= $maxRetries) {
                return false;
            } elseif (!$error) {
                return isset(self::$retryStatusCodes[$result['@metadata']['statusCode']]);
            } elseif (!($error instanceof AwsException)) {
                return false;
            } elseif ($error->isConnectionError()) {
                return true;
            } elseif (isset(self::$retryCodes[$error->getAwsErrorCode()])) {
                return true;
            } elseif (isset(self::$retryStatusCodes[$error->getStatusCode()])) {
                return true;
            } else {
                return false;
            }
        };
    }

    /**
     * Delay function that calculates an exponential delay.
     *
     * @param $retries
     *
     * @return int
     */
    public static function exponentialDelay($retries)
    {
        return mt_rand(0, (int) pow(2, $retries - 1) * 100);
    }

    /**
     * @param CommandInterface $command
     * @param RequestInterface $request
     *
     * @return PromiseInterface
     */
    public function __invoke(
        CommandInterface $command,
        RequestInterface $request = null
    ) {
        $retries = 0;
        $handler = $this->nextHandler;
        $decider = $this->decider;
        $delay = $this->delay;

        $g = function ($value) use ($handler, $decider, $delay, $command, $request, &$retries, &$g) {
            if ($value instanceof \Exception) {
                if (!$decider($retries, $command, $request, null, $value)) {
                    return \GuzzleHttp\Promise\rejection_for($value);
                }
            } elseif ($value instanceof ResultInterface
                && !$decider($retries, $command, $request, $value, null)
            ) {
                return $value;
            }

            // Delay fn is called with 0, 1, ... so increment after the call.
            $command['@http']['delay'] = $delay($retries++);
            return $handler($command, $request)->then($g, $g);
        };

        return $handler($command, $request)->then($g, $g);
    }
}
