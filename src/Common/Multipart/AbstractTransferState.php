<?php
namespace Aws\Common\Multipart;

/**
 * State of a multipart upload
 */
abstract class AbstractTransferState implements \Countable, \IteratorAggregate, \Serializable
{
    /**
     * @var AbstractUploadId Object holding params used to identity the upload part
     */
    protected $uploadId;

    /**
     * @var array Array of parts where the part number is the index
     */
    protected $parts = [];

    /**
     * @var bool Whether or not the transfer was aborted
     */
    protected $aborted = false;

    /**
     * Construct a new transfer state object
     *
     * @param AbstractUploadId $uploadId Upload identifier object
     */
    public function __construct(AbstractUploadId $uploadId)
    {
        $this->uploadId = $uploadId;
    }

    /**
     * {@inheritdoc}
     */
    public function getUploadId()
    {
        return $this->uploadId;
    }

    /**
     * Get a data value from the transfer state's uploadId
     *
     * @param string $key Key to retrieve (e.g. Bucket, Key, UploadId, etc)
     *
     * @return string|null
     */
    public function getFromId($key)
    {
        $params = $this->uploadId->toParams();

        return isset($params[$key]) ? $params[$key] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getPart($partNumber)
    {
        return isset($this->parts[$partNumber]) ? $this->parts[$partNumber] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function addPart(AbstractUploadPart $part)
    {
        $this->parts[$part->getPartNumber()] = $part;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasPart($partNumber)
    {
        return isset($this->parts[$partNumber]);
    }

    /**
     * {@inheritdoc}
     */
    public function getPartNumbers()
    {
        return array_keys($this->parts);
    }

    /**
     * {@inheritdoc}
     */
    public function setAborted($aborted)
    {
        $this->aborted = (bool) $aborted;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isAborted()
    {
        return $this->aborted;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->parts);
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->parts);
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize(get_object_vars($this));
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);
        foreach (get_object_vars($this) as $property => $oldValue) {
            if (array_key_exists($property, $data)) {
                $this->{$property} = $data[$property];
            } else {
                throw new \RuntimeException("The {$property} property could be restored during unserialization.");
            }
        }
    }
}
