<?php
namespace Aws\Service\DynamoDb;

use Aws\AwsClient;

/**
 * Client used to interact with the Amazon DynamoDB service.
 */
class DynamoDbClient extends AwsClient
{
    // @todo account for this somehow?
    // self::COMMAND_PARAMS => array(Cmd::RESPONSE_PROCESSING => Cmd::TYPE_NO_TRANSLATION)

    /**
     * Formats a value as a DynamoDB attribute.
     *
     * @param mixed  $value  The value to format for DynamoDB.
     * @param string $format The type of format (e.g. put, update).
     *
     * @return array The formatted value.
     */
    public function formatValue($value, $format = Attribute::FORMAT_PUT)
    {
        return Attribute::factory($value)->getFormatted($format);
    }

    /**
     * Formats an array of values as DynamoDB attributes.
     *
     * @param array  $values The values to format for DynamoDB.
     * @param string $format The type of format (e.g. put, update).
     *
     * @return array The formatted values.
     */
    public function formatAttributes(array $values, $format = Attribute::FORMAT_PUT)
    {
        $formatted = array();

        foreach ($values as $key => $value) {
            $formatted[$key] = $this->formatValue($value, $format);
        }

        return $formatted;
    }

    /**
     * Convenience method for instantiating and registering the DynamoDB
     * Session handler with this DynamoDB client object.
     *
     * @param array $config Array of options for the session handler factory
     *
     * @return SessionHandler
     */
    public function registerSessionHandler(array $config = array())
    {
        $config = array_replace(array('dynamodb_client' => $this), $config);

        $handler = SessionHandler::factory($config);
        $handler->register();

        return $handler;
    }
}
