<?php
namespace Aws;

use GuzzleHttp\Command\Model;

/**
 * AWS-specific model class representing the result of an API operation
 */
class Result extends Model
{
    use ResultTrait;
}
