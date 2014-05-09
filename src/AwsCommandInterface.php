<?php
namespace Aws;

use GuzzleHttp\Command\CommandInterface;

/**
 * Represents an AWS command.
 */
interface AwsCommandInterface extends CommandInterface
{
    /**
     * Gets the API operation definition associated with the command.
     *
     * @return \Aws\Common\Api\Operation
     */
    public function getOperation();

    /**
     * Gets the service API model associated with the command.
     *
     * @return \Aws\Common\Api\Service
     */
    public function getApi();
}
