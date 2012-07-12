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
 * Default class used to transfer entity bodies to Amazon S3
 *
 * This class is extended by PutItem and UploadPart
 */
class DefaultTransferObject extends DefaultUploadObject
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        parent::build();

        // Modify the Expect header based on the 'use_expect' setting
        $expect = $this['use_expect'];
        if ($expect === true) {
            $this->request->setHeader('Expect', '100-Continue');
        } elseif ($expect === false) {
            $this->request->removeHeader('Expect');
        }
    }

    /**
     * Helper method used to transfer the contents of a file for the upload.
     *
     * @param string $filename File name to upload
     *
     * @return self
     */
    public function useFileContents($filename)
    {
        return $this->set('body', fopen($filename, 'r'));
    }
}
