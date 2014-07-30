<?php
namespace Aws\S3\Multipart;

use Aws\Common\Multipart\AbstractUploadPart;

/**
 * An object that encapsulates the data for a Glacier upload operation
 */
class UploadPart extends AbstractUploadPart
{
    protected static $keyMap = [
        'PartNumber'   => 'partNumber',
        'ETag'         => 'eTag',
        'LastModified' => 'lastModified',
        'Size'         => 'size'
    ];

    /**
     * @var string The ETag for this part
     */
    protected $eTag;

    /**
     * @var string The last modified date
     */
    protected $lastModified;

    /**
     * @var int The size (or content-length) in bytes of the upload body
     */
    protected $size;

    /**
     * @return string
     */
    public function getETag()
    {
        return $this->eTag;
    }

    /**
     * @return string
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }
}
