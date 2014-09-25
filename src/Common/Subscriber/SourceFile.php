<?php
namespace Aws\Common\Subscriber;

use GuzzleHttp\Command\Event\InitEvent;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Stream;
use GuzzleHttp\Stream\LazyOpenStream;

/**
 * Looks for instances of a "Filename" parameter and turns it into a Body param
 * that is only opened when the first byte is attempted to be read.
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
        return ['init' => ['onInit']];
    }

    public function onInit(InitEvent $event)
    {
        /** @var $c \Aws\AwsCommandInterface $command */
        $c = $event->getCommand();
        $source = $c[$this->sourceParameter];

        if ($source === null ||
            !$c->getOperation()->getInput()->hasMember($this->bodyParameter)
        ) {
            return;
        }

        $c[$this->bodyParameter] = new LazyOpenStream($source, 'r');
        unset($c[$this->sourceParameter]);
    }
}
