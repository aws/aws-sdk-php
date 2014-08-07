<?php
namespace Aws\S3\Exception;

/**
 * Exception thrown when errors occur while using the ClearBucket class
 */
class ClearBucketException extends \Exception
{
    private $iterator;
    private $errors;

    /**
     * @param array      $errors   The errored keys
     * @param \Iterator  $iterator Iterator that was used
     * @param \Exception $previous Previous exception (if any)
     */
    public function __construct(
        array $errors,
        \Iterator $iterator,
        \Exception $previous = null
    ) {
        $this->iterator = $iterator;
        $this->errors = $errors;
        $msgs = DeleteMultipleObjectsException::createMessageFromErrors($errors);
        parent::__construct(
            'One or more errors occurred while clearing the bucket: ' . $msgs,
            0,
            $previous
        );
    }

    /**
     * Get the errored objects
     *
     * @return array Returns an array of associative arrays, each containing
     *               a 'Code', 'Message', and 'Key' key.
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Get iterator being used to clear the bucket.
     *
     * You can use this iterator to possible resume the deletion.
     *
     * @return \Iterator
     */
    public function getIterator()
    {
        return $this->iterator;
    }
}
