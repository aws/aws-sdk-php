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
     * @throws \InvalidArgumentException if the JSON is invalid.
     */
    public function marshalJson($json)
    {
        $data = json_decode($json);
        if (!($data instanceof \stdClass)) {
            throw new \InvalidArgumentException(
                'The JSON document must be valid and be an object at its root.'
            );
        }

        return current($this->marshalValue($data));
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
     * @return array Formatted like `array(TYPE => VALUE)`.
     * @throws \UnexpectedValueException if the value cannot be marshaled.
     */
    private function marshalValue($value)
    {
        $type = gettype($value);
        if ($type === 'string' && $value !== '') {
            $type = 'S';
        } elseif ($type === 'integer' || $type === 'double') {
            $type = 'N';
            $value = (string) $value;
        } elseif ($type === 'boolean') {
            $type = 'BOOL';
        } elseif ($type === 'NULL') {
            $type = 'NULL';
            $value = true;
        } elseif ($type === 'array'
            || $value instanceof \Traversable
            || $value instanceof \stdClass
        ) {
            $type = $value instanceof \stdClass ? 'M' : 'L';
            $data = array();
            $expectedIndex = -1;
            foreach ($value as $k => $v) {
                $data[$k] = $this->marshalValue($v);
                if ($type === 'L' && (!is_int($k) || $k != ++$expectedIndex)) {
                    $type = 'M';
                }
            }
            $value = $data;
        } else {
            $type = $type === 'object' ? get_class($value) : $type;
            throw new \UnexpectedValueException('Marshaling error: ' . ($value
                ? "encountered unexpected type \"{$type}\"."
                : 'encountered empty value.'
            ));
        }

        return array($type => $value);
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
    public function unmarshalJson(array $data, $jsonEncodeFlags = 0)
    {
        return json_encode(
            $this->unmarshalValue(array('M' => $data), true),
            $jsonEncodeFlags
        );
    }

    /**
     * Unmarshal an item from a DynamoDB operation result into a native PHP
     * array. If you set $mapAsObject to true, then a stdClass value will be
     * returned instead.
     *
     * @param array $data Item from a DynamoDB result.
     *
     * @return array|\stdClass
     */
    public function unmarshalItem(array $data)
    {
        return $this->unmarshalValue(array('M' => $data));
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
    private function unmarshalValue(array $value, $mapAsObject = false)
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
}
