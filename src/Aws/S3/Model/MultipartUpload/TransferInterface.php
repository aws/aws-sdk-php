<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\S3\Model\MultipartUpload;

use Guzzle\Common\HasDispatcherInterface;

/**
 * Interface for transferring the contents of a data source to Amazon S3 using
 * multipart upload
 */
interface TransferInterface extends HasDispatcherInterface
{
    const BEFORE_UPLOAD = 'multipart_upload.before_upload';
    const AFTER_UPLOAD = 'multipart_upload.after_upload';
    const AFTER_COMPLETE = 'multipart_upload.after_complete';
    const BEFORE_PART_UPLOAD = 'multipart_upload.before_part_upload';
    const AFTER_PART_UPLOAD = 'multipart_upload.after_part_upload';

    const MIN_PART_SIZE = 5242880;
    const MAX_PART_SIZE = 5368709120;
    const MAX_PARTS = 10000;

    /**
     * Upload the source to Amazon S3 using a multipart upload
     *
     * @return \SimpleXMLElement Returns the result of a CompleteMultipartUpload command
     * @link http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadComplete.html
     */
    public function upload();

    /**
     * Abort the upload
     *
     * @link http://docs.amazonwebservices.com/AmazonS3/latest/API/mpUploadAbort.html
     */
    public function abort();

    /**
     * Get the current state of the upload
     *
     * @return TransferState
     */
    public function getState();

    /**
     * Stop the transfer and retrieve the current state.
     *
     * This allows you to stop and later resume a long running transfer if needed.
     *
     * @return TransferState
     */
    public function stop();
}
