<?php
namespace Aws\Common;

use Aws\Sdk;

/**
 * The Aws class is here for backwards compatibility with Version 2.x of the
 * AWS SDK for PHP. You should update you code to use the `Aws\Sdk` class.
 *
 * @deprecated Use the `Aws\Sdk` class.
 */
class Aws extends Sdk
{
    /** @var AwsClientInterface[] */
    private $clients = [];

    /**
     * @param array $config Configuration options for the SDK
     *
     * @return Aws
     * @throws \InvalidArgumentException if you try to use a config file
     */
    public static function factory($config = [])
    {
        if ($config && !is_array($config)) {
            throw new \InvalidArgumentException('Version 3 of the AWS SDK for '
                . 'PHP does not support a config file. Please pass all config '
                . 'options as an array.');
        }

        // Convert params to V3 format
        (new Compat)->convertConfig($config);

        return new self($config);
    }

    /**
     * @param string     $name
     * @param bool|array $throwAway
     *
     * @return AwsClientInterface
     */
    public function get($name, $throwAway = false)
    {
        if (!isset($this->clients[$name]) || $throwAway) {
            $args = is_array($throwAway) ? $throwAway : [];
            $this->clients[$name] = $this->getClient($name, $args);
        }

        return $this->clients[$name];
    }
}
