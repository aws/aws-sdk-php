<?php
namespace Aws\Test;

use Aws\JsonCompiler;
use Aws\Test\Polyfill\PHPUnit\PHPUnitCompatTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\JsonCompiler
 */
class JsonCompilerTest extends TestCase
{
    use PHPUnitCompatTrait;

    private $models;

    public function _setUp()
    {
        $this->models = realpath(__DIR__ . '/../src/data');
    }

    public function testDecodesJsonToArray()
    {
        $c = new JsonCompiler();
        $data = $c->load($this->models . '/endpoints.json');
        $this->assertIsArray($data);
    }

    public function testEnsuresFileExists()
    {
        $this->expectException(\InvalidArgumentException::class);
        $c = new JsonCompiler();
        $c->load($this->models . '/not_there.json');
    }
}
