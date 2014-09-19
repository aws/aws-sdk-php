<?php
namespace Aws;

use GuzzleHttp\Command\FutureModel;

/**
 * AWS-specific model class representing the result of an API operation that
 * is completed asynchronously
 */
class FutureResult extends FutureModel
{
    use ResultTrait;
}
