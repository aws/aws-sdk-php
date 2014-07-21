<?php
namespace Aws\Common\Subscriber;

use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Stream;

/**
 * Looks for instances of a "Filename" parameter and turns it into a Body param.
 */
class SourceFile implements SubscriberInterface
{
    /** @var string The key for the upload body parameter */
    private $bodyParameter;

    /** @var string The key for the source file parameter */
    private $sourceParameter;

    /**
     * @param string $bodyParameter   The key for the body parameter
     * @param string $sourceParameter The key for the source file parameter
     */
    public function __construct(
        $bodyParameter = 'Body',
        $sourceParameter = 'SourceFile'
    ) {
        $this->bodyParameter = (string) $bodyParameter;
        $this->sourceParameter = (string) $sourceParameter;
    }

    public function getEvents()
    {
        return ['prepare' => ['onPrepare']];
    }

    public function onPrepare(PrepareEvent $event)
    {
        /** @var \Aws\AwsCommandInterface $command */
        $command = $event->getCommand();
        $source = $command[$this->sourceParameter];

        if ($source === null) {
            return;
        }

        $input = $command->getOperation()->getInput();

        if (!$input->hasMember($this->bodyParameter)) {
            throw new \InvalidArgumentException($command->getName() . ' does '
                . 'not support the ' . $this->sourceParameter . ' parameter');
        }

        if (!file_exists($source)) {
            throw new \InvalidArgumentException('Invalid source '
                . 'parameter: ' . $source . '. ' . error_get_last()['message']);
        }

        unset($command[$this->sourceParameter]);
        $command[$this->bodyParameter] = Stream\create(fopen($source, 'r'));
    }
}
