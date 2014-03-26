<?php

namespace Aws;

use GuzzleHttp\Command\CommandInterface;

interface AwsCommandInterface extends CommandInterface
{
    /**
     * @return \Aws\Api\Model
     */
    public function getApi();
}
