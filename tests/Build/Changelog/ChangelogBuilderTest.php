<?php
namespace Aws\Test\Build\Changelog;

use Aws\Build\Changelog\ChangelogBuilder;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Build\Changelog\ChangelogBuilder
 */
class ChangelogBuilderTest extends TestCase
{

    private $RESOURCE_DIR = "tests/Build/Changelog/resources/";

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBuildChangelogNoDirectory()
    {
        $params = [];
        $params['base_dir'] = 'wrong-folder';
        $obj = new ChangelogBuilder($params);
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
        $params = [];
        $params['base_dir'] = $tempDir;
        $params['release_notes_output_dir'] = '';
        $obj = new ChangelogBuilder($params);
        $obj->buildChangelog();
        unlink($tempDir . "/.changes/nextrelease/");
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBuildChangelogInvalidChangelog()
    {
        $params = [];
        $params['base_dir'] = $this->RESOURCE_DIR;
        $params['release_notes_output_dir'] = sys_get_temp_dir() . "/";
        $obj = new ChangelogBuilder($params);
        $obj->buildChangelog();
    }

    public function testBuildChangelogValid()
    {
        $tempDir = sys_get_temp_dir() . "/";
        file_put_contents($tempDir . "CHANGELOG.md", "# CHANGELOG \n\n\n\n ");
        $params = [];
        $params['base_dir'] = $this->RESOURCE_DIR;
        $params['release_notes_output_dir'] = $tempDir;
        $obj = new ChangelogBuilder($params);
        $obj->buildChangelog();
        $this->assertTrue($obj->isNewService());
        $lines = file($tempDir . 'CHANGELOG.md');
        $this->assertEquals("## next release\n", $lines[2]);
        $this->assertEquals("* `Aws\Ec2` - Added Support to Tag Instance\n", $lines[4]);
        $this->assertEquals("* `Aws\Ecs` - Test string placeholder for new docs\n", $lines[5]);
        $this->assertEquals("* `Aws\s3` - Test string placeholder for new service\n", $lines[6]);
        $this->assertEquals("* `Aws\util` - Parse ini files containing comments using #\n", $lines[7]);
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
        $params = [];
        $params['base_dir'] = $tempDir;
        $obj = new ChangelogBuilder($params);
        touch($tempDir . ".changes/nextrelease/temp.json");
        $this->assertCount(1, preg_grep('/^([^.])/', scandir($tempDir . ".changes/nextrelease/")));
        $obj->cleanNextReleaseFolder();
        $this->assertCount(0, preg_grep('/^([^.])/', scandir($tempDir . ".changes/nextrelease/")));
    }
}
