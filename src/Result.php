<?php
namespace Aws;

use GuzzleHttp\Command\Model;
use JmesPath\Env as JmesPath;

/**
 * AWS-specific model class representing the result of an API operation
 */
class Result extends Model
{
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
    public function search($expression)
    {
        return JmesPath::search($expression, $this->toArray());
    }

    /**
     * Get a specific key value from the result model.
     *
     * @param string $key Key to retrieve.
     *
     * @return mixed|null Value of the key or NULL if not found.
     */
    public function get($key)
    {
        return $this[$key];
    }

   /**
    * Provides debug information about the result object
    *
    * @return string
    */
    public function __toString()
    {
        return "Result data\n-----------\n\n"
            . "Data can be retrieved from the result object using the "
            . "get() method of the result (e.g., `\$result->get(\$key)`) or "
            . "accessing the result like an associative array "
            . "(e.g. `\$result['key']`). You can also execute JMESPath "
            . "expressions on the result data using the search() method.\n\n"
            . json_encode($this->toArray(), JSON_PRETTY_PRINT)
            . "\n\n";
    }
}
