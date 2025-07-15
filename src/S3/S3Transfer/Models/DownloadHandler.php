<?php

namespace Aws\S3\S3Transfer\Models;

use Aws\S3\S3Transfer\Progress\TransferListener;

abstract class DownloadHandler extends TransferListener
{
    /**
     * Returns the handler result.
     * - For FileDownloadHandler it may return the file destination.
     * - For StreamDownloadHandler it may return an instance of StreamInterface
     *   containing the content of the object.
     *
     * @return mixed
     */
    public abstract function getHandlerResult(): mixed;
}