<?php
namespace Aws\S3\Multipart;

use Aws\Common\Multipart\AbstractUploadId;

/**
 * An object that encapsulates the identification for a Glacier upload part
 * @codeCoverageIgnore
 */
class UploadId extends AbstractUploadId
{
    protected static $expectedValues = array(
        'Bucket'   => false,
        'Key'      => false,
        'UploadId' => false
    );
}
