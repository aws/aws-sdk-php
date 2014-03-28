<?php

namespace Aws;

use GuzzleHttp\Command\CommandInterface;

/**
 * Represents an AWS command.
 */
interface AwsCommandInterface extends CommandInterface
{
    /**
     * @return \Aws\Api\Service
     */
    public function getApi();
}
