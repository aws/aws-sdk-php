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
use GuzzleHttp\Post\PostBodyInterface;

/**
 * Implementation of Signature Version 2
 * @link http://aws.amazon.com/articles/1928
 */
class SignatureV2 implements SignatureInterface
{
    public function signRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        /** @var PostBodyInterface $body */
        $body = $request->getBody();
        $body->setField('Timestamp', gmdate('c', time()));
        $body->setField('SignatureVersion', '2');
        $body->setField('SignatureMethod', 'HmacSHA256');
        $body->setField('AWSAccessKeyId', $credentials->getAccessKeyId());

        if ($token = $credentials->getSecurityToken()) {
            $body->setField('SecurityToken', $token);
        }

        // build string to sign
        $sign = $request->getMethod() . "\n"
            . $request->getHost() . "\n"
            . '/' . "\n"
            . $this->getCanonicalizedParameterString($body);

        $body->setField('Signature', base64_encode(
            hash_hmac(
                'sha256',
                $sign,
                $credentials->getSecretKey(),
                true
            )
        ));
    }

    private function getCanonicalizedParameterString(PostBodyInterface $body)
    {
        $params = $body->getFields();
        unset($params['Signature']);
        uksort($params, 'strcmp');

        $str = '';
        foreach ($params as $key => $val) {
            $str .= rawurlencode($key) . '=' . rawurlencode($val) . '&';
        }

        return substr($str, 0, -1);
    }
}
