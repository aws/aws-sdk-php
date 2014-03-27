<?php

namespace Aws;

use Aws\Api\Model;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Event\EmitterInterface;

/**
 * Default command implementation.
 */
class AwsCommand extends Command implements AwsCommandInterface
{
    /** @var Model */
    private $api;

    /**
     * @param string           $name    Name of the command
     * @param array            $args    Arguments of the command
     * @param Model            $api     Service description
     * @param EmitterInterface $emitter Optional event emitter to use
     */
    public function __construct(
        $name,
        array $args = [],
        Model $api,
        EmitterInterface $emitter = null
    ) {
        $this->api = $api;
        parent::__construct($name, $args, $emitter);
    }

    public function getApi()
    {
        return $this->api;
    }
}
