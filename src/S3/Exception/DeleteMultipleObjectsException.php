<?php
namespace Aws\S3\Exception;

/**
 * Exception thrown when errors occur while deleting objects using a
 * {@see S3\BatchDelete} object.
 */
class DeleteMultipleObjectsException extends \Exception
{
    private $deleted = [];
    private $errors = [];

    /**
     * @param array       $deleted Array of successfully deleted keys
     * @param array       $errors  Array of errors that were encountered
     */
    public function __construct(array $deleted, array $errors)
    {
        $this->deleted = $deleted;
        $this->errors = $errors;
        parent::__construct('Unable to delete certain keys when executing a'
            . ' DeleteMultipleObjects request: '
            . self::createMessageFromErrors($errors));
    }

    /**
     * Create a single error message from multiple errors.
     *
     * @param array $errors Errors encountered
     *
     * @return string
     */
    public static function createMessageFromErrors(array $errors)
    {
        return implode('; ', array_map(function ($key) {
            $value = '<' . (isset($key['Code']) ? $key['Code'] : '') . '> ';
            $value .= isset($key['Message']) ? $key['Message'] : '';
            return trim($value);
        }, $errors));
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
     * Get the successfully deleted objects
     *
     * @return array Returns an array of associative arrays, each containing
     *               a 'Key' and optionally 'DeleteMarker' and
     *              'DeleterMarkerVersionId'
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}
