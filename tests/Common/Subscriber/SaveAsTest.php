<?php
namespace Aws\TestCommon\Subscriber;

use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Message\Request;

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
        $r = new Request('GET', 'http://foo.com');
        $trans->request = $r;
        $event = new PreparedEvent($trans);
        $command->getEmitter()->emit('prepared', $event);
        $this->assertEquals('/abc', $r->getConfig()['save_to']);
    }
}
