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
 * Complete Multipart Upload
 */
class CompleteMultipartUpload extends AbstractRequiresKey
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        if (!$this['body']) {
            $xml = '<CompleteMultipartUpload>';
            foreach ((array) $this['parts'] as $part) {
                $xml .= "<Part><PartNumber>{$part['PartNumber']}</PartNumber><ETag>{$part['ETag']}</ETag></Part>";
            }
            $this['body'] = $xml . '</CompleteMultipartUpload>';
        }

        parent::build();
    }

    /**
     * Add a multipart upload
     *
     * @param string $partNumber Part number to add
     * @param string $etag       ETag of the part number. This value will be wrapped in quotes if needed.
     *
     * @return CompleteMultipartUpload
     */
    public function addPart($partNumber, $etag)
    {
        $parts = $this['parts'] ?: array();
        $etag = (string) $etag;

        // Wrap quotes around the ETag if needed
        if ($etag[0] != '"') {
            $etag = '"' . $etag . '"';
        }

        $parts[] = array(
            'PartNumber' => $partNumber,
            'ETag'       => $etag
        );

        return $this->set('parts', $parts);
    }
}
