<?php
namespace Aws\Test\Sns\MessageValidator;

use Aws\Sns\MessageValidator\Message;

/**
 * @covers Aws\Sns\MessageValidator\Message
 */
class MessageTest extends \PHPUnit_Framework_TestCase
{
    public $messageData = array(
        'Message'        => 'a',
        'MessageId'      => 'b',
        'Timestamp'      => 'c',
        'TopicArn'       => 'd',
        'Type'           => 'e',
        'Subject'        => 'f',
        'Signature'      => 'g',
        'SigningCertURL' => 'h',
        'SubscribeURL'   => 'i',
        'Token'          => 'j',
    );

    public function testGetters()
    {
        $message = new Message($this->messageData);
        $this->assertInternalType('array', $message->getData());

        foreach ($this->messageData as $key => $expectedValue) {
            $this->assertEquals($expectedValue, $message->get($key));
        }
    }

    public function testFactorySucceedsWithGoodData()
    {
        $this->assertInstanceOf(
            'Aws\Sns\MessageValidator\Message',
            Message::fromArray($this->messageData)
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFactoryFailsWithNoType()
    {
        $data = $this->messageData;
        unset($data['Type']);
        Message::fromArray($data);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFactoryFailsWithMissingData()
    {
        Message::fromArray(array('Type' => 'Notification'));
    }

    public function testCanCreateFromRawPost()
    {
        $_SERVER['HTTP_X_AMZ_SNS_MESSAGE_TYPE'] = 'Notification';

        // Prep php://input with mocked data
        MockPhpStream::setStartingData(json_encode($this->messageData));
        stream_wrapper_unregister('php');
        stream_wrapper_register('php', __NAMESPACE__ . '\MockPhpStream');

        $message = Message::fromRawPostData();
        $this->assertInstanceOf('Aws\Sns\MessageValidator\Message', $message);

        stream_wrapper_restore("php");
        unset($_SERVER['HTTP_X_AMZ_SNS_MESSAGE_TYPE']);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testCreateFromRawPostFailsWithMissingHeader()
    {
        Message::fromRawPostData();
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testCreateFromRawPostFailsWithMissingData()
    {
        $_SERVER['HTTP_X_AMZ_SNS_MESSAGE_TYPE'] = 'Notification';
        Message::fromRawPostData();
        unset($_SERVER['HTTP_X_AMZ_SNS_MESSAGE_TYPE']);
    }

    /**
     * @dataProvider getDataForStringToSignTest
     */
    public function testBuildsStringToSignCorrectly(
        array $messageData,
        $expectedSubject,
        $expectedStringToSign
    ) {
        $message = new Message($messageData);
        $this->assertEquals($expectedSubject, $message->get('Subject'));
        $this->assertEquals($expectedStringToSign, $message->getStringToSign());
    }

    public function getDataForStringToSignTest()
    {
        $testCases = array();

        // Test case where one key is not signable
        $testCases[0] = array();
        $testCases[0][] = array(
            'TopicArn'  => 'd',
            'Message'   => 'a',
            'Timestamp' => 'c',
            'Type'      => 'e',
            'MessageId' => 'b',
            'FooBar'    => 'f',
        );
        $testCases[0][] = null;
        $testCases[0][] = <<< STRINGTOSIGN
Message
a
MessageId
b
Timestamp
c
TopicArn
d
Type
e

STRINGTOSIGN;

        // Test case where all keys are signable
        $testCases[1] = array();
        $testCases[1][] = array(
            'TopicArn'  => 'e',
            'Message'   => 'a',
            'Timestamp' => 'd',
            'Type'      => 'f',
            'MessageId' => 'b',
            'Subject'   => 'c',
        );
        $testCases[1][] = 'c';
        $testCases[1][] = <<< STRINGTOSIGN
Message
a
MessageId
b
Subject
c
Timestamp
d
TopicArn
e
Type
f

STRINGTOSIGN;

        return $testCases;
    }
}
