<?php
namespace Aws\Sns\MessageValidator;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Url;

/**
 * This class uses openssl to verify SNS messages to ensure that they were sent
 * by AWS.
 */
class MessageValidator
{
    /** @var ClientInterface The HTTP client used to fetch the certificate */
    protected $client;

    /**
     * Constructs the Message Validator object and ensures that openssl is
     * installed.
     *
     * @param ClientInterface $client Client used to fetch a certificate
     *
     * @throws \RuntimeException If openssl is not installed
     */
    public function __construct(ClientInterface $client = null)
    {
        if (!extension_loaded('openssl')) {
            //@codeCoverageIgnoreStart
            throw new \RuntimeException('The openssl extension is required to '
                . 'use the SNS message validator. Please install this '
                . 'extension in order to use this feature.');
            //@codeCoverageIgnoreEnd
        }

        $this->client = $client ?: new Client();
    }

    /**
     * Validates a message from SNS to ensure that it was delivered by AWS
     *
     * @param Message $message The message to validate
     *
     * @throws SnsMessageValidatorException If the certificate cannot be
     *     retrieved, if the certificate's source cannot be verified, or if the
     *     message's signature is invalid.
     */
    public function validate(Message $message)
    {
        $certUrl = Url::fromString($message->get('SigningCertURL'));

        if ('.amazonaws.com' != substr($certUrl->getHost(), -14)) {
            throw new SnsMessageValidatorException('The certificate is from '
                . 'an unrecognized source');
        }

        // Get the cert itself and extract the public key
        $certificate = $this->client->get((string) $certUrl)->getBody();
        $publicKey = openssl_get_publickey($certificate);

        if (!$publicKey) {
            throw new SnsMessageValidatorException('Cannot get the public key '
                . 'from the certificate');
        }

        // Verify the signature of the message
        $stringToSign = $message->getStringToSign();
        $incomingSignature = base64_decode($message->get('Signature'));

        if (!openssl_verify(
            $stringToSign,
            $incomingSignature,
            $publicKey,
            OPENSSL_ALGO_SHA1
        )) {
            throw new SnsMessageValidatorException('The message signature is '
                . 'invalid');
        }
    }

    /**
     * Determines if a message is valid and that is was delivered by AWS. This
     * method does not throw exceptions and returns a simple boolean value.
     *
     * @param Message $message The message to validate
     *
     * @return bool
     */
    public function isValid(Message $message)
    {
        try {
            $this->validate($message);
            return true;
        } catch (SnsMessageValidatorException $e) {
            return false;
        }
    }
}
