<?php

namespace Aws;

use Aws\Api\Model;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Event\EmitterInterface;

class AwsCommand extends Command implements AwsCommandInterface
{
    private $api;

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
