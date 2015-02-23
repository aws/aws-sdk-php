<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Aws\ResultInterface;

/**
 * Injects ObjectURL into the result of the PutObject operation.
 *
 * @internal
 */
class PutObjectUrlMiddleware
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

    public function __invoke(CommandInterface $command)
    {
        $next = $this->nextHandler;
        return $next($command)->then(
            function (ResultInterface $result) use ($command) {
                $name = $command->getName();
                if ($name === 'PutObject' || $name === 'CopyObject') {
                    $result['ObjectURL'] = $result['@effectiveUri'];
                } elseif ($name === 'CompleteMultipartUpload') {
                    $result['ObjectURL'] = $result['Location'];
                }
                return $result;
            }
        );
    }
}
