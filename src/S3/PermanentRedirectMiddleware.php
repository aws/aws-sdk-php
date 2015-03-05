<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Aws\ResultInterface;
use Aws\S3\Exception\PermanentRedirectException;
use Psr\Http\Message\RequestInterface;

/**
 * Throws a PermanentRedirectException exception when a 301 redirect is
 * encountered.
 *
 * @internal
 */
class PermanentRedirectMiddleware
{
    /** @var callable  */
    private $nextHandler;

    /**
     * Create a middleware wrapper function.
     *
     * @return callable
     */
    public static function create()
    {
        return function (callable $handler) {
            return new self($handler);
        };
    }

    /**
     * @param callable $nextHandler Next handler to invoke.
     */
    private function __construct(callable $nextHandler)
    {
        $this->nextHandler = $nextHandler;
    }

    public function __invoke(CommandInterface $command, RequestInterface $request = null)
    {
        $next = $this->nextHandler;
        return $next($command, $request)->then(
            function (ResultInterface $result) use ($command) {
                if ($result['@status'] == 301) {
                    throw new PermanentRedirectException(
                        'Encountered a permanent redirect while requesting '
                        . $result['@effectiveUri'],
                        $command,
                        ['result' => $result]
                    );
                }
                return $result;
            }
        );
    }
}
