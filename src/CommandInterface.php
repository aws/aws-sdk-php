<?php
namespace Aws;

/**
 * A command object encapsulates the input parameters used to control the
 * creation of a HTTP request and processing of a HTTP response.
 *
 * Using the toArray() method will return the input parameters of the command
 * as an associative array.
 */
interface CommandInterface extends \ArrayAccess
{
    /**
     * Converts the command parameters to an array
     *
     * @return array
     */
    public function toArray();

    /**
     * Get the name of the command
     *
     * @return string
     */
    public function getName();

    /**
     * Check if the command has a parameter by name.
     *
     * @param string $name Name of the parameter to check
     *
     * @return bool
     */
    public function hasParam($name);

    /**
     * Get the handler list used to transfer the command.
     *
     * @return HandlerList
     */
    public function getHandlerList();

    /**
     * Set a request option for the command when it transfers.
     *
     * This method uses path notation for nested keys (e.g., foo/bar). You
     * can push onto an existing value using "foo/bar[]" (where "bar" is an
     * array under the "foo" key).
     *
     * @param string $path  Path to the option name to set.
     * @param mixed  $value Value to set.
     */
    public function setRequestOption($path, $value);

    /**
     * Get an associative array of custom command request options.
     *
     * @return array
     */
    public function getRequestOptions();
}
