<?php
namespace Aws\Test\Build\Changelog;

use Aws\Build\Changelog\ChangelogBuilder;

/**
 * @covers ChangelogBuilder
 *
 */
class ChangelogBuilderTest extends \PHPUnit_Framework_TestCase
{

    private $RESOURCE_DIR = "tests/Build/Changelog/resources/";


    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBuildChangelogNoDirectory()
    {
        $obj = new ChangelogBuilder('wrong-folder', "", false);
        $obj->buildChangelog();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBuildChangelogNoReleaseNotes()
    {
        $tempDir = sys_get_temp_dir() . "/";
        if (!file_exists($tempDir . "/.changes/nextrelease/")) {
            mkdir($tempDir . "/.changes/nextrelease/", 0777, true);
        }
        $obj = new ChangelogBuilder($tempDir, "", false);
        $obj->buildChangelog();
        unlink($tempDir . "/.changes/nextrelease/");
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBuildChangelogCreateTagInvalidChangelog()
    {
        $obj = new ChangelogBuilder($this->RESOURCE_DIR, sys_get_temp_dir() . "/", false);
        $obj->buildChangelog();
    }

    public function testBuildChangelogValid()
    {
        $tempDir = sys_get_temp_dir() . "/";
        file_put_contents($tempDir . "CHANGELOG.md", "# CHANGELOG \n\n\n\n ");
        $obj = new ChangelogBuilder($this->RESOURCE_DIR, $tempDir, false);
        $obj->buildChangelog();
        $lines = file($tempDir . 'CHANGELOG.md');
        $this->assertEquals("## next release\n", $lines[2]);
        $this->assertEquals("* `Aws\Ec2` - Added Support to Tag Instance\n", $lines[4]);
        $this->assertEquals("* `Aws\s3` - Test string placeholder for new service\n", $lines[5]);
        $this->assertEquals("* `Aws\util` - Parse ini files containing comments using #\n", $lines[6]);
        unlink($tempDir . '/CHANGELOG.md');

        $this->assertEquals(
            json_decode(file_get_contents($this->RESOURCE_DIR . "/release-json-valid"), true),
            json_decode(file_get_contents($tempDir . "/.changes/3.22.0"), true)
        );
        unlink($tempDir . "/.changes/3.22.0");
    }

    public function testCleanNextReleaseFolderValid()
    {
        $tempDir = sys_get_temp_dir() . "/";
        if (!file_exists($tempDir . ".changes/nextrelease/")) {
            mkdir($tempDir . ".changes/nextrelease/", 0777, true);
        }
        $obj = new ChangelogBuilder($tempDir, '', false);
        touch($tempDir . ".changes/nextrelease/temp.json");
        $this->assertEquals(1, count(preg_grep('/^([^.])/', scandir($tempDir . ".changes/nextrelease/"))));
        $obj->cleanNextReleaseFolder();
        $this->assertEquals(0, count(preg_grep('/^([^.])/', scandir($tempDir . ".changes/nextrelease/"))));
    }
}




