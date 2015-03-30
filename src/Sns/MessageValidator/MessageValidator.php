<?php
namespace Aws\Sns\MessageValidator;

use Aws\Sns\Exception\MessageValidatorException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

/**
 * This class uses openssl to verify SNS messages to ensure that they were sent
 * by AWS.
 */
class MessageValidator
{
    /** @var callable HTTP handler used to fetch the certificate */
    private $client;

    /**
     * Constructs the Message Validator object and ensures that openssl is
     * installed.
     *
     * @param callable $httpHandler HTTP handler used to fetch a certificate.
     *                              The handler accepts a PSR7 RequestInterface
     *                              and array of request options and returns a
     *                              promise that fufills with a PSR7
     *                              ResponseInterface.
     *
     * @throws \RuntimeException If openssl is not installed
     */
    public function __construct(callable $httpHandler = null)
    {
        if (!extension_loaded('openssl')) {
            //@codeCoverageIgnoreStart
            throw new \RuntimeException('The openssl extension is required to '
                . 'use the SNS message validator. Please install this '
                . 'extension in order to use this feature.');
            //@codeCoverageIgnoreEnd
        }

        $this->client = $httpHandler ?: \Aws\default_http_handler();
    }

    /**
     * Validates a message from SNS to ensure that it was delivered by AWS
     *
     * @param Message $message The message to validate
     *
     * @throws MessageValidatorException If the certificate cannot be
     *     retrieved, if the certificate's source cannot be verified, or if the
     *     message's signature is invalid.
     */
    public function validate(Message $message)
    {
        // Get and validate the URL for the certificate.
        $certUrl = new Uri($message->get('SigningCertURL'));
        $this->validateUrl($certUrl);

        // Get the cert itself and extract the public key
        $request = new Request('GET', (string) $certUrl);
        $promise = call_user_func($this->client, $request);
        $certificate = (string) $promise->wait()->getBody();

        $key = openssl_get_publickey($certificate);
        if (!$key) {
            throw new MessageValidatorException('Cannot get the public key '
                . 'from the certificate.');
        }

        // Verify the signature of the message
        $content = $message->getStringToSign();
        $signature = base64_decode($message->get('Signature'));

        if (!openssl_verify($content, $signature, $key, OPENSSL_ALGO_SHA1)) {
            throw new MessageValidatorException('The message signature is '
                . 'invalid.');
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
        } catch (MessageValidatorException $e) {
            return false;
        }
    }

    /**
     * Ensures that the url of the certificate is one belonging to AWS, and not
     * just something from the amazonaws domain, which includes S3 buckets.
     *
     * @param UriInterface $uri
     *
     * @throws MessageValidatorException if the cert url is invalid
     */
    private function validateUrl(UriInterface $uri)
    {
        // The cert URL must be https, a .pem, and match the following pattern.
        $hostPattern = '/^sns\.[a-zA-Z0-9\-]{3,}\.amazonaws\.com(\.cn)?$/';
        if ($uri->getScheme() !== 'https'
            || substr($uri, -4) !== '.pem'
            || !preg_match($hostPattern, $uri->getHost())
        ) {
            throw new MessageValidatorException('The certificate is located '
                . 'on an invalid domain.');
        }
    }
}
