<?php

namespace Aws\S3\S3Transfer;

/**
 * A factory for multipart download listeners creation.
 */
interface MultipartDownloadListenerFactory
{
    public function __invoke(): MultipartDownloadListener;
}