<?php
namespace Aws\Service\DynamoDb;

use Aws\AwsClient;

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
        } elseif ($value instanceof Binary) {
            $value = $value->getValue();
            $type = 'B';
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
    public function formatData(array $data, $format = 'put')
    {
        foreach ($data as &$value) {
            $value = $this->formatValue($value, $format);
        }

        return $data;
    }

    /**
     * Alias of DynamoDbClient::formatData()
     *
     * @deprecated Use DynamoDbClient::formatData() instead
     */
    public function formatAttributes(array $data, $format = 'put')
    {
        return $this->formatData($data, $format);
    }

    /**
     * Mark a value binary (B) value so it can be formatted/serialized correctly.
     *
     * @param string $value Value to be marked as binary (B) value.
     *
     * @return Binary
     */
    public function binary($value)
    {
        return new Binary($value);
    }

    /**
     * Convenience method for instantiating a WriteRequestBatch object
     *
     * @param array $config Batch configuration options.
     *
     * @return WriteRequestBatch
     */
    public function createWriteRequestBatch(array $config = [])
    {
        return new WriteRequestBatch($this, $config);
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

/**
 * This class acts as a wrapper binary value (B) so that it can be formatted or
 * serialized correctly by the DynamoDB client. Users should create binary
 * values by using the DynamoDbClient::binary() method.
 *
 * @internal
 */
class Binary
{
    private $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = (string) $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}