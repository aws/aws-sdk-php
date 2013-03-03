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

namespace Aws\Sns\MessageValidator;

use Aws\Sns\MessageValidator\MessageInterface;

class MessageValidator
{

    public function __construct()
    {
        if (!extension_loaded('openssl')) {
            throw new Exception\OpenSSLExtensionNotFoundException();
        }
    }

    public function validate(MessageInterface $message)
    {
        $this->_validateSigningCertURL($message->getSigningCertURL());
        $certificate = file_get_contents($message->getSigningCertURL());

        $publicKey = openssl_get_publickey($certificate);
        if (!$publicKey) {
            throw new Exception\CannotGetPublicKeyFromCertificateException();
        }

        $signatureBody = $message->getStringToSign();
        $incomingSignature = base64_decode($message->getSignature());
        return openssl_verify($signatureBody, $incomingSignature, $publicKey, OPENSSL_ALGO_SHA1);
    }

    protected function _validateSigningCertURL($url)
    {
        $parsedUrl = parse_url($url);

        if ('.amazonaws.com' != substr($parsedUrl['host'], -14)) {
            throw new Exception('Certificate is not coming from Amazon.');
        }
    }
}