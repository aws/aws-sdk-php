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
 * Abstract command class for uploading objects to Amazon S3
 */
class DefaultUploadObject extends AbstractRequiresKey
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        parent::build();

        // Add any metadata that may have been set
        if ($meta = $this['metadata']) {
            $this->request->addHeaders($meta);
        }

        // Apply ACL headers to the request if an ACL parameter is set
        if ($acl = $this['acl']) {
            $this->request->addHeaders($acl->getGrantHeaders());
        }
    }

    /**
     * Set an x-amz-meta-* metadata header on the request. Prefixing keys with
     * x-amz-meta-* is optional. If it is not present, it will be added for you.
     *
     * @param string $key   Key of the x-amz-meta- header
     * @param string $value Value to set
     *
     * @return self
     */
    public function addMetadata($key, $value)
    {
        $metadata = $this->get('metadata') ?: array();
        $metadata[$key] = $value;

        return $this->set('metadata', $metadata);
    }
}
