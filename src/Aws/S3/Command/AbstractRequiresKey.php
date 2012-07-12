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

namespace Aws\S3\Command;

/**
 * Abstract class that requires a bucket and object key
 */
abstract class AbstractRequiresKey extends DefaultCommand
{
    /**
     * Get the bucket of the request
     *
     * @return string
     */
    public function getBucket()
    {
        return $this['bucket'];
    }

    /**
     * Set the bucket of the request
     *
     * @param string $bucket Bucket name
     *
     * @return self
     */
    public function setBucket($bucket)
    {
        return $this->set('bucket', $bucket);
    }

    /**
     * Get the object key of the request
     *
     * @return string
     */
    public function getKey()
    {
        return $this['key'];
    }

    /**
     * Set the object key of the request
     *
     * @param string $key Object key
     *
     * @return self
     */
    public function setKey($key)
    {
        return $this->set('key', $key);
    }
}
