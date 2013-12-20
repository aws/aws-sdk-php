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

namespace Aws\Common\Signature;

use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Enum\DateFormat;
use Aws\Common\HostNameUtils;
use Guzzle\Http\Message\EntityEnclosingRequestInterface;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Url;

/**
 * Signature Version 4
 * @link http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html
 */
class SignatureV4 extends AbstractSignature implements EndpointSignatureInterface
{
    /** @var string Cache of the default empty entity-body payload */
    const DEFAULT_PAYLOAD = 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855';

    /** @var string Explicitly set service name */
    protected $serviceName;

    /** @var string Explicitly set region name */
    protected $regionName;

    /** @var int Maximum number of hashes to cache */
    protected $maxCacheSize = 50;

    /** @var array Cache of previously signed values */
    protected $hashCache = array();

    /** @var int Size of the hash cache */
    protected $cacheSize = 0;

    /**
     * @param string $serviceName Bind the signing to a particular service name
     * @param string $regionName  Bind the signing to a particular region name
     */
    public function __construct($serviceName = null, $regionName = null)
    {
        $this->serviceName = $serviceName;
        $this->regionName = $regionName;
    }

    /**
     * Set the service name instead of inferring it from a request URL
     *
     * @param string $service Name of the service used when signing
     *
     * @return self
     */
    public function setServiceName($service)
    {
        $this->serviceName = $service;

        return $this;
    }

    /**
     * Set the region name instead of inferring it from a request URL
     *
     * @param string $region Name of the region used when signing
     *
     * @return self
     */
    public function setRegionName($region)
    {
        $this->regionName = $region;

        return $this;
    }

    /**
     * Set the maximum number of computed hashes to cache
     *
     * @param int $maxCacheSize Maximum number of hashes to cache
     *
     * @return self
     */
    public function setMaxCacheSize($maxCacheSize)
    {
        $this->maxCacheSize = $maxCacheSize;

        return $this;
    }

    public function signRequest(RequestInterface $request, CredentialsInterface $credentials)
    {
        $timestamp = $this->getTimestamp();
        $longDate = gmdate(DateFormat::ISO8601, $timestamp);
        $shortDate = substr($longDate, 0, 8);

        // Remove any previously set Authorization headers so that retries work
        $request->removeHeader('Authorization');

        // Requires a x-amz-date header or Date
        if ($request->hasHeader('x-amz-date') || !$request->hasHeader('Date')) {
            $request->setHeader('x-amz-date', $longDate);
        } else {
            $request->setHeader('Date', gmdate(DateFormat::RFC1123, $timestamp));
        }

        // Add the security token if one is present
        if ($credentials->getSecurityToken()) {
            $request->setHeader('x-amz-security-token', $credentials->getSecurityToken());
        }

        // Parse the service and region or use one that is explicitly set
        $region = $this->regionName;
        $service = $this->serviceName;
        if (!$region || !$service) {
            $url = Url::factory($request->getUrl());
            $region = $region ?: HostNameUtils::parseRegionName($url);
            $service = $service ?: HostNameUtils::parseServiceName($url);
        }

        $credentialScope = "{$shortDate}/{$region}/{$service}/aws4_request";

        // Calculate the request signature payload
        if ($request->hasHeader('x-amz-content-sha256')) {
            // Handle streaming operations (e.g. Glacier.UploadArchive)
            $payload = $request->getHeader('x-amz-content-sha256');
        } elseif ($request instanceof EntityEnclosingRequestInterface) {
            $payload = hash(
                'sha256',
                $request->getMethod() == 'POST' && count($request->getPostFields())
                    ? (string) $request->getPostFields()
                    : (string) $request->getBody()
            );
        } else {
            // Use the default payload if there is no body
            $payload = self::DEFAULT_PAYLOAD;
        }

        $signingContext = $this->createSigningContext($request, $payload);
        $signingContext['string_to_sign'] = "AWS4-HMAC-SHA256\n{$longDate}\n{$credentialScope}\n"
            . hash('sha256', $signingContext['canonical_request']);

        // Calculate the signing key using a series of derived keys
        $signingKey = $this->getSigningKey($shortDate, $region, $service, $credentials->getSecretKey());
        $signature = hash_hmac('sha256', $signingContext['string_to_sign'], $signingKey);

        $request->setHeader('Authorization', "AWS4-HMAC-SHA256 "
            . "Credential={$credentials->getAccessKeyId()}/{$credentialScope}, "
            . "SignedHeaders={$signingContext['signed_headers']}, Signature={$signature}");

        // Add debug information to the request
        $request->getParams()->set('aws.signature', $signingContext);
    }

    /**
     * Create the canonical representation of a request
     *
     * @param RequestInterface $request Request to canonicalize
     * @param string           $payload Request payload (typically the value
     *                                  of the x-amz-content-sha256 header.
     *
     * @return array Returns an array of context information including:
     *               - canonical_request
     *               - signed_headers
     */
    protected function createSigningContext(RequestInterface $request, $payload)
    {
        // Normalize the path as required by SigV4 and ensure it's absolute
        $canon = $request->getMethod() . "\n"
            . $this->normalizePath($request) . "\n"
            . $this->getCanonicalizedQueryString($request) . "\n";

        // Create the canonical headers
        $headers = array();
        foreach ($request->getHeaders()->getAll() as $key => $values) {
            $key = strtolower($key);
            if ($key != 'user-agent') {
                $headers[$key] = array();
                foreach ($values as $value) {
                    $headers[$key][] = preg_replace('/\s+/', ' ', trim($value));
                }
                // Sort the value if there is more than one
                if (count($values) > 1) {
                    sort($headers[$key]);
                }
            }
        }

        // The headers must be sorted
        ksort($headers);

        // Continue to build the canonical request by adding headers
        foreach ($headers as $key => $values) {
            // Combine multi-value headers into a comma separated list
            $canon .= $key . ':' . implode(',', $values) . "\n";
        }

        // Create the signed headers
        $signedHeaders = implode(';', array_keys($headers));
        $canon .= "\n{$signedHeaders}\n{$payload}";

        return array(
            'canonical_request' => $canon,
            'signed_headers'    => $signedHeaders
        );
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
       return '/' . ltrim($request->getUrl(true)->normalizePath()->getPath(), '/');
    }

    /**
     * Get a hash for a specific key and value.  If the hash was previously
     * cached, return it
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
        $cacheKey = $shortDate . '_' . $region . '_' . $service . '_' . $secretKey;

        // Retrieve the hash form the cache or create it and add it to the cache
        if (!isset($this->hashCache[$cacheKey])) {
            // When the cache size reaches the max, then just clear the cache
            if (++$this->cacheSize > $this->maxCacheSize) {
                $this->hashCache = array();
                $this->cacheSize = 0;
            }
            $dateKey = hash_hmac('sha256', $shortDate, 'AWS4' . $secretKey, true);
            $regionKey = hash_hmac('sha256', $region, $dateKey, true);
            $serviceKey = hash_hmac('sha256', $service, $regionKey, true);
            $this->hashCache[$cacheKey] = hash_hmac('sha256', 'aws4_request', $serviceKey, true);
        }

        return $this->hashCache[$cacheKey];
    }

    /**
     * Get the canonicalized query string for a request
     *
     * @param  RequestInterface $request
     * @return string
     */
    private function getCanonicalizedQueryString(RequestInterface $request)
    {
        $queryParams = $request->getQuery()->getAll();
        unset($queryParams['X-Amz-Signature']);
        if (empty($queryParams)) {
            return '';
        }

        $qs = '';
        ksort($queryParams);
        foreach ($queryParams as $key => $values) {
            if (is_array($values)) {
                sort($values);
            } elseif (!$values) {
                $values = array('');
            }

            foreach ((array) $values as $value) {
                $qs .= rawurlencode($key) . '=' . rawurlencode($value) . '&';
            }
        }

        return substr($qs, 0, -1);
    }
}
