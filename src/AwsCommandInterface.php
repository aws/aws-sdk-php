<?php

namespace Aws;

use GuzzleHttp\Command\CommandInterface;

/**
 * Represents an AWS command.
 */
interface AwsCommandInterface extends CommandInterface
{
    /**
     * @return \Aws\Api\Model
     */
    public function getApi();
}
