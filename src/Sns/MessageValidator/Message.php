<?php
namespace Aws\Sns\MessageValidator;

use GuzzleHttp\Collection;

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

    /**
     * @var Collection The message data
     */
    private $data;

    /**
     * Creates a Message object from an array of raw message data
     *
     * @param array $data The message data
     *
     * @return Message
     * @throws \InvalidArgumentException If a valid type is not provided or there are other required keys missing
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

        $data = Collection::fromConfig($data, [], $requiredKeys);

        return new self($data);
    }

    /**
     * Creates a message object from the raw POST data
     *
     * @return Message
     * @throws \UnexpectedValueException If the POST data is absent, or not a valid JSON document
     */
    public static function fromRawPostData()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!is_array($data)) {
            throw new \UnexpectedValueException('POST data absent, or not a '
                . 'valid JSON document', json_last_error());
        }

        return self::fromArray($data);
    }

    /**
     * @param Collection $data A Collection of message data with all required keys
     */
    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    /**
     * Get the entire message data as a Collection
     *
     * @return Collection
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
        return $this->data->get($key);
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

        $data = $this->data->toArray();
        ksort($data);

        foreach ($data as $key => $value) {
            if (in_array($key, self::$signableKeys)) {
                $stringToSign .= "{$key}\n{$value}\n";
            }
        }

        return $stringToSign;
    }
}
