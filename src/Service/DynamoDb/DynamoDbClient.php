<?php
namespace Aws\Service\DynamoDb;

use Aws\AwsClient;
use GuzzleHttp\Stream\Stream;

/**
 * Client used to interact with the Amazon DynamoDB service.
 */
class DynamoDbClient extends AwsClient
{
    /**
     * Formats a value as a DynamoDB attribute.
     *
     * @param mixed       $value  Value to format for DynamoDB.
     * @param string|null $format Format type (e.g., put, update, expected, null).
     * @param string|null $type   Attribute type; this reference is set by the method.
     *
     * @throws \InvalidArgumentException
     * @return array The formatted value.
     */
    public function formatValue($value, $format = 'put', &$type = null)
    {
        // Determine the type and coerce the value into a valid form for DynamoDB.
        if (is_string($value) && $value !== '') {
            $type = 'S';
        } elseif (is_int($value) || is_float($value)) {
            $value = (string) $value;
            $type = 'N';
        } elseif (is_bool($value)) {
            $value = $value ? '1' : '0';
            $type = 'N';
        } elseif (is_array($value) && $value !== []) {
            $setType = null;
            // Recursively format values in the array, but ensure they are the
            // same type, since DynamoDB sets must be uniform (e.g., NS, SS, BS).
            foreach ($value as &$subValue) {
                if ($setType) {
                    $subValue = $this->formatValue($subValue, null, $subType);
                    if ($subType !== $setType) {
                        throw new \InvalidArgumentException(
                            'The data in a set must be of a uniform type.'
                        );
                    }
                } else {
                    $subValue = $this->formatValue($subValue, null, $setType);
                }
            }
            $type = $setType . 'S';
        } elseif (is_resource($value) || $value instanceof Stream) {
            $stream = ($value instanceof Stream) ? $value : new Stream($value);
            $value = $stream->getContents();
            $type = 'B';
        } else {
            throw new \InvalidArgumentException(
                'The value must be a scalar or array, and cannot be empty.'
            );
        }

        // Format the value as a DynamoDB attribute.
        if ($format === 'put') {
            return [$type => $value];
        } elseif ($format === 'update' || $format === 'expected') {
            return ['Value' => [$type => $value]];
        } else {
            return $value;
        }
    }

    /**
     * Formats an array of values as DynamoDB attributes.
     *
     * @param array       $data   Values to format for DynamoDB.
     * @param string|null $format Format type (e.g., put, update, expected, null).
     *
     * @return array The formatted values.
     */
    public function formatAttributes(array $data, $format = 'put')
    {
        foreach ($data as &$value) {
            $value = $this->formatValue($value, $format);
        }

        return $data;
    }

    /**
     * Convenience method for instantiating and registering the DynamoDB
     * Session handler with this DynamoDB client object.
     *
     * @param array $config Array of options for the session handler factory
     *
     * @return Session\SessionHandler
     * @todo update this after session handler is refactored
     */
    public function registerSessionHandler(array $config = array())
    {
        $config += ['dynamodb_client' => $this];
        $handler = Session\SessionHandler::factory($config);
        $handler->register();

        return $handler;
    }
}
