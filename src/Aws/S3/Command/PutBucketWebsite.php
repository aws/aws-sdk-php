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
 * This implementation of the PUT operation uses the website subresource to set the website configuration.
 *
 * @link http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTwebsite.html
 */
class PutBucketWebsite extends AbstractRequiresKey
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        // The WebsiteConfiguration value can be set explicitly or built using
        // the IndexDocumentSuffix and ErrorDocumentKey
        if (!$this['body'] && ($this['IndexDocumentSuffix'] || $this['ErrorDocumentKey'])) {
            $xml = '<WebsiteConfiguration xmlns="http://s3.amazonaws.com/doc/2006-03-01/">'
                . "<IndexDocument><Suffix>{$this['IndexDocumentSuffix']}</Suffix></IndexDocument>";

            if ($this['ErrorDocumentKey']) {
                $xml .= "<ErrorDocument><Key>{$this['ErrorDocumentKey']}</Key></ErrorDocument>";
            }
            $this['body'] = $xml . '</WebsiteConfiguration>';
        }

        parent::build();
    }
}
