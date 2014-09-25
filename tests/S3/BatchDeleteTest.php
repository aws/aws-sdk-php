<?php
namespace Aws\Test\S3;

use Aws\S3\S3Client;
use Aws\S3\BatchDelete;
use Aws\S3\Exception\DeleteMultipleObjectsException;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Command\Event\PreparedEvent;

/**
 * @covers Aws\S3\BatchDelete
 */
class BatchDeleteTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /** @var S3Client */
    protected $client;

    public function setUp()
    {
        $this->client = $this->getTestClient('s3', ['region' => 'us-east-1']);
    }

    public function testCountsAndReturnsQueue()
    {
        $b = new BatchDelete($this->client, 'bucket');
        $this->assertCount(0, $b);
        $b->addObject('foo');
        $this->assertCount(1, $b);
        $this->assertEquals([['Key' => 'foo']], $b->getQueue());
    }

    public function testSendsBatchRequestsPerThousand()
    {
        $b = new BatchDelete($this->client, 'bucket', ['batch_size' => 10]);

        $batches = $deleted = [];
        foreach ([0, 1] as $batch) {
            for ($i = 0; $i < 10; $i++) {
                $name = 'o-' . (($batch * 10) + $i);
                $b->addObject($name);
                $deleted[] = ['Key' => $name];
                $batches[$batch][] = ['Key' => $name];
            }
        }

        $called = 0;
        $this->client->getEmitter()->on(
            'prepared',
            function (PreparedEvent $e) use (&$called, $batches) {
                $this->assertSame(
                    $batches[$called],
                    $e->getCommand()['Delete']['Objects']
                );
                $called++;
            }
        );

        $this->addMockResults($this->client, [
            ['Deleted' => $batches[0]],
            ['Deleted' => $batches[1]],
        ]);

        $this->assertEquals($deleted, $b->delete());
    }

    public function testDeletesWithVersionId()
    {
        $b = new BatchDelete($this->client, 'bucket');
        $b->addObject('foo', 'bar');
        $deleted = [['Key' => 'foo', 'VersionId' => 'bar']];

        $this->client->getEmitter()->on(
            'prepared',
            function (PreparedEvent $e) {
                $this->assertEquals(
                    [['Key' => 'foo', 'VersionId' => 'bar']],
                    $e->getCommand()['Delete']['Objects']
                );
            }
        );

        $this->addMockResults($this->client, [
            ['Deleted' => $deleted]
        ]);

        $this->assertEquals($deleted, $b->delete());
    }

    public function testValidatesErrors()
    {
        $b = new BatchDelete($this->client, 'bucket');
        $b->addObject('foo');
        $b->addObject('bar');
        $deleted = [['Key' => 'foo']];
        $errors = [['Key' => 'bar', 'Code' => 'code', 'Message' => 'msg']];

        $this->addMockResults($this->client, [
            ['Deleted' => $deleted, 'Errors' => $errors]
        ]);

        try {
            $b->delete();
            $this->fail('Did not throw');
        } catch (DeleteMultipleObjectsException $e) {
            $this->assertSame($deleted, $e->getDeleted());
            $this->assertSame($errors, $e->getErrors());
        }
    }

    public function testAddsMfa()
    {
        $b = new BatchDelete($this->client, 'bucket', ['mfa' => 'mfa!']);
        $b->addObject('foo', 'bar');

        $this->client->getEmitter()->on(
            'prepared',
            function (PreparedEvent $e) {
                $this->assertEquals(
                    'mfa!',
                    $e->getRequest()->getHeader('x-amz-mfa')
                );
            }, -1
        );

        $this->addMockResults($this->client, [['Deleted' => []]]);
        $b->delete();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresBatchSizeIsGtZero()
    {
        new BatchDelete($this->client, 'bucket', ['batch_size' => 0]);
    }
}
