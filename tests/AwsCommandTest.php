<?php
namespace Aws\Test;

use Aws\AwsCommand;
use GuzzleHttp\Event\Emitter;

/**
 * @covers Aws\AwsCommand
 */
class AwsCommandTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    public function testHasApi()
    {
        $emitter = new Emitter();
        $api = $this->createServiceApi([
            'operations' => [
                'foo' => []
            ]
        ]);

        $command = new AwsCommand(
            'foo',
            $api,
            ['baz' => 'bar'],
            ['emitter' => $emitter]
        );

        $this->assertInstanceOf('Aws\Common\Api\Operation', $command->getOperation());
        $this->assertEquals('foo', $command->getName());
        $this->assertEquals('bar', $command['baz']);
        $this->assertSame($emitter, $command->getEmitter());
        $this->assertSame($api, $command->getApi());
    }
}
