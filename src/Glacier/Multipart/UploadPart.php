<?php
namespace Aws\Glacier\Multipart;

use Aws\Common\Multipart\AbstractUploadPart;

/**
 * An object that encapsulates the data for a Glacier upload operation
 */
class UploadPart extends AbstractUploadPart
{
    /**
     * {@inheritdoc}
     */
    protected static $keyMap = array(
        'partNumber'  => 'partNumber',
        'checksum'    => 'checksum',
        'contentHash' => 'contentHash',
        'size'        => 'size',
        'offset'      => 'offset'
    );

    /**
     * @var string The sha256 tree hash of the upload body
     */
    protected $checksum;

    /**
     * @var string The sha256 linear hash of the upload body
     */
    protected $contentHash;

    /**
     * @var int The size (or content-length) in bytes of the upload body
     */
    protected $size;

    /**
     * @var int The starting offset byte of the upload body
     */
    protected $offset;

    /**
     * @return string
     */
    public function getChecksum()
    {
        return $this->checksum;
    }

    /**
     * @return string
     */
    public function getContentHash()
    {
        return $this->contentHash;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Returns the byte range of the part as an array
     *
     * @return array
     */
    public function getRange()
    {
        return array($this->offset, $this->offset + $this->size - 1);
    }

    /**
     * Returns the byte range ot the part formatted for the Content-Range header
     *
     * @return string
     */
    public function getFormattedRange()
    {
        list($firstByte, $lastByte) = $this->getRange();

        return "bytes {$firstByte}-{$lastByte}/*";
    }
}
