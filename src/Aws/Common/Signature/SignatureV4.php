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
 * @link http://docs.amazonwebservices.com/general/latest/gr/signature-version-4.html
 */
class SignatureV4 extends AbstractSignature implements EndpointSignatureInterface
{
    /**
     * @var string Cache of the default empty entity-body payload
     */
    const DEFAULT_PAYLOAD = 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855';

    /**
     * @var string Explicitly set service name
     */
    protected $serviceName;

    /**
     * @var string Explicitly set region name
     */
    protected $regionName;

    /**
     * @var int Maximum number of hashes to cache
     */
    protected $maxCacheSize = 50;

    /**
     * @var array Cache of previously signed values
     */
    protected $hashCache = array();

    /**
     * @var int Size of the hash cache
     */
    protected $cacheSize = 0;

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

    /**
     * {@inheritdoc}
     */
    public function signRequest(RequestInterface $request, CredentialsInterface $credentials)
    {
        // Refresh the cached timestamp
        $this->getTimestamp(true);

        $longDate = $this->getDateTime(DateFormat::ISO8601);
        $shortDate = $this->getDateTime(DateFormat::SHORT);

        // Remove any previously set Authorization headers so that
        // exponential backoff works correctly
        $request->removeHeader('Authorization');

        // Requires a x-amz-date header or Date
        if ($request->hasHeader('x-amz-date') || !$request->hasHeader('Date')) {
            $request->setHeader('x-amz-date', $longDate);
        } else {
            $request->setHeader('Date', $this->getDateTime(DateFormat::RFC1123));
        }

        // Add the security token if one is present
        if ($credentials->getSecurityToken()) {
            $request->setHeader('x-amz-security-token', $credentials->getSecurityToken());
        }

        // Parse the region and service name from the request URL
        $url = Url::factory($request->getUrl());

        // Parse the service and region or use one that is explicitly set
        $region = $this->regionName ?: HostNameUtils::parseRegionName($url);
        $service = $this->serviceName ?: HostNameUtils::parseServiceName($url);

        $credentialScope = "{$shortDate}/{$region}/{$service}/aws4_request";

        $stringToSign = "AWS4-HMAC-SHA256\n{$longDate}\n{$credentialScope}\n"
            . hash('sha256', $this->createCanonicalRequest($request));

        // Add the string to sign for debugging
        $request->getParams()->set('aws.string_to_sign', $stringToSign);

        // Calculate the signing key using a series of derived keys
        $dateKey = $this->getHash($shortDate, 'AWS4' . $credentials->getSecretKey());
        $regionKey = $this->getHash($region, $dateKey);
        $serviceKey = $this->getHash($service, $regionKey);
        $signingKey = $this->getHash('aws4_request', $serviceKey);
        $signature = hash_hmac('sha256', $stringToSign, $signingKey);

        $request->setHeader('Authorization', "AWS4-HMAC-SHA256 "
            . "Credential={$credentials->getAccessKeyId()}/{$credentialScope}, "
            . 'SignedHeaders=' . $request->getParams()->get('aws.signed_headers')
            . ", Signature={$signature}");
    }

    /**
     * Create the canonical representation of a request
     *
     * @param RequestInterface $request Request to canonicalize
     *
     * @return string
     */
    private function createCanonicalRequest(RequestInterface $request)
    {
        // Normalize the path as required by SigV4
        $path = $request->getUrl(true)->normalizePath()->getPath();

        $canon = $request->getMethod() . "\n{$path}\n"
            . $this->getCanonicalizedQueryString($request) . "\n";

        // Create the canonical headers
        $headers = array();
        foreach ($request->getHeaders() as $key => $values) {
            $key = strtolower($key);
            if (!isset($headers[$key])) {
                $headers[$key] = array();
            }
            foreach ($values as $value) {
                $headers[$key][] = preg_replace('/\s+/', ' ', trim($value));
            }
        }

        // The headers must be sorted
        ksort($headers);

        // Continue to build the canonical request by adding headers
        foreach ($headers as $key => $values) {
            // Combine multi-value headers into a sorted comma separated list
            if (count($values) > 1) {
                sort($values);
            }
            $value = implode(',', $values);
            $canon .= $key . ':' . $value . "\n";
        }

        // Create the signed headers
        $signedHeaders = implode(';', array_keys($headers));
        $canon .= "\n{$signedHeaders}\n";
        $request->getParams()->set('aws.signed_headers', $signedHeaders);

        // Create the payload if this request has an entity body
        if ($request->hasHeader('x-amz-content-sha256')) {
            // Handle streaming operations (e.g. Glacier.UploadArchive)
            $canon .= $request->getHeader('x-amz-content-sha256');
        } elseif ($request instanceof EntityEnclosingRequestInterface) {
            $canon .= hash(
                'sha256',
                $request->getMethod() == 'POST' && count($request->getPostFields())
                    ? (string) $request->getPostFields() : (string) $request->getBody()
            );
        } else {
            $canon .= self::DEFAULT_PAYLOAD;
        }

        // Add debug information
        $request->getParams()->set('aws.canonical_request', $canon);

        return $canon;
    }

    /**
     * Get a hash for a specific key and value.  If the hash was previously
     * cached, return it
     *
     * @param string $stringToSign Value to sign
     * @param string $signingKey   Key to sign with
     *
     * @return string
     */
    private function getHash($stringToSign, $signingKey)
    {
        $cacheKey = $stringToSign . '_' . $signingKey;

        // Retrieve the hash form the cache or create it and add it to the cache
        if (!isset($this->hashCache[$cacheKey])) {

            // When the cache size reaches the max, then just clear the cache
            if (++$this->cacheSize > $this->maxCacheSize) {
                $this->hashCache = array();
                $this->cacheSize = 0;
            }

            $this->hashCache[$cacheKey] = hash_hmac('sha256', $stringToSign, $signingKey, true);
        }

        return $this->hashCache[$cacheKey];
    }
}
