<?php
namespace Aws\Test;

use Aws\Utils;

/**
 * @covers Aws\Utils
 */
class UtilsTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatesRecursiveDirIterator()
    {
        $iter = Utils::recursiveDirIterator(__DIR__);
        $this->assertInstanceOf('Iterator', $iter);
        $files = iterator_to_array($iter);
        $this->assertContains(__FILE__, $files);
    }

    public function testCreatesNonRecursiveDirIterator()
    {
        $iter = Utils::dirIterator(__DIR__);
        $this->assertInstanceOf('Iterator', $iter);
        $files = iterator_to_array($iter);
        $this->assertContains('UtilsTest.php', $files);
    }
}
