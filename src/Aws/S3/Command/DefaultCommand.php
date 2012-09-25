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
use Aws\S3\S3Client;
use Guzzle\Http\Url;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Description\Operation;

/**
 * Adds Amazon S3 specific functionality to dynamic commands
 */
class DefaultCommand extends OperationCommand
{
    /**
     * Inject a bucket into the client's base URL
     *
     * @return Url
     */
    protected function getBucketUrl()
    {
        $url = Url::factory($this->client->getBaseUrl());
        $bucket = $this['bucket'];

        // Use a path style if forced or if the bucket is not DNS compatible
        if ($this['bucket.path_style']
            || $this->client->getConfig('bucket.path_style')
            || !S3Client::isValidBucketName($bucket))
        {
            // Path style bucket needs the bucket to be the first path segment
            $currentPath = $url->getPath();
            $url->setPath("/{$bucket}" . ($currentPath != '/' ? $currentPath : ''));
        } else {
            // Virtual buckets need a subdomain before the region_endpoint
            $url->setHost($bucket . '.' . $url->getHost());
        }

        return $url;
    }

    /**
     * URL encode an object key
     *
     * @param string $key Key to encode
     *
     * @return string
     */
    protected function encodeKey($key)
    {
        return str_replace('%2F', '/', rawurlencode($key));
    }

    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        // Determine the URL based on the bucket
        if ($bucket = $this->get('bucket')) {
            $this->operation = clone $this->operation;
            if ($key = $this->get('key')) {
                $this->operation->setUri((string) $this->getBucketUrl()->addPath($this->encodeKey($key)));
            } else {
                $this->operation->setUri((string) $this->getBucketUrl());
            }
        }

        parent::build();

        // if this command requires a Content-MD5 header, then add it
        if ($this['use_md5'] && !$this['Content-MD5']) {
            if (!$this->request->getBody()) {
                throw new RuntimeException('Cannot add Content-MD5 to the request because no body was set');
            }
            // If the body is not seekable, then it will not return an MD5
            if ($md5 = $this->request->getBody()->getContentMd5(true, true)) {
                $this->request->setHeader('Content-MD5', $md5);
            }
        }
    }

    /**
     * Account for XML and JSON responses from Amazon S3 that do not include a
     * Content-Type header
     * {@inheritdoc}
     */
    protected function process()
    {
        if ($contentType = $this['command.content_type']) {
            $this->getResponse()->setHeader('Content-Type', $contentType);
        }

        parent::process();
    }
}
