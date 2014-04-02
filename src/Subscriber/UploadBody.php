<?php
namespace Aws\Subscriber;

use GuzzleHttp\Command\Event\PrepareEvent;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Stream;

/**
 * Prepares the body parameter of a command such that the parameter is more
 * flexible (e.g. accepts file handles) with the value it accepts but converts
 * it to the correct format for the command. Also looks for a "Filename"
 * parameter.
 */
class UploadBody implements SubscriberInterface
{
    /** @var array Hash of command names to modify */
    private $commands;

    /** @var string The key for the upload body parameter */
    private $bodyParameter;

    /** @var string The key for the source file parameter */
    private $sourceParameter;

    /**
     * @param array  $commands        The commands to modify
     * @param string $bodyParameter   The key for the body parameter
     * @param string $sourceParameter The key for the source file parameter
     */
    public function __construct(
        array $commands,
        $bodyParameter = 'Body',
        $sourceParameter = 'SourceFile'
    ) {
        $this->commands = array_fill_keys($commands, true);
        $this->bodyParameter = (string) $bodyParameter;
        $this->sourceParameter = (string) $sourceParameter;
    }

    public function getEvents()
    {
        return ['prepare' => ['onPrepare']];
    }

    /**
     * Converts filenames and file handles into StreamInterface objects before
     * the command is validated.
     *
     * @throws \InvalidArgumentException
     */
    public function onPrepare(PrepareEvent $event)
    {
        $command = $event->getCommand();

        if (!isset($this->commands[$command->getName()])) {
            return;
        }

        // Get the interesting parameters
        $source = $command[$this->sourceParameter];
        $body = $command[$this->bodyParameter];

        // If a file path is passed in then get the file handle
        if (is_string($source) && file_exists($source)) {
            $body = fopen($source, 'r');
        }

        if ($body === null) {
            throw new \InvalidArgumentException("You must specify a "
                . "non-null value for the {$this->bodyParameter} or "
                . $this->sourceParameter . " parameters.");
        }

        // Prepare the body parameter and remove the source file parameter
        unset($command[$this->sourceParameter]);
        $command[$this->bodyParameter] = Stream\create($body);
    }
}
