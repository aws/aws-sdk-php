<?php
namespace Aws\Glacier\Multipart;

use Aws\Common\Multipart\AbstractUploadId;

/**
 * An object that encapsulates the identification for a Glacier upload part
 * @codeCoverageIgnore
 */
class UploadId extends AbstractUploadId
{
    /**
     * {@inheritdoc}
     */
    protected static $expectedValues = array(
        'accountId' => '-',
        'uploadId'  => false,
        'vaultName' => false
    );
}
