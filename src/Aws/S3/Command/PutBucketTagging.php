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
 * Apply a set of tags to a bucket
 *
 * @link http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTtagging.html
 */
class PutBucketTagging extends AbstractRequiresKey
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        if (!$this['body'] && $this['TagSet']) {
            $tags = $this['TagSet'];
            $xml = '<Tagging><TagSet>';
            foreach ((array) $tags as $key => $value) {
                $xml .= "<Tag><Key>{$key}</Key><Value>{$value}</Value></Tag>";
            }
            $this['body'] = $xml . '</TagSet></Tagging>';
        }

        parent::build();

        // Add the required Content-MD5 header
        $this->request->setHeader('Content-MD5', $this->request->getBody()->getContentMd5(true, true));
    }

    /**
     * Add a tag to the bucket
     *
     * @param string $key   Tag key
     * @param string $value Tag value
     *
     * @return self
     */
    public function addTag($key, $value)
    {
        $tags = $this['TagSet'] ?: array();
        $tags[(string) $key] = (string) $value;

        return $this->set('TagSet', $tags);
    }
}
