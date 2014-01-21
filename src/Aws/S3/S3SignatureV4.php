<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\S3;

use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Signature\SignatureV4;
use Aws\S3\Exception\InvalidArgumentException;
use Guzzle\Http\EntityBody;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Message\EntityEnclosingRequestInterface;

/**
 * Amazon S3 signature version 4
 */
class S3SignatureV4 extends SignatureV4 implements S3SignatureInterface
{
    public function signRequest(RequestInterface $request, CredentialsInterface $credentials)
    {
        if ($request instanceof EntityEnclosingRequestInterface && $request->getBody()) {
            $request->setHeader('X-Amz-Content-Sha256', EntityBody::getHash($request->getBody(), 'sha256'));
        } else {
            $request->setHeader('X-Amz-Content-Sha256', hash('sha256', ''));
        }

        parent::signRequest($request, $credentials);
    }

    public function createPresignedUrl(
        RequestInterface $request,
        CredentialsInterface $credentials,
        $expires
    ) {
        $request = clone $request;

        // Make sure to handle temporary credentials
        if ($token = $credentials->getSecurityToken()) {
            $request->setHeader('X-Amz-Security-Token', $token);
            $request->getQuery()->set('X-Amz-Security-Token', $token);
        }

        $this->moveHeadersToQuery($request);
        $httpDate = $request->getQuery()->get('X-Amz-Date');
        $scopeDate = substr($httpDate, 0, 8);
        $scope = "{$scopeDate}/{$this->regionName}/s3/aws4_request";
        $credential = $credentials->getAccessKeyId() . '/' . $scope;
        $this->addQueryStringValues($request, $credential, $this->convertExpires($expires));
        $context = $this->createSigningContext($request, 'UNSIGNED-PAYLOAD');

        $signingKey = $this->getSigningKey(
            $scopeDate,
            $this->regionName,
            $this->serviceName,
            $credentials->getSecretKey()
        );

        $stringToSign = "AWS4-HMAC-SHA256\n{$httpDate}\n{$scope}\n" . hash('sha256', $context['canonical_request']);

        $request->getQuery()->set(
            'X-Amz-Signature',
            hash_hmac('sha256', $stringToSign, $signingKey)
        );

        return $request->getUrl();
    }

    /**
     * Overrides the parent class to prevent the removal of dot-segments
     */
    protected function normalizePath(RequestInterface $request)
    {
        return '/' . ltrim($request->getPath(), '/');
    }

    private function convertExpires($expires)
    {
        if ($expires instanceof \DateTime) {
            $expires = $expires->getTimestamp();
        } elseif (!is_numeric($expires)) {
            $expires = strtotime($expires);
        }

        $duration = $expires - time();

        // Ensure that the duration of the signature is not longer than a week
        if ($duration > 604800) {
            throw new InvalidArgumentException('The expiration date of an '
                . 'Amazon S3 presigned URL using signature version 4 must be '
                . 'less than one week.');
        }

        return $duration;
    }

    private function moveHeadersToQuery(RequestInterface $request)
    {
        $query = array('X-Amz-Date' => gmdate('Ymd\THis\Z', $this->getTimestamp()));

        foreach ($request->getHeaders() as $name => $header) {
            if (substr($name, 0, 5) == 'x-amz') {
                $query[$header->getName()] = (string) $header;
            }
            if ($name != 'host') {
                $request->removeHeader($name);
            }
        }

        $request->getQuery()->overwriteWith($query);
    }

    private function addQueryStringValues(
        RequestInterface $request,
        $credential,
        $expires
    ) {
        // Set query params required for pre-signed URLs
        $request->getQuery()
            ->set('X-Amz-Algorithm', 'AWS4-HMAC-SHA256')
            ->set('X-Amz-Credential', $credential)
            ->set('X-Amz-SignedHeaders', 'Host')
            ->set('X-Amz-Expires', $expires);
    }
}
