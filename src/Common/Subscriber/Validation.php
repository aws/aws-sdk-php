<?php
namespace Aws\Common\Subscriber;

use Aws\Common\Api\Validator;
use GuzzleHttp\Command\Event\InitEvent;
use GuzzleHttp\Event\SubscriberInterface;

/**
 * @internal Validates input before serializing
 */
class Validation implements SubscriberInterface
{
    /** @var \Aws\Common\Api\Validator */
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
        return ['init' => ['onInit']];
    }

    public function onInit(InitEvent $event)
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
