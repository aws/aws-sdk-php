<?php
namespace Aws\Common\Subscriber;

use Aws\Common\Api\Service;
use GuzzleHttp\Command\Event\InitEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * @internal Validates input before serializing
 */
class Validation implements SubscriberInterface
{
    /** @var \Aws\Common\Api\Validator */
    private $validator;

    /** @var Service */
    private $api;

    /**
     * The provided validator function is a callable that accepts the
     * following positional arguments:
     *
     * - string, name of the operation
     * - Aws\Common\Api\Shape, shape being validated against
     * - array, input data being validated
     *
     * The callable is expected to throw an \InvalidArgumentException when the
     * provided input data does not match the shape.
     *
     * @param Service  $api       API being hit.
     * @param callable $validator Function used to validate input.
     */
    public function __construct(Service $api, callable $validator)
    {
        $this->validator = $validator;
        $this->api = $api;
    }

    public function getEvents()
    {
        return ['init' => ['onInit']];
    }

    public function onInit(InitEvent $event)
    {
        $command = $event->getCommand();
        $operation = $this->api->getOperation($command->getName());
        $fn = $this->validator;
        $fn($command->getName(), $operation->getInput(), $command->toArray());
    }
}
