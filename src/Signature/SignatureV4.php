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
use GuzzleHttp\Url;

/**
 * Signature Version 4
 * @link http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html
 */
class SignatureV4 implements SignatureInterface
{
    /** @var string Cache of the default empty entity-body payload */
    const DEFAULT_PAYLOAD = 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855';

    /** @var string */
    private $service;

    /** @var string */
    private $region;

    /** @var array Cache of previously signed values */
    private $cache = [];

    /** @var int Size of the hash cache */
    private $cacheSize = 0;

    /**
     * @param string $service Service name to use when signing
     * @param string $region  Region name to use when signing
     */
    public function __construct($service, $region)
    {
        $this->service = $service;
        $this->region = $region;
    }

    public function signRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        $timestamp = time();
        $longDate = gmdate('Ymd\THis\Z', $timestamp);
        $shortDate = substr($longDate, 0, 8);

        // Prepare the request with a clean state and new timestamp
        $request->removeHeader('Authorization');
        $request->removeHeader('Date');
        $request->setHeader('x-amz-date', $longDate);

        // Add the security token if one is present
        if ($token = $credentials->getSecurityToken()) {
            $request->setHeader('x-amz-security-token', $token);
        }

        // Parse the service and region or use one that is explicitly set
        $credentialScope = "{$shortDate}/{$this->region}/{$this->service}/aws4_request";

        // Calculate the request signature payload
        if ($request->hasHeader('x-amz-content-sha256')) {
            // Handle streaming operations (e.g. Glacier.UploadArchive)
            $payload = $request->getHeader('x-amz-content-sha256');
        } else {
            if ($request->getBody()) {
                $payload = hash('sha256', (string) $request->getBody());
            } else {
                // Use the default payload if there is no body
                $payload = self::DEFAULT_PAYLOAD;
            }
            $request->setHeader('x-amz-content-sha256', $payload);
        }

        $context = $this->createSigningContext($request, $payload);
        $context['string_to_sign'] = "AWS4-HMAC-SHA256\n{$longDate}\n{$credentialScope}\n"
            . hash('sha256', $context['canonical_request']);

        // Calculate the signing key using a series of derived keys
        $key = $this->getSigningKey(
            $shortDate,
            $this->region,
            $this->service,
            $credentials->getSecretKey()
        );

        $signature = hash_hmac('sha256', $context['string_to_sign'], $key);

        $request->setHeader('Authorization', "AWS4-HMAC-SHA256 "
            . "Credential={$credentials->getAccessKeyId()}/{$credentialScope}, "
            . "SignedHeaders={$context['signed_headers']}, Signature={$signature}");

        $request->getConfig()['aws.signature'] = $context;
    }

    protected function getRegionName()
    {
        return $this->region;
    }

    protected function getServiceName()
    {
        return $this->service;
    }

    /**
     * Get the normalized path of a request
     *
     * @param RequestInterface $request Request to normalize
     *
     * @return string Returns the normalized path
     */
    protected function normalizePath(RequestInterface $request)
    {
        $url = Url::fromString($request->getUrl());
        $url->removeDotSegments();

        return '/' . ltrim($url->getPath(), '/');
    }

    /**
     * @internal Create the canonical representation of a request
     *
     * @param RequestInterface $request Request to canonicalize
     * @param string           $payload Request payload (typically the value
     *                                  of the x-amz-content-sha256 header.
     *
     * @return array Returns an array of context information including:
     *     - canonical_request
     *     - signed_headers
     */
    protected function createSigningContext(RequestInterface $request, $payload)
    {
        // Normalize the path as required by SigV4 and ensure it's absolute
        $canon = $request->getMethod() . "\n"
            . $this->normalizePath($request) . "\n"
            . $this->getCanonicalizedQueryString($request) . "\n";

        // Create the canonical headers
        $headers = array_change_key_case($request->getHeaders());
        ksort($headers);

        foreach ($headers as $key => $values) {
            // Combine multi-value headers into a comma separated list
            if (count($values) > 1) {
                foreach ($values as &$value) {
                    $value = trim($value);
                }
                unset($value);
                sort($values);
            }
            $canon .= $key . ':'
                . preg_replace('/\s+/', ' ', implode(',', $values)) . "\n";
        }

        // Create the signed headers
        $signedHeaders = implode(';', array_keys($headers));
        $canon .= "\n{$signedHeaders}\n{$payload}";

        return [
            'canonical_request' => $canon,
            'signed_headers'    => $signedHeaders
        ];
    }

    /**
     * @internal Get a signing key hash for a specific key and value.
     *
     * @param string $shortDate Short date
     * @param string $region    Region name
     * @param string $service   Service name
     * @param string $secretKey Secret Access Key
     *
     * @return string
     */
    protected function getSigningKey($shortDate, $region, $service, $secretKey)
    {
        $k = $shortDate . '_' . $region . '_' . $service . '_' . $secretKey;

        if (!isset($this->cache[$k])) {
            // Clear the cache when it reaches 50 entries
            if (++$this->cacheSize > 50) {
                $this->cache = [];
                $this->cacheSize = 0;
            }
            $dateKey = hash_hmac('sha256', $shortDate, 'AWS4' . $secretKey, true);
            $regionKey = hash_hmac('sha256', $region, $dateKey, true);
            $serviceKey = hash_hmac('sha256', $service, $regionKey, true);
            $this->cache[$k] = hash_hmac('sha256', 'aws4_request', $serviceKey, true);
        }

        return $this->cache[$k];
    }

    /**
     * Get the canonicalized query string for a request
     *
     * @param  RequestInterface $request
     * @return string
     */
    private function getCanonicalizedQueryString(RequestInterface $request)
    {
        $queryParams = $request->getQuery()->toArray();
        unset($queryParams['X-Amz-Signature']);
        if (empty($queryParams)) {
            return '';
        }

        $qs = '';
        ksort($queryParams);
        foreach ($queryParams as $k => $v) {
            if (!is_array($v)) {
                $qs .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
            } else {
                sort($v);
                foreach ($v as $value) {
                    $qs .= rawurlencode($k) . '=' . rawurlencode($value) . '&';
                }
            }
        }

        return substr($qs, 0, -1);
    }
}
