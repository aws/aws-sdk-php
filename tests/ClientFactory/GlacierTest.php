<?php
namespace Aws\Test\ClientFactory;

use Aws\ClientFactory\Glacier;
use Aws\Result;
use GuzzleHttp\Command\Event\PreparedEvent;

/**
 * @covers Aws\ClientFactory\Glacier
 */
class GlacierTest extends \PHPUnit_Framework_TestCase
{
    public function testHasNecessaryDefaults()
    {
        $client = (new Glacier)->create([
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
        $client = (new Glacier)->create([
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
