<?php

namespace Aws\Tests\S3;

use Aws\S3\SseCpkListener;
use Guzzle\Common\Event;
use Guzzle\Service\Command\AbstractCommand;

/**
 * @covers Aws\S3\SseCpkListener
 */
class SseCpkListenerTest extends \Guzzle\Tests\GuzzleTestCase
{
    /**
     * @dataProvider getListenerTestCases
     */
    public function testSseCpkListener($operation, array $params, array $expectedResults)
    {
        $this->assertContains('onCommandBeforePrepare', SseCpkListener::getSubscribedEvents());

        $command = $this->getMock('Guzzle\Service\Command\AbstractCommand', array('getName', 'build'), array($params));
        $command->expects($this->any())
            ->method('getName')
            ->will($this->returnValue($operation));
        $command->expects($this->any())
            ->method('build')
            ->will($this->returnSelf());

        $event = new Event(array('command' => $command));
        $listener = new SseCpkListener();
        $listener->onCommandBeforePrepare($event);

        foreach ($expectedResults as $key => $value) {
            $this->assertEquals($value, $expectedResults[$key]);
        }
    }

    public function getListenerTestCases()
    {
        return array(
            array(
                'CopyObject',
                array(
                    'SSECustomerKey' => 'foo',
                    'CopySourceSSECustomerKey' => 'bar',
                ),
                array(
                    'SSECustomerAlgorithm' => null,
                    'SSECustomerKey' => base64_encode('foo'),
                    'SSECustomerKeyMD5' => base64_encode(md5('foo', true)),
                    'CopySourceSSECustomerKey' => base64_encode('bar'),
                    'CopySourceSSECustomerKeyMD5' => base64_encode(md5('bar', true)),
                )
            ),
            array(
                'PutObject',
                array(
                    'SSECustomerKey' => 'foo',
                    'SSECustomerKeyMD5' => 'bar',
                ),
                array(
                    'SSECustomerKey' => base64_encode('foo'),
                    'SSECustomerKeyMD5' => base64_encode('bar'),
                )
            ),
            array(
                'ListObjects',
                array(),
                array(
                    'SSECustomerKey' => null,
                    'SSECustomerKeyMD5' => null,
                )
            ),
        );
    }
}
