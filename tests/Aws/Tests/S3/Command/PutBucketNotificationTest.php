<?php

namespace Aws\Tests\S3\Command;

/**
 * @covers Aws\S3\Command\PutBucketNotification
 */
class PutBucketNotificationTest extends \Guzzle\Tests\GuzzleTestCase
{
    protected function getCommand()
    {
        return $this->getServiceBuilder()->get('s3')->getCommand('PutBucketNotification', array(
            'bucket'   => 'foo'
        ));
    }

    public function testAllowsCustomBody()
    {
        $request = $this->getCommand()->set('body', 'foo')->prepare();
        $this->assertEquals('foo', (string) $request->getBody());
    }

    public function testBuildsBodyUsingTopics()
    {
        $command = $this->getCommand();
        $command->addTopic('foo', 'bar');
        $xml = (string) $command->prepare()->getBody();
        $element = new \SimpleXMLElement($xml);
        $this->assertEquals(
            '<NotificationConfiguration><TopicConfiguration><Topic>foo</Topic>'
            . '<Event>bar</Event></TopicConfiguration></NotificationConfiguration>',
            $xml
        );
    }
}
