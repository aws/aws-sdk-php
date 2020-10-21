<?php
namespace Aws;

use Aws\Api\Service;

/**
 * Validates the required input parameters of commands are non empty
 *
 * @internal
 */
class InputValidationMiddleware
{

    /** @var callable */
    private $nextHandler;

    /**
     * Create a middleware wrapper function.
     *
     * @param Service $service
     */
    public static function wrap(Service $service) {
        return function (callable $handler) use ($service) {
            return new self($handler, $service);
        };
    }

    public function __construct(
        callable $nextHandler,
        Service $service
    ) {
        $this->service = $service;
        $this->nextHandler = $nextHandler;
    }

    public function __invoke(CommandInterface $cmd) {
        $nextHandler = $this->nextHandler;
        $op = $this->service->getOperation($cmd->getName())->toArray();
        if (!empty($op['input']['shape'])) {
            $service = $this->service->toArray();
            if (!empty($input = $service['shapes'][$op['input']['shape']])) {
                if (!empty($input['required'])) {
                    foreach ($input['required'] as $key => $member) {
                        if (isset($cmd[$member])) {
                            $argument = is_string($cmd[$member]) ?  trim($cmd[$member]) : $cmd[$member];
                            if ($argument !== '') continue;
                        }
                        $commandName = $cmd->getName();
                        throw new \InvalidArgumentException(
                        "The {$commandName} operation requires non-empty parameter: {$member}"
                        );
                    }
                }
            }
        }
        return $nextHandler($cmd);
    }

}
