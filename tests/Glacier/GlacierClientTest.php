<?php
namespace Aws\Test\Glacier;

use Aws\Glacier\GlacierClient;
use Aws\Result;
use GuzzleHttp\Command\Event\PreparedEvent;

/**
 * @covers Aws\Glacier\GlacierClient
 */
class GlacierClientTest extends \PHPUnit_Framework_TestCase
{
    public function testHasNecessaryDefaults()
    {
        $client = new GlacierClient([
            'service' => 'glacier',
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $command = $client->getCommand('ListVaults');
        $this->assertEquals('-', $command['accountId']);

        $command->getEmitter()->on('prepared', function (PreparedEvent $event) {
            $event->setResult(new Result([]));
            $this->assertEquals(
                $event->getClient()->getApi()->getMetadata('apiVersion'),
                $event->getRequest()->getHeader('x-amz-glacier-version')
            );
        });
    }

    public function testCreatesClientWithSubscribers()
    {
        $client = new GlacierClient([
            'service' => 'glacier',
            'region'  => 'us-west-2',
            'version' => 'latest'
        ]);

        $found = [];
        foreach ($client->getEmitter()->listeners() as $value) {
            foreach ($value as $val) {
                $found[] = is_array($val)
                    ? get_class($val[0])
                    : get_class($val);
            }
        }

        $this->assertContains('Aws\Subscriber\SourceFile', $found);
        $this->assertContains('Aws\Glacier\ApplyChecksumsSubscriber', $found);
    }
}
