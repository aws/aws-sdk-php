<?php
namespace Aws\DynamoDb;

/**
 * Marshals JSON documents or array representations of JSON documents into the
 * parameter structure required by DynamoDB. Also allows for unmarshaling. Does
 * not support binary (B) or set (*S) types, since they are not supported
 * explicitly in JSON.
 */
class Marshaler
{
    /**
     * Marshal a JSON document from a string to an array that is formatted in
     * the proper parameter structure required by DynamoDB operations.
     *
     * @param string $json A valid JSON document.
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function marshalDocument($json)
    {
        $document = json_decode($json);
        if (!($document instanceof \stdClass)) {
            throw new \InvalidArgumentException(
                'The JSON document must be valid and be an object at its root.'
            );
        }

        return $this->marshalItem($document);
    }

    /**
     * Marshal a native PHP array of data to a new array that is formatted in
     * the proper parameter structure required by DynamoDB operations.
     *
     * @param array|\stdClass $item An associative array of data.
     *
     * @return array
     */
    public function marshalItem($item)
    {
        return current($this->marshalValue($item));
    }

    /**
     * Marshal a native PHP value into an array that is formatted in the proper
     * parameter structure required by DynamoDB operations.
     *
     * @param mixed $value A scalar, array, or stdClass value.
     *
     * @return array
     * @throws \UnexpectedValueException
     */
    public function marshalValue($value)
    {
        if (is_string($value) && $value !== '') {
            $type = 'S';
        } elseif (is_int($value) || is_float($value)) {
            $type = 'N';
            $value = (string) $value;
        } elseif (is_bool($value)) {
            $type = 'BOOL';
        } elseif ($value === null) {
            $type = 'NULL';
            $value = true;
        } elseif ($this->isTraversable($value)) {
            $type = ($value instanceof \stdClass) ? 'M' : 'L';
            $data = [];
            foreach ($value as $k => $v) {
                $data[$k] = $this->marshalValue($v);
                if (!is_int($k)) {
                    $type = 'M';
                }
            }
            $value = $data;
        } else {
            $type = is_object($value) ? get_class($value) : gettype($value);
            throw new \UnexpectedValueException("Unexpected type: {$type}.");
        }

        return [$type => $value];
    }

    /**
     * Unmarshal a document (item) from a DynamoDB operation result into a JSON
     * document string.
     *
     * @param array $data            Item/document from a DynamoDB result.
     * @param int   $jsonEncodeFlags Flags to use with `json_encode()`.
     *
     * @return string
     */
    public function unmarshalDocument(array $data, $jsonEncodeFlags = 0)
    {
        return json_encode($this->unmarshalItem($data, true), $jsonEncodeFlags);
    }

    /**
     * Unmarshal an item from a DynamoDB operation result into a native PHP
     * array. If you set $mapAsObject to true, then a stdClass value will be
     * returned instead.
     *
     * @param array $data        Item from a DynamoDB result.
     * @param bool  $mapAsObject Whether maps should be represented as stdClass.
     *
     * @return array|\stdClass
     */
    public function unmarshalItem(array $data, $mapAsObject = false)
    {
        return $this->unmarshalValue(['M' => $data], $mapAsObject);
    }

    /**
     * Unmarshal a value from a DynamoDB operation result into a native PHP
     * value. Will return a scalar, array, or (if you set $mapAsObject to true)
     * stdClass value.
     *
     * @param array $value       Value from a DynamoDB result.
     * @param bool  $mapAsObject Whether maps should be represented as stdClass.
     *
     * @return mixed
     * @throws \UnexpectedValueException
     */
    public function unmarshalValue(array $value, $mapAsObject = false)
    {
        list($type, $value) = each($value);
        switch ($type) {
            case 'S':
            case 'SS':
            case 'B':
            case 'BS':
            case 'BOOL':
                return $value;
            case 'NULL':
                return null;
            case 'N':
                // Use type coercion to unmarshal numbers to int/float.
                return $value + 0;
            case 'NS':
                foreach ($value as &$v) {
                    $v += 0;
                }
                return $value;
            case 'M':
                if ($mapAsObject) {
                    $data = new \stdClass;
                    foreach ($value as $k => $v) {
                        $data->$k = $this->unmarshalValue($v, $mapAsObject);
                    }
                    return $data;
                }
            // Else, unmarshal M the same way as L.
            case 'L':
                foreach ($value as &$v) {
                    $v = $this->unmarshalValue($v, $mapAsObject);
                }
                return $value;
        }

        throw new \UnexpectedValueException("Unexpected type: {$type}.");
    }

    /**
     * Determines if a value can be used in a foreach statement.
     *
     * @param mixed $value Value to check
     *
     * @return bool
     */
    private function isTraversable($value)
    {
        return (is_array($value)
            || $value instanceof \stdClass
            || $value instanceof \Traversable
        );
    }
}
