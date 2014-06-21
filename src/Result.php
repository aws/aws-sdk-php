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
}
