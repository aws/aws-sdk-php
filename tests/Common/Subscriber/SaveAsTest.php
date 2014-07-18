<?php
namespace Aws\TestCommon\Subscriber;

use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\PrepareEvent;

/**
 * @covers Aws\Common\Subscriber\SaveAs
 */
class SaveAsTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testModifiesRequestWithSaveTo()
    {
        $client = $this->getTestClient('s3');
        $command = $client->getCommand('GetObject', [
            'Bucket' => 'a',
            'Key'    => 'b',
            'SaveAs' => '/abc'
        ]);
        $trans = new CommandTransaction($client, $command);
        $event = new PrepareEvent($trans);
        $command->getEmitter()->emit('prepare', $event);
        $this->assertEquals('/abc', $event->getRequest()->getConfig()['save_to']);
    }
}
