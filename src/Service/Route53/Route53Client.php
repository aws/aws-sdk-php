<?php
namespace Aws\Service\Route53;

use Aws\AwsClient;

/**
 * Client used to interact with the Amazon Route 53 service.
 */
class Route53Client extends AwsClient
{
    /**
     * Filter function used to remove ID prefixes. This is used automatically
     * by the client so that Hosted Zone and Change Record IDs can be specified
     * with or without the prefix.
     *
     * @param string $id The ID value to clean
     *
     * @return string
     * @todo Apply this filter function somehow
     */
    public static function cleanId($id)
    {
        return str_replace(['/hostedzone/', '/change/'], '', $id);
    }
}
