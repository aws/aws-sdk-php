<?php
namespace Aws;

use Aws\Common\Api\Service;
use GuzzleHttp\Command\Command;

/**
 * Default command implementation.
 */
class AwsCommand extends Command implements AwsCommandInterface
{
    /** @var Service */
    private $api;

    /**
     * @param string           $name    Name of the command
     * @param Service          $api     Service description
     * @param array            $args    Arguments of the command
     * @param array            $options Array of options:
     *                                  - emitter: Emitter to use
     *                                  - future: True or false.
     */
    public function __construct(
        $name,
        Service $api,
        array $args = [],
        array $options = []
    ) {
        $this->api = $api;
        parent::__construct($name, $args, $options);
    }

    public function getOperation()
    {
        return $this->api->getOperation($this->getName());
    }

    public function getApi()
    {
        return $this->api;
    }
}
