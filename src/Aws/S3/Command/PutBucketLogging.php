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

use Aws\S3\Model\Grant;

/**
 * This implementation of the PUT operation uses the logging subresource to set
 * the logging parameters for a bucket and to specify permissions for who can
 * view and modify the logging parameters. To set the logging status of a
 * bucket, you must be the bucket owner.
 *
 * @link http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTlogging.html
 */
class PutBucketLogging extends AbstractRequiresKey
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        if (!$this['body']) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            if (!$this['TargetGrants'] && !$this['TargetBucket'] && !$this['TargetPrefix']) {
                $xml .= '<BucketLoggingStatus xmlns="http://doc.s3.amazonaws.com/2006-03-01" />';
            } else {
                $xml .= '<BucketLoggingStatus xmlns="http://doc.s3.amazonaws.com/2006-03-01">';
                if ($bucket = $this['TargetBucket']) {
                    $xml .= "<TargetBucket>{$bucket}</TargetBucket>";
                }
                if ($prefix = $this['TargetPrefix']) {
                    $xml .= "<TargetPrefix>{$prefix}</TargetPrefix>";
                }
                if ($grants = $this['TargetGrants']) {
                    $xml .= '<TargetGrants>';
                    foreach ((array) $grants as $grant) {
                        $xml .= (string) $grant;
                    }
                    $xml .= '</TargetGrants>';
                }
                $xml .= '</BucketLoggingStatus>';
            }
            $this['body'] = $xml;
        }

        parent::build();
    }

    /**
     * Add a Grant to the list of TargetGrants
     *
     * @param Grant $grant Grant to add
     *
     * @return self
     */
    public function addGrant(Grant $grant)
    {
        $grants = $this['TargetGrants'] ?: array();
        $grants[] = $grant;

        return $this->set('TargetGrants', $grants);
    }
}
