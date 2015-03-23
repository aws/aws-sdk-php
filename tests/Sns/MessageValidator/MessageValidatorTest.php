<?php
namespace Aws\Test\Sns\MessageValidator;

use Aws\Sns\MessageValidator\Message;
use Aws\Sns\MessageValidator\MessageValidator;
use GuzzleHttp\Psr7;

/**
 * @covers \Aws\Sns\MessageValidator\MessageValidator
 */
class MessageValidatorTest extends \PHPUnit_Framework_TestCase
{
    const VALID_CERT_URL = "https://sns.foo.amazonaws.com/bar.pem";

    protected function setUp()
    {
        if (!extension_loaded('openssl')) {
            $this->markTestSkipped('The OpenSSL extension is required to run '
                . 'the tests for MessageValidator.');
        }
    }

    public function testIsValidReturnsFalseOnFailedValidation()
    {
        $validator = new MessageValidator();
        $message = new Message([]);
        $this->assertFalse($validator->isValid($message));
    }

    /**
     * @expectedException \Aws\Sns\Exception\MessageValidatorException
     * @expectedExceptionMessage The certificate is located on an invalid domain.
     */
    public function testValidateFailsWhenCertUrlInvalid()
    {
        $validator = new MessageValidator();
        $message = new Message([
            'SigningCertURL' => 'https://foo.amazonaws.com/bar'
        ]);
        $validator->validate($message);
    }

    /**
     * @expectedException \Aws\Sns\Exception\MessageValidatorException
     * @expectedExceptionMessage Cannot get the public key from the certificate.
     */
    public function testValidateFailsWhenCannotDeterminePublicKey()
    {
        $client = $this->getMockClient();
        $validator = new MessageValidator($client);
        $message = new Message([
            'SigningCertURL' => self::VALID_CERT_URL
        ]);
        $validator->validate($message);
    }

    /**
     * @expectedException \Aws\Sns\Exception\MessageValidatorException
     * @expectedExceptionMessage The message signature is invalid.
     */
    public function testValidateFailsWhenMessageIsInvalid()
    {
        // Get the signature for some dummy data
        list($signature, $certificate) = $this->getSignature('foo');
        // Create the validator with a mock HTTP client that will respond with
        // the certificate
        $client = $this->getMockClient(new Psr7\Response(200, [], $certificate));
        $validator = new MessageValidator($client);
        $message = new Message([
            'SigningCertURL' => self::VALID_CERT_URL,
            'Signature'      => $signature,
        ]);
        $validator->validate($message);
    }

    public function testValidateSucceedsWhenMessageIsValid()
    {
        // Create a real message
        $message = Message::fromArray([
            'Message'        => 'foo',
            'MessageId'      => 'bar',
            'Timestamp'      => time(),
            'TopicArn'       => 'baz',
            'Type'           => 'Notification',
            'SigningCertURL' => self::VALID_CERT_URL,
            'Signature'      => ' ',
        ]);

        // Get the signature for a real message
        list($signature, $certificate) = $this->getSignature($message->getStringToSign());
        $ref = new \ReflectionProperty($message, 'data');
        $ref->setAccessible(true);
        $ref->setValue($message, ['Signature' => $signature] + $ref->getValue($message));

        // Create the validator with a mock HTTP client that will respond with
        // the certificate
        $client = $this->getMockClient(new Psr7\Response(200, [], $certificate));
        $validator = new MessageValidator($client);

        // The message should validate
        $this->assertTrue($validator->isValid($message));
    }

    protected function getMockClient(Psr7\Response $response = null)
    {
        $response = $response ?: new Psr7\Response(200);

        return function () use ($response) {
            return \GuzzleHttp\Promise\promise_for($response);
        };
    }

    protected function getSignature($stringToSign)
    {
        // Generate a new Certificate Signing Request and public/private keypair
        $csr = openssl_csr_new(array(), $keypair);
        // Create the self-signed certificate
        $x509 = openssl_csr_sign($csr, null, $keypair, 1);
        openssl_x509_export($x509, $certificate);
        // Create the signature
        $privateKey = openssl_get_privatekey($keypair);
        openssl_sign($stringToSign, $signature, $privateKey);
        // Free the openssl resources used
        openssl_pkey_free($keypair);
        openssl_x509_free($x509);

        return [base64_encode($signature), Psr7\stream_for($certificate)];
    }
}
