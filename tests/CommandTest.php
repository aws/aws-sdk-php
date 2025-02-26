<?php
namespace Aws\Test;

use Aws\Command;
use Aws\HandlerList;
use Aws\MetricsBuilder;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Command
 * @covers Aws\HasDataTrait
 */
class CommandTest extends TestCase
{
    public function testHasName()
    {
        $c = new Command('foo');
        $this->assertSame('foo', $c->getName());
    }

    public function testHasParam()
    {
        $c = new Command('foo', ['bar' => null, 'baz' => 'bam']);
        $this->assertTrue($c->hasParam('bar'));
        $this->assertTrue($c->hasParam('baz'));
    }

    public function testHasDefaultHandlerList()
    {
        $c = new Command('foo');
        $this->assertInstanceOf(HandlerList::class, $c->getHandlerList());
    }

    public function testHasSpecifricHandlerList()
    {
        $list = new HandlerList();
        $c = new Command('foo', [], $list);
        $this->assertSame($list, $c->getHandlerList());
    }

    public function testHasGetMethod()
    {
        $c = new Command('foo', ['bar' => 'baz']);
        $this->assertSame('baz', $c->get('bar'));
    }

    public function testIsIterable()
    {
        $command = new Command('foo', ['bar' => 'baz', 'qux' => 'boo']);
        $data = iterator_to_array($command);
        $this->assertEquals([
                'bar' => 'baz',
                'qux' => 'boo',
                '@http' => [],
                '@context' => []
            ],
            $data
        );
    }

    public function testConvertToArray()
    {
        $command = new Command('foo', ['bar' => 'baz', 'qux' => 'boo']);
        $this->assertEquals([
            'bar' => 'baz',
            'qux' => 'boo',
            '@http' => [],
            '@context' => []
        ],
            $command->toArray()
        );
    }

    public function testCanCount()
    {
        $c = new Command('foo', ['bar' => 'baz', 'qux' => 'boo']);
        $this->assertCount(4, $c);
    }

    public function testCanAccessLikeArray()
    {
        $c = new Command('foo', ['bar' => 'baz', 'qux' => 'boo']);
        $this->assertSame('baz', $c['bar']);
        $this->assertNull($c['boo']);
        $this->assertSame('boo', $c['qux']);
        $this->assertArrayHasKey('qux', $c);
        $this->assertArrayNotHasKey('boo', $c);

        $c['boo'] = 'hi!';
        $this->assertArrayHasKey('boo', $c);
        $this->assertSame('hi!', $c['boo']);

        unset($c['boo']);
        $this->assertArrayNotHasKey('boo', $c);
        $this->assertNull($c['boo']);
    }

    public function testGetAuthSchemesEmitsWarning()
    {
        $this->expectWarning();
        $this->expectWarningMessage(
            'Aws\Command::getAuthSchemes is deprecated.  Auth schemes resolved using the service'
        .' `auth` trait or via endpoint resolution can now be found in the command `@context` property.'
        );

        $c = new Command('foo', ['bar' => 'baz', 'qux' => 'boo']);
        $c->getAuthSchemes();
    }

    public function testSetAuthSchemesEmitsWarning()
    {
        $this->expectWarning();
        $this->expectWarningMessage(
            'Aws\Command::setAuthSchemes is deprecated.  Auth schemes resolved using the service'
            .' `auth` trait or via endpoint resolution are now set in the command `@context` property.'
        );

        $c = new Command('foo', ['bar' => 'baz', 'qux' => 'boo']);
        $c->setAuthSchemes([]);
    }

    public function testInitializeMetricsBuilderObject()
    {
        $command = new Command('Foo', []);
        $metricsBuilder = MetricsBuilder::fromCommand($command);
        $this->assertInstanceOf(MetricsBuilder::class, $metricsBuilder);
    }
}
