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
 * The Multi-Object Delete operation enables you to delete multiple objects from
 * a bucket using a single HTTP request.
 *
 * @link http://docs.amazonwebservices.com/AmazonS3/latest/API/multiobjectdeleteapi.html
 */
class DeleteMultipleObjects extends AbstractRequiresKey
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        if (!$this['body']) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . '<Delete>';
            if ($this['Quiet']) {
                $xml .= '<Quiet>true</Quiet>';
            }
            foreach ((array) $this['objects'] as $object) {
                $xml .= "<Object><Key>{$object['Key']}</Key>";
                if (!empty($object['VersionId']) && $object['VersionId'] != 'null') {
                    $xml .= "<VersionId>{$object['VersionId']}</VersionId>";
                }
                $xml .= '</Object>';
            }
            $this['body'] = $xml . '</Delete>';
        }

        parent::build();
    }

    /**
     * Add an object to delete
     *
     * @param string $key       Object key
     * @param string $versionId Version of the object to delete
     *
     * @return self
     */
    public function addObject($key, $versionId = null)
    {
        $objects = $this->get('objects') ?: array();
        $objects[] = array(
            'Key'       => $key,
            'VersionId' => $versionId
        );

        return $this->set('objects', $objects);
    }

    /**
     * Set the MFA header of the request (used for DELETE requests)
     *
     * @param string $deviceSerial Serial number of the device
     * @param string $token        Token displayed on the device
     *
     * @return self
     */
    public function setMfa($deviceSerial, $token)
    {
        return $this->set('x-amz-mfa', "{$deviceSerial} {$token}");
    }
}
