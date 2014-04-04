<?php
namespace Aws\Route53;

// @todo: Move function
class Route53Factory
{
    /**
     * Filter function used to remove ID prefixes. This is used automatically
     * by the client so that Hosted Zone and Change Record IDs can be specified
     * with or without the prefix.
     *
     * @param string $id The ID value to clean
     *
     * @return string
     */
    public static function cleanId($id)
    {
        return str_replace(array('/hostedzone/', '/change/'), '', $id);
    }
}
