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
}
