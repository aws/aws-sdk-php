<?php
namespace Aws\Test;

use Aws\JsonCompiler;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\JsonCompiler
 */
class JsonCompilerTest extends TestCase
{
    private $models;

    public function setup()
    {
        $this->models = realpath(__DIR__ . '/../src/data');
    }

    public function testDecodesJsonToArray()
    {
        $c = new JsonCompiler();
        $data = $c->load($this->models . '/endpoints.json');
        $this->assertInternalType('array', $data);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testEnsuresFileExists()
    {
        $c = new JsonCompiler();
        $c->load($this->models . '/not_there.json');
    }
}
