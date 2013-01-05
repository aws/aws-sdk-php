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
use Guzzle\Http\Message\RequestInterface;

/**
 * Implementation of Signature Version 2
 * @link http://aws.amazon.com/articles/1928
 */
class SignatureV2 extends AbstractSignature
{
    /**
     * {@inheritDoc}
     */
    public function signRequest(RequestInterface $request, CredentialsInterface $credentials)
    {
        // refresh the cached timestamp
        $this->getTimestamp(true);

        // set values we need in CanonicalizedParameterString
        $this->addParameter($request, 'Timestamp', $this->getDateTime('c'));
        $this->addParameter($request, 'SignatureVersion', '2');
        $this->addParameter($request, 'SignatureMethod', 'HmacSHA256');
        $this->addParameter($request, 'AWSAccessKeyId', $credentials->getAccessKeyId());

        // build string to sign
        $sign = $request->getMethod() . "\n"
            . $request->getHost() . "\n"
            . $request->getUrl(true)->normalizePath()->getPath() . "\n"
            . $this->getCanonicalizedParameterString($request);

        // Add the string to sign to the request for debugging purposes
        $request->getParams()->set('aws.string_to_sign', $sign);

        $signature = base64_encode(
            hash_hmac(
                'sha256',
                $sign,
                $credentials->getSecretKey(),
                true
            )
        );

        $this->addParameter($request, 'Signature', $signature);
    }

    /**
     * Add a parameter key and value to the request according to type
     *
     * @param RequestInterface $request The request
     * @param string           $key     The name of the parameter
     * @param string           $value   The value of the parameter
     */
    public function addParameter(RequestInterface $request, $key, $value)
    {
        if ($request->getMethod() == 'POST') {
            $request->addPostFields(array($key => $value));
        } else {
            $request->getQuery()->set($key, $value);
        }
    }

    /**
     * Get the canonicalized query/parameter string for a request
     *
     * @return string
     */
    public function getCanonicalizedParameterString(RequestInterface $request)
    {
        $params = array();
        $str    = '';

        switch ($request->getMethod()) {
            case 'POST':
                $params = $request->getPostFields()->toArray();
                break;
            case 'GET':
            case 'HEAD':
            case 'PUT':
            case 'DELETE':
            default:
                $params = $request->getQuery()->toArray();
                break;
        }

        uksort($params, 'strcmp');

        foreach ($params as $key => $val) {
            $str .= rawurlencode($key) . '=' . rawurlencode($val) . '&';
        }

        $str = substr($str, 0, -1);
        return $str;
    }
}
