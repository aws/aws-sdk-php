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

use Aws\Common\Exception\InvalidArgumentException;

/**
 * Sets lifecycle configuration for your bucket. It lifecycle configuration exists, it replaces it.
 *
 * @link http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTBucketPUTlifecycle.html
 */
class PutBucketLifecycle extends AbstractRequiresKey
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        // If rules were added individually, then build up the LifecycleConfiguration
        if (!$this['body'] && $this['rules']) {
            $rules = $this['rules'];
            $xml = '<LifecycleConfiguration>';
            foreach ($rules as $rule) {
                $xml .= "<Rule><Prefix>{$rule['Prefix']}</Prefix><Status>{$rule['Status']}</Status>"
                    . "<Expiration><Days>{$rule['ExpirationDays']}</Days></Expiration>";
                if (!empty($rule['ID'])) {
                    $xml .= "<ID>{$rule['ID']}</ID>";
                }
                $xml .= '</Rule>';
            }
            $this['body'] = $xml . '</LifecycleConfiguration>';
        }

        parent::build();
    }

    /**
     * Add a lifecycle rule to the LifecycleConfiguration
     *
     * @param string $prefix         Prefix identifying one or more objects to which the rule applies.
     * @param bool|string $status    If Enabled, the rule is currently being applied. If Disabled, the rule is not
     *                               currently being applied.
     * @param string $expirationDays Indicates the lifetime, in days, of the objects that are subject to the rule. The
     *                               value must be a non-zero positive integer.
     * @param string $id             Unique identifier for the rule. The value cannot be longer than 255 characters.
     *
     * @return self
     * @throws InvalidArgumentException if the status is invalid
     */
    public function addRule($prefix, $status, $expirationDays, $id = null)
    {
        if (is_bool($status)) {
            $status = $status ? 'Enabled' : 'Disabled';
        } elseif ($status != 'Enabled' && $status != 'Disabled') {
            throw new InvalidArgumentException('Status must be one of Enabled or Disabled');
        }

        $rules = $this['rules'] ?: array();
        $rules[] = array(
            'Prefix'         => $prefix,
            'Status'         => $status,
            'ExpirationDays' => $expirationDays,
            'ID'             => $id
        );

        return $this->set('rules', $rules);
    }
}
