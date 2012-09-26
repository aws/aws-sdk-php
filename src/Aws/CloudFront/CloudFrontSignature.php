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

namespace Aws\CloudFront;

use Aws\Common\Signature\SignatureInterface;
use Aws\Common\Credentials\CredentialsInterface;
use Guzzle\Http\Message\RequestInterface;

/**
 * Amazon CloudFront signature implementation
 * @link http://docs.amazonwebservices.com/AmazonCloudFront/latest/DeveloperGuide/RESTAuthentication.html
 */
class CloudFrontSignature implements SignatureInterface
{
    /**
     * {@inheritdoc}
     */
    public function signRequest(RequestInterface $request, CredentialsInterface $credentials)
    {
        // Add a date header if one is not set
        if (!$request->hasHeader('date') && !$request->hasHeader('x-amz-date')) {
            $request->setHeader('Date', gmdate('r'));
        }

        $stringToSign = (string) $request->getHeader('Date') ?: (string) $request->getHeader('x-amz-date');
        $request->getParams()->set('aws.string_to_sign', $stringToSign);

        $request->setHeader(
            'Authorization',
            'AWS ' . $credentials->getAccessKeyId() . ':' . $this->signString($stringToSign, $credentials)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function signString($string, CredentialsInterface $credentials)
    {
        return base64_encode(hash_hmac('sha1', $string, $credentials->getSecretKey(), true));
    }
}
