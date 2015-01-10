<?php
namespace Aws;

use GuzzleHttp\ToArrayInterface;

/**
 * Represents an AWS result object that is returned from executing an operation.
 */
interface ResultInterface extends
    \ArrayAccess,
    \IteratorAggregate,
    \Countable,
    ToArrayInterface
{
    /**
     * Get an element from the model using path notation.
     *
     * @param string $path Path to the data to retrieve
     *
     * @return mixed|null Returns the result or null if the path is not found
     */
    public function getPath($path);

    /**
     * Check if the model contains a key by name
     *
     * @param string $name Name of the key to retrieve
     *
     * @return bool
     */
    public function hasKey($name);

    /**
     * Get a specific key value from the result model.
     *
     * @param string $key Key to retrieve.
     *
     * @return mixed|null Value of the key or NULL if not found.
     */
    public function get($key);

    /**
     * Returns the result of executing a JMESPath expression on the contents
     * of the Result model.
     *
     *     $result = $client->execute($command);
     *     $jpResult = $result->search('foo.*.bar[?baz > `10`]');
     *
     * @param string $expression JMESPath expression to execute
     *
     * @return mixed Returns the result of the JMESPath expression.
     * @link http://jmespath.readthedocs.org/en/latest/ JMESPath documentation
     */
    public function search($expression);

    /**
     * Provides debug information about the result object
     *
     * @return string
     */
    public function __toString();
};
