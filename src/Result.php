<?php
namespace Aws;

use GuzzleHttp\Command\Model;
use JmesPath;

/**
 * Aws-specific model class representing the result of an API operation
 */
class Result extends Model
{
    public function search($expression)
    {
        return JmesPath\search($expression, $this->toArray());
    }

    /**
     * Get a specific key value.
     *
     * @param string $key Key to retrieve.
     *
     * @return mixed|null Value of the key or NULL
     */
    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
}
