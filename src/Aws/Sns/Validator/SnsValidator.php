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

namespace Aws\Sns\Validator;

use Aws\Sns\Validator\Strategy\StrategyInterface;
use Aws\Sns\Validator\Exception\CannotCreateValidationTypeStrategyException;
use \stdClass;

class SnsValidator
{

    /**
     * What kind of strategy to use for building the signature body.
     *
     * @var Strategy
     */
    protected $_validationTypeStrategy = null;

    /*
     * The certificate Amazon used to sign the notification.
     *
     * @var string
     */
    protected $_certificate = '';

    /**
     * The incoming message. This can be created by doing something
     * like this: $jsonMessage = json_decode($HTTP_RAW_POST_DATA);
     *
     * @var stdClass
     */
    protected $_jsonMessage;


    /**
     * SnsValidator constructor
     *
     * @param stdClass $jsonMessage
     * @param string|StrategyInterface $validationTypeStrategy
     * @throws Exception\OpenSSLExtensionNotFoundException
     */
    public function __construct(stdClass $jsonMessage, $validationTypeStrategy = null)
    {
        if (!extension_loaded('openssl')) {
            throw new Exception\OpenSSLExtensionNotFoundException();
        }

        $this->setJsonMessage($jsonMessage);

        if (is_string($validationTypeStrategy) && !empty($validationTypeStrategy)) {
            // Build strategy from string
            $validationTypeStrategy = $this->validationTypeStrategyFactory($validationTypeStrategy);

        } else if ($validationTypeStrategy instanceof Strategy) {
            // Directly set incoming strategy
            $this->setValidationTypeStrategy($validationTypeStrategy);

        } else {
            // Autodetect strategy based on notification type
            $validationTypeStrategy = $this->validationTypeStrategyFactory($this->getJsonMessage()->Type);
            $this->setValidationTypeStrategy($validationTypeStrategy);
        }
    }

    /**
     * Validate the notification
     *
     * @return bool
     * @throws Exception\CannotGetPublicKeyFromCertificateException
     */
    public function validate()
    {
        $this->_validateSigningCertURL();

        $publicKey = openssl_get_publickey($this->getCertificate());
        if (!$publicKey) {
            throw new Exception\CannotGetPublicKeyFromCertificateException();
        }

        $signatureBody = $this->getValidationTypeStrategy()->buildSignatureBody($this->getJsonMessage());
        $incomingSignature = base64_decode($this->getJsonMessage()->Signature);
        return openssl_verify($signatureBody, $incomingSignature, $publicKey, OPENSSL_ALGO_SHA1);
    }

    /**
     * ValidationTypeStrategy factory
     * @param string $validationTypeStrategy
     * @return \Aws\Sns\Validator\className
     * @throws CannotCreateValidationTypeStrategyException
     */
    public function validationTypeStrategyFactory($validationTypeStrategy)
    {
        $className = sprintf('Aws\Sns\Validator\Strategy\%sStrategy', $validationTypeStrategy);

        if (!class_exists($className)) {
            throw new CannotCreateValidationTypeStrategyException();
        }
        return new $className();
    }

    protected function _validateSigningCertURL()
    {
        $parsedUrl = parse_url($this->getJsonMessage()->SigningCertURL);

        if ('.amazonaws.com' != substr($parsedUrl['host'], -14)) {
            throw new Exception('Certificate is not coming from Amazon.');
        }
    }

    /**
     * ValidationTypeStrategy getter
     *
     * @return StrategyInterface
     */
    public function getValidationTypeStrategy()
    {
        return $this->_validationTypeStrategy;
    }

    /**
     * ValidationTypeStrategy setter
     *
     * @param \Aws\Sns\Validator\Strategy\StrategyInterface $validationTypeStrategy
     */
    public function setValidationTypeStrategy(StrategyInterface $validationTypeStrategy)
    {
        $this->_validationTypeStrategy = $validationTypeStrategy;
    }

    /**
     * Signing certificate getter
     *
     * @return string
     */
    public function getCertificate()
    {
        if ('' == $this->_certificate) {
            $this->_certificate = file_get_contents($this->getJsonMessage()->SigningCertURL);
        }
        return $this->_certificate;
    }

    /**
     * Signing certificate setter
     *
     * @param string $certificate
     */
    public function setCertificate($certificate)
    {
        $this->_certificate = $certificate;
    }

    /**
     * The original message sent by Amazon getter
     *
     * @return stdClass
     */
    public function getJsonMessage()
    {
        return $this->_jsonMessage;
    }

    /**
     * The original message sent by Amazon setter
     *
     * @param stdClass $jsonMessage
     */
    public function setJsonMessage(stdClass $jsonMessage)
    {
        $this->_jsonMessage = $jsonMessage;
    }




}

