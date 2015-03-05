<?php
namespace Aws\Sns\MessageValidator;

class Message
{
    private static $requiredKeys = [
        '__default' => ['Message', 'MessageId', 'Timestamp', 'TopicArn',
            'Type', 'Signature', 'SigningCertURL',],
        'SubscriptionConfirmation' => ['SubscribeURL', 'Token'],
        'UnsubscribeConfirmation' => ['SubscribeURL', 'Token']
    ];

    private static $signableKeys = ['Message', 'MessageId', 'Subject',
        'SubscribeURL', 'Timestamp', 'Token', 'TopicArn', 'Type'];

    /** @var array The message data */
    private $data;

    /**
     * Creates a Message object from an array of raw message data
     *
     * @param array $data The message data
     *
     * @return Message
     * @throws \InvalidArgumentException If a valid type is not provided or
     *     there are other required keys missing
     */
    public static function fromArray(array $data)
    {
        // Make sure the type key is set
        if (!isset($data['Type'])) {
            throw new \InvalidArgumentException('The "Type" key must be '
                . 'provided to instantiate a Message object.');
        }

        // Determine required keys and create a collection from the message data
        $requiredKeys = array_merge(
            self::$requiredKeys['__default'],
            isset(self::$requiredKeys[$data['Type']])
                ? self::$requiredKeys[$data['Type']]
                : []
        );

        foreach ($requiredKeys as $key) {
            if (empty($data[$key])) {
                throw new \InvalidArgumentException($key . ' is required');
            }
        }

        return new self($data);
    }

    /**
     * Creates a message object from the raw POST data
     *
     * @return Message
     * @throws \RuntimeException If the POST data is absent, or not a valid JSON document
     */
    public static function fromRawPostData()
    {
        if (!isset($_SERVER['HTTP_X_AMZ_SNS_MESSAGE_TYPE'])) {
            throw new \RuntimeException('SNS message type header not provided.');
        }

        $data = json_decode(file_get_contents('php://input'), true);

        if (!is_array($data)) {
            throw new \RuntimeException('POST data invalid');
        }

        return self::fromArray($data);
    }

    /**
     * @param array $data Message data with all required keys.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the entire message data as an array.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Gets a single key from the message data
     *
     * @param string $key Key to retrieve
     *
     * @return string
     */
    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    /**
     * Builds a newline delimited string to sign according to the specs
     *
     * @return string
     * @link http://docs.aws.amazon.com/sns/latest/gsg/SendMessageToHttp.verify.signature.html
     */
    public function getStringToSign()
    {
        $stringToSign = '';
        foreach (self::$signableKeys as $key) {
            if ($value = $this->get($key)) {
                $stringToSign .= "{$key}\n{$value}\n";
            }
        }

        return $stringToSign;
    }
}
