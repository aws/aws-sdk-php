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

namespace Aws\Signature;

use Aws\Credentials\CredentialsInterface;
use GuzzleHttp\Message\RequestInterface;

/**
 * Default Amazon S3 signature implementation
 * @link http://docs.aws.amazon.com/AmazonS3/latest/dev/RESTAuthentication.html
 */
class S3Signature implements PresignedUrlInterface
{
    /** @var array Query string values that must be signed */
    protected $signableQueryString = ['acl', 'cors', 'delete', 'lifecycle',
        'location', 'logging', 'notification', 'partNumber', 'policy',
        'requestPayment', 'response-cache-control', 'response-content-disposition',
        'response-content-encoding', 'response-content-language',
        'response-content-type', 'response-expires', 'restore', 'tagging',
        'torrent', 'uploadId', 'uploads', 'versionId', 'versioning',
        'versions', 'website'];

    /** @var array Sorted headers that must be signed */
    private $signableHeaders = ['Content-MD5', 'Content-Type'];

    public function signRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        // Ensure that the signable query string parameters are sorted
        sort($this->signableQueryString);

        // Add the security token header if one is being used by the credentials
        if ($token = $credentials->getSecurityToken()) {
            $request->setHeader('x-amz-security-token', $token);
        }

        // Add a date header if one is not set
        if (!$request->hasHeader('date') &&
            !$request->hasHeader('x-amz-date')
        ) {
            $request->setHeader('Date', gmdate(\DateTime::RFC2822));
        }

        $stringToSign = $this->createCanonicalizedString($request);
        $request->getConfig()['aws.string_to_sign'] = $stringToSign;

        $request->setHeader(
            'Authorization',
            'AWS ' . $credentials->getAccessKeyId() . ':'
                . $this->signString($stringToSign, $credentials)
        );
    }

    public function createPresignedUrl(
        RequestInterface $request,
        CredentialsInterface $credentials,
        $expires
    ) {
        if ($expires instanceof \DateTime) {
            $expires = $expires->getTimestamp();
        } elseif (!is_numeric($expires)) {
            $expires = strtotime($expires);
        }

        // Operate on a clone of the request, so the original is not altered.
        $request = clone $request;

        // Make sure to handle temporary credentials
        if ($token = $credentials->getSecurityToken()) {
            $request->setHeader('x-amz-security-token', $token);
            $request->getQuery()->set('x-amz-security-token', $token);
        }

        // Set query params required for pre-signed URLs
        $request->getQuery()
            ->set('AWSAccessKeyId', $credentials->getAccessKeyId())
            ->set('Expires', $expires)
            ->set('Signature', $this->signString(
                $this->createCanonicalizedString($request, $expires),
                $credentials
            ));

        // Move X-Amz-* headers to the query string
        foreach ($request->getHeaders() as $name => $header) {
            $name = strtolower($name);
            if (strpos($name, 'x-amz-') === 0) {
                $request->getQuery()->set($name, (string) $header);
                $request->removeHeader($name);
            }
        }

        return $request->getUrl();
    }

    public function signString($string, CredentialsInterface $credentials)
    {
        return base64_encode(
            hash_hmac('sha1', $string, $credentials->getSecretKey(), true)
        );
    }

    public function createCanonicalizedString(
        RequestInterface $request,
        $expires = null
    ) {
        $buffer = $request->getMethod() . "\n";

        // Add the interesting headers
        foreach ($this->signableHeaders as $header) {
            $buffer .= (string) $request->getHeader($header) . "\n";
        }

        // Choose dates from left to right based on what's set
        $date = $expires ?: (string) $request->getHeader('date');

        $buffer .= "{$date}\n"
            . $this->createCanonicalizedAmzHeaders($request)
            . $this->createCanonicalizedResource($request);

        return $buffer;
    }

    private function createCanonicalizedAmzHeaders(RequestInterface $request)
    {
        $headers = array();
        foreach ($request->getHeaders() as $name => $header) {
            $name = strtolower($name);
            if (strpos($name, 'x-amz-') === 0) {
                $value = trim((string) $header);
                if ($value || $value === '0') {
                    $headers[$name] = $name . ':' . $value;
                }
            }
        }

        if (!$headers) {
            return '';
        }

        ksort($headers);

        return implode("\n", $headers) . "\n";
    }

    private function createCanonicalizedResource(RequestInterface $request)
    {
        if (!($command = $request->getConfig()->get('command'))) {
            throw new \RuntimeException('A command must be set in order to '
                . 'sign S3 requests');
        }

        $buffer = $command['Bucket'];

        if ($command['Key']) {
            $buffer .= '/' . $command['Key'];
        }

        // Add sub resource parameters
        $query = $request->getQuery();
        $first = true;
        foreach ($this->signableQueryString as $key) {
            if ($query->hasKey($key)) {
                $value = $query[$key];
                $buffer .= $first ? '?' : '&';
                $first = false;
                $buffer .= $key;
                // Don't add values for empty sub-resources
                if ($value !== '' && $value !== false && $value !== null) {
                    $buffer .= "={$value}";
                }
            }
        }

        return $buffer;
    }
}
