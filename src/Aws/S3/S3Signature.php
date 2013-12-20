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
use Aws\S3\S3Client;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\QueryString;
use Guzzle\Http\Url;

/**
 * Default Amazon S3 signature implementation
 * @link http://docs.aws.amazon.com/AmazonS3/latest/dev/RESTAuthentication.html
 */
class S3Signature implements S3SignatureInterface
{
    /**
     * @var array Query string values that must be signed
     */
    protected $signableQueryString = array (
        'acl',
        'cors',
        'delete',
        'lifecycle',
        'location',
        'logging',
        'notification',
        'partNumber',
        'policy',
        'requestPayment',
        'response-cache-control',
        'response-content-disposition',
        'response-content-encoding',
        'response-content-language',
        'response-content-type',
        'response-expires',
        'restore',
        'tagging',
        'torrent',
        'uploadId',
        'uploads',
        'versionId',
        'versioning',
        'versions',
        'website',
    );

    /** @var array Sorted headers that must be signed */
    private $signableHeaders = array('Content-MD5', 'Content-Type');

    public function signRequest(RequestInterface $request, CredentialsInterface $credentials)
    {
        // Ensure that the signable query string parameters are sorted
        sort($this->signableQueryString);

        // Add the security token header if one is being used by the credentials
        if ($token = $credentials->getSecurityToken()) {
            $request->setHeader('x-amz-security-token', $token);
        }

        // Add a date header if one is not set
        if (!$request->hasHeader('date') && !$request->hasHeader('x-amz-date')) {
            $request->setHeader('Date', gmdate(\DateTime::RFC2822));
        }

        $stringToSign = $this->createCanonicalizedString($request);
        $request->getParams()->set('aws.string_to_sign', $stringToSign);

        $request->setHeader(
            'Authorization',
            'AWS ' . $credentials->getAccessKeyId() . ':' . $this->signString($stringToSign, $credentials)
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

        // Operate on a clone of the request, so the original is not altered
        $request = clone $request;

        // URL encoding already occurs in the URI template expansion. Undo that and encode using the same encoding as
        // GET object, PUT object, etc.
        $path = S3Client::encodeKey(rawurldecode($request->getPath()));
        $request->setPath($path);

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

        return $request->getUrl();
    }

    public function signString($string, CredentialsInterface $credentials)
    {
        return base64_encode(hash_hmac('sha1', $string, $credentials->getSecretKey(), true));
    }

    public function createCanonicalizedString(RequestInterface $request, $expires = null)
    {
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

    /**
     * Create a canonicalized AmzHeaders string for a signature.
     *
     * @param RequestInterface $request Request from which to gather headers
     *
     * @return string Returns canonicalized AMZ headers.
     */
    private function createCanonicalizedAmzHeaders(RequestInterface $request)
    {
        $headers = array();
        foreach ($request->getHeaders(true) as $header) {
            /** @var $header \Guzzle\Http\Message\Header */
            $name = strtolower($header->getName());
            if (strpos($name, 'x-amz-') === 0) {
                $value = trim((string) $header);
                if ($value || $value === '0') {
                    $headers[$name] = $name . ':' . $value;
                }
            }
        }

        if (empty($headers)) {
            return '';
        }

        ksort($headers);

        return implode("\n", $headers) . "\n";
    }

    /**
     * Create a canonicalized resource for a request
     *
     * @param RequestInterface $request Request for the resource
     *
     * @return string
     */
    private function createCanonicalizedResource(RequestInterface $request)
    {
        $buffer = $request->getParams()->get('s3.resource');
        // When sending a raw HTTP request (e.g. $client->get())
        if (null === $buffer) {
            $bucket = $request->getParams()->get('bucket') ?: $this->parseBucketName($request);
            // Use any specified bucket name, the parsed bucket name, or no bucket name when interacting with GetService
            $buffer = $bucket ? "/{$bucket}" : '';
            // Remove encoding from the path and use the S3 specific encoding
            $path = S3Client::encodeKey(rawurldecode($request->getPath()));
            // if the bucket was path style, then ensure that the bucket wasn't duplicated in the resource
            $buffer .= preg_replace("#^/{$bucket}/{$bucket}#", "/{$bucket}", $path);
        }

        // Remove double slashes
        $buffer = str_replace('//', '/', $buffer);

        // Add sub resource parameters
        $query = $request->getQuery();
        $first = true;
        foreach ($this->signableQueryString as $key) {
            if ($query->hasKey($key)) {
                $value = $query[$key];
                $buffer .= $first ? '?' : '&';
                $first = false;
                $buffer .= $key;
                // Don't add values for sub-resources
                if ($value !== '') {
                    $buffer .= "={$value}";
                }
            }
        }

        return $buffer;
    }

    /**
     * Parse the bucket name from a request object
     *
     * @param RequestInterface $request Request to parse
     *
     * @return string
     */
    private function parseBucketName(RequestInterface $request)
    {
        $baseUrl = Url::factory($request->getClient()->getBaseUrl());
        $baseHost = $baseUrl->getHost();
        $host = $request->getHost();

        if (strpos($host, $baseHost) === false) {
            // Does not contain the base URL, so it's either a redirect, CNAME, or using a different region
            $baseHost = '';
            // For every known S3 host, check if that host is present on the request
            $regions = $request->getClient()->getDescription()->getData('regions');
            foreach ($regions as $region) {
                if (strpos($host, $region['hostname']) !== false) {
                    // This host matches the request host. Tells use the region and endpoint-- we can derive the bucket
                    $baseHost = $region['hostname'];
                    break;
                }
            }
            // If no matching base URL was found, then assume that this is a CNAME, and the CNAME is the bucket
            if (!$baseHost) {
                return $host;
            }
        }

        // Remove the baseURL from the host of the request to attempt to determine the bucket name
        return trim(str_replace($baseHost, '', $request->getHost()), ' .');
    }
}
