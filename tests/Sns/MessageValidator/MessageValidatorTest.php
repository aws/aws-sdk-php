<?php
namespace Aws\Test\Sns\MessageValidator;

use Aws\Sns\MessageValidator\Message;
use Aws\Sns\MessageValidator\MessageValidator;
use GuzzleHttp\Collection;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Stream;

/**
 * @covers \Aws\Sns\MessageValidator\MessageValidator
 */
class MessageValidatorTest extends \PHPUnit_Framework_TestCase
{
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
        $message = new Message(new Collection());
        $this->assertFalse($validator->isValid($message));
    }

    /**
     * @expectedException \Aws\Sns\MessageValidator\SnsMessageValidatorException
     */
    public function testValidateFailsWhenCertUrlDoesNotMatchAws()
    {
        $validator = new MessageValidator();
        $message = new Message(new Collection());
        $validator->validate($message);
    }

    /**
     * @expectedException \Aws\Sns\MessageValidator\SnsMessageValidatorException
     */
    public function testValidateFailsWhenCannotDeterminePublicKey()
    {
        $client = $this->getMockClient();
        $validator = new MessageValidator($client);
        $message = new Message(new Collection([
            'SigningCertURL' => 'https://foo.amazonaws.com/bar'
        ]));
        $validator->validate($message);
    }

    /**
     * @expectedException \Aws\Sns\MessageValidator\SnsMessageValidatorException
     */
    public function testValidateFailsWhenMessageIsInvalid()
    {
        // Get the signature for some dummy data
        list($signature, $certificate) = $this->getSignature('foo');
        // Create the validator with a mock HTTP client that will respond with
        // the certificate
        $client = $this->getMockClient(new Response(200, [], $certificate));
        $validator = new MessageValidator($client);
        $message = new Message(new Collection([
            'SigningCertURL' => 'https://foo.amazonaws.com/bar',
            'Signature'      => $signature,
        ]));
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
            'SigningCertURL' => 'https://foo.amazonaws.com/bar',
            'Signature'      => '',
        ]);

        // Get the signature for a real message
        list($signature, $certificate) = $this->getSignature($message->getStringToSign());
        $message->getData()->set('Signature', $signature);

        // Create the validator with a mock HTTP client that will respond with
        // the certificate
        $client = $this->getMockClient(new Response(200, [], $certificate));
        $validator = new MessageValidator($client);

        // The message should validate
        $this->assertTrue($validator->isValid($message));
    }

    protected function getMockClient(Response $response = null)
    {
        $response = $response ?: new Response(200);
        $plugin = new Mock();
        $plugin->addResponse($response);
        $client = new Client();
        $client->getEmitter()->attach($plugin);

        return $client;
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

        return [base64_encode($signature), Stream\create($certificate)];
    }
}
