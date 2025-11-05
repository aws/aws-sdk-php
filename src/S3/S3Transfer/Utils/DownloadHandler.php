<?php

namespace Aws\S3\S3Transfer\Utils;

use Aws\S3\S3Transfer\Progress\TransferListener;

abstract class DownloadHandler extends TransferListener
{
    protected const READ_BUFFER_SIZE = 8192;
    protected const RANGE_TO_REGEX = "/(\d+)\//";

    /**
     * Returns the handler result.
     * - For FileDownloadHandler it may return the file destination.
     * - For StreamDownloadHandler it may return an instance of StreamInterface
     *   containing the content of the object.
     *
     * @return mixed
     */
    public abstract function getHandlerResult(): mixed;

    /**
     * To control whether the download handler supports
     * concurrency.
     *
     * @return bool
     */
    public abstract function isConcurrencySupported(): bool;

    /**
     * @param string $range
     *
     * @return int
     */
    protected static function getRangeTo(string $range): int
    {
        preg_match(self::RANGE_TO_REGEX, $range, $match);
        if (empty($match)) {
            return 0;
        }

        return $match[1];
    }
}
