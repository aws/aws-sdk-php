<?php
namespace Aws\Common\Multipart;

/**
 * An object that encapsulates the data identifying an upload
 */
abstract class AbstractUploadId
{
    /**
     * @var array Expected values (with defaults)
     */
    protected static $expectedValues = [];

    /**
     * @var array Params representing the identifying information
     */
    protected $data = [];

    /**
     * {@inheritdoc}
     */
    public static function fromParams($data)
    {
        /** @var AbstractUploadId $uploadId */
        $uploadId = new static();
        $uploadId->loadData($data);

        return $uploadId;
    }

    /**
     * {@inheritdoc}
     */
    public function toParams()
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize($this->data);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $this->loadData(unserialize($serialized));
    }

    /**
     * Loads an array of data into the UploadId by extracting only the needed keys
     *
     * @param array $data Data to load
     *
     * @throws \InvalidArgumentException if a required key is missing
     */
    protected function loadData($data)
    {
        $data = array_replace(static::$expectedValues, array_intersect_key($data, static::$expectedValues));
        foreach ($data as $key => $value) {
            if (isset($data[$key])) {
                $this->data[$key] = $data[$key];
            } else {
                throw new \InvalidArgumentException("A required key [$key] was missing from the UploadId.");
            }
        }
    }
}
