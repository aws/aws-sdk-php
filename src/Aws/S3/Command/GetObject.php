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

use Aws\Common\Exception\RuntimeException;
use Guzzle\Http\EntityBody;
use Guzzle\Http\Plugin\Md5ValidatorPlugin;
use Guzzle\Common\Exception\InvalidArgumentException;

/**
 * This implementation of the GET operation retrieves objects from Amazon S3. To
 * use GET, you must have READ access to the object. If you grant READ access to
 * the anonymous user, you can return the object without using an authorization header.
 *
 * @link http://docs.amazonwebservices.com/AmazonS3/latest/API/RESTObjectGET.html
 */
class GetObject extends AbstractRequiresKey
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        parent::build();

        // Add the response body if one is set
        if ($body = $this['response_body']) {
            $this->request->setResponseBody(EntityBody::factory($body));
        }

        // Add the MD5 hash validation plugin if validating the MD5
        if ($this['validate_md5']) {
            $this->request->addSubscriber(new Md5ValidatorPlugin(true));
        }
    }

    /**
     * Helper method to set te destination where the response body will be
     * downloaded to.
     *
     * @param string|resource|EntityBody $destination Destination used to store the response body. Pass a string to
     *                                                specify a local filename to download the data to. Pass a resource
     *                                                returned from fopen to download the data to an open stream.
     *
     * @return self
     * @throws RuntimeException if the file cannot be opened for writing or there is an error setting the response body
     */
    public function setDestination($destination)
    {
        // Strings are treated as filenames
        if (is_string($destination)) {
            $destination = fopen($destination, 'w+');
            // @codeCoverageIgnoreStart
            if (!$destination) {
                throw new RuntimeException("Cannot open {$destination} for writing");
            }
            // @codeCoverageIgnoreEnd
        }

        try {
            return $this->set('response_body', EntityBody::factory($destination));
        } catch (InvalidArgumentException $e) {
            throw new RuntimeException('Error setting download destination: ' . $e->getMessage(), 1, $e);
        }
    }
}
