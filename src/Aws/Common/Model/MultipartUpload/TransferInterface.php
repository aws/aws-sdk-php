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

namespace Aws\Common\Model\MultipartUpload;

use Guzzle\Common\HasDispatcherInterface;

/**
 * Interface for transferring the contents of a data source to an AWS service via a multipart upload interface
 */
interface TransferInterface extends HasDispatcherInterface
{
    const BEFORE_UPLOAD      = 'multipart_upload.before_upload';
    const AFTER_UPLOAD       = 'multipart_upload.after_upload';
    const AFTER_COMPLETE     = 'multipart_upload.after_complete';
    const BEFORE_PART_UPLOAD = 'multipart_upload.before_part_upload';
    const AFTER_PART_UPLOAD  = 'multipart_upload.after_part_upload';

    /**
     * Upload the source to using a multipart upload
     *
     * @return array Returns the result of a the complete multipart upload command
     */
    public function upload();

    /**
     * Abort the upload
     *
     * @return array Returns the result of the abort multipart upload command
     */
    public function abort();

    /**
     * Get the current state of the upload
     *
     * @return TransferStateInterface
     */
    public function getState();

    /**
     * Stop the transfer and retrieve the current state.
     *
     * This allows you to stop and later resume a long running transfer if needed.
     *
     * @return TransferStateInterface
     */
    public function stop();
}
