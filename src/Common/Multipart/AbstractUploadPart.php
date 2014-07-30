<?php
namespace Aws\Common\Multipart;

/**
 * An object that encapsulates the data for an upload part
 */
abstract class AbstractUploadPart
{
    /**
     * @var array A map of external array keys to internal property names
     */
    protected static $keyMap = [];

    /**
     * @var int The number of the upload part representing its order in the overall upload
     */
    protected $partNumber;

    /**
     * {@inheritdoc}
     */
    public static function fromArray($data)
    {
        /** @var AbstractUploadPart $part */
        $part = new static();
        $part->loadData($data);

        return $part;
    }

    /**
     * {@inheritdoc}
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $array = [];
        foreach (static::$keyMap as $key => $property) {
            $array[$key] = $this->{$property};
        }

        return $array;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize($this->toArray());
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $this->loadData(unserialize($serialized));
    }

    /**
     * Loads an array of data into the upload part by extracting only the needed keys
     *
     * @param array|\Traversable $data Data to load into the upload part value object
     *
     * @throws \InvalidArgumentException if a required key is missing
     */
    protected function loadData($data)
    {
        foreach (static::$keyMap as $key => $property) {
            if (isset($data[$key])) {
                $this->{$property} = $data[$key];
            } else {
                throw new \InvalidArgumentException("A required key [$key] was missing from the upload part.");
            }
        }
    }
}
