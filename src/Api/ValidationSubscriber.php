<?php
namespace Aws\Api;

use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * @internal Validates input before serializing
 */
class ValidationSubscriber implements SubscriberInterface
{
    /** @var \Aws\Api\Validator */
    private $validator;

    /**
     * @param Validator $validator Validator used to validate input
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function getEvents()
    {
        return ['prepare' => ['onPrepare']];
    }

    public function onPrepare(PrepareEvent $event)
    {
        /** @var \Aws\AwsCommandInterface $command */
        $command = $event->getCommand();
        $operation = $command->getOperation();
        $this->validator->validate(
            $command->getName(),
            $operation->getInput(),
            $command->toArray()
        );
    }
}
