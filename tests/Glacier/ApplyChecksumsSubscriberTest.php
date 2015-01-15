<?php
namespace Aws\Test\Glacier;

use Aws\Exception\GlacierException;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Stream\NoSeekStream;

/**
 * @covers Aws\Glacier\ApplyChecksumsSubscriber
 */
class ApplyChecksumsSubscriberTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testThrowsExceptionIfBodyIsNotSeekable()
    {
        $glacier = $this->getTestClient('glacier');
        $command = $glacier->getCommand('UploadArchive', [
            'vaultName' => 'foo',
            'body'      => new NoSeekStream(Stream::factory('foo')),
        ]);
        try {
            $glacier->execute($command);
            $this->fail('An exception should have been thrown.');
        } catch (GlacierException $e) {
            $this->assertInstanceOf(
                'Aws\Exception\CouldNotCreateChecksumException',
                $e->getPrevious()
            );
        }
    }

    public function testAddsChecksumsIfNeeded()
    {
        $glacier = $this->getTestClient('glacier');
        $this->addMockResponses($glacier, [new Response(200)]);

        $command = $glacier->getCommand('UploadArchive', [
            'vaultName' => 'foo',
            'body'      => 'bar',
        ]);

        $command->getEmitter()->on('prepared', function (PreparedEvent $event) {
            $event->intercept(new Result([]));
            $expectedHash = hash('sha256', 'bar');
            $this->assertEquals(
                $expectedHash,
                $event->getRequest()->getHeader('x-amz-content-sha256')
            );
            $this->assertEquals(
                $expectedHash,
                $event->getRequest()->getHeader('x-amz-sha256-tree-hash')
            );
        }, 'last');

        $glacier->execute($command);
    }
}
