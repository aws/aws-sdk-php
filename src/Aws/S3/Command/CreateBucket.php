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
 * Create a bucket in Amazon S3
 */
class CreateBucket extends AbstractRequiresKey
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        if (!$this['body'] && $this['LocationConstraint']) {
            $this['body'] =
                '<CreateBucketConfiguration xmlns="http://s3.amazonaws.com/doc/2006-03-01/">'
                . "<LocationConstraint>{$this['LocationConstraint']}</LocationConstraint>"
                . '</CreateBucketConfiguration>';
        }

        parent::build();
    }
}
