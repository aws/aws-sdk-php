<?php

namespace Aws\Tests\S3;

use Aws\S3\SseCpkListener;
use Guzzle\Common\Event;
use Guzzle\Service\Command\AbstractCommand;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Http\Message\Response;

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
        $this->assertContains(
            'onCommandBeforePrepare',
            SseCpkListener::getSubscribedEvents()
        );

        $command = $this->getMock(
            'Guzzle\Service\Command\AbstractCommand',
            array('getName', 'getClient', 'build'),
            array($params)
        );
        $command->expects($this->any())
            ->method('getName')
            ->will($this->returnValue($operation));
        $command->expects($this->any())
            ->method('build')
            ->will($this->returnSelf());
        $command->expects($this->any())
            ->method('getClient')
            ->will($this->returnValue($this->getServiceBuilder()->get('s3')));

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

    /**
     * @expectedException \RuntimeException
     */
    public function testCannotUseWithoutHttps()
    {
        $s3 = $this->getServiceBuilder()->get('s3', array('scheme' => 'http'));
        $s3->listBuckets(array(
            'SSECustomerKey' => 'foo',
            'CopySourceSSECustomerKey' => 'bar',
        ));
    }

    public function testCanUseWithoutHttpsForNonSse()
    {
        $s3 = $this->getServiceBuilder()->get('s3', array('scheme' => 'http'));
        $mock = new MockPlugin(array(new Response(200)));
        $s3->getEventDispatcher()->addSubscriber($mock);
        $s3->listBuckets();
    }
}
